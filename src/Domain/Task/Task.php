<?php

namespace App\Domain\Task;

class Task
{
    public function __construct(
        protected int $id,
        protected string $name,
        protected bool $done = false,
    )
    {
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function isDone(): bool
    {
        return $this->done;
    }


}
