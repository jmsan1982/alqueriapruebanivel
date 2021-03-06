<?php
	class envios_emails {
		/** enviar_email_test() envía una email de test */
		public static function enviar_email_test() {
			$body='<html>
						<body style="margin: 0.2em;">
							<div style="width: 80%; padding: 2em;">
								<p style="font-family: Helvetica LT Condensed; color: black; font-size: 16px;">
									Envío de prueba por cortesía de Pablo Muñoz
								</p>
							</div>
						</body>
					</html>';

			return self::enviar_email_generico("Asunto de prueba", $body,
										"pmunoz@tessq.com",	"Pablo Muñoz",
										"alqueria@alqueriadelbasket.com", "L'Alqueria del Basket",
										"recepcion@alqueriadelbasket.com", "Recepción - L'Alqueria del Basket",
										"",	"",
										"",	"");
		}


		// Email de agradecimiento por participar en la encuesta del campus de navidad 2018
		public static function enviar_email_agradecimiento_encuesta_campus_navidad_2018($email_destinatario, $asunto, $body) {
			self::enviar_email_generico($asunto,$body,
				$email_destinatario,"",
				"alqueria@alqueriadelbasket.com","L'Alqueria del Basket",
				"","",
				"","",
				"","");
		}


		// Email de agradecimiento por participar en la encuesta del campus de pacua 2019
		public static function enviar_email_agradecimiento_encuesta_campus_pascua_2019($email_destinatario, $asunto, $body) {
			self::enviar_email_generico($asunto,$body,
				$email_destinatario,"",
				"alqueria@alqueriadelbasket.com","L'Alqueria del Basket",
				"","",
				"","",
				"","");
		}


		// Email de registro en la Liga de L´Alqueria del Basket
		public static function enviar_email_liga_alqueria($contenido, $ResponsableEmail, $ResponsableNombre) {
			self::enviar_email_generico("Solicitud de registro en la Liga de L´Alqueria del Basket", $contenido,
										$ResponsableEmail, $ResponsableNombre,
										"alqueria@alqueriadelbasket.com", "L'Alqueria del Basket",
										"ligasbasket@alqueriadelbasket.com", "Liga de L'Alqueria del Basket",
										"ligasbasket@alqueriadelbasket.com", "Liga de L'Alqueria del Basket",
										"amomplet@tessq.com", "Alex TESSQ");
		}


		// Email de nueva inscripcion ADIDAS NEXT GENERATION 2019 para ISMAEL
		public static function enviar_email_nueva_inscripcion_adidas_next_2019($asunto,$contenido) {
			self::enviar_email_generico($asunto,$contenido,
				"imartinez@valenciabasket.com",
				"Ismael Martínez",
				"alqueria@alqueriadelbasket.com",
				"L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",
				"L'Alqueria del Basket",
				"",
				"",
				"",
				"");
		}


		// Email de nueva inscripcion ADIDAS NEXT GENERATION 2019 para el usuario 
		public static function enviar_email_nueva_inscripcion_adidas_next_2019_usuario($asunto,$contenido,$email,$nombre)
		{
			self::enviar_email_generico($asunto,$contenido,
				$email,
				$nombre,
				"imartinez@valenciabasket.com",
				"Ismael Martínez",
				"imartinez@valenciabasket.com",
				"Ismael Martínez",
				"",
				"",
				"",
				"");
		}


		public static function enviar_email_nueva_inscripcion_sportsclub($asunto_email,$contenido_email,$email,$nombre_destinatario) 
		{
			self::enviar_email_generico(
				$asunto_email,  $contenido_email, $email, $nombre_destinatario,
				"alqueria@alqueriadelbasket.com",
				"L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",
				"L'Alqueria del Basket",
				"",
				"",
				"",
				"");
		}


		/*  INSCRIPCIONES ACADEMY   */
		public static function enviar_email_nueva_inscripcion_alqueriaAcademy(
			$asunto_email,  $contenido_email,   $email_destinatario,    $nombre_destinatario)
		{
			//  No elimino el método porque lo correcto es que la funcionalidad esté aquí.
			error_log(__FILE__.__FUNCTION__.__LINE__);
			error_log("Este método no funciona. El envío del email de confirmación se hace en /tpv_academy/ejemploRecepcionaPet.php. Hacemos die");
			die;
			 
			/*
			$body='<html>
						<body style="margin: 0.2em;">
							<div style="width: 80%; padding: 2em;">
								<p style="font-family: Helvetica LT Condensed; color: black; font-size: 16px;">
									Envío de prueba por cortesía de Pablo Muñoz
								</p>
							</div>
						</body>
					</html>';

			return self::enviar_email_generico("Asunto de prueba", $body,
										"pmunoz@tessq.com",	"Pablo Muñoz",
										"alqueria@alqueriadelbasket.com", "L'Alqueria del Basket",
										"recepcion@alqueriadelbasket.com", "Recepción - L'Alqueria del Basket",
										"",	"",
										"",	"");
			die;

			return self::enviar_email_generico("ejemplo de azunto", 	"ejemplo de contenido_email",
										$email_destinatario,	$nombre_destinatario,
										"alqueria@alqueriadelbasket.com", "L'Alqueria del Basket",
										"recepcion@alqueriadelbasket.com", "Recepción - L'Alqueria del Basket",
										"",	"",
										"",	"",
										"",	"");

			die;
			$envio_email=self::enviar_email_generico(
				$asunto_email,  $contenido_email, 
				$email_destinatario, $nombre_destinatario,
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				$email_cc1,  $nombre_cc1,
				$email_cc2,  $nombre_cc2,
				"",   "");

			error_log(__FILE__.__FUNCTION__.__LINE__);
			error_log(print_r($envio_email,1));

			return $envio_email;
			*/
		}


		/*  INSCRIPCIONES 2020 CANTERA / ESCUELA: ENVIO EMAIL QUE AVISA A PEPE PARA REVISAR */
		public static function enviar_email_revisión_inscripcion_escuela_cantera_2020(
			$asunto_email,      $contenido_email,   $email_destinatario,    $nombre_destinatario, 
			$email_cc1="",      $nombre_cc1="",     $email_cc2="",          $nombre_cc2="",
			$archivo="",        $nombre_archivo="")
		{
			self::enviar_email_generico(
				$asunto_email,      $contenido_email,   $email_destinatario,        $nombre_destinatario,
				"alqueria@alqueriadelbasket.com",       "L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",       "L'Alqueria del Basket",
				"pmunoz@tessq.com",                     "Pablo Muñoz",
				$email_cc2, $nombre_cc2,
				$archivo,   $nombre_archivo);
		}


		/*  INSCRIPCIONES 2020 CANTERA / ESCUELA: ENVIO EMAIL CONFIRMACION */
		public static function enviar_email_nueva_inscripcion_cantera_2020(
			$asunto_email,      $contenido_email,   $email_destinatario,    $nombre_destinatario, 
			$email_padre="",    $nombre_padre="",   $email_madre="",        $nombre_madre="",
			$archivo="",        $nombre_archivo="")
		{
			$envio_email=self::enviar_email_generico(
				$asunto_email,  $contenido_email,   $email_destinatario, $nombre_destinatario,
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				$email_padre,
				$nombre_padre,
				$email_madre,
				$nombre_madre,
				$archivo,$nombre_archivo);

			//ERror_log(__FILE__.__FUNCTION__.__LINE__);
			//error_log(print_r($envio_email,1));

			return $envio_email;
		}


		// INSCRIPCIONES 2020 CANTERA / ESCUELA : CIRCULAR PREVIA INFORMATIVA */
		public static function enviar_email_circular_escuela_cantera_2020($asunto_email,$contenido_email,$email_destinatario,$nombre_jugador,
				$email_madre,       $nombre_madre,
				$email_padre,       $nombre_padre)
		{
			return self::enviar_email_generico(
				$asunto_email,  $contenido_email,   $email_destinatario, $nombre_jugador,
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				"alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
				$email_madre,       $nombre_madre,
				$email_padre,       $nombre_padre,
				"","");
		}


		// DECLARACIÓN RESPONSABLE PARA ASISTENCIA A EVENTOS/ACTIVIDADES DEL VBC
		public static function enviar_email_declaracion_responsable($asunto_email, $contenido_email)
		{
			return self::enviar_email_generico(
				$asunto_email,	$contenido_email,	"eventos@valenciabasket.com",	"Departamento Eventos VBC",
				"valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
				"jlt@tessq.com",	"José Luis TESSQ",	"amomplet@tessq.com",	"Alex TESSQ",
				"",	"");
			//error_log(__FILE__.__FUNCTION__.__LINE__);
		}

        // DECLARACIÓN RESPONSABLE PARA ASISTENCIA A EVENTOS/ACTIVIDADES DE ALQUERIA
        public static function enviar_email_declaracion_responsable_alqueria_usuario($email, $nombre, $asunto_email, $contenido_email)
        {
            return self::enviar_email_generico(
                $asunto_email,	$contenido_email,	$email,	$nombre,
                "alqueriadelbasket@alqueriadelbasket.info",	"Alqueria del Basket",	"",	"",
                "jlt@tessq.com",	"jlt",	"jcanto@tessq.com",	"jCanto",
                "",	"");
            //error_log(__FILE__.__FUNCTION__.__LINE__);
        }

        public static function enviar_email_declaracion_responsable_alqueria_recepcion($asunto_email, $contenido_email)
        {
            return self::enviar_email_generico(
                $asunto_email,	$contenido_email,	"recepcion@alqueriadelbasket.com",	"Recepcion Alqueria del basket",
                "alqueriadelbasket@alqueriadelbasket.info",	"Alqueria del Basket",	"",	"",
                "jlt@tessq.com",	"jlt",	"jrojo@alqueriadelbasket.com",	"jRojo",
                "",	"");
            //error_log(__FILE__.__FUNCTION__.__LINE__);
        }


		// DECLARACIÓN RESPONSABLE PARA ASISTENCIA A EVENTOS/ACTIVIDADES DEL VBC (SOLO SI ES UN MEDIO DE COMUNICACIÓN)
		public static function enviar_email_declaracion_responsable_medios($asunto_email, $contenido_email)
		{
			return self::enviar_email_generico(
				$asunto_email,	$contenido_email,	"digital@alqueriadelbasket.com",	"Dpto. Digital",
				"valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
				"gcalvo@valenciabasket.com",	"Guillermo Calvo",	"amomplet@tessq.com",	"Alex TESSQ",
				"",	"");
			//error_log(__FILE__.__FUNCTION__.__LINE__);
		}


        // DECLARACIÓN RESPONSABLE PARA ASISTENCIA A EVENTOS/ACTIVIDADES PARA VIP
        public static function enviar_email_declaracion_responsable_vip($asunto_email, $contenido_email)
        {
            return self::enviar_email_generico(
                $asunto_email,	$contenido_email,	"jsancho@valenciabasket.com",	"Jorge Sancho",
                "valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
                "jlt@tessq.com",	"José Luis TESSQ",	"amomplet@tessq.com",	"Alex TESSQ",
                "",	"");
            //error_log(__FILE__.__FUNCTION__.__LINE__);
        }


        // DECLARACIÓN RESPONSABLE PARA ASISTENCIA A EVENTOS/ACTIVIDADES PARA PROVEEDORES
        public static function enviar_email_declaracion_responsable_proveedores($asunto_email, $contenido_email)
        {
            return self::enviar_email_generico(
                $asunto_email,	$contenido_email,	"medios@valenciabasket.com",	"Kike Almela",
                "valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
                "jlt@tessq.com",	"José Luis TESSQ",	"amomplet@tessq.com",	"Alex TESSQ",
                "",	"");
            //error_log(__FILE__.__FUNCTION__.__LINE__);
        }


		// DECLARACIÓN RESPONSABLE PARA ABONOS DEL VBC
		public static function enviar_email_declaracion_responsable_abonos($asunto_email, $contenido_email)
		{
			return self::enviar_email_generico(
				$asunto_email,	$contenido_email,	"amomplet@tessq.com",	"Alex TESSQ",
				"valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
				"jlt@tessq.com",	"José Luis TESSQ",	"",	"",
				"",	"");
			//error_log(__FILE__.__FUNCTION__.__LINE__);
		}


        // DECLARACIÓN RESPONSABLE PARA DEPORTITAS/STAFF TÉCNICO DE UNA ENTIDAD USUARIA
        public static function enviar_email_declaracion_responsable_entidad_usuaria($asunto_email, $contenido_email, $email_destinatario, $nombre_destinatario)
        {
            return self::enviar_email_generico(
                $asunto_email,	$contenido_email,	$email_destinatario,	$nombre_destinatario,
                "valenciabasket@valenciabasket.info",	"Valencia Basket",	"",	"",
                "jrojo@alqueriadelbasket.com",	"Juanjo Rojo",	"recepcion@alqueriadelbasket.com",	"Recepción L'Alqueria del Basket",
                "",	"");
            //error_log(__FILE__.__FUNCTION__.__LINE__);
        }


		// Email de reserva de sala de estudio
		public static function enviar_email_reserva_asiento_sala_estudio($asunto,$contenido, $emailjugador, $nombrejugador) {
			self::enviar_email_generico($asunto,$contenido,
				$emailjugador, $nombrejugador,
				"recepcion@alqueriadelbasket.com", "L'Alqueria del Basket",
				"pcasares@alqueriadelbasket.com", "L'Alqueria del Basket",
				"recepcion@alqueriadelbasket.com", "L'Alqueria del Basket",
				"",
				"",
				"", "");
		}


		public static function enviar_email_generico(
			$asunto,			$contenido,			$destinatario_email,	$destinatario_nombre,
			$quienenvia_email,	$quienenvia_nombre,	$replyto_email,			$replyto_name,
			$email_cc1_email,	$email_cc1_nombre,	$email_cc2_email,		$email_cc2_nombre,
			$archivo = "",		$nombre_archivo = "")
		{
			error_log(__FILE__.__FUNCTION__.__LINE__);
			// Definimos plantilla HTML con diseño Alqueria
			$plantilla_superior =
				'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
												<a href="https://www.alqueriadelbasket.com/" target="_blank">
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L´Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">';


			$plantilla_inferior =
											'</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L´Alqueria del Basket '.date("Y").'</span><br>
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

			$body = $plantilla_superior.$contenido.$plantilla_inferior;

			// Desactivar toda notificación de error
			error_reporting(0);

			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
			require_once("config.php");

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

			$mail->Host = __phpmailer_host__;

			// Asignamos el puerto SMTP que usa nuestro servidor
			// Normalmente es el 25, pero tu servidor lo podría haber cambiado.
			$mail->Port = __phpmailer_port__;
			$mail->SMTPSecure = __phpmailer_smtpsecure__;   
			

			// Indicamos aquí nuestro nombre de usuario
			//$mail->Username = $quienenvia_email;
			$mail->Username = __phpmailer_username__;

			// Indicamos la contraseña
			//$mail->Password = "abc01cba";
			$mail->Password = __phpmailer_password__;

			// Añadimos la dirección del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// Añadimos el nombre del emisor
			$mail->FromName = $quienenvia_nombre;

			// En la dirección de responder ponemos la misma del From
			$mail->AddReplyTo($replyto_email, $replyto_name);

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($destinatario_email, $destinatario_nombre);

			// Con copia oculta
			if ($email_cc1_email != "" && $email_cc1_nombre != ""){     error_log($email_cc1_email." - ".$email_cc1_nombre);$mail->AddBCC($email_cc1_email, $email_cc1_nombre); }
			if ($email_cc2_email != "" && $email_cc2_nombre != ""){     error_log($email_cc2_email." - ".$email_cc2_nombre);$mail->AddBCC($email_cc2_email, $email_cc2_nombre); }

			if($archivo!=="") {
				// Archivo añadido //  $mail->addAttachment($path, $name, $encoding, $type);
				$mail->AddAttachment($archivo, $nombre_archivo,  $encoding = 'base64', $type = 'application/pdf');
			}

			// Ponemos aquí el asunto del email según idioma
			$mail->Subject = $asunto;

			// Añadimos aquí el cuerpo del Email según idioma
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if($mail->Send()){
				error_log(__FILE__.__FUNCTION__.__LINE__);
				return true;
			}
			else {
				error_log(__FILE__.__FUNCTION__.__LINE__);
				return false;
			}
		}
	}
?>