<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * ACH Positive Pay endpoints
 */
final readonly class AchPositivePay
{
    protected HttpClient $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create ACH positive pay rule
     *
     * POST /ach-positive-pay
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createRule(array $data): ?string
    {
        $response = $this->httpClient->post('/ach-positive-pay', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a positive pay rule
     *
     * GET /ach-positive-pay/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getRule(string $id): ?string
    {
        $response = $this->httpClient->get('/ach-positive-pay/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * List positive pay rules
     *
     * GET /ach-positive-pay
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listRules(array $query = []): ?string
    {
        $response = $this->httpClient->get('/ach-positive-pay', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Delete a positive pay rule
     *
     * DELETE /ach-positive-pay/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function deleteRule(string $id): ?string
    {
        $response = $this->httpClient->delete('/ach-positive-pay/'.$id);

        return $this->httpClient->response($response);
    }
}
