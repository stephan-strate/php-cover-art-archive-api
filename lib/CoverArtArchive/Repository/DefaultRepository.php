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

use CoverArtArchive\Api\DefaultApi;

/**
 * CoverArtArchive offers different endpoints with similar parameters
 * and options. They all differ from the requested entity type.
 * This is the default implementation for all endpoints.
 * @package CoverArtArchive\Repository
 * @template T
 * @extends AbstractRepository<T>
 */
abstract class DefaultRepository extends AbstractRepository
{
    /**
     * Fetches listing of available cover art for given MusicBrainz identifier.
     * @param string $mbid  MusicBrainz identifier
     * @return T
     */
    public function coverArt(string $mbid)
    {
        $response = $this->getApi()->coverArt($mbid);
        return $this->mapResponse($response);
    }

    /**
     * Fetch specific piece of artwork. The possible id values can be found by parsing the
     * response of {@link \CoverArtArchive\Repository\DefaultRepository::coverArt()}.
     * @param string    $mbid   MusicBrainz identifier
     * @param string    $id     unique id of specific artwork
     * @param ?int      $size   width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return resource|false   image resource
     */
    public function coverArtId(string $mbid, string $id, ?int $size = null)
    {
        $response = $this->getApi()->coverArtId($mbid, $id, $size);
        return imagecreatefromstring($response);
    }

    /**
     * Fetch the image that is most suitable to be called the "front" cover art.
     * @param string $mbid  MusicBrainz identifier
     * @param ?int $size    width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return false|resource   image resource
     */
    public function coverArtFront(string $mbid, ?int $size = null)
    {
        $response = $this->getApi()->coverArtFront($mbid, $size);
        return imagecreatefromstring($response);
    }

    /**
     * {@inheritdoc}
     * @return DefaultApi
     */
    abstract public function getApi(): DefaultApi;
}
