<?php 

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Attribute\AsCommand;


#[AsCommand(name: 'server:start')]
class Serve extends Command
{
    protected static $defaultName = 'server:start';

    protected function configure()
    {
        $this->setDescription('Starts the PHP built-in web server');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // $phpPath = 'C:\xampp\php\php.exe'; // Replace with the actual path to PHP executable
        // $documentRoot = __DIR__; // Adjust the document root as needed

        // // Check if PHP executable exists
        // if (!file_exists($phpPath)) {
        //     $output->writeln("<error>PHP executable not found at: $phpPath</error>");
        //     return Command::FAILURE;
        // }

        // // Check if document root exists
        // if (!file_exists($documentRoot)) {
        //     $output->writeln("<error>Document root not found at: $documentRoot</error>");
        //     return Command::FAILURE;
        // }

        // // Start the PHP built-in web server
        // $command = sprintf('"%s" -S localhost:8000 -t "%s"', $phpPath, $documentRoot);

        // // Execute the command and capture any output or errors
        // exec(sprintf("%s > /dev/null 2>&1 &", $command), $output, $exitCode);

        // if ($exitCode !== 0) {
        //     // Command execution failed
        //     $errorMessage = implode(PHP_EOL, $output); // Get error message
        //     $output->writeln("<error>Error: $errorMessage</error>");
        //     return Command::FAILURE;
        // }

        exec("php -S localhost:8000");

        // $output->writeln('Server started at http://localhost:8000');
        return Command::SUCCESS;
    }
}
