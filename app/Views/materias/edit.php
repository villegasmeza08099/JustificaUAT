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

            <h2 class="mb-4">
                Editar Materia
            </h2>

            <div class="card">

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Clave
                            </label>

                            <input
                                type="text"
                                name="clave"
                                class="form-control"
                                value="<?= htmlspecialchars($materia['clave']) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                class="form-control"
                                value="<?= htmlspecialchars($materia['nombre']) ?>"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Carrera
                            </label>

                            <select
                                name="carrera_id"
                                class="form-select"
                                required>

                                <?php foreach($carreras as $c): ?>

                                    <option
                                        value="<?= $c['id'] ?>"
                                        <?= ($c['id'] == $materia['carrera_id']) ? 'selected' : '' ?>>

                                        <?= htmlspecialchars($c['nombre']) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Actualizar
                        </button>

                        <a
                            href="index.php?page=materias"
                            class="btn btn-secondary">
                            Cancelar
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include '../app/Views/layouts/footer.php';
?>