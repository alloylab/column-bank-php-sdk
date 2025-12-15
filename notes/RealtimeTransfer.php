<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Realtime Transfer endpoints
 */
final readonly class RealtimeTransfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a realtime transfer
     *
     * POST /transfers/realtime
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/realtime', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List realtime transfers
     *
     * GET /transfers/realtime
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a realtime transfer
     *
     * GET /transfers/realtime/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Return an incoming realtime transfer
     *
     * POST /transfers/realtime/{id}/return
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function returnIncoming(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/realtime/{$id}/return", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
