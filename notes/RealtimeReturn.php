<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Realtime Return Request endpoints
 */
final readonly class RealtimeReturn
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a realtime return request
     *
     * POST /transfers/realtime-returns
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/realtime-returns', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List realtime return requests
     *
     * GET /transfers/realtime-returns
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime-returns', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a realtime return request
     *
     * GET /transfers/realtime-returns/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime-returns/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Accept a realtime return request
     *
     * POST /transfers/realtime-returns/{id}/accept
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function accept(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/realtime-returns/{$id}/accept");

        return $this->httpClient->response($response);
    }

    /**
     * Reject a realtime return request
     *
     * POST /transfers/realtime-returns/{id}/reject
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reject(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/realtime-returns/{$id}/reject");

        return $this->httpClient->response($response);
    }
}
