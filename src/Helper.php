<?php

namespace AlloyLab\ColumnBank;

use Psr\Http\Message\ResponseInterface;

/**
 * Helper Functions
 */
final readonly class Helper
{
    /**
     * Formatted Response
     *
     * @param ResponseInterface $response
     * @return string
     */
    public static function formattedResponse(ResponseInterface $response): string
    {
        $rawBody = $response->getBody()->getContents();
        $decoded = json_decode($rawBody, true); // array|null


        if (is_array($decoded)) {
            $responseFormat = $decoded;
            $responseFormat['status_code'] = $response->getStatusCode();
        } else {
            $responseFormat = [
                'status'   => 500,
                'raw_body' => $rawBody,
            ];
        }

        $json = json_encode($responseFormat);

        if ($json !== false && json_validate($json)) {
            return $json;
        } else {
            return json_encode([
                'status'      => 'encode_error',
                'status_code' => $response->getStatusCode(),
            ]) ?: '{"status":"encode_error"}';
        }
    }
}
