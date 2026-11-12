<?php
include '../app/Views/layouts/header.php';
include '../app/Views/layouts/navbar.php';
?>

<div class="container-fluid mt-4">
    <div class="row">

        <div class="col-md-2">
            <?php include '../app/Views/layouts/sidebar.php'; ?>
        </div>

        <div class="col-md-10">

            <div class="d-flex justify-content-between mb-3">

                <h2>Catálogo de Materias</h2>

                <a href="index.php?page=materias_create"
                   class="btn btn-success">
                    Nueva Materia
                </a>

            </div>

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
							<th>Clave</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
							<th>Estado</th>
							<th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach($materias as $m): ?>

                            <tr>
							    
                                <td><?= $m['id'] ?></td>
                                <td><?= htmlspecialchars($m['clave']) ?></td>
								<td><?= $m['nombre'] ?></td>
                                <td><?= $m['carrera'] ?></td>
								<td>
									<?php if($m['activo'] == 1): ?>

										<span class="badge bg-success">
											Activa
										</span>

									<?php else: ?>

										<span class="badge bg-secondary">
											Inactiva
										</span>

									<?php endif; ?>
								</td>
								<td>

    <a
        href="index.php?page=materias_edit&id=<?= $m['id'] ?>"
        class="btn btn-warning btn-sm">

        Editar

    </a>

    <?php if($m['activo'] == 1): ?>

        <a
            href="index.php?page=materias_desactivar&id=<?= $m['id'] ?>"
            class="btn btn-danger btn-sm"
            onclick="return confirm('¿Desea desactivar esta materia?')">

            Desactivar

        </a>

    <?php else: ?>

        <a
            href="index.php?page=materias_activar&id=<?= $m['id'] ?>"
            class="btn btn-success btn-sm">

            Activar

        </a>

    <?php endif; ?>

</td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>
</div>

<?php include '../app/Views/layouts/footer.php'; ?>