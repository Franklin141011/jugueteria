<?php

namespace Database;

use PDO;
use PDOException;

class Database {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $port;
    private $conn;

    public function __construct() {
        $this->host = getenv('DB_SERVER');
        $this->dbname = getenv('DB_DATABASE');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PSWD');
        $this->port = getenv('DB_PORT');
    }

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
