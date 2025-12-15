<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Wire Return Request endpoints
 */
final readonly class WireReturnRequest
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a wire return request
     *
     * POST /transfers/wire-return-request
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/wire-return-request', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List wire return requests
     *
     * GET /transfers/wire-return-request
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/wire-return-request', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a wire return request
     *
     * GET /transfers/wire-return-request/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/wire-return-request/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Approve a wire return request
     *
     * POST /transfers/wire-return-request/{id}/approve
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function approve(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/wire-return-request/{$id}/approve");

        return $this->httpClient->response($response);
    }

    /**
     * Reject a wire return request
     *
     * POST /transfers/wire-return-request/{id}/reject
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reject(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/wire-return-request/{$id}/reject");

        return $this->httpClient->response($response);
    }
}
