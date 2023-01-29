<?php if (isset($params[0])): ?>
    <?php if ($category = Categories::findOne(['urlkey' => $params[0]])): ?>
        <?php Registry::set('pageTitle', Html::encode($category->name)); ?>
        <h1><?= Html::encode($category->name) ?></h1>
        <hr/>
        <?php if ($posts = Articles::findAll(['cat_id' => $category->id, 'active' => 1])): ?>
            <?php foreach ($posts as $post): ?>
                <div class="panel panel-primary">
                    <div class="panel-heading"><?= Html::encode($post->title) ?>
                        <div class="text-justify pull-right"><?php if (!empty($post->body)): ?><span
                                    class="fa fa-eye fa-sm fa-fw"></span> <?= number_format($post->view_count) ?><?php else: ?><?php //Articles::counter($post); ?>
                                <span class="fa fa-eye fa-sm fa-fw"></span> <?= number_format($post->view_count) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <img class="img-thumbnail" src="<?= Articles::getSrc($post) ?>"
                                     alt="<?= Html::encode($post->title) ?>"/>
                            </div>
                            <div class="col-sm-9">
                                <p><?= Html::encode($post->description) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer text-muted"><?= Html::encode($post->created_at) ?>
                        <?php if (!empty($post->body)): ?>
                            <?= Html::a('Read more...', 'post/' . $post->id, ['class' => 'btn btn-success btn-sm pull-right']) ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-warning">
                <p>this Category is currently empty.</p>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-danger">
            <p>Category <?= Html::encode($params[0]); ?> is not found</p>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-danger">
        <p>Category is not specified</p>
    </div>
<?php endif; ?>

