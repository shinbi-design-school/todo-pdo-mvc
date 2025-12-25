<?php
declare(strict_types=1);
$title = $title ?? '';
$dueDate = $dueDate ?? '';
$error = $error ?? null;
?>

<section class="card">
  <h2><i class="fa-solid fa-plus"></i> 新規作成</h2>

  <?php if ($error): ?>
    <p class="alert"><?= htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') ?></p>
  <?php endif; ?>

  <form method="post" action="/?action=store" class="form">
    <label>
      タイトル（必須）
      <input type="text" name="title" value="<?= htmlspecialchars((string)$title, ENT_QUOTES, 'UTF-8') ?>" required>
    </label>

    <label>
      期限（任意）
      <input type="date" name="due_date" value="<?= htmlspecialchars((string)$dueDate, ENT_QUOTES, 'UTF-8') ?>">
    </label>

    <button class="btn primary" type="submit">
      <i class="fa-solid fa-floppy-disk"></i> 登録
    </button>
  </form>
</section>
