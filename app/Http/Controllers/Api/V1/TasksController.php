<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Exception\ActionException;
use App\Http\Request\Tasks\CreateRequest;
use App\Http\Request\Tasks\IndexRequest;
use App\Http\Request\Tasks\UpdateRequest;
use App\Http\Response\BaseResponse;
use App\Http\Response\Tasks\TaskResponse;
use App\Services\Tasks\CreateService;
use App\Services\Tasks\DeleteService;
use App\Services\Tasks\DTO\TasksDTO;
use App\Services\Tasks\GetService;
use App\Services\Tasks\UpdateService;

class TasksController extends Controller
{
    public function create(CreateRequest $request): array
    {
        $response = new TaskResponse();
        $createService = new CreateService();
        $data = new TasksDTO();
        $post = $request->post();
        $data->fill($post);
        $task = $createService->service($data);
        $response->success = true;
        $response->task = $task;
        return $response->toArray();
    }

    public function update(UpdateRequest $request, int $id): array
    {
        $response = new TaskResponse();
        $updateService = new UpdateService();
        $data = new TasksDTO();
        $post = $request->post();
        $post['id'] = $id;
        $data->fill($post);
        $task = $updateService->service($data);
        $response->success = true;
        $response->task = $task;
        return $response->toArray();
    }

    public function delete(int $id): array
    {
        $response = new BaseResponse();
        try {
            $deleteService = new DeleteService();
            if ($deleteService->service($id)) {
                $response->success = true;
            } else {
                $response->setMsg('Не удалось удалить задачу');
            }
        } catch (ActionException $e) {
            $response->setMsg($e->getMessage());
        }
        return $response->toArray();
    }

    public function index(IndexRequest $request)
    {
        $getService = new GetService();
        $page = $request->input('page', 1);

        return $getService->service($request->completed, $page);
    }
}
