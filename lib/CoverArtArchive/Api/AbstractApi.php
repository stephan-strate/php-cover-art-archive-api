<?php

namespace CoverArtArchive\Api;

use CoverArtArchive\Client;

abstract class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}