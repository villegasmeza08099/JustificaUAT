<?php

class GuestMiddleware
{
    public static function handle()
    {
        if (isset($_SESSION['usuario_id']))
		{

            header('Location: index.php?page=dashboard');
            exit;
        }
    }
}