<?php

namespace App\Domain\Tasks\DTO;

use App\Common\DTO\BaseDTO;

class TasksDTO extends BaseDTO
{
    public ?int $id;
    public ?string $title;
    public ?string $description;
    public bool $completed = false;
    public ?string $completed_at;
}
