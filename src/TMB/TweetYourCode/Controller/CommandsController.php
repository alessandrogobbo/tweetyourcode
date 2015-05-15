<?php

namespace TMB\TweetYourCode\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandsController
{
	public function commandsAction() 
	{
        return new JsonResponse($this->getManagedCommands());
	}
	
	public function drawAction(Request $request, $command)
	{

        foreach ($this->getManagedCommands() as $managedCommands) {
            if ($managedCommands['command'] == $command) {
                break;
            }

            return new JsonResponse("This command is not available", 404);
        }

        $file = file_get_contents(sprintf("%s/../arts/%s.txt", __DIR__, $command));

        return new JsonResponse($file);
	}

    private function getManagedCommands()
    {
        return [
            [
                "command" => "logo",
                "description" => "Show TheMadBox logo"
            ]
        ];
    }
}
