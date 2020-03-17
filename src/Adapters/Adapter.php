<?php

namespace Remopi\Adapters;

use Illuminate\Http\Response;

abstract class Adapter
{
    protected $service;

    abstract public function request($url, $options, $method): Response;
    abstract protected function createResponse($response): Response;
}
