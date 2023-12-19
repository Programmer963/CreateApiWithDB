<?php

class Database
{
    // private static $host;
    // private static $port;
    // private static $db_name;


    private array $conf;
    private  $connection = null;
    public $query = "";

    public function __construct()
    {
        $this->conf = json_decode(file_get_contents("database.json"), true);

    }

    private function connect()
    {
        if (!$this->connection) {
            $this->connection = new PDO(
                "mysql:host=" . $this->conf["host"] . ";
                port=" . $this->conf["port"] . ";
                dbname=" . $this->conf["database"] . ";
                charset=" . $this->conf["charset"], $this->conf["user"], $this->conf["password"]
            );
        }
        return $this->connection;
    }

    public function getRow($sql, ...$params)
    {
        $this->query = $this->connect()->prepare($sql);
        $this->query->execute($params);
        return $this->query->fetch(PDO::FETCH_OBJ);
    }

    public function getAll($sql, ...$params)
    {
        $this->query = $this->connect()->prepare($sql);
        $this->query->execute($params);
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }


    public function insert($sql, $params){
        $this->query = $this->connect()->prepare($sql);    
        return ($this->query->execute($params)) ? $this->connect()->lastInsertId() : 0;
    }

    public function rowCount($sql, ...$params){
        $this->query = $this->connect()->prepare($sql);    
        $this->query->execute($params);
        return $this->query->rowCount();
    }
}




?>