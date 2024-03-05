<?php

namespace App\Infrastructure\Api;

use App\Application\UseCase\GetTasks\GetTasksQuery;
use App\Application\UseCase\GetTasks\GetTasksQueryHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GetTaskController
{

    public function __construct(protected GetTasksQueryHandler $getTasksQueryHandler)
    {
    }

    public function __invoke(Request $request): Response
    {
        $getTasksQuery = new GetTasksQuery();
        $tasksList = ($this->getTasksQueryHandler)($getTasksQuery);

        return new JsonResponse($tasksList, Response::HTTP_OK);
    }

}
