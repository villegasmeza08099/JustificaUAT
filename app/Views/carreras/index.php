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
                <h2>Catálogo de Carreras</h2>

                <a href="index.php?page=carreras_create"
                   class="btn btn-primary mb3">
                    Nueva Carrera
                </a>
            </div>

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Clave</th>
                            <th>Nombre</th>
							<th>Acciones</th>
                        </tr>

                        </thead>

                        <tbody>

                        <?php foreach($carreras as $c): ?>

                            <tr>
                                <td><?= $c['id'] ?></td>
                                <td><?= $c['clave'] ?></td>
                                <td><?= $c['nombre'] ?></td>
								<td>
								<a
								 class="btn btn-warning btn-sm"
								 href="index.php?page=carreras_edit&id=<?= $c['id'] ?>">
								 Editar
								</a>
								<a
								 class="btn btn-danger btn-sm"
								 href="index.php?page=carreras_delete&id=<?= $c['id'] ?>"
								 onclick="return confirm('¿Desactivar carrera?')">
								 Desactivar
								</a>

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