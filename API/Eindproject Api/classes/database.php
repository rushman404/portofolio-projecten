<?php
class Database
{
    public static function start()
    {
        $dbSevername = "127.0.0.1";
        $dbUsername = "root";
        $dbPassword = "mysql";
        $dbDatabase = "api";

        $conn = new mysqli($dbSevername, $dbUsername, $dbPassword, $dbDatabase);

        if ($conn->connect_error) {
            die("Connectie mislukt: ". $conn->connect_error);
        }

        return $conn;
    }
}