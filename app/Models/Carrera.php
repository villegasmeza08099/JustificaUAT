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

public static function siguienteClave()
{
    $db = Database::connect();

    $sql = "
        SELECT MAX(CAST(clave AS UNSIGNED)) AS ultimo
        FROM carreras
    ";

    $resultado = $db->query($sql)
                    ->fetch(PDO::FETCH_ASSOC);

    $siguiente = ($resultado['ultimo'] ?? 0) + 1;

    return str_pad($siguiente, 3, '0', STR_PAD_LEFT);
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
            nombre = ?
        WHERE id = ?
    ");

    return $stmt->execute([
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

public static function desactivar($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE carreras
        SET activo = 0
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}

public static function activar($id)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        UPDATE carreras
        SET activo = 1
        WHERE id = ?
    ");

    return $stmt->execute([$id]);
}


}