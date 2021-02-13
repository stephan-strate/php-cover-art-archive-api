<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive;

use CoverArtArchive\Api\AbstractApi;
use CoverArtArchive\Api\Release;
use CoverArtArchive\Api\ReleaseGroup;
use CoverArtArchive\HttpClient\Builder;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Psr\Http\Client\ClientInterface;

/**
 * CoverArtArchive api client.
 * @method Release release()
 * @method ReleaseGroup releaseGroup()
 * @package CoverArtArchive
 */
class Client
{
    /**
     * CoverArtArchive base uri.
     * @link https://beta.musicbrainz.org/doc/Cover_Art_Archive/API
     */
    const BASE_URI = 'https://coverartarchive.org';

    /**
     * Customized http client with plugins.
     * @var Builder
     */
    private Builder $httpClientBuilder;

    /**
     * Create api client with default builder or provide base builder.
     * @param \CoverArtArchive\HttpClient\Builder|null $httpClientBuilder
     */
    public function __construct(Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder();

        $uriInterface = Psr17FactoryDiscovery::findUriFactory()->createUri(self::BASE_URI);
        $this->httpClientBuilder->addPlugin(new AddHostPlugin($uriInterface));
        $this->httpClientBuilder->addPlugin(new RedirectPlugin());

        $this->httpClientBuilder->addHeaders([
            'Accept' => 'application/json',
        ]);
    }

    /**
     * Get api instance by name.
     * @param string $name  api name
     * @return AbstractApi  api instance
     */
    public function api(string $name): AbstractApi
    {
        switch ($name) {
            case 'release':
                return new Release($this);

            case 'releaseGroup':
            case 'release-group':
                return new ReleaseGroup($this);

            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }
    }

    /**
     * Publish api instances as implicit class functions.
     * @param string $name  api name
     * @param mixed  $args
     * @return AbstractApi  api instance
     */
    public function __call(string $name, $args): AbstractApi
    {
        return $this->api($name);
    }

    /**
     * Get the configured http client to perform requests.
     * @return \Http\Client\Common\HttpMethodsClientInterface
     */
    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    /**
     * Create api client with predefined http client.
     * Can eg. be used for mocking in tests.
     * @param \Psr\Http\Client\ClientInterface $httpClient
     * @return \CoverArtArchive\Client
     */
    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new Builder($httpClient);
        return new self($builder);
    }
}
