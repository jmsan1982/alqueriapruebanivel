<?php
// Include the main TCPDF library (search for installation path).
//require_once('../tcpdf_include.php');                      // FUNCIONA

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//  set document information
$pdf->SetCreator(PDF_CREATOR);
//  $pdf->SetAuthor('OCOVAL');
$pdf->SetTitle($datos_plantilla_PDF['ruta_archivo']);
//  $pdf->SetSubject('TCPDF Tutorial');
//  $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
// $pdf->setHeaderData('',0,'','',array(0,0,0), array(255,255,255));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(25, 12, 15);    // $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);                   // $pdf->SetHeaderMargin(10);   // 
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if(@file_exists(dirname(__FILE__).'/lang/eng.php'))
{
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// Con estas instrucciones evitamos que se imprima el border del top y el header y el footer
$pdf->SetPrintHeader(false);
$pdf->SetPrintFooter(false);

// ---------------------------------------------------------

// add a page
$pdf->AddPage();

// set font
$pdf->SetFont('helvetica', 'B', 20);

// $pdf->Write(0, 'Example of HTML Justification', '', 0, 'L', true, 0, false, false, 0);
    
// Definimos plantilla HTML con diseño Alqueria
$plantilla_superior =    '<img src="lib/TCPDF/Alqueria/images/cabecera.png" width="1051" height="163">';
$plantilla_inferior =   '<div><img src="lib/TCPDF/Alqueria/images/footer.png" width="1051" height="163"></div>';
                              
$html = $plantilla_superior."<div>".$datos_plantilla_PDF['contenido_pdf']."</div>".$plantilla_inferior;


// HTML content
//$html = $datos_plantilla_PDF['html'];

// output the HTML content
// $pdf->writeHTML($cabecera_html.$html, true, false, true, false, '');

// set core font
$pdf->SetFont('helvetica', '', 10);

// output the HTML content
// $pdf->writeHTML($html1, true, 0, true, true);

$pdf->Ln();

// set UTF-8 Unicode font
$pdf->SetFont('dejavusans', '', 10);

// output the HTML content
$pdf->writeHTML($html, true, 0, true, true);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//$dir_subida =$datos_plantilla_PDF['ruta_archivo']."\\";
//if(!file_exists($dir_subida) && !is_dir($dir_subida)){
//    mkdir($dir_subida);
//}

//error_log(__FILE__.__FUNCTION__);
//error_log($dir_subida);

//error_log(__FILE__.__FUNCTION__);
//error_log(__dir_expedientes_zanjas__.$datos_plantilla_PDF['id_expediente']."\\".$datos_plantilla_PDF['ruta_archivo'].'.pdf');

        
//Close and output PDF document
$pdf->Output(__dir_pdf__.$datos_plantilla_PDF['ruta_archivo'],'F');