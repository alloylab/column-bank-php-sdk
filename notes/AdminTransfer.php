<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Admin Transfer endpoints
 */
final readonly class AdminTransfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Reclaimed lost wires
     *
     * GET /admin/transfers/reclaimed-lost-wires
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reclaimedLostWires(array $query = []): ?string
    {
        $response = $this->httpClient->get('/admin/transfers/reclaimed-lost-wires', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
