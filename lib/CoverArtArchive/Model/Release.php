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
 * Release model with images available as well additional properties.
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Release
{
    /**
     * All available images.
     * @var array<Image>
     */
    public array $images;

    /**
     * Link to the musicbrainz release.
     * @var string
     */
    public string $release;

    /**
     * Get "main front" image of images.
     * @return Image    front image
     * @throws \Exception   if no front image is available
     */
    public function front(): Image
    {
        foreach ($this->images as $image) {
            if ($image->front) {
                return $image;
            }
        }

        throw new \Exception();
    }

    /**
     * Get "main back" image of images.
     * @return Image    back image
     * @throws \Exception   if no back image is available
     */
    public function back(): Image
    {
        foreach ($this->images as $image) {
            if ($image->back) {
                return $image;
            }
        }

        throw new \Exception();
    }
}
