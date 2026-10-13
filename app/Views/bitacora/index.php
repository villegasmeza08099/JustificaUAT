<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container mt-4">

    <h2>Bitácora del Sistema</h2>

    <table class="table table-striped">

        <thead>

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

<?php include '../app/Views/layouts/footer.php'; ?>