<?php

namespace CoverArtArchive\Repository;

abstract class DefaultRepository extends AbstractRepository
{
    public function coverArt($mbid)
    {
        $response = $this->getApi()->coverArt($mbid);
        return $this->mapper->map($response, $this->getClass());
    }
}