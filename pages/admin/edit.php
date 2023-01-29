<?php
/*if (!isset($_GET['catId'])) {
    Tools::redirect('admin/categories');
}*/

if (isset($_POST['name'],$_POST['urlkey'])) {

    if ($cat = Categories::findOne(['id' => $_GET['catId']])) {
        if (Categories::updateCat(['name' => $_POST['name'], 'urlkey' => $_POST['urlkey']],$cat->id)) {
            echo '<p class="alert alert-success"> successfully </p>';
            Tools::redirect('admin/categories');
        }
    }
}
if (isset($_POST['title'],$_POST['desc'],$_POST['active'])){
    if ($post = Articles::findOne(['id'=>$_GET['postId']])){
        if (Articles::updatePost(['title'=>$_POST['title'],'description'=>$_POST['desc'],'active'=>$_POST['active']],$post->id)){
            Tools::redirect('admin/posts');
        }
    }
}

?>
<?php if (isset($_GET['catId'])): ?>
<?php $cat = Categories::findOne(['id' => $_GET['catId']]) ?>
<h1> Edit Category  <?= $cat->name ?></h1>
<hr/>
<form action="" class="form-horizontal " method="post">
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label "> Name Category</label>
        <div class="col-sm-3">
            <input class="form-control" name="name" id="name" type="text">
        </div>
    </div>
    <div class="form-group">
        <label for="url" class="col-sm-2 control-label "> urlkey Category </label>
        <div class="col-sm-3">
            <input class="form-control" name="urlkey" id="url" type="text">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-3">
            <input class="btn btn-success btn-block" name="" value="Update" type="submit">
        </div>
    </div>
</form>
<?php endif; ?>

<?php if (isset($_GET['postId'])): ?>
    <?php $post = Articles::findOne(['id' => $_GET['postId']]) ?>
    <h1> Edit Post  <?= $post->title ?></h1>
    <hr/>
    <form action="" class="form-horizontal " method="post">
        <div class="form-group">
            <label for=tit" class="col-sm-2 control-label "> title Post</label>
            <div class="col-sm-3">
                <input class="form-control" name="title" id="tit" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="col-sm-2 control-label "> description Post </label>
            <div class="col-sm-3">
                <input class="form-control" name="desc" id="desc" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="active" class="col-sm-2 control-label "> Active </label>
            <div class="col-sm-3">
                <input class="form-control" name="active" id="active" type="text">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-3">
                <input class="btn btn-success btn-block" name="" value="Update" type="submit">
            </div>
        </div>
    </form>
<?php endif; ?>