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

use CoverArtArchive\Client;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Class AbstractRepository
 * @package CoverArtArchive\Repository
 */
abstract class AbstractRepository
{
    protected $client;

    protected $mapper;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(null, null, null,
                new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()])),
        ];
        $encoders = [new JsonEncoder()];
        $this->mapper = new Serializer($normalizers, $encoders);
    }

    /**
     * @param $response
     * @return array|mixed|object
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function mapResponse($response)
    {
        $class = get_class($this->getClass());
        return $this->mapper->denormalize($response, $class, 'json');
    }

    abstract public function getApi();

    abstract public function getClass();
}
