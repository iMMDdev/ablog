<?php

class Html
{
    public static function a($label, $target, $option = [])
    {
        global $config;
        if (is_array($target)) {
            $link = $target[0];
            foreach ($target[1] as $key => $value){
                $link .= '/' . $key . '/' . $value ;
            }
        }else{
            $link = $target ;
        }
        $result = '<a href="' . self::encode($config['homeUrl'] . '/' . $link) . '" ';
        foreach ($option as $key => $value) {
            $result .= $key . '="' . $value . '" ';
        }
        $result .= '>' . $label . '</a>' . PHP_EOL;
        return $result;
    }

    /**
     * @param $value
     * @return string
     */
    public static function encode($value)
    {
        return htmlentities($value, ENT_QUOTES, 'utf-8');
    }

    /**
     * @param $href
     * @param $rel
     * @param $type
     * @return string
     */
    public static function link($href, $rel = 'stylesheet', $type = 'text/css')
    {
        global $config;
        return '<link href ="' . $config['homeUrl'] . '/' . self::encode($href) . '" rel="' . self::encode($rel) . '" type="' . self::encode($type) . '" />' . PHP_EOL;
    }

    public static function script($src, $type = 'text/javascript')
    {
        global $config;
        return '<script src="' . $config['homeUrl'] . '/' . self::encode($src) . '" type="' . self::encode($type) . '"></script>' . PHP_EOL;
    }

}