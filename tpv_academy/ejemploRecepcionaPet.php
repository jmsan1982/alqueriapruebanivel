<html> 
    <body> 
    <?php
    	include 'apiRedsys.php';
        
        require_once "./../config.php";
        require_once "./../db_utf8.php";

        require_once "../PHPMailer/class.phpmailer.php";
        require_once "../PHPMailer/class.smtp.php";
            
        require_once('./../lib/TCPDF/Alqueria/tcpdf_include.php');
        require_once "../models/academy_inscripciones.php";
        
        // Se crea Objeto
        $miObj = new RedsysAPI;

        if(!empty($_POST))
        {
            $version            = $_POST["Ds_SignatureVersion"];
            $datos              = $_POST["Ds_MerchantParameters"];
            $signatureRecibida  = $_POST["Ds_Signature"];
			
            $decodec    = $miObj->decodeMerchantParameters($datos);
            //  $kc     = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';               // Entorno de pruebas	
            $kc         = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';               // Entorno de producción. Clave recuperada de CANALES
            $firma      = $miObj->createMerchantSignatureNotif($kc,$datos);	

            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            $Ds_ConsumerLanguage    =   $miObj->getParameter('Ds_ConsumerLanguage'); 
            if($Ds_ConsumerLanguage==="001")        {   $lang="cas";    }
            else if($Ds_ConsumerLanguage==="010")   {   $lang="val";    }
            else if($Ds_ConsumerLanguage==="002")   {   $lang="eng";    }
            else                                    {   $lang="cas";    }
            require_once '../lang/publico_'.$lang.'.php';
           
            if($firma === $signatureRecibida)
            {
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003" || 
                    $codigoRespuesta=="0004" || $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || 
                    $codigoRespuesta=="0008" || $codigoRespuesta=="0009" || $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || 
                    $codigoRespuesta=="0012" || $codigoRespuesta=="0013" || $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || 
                    $codigoRespuesta=="0016" || $codigoRespuesta=="0017" || $codigoRespuesta=="0018" || $codigoRespuesta=="0019" ||
                    $codigoRespuesta=="0020" || $codigoRespuesta=="0021" || $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || 
                    $codigoRespuesta=="0024" || $codigoRespuesta=="0025" || $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || 
                    $codigoRespuesta=="0028" || $codigoRespuesta=="0029" || $codigoRespuesta=="0030" || $codigoRespuesta=="0031" || 
                    $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034" || $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039" ||  
                    $codigoRespuesta=="0040" || $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || 
                    $codigoRespuesta=="0044" || $codigoRespuesta=="0045" || $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || 
                    $codigoRespuesta=="0048" || $codigoRespuesta=="0049" || $codigoRespuesta=="0050" || $codigoRespuesta=="0051" || 
                    $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054" || $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059" ||  
                    $codigoRespuesta=="0060" || $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || 
                    $codigoRespuesta=="0064" || $codigoRespuesta=="0065" || $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || 
                    $codigoRespuesta=="0068" || $codigoRespuesta=="0069" || $codigoRespuesta=="0070" || $codigoRespuesta=="0071" || 
                    $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074" || $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079" || 
                    $codigoRespuesta=="0080" || $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || 
                    $codigoRespuesta=="0084" || $codigoRespuesta=="0085" || $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || 
                    $codigoRespuesta=="0088" || $codigoRespuesta=="0089" || $codigoRespuesta=="0090" || $codigoRespuesta=="0091" || 
                    $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094" || $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099")
                {
                    //  Recuperamos el pago y lo marcamos como pagado
                    $datosinscrito = academy_inscripciones::findBynumero_pedido($codigo_venta_recibido);

                    //marcamos el registro como pagado=1
                    $academy_inscripciones = academy_inscripciones::updateAttribute($datosinscrito["ID"], "pagado", 1, "no");
                    $actualizarPagado = academy_inscripciones::updateAttribute($datosinscrito["ID"], "errorcode", $codigoRespuesta, "no");
                    
                    /****************************************************************************
                    * PREPARAMOS EMAIL 
                    *   - En el PDF metemos los datos
                    * ***************************************************************************/
                    $asunto_email   =   $lang["ins_academy_email_asunto"];
                    $string_contenido_pdf="
                    <p>".$lang["ins_academy_email_datos_0"]."</p>
                    <p>
                        <strong>".$lang["ins_academy_email_datos_1"]."</strong> ".$academy_inscripciones['numero_pedido']."<br>
                        <strong>".$lang["ins_academy_email_datos_2"]."</strong> ".$academy_inscripciones['nombre']."<br>
                        <strong>".$lang["ins_academy_email_datos_3"]."</strong> ".$academy_inscripciones['apellidos']."<br>
                        <strong>".$lang["ins_academy_email_datos_4"]."</strong> ".$academy_inscripciones['fecha_nacimiento']."<br>
                        <strong>".$lang["ins_academy_email_datos_5"]."</strong> ".$academy_inscripciones['telefono']."<br>
                            
                        <strong>".$lang["ins_academy_email_datos_6"]."</strong> ".$academy_inscripciones['movil']."<br>
                        <strong>".$lang["ins_academy_email_datos_7"]."</strong> ".$academy_inscripciones['email']."<br>  
                        <strong>".$lang["ins_academy_email_datos_8"]."</strong> ".$academy_inscripciones['tratamiento_medico']."<br>  
                        <strong>".$lang["ins_academy_email_datos_9"]."</strong> ".$academy_inscripciones['alergia']."<br>  
                        <strong>".$lang["ins_academy_email_datos_10"]."</strong> ".$academy_inscripciones['club']."<br>  
                        
                        <strong>".$lang["ins_academy_email_datos_11"]."</strong> ".$academy_inscripciones['categoria']."<br>  
                        <strong>".$lang["ins_academy_email_datos_12"]."</strong> ".$academy_inscripciones['altura']."<br>  
                        <strong>".$lang["ins_academy_email_datos_13"]."</strong> ".$academy_inscripciones['talla']."<br>  
                        <strong>".$lang["ins_academy_email_datos_14"]."</strong><br> ".$academy_inscripciones['trayectoria']."<br>  
                    </p>";

                    $cifrado_md5    =   substr(md5($academy_inscripciones['ID']), 0, 7);
                    $ruta_pdf       =   "alqueriadelbasket.com-".$cifrado_md5.".pdf";
                    
                    $email_enviado  =   enviar_email_nueva_inscripcion_alqueriaAcademy(
                        $asunto_email, $string_contenido_pdf, 
                        $academy_inscripciones['email'],        $academy_inscripciones['nombre']." ".$academy_inscripciones['apellidos'], 
                        "alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
                        "alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
                        "pdf/academy/".$ruta_pdf,$ruta_pdf);
                }
                else
                {
                    //  Recuperamos el pago y lo marcamos como pagado
                    $datosinscrito = academy_inscripciones::findBynumero_pedido($codigo_venta_recibido);
                    //marcamos el registro como pagado=0
                    $actualizarPagado = academy_inscripciones::updateAttribute($datosinscrito["ID"], "pagado", 0, "no");
                    $actualizarPagado = academy_inscripciones::updateAttribute($datosinscrito["ID"], "errorcode", $codigoRespuesta, "no");
                }
            } 
            else 
            {   error_log(__FILE__.__LINE__.". Hay un error con la firma y signaturerecibida"); }
        }
        else if (!empty( $_GET ) )
        {
            $version            = $_GET["Ds_SignatureVersion"];
            $datos              = $_GET["Ds_MerchantParameters"];
            $signatureRecibida  = $_GET["Ds_Signature"];
			
            $decodec    = $miObj->decodeMerchantParameters($datos);
            //  $kc     = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';                 // Entorno de pruebas	
            $kc         = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';           // Entorno de producción. Clave recuperada de CANALES
            $firma      = $miObj->createMerchantSignatureNotif($kc,$datos);	

            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            $Ds_ConsumerLanguage    =   $miObj->getParameter('Ds_ConsumerLanguage'); 
            if($Ds_ConsumerLanguage==="001")        {   $lang="cas";    }
            else if($Ds_ConsumerLanguage==="010")   {   $lang="val";    }
            else if($Ds_ConsumerLanguage==="002")   {   $lang="eng";    }
            else                                    {   $lang="cas";    }
            require_once '../lang/publico_'.$lang.'.php';
           
            if($firma === $signatureRecibida)
            {
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003" || 
                    $codigoRespuesta=="0004" || $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || 
                    $codigoRespuesta=="0008" || $codigoRespuesta=="0009" || $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || 
                    $codigoRespuesta=="0012" || $codigoRespuesta=="0013" || $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || 
                    $codigoRespuesta=="0016" || $codigoRespuesta=="0017" || $codigoRespuesta=="0018" || $codigoRespuesta=="0019" ||
                    $codigoRespuesta=="0020" || $codigoRespuesta=="0021" || $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || 
                    $codigoRespuesta=="0024" || $codigoRespuesta=="0025" || $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || 
                    $codigoRespuesta=="0028" || $codigoRespuesta=="0029" || $codigoRespuesta=="0030" || $codigoRespuesta=="0031" || 
                    $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034" || $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039" ||  
                    $codigoRespuesta=="0040" || $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || 
                    $codigoRespuesta=="0044" || $codigoRespuesta=="0045" || $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || 
                    $codigoRespuesta=="0048" || $codigoRespuesta=="0049" || $codigoRespuesta=="0050" || $codigoRespuesta=="0051" || 
                    $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054" || $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059" ||  
                    $codigoRespuesta=="0060" || $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || 
                    $codigoRespuesta=="0064" || $codigoRespuesta=="0065" || $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || 
                    $codigoRespuesta=="0068" || $codigoRespuesta=="0069" || $codigoRespuesta=="0070" || $codigoRespuesta=="0071" || 
                    $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074" || $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079" || 
                    $codigoRespuesta=="0080" || $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || 
                    $codigoRespuesta=="0084" || $codigoRespuesta=="0085" || $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || 
                    $codigoRespuesta=="0088" || $codigoRespuesta=="0089" || $codigoRespuesta=="0090" || $codigoRespuesta=="0091" || 
                    $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094" || $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099")
                {
                    //  Recuperamos el pago y lo marcamos como pagado
                    $datosinscrito = academy_inscripciones::findBynumero_pedido($codigo_venta_recibido);

                    //marcamos el registro como pagado=1
                    $academy_inscripciones  =   academy_inscripciones::updateAttribute($datosinscrito["ID"], "pagado", 1, "no");
                    $academy_inscripciones  =   academy_inscripciones::updateAttribute($datosinscrito["ID"], "errorcode",   $codigoRespuesta,   "no");
                    
                    /****************************************************************************
                    * PREPARAMOS EMAIL 
                    *   - En el PDF metemos los datos
                    * ***************************************************************************/
                    $asunto_email   =   $lang["ins_academy_email_asunto"];
                    $string_contenido_pdf="
                    <p>".$lang["ins_academy_email_datos_0"]."</p>
                    <p>
                        <strong>".$lang["ins_academy_email_datos_1"]."</strong> ".$academy_inscripciones['numero_pedido']."<br>
                        <strong>".$lang["ins_academy_email_datos_2"]."</strong> ".$academy_inscripciones['nombre']."<br>
                        <strong>".$lang["ins_academy_email_datos_3"]."</strong> ".$academy_inscripciones['apellidos']."<br>
                        <strong>".$lang["ins_academy_email_datos_4"]."</strong> ".$academy_inscripciones['fecha_nacimiento']."<br>
                        <strong>".$lang["ins_academy_email_datos_5"]."</strong> ".$academy_inscripciones['telefono']."<br>
                            
                        <strong>".$lang["ins_academy_email_datos_6"]."</strong> ".$academy_inscripciones['movil']."<br>
                        <strong>".$lang["ins_academy_email_datos_7"]."</strong> ".$academy_inscripciones['email']."<br>  
                        <strong>".$lang["ins_academy_email_datos_8"]."</strong> ".$academy_inscripciones['tratamiento_medico']."<br>  
                        <strong>".$lang["ins_academy_email_datos_9"]."</strong> ".$academy_inscripciones['alergia']."<br>  
                        <strong>".$lang["ins_academy_email_datos_10"]."</strong> ".$academy_inscripciones['club']."<br>  
                        
                        <strong>".$lang["ins_academy_email_datos_11"]."</strong> ".$academy_inscripciones['categoria']."<br>  
                        <strong>".$lang["ins_academy_email_datos_12"]."</strong> ".$academy_inscripciones['altura']."<br>  
                        <strong>".$lang["ins_academy_email_datos_13"]."</strong> ".$academy_inscripciones['talla']."<br>  
                        <strong>".$lang["ins_academy_email_datos_14"]."</strong><br> ".$academy_inscripciones['trayectoria']."<br>  
                    </p>";

                    $cifrado_md5    =   substr(md5($academy_inscripciones['ID']), 0, 7);
                    $ruta_pdf       =   "alqueriadelbasket.com-".$cifrado_md5.".pdf";

                    $email_enviado  =   enviar_email_nueva_inscripcion_alqueriaAcademy(
                        $asunto_email, $string_contenido_pdf, 
                        $academy_inscripciones['email'],        $academy_inscripciones['nombre']." ".$academy_inscripciones['apellidos'], 
                        "alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
                        "alqueria@alqueriadelbasket.com",   "L'Alqueria del Basket",
                        "pdf/academy/".$ruta_pdf,$ruta_pdf);
                }
                else
                {
                    //  Recuperamos el pago y lo marcamos como pagado
                    $datosinscrito      =   academy_inscripciones::findBynumero_pedido($codigo_venta_recibido);
                    //marcamos el registro como pagado=0
                    $actualizarPagado   =   academy_inscripciones::updateAttribute($datosinscrito["ID"], "pagado",      0,                  "no");
                    $actualizarPagado   =   academy_inscripciones::updateAttribute($datosinscrito["ID"], "errorcode",   $codigoRespuesta,   "no");
                }
            } 
            else 
            {   error_log(__FILE__.__LINE__.". Hay un error con la firma y signaturerecibida"); }
        }
        else{
            error_log(__FILE__.__LINE__.". No se recibió respuesta"); 
        }
        
        /******************************************************************************
         * FUNCIÓN PARA ENVIAR EMAIL DE CONFIRMACIÓN 
         * Nota de Pablo: traté de ponerlo en /PHPMailer/envios_emails.php 
         * pero al ser otro directorio no conseguí que funcionaran bien los include
         ******************************************************************************/
        function enviar_email_nueva_inscripcion_alqueriaAcademy(
            $asunto,                $contenido, 
            $destinatario_email,    $destinatario_nombre, 
            $quienenvia_email,      $quienenvia_nombre,
            $replyto_email,         $replyto_name, 
            $archivo,               $nombre_archivo)
        {
            // Definimos plantilla HTML con diseño Alqueria
			$plantilla_superior =
				'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
				<html xmlns="http://www.w3.org/1999/xhtml">
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
													<img src="https://alqueriadelbasket.com/img/logos-cabecera-email.png" alt="L´Alqueria del Basket" width="547" height="81" style="display: block;">
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
															<span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
															<span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, Valencia</span><br>
															<span style="color: #ffffff;">+34 961 215 543</span>
														</td>
														<td width="25%" align="right">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td>
																		<a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
																			<img src="https://alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del Basket" width="32" height="32" style="display: block;" border="0">
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
			require_once "../PHPMailer/class.phpmailer.php";
            require_once "../PHPMailer/class.smtp.php";

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
			$mail->From = $quienenvia_email;

			// Añadimos el nombre del emisor
			$mail->FromName = $quienenvia_nombre;

			// En la dirección de responder ponemos la misma del From
			$mail->AddReplyTo($replyto_email, $replyto_name);

			// Le indicamos que nuestro Email está en Html
			$mail->IsHTML(true);

			// Indicamos la dirección y el nombre del destinatario
			$mail->AddAddress($destinatario_email, $destinatario_nombre);

            // Destinatario con copia oculta
            $mail->AddBCC('recepcion@alqueriadelbasket.com');
            $mail->AddBCC('academy@alqueriadelbasket.com');
            $mail->AddBCC('amomplet@tessq.com');

			if($archivo!=="")
            {
                //  Archivo añadido //  $mail->addAttachment($path, $name, $encoding, $type);
                $mail->AddAttachment($archivo, $nombre_archivo,  $encoding = 'base64', $type = 'application/pdf');
            }
            
            // Ponemos aquí el asunto del email según idioma
            $mail->Subject = $asunto;

			// Añadimos aquí el cuerpo del Email según idioma
			$mail->MsgHTML($body);

			// Enviamos y comprobamos si se ha mandado el Email correctamente
			if($mail->Send())
            {   return true;    }
			else
			{   return false;   }
        }
        ?>
    </body> 
</html> 