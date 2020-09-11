<?php

namespace AHoffmeyer\DieLosungenBot\Service;

class CsvService
{
    protected $_file;

    /**
     * CsvService constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if ( ! file_exists(__DIR__ .'/../../assets/Losungen_Free_2020.csv')) {
            throw new Exception('File could not be found');
        }

        $this->_file = __DIR__ .'/../../assets/Losungen_Free_2020.csv';
    }

    /**
     * @return array
     * @throws Exception
     */
    public function setCsvData()
    {
        $data = [];

        if ($handle = fopen($this->_file, 'r')) {
            while ($csv = fgetcsv($handle, 0, "\t")) {
                $data[$csv[0]] = $csv;
            }
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getCsvData()
    {
        return $this->setCsvData();
    }

}