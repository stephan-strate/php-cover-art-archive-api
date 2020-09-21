<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Model\Release;

class ReleaseGroupRepository extends DefaultRepository
{
    public function getApi()
    {
        return $this->client->releaseGroup();
    }

    public function getClass()
    {
        return new Release();
    }
}