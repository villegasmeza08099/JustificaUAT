<?php

class CSRFMiddleware
{
    public static function token()
    {
        if(empty($_SESSION['csrf_token']))
		{
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return  $_SESSION['csrf_token'];
    }

    public static function validate()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' )
		{
            $token = $_POST['csrf_token'] ?? '';
            if(!hash_equals($_SESSION['csrf_token'],$token))
			{
                die('Token inválido.');
            }
        }
    }
}