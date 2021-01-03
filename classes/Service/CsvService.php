<?php

namespace AHoffmeyer\DieLosungenBot\Service;

class CsvService
{
    /**
     * @var string
     */
    protected $_file = '';

    /**
     * CsvService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->setFile(__DIR__ .'/../../assets/Losungen_Free_'. date('Y') .'.csv');
    }

    /**
     * @return array
     * @throws Exception
     */
    public function setCsvData() : array
    {
        if ( ! $handle = fopen($this->getFile(), 'r')) {
            throw new \Exception('Failed opening file');
        }

        $data = [];

        while ($csv = fgetcsv($handle, 0, "\t")) {
            $data[$csv[0]] = $csv;
        }

        return $data;
    }

    /**
     * @return array
     */
    public function getCsvData() : array
    {
        return $this->setCsvData();
    }

    /**
     * @param string $file
     * @throws \Exception
     */
    public function setFile($file = '')
    {
        if ( ! file_exists($file)) {
            throw new \Exception('Failed opening file');
        }

        $this->_file = $file;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->_file;
    }

}