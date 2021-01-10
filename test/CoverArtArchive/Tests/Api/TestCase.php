<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Client;
use PHPUnit\Framework\MockObject\MockObject;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract protected function getApiClass(): string;

    /**
     * @return MockObject
     */
    protected function getApiMock(): MockObject
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

    /**
     * @param $object
     * @param $methodName
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected function getMethod($object, $methodName): \ReflectionMethod
    {
        $method = new \ReflectionMethod($object, $methodName);
        $method->setAccessible(true);

        return $method;
    }
}