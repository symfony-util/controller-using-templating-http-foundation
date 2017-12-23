<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Console\Application;

require __DIR__.'/vendor/autoload.php';

// $command = new InstallPhpstanPhpUnitCommand();
// $application->add($command);
// $application->setDefaultCommand($command->getName());

$application = new Application();
$application->add(new InstallPhpstanPhpUnitCommand());
$application->add(new RunCommand());
$application->run();
