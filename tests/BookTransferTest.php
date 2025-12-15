<?php

use AlloyLab\ColumnBank\API;

it('hits all Book Transfer endpoints and requires HTTP 200 responses', function () {
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

    $bankAccountId2 = getenv('COLUMN_BANK_ACCOUNT_ID2');
    if (!$bankAccountId1) {
        $this->markTestSkipped('Environment variable COLUMN_BANK_ACCOUNT_ID12 is not set.');
    }

    $create = $api->bookTransfer()->create([
        'description' => 'Test Transfer',
        'currency_code' => 'USD',
        'amount' => 100,
        'sender_bank_account_id' => (string) $bankAccountId1,
        'receiver_bank_account_id' => (string) $bankAccountId2
    ]);
    expectOkResponse($create, 'bookTransfer::create');

    $list = $api->bookTransfer()->list();
    expectOkResponse($list, 'bookTransfer::list');

    $id = json_decode($create)->id;
    $get = $api->bookTransfer()->get((string) $id);
    expectOkResponse($get, 'bookTransfer::get');

    $createHold1 = $api->bookTransfer()->create([
        'description' => 'Test Transfer',
        'currency_code' => 'USD',
        'amount' => 100,
        'sender_bank_account_id' => (string) $bankAccountId1,
        'receiver_bank_account_id' => (string) $bankAccountId2,
        'hold' => 'true'
    ]);
    expectOkResponse($createHold1, 'bookTransfer::createHold1');

    $idHold1 = json_decode($createHold1)->id;
    $update = $api->bookTransfer()->update((string) $idHold1, ['amount' => 200]);
    expectOkResponse($update, 'bookTransfer::update');

    $cancel = $api->bookTransfer()->cancel((string) $idHold1);
    expectOkResponse($cancel, 'bookTransfer::cancel');

    $createHold2 = $api->bookTransfer()->create([
        'description' => 'Test Transfer',
        'currency_code' => 'USD',
        'amount' => 300,
        'sender_bank_account_id' => (string) $bankAccountId1,
        'receiver_bank_account_id' => (string) $bankAccountId2,
        'hold' => 'true'
    ]);
    expectOkResponse($createHold2, 'bookTransfer::createHold2');

    $idHold2 = json_decode($createHold2)->id;
    $update = $api->bookTransfer()->clear((string) $idHold2);
    expectOkResponse($update, 'bookTransfer::clear');
});
