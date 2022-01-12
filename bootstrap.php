<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

use \AHoffmeyer\DieLosungenBot\ExecuteMessage;
use \AHoffmeyer\DieLosungenBot\Controller\CsvController;

// Enable .env usage
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// test
#$losung = new CsvController();
#echo $losung->view();

// Get current Losung
$telegram = new ExecuteMessage();
$telegram->execute();;



