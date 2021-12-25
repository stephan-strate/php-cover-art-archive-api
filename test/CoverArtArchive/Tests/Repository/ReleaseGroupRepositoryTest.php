<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Tests\Repository
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 1.0.1
 */

namespace CoverArtArchive\Tests\Repository;

use CoverArtArchive\Api\ReleaseGroup;
use CoverArtArchive\Repository\ReleaseGroupRepository;

class ReleaseGroupRepositoryTest extends TestCase
{
    public function testCoverArt()
    {
        $mbid = '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f';

        $repo = $this->getRepoMock('coverArt', []);
        $repo->coverArt($mbid);
    }

    public function testCoverArtId()
    {
        $mbid = '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f';

        $repo = $this->getRepoMock('coverArtId', base64_decode('R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs='));
        $repo->coverArtId($mbid, 'front');
    }

    public function testCoverArtFront()
    {
        $mbid = '7e2dd507-6dde-3b1f-9c9c-82723dfeed0f';

        $repo = $this->getRepoMock('coverArtFront', base64_decode('R0lGODdhAQABAPAAAP8AAAAAACwAAAAAAQABAAACAkQBADs='));
        $repo->coverArtFront($mbid);
    }

    protected function getRepositoryClass(): string
    {
        return ReleaseGroupRepository::class;
    }

    protected function getApiClass(): string
    {
        return ReleaseGroup::class;
    }
}
