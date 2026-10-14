<?php

require_once __DIR__ . '/../../config/database.php';

class Materia
{
    public static function obtenerTodas()
    {
        $db = Database::connect();

        $sql = "
        SELECT
        id,
        nombre,
        carrera_id
    FROM materias
    ORDER BY nombre
        ";

        return $db->query($sql)
                  ->fetchAll(PDO::FETCH_ASSOC);
    }
}