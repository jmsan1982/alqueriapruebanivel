<?php
	class indexController {

		const PRECIO_INSCRIPCION        = 120.00;
		const PRECIO_IMPORTE_RESERVA    = 50.00;



		/***************************************************
		*          			HOME SERVICIOS                 *
		***************************************************/


		public function actionPrincipal() {
			require "config.php";

			vistaSimple("layout_index");
		}


		public function actioncambiaidioma() {
			require "config.php";
			
			if (isset($_GET['nouidioma'])) {
				$nou_idioma = $_GET['nouidioma'];
				$url = $_GET['url'];

				// Establecemos el nuevo idioma en la SESSION
				$_SESSION['idioma'] = $nou_idioma;

				// Concatenamos el idioma a la URL
				if (strpos($url,"?") !== false) {
					$url.="&idioma=".$nou_idioma;
				}
				else {
					$url.="?idioma=".$nou_idioma;
				}

				// Concatenamos 'id' si estamos en una noticia 
				if(isset($_GET['id'])){$url.="&id=".$_GET['id'];}

				// Concatenamos 'idtag' si estamos se seleccionó un tag 
				if(isset($_GET['idtag'])){$url.="&idtag=".$_GET['idtag'];}

				// Concatenamos 'screen' por sis estábamos en la paginación
				if(isset($_GET['screen'])){$url.="&screen=".$_GET['screen'];}

				// Concatenamos 'anyo' por si estábamos en la historia
				if(isset($_GET['anyo'])){$url.="&anyo=".$_GET['anyo'];}

				header('Location:'.$url);
			}
		}



		/***************************************************
		*          	ESCUELA ONLINE (MOODLE)                *
		***************************************************/


		// Carga la vista del acceso online a la plataforma de formación MOODLE
		public function actionEscuelaOnline() {
			require "config.php";

			vistaSimple("layout_escuela_online");
		}


		// En el formulario de acceso online a la plataforma de formación MOODLE, busca jugador
		public function actionEscuelaOnlineBuscaDNI() {
			require "models/inscripciones.php";                             // Busca en formulariosinscripciones
			require "models/jugadores.php";                                 // Busca en tabla unificada
			require "models/jugadores_escuelaonline_excel_exportado.php";   // Si no existe en los dos anteriores, busca en los datos del excel enviado
			require "models/jugadores_escuelaonline_consentimiento.php";    // Aqui guardamos el consentimiento
			require "models/equipos.php";
			require "models/horarios_equipos_19_20.php";

			//error_log(__FILE__.__FUNCTION__.__LINE__);
			//error_log(print_r($_POST,1));

			if (!isset($_POST['dni'])) {
				echo json_encode(array(
					"response"  => "error",
					"message"   => "No ha indicado ningún DNI",
					"confirmacion"=>""));
				die;
			}

			// Cojo el DNI
			$dni_depurado = trim(strtoupper($_POST["dni"]));
			// Le quito .
			$dni_depurado = str_replace(".","", $dni_depurado);
			$dni_depurado = str_replace(" ","", $dni_depurado);
			$dni_depurado = str_replace("-","", $dni_depurado);

			//error_log("comprobacion 1");

			/*****************************************************
			* COMPROBACION 1. COMPROBAMOS EN alqueria.jugadores
			*****************************************************/

			$jugador_existente_opcion_1 = jugadores::findBydni_jugador($dni_depurado);

			if (!empty($jugador_existente_opcion_1)) {
				// Sacamos el equipo de la nueva tabla unificada
				$equipo_auxiliar = equipos::findEquipoById($jugador_existente_opcion_1["idequipo_alqueria"]);

				//error_log(__FILE__.__FUNCTION__.__LINE__);
				//error_log(utf8_decode($equipo_auxiliar["nombre_equipo_cas"]));

				echo json_encode(
					array(
						"response"          =>  "success",
						"message"           =>  "Se ha encontrado el jugador/a", 
						"nombreapellidos"   =>  $jugador_existente_opcion_1["nombre"]." ".$jugador_existente_opcion_1["apellidos"],
						"equipo"            =>  utf8_decode($equipo_auxiliar["nombre_equipo_cas"])
					)); 
				die;
			}

			//error_log("comprobacion 2");

			/*************************************************************
			* COMPROBACION 2. COMPROBAMOS EN alqueriaforms.inscripciones
			*************************************************************/

			$jugador_existente_opcion_2 = inscripciones::findByDNIJugador($dni_depurado);

			if (!empty($jugador_existente_opcion_2)) {
				

				if(!empty($jugador_existente_opcion_2["id_equipo_horario"]))
				{
					// Sacamos el equipo de la nueva tabla unificada
					$equipo_auxiliar = horarios_equipos_19_20::findByID($jugador_existente_opcion_2["id_equipo_horario"]);
					
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					//error_log(print_r($equipo_auxiliar,1));

					if(!empty($equipo_auxiliar))
					{
						echo json_encode(
							array(
								"response"          =>  "success",
								"message"           =>  "Se ha encontrado el jugador/a", 
								"nombreapellidos"   =>  $jugador_existente_opcion_1["nombre"]." ".$jugador_existente_opcion_1["apellidos"],
								"equipo"            =>  $equipo_auxiliar["nombre"]
							));
						die;
					}
				}
			}

			//error_log("comprobacion 3");

			/**********************************************************************************
			* COMPROBACION 3. COMPROBAMOS EN alqueria.jugadores_escuelaonline_excel_exportado
			**********************************************************************************/

			$jugador_existente_opcion_3 = jugadores_escuelaonline_excel_exportado::findByDni($dni_depurado);

			if (!empty($jugador_existente_opcion_3)) {
				echo json_encode(
					array(
						"response"          =>  "success",
						"message"           =>  "Se ha encontrado el jugador/a",
						"nombreapellidos"   =>  $jugador_existente_opcion_3["nombreapellidos"],
						"equipo"            =>  $jugador_existente_opcion_3["equipo"]
					));
				die;
			}
			else {
				echo json_encode(
					array(
						"response"      =>  "error",
						"message"       =>  "No se ha encontrado ningún jugador/a con ese DNI",
						"confirmacion"  =>  ""));
				die;
			}
		}


		// Gestiona el formulario de acceso online a la plataforma de formación MOODLE
		public function actionEscuelaOnlineForm() {
			require "models/inscripciones.php";                             //  Busca en formulariosinscripciones
			require "models/jugadores.php";                                 //  Busca en tabla unificada
			require "models/jugadores_escuelaonline_excel_exportado.php";   //  Si no existe en los dos anteriores, busca en los datos del excel enviado
			require "models/jugadores_escuelaonline_consentimiento.php";    //  Aqui guardamos el consentimiento
			require "models/equipos.php";
			require "models/horarios_equipos_19_20.php";

			//error_log(__FILE__.__FUNCTION__.__LINE__);
			//error_log(print_r($_POST,1));
			
			if (!isset($_POST['dni'])) {
				echo json_encode(array(
					"response"  => "error",
					"message"   => "No ha indicado ningún DNI",
					"confirmacion"=>""));
				die;
			}

			if (!isset($_POST['autorizodatos']) || !isset($_POST['autorizopolitica'])) {
				echo json_encode(
					array(
						"response"  => "success",
						"message"   => "No ha aceptado las condiciones y la política de privacidad",
						"confirmacion"=>""));
				die;
			}


			// Variable con el acceso temporal
			$confirmacion = '
				<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;"> 
					<div class="row pl-1 pr-1">
						<div class="col-12">
							<h4><strong>ACCESO TEMPORAL A LA PLATAFORMA ONLINE:</strong></h4>
							<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em;">
								<a href="https://formacion.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600; text-decoration: underline;">https://formacion.alqueriadelbasket.com/</a>
							</p>

							<h4><strong>USUARIO:</strong></h4>
							<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">'.$_POST['dni'].' (letras en minúsculas)
							</p>

							<h4><strong>CONTRASEÑA:</strong></h4>
							<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">Alqueria2020* (solo si se trata del primer acceso)
							</p>
						</div>
					</div>
				</div>';

			// Cojo el DNI
			$dni_depurado = trim(strtoupper($_POST["dni"]));
			//  Le quito .
			$dni_depurado = str_replace(".","", $dni_depurado);
			$dni_depurado = str_replace(" ","", $dni_depurado);
			$dni_depurado = str_replace("-","", $dni_depurado);

			if($_POST['autorizodatos'] === "si") {
				$autorizodatos = 1;
			}
			else {
				$autorizodatos = 0;
			}

			if ($_POST['autorizopolitica'] === "si") {
				$autorizopolitica = 1;
			}
			else {
				$autorizopolitica = 0;
			}

			/*****************************************************
			* COMPROBACION 1. COMPROBAMOS EN alqueria.jugadores
			*****************************************************/

			$jugador_existente_opcion_1 = jugadores::findBydni_jugador($dni_depurado);
			
			if (!empty($jugador_existente_opcion_1)) {
				// Guardamos el consentimiento
				jugadores_escuelaonline_consentimiento::insert($dni_depurado, $autorizodatos, $autorizopolitica, date("Y-m-d H:i:s"));

				$confirmacion = '
					<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;">
						<div class="row pl-1 pr-1">
							<div class="col-12">
								<h4><strong>ACCESO TEMPORAL A LA PLATAFORMA ONLINE:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em;">
									<a href="https://formacion.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600; text-decoration: underline;">https://formacion.alqueriadelbasket.com/</a>
								</p>

								<h4><strong>USUARIO:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">'.strtolower($jugador_existente_opcion_1['dni_jugador']).' (letras en minúsculas)
								</p>

								<h4><strong>CONTRASEÑA:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold;font-size: 1.6em;color: #eb7c00; font-weight: 600; text-decoration:underline;">Alqueria2020* (solo si se trata del primer acceso)
								</p>
							</div>
						</div>
					</div>';

				echo json_encode(
					array(
						"response"      =>  "success",
						"message"       =>  "A continuación tiene sus datos de acceso.",
						"confirmacion"  =>  $confirmacion));
				die;
			}

			/************************************************************************
			* COMPROBACION 1. COMPROBAMOS EN alqueriaforms.formulariosinscripciones
			************************************************************************/

			$jugador_existente_opcion_2 = inscripciones::findByDNIJugador($dni_depurado);

			if (!empty($jugador_existente_opcion_2)) {
				// Guardamos el consentimiento
				jugadores_escuelaonline_consentimiento::insert($dni_depurado, $autorizodatos, $autorizopolitica, date("Y-m-d H:i:s"));

				$confirmacion = '
					<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;">
						<div class="row pl-1 pr-1">
							<div class="col-12">
								<h4><strong>ACCESO TEMPORAL A LA PLATAFORMA ONLINE:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em;">
									<a href="https://formacion.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600; text-decoration: underline;">https://formacion.alqueriadelbasket.com/</a>
								</p>

								<h4><strong>USUARIO:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">'.strtolower($jugador_existente_opcion_2['dni_jugador']).' (letras en minúsculas)
								</p>

								<h4><strong>CONTRASEÑA:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold;font-size: 1.6em;color: #eb7c00; font-weight: 600; text-decoration:underline;">Alqueria2020* (solo si se trata del primer acceso)
								</p>
							</div>
						</div>
					</div>';

				echo json_encode(
					array(
						"response"      =>  "success",
						"message"       =>  "A continuación tiene sus datos de acceso.",
						"confirmacion"  =>  $confirmacion));
				die;
			}

			/*************************************************************************
			* COMPROBACION 3. COMPROBAMOS EN alqueriaforms.jugadores_formaciononline
			*************************************************************************/

			$jugador_existente_opcion_3 = jugadores_escuelaonline_excel_exportado::findByDni($dni_depurado);
				
			if (!empty($jugador_existente_opcion_3)) {
				//  Guardamos el consentimiento
				jugadores_escuelaonline_consentimiento::insert($dni_depurado, $autorizodatos, $autorizopolitica, date("Y-m-d H:i:s"));

				$confirmacion = '
					<div class="contact-info-wrap t-center" style="background: none; background-color: #fafafa;"> 
						<div class="row pl-1 pr-1">
							<div class="col-12">
								<h4><strong>ACCESO TEMPORAL A LA PLATAFORMA ONLINE:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em;">
									<a href="https://formacion.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600; text-decoration: underline;">https://formacion.alqueriadelbasket.com/</a>
								</p>

								<h4><strong>USUARIO:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">'.strtolower($jugador_existente_opcion_3['dni_jugador']).' (letras en minúsculas)
								</p>

								<h4><strong>CONTRASEÑA:</strong></h4>
								<p class="mt-0 mb-1" style="font-weight: bold; font-size: 1.6em; color: #eb7c00; font-weight: 600; text-decoration: underline;">Alqueria2020* (solo si se trata del primer acceso)
								</p>
							</div>
						</div>
					</div>';

				echo json_encode(
					array(
						"response"      =>  "success",
						"message"       =>  "A continuación tiene sus datos de acceso.",
						"confirmacion"  =>  $confirmacion));
				die;
			}
			else {
				echo json_encode(
					array(
						"response"      =>  "error",
						"message"       =>  "No se ha encontrado ningún jugador/a con ese DNI", 
						"confirmacion"  =>  "")); 
				die;
			}
		}



		/***************************************************
		*          	ADIDAS NEXT GENERATION                 *
		***************************************************/


		// Carga la vista de la INSCRIPCION A LA ACTIVIDAD: ADIDAS NEXT
		/*public function actionAdidasNextGeneration() {
			if(isset($_GET['idioma']) && $_GET['idioma']=="es")
			{
				$_SESSION['language_adidas'] = "es";//$datos['language_adidas']="es";
			}
			else if(isset($_GET['idioma']) && $_GET['idioma']=="en")
			{
				$_SESSION['language_adidas'] = "en";//$datos['language_adidas']="eng";
			}
			else if(!isset($_SESSION['idioma']) && !isset($_SESSION['country_code']))
			{
				// Cogemos la IP del usuario del array que nos pasa el servidor
					$user_ip = $_SERVER['REMOTE_ADDR'];
				// Iniciamos el handler de CURL y le pasamos la URL de la API externa
					$ch = curl_init("http://api.hostip.info/country.php?ip=$user_ip");
				// Con este comando le pedimos a CURL que, en vez de mostrar
				// el resultado en pantalla, nos lo devuelva como una variable
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				// Y simplemente hacemos la petición HTTP.
					$country_code = curl_exec($ch);
				// Guardamos la variable en $_SESSION
					$_SESSION['country_code'] = $country_code;
					if($_SESSION['country_code']=="ES")
					{
						$_SESSION['language_adidas'] = "es";//$datos['language_adidas']="es";
					}
					else {
						$_SESSION['language_adidas'] = "en";//$datos['language_adidas']="eng";
					}
			}
			else
			{    
				if(isset($_SESSION['country_code']) && $_SESSION['country_code']=="ES")
				{
					$_SESSION['language_adidas'] = "es";
				}
				else {
					$_SESSION['language_adidas'] = "en";
				}
			}

			require_once "config.php";
			vistaSimple("layout_adidas_next_generation");
		}*/


		// Gestiona el formulario de la INSCRIPCION A LA ACTIVIDAD: ADIDAS NEXT
		public function actionGestionaAdidasNextGenerationForm() {
			require_once "config.php";
			require "includes/Utils.php";
			require "PHPMailer/envios_emails.php";
			require "models/inscripciones_eventos.php";

			if (isset($_POST['nombre']))	{                
				$_SESSION['actualizar_entidad_pagos']   =   "inscripciones_eventos";

				$nombre             =   ucfirst(trim(filter_input(INPUT_POST, 'nombre',     FILTER_SANITIZE_STRING)));
				$apellidos          =   ucwords(trim(filter_input(INPUT_POST, 'apellidos',  FILTER_SANITIZE_STRING)));
				$empresa_club       =   trim(filter_input(INPUT_POST, "empresaclub",        FILTER_SANITIZE_STRING));
				$email              =   strtolower(trim(filter_input(INPUT_POST, "email",   FILTER_SANITIZE_EMAIL)));
				$movil              =   trim(filter_input(INPUT_POST, "movil",              FILTER_SANITIZE_NUMBER_INT));
				$cantidad_packs     =   trim(filter_input(INPUT_POST, "packs",              FILTER_SANITIZE_NUMBER_INT));
				$comentario         =   trim(filter_input(INPUT_POST, "comentario",         FILTER_SANITIZE_STRING));
				$fecha_inscripcion  =   date("Y-m-d H:i:s");

				$inscripcion_existe =   inscripciones_eventos::findByEmailYEvento($email,'ADIDAS NEXT GENERATION 19-20');

				if (!empty($inscripcion_existe)) {
					if ($_SESSION['language_adidas'] === "es") {
						echo json_encode(array("response"  => "error","message"   => "Su inscripción ya se recibió anteriormente. Si tiene cualquier duda, contacte a imartinez@valenciabasket.com"));
					}
					else if ($_SESSION['language_adidas'] === "en") {
						echo json_encode(array("response"  => "success","message"   => "Your reservation already was received. If you have any question, please contact imartinez@valenciabasket.com"));
					}
					die;
				}

				$nuevoformulario = inscripciones_eventos::newFormAdidasNext2019(
					$nombre,            $apellidos,             $empresa_club,  $email,                             $movil,
					$cantidad_packs,    $fecha_inscripcion,     $comentario,    'ADIDAS NEXT GENERATION 19-20');

				if ($nuevoformulario) {
					// Aquí enviamos el email de confirmación a ISMAEL 
					$asunto     = "Reserva ADIDAS NEXT GENERATION 2019: ".$email;
					$contenido  = "
						<p>Se ha recibido una nueva reserva en ADIDAS NEXT 2019. Estos son los datos recibidos:</p>
						<p>
							<strong>Fecha de alta:</strong> ".$fecha_inscripcion."<br>
							<strong>Nombre:</strong> ".$nombre."<br>
							<strong>Apellidos:</strong> ".$apellidos."<br>
							<strong>Empresa / club:</strong> ".$empresa_club."<br>
							<strong>Email:</strong> ".strtoupper($email)."<br>  
							<strong>Teléfono:</strong> " . $movil."<br>
							<strong>Packs:</strong> ".$cantidad_packs."<br>
							<strong>Comentario:</strong> ".$comentario."<br>
						</p>";

					envios_emails::enviar_email_nueva_inscripcion_adidas_next_2019($asunto, $contenido);

					// Aquí enviamos el email de confirmación al USUARIO 
					if ($_SESSION['language_adidas'] === "es") {
						$asunto     =   "Registro en ADIDAS NEXT GENERATION 2019:";
						$contenido  =   "<p>Hemos recibido su registro en ADIDAS NEXT GENERATION 2019 con los siguientes datos:</p>
							<p>
								<strong>Nombre:</strong> ".$nombre."<br>
								<strong>Apellidos:</strong> ".$apellidos."<br>
								<strong>Empresa / club:</strong> ".$empresa_club."<br>
								<strong>Email:</strong> ".strtoupper($email)."<br>  
								<strong>Teléfono:</strong> " . $movil."<br>
								<strong>Packs:</strong> ".$cantidad_packs."<br>
								<strong>Comentario:</strong> ".$comentario."<br>
							</p>";

						envios_emails::enviar_email_nueva_inscripcion_adidas_next_2019_usuario($asunto, $contenido, $email,$nombre);
					}
					else if ($_SESSION['language_adidas'] === "en") {
						$asunto     =   "ADIDAS NEXT GENERATION 2019 Registration";
						$contenido  =   "<p>We have received your registration in ADIDAS NEXT GENERATION 2019 with the following data:</p>
							<p>
								<strong>First name:</strong> ".$nombre."<br>
								<strong>Surnames:</strong> ".$apellidos."<br>
								<strong>Company / club:</strong> ".$empresa_club."<br>
								<strong>Email:</strong> ".strtoupper($email)."<br>  
								<strong>Phone number:</strong> " . $movil."<br>
								<strong>Packs:</strong> ".$cantidad_packs."<br>
								<strong>Comments:</strong> ".$comentario."<br>
							</p>";

						envios_emails::enviar_email_nueva_inscripcion_adidas_next_2019_usuario($asunto, $contenido, $email, $nombre);
					}





					if($_SESSION['language_adidas']==="es")
					{   echo json_encode(array("response"  => "success","message"   => "Hemos recibido su inscripción"));           }
					else if($_SESSION['language_adidas']==="en")
					{   echo json_encode(array("response"  => "success","message"   => "Your reservation has been received"));     }
				}
				else {
					if ($_SESSION['language_adidas']==="es") {
						echo json_encode(array("response"  => "success","message"   => "Ha ocurrido un error. Por favor, contacte a imartinez@valenciabasket.com"));
					}
					else if ($_SESSION['language_adidas']==="en") {
						echo json_encode(array("response"  => "success","message"   => "An error occurred. Please, contact imartinez@valenciabasket.com"));
					}
				}
			}
		}


		// Exporta el listado de inscritos a ADIDAS NEXT GENERATION 2019 
		public function actionExcelAdidasNextGeneration() {
			require "models/inscripciones_eventos.php";
			$inscripciones = inscripciones_eventos::findAllByEvento("ADIDAS NEXT GENERATION 19-20");

			if(count($inscripciones)>0)
			{
				$filename = "ADIDAS_NEXT_GENERATION_2019_".date('Y_m_d_H_i_s').".xls";
				// header('Content-Encoding: UTF-8');
				header('Content-Type: text/html; charset=utf-16');
				// header("Content-Type: application/vnd.ms-excel");
				header("Content-Type: application/vnd.ms-excel; charset=utf-16");
				header("Content-Disposition: attachment; filename=".$filename."");
				header('Cache-Control: max-age=0');

				echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Nombre")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Apellidos")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Empresa_club")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Email")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Movil")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Cantidad_packs")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Comentario")."\t".
						iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Fecha_inscripcion")."\n";

				foreach($inscripciones as $inscripcion)
				{
					echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['nombre'])."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['apellidos'])."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['empresa_club'])."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['email'])."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "Tfno:".$inscripcion['movil'])."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['cantidad_packs']."\t").
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['comentario']."\t").
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['fecha_inscripcion'])."\n";
				}
				exit;
			}
		}



		/***************************************************
		*                 	SPORTS CLUB                    *
		***************************************************/


		public function actionSportsClub() {
			require "config.php";

			vistaSimple("layout_SportsClub");
		}


		// Exporta el listado de inscritos a SPORTS CLUB
		public function actionExcelSportsClub()	{
			if( self::isLogged() ) {
				require "models/sportsclub_inscripciones.php";
				$inscripciones = sportsclub_inscripciones::findAllAmpliadoHorarios();

				if(count($inscripciones)>0)	{
					$filename = "SPORTS_CLUB_2020_".date('Y_m_d_H_i_s').".xls";
					//  header('Content-Encoding: UTF-8');
					header('Content-Type: text/html; charset=utf-16');
					//  header("Content-Type: application/vnd.ms-excel");
					header("Content-Type: application/vnd.ms-excel; charset=utf-16");
					header("Content-Disposition: attachment; filename=".$filename."");
					header('Cache-Control: max-age=0');

					echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", "ID")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "dni")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "nombre")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "apellidos")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "direccion")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "numero")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "piso_esc")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "puerta")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "cp")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "poblacion")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "provincia")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "fecha_nacimiento")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "email")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "telefono")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "tipo_inscripcion")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_titular")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_iban")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_entidad")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_oficina")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_dc")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "domiciliacion_cuenta")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "fecha_alta")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "activo")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "comentario")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "autorizodatos")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "autorizoimagen")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_1_18h_19h")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_1_18h_19h_lunes")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_1_18h_19h_miercoles")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_2_18h_19h")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_2_18h_19h_martes")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_2_18h_19h_jueves")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_3_1930h_2030h")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_3_1930h_2030h_lunes")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_3_1930h_2030h_miercoles")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_4_1930h_2030h")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_4_1930h_2030h_martes")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_4_1930h_2030h_jueves")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_5_2100h_2200h")."\t".
							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_5_2100h_2200h_martes")."\t".

							iconv("UTF-8", "ISO-8859-1//TRANSLIT", "franja_5_2100h_2200h_jueves")."\n";


					foreach($inscripciones as $inscripcion)
					{
						echo    iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['ID'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['dni'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['nombre'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['apellidos'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['direccion'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['numero'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['piso_esc'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['puerta'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['cp'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['poblacion'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['provincia'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['fecha_nacimiento'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['email'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['telefono'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['tipo_inscripcion'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_titular'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_iban'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_entidad'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_oficina'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_dc'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['domiciliacion_cuenta'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['fecha_alta'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['activo'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['comentario'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['autorizodatos'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['autorizoimagen'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_1_18h_19h'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_1_18h_19h_lunes'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_1_18h_19h_miercoles'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_2_18h_19h'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_2_18h_19h_martes'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_2_18h_19h_jueves'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_3_1930h_2030h'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_3_1930h_2030h_lunes'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_3_1930h_2030h_miercoles'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_4_1930h_2030h'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_4_1930h_2030h_martes'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_4_1930h_2030h_jueves'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_5_2100h_2200h'])."\t".
								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_5_2100h_2200h_martes'])."\t".

								iconv("UTF-8", "ISO-8859-1//TRANSLIT", $inscripcion['franja_5_2100h_2200h_jueves'])."\n";
					}
					exit;
				}
			}
		}



		/***************************************************
		*              	ALQUERIA ACADEMY                   *
		***************************************************/


		public function actionAlqueriaAcademy() {
			require "config.php";

			vistaSimple("layout_AlqueriaAcademy");
		}
		

		/************************************
		*  MENU 2: VOLUNTARIOS
		************************************/

		/*public function actionvoluntarios() {
			require "config.php";
			vistaSimple("layout_voluntarios");
		}*/

		
		/*  BACK VOLUNTARIOS ==>>>> Esto debe moverse a BACK CONTROLLER. */
		public function actionBackVoluntarios()	{
			if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {
				require "models/voluntarios.php";

				$datos['inscripciones'] = voluntarios::findInscripciones();
				$datos['numerototalinscripciones'] = count($datos['inscripciones']);
				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_voluntarios");
			}
			else {
				require('error.php');
			}
		}


		
		/************************************
		*  MENU 3: MATRICULAS Y LICENCIAS
		************************************/

		// FORMULARIO INSCRIPCION ESCUELA (Tanto masculino como femenino) / Carga la vista 
		public function actionequiposmasculinos() {
			require "config.php";

			vistaSimple("layout_equipos_masculinos");
		}



		/***************************************************
		*               		CANTERA                    *
		***************************************************/


		// FORMULARIO INSCRIPCION ESCUELA (Tanto masculino como femenino) / Carga la vista 
		public function actionCantera() {
			require "config.php";

			vistaSimple("layout_cantera");
		}


		// FORMULARIO INSCRIPCION ESCUELA (Tanto masculino como femenino) / Gestiona el formulario
		public function actioncanteraform()	{
			echo "<script text='javascript' charset='utf-8'> alert('El formulario de inscripción a la CANTERA está bloqueado.');"
			. "window.location.replace('?r=index/principal'); </script>";
			die;

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($_POST,1));

			if (isset($_POST['nombre'])) {
					require "models/mailers.php";

					$fechanacimiento    = $_POST['fechanacimiento'];
					$nombre             = strtoupper($_POST['nombre']);
					$apellidos          = strtoupper($_POST['apellidos']);
					$direccion          = strtoupper($_POST['direccion']);
					$numero             = strtoupper($_POST['numero']);
					$piso               = strtoupper($_POST['piso']);
					$puerta             = strtoupper($_POST['puerta']);
					$poblacion          = strtoupper($_POST['poblacion']);
					$cp                 = $_POST['cp'];
					$provincia          = strtoupper($_POST['provincia']);
					$nombrepadre        = strtoupper($_POST['nombrepadre']);
					$nombremadre        = strtoupper($_POST['nombremadre']);
					$tlfpadre           = $_POST['tlfpadre'];
					$tlfmadre           = $_POST['tlfmadre'];
					$email              = strtolower($_POST['email']);
					$modalidad          = "";
					$categoria          = $_POST['categoria'];
					$alergico           = $_POST['alergico-form-cantera'];
					$alergias           = strtoupper($_POST['alergias-form-cantera']);

					$titular            = strtoupper($_POST['titular']);
					$dnititular         = strtoupper($_POST['dnititular']);
					// Quitamos los guiones, espacios y puntos
					$dnititular         = str_replace([" ", "-", "."], "", $dnititular);

					$iban               = $_POST['iban'];
					$entidad            = $_POST['entidad'];
					$oficina            = $_POST['oficina'];
					$dc                 = $_POST['dc'];
					$cuenta             = $_POST['cuenta'];
					$dni_jugador        = strtoupper($_POST["dnijugador"]);
					$fecha              = date("Y-m-d");

					$equipo             = "";
					$horario            = "";

					// Se crea el contenido de los 2 emails (el de Alqueria y el de la confirmacion al usuario)
					$cuentaoculta       = substr($_POST['cuenta'], -3);
					$cuentaoculta       = "**********" . $cuentaoculta;

					$contenido          = "Nombre y apellidos: " . $nombre . " " . $apellidos . "<br />Fecha de nacimiento: " . $fechanacimiento .
																	"<br />Dirección: " . $direccion . "<br />Número: " . $numero . "<br />Piso/Esc: " . $piso . 
																	"<br />Puerta: " . $puerta . "<br />Población: " . $poblacion . "<br />CP: " . $cp . 
																	"<br />Provincia: " . $provincia . "<br />Nombre del padre: " . $nombrepadre . 
																	"<br />Nombre de la madre: " . $nombremadre . "<br />Teléfono del padre: " . $tlfpadre . 
																	"<br />Teléfono de la madre: " . $tlfmadre . "<br />Email: " . $email . "<br /><b>Modalidad:</b> " . $modalidad .
																	"<br />Equipo:" . $equipo . "<br />Horario: " . $horario . "DATOS DEL BANCO<br />TITULAR: " . $titular . 
																	"<br />DNI TITULAR: " . $dnititular . "<br />IBAN: " . $iban . "<br />ENTIDAD: " . $entidad . 
																	"<br />OFICINA: " . $oficina . "<br />DC: " . $dc . "<br />CUENTA: " . $cuenta;

					$contenidooculto    =  "Nombre y apellidos: " . $nombre . " " . $apellidos . "<br />Fecha de nacimiento: " . $fechanacimiento . 
																	"<br />Dirección: " . $direccion . "<br />Número: " . $numero . "<br />Piso/Esc: " . $piso . "<br />Puerta: " . $puerta . 
																	"<br />Población: " . $poblacion . "<br />CP: " . $cp . "<br />Provincia: " . $provincia . "<br />Nombre del padre: " . $nombrepadre . 
																	"<br />Nombre de la madre: " . $nombremadre . "<br />Teléfono del padre: " . $tlfpadre . "<br />Teléfono de la madre: " . $tlfmadre . 
																	"<br />Email: " . $email . "<br />Equipo:" . $equipo . "<br />Horario: " . $horario . "DATOS DEL BANCO<br />TITULAR: " . $titular . 
																	"<br />DNI TITULAR: " . $dnititular . "<br />IBAN: " . $iban . "<br />ENTIDAD: " . $entidad . "<br />OFICINA: " . $oficina . "<br />DC: " . $dc .
																	"<br />CUENTA: " . $cuentaoculta;

					$ultimopedido = mailers::findLastNumeroPedido();
					$numeropedido = $ultimopedido['MAX(numero_pedido)'];
					$numeropedido = $numeropedido + 1;+

					$nombre = $nombre . " " . $apellidos;

					// Insertamos la nueva inscripción en la categoria correspondiente:    cantera, masculino, femenino
					$editarformulario = mailers::updateFormCantera(
									$nombre,        $email,             $contenido,     "cantera",      $fecha, 
									$categoria,     $fechanacimiento,   $direccion,     $numero,        $piso, 
									$puerta,        $poblacion,         $cp,            $provincia,     $nombrepadre, 
									$nombremadre,   $tlfpadre,          $tlfmadre,      $titular,       $dnititular, 
									$iban,          $entidad,           $oficina,       $dc,            $cuenta,   
									$_POST["existe_inscripcion"],
									$numeropedido,  $alergico,          $alergias,      "CANTERA",      $dni_jugador);

					//error_log(__FILE__.__LINE__.". Con editarformulario: ".$editarformulario);

					if (!empty($editarformulario)) {
							$formulariopagos = mailers::insertFormulariosInscripcionesPagos(
													$editarformulario, date("Y-m-d H:i:s"), 0, $dnititular, 
													0, 0, 175, NULL, 
													NULL, 525, 525, 175, 
													175, 175, NULL, NULL, 
													NULL, NULL, NULL, NULL);

							// Hacemos el envío de 2 emails: el email de confirmacion para el usuario y el email para alqueria
							$enviodecorreo  = mailers::mailssend($numeropedido, $contenidooculto,  "Ficha inscripción Cantera", $email);
							$enviodecorreo2 = mailers::mailssend($numeropedido, $contenido,        "Ficha inscripción Cantera", "alqueria@alqueriadelbasket.com");

							if ($enviodecorreo) {
									echo "<script text='javascript' charset='utf-8'>"
									. " alert('Su solicitud se ha recibido correctamente con número: " . $numeropedido . ", conserve este número cómo referencia de su solicitud');
											window.location.replace('?r=index/principal');
									</script>";
									die;
							}
					}
					else {
							error_log(__FILE__.__LINE__.". Parece que hubo algún error, por favor, inténtelo de nuevo más tarde");

							echo "<script text='javascript' charset='utf-8'>
									alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
									window.location.replace('?r=index/principal');
									</script>";

							die;
					}
			}
		}



		/***************************************************
		*                 	SKILLS CAMP                    *
		***************************************************/


		public function actionSkillsCamp() {
			require "config.php";

			if (isset($_GET['language'])) {
				if ($_GET['language'] === "es") {
					$_SESSION['language_skills'] = "es";
				}
				elseif ($_GET['language'] === "en") {
					$_SESSION['language_skills'] = "en";
				}
				else {
					$_SESSION['language_skills'] = "es";
				}
			}
			else {
				$_SESSION['language_skills'] = "es";
			}

			vistaSimple("layout_skillscamp");
		}



		/***************************************************
		*              		SHOOTING CAMP                  *
		***************************************************/


		public function actionShootingCamp() {
			require "config.php";

			vistaSimple("layout_shootingcamp");
		}

		//  (DUPLICADO SOLO PARA ADMINS DE ALQUERIA) - está en Alqueria
		public function actionShootingCampAdmin() {
			require "config.php";

			vistaSimple("layout_shootingcamp_admin");
		}



		/***************************************************
		*                 ESCUELA FALLAS    2021          *
		***************************************************/

        // ESCUELA DE FALLAS - está en Alqueria
		public function actionEscuelaFallas() {
			require "config.php";

			vistaSimple("layout_escuela_fallas");
		}

        // ESCUELA DE FALLAS (DUPLICADO SOLO PARA ADMINS DE ALQUERIA) - está en Alqueria
        public function actionEscuelaFallasAdmin() {
            require "config.php";

            vistaSimple("layout_escuela_fallas_admin");
        }


		/***************************************************
		*                 ESCUELA PASCUA                   *
		***************************************************/


		// ESCUELA DE PASCUA - está en Alqueria
		public function actionEscuelaPascua2021() {
			require "config.php";

			vistaSimple("layout_escuela_pascua");
		}

        // ESCUELA DE PASCUA (DUPLICADO SOLO PARA ADMINS DE ALQUERIA) - está en Alqueria
        public function actionEscuelaPascuaAdmin() {
            require "config.php";

            vistaSimple("layout_escuela_pascua_admin");
        }



		/***************************************************
		*                 ESCUELA VERANO                   *
		***************************************************/


		public function actionEscuelaVeranoAlq() {
			require "config.php";

			vistaSimple("layout_escuela_verano");
		}


		// ESCUELA DE VERANO EN ALQUERIA (DUPLICADO SOLO PARA ADMINS DE ALQUERIA) 
		public function actionEscuelaVeranoAlqAdmin() {
			require "config.php";

			vistaSimple("layout_escuela_verano_admin");
		}


		/***************************************************
		*                 ESCUELA NAVIDAD    2020          *
		***************************************************/

		public function actionEscuelaNavidad() {
			require "config.php";

			//vistaSimple("layout_escuela_navidad");
		}



		/***************************************************
		*                 CAMPUS IBIZA                     *
		***************************************************/


		public function actionIbiza() {
			header('Location: https://www.valenciabasket.com/campus_ibiza/');

			//require "config.php";

			//vistaSimple("layout_ibiza");
		}



		/***************************************************
		*                LIGA ALQUERIA                     *
		***************************************************/

		public function actionLigaAlqueria() {
			require "models/activarFormularios.php";

            $datos['datosFormularios'] = activarFormularios::findActivador();

            vistaSinvista(array('datos' => $datos), "layout_liga_alqueria");
		}



		/***************************************************
		*                CAMPUS WORCESTER                  *
		***************************************************/


		public function actionCampusWorcester()	{
			header('Location: https://valenciabasket.com/campusworcester/?r=index/CampusWorcester');

			//require "config.php";

			//vistaSimple("layout_campus_worcester");
		}



		/***************************************************
		*               JORNADAS DETECCIÓN                 *
		***************************************************/


		public function actionJornadasDeteccion() {
			require "config.php";

			vistaSimple("layout_jornadas_deteccion");
		}



		/***************************************************
		*                PATRONATO       2019                  *
		***************************************************/


		public function actionOk() {
			require "models/mailers.php";

			$codigo = $_GET['codigo'];

			$pagado = 1;

			if (isset($_SESSION['actualizar_entidad_pagos'])) {
				switch ($_SESSION['actualizar_entidad_pagos']) {
					case "inscripciones_patronato_pagos": {
						$actualizaestado = mailers::actualizapagadoPatronato($codigo);
						$misDatos = mailers::dameDatosPatronato($codigo);
						$nombreCompleto = $misDatos["nombre"] . " " . $misDatos["apellidos"];
						$seccioninscripcion = 'Inscripción Patronato';
						$contenido = "Nombre y apellidos: " . $misDatos["nombre"] . " " . $misDatos["apellidos"] . "<br />Fecha de nacimiento: " . $misDatos["fecha_nacimiento"] . "<br />Dirección: " . $misDatos["direccion"] . "<br />Número: " . $misDatos["direccion_numero"] . "<br />Piso/Esc: " . $misDatos["direccion_piso_escalera"] . "<br />Puerta: " . $misDatos["direccion_puerta"] . "<br />Población: " . $misDatos["poblacion"] . "<br />CP: " . $misDatos["codigo_postal"] . "<br />Provincia: " . $misDatos["provincia"] . "<br />Nombre del padre: " . $misDatos["nombre_padre"] . "<br />Nombre de la madre: " . $misDatos["nombre_madre"] . "<br />Teléfono padre: " . $misDatos["telefono_padre"] . "<br />Teléfono de la madre: " . $misDatos["telefono_madre"] . "<br />Email: " . $misDatos["email"] . "<br /><b>Modalidad:</b> " . $misDatos["modalidad"] . "<br />DATOS DEL BANCO<br />TITULAR:" . $misDatos["titular"] . "<br />DNI TITULAR: " . $misDatos["dni_titular"] . "<br />IBAN: " . $misDatos["iban"] . "<br />ENTIDAD: " . $misDatos["entidad"] . "<br />OFICINA: " . $misDatos["oficina"] . "<br />DC: " . $misDatos["dc"] . "<br />CUENTA: " . $misDatos["cuenta"];
						//mailers::mailsSendLocalHost($codigo, $nombreCompleto, $contenido, $seccioninscripcion, $misDatos["email"]);
						mailers::mailssend($codigo, $nombreCompleto, $contenido, $seccioninscripcion, $misDatos["email"]);
						break;
					}
					case "inscripciones_eventos": {
						$actualizaestado = mailers::actualizapagado($codigo, $pagado);
						$contenidocorreo = mailers::damedatos($codigo);
						$enviodecorreo2 = mailers::mailssend($contenidocorreo[0]['id_inscripcion'], $contenidocorreo[0]['nombre_apellidos'], $contenidocorreo[0]['empresa_club'], "INSCRIPCION ADIDAS NEXT GENERATION 18-19", $contenidocorreo[0]['email']);
						break;
					}
				}
			}
			vistaSimple("layout_ok");
		}


		public function actionKo() {
			require "models/mailers.php";

			$codigo = $_GET['codigo'];

			$pagado = 0;

			$actualizaestado = mailers::actualizapagado($codigo, $pagado);
			$contenidocorreo = mailers::damedatos($codigo);

			vistaSimple("layout_ko");
		}


		// Pagos inscripciones patronato (tarjeta y oficinas)
		public function actionPatronatoForm() {
				require "includes/Utils.php";
				require "models/inscripciones_patronato.php";
				require "models/inscripciones_patronato_pagos.php";

				if (isset($_POST['nombre'])) {

						require "models/mailers.php";

						$nombre = ucwords(trim(htmlspecialchars(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING))));
						$apellidos = ucwords(trim(htmlspecialchars(filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING))));

						$nombre = str_replace(["  "], " ", $nombre);
						$apellidos = str_replace(["  "], " ", $apellidos);

						$nombreCompleto = $nombre . " " . $apellidos;


						$dnititular = trim(htmlspecialchars(filter_input(INPUT_POST, 'dnititular', FILTER_SANITIZE_STRING)));
						$dnititular = str_replace([" ", "-", "."], "", $dnititular);

						$iban = htmlspecialchars(trim(filter_input(INPUT_POST, "iban", FILTER_SANITIZE_STRING)));
						$entidad = htmlspecialchars(trim($_POST["entidad"]));
						$oficina = htmlspecialchars(trim($_POST["oficina"]));
						$dc = htmlspecialchars(trim($_POST["dc"]));
						$cuenta = htmlspecialchars(trim($_POST["cuenta"]));
						$fecha = date("Y-m-d");

						$cuentaBancariaCompleta = $iban . $entidad . $oficina . $dc . $cuenta;

						$cuentaBancariaCompletaValidada = Utils::validateEntity($cuentaBancariaCompleta);

						if (!$cuentaBancariaCompletaValidada) {
								echo json_encode(array(
										"response" => "CUENTA_ERROR_"
								));
								die();
						}

						$fechanacimiento = htmlspecialchars(trim(filter_input(INPUT_POST, "fechanacimiento", FILTER_SANITIZE_STRING)));
						$direccion = htmlspecialchars(trim(filter_input(INPUT_POST, "direccion", FILTER_SANITIZE_STRING)));
						$numero = htmlspecialchars(trim(filter_input(INPUT_POST, "numero", FILTER_SANITIZE_NUMBER_INT)));
						$piso = htmlspecialchars(trim(filter_input(INPUT_POST, "piso", FILTER_SANITIZE_STRING)));
						$puerta = htmlspecialchars(trim(filter_input(INPUT_POST, "puerta", FILTER_SANITIZE_STRING)));
						$poblacion = htmlspecialchars(trim(filter_input(INPUT_POST, "poblacion", FILTER_SANITIZE_STRING)));
						$cp = htmlspecialchars(trim(filter_input(INPUT_POST, "cp", FILTER_SANITIZE_NUMBER_INT)));
						$provincia = htmlspecialchars(trim(filter_input(INPUT_POST, "provincia", FILTER_SANITIZE_STRING)));
						$nombrepadre = htmlspecialchars(trim(filter_input(INPUT_POST, "nombrepadre", FILTER_SANITIZE_STRING)));
						$nombremadre = htmlspecialchars(trim(filter_input(INPUT_POST, "nombremadre", FILTER_SANITIZE_STRING)));
						$tlfpadre = htmlspecialchars(trim($_POST["tlfpadre"]));
						$tlfmadre = htmlspecialchars(trim($_POST["tlfmadre"]));
						$email = htmlspecialchars(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
						// Guardamos el email en minúsculas
						$email = strtolower($email);
						$tipoalumno=htmlspecialchars(trim(filter_input(INPUT_POST, "tipo", FILTER_SANITIZE_STRING))); //para saber si el alumno es interno o externo
						
						$modalidad = htmlspecialchars(trim(filter_input(INPUT_POST, "modalidad", FILTER_SANITIZE_STRING)));
						$categoria = htmlspecialchars(trim(filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_STRING)));

						$titular = ucwords(trim(htmlspecialchars(filter_input(INPUT_POST, 'titular', FILTER_SANITIZE_STRING))));

						$cuentaoculta = substr($_POST['cuenta'], -3);
						$cuentaoculta = "**********" . $cuentaoculta;

					   // si tiene hermanos ya incritos se le aplica un 10% de dto
						if (isset($_POST['hermano'])) {
							$tienehermanos=$_POST['hermano'];
						} else {
							$tienehermanos=0;
						}

					   

						//si el alumno es interno son 100€, externo120€

						if ($tipoalumno=="interno"){
							$matricula=100; 
							$trimentre=100;                              
						} else{
							$matricula=120;
							$trimentre=120;
						}


						$contenido = "Nombre y apellidos: " . $nombre . " " . $apellidos . 
						"<br />Fecha de nacimiento: " . $fechanacimiento . 
						"<br />Dirección: " . $direccion . "<br />Número: " . $numero . "<br />Piso/Esc: " . $piso . "<br />Puerta: " . $puerta . 
						"<br />Población: " . $poblacion . "<br />CP: " . $cp . "<br />Provincia: " . $provincia . 
						"<br />Nombre del padre: " . $nombrepadre . "<br />Nombre de la madre: " . $nombremadre . 
						"<br />Teléfono padre: " . $tlfpadre . "<br />Teléfono de la madre: " . $tlfmadre . 
						"<br />Email: " . $email .
						"<br />Tipo alumno: " . $tipoalumno . 
						"<br /><b>Modalidad:</b> " . $modalidad . 
						"<br /><b>Matricula:</b> " . $matricula . 
						"<br />DATOS DEL BANCO<br />TITULAR:" . $titular . "<br />DNI TITULAR: " . $dnititular . 
						"<br />IBAN: " . $iban . "<br />ENTIDAD: " . $entidad . "<br />OFICINA: " . $oficina . "<br />DC: " . $dc . "<br />CUENTA: " . $cuenta;

						$ultimopedido = inscripciones_patronato::findLastNumeroPedido();

						$numeropedido = $ultimopedido['MAX(id_formulario)'];

						$numeropedido = $numeropedido + 1;

						$numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

						$numeropedido = $numeropedido."pat19";

						


						if (isset($_POST['tarjeta'])) {

								$tipopago="ONLINE";

							  //  $_SESSION['actualizar_entidad_pagos'] = "inscripciones_patronato_pagos";

								$nuevoformulario = inscripciones_patronato::newForm($numeropedido, $fechanacimiento, $nombre, $apellidos, $direccion, $numero, $piso, $puerta,
										$poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $titular, $dnititular, $iban, $entidad, $oficina,
										$dc, $cuenta, $email, $contenido, $fecha, $categoria, $modalidad, $tipoalumno, $tienehermanos, $tipopago, "0", 1);

								if ($nuevoformulario) {

										$datosinscrito = inscripciones_patronato::findFormForNumPedido($numeropedido);

										$idinscripcion= $datosinscrito['id_formulario'];

										//si se graba el registro hay que grabar el pago, siempre habra un registro de pago por cada inscrito en patronato
										$nuevoformulariopago = inscripciones_patronato_pagos::createNewPago($idinscripcion, $fecha, $dnititular,  $matricula, $matricula, 0, 0,  $trimentre, $trimentre, 
															$trimentre);



									   
										echo json_encode(array(
											"response"        => "tarjeta_ok",
											"url_redireccion" => 'https://servicios.alqueriadelbasket.com/tpv_patronato/tpv.php?pedido='.$numeropedido.'&titular='.$titular.'&importe='.$matricula
											));
											// "url_redireccion" => 'http://localhost/serviciosalqueria/tpv_patronato/tpv.php?pedido='.$numeropedido.'&titular='.$titular.'&importe='.$matricula
										   

								} else {
										echo json_encode(array("response" => "ERROR_TARJETA"));
								}
						}

						if (isset($_POST['oficinas'])) {

								$tipopago="OFICINA";

								$nuevoformulario = inscripciones_patronato::newForm($numeropedido, $fechanacimiento, $nombre, $apellidos, $direccion, $numero, $piso, $puerta,
										$poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $titular, $dnititular, $iban, $entidad, $oficina,
										$dc, $cuenta, $email, $contenido, $fecha, $categoria, $modalidad, $tipoalumno, $tienehermanos, $tipopago, "0", 1);

								

								if ($nuevoformulario) {

									$contenidocorreo = mailers::dameDatosPatronato($numeropedido);

									mailers::mailssend($numeropedido,  $contenido, "Inscripción Patronato pago en oficinas", $email);

									$datosinscrito = inscripciones_patronato::findFormForNumPedido($numeropedido);

									$idinscripcion= $datosinscrito['id_formulario'];

									//si se graba el registro hay que grabar el pago, siempre habra un registro de pago por cada inscrito en patronato
									$nuevoformulariopago = inscripciones_patronato_pagos::createNewPago($idinscripcion, $fecha, $dnititular,  $matricula, $matricula, 0, 0,  $trimentre, $trimentre, 
															$trimentre);

									echo json_encode(array("response" => "oficina_ok"));

								} else {
										echo json_encode(array("response" => "ERROR_OFICINAS"));
								}

						}
				}
		}


		// INSCRIPCIONES PATRONATO pago online
		public function actionOkPatronato() {
			require "models/inscripciones_patronato.php";
			require "models/inscripciones_patronato_pagos.php";
			require "models/mailers.php";

			$codigo = $_GET['codigo'];

			$pagado = 1;

			//marcamos el registro como pagado=1
			$actualizaestado = inscripciones_patronato::ActualizaPagadoPatronato($codigo, $pagado);

			//sacamos los datos
			$datosinscrito = inscripciones_patronato::findFormForNumPedido($codigo);

			$idinscripcion= $datosinscrito['id_formulario'];

			//en formulariosinscripciones_patronato_pagos ponemos que la matricula esta pagada pendiente_matricula=0
			$actualizmatricula = inscripciones_patronato_pagos::ActualizaPagadoMatricula($idinscripcion, 0);
			
		   
			$enviodecorreo =  mailers::mailssend($datosinscrito['numero_pedido'], $datosinscrito['contenido'], "Ficha inscripción pago online Patronato", $datosinscrito['email']);

			if ($enviodecorreo) {
				vistaSimple("layout_ok");
			}
			else {
				vistaSimple("layout_kocorreo");
			}
		}


		// INSCRIPCIONES PATRONATO error pago online
		public function actionKoPatronato() {
			require "config.php";

			vistaSimple("layout_ko");
		}

		/***************************************************
		*            FIN     PATRONATO       2019                  *
		***************************************************/


		public function actionAdidasNextGenerationForm_ant() {
			require "includes/Utils.php";
			require "models/inscripciones_eventos.php";

			if (isset($_POST['nombreyapellidos'])) {

						//require "models/mailers.php";

						$nombreyapellidos = ucwords(trim(htmlspecialchars(filter_input(INPUT_POST, 'nombreyapellidos', FILTER_SANITIZE_STRING))));

						$nombreyapellidos = str_replace(["  "], " ", $nombreyapellidos);

						$nombreUnico = Utils::checkNombresUnicosEventos($nombreyapellidos);

						if ($nombreUnico === "1") {
								echo json_encode(array(
										"response" => "repeat"
								));
								die();
						}

						$dni = trim(htmlspecialchars(filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_STRING)));
						$dni = str_replace([" ", "-", "."], "", $dni);

						$dniValidado = Utils::validateNieDni($dni);

						if ($dniValidado !== "OK") {
								echo json_encode(array(
										"response" => "DNI_ERROR_"
								));
								die();
						}

						$fecha = date("Y-m-d");

						$tlfnMovil = htmlspecialchars(trim($_POST["movil"]));
						$email = htmlspecialchars(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
						$cargo = htmlspecialchars(trim(filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_STRING)));
						$profesion = htmlspecialchars(trim(filter_input(INPUT_POST, "profesion", FILTER_SANITIZE_STRING)));
						$empresaClub = htmlspecialchars(trim(filter_input(INPUT_POST, "empresaclub", FILTER_SANITIZE_STRING)));
						$packs = htmlspecialchars(trim(filter_input(INPUT_POST, "packs", FILTER_SANITIZE_NUMBER_INT)));

						$importe = self::PRECIO_INSCRIPCION * $packs;

						//$ultimopedido = inscripciones_patronato::findLastNumeroPedido();

						//$numeropedido = $ultimopedido['MAX(numero_pedido)'];

						//$numeropedido = $numeropedido + 1;

						$numeroPedido = inscripciones_eventos::findIdByNombre($nombreyapellidos);

						$nuevoformulario = inscripciones_eventos::newForm($nombreyapellidos, $dni, $empresaClub, $cargo, $profesion, $email, $tlfnMovil, $packs, $importe, $fecha, '0000-00-00');

						if ($nuevoformulario) {
								echo json_encode(array("response" => "tarjeta_ok",
										"header" => 'http://servicios.alqueriadelbasket.com/tpv/tpv.php?pedido=',
										"titular" => $nombreyapellidos,
										"numeropedido" => $numeroPedido));
						} else {
								echo json_encode(array("response" => "ERROR_TARJETA"));
						}


			}
		}


		// Pagos Inscripciones Adidas Next Generation (tarjeta)
		public function actionAdidasNextGenerationForm() {
			require "includes/Utils.php";
			require "models/inscripciones_eventos.php";

			if (isset($_POST['nombreyapellidos']))
			{

					$_SESSION['actualizar_entidad_pagos'] = "inscripciones_eventos";

					$nombreyapellidos = ucwords(trim(htmlspecialchars(filter_input(INPUT_POST, 'nombreyapellidos', FILTER_SANITIZE_STRING))));

					$nombreyapellidos = str_replace(["  "], " ", $nombreyapellidos);

					$fecha = date("Y-m-d");

					$tlfnMovil = htmlspecialchars(trim($_POST["movil"]));
					$email = htmlspecialchars(trim(filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL)));
					$cargo = htmlspecialchars(trim(filter_input(INPUT_POST, "cargo", FILTER_SANITIZE_STRING)));
					$profesion = htmlspecialchars(trim(filter_input(INPUT_POST, "profesion", FILTER_SANITIZE_STRING)));
					$empresaClub = htmlspecialchars(trim(filter_input(INPUT_POST, "empresaclub", FILTER_SANITIZE_STRING)));
					$packs = htmlspecialchars(trim(filter_input(INPUT_POST, "packs", FILTER_SANITIZE_NUMBER_INT)));

					$importe = self::PRECIO_INSCRIPCION * $packs;
					$importetpv = $importe * 100;

					$nuevoformulario = inscripciones_eventos::newForm($nombreyapellidos, $empresaClub, $cargo, $profesion, $email, $tlfnMovil, $packs, $importe, $fecha, $fecha, 'ADIDAS NEXT GENERATION 18-19', 0);
					$numeroPedido = inscripciones_eventos::findIdByNombre($nombreyapellidos);

					if ($nuevoformulario) {
							echo json_encode(array("response" => "tarjeta_ok",
									"header" => 'http://servicios.alqueriadelbasket.com/tpv/tpv.php?pedido=',
									"titular" => $nombreyapellidos,
									"numeropedido" => $numeroPedido[0],
									"importe_tpv" => $importetpv));
					} else {
							echo json_encode(array("response" => "ERROR_TARJETA"));

					}

			}
		}



		/***************************************************
		* 		LICENCIAS DE LA FEDERACION 2019 / 2020     *
		***************************************************/


		// Método que devuelve los jugadores posibles para un DNI dado
		public function actionfindByIDTutorSinCategoria() {
			require "models/inscripciones.php";
			$datos = inscripciones::findFormulariosInscripcionesByDNITutorSinCategoria( $_POST['dni'] );

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($datos,1));

			$resultado=json_encode(array(
					"response"  => "Consulta OK",
					"datos"     => $datos));

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($resultado,1));

			echo $resultado;
		}


		// Carga la vista con el formulario con el que los usuarios solicitan la licencias de la federacion 2019-2020
		public function actionLicenciaFederacion() {
			require "config.php";
			vistaSimple("layout_LicenciaFederacion");
		}


		// Gestiona el formulario de las solicitudes de licencias de la federacion: 2019 / 2020
		public function actionGenerarLicencia()	{
			//error_log(__FILE__.__LINE__);
			//error_log(print_r($_POST,1));

			require "models/mailers.php";
			require "models/inscripciones.php";
			require "models/federacion_equipos.php";
			require "models/licenciasfederacion1920.php";
			require "models/licenciasfederacion1920_equipos.php";
			require "models/horarios_equipos_19_20.php";

			$fecha_solicitud    =   $_POST["fecha_solicitud"];
			$dni_busqueda       =   $_POST["validacion-dni"];
			$dni_busqueda       =   str_replace(".","",trim(strtoupper($dni_busqueda)));
			$dni_busqueda       =   str_replace(" ","",$dni_busqueda);

			$dni_jugador        =   $_POST["dni_licencia"];
			$dni_jugador        =   str_replace(".","",trim(strtoupper($dni_jugador)));
			$dni_jugador        =   str_replace(" ","",$dni_jugador);
			$fecha_nacimiento   =   $_POST["fecha_nacimiento_licencia"];
			$apellidos          =   trim(strtoupper($_POST["apellidos_licencia"]));
			$nombre             =   trim(strtoupper($_POST["nombre_licencia"]));
			$tipo               =   $_POST["optradio"];           // entrenador, jugador

			$nombreequipo       =   trim(strtoupper($_POST["nombre_equipo_licencia"]));
			$club               =   trim(strtoupper($_POST["club_licencia"]));
			$categoria          =   trim(strtoupper($_POST["categoria_licencia"]));
			$id_formulariosinscripciones    =   $_POST['existe_inscripcion'];

			if($nombreequipo==="" || $club==="" || $categoria==="" || $id_formulariosinscripciones=="0")
			{
				echo "<script text='javascript' charset='utf-8'>alert('No se permite ninguna solicitud sin un equipo establecido. Por favor, contacte con nosotros.');</script>";
				header('Location: index.php?r=index/LicenciaFederacion');
				die;
			}

			//  Recuperamos la instancia de la inscripción para crear la estructura de directorios a partir del $formulariosinscripciones['id_federacion_equipo']
			$formulariosinscripciones       =   inscripciones::findFormForId($id_formulariosinscripciones);
			$equipo_alqueria                =   horarios_equipos_19_20::findByID($formulariosinscripciones['id_equipo_horario']);
			//  $federacion_equipos         =   federacion_equipos::findByID($formulariosinscripciones['id_federacion_equipo']);

			//  $eliminar_archivos          =   $_POST["eliminar_archivos"];
			$nuevo_licenciasfederacion1920  =   licenciasfederacion1920::insertBasico(
							$dni_jugador,       $tipo,      $fecha_solicitud, 
							$fecha_nacimiento,  $nombre,    $apellidos,         
							$id_formulariosinscripciones);

			$nuevo_idnuevo_licenciasfederacion1920  =   $nuevo_licenciasfederacion1920['id'];
			$nuevo_licenciasfederacion1920  =   licenciasfederacion1920::updateDatosEquipoByID($nuevo_licenciasfederacion1920['id'], $nombreequipo, $categoria, $club);
			$nuevo_licenciasfederacion1920  =   licenciasfederacion1920::findByid($nuevo_idnuevo_licenciasfederacion1920);
			//  error_log(print_r($nuevo_licenciasfederacion1920,1));

			//  Carpeta donde se suben los ficheros de la solicitud 
			$carpeta_equipo     =   str_replace(" ","_",strtolower($equipo_alqueria['equipo']));
			$dir_subida_equipo  =   'licencias/'.$carpeta_equipo."/";
			$dir_subida         =   'licencias/'.$carpeta_equipo."/".$dni_jugador."_".$formulariosinscripciones['federacion_nombre_directorio']."/";

			//  Crear carpeta del equipo
			if(!file_exists($dir_subida_equipo) && !is_dir($dir_subida_equipo)){
					mkdir($dir_subida_equipo);
			}

			//  Crear carpeta de jugador
			if(!file_exists($dir_subida)        && !is_dir($dir_subida)){
					mkdir($dir_subida);
			}

			/** DNI **/
			if(isset($_FILES["dni_jugador_imagen"]))
			{
					$no_files = count($_FILES["dni_jugador_imagen"]['name']);
					for ($i = 0; $i < $no_files; $i++)
					{
							if($_FILES["dni_jugador_imagen"]["error"][$i] > 0) {
									error_log("Error: " . $_FILES["dni_jugador_imagen"]["error"][$i] );
							}
							else
							{
									$fichero =  "DNI-".$dni_jugador."-" . $i . ".jpg";
									$fichero_css =  "DNI-".$dni_jugador."-" . $i . "_cs.jpg";
									$fichero_subido = $dir_subida . $fichero;
									$fichero_subido_cs = $dir_subida . $fichero_css;
									if( move_uploaded_file( $_FILES["dni_jugador_imagen"]["tmp_name"][$i], $fichero_subido ) )
									{
											$ruta_imagen =  $fichero_subido;
											$miniatura_ancho_maximo = 400;
											$miniatura_alto_maximo  = 300;
											$info_imagen = getimagesize($ruta_imagen);
											$imagen_tipo = $info_imagen['mime'];
											switch ( $imagen_tipo ){
													case "image/JPG":
													case "image/jpg":
													case "image/jpeg":
															$imagen = imagecreatefromjpeg( $ruta_imagen );
															break;
													case "image/png":
													case "image/PNG":
															$imagen = imagecreatefrompng( $ruta_imagen );
															break;
													case "image/gif":
															$imagen = imagecreatefromgif( $ruta_imagen );
															break;
													default:
															echo "<script text='javascript' charset='utf-8'>alert('Por favor, introduzca un tipo de imagen permitido.');
															</script>";
															die;                   
											}

											copy($fichero_subido, $fichero_subido_cs);
									}
							}
					}
			}

			/** FOTO    **/
			if(isset($_FILES["foto"]))
			{
					$fichero2 =  "foto-".$dni_jugador.".jpg";
					$fichero_subido2 = $dir_subida . $fichero2;

					$fichero2_cs =  "foto-".$dni_jugador."_cs.jpg";
					$fichero_subido2_cs = $dir_subida . $fichero2_cs;
					move_uploaded_file($_FILES['foto']['tmp_name'], $fichero_subido2);
					copy($fichero_subido2,$fichero_subido2_cs);

					$ruta_imagen2 =  $fichero_subido2;

					$miniatura_ancho_maximo2 = 300;
					$miniatura_alto_maximo2 = 400;

					$info_imagen2   = getimagesize($ruta_imagen2);
					$imagen_ancho2  = $info_imagen2[0];
					$imagen_alto2   = $info_imagen2[1];
					$imagen_tipo2   = $info_imagen2['mime'];

					$proporcion_imagen2     = $imagen_ancho2 / $imagen_alto2;
					$proporcion_miniatura2  = $miniatura_ancho_maximo2 / $miniatura_alto_maximo2;

					if ( $proporcion_imagen2 > $proporcion_miniatura2 ){
							$miniatura_ancho2 = $miniatura_ancho_maximo2;
							$miniatura_alto2 = $miniatura_ancho_maximo2 / $proporcion_imagen2;
					} else if ( $proporcion_imagen2 < $proporcion_miniatura2 ){
							$miniatura_ancho2 = $miniatura_ancho_maximo2 * $proporcion_imagen2;
							$miniatura_alto2 = $miniatura_alto_maximo2;
					} else {
							$miniatura_ancho2 = $miniatura_ancho_maximo2;
							$miniatura_alto2 = $miniatura_alto_maximo2;
					}

					switch ( $imagen_tipo2 ){
							case "image/JPG":
							case "image/jpg":
							case "image/jpeg":
									$imagen2 = imagecreatefromjpeg( $ruta_imagen2 );
									break;
							case "image/png":
							case "image/PNG":
									$imagen2 = imagecreatefrompng( $ruta_imagen2 );
									break;
							case "image/gif":
									$imagen2 = imagecreatefromgif( $ruta_imagen2 );
									break;
							default:
									echo "<script text='javascript' charset='utf-8'>alert('Por favor, introduzca un tipo de imagen permitido: JPG, PNG, JPEG, GIF.');
									</script>";
									die; 
					}
			}

			/** FIRMA DEL JUGADOR **/ 
			if( isset( $_POST['img_firma_jugador'] ) && $_POST['img_firma_jugador'] != "" )
			{
					$firmasolicitante = $_POST['img_firma_jugador'];
					$rutafirmasolicitante = $dir_subida . "firmasolicitante-" . $dni_jugador . ".png";
					file_put_contents($rutafirmasolicitante,file_get_contents($firmasolicitante));
			}
			else
			{
					$rutafirmasolicitante = "img/firma.jpg"; 
			}

			/** FIRMA DEL TUTOR */
			if( isset( $_POST['img_firma_tutor'] ) && $_POST['img_firma_tutor'] != "" )
			{
					$firmatutor         = $_POST['img_firma_tutor'];
					$rutafirmatutor     = $dir_subida . "firmatutor-" . $dni_jugador . ".png";
					file_put_contents($rutafirmatutor,file_get_contents($firmatutor));
			}
			else
			{
					$rutafirmatutor = "img/firma.jpg";
			}

			//  Generamos el PDF con la solicitud de licencia 
			//  error_log(__FILE__.__LINE__);
			//  error_log(print_r($nuevo_licenciasfederacion1920,1));
			self::scriptGenera1PDF($nuevo_licenciasfederacion1920,$dir_subida);

			/*  Eliminamos la carpeta temporal de los ordenadores puestos en produccion
			$ficheroslocal  = scandir("ficheros_para_federacion");
			foreach($ficheroslocal as $ficherolocal)
			{
					if($ficherolocal!="." && $ficherolocal!="..")
					{
							@unlink("ficheros_para_federacion/".$ficherolocal);
					}
			}*/

			//  Email de confirmacion a recepcion
			$enviodecorreo2 = mailers::enviaCorreoARecepcion("<strong>Nombre y apellidos: </strong>".$nombre."<br><strong>DNI Jugador/a: </strong>".$dni_jugador);

			//  Debemos hacer alguna comprobación aquí
			vistaSimple("layout_ok_licenciasfederacion");
		}


		public function actionGeneraDirectoriosEquiposLicenciasFederacion()	{
			require "models/federacion_equipos.php";

			$federacion_equipos=federacion_equipos::findAll();

			foreach ($federacion_equipos as $federacion_equipo) {
				//  Carpeta donde se suben los ficheros de la solicitud 
				$dir_subida = 'licencias/'.str_replace(" ","_",strtolower($federacion_equipo['Nombre']))."/";

				//  error_log(__FILE__.__LINE__);
				//  error_log($dir_subida);

				//  Crear carpeta de jugador
				if (!file_exists($dir_subida) && !is_dir($dir_subida)) {
					mkdir($dir_subida);
				}
			}
		}


		public function actionGeneraDirectoriosEquiposAlqueria() {
			require "models/horarios_equipos_19_20.php";

			$horarios_equipos_19_20=horarios_equipos_19_20::findAll();

			foreach ($horarios_equipos_19_20 as $equipo) {
				// Carpeta donde se suben los ficheros de la solicitud 
				$dir_subida = 'licencias/'.str_replace(" ","_",strtolower($equipo['equipo']))."/";

				//error_log(__FILE__.__LINE__);
				//error_log($dir_subida);

				// Crear carpeta de jugador
				if (!file_exists($dir_subida) && !is_dir($dir_subida)) {
					mkdir($dir_subida);
				}
			}
		}


		public function actionGeneraNombresDirectoriosFormulariosInscripciones() {
			require "models/inscripciones.php";
			require "models/formulariosinscripciones.php";

			$inscripciones  = inscripciones::findAll();

			foreach ($inscripciones as $inscripcion) {
				$nombre_directorio=strtoupper(self::sanitize_nombre_para_columna_myslq(trim($inscripcion['nombre_apellidos'])));
				formulariosinscripciones::updateAttribute($inscripcion['id_formulario'],'federacion_nombre_directorio',$nombre_directorio,"si");
			}
		}


		private static function sanitize_nombre_para_columna_myslq($string)	{
			$unwanted_array = array(' '=>'_','.'=>'_','-'=>'_', '>'=>'_',
					'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
					'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'NY', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
					'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
					'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'ny', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
					'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

			$str    =   strtr( $string, $unwanted_array );

			$regex  =   '/[a-zA-Z_0-9]/';

			if (preg_match($regex, $str)) {
				return $str;
			}
			else {
				error_log(__FILE__.__LINE__);
				error_log("El string: ".$string." ha generado un error en sanitize_nombre_para_columna_myslq()");
				return false;
			}
		}


		public static function actionInvocaScriptGenera1PDF() {
			require "models/licenciasfederacion1920.php";
			require "models/inscripciones.php";
			require "models/horarios_equipos_19_20.php";

			$nuevo_licenciasfederacion1920  =   licenciasfederacion1920::findByid($_GET['id']);
			$inscripcion                    =   inscripciones::findFormForId($nuevo_licenciasfederacion1920['id_formulariosinscripciones']);
			$horarios_equipos_19_20         =   horarios_equipos_19_20::findByID($inscripcion['id_equipo_horario']);
			$carpeta_equipo                 =   str_replace(" ","_",strtolower($horarios_equipos_19_20['equipo']));

			$dir_subida                     =   'licencias/'.$carpeta_equipo."/".$inscripcion['dni_jugador']."_".$inscripcion['federacion_nombre_directorio']."/";

			self::scriptGenera1PDF($nuevo_licenciasfederacion1920,$dir_subida);
		}


		// Genera el PDF con la solicitud de licencia de federacion 2019 2020
		private static function scriptGenera1PDF($solicitud_licencia,$dir_subida) {
			// Ejemplo:            $dir_subida = 'licencias/'.$carpeta_equipo."/".$dni_jugador."_".$formulariosinscripciones['federacion_nombre_directorio']."/";
			$ruta_pdf               = $dir_subida.$solicitud_licencia['dni_jugador'] . ".pdf";
			$ruta_firma_solicitante = $dir_subida."firmasolicitante-" . $solicitud_licencia['dni_jugador'] . ".png";
			$ruta_firma_tutor       = $dir_subida."firmatutor-" . $solicitud_licencia['dni_jugador'] . ".png";

			$nuevopdf = self::createPDFLicenciaFederacion1920(
					$solicitud_licencia['fecha_solicitud'], $solicitud_licencia['nombre_equipo'],       $solicitud_licencia['categoria'],   $solicitud_licencia['club'],
					$solicitud_licencia['dni_jugador'],     $solicitud_licencia['fecha_nacimiento'],    $solicitud_licencia['apellidos'],   $solicitud_licencia['nombre'],  $solicitud_licencia['rol'],
					$ruta_pdf,                              $ruta_firma_solicitante,                    $ruta_firma_tutor);

			if ($nuevopdf) {
				//error_log(__FILE__.__LINE__.". ".$solicitud_licencia['id']." con DNI ".$solicitud_licencia['dni_jugador']." se ha generado bien");   
				return 1;
			}
			else {
				//error_log(__FILE__.__LINE__.". ".$solicitud_licencia['id']." con DNI ".$solicitud_licencia['dni_jugador']." =>>>>>>>>>>>>>>>>>>>>>> ERROR ");    
				return 0;
			}
		}


		// Carga la vista con el listado de solicitudes en el panel de administracion
		public function actionBackListarLicenciasFederacion1920() {
			if ( self::isLogged() ) {
				require "models/licenciasfederacion1920.php";

				//  Sacamos las licencias y concatenamos el nombre del equipo.
				$solicitudes_licencia               =   licenciasfederacion1920::findAllExtendedInscripcion();
				$solicitudes_licencia_array         =   self::generaHTML_ListarLicenciasFederacion1920($solicitudes_licencia);
				$datos['solicitudes_licencias']     =   $solicitudes_licencia_array['html'];
				$datos['count_fotos_revisar']       =   $solicitudes_licencia_array['count_fotos_revisar'];
				$datos['count_dnis_revisar']        =   $solicitudes_licencia_array['count_dnis_revisar'];

				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_licenciasfederacion1920");
			}
		}


		// CARGAR LA VISTA Y AÑADIR EN CUALQUIERA DE LAS TRES TABLAS
		//14/04/2020 NO SE UTILIZA PORQUE LOS DATOS AHORA ESTAN EN LA TABLA EQUIPOS DE ALQUERIA
		/*public function actionBackEquiposFederacion() {
			if ( self::isLogged() )	{
				require "models/federacion_categorias.php";
				require "models/federacion_clubs.php";
				require "models/federacion_equipos.php";

				$datos['federacion_categorias']         = federacion_categorias::findAll();
				$datos['federacion_clubs']              = federacion_clubs::findAll();
				$datos['federacion_equipos']            = federacion_equipos::findAll();

				vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_EquiposFederacion");
			}
		}
		*/

		public function actionaddCampoFederacion() {
			error_log("entramos a la funcion");
			if ( self::isLogged() )	{
				//error_log("entramos al if");
				switch( $_POST["valor_tabla"] ) {
					case "federacion_equipos":
							//error_log("federacion_equipos");
							require_once( "models/federacion_equipos.php" );
							$datos['federacion_equipos'] = federacion_equipos::insert( $_POST["valor_nuevo_campo"] );
							echo "Insertado correctamente";
					break;

					case "federacion_categorias":
							//error_log("federacion_categorias");
							require_once( "models/federacion_categorias.php" );
							$datos['federacion_categorias'] = federacion_categorias::insert( $_POST["valor_nuevo_campo"] );
							echo "Insertado correctamente";
					break;

					case "federacion_clubs":
							//error_log("federacion_clubs");
							require_once( "models/federacion_clubs.php" );
							$datos['federacion_clubs'] = federacion_clubs::insert( $_POST["valor_nuevo_campo"] );
							echo "Insertado correctamente";
					break;
				}
				//vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_EquiposFederacion");
			}
		}


		// Genera el contenido de la tabla HTML
		private function generaHTML_ListarLicenciasFederacion1920($solicitudes_licencia) {
			$contenido_tabla    ="";
			$count_fotos_revisar=0;
			$count_dnis_revisar =0;

			foreach ($solicitudes_licencia as $solicitud_licencia) {
			$carpeta_equipo     =   str_replace(" ","_",strtolower($solicitud_licencia['alqueria_equipo_nombre']));

			$aux_string_nombre_equipo="";
			if (!empty($solicitud_licencia['nombre_equipo'])) {
				$aux_string_nombre_equipo="<b>".$solicitud_licencia['alqueria_equipo_nombre']."</b><br>".$solicitud_licencia['nombre_equipo'].'<br>'.$solicitud_licencia['categoria'].' <br><small>('.$solicitud_licencia['club'].')</small>';
			}
			else {
				$aux_string_nombre_equipo="<span class='label label-danger'>SIN EQUIPO</span><br>";
			}

			$aux_string_imagenes_carpeta_licencia="";
			$ficheroslocal  =   @scandir("licencias/".$carpeta_equipo."/".$solicitud_licencia['dni_jugador']."_".$solicitud_licencia['federacion_nombre_directorio']."/");
			$comentario     =   "";

			$firmas_auxiliar="";
			$html_foto="";
			$html_dni="";
			$html_firma_solicitante="";
			$html_firma_tutor="";

			if(count($ficheroslocal)>2)
			{
				foreach($ficheroslocal as $archivo)
				{
					if ((strpos($archivo,".pdf") !== false)
									|| (strpos($archivo,".db") !== false)
									|| (strpos($archivo,"_cs") !== false) // Copias de seguridad
									|| $archivo=="."
									|| $archivo=="..")
					{}
					else {
							//  
							if (strpos($archivo,"firma") !== false) {
									$width="50";
							}
							else {
									$width="95";
							}

							$imagen_auxiliar="";

							$id_archivo=explode(".",$archivo);

							$imagen_auxiliar.='<div style="display:inline-block;vertical-align:middle;" class="pl-1"><img id="'.$id_archivo[0].'" '
																			. ' src="./licencias/'.$carpeta_equipo.'/'.$solicitud_licencia['dni_jugador'].'_'.$solicitud_licencia['federacion_nombre_directorio']."/".$archivo.'" '
																			. ' style="max-width:100px;height:auto;width:'.$width.'px">';

							$myfile = './licencias/'.$carpeta_equipo.'/'.$solicitud_licencia['dni_jugador'].'_'.$solicitud_licencia['federacion_nombre_directorio'].'/'.$archivo; 
							$myfile_size=number_format((filesize($myfile)/1024),2, '.', '');
							$imagen_auxiliar.= "<br><p id='".$id_archivo[0]."-size' class='text-center mb-0 pt-1'>".$myfile_size. ' Kb</p>';

							if (strpos($archivo,"firma") !== false)	{}
							else {
									//  . ' <button id="reducirimagen25-'.$archivo.'" style="margin-right:2px;"' 
									//  . '         class="reducirimagen25 btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" '
									//  . '         title="Reducir calidad al 25%"><i class="fa fa-search-minus"></i> 25</button>'
									$es_una_foto="si";      
									$imagen_auxiliar.= 
									'   <button id="rotateleft-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="rotateleft btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" '
													. ' title="Rotar Izquierda"><i class="fa fa-rotate-left"></i></button>'
									. ' <button id="rotateright-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="rotateright btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" '
													. ' title="Rotar derecha"><i class="fa fa-rotate-right"></i></button>'
									. '<button id="reducirimagen50-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="reducirimagen50 btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" '
													. ' title="Reducir calidad al 50%"><i class="fa fa-search-minus"></i> 50</button>'
									. '<button id="reducirimagen75-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="reducirimagen75 btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" '
													. ' title="Reducir calidad al 75%"><i class="fa fa-search-minus"></i> 75</button>'
									. '<button id="reducirancho50-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="reducirancho50 btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" '
													. ' title="Reducir tamaño imagen a 1280px o 50%"><i class="fa fa-minus"></i> </button>'
									. '<button id="reset-'.$archivo.'" style="margin-right:2px;"' 
													. ' class="reset btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" '
													. ' title="Reset"><i class="fa fa-repeat"></i> </button>';
							}

							$imagen_auxiliar.='</div>';

							if($es_una_foto=="si")
							{   $aux_string_imagenes_carpeta_licencia.=$imagen_auxiliar;    }

							if((strpos($archivo,"foto") !== false) && ($myfile_size>35))
							{   $comentario.="<h5 class='mt-1 pt-0'><span class='label label-danger'>TAMAÑO FOTO</span></h5><br>";$count_fotos_revisar++;   }
							else if((strpos($archivo,"DNI") !== false) && ($myfile_size>512))
							{   $comentario.="<h5 class='mt-1 pt-0'><span class='label label-danger'>TAMAÑO DNI</span></h5><br>";$count_dnis_revisar++;     }
					}
				}
			}

			$fecha_solicitud = new Datetime($solicitud_licencia['fecha_solicitud']);
			$contenido_tabla.= '<tr id="licenciafederacion-'.$solicitud_licencia['id'].'" class="licenciafederacion">
							<td class="text-left">'   .   $fecha_solicitud->format('d/m/Y') . '<br><b>Solicitar datos:</b>
									<div class="form-group">
											<select id="datos-incompletos-'.$solicitud_licencia['id'].'" class="form-control">
													<option value="">Seleccionar</option>
													<option value="dni"                 >DNI</option>
													<option value="foto"                >Foto</option>
													<option value="firma_solicitante"   >Firma solicitante y/o tutor</option>
													<option value="dni_firma"           >DNI y firma/s</option>
													<option value="dni_foto"            >DNI y Foto</option>
													<option value="foto_firma"          >Foto y firma/s</option>
													<option value="dni_foto_firma"      >DNI, Foto y firma/s</option>
											</select>
									</div>
									<div class="form-group">
											<button type="button" id="id-licenciafederacion-submit-'.$solicitud_licencia['id'].'" class="btn btn-block licenciafederacion-submit">Enviar email</button>
											<div id="licenciafederacion-enviar-email-form-respuesta-'.$solicitud_licencia['id'].'"></div>
									</div>
									<div class="form-group">
											<hr style="margin-top:3px;margin-bottom:3px;">
											<button type="button" 
															data-toggle="modal" 
															data-target="#modal-eliminar-solicitud-licencia" 
															id="id-licenciafederacion-eliminar-fila-'.$solicitud_licencia['id'].'" 
															class="btn btn-danger btn-block cargar_modal_eliminar_solicitud_licencia">Eliminar fila</button>
											<!--<button type="button" id="id-licenciafederacion-eliminar-fila-'.$solicitud_licencia['id'].'" class="btn btn-success btn-block">Regenerar PDF</button>-->
									</div>
							</td>
							<td class="text-left">'     .   $solicitud_licencia['dni_jugador'].' - '.$solicitud_licencia['rol'].'<br>'.
																							$solicitud_licencia['nombre'].' '.$solicitud_licencia['apellidos'].'<br>'.
																							$solicitud_licencia['fecha_nacimiento'].'<br><hr style="margin-top:3px;margin-bottom:3px;">'.
																							'Tfno. padre: '.$solicitud_licencia['nombre_padre'].'('.$solicitud_licencia['telefono_padre'].')<br>'.
																							'Tfno. madre: '.$solicitud_licencia['nombre_madre'].'('.$solicitud_licencia['telefono_madre'].')<br>'.
																							'Email: '.$solicitud_licencia['email'].'<br><hr style="margin-top:3px;margin-bottom:3px;">'.
																							$aux_string_nombre_equipo.$comentario.'</td>
							<td class="text-left contenedorimagenes">'.$aux_string_imagenes_carpeta_licencia.'</td>
							<td class="text-left">
									<a href="./licencias/'.$carpeta_equipo.'/'.$solicitud_licencia['dni_jugador'].'_'.$solicitud_licencia['federacion_nombre_directorio'].'/'.$solicitud_licencia['dni_jugador'].'.pdf" target="_blank">
											<i class="fa fa-file-pdf-o fa-3x" data-toggle="tooltip" data-placement="right" title="Ver PDF"></i>
									</a>
									<a href="https://gofile.me/45cvp/7txNRoAvE" target="_blank">
											<i class="fa fa-folder fa-3x" data-toggle="tooltip" data-placement="right" title="Abrir carpeta"></i>
									</a>
							</td>
					</tr>';
			}
			return array(
					"html"                  =>$contenido_tabla,
					"count_fotos_revisar"   =>$count_fotos_revisar,
					"count_dnis_revisar"    =>$count_dnis_revisar);
		}


		// Este método sirve para contactar por email a los padres sobre datos que faltan en la solicitud de licencia de federacion
		public function actionEnvioCorreoASolicitantePorDatosIncompletos() {
			//error_log(__FILE__.__LINE__);
			//error_log(print_r($_POST,1));

			require "models/mailers.php";
			require "models/inscripciones.php";
			require "models/licenciasfederacion1920.php";

			//  Datos que están por completar por parte del solicitante y que debemos pedir en el email
			$datos_incompletos  =   $_POST['datos_incompletos'];
			//  id del formulario de solicitud de licencia
			$licenciasfederacion=licenciasfederacion1920::findByidExtendedFormulariosInscripciones($_POST['id_licenciafederacion']);

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($licenciasfederacion,1));

			// Strings que componen el email
			$mensaje = "<p>Hola,</p> 

			<p>Le escribimos para solicitarle que complete la información recibida en la solicitud de licencia para la federación del jugador / a:
			<br><b>".$licenciasfederacion['nombre']." ".$licenciasfederacion['apellidos']."</b></p>

			<p>En concreto, le pedimos que nos vuelva a enviar:</p>";


			$final_email_necesitamos_firma = "<p>Para ello, por favor, vuelva a completar la solicitud en el siguiente enlace:<br>
			<a href=\"https://servicios.alqueriadelbasket.com/?r=index/LicenciaFederacion\" target=\"_blank\">https://servicios.alqueriadelbasket.com/?r=index/LicenciaFederacion</a></p>

			<p>Póngase en contacto con nosotros si tiene cualquier duda.</p>

			<p>Un saludo y gracias,</p>";


			$final_email_no_necesitamos_firma = "<p>Para ello, por favor, envíe la información directamente a nuestro email: <a href='mailto:inscripciones@alqueriadelbasket.com'>inscripciones@alqueriadelbasket.com</a></p>

			<p>Póngase en contacto con nosotros si tiene cualquier duda.</p>

			<p>Un saludo y gracias,</p>";


			switch ($datos_incompletos) {
				case "dni":                 {   $mensaje.="- DNI (debe verse completo, centrado en la imagen, legible y no borroso)<br>";
																				$mensaje.=$final_email_no_necesitamos_firma;
																				break;}
				case "foto":                {   $mensaje.="- FOTO (debe estar centrada en la imagen y no verse borrosa, debe ser a color)<br>";
																				$mensaje.=$final_email_no_necesitamos_firma;
																				break;}
				case "firma_solicitante":   {   $mensaje.="- Firma del solicitante y tutor / tutora<br>";
																				$mensaje.=$final_email_necesitamos_firma;
																				break;}
				case "dni_firma":           {   $mensaje.="- DNI (debe verse completo, centrado en la imagen, legible y no borroso)<br>";
																				$mensaje.="- Firma del solicitante y tutor / tutora<br>";
																				$mensaje.=$final_email_necesitamos_firma;
																				break;}
				case "dni_foto":            {   $mensaje.="- DNI (debe verse completo, centrado en la imagen, legible y no borroso)<br>";
																				$mensaje.="- FOTO (debe estar centrada en la imagen y no verse borrosa, debe ser a color)<br>";
																				$mensaje.=$final_email_no_necesitamos_firma;
																				break;}
				case "foto_firma":          {   $mensaje.="- FOTO (debe estar centrada en la imagen y no verse borrosa, debe ser a color)<br>";
																				$mensaje.="- Firma del solicitante y tutor / tutora<br>";
																				$mensaje.=$final_email_necesitamos_firma;
																				break;}
				case "dni_foto_firma":      {   $mensaje.="- DNI (debe verse completo, centrado en la imagen, legible y no borroso)<br>";
																				$mensaje.="- FOTO (debe estar centrada en la imagen y no verse borrosa, debe ser a color)<br>";
																				$mensaje.="- Firma del solicitante y tutor / tutora<br>";
																				$mensaje.=$final_email_necesitamos_firma;
																				break;}
			}

			//error_log(__FILE__.__LINE__);
			//error_log($mensaje);

			//  Pasamos a enviar el correo
			//$enviadocorreo = mailers::enviaCorreoAInscripciones("amomplet@tessq.com",$mensaje);
			//$enviadocorreo = mailers::enviaCorreoAInscripciones("pmunoz@tessq.com",$mensaje);
			$enviadocorreo = mailers::enviaCorreoAInscripciones($licenciasfederacion['email'],$mensaje);

			echo json_encode(array(
					"response"                  =>  "success",
					"licenciasfederacion_id"    =>  $licenciasfederacion['id'],
					"message"                   =>  "El email se ha enviado"));			
		}


		// Este método sirve para eliminar una fila (ideal para duplicados) en el listado de solicitudes de licencias de federacion
		public function actionEliminarSolicitudLicenciaFederacion()	{
			if ( self::isLogged() ) {
				require "models/licenciasfederacion1920.php";

				$licenciasfederacion=licenciasfederacion1920::deleteByid($_POST['id_licenciafederacion']);

				echo json_encode(array(
						"response"                  =>  "success",
						"licenciasfederacion_id"    =>  $_POST['id_licenciafederacion'],
						"message"                   =>  "Hemos eliminado esta solicitud se ha enviado"));
			}
		}


		public function actionScriptAsignaEquipoClubYCategoriaAFormulariosInscripciones() {
			require "models/licenciasfederacion1920_equipos.php";
			require "models/inscripciones.php";

			$formulariosinscripciones   =   inscripciones::findAll();
			$contador_actualizados      =   0;

			foreach($formulariosinscripciones as $inscripcion) {
				// Controlo la excepción de los 2 hermanos que comparten DNI
				$licenciasfederacion1920_equipos    =   licenciasfederacion1920_equipos::findBydni_jugador($inscripcion['dni_jugador']);

				if (!empty($licenciasfederacion1920_equipos) && $inscripcion['dni_jugador']!="73554498S" && $inscripcion['dni_jugador']!="53098149G" && !empty($inscripcion)) {
					echo __FILE__.__LINE__."<br>";

					$contador_actualizados++;

					// Actualizo los campos de formularios inscripciones
					inscripciones::actualizaAtributo("federacion_club",         $licenciasfederacion1920_equipos['club'],       $inscripcion['id_formulario'],"si");
					inscripciones::actualizaAtributo("federacion_categoria",    $licenciasfederacion1920_equipos['categoria'],  $inscripcion['id_formulario'],"si");
					inscripciones::actualizaAtributo("federacion_equipo",       $licenciasfederacion1920_equipos['equipo'],     $inscripcion['id_formulario'],"si");

					echo $inscripcion['id_formulario'].": ".$inscripcion['dni_jugador']."<br>";
				}
			}
			echo "Fin: ".$contador_actualizados;
		}


		// Permite editar una imagen
		public function actionEditarImagenLicenciaFederacion1920() {
			require "models/horarios_equipos_19_20.php";
			require "models/licenciasfederacion1920.php";
			require "models/inscripciones.php";

			if( self::isLogged() ) {
				ini_set('memory_limit','640M');

				$id_licenciafederacion  =   filter_input(INPUT_POST, 'id_licenciafederacion',   FILTER_SANITIZE_STRING);
				$ruta_archivo           =   filter_input(INPUT_POST, 'ruta_archivo',            FILTER_SANITIZE_STRING);
				$operacion              =   filter_input(INPUT_POST, 'operacion',               FILTER_SANITIZE_STRING);

				$id_licenciafederacion_array    =   explode("-",$id_licenciafederacion);
				$id_licenciafederacion          =   $id_licenciafederacion_array[1];

				//  Debemos sacar el nombre de la carpeta que es el nombre del equipo. 
				$licenciasfederacion1920    =   licenciasfederacion1920::findByidExtendedFormulariosInscripciones($id_licenciafederacion);
				$formulariosinscripciones   =   inscripciones::findFormForId($licenciasfederacion1920['id_formulariosinscripciones']);
				$horarios_equipos_19_20     =   horarios_equipos_19_20::findByID($formulariosinscripciones['id_equipo_horario']);
				$carpeta_equipo             =   str_replace(" ","_",strtolower($horarios_equipos_19_20['equipo']));

				switch($operacion) {
						case "rotateleft":
						{
								$ruta_archivo           =   str_replace("rotateleft-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);
								//  foto-49266993G.jpg
								//  DNI-49266993G-0.jpg

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								switch ( $imagen_tipo ){
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$degrees = 90;
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$rotate = imagerotate($imagen, $degrees, 0);
												imagejpeg($rotate, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;
										}
										case "image/png":{}
										case "image/PNG":{
												$degrees = 90;
												$imagen = imagecreatefrompng( "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );
												$rotate = imagerotate($imagen, $degrees, 0);
												imagepng($rotate, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;             
										}
								}
								break;
						}
						case "rotateright":
						{
								$ruta_archivo=str_replace("rotateright-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								switch ( $imagen_tipo ){
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$degrees = 270;
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$rotate = imagerotate($imagen, $degrees, 0);
												imagejpeg($rotate, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;
										}
										case "image/png":{}
										case "image/PNG":{
												$degrees = 270;
												$imagen = imagecreatefrompng("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );
												$rotate = imagerotate($imagen, $degrees, 0);
												imagepng($rotate, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;             
										}
								}
								break;
						}
						case "reducirimagen25":
						{
								$ruta_archivo=str_replace("reducirimagen25-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								switch ( $imagen_tipo ){
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												imagejpeg($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,25);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";

												break;
										}
										case "image/png":{}
										case "image/PNG":{
												$imagen = imagecreatefrompng( "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );
												imagepng($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,25);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;
										}
								}
								break;
						}
						case "reducirimagen50":
						{
								$ruta_archivo=str_replace("reducirimagen50-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								switch ( $imagen_tipo ){
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												imagejpeg($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,50);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";

												break;
										}
										case "image/png":{}
										case "image/PNG":{
												$imagen = imagecreatefrompng( "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );
												imagepng($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,50);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;             
										}
								}
								break;
						}
						case "reducirimagen75":
						{
								$ruta_archivo=str_replace("reducirimagen75-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								switch ( $imagen_tipo ){
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
												imagejpeg($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,75);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";

												break;
										}
										case "image/png":{}
										case "image/PNG":{
												$imagen = imagecreatefrompng( "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );
												imagepng($imagen, "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo,75);
												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												break;             
										}
								}
								break;
						}
						case "reducirancho50":
						{
								$ruta_archivo           =   str_replace("reducirancho50-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);

								$info_imagen = getimagesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);
								$imagen_tipo = $info_imagen['mime'];

								if($info_imagen[0]>1280){
									$nuevo_ancho=1280;
								}
								else{
									$nuevo_ancho=$info_imagen[0]/2;
								}

								switch ( $imagen_tipo )
								{
										case "image/JPG":{}
										case "image/jpg":{}
										case "image/jpeg":{
												$imagen = imagecreatefromjpeg("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);

												$porcentaje=$nuevo_ancho/$info_imagen[0];
												$nuevo_alto=$porcentaje*$info_imagen[1];

												$thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);

												// Cambiar el tamaño
												imagecopyresized($thumb, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $info_imagen[0], $info_imagen[1]);

												// Imprimir
												imagejpeg($thumb,"./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);

												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";

												break;
										}
										case "image/PNG":{}
										case "image/png":{
												$imagen = imagecreatefrompng( "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo );

												$porcentaje=$nuevo_ancho/$info_imagen[0];
												$nuevo_alto=$porcentaje/$info_imagen[1];

												$thumb = imagecreatetruecolor($nuevo_ancho, $nuevo_alto);
												// Cambiar el tamaño
												imagecopyresized($thumb, $imagen, 0, 0, 0, 0, $nuevo_ancho, $nuevo_alto, $info_imagen[0], $info_imagen[1]);
												// Imprimir
												imagepng($thumb,"./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo);

												$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";
												// error_log(__FILE__.__LINE__); 
												// error_log($imagen_size); 

												break;
										}
										case "image/gif":
												break;
								}

								break;
						}
						case "reset":
						{
								$ruta_archivo           =   str_replace("reset-","",$ruta_archivo);
								$ruta_archivo_explode   =   explode("-",$ruta_archivo);
								$DNI                    =   $ruta_archivo_explode[1];
								$DNI                    =   explode(".",$DNI);
								$DNI                    =   $DNI[0];
								$nombre_fichero         =   explode(".",$ruta_archivo);
								$extension_fichero      =   $nombre_fichero[1];

								copy("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$nombre_fichero[0]."_cs.".$extension_fichero,
										 "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$nombre_fichero[0].".".$extension_fichero);

								$imagen_size=number_format((filesize("./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo)/1024),2, '.', '')." Kb";

								break;
						}
				}

				echo json_encode(array(
						"response"      =>  "",
						"nombre_archivo"=>  $nombre_fichero['0'],
						"imagen_size"   =>  $imagen_size,
						"nueva_ruta"    =>  "./licencias/".$carpeta_equipo."/".$DNI."_".$formulariosinscripciones['federacion_nombre_directorio']."/".$ruta_archivo));
			}
		}


		// Crea el PDF de una solicitud de licencia de la federación. Temporada 2019 - 2020
		private static function createPDFLicenciaFederacion1920(
				$fecha_solicitud,   $nombre_equipo,         $categoria,     $club,  
				$dni_jugador,       $fecha_nacimiento,      $apellidos,     $nombre,        $tipo,      
				$rutapdf,           $rutafirmasolicitante,  $rutafirmapadre) {
				require_once('lib/fpdf/fpdf.php');

				$pdf = new FPDF();
				$pdf->AddPage();
				$pdf->SetMargins(10,20,10); // left, top, right

				/* CABECERA */
				$pdf->Image('img/Cabecera_pdf.png',5,4,200,0,'PNG');

				$pdf->SetY(35);
				$pdf->Ln(2);
				$pdf->SetFont('Times','',10);
				$pdf->SetFillColor(153, 204, 255);//No funciona

				$fechasolicitud2 = date("d/m/Y", strtotime($fecha_solicitud));
				$fechanacimiento = date("d/m/Y", strtotime($fecha_nacimiento));

				if($tipo==="Jugador"){$check1="4";}else{$check1="";}
				if($tipo==="Entrenador"){$check2="4";}else{$check2="";}
				if($tipo==="Asistente"){$check3="4";}else{$check3="";}
				if($tipo==="Delegado de campo"){$check4="4";}else{$check4="";}

				/* Checkbox */
				$check = "4";
				$pdf->Ln(10);   $pdf->SetFont('ZapfDingbats','', 10);   $pdf->Cell('5', '5', $check1, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Jugador',0);  
												$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check2, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Entrenador',0);                
												$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check3, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(40,8,' Asistente',0); 
												$pdf->SetFont('ZapfDingbats','', 10);	$pdf->Cell('5', '5', $check4, 1, 0);     $pdf->SetFont('Times','B',12);     $pdf->Cell(50,8,' Delegado de campo',0);   

				//$pdf->Ln(10); $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Modalidad: ','B','R',0);                 $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$modalidad,'TLRB','L',0);
				$pdf->Ln(10);   $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Fecha solicitud: ','B','R',0);           $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$fechasolicitud2,'TLRB','L',0, true); 
				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Nombre equipo: ','B','R',0);             $pdf->SetFont('Times','B',10);  error_log($nombre_equipo);    
				$pdf->MultiCell(0,8,$nombre_equipo,'TLRB','L',0);
				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Categoría: ','B','R',0);                 $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$categoria,'TLRB','L',0);         
				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Club: ','B','R',0);                      $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$club,'TLRB','L',0);

				//salto de linea
				$pdf->Ln(6);

				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Apellidos: ','B','R',0);                 $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$apellidos,'TLRB','L',0);   
				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Nombre: ','B','R',0);                    $pdf->SetFont('Times','B',10);    $pdf->MultiCell(0,8,$nombre,'TLRB','L',0); 
				$pdf->Ln(0);    $pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  DNI/NIE/Pasaporte: ','B','R',0);         $pdf->SetFont('Times','B',10);    $pdf->Cell(45,8,$dni_jugador,'TLRB',0); 
												$pdf->SetFont('Times','',10);   $pdf->Cell(50,8,'  Fecha de nacimiento: ','B','R',0);       $pdf->SetFont('Times','B',10);    $pdf->Cell(45,8,$fechanacimiento,'TLRB',0);    

				$pdf->Ln(12);

				$pdf->Ln(6);    $pdf->SetFont('Times','B',10);  $pdf->Cell(70,5,'                  Firma solicitante:','TLR',0);   	  
																												$pdf->Cell(70,5,"                Firma padre/madre/tutor:",'TLR',0);	    
																												$pdf->MultiCell(0,5,"Firma y sello club:",'TLR','C',0); 

				if($rutafirmasolicitante!=""){
						$pdf->Cell(70,30, $pdf->Image($rutafirmasolicitante, $pdf->GetX(), $pdf->GetY(), 60) ,'BL',0,"C");
						//  $pdf->Cell(70,30, $pdf->Image('firmas/Eva.png', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
				}
				else{
						$pdf->Cell(70,30, $pdf->Image('img/firma.jpg', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
				}

				if($rutafirmapadre!=""){
						$pdf->Cell(70,30, $pdf->Image($rutafirmapadre, $pdf->GetX(), $pdf->GetY(), 60) ,'BL',0,"C");
						//  $pdf->Cell(70,30, $pdf->Image('firmas/EvaPadre.png', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
				}
				else{
						$pdf->Cell(70,30, $pdf->Image('img/firma.jpg', $pdf->GetX(), $pdf->GetY(), 80) ,'BL',0,"C");
				}
				switch ($club)
				{
						case "VALENCIA BASKET CLUB SAD":
								$pdf->Cell(0,30, $pdf->Image('img/sellos/selloValenciaBasket.png', $pdf->GetX(), $pdf->GetY(), 55) ,'BLR',0,"C");
								break;
						case "VALENCIA BASKET CLUB":
								$pdf->Cell(0,30, $pdf->Image('img/sellos/selloValenciaBasket.png', $pdf->GetX(), $pdf->GetY(), 55) ,'BLR',0,"C");
								break;
						case "FUNDACION VALENCIA BASQUET 2000":
								$pdf->Cell(0,30, $pdf->Image('img/sellos/sello-valenciabasket.png', $pdf->GetX(), $pdf->GetY(), 55) ,'BLR',0,"C");
								break;
				}

				//  PIE 
				$pdf->Image('img/Pie_pdf.png',5,195,200,0,'PNG');
				$pdf->Output('F',$rutapdf);
				return $pdf;
		}		


		// Método usado para manualmente regerar un PDF
		/*private static function actionRegeneraLicencias()	{
			$solicitud_licencia= licenciasfederacion1920::findByid(1);
			$ruta_pdf               = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/" . $solicitud_licencia['dni_jugador'] . ".pdf";
			$ruta_firma_solicitante = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmasolicitante-" . $solicitud_licencia['dni_jugador'] . ".png";
			$ruta_firma_tutor       = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmatutor-" . $solicitud_licencia['dni_jugador'] . ".png";

			$nuevopdf = self::createPDFLicenciaFederacion1920(
					$solicitud_licencia['fecha_solicitud'], $solicitud_licencia['nombre_equipo'],     $solicitud_licencia['categoria'],   $solicitud_licencia['club'],
					$solicitud_licencia['dni_jugador'],     $solicitud_licencia['fecha_nacimiento'],    $solicitud_licencia['apellidos'],   $solicitud_licencia['nombre'],  $solicitud_licencia['rol'],
					$ruta_pdf,                              $ruta_firma_solicitante,                    $ruta_firma_tutor);



			$solicitud_licencia= licenciasfederacion1920::findByid(2);
			$ruta_pdf               = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/" . $solicitud_licencia['dni_jugador'] . ".pdf";
			$ruta_firma_solicitante = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmasolicitante-" . $solicitud_licencia['dni_jugador'] . ".png";
			$ruta_firma_tutor       = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmatutor-" . $solicitud_licencia['dni_jugador'] . ".png";

			$nuevopdf = self::createPDFLicenciaFederacion1920(
					$solicitud_licencia['fecha_solicitud'], $solicitud_licencia['nombre_equipo'],     $solicitud_licencia['categoria'],   $solicitud_licencia['club'],
					$solicitud_licencia['dni_jugador'],     $solicitud_licencia['fecha_nacimiento'],    $solicitud_licencia['apellidos'],   $solicitud_licencia['nombre'],  $solicitud_licencia['rol'],
					$ruta_pdf,                              $ruta_firma_solicitante,                    $ruta_firma_tutor);




			$solicitud_licencia= licenciasfederacion1920::findByid(3);
			$ruta_pdf               = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/" . $solicitud_licencia['dni_jugador'] . ".pdf";
			$ruta_firma_solicitante = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmasolicitante-" . $solicitud_licencia['dni_jugador'] . ".png";
			$ruta_firma_tutor       = 'licencias/' . $solicitud_licencia['dni_jugador'] . "/firmatutor-" . $solicitud_licencia['dni_jugador'] . ".png";

			$nuevopdf = self::createPDFLicenciaFederacion1920(
					$solicitud_licencia['fecha_solicitud'], $solicitud_licencia['nombre_equipo'],     $solicitud_licencia['categoria'],   $solicitud_licencia['club'],
					$solicitud_licencia['dni_jugador'],     $solicitud_licencia['fecha_nacimiento'],    $solicitud_licencia['apellidos'],   $solicitud_licencia['nombre'],  $solicitud_licencia['rol'],
					$ruta_pdf,                              $ruta_firma_solicitante,                    $ruta_firma_tutor);
		}*/




		// Metodo comprobar login
		private static function isLogged() {
			if (isset($_SESSION['usuario'])) {
				return true;
			}
			else {
				header('Location: index.php?r=login/loger');
			}
		}



		/***************************************************
		*			  	PANTALLA RECEPCIÓN			 	   *
		***************************************************/


		// Pantalla para la visualización de las pistas en la pantalla de recepcion
		public function actionPantallaRecepcion() {
			require "models/pantallarecepcion.php";

			//$datos['pistas'] = pistas::findAll();
			$datos['partidos'] = pantallarecepcion::findToday();  //SOLO MOSTRAMOS LOS REGISTROS QUE NO HAN FINALIZADO
			$datos['partidosfinalizados'] = pantallarecepcion::findFinalizedToFront();

			//$datos['partidos'] = array_merge((array)$datos['partidos'], (array)$datos['partidosfinalizados']);  //SI QUEREMOS MOSTRAR TAMBIEN LOS FINALIZADOS SE DESCOMENTA ESTA LINEA

			vistaSinvista(array('datos'=>$datos),"layout_pantalla_recep");
		}



		/***************************************************
		*			DECLARACIONES RESPONSABLES 			   *
		***************************************************/


		// Formulario "Declaración responsable para asistencia a eventos/actividades del VBC"
		public function actionDeclaracionResponsable() {
			require_once("config.php");

			vistaSimple("layout_declaracion_responsable");
		}

        // Gestiona el formulario
        public function actionDeclaracionResponsableGestionaForm() {
            require "includes/Utils.php";
            //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            require "models/declaracion_responsable.php";

            // Recibimos los datos
            $nombre     				=   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      		FILTER_SANITIZE_STRING)));
            $dni        				=   trim(strtoupper(filter_input(INPUT_POST, 'dni',         		FILTER_SANITIZE_STRING)));
            $telefono   				=   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    		FILTER_SANITIZE_STRING)));
            $domicilio  				=   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   		FILTER_SANITIZE_STRING)));
            $mediocomunicacion  		=   trim(strtoupper(filter_input(INPUT_POST, 'mediocomunicacion',   FILTER_SANITIZE_STRING)));
            $nombremediocomunicacion  	=   trim(strtoupper(filter_input(INPUT_POST, 'nombremediocomunicacion',   FILTER_SANITIZE_STRING)));
            $firma      				=   $_POST["firma_tutor"];

            if ($mediocomunicacion === "TRUE") {
                $mediocomunicacion = 1;
            }
            else {
                $mediocomunicacion = 0;
            }

            $nuevo      =   declaracion_responsable::insert($nombre, $dni, $telefono, $domicilio, $mediocomunicacion, $nombremediocomunicacion, $firma);

            if (!empty($nuevo)) {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Generamos el contenido del email a enviar
                $asunto_email = 'Declaración responsable para la asistencia a eventos y actividades organizadas por Valencia Basket Club';

                if (isset($mediocomunicacion) && ($mediocomunicacion == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Pertenezco al medio de comunicación: ".$nombremediocomunicacion;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "";
                }

                $contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'.'.$mediocomunicacionmensaje.'</p>
					<p style="font-size: 16px;">En fecha '.date("d-m-Y").'</p>
					<p style="font-size: 16px;">DECLARO RESPONSABLEMENTE</p>
					<ul style="font-size: 16px;">
						<li>Que no he padecido en los últimos 14 días síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), ni se me ha diagnosticado dicha enfermedad.</li>
						<li>Que tampoco he mantenido en dicho periodo contacto estrecho con persona alguna diagnosticada de COVID-19 o que se encuentre aislada preventivamente por dicha circunstancia.</li>
						<li>Que, en todo caso me comprometo, en caso de producirse alguna de las anteriores circunstancias entre la fecha de la firma de la presente declaración y el comienzo del evento, a no acudir a la instalación.</li>
						<li>Igualmente me comprometo, en caso de comenzar a presentar alguno de los síntomas referenciados anteriormente una vez en la instalación, a comunicarlo al personal del Club para que pueda establecerse el protocolo correspondiente.</li>
						<li>Me comprometo a cumplir, durante mi estancia en la instalación, con todas las normas de seguridad e higiene que sean indicadas por la organización o que sean de obligado cumplimiento en base a la legislación vigente.</li>
						<li>En caso de asistir en el futuro a nuevos eventos o actividades organizados por VALENCIA BASKET CLUB, S.A..D, me comprometo a cumplir igualmente con todo lo anteriormente descrito.</li>
					</ul>
					<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
					<p><img src="'.$firma.'"></p>';


                // Enviar email
                require "PHPMailer/envios_emails.php";


                error_log("HOLA".$mediocomunicacion);
                if ($mediocomunicacion == 1) {
                    error_log("ENTRO A 1");
                    $nuevocorreo = envios_emails::enviar_email_declaracion_responsable_medios($asunto_email, $contenido_email);
                }
                else {
                    error_log("ENTRO A 0");
                    $nuevocorreo = envios_emails::enviar_email_declaracion_responsable($asunto_email, $contenido_email);
                }

                //error_log(__FILE__.__FUNCTION__.__LINE__);

                // Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
                if (!empty($nuevocorreo)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Hemos enviado correctamente su declaración"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío fallido
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Ha habido un problema con los datos de su declaración"
                    ));
                    die;
                }
            }
            else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Mensaje datos no guardados
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "Ha habido un problema al enviar su declaración"
                ));
                die;
            }
        }

        // Back del formulario
        public function actionDeclaracionResponsableListar() {
            if( self::isLogged() ) {
                require "includes/Utils.php";

                // if(Utils::compruebaLogin()) {
                // Incluimos modelos
                require "models/declaracion_responsable.php";

                // Recuperamos datos
                $instancias = declaracion_responsable::findAll();
                $datos["tabla_html"] = self::genera_html_tabla_declaracion_responsable($instancias);

                // Preparamos y cargamos vista
                //$datos['views']         =   array("views/declaracion_responsableView.php");
                vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_declaracion_responsable");
                //}
            }
        }

        // Genera el HTML de la tabla con instancias
        private static function genera_html_tabla_declaracion_responsable($declaracion_responsable) {
            $contenido_html="
				<thead class='thead-dark'>
					<tr rol='row'>
						<th scope='col'>Id</th>
						<th scope='col'>Nombre Completo</th>
						<th scope='col'>Dni</th>
						<th scope='col'>Telefono</th>
						<th scope='col'>Domicilio Completo</th>
						<th scope='col'>Medio de comunicación</th>
					</tr>
				</thead>
				<tbody>";

            if (count($declaracion_responsable) > 0) {
                // Recorro las instancias
                foreach ($declaracion_responsable as $instancia) {
                    // Creamos lo de dentro del <tr> recorriendo los atributos
                    $contenido_tr           =   "";
                    $contenido_tr.="<td>".$instancia["id"]."</td>";
                    $contenido_tr.="<td>".$instancia["nombre_completo"]."</td>";
                    $contenido_tr.="<td>".$instancia["dni"]."</td>";
                    $contenido_tr.="<td>".$instancia["telefono"]."</td>";
                    $contenido_tr.="<td>".$instancia["domicilio_completo"]."</td>";
                    $contenido_tr.="<td>".$instancia["nombre_medio_comunicacion"]."</td>";

                    // Despues de crear todo el <tr>, lo concatenamos al string completo
                    $contenido_html.='
					<tr id="'.$instancia["id"].'-tr-declaracion_responsable">
						'.$contenido_tr.'				
					</tr>';
                }

                $contenido_html.="
				
				";

                // Devolvemos resultado
                return $contenido_html."</tbody>";
            }
        }

        // Excel con las instancias
        public static function actionGenerarExcelDeclaracionResponsable() {

            if( self::isLogged() ) {
                require "models/declaracion_responsable.php";

                $datos['inscripciones'] = declaracion_responsable::findAllInscripcionesExcel();

                if (isset($_POST["export_data"])) {
                    $filename = "Declaracion" . date('Ymd') . ".xls";
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/html; charset=utf-16');
                    header("Content-Type: application/vnd.ms-excel; charset=utf-16");
                    header("Content-Disposition: attachment; filename=" . $filename . "");
                    header('Cache-Control: max-age=0');
                    $show_coloumn = false;

                    if (!empty($datos['inscripciones'])) {

                        foreach ($datos['inscripciones'] as $inscripcion) {

                            if (!$show_coloumn) {
                                //display field/column names in first row
                                echo implode("\t", array_keys($inscripcion)) . "\r\n";
                                $show_coloumn = true;
                            }
                            //echo implode("\t", array_values($inscripcion)) . "\r\n";
                            echo implode("\t", array_values($inscripcion)) . "\r\n";
                            //iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                        }
                    }
                    exit;
                }
            }
        }


        ////////////////////////////////////////////////////////////////


        // Formulario "Declaración responsable para asistencia a eventos/actividades de VIP"
        public function actionDeclaracionResponsableVIP() {
            require_once("config.php");

            vistaSimple("layout_declaracion_responsable_vip");
        }

        // Gestiona el formulario
        public function actionDeclaracionResponsableGestionaFormVIP() {
            require "includes/Utils.php";
            //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            require "models/declaracion_responsable.php";

            // Recibimos los datos
            $nombre     				=   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      		FILTER_SANITIZE_STRING)));
            $dni        				=   trim(strtoupper(filter_input(INPUT_POST, 'dni',         		FILTER_SANITIZE_STRING)));
            $telefono   				=   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    		FILTER_SANITIZE_STRING)));
            $domicilio  				=   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   		FILTER_SANITIZE_STRING)));
            $firma      				=   $_POST["firma_tutor"];


            $nuevo      =   declaracion_responsable::insertVIP($nombre, $dni, $telefono, $domicilio, $firma);

            if (!empty($nuevo)) {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Generamos el contenido del email a enviar
                $asunto_email = 'Declaración responsable para la asistencia a eventos y actividades de VIP';

                $contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'</p>
					<p style="font-size: 16px;">En fecha '.date("d-m-Y").'</p>
					<p style="font-size: 16px;">DECLARO RESPONSABLEMENTE</p>
					<ul style="font-size: 16px;">
						<li>Que no he padecido en los últimos 14 días síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), ni se me ha diagnosticado dicha enfermedad.</li>
						<li>Que tampoco he mantenido en dicho periodo contacto estrecho con persona alguna diagnosticada de COVID-19 o que se encuentre aislada preventivamente por dicha circunstancia.</li>
						<li>Que, en todo caso me comprometo, en caso de producirse alguna de las anteriores circunstancias entre la fecha de la firma de la presente declaración y el comienzo del evento, a no acudir a la instalación.</li>
						<li>Igualmente me comprometo, en caso de comenzar a presentar alguno de los síntomas referenciados anteriormente una vez en la instalación, a comunicarlo al personal del Club para que pueda establecerse el protocolo correspondiente.</li>
						<li>Me comprometo a cumplir, durante mi estancia en la instalación, con todas las normas de seguridad e higiene que sean indicadas por la organización o que sean de obligado cumplimiento en base a la legislación vigente.</li>
						<li>En caso de asistir en el futuro a nuevos eventos o actividades organizados por VALENCIA BASKET CLUB, S.A..D, me comprometo a cumplir igualmente con todo lo anteriormente descrito.</li>
					</ul>
					<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
					<p><img src="'.$firma.'"></p>';


                // Enviar email
                require "PHPMailer/envios_emails.php";

                $nuevocorreo = envios_emails::enviar_email_declaracion_responsable_VIP($asunto_email, $contenido_email);

                //error_log(__FILE__.__FUNCTION__.__LINE__);

                // Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
                if (!empty($nuevocorreo)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Hemos enviado correctamente su declaración"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío fallido
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Ha habido un problema con los datos de su declaración"
                    ));
                    die;
                }
            }
            else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Mensaje datos no guardados
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "Ha habido un problema al enviar su declaración"
                ));
                die;
            }
        }

        // Back del formulario
        public function actionDeclaracionResponsableListarVIP() {
            if( self::isLogged() ) {
                require "includes/Utils.php";

                // if(Utils::compruebaLogin()) {
                // Incluimos modelos
                require "models/declaracion_responsable.php";

                // Recuperamos datos
                $instancias = declaracion_responsable::findAllVIP();
                $datos["tabla_html"] = self::genera_html_tabla_declaracion_responsable_VIP($instancias);

                // Preparamos y cargamos vista
                //$datos['views']         =   array("views/declaracion_responsableView.php");
                vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_declaracion_responsable");
                //}
            }
        }

        // Genera el HTML de la tabla con instancias
        private static function genera_html_tabla_declaracion_responsable_VIP($declaracion_responsable) {
            $contenido_html="
				<thead class='thead-dark'>
					<tr rol='row'>
						<th scope='col'>Id</th>
						<th scope='col'>Nombre Completo</th>
						<th scope='col'>Dni</th>
						<th scope='col'>Telefono</th>
						<th scope='col'>Domicilio Completo</th>
					</tr>
				</thead>
				<tbody>";

            if (count($declaracion_responsable) > 0) {
                // Recorro las instancias
                foreach ($declaracion_responsable as $instancia) {
                    // Creamos lo de dentro del <tr> recorriendo los atributos
                    $contenido_tr           =   "";
                    $contenido_tr.="<td>".$instancia["id"]."</td>";
                    $contenido_tr.="<td>".$instancia["nombre_completo"]."</td>";
                    $contenido_tr.="<td>".$instancia["dni"]."</td>";
                    $contenido_tr.="<td>".$instancia["telefono"]."</td>";
                    $contenido_tr.="<td>".$instancia["domicilio_completo"]."</td>";

                    // Despues de crear todo el <tr>, lo concatenamos al string completo
                    $contenido_html.='
					<tr id="'.$instancia["id"].'-tr-declaracion_responsable">
						'.$contenido_tr.'				
					</tr>';
                }

                $contenido_html.="
				
				";

                // Devolvemos resultado
                return $contenido_html."</tbody>";
            }
        }

        // Excel con las instancias (FALTA CONFIGURARLO)
        public static function actionGenerarExcelDeclaracionResponsableVIP() {
            if( self::isLogged() ) {
                require "models/declaracion_responsable.php";

                $datos['inscripciones'] = declaracion_responsable::findAllInscripcionesExcelVIP();

                if (isset($_POST["export_data"])) {
                    $filename = "Declaracion" . date('Ymd') . ".xls";
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/html; charset=utf-16');
                    header("Content-Type: application/vnd.ms-excel; charset=utf-16");
                    header("Content-Disposition: attachment; filename=" . $filename . "");
                    header('Cache-Control: max-age=0');
                    $show_coloumn = false;

                    if (!empty($datos['inscripciones'])) {

                        foreach ($datos['inscripciones'] as $inscripcion) {

                            if (!$show_coloumn) {
                                //display field/column names in first row
                                echo implode("\t", array_keys($inscripcion)) . "\r\n";
                                $show_coloumn = true;
                            }
                            //echo implode("\t", array_values($inscripcion)) . "\r\n";
                            echo implode("\t", array_values($inscripcion)) . "\r\n";
                            //iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                        }
                    }
                    exit;
                }
            }
        }


        ////////////////////////////////////////////////////////////////


        // Formulario "Declaración responsable para asistencia a eventos/actividades de proveedores"
        public function actionDeclaracionResponsableProveedores() {
            require_once("config.php");

            vistaSimple("layout_declaracion_responsable_proveedores");
        }

        // Gestiona el formulario
        public function actionDeclaracionResponsableGestionaFormProveedores() {
            require "includes/Utils.php";
            //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            require "models/declaracion_responsable.php";

            // Recibimos los datos
            $nombre     				=   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      		FILTER_SANITIZE_STRING)));
            $dni        				=   trim(strtoupper(filter_input(INPUT_POST, 'dni',         		FILTER_SANITIZE_STRING)));
            $telefono   				=   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    		FILTER_SANITIZE_STRING)));
            $domicilio  				=   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   		FILTER_SANITIZE_STRING)));
            $nombreProveedor  	=   trim(strtoupper(filter_input(INPUT_POST, 'nombreproveedor',   FILTER_SANITIZE_STRING)));
            $firma      				=   $_POST["firma_tutor"];


            $nuevo      =   declaracion_responsable::insertProveedores($nombre, $dni, $telefono, $domicilio, $nombreProveedor, $firma);

            if (!empty($nuevo)) {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Generamos el contenido del email a enviar
                $asunto_email = 'Declaración responsable para la asistencia a eventos y actividades de Proveedores';

                $proveedorMensaje = "<br>Pertenezco al proveedor: ".$nombreProveedor;


                $contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'.'.$proveedorMensaje.'</p>
					<p style="font-size: 16px;">En fecha '.date("d-m-Y").'</p>
					<p style="font-size: 16px;">DECLARO RESPONSABLEMENTE</p>
					<ul style="font-size: 16px;">
						<li>Que no he padecido en los últimos 14 días síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), ni se me ha diagnosticado dicha enfermedad.</li>
						<li>Que tampoco he mantenido en dicho periodo contacto estrecho con persona alguna diagnosticada de COVID-19 o que se encuentre aislada preventivamente por dicha circunstancia.</li>
						<li>Que, en todo caso me comprometo, en caso de producirse alguna de las anteriores circunstancias entre la fecha de la firma de la presente declaración y el comienzo del evento, a no acudir a la instalación.</li>
						<li>Igualmente me comprometo, en caso de comenzar a presentar alguno de los síntomas referenciados anteriormente una vez en la instalación, a comunicarlo al personal del Club para que pueda establecerse el protocolo correspondiente.</li>
						<li>Me comprometo a cumplir, durante mi estancia en la instalación, con todas las normas de seguridad e higiene que sean indicadas por la organización o que sean de obligado cumplimiento en base a la legislación vigente.</li>
						<li>En caso de asistir en el futuro a nuevos eventos o actividades organizados por VALENCIA BASKET CLUB, S.A..D, me comprometo a cumplir igualmente con todo lo anteriormente descrito.</li>
					</ul>
					<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
					<p><img src="'.$firma.'"></p>';


                // Enviar email
                require "PHPMailer/envios_emails.php";

                $nuevocorreo = envios_emails::enviar_email_declaracion_responsable_proveedores($asunto_email, $contenido_email);


                //error_log(__FILE__.__FUNCTION__.__LINE__);

                // Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
                if (!empty($nuevocorreo)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Hemos enviado correctamente su declaración"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío fallido
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Ha habido un problema con los datos de su declaración"
                    ));
                    die;
                }
            }
            else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Mensaje datos no guardados
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "Ha habido un problema al enviar su declaración"
                ));
                die;
            }
        }

        // Back del formulario
        public function actionDeclaracionResponsableListarProveedores() {
            if( self::isLogged() ) {
                require "includes/Utils.php";

                // if(Utils::compruebaLogin()) {
                // Incluimos modelos
                require "models/declaracion_responsable.php";

                // Recuperamos datos
                $instancias = declaracion_responsable::findAllProveedores();
                $datos["tabla_html"] = self::genera_html_tabla_declaracion_responsable_proveedores($instancias);

                // Preparamos y cargamos vista
                //$datos['views']         =   array("views/declaracion_responsableView.php");
                vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_declaracion_responsable");
                //}
            }
        }

        // Genera el HTML de la tabla con instancias
        private static function genera_html_tabla_declaracion_responsable_proveedores($declaracion_responsable) {
            $contenido_html="
				<thead class='thead-dark'>
					<tr rol='row'>
						<th scope='col'>Id</th>
						<th scope='col'>Nombre Completo</th>
						<th scope='col'>Dni</th>
						<th scope='col'>Telefono</th>
						<th scope='col'>Domicilio Completo</th>
						<th scope='col'>Nombre proveedor</th>
					</tr>
				</thead>
				<tbody>";

            if (count($declaracion_responsable) > 0) {
                // Recorro las instancias
                foreach ($declaracion_responsable as $instancia) {
                    // Creamos lo de dentro del <tr> recorriendo los atributos
                    $contenido_tr           =   "";
                    $contenido_tr.="<td>".$instancia["id"]."</td>";
                    $contenido_tr.="<td>".$instancia["nombre_completo"]."</td>";
                    $contenido_tr.="<td>".$instancia["dni"]."</td>";
                    $contenido_tr.="<td>".$instancia["telefono"]."</td>";
                    $contenido_tr.="<td>".$instancia["domicilio_completo"]."</td>";
                    $contenido_tr.="<td>".$instancia["nombre_proveedor"]."</td>";

                    // Despues de crear todo el <tr>, lo concatenamos al string completo
                    $contenido_html.='
					<tr id="'.$instancia["id"].'-tr-declaracion_responsable">
						'.$contenido_tr.'				
					</tr>';
                }

                $contenido_html.="
				
				";

                // Devolvemos resultado
                return $contenido_html."</tbody>";
            }
        }

        // Excel con las instancias
        public static function actionGenerarExcelDeclaracionResponsableProveedores() {
            if( self::isLogged() ) {
                require "models/declaracion_responsable.php";

                $datos['inscripciones'] = declaracion_responsable::findAllInscripcionesExcelProveedores();

                if (isset($_POST["export_data"])) {
                    $filename = "Declaracion" . date('Ymd') . ".xls";
                    header('Content-Encoding: UTF-8');
                    header('Content-Type: text/html; charset=utf-16');
                    header("Content-Type: application/vnd.ms-excel; charset=utf-16");
                    header("Content-Disposition: attachment; filename=" . $filename . "");
                    header('Cache-Control: max-age=0');
                    $show_coloumn = false;

                    if (!empty($datos['inscripciones'])) {

                        foreach ($datos['inscripciones'] as $inscripcion) {

                            if (!$show_coloumn) {
                                //display field/column names in first row
                                echo implode("\t", array_keys($inscripcion)) . "\r\n";
                                $show_coloumn = true;
                            }
                            //echo implode("\t", array_values($inscripcion)) . "\r\n";
                            echo implode("\t", array_values($inscripcion)) . "\r\n";
                            //iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                        }
                    }
                    exit;
                }
            }
        }


        ////////////////////////////////////////////////////////////////


		// Formulario "Declaración responsable para abonos del VBC"
		public function actionDeclaracionResponsableAbonos() {
			require_once("config.php");

			vistaSimple("layout_declaracion_responsable_abonos");
		}

		// Gestiona el formulario
		public function actionDeclaracionResponsableAbonosGestionaForm() {
			require "includes/Utils.php";
			//Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

			require "models/declaracion_responsable_abonos.php";

			// Recibimos los datos
			$nombre     =   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      FILTER_SANITIZE_STRING)));
			$dni        =   trim(strtoupper(filter_input(INPUT_POST, 'dni',         FILTER_SANITIZE_STRING)));
			//$telefono   =   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    FILTER_SANITIZE_STRING)));
			//$domicilio  =   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   FILTER_SANITIZE_STRING)));
			//$firma      =   $_POST["firma_tutor"];

			$nuevo      =   declaracion_responsable_abonos::insert($nombre, $dni/*, $telefono, $domicilio, $firma*/);

			if (!empty($nuevo)) {
				//error_log(__FILE__.__FUNCTION__.__LINE__);
				// Generamos el contenido del email a enviar
				$asunto_email = 'Declaración responsable para abono del Valencia Basket Club';

				$contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad, con DNI '.$dni.', con la adquisición de esta entrada/abono ME COMPROMETO a no asistir a los partidos a los que da derecho el mismo en las siguientes situaciones:</p>
					<ul style="font-size: 16px;">
						<li>Haber padecido en los 14 días anteriores al partido síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), o haber sido diagnosticado de dicha enfermedad.</li>
						<li>Haber mantenido contacto estrecho con persona diagnosticada de COVID-19 o que se encuentre aislada preventivamente por sospecha de infección.</li>
					</ul>
					<p style="font-size: 16px;">En caso comenzar a presentar alguno/s de los síntomas anteriormente descritos una vez en la instalación, me comprometo a informar inmediatamente al personal del VALENCIA BASKET CLUB, S.A.D. para que puedan ponerse en marcha de inmediato los protocolos sanitarios adecuados.</p>
					<p style="font-size: 16px;">En caso de que otra persona utilice mi entrada/abono, me comprometo a informarle de los anteriores compromisos y en caso de que se me solicite, a facilitar los datos de dicha persona para asegurar la trazabilidad de la enfermedad.</p>
					<p class="mt-2" style="font-size: 14px;">LOPD/RGPD En cumplimiento de Ley Orgánica 3/2018 de Protección de Datos de carácter personal y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril, VALENCIA BASKET CLUB, S.A.D. le recuerda que los datos personales que nos ha facilitado son tratados con la finalidad de cumplir con las obligaciones legales en relación con salud pública, gestionar las actividades que se realicen y mantenerles informados de estas. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección AVDA. HERMANOS MARISTAS, 16, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que Valencia Basket Club, S.A.D. ha vulnerado los derechos fundamentales que le son reconocidos por la normativa aplicable en protección de datos. Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web www.valenciabasket.com</p>

					<p style="font-size: 16px;">En Valencia, a fecha '.date("d-m-Y").'</p>';


				// Enviar email
				require "PHPMailer/envios_emails.php";
				$nuevocorreo = envios_emails::enviar_email_declaracion_responsable_abonos($asunto_email, $contenido_email);

				//error_log(__FILE__.__FUNCTION__.__LINE__);

				// Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
				if (!empty($nuevocorreo)) {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					// Mensaje envío correcto
					echo json_encode(array(
						"response" =>  "success",
						"message"  =>  "Hemos enviado correctamente su declaración"));
					die;
				}
				else {
					//error_log(__FILE__.__FUNCTION__.__LINE__);
					// Mensaje envío fallido
					echo json_encode(array(
						"response"  => "error",
						"message"   => "Ha habido un problema con los datos de su declaración"
					));
					die;
				}
			}
			else {
				//error_log(__FILE__.__FUNCTION__.__LINE__);
				// Mensaje datos no guardados
				echo json_encode(array(
					"response"  => "error",
					"message"   => "Ha habido un problema al enviar su declaración"
				));
				die;
			}
		}


        ////////////////////////////////////////////////////////////////


        // Formulario "Declaración responsable de consentimiento individual deportistas/staff técnico de una entidad usuaria"
        public function actionDeclaracionResponsableEntidadUsuaria() {
            require_once("config.php");

            vistaSimple("layout_declaracion_responsable_entidad_usuaria");
        }

        // Gestiona el formulario
        public function actionDeclaracionResponsableGestionaFormEntidadUsuaria() {
            require "includes/Utils.php";
            //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            require "models/declaracion_responsable_entidad_usuaria.php";

            // Recibimos los datos
            $nombre     				=   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      		FILTER_SANITIZE_STRING)));
            $dni        				=   trim(strtoupper(filter_input(INPUT_POST, 'dni',         		FILTER_SANITIZE_STRING)));
            $telefono   				=   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    		FILTER_SANITIZE_STRING)));
            $email  				    =   trim(strtoupper(filter_input(INPUT_POST, 'email',   		    FILTER_SANITIZE_STRING)));
            $domicilio  				=   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   		FILTER_SANITIZE_STRING)));
            $equipo  				    =   trim(strtoupper(filter_input(INPUT_POST, 'equipo',   		    FILTER_SANITIZE_STRING)));
            $firma      				=   $_POST["firma_tutor"];


            $nuevo      =   declaracion_responsable_entidad_usuaria::insert($nombre, $dni, $telefono, $email, $domicilio, $equipo, $firma);

            if (!empty($nuevo)) {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Generamos el contenido del email a enviar
                $asunto_email = 'Declaración responsable para los deportistas/staff técnico de una entidad usuaria';

                $contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'</p>
					<p style="font-size: 16px;">En fecha '.date("d-m-Y").'</p>
					<p style="font-size: 16px;">Mediante este documento declaro:</p>
                    <ul style="font-size: 16px;">
                        <li>Que la finalidad del acceso a la instalación es la realización de un entrenamiento o una actividad Deportiva organizada.</li>
                        <li>Que <u>todos los miembros de la entidad usuaria a la que represento</u>, incluidos los del Staff Técnico (entrenadores, ayudantes, etc.), han podido valorar y ponderar conscientemente los beneficios y efectos del entrenamiento y de la actividad, junto a los riesgos para la salud que comporta la actual situación de pandemia.</li>
                        <li>Que, de forma individual, <u>cada uno de los miembros de la entidad usuaria a la que represento</u>, incluidos los del Staff Técnico (entrenadores, ayudantes, etc.), ha sido informado por el Representante de todos los términos de esta declaración y los riesgos que conlleva el uso de la instalación.</li>
                    </ul>
                    <p style="font-size: 16px;">Manifiesto que los miembros de la entidad usuaria (incluidos los del Staff Técnico):</p>
                    <ul style="font-size: 16px;">
                        <li>No han estado en contacto con personas infectadas en los últimos 14 días.</li>
                        <li>No tienen en el momento de acceder a la instalación, ni han tenido en los últimos 14 días sintomatologías tales como tos, fiebre, alteraciones del sabor ni olfato, ni es persona perteneciente a los colectivos de riesgo.</li>
                        <li>Han sido adecuadamente informados de las medidas que deben tener en cuenta para reducir los riesgos, y saben que los responsables de las instalaciones no pueden garantizar la plena seguridad en las instalaciones en este contexto</li>
                        <li>Que han sido informados y advertidos sobre los riesgos que podrían sufrir si se contrae la enfermedad COVID-19, así como las consecuencias y posibles secuelas que podría comportar no solo para mi salud, sino también para la de los demás.</li>
                    </ul>
                    <p style="font-size: 16px;">Y de acuerdo a las manifestaciones anteriores, todos los miembros de la entidad usuaria (incluidos los del Staff Técnico):</p>
                    <ul style="font-size: 16px;">
                        <li>Conocen debidamente las directrices, indicaciones y recomendaciones de las autoridades sanitarias y de la Entidad deportiva donde desarrollan la actividad, y se comprometen a seguirlas debidamente así como a las detalladas por L’Alqueria del Basket.</li>
                        <li>Comunicarán cualquier indicación establecida por la Instalación a sus acompañantes sobre las normas y recomendaciones que deben respetar mientras se encuentren en la Instalación.</li>
                        <li>Se comprometen a comunicar cualquier síntoma compatible con COVID-19 durante el uso de la instalación.</li>
                        <li>Se comprometen a comunicar la aparición de positivos en COVID-19 de los participantes en los 14 días siguientes al uso de la instalación, sin proporcionar datos personales de los afectados, para que en la misma se puedan tomar las medidas de seguridad e higiene necesarias.</li>
                        <li>Entienden los riesgos y la posibilidad de infección por COVID-19, y son conscientes de las medidas que deben adoptar para reducir la probabilidad de contagio: distancia física, mascarilla respiratoria, lavado de manos frecuente y permanecer en casa de manera prioritaria.</li>
                        <li>Declaran, haciendo uso de los derechos garantizados por la ley, su intención de usar las instalaciones deportivas, asumiendo personal e individualmente todas las consecuencias y responsabilidades.</li>
                        <li>Eximen de responsabilidad a la entidad propietaria de la Instalación ante cualquier contagio que pudiera estar relacionado con la utilización de la misma.</li>
                    </ul>
					<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
					<h4>
                        <strong>AUTORIZACIÓN TRATAMIENTO IMÁGENES:</strong>
                    </h4>
                    <p>Dada la imposibilidad de acceso a la instalación para los acompañantes de los equipos, L’Alqueria del Basket pone a su disposición un servicio de streaming de los partidos a través de un enlace que podrán encontrar en el banner “partidos de la jornada” de nuestra web www.alqueriadelbasket.com al que podrán acceder de manera gratuita. Se le informa que las imágenes de los partidos podrán ser utilizadas en las redes sociales y medios de difusión de Valencia Basket Club, S.A.D. y/o Fundació Valencia Basquet 2000. En caso de no recabarse la autorización de todos los participantes en el encuentro, éste NO será retransmitido.</p>
                    <p>Como responsable del equipo <strong>'.$equipo.'</strong>, declaro haber recabado el consentimiento al tratamiento y uso de las imágenes <u>de todos los participantes en el encuentro</u> que figuran en la relación adjunta o de sus tutores o representantes legales y autorizo el uso de las mismas conforme a lo anteriormente descrito.</p>
					<p><img src="'.$firma.'"></p>';


                // Enviar email
                require "PHPMailer/envios_emails.php";

                $nuevocorreo = envios_emails::enviar_email_declaracion_responsable_entidad_usuaria($asunto_email, $contenido_email, $email, $nombre);

                //error_log(__FILE__.__FUNCTION__.__LINE__);

                // Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
                if (!empty($nuevocorreo)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Hemos enviado correctamente su declaración"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío fallido
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Ha habido un problema con los datos de su declaración"
                    ));
                    die;
                }
            }
            else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Mensaje datos no guardados
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "Ha habido un problema al enviar su declaración"
                ));
                die;
            }
        }


        ////////////////////////////////////////////////////////////////


        // Formulario "Declaración responsable para la asistencia a eventos deportivos de L'alqueria del basket"
        public function actionDeclaracionResponsableAlqueria() {
            require_once("config.php");

            vistaSimple("layout_declaracion_responsable_alqueria");
        }

        // Gestiona el formulario
        public function actionDeclaracionResponsableAlqueriaGestionaForm() {
            require "includes/Utils.php";
            //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            require "models/declaracion_responsable_alqueria.php";

            // Recibimos los datos
            $nombre     				=   trim(strtoupper(filter_input(INPUT_POST, 'nombre',      		FILTER_SANITIZE_STRING)));
            $dni        				=   trim(strtoupper(filter_input(INPUT_POST, 'dni',         		FILTER_SANITIZE_STRING)));
            $telefono   				=   trim(strtoupper(filter_input(INPUT_POST, 'telefono',    		FILTER_SANITIZE_STRING)));
            $domicilio  				=   trim(strtoupper(filter_input(INPUT_POST, 'domicilio',   		FILTER_SANITIZE_STRING)));
            $email  				    =   trim(strtoupper(filter_input(INPUT_POST, 'email',   		FILTER_SANITIZE_STRING)));
            $equipoPartido  		    =   trim(strtoupper(filter_input(INPUT_POST, 'equipoPartido',   FILTER_SANITIZE_STRING)));
            $pistaResponsable  		    =   trim(strtoupper(filter_input(INPUT_POST, 'pistaResponsable',   FILTER_SANITIZE_STRING)));
            $visitaInstalaciones    	=   trim(strtoupper(filter_input(INPUT_POST, 'visitaInstalaciones',   FILTER_SANITIZE_STRING)));
            $nombreEquipo           	=   trim(strtoupper(filter_input(INPUT_POST, 'nombreEquipo',   FILTER_SANITIZE_STRING)));
            $responsable            	=   trim(strtoupper(filter_input(INPUT_POST, 'responsable',   FILTER_SANITIZE_STRING)));
            $nombreResponsable          =   trim(strtoupper(filter_input(INPUT_POST, 'nombreResponsable',   FILTER_SANITIZE_STRING)));
            $arbitro          =   trim(strtoupper(filter_input(INPUT_POST, 'arbitro',   FILTER_SANITIZE_STRING)));
            $oficialMesa          =   trim(strtoupper(filter_input(INPUT_POST, 'oficialMesa',   FILTER_SANITIZE_STRING)));
            $streaming           	    =   trim(strtoupper(filter_input(INPUT_POST, 'streaming',   FILTER_SANITIZE_STRING)));
            $firma      				=   $_POST["firma_tutor"];


            if ($equipoPartido === "TRUE") {
                $equipoPartido = 1;
            }
            else {
                $equipoPartido = 0;
            }

            if ($pistaResponsable === "TRUE") {
                $pistaResponsable = 1;
            }
            else {
                $pistaResponsable = 0;
            }

            if ($visitaInstalaciones === "TRUE") {
                $visitaInstalaciones = 1;
            }
            else {
                $visitaInstalaciones = 0;
            }

            if ($responsable === "TRUE") {
                $responsable = 1;
            }
            else {
                $responsable = 0;
            }

            if ($streaming === "TRUE") {
                $streaming = 1;
            }
            else {
                $streaming = 0;
            }

            if ($arbitro === "TRUE") {
                $arbitro = 1;
            }
            else {
                $arbitro = 0;
            }

            if ($oficialMesa === "TRUE") {
                $oficialMesa = 1;
            }
            else {
                $oficialMesa = 0;
            }

            $nuevo      =  declaracion_responsable_alqueria::insert($nombre, $dni, $telefono, $email, $domicilio, $equipoPartido, $pistaResponsable, $visitaInstalaciones, $responsable, $nombreResponsable, $streaming, $arbitro, $oficialMesa, $nombreEquipo, $firma);

            if (!empty($nuevo)) {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Generamos el contenido del email a enviar
                $asunto_email = 'Declaración responsable para realizar actividades deportivas en L"alqueria del Basket';

                if (isset($equipoPartido) && ($equipoPartido == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Pertenezco al equipo: ".$nombreEquipo;
                    if (isset($responsable) && ($responsable == 1)) {
                        $mediocomunicacionmensaje = $mediocomunicacionmensaje. ", Soy el responsable del equipo";
                    }
                    if (isset($streaming) && ($streaming == 1)) {
                        $mediocomunicacionmensaje = $mediocomunicacionmensaje. " y todo mi equipo acepta las condiciones para el streaming de los partidos";
                    }
                } else if (isset($pistaResponsable) && ($pistaResponsable == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Pertenezco al alquiler de una pista y el responsable de ella se llama ".$nombreResponsable;
                } else if (isset($visitaInstalaciones) && ($visitaInstalaciones == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Mi intención es visitar las instalaciones";
                } else if (isset($arbitro) && ($arbitro == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Soy arbitro en L'alqueria del Basket";
                } else if (isset($oficialMesa) && ($oficialMesa == 1)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "<br>Soy oficial de mesa en L'alqueria del Basket";
                } else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    $mediocomunicacionmensaje = "";
                }

                $contenido_email = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'.'.$mediocomunicacionmensaje.'</p>
					<p style="font-size: 16px;">En fecha '.date("d-m-Y").'</p>
					<p style="font-size: 16px;">DECLARO RESPONSABLEMENTE</p>
					<ul style="font-size: 16px;">
						<li>Que no he padecido en los últimos 14 días síntomas compatibles con cuadro COVID-19 (fiebre, tos, vómitos, diarrea, pérdida de olfato o gusto, dolores musculares), ni se me ha diagnosticado dicha enfermedad.</li>
						<li>Que tampoco he mantenido en dicho periodo contacto estrecho con persona alguna diagnosticada de COVID-19 o que se encuentre aislada preventivamente por dicha circunstancia.</li>
						<li>Que, en todo caso me comprometo, en caso de producirse alguna de las anteriores circunstancias entre la fecha de la firma de la presente declaración y el comienzo del evento, a no acudir a la instalación.</li>
						<li>Igualmente me comprometo, en caso de comenzar a presentar alguno de los síntomas referenciados anteriormente una vez en la instalación, a comunicarlo al personal del Club para que pueda establecerse el protocolo correspondiente.</li>
						<li>Me comprometo a cumplir, durante mi estancia en la instalación, con todas las normas de seguridad e higiene que sean indicadas por la organización o que sean de obligado cumplimiento en base a la legislación vigente.</li>
						<li>En caso de asistir en el futuro a nuevos eventos o actividades organizados por L"alqueria del basket, me comprometo a cumplir igualmente con todo lo anteriormente descrito.</li>
					</ul>
					<p style="font-size: 16px;">Le recordamos que el incumplimiento o contravención de lo previsto en esta declaración responsable podrá ser notificado a la autoridad competente y podría acarrear la imposición de sanciones, según lo previsto en el DECRETO LEY 11/2020, de 24 de julio, del Consell, de régimen sancionador específico contra los incumplimientos de las disposiciones reguladoras de les medidas de prevención ante la Covid-19.</p>
					<p><img src="'.$firma.'"></p>';

                $contenido_email_persona = '
					<h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">'.$asunto_email.'</h3>
					<p style="font-size: 16px;">Sr./a '.$nombre.', mayor de edad y con DNI '.$dni.', con número de teléfono '.$telefono.' y domiciliado en '.$domicilio.'</p>
					<p style="font-size: 16px;">Ha rellenado el formulario correctamente.</p>';

                // Enviar emails
                require "PHPMailer/envios_emails.php";

                $nuevocorreo1 = envios_emails::enviar_email_declaracion_responsable_alqueria_usuario($email, $nombre, $asunto_email, $contenido_email_persona);
                $nuevocorreo2 = envios_emails::enviar_email_declaracion_responsable_alqueria_recepcion($asunto_email, $contenido_email);


                //error_log(__FILE__.__FUNCTION__.__LINE__);

                // Si se ha enviado el email enviamos mensaje de agradecimiento, sino error
                if (!empty($nuevocorreo1) && !empty($nuevocorreo2)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Hemos enviado correctamente su declaración"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío fallido
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Ha habido un problema con los datos de su declaración"
                    ));
                    die;
                }
            }
            else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // Mensaje datos no guardados
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "Ha habido un problema al enviar su declaración"
                ));
                die;
            }
        }



		/*******************************************
		*			DATOS DEL ENTRENADOR		   *
		*******************************************/


		// Vista form entrenadores
		public function actionVistaFormEntrenador(){
			require "config.php";

			vistaSimple("layoutsback/layout_back_datos_entrenadores");
		}


		// Función para sacar los datos del entrenador y pasarlos a la vista del form de entrenadores
		public function actionEntrenadorSession() {
			$usuarioEntrenador = filter_input(INPUT_POST, 'id_entrenador', FILTER_SANITIZE_NUMBER_INT);
			//error_log("hola" . var_dump($usuarioEntrenador));

			require 'models/coaches.php';

			$entrenador = coaches::findByid_coach($usuarioEntrenador);

			echo json_encode(
				array(
					"response" => "success",
					"message" => "Se ha cargado la información",
					"entrenador" => $entrenador,
				));
			die;
		}



		/*******************************************
		* 				OBSOLETO 				   *
		*******************************************/


		//  Este método está obsoleto. Dec 2018
		public function actionequiposfemeninos() {
			require "config.php";

			vistaSimple("layout_equipos_femeninos");
		}
	}
?>