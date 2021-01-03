<?php

namespace AHoffmeyer\DieLosungenBot\Controller;

use AHoffmeyer\DieLosungenBot\Service\CsvService;

class CsvController
{

    /** @var CsvService */
    protected $csvService;

    /**
     * CsvController constructor.
     */
    public function __construct()
    {
        $this->csvService = new CsvService(__DIR__ .'/../../assets/Losungen_Free_'. date('Y') .'.csv');
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function view() : string
    {
        $losung = $this->getCurrentLosung();

        $string = <<<EOF
<b>Die Losung für $losung[1] den $losung[0]</b>
$losung[4] - <a href="https://www.bibleserver.com/LUT/$losung[3]" target="_blank"><i>$losung[3]</i></a>

<b>Lehrtext</b>
$losung[6] - <a href="https://www.bibleserver.com/LUT/$losung[5]" target="_blank"><i>$losung[5]</i></a>

-----
© Evangelische Brüder-Unität – Herrnhuter
Brüdergemeine - <a href="https://www.losungen.de/die-losungen/">Die Losungen</a>
EOF;

        return $string;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getCurrentLosung() : array
    {
        $today = date('d.m.Y');

        $csv = $this->csvService->csvData();

        if ( ! $csv[$today]) {
            throw new \Exception('Failed parsing new Losung');
        }

        return $csv[$today];
    }
}