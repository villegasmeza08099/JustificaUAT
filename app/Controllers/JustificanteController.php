<?php
require_once __DIR__ . '/../Models/Justificante.php';
require_once __DIR__ . '/../Models/DecisionEngine.php';
require_once __DIR__ . '/../Models/Bitacora.php';
require_once __DIR__ . '/../Models/Alumno.php';
require_once __DIR__ . '/../Models/Materia.php';


class JustificanteController
{
    public function index()
    {
		if(esAlumno())
    {
        $alumno = Alumno::obtenerPorUsuario($_SESSION['usuario_id']);

        $justificantes = Justificante::obtenerPorAlumno($alumno['id']);
    }
    else
    {
        $justificantes = Justificante::obtenerTodos();
    }

         require_once __DIR__ . '/../Views/justificantes/index.php';
    }

    public function crear()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
            $archivo = null;

            if (!empty($_FILES['evidencia']['name'])) 
			{
                $nombreArchivo = time() . '_' . basename($_FILES['evidencia']['name']);

                move_uploaded_file($_FILES['evidencia']['tmp_name'],__DIR__ .'/../../storage/uploads/justificantes/' .$nombreArchivo);

                $archivo = $nombreArchivo;
            }

            Justificante::crear([
                    'alumno_id' => $_POST['alumno_id'],
                    'materia_id' => $_POST['materia_id'],
                    'fecha_ausencia' => $_POST['fecha_ausencia'],
                    'motivo' => $_POST['motivo'],
                    'archivo_evidencia' => $archivo
             ]);

			
			Bitacora::registrar(
                      $_SESSION['usuario_id'],
                      'Registro de justificante',
                      'Nuevo justificante registrado'
            );

            header('Location: index.php?page=justificantes');
            exit;
        }
          require_once  __DIR__ . '/../Models/Alumno.php';
          require_once __DIR__ . '/../Models/Materia.php';

        if (esAlumno())
        {
            $alumno = Alumno::obtenerPorUsuario($_SESSION['usuario_id']);

            $materias = Materia::obtenerPorCarrera($alumno['carrera_id']);
        }
        else
        {
            $alumnos = Alumno::obtenerTodos();
            $materias = Materia::obtenerTodas();
        }
        require_once  __DIR__ . '/../Views/justificantes/create.php';		
       
    }

    public function aprobar()
    {
        $id = $_GET['id'];

        Justificante::cambiarEstado($id,'Aprobado');
        header('Location: index.php?page=justificantes');
        exit;
    }

    public function rechazar()
    {
        $id = $_GET['id'];

        Justificante::cambiarEstado($id,'Rechazado');

        header('Location: index.php?page=justificantes');
        exit;
    }
	
	public function show()
    {
        $id = $_GET['id'];

        $justificante = Justificante::obtenerPorId($id);
        require_once __DIR__ . '/../Views/justificantes/show.php';
    }

    public function edit()
    {
        $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
	{
        $justificante = Justificante::obtenerPorId($id);
        $archivoActual = $justificante['archivo_evidencia'];

    if(!empty($_FILES['evidencia']['name']))
    {
        $nombreArchivo = time() . '_' . basename($_FILES['evidencia']['name']);

        move_uploaded_file($_FILES['evidencia']['tmp_name'], __DIR__ . '/../../storage/uploads/justificantes/' . $nombreArchivo);

        $archivoActual = $nombreArchivo;
    }

    Justificante::actualizar($id,
    [
        'materia_id' =>
            $_POST['materia_id'],
        'fecha_ausencia' =>
            $_POST['fecha_ausencia'],
        'motivo' =>
            $_POST['motivo'],
        'archivo_evidencia' => $archivoActual
    ]);

        header('Location:index.php?page=justificantes');
        exit;
    }

    require_once  __DIR__ . '/../Models/Materia.php';

    $materias = Materia::obtenerTodas();

    $justificante = Justificante::obtenerPorId($id);
		
		$archivoActual = $justificante['archivo_evidencia'];

    require_once  __DIR__ . '/../Views/justificantes/edit.php';
}

public function delete()
{
    $id = $_GET['id'];

    Justificante::eliminar($id);

    header('Location:index.php?page=justificantes');
    exit;
}

public function review()
{
    $id = $_GET['id'] ?? null;

    if (!$id) 
	{
        header('Location:index.php?page=justificantes');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $resultado = DecisionEngine::evaluar(
                (bool)$_POST['documento_presentado'],
                (bool)$_POST['documento_valido'],
                (bool)$_POST['entregado_tiempo'],
                (bool)$_POST['informacion_completa']
            );

        Justificante::cambiarEstado($id,$resultado);

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Evaluación DSS',
            'Resultado: ' . $resultado
        );

        header('Location:index.php?page=justificantes');
        exit;
    }

    $justificante = Justificante::obtenerPorId($id);

    require_once __DIR__ . '/../Views/justificantes/review.php';
}

}
?>