<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Check transfer endpoints
 */
final readonly class CheckTransfer
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Issue a check
     *
     * POST /transfers/checks/issue
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function issue(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/checks/issue', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Preview a check
     *
     * GET /transfers/checks/{id}/preview
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function preview(string $id): ?string
    {
        $response = $this->httpClient->get("/transfers/checks/{$id}/preview");

        return $this->httpClient->response($response);
    }

    /**
     * Get a check transfer
     *
     * GET /transfers/checks/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/transfers/checks/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * List check transfers
     *
     * GET /transfers/checks
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/transfers/checks', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Stop a check
     *
     * POST /transfers/checks/{id}/stop
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function stop(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/transfers/checks/{$id}/stop", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Deposit a check
     *
     * POST /transfers/checks/deposit
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function deposit(array $data): ?string
    {
        $response = $this->httpClient->post('/transfers/checks/deposit', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Capture front of check image
     *
     * POST /transfers/checks/deposit/front
     *
     * @param array $multipart
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function captureFront(array $multipart): ?string
    {
        $response = $this->httpClient->post('/transfers/checks/deposit/front', [
            'multipart' => $multipart,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Capture back of check image
     *
     * POST /transfers/checks/deposit/back
     *
     * @param array $multipart
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function captureBack(array $multipart): ?string
    {
        $response = $this->httpClient->post('/transfers/checks/deposit/back', [
            'multipart' => $multipart,
        ]);

        return $this->httpClient->response($response);
    }
}
