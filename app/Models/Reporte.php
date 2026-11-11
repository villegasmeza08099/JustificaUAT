<?php

require_once __DIR__ . '/../../config/database.php';

class Reporte
{
    public static function justificantesPorEstado()
{
    $db = Database::connect();

    $sql = "SELECT
        estado,
        COUNT(*) total
        FROM justificantes
        GROUP BY estado";

    return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}


    public static function justificantesPorCarrera()
    {
        $db = Database::connect();

        $sql = "SELECT
            carrera,
            COUNT(*) total
            FROM justificantes
            GROUP BY carrera";
        return $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function justificantesPorMes()
    {
        $db = Database::connect();

        $sql = "SELECT
            MONTH(fecha_registro) mes,
            COUNT(*) total
            FROM justificantes
            GROUP BY MONTH(fecha_registro)";

        return $db->query($sql) ->fetchAll(PDO::FETCH_ASSOC);
    }
	
	public static function justificantesPorEstadoAlumno(
    $alumnoId
)
{
    $db = Database::connect();

    $stmt = $db->prepare("
        SELECT
            estado,
            COUNT(*) total
        FROM justificantes
        WHERE alumno_id = ?
        GROUP BY estado
    ");

    $stmt->execute([$alumnoId]);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>