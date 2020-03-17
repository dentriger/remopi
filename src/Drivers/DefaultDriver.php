<?php

namespace Remopi\Drivers;

use Remopi\Adapters\GuzzleAdapter;
use Remopi\Drivers\Settings\DriverSettings;
use Illuminate\Http\Response;

class DefaultDriver extends Driver
{
   protected $adapter;
   protected $settings;

   public function __construct()
   {
       $this->settings = resolve(DriverSettings::class);
       $this->adapter = resolve(GuzzleAdapter::class);
   }

   public function request($url, $options = [], $method = 'GET'): Response
   {
       return $this->adapter->request($url, $options, $method);
   }
}
