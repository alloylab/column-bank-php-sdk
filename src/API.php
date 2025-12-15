<?php

namespace AlloyLab\ColumnBank;

use GuzzleHttp\Client as HttpClient;

/**
 * Column API Root Service
 */
final readonly class API
{
    /**
     * @var HttpClient HTTP Client
     */
    protected HttpClient $httpClient;

    /**
     * API Constructor
     *
     * @param string $apiToken Column API Token
     */
    public function __construct(string $apiToken)
    {
        $this->httpClient = $this->buildHttpClient($apiToken);
    }

    /**
     * Bank Account endpoints
     *
     * @return Endpoints\BankAccount
     *
     * @noinspection PhpUnused
     */
    public function bankAccount(): Endpoints\BankAccount
    {
        return new Endpoints\BankAccount($this->httpClient);
    }

    /**
     * Book Transfer endpoints
     *
     * @return Endpoints\BookTransfer
     *
     * @noinspection PhpUnused
     */
    public function bookTransfer(): Endpoints\BookTransfer
    {
        return new Endpoints\BookTransfer($this->httpClient);
    }

    /**
     * Platform endpoints
     *
     * @return Endpoints\Platform
     *
     * @noinspection PhpUnused
     */
    public function platform(): Endpoints\Platform
    {
        return new Endpoints\Platform($this->httpClient);
    }

    /**
     * Transfer endpoints
     *
     * @return Endpoints\Transfer
     *
     * @noinspection PhpUnused
     */
    public function transfer(): Endpoints\Transfer
    {
        return new Endpoints\Transfer($this->httpClient);
    }

    /**
     * Build HTTP Client configured for Column
     *
     * @param string $apiToken Column API Token
     *
     * @return HttpClient
     */
    protected function buildHttpClient(string $apiToken): HttpClient
    {
        return new HttpClient([
            'base_uri' => 'https://api.column.com',
            'auth'     => ['', $apiToken]
        ]);
    }
}
