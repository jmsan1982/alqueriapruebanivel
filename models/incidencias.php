<?php
	class incidencias {


		
	    public static function findAllIncidencias()
	    {
	        
	        $query = db::singleton()->query('select * from incidencias where fecharegistro>= "2019-12-09" order by idincidencia desc');
	        if ($query)
	            return $query->fetchAll();
	        else
	            return false;
	    }


		public static function findIncidenciaporEstado($estado) {
			
			return db::singleton()->query('SELECT * FROM incidencias WHERE solucionado= '.'"'.$estado.'" ')->fetch();
		}

		public static function findIncidenciaporId($id) {
			
			return db::singleton()->query('SELECT * FROM incidencias WHERE idincidencia='.'"'.$id.'"')->fetch();
		}


		public static function findIncidenciaporFecha($fecha) {
			
			return db::singleton()->query('SELECT * FROM incidencias WHERE fecharegistro='.'"'.$fecha.'"')->fetch();
		}




		public static function newFormIncidencias($fecharegistro,  $nombre, $tipo, $detalle,   $ficherosubido1,   $email) {
			$sql = "INSERT INTO incidencias (nombre, fecharegistro,  email, tipoincidencia, detalle, solucionado, imagen)
			VALUES (:nom,:fechareg,:email,:tipo,:detall,:solucion,:img )";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fechareg' => $fecharegistro, ':nom' => $nombre, ':img' => $ficherosubido1,  ':tipo' => $tipo,  ':detall' => $detalle, ':email' => $email, ':solucion' => 0 );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}


		// Desde el back se marca la incidencia como cerrada
		public static function ActualizaEstadoIncidencia($codigo, $solucionado, $fecha, $persona,  $observ) {
			$sql = "UPDATE incidencias SET solucionado=:est , fechasolucion=:fecha, cerrada_por=:tec, observ_internas=:ob WHERE idincidencia=:id";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $codigo, ':est' => $solucionado, ':fecha' => $fecha, ':tec' => $persona, ':ob' => $observ);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('La incidencia se cerró correctamente.');
				window.location.replace('?r=incidencias/BackIncidencias'); </script>";
				die;
			}
		}


		 //para la consulta de exportar a excel
	    public static function findAllInscripcionesExcelIncidencias()
	    {
	        
	       /* $query = db::singleton()->query('select fecharegistro,  convert(cast(convert(nombre using latin1) as binary) using utf8) as nombre, convert(cast(convert(apellidos using latin1) as binary) using utf8) as Apellidos, fechanacimiento, dni, email, telefono, convert(cast(convert(direccion using latin1) as binary) using utf8) as direccion,  cp, provincia, convert(cast(convert(poblacion using latin1) as binary) using utf8) as poblacion,evento,  ambito, convert(cast(convert(lugar using latin1) as binary) using utf8) as lugar, horario, autorizodatos, autorizoimagen, fecahev_desde, fechaev_hasta  from voluntariados where fecharegistro>"2019-11-04" order by id desc');*/
	        $query = db::singleton()->query('select idincidencia, nombre,  fecharegistro, fechasolucion, email, tipoincidencia, detalle, solucionado, cerrada_por, observ_internas  from incidencias  order by idincidencia desc');
	        if ($query)          
	          return $query->fetchAll(PDO::FETCH_ASSOC);

	        else
	            return false;
	    }


	   

		// Envío de emails 
		public static function mailsSendIncidencia($numeropedido, $contenido, $seccioninscripcion, $email) {
			// Cargamos la clase PHPMailer
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
			$mail->From = "alqueria@alqueriadelbasket.info";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L´Alqueria del Basket");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email);

			// Con copia oculta
			//$mail->AddBCC('imartinez@valenciabasket.com', 'Valencia Basket Inscripción Adidas');

			// Con copia 
			$mail->AddCC('mvidal@alqueriadelbasket.com', 'MVidal');
			$mail->AddCC('mantenimiento@alqueriadelbasket.com', 'Mantenimiento');
			//$mail->AddCC('recepcion@alqueriadelbasket.com', 'Recepcion');

			// Ponemos aquí el asunto
			$mail->Subject = "Registro de nueva incidencia";

			// Creamos todo el cuerpo del Email en Html en la variable $body
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
												<a href="https://alqueriadelbasket.com" target="_blank">
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L´Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h2>
												<p><strong>Estos son los datos recibidos relacionados con su incidencia.</strong></p>
												<p><strong>Número de registro:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la solicitud, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2019</span><br>
															<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Valencia</span><br>
															<span style="color: #ffffff;">+34 961 215 543</span>
														</td>
														<td width="25%" align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
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
				//error_log( $mail->ErrorInfo );
				//error_log("Entramos al fallo");
				return false;
			}
			else {
				//$mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}
	}
?>