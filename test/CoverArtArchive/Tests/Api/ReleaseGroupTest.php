<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Api\ReleaseGroup;
use CoverArtArchive\Exception\NotImplementedException;

final class ReleaseGroupTest extends TestCase
{
    public function testCoverArtId()
    {
        $this->expectException(NotImplementedException::class);

        $api = $this->getApiMock();
        $api->coverArtId('7e2dd507-6dde-3b1f-9c9c-82723dfeed0f', '1');
    }

    protected function getApiClass(): string
    {
        return ReleaseGroup::class;
    }
}