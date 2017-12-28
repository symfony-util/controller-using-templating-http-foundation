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

class WhereCommand extends Command
{
    const NAME = 'where';
    const DESCRIPTION = 'Echo file finder results for system path';
    // const ARGUMENTS = ['path'=>[InputArgument::REQUIRED, 'The path']]; // Not used! (Default values may depend of context) Requires recent PHP version.

    protected function configure()
    {
        $this->setName(self::NAME)
            ->setDescription(self::DESCRIPTION)
            ->addArgument(
                'name',
                InputArgument::REQUIRED,
                'The command filename'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = (new Finder())->files()->name($input->getArgument('name'))->ignoreDotFiles(false)->ignoreUnreadableDirs();
        foreach (explode(PATH_SEPARATOR, getenv('PATH')) as $directory) {
            if (is_dir($directory) || glob($directory, (defined('GLOB_BRACE') ? GLOB_BRACE : 0) | GLOB_ONLYDIR)) {
                $finder = $finder->in($directory);
            }
            // See https://github.com/symfony/symfony/blob/v4.0.2/src/Symfony/Component/Finder/Finder.php public function in
            // Double checking is_dir and glob takes a lot of time of disk I/O!
            // The *in* method better should be redefined (in a child class) to ignore inexistant directories!
        }
        // try {
        //     $finder->in(explode(PATH_SEPARATOR, getenv('PATH')));
        // } catch (InvalidArgumentException $e) { }
        foreach ($finder as $file) {
            if ($file->isExecutable()) {
                echo 'Executable: '.$file->getRealPath().PHP_EOL;
            } elseif ($file->isReadable()) {
                echo 'Readeable: '.$file->getRealPath().PHP_EOL;
            }
        }
    }
}
