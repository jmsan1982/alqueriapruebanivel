<?php
	class escuela_verano {

		// Escuela de verano en L´Alqueria
		public static function damedatosescuelaverano($numero) {
			return db_utf8::singleton()->query('SELECT * FROM registros_escuela_verano WHERE numeropedido='.'"'.$numero.'"')->fetch();
		}

		public static function damedatosescuelaveranobyid($numero) {
			return db_utf8::singleton()->query('SELECT * FROM registros_escuela_verano WHERE id = '.$numero)->fetch();
		}



		public static function findAllInscripcionesEscuelaVeranoAlq() {
			$query = db_utf8::singleton()->query('SELECT * FROM registros_escuela_verano WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}



		//Para contar los registros de cada opcion (internos o externos) y mostrarlos en el back
		public static function findInscripcionesEscuelaVeranoAlqByOpcion($filtro)
        {
			//error_log(print_r('SELECT count(*) as total FROM inscripciones_eventos_extras WHERE evento="Shooting 2021" and eliminado=0 and  fecharegistro>"2021-02-01" and opcion like'.'"%'.$filtro.'%"',1));
			return db_utf8::singleton()->query('SELECT count(*) as total FROM registros_escuela_verano WHERE  eliminado=0 and  fecharegistro>"2021-02-01" and '. $filtro .'<>""')->fetch();
		}

		public static function actualizapagadoescuelaverano($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_verano SET pagado = :pag WHERE numeropedido = :numero";
			$query = db_utf8::singleton()->prepare($sql);

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


		// Para la consulta de exportar a excel
		public static function findAllInscripcionesExcelEscuelaVeranoAlqConCampos($where, $campoorder, $campos)	{



			$query = db_utf8::singleton()->query('SELECT fecharegistro, numeropedido as Pedido,  genero as Genero, concat (nombre, " ", apellidos) AS Inscrito, fechanacimiento,  '. $campos .'    concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipopago as TipoPago FROM registros_escuela_verano WHERE eliminado=0  and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			
			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}

		//para la consulta de exportar a excel, muestra todos los datos
		public static function findAllInscripcionesExcelEscuelaVeranoAlq() {
			$query = db_utf8::singleton()->query('SELECT fecharegistro, numeropedido, 
				concat (nombre, " ", apellidos) AS Inscrito, genero, fechanacimiento, dni, 
				semana1 , semana2 , semana3 , semana4 , semana5 , diassueltos, club AS Club, tratamientosmedicos AS ObservMedicas, 
				concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor, emailtutor, dnitutor, direccion, numero, piso, puerta, cp, provincia, poblacion, autorizodatos, autorizoimagen, tipopago, if(pagado=1, "Si", "No") AS pagado, importe, sintomascovid, familiarcovid FROM registros_escuela_verano WHERE eliminado = 0 AND fecharegistro >= "2021-01-01" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function DardeBajaEscuelaVeranoAlq($pedido) {
			$sql = "UPDATE registros_escuela_verano SET eliminado = 1 WHERE numeropedido = :numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El registro se eliminó correctamente.');
						window.location.replace('?r=campus/BackEscuelaVeranoAlq');
					</script>";
				die;
			}
		}


		// Cuando se paga desde oficinas por el back marcamos el pedido como pagado =1
		public static function ActualizaPagadoEscuelaVeranoAlq($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_verano SET pagado = :pag WHERE numeropedido = :numero";

			$query = db_utf8::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'>
						alert('El pago se grabó correctamente.');
						window.location.replace('?r=campus/BackEscuelaVeranoAlq');
					</script>";
				die;
			}
		}


		//ACTUALIZA EL error del pago AL RETORNO DEL TPV (SOLO SI EL PAGADO ESTA A CERO POR SI LE DAN DOS VECES A PAGAR) -CORRECTO
		public static function actualizacodigoerror($pedido, $codigo_error) {
			$sql = "UPDATE registros_escuela_verano SET eliminado=1, errorcode=:error  WHERE pagado=0 and numeropedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido, ':error' => $codigo_error);

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				return true;
			}
		}


		public static function comprobarRepetidos(){
			return db_utf8::singleton()->query('SELECT * FROM registros_escuela_verano where fecharegistro > "2021-01-01"')->fetchAll();
		}


		public static function findLastNumeroPedidoEscuelaVerano() {
			return db_utf8::singleton()->query('SELECT MAX(id) FROM registros_escuela_verano')->fetch();
		}


		public static function newFormEscuelaVerano($fecharegistro, $semana1 ,$semana2 ,$semana3 ,$semana4 ,$semana5 ,$semana6 ,$textoDiasSueltos, $genero, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tratamientosmedicos, $fotocopiasipsubida, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $numeropedido, $importe, $evento, $tipopago, $sintomascovid, $familiarcovid, $ficherosubido2) {

			$sql = "INSERT INTO registros_escuela_verano (fecharegistro, semana1, semana2, semana3, semana4, semana5, semana6, diassueltos, genero, nombre, apellidos, fechanacimiento, dni, club, tratamientosmedicos, fotocopiasip, nombretutor, apellidostutor, dnitutor, direccion, numero, piso, puerta, cp, provincia, poblacion, telefonotutor, emailtutor, autorizodatos, autorizoimagen, pagado, numeropedido, importe, evento, tipopago, sintomascovid, familiarcovid, resguardopago)
			VALUES (:fecharegistro, :semana1, :semana2, :semana3, :semana4, :semana5, :semana6, :diasSueltos, :genero, :nombre, :apellidos, :fechanacimiento, :dni, :club, :tratamientosmedicos, :fotocopiasipsubida, :nombretutor, :apellidostutor, :dnitutor, :direccion, :numero, :piso, :puerta, :cp, :provincia, :poblacion, :telefonotutor, :emailtutor, :autorizodatos, :autorizoimagen, :pagado, :numeropedido, :importe, :evento, :tipopago, :sintomasc, :famili, :ficherosubido2)";

			$query = db_utf8::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => $fecharegistro, ':semana1' => $semana1, ':semana2' => $semana2, ':semana3' => $semana3, ':semana4' => $semana4, ':semana5' => $semana5, ':semana6' => $semana6, ':diasSueltos' => $textoDiasSueltos, ':genero' => $genero, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':tratamientosmedicos' => $tratamientosmedicos, ':fotocopiasipsubida' => $fotocopiasipsubida, ':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor,  ':autorizodatos' => $autorizodatos, ':autorizoimagen' => $autorizoimagen, ':pagado' => 0, ':numeropedido' => $numeropedido, ':importe' => $importe, ':evento' => $evento, ':tipopago' => $tipopago,':sintomasc' => $sintomascovid,':famili' => $familiarcovid, ':ficherosubido2' => $ficherosubido2);

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}




		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichaescuelaveranoAlq($idinscripcion,$dnijugador,$nombre,$apellidos,$fechanac, $club,  $direccion, $numero, $piso, $puerta, $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  $tratam,  $semana2, $semana3, $semana4, $semana5, $semana1, $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe)
		{
			//error_log("id_inscrip en update= ".$idinscripcion,1);
			$sql = "UPDATE registros_escuela_verano SET nombre=:nombre, apellidos=:apel, fechanacimiento=:fechan, dni=:dnij, club=:club, tratamientosmedicos=:tratm,  nombretutor=:nomtut, apellidostutor=:apeltut, dnitutor=:dnitut, direccion=:direc, numero=:num, piso=:piso, puerta=:puerta, cp=:cp, provincia=:prov, poblacion=:pob, telefonotutor=:telef, emailtutor=:email, semana2=:t2, semana3=:t3, semana4=:t4, semana5=:t5, semana1=:t1, fotocopiasip=:sip, resguardopago=:resg, sintomascovid=:sint, familiarcovid=:famili, tipopago=:tipop, genero=:gen, importe=:precio WHERE id=:numero";
			$query = db_utf8::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $fechanac, ':club' => $club,  ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':tratm' =>$tratam,  ':t2' =>$semana2, ':t3' =>$semana3, ':t4' =>$semana4, ':t5' =>$semana5, ':t1' =>$semana1, ':sip' =>$sip, ':resg' =>$resguardo, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':tipop' =>$tipopago, ':gen' =>$genero, ':precio' =>$importe);

			error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}



		// Envío de Email al cliente
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
           // $mail->SMTPSecure = "tls";   

            // Indicamos aquí nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contraseña
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// Añadimos la dirección del remitente
			$mail->From = "alqueria@alqueriadelbasket.info";

			// Añadimos el nombre del emisor
			$mail->FromName = "L´Alqueria del Basket";

			// En la dirección de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com", "L´Alqueria del Basket");

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($email, 'Inscripción en Escuela Verano 2021 L´Alqueria');

			// Con copia oculta
			$mail->AddBCC('campus@valenciabasket.com', 'Inscripción en Escuela Verano 2021 L´Alqueria');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripción en Escuela Verano 2021 L´Alqueria');
			//$mail->AddBCC('amomplet@tessq.com', 'Inscripción en Escuela Verano 2020 L´Alqueria');


			// Ponemos aquí el asunto
			$mail->Subject = $seccioninscripcion;

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
												<a href="https://servicios.alqueriadelbasket.com" target="_blank">
													<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
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