<?php

namespace AppBundle\Model;

class Install
{
    /**
     * @var string
     */
    protected $appId;

    /**
     * @var \DateTime
     */
    protected $installTime;

    /**
     * @var string
     */
    protected $country;

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
     * @return Install
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInstallTime()
    {
        return $this->installTime;
    }

    /**
     * @param \DateTime $installTime
     *
     * @return Install
     */
    public function setInstallTime(\DateTime $installTime = null)
    {
        $this->installTime = $installTime;

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
     * @return Install
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
