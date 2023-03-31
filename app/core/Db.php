<?php

class Db {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "task1";

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbName, $this->user, $this->password);
//            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

//    protected function connect() {
//
//        $pdo = new PDO('mysql:host=localhost;dbname=task1', $this->user, $this->password);
//        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
//        return $pdo;
//
//    }
}