<?php

class Articles
{
    private static $tableName = 'articles';

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

    public static function counter(&$post)
    {
//        $post = Articles::findOne(['id'=>$id]);
        $post->view_count++;
        $dal = new DAL(self::$tableName);
        $tableName = self::$tableName;
        $dal->query("UPDATE `{$tableName}` SET `view_count`= '{$post->view_count}' Where (`id` = '{$post->id}')");
    }

    public static function getSrc(&$post)
    {
        global $config;
        if (file_exists($config['base'] . '/photos/' . $post->id . '.jpg')) {
            $src = $config['homeUrl'] . '/photos/' . $post->id . '.jpg';
        } else {
            $src = $config['homeUrl'].'/images/noimg.jpg';
        }
        return $src;
    }
    public static function deletePost($id)
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->delete($id);
        $result = $dal->query($query);
        return $result;
    }
    public static function updatePost($params = [],$id)
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->update($params,$id);
        $result = $dal->query($query);
        return $result;
    }
}
