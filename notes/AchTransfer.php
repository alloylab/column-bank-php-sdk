<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * ACH Transfer endpoints
 */
final readonly class AchTransfer
{
    protected HttpClient $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create an ACH transfer
     *
     * POST /transfers/ach
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/ach', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List all ACH transfers
     *
     * GET /transfers/ach
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/ach', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get an ACH transfer
     *
     * GET /transfers/ach/{ach_transfer_id}
     *
     * @param string $achTransferId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $achTransferId): ?string
    {
        $response = $this->httpClient->get('/transfers/ach/'.$achTransferId);

        return $this->httpClient->response($response);
    }

    /**
     * Cancel an ACH transfer
     *
     * POST /transfers/ach/{ach_transfer_id}/cancel
     *
     * @param string $achTransferId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function cancel(string $achTransferId): ?string
    {
        $response = $this->httpClient->post("/transfers/ach/{$achTransferId}/cancel");

        return $this->httpClient->response($response);
    }

    /**
     * Reverse an ACH transfer
     *
     * POST /transfers/ach/{ach_transfer_id}/reverse
     *
     * @param string $achTransferId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reverse(string $achTransferId, array $data): ?string
    {
        $response = $this->httpClient->post("/transfers/ach/{$achTransferId}/reverse", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
