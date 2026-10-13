<div class="container mt-4">

<h2>Nuevo Usuario</h2>

<form method="POST">

<div class="mb-3">

<label>Nombre</label>

<input
class="form-control"
name="nombre"
required>

</div>

<div class="mb-3">

<label>Correo</label>

<input
type="email"
class="form-control"
name="correo"
required>

</div>

<div class="mb-3">

<label>Contraseña</label>

<input
type="password"
class="form-control"
name="password"
required>

</div>

<div class="mb-3">

<label>Rol</label>

<select
name="rol"
class="form-select">

<option>
Administrador
</option>

<option>
GestionEscolar
</option>

<option>
Alumno
</option>

</select>

</div>

<button
class="btn btn-primary">

Guardar

</button>

</form>

</div>