<?php

declare(strict_types=1);

namespace CodelyTv\Mooc\Courses\Domain;

use CodelyTv\Shared\Domain\Bus\Event\DomainEvent;

final class CourseRenamedDomainEvent extends DomainEvent
{
    public function __construct(
        string         $id,
        private string $oldName,
        private string $newName,
        string         $eventId = null,
        string         $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'course.renamed';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['oldName'], $body['newName'], $eventId, $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'oldName'     => $this->oldName,
            'newName' => $this->newName,
        ];
    }

    public function name(): string
    {
        return $this->oldName;
    }

    public function duration(): string
    {
        return $this->newName;
    }
}
