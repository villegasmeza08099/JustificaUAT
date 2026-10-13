<?php

require_once __DIR__ . '/../../config/database.php';

class Bitacora
{
    public static function registrar(
    $usuarioId,
    $accion,
    $descripcion
)
{
    $db = Database::connect();

    $sql = "
    INSERT INTO bitacora
    (
        usuario_id,
        accion,
        descripcion,
        modulo,
        ip
    )
    VALUES
    (
        ?,?,?,?,?
    )
    ";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        $usuarioId,
        $accion,
        $descripcion,
        'Sistema',
        $_SERVER['REMOTE_ADDR']
            ?? '0.0.0.0'
    ]);
}

public static function obtenerTodas()
{
    $db = Database::connect();

    $sql = "
        SELECT *
        FROM bitacora
        ORDER BY fecha DESC
    ";

    return $db->query($sql)
              ->fetchAll(PDO::FETCH_ASSOC);
}

}
?>