<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

abstract class AbstractRepository
{
    protected $client;

    protected $mapper;

    public function __construct(Client $client)
    {
        $this->client = $client;

        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $this->mapper = new Serializer($normalizers, $encoders);
    }

    abstract public function getApi();

    abstract public function getClass();
}