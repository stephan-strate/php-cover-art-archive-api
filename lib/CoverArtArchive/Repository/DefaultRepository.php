<?php

/**
 * This file is part of the CoverArtArchive API Wrapper created by Stephan Strate.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package CoverArtArchive\Repository
 * @author Stephan Strate <hello@stephan.codes>
 * @link https://github.com/stephan-strate/php-cover-art-archive-api
 * @copyright (c) 2021, Stephan Strate
 * @version 0.0.1
 */

namespace CoverArtArchive\Repository;

/**
 * Class DefaultRepository
 * @package CoverArtArchive\Repository
 */
abstract class DefaultRepository extends AbstractRepository
{
    /**
     * @param $mbid
     * @return array|mixed|object
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function coverArt($mbid)
    {
        $response = $this->getApi()->coverArt($mbid);
        return $this->mapResponse($response);
    }

    /**
     * @param      $mbid
     * @param      $id
     * @param null $size
     * @return array|mixed|object
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function coverArtId($mbid, $id, $size = null)
    {
        $response = $this->getApi()->coverArtId($mbid, $id, $size);
        return imagecreatefromstring($response);
    }

    /**
     * @param      $mbid
     * @param null $size
     * @return array|mixed|object
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function coverArtFront($mbid, $size = null)
    {
        $response = $this->getApi()->coverArtFront($mbid, $size);
        return imagecreatefromstring($response);
    }
}
