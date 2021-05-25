<?php
	class jornadasFormacionController {

		public function actionBackJornadasFormacionListarInscripciones() {
			if ( self::isLogged() ) {
				require "models/inscripciones.php";

				$datos['todasinscripciones'] = inscripciones::findInscripcionesJornadasFormacion();

				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_jornadas_formacion_entrenadores");
			}
		}


		public function actionImprimirFicha() {
			if ( self::isLogged() ) {
				require "models/inscripciones.php";

				// Asignamos un título al cuerpo del HTML
				$seccioninscripcion = "Inscripción en Jornadas de Formación 2019/20";

				// Fecha de la Jornada de Formación
				$jornada = "Miércoles, 19 de febrero de 2020";

				// Recogemos la variable "id" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
				$id = $_GET['id'];


				// Recogemos todos los datos del registro pasándole el número de pedido
				$contenidocorreo = inscripciones::dameDatosJornadasFormacion($id);


				// Generamos el contenido
				$contenido = "
					<p>
						<strong>Fecha de registro:</strong> " . $contenidocorreo['fecharegistro'] . "<br>
						<strong>Nombre y apellidos:</strong> " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . "<br>
						<strong>DNI:</strong> " . $contenidocorreo['dni'] . "<br>
						<strong>Email:</strong> " . $contenidocorreo['email'] . "<br>";

						if ($contenidocorreo['conferencia1'] == 1) {
							$contenido .= "<strong>Conferencia 1:</strong> ".$contenidocorreo['conferencia1_nombre']."<br>";
						}

						if ($contenidocorreo['conferencia2'] == 1) {
							$contenido .= "<strong>Conferencia 2:</strong> ".$contenidocorreo['conferencia2_nombre']."<br>";
						}

						if ($contenidocorreo['conferencia3'] == 1) {
							$contenido .= "<strong>Conferencia 3:</strong> ".$contenidocorreo['conferencia3_nombre']."<br>";
						}

						if ($contenidocorreo['horasfederaciones'] == 1) {
							$contenido .= "<strong>Horas FBCV u otra federación:</strong> Sí<br>";
						}
						else {
							$contenido .= "<strong>Horas FBCV u otra federación:</strong> No<br>";
						}

						if ($contenidocorreo['certificadoasistencia'] == 1) {
							$contenido .= "<strong>Certificado asistencia:</strong> Sí<br>";
						}
						else {
							$contenido .= "<strong>Certificado asistencia:</strong> No";
						}

				$contenido .="</p>";


				// Creamos todo el cuerpo de la vista en HTML
				$body = '
				<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="https://www.w3.org/1999/xhtml">
						<head>
							<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
							<title>L´Alqueria del Basket</title>
							<meta name="viewport" content="width=device-width, initial-scale=1.0">
						</head>
						<body style="margin: 0; padding: 0;">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tr>
									<td style="padding: 20px 0 30px 0;">
										<!--[if (gte mso 9)|(IE)]>
										<table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
											<tr>
												<td>
										<![endif]-->

										<table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
											<tr>
												<td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
													<a href="https://servicios.alqueriadelbasket.com" target="_blank">
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
													<p><strong>Fecha de la jornada:</strong> '.$jornada.'</p>
													<p><strong>ID de solicitud:</strong> '.$id.'</p>
													<p>'.$contenido.'</p>
												</td>
											</tr>
											<tr>
												<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
													<table border="0" cellpadding="0" cellspacing="0" width="100%">
														<tr>
															<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
																<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
																<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
																<span style="color: #ffffff;">+34 96 121 55 43</span>
															</td>
															<td width="25%" align="right">
																<table border="0" cellpadding="0" cellspacing="0">
																	<tr>
																		<td>
																			<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																		<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																		<td>
																			<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																				<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																			</a>
																		</td>
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</table>
										<!--[if (gte mso 9)|(IE)]>
												</td>
											</tr>
										</table>
										<![endif]-->
									</td>
								</tr>
							</table>
						</body>
					</html>';

				// Mostramos la vista en HTML
				echo "<pre>";
				echo $body;
				echo "</pre>";
			}
		}


	    //  Exporta el listado de inscritos a SPORTS CLUB
	    public function actionExportToExcelJornadasFormacion() {
	        if (self::isLogged()) {
	            require "models/inscripciones.php";
	            $inscripciones = inscripciones::findAllInscripcionesExcelJornadasFormacion();

	            if (count($inscripciones) > 0) {
					$filename = "Jornadas-Formacion-".date('Y-m-d').".xls";
	                header('Content-Type: text/html; charset=utf-16');
	                header("Content-Type: application/vnd.ms-excel; charset=utf-16");
	                header("Content-Disposition: attachment; filename=".$filename."");
	                header('Cache-Control: max-age=0');

	                echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", "id")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "fecharegistro")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "nombre")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "apellidos")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "dni")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "email")."\t".

	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia1")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia2")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia3")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia1_nombre")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia2_nombre")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "conferencia3_nombre")."\t".

	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "horasfederaciones")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "certificadoasistencia")."\t".
	                        iconv("UTF-8", "ISO-8859-1//TRANSLIT", "evento")."\n";


	                foreach($inscripciones as $inscripcion) {
	                    echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['id'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['fecharegistro'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['nombre'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['apellidos'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['dni'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['email'])."\t".

	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia1'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia2'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia3'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia1_nombre'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia2_nombre'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['conferencia3_nombre'])."\t".

	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['horasfederaciones'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['certificadoasistencia'])."\t".
	                            iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['evento'])."\n";
	                }
	                exit;
	            }
	        }
	    }



		// Método para comprobar el login
		private static function isLogged() {
			if (isset($_SESSION['usuario']) ) {
				return true;
			}
			else {
				header('Location: index.php?r=login/loger');
			}
		}
	}
?>