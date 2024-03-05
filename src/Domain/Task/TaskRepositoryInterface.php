<?php

namespace App\Domain\Task;

use App\Application\Dto\ResponseTaskDto;

interface TaskRepositoryInterface
{
    public function nextId(): int;
    public function save(Task $task): Task;

    /**
     * @return array<ResponseTaskDto>
     */
    public function getAll(): array;
}
