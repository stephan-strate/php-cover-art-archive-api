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
 * Class Thumbnails
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Thumbnails
{
    /**
     * @var string
     */
    public $large;

    /**
     * @var string
     */
    public $small;
}
