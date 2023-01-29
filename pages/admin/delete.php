<?php
/*if (!isset($_GET['catId'])) {
    Tools::redirect('admin/categories');
}
if (!isset($_GET['postId'])) {
    Tools::redirect('admin/posts');
}*/

if (isset($_GET['catId'])) {
    $id = $_GET['catId'];
    Categories::deleteCat($id);
    Tools::redirect('admin/categories');
}
if (isset($_GET['postId'])) {
    $id = $_GET['postId'];
    Articles::deletePost($id);
    Tools::redirect('admin/posts');
}
