<?php

namespace CoverArtArchive\Api;

/**
 * Class DefaultApi
 * @package CoverArtArchive\Api
 * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API
 */
abstract class DefaultApi extends AbstractApi
{
    /**
     * @var string
     */
    protected $entityType;

    /**
     * @param $mbid
     * @return mixed|string
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease.2F.7Bmbid.7D.2F
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease-group.2F.7Bmbid.7D.2F
     */
    public function coverArt($mbid)
    {
        return $this->get($this->entityType . '/' . $mbid);
    }

    /**
     *
     * @param      $mbid
     * @param      $id
     * @param null $size
     * @return mixed|string
     */
    public function coverArtId($mbid, $id, $size = null)
    {
        $sizeFormatted = $size !== null ? '-' . $size : '';
        return $this->get($this->entityType . '/' . $mbid . '/' . $id . $sizeFormatted);
    }

    /**
     * @param      $mbid
     * @param null $size
     * @return mixed|string
     */
    public function coverArtFront($mbid, $size = null)
    {
        return $this->coverArtId($mbid, 'front', $size);
    }
}
