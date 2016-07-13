<?php

namespace AppBundle\DataProvider;

use Psr\Cache\CacheItemPoolInterface;

class CacheDataIterator implements \Iterator
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
     * CacheDataIterator constructor.
     *
     * @param CacheItemPoolInterface $cache
     * @param array                  $keys
     */
    public function __construct(CacheItemPoolInterface $cache, array $keys)
    {
        $this->cache = $cache;
        $this->keys = $keys;
    }

    /**
     * {@inheritdoc}
     */
    public function current()
    {
        $key = current($this->keys);

        return $this->cache->getItem($key)->get();
    }

    /**
     * {@inheritdoc}
     */
    public function next()
    {
        next($this->keys);
    }

    /**
     * {@inheritdoc}
     */
    public function key()
    {
        return current($this->keys);
    }

    /**
     * {@inheritdoc}
     */
    public function valid()
    {
        $key = key($this->keys);

        return $key !== null && $key !== false;
    }

    /**
     * {@inheritdoc}
     */
    public function rewind()
    {
        reset($this->keys);
    }
}
