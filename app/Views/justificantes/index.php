<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10">

            <div class="d-flex justify-content-between mb-3">

                <h2>Justificantes</h2>

                <a
                    href="index.php?page=justificantes_create"
                    class="btn btn-success">

                    Nuevo Justificante

                </a>

            </div>

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead class="table-dark">

                            <tr>
                                <th>Folio</th>
                                <th>Alumno</th>
                                <th>Materia</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php if(!empty($justificantes)): ?>

                            <?php foreach($justificantes as $j): ?>

                                <tr>

                                    <td><?= $j['folio']; ?></td>

                                    <td><?= $j['nombre_alumno']; ?></td>

                                    <td><?= $j['materia']; ?></td>

                                    <td><?= $j['estado']; ?></td>

                                    <td>

                                        <a
                                            href="index.php?page=justificantes_create"
                                            class="btn btn-info btn-sm">

                                            Ver

                                        </a>

                                        <a
                                            href="index.php?page=justificantes_create"
                                            class="btn btn-warning btn-sm">

                                            Editar

                                        </a>

                         <a
    href="index.php?page=decision_evaluar&id=<?= $j['id']; ?>"
    class="btnn-sm">

    Evaluar

</a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="5" class="text-center">

                                    No existen justificantes registrados.

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>