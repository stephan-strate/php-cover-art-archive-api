<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Api
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Api;

/**
 * CoverArtArchive offers different endpoints with similar parameters
 * and options. They all differ from the requested entity type.
 * This is the default implementation for all endpoints.
 * @package CoverArtArchive\Api
 * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API
 */
abstract class DefaultApi extends AbstractApi
{
    /**
     * Requested entity type.
     * @var string
     */
    protected string $entityType;

    /**
     * Fetches listing of available cover art for given MusicBrainz identifier.
     * @param string $mbid  MusicBrainz identifier
     * @return mixed|string
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease.2F.7Bmbid.7D.2F
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease-group.2F.7Bmbid.7D.2F
     */
    public function coverArt(string $mbid)
    {
        return $this->get($this->entityType . '/' . $mbid);
    }

    /**
     * Fetch specific piece of artwork. The possible id values can be found by parsing the
     * response of {@link \CoverArtArchive\Api\DefaultApi::coverArt()}.
     * @param string    $mbid   MusicBrainz identifier
     * @param string    $id     unique id of specific artwork
     * @param ?int      $size   width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return mixed|string
     */
    public function coverArtId(string $mbid, string $id, ?int $size = null)
    {
        $sizeFormatted = $size !== null ? '-' . $size : '';
        return $this->get($this->entityType . '/' . $mbid . '/' . $id . $sizeFormatted);
    }

    /**
     * Fetch the image that is most suitable to be called the "front" cover art.
     * @param string    $mbid   MusicBrainz identifier
     * @param ?int      $size   width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return mixed|string
     */
    public function coverArtFront(string $mbid, ?int $size = null)
    {
        return $this->coverArtId($mbid, 'front', $size);
    }
}
