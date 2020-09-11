<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

use AHoffmeyer\DieLosungenBot\Controller\CsvController;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$view = new CsvController();
echo $view->view();