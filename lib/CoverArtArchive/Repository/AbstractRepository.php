<?php

namespace CoverArtArchive\Repository;

use CoverArtArchive\Client;

abstract class AbstractRepository
{
    protected $client;

    protected $mapper;

    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->mapper = new \JsonMapper();
    }

    abstract public function getApi();

    abstract public function getClass();
}