<?php
require_once '../.env';
class DB {
    private static $connection;

    public static function getConnection()
    {
        if (self::$connection === null){
            $dbHost = getenv('DB_HOST');
            $dbUser = getenv('DB_USER');
            $dbPassword = getenv('DB_PASSWORD');
            $dbName = getenv('DB_NAME');
            self::$connection = mysqli_connect($dbHost,$dbUser,$dbPassword,$dbName);
            if (self::$connection === null){
                die('Error connect to Data Base');
            }
        }
        return self::$connection;
    }
}


