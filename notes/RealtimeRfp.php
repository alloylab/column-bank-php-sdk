<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Realtime Request-for-Payment (RFP) endpoints
 */
final readonly class RealtimeRfp
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a realtime RFP
     *
     * POST /transfers/realtime-rfp
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/realtime-rfp', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List realtime RFPs
     *
     * GET /transfers/realtime-rfp
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime-rfp', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a realtime RFP
     *
     * GET /transfers/realtime-rfp/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/realtime-rfp/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Accept a realtime RFP
     *
     * POST /transfers/realtime-rfp/{id}/accept
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function accept(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/realtime-rfp/{$id}/accept", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Reject a realtime RFP
     *
     * POST /transfers/realtime-rfp/{id}/reject
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reject(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/realtime-rfp/{$id}/reject");

        return $this->httpClient->response($response);
    }
}
