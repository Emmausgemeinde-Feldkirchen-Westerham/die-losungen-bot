<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

use \AHoffmeyer\DieLosungenBot\Controller\CsvController;
use AHoffmeyer\DieLosungenBot\Factory\LosungenFactory;

// Instantiate factory
$factory = new LosungenFactory();

// Enable .env usage
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// test
#$losung = new CsvController($factory);
#echo $losung->view();

// Get current Losung
$telegram = new ExecuteMessage($factory);
$telegram->execute();



