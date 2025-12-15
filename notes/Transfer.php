<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use DateTime;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Generic Transfer listing endpoints
 */
final readonly class Transfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * List all transfers (ACH, wire, book, realtime, check, etc.)
     *
     * GET /transfers
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
