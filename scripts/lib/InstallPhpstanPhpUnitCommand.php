<?php
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InstallPhpstanPhpUnitCommand extends Command
{
    protected function configure()
    {
        $this->setName('install:phpstan-phpunit')
            ->setDescription('phpstan/phpstan-phpunit composer install');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (7 <= PHP_MAJOR_VERSION) {
            shellLikeExec('composer global require --dev phpstan/phpstan-phpunit');
        } else {
            shellLikeExec('composer global require --dev phpunit/phpunit');
        }
    }
}


// composer global is may be not always the best choice
// https://secure.php.net/manual/en/reserved.constants.php
// https://secure.php.net/manual/en/function.phpversion.php
