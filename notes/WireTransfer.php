<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Wire Transfer endpoints
 */
final readonly class WireTransfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a wire transfer
     *
     * POST /transfers/wire
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/wire', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List wire transfers
     *
     * GET /transfers/wire
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/wire', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a wire transfer
     *
     * GET /transfers/wire/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/wire/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Reverse an incoming wire transfer
     *
     * POST /transfers/wire/{wire_transfer_id}/reverse
     *
     * @param string $wireTransferId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function reverseIncoming(string $wireTransferId, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/wire/{$wireTransferId}/reverse", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
