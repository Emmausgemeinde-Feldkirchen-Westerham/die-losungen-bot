# Die Losungen Telegram Bot

A simple Telegram bot application sending the Losungen to a specified Telegram channel.

## Creating your own Telegram bot

Simply go to https://t.me/botfather an follow the instructions. After creating your bot you will need the API key.
The bot itself needs to be admin in your Telegram channel. 

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

## Important note

The CSV needs to be UTF8 encodes. Unfortunately it is not. So please run

> iconv -f windows-1250 -t utf8 assets/Losungen\ Free\ 2020.csv -o Losungen_Free_2020.csv

## Cronjob

Create a cronjob on a daily basis e.g. everyday at 7a.m.

0 7 * * * php /my/path/to/boradcast.php
