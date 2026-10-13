<?php

class Database
{
    private static string $host = 'localhost';
    private static string $database = 'justificauat';
    private static string $user = 'root';
    private static string $password = '';

    public static function connect(): PDO
    {
        try {

            $pdo = new PDO(
                "mysql:host=" .
                self::$host .
                ";dbname=" .
                self::$database .
                ";charset=utf8mb4",

                self::$user,
                self::$password
            );

            $pdo->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            $pdo->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            return $pdo;

        } catch (PDOException $e) {

            die(
                'Error de conexión: ' .
                $e->getMessage()
            );
        }
    }
}

?>