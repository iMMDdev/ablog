<?php

class Categories
{
    private static $tableName = 'categories';

    public static function findAll($params = [],$order ='id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params,null,$order);
        $result = $dal->query($query);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findOne($params = [],$order = 'id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params, 1,$order);
        $result = $dal->query($query);
        return $result->fetch(PDO::FETCH_OBJ);
    }
    public static function deleteCat($id)
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->delete($id);
        $result = $dal->query($query);
        return $result;
    }
    public static function updateCat($params = [],$id)
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->update($params,$id);
        $result = $dal->query($query);
        return $result;
    }
}