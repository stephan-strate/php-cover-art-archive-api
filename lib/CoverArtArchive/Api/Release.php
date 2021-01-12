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
 * Class Release
 * @package CoverArtArchive\Api
 */
class Release extends DefaultApi
{
    protected $entityType = 'release';

    /**
     * @param      $mbid
     * @param null $size
     * @return mixed|string
     * @throws \Http\Client\Exception
     */
    public function coverArtBack($mbid, $size = null)
    {
        return $this->coverArtId($mbid, 'back', $size);
    }
}
