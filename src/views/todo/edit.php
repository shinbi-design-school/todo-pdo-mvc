<?php
declare(strict_types=1);
/** @var App\Entity\Todo $todo */
$error = $error ?? null;
?>

<section class="card">
  <h2><i class="fa-solid fa-pen-to-square"></i> 編集</h2>

  <?php if ($error): ?>
    <p class="alert"><?= htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') ?></p>
  <?php endif; ?>

  <form method="post" action="/?action=update" class="form">
    <input type="hidden" name="id" value="<?= (int)$todo->getId() ?>">

    <label>
      タイトル（必須）
      <input type="text" name="title" value="<?= htmlspecialchars($todo->getTitle(), ENT_QUOTES, 'UTF-8') ?>" required>
    </label>

    <label>
      期限（任意）
      <input type="date" name="due_date" value="<?= htmlspecialchars((string)($todo->getDueDate() ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    </label>

    <label class="check">
      <input type="checkbox" name="is_done" <?= $todo->isDone() ? 'checked' : '' ?>>
      完了にする
    </label>

    <button class="btn primary" type="submit">
      <i class="fa-solid fa-arrows-rotate"></i> 更新
    </button>
  </form>
</section>
