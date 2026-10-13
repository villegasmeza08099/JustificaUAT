<div class="container mt-4">

<h2>Editar Usuario</h2>

<form method="POST">

<input
type="text"
name="nombre"
value="<?= $usuario['nombre']; ?>"
class="form-control mb-2">

<input
type="email"
name="correo"
value="<?= $usuario['correo']; ?>"
class="form-control mb-2">

<select
name="rol"
class="form-select mb-3">

<option
<?= $usuario['rol']=='Administrador'?'selected':'';?>>
Administrador
</option>

<option
<?= $usuario['rol']=='GestionEscolar'?'selected':'';?>>
GestionEscolar
</option>

<option
<?= $usuario['rol']=='Alumno'?'selected':'';?>>
Alumno
</option>

</select>

<button
class="btn btn-primary">

Actualizar

</button>

</form>

</div>