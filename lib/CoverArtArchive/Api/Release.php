<?php

namespace CoverArtArchive\Api;

class Release extends DefaultApi
{
    protected $entityType = 'release';

    public function coverArtBack($mbid, $size = null)
    {
        return $this->coverArtId($mbid, 'back', $size);
    }
}