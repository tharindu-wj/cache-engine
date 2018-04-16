<?php

namespace CacheEngine\Datacache\Drivers;

use CacheEngine\Datacache\Datacache_Driver;
use CacheEngine\Datacache\Datacache_Item;

class Datacache_Driver_Apc implements Datacache_Driver {


    public function save($id, Datacache_Item $data, $ttl) {
        apc_store($id, $data, $ttl);
        echo "APC Save Done <br>";
        return true;
    }


    public function get($id) {
        $data = apc_fetch($id);
        echo "APC Fetch Done<br>";
        return $data;
    }

}
