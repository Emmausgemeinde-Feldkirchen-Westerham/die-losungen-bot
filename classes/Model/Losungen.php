<?php

namespace AHoffmeyer\DieLosungenBot\Model;

class Losungen
{

    /**
     * @var string
     */
    protected $_file = '';

    /**
     * @var array
     */
    protected $currentLosung;

    /**
     * @var array
     */
    protected $csvData;

    /**
     * @throws \Exception
     */
    public function setCsvData() : void
    {
        if ( ! $handle = fopen($this->getFile(), 'r')) {
            throw new \Exception('Failed opening file');
        }

        $data = [];

        while ($csv = fgetcsv($handle, 0, "\t")) {
            $data[$csv[0]] = $csv;
        }

        $this->csvData = $data;
    }

    /**
     * @return array
     */
    public function getCsvData() : array
    {
        return $this->csvData;
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
    public function getFile() : string
    {
        return $this->_file;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getCurrentLosung() : array
    {
        return $this->currentLosung;
    }

    /**
     * @param string $date
     * @throws \Exception
     */
    public function setCurrentLosung(string $date): void
    {
        $csv = $this->getCsvData();

        if ( ! $csv[$date]) {
            throw new \Exception('Failed parsing new Losung');
        }

        $this->currentLosung = $csv[$date];
    }
}
