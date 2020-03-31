<?php

class DB
{
    function __construct($host, $dbname, $user, $pass)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = "utf8mb4";
    }

    function connect() 
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
        $this->pdo = new PDO($dsn, $this->user, $this->pass);
        return $this;
    } 

    function getUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? and password = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $password]);

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}


?>