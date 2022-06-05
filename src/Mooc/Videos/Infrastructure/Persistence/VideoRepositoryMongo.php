<?php

namespace CodelyTv\Mooc\Videos\Infrastructure\Persistence;

use CodelyTv\Mooc\Videos\Domain\Video;
use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;
use CodelyTv\Mooc\Videos\Domain\Videos;
use CodelyTv\Shared\Domain\Criteria\Criteria;
use CodelyTv\Shared\Infrastructure\Mongo\DefaultMongoRepository;
use CodelyTv\Shared\Infrastructure\Mongo\RepositoryProvider;

class VideoRepositoryMongo implements VideoRepository
{
    private DefaultMongoRepository $repository;

    public function __construct(private RepositoryProvider $repositoryProvider) {
        $this->repository = $this->repositoryProvider->getRepository(Video::class);
    }


    public function save(Video $video): void
    {
        // TODO: Implement save() method.
    }

    public function search(VideoId $id): ?Video
    {
        return $this->repository->find($id);
    }

    public function searchByCriteria(Criteria $criteria): Videos
    {
        // TODO: Implement searchByCriteria() method.
        return new Videos();
    }

    public function delete(VideoId $id)
    {
        // TODO: Implement delete() method.
    }
}