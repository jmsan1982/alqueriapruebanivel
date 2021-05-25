<?php
/********** OBSOLETO.
 *  Este método se movio a indexController como función privada 
 
class pdf{

	public static function createPdf($fecha_solicitud,$nombre_equipo,$categoria,$club,$dni_jugador,$fecha_nacimiento,$apellidos,$nombre,$tipo,$rutapdf,$rutafirmasolicitante,$rutafirmapadre){

		require('lib/fpdf/fpdf.php');
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetMargins(10,20,10); // left, top, right

		// CABECERA 
		$pdf->Image('img/Cabecera_pdf.png',5,4,200,0,'PNG');

		$pdf->SetY(35);
		$pdf->Ln(2);
		$pdf->SetFont('Times','',10);
		$pdf->SetFillColor(153, 204, 255);//No funciona

		$fechasolicitud2 = date("d/m/Y", strtotime($fecha_solicitud));
		$fechanacimiento = date("d/m/Y", strtotime($fecha_nacimiento));

		if($tipo==="Jugador"){$check1="4";}else{$check1="";}
		if($tipo==="Entrenador"){$check2="4";}else{$check2="";}
		if($tipo==="Asistente"){$check3="4";}else{$check3="";}
		if($tipo==="Delegado de campo"){$check4="4";}else{$check4="";}

		// Checkbox 
		$check = "4";
		$pdf->Ln(10);   $pdf->SetFont('ZapfDingbats','', 10);   $pdf->Cell('5', '5', $check1, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Jugador',0);  
						$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check2, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Entrenador',0);                
						$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check3, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Asistente',0); 
						$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check4, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(50,8,' Delegado de campo',0);   

		//$pdf->Ln(10);   $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Modalidad: ','B','R',0);       	       $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$modalidad,'TLRB','L',0);
		$pdf->Ln(10);   $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Fecha solicitud: ','B','R',0);          $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$fechasolicitud2,'TLRB','L',0, true); 
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Nombre equipo: ','B','R',0);            $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$nombre_equipo,'TLRB','L',0);
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Categoría: ','B','R',0); 			   $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$categoria,'TLRB','L',0);         
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Club: ','B','R',0);   				   $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$club,'TLRB','L',0); 
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Apellidos: ','B','R',0);   			   $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$apellidos,'TLRB','L',0);   
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Nombre: ','B','R',0);  				   $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$nombre,'TLRB','L',0); 
		$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  DNI/NIE/Pasaporte: ','B','R',0);   	   $pdf->SetFont('Times','B',10);    $pdf->Cell(45,8,$dni_jugador,'TLRB',0); 
		                $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Fecha de nacimiento: ','B','R',0);      $pdf->SetFont('Times','B',10);    $pdf->Cell(45,8,$fechanacimiento,'TLRB',0);    

		$pdf->Ln(12);

		$pdf->Ln(6);    $pdf->SetFont('Times','B',10);   $pdf->Cell(70,5,'                  Firma solicitante:','TLR',0);   	  $pdf->Cell(70,5,"                Firma padre/madre/tutor:",'TLR',0);	    $pdf->MultiCell(0,5,"Firma y sello club:",'TLR','C',0); 

		if($rutafirmasolicitante!=""){
			$pdf->Cell(70,30, $pdf->Image($rutafirmasolicitante, $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
			//$pdf->Cell(70,30, $pdf->Image('firmas/Eva.png', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
		}
		else{
			$pdf->Cell(70,30, $pdf->Image('img/firma.jpg', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
		}

		if($rutafirmapadre!=""){
			$pdf->Cell(70,30, $pdf->Image($rutafirmapadre, $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
			//$pdf->Cell(70,30, $pdf->Image('firmas/EvaPadre.png', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
		}
		else{
			$pdf->Cell(70,30, $pdf->Image('img/firma.jpg', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
		}
		switch ($club) {
		    case "Valencia basket club":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloValenciaBasket.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		    case "Valencia atletico":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloValenciaAtletico.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		    case "C.B Genoves":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloGenoves.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		    case "CNB Xativa":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloXativa.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		    case "C.B Sedavi":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloSedavi.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		    case "San Pedro Moixent":
		        $pdf->Cell(0,30, $pdf->Image('sellos/selloMoixent.png', $pdf->GetX(), $pdf->GetY(), 70) ,'BLR',0,"C");
		        break;
		}
			     
		// pie 
		$pdf->Image('img/Pie_pdf.png',5,195,200,0,'PNG');
		$pdf->Output('F',$rutapdf);
		return $pdf;
		//$pdf->Output('F','SolicitudesEquipos/'.$equipo."/".$dni."-".$fechasolicitud.".pdf");

	}
}
 *
 */
?>