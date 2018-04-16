<?php

namespace CacheEngine;

use CacheEngine\Datacache\Datacache_Driver;
use CacheEngine\Datacache\Datacache_Item;

class Datacache {

    private $driver = null;

    /**
     * Either returns the driver object or sets it if $driver is a Datacache_Driver object
     * @param  Datacache_Driver $driver A Datacache_Driver object
     * @return Datacache_Driver         A Datacache_Driver object
     * @throws Datacache_InvalidArgument When trying to set a non Datacache_Driver object
     */
    public function driver($driver = false) {
        if ($driver === false)
            return $this->driver;

        if (!($driver instanceof Datacache_Driver))
            throw new Exception('You can only use a Datacache_Driver object.');

        $this->driver = $driver;
    }

    /**
     * Saves data into cache
     * @param  string $id		A unique identifer for a cache item
     * @param  Datacache_Item $data		Item to cache
     * @return bool				Returns true if successful otherwise false
     */
    public function save($id, Datacache_Item $data, $ttl) {
        $this->driver->save($id, $data, $ttl);
        return true;
    }

    /**
     * Gets data from cache
     * @param  string  $id      A unique identifer for a cache item
     * @param  mixed $default 	Returns this when cache data doesnt exist
     * @return mixed            Cached data or default
     */
    public function get($id, $default = false) {
        try {
            $data = $this->driver->get($id);
            if (!($data instanceof Datacache_Item))
                throw new Exception('The variable returned from the cache driver in not an instance of Datacache_Item');
            return $data();
        } catch (Datacache_ItemNotFound $e) {
            return $default;
        }
    }

}
