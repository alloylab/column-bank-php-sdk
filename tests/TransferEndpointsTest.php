<?php

use AlloyLab\ColumnBank\API;

it('hits all BankAccount endpoints and requires HTTP 200 responses', function () {
    /*
     * API Setup
     */
    $token = getenv('COLUMN_API_TOKEN');

    if (!$token) {
        $this->markTestSkipped('COLUMN_API_TOKEN is not set.');
    }

    $api = new API($token);

    /**
     * Endpoint Tests
     */
    $bankAccountId = getenv('COLUMN_BANK_ACCOUNT_ID');
    if (!$bankAccountId) {
        $this->markTestSkipped('Environment variable COLUMN_BANK_ACCOUNT_ID is not set.');
    }

    $list = $api->transfer()->list(['bank_account_id' => $bankAccountId]);
    expectOkResponse($list, 'transfer::list');
});
