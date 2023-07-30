<?php if (!empty($article->errors)): ?>
    <ul>
        <?php foreach ($article->errors as $error): ?>
            <li>
                <?= $error ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="" method="POST">

    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" type="text" id="title" name="title" placeholder="Article title" value="<?= htmlspecialchars($article->title) ?>">
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" name="content" rows="4" cols="40" id="content"
            placeholder="Article content"><?= htmlspecialchars($article->content) ?></textarea>
    </div>

    <div class="form-group">
        <label for="published_at">Publication date and time</label>
        <input class="form-control" type="datetime-local" name="published_at" id="published_at"
            value="<?= htmlspecialchars($article->published_at) ?>">
    </div>

    <button>Save</button>
</form>