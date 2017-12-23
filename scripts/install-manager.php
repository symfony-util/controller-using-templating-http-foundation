<?php

use Symfony\Component\Console\Application;

require __DIR__.'/vendor/autoload.php';

$command = new InstallPhpstanPhpUnitCommand();
$application = new Application();
$application->add($command);
$application->setDefaultCommand($command->getName());
$application->run();
