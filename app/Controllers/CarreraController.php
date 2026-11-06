<?php

require_once __DIR__.'/../Models/Carrera.php';

class CarreraController
{
    public function index()
    {
        $carreras = Carrera::obtenerTodas();

        require_once __DIR__ .
            '/../Views/carreras/index.php';
    }
	
	public function crear()
{
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
		
		Carrera::crear([
            'clave' => $_POST['clave'],
            'nombre' => $_POST['nombre']
        ]);

        header(
            'Location:index.php?page=carreras'
        );
	    exit;
    }
	
	$claveSiguiente = Carrera::siguienteClave();
        require_once __DIR__ .  '/../Views/carreras/create.php';

    require_once __DIR__ .
        '/../Views/carreras/create.php';
}

public function editar()
{
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        Carrera::actualizar(
            $id,
            [
               
                'nombre' => $_POST['nombre']
            ]
        );

        header(
            'Location:index.php?page=carreras'
        );

        exit;
    }

    $carrera =
        Carrera::obtenerPorId($id);

    require_once __DIR__ .
        '/../Views/carreras/edit.php';
}

public function eliminar()
{
    $id = $_GET['id'];

    Carrera::eliminar($id);

    header(
        'Location:index.php?page=carreras'
    );

    exit;
}

public function desactivar()
{
    $id = $_GET['id'];

    Carrera::desactivar($id);

    header('Location: index.php?page=carreras');
    exit;
}

public function activar()
{
    $id = $_GET['id'];

    Carrera::activar($id);

    header('Location: index.php?page=carreras');
    exit;
}

}