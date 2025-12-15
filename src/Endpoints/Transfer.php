<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Transfer Endpoints
 */
final readonly class Transfer
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
     * List all transfers
     *
     * GET /transfers
     *
     * @see https://column.com/docs/api/#transfer/list-all
     *
     * @param  array{
     *     "limit"?: int<1, 100>,
     *     "starting_after"?: string,
     *     "ending_before"?: string,
     *     "type"?: string, // comma-separated for multiple values
     *      // ach_debit|ach_credit|book|deposited_check|issued_check|
     *      // wire|realtime|swift
     *     "bank_account_id"?: string,
     *     "sender_bank_account_id"?: string,
     *     "receiver_bank_account_id"?: string,
     *     "account_number_id"?: string,
     *     "sender_account_number_id"?: string,
     *     "receiver_account_number_id"?: string,
     *     "counterparty_id"?: string,
     *     "transfer_id"?: string,
     *     "description"?: string,
     *     "amount"?: string,
     *     "amount_gt"?: int,
     *     "amount_lt"?: int,
     *     "amount_gte"?: int,
     *     "amount_lte"?: int,
     *     "created_at_gt"?: string, // ISO-8601 datetime
     *     "created_at_lt"?: string, // ISO-8601 datetime
     *     "created_at_gte"?: string, // ISO-8601 datetime
     *     "created_at_lte"?: string, // ISO-8601 datetime
     *     "is_incoming"?: bool,
     *     "status"?: string, // comma-separated for multiple values
     *      // canceled|completed|deposited|failed|first_return|hold|
     *      // initiated|issued|manual_review|manual_review_approved|
     *      // pending_deposit|pending_first_return|pending_reclear|
     *      // pending_return|pending_second_return|pending_stop|
     *      // pending_submission|pending_user_initiated_return|
     *      // recleared|rejected|return_contested|return_dishonored|
     *      // returned|scheduled|second_return|settled|stopped|
     *      // submitted|user_initiated_returned|
     *      // user_initiated_return_submitted|
     *      // user_initiated_return_dishonored|
     *      // pending|accepted|blocked
     * } $query
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function list(array $query = []): string
    {
        try {
            $response = $this->httpClient->get("/transfers", ['query' => $query]);

            return Helper::formattedResponse($response);
        }
        catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
