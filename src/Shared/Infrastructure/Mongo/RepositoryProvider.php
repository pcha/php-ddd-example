<?php

namespace CodelyTv\Shared\Infrastructure\Mongo;

use MongoClient;

class RepositoryProvider
{
    public function __construct(protected MongoClient $client, protected string $dbName)
    {
    }

    public function getRepository(string $class): DefaultMongoRepository
    {
        return new DefaultMongoRepository($this->client, $this->dbName, $class);
    }
}