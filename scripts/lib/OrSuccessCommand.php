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
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// Symfony\Component\Process hidden dependecy

class OrSuccessCommand extends Command
{
    const NAME = 'orsuccess';
    const DESCRIPTION = 'Command line run from Process';

    protected function configure()
    {
        $this->setName(self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->addArgument(
                'failsafecommandexitcode',
                InputArgument::REQUIRED,
                'Failsafe Command Exit Code'
            )
            ->addArgument(
                'commandline',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The command line'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('process'); //! https://symfony.com/doc/4.0/components/console/helpers/processhelper.html
        // This introduces a hidden dependecy on symfony/process!

        $process = $helper->run($output, $input->getArgument('commandline'));
        if ($process->isSuccessful()) {

            return;
        }
        if ($process->getExitCode() === (int) ($input->getArgument('failsafecommandexitcode'))) {
            // This is not portable between Linux and Windows

            return;
        }

        return $process->getExitCode();
    }
}
