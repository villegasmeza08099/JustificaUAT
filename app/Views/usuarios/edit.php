<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Editar Usuario</h4>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Nombre
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                value="<?= $usuario['nombre']; ?>"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Correo
                            </label>

                            <input
                                type="email"
                                name="correo"
                                value="<?= $usuario['correo']; ?>"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Rol
                            </label>

                            <select
                                name="rol"
                                class="form-select">

                                <option
                                    value="Administrador"
                                    <?= ($usuario['rol'] == 'Administrador') ? 'selected' : ''; ?>>

                                    Administrador

                                </option>

                                <option
                                    value="GestionEscolar"
                                    <?= ($usuario['rol'] == 'GestionEscolar') ? 'selected' : ''; ?>>

                                    Gestión Escolar

                                </option>

                                <option
                                    value="Alumno"
                                    <?= ($usuario['rol'] == 'Alumno') ? 'selected' : ''; ?>>

                                    Alumno

                                </option>

                            </select>

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Actualizar

                        </button>

                        <a
                            href="index.php?page=usuarios"
                            class="btn btn-secondary">

                            Cancelar

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>