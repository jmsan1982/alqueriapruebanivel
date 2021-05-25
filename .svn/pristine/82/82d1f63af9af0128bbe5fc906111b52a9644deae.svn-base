<?php
	class jornadasController {

		/********************************************************
		*  JORNADAS DE DETECCIÓN
		********************************************************/

		public function actionBackJornadasDeteccionListarInscripciones() {
			if (self::isLogged()) {
				require "models/inscripciones.php";

				$datos['todasinscripciones'] = inscripciones::findInscripcionesJornadasDeteccion();

				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_jornadas_deteccion_inscripciones");
			}
		}


		public function actionImprimirFicha() {
			// Comprobamos que el usuario tiene algún rol de administrador para continuar...
			if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {
				require "models/inscripciones.php";

				// Asignamos un título al cuerpo del HTML
				$seccioninscripcion = "Solicitud de inscripción a Jornadas de Detección";


				// Recogemos la variable "id" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
				$id = $_GET['id'];

				// Recogemos todos los datos del registro pasándole el número de pedido
				$contenidocorreo = inscripciones::damedatosjornadas($id);


				// Generamos el contenido de los datos a mostrar en el cuerpo del HTML				
				$contenidocorreo['fecharegistro'] = date("d/m/Y H:i", strtotime($contenidocorreo['fecharegistro']));

				$contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));


				if ($contenidocorreo['opcion'] == "jornada_1_2011_2012") {
					$opcion = "1ª Jornada (2011-2012)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_1_2009_2010") {
					$opcion = "1ª Jornada (2009-2010)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_1_2007_2008") {
					$opcion = "1ª Jornada (2007-2008)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_2_2009_2010") {
					$opcion = "2ª Jornada (2009-2010)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_2_2007_2008") {
					$opcion = "2ª Jornada (2007-2008)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_2_2005_2006") {
					$opcion = "2ª Jornada (2005-2006)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_3_2011_2012") {
					$opcion = "3ª Jornada (2011-2012)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_3_2009_2010") {
					$opcion = "3ª Jornada (2009-2010)";
				}
				elseif ($contenidocorreo['opcion'] == "jornada_3_2007_2008") {
					$opcion = "3ª Jornada (2007-2008)";
				}
				else {
					$opcion = "";
				}

				// Generamos el contenido del email a enviar //
				$contenido = "<p><strong>Fecha de registro:</strong> ".$contenidocorreo['fecharegistro']."
					<br><strong>Selección:</strong> ".$opcion."
					<br><strong>Género:</strong> ".$contenidocorreo['genero']."
					<br><strong>Nombre y apellidos:</strong> ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos']."
					<br><strong>Fecha de nacimiento:</strong> ".$contenidocorreo['fechanacimiento']."
					<br><strong>¿Practica el baloncesto?:</strong> ".$contenidocorreo['practicabaloncesto']."
					<br><strong>Club/Escuela:</strong> ".$contenidocorreo['club']."
					<br><strong>Teléfono tutor:</strong> ".$contenidocorreo['telefonotutor']."
					<br><strong>Email tutor:</strong> ".$contenidocorreo['emailtutor']."</p>";


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

				echo "<pre>";
				echo $body;
				echo "</pre>";
			}
			else {
				require('error.php');
			}
		}


		public function actionExportToExcelJornadasDeteccion() {
			require "models/inscripciones.php";

			$datos['inscripciones'] = inscripciones::findAllInscripcionesExcelJornadasDeteccion();

			if (isset($_POST["export_data"])) {
				$filename = "Jornadas_Deteccion_".date('Ymd') . ".xls";
				header('Content-Encoding: UTF-8');
				header('Content-Type: text/html; charset=utf-16');
				header("Content-Type: application/vnd.ms-excel; charset=utf-16");
				header("Content-Disposition: attachment; filename=".$filename."");
				header('Cache-Control: max-age=0');
				$show_column = false;

				if (!empty($datos['inscripciones'])) {
					foreach ($datos['inscripciones'] as $inscripcion) {
						if (!$show_column) {
							// Display field/column names in first row
							echo implode("\t", array_keys($inscripcion)) . "\r\n";
							$show_column = true;
						}
						echo implode("\t", array_values($inscripcion)) . "\r\n";
					}
				}
				exit;
			}
		}


		public function actionDardeBajaJornadasDeteccion() {
			if (isset($_POST['id'])) {

				$codigo = $_POST['id'];

				echo "<div style='width: 100%; height: 100%; background-color: rgba(0,0,0,.8); padding-top: 10%;'>
						<div class='contact-form-wrapper' style='width: 50%; margin-left: 25%; background-color: white; border: 1px solid #000000; border-radius: 10px; padding: 25px;'>
							<form action='?r=jornadas/DardeBajaJornadasDeteccion' method='post'>
								<p style='text-align: center; font-size: 150%;'>¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO?</p>
								<div style='text-align: center;'>
									<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
									<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
								</div>
								<input type='hidden' name='id_validado' value='".$codigo."'>
							</form>
						</div>
					</div>";
				die; 
			}

			if (isset($_POST['confirm'])) {
				if ($_POST['confirm'] == "SI") {
					require "models/inscripciones.php";

					$id = $_POST['id_validado'];

					$baja_reg = inscripciones::DardeBajaJornadasDeteccion($id);
				}
				if ($_POST['confirm'] == "NO") {
					echo "<script text='javascript'>
							window.location.replace('?r=jornadas/BackJornadasDeteccionListarInscripciones');
						</script>";
				}
			}
			else {
				require "error.php";
			}
		}


		public function actionBackJornadasDeteccionActualizarPagado() {
			if (isset($_POST['id'])) {
				require "models/inscripciones.php";

				if (isset($_POST['pagado'])) {
					$pagado = 'Si';
				}
				else {
					$pagado = "No";
				}
				inscripciones::actualizarPagadoJornadasDeteccion($_POST['id'], $pagado);
			}
		}

		// Método comprobar login
		private static function isLogged() {
			if (isset($_SESSION['usuario'])) {
				return true;
			}
			else {
				header('Location: index.php?r=login/loger');
			}
		}
	}
?>