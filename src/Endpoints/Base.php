<?php

namespace AlloyLab\ColumnBank\Endpoints;

use GuzzleHttp\Client as HttpClient;

/**
 * Base Endpoint Abstract Class
 */
Abstract readonly class Base
{
    protected HttpClient $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}
