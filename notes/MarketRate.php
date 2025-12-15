<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Market Rate endpoints
 */
final readonly class MarketRate
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * List market rates
     *
     * GET /market-rates
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/market-rates', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
