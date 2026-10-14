<?php

require_once __DIR__ . '/../../config/database.php';

class Alumno
{
    public static function obtenerTodos()
    {
        $db = Database::connect();

        $sql = "
        SELECT
    a.id,
    a.matricula,
    a.nombre,
    c.id AS carrera_id,
    c.nombre AS carrera
FROM alumnos a
INNER JOIN carreras c
ON a.carrera_id = c.id
ORDER BY a.nombre
        ";

        return $db->query($sql)
                  ->fetchAll(PDO::FETCH_ASSOC);
    }
}