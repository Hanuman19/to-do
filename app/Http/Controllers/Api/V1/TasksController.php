<?php

namespace App\Http\Controllers\Api\V1;

use App\Domain\Tasks\Actions\TaskActions;
use App\Domain\Tasks\DTO\TasksDTO;
use App\Domain\Tasks\Gateways\TaskGateways;
use App\Domain\Tasks\Request\CreateRequest;
use App\Domain\Tasks\Request\IndexRequest;
use App\Domain\Tasks\Request\UpdateRequest;
use App\Domain\Tasks\Response\TaskResponse;
use App\Http\Controllers\Controller;
use App\Http\Exception\ActionException;
use App\Http\Response\BaseResponse;

class TasksController extends Controller
{
    public function create(CreateRequest $request): array
    {
        $response = new TaskResponse();
        $action = new TaskActions();
        $data = new TasksDTO();
        $post = $request->post();
        $data->fill($post);
        if ($task = $action->create($data)) {
            $response->success = true;
            $response->task = $task;
        } else {
            $response->setMsg('Не удалось создать задачу');
        }
        return $response->toArray();
    }

    public function update(UpdateRequest $request, int $id): array
    {
        $response = new TaskResponse();
        $action = new TaskActions();
        $data = new TasksDTO();
        $post = $request->post();
        $post['id'] = $id;
        $data->fill($post);
        if ($task = $action->update($data)) {
            $response->success = true;
            $response->task = $task;
        } else {
            $response->setMsg('Не удалось обновить задачу');
        }
        return $response->toArray();
    }

    public function delete(int $id): array
    {
        $response = new BaseResponse();
        try {
            $action = new TaskActions();
            if ($action->delete($id)) {
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
        $action = new TaskGateways();
        $page = $request->input('page', 1);

        return $action->index($request->completed, $page);
    }
}
