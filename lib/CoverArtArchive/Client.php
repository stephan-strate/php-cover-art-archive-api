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

use CoverArtArchive\Api\Release;
use CoverArtArchive\Api\ReleaseGroup;
use CoverArtArchive\HttpClient\Builder;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Client\HttpClient;
use Http\Discovery\UriFactoryDiscovery;

/**
 * Class Client
 * @method Release release()
 * @method ReleaseGroup releaseGroup()
 * @package CoverArtArchive
 */
class Client
{
    /**
     *
     */
    const BASE_URI = 'https://coverartarchive.org';

    /**
     * @var Builder
     */
    private $httpClientBuilder;

    public function __construct(Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new Builder();

        $this->httpClientBuilder->addPlugin(new AddHostPlugin(UriFactoryDiscovery::find()->createUri(self::BASE_URI)));
        $this->httpClientBuilder->addPlugin(new RedirectPlugin());
        $this->httpClientBuilder->addHeaders([
            'Accept' => 'application/json',
        ]);
    }

    public function api($name)
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

    public function __call($name, $args)
    {
        return $this->api($name);
    }

    public function getHttpClient()
    {
        return $this->httpClientBuilder->getHttpClient();
    }

    public function getHttpClientBuilder()
    {
        return $this->httpClientBuilder;
    }

    public static function createWithHttpClient(HttpClient $httpClient)
    {
        $builder = new Builder($httpClient);
        return new self($builder);
    }
}
