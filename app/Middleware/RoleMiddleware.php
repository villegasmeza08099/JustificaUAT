<?php

class RoleMiddleware
{
    public static function handle(
        string $rol
    )
    {
        if (
            !isset($_SESSION['rol'])
        ) {

            header(
                'Location: login.php'
            );

            exit;
        }

        if (
            $_SESSION['rol']
            !==
            $rol
        ) {

            die(
                'Acceso denegado.'
            );
        }
    }

    public static function allow(
        array $roles
    )
    {
        if (
            !in_array(
                $_SESSION['rol'],
                $roles
            )
        ) {

            die(
                'No tiene permisos.'
            );
        }
    }
}