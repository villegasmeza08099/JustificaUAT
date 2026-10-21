<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid mt-4">

    <div class="row">

        <div class="col-md-2">
        <?php include '../app/Views/layouts/sidebar.php'; ?>
        </div>
        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Detalle de Usuario</h4>
                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">

                            <p>
                                <strong>Nombre:</strong><br>
                                <?= $usuario['nombre']; ?>
                            </p>

                            <p>
                                <strong>Correo:</strong><br>
                                <?= $usuario['correo']; ?>
                            </p>

                            <p>
                                <strong>Rol:</strong><br>
                                <?= $usuario['rol']; ?>
                            </p>

                            <p>
                                <strong>Estado:</strong><br>
                                <?= $usuario['activo'] ? 'Activo' : 'Inactivo'; ?>
                            </p>

                        </div>

                    </div>

                    <hr>

                    <a
                        href="index.php?page=usuarios"
                        class="btn btn-secondary">

                        Volver

                    </a>

                    <a
                        href="index.php?page=usuarios_edit&id=<?= $usuario['id']; ?>"
                        class="btn btn-warning">

                        Editar

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>