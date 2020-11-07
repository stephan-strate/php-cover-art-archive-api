<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Client;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract protected function getApiClass();

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject
     */
    protected function getApiMock()
    {
        $httpClient = $this->getMockBuilder(\Http\Client\HttpClient::class)
            ->setMethods(['sendRequest'])
            ->getMock();
        $httpClient
            ->expects($this->any())
            ->method('sendRequest');

        $client = Client::createWithHttpClient($httpClient);

        return $this->getMockBuilder($this->getApiClass())
            ->setMethods(['get', 'post', 'postRaw', 'patch', 'delete', 'put', 'head'])
            ->setConstructorArgs([$client])
            ->getMock();
    }

    protected function getMethod($object, $methodName)
    {
        $method = new \ReflectionMethod($object, $methodName);
        $method->setAccessible(true);

        return $method;
    }
}