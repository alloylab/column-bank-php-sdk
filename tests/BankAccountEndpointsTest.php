<?php
// tests/BankAccountEndpointsTest.php

declare(strict_types=1);

use AlloyLab\ColumnBank\API;

it('hits all BankAccount endpoints and requires HTTP 200 responses', function () {
    /** @var API $api */
    $api = $this->api;

    $entityId = getenv('COLUMN_ENTITY_ID');
    if (! $entityId) {
        $this->markTestSkipped('Environment variable COLUMN_ENTITY_ID is not set.');
    }

    // 1. List bank accounts
    $listJson = $api->bankAccount()->list([
        'entity_id' => $entityId,
        'limit'     => 5,
    ]);

    $list = expectOkResponse($listJson, 'bankAccount::list');

    // 2. Create bank account
    $createJson = $api->bankAccount()->create([
        'description' => 'SDK test account ' . time(),
        'entity_id'   => $entityId,
        'type'        => 'CHECKING',
    ]);

    $created = expectOkResponse($createJson, 'bankAccount::create');

    $bankAccountId = $created['id'] ?? null;
    expect($bankAccountId, 'Created bank account must have an id')
        ->not->toBeNull();

    // 3. Get bank account
    $getJson = $api->bankAccount()->get($bankAccountId);
    $get = expectOkResponse($getJson, 'bankAccount::get');
    expect($get['id'] ?? null, 'Retrieved account id must match created id')
        ->toBe($bankAccountId);

    // 4. Update bank account
    $updateJson = $api->bankAccount()->update($bankAccountId, [
        'description' => 'SDK test account (updated)',
    ]);
    expectOkResponse($updateJson, 'bankAccount::update');

    // 5. List by entity (wrapper)
    $listByEntityJson = $api->bankAccount()->listByEntity($entityId, [
        'limit' => 5,
    ]);
    expectOkResponse($listByEntityJson, 'bankAccount::listByEntity');

    // 6. Summary history
    $summaryJson = $api->bankAccount()->summaryHistory($bankAccountId, [
        'limit' => 10,
    ]);
    expectOkResponse($summaryJson, 'bankAccount::summaryHistory');
});
