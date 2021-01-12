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

use CoverArtArchive\Model\Release;

/**
 * Class ReleaseRepository
 * @package CoverArtArchive\Repository
 */
class ReleaseRepository extends DefaultRepository
{
    /**
     * @param      $mbid
     * @param null $size
     * @return mixed|string
     * @throws \Http\Client\Exception
     */
    public function coverArtBack($mbid, $size = null)
    {
        return $this->getApi()->coverArtBack($mbid, $size);
    }

    /**
     * @return \CoverArtArchive\Api\Release
     */
    public function getApi()
    {
        return $this->client->release();
    }

    /**
     * @return Release
     */
    public function getClass()
    {
        return new Release();
    }
}
