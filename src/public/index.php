<?php
declare(strict_types=1);

require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/View.php';
require_once __DIR__ . '/../app/model/entity/Todo.php';
require_once __DIR__ . '/../app/model/dao/TodoDAO.php';
require_once __DIR__ . '/../app/controller/TodoController.php';

use App\Controller\TodoController;

$action = $_GET['action'] ?? 'index';

$controller = new TodoController();

switch ($action) {
  case 'create':
    $controller->create();
    break;
  case 'store':
    $controller->store();
    break;
  case 'edit':
    $controller->edit();
    break;
  case 'update':
    $controller->update();
    break;
  case 'delete':
    $controller->delete();
    break;
  case 'toggle':
    $controller->toggle();
    break;
  default:
    $controller->index();
    break;
}
