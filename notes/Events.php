<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Events endpoints
 */
final readonly class Events
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * List all events
     *
     * GET /events
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/events', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List webhook events
     *
     * GET /events/webhooks
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listWebhookEvents(array $query = []): ?string
    {
        $response = $this->httpClient->get('/events/webhooks', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get an event
     *
     * GET /events/{id}
     *
     * @param string $id
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $id): ?string
    {
        $response = $this->httpClient->get('/events/'.$id);

        return $this->httpClient->response($response);
    }
}
