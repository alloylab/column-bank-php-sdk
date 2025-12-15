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
    if (! $entityId) {
        $this->markTestSkipped('Environment variable COLUMN_ENTITY_ID is not set.');
    }

    $list = $api->bankAccount()->list();
    expectOkResponse($list, 'bankAccount::list');

    $listByType = $api->bankAccount()->list(['type' => 'PROGRAM_RESERVE']);
    expectOkResponse($listByType, 'bankAccount::listByType');

    $listByEntity = $api->bankAccount()->listByEntity($entityId);
    expectOkResponse($listByEntity, 'bankAccount::listByEntity');
});
