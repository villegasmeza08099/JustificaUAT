<div class="bg-white border-end">

    <div class="list-group rounded-0">

        <a
            href="index.php?page=dashboard"
            class="list-group-item list-group-item-action">

            <i class="bi bi-speedometer2"></i>
            Dashboard

        </a>

        <?php if(isset($_SESSION['rol']) && $_SESSION['rol'] === 'Administrador'): ?>

            <a
                href="index.php?page=usuarios"
                class="list-group-item list-group-item-action">

                <i class="bi bi-people"></i>
                Usuarios

            </a>

        <?php endif; ?>

        <a
            href="index.php?page=justificantes"
            class="list-group-item list-group-item-action">

            <i class="bi bi-file-earmark-text"></i>
            Justificantes

        </a>

        <a
            href="index.php?page=reportes"
            class="list-group-item list-group-item-action">

            <i class="bi bi-bar-chart"></i>
            Reportes

        </a>

        <?php if(
            isset($_SESSION['rol']) &&
            (
                $_SESSION['rol'] === 'Administrador' ||
                $_SESSION['rol'] === 'GestionEscolar'
            )
        ): ?>

            <a
                href="index.php?page=bitacora"
                class="list-group-item list-group-item-action">

                <i class="bi bi-journal-text"></i>
                Bitácora

            </a>

        <?php endif; ?>

    </div>

</div>