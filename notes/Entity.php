<?php

namespace App\Services\Banking\Column\API;

use App\Services\Http\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Entity (Person / Business) Endpoints
 */
final readonly class Entity
{
    protected httpClient $httpClient;

    public function __construct(httpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Create a person entity
     *
     * POST /entities/person
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createPerson(array $data): ?string
    {
        $response = $this->httpClient->post('/entities/person', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create a business entity
     *
     * POST /entities/business
     *
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createBusiness(array $data): ?string
    {
        $response = $this->httpClient->post('/entities/business', [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List entities
     *
     * GET /entities
     *
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function list(array $query = []): ?string
    {
        $response = $this->httpClient->get('/entities', [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get an entity
     *
     * GET /entities/{entity_id}
     *
     * @param string $entityId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function get(string $entityId): ?string
    {
        $response = $this->httpClient->get('/entities/'.$entityId);

        return $this->httpClient->response($response);
    }

    /**
     * Update an entity
     *
     * PATCH /entities/{entity_id}
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function update(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->patch('/entities/'.$entityId, [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Delete an entity
     *
     * DELETE /entities/{entity_id}
     *
     * @param string $entityId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function delete(string $entityId): ?string
    {
        $response = $this->httpClient->delete('/entities/'.$entityId);

        return $this->httpClient->response($response);
    }

    /**
     * Create associated person
     *
     * POST /entities/{entity_id}/associated-persons
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createAssociatedPerson(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/associated-persons", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List associated persons
     *
     * GET /entities/{entity_id}/associated-persons
     *
     * @param string $entityId
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listAssociatedPersons(string $entityId, array $query = []): ?string
    {
        $response = $this->httpClient->get("/entities/{$entityId}/associated-persons", [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Update associated persons
     *
     * PATCH /entities/{entity_id}/associated-persons
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function updateAssociatedPersons(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->patch("/entities/{$entityId}/associated-persons", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create File Evidence
     *
     * POST /entities/{entity_id}/evidence
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createFileEvidence(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/evidence", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create Evidence with Upload
     *
     * POST /entities/{entity_id}/evidence/upload
     *
     * @param string $entityId
     * @param array $multipart
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createEvidenceWithUpload(string $entityId, array $multipart): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/evidence/upload", [
            'multipart' => $multipart,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create Signature Evidence
     *
     * POST /entities/{entity_id}/evidence/signature
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createSignatureEvidence(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/evidence/signature", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Create Third-Party Evidence
     *
     * POST /entities/{entity_id}/evidence/third-party
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function createThirdPartyEvidence(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/evidence/third-party", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * List Evidence
     *
     * GET /entities/{entity_id}/evidence
     *
     * @param string $entityId
     * @param array $query
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function listEvidence(string $entityId, array $query = []): ?string
    {
        $response = $this->httpClient->get("/entities/{$entityId}/evidence", [
            'query' => $query,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get Compliance
     *
     * GET /entities/{entity_id}/compliance
     *
     * @param string $entityId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getCompliance(string $entityId): ?string
    {
        $response = $this->httpClient->get("/entities/{$entityId}/compliance");

        return $this->httpClient->response($response);
    }

    /**
     * Submit Additional Requirements
     *
     * POST /entities/{entity_id}/requirements
     *
     * @param string $entityId
     * @param array $data
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function submitAdditionalRequirements(string $entityId, array $data): ?string
    {
        $response = $this->httpClient->post("/entities/{$entityId}/requirements", [
            'form_params' => $data,
        ]);

        return $this->httpClient->response($response);
    }

    /**
     * Get Additional Requirements
     *
     * GET /entities/{entity_id}/requirements
     *
     * @param string $entityId
     * @return ?string
     *
     * @throws GuzzleException
     */
    public function getAdditionalRequirements(string $entityId): ?string
    {
        $response = $this->httpClient->get("/entities/{$entityId}/requirements");

        return $this->httpClient->response($response);
    }
}
