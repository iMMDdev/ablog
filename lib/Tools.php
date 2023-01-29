<?php

class Tools
{
    public static function debug($var, $exit = false)
    {
        echo '<pre>';
//        ob_start();
        var_dump($var);
//        $content = ob_get_clean();
//        echo Html::encode($content);
        echo '</pre>' . PHP_EOL;
        if ($exit) {
            exit();
        }
    }

    public static function route($route)
    {
        $routeParts = explode('/', $route);
        $page = array_shift($routeParts);
        $params = array_values($routeParts);
        return [$page,$params];
    }

    public static function redirect($url)
    {
        global $config;
        $url = $config['homeUrl'] . '/'. $url ;
        header('Location: ' .$url);
        exit('<meta http-equiv="Refresh" content="0;url=' .$url .'"/>');

    }
}
