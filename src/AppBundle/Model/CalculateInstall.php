<?php

namespace AppBundle\Model;

class CalculateInstall implements \Serializable
{
    /**
     * @var string
     */
    protected $appId;

    /**
     * @var int
     */
    protected $time;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @return string
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param string $appId
     *
     * @return CalculateInstall
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     *
     * @return CalculateInstall
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     *
     * @return CalculateInstall
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return CalculateInstall
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return $this
     */
    public function incCount()
    {
        ++$this->count;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize([$this->appId, $this->count, $this->time, $this->country]);
    }

    /**
     * {@inheritdoc}
     */
    public function unserialize($serialized)
    {
        list($this->appId, $this->count, $this->time, $this->country) = unserialize($serialized);
    }
}
