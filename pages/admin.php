<?php

if (!isset($params[0])) {
    Tools::redirect('admin/login');
}
$action = strtolower($params[0]);
switch ($action) {
    case 'login':
        require_once __DIR__ . '/admin/login.php';
        break;
    case 'index':
        require_once __DIR__ . '/admin/index.php';
        break;
        case 'categories':
        require_once __DIR__ . '/admin/categories.php';
        break;
        case 'edit':
        require_once __DIR__ . '/admin/edit.php';
        break;
        case 'delete':
        require_once __DIR__ . '/admin/delete.php';
        break;
        case 'posts':
        require_once __DIR__ . '/admin/posts.php';
        break;
    case 'logout':
       Session::clear('login');
       Tools::redirect('admin/login');
        break;
    default:
        require_once __DIR__ . '/404.php';
}