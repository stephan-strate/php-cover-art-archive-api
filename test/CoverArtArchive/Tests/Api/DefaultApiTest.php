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

use CoverArtArchive\Model\CoverArtSize;

class DefaultApiTest extends TestCase
{
    public function testCoverArt()
    {
        $expected = ['images' => [], 'release' => '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->path() . '/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $api->coverArt('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    public function testCoverArtId()
    {
        $expected = 'R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs=';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->path() . '/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/front')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $api->coverArtId('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f', 'front'));
    }

    public function testCoverArtIdSize()
    {
        $expected = 'R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs=';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->path() . '/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/front-250')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $api->coverArtId('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f', 'front', CoverArtSize::Small));
    }

    public function testCoverArtFront()
    {
        $expected = 'R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs=';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->path() . '/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/front')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $api->coverArtFront('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    protected function path(): string
    {
        return 'test';
    }

    protected function getApiClass(): string
    {
        return TestApi::class;
    }
}
