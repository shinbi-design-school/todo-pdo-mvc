<?php declare(strict_types=1); ?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>ToDo (PDO + MVC)</title>
  <link rel="stylesheet" href="/css/style.css">
  <link rel="preconnect" href="https://cdnjs.cloudflare.com">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <header class="site-header">
    <div class="container header-row">
      <h1 class="brand">
        <i class="fa-solid fa-list-check"></i>
        ToDo (PHP + PDO / MVC)
      </h1>
      <nav class="nav">
        <a class="btn" href="/?action=index"><i class="fa-solid fa-house"></i> 一覧</a>
        <a class="btn primary" href="/?action=create"><i class="fa-solid fa-plus"></i> 新規</a>
      </nav>
    </div>
  </header>

  <main class="container">
