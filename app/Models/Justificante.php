<?php

require_once __DIR__ . '/../../config/database.php';

class Justificante
{
    public static function obtenerTodos()
    {
        $db = Database::connect();

        $sql = "
SELECT
    j.*,
    a.nombre AS nombre_alumno,
    a.matricula,
    m.nombre AS materia
FROM justificantes j
INNER JOIN alumnos a
    ON j.alumno_id = a.id
INNER JOIN materias m
    ON j.materia_id = m.id
ORDER BY j.fecha_registro DESC
";

        return $db->query($sql)
                  ->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        $db = Database::connect();

        $sql = "
SELECT
    j.*,
    a.nombre AS nombre_alumno,
    a.matricula,
    m.nombre AS materia
FROM justificantes j
INNER JOIN alumnos a
    ON j.alumno_id = a.id
INNER JOIN materias m
    ON j.materia_id = m.id
WHERE j.id = ?
";

        $stmt = $db->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function crear($data)
    {
        $db = Database::connect();

        $folio =
            'JUS-' .
            date('YmdHis');

        $sql = "
INSERT INTO justificantes
(
    folio,
    alumno_id,
    materia_id,
    fecha_ausencia,
    motivo,
    archivo_evidencia,
    estado
)
VALUES
(
    ?,?,?,?,?,?,
    'Pendiente'
)";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
    $folio,
    $data['alumno_id'],
    $data['materia_id'],
    $data['fecha_ausencia'],
    $data['motivo'],
    $data['archivo_evidencia'] ?? null
]);
    }

    public static function cambiarEstado(
        $id,
        $estado
    )
    {
        $db = Database::connect();

        $sql = "
            UPDATE justificantes
            SET estado = ?
            WHERE id = ?
        ";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            $estado,
            $id
        ]);
    }

    public static function contarTodos()
    {
        $db = Database::connect();

        return $db->query(
            "SELECT COUNT(*) FROM justificantes"
        )->fetchColumn();
    }

    public static function contarPorEstado(
        $estado
    )
    {
        $db = Database::connect();

        $sql =
        "SELECT COUNT(*)
        FROM justificantes
        WHERE estado=?";

        $stmt = $db->prepare($sql);

        $stmt->execute([$estado]);

        return $stmt->fetchColumn();
    }

    public static function guardarDecision(
        $data
    )
    {
        $db = Database::connect();

        $sql = "
        INSERT INTO decisiones
        (
          justificante_id,
          documento_presentado,
          documento_valido,
          entregado_tiempo,
          informacion_completa,
          resultado,
          usuario_id
        )
        VALUES
        (
          ?,?,?,?,?,?,?
        )";

        $stmt = $db->prepare($sql);

        return $stmt->execute([
            $data['justificante_id'],
            $data['documento_presentado'],
            $data['documento_valido'],
            $data['entregado_tiempo'],
            $data['informacion_completa'],
            $data['resultado'],
            $data['usuario_id']
        ]);
    }
	
	public static function actualizar(
    int $id,
    array $data
)
{
    $db = Database::connect();

    $sql = "
    UPDATE justificantes
SET
    materia_id=?,
    fecha_ausencia=?,
    motivo=?
WHERE id=?";

    $stmt = $db->prepare($sql);

    return $stmt->execute([
    $data['materia_id'],
    $data['fecha_ausencia'],
    $data['motivo'],
    $id
]);
}

public static function eliminar(
    int $id
)
{
    $db = Database::connect();

    $stmt = $db->prepare(
        "DELETE FROM justificantes
         WHERE id=?"
    );

    return $stmt->execute([
        $id
    ]);
}

}

?>