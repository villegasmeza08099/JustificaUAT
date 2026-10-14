<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>


<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10">

            <div class="card">

                <div class="card-header">
                    <h4>Registrar Justificante</h4>
                </div>

                <div class="card-body">

                    <form
                        method="POST"
                        enctype="multipart/form-data"
                    >

                    
                        <div class="mb-3">

                            <select
    name="alumno_id"
    id="alumno_id"
    class="form-select">

    <?php foreach($alumnos as $a): ?>

        <option
            value="<?= $a['id']; ?>"
            data-carrera="<?= $a['carrera']; ?>"
            data-carrera-id="<?= $a['carrera_id']; ?>">

            <?= $a['matricula']; ?>
            -
            <?= $a['nombre']; ?>

        </option>

    <?php endforeach; ?>

</select>

                        </div>

                        <div class="mb-3">

    <label class="form-label">
        Carrera
    </label>

    <input
    type="text"
    id="carrera"
    class="form-control"
    readonly>

</div>

                        <div class="mb-3">

                            <label class="form-label">
                                Materia
                            </label>

                            <select
    id="materia_id"
    name="materia_id"
    class="form-select"
    required>

    <?php foreach($materias as $m): ?>

        <option
            value="<?= $m['id']; ?>"
            data-carrera-id="<?= $m['carrera_id']; ?>">

            <?= $m['nombre']; ?>

        </option>

    <?php endforeach; ?>

</select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Fecha de Ausencia
                            </label>

                            <input
                                type="date"
                                class="form-control"
                                name="fecha_ausencia"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Motivo
                            </label>

                            <textarea
                                class="form-control"
                                name="motivo"
                                rows="4"
                                required></textarea>

                        </div>
						
						<div class="mb-3">

    <label class="form-label">
        Evidencia
    </label>

    <input
        type="file"
        class="form-control"
        name="evidencia"
        accept=".pdf,.jpg,.jpeg,.png">

</div>
						
						
						

                        <div class="mb-3">

                            <label class="form-label">
							<button
        type="submit"
        class="btn btn-success">

        <i class="bi bi-save"></i>
        Guardar Justificante

    </button>

    <a
        href="index.php?page=justificantes"
        class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Cancelar

    </a>

</div>
</form>