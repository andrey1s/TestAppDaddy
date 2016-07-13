<?php

namespace AppBundle\DataProvider;

use AppBundle\Model\CalculateInstall;

interface DataProviderInterface
{
    /**
     * @param string $app
     * @param string $country
     * @param int    $time
     *
     * @return self
     */
    public function inc($app, $country, $time);

    /**
     * @return \Iterator|CalculateInstall[]
     */
    public function getResult();
}
