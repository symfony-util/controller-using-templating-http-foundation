<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\ProcessBuilder;

require __DIR__.'/vendor/autoload.php';

function shellLikeExec($s)
{
    $process = (new ProcessBuilder(explode(' ', $s)))->getProcess();
    echo "run\n";
    echo $process->run();
    echo "getErrorOutput\n";
    echo $process->getErrorOutput();
    echo "getOutput\n";
    echo $process->getOutput();
    echo PHP_EOL;
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
}

shellLikeExec('which composer');

$process = (new ProcessBuilder(['composer', 'help', 'global']))->getProcess();
echo "getCommandLine\n";
echo $process->getCommandLine();
echo "run\n";
echo $process->run();
echo "getErrorOutput\n";
echo $process->getErrorOutput();
echo "getOutput\n";
echo $process->getOutput();
echo PHP_EOL;

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
