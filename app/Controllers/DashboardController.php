<?php

require_once __DIR__.'/../Models/Justificante.php';
require_once __DIR__.'/../Models/Reporte.php';
require_once __DIR__.'/../Models/Alumno.php';

class DashboardController
{
    public function index()
{
    if(esAlumno())
    {
        $alumno =
            Alumno::obtenerPorUsuario(
                $_SESSION['usuario_id']
            );

        $alumnoId = $alumno['id'];

        $total =
            Justificante::contarTodosPorAlumno(
                $alumnoId
            );

        $aprobados =
            Justificante::contarPorEstadoAlumno(
                'Aprobado',
                $alumnoId
            );

        $rechazados =
            Justificante::contarPorEstadoAlumno(
                'Rechazado',
                $alumnoId
            );

        $pendientes =
            Justificante::contarPorEstadoAlumno(
                'Pendiente',
                $alumnoId
            );

        $correccion =
            Justificante::contarPorEstadoAlumno(
                'Correccion',
                $alumnoId
            );

        $revision =
            Justificante::contarPorEstadoAlumno(
                'RevisionEspecial',
                $alumnoId
            );
    }
    else
    {
        $total =
            Justificante::contarTodos();

        $aprobados =
            Justificante::contarPorEstado(
                'Aprobado'
            );

        $rechazados =
            Justificante::contarPorEstado(
                'Rechazado'
            );

        $pendientes =
            Justificante::contarPorEstado(
                'Pendiente'
            );

        $correccion =
            Justificante::contarPorEstado(
                'Correccion'
            );

        $revision =
            Justificante::contarPorEstado(
                'RevisionEspecial'
            );
    }

   
   if(esAlumno())
	{
		$graficaEstados =
			Reporte::justificantesPorEstadoAlumno(
				$alumnoId
			);
	}
	else
	{
		$graficaEstados =
			Reporte::justificantesPorEstado();
	}

    require_once __DIR__ .  '/../Views/dashboard/index.php';
}
}