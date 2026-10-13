<?php

session_start();

require_once
'../app/Controllers/AuthController.php';

$controller =
new AuthController();

$controller->logout();

?>