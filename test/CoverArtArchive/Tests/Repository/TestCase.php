<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Tests\Repository
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 1.0.1
 */

namespace CoverArtArchive\Tests\Repository;

use CoverArtArchive\Client;
use PHPUnit\Framework\MockObject\MockObject;

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    abstract protected function getApiClass(): string;

    abstract protected function getRepositoryClass(): string;

    protected function getRepoMock(string $method, $value): MockObject
    {
        $mock = $this->getMockBuilder($this->getRepositoryClass())
            ->onlyMethods(['getApi'])
            ->setConstructorArgs([new Client()])
            ->getMock();
        $mock->expects($this->once())
            ->method('getApi')
            ->will($this->returnValue($this->getApiMock($method, $value)));

        return $mock;
    }

    protected function getApiMock(string $method, $value): MockObject
    {
        $mock = $this->getMockBuilder($this->getApiClass())
            ->onlyMethods([$method])
            ->setConstructorArgs([new Client()])
            ->getMock();
        $mock->expects($this->once())
            ->method($method)
            ->willReturn($value);

        return $mock;
    }
}
