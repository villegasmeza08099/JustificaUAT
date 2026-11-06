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
                Editar Carrera
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
								class="form-control"
								value="<?= htmlspecialchars($carrera['clave']) ?>"
								readonly>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                class="form-control"
                                value="<?= htmlspecialchars($carrera['nombre']) ?>"
                                required>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Actualizar
                        </button>

                        <a
                            href="index.php?page=carreras"
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