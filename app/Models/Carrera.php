<?php

require_once __DIR__ . '/../../config/database.php';

class Carrera
{
    public static function obtenerTodas()
    {
        $db = Database::connect();
        $sql = "SELECT *
               FROM carreras
               ORDER BY nombre";

        return $db->query($sql) ->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public static function obtenerPorId($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        SELECT *
        FROM carreras
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function crear($datos)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        INSERT INTO carreras
        (
            clave,
            nombre
        )
        VALUES (?,?)
    ");

    return $stmt->execute([
        $datos['clave'],
        $datos['nombre']
    ]);
}

public static function actualizar($id,$datos)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE carreras
        SET
            clave = ?,
            nombre = ?
        WHERE id = ?
    ");

    return $stmt->execute([
        $datos['clave'],
        $datos['nombre'],
        $id
    ]);
}

public static function eliminar($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        DELETE FROM carreras
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}
}