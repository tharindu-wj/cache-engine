<?php

namespace CacheEngine\Datacache;

class Datacache_Item{

    protected $data = false;

    /**
     * Construct
     * @param mixed $data Data to be cached
     */
    public function __construct($data) {
        $this->data = $data;
    }

    /**
     * Returns the cached data
     * @return mixed The cached data
     */
    public function __invoke() {
        return $this->data;
    }

}