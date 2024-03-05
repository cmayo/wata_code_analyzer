<?php

namespace App\Tests\Infrastructure\Api;

use App\Application\UseCase\AddTask\AddTaskCommand;
use App\Application\UseCase\AddTask\AddTaskCommandHandler;
use App\Infrastructure\Api\AddTaskController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddTaskControllerTest extends TestCase
{
    public function testAddNewTask()
    {
        // Arrange
        $addTaskCommandHandler = $this->createMock(AddTaskCommandHandler::class);
        $addTaskCommandHandler
            ->expects($addTaskCommandSpy = $this->once())
            ->method('__invoke')
            ->with(new AddTaskCommand('My new task'));

        $addTaskController = new AddTaskController($addTaskCommandHandler);
        $payload = [
            'task' => 'My new task'
        ];
        $request = new Request(
            [],
            [],
            [],
            [],
            [],
            ['content-type' => 'application/json'],
            json_encode($payload),
        );

        // Act
        $response = $addTaskController($request);

        // Assert
        $this->assertEquals(Response::HTTP_CREATED, $response->getStatusCode());
        $this->assertTrue($addTaskCommandSpy->hasBeenInvoked());
    }


}
