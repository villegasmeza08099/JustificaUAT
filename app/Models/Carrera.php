<?php

require_once __DIR__ . '/../../config/database.php';

class Carrera
{
    public static function obtenerTodas()
    {
        $db = Database::connect();

        $sql = "
        SELECT *
        FROM carreras
        ORDER BY nombre
        ";

        return $db->query($sql)
                  ->fetchAll(PDO::FETCH_ASSOC);
    }
}