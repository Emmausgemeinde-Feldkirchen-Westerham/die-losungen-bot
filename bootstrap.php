<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

use \AHoffmeyer\DieLosungenBot\ExecuteMessage;

// Enable .env usage
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Get current Losung
$telegram = new ExecuteMessage();
$telegram->execute();;



