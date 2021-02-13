<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Api
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Api;

/**
 * Specific api implementation for single releases.
 * @package CoverArtArchive\Api
 */
class Release extends DefaultApi
{
    protected string $entityType = 'release';

    /**
     * Fetch the image that is most suitable to be called the "back" cover art.
     * @param string    $mbid   MusicBrainz identifier
     * @param ?int      $size   width value (possible values can be found in {@link \CoverArtArchive\Model\CoverArtSize})
     * @return mixed|string
     */
    public function coverArtBack(string $mbid, ?int $size = null)
    {
        return $this->coverArtId($mbid, 'back', $size);
    }
}
