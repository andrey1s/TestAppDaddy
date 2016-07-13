<?php

namespace AppBundle\DataProvider;

use AppBundle\Model\CalculateInstall;
use Psr\Cache\CacheItemPoolInterface;

class CacheDataProvider implements DataProviderInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var array
     */
    private $keys = [];

    /**
     * CacheDataProvider constructor.
     *
     * @param CacheItemPoolInterface $cache
     */
    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * {@inheritdoc}
     */
    public function inc($app, $country, $time)
    {
        $key = $this->key($app, $country, $time);
        $this->keys[$key] = true;
        $item = $this->cache->getItem($key);
        if (!$item->isHit()) {
            $calculate = new CalculateInstall();
            $calculate
                ->setCountry($country)
                ->setAppId($app)
                ->setTime($time)
            ;
        } else {
            $calculate = $item->get();
        }
        $calculate->incCount();

        $item->set($calculate);
        $this->cache->save($item);

    }

    /**
     * {@inheritdoc}
     */
    public function getResult()
    {
        return new CacheDataIterator($this->cache, array_keys($this->keys));
    }

    /**
     * @param string $app
     * @param string $country
     * @param int    $time
     *
     * @return string
     */
    private function key($app, $country, $time)
    {
        return $app.'&'.$country.'&'.$time;
    }
}
