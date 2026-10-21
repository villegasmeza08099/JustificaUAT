<?php

class ReportService
{
    public static function exportarCSV($datos,$archivo)
    {
        $fp = fopen($archivo,'w');

        foreach($datos as $fila)
		{
            fputcsv($fp,$fila);
        }

        fclose($fp);
    }
}