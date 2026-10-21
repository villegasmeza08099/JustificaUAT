<?php

class PDFReport
{
    public static function guardar(string $nombre,string $contenido ): string
    {
        $ruta =  __DIR__  . '/../../storage/reports/pdf/' . $nombre;

        file_put_contents($ruta,$contenido);

        return $ruta;
    }
}
?>