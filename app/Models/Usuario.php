<?php

require_once __DIR__ . '/../../config/database.php';

class Usuario
{
    public static function obtenerTodos()
    {
        $db = Database::connect();

        $sql = "SELECT * FROM usuarios
                ORDER BY nombre";

        return $db->query($sql)
                  ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        $db = Database::connect();

        $sql = "SELECT *
                FROM usuarios
                WHERE id = ?";

        $stmt = $db->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function buscarPorCorreo($correo)
    {
        $db = Database::connect();

        $sql = "SELECT *
                FROM usuarios
                WHERE correo = ?
                LIMIT 1";

        $stmt = $db->prepare($sql);

        $stmt->execute([$correo]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function crear($data)
    {
        $db = Database::connect();

        $sql = "INSERT INTO usuarios
                (
                    nombre,
                    correo,
                    password,
                    rol,
                    activo
                )
                VALUES
                (
                    ?, ?, ?, ?, 1
                )";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            $data['nombre'],
            $data['correo'],
            $data['password'],
            $data['rol']
        ]);
    }

    public static function actualizar(
        $id,
        $data
    )
    {
        $db = Database::connect();

        $sql = "UPDATE usuarios
                SET
                    nombre=?,
                    correo=?,
                    rol=?
                WHERE id=?";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            $data['nombre'],
            $data['correo'],
            $data['rol'],
            $id
        ]);
    }

    public static function eliminar($id)
    {
        $db = Database::connect();

        $sql = "UPDATE usuarios
                SET activo = 0
                WHERE id = ?";

        $stmt = $db->prepare($sql);

        return $stmt->execute([$id]);
    }

    public static function actualizarUltimoAcceso(
        $id
    )
    {
        $db = Database::connect();

        $sql = "UPDATE usuarios
                SET ultimo_acceso = NOW()
                WHERE id = ?";

        $stmt = $db->prepare($sql);

        return $stmt->execute([$id]);
    }
	public static function cambiarPassword(
    $id,
    $hash
)
{
    $db = Database::connect();

    $sql = "
        UPDATE usuarios
        SET password = ?
        WHERE id = ?
    ";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        $hash,
        $id
    ]);
}

public static function activar(
    $id
)
{
    $db = Database::connect();

    $sql = "
        UPDATE usuarios
        SET activo = 1
        WHERE id = ?
    ";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        $id
    ]);
}

public static function desactivar(
    $id
)
{
    $db = Database::connect();

    $sql = "
        UPDATE usuarios
        SET activo = 0
        WHERE id = ?
    ";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
        $id
    ]);
}
}
?>