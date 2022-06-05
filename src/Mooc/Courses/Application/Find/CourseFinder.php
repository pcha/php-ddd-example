<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Application\Find;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\Coursefinder as DomainCourseFinder;
use CodelyTv\Mooc\Courses\Domain\CourseNotExist;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Mooc\Shared\Domain\Courses\CourseId;

final class CourseFinder
{
    private DomainCourseFinder $coursefinder;

    public function __construct(CourseRepository $repository)
    {
        $this->coursefinder = new DomainCourseFinder($this->repository);
    }

    public function __invoke(CourseId $id): Course
    {
        return $this->coursefinder->__invoke($id);
    }
}
