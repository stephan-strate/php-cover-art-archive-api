<?php

namespace CoverArtArchive\Api;

use CoverArtArchive\Client;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($path)
    {
        $response = $this->client
            ->getHttpClient()
            ->get($path);

        return self::getContent($response);
    }

    /**
     * @param ResponseInterface $response
     * @param bool              $asArray
     * @return mixed|string
     */
    protected static function getContent(ResponseInterface $response, bool $asArray = false)
    {
        $body = (string) $response->getBody();
        if (strpos($response->getHeaderLine('Content-Type'), 'application/json') === 0) {
            $content = json_decode($body, $asArray);
            if (JSON_ERROR_NONE === json_last_error()) {
                return $content;
            }
        }

        return $body;
    }
}