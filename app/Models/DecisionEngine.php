<?php

class DecisionEngine
{
    public static function evaluar(bool $documentoPresentado,bool $documentoValido,bool $entregadoATiempo,bool $informacionCompleta)
    {
        if (!$documentoPresentado) 
		{
            return 'Rechazado';
        }

        if (!$documentoValido) 
		{
            return 'Rechazado';
        }

        if (!$entregadoATiempo) 
		{
            return 'RevisionEspecial';
        }

        if (!$informacionCompleta) 
		{
            return 'Correccion';
        }
        return 'Aprobado';
    }
}
?>