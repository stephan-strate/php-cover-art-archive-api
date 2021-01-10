<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Model\CoverArtSize;

final class DefaultTest extends TestCase
{
    public function testCoverArt()
    {
        $expectedArray = ['images' => [], 'release' => '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('test/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArt('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    public function testCoverArtId()
    {
        $expectedArray = [];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('test/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/1')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArtId('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f', '1'));
    }

    public function testCoverArtIdSize()
    {
        $expectedArray = [];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('test/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/1-250')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArtId('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f', '1',
            CoverArtSize::Small));
    }

    public function testCoverArtFront()
    {
        $expectedArray = ['images' => [], 'release' => '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('test/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/front')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArtFront('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    protected function getApiClass(): string
    {
        return TestApi::class;
    }
}