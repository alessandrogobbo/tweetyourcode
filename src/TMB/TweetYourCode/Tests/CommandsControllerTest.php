<?php

use Symfony\Component\HttpFoundation\JsonResponse;
use TMB\TweetYourCode\Controller\CommandsController;

class CommandsControllerTest extends PHPUnit_Framework_TestCase
{
    private $commandsController;

    public function setUp()
    {
        $this->commandsController = new CommandsController();
    }

    public function testCommandsAreInTheProperFormat()
    {
        $response = $this->commandsController->commandsAction();
        $this->assertInstanceOf(JsonResponse::class, $response);

        $commands = json_decode($response->getContent(), true);

        foreach ($commands as $command) {
            $this->assertArrayHasKey('command', $command);
            $this->assertArrayHasKey('description', $command);
        }
    }

    public function testDrawWithInvalidCommandShouldReturn404()
    {
        $response = $this->commandsController->drawAction("foo");
        $this->assertEquals(404, $response->getStatusCode());
    }

    public function testJson()
    {
        $response = $this->commandsController->drawAction("logo");
        $json = json_decode($response->getContent());

        $substrings = explode("\n", $json);
        foreach ($substrings as $piece) {
            $this->assertEquals(165, strlen($piece));
        }
    }
}
