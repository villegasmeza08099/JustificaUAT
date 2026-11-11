<?php

require_once __DIR__ . '/../../config/database.php';

class Materia
{
	//
    public static function obtenerTodas()
{
    $db = Database::connect();

    $sql = "
        SELECT
            m.id,
            m.clave,
            m.nombre,
            m.carrera_id,
            m.activo,
            c.nombre AS carrera
        FROM materias m
        INNER JOIN carreras c
            ON c.id = m.carrera_id
        ORDER BY m.nombre
    ";

    return $db->query($sql)
              ->fetchAll(PDO::FETCH_ASSOC);
}

public static function obtenerActivas()
{
    $db = Database::connect();

    $sql = "
        SELECT
            m.id,
            m.clave,
            m.nombre,
            m.carrera_id,
            m.activo,
            c.nombre AS carrera
        FROM materias m
        INNER JOIN carreras c
            ON c.id = m.carrera_id
        WHERE m.activo = 1
        ORDER BY m.nombre
    ";

    return $db->query($sql)
              ->fetchAll(PDO::FETCH_ASSOC);
}
	
	public static function obtenerPorCarrera($carreraId)
{
    $db = Database::connect();

    $sql = "
        SELECT *
        FROM materias
        WHERE carrera_id = ?
        AND activo = 1
        ORDER BY nombre
    ";

    $stmt = $db->prepare($sql);
    $stmt->execute([$carreraId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
	
	public static function crear($datos)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        INSERT INTO materias
        (
            nombre,
            clave,
            carrera_id
        )
        VALUES (?,?,?)
    ");

    return $stmt->execute([
        $datos['nombre'],
        $datos['clave'],
        $datos['carrera_id']
    ]);
}

public static function desactivar($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE materias
        SET activo = 0
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}

public static function activar($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE materias
        SET activo = 1
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}

public static function obtenerPorId($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        SELECT *
        FROM materias
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function actualizar($id,$datos)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE materias
        SET
            clave = ?,
            nombre = ?,
            carrera_id = ?
        WHERE id = ?
    ");

    return $stmt->execute([
        $datos['clave'],
        $datos['nombre'],
        $datos['carrera_id'],
        $id
    ]);
}

}