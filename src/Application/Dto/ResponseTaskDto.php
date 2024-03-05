<?php

namespace App\Application\Dto;

class ResponseTaskDto
{
    public function __construct(
        public string $task,
        public bool   $done)
    {
    }
}
