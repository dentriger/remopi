<?php

namespace Remopi\Adapters;

use Illuminate\Http\Response;
use Remopi\Services\GuzzleService;
use Psr\Http\Message\ResponseInterface;

class GuzzleAdapter extends Adapter
{
    public function __construct(GuzzleService $service)
    {
        $this->service = $service;
    }

    /**
     * @param $url
     * @param $options
     * @param $method
     * @return Response
     */
    public function request($url, $options, $method): Response
    {
        $method = $this->transformMethod($method);
        $response = $this->service->{$method}($url, $options);

        return $this->createResponse($response);
    }

    /**
     * @param $method
     * @return string
     */
    protected function transformMethod($method): string
    {
        return strtolower($method);
    }

    /**
     * @param ResponseInterface $response
     * @return Response
     */
    protected function createResponse($response): Response
    {
        $content = $response->getBody()->getContents();
        $status = $response->getStatusCode();
        $headers = $response->getHeaders();

        return new Response($content, $status, $headers);
    }
}
