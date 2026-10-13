<?php

class UploadManager
{
    private static array $permitidos =
    [
        'pdf',
        'jpg',
        'jpeg',
        'png'
    ];

    public static function guardar(
        array $archivo
    ): ?string
    {
        if (
            empty($archivo['name'])
        ) {
            return null;
        }

        $extension =
        strtolower(
            pathinfo(
                $archivo['name'],
                PATHINFO_EXTENSION
            )
        );

        if (
            !in_array(
                $extension,
                self::$permitidos
            )
        ) {

            throw new Exception(
                "Formato no permitido."
            );
        }

        $nombreArchivo =
        uniqid('JUS_')
        . '.'
        . $extension;

        $rutaDestino =
        __DIR__
        . '/../../storage/uploads/justificantes/'
        . $nombreArchivo;

        move_uploaded_file(
            $archivo['tmp_name'],
            $rutaDestino
        );

        return $nombreArchivo;
    }
	
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
}