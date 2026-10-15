<?php

require_once __DIR__ . '/../Models/Justificante.php';
require_once __DIR__ . '/../Models/DecisionEngine.php';
require_once __DIR__ . '/../Models/Bitacora.php';

class DecisionController
{
    /**
     * Evalúa automáticamente un justificante
     */
    public function evaluar()
    {
        if (!isset($_GET['id'])) {
            $_SESSION['error'] = 'No se especificó el justificante.';
            header('Location: index.php?page=justificantes');
            exit;
        }

        $id = (int)$_GET['id'];

        $justificante = Justificante::obtenerPorId($id);

        if (!$justificante) {
            $_SESSION['error'] = 'Justificante no encontrado.';
            header('Location: index.php?page=justificantes');
            exit;
        }

        $documentoPresentado =
            !empty($justificante['archivo_evidencia']);

        $documentoValido =
            $this->validarDocumento(
                $justificante['archivo_evidencia']
            );

        $entregadoATiempo =
            $this->validarTiempoEntrega(
                $justificante['fecha_ausencia'],
                $justificante['fecha_registro']
            );

        $informacionCompleta =
            $this->validarInformacion(
                $justificante
            );

        $resultado =
            DecisionEngine::evaluar(
                $documentoPresentado,
                $documentoValido,
                $entregadoATiempo,
                $informacionCompleta
            );

        Justificante::cambiarEstado(
            $id,
            $resultado
        );

        Justificante::guardarDecision([
            'justificante_id'      => $id,
            'documento_presentado' => $documentoPresentado,
            'documento_valido'     => $documentoValido,
            'entregado_tiempo'     => $entregadoATiempo,
            'informacion_completa' => $informacionCompleta,
            'resultado'            => $resultado,
            'usuario_id'           => $_SESSION['usuario_id']
        ]);

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Evaluación automática de justificante',
            "Justificante #{$id} => {$resultado}"
        );
		
		Bitacora::registrar(
    $_SESSION['usuario_id'],
    'Evaluación',
    'Resultado: '.$resultado
);

        $_SESSION['success'] =
            "Justificante evaluado correctamente.";

        header(
            'Location: index.php?page=justificantes'
        );

        exit;
    }

    /**
     * Aprobación manual
     */
    public function aprobar()
    {
        $id = (int)$_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'Aprobado'
        );

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Aprobación manual',
            "Justificante #{$id}"
        );

        header(
            'Location: index.php?page=justificantes'
        );
    }

    /**
     * Rechazo manual
     */
    public function rechazar()
    {
        $id = (int)$_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'Rechazado'
        );

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Rechazo manual',
            "Justificante #{$id}"
        );

        header(
            'Location: index.php?page=justificantes'
        );
    }

    /**
     * Solicitar corrección
     */
    public function solicitarCorreccion()
    {
        $id = (int)$_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'Correccion'
        );

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Solicitud de corrección',
            "Justificante #{$id}"
        );

        header(
            'Location: index.php?page=justificantes'
        );
    }

    /**
     * Revisión especial
     */
    public function revisionEspecial()
    {
        $id = (int)$_GET['id'];

        Justificante::cambiarEstado(
            $id,
            'RevisionEspecial'
        );

        Bitacora::registrar(
            $_SESSION['usuario_id'],
            'Revisión especial',
            "Justificante #{$id}"
        );

        header(
            'Location: index.php?page=justificantes'
        );
    }

    /**
     * Validar archivo
     */
    private function validarDocumento(
        $archivo
    )
    {
        if (!$archivo) {
            return false;
        }

        $extension =
            strtolower(
                pathinfo(
                    $archivo,
                    PATHINFO_EXTENSION
                )
            );

        $permitidos = [
            'pdf',
            'jpg',
            'jpeg',
            'png'
        ];

        return in_array(
            $extension,
            $permitidos
        );
    }

    /**
     * Validar fecha límite
     */
    private function validarTiempoEntrega(
        $fechaAusencia,
        $fechaRegistro
    )
	{
        $ausencia =
            new DateTime($fechaAusencia);

        $registro =
            new DateTime($fechaRegistro);

        $diferencia =
            $ausencia->diff($registro);

        return $diferencia->days <= 5;
    }

private function validarInformacion(
    array $justificante
)
{
    return
        !empty($justificante['alumno_id']) &&
        !empty($justificante['materia_id']) &&
        !empty($justificante['fecha_ausencia']) &&
        !empty($justificante['motivo']);
}

}