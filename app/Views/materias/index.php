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
                   class="btn btn-primary">
                    Nueva Materia
                </a>

            </div>

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                        </tr>
                        </thead>

                        <tbody>

                        <?php foreach($materias as $m): ?>

                            <tr>
                                <td><?= $m['id'] ?></td>
                                <td><?= $m['nombre'] ?></td>
                                <td><?= $m['carrera_id'] ?></td>
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