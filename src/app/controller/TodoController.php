<?php
declare(strict_types=1);

namespace App\Controller;

use App\Core\View;
use App\Model\Dao\TodoDAO;
use App\Model\Entity\Todo;

final class TodoController {
  private TodoDAO $dao;

  public function __construct() {
    $this->dao = new TodoDAO();
  }

  public function index(): void {
    $todos = $this->dao->findAll();
    View::render('todo/index', ['todos' => $todos]);
  }

  public function create(): void {
    View::render('todo/create');
  }

  public function store(): void{
    $title = trim((string)($_POST['title'] ?? ''));
    $dueDate = trim((string)($_POST['due_date'] ?? ''));

    if ($title === '') {
      View::render('todo/create', ['error' => 'タイトルは必須です。', 'title' => $title, 'dueDate' => $dueDate]);
      return;
    }

    $todo = new Todo(
      id: null,
      title: $title,
      isDone: false,
      dueDate: $dueDate !== '' ? $dueDate : null
    );

    $this->dao->insert($todo);
    View::redirect('/?action=index');
  }

public function edit(): void {
  $id = (int)($_GET['id'] ?? 0);
  $todo = $this->dao->findById($id);

  if (!$todo) {
    View::render('todo/index', [
      'todos' => $this->dao->findAll(),
      'error' => "指定したID($id)のToDoが見つかりません。"
    ]);
    return;
  }

  View::render('todo/edit', ['todo' => $todo]);
}

public function update(): void {
    $id = (int)($_POST['id'] ?? 0);
    $title = trim((string)($_POST['title'] ?? ''));
    $dueDate = trim((string)($_POST['due_date'] ?? ''));
    $isDone = isset($_POST['is_done']); // checkbox

    if ($title === '') {
      $todo = $this->dao->findById($id);
      View::render('todo/edit', ['error' => 'タイトルは必須です。', 'todo' => $todo]);
      return;
    }

    $todo = new Todo(
      id: $id,
      title: $title,
      isDone: $isDone,
      dueDate: $dueDate !== '' ? $dueDate : null
    );

    $this->dao->update($todo);
    View::redirect('/?action=index');
  }

  public function delete(): void {
    $id = (int)($_POST['id'] ?? 0);
    $this->dao->delete($id);
    View::redirect('/?action=index');
  }

  public function toggle(): void  {
    $id = (int)($_POST['id'] ?? 0);
    $this->dao->toggleDone($id);
    View::redirect('/?action=index');
  }
}
