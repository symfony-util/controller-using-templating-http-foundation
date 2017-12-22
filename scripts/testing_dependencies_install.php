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
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ProcessBuilder;

require __DIR__.'/vendor/autoload.php';

function shellLikeExec($s)
{
    $process = (new ProcessBuilder(explode(' ', $s)))->getProcess()->disableOutput()->mustRun(function ($type, $buffer) {
        if (Process::ERR === $type) {
            fwrite(STDERR, $buffer);
        } else {
            echo 'OUT > '.$buffer;
        }
    });
}

if (7 <= PHP_MAJOR_VERSION) {
    shellLikeExec('composer global require --dev phpstan/phpstan-phpunit');
} else {
    shellLikeExec('composer global require --dev phpunit/phpunit');
}

// composer global is may be not always the best choice
// https://secure.php.net/manual/en/reserved.constants.php
// https://secure.php.net/manual/en/function.phpversion.php
