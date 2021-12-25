<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Tests\Api
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 1.0.1
 */

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Client;
use Http\Client\HttpClient;
use PHPUnit\Framework\MockObject\MockObject;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract protected function getApiClass(): string;

    protected function getApiMock(): MockObject
    {
        $httpClient = $this->getMockBuilder(HttpClient::class)
            ->onlyMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $client = Client::createWithHttpClient($httpClient);

        return $this->getMockBuilder($this->getApiClass())
            ->onlyMethods(['get'])
            ->setConstructorArgs([$client])
            ->getMock();
    }
}
