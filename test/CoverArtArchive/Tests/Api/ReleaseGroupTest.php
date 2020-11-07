<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Api\ReleaseGroup;

final class ReleaseGroupTest extends TestCase
{
    public function testCoverArt()
    {
        $expectedArray = [];

        $api = $this->getApiMock();
        $api->expects($this->once())
            ->method('get')
            ->with('release-group/test')
            ->will($this->returnValue($expectedArray));

        $this->assertEquals($expectedArray, $api->coverArt('test'));
    }

    protected function getApiClass()
    {
        return ReleaseGroup::class;
    }
}