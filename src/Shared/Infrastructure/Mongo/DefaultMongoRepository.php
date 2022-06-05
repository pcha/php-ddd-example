<?php

namespace CodelyTv\Shared\Infrastructure\Mongo;

use MongoClient;
use MongoCollection;

class DefaultMongoRepository
{
    private ?MongoCollection $collection;

    protected CollectionMapping $collectionMapping;

    public function __construct(protected MongoClient $client, protected string $dbName, protected string $class)
    {
        $dataMapper = new DataMapper();
        $this->collectionMapping = $dataMapper->getMappings($this->class);
    }

    protected function getCollectionName(): string
    {
        return $this->collectionMapping->getCollection();
    }

    protected function getCollection(): MongoCollection
    {
        if (null == $this->collection) {
            $this->collection = $this->client->selectCollection($this->dbName, $this->getCollectionName());
        }
        return $this->collection;
    }

    public function find($id): ?object
    {
        $data = $this->getCollection()->findOne(["_id" => $id]);
        if (null == $data) {
            return null;
        }
        return $this->collectionMapping->mongoToEntity($data);
    }
}