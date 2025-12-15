<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Bank Account Endpoints
 */
final readonly class BankAccount
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
     * POST /bank-accounts
     *
     * @see https://column.com/docs/api/#bank-account/create
     *
     * @param  array{
     *     "description": string,
     *     "entity_id": string,
     *     "interest_config_id"?: string,
     *     "is_interest_bearing"?: "true" | "false",
     *     "is_overdraftable"?: "true" | "false",
     *     "overdraft_reserve_account_id"?: string,
     *     "display_name"?: string,
     *     "fdic_insurance"?: string,
     * } $data
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function create(array $data): string
    {
        try {
            $response = $this->httpClient->post('/bank-accounts', ['form_params' => $data]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * List all bank accounts
     *
     * GET /bank-accounts
     *
     * @see https://column.com/docs/api/#bank-account/list-all
     *
     * @param  array{
     *     "entity_id"?: string,
     *     "is_overdraftable"?: "true" | "false",
     *     "type"?: "CHECKING" | "OVERDRAFT_RESERVE" | "PROGRAM_RESERVE",
     *     "overdraft_reserve_account_id"?: string,
     *     "limit"?: int,
     *     "starting_after"?: string,
     *     "ending_before"?: string,
     *     "created.gt"?: string, // ISO-8601 datetime
     *     "created.gte"?: string, // ISO-8601 datetime
     *     "created.lt"?: string, // ISO-8601 datetime
     *     "created.lte"?: string, // ISO-8601 datetime
     * } $query
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function list(array $query = []): string
    {
        try {
            $response = $this->httpClient->get('/bank-accounts', ['query' => $query]);

            return Helper::formattedResponse($response);
        }
        catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * List all bank accounts by entityId
     *
     * GET /bank-accounts?entity_id={entity_id}
     *
     * @see https://column.com/docs/api/#bank-account/list-all
     *
     * @param  string  $entityId
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function listByEntity(string $entityId): string
    {
        $query['entity_id'] = $entityId;

        return $this->list($query);
    }

    /**
     * Get a bank account
     *
     * GET /bank-accounts/{id}
     *
     * @see https://column.com/docs/api/#bank-account/retrieve
     *
     * @param  string  $id
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function get(string $id): string
    {
        try {
            $response = $this->httpClient->get('/bank-accounts/'.$id);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update a bank account
     *
     * PATCH /bank-accounts/{id}
     *
     * @see https://column.com/docs/api/#bank-account/update
     *
     * @param  string  $id
     * @param  array{
     *     "description"?: string,
     *     "interest_config_id"?: string,
     *     "is_interest_bearing"?: "true"|"false",
     *     "is_overdraftable"?: bool,
     *     "overdraft_reserve_account_id"?: string,
     *     "display_name"?: string,
     *     "is_ach_debitable"?: "true"|"false",
     * } $data
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function update(string $id, array $data): string
    {
        try {
            $response = $this->httpClient->patch('/bank-accounts/'.$id, ['form_params' => $data]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Delete a bank account
     *
     * DELETE /bank-accounts/{id}
     *
     * @see https://column.com/docs/api/#bank-account/delete
     *
     * @param  string  $id
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function delete(string $id): string
    {
        try {
            $response = $this->httpClient->delete('/bank-accounts/'.$id);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get bank account summary history
     *
     * GET /bank-accounts/{id}/history?from_date=2022-03-01&to_date=2022-03-02
     *
     * @see https://column.com/docs/api/#bank-account/summary-history
     *
     * @param  string  $id
     * @param array{
     *      "from_date": string,
     *      "to_date": string,
     *  } $query
     *
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function history(string $id, array $query): string
    {
        try {
            $response = $this->httpClient->get('/bank-accounts/'.$id, $query);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Add a bank account owner
     *
     * POST /bank-accounts/{id}/owner
     *
     * @see https://column.com/docs/api/#bank-account/add-owner
     *
     * @param  string  $id
     * @param  string  $entity_id
     *
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function owner(string $id, string $entity_id): string
    {
        try {
            $response = $this->httpClient->post('/bank-accounts/'.$id.'/owner', [
                'entity_id' => $entity_id
            ]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
