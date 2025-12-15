<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use Exception;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Book Transfer Endpoints
 */
final readonly class BookTransfer extends Base
{
    /**
     * Create a bank account
     *
     * POST /bank-accounts
     *
     * @see https://column.com/docs/api/#bank-account/create
     *
     * @param array{
     *     "description"?: string,
     *     "amount": int, // in cents (e.g. $1.75 = 175)
     *     "currency_code": string, // ISO 4217 (e.g. USD)
     *
     *     "sender_bank_account_id"?: string,
     *     "sender_account_number_id"?: string, // sender_bank_account_id or sender_account_number_id is required
     *
     *     "receiver_bank_account_id"?: string,
     *     "receiver_account_number_id"?: string, // receiver_bank_account_id or receiver_account_number_id is required
     *
     *     "allow_overdraft"?: "true" | "false",
     *     "hold"?: "true" | "false",
     *
     *     "details"?: array{
     *       "sender_name"?: string,
     *       "merchant_name"?: string,
     *       "merchant_category_code"?: string,
     *       "authorization_method"?: string,
     *       "website"?: string,
     *       "internal_transfer_type"?: string,
     *       "statement_description"?: string,
     *       "fx_amount"?: int,
     *       "fx_currency"?: string,
     *       "address"?: array{
     *         "line_1": string,
     *         "line_2"?: string,
     *         "city": string,
     *         "state"?: string, // required for US (postal abbrev)
     *         "postal_code"?: string,
     *         "country_code": string, // ISO 3166-1 alpha-2
     *       },
     *     },
     * } $data
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function create(array $data): string
    {
        try {
            $response = $this->httpClient->post("/transfers/book", ['form_params' => $data]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * List all book transfers
     *
     * GET /transfers/book
     *
     * @see https://column.com/docs/api/#book-transfer/list-all
     *
     * @param array{
     *     "limit"?: int<1,100>,
     *     "starting_after"?: string,
     *     "ending_before"?: string,
     *     "created.gt"?: string, // ISO-8601 datetime
     *     "created.gte"?: string, // ISO-8601 datetime
     *     "created.lt"?: string, // ISO-8601 datetime
     *     "created.lte"?: string, // ISO-8601 datetime
     *     "sender_bank_account_id"?: string,
     *     "receiver_bank_account_id"?: string,
     *     "status"?: string, // comma-separated for multiple values
     *      // REJECTED|COMPLETED|HOLD|CANCELED
     * } $query
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function list(array $query = []): string
    {
        try {
            $response = $this->httpClient->get("/transfers/book", [
                'query' => $query,
            ]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Get a book transfer
     *
     * GET /transfers/book/{id}
     *
     * @see https://column.com/docs/api/#book-transfer/get
     *
     * @param string $id
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function get(string $id): string
    {
        try {
            $response = $this->httpClient->get("/transfers/book/$id");

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update a book transfer
     *
     * PATCH /transfers/book/{id}
     *
     * @see https://column.com/docs/api/#transfers/book/update
     *
     * @param string $id
     * @param array{
     *     "amount"?: int, // in cents (e.g. $1.75 = 175)
     *     "currency_code"?: string, // ISO 4217 (e.g. USD)
     *     "allowed_overdraft"?: "true" | "false",
     * } $data
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function update(string $id, array $data): string
    {
        try {
            $response = $this->httpClient->patch("/transfers/book/$id", [
                'form_params' => $data,
            ]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Cancel a book transfer
     *
     * POST /transfers/book/{id}/cancel
     *
     * @see https://column.com/docs/api/#book-transfer/cancel
     *
     * @param string $id
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function cancel(string $id): string
    {
        try {
            $response = $this->httpClient->post("/transfers/book/$id/cancel");

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Clear a book transfer
     *
     * POST /transfers/book/{id}/clear
     *
     * @see https://column.com/docs/api/#book-transfer/clear
     *
     * @param string $id
     * @param array{
     *     "amount"?: int, // in cents (e.g. $1.75 = 175)
     *     "currency_code"?: string, // ISO 4217 (e.g. USD)
     *     "allowed_overdraft"?: "true" | "false",
     * } $data
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function clear(string $id, array $data = []): string
    {
        try {
            $response = $this->httpClient->post("/transfers/book/$id/clear", [
                'form_params' => $data,
            ]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
