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

                    <h4>
                        Evaluación de Justificante
                    </h4>

                </div>

                <div class="card-body">

                    <div class="alert alert-info">

                        Folio:
                        <strong>
                            <?= $justificante['folio']; ?>
                        </strong>

                    </div>

                    <p>

                        <strong>Alumno:</strong>
                        <?= $justificante['nombre_alumno']; ?>

                    </p>

                    <p>

                        <strong>Carrera:</strong>
                        <?= $justificante['carrera']; ?>

                    </p>

                    <p>

                        <strong>Materia:</strong>
                        <?= $justificante['materia']; ?>

                    </p>

                    <p>

                        <strong>Motivo:</strong>
                        <?= $justificante['motivo']; ?>

                    </p>

                    <hr>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">

                                Documento presentado

                            </label>

                            <select
                                name="documento_presentado"
                                class="form-select">

                                <option value="1">
                                    Sí
                                </option>

                                <option value="0">
                                    No
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Documento válido

                            </label>

                            <select
                                name="documento_valido"
                                class="form-select">

                                <option value="1">
                                    Sí
                                </option>

                                <option value="0">
                                    No
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Entregado en tiempo

                            </label>

                            <select
                                name="entregado_tiempo"
                                class="form-select">

                                <option value="1">
                                    Sí
                                </option>

                                <option value="0">
                                    No
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

    <label class="form-label">
        Información completa
    </label>

    <select
        name="informacion_completa"
        class="form-select">

        <option value="1">
            Sí
        </option>

        <option value="0">
            No
        </option>

    </select>

</div>

<div class="mb-3">

    <label class="form-label">
        Observaciones
    </label>

    <textarea
        name="observaciones"
        rows="4"
        class="form-control"></textarea>

</div>

<div class="alert alert-warning">

    El resultado será calculado por el motor de decisiones.

</div>

<button
    type="submit"
    class="btn btn-success">

    Procesar Evaluación

</button>

<a
    href="index.php?page=justificantes"
    class="btn btn-secondary">

    Cancelar

</a>

</form>