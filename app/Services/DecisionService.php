<?php

require_once __DIR__ .
'/../Models/DecisionEngine.php';

class DecisionService
{
    public static function evaluarJustificante(
        array $justificante
    )
    {
        $documento =
            !empty(
                $justificante['archivo_evidencia']
            );

        $valido =
            !empty(
                $justificante['archivo_evidencia']
            );

        $tiempo =
            true;

        $completo =
            !empty(
                $justificante['motivo']
            );

        return DecisionEngine::evaluar(
            $documento,
            $valido,
            $tiempo,
            $completo
        );
    }
}

class UploadManager
{
public static function upload(
$file
)
{
if(
empty($file['name'])
){
return null;
}
 
$extension =
strtolower(
pathinfo(
$file['name'],
PATHINFO_EXTENSION
)
);
 
$permitidos = [
'pdf',
'png',
'jpg',
'jpeg'
];
 
if(
!in_array(
$extension,
$permitidos
)
){
throw new Exception(
"Archivo no permitido"
);
}
 
$nombre =
uniqid('JUS_')
.'.'
.$extension;
 
$ruta =
__DIR__
.'/../../storage/uploads/justificantes/'
.$nombre;
 
move_uploaded_file(
$file['tmp_name'],
$ruta
);
 
return $nombre;
}