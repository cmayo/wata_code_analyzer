<?php

namespace App\Tests\Application\UseCase\GetTasks;

use App\Application\Dto\ResponseTaskDto;
use App\Application\Mapper\TaskToResponseTaskMapper;
use App\Application\UseCase\GetTasks\GetTasksQuery;
use App\Application\UseCase\GetTasks\GetTasksQueryHandler;
use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;
use PHPUnit\Framework\TestCase;

class GetTasksQueryHandlerTest extends TestCase
{
    public function testTasksAreReturned(): void
    {
        // Arrange
        $expected = [
            new ResponseTaskDto('My first task', false),
            new ResponseTaskDto('My second task', false),
        ];

        $taskRepository = $this->createMock(TaskRepositoryInterface::class);
        $taskRepository
            ->expects($taskRepositorySpy = $this->once())
            ->method('getAll')
            ->willReturn([
                new Task(1, 'My first task', false),
                new Task(2, 'My second task', false),
            ]);

        $taskToResponseTaskMapper = $this->createMock(TaskToResponseTaskMapper::class);
        $taskToResponseTaskMapper
            ->expects($taskToResponseTaskMapperSpy = $this->once())
            ->method('map')
            ->with([
                new Task(1, 'My first task', false),
                new Task(2, 'My second task', false),
            ])
            ->willReturn([
                new ResponseTaskDto('My first task', false),
                new ResponseTaskDto('My second task', false),
            ]);

        $getTasksQueryHandler = new GetTasksQueryHandler($taskRepository, $taskToResponseTaskMapper);
        $getTasksQuery = new GetTasksQuery();

        // Act
        $tasksList = $getTasksQueryHandler($getTasksQuery);

        // Assert
        $this->assertTrue($taskRepositorySpy->hasBeenInvoked());
        $this->assertTrue($taskToResponseTaskMapperSpy->hasBeenInvoked());
        $this->assertEquals($expected, $tasksList);
    }

}
