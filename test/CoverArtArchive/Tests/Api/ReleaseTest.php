<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Tests\Api
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 1.0.1
 */

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
