<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Sandbox Simulation endpoints
 */
final readonly class Simulation
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    public function receiveAchCredit(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/ach/credit', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveAchDebit(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/ach/debit', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveWire(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/wire', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveInternationalWire(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/international-wire', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveWireDrawdownRequest(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/wire-drawdown', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveWireReturnRequest(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/wire-return-request', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveRealtimeTransfer(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/realtime-transfer', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function receiveRealtimeRfp(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/realtime-rfp', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function settleAchTransfer(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/ach/settle', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function settleWireTransfer(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/wire/settle', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function settleCheckDeposit(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/checks/settle', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    public function depositIssuedCheck(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/checks/deposit', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Simulate creating a tax form
     *
     * POST /simulate/tax-forms
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createTaxForm(array $data): ?string
    {
        $response = $this->httpClient->post('/simulate/tax-forms', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }
}
