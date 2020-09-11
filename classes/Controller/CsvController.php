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
        $this->csvService = new CsvService();
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function view()
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
     * @return mixed
     * @throws Exception
     */
    public function getCurrentLosung()
    {
        $today = date('d.m.Y');

        $csv = $this->csvService->getCsvData();

        return $csv[$today];
    }
}