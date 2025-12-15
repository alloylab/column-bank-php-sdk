<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Check Return endpoints
 */
final readonly class CheckReturn
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a check return
     *
     * POST /transfers/checks/return
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/checks/return', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List check returns
     *
     * GET /transfers/checks/returns
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/checks/returns', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get returns for a specific check transfer
     *
     * GET /transfers/checks/{transfer_id}/returns
     *
     * @param string $transferId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getByTransferId(string $transferId): ?string
    {
        $response = $this->httpClient->get("/transfers/checks/{$transferId}/returns");

        return $this->httpClient->response($response);
    }
}
