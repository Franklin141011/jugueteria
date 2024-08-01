<?php

namespace Dao;

use Database\Database;

class Dao {
    private static $conn;

    public static function getConn() {
        if (self::$conn === null) {
            $database = new Database();
            self::$conn = $database->connect();
        }
        return self::$conn;
    }
}
