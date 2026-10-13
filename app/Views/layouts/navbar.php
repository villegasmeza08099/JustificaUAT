<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container-fluid">

        <a
            class="navbar-brand"
            href="index.php?page=dashboard">

            JustificaUAT DSS

        </a>

        <div class="ms-auto text-white">

            <span class="me-3">
                <?= $_SESSION['nombre'] ?? 'Usuario'; ?>
            </span>

            <span class="me-3">
                <?= $_SESSION['rol'] ?? ''; ?>
            </span>

            <a
                href="logout.php"
                class="btn btn-sm btn-danger">

                Salir

            </a>

        </div>

    </div>

</nav>