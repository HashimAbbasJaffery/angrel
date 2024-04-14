<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;


#[AsCommand(name: 'create:controller')]
class CreateControllerCommand extends Command
{
    protected $name = 'create:controller';
    // protected $signatu
    protected $signature = "create:controller";
    protected $description = "Create Controllers";
    protected function configure()
    {
        $this->setDescription('Creates a new controller file')
             ->addArgument('controllerName', InputArgument::REQUIRED, 'Name of the controller');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {   
        $controllerName = $input->getArgument('controllerName');
        $controllerFileName = 'App/Http/Controllers/' . $controllerName . '.php';
        $output->writeln($controllerFileName);

        if (!file_exists($controllerFileName)) {
            // Create the controller file
            $controllerContent = "<?php\n\nnamespace App\Controllers;\n\nclass $controllerName\n{\n    // Controller code here\n}\n";
            file_put_contents($controllerFileName, $controllerContent);

            $output->writeln("Controller file '$controllerName.php' created successfully.");
        } else {
            $output->writeln("Controller file '$controllerName.php' already exists.");
        }

        return Command::SUCCESS;
    }
}
