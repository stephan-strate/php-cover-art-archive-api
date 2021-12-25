<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Api\ReleaseGroup;

final class ReleaseGroupTest extends DefaultApiTest
{
    protected function path(): string
    {
        return 'release-group';
    }

    protected function getApiClass(): string
    {
        return ReleaseGroup::class;
    }
}
