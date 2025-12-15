<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * Global helper to validate API responses
 */
function expectOkResponse(string $json, string $context): array
{
    $data = json_decode($json, true);

    expect($data, "Response for $context must be valid JSON")
        ->toBeArray();

    expect($data, "Response for $context must include status_code")
        ->toHaveKey('status_code');

    expect($data['status_code'], "Response for {$context} must be HTTP 200")
        ->toBe(200);

    return $data;
}