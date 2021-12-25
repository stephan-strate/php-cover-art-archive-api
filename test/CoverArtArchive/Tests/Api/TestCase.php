<?php

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
