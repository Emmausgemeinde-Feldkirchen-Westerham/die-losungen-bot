<?php

namespace AHoffmeyer\DieLosungenBot\Factory;

use AHoffmeyer\DieLosungenBot\Model\Losungen;

class LosungenFactory implements LosungenFactoryInterface
{
    /**
     * @var Losungen
     */
    private $losungen;

    public function __construct()
    {
        $this->losungen = new Losungen();
        $this->setFile(__DIR__ .'/../../assets/Losungen_Free_'. date('Y') .'.csv');
        $this->setCsvData();
        $this->setLosung(date('d.m.Y'));
        $this->losungen->setCsvData();
    }

    private function setFile(string $file): void
    {
        $this->losungen->setFile($file);
    }

    public function getLosung(): array
    {
        return $this->losungen->getCurrentLosung();
    }

    private function setLosung(string $date): void
    {
        $this->losungen->setCurrentLosung($date);
    }

    private function setCsvData(): void
    {
        $this->losungen->setCsvData();
    }
}
