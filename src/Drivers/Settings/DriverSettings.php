<?php

namespace Remopi\Drivers\Settings;

class DriverSettings
{
    protected $domain;

    /**
     * @var array
     * method list store information about available methods for driver
     * [
     *      'alias' => targetUrl'
     * ]
     */
    protected $methodsList = [];

    public function __construct()
    {
        $this->domain = config('remopi.drivers.default.domain');
    }

    public function getMethodsList(): array
    {
        return $this->methodsList;
    }

    public function url($url)
    {
        if ($url = $this->resolveValidUrl($url)) {
            return $url;
        }

    }

    public function resolveValidUrl($url)
    {
        if (array_key_exists($url, $this->methodsList)) {
            return $this->domain . $this->methodsList[$url];
        }

        return filter_var($url, FILTER_VALIDATE_URL);
    }
}
