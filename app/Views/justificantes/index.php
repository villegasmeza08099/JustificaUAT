<h2>Justificantes</h2>

index.php?page=justificantes_create

Nuevo Justificante

</a>

<table class="table table-striped">

<thead>

<tr>

<th>Folio</th>
<th>Alumno</th>
<th>Materia</th>
<th>Estado</th>
<th>Acciones</th>

</tr>

</thead>

<tbody>

<?php foreach($justificantes as $j): ?>

<tr>

<td><?= $j['folio']; ?></td>

<td><?= $j['nombre_alumno']; ?></td>

<td><?= $j['materia']; ?></td>

<td><?= $j['estado']; ?></td>

<td>

index.php?page=decision_evaluar&id=<?= $j['id']; ?>class="btn btn-primary btn-sm">

Evaluar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>