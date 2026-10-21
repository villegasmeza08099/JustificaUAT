<?php

require_once __DIR__ . '/../Models/Usuario.php';
require_once __DIR__ . '/../Models/Bitacora.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') 
		{
            return;
        }

        $correo = trim($_POST['correo'] ?? '');
        $password = $_POST['password'] ?? '';
		
	    $usuario = Usuario::buscarPorCorreo($correo);
    
        if (!$usuario) 
		{
            $_SESSION['error'] = 'Usuario no encontrado.';
            header('Location: login.php');
            exit;
        }

        if (!password_verify($password, $usuario['password'])) 
		{
            $_SESSION['error'] = 'Contraseña incorrecta.';
            header('Location: login.php');
            exit;
        }

        if (!$usuario['activo']) 
		{
            $_SESSION['error'] = 'Usuario deshabilitado.';
            header('Location: login.php');
            exit;
        }

        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        Usuario::actualizarUltimoAcceso($usuario['id']);
		
		Bitacora::registrar($usuario['id'],'Inicio de sesión','Acceso al sistema');
		
        header('Location: index.php?page=dashboard');
        exit;
    }

    public function logout()
    {
        session_destroy();
        header('Location: login.php');
        exit;
    }
}