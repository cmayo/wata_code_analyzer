<?php

namespace App\Application\Mapper;

use App\Application\Dto\ResponseTaskDto;
use App\Domain\Task\Task;

class TaskToResponseTaskMapper
{
    /**
     * @param array<Task> $tasks
     * @return array<ResponseTaskDto>
     */
    public function map(array $tasks): array
    {
        return array_map(
            fn (Task $task) => new ResponseTaskDto($task->getName(), $task->isDone()),
            $tasks
        );
    }
}
