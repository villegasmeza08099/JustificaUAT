<?php

require_once __DIR__ . '/../Models/Bitacora.php';

class BitacoraController
{
    public function index()
    {
        $bitacoras = Bitacora::obtenerTodas();

        require_once __DIR__ .
        '/../Views/bitacora/index.php';
    }
}