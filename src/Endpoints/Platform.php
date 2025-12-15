<?php

namespace AlloyLab\ColumnBank\Endpoints;

use AlloyLab\ColumnBank\Helper;
use Exception;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Platform Endpoints
 */
final readonly class Platform
{
    protected HttpClient $httpClient;

    /**
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Get a platform
     *
     * GET /dashboard/platforms/{id}
     *
     * @see Not-Documented
     *
     * @param  string  $id
     * @return string
     *
     * @noinspection PhpUnused
     */
    public function get(string $id, string $sessionId): string
    {
        try {
            $jar = CookieJar::fromArray([
                'session_id' => $sessionId,
            ], '.column.com');

            $response = $this->httpClient->get('/dashboard/platforms/'.$id, [
                'cookies' => $jar,
                'headers' => [
                    'platform-id' => $id,
                ]
            ]);

            return Helper::formattedResponse($response);
        } catch (Exception|GuzzleException $e) {
            return $e->getMessage();
        }
    }
}
