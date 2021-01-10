<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Api\Release;

final class ReleaseTest extends TestCase
{
    public function testCoverArtBack()
    {
        $expectedArray = ['images' => [], 'release' => '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('release/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/back')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArtBack('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    protected function getApiClass(): string
    {
        return Release::class;
    }
}
