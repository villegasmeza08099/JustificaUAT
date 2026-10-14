<?php

require_once '../config/bootstrap.php';

require_once '../app/Controllers/AuthController.php';

$controller = new AuthController();

$controller->login();
