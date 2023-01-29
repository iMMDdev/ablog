<?php

class DAL
{
    private $con;
    protected $tableName;

    public function __construct($tableName)
    {
        $this->connect();
        $this->tableName = $tableName;
    }

    public function connect()
    {
        global $config;
        if (!$this->con) {
            try {
                $this->con = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'], $config['db']['user'], $config['db']['pass']);
                $this->con->query('SET NAMES \'utf8\'');
            } catch (PDOException $e) {
                exit('Connection error');
            }
        }
    }

    public function query($query, $params = [])
    {
        $stmt = $this->con->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        return $stmt;
    }

    public function select($params, $limit = null, $order ='id')
    {
        $result = 'select * from `' . $this->tableName . '` where (1=1';
        foreach ($params as $key => $value) {
            if (is_null($value)){
                $result .= ' AND `' . $key . '` IS NULL';
            }else{
                $result .= ' AND `' . $key . '` = ' . $this->con->quote($value);
            }
        }
        $result .= ') ORDER BY ' . $order;
        if (!is_null($limit)) {
            $result .= ' LIMIT ' . intval($limit);
        }

        return $result;
    }
    public function delete($id){
        $result = 'DELETE FROM '.$this->tableName .' WHERE id = '.$id ;
        return $result;
    }

    public function update($params,$id){
        $cols = array();
        foreach($params as $key=>$val) {
            $cols[] = "$key = '$val'";
        }
        $sql = "UPDATE ".$this->tableName. " SET " . implode(', ', $cols) . " WHERE id = ".$id;
        return($sql);
    }
}
