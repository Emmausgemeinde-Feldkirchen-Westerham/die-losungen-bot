# Die Losungen Telegram Bot

A simple Telegram bot application sending the Losungen to a specified Telegram channel.

## Installation

> composer install

Copy and edit the .env file
 
> cp .env.example .env

Download the current CSV file of the Losungen from https://www.losungen.de/download/

Copy the file to the assets folder and remove the whitespace with underscore

Change _Losungen Free xxxx.csv_ to _Losungen_Free_xxxx.csv_

## Execute

Simply run. The script will send todays Losung to your channel

> php broadcast.php 

