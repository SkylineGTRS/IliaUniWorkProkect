<?php


namespace App\Repositories;

use Illuminate\Contracts\Cache\Repository as CacheContract;
use Closure;
use Psr\SimpleCache\InvalidArgumentException;

/**
 * Class CacheRepository
 * @package App\Repositories
 */
abstract class CacheRepository
{
    /**
     * @var int
     */
    protected int $cache_ttl = 5;

    /**
     * @var CacheContract
     */
    protected CacheContract $cache;

    /**
     * @param string $key
     * @param Closure $closure
     * @param int|null $minutes
     * @return mixed
     * @throws InvalidArgumentException
     */
    public function remember(string $key, Closure $closure, ?int $minutes = null)
    {
        $cache = $this->getCache();
        $value = $cache->get($key);
        if (!is_null($value)) {
            return $value;
        }
        $value = $closure();
        $cache_value = $value;
        $ttl = $minutes ? $minutes * 60 : $this->getTtl();
        $cache->put($key, $cache_value, $ttl);

        return $value;
    }

    /**
     * @return int
     */
    public function getTtl(): int
    {
        return $this->cache_ttl * 60;
    }

    /**
     * @return CacheContract
     */
    protected function getCache(): CacheContract
    {
        return $this->cache;
    }
}
