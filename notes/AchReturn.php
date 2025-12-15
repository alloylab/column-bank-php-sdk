<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * ACH Return endpoints
 */
final readonly class AchReturn
{
    protected HttpClient $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create an ACH return
     *
     * POST /transfers/ach/{ach_transfer_id}/return
     *
     * @param string $achTransferId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(string $achTransferId, array $data): ?string
    {
        $response = $this->httpClient->post("/transfers/ach/{$achTransferId}/return", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List all ACH returns
     *
     * GET /transfers/ach/returns
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/ach/returns', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get an ACH return by transfer id
     *
     * GET /transfers/ach/{ach_transfer_id}/return
     *
     * @param string $achTransferId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $achTransferId): ?string
    {
        $response = $this->httpClient->get("/transfers/ach/{$achTransferId}/return");

        return $this->httpClient->response($response);
    }
}
