// use Acme\Console\Command\HelloWorldCommand;
use Symfony\Component\Console\Application;

$command = new InstallPhpstanPhpUnitCommand();
$application = new Application();
$application->add($command);
$application->setDefaultCommand($command->getName());
$application->run();
