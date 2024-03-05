<?php

namespace App\Application\UseCase\GetTasks;

use App\Application\Mapper\TaskToResponseTaskMapper;
use App\Domain\Task\TaskRepositoryInterface;

class GetTasksQueryHandler
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository,
        protected TaskToResponseTaskMapper $taskToResponseTaskMapper,
    )
    {
    }

    public function __invoke(GetTasksQuery $getTasksQuery): array
    {
        $tasks = $this->taskRepository->getAll();
        return $this->taskToResponseTaskMapper->map($tasks);
    }

}
