<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Settlement Reporting endpoints
 */
final readonly class Reporting
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Schedule a settlement report
     *
     * POST /reporting
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function schedule(array $data): ?string
    {
        $response = $this->httpClient->post('/reporting', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List all settlement reports
     *
     * GET /reporting
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/reporting', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a settlement report
     *
     * GET /reporting/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/reporting/'.$id);

        return $this->httpClient->response($response);
    }
}
