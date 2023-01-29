<?php
$config = require_once __DIR__ . '/config.php';
function lazyLoad($name)
{
    $fileName =__DIR__ . '/lib/' . $name . '.php';
    if (file_exists($fileName)) {
        require_once $fileName;
    }
}
spl_autoload_register('lazyLoad');