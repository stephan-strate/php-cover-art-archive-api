<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Exception\NotImplementedException;
use CoverArtArchive\Model\Release;

class ReleaseGroupRepository extends DefaultRepository
{
    public function coverArtId($mbid, $id, $size = null)
    {
        throw new NotImplementedException();
    }

    public function getApi()
    {
        return $this->client->releaseGroup();
    }

    public function getClass()
    {
        return new Release();
    }
}