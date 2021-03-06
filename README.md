# controller-using-templating-http-foundation
Controller which renders a template and returns a response (HttpFoundation)

[![PHPPackages Rank](https://phppackages.org/p/symfony-util/controller-using-templating-http-foundation/badge/rank.svg)](https://phppackages.org/p/symfony-util/controller-using-templating-http-foundation)
[![Monthly Downloads](https://poser.pugx.org/symfony-util/controller-using-templating-http-foundation/d/monthly)](https://packagist.org/packages/symfony-util/controller-using-templating-http-foundation)
[![PHPPackages Referenced By](https://phppackages.org/p/symfony-util/controller-using-templating-http-foundation/badge/referenced-by.svg)](https://phppackages.org/p/symfony-util/controller-using-templating-http-foundation)
[![Tested PHP Versions](https://php-eye.com/badge/symfony-util/controller-using-templating-http-foundation/tested.svg)](https://php-eye.com/package/symfony-util/controller-using-templating-http-foundation)
[![Dependency Status](https://www.versioneye.com/php/symfony-util:controller-using-templating-http-foundation/badge)](https://www.versioneye.com/php/symfony-util:controller-using-templating-http-foundation)
[![Build Status](https://travis-ci.org/symfony-util/controller-using-templating-http-foundation.svg?branch=master)](https://travis-ci.org/symfony-util/controller-using-templating-http-foundation)
[![Code Coverage](https://img.shields.io/codecov/c/github/symfony-util/controller-using-templating-http-foundation/master.svg)](https://codecov.io/gh/symfony-util/controller-using-templating-http-foundation)
[![Scrutinizer](https://scrutinizer-ci.com/g/symfony-util/controller-using-templating-http-foundation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/symfony-util/controller-using-templating-http-foundation/?branch=master)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/bd7effd4-bf8c-41de-8568-02292fcdd262/mini.png)](https://insight.sensiolabs.com/projects/bd7effd4-bf8c-41de-8568-02292fcdd262)
<!---
[![SensioLabsInsight](https://img.shields.io/sensiolabs/i/bd7effd4-bf8c-41de-8568-02292fcdd262.svg)](https://insight.sensiolabs.com/projects/bd7effd4-bf8c-41de-8568-02292fcdd262)
-->

### TODO
* Test more than one Symfony version!

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

Icon: https://material.io/icons/#ic_wallpaper

### TODO
#### PHP 7
##### _string_ arguments
* string arguments can officially be type-hinted from php 7.0
* http://php.net/manual/en/functions.arguments.php
##### Why code in scripts directory in 5.3 and 5.4 branches is not included in ^7?

### Versions
#### PHP
##### 5.5 TemplatingController::class in unit tests
##### 5.6 __invoke(...$arguments) in VariadicController.php
##### 7.0 (master)
* declare(strict_types=1);
* function f(): float
* function s(string $s)
