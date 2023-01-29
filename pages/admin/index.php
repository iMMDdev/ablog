<?php
global $config;
if (!Session::get('login')): ?>
    <?php Tools::redirect('admin/login'); ?>
<?php endif; ?>
<h1><span class="fa fa-hand-scissors fa-sm fa-fw"></span> <?= $config['title'] ?> Admin Index</h1>
<hr/>

<div class="row">
    <div class="col-sm-3">
        <ul class="list-group">
        <li class="list-group-item"><?= Html::a('Categories', 'admin/categories') ?></li>
        <li class="list-group-item"> <?= Html::a('Posts', 'admin/posts') ?></li>
        <li class="list-group-item list-group-item-heading"> <?= Html::a('Comments', 'admin/comments') ?></li>
        <li class="list-group-item list-group-item-danger"> <?= Html::a('Logout', 'admin/logout') ?></li>
        </ul>
    </div>
    <div class="col-sm-9">

    </div>
</div>