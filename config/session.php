<?php

if (
    session_status() ===
    PHP_SESSION_NONE
) {
    session_start();
}

/**
 * Validar sesión
 */
function validarSesion(): void
{
    if (!isset($_SESSION['usuario_id'])) {

        header(
            'Location: login.php'
        );

        exit;
    }
}

/**
 * Obtener usuario actual
 */
function usuarioActual(): ?array
{
    if (
        !isset($_SESSION['usuario_id'])
    ) {
        return null;
    }

    return [
        'id' =>
        $_SESSION['usuario_id'],

        'nombre' =>
        $_SESSION['nombre'],

        'rol' =>
        $_SESSION['rol']
    ];
}

function esAdmin()
{
    return isset($_SESSION['rol']) &&
           $_SESSION['rol'] === 'Administrador';
}

function esGestionEscolar()
{
    return isset($_SESSION['rol']) &&
           $_SESSION['rol'] === 'GestionEscolar';
}

function esAlumno()
{
    return isset($_SESSION['rol']) &&
           $_SESSION['rol'] === 'Alumno';
}