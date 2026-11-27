<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p class="intro"><?= esc($description) ?></p>
<div class="summary">
    <span><?= $active==='today'?'Today: '.esc(date('F j, Y')):'All scheduled dates' ?></span>
    <span><?= count($tasks) ?> <?= count($tasks)===1?'task':'tasks' ?></span>
</div>
<section class="card table-wrap" aria-label="<?= esc($title) ?>">
    <?php if ($tasks): ?>
    <table>
        <thead><tr><th scope="col">Task</th><th scope="col">Status</th><th scope="col">Date</th></tr></thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['title']) ?></td>
                <td><span class="status <?= $task['status']==='completed'?'completed':'pending' ?>"><?= esc(ucfirst($task['status'])) ?></span></td>
                <td class="date"><?= esc(date('M j, Y', strtotime($task['task_date']))) ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="empty"><h2><?= $active==='today'?'No tasks scheduled for today.':'No tasks yet.' ?></h2><p><?= $active==='today'?'You can still view every scheduled task in the Task List.':'Run the database seeder to load sample tasks.' ?></p></div>
    <?php endif ?>
</section>
<?php if ($active==='today'): ?><a class="text-link" href="<?= site_url('tasks') ?>">View all tasks →</a><?php endif ?>
<p class="note">Dates follow Philippine time (Asia/Manila).</p>
<?= $this->endSection() ?>
