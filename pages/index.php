<div class="bg-light p-5 rounded">
    <h2 class="text-info"><span class="fa fa-thumbs-up fa-lg fa-fw"></span> Welcome
        to <?= Html::encode($config['title']) ?> </h2>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet autem debitis delectus, deserunt
        id, impedit, ipsam maiores maxime nulla odit quae quo rem repellat reprehenderit sint sunt ullam vero!</p>
    <a class="btn btn-lg btn-primary" href="/docs/5.2/components/navbar/" role="button">View navbar docs &raquo;</a>
    <?= Html::a('About us', 'about', ['class' => 'btn btn-success btn-lg']) ?>

</div>

<br/>

</div>
<?php foreach (Articles::findAll(['active' => 1], 'id desc') as $post): ?>
    <div class="panel panel-primary">
        <div class="panel-heading"><?= Html::encode($post->title) ?>
            <div class="text-justify pull-right"><?php if (!empty($post->body)): ?><span
                        class="fa fa-eye fa-sm fa-fw"></span> <?= number_format($post->view_count) ?><?php endif; ?>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-3">
                    <img class="img-thumbnail" src="<?= Articles::getSrc($post) ?>" alt="<?= Html::encode($post->title)?>" />
                </div>
                <div class="col-sm-9">
                    <p><?= Html::encode($post->description) ?></p>
                </div>
            </div>
        </div>
        <div class="panel-footer text-muted"><?= Html::encode($post->created_at) ?>
            <?php if (!empty($post->body)): ?>
                <?= Html::a('Read more...', 'post/' . $post->id, ['class' => 'btn btn-success btn-sm pull-right']) ?>
            <?php endif; ?></div>
    </div>
<?php endforeach; ?>