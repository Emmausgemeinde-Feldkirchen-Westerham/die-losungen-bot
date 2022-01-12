<?php

namespace AHoffmeyer\DieLosungenBot;

use AHoffmeyer\DieLosungenBot\Controller\CsvController;

use AHoffmeyer\DieLosungenBot\Factory\LosungenFactory;
use Longman\TelegramBot\Telegram;
use \Longman\TelegramBot\Request;

class ExecuteMessage
{

    /**
     * @var LosungenFactory
     */
    private $losungen;

    public function __construct(
        LosungenFactory $losungenFactory
    )
    {
        $this->losungen = new CsvController($losungenFactory);
    }

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

            $result = Request::sendMessage([
                'chat_id' => $_ENV['TELEGRAM_CHAT_ID'],
                'text' => $this->losungen->view(),
                'parse_mode' => 'HTML',
                'disable_web_page_preview' => true
            ]);

            if ($result->isOk()) {
                echo 'Message sent';
            } else {
                $result->printError();
            }
        } catch(\Exception $e) {
            throw new \Exception($e);
        }
    }
}
