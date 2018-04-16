<?php

namespace CacheEngine\Datacache\Drivers;

use CacheEngine\Datacache\Datacache_Driver;
use CacheEngine\Datacache\Datacache_Item;
use Cache\Adapter\Memcached;

class Datacache_Driver_Memcache implements Datacache_Driver {

    public $memcache;
    public $pool;

    function __construct()
    {
        $this->memcache = new \Memcached();
        $this->memcache->addServer('localhost', 11211) or die ("Could not connect");

        /*$data = array('one', 'two', 'three', 'four', 'five', 'Six');

        $this->memcache->set('key_mem', $data);

        print_r($this->memcache->get('key_mem')); */
    }

    public function save($id, Datacache_Item $data, $ttl) {

        $this->memcache->set($id, $data, $ttl);

        print_r($this->memcache->get($id));

        return true;
    }


    public function get($id) {
        $this->memcache->get($id);
    }


}
