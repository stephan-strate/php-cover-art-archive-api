<?php

namespace CoverArtArchive\Repository;

abstract class DefaultRepository extends AbstractRepository
{
    public function coverArt($mbid)
    {
        $response = $this->getApi()->coverArt($mbid);
        return $this->mapper->map($response, $this->getClass());
    }

    public function coverArtId($mbid, $id, $size = null)
    {
        return $this->getApi()->coverArtId($mbid, $id, $size);
    }

    public function coverArtFront($mbid, $size = null)
    {
        return $this->getApi()->coverArtFront($mbid, $size);
    }
}