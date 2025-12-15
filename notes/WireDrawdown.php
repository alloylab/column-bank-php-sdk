<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Wire Drawdown endpoints
 */
final readonly class WireDrawdown
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a wire drawdown request
     *
     * POST /transfers/wire-drawdown
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/wire-drawdown', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List wire drawdown requests
     *
     * GET /transfers/wire-drawdown
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/wire-drawdown', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a wire drawdown request
     *
     * GET /transfers/wire-drawdown/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/wire-drawdown/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Approve a wire drawdown request
     *
     * POST /transfers/wire-drawdown/{id}/approve
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function approve(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/wire-drawdown/{$id}/approve", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
