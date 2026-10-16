<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid">

    <div class="row">

        <?php include '../app/Views/layouts/sidebar.php'; ?>

        <div class="col-md-10 p-4">

            <div class="card">

                <div class="card-header">
                    <h4>Nuevo Usuario</h4>
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
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Contraseña
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Rol
                            </label>

                            <select
                                id="rol_id"
								name="rol_id"
                                class="form-select">
                                 
                                <option value="1">
                                    Administrador
                                </option>

                                <option value="2">
                                    Gestión Escolar
                                </option>

                                <option value="3">
                                    Alumno
                                </option>

                            </select>

                        </div>
						
	<div id="datosAlumno" style="display:none;">

    <div class="mb-3">

        <label class="form-label">
            Matrícula
        </label>

        <input
            type="text"
            name="matricula"
            class="form-control">

    </div>

    <div class="mb-3">

        <label class="form-label">
            Carrera
        </label>

        <select
            name="carrera_id"
            class="form-select">

            <?php foreach($carreras as $c): ?>

                <option
                    value="<?= $c['id']; ?>">

                    <?= $c['nombre']; ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

</div>
						
	<button type="submit" class="btn btn-primary">Guardar</button>



<a
        href="index.php?page=usuarios"
        class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Cancelar

    </a>
	
	</form>
   