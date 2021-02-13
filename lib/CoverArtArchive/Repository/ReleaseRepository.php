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
 * Specific repository implementation for single release.
 * @package CoverArtArchive\Repository
 * @extends DefaultRepository<Release>
 */
class ReleaseRepository extends DefaultRepository
{
    /**
     * Fetch the image that is most suitable to be called the "back" cover art.
     * @param string    $mbid   MusicBrainz identifier
     * @param ?int      $size   width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return Release
     */
    public function coverArtBack(string $mbid, ?int $size = null): Release
    {
        $response = $this->getApi()->coverArtBack($mbid, $size);
        return $this->mapResponse($response);
    }

    /**
     * {@inheritdoc}
     * @return \CoverArtArchive\Api\Release
     */
    public function getApi(): \CoverArtArchive\Api\Release
    {
        return $this->client->release();
    }

    /**
     * {@inheritdoc}
     * @return Release
     */
    public function getClass(): Release
    {
        return new Release();
    }
}
