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
    $entityId = getenv('COLUMN_ENTITY_ID');
    if (!$entityId) {
        $this->markTestSkipped('Environment variable COLUMN_ENTITY_ID is not set.');
    }

    $create = $api->bankAccount()->create(['description' => 'Test CI Account', 'entity_id' => $entityId]);
    expectOkResponse($create, 'bankAccount::create');

    $list = $api->bankAccount()->list();
    expectOkResponse($list, 'bankAccount::list');

    $listByType = $api->bankAccount()->list(['type' => 'PROGRAM_RESERVE']);
    expectOkResponse($listByType, 'bankAccount::listByType');

    $listByEntity = $api->bankAccount()->listByEntity($entityId);
    expectOkResponse($listByEntity, 'bankAccount::listByEntity');

    $bankAccountId = getenv('COLUMN_BANK_ACCOUNT_ID');
    if (!$bankAccountId) {
        $this->markTestSkipped('Environment variable COLUMN_BANK_ACCOUNT_ID is not set.');
    }

    $get = $api->bankAccount()->get($bankAccountId);
    expectOkResponse($get, 'bankAccount::get');

    $update = $api->bankAccount()->update($bankAccountId, ['display_name' => 'Test Bank Account', 'is_ach_debitable' => 'false']);
    expectOkResponse($update, 'bankAccount::update');

    $deleteId = json_decode($create)->id;
    $delete = $api->bankAccount()->delete($deleteId);
    expectOkResponse($delete, 'bankAccount::delete');
});
