<?php

class AuthService
{
    public static function check()
    {
        return isset($_SESSION['usuario_id']);
    }

    public static function user()
    {
        return ['id' => $_SESSION['usuario_id'] ?? null,
            'nombre' => $_SESSION['nombre'] ?? null,
            'rol' => $_SESSION['rol'] ?? null
             ];
    }

    public static function requireRole($rol)
    {
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== $rol) 
		{
            die('Acceso denegado');
        }
    }
}

?>