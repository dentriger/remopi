<?php

namespace Remopi\Services;

interface ServiceInterface
{
    public function get($url, $options);
    public function post($url, $options);
    public function put($url, $options);
    public function patch($url, $options);
    public function delete($url, $options);
    public function head($url, $options);
    public function options($url, $options);
}
