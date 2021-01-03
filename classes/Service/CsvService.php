<?php

namespace AHoffmeyer\DieLosungenBot\Service;

use AHoffmeyer\DieLosungenBot\Model\Losungen;

class CsvService extends Losungen
{
    /**
     * @var Losungen
     */
    protected $losungen;

    /**
     * CsvService constructor.
     * @throws \Exception
     */
    public function __construct($file = '')
    {
        $this->losungen = new Losungen();
        $this->losungen->setFile($file);
    }

    public function csvData()
    {
        return $this->losungen->getCsvData();
    }

}