<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Model
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Model;

/**
 * Single image model with additional properties.
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Image
{
    /**
     * Whether the image was approved by the musicbrainz edit system.
     * @var bool
     */
    public bool $approved;

    /**
     * Indicates if this is the "main back".
     * @var bool
     */
    public bool $back;

    /**
     * A free text comment.
     * @var string
     */
    public string $comment;

    /**
     * The edit id on musicbrainz.
     * @var int
     */
    public int $edit;

    /**
     * Indicates if this is the "main front".
     * @var bool
     */
    public bool $front;

    /**
     * Archive.org's interval file id.
     * @var int
     */
    public int $id;

    /**
     * The full coverartarchive.org url to the original image.
     * @var string
     */
    public string $image;

    /**
     * Object containing different sizes of images.
     * @var Thumbnails
     */
    public Thumbnails $thumbnails;

    /**
     * List of zero or more types for the image.
     * @var array<string>
     */
    public array $types;
}
