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

use CoverArtArchive\Api\AbstractApi;
use CoverArtArchive\Client;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\UnexpectedValueException;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Basic repository implementation to use in specific repository implementations.
 * @package CoverArtArchive\Repository
 * @template T
 */
abstract class AbstractRepository
{
    /**
     * Client to retrieve api instance.
     * @var Client
     */
    protected Client $client;

    /**
     * Symfony serializer for denormalization.
     * @var Serializer
     */
    protected Serializer $mapper;

    /**
     * Setup repository. Make client available and define symfonys serializer
     * for denormalization.
     * @param \CoverArtArchive\Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizers = [
            new DateTimeNormalizer(),
            new ArrayDenormalizer(),
            new ObjectNormalizer(
                $classMetadataFactory,
                new MetadataAwareNameConverter($classMetadataFactory),
                null,
                new PropertyInfoExtractor([], [new PhpDocExtractor(), new ReflectionExtractor()])
            ),
        ];
        $encoders = [new JsonEncoder()];
        $this->mapper = new Serializer($normalizers, $encoders);
    }

    /**
     * Map json response to model class defined in {@link \CoverArtArchive\Repository\AbstractRepository::getClass()}.
     * @param mixed $response   response data
     * @return T    response data mapped to {@link \CoverArtArchive\Repository\AbstractRepository::getClass()}
     */
    public function mapResponse($response)
    {
        try {
            $class = get_class($this->getClass());
            // @phpstan-ignore-next-line
            return $this->mapper->denormalize($response, $class, 'json');
        } catch (ExceptionInterface $e) {
            throw new UnexpectedValueException('Mapping failed', 721032211);
        }
    }

    /**
     * Make specific api instance available to repository.
     * @return AbstractApi
     */
    abstract public function getApi(): AbstractApi;

    /**
     * Define which model will be used to map the response data to.
     * @return T
     */
    abstract public function getClass();
}
