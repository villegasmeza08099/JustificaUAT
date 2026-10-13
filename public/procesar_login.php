<?php
//echo "hola<br>";
//echo password_hash("Admin123",PASSWORD_DEFAULT);
//echo "<br>";


require_once '../app/Controllers/AuthController.php';

$controller = new AuthController();

$controller->login();
?>

