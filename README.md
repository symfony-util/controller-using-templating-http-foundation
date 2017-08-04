# controller-using-templating-http-foundation
Controller which renders a template and returns a response (HttpFoundation)

### EngineAsArgumentController
* Uses Engine as controller argument for easier configuration with Symfony 3.3
* Because Twig was not found in autoconfig as a constructor argument
* http://symfony.com/doc/current/controller.html#fetching-services-as-controller-arguments

### TODO
#### PHP 7
// The string arguments can officially be type-hinted from php 7.0
// http://php.net/manual/en/functions.arguments.php
// tested only with default value
