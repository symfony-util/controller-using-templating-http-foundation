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

echo __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/vendor/autoload.php';

$process = (new ProcessBuilder(['which', 'composer']))->getProcess();
echo $process->getCommandLine();
echo $process->run();
echo $process->getErrorOutput();
echo $process->getOutput();

$process = (new ProcessBuilder(['composer', 'help', 'global']))->getProcess();
echo "getCommandLine\n";
echo $process->getCommandLine();
echo "run\n";
echo $process->run();
echo "getErrorOutput\n";
echo $process->getErrorOutput();
echo "getOutput\n";
echo $process->getOutput();
echo "\n";

if (7 <= PHP_MAJOR_VERSION) {
    $process = (new ProcessBuilder(['composer', 'global', 'require', '--dev', 'phpstan/phpstan-phpunit']))->getProcess();
    echo $process->getCommandLine();
    echo $process->run();
    echo $process->getErrorOutput();
    echo $process->getOutput();
} else {
    $process = (new ProcessBuilder(['composer', 'global', 'require', '--dev', 'phpunit/phpunit']))->getProcess();
    echo "getCommandLine\n";
    echo $process->getCommandLine();
    echo "run\n";
    echo $process->run();
    echo "getErrorOutput\n";
    echo $process->getErrorOutput();
    echo "getOutput\n";
    echo $process->getOutput();
    echo "\n";
}
