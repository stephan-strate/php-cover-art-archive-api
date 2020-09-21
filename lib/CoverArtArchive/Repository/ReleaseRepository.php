<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Model\Release;

class ReleaseRepository extends DefaultRepository
{
    public function getApi()
    {
        return $this->client->release();
    }

    public function getClass()
    {
        return new Release();
    }
}