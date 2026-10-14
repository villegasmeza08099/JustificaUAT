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
                Dashboard
            </h2>
			

            <div class="row">

                <div class="col-md-2">
                    <div class="card text-bg-primary">
                        <div class="card-body">
                            <h6>Total</h6>
                            <h2><?= $total ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h6>Aprobados</h6>
                            <h2><?= $aprobados ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card text-bg-danger">
                        <div class="card-body">
                            <h6>Rechazados</h6>
                            <h2><?= $rechazados ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card text-bg-warning">
                        <div class="card-body">
                            <h6>Pendientes</h6>
                            <h2><?= $pendientes ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card text-bg-info">
                        <div class="card-body">
                            <h6>Corrección</h6>
                            <h2><?= $correccion ?></h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="card text-bg-secondary">
                        <div class="card-body">
                            <h6>Revisión</h6>
                            <h2><?= $revision ?></h2>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card mt-4">

                <div class="card-header">
                    Justificantes por Estado
                </div>

                <div class="card-body">
                    <canvas id="graficaEstados"></canvas>
                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const estados = [
<?php
foreach($graficaEstados as $e){
    echo "'" . $e['estado'] . "',";
}
?>
];

const cantidades = [
<?php
foreach($graficaEstados as $e){
    echo $e['total'] . ",";
}
?>
];

new Chart(
    document.getElementById('graficaEstados'),
    {
        type: 'bar',

        data: {

            labels: estados,

            datasets: [
                {
                    label: 'Justificantes',

                    data: cantidades,

                    backgroundColor: [
                        '#198754',
                        '#dc3545',
                        '#ffc107',
                        '#0dcaf0',
                        '#6c757d'
                    ]
                }
            ]
        }
    }
);

</script>

<?php include '../app/Views/layouts/footer.php'; ?>