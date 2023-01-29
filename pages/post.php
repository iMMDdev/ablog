<?php if (isset($params[0])): ?>
    <?php if ($post = Articles::findOne(['id' => $params[0], 'active' => 1])): ?>
        <?php Registry::set('pageTitle', Html::encode($post->title)); ?>
        <?php //Articles::counter($post); ?>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3> <?= Html::encode($post->title) ?></h3>
            </div>
            <p class="panel-body">
                        <img class="img-thumbnail" src="<?= Articles::getSrc($post) ?>"
                             alt="<?= Html::encode($post->title) ?>"/>
                        <h2><?= Html::encode($post->body) ?></h2>
            </p>
            <div class="panel-footer text-muted">
                <span class=" "><?= Html::encode($post->created_at) ?></span>
                <div class="fa-pull-right"><span class="fa fa-eye fa-sm fa-fw "></span> <?= number_format($post->view_count) ?></div>

            </div>
        </div>
        <hr/>
        <div class=""><h2><span class="fa fa-comment fa-sm fa-fw"></span> Comments <?= $post->title ?></h2></div>
        <br>
        <?php Comments::showAll($post->id, 'div', ['class' => 'well']) ?>
    <?php else: ?>
        <div class="alert alert-danger">
            <p>Post <?= Html::encode($params[0]); ?> is not Found</p>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-warning">
        <p>Post is not specified. </p>
    </div>
<?php endif; ?>
