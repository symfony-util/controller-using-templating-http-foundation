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
    echo "run: ";
    echo $process->run();
    echo PHP_EOL;
    echo "getErrorOutput\n";
    echo $process->getErrorOutput();
    echo PHP_EOL;
    echo "getOutput\n";
    echo $process->getOutput();
    echo PHP_EOL;
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }
}

if (7 <= PHP_MAJOR_VERSION) {
    shellLikeExec('composer global require --dev phpstan/phpstan-phpunit');
} else {
    shellLikeExec('composer global require --dev phpunit/phpunit');
}

// composer global is may be not always the best choice
// https://secure.php.net/manual/en/reserved.constants.php
// https://secure.php.net/manual/en/function.phpversion.php
