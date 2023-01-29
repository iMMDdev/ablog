<?php

class Comments
{
    private static $tableName = 'comments';

    public static function findAll($params = [], $order = 'id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params, null, $order);
        $result = $dal->query($query);
//        echo $query;
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public static function findOne($params = [], $order = 'id')
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select($params, 1, $order);
        $result = $dal->query($query);
        return $result->fetch(PDO::FETCH_OBJ);
    }

    public static function showAll($postId, $tagName = 'div', $options = [], $parentId = null)
    {
        $dal = new DAL(self::$tableName);
        $query = $dal->select(['article_id' => $postId, 'parent_id' => $parentId]);
//        echo $query;
        $result = $dal->query($query);
        foreach ($result->fetchAll(PDO::FETCH_OBJ) as $comment) {
            echo '<' . $tagName;
            foreach ($options as $key => $value) {
                echo ' ' . $key . '= "' . $value . '" ';
            }
            echo '>' . PHP_EOL;
            echo "<p class='text-muted'>" . Html::encode($comment->user_name) . '</p>' . PHP_EOL;
            echo "<p>" . Html::encode($comment->body) . '</p>' . PHP_EOL;
            self::showAll($postId,$tagName,$options,$comment->id);
            echo '</' . $tagName . '>' . PHP_EOL;
        }
    }
}