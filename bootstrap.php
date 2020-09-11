<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

use \AHoffmeyer\DieLosungenBot\ExecuteMessage;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$telegram = new ExecuteMessage();
$telegram->execute();;



