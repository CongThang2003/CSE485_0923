<?php

class DBConnection
{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $this->dbname = DB_NAME;
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=quanlybaihat;charset=utf8", 'root', '123');
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->conn = null;
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}