-- =========================================
-- 文字コード設定（最重要）
-- =========================================
SET NAMES utf8mb4;
SET character_set_client = utf8mb4;
SET character_set_connection = utf8mb4;
SET character_set_results = utf8mb4;

-- =========================================
-- データベース作成
-- =========================================
CREATE DATABASE IF NOT EXISTS todo_db
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_0900_ai_ci;

USE todo_db;

-- =========================================
-- ToDo テーブル
-- =========================================
CREATE TABLE IF NOT EXISTS todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  is_done TINYINT(1) NOT NULL DEFAULT 0,
  due_date DATE NULL,
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_0900_ai_ci;

-- =========================================
-- 初期データ（日本語）
-- =========================================
INSERT INTO todos (title, is_done, due_date) VALUES
('ももクロのライブに行く', 0, '2024-12-31'),
('プログラミングを勉強する', 1, '2024-06-30'),
('買い物に行く', 0, '2024-05-15');

