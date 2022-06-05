<?php

namespace CodelyTv\Shared\Infrastructure\Mongo;

class DataMapper
{
    private array $mappings;

    public function __construct()
    {
        $this->mappings = require './DataMappings.php';
    }

    public function getMappings(string $class): CollectionMapping
    {
        return CollectionMapping::forMapping($class, $this->mappings[$class] ?? []);
    }
}