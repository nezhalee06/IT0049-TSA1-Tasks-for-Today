<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<p class="intro">A simple way to see what needs to be done.</p>
<section class="card about">
    <h2>About the system</h2>
    <p>Tasks for Today is a small CodeIgniter application that displays daily tasks, a complete task list, and one demo user profile. The Welcome page shows only tasks scheduled for the current date.</p>
    <h2>Developers</h2>
    <p><strong>Dela Cruz, John Paul</strong> — Designer<br><strong>Rodriguez, Robert Enzo</strong> — Encoder</p>
    <dl>
        <div><dt>Course</dt><dd>BSIT – AGD</dd></div>
        <div><dt>Section</dt><dd>AX 31</dd></div>
        <div><dt>Professor</dt><dd>Merlin Marfa</dd></div>
        <div><dt>Technology</dt><dd>CodeIgniter 4.7.6, PHP, MySQL/MariaDB</dd></div>
    </dl>
</section>
<?= $this->endSection() ?>
