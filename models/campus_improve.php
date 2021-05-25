<?php
	class campus_improve {

		public static function comprobarRepetidos() {
			return db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE evento="Campus Improve 2019"')->fetchAll();
		}


		public static function damedatos($numero) {
			return db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE id=' . $numero)->fetchAll();
		}


		public static function damedatoscampus($numero) {
			return db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE numero_pedido=' . $numero)->fetch();
		}


		public static function findInscripciones($evento) {
			$query = db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE evento LIKE "%'.$evento.'%" order by numero_pedido desc');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		// Actualizar el pagado al retorno del TPV
		public static function actualizapagadoretornotpv($codigo, $pagado) {
			$sql = "UPDATE inscripciones_eventos_extras SET pagado=:pag WHERE numero_pedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}


		// Actualizar pagado desde el back
		public static function actualizapagado($id, $pagado) {
			$sql = "UPDATE inscripciones_eventos_extras SET pagado=:pag, tipo_pago=:tipopag WHERE id=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'> alert('El pago se grabó correctamente.');
					window.location.replace('?r=campus/BackCampusImproveTalent'); </script>";
				die;
			}
		}      


		public static function DardeBajacampusimprovet($codigo) {
			$sql = "UPDATE inscripciones_eventos_extras SET eliminado=1 WHERE numero_pedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El registro se eliminó correctamente.');
				window.location.replace('?r=campus/BackCampusImproveTalent'); </script>";
				die;
			}
		}  


		// Para la consulta de exportar a excel
		public static function findAllInscripcionesExcel($evento) {	   
			$query = db::singleton()->query('SELECT fecharegistro, numero_pedido, convert(cast(convert(nombre using latin1) AS binary) using utf8) AS nombre, convert(cast(convert(apellidos using latin1) AS binary) using utf8) AS apellidos, fechanacimiento, dni, convert(cast(convert(club using latin1) AS binary) using utf8) AS club, tallacamiseta, transporte, enfermedad, convert(cast(convert(alergias using latin1) AS binary) using utf8) AS alergias, tratamientosmedicos, operacionreciente, convert(cast(convert(observaciones using latin1) AS binary) using utf8) AS observaciones,  convert(cast(convert(nombretutor using latin1) AS binary) using utf8) AS nombretutor, convert(cast(convert(apellidostutor using latin1) AS binary) using utf8) AS apellidostutor, dnitutor, convert(cast(convert(direccion using latin1) AS binary) using utf8) AS direccion, numero, piso, puerta, cp, provincia, convert(cast(convert(poblacion using latin1) AS binary) using utf8) AS poblacion, convert(cast(convert(pais using latin1) AS binary) using utf8) AS pais, autorizodatos, autorizoimagen, telefonotutor, emailtutor, tipo_pago, pagado, importe, opcion, evento, tipo_pago  from inscripciones_eventos_extras WHERE eliminado=0 and evento like "%'.$evento.'%" order by numero_pedido desc');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function findLastNumeroPedidoCampusImprove() {
			return db::singleton()->query('SELECT MAX(numero_pedido) FROM inscripciones_eventos_extras')->fetch();
		}


		public static function newFormCampusImprove($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallacamiseta, $enfermedad, $alergias, $tratamientosmedicos, $operacionreciente, $observaciones, $fotocopiasipsubida, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $numeropedido, $importe, $evento, $tipopago) {

			$sql = "INSERT INTO inscripciones_eventos_extras (fecharegistro, opcion, nombre, apellidos, fechanacimiento, dni, club, tallacamiseta, enfermedad, alergias, tratamientosmedicos, operacionreciente, observaciones, ficherosubido1, nombretutor, apellidostutor, dnitutor, direccion, numero, piso, puerta, cp, provincia, poblacion, telefonotutor, emailtutor, pagado, numero_pedido, importe, evento, tipo_pago) VALUES (:fecharegistro, :opcion, :nombre, :apellidos, :fechanacimiento, :dni, :club, :tallacamiseta, :enfermedad, :alergias, :tratamientosmedicos, :operacionreciente, :observaciones, :fotocopiasipsubida, :nombretutor, :apellidostutor, :dnitutor, :direccion, :numero, :piso, :puerta, :cp, :provincia, :poblacion, :telefonotutor, :emailtutor, :pagado, :numeropedido, :importe, :evento, :tipopago)";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => date("Y-m-d"), ':opcion' => $opcion, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':tallacamiseta' => $tallacamiseta, ':enfermedad' => $enfermedad, ':alergias' => $alergias,':tratamientosmedicos' => $tratamientosmedicos,':operacionreciente' => $operacionreciente, ':observaciones' => $observaciones, ':fotocopiasipsubida' => $fotocopiasipsubida, ':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':pagado' => 0, ':numeropedido' => $numeropedido, ':importe' => $importe, ':evento' => $evento, ':tipopago' => $tipopago);

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			} 
			else {
				return true;
			}
		}


		// Envío de mail al cliente
		public static function mailssend($numeropedido, $contenido, $seccioninscripcion, $email) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aquí el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aquí nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contraseña
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// Añadimos la dirección del remitente
			$mail->From = "inscripcion@valenciabasket.com";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L´Alqueria del Basket");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email, 'Inscripción Campus Improve Basketball Talent 2019');

			// Con copia oculta
			$mail->AddBCC('campus@valenciabasket.com', 'Inscripción Campus Improve Basketball Talent 2019');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripción Campus Improve Basketball Talent 2019');

			// Ponemos aquí el asunto
			$mail->Subject = $seccioninscripcion;

			// Creamos todo el cuerpo del email en HTML en la variable $body
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
													<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
													alt="Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p><strong>Número de pedido:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la inscripción, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
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

			// Añadimos aquí el cuerpo del Email
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if (!$mail->Send()) {
				//$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}
	}
?>