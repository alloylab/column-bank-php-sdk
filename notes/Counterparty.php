<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Counterparty and Financial Institution endpoints
 */
final readonly class Counterparty
{
    protected HttpClient $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create a counterparty
     *
     * POST /counterparties
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/counterparties', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List counterparties
     *
     * GET /counterparties
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/counterparties', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a counterparty
     *
     * GET /counterparties/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/counterparties/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Delete a counterparty
     *
     * DELETE /counterparties/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function delete(string $id): ?string
    {
        $response = $this->httpClient->delete('/counterparties/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Get financial institution
     *
     * GET /financial-institutions/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getFinancialInstitution(string $id): ?string
    {
        $response = $this->httpClient->get('/financial-institutions/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * List financial institutions
     *
     * GET /financial-institutions
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listFinancialInstitutions(array $query = []): ?string
    {
        $response = $this->httpClient->get('/financial-institutions', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Validate an IBAN
     *
     * POST /ibans/validate
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function validateIban(array $data): ?string
    {
        $response = $this->httpClient->post('/ibans/validate', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
