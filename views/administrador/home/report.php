<?php

use Dompdf\Dompdf;
use Dompdf\Option;
use Dompdf\Exception as DomException;
use Dompdf\Options;

function post_crear_pdf()
{
    try {

        $contenido = '<!DOCTYPE html>
      <html>
        <head>
        </head>
        <body>
             <h1>REPORTE DE PDF</h1>
        </body>
      </html>';
        // Nombre del pdf
        $filename = 'reporte.pdf';

        // Opciones para prevenir errores con carga de imágenes
        $options = new Options();
        $options->set('isRemoteEnabled', true);

        // Instancia de la clase
        $dompdf = new Dompdf($options);

        // Cargar el contenido HTML
        $dompdf->loadHtml($contenido);

        // Formato y tamaño del PDF
        $dompdf->setPaper('A4', 'portrait');

        // Renderizar HTML como PDF
        $dompdf->render();

        // Salida para descargar
        $dompdf->stream($filename, ['Attachment' => true]);
    } catch (Exception $e) {
        echo $e;
    }
}
