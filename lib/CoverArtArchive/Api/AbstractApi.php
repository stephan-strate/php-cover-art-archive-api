<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Api
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Api;

use CoverArtArchive\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AbstractApi
 * @package CoverArtArchive\Api
 */
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

    /**
     * Performs get request and parses the content.
     * @param $path
     * @return mixed|string
     * @throws \Http\Client\Exception
     */
    public function get($path)
    {
        $response = $this->client
            ->getHttpClient()
            ->get($path);

        return self::getContent($response);
    }

    /**
     * Decode content from response. Regularly decodes json content from response, when
     * available.
     * @param ResponseInterface $response   response
     * @param bool              $asArray    decode as array
     * @return mixed|string                 decoded response
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
