<?php

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
