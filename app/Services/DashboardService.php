<?php

require_once __DIR__ . '/../Models/Justificante.php';

class DashboardService
{
    public static function indicadores()
    {
        return ['total' => Justificante::contarTodos(),
                'aprobados' =>Justificante::contarPorEstado('Aprobado'),
                'rechazados' =>Justificante::contarPorEstado('Rechazado'),
                'pendientes' => Justificante::contarPorEstado('Pendiente'),
               ];
    }
}