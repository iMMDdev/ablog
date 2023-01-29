<h1>Categories Table</h1>
<hr>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Url key</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php if ($cats = Categories::findAll()): ?>
    <?php foreach ($cats as $cat): ?>
    <tr>
        <th scope="row"><?= Html::encode($cat->id) ?></th>
        <td><?= Html::encode($cat->name) ?></td>
        <td><?= Html::encode($cat->urlkey) ?></td>
        <td><?= Html::a('Edit','admin/edit'.'?catId='.$cat->id) ?></td>
        <td><?= Html::a('X','admin/delete'.'?catId='.$cat->id) ?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
