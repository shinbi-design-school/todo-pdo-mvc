<?php
declare(strict_types=1);

namespace App\Model\Entity;

final class Todo {
    private int $id;
    private string $title;
    private bool $isDone;
    private ?string $dueDate;
    private ?string $createdAt;
    private ?string $updatedAt;

    public function __construct(
        ?int $id,
        string $title,
        bool $isDone,
        ?string $dueDate,
        ?string $createdAt = null,
        ?string $updatedAt = null
    ) {
        $this->id = $id ?? 0;
        $this->title = $title;
        $this->isDone = $isDone;
        $this->dueDate = $dueDate;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function isDone(): bool {
        return $this->isDone;
    }

    public function getDueDate(): ?string {
        return $this->dueDate;
    }

    public function getCreatedAt(): ?string {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?string {
        return $this->updatedAt;
    }    
}
