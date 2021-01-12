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
 * Class DefaultApi
 * @package CoverArtArchive\Api
 * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API
 */
abstract class DefaultApi extends AbstractApi
{
    /**
     * @var string
     */
    protected $entityType;

    /**
     * @param $mbid
     * @return mixed|string
     * @throws \Http\Client\Exception
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease.2F.7Bmbid.7D.2F
     * @see https://wiki.musicbrainz.org/Cover_Art_Archive/API#.2Frelease-group.2F.7Bmbid.7D.2F
     */
    public function coverArt($mbid)
    {
        return $this->get($this->entityType . '/' . $mbid);
    }

    /**
     * @param      $mbid
     * @param      $id
     * @param null $size
     * @return mixed|string
     * @throws \Http\Client\Exception
     */
    public function coverArtId($mbid, $id, $size = null)
    {
        $sizeFormatted = $size !== null ? '-' . $size : '';
        return $this->get($this->entityType . '/' . $mbid . '/' . $id . $sizeFormatted);
    }

    /**
     * @param      $mbid
     * @param null $size
     * @return mixed|string
     * @throws \Http\Client\Exception
     */
    public function coverArtFront($mbid, $size = null)
    {
        return $this->coverArtId($mbid, 'front', $size);
    }
}
