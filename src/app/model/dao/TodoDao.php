<?php
declare(strict_types=1);

namespace App\Model\Dao;

use App\Core\Database;
use App\Model\Entity\Todo;
use PDO;

final class TodoDAO {
  private PDO $pdo;

  public function __construct() {
    $this->pdo = Database::pdo();
  }

  public function findAll(): array {
    $stmt = $this->pdo->query('SELECT * FROM todos ORDER BY is_done ASC, id DESC');
    $rows = $stmt->fetchAll();

    return array_map([$this, 'rowToEntity'], $rows);
  }

  public function findById(int $id): ?Todo{
    $stmt = $this->pdo->prepare('SELECT * FROM todos WHERE id = :id');
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();

    return $row ? $this->rowToEntity($row) : null;
  }

  public function insert(Todo $todo): void {
    $stmt = $this->pdo->prepare(
      'INSERT INTO todos (title, is_done, due_date) VALUES (:title, :is_done, :due_date)'
    );
    $stmt->execute([
      ':title' => $todo->getTitle(),
      ':is_done' => $todo->isDone() ? 1 : 0,
      ':due_date' => $todo->getDueDate(),
    ]);
  }

  public function update(Todo $todo): void {

    // 実装してみよう

  }

  public function delete(int $id): void {

    // 実装してみよう
    
  }

  public function toggleDone(int $id): void {
    $stmt = $this->pdo->prepare('UPDATE todos SET is_done = 1 - is_done WHERE id = :id');
    $stmt->execute([':id' => $id]);
  }

  private function rowToEntity(array $row): Todo {
    return new Todo(
      id: (int)$row['id'],
      title: (string)$row['title'],
      isDone: (bool)$row['is_done'],
      dueDate: $row['due_date'] !== null ? (string)$row['due_date'] : null,
      createdAt: (string)$row['created_at'],
      updatedAt: (string)$row['updated_at'],
    );
  }
}
