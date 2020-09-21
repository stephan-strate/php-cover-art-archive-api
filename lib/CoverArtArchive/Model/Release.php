<?php

namespace CoverArtArchive\Model;

/**
 * Class Release
 * @package CoverArtArchive\Model
 * @see https://musicbrainz.org/doc/Cover_Art_Archive/API#Cover_Art_Archive_Metadata
 */
class Release
{
    /**
     * All available images.
     * @var Image[]
     */
    public $images;

    /**
     * Link to the musicbrainz release.
     * @var string
     */
    public $release;

    /**
     * Get "main front" image of images.
     * @return Image    front image
     * @throws \Exception   if no front image is available
     */
    public function getFront()
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
    public function getBack()
    {
        foreach ($this->images as $image) {
            if ($image->back) {
                return $image;
            }
        }

        throw new \Exception();
    }
}