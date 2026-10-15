<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Editar Justificante</h4>
                </div>

                <div class="card-body">

                    <form
                        method="POST"
                        enctype="multipart/form-data">

                        <!-- Alumno -->

                        <div class="mb-3">

                            <label class="form-label">
                                Alumno
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= $justificante['nombre_alumno']; ?>"
                                readonly>

                        </div>

                        <!-- Carrera -->

                        <div class="mb-3">

                            <label class="form-label">
                                Carrera
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="<?= $justificante['carrera']; ?>"
                                readonly>

                        </div>

                        <!-- Materia -->

                        <div class="mb-3">

                            <label class="form-label">
                                Materia
                            </label>

                            <select
                                name="materia_id"
                                class="form-select">

                                <?php foreach($materias as $m): ?>

                                    <option
                                        value="<?= $m['id']; ?>"
                                        <?= ($m['id'] == $justificante['materia_id']) ? 'selected' : ''; ?>>

                                        <?= $m['nombre']; ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>

                        <!-- Fecha -->

                        <div class="mb-3">

                            <label class="form-label">
                                Fecha de Ausencia
                            </label>

                            <input
                                type="date"
                                name="fecha_ausencia"
                                value="<?= $justificante['fecha_ausencia']; ?>"
                                class="form-control">

                        </div>

                        <!-- Motivo -->

                        <div class="mb-3">

                            <label class="form-label">
                                Motivo
                            </label>

                            <textarea
                                name="motivo"
                                rows="5"
                                class="form-control"><?= $justificante['motivo']; ?></textarea>

                        </div>

                        <!-- Evidencia Actual -->

                        <?php if(!empty($justificante['archivo_evidencia'])): ?>

                            <div class="mb-3">

                                <label class="form-label">
                                    Evidencia Actual
                                </label>

                                <br>
								
								

    <strong>Archivo actual:</strong>

    <?= $justificante['archivo_evidencia']; ?>


								

                             <a href="/JustificaUAT-MVC/storage/uploads/justificantes/<?= $justificante['archivo_evidencia']; ?>"   target="_blank"
                                    class="btn btn-info">

                                    Ver Archivo

                                </a>

                            </div>

                        <?php endif; ?>

                        <!-- Nueva Evidencia -->

                        <div class="mb-3">

                            <label class="form-label">
                                Reemplazar Evidencia
                            </label>

                            <input
                                type="file"
                                name="evidencia"
                                class="form-control">

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">

                            Actualizar

                        </button>

                        <a
                            href="index.php?page=justificantes"
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