<?php

namespace AHoffmeyer\DieLosungenBot;

use AHoffmeyer\DieLosungenBot\Controller\CsvController;

use Longman\TelegramBot\Telegram;
use \Longman\TelegramBot\Request;

class ExecuteMessage
{
    public function execute()
    {
        try {
            $telegram = new Telegram(
                $_ENV['TELEGRAM_BOT_API_TOKEN'],
                $_ENV['TELEGRAM_BOT_NAME']
            );

            $view = new CsvController();

            $message = $view->view();

            $result = Request::sendMessage([
                'chat_id' => -1001366652603,
                'text' => $message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ]);

            if ($result->isOk()) {
                echo 'Message sent';
            } else {
                $result->getErrorCode();
            }
        } catch(\Exception $e) {
            throw new \Exception($e);
        }
    }
}