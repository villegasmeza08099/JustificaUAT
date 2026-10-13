<?php

session_start();

require_once '../config/bootstrap.php';

/*
|--------------------------------------------------------------------------
| Router básico
|--------------------------------------------------------------------------
*/

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'dashboard':

        require_once
        '../app/Controllers/DashboardController.php';

        $controller =
        new DashboardController();

        $controller->index();

        break;

    case 'usuarios':

        require_once
        '../app/Controllers/UsuarioController.php';

        $controller =
        new UsuarioController();

        $controller->index();

        break;

    case 'usuarios_create':

        require_once
        '../app/Controllers/UsuarioController.php';

        $controller =
        new UsuarioController();

        $controller->crear();

        break;

    case 'usuarios_edit':

        require_once
        '../app/Controllers/UsuarioController.php';

        $controller =
        new UsuarioController();

        $controller->editar();

        break;

    case 'justificantes':

        require_once
        '../app/Controllers/JustificanteController.php';

        $controller =
        new JustificanteController();

        $controller->index();

        break;

    case 'justificantes_create':

        require_once
        '../app/Controllers/JustificanteController.php';

        $controller =
        new JustificanteController();

        $controller->crear();

        break;

    case 'decision_evaluar':

        require_once
        '../app/Controllers/DecisionController.php';

        $controller =
        new DecisionController();

        $controller->evaluar();

        break;
		
	case 'usuarios_show':
    (new UsuarioController())->show();
    break;

case 'usuarios_create':
    (new UsuarioController())->create();
    break;

case 'usuarios_edit':
    (new UsuarioController())->edit();
    break;

case 'usuarios_activar':
    (new UsuarioController())->activar();
    break;

case 'usuarios_desactivar':
    (new UsuarioController())->desactivar();
    break;
	case 'justificantes_show':
    (new JustificanteController())
        ->show();
    break;

case 'justificantes_edit':
    (new JustificanteController())
        ->edit();
    break;

case 'justificantes_delete':
    (new JustificanteController())
        ->delete();
    break;
	case 'bitacora':

    require_once
    '../app/Controllers/BitacoraController.php';

    $controller =
    new BitacoraController();

    $controller->index();

    break;

    default:

        require_once
        '../app/Controllers/DashboardController.php';

        $controller =
        new DashboardController();

        $controller->index();
}