<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p class="intro">The demo user for this task management system.</p>
<section class="card profile">
<?php if ($user): ?>
    <div class="avatar" aria-hidden="true"><?= esc(mb_substr($user['full_name'],0,1)) ?></div>
    <h2><?= esc($user['full_name']) ?></h2>
    <p class="role">Demo user</p>
    <dl>
        <div><dt>Username</dt><dd><?= esc($user['username']) ?></dd></div>
        <div><dt>Email</dt><dd><?= esc($user['email']) ?></dd></div>
        <div><dt>Created</dt><dd><?= esc(date('F j, Y',strtotime($user['created_at']))) ?></dd></div>
    </dl>
<?php else: ?><p>No demo user found. Run the database seeder.</p><?php endif ?>
</section>
<?= $this->endSection() ?>
