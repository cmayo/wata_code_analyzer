<?php

namespace App\Tests\Application\UseCase\AddTask;

use App\Application\UseCase\AddTask\AddTaskCommand;
use App\Application\UseCase\AddTask\AddTaskCommandHandler;
use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;
use PHPUnit\Framework\TestCase;

class AddTaskCommandHandlerTest extends TestCase
{
    public function testCreateANewTask(): void
    {
        // Arrange
        $taskRepository = $this->createMock(TaskRepositoryInterface::class);

        $taskRepository
            ->method('nextId')
            ->willReturn(1);

        $taskRepository
            ->expects($taskRepositorySpy = $this->once())
            ->method('save')
            ->with(new Task(1, 'My new task'));

        $addTaskCommandHandler = new AddTaskCommandHandler($taskRepository);
        $addTaskCommand = new AddTaskCommand('My new task');

        // Act
        $addTaskCommandHandler($addTaskCommand);

        // Assert
        $this->assertTrue($taskRepositorySpy->hasBeenInvoked());
    }

}
