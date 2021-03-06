<?php
	class escuela_navidad {

		public static function findInscripcionesNavidadPagadas() {
			
			$query = db::singleton()->query('SELECT * FROM registros_escuela_navidad WHERE eliminado=0 and pagado=1 AND fecharegistro> "2020-10-19" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		public static function findInscripcionesNavidad() {
			
			$query = db::singleton()->query('SELECT * FROM registros_escuela_navidad WHERE eliminado=0 and fecharegistro> "2020-10-19" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function findDatosEscuelaNavidadById($idinscripcion)
        {
			//error_log(print_r('SELECT * FROM registros_campus_navidad WHERE id = '.$idinscripcion,1));
			return db::singleton()->query('SELECT * FROM registros_escuela_navidad WHERE id = '.$idinscripcion)->fetch();
		}

		public static function damedatosescuelanavidad($numero) {

			return db::singleton()->query('SELECT * FROM registros_escuela_navidad WHERE numeropedido='.'"'.$numero.'"')->fetch();
		}


		// Para actualizar con el pago online
		public static function actualizapagadoescuelavnavidad($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_navidad SET pagado=:pag WHERE numeropedido=:numero";
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


		// Cuando se paga desde oficinas por el back marcamos el pedido como pagado =1
		public static function ActualizaPagadoEscuelaNavidadAlq($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_navidad SET pagado=:pag , tipopago=:tipopag WHERE numeropedido=:numero";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $codigo, ':pag' => $pagado, ':tipopag' => "OFICINA");

			if (!$query->execute($datos)) {
				return false;
			} 
			else {
				echo "<script text='javascript'> alert('El pago se grab?? correctamente.');
				window.location.replace('?r=campus/BackEscuelaNavidadAlq'); </script>";
				die;
			}
		}


		// Para actualizar el codigo de error al llegar al ho
		public static function actualizaerrortpvescuelavnavidad($pedido, $error) {
			$sql = "UPDATE registros_escuela_navidad SET errorcode=:dsr WHERE numeropedido=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $pedido, ':dsr' => $error);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				return true;
			}
		}



		public static function comprobarRepetidos() {
			return db::singleton()->query('SELECT * FROM registros_escuela_navidad WHERE fecharegistro>"2020-10-05"')->fetchAll();
		}


		public static function findLastNumeroPedidoEscuelaNavidad() {
			return db::singleton()->query('SELECT MAX(id) FROM registros_escuela_navidad')->fetch();
		}


		public static function newFormEscuelaNavidad($fecharegistro, $categoria, $opcion, $textoDiasSueltos, $nombre, $apellidos, $fechanacimiento, $dni, $club, $aspectomedico, $ficherosubido1, $ficherosubido2, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $tipopago, $numeropedido,$importe, $sintomasc, $familiarc, $genero) {

			$sql = "INSERT INTO registros_escuela_navidad (fecharegistro,categoria,opcion,diassueltos,nombre,apellidos,fechanacimiento,dni,club,aspectomedico,ficherosubido1,ficherosubido2,nombretutor,apellidostutor,dnitutor,direccion,numero,piso,puerta,cp,provincia,poblacion,telefonotutor,emailtutor,autorizodatos,autorizoimagen, pagado,tipopago, numeropedido, importe, sintomascovid, familiarcovid, genero)
			VALUES (:fecharegistro,:categoria,:opcion,:diassueltos,:nombre,:apellidos,:fechanacimiento,:dni,:club,:aspectomedico,:ficherosubido1,:ficherosubido2,:nombretutor,:apellidostutor,:dnitutor,:direccion,:numero,:piso,:puerta,:cp,:provincia,:poblacion,:telefonotutor,:emailtutor,:autorizodatos,:autorizoimagen, :pago, :tipop,:numped,:precio, :sintomas, :famili, :gen )";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => $fecharegistro, ':categoria' => $categoria, ':opcion' => $opcion, ':diassueltos' => $textoDiasSueltos, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':aspectomedico' => $aspectomedico, ':ficherosubido1' => $ficherosubido1, ':ficherosubido2' => $ficherosubido2, ':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':autorizodatos' => $autorizodatos, ':autorizoimagen' => $autorizoimagen, ':pago' => $pagado,':tipop' => $tipopago,':numped' => $numeropedido,':precio' => $importe, ':sintomas' => $sintomasc, ':famili' => $familiarc, ':gen'=>$genero );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}


		// Para la consulta de exportar a excel
		public static function findAllInscripcionesExcelEscuelaNavidadAlq()	{

			$query = db::singleton()->query('SELECT fecharegistro, numeropedido, genero, convert(cast(convert(nombre using latin1) AS binary) using utf8) AS nombre, convert(cast(convert(apellidos using latin1) AS binary) using utf8) AS Apellidos, fechanacimiento, dni, convert(cast(convert(opcion using latin1) AS binary) using utf8) AS opcion, diassueltos, club,   convert(cast(convert(aspectomedico using latin1) AS binary) using utf8) AS ObserMedicas,   convert(cast(convert(nombretutor using latin1) AS binary) using utf8) AS nombretutor, convert(cast(convert(apellidostutor using latin1) AS binary) using utf8) AS apellidostutor, telefonotutor, emailtutor, dnitutor, convert(cast(convert(direccion using latin1) AS binary) using utf8) AS direccion, numero, piso, puerta, cp, provincia, convert(cast(convert(poblacion using latin1) AS binary) using utf8) AS poblacion, autorizodatos, autorizoimagen, tipopago, if(pagado=1, "Si", "No") AS pagado, importe, sintomascovid, familiarcovid FROM registros_escuela_navidad WHERE eliminado=0 and fecharegistro>"2020-10-04" ORDER BY numeropedido DESC');

			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}




		public static function DardeBajaEscuelaNavidadAlq($pedido) {
			$sql = "UPDATE registros_escuela_navidad SET eliminado = 1 WHERE numeropedido = :numero";
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
						alert('El registro se elimin?? correctamente.');
						window.location.replace('?r=campus/BackEscuelaNavidadAlq');
					</script>";
				die;
			}
		}



		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichaescuelanavidad($idinscripcion,
            $dnijugador,
            $nombre,    $apellidos, $date,  $club,  $direccion, 
            $numero, $piso,         $puerta,        $poblacion, $cp, $prov, 
            $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  
                $observ,  
             $sip, $sintomascovid, $familiarcovid)
		{
			//error_log("id_inscrip en update escuela navidad= ".$idinscripcion);
            
			$sql = "UPDATE  registros_escuela_navidad 
                    SET     dni=:dnij, 
                            nombre=:nombre,         apellidos=:apel,            fechanacimiento=:fechan,    club=:club,      direccion=:direc,   
                            numero=:num,            piso=:piso,                 puerta=:puerta,             poblacion=:pob, cp=:cp,                 provincia=:prov, 
                            nombretutor=:nomtut,    apellidostutor=:apeltut,    dnitutor=:dnitut,           telefonotutor=:telef, 					emailtutor=:email, 
                              
                             aspectomedico=:observ, 
                             sintomascovid=:sint, familiarcovid=:famili, 
                            
                             ficherosubido1=:sip   
                    WHERE 
                            id=:idinscrip";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':idinscrip' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club,  ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email,  ':observ' =>$observ,  ':sip' =>$sip, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				error_log(print_r($query,1));
				return false;
			}
			else {
				error_log("id_inscrip ok en update escuela navidad= ".$idinscripcion);
				return true;
			}
		}


		// Env??o de emails de Escuela de Navidad
		public static function mailsSendEscuelaNavidad($numeropedido, $contenido, $seccioninscripcion, $email) {
			// Cargamos la clase PHPMailer
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");		//	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

			$mail->Host = __phpmailer_host__;

			// Asignamos el puerto SMTP que usa nuestro servidor
			// Normalmente es el 25, pero tu servidor lo podr??a haber cambiado.
			$mail->Port = __phpmailer_port__;
			//$mail->SMTPSecure = __phpmailer_smtpsecure__;   
			

			// Indicamos aqu?? nuestro nombre de usuario
			//$mail->Username = $quienenvia_email;
			$mail->Username = __phpmailer_username__;

			// Indicamos la contrase??a
			//$mail->Password = "abc01cba";
			$mail->Password = __phpmailer_password__;


			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email);

			// Con copia oculta
			//$mail->AddBCC('imartinez@valenciabasket.com', 'Valencia Basket Inscripci??n Adidas');
			//$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n Adidas Next Generation');

			// Ponemos aqu?? el asunto
			$mail->Subject = $seccioninscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="https://www.w3.org/1999/xhtml">
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
						<title>L??Alqueria del Basket</title>
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
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L??Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h2>
												<p><strong>Estos son los datos recibidos relacionados con su inscripci??n.</strong></p>
												<p><strong>N??mero de pedido:</strong> '.$numeropedido.'</p>
												<p>'.$contenido.'</p>
												<p><strong>En caso de cualquier duda o problema con la inscripci??n, remitan un correo a recepcion@alqueriadelbasket.com</strong></p>
											</td>
										</tr>
										<tr>
											<td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
													<tr>
														<td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
															<span style="color: #eb7c00;">&copy; L??Alqueria del Basket 2020</span><br>
															<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Valencia</span><br>
															<span style="color: #ffffff;">+34 961 215 543</span>
														</td>
														<td width="25%" align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L??Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
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

			// A??adimos aqu?? el cuerpo del Email
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