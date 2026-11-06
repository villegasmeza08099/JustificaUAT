<?php
include '../app/Views/layouts/header.php';
include '../app/Views/layouts/navbar.php';
?>

<div class="container mt-4">

<h2>Nueva Carrera</h2>

<form method="POST">

<div class="mb-3">

<label>Clave</label>

<input
 type="text"
 name="clave"
 class="form-control"
 required>

</div>

<div class="mb-3">

<label>Nombre</label>

<input
 type="text"
 name="nombre"
 class="form-control"
 required>

</div>

<button
 class="btn btn-primary">

Guardar

</button>

<a
 href="index.php?page=carreras"
 class="btn btn-secondary">

Cancelar

</a>

</form>

</div>

<?php
include '../app/Views/layouts/footer.php';
?>