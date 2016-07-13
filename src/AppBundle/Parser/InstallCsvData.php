<?php

namespace AppBundle\Parser;

use AppBundle\Model\Install;

class InstallCsvData implements \Iterator
{
    /**
     * @var resource
     */
    private $resource;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @var Install
     */
    private $currentData;

    /**
     * @var string
     */
    private $delimiter;

    /**
     * InstallCsvData constructor.
     *
     * @param resource $resource
     * @param string   $delimiter
     */
    public function __construct($resource, $delimiter = ';')
    {
        $this->resource = $resource;
        $this->delimiter = $delimiter;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        return $this->currentData ?: $this->next();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        ++$this->position;

        return $this->currentData = $this->getData($this->delimiter);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        return $this->current() !== null;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        $this->position = 0;
        rewind($this->resource);
    }

    /**
     * @param string $delimiter
     *
     * @return Install|null
     */
    private function getData($delimiter)
    {
        $install = new Install();
        $csv = fgetcsv($this->resource, 0, $delimiter);
        if (isset($csv[7])) {
            parse_str($csv[7], $data);
            $data = array_merge(['app_id' => null, 'country_code' => '', 'install_time' => null], $data);
            $install
                ->setAppId($data['app_id'])
                ->setCountry($data['country_code'])
                ->setInstallTime($data['install_time'] ? new \DateTime($data['install_time']) : null)
            ;
        }

        return $csv === false ? null : $install;
    }
}
