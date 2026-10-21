<?php include '../app/Views/layouts/header.php'; ?>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-4 mt-5">

            <div class="card shadow">

                <div class="card-header text-center">
                    <h4>JustificaUAT DSS</h4>
                </div>

                <div class="card-body">

                    <?php if(isset($_SESSION['error'])): ?>

                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; ?>
                        </div>

                    <?php
                        unset($_SESSION['error']);
                    endif;
                    ?>

              <form  method="POST"  action="procesar_login.php">

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

                        <input
                            type="submit"
                            class="btn btn-primary w-100"
							value="Ingresar">
                     

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>