<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Book Transfer endpoints
 */
final readonly class BookTransfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create a book transfer
     *
     * POST /transfers/book
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/book', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List book transfers
     *
     * GET /transfers/book
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/book', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a book transfer
     *
     * GET /transfers/book/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/book/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Update a book transfer
     *
     * PATCH /transfers/book/{id}
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function update(string $id, array $data): ?string
    {
        $response = $this->httpClient->patch('/transfers/book/'.$id, [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Cancel a book transfer
     *
     * POST /transfers/book/{id}/cancel
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function cancel(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/book/{$id}/cancel");

        return $this->httpClient->response($response);
    }

    /**
     * Clear a pending book transfer
     *
     * POST /transfers/book/{id}/clear
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function clear(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/book/{$id}/clear");

        return $this->httpClient->response($response);
    }
}
