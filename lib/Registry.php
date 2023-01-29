<?php

class Registry
{
    private static $values = [];

    public static function check($name)
    {
        return isset(self::$values[$name]);
    }

    public static function set(string $name, $value): void
    {
        // TODO: Implement __set() method.
        self::$values[$name] = $value;
    }

    public static function get(string $name)
    {
        // TODO: Implement __get() method.
        return isset(self::$values[$name]) ? self::$values[$name] : null;
    }

}