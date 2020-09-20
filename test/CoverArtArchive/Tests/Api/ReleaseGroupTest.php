<?php

namespace CoverArtArchive\Tests\Api;

use CoverArtArchive\Client;
use PHPUnit\Framework\TestCase;

final class ReleaseGroupTest extends TestCase
{
    public function testCoverArt()
    {
        $client = new Client();
        $response = $client->releaseGroup()->coverArt('19e6209b-2ddc-30b8-9273-484bd075fe7b');
        var_dump($response);
    }
}