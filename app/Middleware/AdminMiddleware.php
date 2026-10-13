<?php

class AdminMiddleware
{
    public static function handle()
    {
        if(
            !isset(
                $_SESSION['rol']
            )
        ){

            header(
                'Location: login.php'
            );

            exit;
        }

        if(
            $_SESSION['rol']
            !==
            'Administrador'
        ){

            die(
              'Acceso restringido.'
            );
        }
    }
}