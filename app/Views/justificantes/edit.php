<div class="container mt-4">

<h2>Editar Justificante</h2>

<form method="POST">

<input
class="form-control mb-2"
name="materia"
value="<?= $justificante['materia']; ?>">

<input
type="date"
class="form-control mb-2"
name="fecha_ausencia"
value="<?= $justificante['fecha_ausencia']; ?>">

<textarea
name="motivo"
class="form-control mb-3"><?= $justificante['motivo']; ?></textarea>

<button
class="btn btn-primary">

Actualizar

</button>

</form>

</div>