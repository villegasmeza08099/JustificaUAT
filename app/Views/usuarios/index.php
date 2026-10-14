<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container mt-4">

    <div class="d-flex justify-content-between">

        <h2>Usuarios</h2>

        <a
            href="index.php?page=usuarios_create"
            class="btn btn-success">

            Nuevo Usuario

        </a>

    </div>

    <table class="table table-striped mt-3">

        <thead>

            <tr>

                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Activo</th>
                <th>Acciones</th>

            </tr>

        </thead>

        <tbody>

            <?php foreach($usuarios as $u): ?>

            <tr>

                <td>
                    <?= $u['id']; ?>
                </td>

                <td>
                    <?= $u['nombre']; ?>
                </td>

                <td>
                    <?= $u['correo']; ?>
                </td>

                <td>
                    <?= $u['rol']; ?>
                </td>

                <td>

                    <?= $u['activo'] ? 'Sí' : 'No'; ?>

                </td>

                <td>

                   <a href="index.php?page=usuarios_show&id=<?= $u['id']; ?>"   class="btn btn-info btn-sm">

                        Ver

                    </a>

                    <a href="index.php?page=usuarios_edit&id=<?= $u['id']; ?>"                        class="btn btn-warning btn-sm">

                        Editar

                    </a>

                    <?php if($u['activo']): ?>

                       <a href="index.php?page=usuarios_desactivar&id=<?= $u['id']; ?>  "                          class="btn btn-danger btn-sm">

                            Desactivar

                        </a>

                    <?php else: ?>

                      <a href="  index.php?page=usuarios_activar&id=<?= $u['id']; ?>    "                        class="btn btn-success btn-sm">

                            Activar

                        </a>

                    <?php endif; ?>

                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>