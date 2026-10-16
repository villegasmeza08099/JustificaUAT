<?php

require_once
__DIR__.'/../Models/Usuario.php';

require_once
__DIR__.'/../Models/Bitacora.php';

require_once __DIR__ . '/../Models/Alumno.php';

class UsuarioController
{
    public function index()
    {
        $usuarios =
        Usuario::obtenerTodos();

        require_once
        __DIR__ .
        '/../Views/usuarios/index.php';
    }

    public function crear()
    {
		
		
        if(
            $_SERVER['REQUEST_METHOD']
            ===
            'POST'
        ){

            $usuarioId = Usuario::crear([
    'nombre' => $_POST['nombre'],
    'correo' => $_POST['correo'],
    'password' => password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    ),
    'rol_id' => $_POST['rol_id']
]);
			
			if ($_POST['rol_id'] == 3)
{
    Alumno::crear([
        'matricula'  => $_POST['matricula'],
        'nombre'     => $_POST['nombre'],
        'carrera_id' => $_POST['carrera_id'],
        'usuario_id' => $usuarioId
    ]);
}

            Bitacora::registrar(
                $_SESSION['usuario_id'],
                'Crear Usuario',
                $_POST['correo']
            );
			
			Bitacora::registrar(
    $_SESSION['usuario_id'],
    'Alta de usuario',
    $_POST['correo']
);

            header(
                'Location: index.php?page=usuarios'
            );

            exit;
        }

require_once __DIR__ . '/../Models/Carrera.php';
		
		$carreras = Carrera::obtenerTodas();
        require_once __DIR__ . '/../Views/usuarios/create.php';
		
    }

    public function editar()
    {
        $id =
        $_GET['id'];

        if(
            $_SERVER['REQUEST_METHOD']
            ===
            'POST'
        ){

            Usuario::actualizar(
                $id,
                [
                    'nombre' =>
                        $_POST['nombre'],

                    'correo' =>
                        $_POST['correo'],

                    'rol_id' =>
                        $_POST['rol_id']
                ]
            );

            Bitacora::registrar(
                $_SESSION['usuario_id'],
                'Actualizar Usuario',
                'ID: '.$id
            );

            header(
                'Location: index.php?page=usuarios'
            );

            exit;
        }

        $usuario =
        Usuario::obtenerPorId($id);

        require_once
        __DIR__ .
        '/../Views/usuarios/edit.php';
    }

    public function show()
    {
        $id =
        $_GET['id'];

        $usuario =
        Usuario::obtenerPorId($id);

        require_once
        __DIR__ .
        '/../Views/usuarios/show.php';
    }

    public function desactivar()
    {
        $id =
        $_GET['id'];

        Usuario::desactivar($id);

        header(
            'Location:index.php?page=usuarios'
        );
    }

    public function activar()
    {
        $id =
        $_GET['id'];

        Usuario::activar($id);

        header(
            'Location:index.php?page=usuarios'
        );
    }
}