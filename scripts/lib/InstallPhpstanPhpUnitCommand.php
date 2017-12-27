<?php

/*
 * This file is part of the Symfony-Util package.
 *
 * (c) Jean-Bernard Addor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// Symfony\Component\Process hidden dependecy

class InstallPhpstanPhpUnitCommand extends Command
{
    const NAME = 'install:phpstan-phpunit';
    const DESCRIPTION = 'phpstan/phpstan-phpunit composer install';

    protected function configure()
    {
        $this->setName(self::NAME)
            ->setDescription(self::DESCRIPTION);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('process'); //! https://symfony.com/doc/4.0/components/console/helpers/processhelper.html
        // This introduces a hidden dependecy on symfony/process!

        if (0 !== $helper->run($output, 'composer global require --dev phpstan/phpstan-phpunit')->getExitCode()) {
            $helper->mustRun($output, 'composer global require --dev phpunit/phpunit');
        }
        // phpstan requires 7 <= PHP_MAJOR_VERSION)
    }
}

// composer global is may be not always the best choice
// https://secure.php.net/manual/en/reserved.constants.php
// https://secure.php.net/manual/en/function.phpversion.php
