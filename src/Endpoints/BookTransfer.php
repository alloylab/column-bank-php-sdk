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
     *     "allow_overdraft"?: bool,
     *     "hold"?: bool,
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
}
