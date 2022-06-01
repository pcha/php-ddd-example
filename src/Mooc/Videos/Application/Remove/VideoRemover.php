<?php

namespace CodelyTv\Mooc\Videos\Application\Remove;

use CodelyTv\Mooc\Videos\Domain\VideoId;
use CodelyTv\Mooc\Videos\Domain\VideoRepository;

class VideoRemover
{
    public function __construct(private VideoRepository $repository)
    {
    }

    public function remove(VideoId $id)
    {
       $this->repository->delete($id);
    }
}