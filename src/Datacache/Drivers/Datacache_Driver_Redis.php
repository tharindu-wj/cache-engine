<?php

namespace CacheEngine\Datacache\Drivers;

use CacheEngine\Datacache\Datacache_Driver;
use CacheEngine\Datacache\Datacache_Item;
use Cache\Adapter\Redis;

class Datacache_Driver_Redis implements Datacache_Driver {

    public $redis;

    function __construct(){
        //Connecting to Redis server on localhost
        $this->redis = new \Redis();
        $this->redis->connect('127.0.0.1', 6379);
        echo "Connection to server sucessfully <br>";
        //check whether server is running or not
        echo "Server is running: ".$this->redis->ping()."<br>";
    }

    public function save($id, Datacache_Item $data, $ttl) {
        $this->redis->set("my", "Redis tutorial");
    }


    public function get($id) {
        echo "Stored string in redis:: " .$this->redis->get("my")."<br>";
    }


}
