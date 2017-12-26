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
use Symfony\Component\Finder\Finder;

// Symfony\Component\Process hidden dependecy

class PathFinderEchoCommand extends Command
{
    protected function configure()
    {
        $this->setName('pathfinderecho')
            ->setDescription('Echo first file in finder results for given path')
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'The path'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $finder->files()->in(getcwd())->path($input->getArgument('path'));

        $iterator = $finder->getIterator();
        $iterator->rewind();
        $file = $iterator->current();

        echo $input->getArgument('path'), PHP_EOL;
        echo PHP_OS, PHP_OS_FAMILY, DIRECTORY_SEPARATOR, PHP_EOL;
        if (is_null($file)) {
            return;
        }
        if ($file->isExecutable()) {
            echo 'exec: '.$file->getRelativePathname().PHP_EOL;
            echo 'exec: '.$file->getRealPath().PHP_EOL;

            return;
        } elseif ($file->isReadable()) {
            echo 'php: '.$file->getRelativePathname().PHP_EOL;
            echo 'php: '.$file->getRealPath().PHP_EOL;

            return;
        }
        echo 'problem: '.$file->getRelativePathname().PHP_EOL;
        echo 'problem: '.$file->getRealPath().PHP_EOL;
    }
}
