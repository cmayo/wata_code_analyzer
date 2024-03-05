<?php

namespace App\Tests\Infrastructure\Api;

use App\Application\Dto\ResponseTaskDto;
use App\Application\Dto\ResponseTasksDto;
use App\Application\UseCase\GetTasks\GetTasksQuery;
use App\Application\UseCase\GetTasks\GetTasksQueryHandler;
use App\Infrastructure\Api\GetTaskController;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetTaskControllerTest extends TestCase
{
    public function testGetAllTasks(): void
    {
        // Arrange
        $expectedPayload = [
            ['task' => 'My task', 'done' => false],
        ];
        $getTasksQueryHandler = $this->createMock(GetTasksQueryHandler::class);
        $getTasksQueryHandler
            ->expects($getTasksQueryHandlerSpy = $this->once())
            ->method('__invoke')
            ->with(new GetTasksQuery())
            ->willReturn(
                [
                    new ResponseTaskDto('My task', false),
                ]
            );

        $getTaskController = new GetTaskController($getTasksQueryHandler);
        $request = new Request();

        // Act
        $response = $getTaskController($request);

        // Assert
        $payload = json_decode($response->getContent(), true);
        $this->assertEquals(Response::HTTP_OK, $response->getStatusCode());
        $this->assertEquals($expectedPayload, $payload);
    }

}
