<?php

require_once '../config/bootstrap.php';

$page = $_GET['page'] ?? 'dashboard';

switch ($page) {

    case 'dashboard':

        require_once '../app/Controllers/DashboardController.php';

        (new DashboardController())->index();

        break;


    /* ==========================
       USUARIOS
    ========================== */

    case 'usuarios':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->index();

        break;


    case 'usuarios_create':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->crear();

        break;


    case 'usuarios_edit':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->editar();

        break;


    case 'usuarios_show':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->show();

        break;


    case 'usuarios_activar':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->activar();

        break;


    case 'usuarios_desactivar':

        require_once '../app/Controllers/UsuarioController.php';

        (new UsuarioController())->desactivar();

        break;


    /* ==========================
       JUSTIFICANTES
    ========================== */

    case 'justificantes':

        require_once '../app/Controllers/JustificanteController.php';

        (new JustificanteController())->index();

        break;


    case 'justificantes_create':

        require_once '../app/Controllers/JustificanteController.php';

        (new JustificanteController())->crear();

        break;


    case 'justificantes_show':

        require_once '../app/Controllers/JustificanteController.php';

        (new JustificanteController())->show();

        break;


    case 'justificantes_edit':

        require_once '../app/Controllers/JustificanteController.php';

        (new JustificanteController())->edit();

        break;


    case 'justificantes_delete':

        require_once '../app/Controllers/JustificanteController.php';

        (new JustificanteController())->delete();

        break;


    /* ==========================
       DECISIONES
    ========================== */

    case 'decision_evaluar':

        require_once '../app/Controllers/DecisionController.php';

        (new DecisionController())->evaluar();

        break;


    /* ==========================
       BITÁCORA
    ========================== */

    case 'bitacora':

        require_once '../app/Controllers/BitacoraController.php';

        (new BitacoraController())->index();

        break;


    default:

        require_once '../app/Controllers/DashboardController.php';

        (new DashboardController())->index();
}