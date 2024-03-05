<?php

namespace App\Tests\Acceptance;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class TodoListAcceptanceTest extends WebTestCase
{
    public function testUserCanAddTaskToTheList(): void
    {
        // Arrange
        $payload = [
            'task' => 'My new task',
        ];
        $expected = [
            ['task' => 'My new task', 'done' => false],
        ];
        $client = static::createClient();

        // Act
        $client->request(
            Request::METHOD_POST,
            '/api/todos',
            [],
            [],
            ['content-type' => 'application/json'],
            json_encode($payload)
        );

        // Assert
        $client->request(
            Request::METHOD_GET,
            '/api/todos',
            [],
            [],
            ['content-type' => 'application/json'],
        );
        $response = json_decode($client->getResponse()->getContent(), true);

        $this->assertEquals($expected, $response);
    }
}
