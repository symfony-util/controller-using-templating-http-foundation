<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Process\Process;

require __DIR__.'/vendor/autoload.php';

function callback($type, $buffer) {
    if (Process::ERR === $type) {
        fwrite(STDERR, $buffer);
    } else {
        fwrite(STDOUT, $buffer);
    }
}

function shellLikeExec($s)
{
    // (new Process(explode(' ', $s)))->mustRun(callback); // This may be required for Symfony 4!
    (new Process($s))->mustRun(callback);
}

if (7 <= PHP_MAJOR_VERSION) {
    shellLikeExec('composer global require --dev phpstan/phpstan-phpunit');
} else {
    shellLikeExec('composer global require --dev phpunit/phpunit');
}

// composer global is may be not always the best choice
// https://secure.php.net/manual/en/reserved.constants.php
// https://secure.php.net/manual/en/function.phpversion.php
