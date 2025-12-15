<?php

require __DIR__ . '/../vendor/autoload.php';

use AlloyLab\ColumnBank\API;

/**
 * Global helper to validate API responses
 */
function expectOkResponse(string $json, string $context): array
{
    $data = json_decode($json, true);

    expect($data, "Response for {$context} must be valid JSON")
        ->toBeArray();

    expect($data, "Response for {$context} must include status_code")
        ->toHaveKey('status_code');

    expect($data['status_code'], "Response for {$context} must be HTTP 200")
        ->toBe(200);

    return $data;
}

/**
 * Global setup before ALL tests.
 * You may also use `uses()->beforeAll()` but this keeps things simple.
 */
beforeAll(function () {
    $token = getenv('COLUMN_API_TOKEN');

    if (! $token) {
        $this->markTestSkipped('COLUMN_API_TOKEN is not set.');
    }

    $this->api = new API($token);
});
