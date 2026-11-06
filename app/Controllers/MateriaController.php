<?php

require_once __DIR__.'/../Models/Materia.php';

class MateriaController
{
    public function index()
    {
        $materias = Materia::obtenerTodas();

        require_once __DIR__ .
            '/../Views/materias/index.php';
    }
}