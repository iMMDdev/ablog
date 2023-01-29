<?php
class Session{

    public static function start()
    {
        if (!isset($_SESSION)){
          session_start();
        }
    }
    public static function set($name,$value)
    {
        self::start();
        $_SESSION[$name] = $value;
    }

    public static function get($name)
    {
        self::start();
        return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
    }
    public static function clear($name){
        self::start();
        if (isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }
}