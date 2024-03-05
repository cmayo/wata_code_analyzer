<?php

namespace App\Infrastructure\Persistence\Memory;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class TaskMemoryRepository implements TaskRepositoryInterface
{
    protected static array $tasks = [];

    public function nextId(): int
    {
        return count(self::$tasks) + 1;
    }

    public function save(Task $task): Task
    {
        self::$tasks[] = $task;

        return $task;
    }

    public function getAll(): array
    {
        return self::$tasks;
    }


}
