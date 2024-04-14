<?php 

require_once "vendor/autoload.php";

require_once "Commands/CreateControllerCommand.php";
require_once "Commands/Serve.php";

use Commands\CreateControllerCommand;
use Commands\Serve;
use Symfony\Component\Console\Application;

$application = new Application("angrel", "0.1.1");
$application->add(new CreateControllerCommand());
$application->add(new Serve());
$application->run();