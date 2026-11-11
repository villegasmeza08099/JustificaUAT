<?php

require_once __DIR__ . '/../libraries/fpdf.php';

class PdfService
{
    public static function generar($j)
    {
        $pdf = new FPDF(
            'P',
            'mm',
            'A4'
        );

        $pdf->AddPage();

        /*
        ============================
        PLANTILLA DE FONDO
        ============================
        */

        $pdf->Image(
            __DIR__ . '/../../public/assets/img/fondopdf.jpg',
            0,
            0,
            210,
            297
        );

        /*
        ============================
        FOLIO Y FECHA
        ============================
        */

        $pdf->SetFont(
            'Arial',
            'B',
            11
        );

        $pdf->SetXY(
            150,
            52
        );

        $pdf->Cell(
            60,
            5,
            utf8_decode(
                'Folio: '
                . str_replace(
                    'JUS-',
                    '',
                    $j['folio']
                )
            )
        );

        $pdf->SetFont(
            'Arial',
            '',
            10
        );

        $pdf->SetXY(
            145,
            60
        );

        $pdf->Cell(
            50,
            5,
            utf8_decode(
                'Fecha de Expedición: '
                . date('d-m-Y')
            )
        );

        /*
        ============================
        ENCABEZADO
        ============================
        */

        $pdf->SetFont(
            'Arial',
            'B',
            11
        );

        $pdf->SetXY(
            20,
            78
        );

        $pdf->Cell(
            60,
            6,
            utf8_decode(
                'A quien corresponda:'
            )
        );

        $pdf->SetXY(
            20,
            91
        );

        $pdf->Cell(
            60,
            6,
            'PRESENTE:'
        );

        /*
        ============================
        CUERPO
        ============================
        */

        $pdf->SetFont(
            'Arial',
            '',
            11
        );

        $pdf->SetXY(
            20,
            106
        );

        $pdf->MultiCell(
            170,
            5,
            utf8_decode(
                'Por este conducto y en atención al alumno: '
                . strtoupper(
                    $j['nombre_alumno']
                )
            )
        );

        $pdf->SetX(20);

        $pdf->Cell(
            60,
            6,
            utf8_decode(
                'Matrícula: '
                . $j['matricula']
            )
        );

        $pdf->Cell(
            110,
            6,
            utf8_decode(
                'Carrera: '
                . strtoupper(
                    $j['carrera']
                )
            )
        );

        $pdf->Ln(12);

        $texto =
        "Quien ha solicitado justificar las faltas correspondientes "
        ."al día ".$j['fecha_ausencia'].".\n"
        ."Motivo: ".$j['motivo'].".\n"
        ."Materia: ".$j['materia'].".\n\n"
        ."Por ello y en base a estas actividades tenemos a bien "
        ."autorizar justificar las ausencias a clase del alumno en "
        ."las fechas señaladas, razón por la cual pido a usted tome "
        ."en consideración el motivo de la inasistencia.\n\n"
        ."El presente justificante no exime de un examen, entrega "
        ."de un trabajo o proyecto previamente programado.\n\n"
        ."Así mismo, si existe alguna observación al respecto le "
        ."solicito nos lo haga del conocimiento para reconsiderar "
        ."el presente justificante. También le recuerdo que los "
        ."justificantes sólo son válidos por un evento.";

        $pdf->SetX(20);

        $pdf->MultiCell(
            170,
            6,
            utf8_decode(
                $texto
            )
        );

        /*
        ============================
        DIRECTORIO DESTINO
        ============================
        */

        $directorio =
            __DIR__
            . '/../../storage/uploads/pdf/';

        if(
            !is_dir(
                $directorio
            )
        )
        {
            mkdir(
                $directorio,
                0777,
                true
            );
        }

        $nombreArchivo =
            $j['folio']
            . '.pdf';

        $ruta =
            $directorio
            . $nombreArchivo;

        $pdf->Output(
            'F',
            $ruta
        );

        return $ruta;
    }
}