<?php

namespace AppBundle\Parser;

class CsvFileParser implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($data)
    {
        $fp = fopen($data, 'r');

        return new InstallCsvData($fp);
    }

    /**
     * {@inheritdoc}
     */
    public function support($data)
    {
        return is_file($data) && is_readable($data);
    }
}
