<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?> | Tasks for Today</title>
    <link rel="stylesheet" href="<?= base_url('tasks.css') ?>">
</head>
<body>
<header>
    <div class="nav-wrap">
        <a class="brand" href="<?= site_url('/') ?>">✓ Tasks for Today</a>
        <nav aria-label="Main navigation">
            <?php foreach (['today'=>['/', 'Welcome'], 'tasks'=>['tasks','Task List'], 'profile'=>['profile','Profile'], 'about'=>['about','About']] as $key=>[$path,$label]): ?>
                <a href="<?= site_url($path) ?>" <?= $active===$key?'aria-current="page"':'' ?>><?= esc($label) ?></a>
            <?php endforeach ?>
        </nav>
    </div>
</header>
<main>
    <p class="eyebrow">IT0049 · TSA1</p>
    <h1><?= esc($title) ?></h1>
    <?= $this->renderSection('content') ?>
</main>
<footer>Tasks for Today Management System · BSIT – AGD · AX 31</footer>
</body>
</html>
