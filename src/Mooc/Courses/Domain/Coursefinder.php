<?php

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

class Coursefinder
{
    public function __construct(private CourseRepository $repository)
    {
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}