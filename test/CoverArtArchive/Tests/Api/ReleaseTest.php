<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Api\Release;

final class ReleaseTest extends DefaultApiTest
{
    public function testCoverArtBack()
    {
        $expected = 'R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs=';

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with($this->path() . '/7e2dd507-6dde-3b1f-9c9c-82723dfeed0f/back')
            ->will($this->returnValue($expected));

        $this->assertEquals($expected, $api->coverArtBack('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f'));
    }

    protected function path(): string
    {
        return 'release';
    }

    protected function getApiClass(): string
    {
        return Release::class;
    }
}
