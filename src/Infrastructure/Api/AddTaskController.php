<?php

namespace App\Infrastructure\Api;

use App\Application\UseCase\AddTask\AddTaskCommand;
use App\Application\UseCase\AddTask\AddTaskCommandHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AddTaskController
{
    public function __construct(
        protected AddTaskCommandHandler $addTaskCommandHandler
    )
    {
    }

    public function __invoke(Request $request): Response
    {
        $payload = $this->getPayload($request);
        ($this->addTaskCommandHandler)(
            new AddTaskCommand($payload['task'])
        );

        return (new JsonResponse())->setStatusCode(Response::HTTP_CREATED);
    }

    protected function getPayload(Request $request): array
    {
        return json_decode($request->getContent(), true);
    }

}
