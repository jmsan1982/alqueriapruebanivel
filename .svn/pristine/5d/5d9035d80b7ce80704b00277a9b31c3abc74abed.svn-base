<?php
	class sportsclubController {

		/**********************************
		*  PARTE PÚBLICA
		**********************************/

		//  FORMULARIO     /   PROCESA LOS DATOS
		public function actionInscripcion() {
			require "models/sportsclub_inscripciones.php";
			require "models/sportsclub_cuestionarios.php";
			require "models/sportsclub_horarios_2020.php";

			//  Utils.php para validar cuenta bancaria
			require "includes/Utils.php";
			//  envios_emails.php para envios de emails. 
			require "PHPMailer/envios_emails.php";

			error_log(__FILE__.__FUNCTION__.__LINE__);
			error_log(print_r($_POST,1));


			/****************************************************************************
			 * Comprobacion 1. DNI duplicado. 
			 * Cogemos el DNI, lo metemos dentro de un strtolower(trim($_POST["dni"']) 
			 ***************************************************************************/
			$inscripcion_existe=sportsclub_inscripciones::findBydni(strtolower(trim($_POST["dni-sportsClub"])));
			if(!empty($inscripcion_existe))
			{
				$mensaje_error_duplicado="Ya existe una inscripción con el DNI introducido";
				echo json_encode(array(
					"response"  => "error",
					"message"   => $mensaje_error_duplicado
				));
				die;
			}


			/****************************************************************************
			 * Comprobacion 2. Cuenta bancaria incorrecta
			 * Cogemos el DNI, lo metemos dentro de un strtolower(trim($_POST["dni"]) 
			 ***************************************************************************/
			/*$cuentaBancaria     =   $_POST['iban-sportsClub'] . $_POST['entidad-sportsClub'] . $_POST['oficina-sportsClub'] . $_POST['dc-sportsClub'] . $_POST['cuenta-sportsClub'];
			$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
			if(!$cuentaValidada)
			{
				$mensaje_error_cuenta_incorrecta="Por favor, revise que la cuenta bancaria es correcta.";
				echo json_encode(array(
					"response"  => "error",
					"message"   => $mensaje_error_cuenta_incorrecta
				));
				die;
			}*/


			/****************************************************************************
			 * Comprobacion 3. El cuestionario de activisad física está rellenado 
			 * Comprobamos que existe el primer campo de este apartado
			 ***************************************************************************/
			if(empty($_POST['profesion-sportsClub']) || (trim($_POST['profesion-sportsClub'])===""))
			{
				$mensaje_error_cuestionario="Es obligatorio rellenar el cuestionario de actividad física completo.";
				echo json_encode(array(
					"response"  => "error",
					"message"   => $mensaje_error_cuestionario
				));
				die;
			}


			/**********************************************************************************************************
			 * Comprobacion 4. Comprobamos que existe alguna franja horaria seleccionada
			 * - Además, comprobamos que si el checkbox padre NO está marcado, no tenemos en cuenta los checkbox hijo.
			 * - Además, aprovechamos para componer el HTML del email relacionado con las franjas.
			 **********************************************************************************************************/
			$horarios                       =   array();
			$count_franjas_seleccionadas    =   0;
			$contenido_email_franjas        =   "";


			if(!empty($_POST['franja1']))
			{   
				if(empty($_POST['franja1-lunes']) && empty($_POST['franja1-miercoles']))
				{
					$mensaje_error_actividades="Si selecciona una franja horaria debe indicar en qué dia o días desea inscribirse.";
					echo json_encode(array(
						"response"  => "error",
						"message"   => $mensaje_error_actividades
					));
					die;
				}

				$horarios['franja1']=1; 
				$count_franjas_seleccionadas++;  
				$contenido_email_franjas.="<strong>Franja 1. Running: lunes y miércoles 18:00h-19:00h: </strong><br>";  

				if(!empty($_POST['franja1-lunes']))        
				{  $horarios['franja1_lunes']=1;        $contenido_email_franjas.=" - Lunes<br>";}   
				else
				{   $horarios['franja1_lunes']=0;}

				if(!empty($_POST['franja1-miercoles']))   
				{  $horarios['franja1_miercoles']=1;    $contenido_email_franjas.=" - Miércoles<br>";}   
				else
				{   $horarios['franja1_miercoles']=0;   }
			} 
			else
			{
				$horarios['franja1']=0;  
				$horarios['franja1_lunes']=0;
				$horarios['franja1_miercoles']=0;
			}


			if(!empty($_POST['franja2']))               
			{   
				if(empty($_POST['franja2-martes']) && empty($_POST['franja2-jueves']))
				{
					$mensaje_error_actividades="Si selecciona una franja horaria debe indicar en qué dia o días desea inscribirse.";
					echo json_encode(array(
						"response"  => "error",
						"message"   => $mensaje_error_actividades
					));
					die;
				}

				$horarios['franja2']=1;
				$count_franjas_seleccionadas++;  
				$contenido_email_franjas.="<strong>Franja 2. Running: martes y jueves 18:00h-19:00h: </strong><br>";  

				if(!empty($_POST['franja2-martes']))        
				{  $horarios['franja2_martes']=1;   $contenido_email_franjas.=" - Martes<br>";}   
				else
				{   $horarios['franja2_martes']=0;}

				if(!empty($_POST['franja2-jueves']))        
				{  $horarios['franja2_jueves']=1;   $contenido_email_franjas.=" - Jueves<br>";}     
				else
				{   $horarios['franja2_jueves']=0;}
			}   
			else
			{
				$horarios['franja2']=0;
				$horarios['franja2_martes']=0;
				$horarios['franja2_jueves']=0;
			}


			if(!empty($_POST['franja3']))               
			{   
				if(empty($_POST['franja3-lunes']) && empty($_POST['franja3-miercoles']))
				{
					$mensaje_error_actividades="Si selecciona una franja horaria debe indicar en qué dia o días desea inscribirse.";
					echo json_encode(array(
						"response"  => "error",
						"message"   => $mensaje_error_actividades
					));
					die;
				}

				$horarios['franja3']=1;
				$count_franjas_seleccionadas++;       
				$contenido_email_franjas.="<strong>Franja 3. Running: lunes y miércoles 19.30h-20:30h: </strong><br>";  

				if(!empty($_POST['franja3-lunes']))         
				{  $horarios['franja3_lunes']=1;        $contenido_email_franjas.=" - Lunes<br>";}
				else
				{   $horarios['franja3_lunes']=0;}

				if(!empty($_POST['franja3-miercoles']))    
				{   $horarios['franja3_miercoles']=1;   $contenido_email_franjas.=" - Miércoles<br>";}     
				else
				{   $horarios['franja3_miercoles']=0;}
			}   
			else
			{
				$horarios['franja3']=0;
				$horarios['franja3_lunes']=0;
				$horarios['franja3_miercoles']=0;
			}


			if(!empty($_POST['franja4']))               
			{
				if(empty($_POST['franja4-martes']) && empty($_POST['franja4-jueves']))
				{
					$mensaje_error_actividades="Si selecciona una franja horaria debe indicar en qué dia o días desea inscribirse.";
					echo json_encode(array(
						"response"  => "error",
						"message"   => $mensaje_error_actividades
					));
					die;
				}

				$horarios['franja4']=1;
				$count_franjas_seleccionadas++;   
				$contenido_email_franjas.="<strong>Franja 4. Running: martes y jueves 19:30h-20:30h: </strong><br>";  

				if(!empty($_POST['franja4-martes']))        
				{   $horarios['franja4_martes']=1;   $contenido_email_franjas.=" - Martes<br>";}  
				else
				{   $horarios['franja4_martes']=0;  }

				if(!empty($_POST['franja4-jueves']))        
				{   $horarios['franja4_jueves']=1;   $contenido_email_franjas.=" - Jueves<br>";}    
				else
				{   $horarios['franja4_jueves']=0;}
			}   
			else
			{
				$horarios['franja4']=0;
				$horarios['franja4_martes']=0;
				$horarios['franja4_jueves']=0;
			}


			if(!empty($_POST['franja5']))               
			{
				if(empty($_POST['franja5-martes']) && empty($_POST['franja5-jueves']))
				{
					$mensaje_error_actividades="Si selecciona una franja horaria debe indicar en qué dia o días desea inscribirse.";
					echo json_encode(array(
						"response"  => "error",
						"message"   => $mensaje_error_actividades
					));
					die;
				}

				$horarios['franja5']=1;
				$count_franjas_seleccionadas++;       
				$contenido_email_franjas.="<strong>Franja 5. Preparación física: martes y jueves 21:00h-22:00h: </strong><br>";  

				if(!empty($_POST['franja5-martes']))        
				{  $horarios['franja5_martes']=1;   $contenido_email_franjas.=" - Martes<br>";}      
				else
				{   $horarios['franja5_martes']=0;}

				if(!empty($_POST['franja5-jueves']))       
				{  $horarios['franja5_jueves']=1;   $contenido_email_franjas.=" - Jueves<br>";}       
				else
				{   $horarios['franja5_jueves']=0;}
			}   
			else
			{
				$horarios['franja5']=0;
				$horarios['franja5_martes']=0;
				$horarios['franja5_jueves']=0;
			}


			if($count_franjas_seleccionadas===0 OR $count_franjas_seleccionadas>2)
			{
				$mensaje_error_cuestionario="Es obligatorio seleccionar entre 1 y 2 de las 5 franjas.";
				echo json_encode(array(
					"response"  => "error",
					"message"   => $mensaje_error_cuestionario
				));
				die;
			}


			/****************************************************************************
			 * INSERCIÓN 1/3. La inscripcion
			 ***************************************************************************/
			try{
				$fecha_nacimiento           = filter_input(INPUT_POST, 'fechanacimiento-sportsClub',FILTER_SANITIZE_STRING);
				$fecha_nacimiento_procesada=date( "Y-m-d", strtotime( $fecha_nacimiento ) );
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("Ha ocurrido un error con la fecha de nacimiento con la inscripción hecha por: ".$_POST['email-SportsClub']);
				error_log(print_r($e,1));
				$fecha_nacimiento_procesada=date("Y-m-d");
			}

			try{
				if(!empty($_POST['autorizodatos']))     {  $autorizodatos="sí";     }   else{   $autorizodatos="no";}
				if(!empty($_POST['autorizoimagen']))    {  $autorizoimagen="sí";    }   else{   $autorizoimagen="no";}

				$sportsclub_inscripciones=sportsclub_inscripciones::insert(
					strtolower(trim($_POST['dni-sportsClub'])),     $_POST['nombre-sportsClub'],    $_POST['apellidos-sportsClub'],             
					$_POST['direccion-sportsClub'],                 $_POST['numero-sportsClub'],    $_POST['piso-sportsClub'],  
					$_POST['puerta-sportsClub'],                    $_POST['cp-sportsClub'],        $_POST['poblacion-sportsClub'],         
					$_POST['provincia-sportsClub'], 
					$fecha_nacimiento_procesada,                    $_POST['email-SportsClub'],     $_POST['telefono-SportsClub'],      $_POST['interno-externo-sportsClub'],  
					$_POST['titular-sportsClub'],                   $_POST['iban-sportsClub'],      $_POST['entidad-sportsClub'],
					$_POST['oficina-sportsClub'],                   $_POST['dc-sportsClub'],        $_POST['cuenta-sportsClub'],
					date("Y-m-d H:i:s"),                            1,                              "",            
					$autorizodatos,                                 $autorizoimagen);
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log(print_r($_POST,1));
				error_log(print_r($e,1));
				echo json_encode(array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error inesperado. Contacte con nosotros indicándonos su email ".$_POST['email-SportsClub']." para revisaremos la incidencia."
				));
				die;
			}


			/****************************************************************************
			 * INSERCIÓN 2/3. El cuestionario de salud / forma física 
			 ***************************************************************************/
			$sportsclub_cuestionarios   =   sportsclub_cuestionarios::insert($sportsclub_inscripciones['ID'], 
				$_POST['profesion-sportsClub'],     $_POST['aficiones-sportsClub'],         $_POST['objetivo-sportsClub'],      $_POST['impresion-sportsClub'], 
				$_POST['pauta-sportsClub'],         $_POST['trabajo-1-sportsClub'],         $_POST['trabajo-2-sportsClub'],     $_POST['trabajo-3-sportsClub'], 
				$_POST['trabajo-4-sportsClub'],     $_POST['trabajo-5-sportsClub'],         $_POST['trabajo-6-sportsClub'],     
				$_POST['desplazarse-1-sportsClub'], $_POST['desplazamiento-2-sportsClub'],  $_POST['desplazamiento-3-sportsClub'],         
				$_POST['libre-1-sportsClub'],       $_POST['libre-2-sportsClub'],           $_POST['libre-3-sportsClub'], 
				$_POST['libre-4-sportsClub'],       $_POST['libre-5-sportsClub'],           $_POST['libre-6-sportsClub'],     
				$_POST['sedentario-1-sportsClub']);


			/****************************************************************************
			 * INSERCIÓN 3/3. Los horarios 
			 ***************************************************************************/
			$sportsclub_horarios_2020=sportsclub_horarios_2020::insert($sportsclub_inscripciones['ID'], 
				$horarios['franja1'],  $horarios['franja1_lunes'],     $horarios['franja1_miercoles'], 
				$horarios['franja2'],  $horarios['franja2_martes'],    $horarios['franja2_jueves'], 
				$horarios['franja3'],  $horarios['franja3_lunes'],     $horarios['franja3_miercoles'], 
				$horarios['franja4'],  $horarios['franja4_martes'],    $horarios['franja4_jueves'], 
				$horarios['franja5'],  $horarios['franja5_martes'],    $horarios['franja5_jueves']);


			/****************************************************************************
			 * EMAIL CONFIRMACION
			 ***************************************************************************/
			//  $asunto_email="";
			//  $contenido_email="";
			$asunto_email     =   "Inscripción en L'Alqueria Sports Club: ".$_POST['email-SportsClub'];
			$contenido_email  =   "<p>Se ha recibido su inscripción en L'Alqueria Sports Club.<br>Este es el resumen de los datos recibidos:</p>
				<p>
					<strong>DNI:</strong> ".strtolower(trim($_POST['dni-sportsClub']))."<br>
					<strong>Nombre:</strong> ".$_POST['nombre-sportsClub']."<br>
					<strong>Apellidos:</strong> ".$_POST['apellidos-sportsClub']."<br>
					<strong>Email:</strong> ".$_POST['email-SportsClub']."<br>  
					<strong>Teléfono:</strong> " . $_POST['telefono-SportsClub']."<br>
					<strong>Abonado / Padre / Madre jugador/a Alqueria:</strong> ".$_POST['interno-externo-sportsClub']."<br>
				</p>

				<h4><strong><em>Actividades:</em></strong></h4>
				<p>".$contenido_email_franjas."</p>


				<p>En breve le contactaremos para el comienzo de la actividad.</p>";

			envios_emails::enviar_email_nueva_inscripcion_sportsclub($asunto_email, $contenido_email, $_POST['email-SportsClub'], $_POST['nombre-sportsClub']);


			/****************************************************************************
			 * EMAIL CONFIRMACION
			 ***************************************************************************/
			$mensaje_exito="Gracias por realizar la inscripción. Recibirá un correo electrónico de confirmación.";
			echo json_encode(array(
				"response"  => "success",
				"message"   => $mensaje_exito
			));
		}


		/****************************************
		*  PARTE BACK: PANEL DE ADMINISTRACION
		****************************************/

		//  LISTADO GENERAL     /   CARGAR LA VISTA 
		public function actionBackListarInscripciones() {
			if (self::isLogged()) {
				require "models/sportsclub_inscripciones.php";               

				$datos['inscripciones'] = sportsclub_inscripciones::findByactivo(1);
				$datos['numerototalinscripciones'] = count($datos['inscripciones']);
			  
				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_sportsclub");
			}
		}


		//  LISTADO GENERAL     /   OPERACIÓN: EXPORTAR EXCEL
		public function actionBackExportarInscripciones() {
			if (self::isLogged()) {
				/*require "models/formularios_liga_alqueria.php";
				require "models/formularios_liga_alqueria_pagos.php";

				$equipos = formularios_liga_alqueria::findAll();

				error_reporting(0);

				$filename = "Inscripciones_LIGA_ALQUERIA_".date('Y_m_d_H_i_s').".csv";
				header('Content-Encoding: UTF-8');
				header('Content-Type: text/html; charset=utf-8');
				header("Content-Type: application/vnd.ms-excel; charset=utf-8");
				header("Content-Disposition: attachment; filename=".$filename."");
				header('Cache-Control: max-age=0');
				$show_column = false;

				$file = fopen('php://output', 'w'); //Archivo de descarga
				fputcsv($file, array(
				'Fecha Registro',   'Equipo',      iconv("UTF-8", "ISO-8859-1//TRANSLIT","División") ,     'Eq.principal', 'Eq.secundaria',  
				'Hora Juego',       'Responsable',      'DNI',          'Email',        'Telefono', 
				'Pago inicial',     'Pago_2',       'Pago_3',       'Pago_4',       'Activo'), ';', chr(0));

				foreach($equipos as $equipo) {
					$fecha_alta     =   new DateTime($equipo['FechaAlta']);
					$pagos          =   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($equipo['ID']);
					$array_pagos    =   array();

					for($contador_pagos=1;$contador_pagos<=4;$contador_pagos++) {
						$pago=$pagos[($contador_pagos-1)];
						if($pago['confirmacion_pago']=="1") {
							array_push($array_pagos, $pago['cantidad']);
						}
						else {
							array_push($array_pagos, "0");
						}
					}

					fputcsv($file, array(
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fecha_alta->format('d/m/Y H:i')),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['NombreEquipo']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['Subcategoria']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionPrincipal']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionSecundaria']), 

						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['HoraJuego']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableNombre']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableDNI']),
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableEmail']), 
						iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableTelefono']),

						$array_pagos[0], 
						$array_pagos[1],
						$array_pagos[2],
						$array_pagos[3],
						$equipo['activo']), ';', chr(0));
				}

			   exit;*/
			}
		}


		//  LISTADO GENERAL     /   OPERACIÓN: GENERAR VISTA HTML
		public function actionImprimirFichaSportsClub() {

			require "models/sportsclub_inscripciones.php";

			// Asignamos un título al cuerpo del HTML
			$seccioninscripcion = "Ficha inscripción pago online Sports Club";

			// Recogemos la variable "ID" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
			$ID = $_GET['ID'];

			// Recogemos todos los datos del registro pasándole el número de pedido
			$contenidocorreo = sportsclub_inscripciones::findByID($ID);


			$contenidocorreo['tipo_pago'] = "ONLINE";

			// Generamos el contenido de los datos a mostrar en el cuerpo del HTML
			$contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

			/*$semanas = "";

			if ($contenidocorreo['semana1']=="sem1_comp") {

					$semanas="-Semana del 24 al 28 de Junio dia completo";
			}
				elseif ($contenidocorreo['semana1']=="sem1_manyana") {

					$semanas= $semanas." -Semana del 24 al 28 de Junio solo mañanas";
			}

			if ($contenidocorreo['semana2']=="sem2_comp") {

					$semanas=$semanas." -Semana del 1 al 5 de Julio dia completo";
			}
				elseif ($contenidocorreo['semana2']=="sem2_manyana") {

					$semanas= $semanas." -Semana del 1 al 5 de Julio solo mañanas";
			}

			if ($contenidocorreo['semana3']=="sem3_comp") {

					$semanas=$semanas." -Semana del 8 al 12 de Julio dia completo";
			}
				elseif ($contenidocorreo['semana3']=="sem3_manyana") {

					$semanas= $semanas." -Semana del 8 al 12 de Julio solo mañanas";
			}

			if ($contenidocorreo['semana4']=="sem4_comp") {

					$semanas=$semanas." -Semana del 15 al 20 de Julio dia completo";
			}
				elseif ($contenidocorreo['semana4']=="sem4_manyana") {

					$semanas= $semanas." -Semana del 15 al 20 de Julio solo mañanas";
			}

			if ($contenidocorreo['semana5']=="sem5_comp") {

					$semanas=$semanas." -Semana del 22 al 26 de Julio dia completo";
			}
				elseif ($contenidocorreo['semana5']=="sem5_manyana") {

					$semanas= $semanas." -Semana del 22 al 26 de Julio solo mañanas";
			}*/

		 
			$contenido = "Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos']. 
			"<br>Fecha de nacimiento: ".$contenidocorreo['fecha_nacimiento'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Franja y días seleccionados: ".''.
			"<br>Importe: ".''.
			"<br>Pago: ".$contenidocorreo['tipo_pago'].
			"<br>Tipo de inscripción: ".$contenidocorreo['tipo_inscripcion'].
			"<br>Teléfono: " . $contenidocorreo['telefono'] .
			"<br>Correo electrónico: " . $contenidocorreo['email'];


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
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" 
													alt="Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p><strong>ID del pedido:</strong> '.$ID.'</p>
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
																			<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
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
        
        
        //  LISTADO GENERAL     /   OPERACIÓN: GENERAR VISTA HTML
		public function actionImprimirFichaSaludSportsClub()
        {
			require "models/sportsclub_inscripciones.php";

			// Asignamos un título al cuerpo del HTML
			$seccioninscripcion = "Cuestionario de Salud Sports Club";

			// Recogemos la variable "ID" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
			$ID = $_GET['ID'];

			// Recogemos todos los datos del registro pasándole el número de pedido
			$contenidocorreo = sportsclub_inscripciones::findByIDAmpliadoCuestionarioSalud($ID);

            error_log(__FILE__.__FUNCTION__.__LINE__);
            error_log(print_r($contenidocorreo,1));

			$contenidocorreo['tipo_pago'] = "ONLINE";

			// Generamos el contenido de los datos a mostrar en el cuerpo del HTML
			$contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

		
			$contenido = "Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos']. 
			"<br>Fecha de nacimiento: ".$contenidocorreo['fecha_nacimiento'].
			"<br>DNI: ".$contenidocorreo['dni'].
			"<br>Franja y días seleccionados: ".''.
			"<br>Importe: ".''.
			"<br>Pago: ".$contenidocorreo['tipo_pago'].
			"<br>Tipo de inscripción: ".$contenidocorreo['tipo_inscripcion'].
			"<br>Teléfono: " . $contenidocorreo['telefono'] .
			"<br>Correo electrónico: " . $contenidocorreo['email'];

            /*


            */
            $contenido_salud='<div class="row">
                                                    <div class="form-group col-12">
                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><strong>Profesión:</strong>
                                                                </label>
                                                                <span>'.$contenidocorreo['profesion'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><strong>Aficiones Deportivas:</strong>
                                                                </label>
                                                                <span>'.$contenidocorreo['aficiones_deportivas'].'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><strong>Objetivo Entrenamiento:</strong>
                                                                </label>
                                                                <span>'.$contenidocorreo['objetivo_entrenamiento'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><strong>Impresión Diagnóstica:</strong>
                                                                </label>
                                                                <span>'.$contenidocorreo['impresion_diagnostica'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2 redimension">
                                                                <label><strong>Pauta recuperación funcional/rehabilitación activa:</strong>
                                                                </label>
                                                                <span>'.$contenidocorreo['pauta_recuperacion'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-1">
                                                            <div class="col-12 mt-2">
                                                                <hr class="mt-1">
                                                                <div class="contact-info-wrap">    
                                                                    <h3 class="section-title mt-0 mb-0">
                                                                        <span class="orange-text">ACTIVIDAD FÍSICA</span>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <h3 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text">En el trabajo</span>
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿Exige su trabajo una actividad física intensa que implica una aceleración importante de la respiración o del ritmo cardíaco, como [levantar pesos, cavar o trabajos de construcción] durante al menos 10 minutos consecutivos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <span>'.($contenidocorreo['trabajo_intenso']?"Sí":"No").'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En una semana típica, ¿cuántos días realiza usted actividades físicas intensas en su trabajo?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Numero de días:
                                                                </label>
                                                                <span>'.$contenidocorreo['trabajo_intenso_dias'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En uno de esos días en los que realiza actividades físicas intensas, ¿cuánto tiempo suele dedicar a esas actividades?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                <span>'.$contenidocorreo['trabajo_intenso_tiempo'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿Exige su trabajo una actividad de intensidad moderada que implica una ligera aceleración de la respiración o del ritmo cardíaco, como caminar deprisa [o transportar pesos ligeros] durante al menos 10 minutos consecutivos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                 <span>'.($contenidocorreo['trabajo_moderado']?"Sí":"No").'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En una semana típica, ¿cuántos días realiza usted actividades de intensidad moderada en su trabajo?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Numero de días:
                                                                </label>
                                                                <span>'.$contenidocorreo['trabajo_moderado_dias'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En uno de esos días en los que realiza actividades físicas de intensidad moderada, ¿cuánto tiempo suele dedicar a esas actividades?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                <span>'.$contenidocorreo['trabajo_moderado_tiempo'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <hr>
                                                                <h4 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text">Para desplazarse</span>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿Camina usted o usa usted una bicicleta al menos 10 minutos consecutivos en sus desplazamientos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                               <span>'.($contenidocorreo['despl_bici']?"Sí":"No").'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En una semana típica, ¿cuántos días camina o va en bicicleta al menos 10 minutos consecutivos en sus desplazamientos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Numero de días:
                                                                </label>
                                                                 <span>'.$contenidocorreo['despl_camina'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En un día típico, ¿cuánto tiempo pasa caminando o yendo en bicicleta para desplazarse?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                 <span>'.$contenidocorreo['despl_tiempo'].'</span>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12">
                                                                <hr>
                                                                <h3 class="section-title mt-0 mb-0">
                                                                    <span class="orange-text">En el tiempo libre</span>
                                                                </h3>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿En su tiempo libre, practica usted deportes/fitness intensos que implican una aceleración importante de la respiración o del ritmo cardíaco como [correr, jugar al fútbol] durante al menos 10 minutos consecutivos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <span>'.($contenidocorreo['tlibre_minutos']?"Sí":"No").'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En una semana típica, ¿cuántos días practica usted deportes/fitness intensos en su tiempo libre?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Numero de días:
                                                                </label>
                                                                <span>'.$contenidocorreo['tlbre_dias'].'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En uno de esos días en los que practica deportes/fitness intensos, ¿cuánto tiempo suele dedicar a esas actividades?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                <span>'.$contenidocorreo['tlibre_tiempo'].'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿En su tiempo libre practica usted alguna actividad de intensidad moderada que implica una ligera aceleración de la respiración o del ritmo cardíaco, como caminar deprisa, [ir en bicicleta, nadar, jugar al volleyball] durante al menos 10 minutos consecutivos?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <span>'.($contenidocorreo['tlibre_aceleracion']?"Sí":"No").'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En una semana típica, ¿cuántos días practica usted actividades físicas de intensidad moderada en su tiempo libre?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Numero de días:
                                                                </label>
                                                                <span>'.$contenidocorreo['tlibre_dias_moderado'].'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">En uno de esos días en los que practica actividades físicas de intensidad moderada, ¿cuánto tiempo suele dedicar a esas actividades?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                <span>'.$contenidocorreo['tlibre_timpo_moderado'].'</span>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-12 mt-2">
                                                                <hr>
                                                                <div class="contact-info-wrap">    
                                                                    <h3 class="section-title mt-0 mb-0">
                                                                        <span class="orange-text">Comportamiento sedentario</span>
                                                                    </h3>
                                                                    <p class="t-justify">La siguiente pregunta se refiere al tiempo que suele pasar sentado o recostado en el trabajo, en casa, en los desplazamientos o con sus amigos. Se incluye el tiempo pasado [ante una mesa de trabajo, sentado con los amigos, viajando en autobús o en tren, jugando a las cartas o viendo la televisión], pero no se incluye el tiempo pasado durmiendo.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                                                                <p class="t-justify">¿Cuándo tiempo suele pasar sentado o recostado en un día típico?
                                                                </p>
                                                            </div>

                                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                                <label>Horas:
                                                                </label>
                                                                <span>'.$contenidocorreo['sedentario_horas'].'</span>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>';

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
													<img src="https://www.alqueriadelbasket.com/img/logos-cabecera-email.png" 
													alt="Alqueria del Basket" width="547" height="81" style="display: block;">
												</a>
											</td>
										</tr>
										<tr>
											<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
												<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
												<p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
												<p><strong>ID del pedido:</strong> '.$ID.'</p>
												<p>'.$contenido.'</p>
                                                <hr>
                                                
                                                '.$contenido_salud.'


                                                
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
																			<img src="https://www.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
																		</a>
																	</td>
																	<td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
																	<td>
																		<a href="https://twitter.com/LAlqueriaVBC" target="_blank">
																			<img src="https://www.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
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
        


		//  LISTADO GENERAL     /   OPERACIÓN: DAR DE BAJA EL REGISTRO
		public function actionDarseBajaSportsClub() {
			if (isset($_POST['id'])) {

				$ID = $_POST['id'];

				echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
						<div class='contact-form-wrapper' style='width: 50%; margin-left: 25%; background-color: white; border: 1px solid #000000; border-radius: 10px; padding: 25px;'>
							<form action='?r=sportsclub/DarseBajaSportsClub' method='post'>
								<p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
								<div style='text-align:center;'>
									<input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
									<input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
								</div>
								<input type='hidden' name='ID' value='".$ID."'>
							</form>
						</div>
					</div>";
				die; 
			}
			

			if (isset($_POST['confirm'])) {
				if ($_POST['confirm'] == "SI") {
				   require "models/sportsclub_inscripciones.php";

					$ID = $_POST['ID'];
				   
					$baja_reg = sportsclub_inscripciones::DarseBajaSportsClub($ID);
				}

				if ($_POST['confirm'] == "NO") {
					echo "<script text='javascript'>
							window.location.replace('?r=sportsclub/BackListarInscripciones');
						</script>";
				}
			}
			else {
				require "error.php";
			}
		}


		//  LISTADO GENERAL     /   OPERACIÓN: CARGA LOS DATOS DEL FORMULARIO DE INSCRIPCION
		public function actionCargarInscripcion() {
			if (self::isLogged()) {
			}
		}


		//  LISTADO GENERAL     /   OPERACIÓN: CARGA LOS DATOS DEL CUESTIONARIO DE SALUD Y FORMA FÍSICA
		public function actionCargarCuestionarioDeInscripcion() {
			if (self::isLogged()) {
			}
		}


		//  LISTADO GENERAL     /   OPERACIÓN: CARGA LOS DATOS DE PAGOS
		public function actionCargarPagosDeInscripcion() {
			if (self::isLogged()) {
			}
		}


		//  Pendiente: Método para actualizar algún dato de la inscripcion

		//  Pendiente: Método para actualizar un pago manual
		public function actionModificaPagadoSportsClub() {
			if (self::isLogged()) {
				require "models/sportsclub_pagos.php";
				$lineaActualizada = sportsclub_pagos::updateAttribute($_POST["id"],$nombreAtributo,$valorAtributo,$ponerComillas="no");
			}	
		}

		//  Pendiente: Médodo que genera el HTML con la lista de inscripciones
		private static function generaHTML_Tabla_Listado_Sportsclub_inscripciones($inscripciones) {
		}


		//  Pendiente: Médodo que genera el HTML con la lista de pagos de una inscripcion
		private static function generaHTML_Tabla_Listado_Sportsclub_pagos_de_inscripcion($pagos) {
		}


		/********************************************************
		*  MÉTODOS SELF
		********************************************************/

		// Metodo para comprobar el Login
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