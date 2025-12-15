<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Tax Forms endpoints
 */
final readonly class TaxForms
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Get a tax form
     *
     * GET /tax-forms/{tax_form_id}
     *
     * @param string $taxFormId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $taxFormId): ?string
    {
        $response = $this->httpClient->get('/tax-forms/'.$taxFormId);

        return $this->httpClient->response($response);
    }

    /**
     * Schedule mailing
     *
     * POST /tax-forms/{tax_form_id}/mail
     *
     * @param string $taxFormId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function scheduleMailing(string $taxFormId): ?string
    {
        $response = $this->httpClient->post("/tax-forms/{$taxFormId}/mail");

        return $this->httpClient->response($response);
    }

    /**
     * Cancel scheduled mailing
     *
     * POST /tax-forms/{tax_form_id}/cancel-mail
     *
     * @param string $taxFormId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function cancelMailing(string $taxFormId): ?string
    {
        $response = $this->httpClient->post("/tax-forms/{$taxFormId}/cancel-mail");

        return $this->httpClient->response($response);
    }

    /**
     * List tax forms
     *
     * GET /tax-forms
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/tax-forms', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
