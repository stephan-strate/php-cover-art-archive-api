<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Repository
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Repository;

use CoverArtArchive\Api\ReleaseGroup;
use CoverArtArchive\Model\Release;

/**
 * Specific repository implementation for release groups.
 * @package CoverArtArchive\Repository
 * @extends DefaultRepository<Release>
 */
class ReleaseGroupRepository extends DefaultRepository
{
    /**
     * {@inheritdoc}
     * @return ReleaseGroup
     */
    public function getApi(): ReleaseGroup
    {
        return $this->client->releaseGroup();
    }

    /**
     * {@inheritdoc}
     */
    public function getClass(): string
    {
        return Release::class;
    }
}
