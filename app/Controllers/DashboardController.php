<?php

require_once __DIR__.'/../Models/Justificante.php';
require_once __DIR__.'/../Models/Reporte.php';

class DashboardController
{
    public function index()
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

        $graficaEstados =
            Reporte::justificantesPorEstado();

        require_once
        __DIR__ .
        '/../Views/dashboard/index.php';
    }
}