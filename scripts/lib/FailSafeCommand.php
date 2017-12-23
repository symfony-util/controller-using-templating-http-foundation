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

class FailSafeCommand extends Command
{
    protected function configure()
    {
        $this->setName('failsafe')
            ->setDescription('Command line run from Process')
            ->addArgument(
                'commandline',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'The command line'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('process'); //! https://symfony.com/doc/4.0/components/console/helpers/processhelper.html
        $helper->run($output, $input->getArgument('commandline'));
    }
}
