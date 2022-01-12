<?php

namespace AHoffmeyer\DieLosungenBot\Controller;

use AHoffmeyer\DieLosungenBot\Factory\LosungenFactory;

class CsvController
{
    /** @var LosungenFactory */
    private $losung;

    /**
     * CsvController constructor.
     */
    public function __construct(
        LosungenFactory $losungenFactory
    )
    {
        $this->losung = $losungenFactory;
    }

    /**
     * @return string
     */
    public function view() : string
    {
        $losung = $this->losung->getLosung();

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
}
