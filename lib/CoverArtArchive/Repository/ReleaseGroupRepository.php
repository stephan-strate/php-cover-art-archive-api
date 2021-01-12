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

use CoverArtArchive\Exception\NotImplementedException;
use CoverArtArchive\Model\Release;

/**
 * Class ReleaseGroupRepository
 * @package CoverArtArchive\Repository
 */
class ReleaseGroupRepository extends DefaultRepository
{
    /**
     * @param      $mbid
     * @param      $id
     * @param null $size
     * @return array|mixed|object|void
     */
    public function coverArtId($mbid, $id, $size = null)
    {
        throw new NotImplementedException();
    }

    /**
     * @return \CoverArtArchive\Api\ReleaseGroup
     */
    public function getApi()
    {
        return $this->client->releaseGroup();
    }

    /**
     * @return Release
     */
    public function getClass()
    {
        return new Release();
    }
}
