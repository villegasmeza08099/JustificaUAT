<?php

require_once __DIR__.'/../Models/Materia.php';
require_once __DIR__.'/../Models/Carrera.php';

class MateriaController
{
    public function index()
    {
        $materias = Materia::obtenerTodas();

        require_once __DIR__ .
            '/../Views/materias/index.php';
    }
	
	public function crear()
	{
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			Materia::crear([
				'nombre' => $_POST['nombre'],
				'clave' => $_POST['clave'],
				'carrera_id' => $_POST['carrera_id']
			]);

			header('Location: index.php?page=materias');
			exit;
		}

		$carreras = Carrera::obtenerTodas();

		require_once __DIR__ .
			'/../Views/materias/create.php';
	}
	
	public function editar()
{
    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        Materia::actualizar(
            $id,
            [
                'clave' => $_POST['clave'],
                'nombre' => $_POST['nombre'],
                'carrera_id' => $_POST['carrera_id']
            ]
        );

        header('Location:index.php?page=materias');
        exit;
    }

    $materia = Materia::obtenerPorId($id);
    $carreras = Carrera::obtenerTodas();

    require_once __DIR__ .
        '/../Views/materias/edit.php';
}

public function desactivar()
{
    Materia::desactivar($_GET['id']);

    header('Location:index.php?page=materias');
    exit;
}

public function activar()
{
    Materia::activar($_GET['id']);

    header('Location:index.php?page=materias');
    exit;
}


	
	
}