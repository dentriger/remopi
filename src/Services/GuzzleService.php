<?php

namespace Remopi\Services;

use GuzzleHttp\Client;

class GuzzleService implements ServiceInterface
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function get($url, $options)
    {
        return $this->client->get($url, $options);
    }

    public function post($url, $options)
    {
        return $this->client->post($url, $options);
    }

    public function put($url, $options)
    {
        return $this->client->put($url, $options);
    }

    public function delete($url, $options)
    {
        return $this->client->delete($url, $options);
    }

    public function head($url, $options)
    {
        return $this->client->head($url, $options);
    }

    public function patch($url, $options)
    {
        return $this->client->patch($url, $options);
    }

    public function options($url, $options)
    {
        throw new \Exception('Method not allowed');
    }
}
