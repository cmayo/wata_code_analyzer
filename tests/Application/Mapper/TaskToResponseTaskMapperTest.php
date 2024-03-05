<?php

namespace App\Tests\Application\Mapper;

use App\Application\Dto\ResponseTaskDto;
use App\Application\Mapper\TaskToResponseTaskMapper;
use App\Domain\Task\Task;
use PHPUnit\Framework\TestCase;

class TaskToResponseTaskMapperTest extends TestCase
{
    public function testTasksAreMappedToResponseTask(): void
    {
        // Arrange
        $taskToResponseTaskMapper = new TaskToResponseTaskMapper();
        $tasks = [
            new Task(1, 'My first task'),
            new Task(2, 'My second task'),
        ];
        $expected = [
            new ResponseTaskDto('My first task', false),
            new ResponseTaskDto('My second task', false),
        ];

        // Act
        $responseTasks = $taskToResponseTaskMapper->map($tasks);

        // Assert
        $this->assertEquals($expected, $responseTasks);
    }

}
