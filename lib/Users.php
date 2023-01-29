<?php

class Users
{


    private static $tableName = 'users';

    public static function findAll($params = [], $order = 'id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params, null, $order);
        $result = $dal->query($query);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findOne($params = [], $order = 'id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params, 1, $order);
        $result = $dal->query($query);
        return $result->fetch(PDO::FETCH_OBJ);
    }
}
