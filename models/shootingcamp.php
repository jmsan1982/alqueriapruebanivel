<?php
	class shootingcamp {

		public static function damedatos($numero) {
			return db_utf8::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE  id=' . $numero)->fetch();
		}


		public static function damedatoscampus($numero) {
			//error_log('SELECT * FROM inscripciones_eventos_extras WHERE  numero_pedido='.'"'.$numero.'"');

			return db_utf8::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE  numero_pedido='.'"'.$numero.'"')->fetch();
		}


		//Para contar los registros de cada opcion (internos o externos) y mostrarlos en el back
		public static function findInscripcionesShootingByOpcion($filtro)
        {
			//error_log(print_r('SELECT count(*) as total FROM inscripciones_eventos_extras WHERE evento="Shooting 2021" and eliminado=0 and  fecharegistro>"2021-02-01" and opcion like'.'"%'.$filtro.'%"',1));
			return db_utf8::singleton()->query('SELECT count(*) as total FROM inscripciones_eventos_extras WHERE evento="Shooting 2021" and eliminado=0 and  fecharegistro>"2021-02-01" and opcion like'.'"%'.$filtro.'%"')->fetch();
		}


		// Para la consulta de exportar a excel
		public static function findAllInscripcionesExcelConCampos($where, $campoorder, $campos, $evento)	{



			$query = db_utf8::singleton()->query('SELECT fecharegistro, numero_pedido as Pedido,  genero as Genero, concat (nombre, " ", apellidos) AS Inscrito, fechanacimiento,  '. $campos .'    concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor as Telefono, emailtutor As Email,  if(pagado=1, "Si", "No") AS Pagado, importe as Importe, tipo_pago as TipoPago FROM inscripciones_eventos_extras WHERE eliminado=0  and evento like'.'"%'.$evento.'%" and fecharegistro>"2021-02-01"'. $where .'ORDER BY '. $campoorder .' DESC');

			
			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		// Para la consulta de exportar a excel, todos los campos
		public static function findAllInscripcionesExcel($evento) {

			$query = db_utf8::singleton()->query('SELECT fecharegistro, numero_pedido, 	opcion,   genero, 
				concat (nombre, " ", apellidos) AS Inscrito, fechanacimiento, dni, club, tallacamiseta, enfermedad,  alergias, tratamientosmedicos, operacionreciente, observaciones ,  
				concat (nombretutor, " ", apellidostutor) AS Tutor, telefonotutor, emailtutor, dnitutor, direccion AS Direccion, numero, piso, puerta, cp, provincia as Provincia, poblacion AS Poblacion, autorizodatos, autorizoimagen, tipo_pago, if(pagado=1, "Si", "No") AS Pagado, importe, sintomascovid, familiarcovid
				FROM inscripciones_eventos_extras WHERE eliminado=0 and fecharegistro>"2021-02-01" and evento LIKE "%'.$evento.'%" order by numero_pedido desc');
			if ($query) {
				return $query->fetchAll(PDO::FETCH_ASSOC);
			}
			else {
				return false;
			}
		}


		public static function findInscripciones($evento) {

			$query = db_utf8::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE  fecharegistro >= "2021-01-01" and eliminado=0 and evento LIKE "%'.$evento.'%" order by numero_pedido desc');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}


		public static function findByDNIJugadorEnAlqueria( $dni ) {
			error_log("SELECT * FROM jugadores WHERE (dni_tutor LIKE '%" . $dni . "%' OR dni_jugador LIKE '%" . $dni . "%') and is_active=1");
			$query = db_2::singleton()->query("SELECT * FROM jugadores WHERE (dni_tutor LIKE '%" . $dni . "%' OR dni_jugador LIKE '%" . $dni . "%') and is_active=1");

			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}


		//ACTUALIZA EL error del pago AL RETORNO DEL TPV (SOLO SI EL PAGADO ESTA A CERO POR SI LE DAN DOS VECES A PAGAR) -CORRECTO
		public static function actualizacodigoerror($pedido, $codigo_error) {
			$sql = "UPDATE inscripciones_eventos_extras SET eliminado=1, errorcode=:error  WHERE pagado=0 and numero_pedido=:numero";
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


		// Actualizar el pagado al retorno del tpv
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

		public static function actualizapagadoretornotpvCampusVerano($codigo, $pagado) {
			$sql = "UPDATE registros_campus_verano SET pagado=:pag WHERE numeropedido=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

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

		public static function actualizapagadoretornotpvTecnificacionFemenina($codigo, $pagado) {
			$sql = "UPDATE registros_escuela_tecnificacion_femenina SET pagado=:pag WHERE numero_pedido=:numero";
			$query = dbvbasket::singleton()->prepare($sql);

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
			$sql = "UPDATE inscripciones_eventos_extras SET pagado=:pag WHERE id=:numero";
			$query = db::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $id, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'> alert('El pago se grab?? correctamente.');
					window.location.replace('?r=campus/BackCampusShootingCamp'); </script>";
				die;
			}
		}


		public static function DardeBajacampusshootingcamp($codigo) {
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
				echo "<script text='javascript'> alert('El registro se elimin?? correctamente.');
					window.location.replace('?r=campus/BackCampusShootingCamp'); </script>";
					die;
			}
		}


		public static function findLastNumeroPedidoShooting() {
			return db::singleton()->query('SELECT MAX(id) FROM inscripciones_eventos_extras')->fetch();
		}


		public static function newFormShootingCamp($opcion,$nombre,$apellidos,$fechanacimiento,$dni,$club,$tallaropa,$transporte,$enfermedad,$alergias,$tratamientosmedicos,$operaciones,$observ,$nombretutor,$apellidostutor,$dnitutor,$direccion,$numero,$piso, $puerta,$cp,$provincia, $poblacion,$telefono,$email,$autdatos,$autimg,$numeropedido,$importe,$fichero_subido, $tipopago, $pais, $evento, $sintomasc,  $familiarc, $genero,  $pagado,  $ficherosubido2) {

			$sql = "INSERT INTO  inscripciones_eventos_extras (fecharegistro, opcion, nombre, apellidos, fechanacimiento, dni, club, tallacamiseta, transporte, enfermedad, alergias, tratamientosmedicos, operacionreciente, observaciones, ficherosubido1, nombretutor, apellidostutor, dnitutor, direccion, numero, piso, puerta, cp, provincia, poblacion, telefonotutor, emailtutor, autorizodatos, autorizoimagen, pagado, numero_pedido, importe, tipo_pago, pais, evento, sintomascovid, familiarcovid, genero, ficherosubido2) VALUES(:fecharegistro,:opcion,:nom,:ape,:fechanacimiento,:dni,:club,:talla,:transp,:enferm,:aler,:tratatmedico,:operac,:obser,:ficherosubido1,:nombretutor,:apellidostutor,:dnitutor,:direccion,:num,:piso,:puerta,:cp,:provincia,:poblacion,:telef,:email,:autorizodatos,:autorizoimagen,:paga,:numpe,:importe,:pago,:pais,:ev, :sintomasc, :famili, :gen, :ficherosubido2)";
			$query = db_utf8::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => date("Y-m-d"), ':opcion' => $opcion,':nom' => $nombre, ':ape' => $apellidos,':fechanacimiento' => $fechanacimiento,':dni' => $dni, ':club' => $club,':talla' => $tallaropa,':transp' => $transporte,':enferm' => $enfermedad,':aler' => $alergias,':tratatmedico' => $tratamientosmedicos,':operac' => $operaciones, ':obser' => $observ,':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telef' => $telefono, ':email' => $email, ':autorizodatos' => $autdatos, ':autorizoimagen' => $autimg,':numpe' => $numeropedido,':paga' => $pagado, ':importe' => $importe,':ficherosubido1' => $fichero_subido,':pago' => $tipopago,':pais' => $pais,':ev' => $evento,':sintomasc' => $sintomasc,':famili' => $familiarc, ':gen' => $genero,':ficherosubido2' => $ficherosubido2);

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}



		/*  MODIFICACION DE LA FICHA DEL INSCRITO DESDE EL BACK */
		public static function updatefichaShootingCamp($idinscripcion,
            $dnijugador,
            $nombre,    $apellidos, $date,  $club, $talla, $direccion, 
            $numero, $piso,         $puerta,        $poblacion, $cp, $prov, 
            $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email, $alergias, 
            $tratam,   $enfermedad,    $observ, $operaciones, 
            $opcion,  
            $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe  )
		{
			//error_log("id_inscrip en update= ".$idinscripcion,1);
            
			$sql = "UPDATE  inscripciones_eventos_extras 
                    SET     dni=:dnij, nombre=:nombre,  apellidos=:apel,  fechanacimiento=:fechan,    club=:club,     tallacamiseta=:talla, direccion=:direc,   numero=:num,   piso=:piso,   puerta=:puerta, poblacion=:pob, cp=:cp,      provincia=:prov, 
                            nombretutor=:nomtut,    apellidostutor=:apeltut,    dnitutor=:dnitut,        telefonotutor=:telef, emailtutor=:email, alergias=:alerg,  tratamientosmedicos=:tratm,    
                            enfermedad=:eferm, observaciones=:observ, operacionreciente=:oper,  
                            opcion=:opc , importe=:precio, 
                            ficherosubido1=:sip, ficherosubido2=:resg,  sintomascovid=:sint, familiarcovid=:famili, tipo_pago=:tipop, genero=:gen 
                    WHERE 
                            id=:numero";
			$query = db_utf8::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':numero' => $idinscripcion, ':dnij' => $dnijugador, ':nombre' => $nombre, ':apel' => $apellidos, ':fechan' => $date, ':club' => $club, ':talla' => $talla, ':direc' => $direccion, ':num' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':pob' => $poblacion, ':cp' => $cp, ':prov' => $prov, ':nomtut' => $nombretutor, ':apeltut' => $apeltutor, ':dnitut' => $dnitutor, ':telef' => $tlftutor, ':email' => $email, ':alerg' =>$alergias, ':tratm' =>$tratam,  ':eferm' =>$enfermedad, ':observ' =>$observ, ':oper' =>$operaciones, ':opc' =>$opcion, ':sip' =>$sip, ':resg' =>$resguardo, ':sint' =>$sintomascovid, ':famili' =>$familiarcovid, ':tipop' =>$tipopago, ':gen' =>$genero, ':precio' =>$importe);

			//error_log(print_r($datos,1));
			//die;

			if (!$query->execute($datos)) {
				error_log("error");
				error_log(print_r($query,1));
				return false;
			}
			else {
				//error_log("id_inscrip ok en update campus verano vb= ".$idinscripcion);
				return true;
			}
		}



		// Env??o de mail al cliente
		public static function mailssendShootingcamp($numeropedido, $contenido, $seccioninscripcion, $email) {
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

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "alqueria@alqueriadelbasket.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "L??Alqueria del Basket";

			// En la direcci??n de responder ponemos la misma del From
			$mail->AddReplyTo("recepcion@alqueriadelbasket.com","L??Alqueria del Basket");
			$mail->AddReplyTo("campus@alqueriadelbasket.com","L??Alqueria del Basket");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, 'Inscripci??n Shooting Camp 2021');

			// Con copia oculta
			$mail->AddBCC('actividades@valenciabasket.com', 'Inscripci??n Shooting Camp 2021');
			$mail->AddBCC('recepcion@alqueriadelbasket.com', 'Inscripci??n Shooting Camp 2021');
			$mail->AddBCC("campus@alqueriadelbasket.com","Inscripci??n Shooting Camp 2021");

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
												<a href="https://servicios.alqueriadelbasket.com" target="_blank">
													<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
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
															<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Val??ncia</span><br>
															<span style="color: #ffffff;">+34 96 121 55 43</span>
														</td>
														<td width="25%" align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																			<img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L??Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L??Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
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
			   // echo "Mailer Error: " . $mail->ErrorInfo . "<br>"; die;
				return false;
			} 
			else {
			   // $mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
				return true;
			}
		}


		// Env??o de emails de prueba
		public static function mailsSendLocalHost($numeroPedido, $nombre, $contenido, $seccionInscripcion, $email) {
			// Cargamos la clase PHPMailer
			require_once("PHPMailer/class.phpmailer.php");
			require_once("PHPMailer/class.smtp.php");
            require_once("config.php");                     //	Contiene constantes del envio del email

			// Instanciamos un objeto PHPMailer
			$mail = new PHPMailer();

			$mail->CharSet = "UTF-8";

			// Le decimos que usamos el protocolo SMTP
			$mail->IsSMTP();

			// Le decimos que es necesario autenticarse
			$mail->SMTPAuth = true;

            // Indicamos aqu?? el nombre del servidor de correo
            $mail->Host = __phpmailer_host__;           //  "in-v3.mailjet.com";	//$mail->Host = "in-v3.mailjet.com";

            // Asignamos el puerto SMTP que usa nuestro servidor
            $mail->Port = __phpmailer_port__;
            $mail->SMTPSecure = "tls";   

            // Indicamos aqu?? nuestro nombre de usuario
            $mail->Username = __phpmailer_username__;	//  $mail->Username = "1c96c2909ac708240c4491b5a821fa21";

            // Indicamos la contrase??a
            $mail->Password = __phpmailer_password__;   //  $mail->Password ="187201d6b77557358403ccbc07cee13a";

			// A??adimos la direcci??n del remitente
			$mail->From = "mlobeira@tessq.com";

			// A??adimos el nombre del emisor
			$mail->FromName = "Alqueria del basket";

			// En la direcci??n de responder ponemos la misma del From
			//$mail->AddReplyTo("rlloret@tessq.com","Mensaje autom??tico");

			// Le indicamos que nuestro Email est?? en Html
			$mail->IsHTML(true);

			// Indicamos la direcci??n y el nombre del destinatario
			$mail->AddAddress($email, 'Solicitud de inscripci??n');

			// Con copia
			//$mail->AddCC('inscripciones@alqueriadelbasket.com', 'Copia Alqueria');

			// Ponemos aqu?? el asunto
			$mail->Subject = $seccionInscripcion;

			// Creamos todo el cuerpo del Email en Html en la variable $body
			$body = '
			<html>
			<body style="margin: 0.2em;">
			<div align="center" style="background-color: black;">
				<img src="http://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" width="100%" style="max-width: 476px;">
			</div>
			<div style="width: 80%;padding: 2em;">
				<h2 style="text-align: center;color:#eb7c00;border-bottom: #eb7c00 2px solid;">' . $seccionInscripcion . '</h2>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>??Gracias por realizar la solicitud! Estos son los datos recibidos, para cualquier aclaraci??n, p??ngase en contacto con nosotros.</b></p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>N??mero de pedido:</b> ' . $numeroPedido . '</p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;"><b>Nombre:</b> ' . $nombre . '</p>
				<p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">' . $contenido . '</p>
			</div>
			</body>
			</html>';

			// A??adimos aqu?? el cuerpo del Email
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

		/*APARTADO EN RELACION CON EL DESCUENTO EN PACKS DE SHOOTING*/

		public static function findByDNITutor( $dni ) {
			$query = db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE dnitutor = LIKE "%' . $dni . '%" AND fecharegistro > "2020/04/01"');


			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function findByDNIEnTecnificacion( $dni ) {
			$query = dbvbasket::singleton()->query('SELECT * FROM registros_escuela_tecnificacion_femenina WHERE dni = LIKE "%' . $dni . '%" AND fecharegistro > "2020/02/01"');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function findByDNIEnCampusVerano( $dni ) {
			$query = dbvbasket::singleton()->query('SELECT * FROM registros_campus_verano WHERE dni = LIKE "%' . $dni . '%" AND fecharegistro > "2020/02/01"');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function findByDNIEnSkillsYShooting( $dni ) {
			$query = db::singleton()->query('SELECT * FROM inscripciones_eventos_extras WHERE dni = LIKE "%' . $dni . '%" AND fecharegistro > "2020/02/01"');

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function insertCampusVerano($turno1, $turno2, $turno3, $turno4, $turno5, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallacamiseta, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operacionreciente, $observaciones, $fotocopiasip, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $numeropedido, $importe, $tipo_pago, $eliminado, $errortpv) {

			$sql = "INSERT INTO `registros_campus_verano`(`fecharegistro`, `turno1`, `turno2`, `turno3`, `turno4`, `turno5`, `nombre`, `apellidos`, `fechanacimiento`, `dni`, `club`, `tallacamiseta`, `transporte`, `enfermedad`, `alergias`, `tratamientosmedicos`, `operacionreciente`, `observaciones`, `fotocopiasip`, `nombretutor`, `apellidostutor`, `dnitutor`, `direccion`, `numero`, `piso`, `puerta`, `cp`, `provincia`, `poblacion`, `telefonotutor`, `emailtutor`, `autorizodatos`, `autorizoimagen`, `pagado`, `numeropedido`, `importe`, `tipo_pago`, `eliminado`, `errortpv`) VALUES(:fecharegistro, :turno1, :turno2, :turno3, :turno4, :turno5, :nombre, :apellidos, :fechanacimiento, :dni, :club, :tallacamiseta, :transporte, :enfermedad, :alergias, :tratamientosmedicos, :operacionreciente, :observaciones, :fotocopiasip, :nombretutor, :apellidostutor, :dnitutor, :direccion, :numero, :piso, :puerta, :cp, :provincia, :poblacion, :telefonotutor, :emailtutor, :autorizodatos, :autorizoimagen, :pagado, :numeropedido, :importe, :tipo_pago, :eliminado, :errortpv)";

			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				var_dump(dbvbasket::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => date("Y-m-d"), ':turno1' => $turno1, ':turno2' => $turno2, ':turno3' => $turno3, ':turno4' => $turno4, ':turno5' => $turno5, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':tallacamiseta' => $tallacamiseta, ':transporte' => $transporte, ':enfermedad' => $enfermedad, ':alergias' => $alergias, ':tratamientosmedicos' => $tratamientosmedicos, ':operacionreciente' => $operacionreciente, ':observaciones' => $observaciones, ':fotocopiasip' => $fotocopiasip, ':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':autorizodatos' => $autorizodatos, ':autorizoimagen' => $autorizoimagen, ':pagado' => $pagado, ':numeropedido' => $numeropedido, ':importe' => $importe, ':tipo_pago' => $tipo_pago, ':eliminado' => $eliminado, ':errortpv' => $errortpv );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}

		public static function insertTecnificacionFemenina($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallacamiseta, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operacionreciente, $observaciones, $ficherosubido1, $ficherosubido2, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefonotutor, $emailtutor, $autorizodatos, $autorizoimagen, $pagado, $numero_pedido, $importe, $inscripcion, $tipo_pago, $eliminado, $errortpv) {

			$sql = "INSERT INTO `registros_escuela_tecnificacion_femenina`(`fecharegistro`, `opcion`, `nombre`, `apellidos`, `fechanacimiento`, `dni`, `club`, `tallacamiseta`, `transporte`, `enfermedad`, `alergias`, `tratamientosmedicos`, `operacionreciente`, `observaciones`, `ficherosubido1`, `ficherosubido2`, `nombretutor`, `apellidostutor`, `dnitutor`, `direccion`, `numero`, `piso`, `puerta`, `cp`, `provincia`, `poblacion`, `telefonotutor`, `emailtutor`, `autorizodatos`, `autorizoimagen`, `pagado`, `numero_pedido`, `importe`, `inscripcion`, `tipo_pago`, `eliminado`, `errortpv`) VALUES (:fecharegistro, :opcion, :nombre, :apellidos, :fechanacimiento, :dni, :club, :tallacamiseta, :transporte, :enfermedad, :alergias, :tratamientosmedicos, :operacionreciente, :observaciones, :ficherosubido1, :ficherosubido2, :nombretutor, :apellidostutor, :dnitutor, :direccion, :numero, :piso, :puerta, :cp, :provincia, :poblacion, :telefonotutor, :emailtutor, :autorizodatos, :autorizoimagen, :pagado, :numero_pedido, :importe, :inscripcion, :tipo_pago, :eliminado, :errortpv)";

			$query = dbvbasket::singleton()->prepare($sql);

			if (!$query) {
				var_dump(dbvbasket::singleton()->errorInfo());
				die;
			}

			$datos = array(':fecharegistro' => date("Y-m-d"), ':opcion' => $opcion, ':nombre' => $nombre, ':apellidos' => $apellidos, ':fechanacimiento' => $fechanacimiento, ':dni' => $dni, ':club' => $club, ':tallacamiseta' => $tallacamiseta, ':transporte' => $transporte, ':enfermedad' => $enfermedad, ':alergias' => $alergias, ':tratamientosmedicos' => $tratamientosmedicos, ':operacionreciente' => $operacionreciente, ':observaciones' => $observaciones, ':ficherosubido1' => $ficherosubido1, ':ficherosubido2' => null,':nombretutor' => $nombretutor, ':apellidostutor' => $apellidostutor, ':dnitutor' => $dnitutor, ':direccion' => $direccion, ':numero' => $numero, ':piso' => $piso, ':puerta' => $puerta, ':cp' => $cp, ':provincia' => $provincia, ':poblacion' => $poblacion, ':telefonotutor' => $telefonotutor, ':emailtutor' => $emailtutor, ':autorizodatos' => $autorizodatos, ':autorizoimagen' => $autorizoimagen, ':pagado' => $pagado, ':numero_pedido' => $numero_pedido, ':importe' => $importe, ':inscripcion' => $inscripcion, ':tipo_pago' => $tipo_pago, ':eliminado' => $eliminado, ':errortpv' => $errortpv );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}
		}

		public static function findAllJugadores() {
			$query = db_2::singleton()->query( 'SELECT * FROM jugadores WHERE temporada = "19/20" AND is_active = 1' );

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

		public static function insertCodigo( $codigo, $dnijugador, $dnitutor ) {
			$sql = "INSERT INTO `codigo_descuento` (`dni_tutor`, `dni_jugador`, `codigo`) VALUES (:dni_tutor, :dni_jugador, :codigo)";

			$query = db::singleton()->prepare($sql);

			if (!$query) {
				var_dump(db::singleton()->errorInfo());
				die;
			}

			$datos = array( ':dni_tutor' => $dnitutor, ':dni_jugador' => $dnijugador, ':codigo' => $codigo );

			if (!$query->execute($datos)) {
				var_dump($query->errorInfo());
				die;
			}
			else {
				return true;
			}

		}

		public static function buscarCodigo( $codigo, $dnijugador, $dnitutor ) {
			$query = db::singleton()->query('SELECT * FROM codigo_descuento WHERE codigo = "' . $codigo . '" AND (dni_tutor LIKE "%' . $dnitutor . '%" OR dni_jugador LIKE "%' . $dnijugador . '%")');

			//error_log( 'SELECT * FROM codigo_descuento WHERE codigo = "' . $codigo . '" AND (dni_tutor LIKE "%' . $dnitutor . '%" OR dni_jugador LIKE "%' . $dnijugador . '%")' );

			if ($query) {
				return $query->fetchAll();
			}
			else {
				return false;
			}
		}

	}
?>