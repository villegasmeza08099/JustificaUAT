<?php include '../app/Views/layouts/header.php'; ?>
<?php include '../app/Views/layouts/navbar.php'; ?>

<div class="container-fluid mt-4">

    <div class="row">

        <div class="col-md-2">
        <?php include '../app/Views/layouts/sidebar.php'; ?>
        </div>
        <div class="col-md-10">

            <div class="d-flex justify-content-between mb-3">

                <h2>Justificantes</h2>

                <a
                    href="index.php?page=justificantes_create"
                    class="btn btn-success">

                    Nuevo Justificante

                </a>

            </div>

            <div class="card">

                <div class="card-body">

                    <table class="table table-striped table-bordered">

                        <thead class="table-dark">

                            <tr>
                                <th>Folio</th>
                                <th>Alumno</th>
                                <th>Materia</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                        <?php if(!empty($justificantes)): ?>

                            <?php foreach($justificantes as $j): ?>

                                <tr>

                                    <td><?= $j['folio']; ?></td>

                                    <td><?= $j['nombre_alumno']; ?></td>

                                    <td><?= $j['materia']; ?></td>

                                    <td>

<?php
switch($j['estado'])
{
    case 'Aprobado':
        echo '<span class="badge bg-success">Aprobado</span>';
        break;

    case 'Rechazado':
        echo '<span class="badge bg-danger">Rechazado</span>';
        break;

    case 'Pendiente':
        echo '<span class="badge bg-warning text-dark">Pendiente</span>';
        break;

    case 'Correccion':
        echo '<span class="badge bg-info text-dark">Corrección</span>';
        break;

    case 'RevisionEspecial':
        echo '<span class="badge bg-secondary">Revisión Especial</span>';
        break;
}
?>

</td>

                                    <td>
									
                                       <?php if($_SESSION['rol'] == 'Alumno' || $_SESSION['rol'] == 'GestionEscolar'|| $_SESSION['rol'] == 'Administrador'):?>  
                                        <a href="index.php?page=justificantes_show&id=<?= $j['id']; ?>" class="btn btn-info btn-sm">Ver</a>
										<?php endif; ?>
										
										<?php if($j['estado'] === 'Pendiente' || $j['estado'] === 'Correccion'): ?>
										
                                        <a href="index.php?page=justificantes_edit&id=<?= $j['id']; ?>"  class="btn btn-warning btn-sm">Editar</a>
										<?php endif; ?>
                                           
										   <?php if($_SESSION['rol'] == 'GestionEscolar'|| $_SESSION['rol'] == 'Administrador' && $j['estado'] != 'Aprobado'): ?>
                                           <a href="index.php?page=justificantes_review&id=<?= $j['id']; ?>" class="btn btn-primary btn-sm"> Evaluar </a>
                                          <?php endif; ?>
                                           <a href="index.php?page=justificantes_delete&id=<?= $j['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar este justificante?');">Eliminar</a>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="5" class="text-center">

                                    No existen justificantes registrados.

                                </td>

                            </tr>

                        <?php endif; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</div>

<?php include '../app/Views/layouts/footer.php'; ?>