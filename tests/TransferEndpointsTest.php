<?php

use AlloyLab\ColumnBank\API;

it('hits all Transfer endpoints and requires HTTP 200 responses', function () {
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
    $bankAccountId1 = getenv('COLUMN_BANK_ACCOUNT_ID1');
    if (!$bankAccountId1) {
        $this->markTestSkipped('Environment variable COLUMN_BANK_ACCOUNT_ID1 is not set.');
    }

    $list = $api->transfer()->list(['bank_account_id' => (string) $bankAccountId1]);
    expectOkResponse($list, 'transfer::list');
});
