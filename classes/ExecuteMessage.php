<?php

namespace AHoffmeyer\DieLosungenBot;

use AHoffmeyer\DieLosungenBot\Controller\CsvController;

use Longman\TelegramBot\Telegram;
use \Longman\TelegramBot\Request;

class ExecuteMessage
{
    /**
     * @throws \Exception
     */
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
                'chat_id' => $_ENV['TELEGRAM_CHAT_ID'],
                'text' => $message,
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ]);

            if ($result->isOk()) {
                $result->getOk();
            } else {
                $result->printError();
            }
        } catch(\Exception $e) {
            throw new \Exception($e);
        }
    }
}