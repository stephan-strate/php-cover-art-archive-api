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

// keep this import, used in phpdoc to deserialize numeric keys
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * Thumbnails model. Represents different sizes of a single cover art.
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Thumbnails
{
    /**
     * @var string
     * @SerializedName("1200")
     */
    public string $w1200;

    /**
     * @var string
     * @SerializedName("500")
     */
    public string $w500;

    /**
     * @var string
     * @SerializedName("250")
     */
    public string $w250;

    /**
     * @var string
     */
    public string $large;

    /**
     * @var string
     */
    public string $small;
}
