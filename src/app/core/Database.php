<?php
declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

final class Database {
  private static ?PDO $pdo = null;

  public static function pdo(): PDO {
    if (self::$pdo !== null) return self::$pdo;

    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';

    try {
      self::$pdo = new PDO($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
      ]);
      return self::$pdo;
    } 
    catch (PDOException $e) {
      http_response_code(500);
      echo "DB connection failed: " . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');
      exit;
    }
  }
}
