<?php

class Logger
{
    public static function info(string $mensaje): void
    {
        $linea = date('Y-m-d H:i:s') . ' [INFO] ' . $mensaje  . PHP_EOL;

        file_put_contents(  __DIR__ . '/../../storage/logs/app.log', $linea, FILE_APPEND );
    }

    public static function error(string $mensaje): void
    {
        $linea = date('Y-m-d H:i:s') . ' [ERROR] '  .  $mensaje  . PHP_EOL;

        file_put_contents(  __DIR__ . '/../../storage/logs/error.log', $linea, FILE_APPEND );
    }
	
	public static function write(string $mensaje)
    {
        $log = date('Y-m-d H:i:s').' '.$mensaje .PHP_EOL;
 
        file_put_contents( __DIR__ .'/../../storage/logs/app.log', $log, FILE_APPEND);
    }
}