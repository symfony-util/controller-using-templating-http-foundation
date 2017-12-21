<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Process\ProcessBuilder;

require __DIR__ . '/vendor/autoload.php';

if (7 <= PHP_MAJOR_VERSION) {
    $process = (new ProcessBuilder(['composer', 'global require --dev phpstan/phpstan-phpunit']))->getProcess();
    echo $process->getCommandLine();
    $process->run();
    echo $process->getErrorOutput();
    echo $process->getOutput();
} else {
    $process = (new ProcessBuilder(['composer', 'global require --dev phpunit/phpunit']))->getProcess();
    echo $process->getCommandLine();
    $process->run();
    echo $process->getErrorOutput();
    echo $process->getOutput();
}
