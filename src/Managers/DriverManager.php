<?php

namespace Remopi\Managers;

use Remopi\Drivers\Driver;
use InvalidArgumentException;

class DriverManager
{
    protected $app;

    protected $drivers = [];
    /**
     * Create a new driver manager instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function driver($name = null)
    {
        $name = $name ?: $this->getDefaultDriver();

        return $this->drivers[$name] = $this->get($name);
    }

    public function getDefaultDriver()
    {
        return 'default';
    }

    protected function get($name)
    {
        return $this->drivers[$name] ?? $this->resolve($name);
    }

    protected function resolve($driverClass)
    {
        $config = $this->getConfig($driverClass);

        if (empty($config)) {
            throw new InvalidArgumentException("Driver [{$driverClass}] does not configured.");
        }

        $driver = $this->app->make($driverClass);

        if (!$driver instanceof Driver) {
            throw new InvalidArgumentException("Driver [{$driverClass}] is not supported.");
        }

        return $driver;
    }

    protected function getConfig($name)
    {
        return $this->app['config']["remopi.drivers.{$name}"] ?: [];
    }

}
