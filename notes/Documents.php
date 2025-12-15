<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Documents endpoints
 */
final readonly class Documents
{
    public function __construct(
        protected HttpClient $httpClient
    ) {
    }

    /**
     * Upload a document
     *
     * POST /documents
     *
     * @param array $multipart
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function upload(array $multipart): ?string
    {
        $response = $this->httpClient->post('/documents', [
            'multipart' => $multipart,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get a document
     *
     * GET /documents/{document_id}
     *
     * @param string $documentId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $documentId): ?string
    {
        $response = $this->httpClient->get('/documents/'.$documentId);

        return $this->httpClient->response($response);
    }

    /**
     * List documents
     *
     * GET /documents
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/documents', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }
}
