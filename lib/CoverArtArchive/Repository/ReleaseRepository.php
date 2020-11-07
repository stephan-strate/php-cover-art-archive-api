<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Model\Release;

class ReleaseRepository extends DefaultRepository
{
    public function coverArtBack($mbid, $size = null)
    {
        return $this->getApi()->coverArtBack($mbid, $size);
    }

    public function getApi()
    {
        return $this->client->release();
    }

    public function getClass()
    {
        return new Release();
    }
}