# controller-using-templating-http-foundation
Controller which renders a template and returns a response (HttpFoundation)

### EngineAsArgumentController
* Uses Engine as controller argument for easier configuration with Symfony 3.3
* Because Twig was not found in autoconfig as a constructor argument
* http://symfony.com/doc/current/controller.html#fetching-services-as-controller-arguments
* constructor tested only with default value

#### Composer configuration for use in Symfony Framework or elsewhere where this controller is called by the Symfony kernel
* as long as there is the tiniest risk that Symfony < 3.3 could be installed by composer
* ie Symfony 2.8 is supported until close to the end of 2018 it will survive up to mid 2019 and more in distributions like Debian
* https://symfony.com/roadmap
```sh
$ composer req symfony-util/controller-using-templating-http-foundation-http-kernel
```
otherwise just
```sh
$ composer req symfony-util/controller-using-templating-http-foundation
```

#### Symfony configuration (kernel with MicroKernelTrait from symfony/framework)
##### symfony/routing
```php
function configureRoutes(RouteCollectionBuilder $routes)
{
    // ...
    $routes->add('/', SymfonyUtil\Controller\EngineAsArgumentController::class, 'index');
    // ...
}
```
##### symfony/dependency-injection
```php
protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
{
    // ...
    $c->autowire(SymfonyUtil\Controller\EngineAsArgumentController::class)
        ->setAutoconfigured(true)
        ->addTag('controller.service_arguments')
        ->setPublic(false);
    // ...
```

### TODO
#### PHP 7
##### _string_ arguments
* string arguments can officially be type-hinted from php 7.0
* http://php.net/manual/en/functions.arguments.php
