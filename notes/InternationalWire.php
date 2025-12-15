<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * International Wire + FX endpoints
 */
final readonly class InternationalWire
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Get FX rate sheet
     *
     * GET /fx-rate-sheet
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getFxRateSheet(array $query = []): ?string
    {
        $response = $this->httpClient->get('/fx-rate-sheet', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create FX quote
     *
     * POST /fx-quotes
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createFxQuote(array $data): ?string
    {
        $response = $this->httpClient->post('/fx-quotes', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get FX quote
     *
     * GET /fx-quotes/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getFxQuote(string $id): ?string
    {
        $response = $this->httpClient->get('/fx-quotes/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Book FX quote
     *
     * POST /fx-quotes/{id}/book
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function bookFxQuote(string $id): ?string
    {
        $response = $this->httpClient->post("/fx-quotes/{$id}/book");

        return $this->httpClient->response($response);
    }

    /**
     * Cancel FX quote
     *
     * POST /fx-quotes/{id}/cancel
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function cancelFxQuote(string $id): ?string
    {
        $response = $this->httpClient->post("/fx-quotes/{$id}/cancel");

        return $this->httpClient->response($response);
    }

    /**
     * Create international wire
     *
     * POST /transfers/international-wire
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/international-wire', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get international wire
     *
     * GET /transfers/international-wire/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/international-wire/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * List international wires
     *
     * GET /transfers/international-wire
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/international-wire', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Return an international wire
     *
     * POST /transfers/international-wire/{id}/return
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function returnWire(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/international-wire/{$id}/return", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Cancel an international wire
     *
     * POST /transfers/international-wire/{id}/cancel
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function cancel(string $id): ?string
    {
        $response = $this->httpClient->post("/transfers/international-wire/{$id}/cancel");

        return $this->httpClient->response($response);
    }

    /**
     * Get tracking for an international wire
     *
     * GET /transfers/international-wire/{id}/tracking
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function tracking(string $id): ?string
    {
        $response = $this->httpClient->get("/transfers/international-wire/{$id}/tracking");

        return $this->httpClient->response($response);
    }

    /**
     * Create an amendment for an international wire
     *
     * POST /transfers/international-wire/{id}/amendments
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createAmendment(string $id, array $data): ?string
    {
        $response = $this->httpClient->post("/transfers/international-wire/{$id}/amendments", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
