# Tweet your code

This repository it's a simple implementation for the #tweetyourcode contest.

Requirements
---------

In order to create a command you should expose two simple APIs:

```GET /commands```  

Response:  
```
[
    {"command":"myFirstCommand","description":"My Description"},
    {"command":"mySecondCommand","description":"My Other Description"}
]
```  

```  
POST /draw/{command}
```
Response:

```
    An ASCII string with exactly 12.540 (165x76) characters
    Don't worry about the `\n` characters, we add them for you!
```
Both the APIs must return a Json Response.

Inside this example
---------

In the `routing.yml` you can find 
```yml
commands:
    path:  /commands
    defaults: { _controller: 'TMB\TweetYourCode\Controller\CommandsController::commandsAction'}
    methods: [GET]

draw:
    path:  /draw/{command}
    defaults: { _controller: 'TMB\TweetYourCode\Controller\CommandsController::drawAction'}
    methods: [POST]
    
```

corresponding to the routes `GET /commands` and `POST /draw/{command}` in the `CommandsController`.

These routes point to the `commandsAction` and `drawAction` functions.

In the `commandsAction` you should only expose the commands you're providing i.e.

```
json
[
    {
        "command": "logo",
        "description": "Show TheMadBox Logo"
    }
]
```

The `drawAction` should accept the command and return the ascii art corresponding to that command.


