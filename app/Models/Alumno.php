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
	
	public static function obtenerPorUsuario(
    $usuarioId
)
{
    $db = Database::connect();

    $sql = "
    SELECT
        a.*,
        c.nombre AS carrera
    FROM alumnos a
    INNER JOIN carreras c
        ON a.carrera_id = c.id
    WHERE a.usuario_id = ?
    LIMIT 1
    ";

    $stmt = $db->prepare($sql);

    $stmt->execute([$usuarioId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function crear($data)
{
    $db = Database::connect();

    $sql = "
    INSERT INTO alumnos
    (
        matricula,
        nombre,
        carrera_id,
        usuario_id
    )
    VALUES
    (
        ?, ?, ?, ?
    )
    ";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        $data['matricula'],
        $data['nombre'],
        $data['carrera_id'],
        $data['usuario_id']
    ]);
}
	
	
}