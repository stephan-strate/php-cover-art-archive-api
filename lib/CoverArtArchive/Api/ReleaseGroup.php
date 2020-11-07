<?php

namespace CoverArtArchive\Api;

use CoverArtArchive\Exception\NotImplementedException;

class ReleaseGroup extends DefaultApi
{
    protected $entityType = 'release-group';

    public function coverArtId($mbid, $id, $size = null)
    {
        throw new NotImplementedException();
    }
}