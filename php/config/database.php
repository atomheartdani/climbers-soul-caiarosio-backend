<?php

class Database {
    public $conn;

    public function getConnection() {
        require 'include/config.php';

        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host=' . $hn . ';dbname=' . $db, $un, $pw);
            $this->conn->exec('set names utf8');
        } catch (PDOException $exception) {
            echo 'Errore di connessione: ' . $exception->getMessage();
        }
        return $this->conn;
    }
}
