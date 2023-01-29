<h1>Posts Table</h1>
<hr>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">description</th>
        <th scope="col">active</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($posts = Articles::findAll()): ?>
        <?php foreach ($posts as $post): ?>
            <tr>
                <th scope="row"><?= Html::encode($post->id) ?></th>
                <td><?= Html::encode($post->title) ?></td>
                <td><?= Html::encode($post->description) ?></td>
                <td><?= Html::encode($post->active) ?></td>
                <td><?= Html::a('Edit','admin/edit'.'?postId='.$post->id) ?></td>
                <td><?= Html::a('X','admin/delete'.'?postId='.$post->id) ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>