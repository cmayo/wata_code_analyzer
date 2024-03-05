<?php

namespace App\Application\UseCase\AddTask;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class AddTaskCommandHandler
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    )
    {
    }

    public function __invoke(AddTaskCommand $addTaskCommand): void
    {
        $id = $this->taskRepository->nextId();
        $task = new Task(
            $id,
            $addTaskCommand->getTask()
        );
        $this->taskRepository->save($task);
    }

}
