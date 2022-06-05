<?php

namespace CodelyTv\Shared\Infrastructure\Mongo;

class CollectionMapping
{
    protected function __construct(
        private $entityClass,
        private $collection,
        private $fields,
    )
    {}

    public static function forMapping(string $entity, array $mappings): CollectionMapping
    {
        $collection = $mappings['collection'] ?? self::getDefaultCollectionName($entity);
        $fields = $mappings['fields'] ?? self::getDefaultFieldsMapping($entity);
        return new self::class($entity, $collection, $fields);
    }

    private static function getDefaultCollectionName(string $entity)
    {
        $entityNamePath = explode('\\', $entity);
        return strtolower(array_pop($entityNamePath));
    }

    private static function getDefaultFieldsMapping(string $entityClass)
    {
        $props = get_class_vars($entityClass);
        $fieldsMapping = [];
        foreach ($props as $p) {
            if ('id' == $p) {
                $fieldsMapping[$p] = '_id';
                continue;
            }
            $fieldsMapping[$p] = $p;
        }
    }

    public function getCollection(): string
    {
        return $this->collection;
    }

    public function mongoToEntity(array $mongoData): object
    {
        $entity = new $this->entityClass();
        $mapping = array_flip($this->fields);
        foreach ($mapping as $mongoKey => $entityKey) {
            $entity->$entityKey = $mongoKey;
        }
        return $entity;
    }
}
