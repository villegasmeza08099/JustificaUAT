<?php

require_once __DIR__ . '/../Models/Justificante.php';
require_once __DIR__ . '/../Models/DecisionEngine.php';

class JustificanteController
{
    public function index()
    {
        $justificantes = Justificante::obtenerTodos();

        require_once __DIR__ .
            '/../Views/justificantes/index.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $archivo = null;

            if (!empty($_FILES['evidencia']['name'])) {

                $nombreArchivo =
                    time() .
                    '_' .
                    basename(
                        $_FILES['evidencia']['name']
                    );

                move_uploaded_file(
                    $_FILES['evidencia']['tmp_name'],
                    __DIR__ .
                    '/../../storage/uploads/' .
                    $nombreArchivo
                );

                $archivo = $nombreArchivo;
            }

            Justificante::crear([
                'matricula' => $_POST['matricula'],
                'nombre_alumno' => $_POST['nombre_alumno'],
                'carrera' => $_POST['carrera'],
                'materia' => $_POST['materia'],
                'fecha_ausencia' => $_POST['fecha_ausencia'],
                'motivo' => $_POST['motivo'],
                'archivo_evidencia' => $archivo
            ]);
			
			Bitacora::registrar(
    $_SESSION['usuario_id'],
    'Registro de justificante',
    'Nuevo justificante registrado'
);

            header(
                'Location: index.php?page=justificantes'
            );
            exit;
        }

        require_once __DIR__ .
        '/../Views/justificantes/create.php';
    }

    public function aprobar()
    {
        $id = $_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'Aprobado'
        );

        header(
            'Location: index.php?page=justificantes'
        );
        exit;
    }

    public function rechazar()
    {
        $id = $_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'Rechazado'
        );

        header(
            'Location: index.php?page=justificantes'
        );
        exit;
    }
	
	public function show()
{
    $id = $_GET['id'];

    $justificante =
    Justificante::obtenerPorId($id);

    require_once
    __DIR__ .
    '/../Views/justificantes/show.php';
}
public function edit()
{
    $id = $_GET['id'];

    if(
        $_SERVER['REQUEST_METHOD']
        === 'POST'
    ){

        Justificante::actualizar(
            $id,
            [
                'materia' =>
                    $_POST['materia'],

                'fecha_ausencia' =>
                    $_POST['fecha_ausencia'],

                'motivo' =>
                    $_POST['motivo']
            ]
        );

        header(
            'Location:index.php?page=justificantes'
        );

        exit;
    }

    $justificante =
    Justificante::obtenerPorId($id);

    require_once
    __DIR__ .
    '/../Views/justificantes/edit.php';
}
public function delete()
{
    $id = $_GET['id'];

    Justificante::eliminar($id);

    header(
        'Location:index.php?page=justificantes'
    );

    exit;
}

}
?>