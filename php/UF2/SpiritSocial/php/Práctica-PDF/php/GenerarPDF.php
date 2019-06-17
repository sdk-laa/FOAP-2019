<?php
    // include autoloader
    require_once 'dompdf/autoload.inc.php';
    require ("Consultas1.php");
    $SpiritSocial="SpiritSocial";
        
    // reference the Dompdf namespace
    use Dompdf\Dompdf;

    $html = ob_get_clean();
    //$html="hola";
    // instantiate and use the dompdf class
    $dompdf = new Dompdf;
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    //$dompdf->render();

    //Donde guardar el documento
    $RutaArchivo = "PDFs\\"; //C:\xampp\htdocs\Sadik\php\UF2\SpiritSocial\php\Práctica-PDF

    //Nombre del Documento.
    $NombreArchivo = $SpiritSocial.".pdf";

    //Renderiza el archivo primero
    $dompdf->render();
    //$dompdf->stream("Clientes.pdf");


    //Guardalo en una variable
    $output = $dompdf->output();
    file_put_contents( $RutaArchivo.$NombreArchivo, $output);

    // Una vez lo guardes en local lo puedes subir o enviar a un ftp.

    // Output the generated PDF to Browser
    //$dompdf->stream(); //Se usa cuando para descargar directamente el archivo sin la ruta
?>