<?php

namespace CacheEngine\Datacache;

use CacheEngine\Datacache;
use CacheEngine\Datacache\Drivers\Datacache_Driver_File;
use CacheEngine\Datacache\Drivers\Datacache_Driver_Apc;
use CacheEngine\Datacache\Drivers\Datacache_Driver_Memcache;
use CacheEngine\Datacache\Drivers\Datacache_Driver_Redis;

class Datacache_Factory {
    /**
     * Sets up a new data cache object
     * @param  string		$driver Set the cache driver
     * @return Datacache	Data cache object
     */

    public static function forge($driver) {

        $driver_class = 'Datacache_Driver_' . ucwords(strtolower($driver));
        echo "<h3>Caching Driver: ".$driver_class."</h3>";

        try {
            $driver = new Datacache_Driver_Memcache;

            //@TODO : driver
            //$driver = new $driver_class;
        }
        catch ( Exception $e) {
            throw new Exception('The driver ' . $driver_class . ' does not exist.');
        }

        //print_r($driver);
        $datacache = new Datacache($driver);
        $datacache->driver($driver);
        return $datacache;
    }
}