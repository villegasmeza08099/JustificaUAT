<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-2">
        <?php include '../app/Views/layouts/sidebar.php'; ?>
        </div>
        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Bitácora del Sistema</h4>
                </div>

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead class="table-dark">

                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Acción</th>
                                <th>Descripción</th>
                                <th>Módulo</th>
                                <th>IP</th>
                                <th>Fecha</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach($bitacoras as $b): ?>

                            <tr>

                                <td><?= $b['id']; ?></td>

                                <td><?= $b['usuario_id']; ?></td>

                                <td><?= $b['accion']; ?></td>

                                <td><?= $b['descripcion']; ?></td>

                                <td><?= $b['modulo']; ?></td>

                                <td><?= $b['ip']; ?></td>

                                <td><?= $b['fecha']; ?></td>

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