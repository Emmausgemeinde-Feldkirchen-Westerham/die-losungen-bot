<?php

namespace AHoffmeyer\DieLosungenBot\Model;

class Losungen
{

    /**
     * @var string
     */
    protected $_file = '';

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
        $today = date('d.m.Y');

        $csv = $this->getCsvData();

        if ( ! $csv[$today]) {
            throw new \Exception('Failed parsing new Losung');
        }

        return $csv[$today];
    }
}