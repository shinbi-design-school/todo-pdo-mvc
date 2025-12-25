<?php
declare(strict_types=1);

define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_NAME', getenv('DB_NAME') ?: 'todo_db');
define('DB_USER', getenv('DB_USER') ?: 'todo_user');
define('DB_PASS', getenv('DB_PASS') ?: 'todo_pass');

define('BASE_URL', '/');
