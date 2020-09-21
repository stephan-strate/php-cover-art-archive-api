<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Client;
use CoverArtArchive\Repository\ReleaseGroupRepository;
use PHPUnit\Framework\TestCase;

final class ReleaseGroupTest extends TestCase
{
    public function testCoverArt()
    {
        $client = new Client();
        $releaseGroup = new ReleaseGroupRepository($client);
        $response = $releaseGroup->coverArt('19e6209b-2ddc-30b8-9273-484bd075fe7b');

        var_dump($response);
    }
}