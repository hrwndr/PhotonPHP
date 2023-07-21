<?php
// core/Database.php

class Database
{
    public static function connect($config)
    {
        try {
            $pdo = new PDO(
                "mysql:host={$config['db_host']};dbname={$config['db_name']}",
                $config['db_user'],
                $config['db_pass']
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}
