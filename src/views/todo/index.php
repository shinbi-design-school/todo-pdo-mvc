<?php
declare(strict_types=1);
/** @var App\Entity\Todo[] $todos */
?>

<section class="card">
  <h2><i class="fa-solid fa-table-list"></i> 一覧</h2>

  <?php if (count($todos) === 0): ?>
    <p class="muted">ToDo がありません。</p>
  <?php else: ?>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>状態</th>
          <th>タイトル</th>
          <th>期限</th>
          <th>操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($todos as $t): ?>
          <tr>
            <td><?= htmlspecialchars((string)$t->getId(), ENT_QUOTES, 'UTF-8') ?></td>
            <td>
              <?php if ($t->isDone()): ?>
                <span class="badge done"><i class="fa-solid fa-check"></i> 完了</span>
              <?php else: ?>
                <span class="badge todo"><i class="fa-regular fa-circle"></i> 未完了</span>
              <?php endif; ?>
            </td>
            <td class="<?= $t->isDone() ? 'strike' : '' ?>">
              <?= htmlspecialchars($t->getTitle(), ENT_QUOTES, 'UTF-8') ?>
            </td>
            <td><?= htmlspecialchars((string)($t->getDueDate() ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
            <td class="actions">
              <form method="post" action="/?action=toggle" class="inline">
                <input type="hidden" name="id" value="<?= (int)$t->getId() ?>">
                <button class="btn" type="submit">
                  <i class="fa-solid fa-rotate"></i> 切替
                </button>
              </form>

              <a class="btn" href="/?action=edit&id=<?= (int)$t->getId() ?>">
                <i class="fa-solid fa-pen-to-square"></i> 編集
              </a>

              <form method="post" action="/?action=delete" class="inline">
                <input type="hidden" name="id" value="<?= (int)$t->getId() ?>">
                <button class="btn danger" type="submit">
                  <i class="fa-solid fa-trash"></i> 削除
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</section>
