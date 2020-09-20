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
     * @return mixed
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease.2F.7Bmbid.7D.2F
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease-group.2F.7Bmbid.7D.2F
     */
    public function coverArt($mbid)
    {
        return (string) $this->client->getHttpClient()->get($this->entityType . '/' . $mbid)->getBody();
    }

    public function coverArtFront($mbid)
    {

    }
}