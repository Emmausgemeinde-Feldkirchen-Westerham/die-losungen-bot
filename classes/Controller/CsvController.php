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
<p><b>Losung für $losung[1] den $losung[0]</b></p>
<p>$losung[4]<br>
<a href="https://www.bibleserver.com/LUT/$losung[3]" target="_blank">$losung[3]</a></p>
<hr>
<p><b>Lehrtext</b></p>
<p>$losung[6]
<br>
<a href="https://www.bibleserver.com/LUT/$losung[5]" target="_blank">$losung[5]</a>
</p>
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