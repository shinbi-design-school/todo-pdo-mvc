<?php
declare(strict_types=1);

namespace App\Core;

final class View {
  public static function render(string $viewPath, array $data = []): void {
    extract($data, EXTR_SKIP);

    require __DIR__ . '/../../views/layout/header.php';
    require __DIR__ . '/../../views/' . $viewPath . '.php';
    require __DIR__ . '/../../views/layout/footer.php';
  }

  public static function redirect(string $path): void {
    header('Location: ' . $path);
    exit;
  }
}
