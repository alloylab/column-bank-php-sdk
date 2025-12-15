<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use Exception;
use GuzzleHttp\Client as HttpClient;


/**
 * Bank Account Endpoints
 */
final readonly class BankAccountOrig
{
    protected HttpClient $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create a bank account
     *
     * @param array{
     *     description: string,
     *     entity_id: string,
     *     interest_config_id?: string,
     *     is_interest_bearing?: bool,
     *     is_overdraftable?: bool,
     *     overdraft_reserve_account_id?: string,
     *     display_name?: string,
     *     fdic_insurance?: string,
     * } $data
     * @return array{
     *      status: int,
     *      body: string
     *  }
     *
     * @noinspection PhpUnused
     */
    public function create(array $data): string
    {
        $response = $this->httpClient->post('/bank-accounts', [
            'form_params' => $data,
        ]);

        return Helper::formattedResponse($response);
    }

    /**
     * List all bank accounts
     *
     * GET /bank-accounts
     *
     * @param  array  $query
     * @return array{
     *     status: int,
     *     body: string
     * }
     *
     * @noinspection PhpUnused
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/bank-accounts', $query);

        return Helper::formattedResponse($response);
    }

    /**
     * List bank accounts by entity
     *
     * Convenience wrapper for ?entity_id=...
     *
     * @noinspection PhpUnused
     */
    public function listByEntity(string $entityId): ?string
    {
        $response = $this->httpClient->get('/bank-accounts', [
            'query' => ['entity_id' => $entityId],
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a bank account by ID
     *
     * GET /bank-accounts/{id}
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/bank-accounts/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Update a bank account
     *
     * PATCH /bank-accounts/{id}
     *
     * @param array{
     *     description?: string,
     *     display_name?: string,
     *     is_ach_debitable?: bool,
     * } $data
     */
    public function update(string $id, array $data): ?string
    {
        $response = $this->httpClient->patch('/bank-accounts/'.$id, [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Delete a bank account
     *
     * DELETE /bank-accounts/{id}
     */
    public function delete(string $id): ?string
    {
        $response = $this->httpClient->delete('/bank-accounts/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Get bank account summary history
     *
     * GET /bank-accounts/{bank_account_id}/summary-history
     *
     * @param  string  $bankAccountId
     * @param  array   $query
     * @return ?string
     *
     */
    public function summaryHistory(string $bankAccountId, array $query = []): ?string
    {
        $response = $this->httpClient->get(
            "/bank-accounts/{$bankAccountId}/summary-history",
            ['query' => $query]
        );

        return $this->httpClient->response($response);
    }
}
