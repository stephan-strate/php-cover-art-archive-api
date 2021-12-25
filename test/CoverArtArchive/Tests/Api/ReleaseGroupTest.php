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
