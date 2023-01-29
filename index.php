<?php
global $config;
require_once __DIR__ . "/init.php" ;
$content = '';
list($page, $params) = Tools::route(isset($_GET['r']) ? $_GET['r'] : '');
if (trim($page) === '') {
    $page = 'index';
}
switch (strtolower($page)) {
    case 'admin':
        ob_start();
        require_once __DIR__ .'/pages/admin.php';
        $content = ob_get_clean();
        break;
    case 'index' :
        ob_start();
        require_once __DIR__ . '/pages/index.php';
        $content = ob_get_clean();
        break;
    case 'cat':
        ob_start();
        require_once __DIR__ . '/pages/categories.php';
        $content = ob_get_clean();
        break;
        case 'post':
        ob_start();
        require_once __DIR__ . '/pages/post.php';
        $content = ob_get_clean();
        break;
    case 'about':
        ob_start();
        require_once __DIR__ . '/pages/about.php';
        $content = ob_get_clean();
        break;
    default:
        ob_start();
        require_once __DIR__ .'/pages/404.php';
        $content = ob_get_clean();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($config['title']) . (Registry::check('pageTitle') ?  ' | ' . Registry::get('pageTitle') : '') ?></title>
    <?= Html::link('css/bootstrap.min.css') ?>
    <?= Html::link('css/all.min.css') ?>
    <?= Html::link('css/style.css') ?>
    <?= Html::link('css/fontawesome.min.css') ?>
    <?= Html::link('images/favicon.png', 'shortcut icon', 'image/png') ?>

</head>
<body>
<nav class="navbar navbar-expand-md  navbar-dark bg-dark mb-4 text-justify">
    <div class="container-fluid">
        <a class="navbar-brand" href=""><?= Html::encode($config['title']) ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?=$config['homeUrl']?>"><span class="fa fa-home fa-sm fa-fw"></span>
                        Home</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="fa fa-list fa-1x fa-fw"></span> Categories
                    </button>
                    <ul class="dropdown-menu ">
                        <?php foreach (Categories::findAll() as $category): ?>
                            <li> <?= Html::a(Html::encode($category->name), 'cat/' . $category->urlkey, ['class' => 'dropdown-item']) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#"><span class="fa fa-link fa-sm fa-fw"></span> Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $config['homeUrl'].'/'?>admin"><span class="fa fa-sign-in fa-sm fa-fw"></span> Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<main class="container">
<?= $content ?>
</main>
<?= Html::script('js/jquery.min.js') ?>
<?= Html::script('js/fontawesome.min.js') ?>
<?= Html::script('js/bootstrap.min.js') ?>
<?= Html::script('js/all.min.js') ?>
<?= Html::script('js/bootstrap.bundle.min.js') ?>

</body>
</html>