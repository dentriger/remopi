<?php

namespace Remopi\Drivers;

use Remopi\Drivers\Settings\DriverSettings;
use Prophecy\Exception\Doubler\MethodNotFoundException;

abstract class Driver
{
    protected $adapter;
    /**
     * @var DriverSettings
     */
    protected $settings;

    public function __call($name, $arguments)
    {
        if (!method_exists($this, $name)) {
            throw new MethodNotFoundException("Method {$name} not found in driver " . static::class, static::class, $name);
        }

        return $this->{$name}(...$arguments);
    }

    public function settings($settings)
    {
        $this->settings = $settings;
        return $this;
    }

    public function adapter($adapter)
    {
        $this->adapter = resolve($adapter);

        return $this;
    }

    public function request($url, $parameters = [], $method = 'GET')
    {
        $method = $this->settings->getMethod($url) ?? strtolower($method);
        $url = $this->settings->getUrl($url);
    }
}
