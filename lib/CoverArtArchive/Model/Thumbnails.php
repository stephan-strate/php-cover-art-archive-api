<?php

namespace CoverArtArchive\Model;

/**
 * Class Thumbnails
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Thumbnails
{
    /**
     * @var string
     * @name 1200
     */
    public $high;

    /**
     * @var string
     * @name 500
     */
    public $medium;

    /**
     * @var string
     * @name 250
     */
    public $low;
}