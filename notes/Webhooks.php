<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Webhooks endpoints
 */
final readonly class Webhooks
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Create webhook endpoint
     *
     * POST /webhooks
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function create(array $data): ?string
    {
        $response = $this->httpClient->post('/webhooks', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List webhook endpoints
     *
     * GET /webhooks
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/webhooks', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get webhook endpoint
     *
     * GET /webhooks/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/webhooks/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Update webhook endpoint
     *
     * PATCH /webhooks/{id}
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function update(string $id, array $data): ?string
    {
        $response = $this->httpClient->patch('/webhooks/'.$id, [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Delete webhook endpoint
     *
     * DELETE /webhooks/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function delete(string $id): ?string
    {
        $response = $this->httpClient->delete('/webhooks/'.$id);

        return $this->httpClient->response($response);
    }

    /**
     * Verify webhook endpoint
     *
     * POST /webhooks/{id}/verify
     *
     * @param string $id
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function verify(string $id, array $data = []): ?string
    {
        $response = $this->httpClient->post("/webhooks/{$id}/verify", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List webhook deliveries
     *
     * GET /webhooks/{id}/deliveries
     *
     * @param string $id
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listDeliveries(string $id, array $query = []): ?string
    {
        $response = $this->httpClient->get("/webhooks/{$id}/deliveries", [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List deliveries by event
     *
     * GET /events/{event_id}/deliveries
     *
     * @param string $eventId
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listDeliveriesByEvent(string $eventId, array $query = []): ?string
    {
        $response = $this->httpClient->get("/events/{$eventId}/deliveries", [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
