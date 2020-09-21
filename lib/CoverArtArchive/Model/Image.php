<?php

namespace CoverArtArchive\Model;

/**
 * Class Image
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Image
{
    /**
     * Whether the image was approved by the musicbrainz edit system.
     * @var bool
     */
    public $approved;

    /**
     * Indicates if this is the "main back".
     * @var bool
     */
    public $back;

    /**
     * A free text comment.
     * @var string
     */
    public $comment;

    /**
     * The edit id on musicbrainz.
     * @var int
     */
    public $edit;

    /**
     * Indicates if this is the "main front".
     * @var bool
     */
    public $front;

    /**
     * Archive.org's interval file id.
     * @var int
     */
    public $id;

    /**
     * The full coverartarchive.org url to the original image.
     * @var string
     */
    public $image;

    /**
     * Object containing
     * @var Thumbnails
     */
    public $thumbnails;

    /**
     * List of zero or more types for the image.
     * @var string[]
     */
    public $types;
}