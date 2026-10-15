<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Detalle del Justificante</h4>
                </div>

                <div class="card-body">

                    <p>
                        <strong>Folio:</strong><br>
                        <?= $justificante['folio']; ?>
                    </p>

                    <p>
                        <strong>Alumno:</strong><br>
                        <?= $justificante['nombre_alumno']; ?>
                    </p>

                    <p>
                        <strong>Materia:</strong><br>
                        <?= $justificante['materia']; ?>
                    </p>

                    <p>
                        <strong>Estado:</strong><br>
                        <?= $justificante['estado']; ?>
                    </p>

                    <p>
                        <strong>Fecha de ausencia:</strong><br>
                        <?= $justificante['fecha_ausencia']; ?>
                    </p>

                    <p>
                        <strong>Motivo:</strong><br>
                        <?= $justificante['motivo']; ?>
                    </p>

                    <?php if(!empty($justificante['archivo_evidencia'])): ?>

                        <p>
    <strong>Evidencia:</strong><br>

    <a
        href="/JustificaUAT-MVC/storage/uploads/justificantes/<?= $justificante['archivo_evidencia']; ?>"
        target="_blank"
        class="btn  btn-info">
		Ver Archivo

    </a>

</p>

                    <?php endif; ?>

                    <a
                        href="index.php?page=justificantes"
                        class="btn btn-secondary">

                        Volver

                    </a>
					
					<?php if ($justificante['estado']!='Aprobado'): ?>

                    <a
                        href="index.php?page=justificantes_edit&id=<?= $justificante['id']; ?>"
                        class="btn btn-warning">

                        Editar

                    </a>
					<?php endif; ?>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>