<?php
	class inscripcionesController {

		/***************************
		*  PATRONATO 2020
		***************************/

		//  carga la vista del formulario de inscripciones para Patronato
		public function actionPatronato() {
			require "config.php";

			vistaSimple("layout_inscripciones_patronato_2020");
		}


		/***************************
		*  ESCUELA Y CANTERA 2020
		***************************/

		// carga la vista del formulario de inscripciones a la ESCUELA
		public function actionEscuela()	{
			require "config.php";

			vistaSimple("layout_inscripciones_escuela_2020");
		}


		// carga la vista del formulario de inscripciones a la CANTERA
		public function actionCantera()	{
			require "config.php";

			vistaSimple("layout_inscripciones_cantera_2020");
		}


		// carga la vista para actualizar las firmas de una inscripcion
		public function actionFirmarInscripcion() {
			require "config.php";

			vistaSimple("layout_inscripciones_actualiza_firmas_20_21");
		}


		// carga la vista para actualizar las imagenes de una inscripcion
		public function actionActualizarImgInscripcion() {
			require "config.php";

			vistaSimple("layout_inscripciones_actualiza_imagenes_20_21");
		}

		
		// Condiciones legales CANTERA / ESCUELA 2020. Documento 1 de 4
		public function actionPoliticaPrivacidad() {
			require_once("config.php");

			vistaSimple("layout_inscripciones_2020_politica_privacidad");
		}


		// Condiciones legales CANTERA / ESCUELA 2020. Documento 2 de 4
		public function actionCondicionesUso() {
			require_once("config.php");

			vistaSimple("layout_inscripciones_2020_condiciones_uso");
		}


		// Condiciones legales CANTERA / ESCUELA 2020. Documento 2.1 de 4
		public function actionReglamentoInterno() {
			require_once("config.php");

			vistaSimple("layout_inscripciones_2020_reglamento_interno");
		}


		// Condiciones legales CANTERA / ESCUELA 2020. Documento 3 de 4
		public function actionTratamientoImagenes()	{
			require_once("config.php");

			vistaSimple("layout_inscripciones_2020_tratamiento_imagenes");
		}


		// Condiciones legales CANTERA / ESCUELA 2020. Documento 4 de 4
		public function actionProtocoloMedico()
		{
			require_once("config.php");
			vistaSimple("layout_inscripciones_2020_protocolo_medico");
		}


		// gestiona el formulario de actualizaci??n de im??genes de ESCUELA y CANTERA JULIO 2020
		public function actionInscripcionActualizarImagenes2020() {
			require "includes/Utils.php";
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

			require "models/jugadores.php";
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     


			/****************************************************************************
			* CANTERA. Recibimos los datos 
			***************************************************************************/

			$jugador_id                 =   filter_input(INPUT_POST,                 'jugador_id',              FILTER_SANITIZE_NUMBER_INT);    
			
			$jugador_tipo_documento     =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_tipo_documento',  FILTER_SANITIZE_STRING)));    
			$jugador_dni                =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_dni',             FILTER_SANITIZE_STRING)));   
			$jugador_fecha_caducidad    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_caducidad', FILTER_SANITIZE_STRING)));      
			$jugador_nacionalidad       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nacionalidad',    FILTER_SANITIZE_STRING)));      
			
			$archivo_foto               =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_foto',         FILTER_SANITIZE_STRING))); 
			$archivo_dni_frontal        =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_frontal',  FILTER_SANITIZE_STRING)));  
			$archivo_dni_trasero        =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_trasero',  FILTER_SANITIZE_STRING)));  
			$archivo_sip                =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_sip',          FILTER_SANITIZE_STRING)));  
			$archivo_pasaporte          =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_pasaporte',    FILTER_SANITIZE_STRING)));  

			//  Recuperamos el jugador
			$jugador=jugadores::findByid_jugador($jugador_id);

			//error_log(__FILE__.__LINE__);
			//error_log(print_r($jugador,1));
			
			//IMAGENES
			if(!empty($_FILES['foto']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["foto"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_foto                  =   "foto-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["foto"]["tmp_name"], 'inscripciones/'.$blob_foto);
			}
			else
			{   
				$blob_foto   =   $jugador['foto'];
			}
			
			if(!empty($_FILES['dnifrontal']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnifrontal"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_frontal           =   "dnifrontal-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnifrontal"]["tmp_name"], 'inscripciones/'.$blob_dni_frontal);
			}
			else
			{   
				$blob_dni_frontal   =   $jugador['dni_delante'];
			}
					  
			if(!empty($_FILES['dnitrasero']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnitrasero"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_trasero           =   "dnitrasero-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnitrasero"]["tmp_name"], 'inscripciones/'.$blob_dni_trasero);
			}
			else
			{   
				$blob_dni_trasero   =   $jugador['dni_detras'];
			}
			
			if(!empty($_FILES['sip']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["sip"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_sip                   =   "sip-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["sip"]["tmp_name"], 'inscripciones/'.$blob_sip);
			}
			else
			{   
				$blob_sip   =   $jugador['sip'];
			}

			if(!empty($_FILES['pasaporte']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["pasaporte"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_pasaporte             =   "pasaporte-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["pasaporte"]["tmp_name"], 'inscripciones/'.$blob_pasaporte);
			}
			else
			{   
				$blob_pasaporte   =   $jugador['pasaporte'];
			}
			
			
			/****************************************************************************
			* UPDATE EN JUGADORES
			*****************************************************************************/

			$jugador_actualizado=jugadores::updateImagenesJugadores(
				$jugador_id,    0,  $blob_foto,     $blob_dni_frontal,  $blob_dni_trasero,  $blob_pasaporte,    $blob_sip);
		   
			
			/****************************************************************************
			* SI HAY ERROR, ENVIAMOS EMAIL A PABLO Y ANA
			*****************************************************************************/

			if(!empty($jugador_actualizado)){}
			else{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("================================================ ERROR UPDATE JUGADOR ");
				error_log(print_r($_POST,1));
				
				//  Como este caso es un poco extra??o, vamos a enviar un email informativo a Pepe cuando ocurra, para que est?? atento.
				$asunto = "Error en UPDATE JUGADOR de actualizaci??n de im??genes -  Temporada 20/21 - ID JUGADOR: ".$jugador_id;
				$body   = "<p>Este email autom??tico le informa de un error al guardar las im??genes de un jugador en el formulario de actualizaci??n 
					de im??genes 2020. Puede que haya m??s informaci??n en el log del 129</p>
					<p>Fecha del error: ".date("Y-m-d H:i")."</p>
					<p><pre>".print_r($_POST,1)."</pre></p>";

				envios_emails::enviar_email_revisi??n_inscripcion_escuela_cantera_2020(
					$asunto, $body, "pmunoz@tessq.com", "Pablo Mu??oz", 
					"ap@tessq.com", "Ana Palmero", "", "", "", "");

				echo json_encode(array(
					"response"  => "error",
					"message"   => "<h4 class='mt-0 mb-0'>".$lang["ins_form_cantera_error_update_jugador"]."</h4>"
				));
				die;
			}
			
			
			echo json_encode(array(
				"response"  =>  "success",
				"message"   =>  $lang["ins_controller_inscripcion_actualizar_imagenes"]
			));
			die;
		}


		// gestiona el formulario de actualizaci??n de firmas de ESCUELA y CANTERA temporada 20/21
		public function actionInscripcionActualizarFirmas2021()	{
			require "includes/Utils.php";
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");
			
			require "models/inscripciones_escuela_y_cantera.php";
			require "models/jugadores.php";
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     
			
			/****************************************************************************
			 * CANTERA. Recibimos los datos 
			 ***************************************************************************/

			$jugador_id        =   filter_input(INPUT_POST, 'jugador_id', FILTER_SANITIZE_NUMBER_INT);    
			
			$idinscripcion     =   filter_input(INPUT_POST, 'id_inscripcion',  FILTER_SANITIZE_NUMBER_INT);

			$firmaActualizar           =   trim(filter_input(INPUT_POST,            'actFirma',         FILTER_SANITIZE_STRING));

			$firmajugador=$_POST["firma_jugador"]; 
			$firmatutor=$_POST["firma_tutor"];

			//Guardar imagen jugador
			include("lib/classes/toJpg.php");
			$toJpg = new toJpg('img/firmas/', $firmajugador);
			$firmajugador = $toJpg->getJpg();


			//Guardar imagen tutor
			$toJpg = new toJpg('img/firmas/', $firmatutor);
			$firmatutor = $toJpg->getJpg();


			/****************************************************************************
			* UPDATE EN INSCRIPCION
			*****************************************************************************/
			$iscrip_actualizada=inscripciones_escuela_y_cantera::UpdateFirmasInscripcion($idinscripcion, $firmajugador, $firmatutor, $firmaActualizar);
		   
			/****************************************************************************
			* UPDATE EN jugador, marcamos autoriza_modificacion=0
			*****************************************************************************/
			$jugador=jugadores::updateAttribute($jugador_id, "autoriza_modificacion", 0);
		   
			/****************************************************************************
			* SI HAY ERROR, ENVIAMOS EMAIL A PABLO Y ANA
			*****************************************************************************/

			if(!empty($iscrip_actualizada)){}
			else{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("================================================ ERROR UPDATE FIRMAS INSCRIPCION ");
				error_log(print_r($_POST,1));
				
				//  Como este caso es un poco extra??o, vamos a enviar un email informativo a Pepe cuando ocurra, para que est?? atento.
				$asunto = "Error en UPDATE FIRMAS INSCRIPCION  -  Temporada 20/21 - ID JUGADOR: ".$jugador_id;
				$body   = "<p>Este email autom??tico le informa de un error al guardar las FIRMAS de un jugador en el formulario de actualizaci??n 
					de FIRMAS 2020. Puede que haya m??s informaci??n en el log del 129</p>
					<p>Fecha del error: ".date("Y-m-d H:i")."</p>
					<p><pre>".print_r($_POST,1)."</pre></p>";

			   /* envios_emails::enviar_email_revisi??n_inscripcion_escuela_cantera_2020(
					$asunto, $body, "pmunoz@tessq.com", "Pablo Mu??oz", 
					"ap@tessq.com", "Ana Palmero", "", "", "", "");*/

				echo json_encode(array(
					"response"  => "error",
					"message"   => "<h4 class='mt-0 mb-0'>".$lang["ins_form_cantera_error_update_jugador"]."</h4>"
				));
				die;
			}
			
			
			echo json_encode(array(
				"response"  =>  "success",
				"message"   =>  $lang["ins_controller_inscripcion_actualizar_firmas"]
			));
			die;
		}

		// gestiona el formulario de inscripci??n a CANTERA JULIO 2020
		public function actionInscripcionCantera2020() {
			require "includes/Utils.php";
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");
			
			require "models/jugadores.php";
			require "models/inscripciones_escuela_y_cantera.php";
			require "models/horarios.php";
			require "PHPMailer/envios_emails.php";
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     


			/****************************************************************************
			 * CANTERA. Recibimos los datos 
			 ***************************************************************************/

			$temporada                  =   "20/21";
			$jugador_id                 =   filter_input(INPUT_POST,                 'jugador_id',              FILTER_SANITIZE_NUMBER_INT);    
			$tipoinscripcion            =   trim(filter_input(INPUT_POST,            'tipoinscripcion',         FILTER_SANITIZE_STRING));    
			$jugador_tipo_documento     =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_tipo_documento',  FILTER_SANITIZE_STRING)));    
			$jugador_dni                =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_dni',             FILTER_SANITIZE_STRING)));   
			$jugador_fecha_caducidad    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_caducidad', FILTER_SANITIZE_STRING)));      
			$jugador_nacionalidad       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nacionalidad',    FILTER_SANITIZE_STRING)));      
			
			$jugador_fecha_nacimiento   =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_nacimiento',FILTER_SANITIZE_STRING)));     
			$jugador_nombre             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nombre',          FILTER_SANITIZE_STRING)));      
			$jugador_apellidos          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_apellidos',       FILTER_SANITIZE_STRING)));      
			
			$jugador_direccion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_direccion',       FILTER_SANITIZE_STRING)));      
			$jugador_numero             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_numero',          FILTER_SANITIZE_STRING)));      
			$jugador_piso               =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_piso',            FILTER_SANITIZE_STRING)));      
			$jugador_puerta             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_puerta',          FILTER_SANITIZE_STRING)));      
			$jugador_cp                 =                   filter_input(INPUT_POST, 'jugador_cp',              FILTER_SANITIZE_NUMBER_INT);    
			$jugador_poblacion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_poblacion',       FILTER_SANITIZE_STRING)));      
			$jugador_provincia          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_provincia',       FILTER_SANITIZE_STRING)));      
			
			$jugador_sexo               =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_sexo',            FILTER_SANITIZE_STRING)));      
			$jugador_pais_nacimiento    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_pais_nacimiento', FILTER_SANITIZE_STRING)));      
			$jugador_anyos_club         =              filter_input(INPUT_POST, 'jugador_anyos_club',      FILTER_SANITIZE_NUMBER_INT);    
			
			$jugador_alergias           =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_alergias',        FILTER_SANITIZE_STRING)));      
			$jugador_telefono           =   trim(filter_input(INPUT_POST, 'jugador_telefono',        FILTER_SANITIZE_NUMBER_INT));      
			$jugador_email_jugador      =   trim(strtolower(filter_input(INPUT_POST, 'jugador_email_jugador',   FILTER_SANITIZE_STRING)));      
			$jugador_equipo             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_equipo',          FILTER_SANITIZE_STRING)));      
			
			$jugador_colegio            =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_colegio',         FILTER_SANITIZE_STRING))); 
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","I",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("??","U",$jugador_colegio);
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("'"," ",$jugador_colegio);
			$jugador_colegio=str_replace("??"," ",$jugador_colegio);
			
			$jugador_curso              =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_curso',           FILTER_SANITIZE_STRING)));  
			
			$familia_num_hermanos               =   filter_input(INPUT_POST, 'familia_num_hermanos',    FILTER_SANITIZE_NUMBER_INT);    
			$familia_edades_hermanos            =   trim(substr(strtoupper(filter_input(INPUT_POST, 'familia_edades_hermanos', FILTER_SANITIZE_STRING)),1));      
		   
			$familia_monoparental               =   strtoupper(filter_input(INPUT_POST, 'familia_monoparental',    FILTER_SANITIZE_STRING));   
			if($familia_monoparental==="1"){$familia_monoparental=1;}
			else{$familia_monoparental=0;}
			$familia_monoparental_padre_madre   =   strtoupper(filter_input(INPUT_POST, 'familia_monoparental_padre_madre', FILTER_SANITIZE_STRING)); 
			
			$madre_nombre       =   trim(strtoupper(filter_input(INPUT_POST, 'madre_nombre',    FILTER_SANITIZE_STRING)));     
			$madre_apellidos    =   trim(strtoupper(filter_input(INPUT_POST, 'madre_apellidos', FILTER_SANITIZE_STRING)));     
			$madre_dni          =   trim(strtoupper(filter_input(INPUT_POST, 'madre_dni',       FILTER_SANITIZE_STRING)));     
			$madre_telefono     =   trim(strtoupper(filter_input(INPUT_POST, 'madre_telefono',  FILTER_SANITIZE_NUMBER_INT)));     
			$madre_email        =   trim(strtolower(filter_input(INPUT_POST, 'madre_email',     FILTER_SANITIZE_STRING)));     
			$madre_estudios     =                   filter_input(INPUT_POST, 'madre_estudios',  FILTER_SANITIZE_STRING);     
			
			$padre_nombre       =   trim(strtoupper(filter_input(INPUT_POST, 'padre_nombre',    FILTER_SANITIZE_STRING)));     
			$padre_apellidos    =   trim(strtoupper(filter_input(INPUT_POST, 'padre_apellidos', FILTER_SANITIZE_STRING)));     
			$padre_dni          =   trim(strtoupper(filter_input(INPUT_POST, 'padre_dni',       FILTER_SANITIZE_STRING)));     
			$padre_telefono     =   trim(strtoupper(filter_input(INPUT_POST, 'padre_telefono',  FILTER_SANITIZE_NUMBER_INT)));     
			$padre_email        =   trim(strtolower(filter_input(INPUT_POST, 'padre_email',     FILTER_SANITIZE_STRING)));     
			$padre_estudios     =                   filter_input(INPUT_POST, 'padre_estudios',  FILTER_SANITIZE_STRING);     
			
			$banco_devoluciones =   trim(strtoupper(filter_input(INPUT_POST, 'banco_devoluciones',  FILTER_SANITIZE_STRING)));     
			$banco_titular      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_titular',       FILTER_SANITIZE_STRING)));     
			$banco_dni          =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dni',           FILTER_SANITIZE_STRING)));     
			$banco_iban         =   trim(strtoupper(filter_input(INPUT_POST, 'banco_iban',          FILTER_SANITIZE_STRING)));     
			$banco_entidad      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_entidad',       FILTER_SANITIZE_STRING)));     
			$banco_oficina      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_oficina',       FILTER_SANITIZE_STRING)));     
			$banco_dc           =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dc',            FILTER_SANITIZE_STRING)));     
			$banco_cuenta       =   trim(strtoupper(filter_input(INPUT_POST, 'banco_cuenta',        FILTER_SANITIZE_STRING)));     
			 
			$banco_acepto_condiciones   =   trim(strtoupper(filter_input(INPUT_POST, 'banco_acepto_condiciones',FILTER_SANITIZE_STRING)));  
			$banco_acepto_pago          =   trim(strtoupper(filter_input(INPUT_POST, 'banco_acepto_pago',       FILTER_SANITIZE_STRING)));  
			
			$firma_jugador          =   $_POST["firma_jugador"]; 
			$firma_tutor            =   $_POST["firma_tutor"];
			$archivo_foto           =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_foto',         FILTER_SANITIZE_STRING))); 
			$archivo_dni_frontal    =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_frontal',  FILTER_SANITIZE_STRING)));  
			$archivo_dni_trasero    =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_dni_trasero',  FILTER_SANITIZE_STRING)));  
			$archivo_sip            =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_sip',          FILTER_SANITIZE_STRING)));  
			$archivo_pasaporte      =   trim(strtoupper(filter_input(INPUT_POST, 'archivo_pasaporte',    FILTER_SANITIZE_STRING)));

			//Guardar imagen tutor
			$folderPath = "img/firmas/";
			$image_parts = explode(";base64,", $firma_tutor);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$file = $folderPath . uniqid() . '.png';
			file_put_contents($file, $image_base64);

			//To jpg
			$image = imagecreatefrompng($file);
			$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
			imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
			imagealphablending($bg, TRUE);
			imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
			imagedestroy($image);
			$quality = 100; // 0 = low / smaller file, 100 = better / bigger file
			$newName = $folderPath . uniqid().'jpg';
			imagejpeg($bg, $newName, $quality);
			imagedestroy($bg);

			//Abrir imagen creada para subirla
			$file = fopen($newName, "rb");
			$firma_tutor = fread($file, 1000000);
			fclose($file);

			//Guardar imagen jugador
			$folderPath = "img/firmas/";
			$image_parts = explode(";base64,", $firma_jugador);
			$image_type_aux = explode("image/", $image_parts[0]);
			$image_type = $image_type_aux[1];
			$image_base64 = base64_decode($image_parts[1]);
			$file = $folderPath . uniqid() . '.png';
			file_put_contents($file, $image_base64);

			//To jpg
			$image = imagecreatefrompng($file);
			$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
			imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
			imagealphablending($bg, TRUE);
			imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
			imagedestroy($image);
			$quality = 100; // 0 = low / smaller file, 100 = better / bigger file
			$newName = $folderPath . uniqid().'jpg';
			imagejpeg($bg, $newName, $quality);
			imagedestroy($bg);

			//Abrir imagen creada para subirla
			$file = fopen($newName, "rb");
			$firma_jugador = fread($file, 1000000);
			fclose($file);

			//IMAGENES
			if(!empty($_FILES['foto']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["foto"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_foto                  =   "foto-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["foto"]["tmp_name"], 'inscripciones/'.$blob_foto);
			}
			else
			{   
				$blob_foto   =   "";
				$url_recibo="";
			}
			
			if(!empty($_FILES['dnifrontal']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnifrontal"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_frontal           =   "dnifrontal-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnifrontal"]["tmp_name"], 'inscripciones/'.$blob_dni_frontal);
			}
			else
			{   
				$blob_dni_frontal   =   "";
				$url_recibo         =   "";
			}
					  
			if(!empty($_FILES['dnitrasero']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnitrasero"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_trasero           =   "dnitrasero-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnitrasero"]["tmp_name"], 'inscripciones/'.$blob_dni_trasero);
			}
			else
			{   
				$blob_dni_trasero   =   "";
				$url_recibo         =   "";
			}
			
			if(!empty($_FILES['sip']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["sip"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_sip                   =   "sip-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["sip"]["tmp_name"], 'inscripciones/'.$blob_sip);
			}
			else
			{   
				$blob_sip   =   "";
				$url_recibo         =   "";
			}

			if(!empty($_FILES['pasaporte']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["pasaporte"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_pasaporte             =   "pasaporte-id-jugador-".$jugador_id."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["pasaporte"]["tmp_name"], 'inscripciones/'.$blob_pasaporte);
			}
			else
			{   
				$blob_pasaporte   =   "";
				$url_recibo         =   "";
			}
			
			
			//  Si es una familia monoparental, vaciamos los datos del otro padre 
			//  (ejemplo. temporada 19 tiene madre y madre, temporada 20 fallece el padre)
			if($familia_monoparental===1 && $familia_monoparental_padre_madre==="MADRE")   
			{   $padre_nombre=$padre_apellidos=$padre_dni=$padre_email=$padre_estudios="";  $padre_telefono=0;}
			else if($familia_monoparental===1 && $familia_monoparental_padre_madre==="PADRE")   
			{   $madre_nombre=$madre_apellidos=$madre_dni=$madre_email=$madre_estudios="";  $madre_telefono=0;}
			
  
			/****************************************************************************
			* CANTERA. Comprobacion Cuenta bancaria incorrecta
			* Cogemos el DNI, lo metemos dentro de un strtolower(trim($_POST["dni"]) 
			***************************************************************************/

			$cuentaBancaria     =   $banco_iban . $banco_entidad . $banco_oficina . $banco_dc . $banco_cuenta;
			if($cuentaBancaria==="ES1111111111111111111111")
			{}  //  Todo 1's es la cuenta bancaria TEST
			else
			{
				$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
				if(!$cuentaValidada)
				{
					echo json_encode(array(
						"response"  => "error",
						"message"   => "<h4 class='mt-0 mb-0'>".$lang["ins_controller_cuenta_incorrecta"]."</h4>"
					));
					die;
				}
			}
			
			//error_log(__FILE__.__FUNCTION__.__LINE__." ==========> VAMOS A HACER UPDATE EN JUGADORES");

			/****************************************************************************
			* CANTERA. UPDATE EN JUGADORES
			***************************************************************************/

			$jugador_actualizado=jugadores::updateJugadorEnInscripcionEscuelaCantera2020(
					$jugador_id,                0, 
					$jugador_tipo_documento,    $jugador_dni,               $jugador_fecha_caducidad,     $jugador_nacionalidad,
					$jugador_fecha_nacimiento,  $jugador_nombre,            $jugador_apellidos,             
					$jugador_direccion,         $jugador_numero,            $jugador_piso,                $jugador_puerta,    $jugador_cp,    $jugador_poblacion, $jugador_provincia, 
					$jugador_sexo,              $jugador_pais_nacimiento,   "", $jugador_anyos_club,      
					$jugador_alergias,          $jugador_telefono,          $jugador_email_jugador,  
					$jugador_colegio,           $jugador_curso,          
			
					$familia_num_hermanos,      $familia_edades_hermanos,   $familia_monoparental,
					$padre_nombre,              $padre_apellidos,           $padre_telefono,        $padre_email,       $padre_estudios,    $padre_dni,       
					$madre_nombre,              $madre_apellidos,           $madre_telefono,        $madre_email,       $madre_estudios,    $madre_dni,     

					$banco_titular, $banco_dni, $banco_iban,                $banco_entidad,         $banco_oficina,     $banco_dc,          $banco_cuenta, 

					$blob_foto,                 $blob_dni_frontal,          $blob_dni_trasero,      $blob_pasaporte,    $blob_sip,          $temporada);
		   
			if(!empty($jugador_actualizado))
			{}
			else{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("================================================ ERROR UPDATE JUGADOR ");
				error_log(print_r($_POST,1));
				
				//  Como este caso es un poco extra??o, vamos a enviar un email informativo a Pepe cuando ocurra, para que est?? atento.
				$asunto = "Error en UPDATE JUGADOR de inscripcion CANTERA - Temporada 20/21 - ID JUGADOR: ".$jugador_id;
				$body   = "<p>Este email autom??tico le informa de un error al guardar un jugador en la inscripci??n 2020 en CANTERA. 
					Puede que haya m??s informaci??n en el log del 129</p>
					<p>Fecha del error: ".date("Y-m-d H:i")."</p>
					<p><pre>".print_r($_POST,1)."</pre></p>";

				envios_emails::enviar_email_revisi??n_inscripcion_escuela_cantera_2020(
					$asunto, $body, "pmunoz@tessq.com", "Pablo Mu??oz", 
					"ap@tessq.com", "Ana Palmero", "", "", "", "");

				echo json_encode(array(
					"response"  => "error",
					"message"   => "<h4 class='mt-0 mb-0'>".$lang["ins_form_cantera_error_update_jugador"]."</h4>"
				));
				die;
			}

			/****************************************************************************
			* CANTERA. INSERT EN INSCRIPCIONES_ESCUELA_CANTERA
			***************************************************************************/

//error_log(__FILE__.__FUNCTION__.__LINE__." ==========> VAMOS A HACER INSERT EN inscripciones_escuela_y_cantera");
			$inscripcion=inscripciones_escuela_y_cantera::insertarInscripcion(
				$jugador_id, date("Y-m-d"), "20/21", "CANTERA", $firma_jugador, $firma_tutor, $jugador_equipo, "ONLINE");
		   

			/****************************************************************************
			* CANTERA. INSERT EN jugadores_pagos  07/10/2020 cantera no paga matricula asi que grabamos el 1?? pago trimestral
			***************************************************************************/
			//  Buscamos la ultima inscripcion del jugador para relacionarlo con el pago*/
			$id_inscripcion=inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador($jugador_id);

		   $jugadores_pagos=jugadores_pagos::insert(
					$jugador_id,        date("Y-m-d H:i:s"), "primer pago",    0,  175, 
					"Interno",    0,                  NULL,                               NULL,           "",  
					$id_inscripcion['id_inscripcion'],      NULL,  NULL);
			/****************************************************************************
			* CANTERA. PREPARAMOS EMAIL 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/

			//  Sacamos los horarios del equipo del jugador
			$horarios=horarios::findByid_equipo($jugador_actualizado['idequipo_alqueria']);
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log(print_r($horarios,1));
			$horarios_string="";
			foreach($horarios as $horario)
			{   
				switch($horario["dia"]){
					case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
					case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
					case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
					case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
					case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
				}
			}
			$horarios_string= substr($horarios_string, 0, -2);
			

			//  Para el PDF 
			$contenido_cabecera="<div><p>".$lang["ins_cantera_pdf_cabecera_1"]."</p>"
			. "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
			. "</div><h2>".$lang["ins_cantera_pdf_cabecera_4"]."</h2><hr>";
			
			//  Asunto del email
			$asunto_email=$lang["ins_cantera_email_asunto"];
			
			$contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3><p>"
							. "<b>".$lang["ins_cantera_email_2"].": </b>".$jugador_tipo_documento.", ".$jugador_dni.". ".$lang["ins_cantera_email_3"].": ".$jugador_fecha_caducidad."<br>";
			$contenido_email.="<b>".$lang["ins_cantera_email_4"].": </b>".$jugador_nombre." ".$jugador_apellidos."<br>";       
			$contenido_email.="<b>".$lang["ins_cantera_email_5"].": </b>".$jugador_fecha_nacimiento.", ".$jugador_pais_nacimiento."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_6"].": </b>".$jugador_direccion.", ".$jugador_numero;
			if(!empty($jugador_piso))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$jugador_piso; }
			if(!empty($jugador_puerta)) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$jugador_puerta; }
			$contenido_email.=". CP: ".$jugador_cp." (".$jugador_poblacion.", ".$jugador_provincia.")<br>";
			
			$contenido_email.="<b>".$lang["ins_cantera_email_9"].": </b>".$jugador_sexo."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_10"].": </b>".$jugador_nacionalidad."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_12"].": </b>".$jugador_anyos_club."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_13"].": </b>".$jugador_alergias."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14"].": </b>".$jugador_email_jugador."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14_b"].": </b>".$jugador_telefono."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14_c"].": </b>".(!empty($jugador_colegio)?$jugador_colegio:"-")."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14_d"].": </b>".(!empty($jugador_curso)?$jugador_curso:"-")."<br>";     
			
			$contenido_email.="<b>".$lang["ins_cantera_email_15"].": </b>".$jugador_equipo."<br>";     
			$contenido_email.="<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>";
			
			$contenido_email.="<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>";
			$contenido_email.="<b>".$lang["ins_cantera_email_17"].": </b>".$familia_num_hermanos;
			if(!empty($familia_edades_hermanos)){
				$array_edades=explode("-",$familia_edades_hermanos);
				$contenido_email.=" (";
				foreach($array_edades as $edad){    
					$contenido_email.=$edad.", "; 
				}
				
				$contenido_email= substr($contenido_email, 0, -2);
				$contenido_email.=")<br>";
			}
			$contenido_email.="<br><b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"S??":"No")."<br>";  

			if($familia_monoparental===1 && $familia_monoparental_padre_madre==="MADRE")   
			{   
				/********************** MADRE *****************/
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>";
				if($madre_nombre!=="" || $madre_apellidos!==""){$contenido_email.=$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].":";}
				else{$contenido_email.=" - ".$lang["ins_cantera_email_20"].":"; }
				if($madre_dni!==""){$contenido_email.=$madre_dni."<br>";}
				else{$contenido_email.="-<br>";}
				
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>";
				if($madre_email!==""){$contenido_email.=$madre_email.", ";}
				else{$contenido_email.="-, ";}
				if($madre_telefono!==""){$contenido_email.=$madre_telefono."<br>";}
				else{$contenido_email.="-<br>";}
				
				if($madre_estudios!==""){$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>";      }
				else{$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>-<br>";      }
			}
			else if($familia_monoparental===1 && $familia_monoparental_padre_madre==="PADRE")   
			{
				/********************** PADRE *****************/
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>";
				if($padre_nombre!=="" || $padre_apellidos!==""){$contenido_email.=$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":";}
				else{$contenido_email.=" - ".$lang["ins_cantera_email_20"].":"; }
				if($padre_dni!==""){$contenido_email.=$padre_dni."<br>";}
				else{$contenido_email.="-<br>";}
				
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>";
				if($padre_email!==""){$contenido_email.=$padre_email.", ";}
				else{$contenido_email.="-, ";}
				if($padre_telefono!==""){$contenido_email.=$padre_telefono."<br>";}
				else{$contenido_email.="-<br>";}
				
				if($padre_estudios!==""){$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      }
				else{$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>-<br>";      }
			}
			else
			{
				
				/********************** MADRE *****************/
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>";
				if($madre_nombre!=="" || $madre_apellidos!==""){$contenido_email.=$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].":";}
				else{$contenido_email.=" - ".$lang["ins_cantera_email_20"].":"; }
				if($madre_dni!==""){$contenido_email.=$madre_dni."<br>";}
				else{$contenido_email.="-<br>";}
				
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>";
				if($madre_email!==""){$contenido_email.=$madre_email.", ";}
				else{$contenido_email.="-, ";}
				if($madre_telefono!==""){$contenido_email.=$madre_telefono."<br>";}
				else{$contenido_email.="-<br>";}
				
				if($madre_estudios!==""){$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>";      }
				else{$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>-<br>";      }
				
				/********************** PADRE *****************/
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>";
				if($padre_nombre!=="" || $padre_apellidos!==""){$contenido_email.=$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":";}
				else{$contenido_email.=" - ".$lang["ins_cantera_email_20"].":"; }
				if($padre_dni!==""){$contenido_email.=$padre_dni."<br>";}
				else{$contenido_email.="-<br>";}
				
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>";
				if($padre_email!==""){$contenido_email.=$padre_email.", ";}
				else{$contenido_email.="-, ";}
				if($padre_telefono!==""){$contenido_email.=$padre_telefono."<br>";}
				else{$contenido_email.="-<br>";}
				
				if($padre_estudios!==""){$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      }
				else{$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>-<br>";      }
			}
			
			$contenido_email.="</p></div><div><h3>".$lang["domiciliacion_titulo"].":</h3>";
			$contenido_email.="<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni;
			$contenido_email.="<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
			

//  error_log(__FILE__.__FUNCTION__.__LINE__." ==========> VAMOS A PREPARAR EL PDF");
//  error_log($contenido_email);
			/****************************************************************************
			* CANTERA. PREPARAMOS PDF 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
			require_once('./lib/TCPDF/Alqueria/tcpdf_include.php');
			$datos_plantilla_PDF['contenido_pdf']   =   $contenido_email;
			$cifrado_md5        =   substr(md5($inscripcion['id_inscripcion']), 0, 7);
			$datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
			include "./lib/TCPDF/Alqueria/tramites/plantilla_vacia_inscripciones.php";
			
			$email_enviado = envios_emails::enviar_email_nueva_inscripcion_cantera_2020(
				$asunto_email,  $contenido_cabecera.$contenido_email,   $jugador_email_jugador,     $jugador_nombre, 
				$madre_email,   $madre_nombre,                          $padre_email,               $padre_nombre, 
				"pdf/".$datos_plantilla_PDF['ruta_archivo'],            
				$datos_plantilla_PDF['ruta_archivo']);
		   
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log("inscripciones/alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf");
			
			echo json_encode(array(
				"response"  =>  "success",
				"message"   =>  $lang["ins_controller_inscripcion_cantera_correcta"],
				"ruta_pdf"  =>  "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf"
			));
			die;
		}


		/** actionInscripcionCantera2020() muestra la confirmaci??n de la inscripci??n a CANTERA MAYO 2020 */
		public function actionInscripcionCantera2020OK()
		{
			require "config.php";
			require "includes/Utils.php";
			
			//  Preparamos datos para la vista
			if(isset($_GET["ruta_pdf"])){
				$datos['ruta_pdf']  =   $_GET["ruta_pdf"];
			}
			else{
				$datos['ruta_pdf']  =   "";
			}
			vistaSinvista(array('datos' => $datos), "layout_inscripciones_cantera_2020_ok");
		}


		/** actionInscripcionCantera2020() gestiona el formulario de inscripci??n a ESCUELA (masculino y femenino) MAYO 2020 */
		public function actionInscripcionEscuela2020()
		{
			require "includes/Utils.php";
			require "models/jugadores.php";
			require "models/jugadores_pagos.php";
			require "models/horarios.php";
			require "models/inscripciones_escuela_y_cantera.php";
			require "PHPMailer/envios_emails.php";
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     
			
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");
//error_log(print_r($_POST,1));   
//error_log(print_r($_FILES,1));  

//error_log(__FILE__.__FUNCTION__.__LINE__);
			/****************************************************************************
			* Recibimos los datos de ESCUELA
			***************************************************************************/
			//  require "models/mailers.php";
			$temporada          =   "20/21";
			$id_jugador         =   filter_input(INPUT_POST, 'jugador_id',   FILTER_SANITIZE_NUMBER_INT);
			$idequipo           =   filter_input(INPUT_POST, 'id_equipo',    FILTER_SANITIZE_NUMBER_INT); 
			$nombreequipo       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_equipo',   FILTER_SANITIZE_STRING))); 
			$seccion           	=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_seccion',  FILTER_SANITIZE_STRING))); 

			//  Datos del jugador
			$tipo_documento		=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_tipo_documento',  FILTER_SANITIZE_STRING)));
			$dni_jugador        =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_dni',             FILTER_SANITIZE_STRING)));
			$fecha_cad_dni      =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_caducidad', FILTER_SANITIZE_STRING))); 
			$nacionalidad		=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nacionalidad',    FILTER_SANITIZE_STRING)));

			$fecha_nacimiento   =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_nacimiento',FILTER_SANITIZE_STRING)));
			$nombre             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nombre',          FILTER_SANITIZE_STRING))); 
			$apellidos          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_apellidos',       FILTER_SANITIZE_STRING))); 

			$jugador_telefono   =   trim(strtolower(filter_input(INPUT_POST, 'jugador_telefono',        FILTER_SANITIZE_STRING)));       
			$jugador_colegio    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_colegio',        FILTER_SANITIZE_STRING)));   
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","I",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("??","U",$jugador_colegio);
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("'"," ",$jugador_colegio);
			$jugador_colegio=str_replace("??"," ",$jugador_colegio);
			
			$jugador_curso      =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_curso',           FILTER_SANITIZE_STRING)));

			$direccion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_direccion',       FILTER_SANITIZE_STRING)));      
			$numero             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_numero',          FILTER_SANITIZE_STRING)));      
			$piso               =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_piso',            FILTER_SANITIZE_STRING)));      
			$puerta             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_puerta',          FILTER_SANITIZE_STRING)));      
			$codigo_postal      =   filter_input(INPUT_POST, 'jugador_cp',              FILTER_SANITIZE_NUMBER_INT);    
			$poblacion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_poblacion',       FILTER_SANITIZE_STRING)));      
			$provincia          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_provincia',       FILTER_SANITIZE_STRING)));  

			$sexo       		=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_sexo',             FILTER_SANITIZE_STRING)));
			$pais_nacimiento	=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_pais_nacimiento',  FILTER_SANITIZE_STRING)));  
			//$talla_camiseta		=   trim(strtoupper(filter_input(INPUT_POST, 'jugador_talla_camiseta',   FILTER_SANITIZE_STRING))); 
			$en_el_club 		=              filter_input(INPUT_POST,      'jugador_anyos_club',       FILTER_SANITIZE_NUMBER_INT); 
			if(!empty($en_el_club)){}else{$en_el_club=0;}
			$alergias           =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_alergias',         FILTER_SANITIZE_STRING))); 
			$email              =              trim(filter_input(INPUT_POST, 'jugador_email_jugador',    FILTER_SANITIZE_STRING));

			$num_hermanos                       =   filter_input(INPUT_POST,                    'familia_num_hermanos',             FILTER_SANITIZE_NUMBER_INT); 
			$edades                             =   substr(strtoupper(filter_input(INPUT_POST,  'familia_edades_hermanos',          FILTER_SANITIZE_STRING)),1);  
			$familia_monoparental               =   strtoupper(filter_input(INPUT_POST, 'familia_monoparental',    FILTER_SANITIZE_STRING));   
			if($familia_monoparental==="1"){$familia_monoparental=1;}
			else{$familia_monoparental=0;}
			$familia_monoparental_padre_madre   =   strtoupper(filter_input(INPUT_POST,         'familia_monoparental_padre_madre', FILTER_SANITIZE_STRING)); 

			$nombre_padre       =   trim(strtoupper(filter_input(INPUT_POST, 'padre_nombre',    FILTER_SANITIZE_STRING)));     
			$apellidos_padre    =   trim(strtoupper(filter_input(INPUT_POST, 'padre_apellidos', FILTER_SANITIZE_STRING)));     
			$dni_padre          =   trim(strtoupper(filter_input(INPUT_POST, 'padre_dni',       FILTER_SANITIZE_STRING)));     
			$telefono_padre     =   trim(strtoupper(filter_input(INPUT_POST, 'padre_telefono',  FILTER_SANITIZE_STRING)));     
			$email_padre        =   trim(strtoupper(filter_input(INPUT_POST, 'padre_email',     FILTER_SANITIZE_STRING)));     
			$estudios_padre     =   trim(strtoupper(filter_input(INPUT_POST, 'padre_estudios',  FILTER_SANITIZE_STRING)));   

			$nombre_madre       =   trim(strtoupper(filter_input(INPUT_POST, 'madre_nombre',    FILTER_SANITIZE_STRING)));     
			$apellidos_madre    =   trim(strtoupper(filter_input(INPUT_POST, 'madre_apellidos', FILTER_SANITIZE_STRING)));     
			$dni_madre          =   trim(strtoupper(filter_input(INPUT_POST, 'madre_dni',       FILTER_SANITIZE_STRING)));     
			$telefono_madre     =   trim(strtoupper(filter_input(INPUT_POST, 'madre_telefono',  FILTER_SANITIZE_STRING)));     
			$email_madre        =   trim(strtoupper(filter_input(INPUT_POST, 'madre_email',     FILTER_SANITIZE_STRING)));     
			$estudios_madre     =   trim(strtoupper(filter_input(INPUT_POST, 'madre_estudios',  FILTER_SANITIZE_STRING)));    

			//  DOMICILIACION
			$banco_devoluciones =   trim(strtoupper(filter_input(INPUT_POST, 'banco_devoluciones',  FILTER_SANITIZE_STRING)));     
			$banco_titular      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_titular',       FILTER_SANITIZE_STRING)));     
			$banco_dni          =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dni',           FILTER_SANITIZE_STRING)));     
			$banco_iban         =   trim(strtoupper(filter_input(INPUT_POST, 'banco_iban',          FILTER_SANITIZE_STRING)));     
			$banco_entidad      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_entidad',       FILTER_SANITIZE_STRING)));     
			$banco_oficina      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_oficina',       FILTER_SANITIZE_STRING)));     
			$banco_dc           =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dc',            FILTER_SANITIZE_STRING)));     
			$banco_cuenta       =   trim(strtoupper(filter_input(INPUT_POST, 'banco_cuenta',        FILTER_SANITIZE_STRING)));     
			$banco_acepto_condiciones   =   strtoupper(filter_input(INPUT_POST, 'banco_acepto_condiciones',FILTER_SANITIZE_STRING));  
			$banco_acepto_pago          =   strtoupper(filter_input(INPUT_POST, 'banco_acepto_pago',       FILTER_SANITIZE_STRING));  
			$metodopago      =   strtoupper(filter_input(INPUT_POST, 'metodopago',      FILTER_SANITIZE_STRING)); 
			
			//  FIRMAS
			$firma_jugador          =   $_POST["firma_jugador"]; 
			$firma_tutor            =   $_POST["firma_tutor"];

			//  IMAGENES
			if(!empty($_FILES['foto']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["foto"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_foto                  =   "foto-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["foto"]["tmp_name"], 'inscripciones/'.$blob_foto);
			}
			else
			{   
				$blob_foto   =   "";
				$url_recibo="";
			}
			
			if(!empty($_FILES['dnifrontal']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnifrontal"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_frontal           =   "dnifrontal-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnifrontal"]["tmp_name"], 'inscripciones/'.$blob_dni_frontal);
			}
			else
			{   
				$blob_dni_frontal   =   "";
				$url_recibo         =   "";
			}
					  
			if(!empty($_FILES['dnitrasero']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnitrasero"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_trasero           =   "dnitrasero-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnitrasero"]["tmp_name"], 'inscripciones/'.$blob_dni_trasero);
			}
			else
			{   
				$blob_dni_trasero   =   "";
				$url_recibo         =   "";
			}
			
			if(!empty($_FILES['sip']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["sip"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_sip                   =   "sip-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["sip"]["tmp_name"], 'inscripciones/'.$blob_sip);
			}
			else
			{   
				$blob_sip   =   "";
				$url_recibo         =   "";
			}

			if(!empty($_FILES['pasaporte']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["pasaporte"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_pasaporte             =   "pasaporte-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["pasaporte"]["tmp_name"], 'inscripciones/'.$blob_pasaporte);
			}
			else
			{   
				$blob_pasaporte   =   "";
				$url_recibo         =   "";
			}
			
			if(!empty($_FILES['recibo']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["recibo"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$url_recibo                 =   "recibo-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["recibo"]["tmp_name"], 'inscripciones/'.$url_recibo);
				$blob_recibo="";
			}
			else
			{   
				$blob_pasaporte =   "";
				$blob_recibo    =   "";
				$url_recibo     =   "";
			}
			
//             error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log($familia_monoparental);           
//    error_log($familia_monoparental_padre_madre);
//    error_log(gettype($familia_monoparental));           
//    error_log(gettype($familia_monoparental_padre_madre));
//            error_log($telefono_padre);
//            error_log($telefono_madre);
			//  Si es una familia monoparental, vaciamos los datos del otro padre 
			//  (ejemplo. temporada 19 tiene madre y madre, temporada 20 fallece el padre)
			
			if($familia_monoparental && $familia_monoparental_padre_madre=="MADRE")   
			{  
			 //   error_log(__FILE__.__FUNCTION__.__LINE__);
				$nombre_padre=$apellidos_padre=$dni_padre=$email_padre=$estudios_padre="";$telefono_padre=0; 
			}
			else if($familia_monoparental && $familia_monoparental_padre_madre=="PADRE")   
			{  
				$nombre_madre=$apellidos_madre=$dni_madre=$email_madre=$estudios_madre=""; $telefono_madre=0; 
			  //  error_log(__FILE__.__FUNCTION__.__LINE__);
			}
			else
			{
				if(!empty($telefono_padre)){}else{$telefono_padre=0; }
				if(!empty($telefono_madre)){}   else{$telefono_madre=0; }
					 
				
			}
			
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log($telefono_padre);
//            error_log($telefono_madre);
			
//error_log(__FILE__.__FUNCTION__.__LINE__);
			/****************************************************************************
			* Comprobacion Cuenta bancaria incorrecta
			* Cogemos el DNI, lo metemos dentro de un strtolower(trim($_POST["dni"]) 
			***************************************************************************/
			$cuentaBancaria     =   $banco_iban . $banco_entidad . $banco_oficina . $banco_dc . $banco_cuenta;
//error_log(__FILE__.__FUNCTION__.__LINE__.":".$cuentaBancaria);
			if($cuentaBancaria==="ES1111111111111111111111")
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
			}  //  Todo 1's es la cuenta bancaria TEST
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
				if(!$cuentaValidada)
				{
					echo json_encode(array(
						"response"  => "error",
						"message"   => $lang["ins_controller_cuenta_incorrecta"]
					));
					die;
				}
			}
//error_log(__FILE__.__FUNCTION__.__LINE__);
			
			/****************************************************************************
			* UPDATE EN JUGADORES ESCUELA
			* Es independiente al tipo de pago que elijan para la reserva
			***************************************************************************/	
			try{
//error_log(__FILE__.__FUNCTION__.__LINE__." ==> ANTES updateJugadorEnInscripcionEscuelaCantera2020");
				$actualizajugador = jugadores::updateJugadorEnInscripcionEscuelaCantera2020(
					$id_jugador,        0,
					$tipo_documento,    $dni_jugador,       $fecha_cad_dni,     $nacionalidad,
					$fecha_nacimiento,  $nombre,            $apellidos,             
					$direccion,         $numero,            $piso,              $puerta,        $codigo_postal,  $poblacion,   $provincia, 
					$sexo,              $pais_nacimiento,   "",    $en_el_club,    $alergias,     $jugador_telefono,     $email,  
					$jugador_colegio,   $jugador_curso,
					$num_hermanos,      $edades,            $familia_monoparental,
					$nombre_padre,      $apellidos_padre,   $telefono_padre,    $email_padre,   $estudios_padre,    $dni_padre,       
					$nombre_madre,      $apellidos_madre,   $telefono_madre,    $email_madre,   $estudios_madre,    $dni_madre,     

					$banco_titular,     $banco_dni, $banco_iban,    $banco_entidad, $banco_oficina,     $banco_dc,        $banco_cuenta, 

					$blob_foto,         $blob_dni_frontal,  $blob_dni_trasero,  $blob_pasaporte,     $blob_sip,   $temporada);      
//error_log(__FILE__.__FUNCTION__.__LINE__);
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log(print_r($_POST,1));
				error_log(print_r($_FILES,1));
				error_log(print_r($e,1));
				
				envios_emails::enviar_email_generico(
					"ERROR EN INSCRIPCIONES ALQUERIA 2020", 
					"Ha habido un error en el updateJugadorEnInscripcionEscuelaCantera2020. Datos: ".print_r($_POST,1).print_r($_FILES,1).print_r($e,1),
					"pmunoz@tessq.com", "Pablo", 
					"alqueria@alqberiadelbasket.com", "TESSQ BOT", "", "", "ap@tessq.com", "Ana","","");
				
				echo json_encode(array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error al guardar los cambios en la ficha del jugador. "
						. "Por favor, contacte con nosotros para revisar la incidencia."
				));
				die;
			}
				
			
//error_log(__FILE__.__FUNCTION__.__LINE__." ==> ANTES de inscripciones_escuela_y_cantera::insertarInscripcion");
			/****************************************************************************
			* INSERT EN INSCRIPCIONES_ESCUELA_CANTERA
			***************************************************************************/
			$inscripcion=inscripciones_escuela_y_cantera::insertarInscripcion(
				$id_jugador, date("Y-m-d"), "20/21", "ESCUELA", $firma_jugador, $firma_tutor, $nombreequipo,"ONLINE");    //, "RenCant_2021", $pagado, "ONLINE");
			

			/**************************************************************************
			* INSERT EN JUGADORES_PAGOS EL PAGO DE LA RESERVA DE 50 EUROS
			***************************************************************************/
			$ultimo_jugadores_pagos=jugadores_pagos::findLast();

			//  Calculamos n??mero de pedido o ponemos uno por defecto
			if(!empty($ultimo_jugadores_pagos))
			{   $numeropedido=$ultimo_jugadores_pagos['id']+1;}
			else
			{   $numeropedido=1;}
	 
			// Rellenar con ceros al la izq para que tenga los 4 primeros digitos numericos
			// Despues se concatena una cadena
			$numeropedido = str_pad($numeropedido, 4, "0", STR_PAD_LEFT);
			$numeropedido = $numeropedido . "Esc2021";

//error_log(__FILE__.__FUNCTION__.__LINE__." numeropedido vale: ".$numeropedido);     

			//  Buscamos la ultima inscripcion del jugador para relacionarlo con el pago*/
//error_log(__FILE__.__FUNCTION__.__LINE__." ==> ANTES de inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador");
			$id_inscripcion=inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador($id_jugador);


//error_log(__FILE__.__FUNCTION__.__LINE__." METODO PAGO: ".$metodopago);
//error_log(__FILE__.__FUNCTION__.__LINE__." url_recibo: ".$url_recibo);
			if($metodopago==="TARJETA")
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "Reserva Matr??cula Temp. 20/21",    $numeropedido,  50, 
					"TPV",          0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               $url_recibo);
			}
			elseif($metodopago==="RECEPCION")  //SE GRABA EL PAGO Y SE MARCA COMO NO PAGADO
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "Reserva Matr??cula Temp. 20/21",    $numeropedido,  50, 
					"RECEPCION",    0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               $url_recibo);
			}
			elseif($metodopago==="TRANSFERENCIA")
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,        date("Y-m-d H:i:s"),"Reserva Matr??cula Temp. 20/21",    $numeropedido,  50, 
					"TRANSFERENCIA",    1,                  NULL,                               NULL,           "",  
					$id_inscripcion['id_inscripcion'],      $blob_recibo,                       $url_recibo);
			}


			// A fecha 07/10/2020 vamos a grabar el pago dela matricula porque el resto de jugadores ya tienen grabado ese pago

			$jugadores_pagos_matricula=jugadores_pagos::insert(
					$id_jugador,        date("Y-m-d H:i:s"), "Matricula",    $numeropedido,  125, 
					"Interno",    0,                  NULL,                               NULL,           "",  
					$id_inscripcion['id_inscripcion'],      NULL,  NULL);

			/****************************************************************************
			* ESCUELA. PREPARAMOS EMAIL 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
			//  Sacamos los horarios del equipo del jugador
			$horarios=horarios::findByid_equipo($actualizajugador['idequipo_alqueria']);
			$horarios_string="";
			foreach($horarios as $horario)
			{   
				switch($horario["dia"]){
					case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;     }
					case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;    }
					case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break; }
					case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;    }
					case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;   }
				}
			}
			$horarios_string= substr($horarios_string, 0, -2);
			
			//  Para el PDF 
			$contenido_cabecera="<div><p>".$lang["ins_escuela_pdf_cabecera_1"]."</p>"
			. "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
			. "</div><h2>".$lang["ins_escuela_pdf_cabecera_1"]."</h2><hr>";
			
			//  Asunto del email
			$asunto_email=$lang["ins_escuela_email_asunto"];
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($asunto_email);

				   
			$contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3><p>"
							. "<b>".$lang["ins_cantera_email_2"].": </b>".$tipo_documento.", ".$dni_jugador.". ".$lang["ins_cantera_email_3"].": ".$fecha_cad_dni."<br>";
			$contenido_email.="<b>".$lang["ins_cantera_email_4"].": </b>".$nombre." ".$apellidos."<br>";       
			$contenido_email.="<b>".$lang["ins_cantera_email_5"].": </b>".$fecha_nacimiento.", ".$pais_nacimiento."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_6"].": </b>".$direccion.", ".$numero;
			if(!empty($piso))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$piso; }
			if(!empty($puerta)) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$puerta; }
			$contenido_email.=". CP: ".$codigo_postal." (".$poblacion.", ".$provincia.")<br>";
			
			$contenido_email.="<b>".$lang["ins_cantera_email_9"].": </b>".$sexo."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_10"].": </b>".$nacionalidad."<br>";     
			//$contenido_email.="<b>".$lang["ins_cantera_email_11"].": </b>".$talla_camiseta."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_12"].": </b>".$en_el_club."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_13"].": </b>".$alergias."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14"].": </b>".$email."<br>";  
			$contenido_email.="<b>".$lang["ins_form_telefono_jugador"].": </b>".$jugador_telefono."<br>"; 
			$contenido_email.="<b>".$lang["ins_form_colegio"]." </b>".$jugador_colegio."<br>";  
			$contenido_email.="<b>".$lang["ins_form_curso"]." </b>".$jugador_curso."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_15"].": </b>".$nombreequipo."<br>";     
			$contenido_email.="<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>";
			
			$contenido_email.="<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>";
			$contenido_email.="<b>".$lang["ins_cantera_email_17"].": </b>".$num_hermanos;
			if(!empty($num_hermanos)){
				$array_edades=explode("-",$edades);
				$contenido_email.=" (";
				foreach($array_edades as $edad){    
					$contenido_email.=$edad.", "; 
				}
				
				$contenido_email= substr($contenido_email, 0, -2);
				$contenido_email.=")<br>";
			}
			$contenido_email.="<br><b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"S??, (".$familia_monoparental_padre_madre.")":"No")."<br>";  
//error_log($familia_monoparental);
//error_log($familia_monoparental_padre_madre);

			if($familia_monoparental===1  && $familia_monoparental_padre_madre==="MADRE")   
			{   
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$nombre_madre." ".$apellidos_madre." ".$lang["ins_cantera_email_20"].": ".$dni_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_madre.", ".$telefono_madre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_madre."<br>";    
			}
			else if($familia_monoparental===1 && $familia_monoparental_padre_madre==="PADRE")   
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$nombre_padre." ".$apellidos_padre." ".$lang["ins_cantera_email_20"].":".$dni_padre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_padre.", ".$telefono_padre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_padre."<br>";      
			}
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$nombre_madre." ".$apellidos_madre." ".$lang["ins_cantera_email_20"].":".$dni_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_madre.", ".$telefono_madre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$nombre_padre." ".$apellidos_padre." ".$lang["ins_cantera_email_20"].":".$dni_padre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_padre.", ".$telefono_padre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_padre."<br>";      
			}
			
			$contenido_email.="</p></div><div><h3>".$lang["domiciliacion_titulo"].":</h3>";
			$contenido_email.="<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni;
			$contenido_email.="<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
			$contenido_email.="<br><p><b>".$lang["ins_escuela_email_metodopago"].":</b> ".$metodopago."</p>";


//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($contenido_email);
			/****************************************************************************
			* escuela. PREPARAMOS PDF 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
			require_once('./lib/TCPDF/Alqueria/tcpdf_include.php');
			$datos_plantilla_PDF['contenido_pdf']   =   $contenido_email;
			$cifrado_md5        =   substr(md5($inscripcion['id_inscripcion']), 0, 7);
			$datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
			include "./lib/TCPDF/Alqueria/tramites/plantilla_vacia_inscripciones.php";

			$email_enviado=envios_emails::enviar_email_nueva_inscripcion_cantera_2020(
								$asunto_email,  $contenido_cabecera.$contenido_email, $email, $nombre." ".$apellidos, 
								$email_padre, $nombre_padre, $email_madre, $nombre_madre, 
								"pdf/".$datos_plantilla_PDF['ruta_archivo'],$datos_plantilla_PDF['ruta_archivo']);
			
			/***********************************************
			 * Por ultimo, decidir si hay URL de TPV o no 
			 **********************************************/

			if($metodopago==="TARJETA")
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				//  PREPARO URL PARA TPV
				if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
				{   $url='https://servicios.alqueriadelbasket.com/';    }
				else
				{   $url='http://localhost/serviciosalqueria/';     }
				$url='https://servicios.alqueriadelbasket.com/'; 
				 
//error_log($url.'tpv_renov_inscripciones/tpv.php?pedido='.$numeropedido.'&titular='.$banco_titular.'&lang='.$_SESSION['idioma']);
				echo json_encode(
					array(
						"response"=>"success",
						"message"=>"La inscripci??n se ha insertado correctamente.",
						"url"=>$url.'tpv_renov_inscripciones/tpv.php?pedido='.$numeropedido.'&titular='.$banco_titular.'&lang='.$_SESSION['idioma']
				));
				die;
			}
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log("alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf");
				echo json_encode(array(
					"response"  =>  "success",
					"message"   =>  $lang["ins_controller_inscripcion_cantera_correcta"],
					"ruta_pdf"  =>  "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf"
				));
				die;
			}
		}
		
		/** actionInscripcionCantera2020() muestra la confirmaci??n de la inscripci??n a CANTERA MAYO 2020 */
		public function actionInscripcionEscuela2020OKRecepcionYTransferencia()
		{
			require "config.php";
			require "includes/Utils.php";
			
			//  Preparamos datos para la vista
			if(isset($_GET["ruta_pdf"])){
				$datos['ruta_pdf']  =   $_GET["ruta_pdf"];
			}
			else{
				$datos['ruta_pdf']  =   "";
			}
			vistaSinvista(array('datos' => $datos), "layout_inscripciones_escuela_2020_ok_recepcionytransferencia");
		} 
		
		/** InscripcionEscuela2020PagoTPVOK() muestra la confirmaci??n del pago online de la reserva de 50 por la inscripcion a Escuela 2020 */
		public function actionInscripcionEscuela2020PagoTPVOK()
		{
			require "config.php";
			include 'tpv_renov_inscripciones/apiRedsys.php'; 
			require "models/inscripciones_escuela_y_cantera.php";
			require "models/jugadores_pagos.php";
			require "models/jugadores.php";
			
			// Se crea Objeto
			$miObj = new RedsysAPI;
error_log("entra en el InscripcionEscuela2020PagoTPVOK");
			// Recibimos numpedido
			$version            =   $_GET["Ds_SignatureVersion"];
			$datos_respuesta    =   $_GET["Ds_MerchantParameters"];
			$signatureRecibida  =   $_GET["Ds_Signature"];

			$decodec            =   $miObj->decodeMerchantParameters($datos_respuesta);
			//$kc                 =   'sq7HjrUOBfKmC576ILgskD5srU870gJ7';     //  Clave para el entorno de pruebas
			$kc             =   '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';       //  Clave para el entorno de producci??n, recuperada de CANALES
			$firma              =   $miObj->createMerchantSignatureNotif($kc,$datos_respuesta);
			$Ds_Order           =   $miObj->getParameter("Ds_Order");
			
			//  Recuperamos el jugador a partir del pedido
			$jugadores_pagos    =   jugadores_pagos::findBynumero_pedido($Ds_Order);
			$ultima_inscripcion =   inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador($jugadores_pagos['id_jugador']);
			$cifrado_md5        =   substr(md5($ultima_inscripcion['id_inscripcion']), 0, 7); 
	
			//  Preparamos datos para la vista
			$jugador            =   jugadores::findByid_jugador($ultima_inscripcion["id_jugador"]);  
			
			$datos['link_pdf']  =   "inscripciones/alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
			vistaSinvista(array('datos' => $datos), "layout_inscripciones_escuela_2020_pago_tpv_ok");
		}
		
		/** InscripcionEscuela2020PagoTPVOK() muestra el error del pago online en la reserva de 50 por la inscripcion a Escuela 2020 */
		public function actionInscripcionEscuela2020PagoTPVKO()
		{
			require "config.php";
			include 'tpv_renov_inscripciones/apiRedsys.php';
			require "models/inscripciones_escuela_y_cantera.php";
			require "models/jugadores_pagos.php";
			require "models/jugadores.php";
			
			// Se crea Objeto
			$miObj = new RedsysAPI;
		
			// Recibimos numpedido
			if(!empty($_GET["Ds_SignatureVersion"]))    {   $version           =   $_GET["Ds_SignatureVersion"];}   else{$version="";}
			if(!empty($_GET["Ds_MerchantParameters"]))  {   $datos_respuesta   =   $_GET["Ds_MerchantParameters"];} else{$datos_respuesta="";}
			if(!empty($_GET["Ds_Signature"]))           {   $signatureRecibida =   $_GET["Ds_Signature"];}          else{$signatureRecibida  ="";}
			
			$decodec            =   $miObj->decodeMerchantParameters($datos_respuesta);
			//$kc                 =   'sq7HjrUOBfKmC576ILgskD5srU870gJ7';         //  Clave para el entorno de pruebas
			  $kc             =   '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';         //  Clave para el entorno de producci??n, recuperada de CANALES
			$firma              =   $miObj->createMerchantSignatureNotif($kc,$datos_respuesta);
			$Ds_Order           =   $miObj->getParameter("Ds_Order");
			$Ds_Response        =   $miObj->getParameter("Ds_Response");
			
			//echo "<pre>".print_r($miObj,1)."</pre>";
			//  Recuperamos el jugador a partir del pedido
			$jugadores_pagos    =   jugadores_pagos::findBynumero_pedido($Ds_Order);
			$ultima_inscripcion =   inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador($jugadores_pagos['id_jugador']);
			
			//  Preparamos datos para la vista
			$datos['Ds_Order']          =   $Ds_Order;
			$datos['Ds_Response_texto'] =   "(".$Ds_Response.") ".self::getDescripcion_Ds_Response($Ds_Response); // 101 para ver ejemplo 
			$datos['jugador']           =   jugadores::findByid_jugador($ultima_inscripcion["id_jugador"]);
			vistaSinvista(array('datos' => $datos), "layout_inscripciones_escuela_2020_pago_tpv_ko");
		}
	
		/**  prepara_contenido_pdf_y_email  devuelve el contenido para el PDF de confirmaci??n y para el env??o del email */
		private static function inscripcion_escuela_cantera_prepara_contenido_pdf_y_email($jugador,$horarios_string, $escuela_cantera_patronato)
		{
			$contenido_pdf  =   "<div><p>".$lang["ins_cantera_pdf_cabecera_1"]."</p>"
								.    "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
								."</div><h2>".$lang["ins_cantera_pdf_cabecera_4"]."</h2><hr>";
			$contenido_email=   "";
			
			//  Para el PDF 
			$contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3>
								   <p><b>".$lang["ins_cantera_email_2"].": </b>".$jugador["tipo_documento"].", ".$jugador_dni.". ".$lang["ins_cantera_email_3"].": ".$jugador["fecha_cad_dni"]."<br>"
									."<b>".$lang["ins_cantera_email_4"].": </b>".$jugador["nombre"]." ".$jugador["apellidos"]."<br>"    
									."<b>".$lang["ins_cantera_email_5"].": </b>".$jugador["fecha_nacimiento"].", ".$jugador["pais_nacimiento"]."<br>"    
									."<b>".$lang["ins_cantera_email_6"].": </b>".$jugador["direccion"].", ".$jugador["numero"];
			
			if(!empty($jugador["piso"]))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$jugador["piso"];      }
			if(!empty($jugador["puerta"])) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$jugador["puerta"];    }
			
			$contenido_email.=". CP: ".$jugador["codigo_postal"]." (".$jugador["poblacion"].", ".$jugador["provincia"].")<br>"
				."<b>".$lang["ins_cantera_email_9"].": </b>".$jugador["sexo"]."<br>"  
				."<b>".$lang["ins_cantera_email_10"].": </b>".$jugador["nacionalidad"]."<br>"     
				."<b>".$lang["ins_cantera_email_11"].": </b>".$jugador["talla_camiseta"]."<br>"     
				."<b>".$lang["ins_cantera_email_12"].": </b>".$jugador["en_el_club"]."<br>"     
				."<b>".$lang["ins_cantera_email_13"].": </b>".$jugador["alergias"]."<br>"     
				."<b>".$lang["ins_cantera_email_14"].": </b>".$jugador["email"]."<br>"     
				."<b>".$lang["ins_cantera_email_15"].": </b>".$jugador_equipo."<br>"     
				."<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>"
				."<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>"
				."<b>".$lang["ins_cantera_email_17"].":</b>".$familia_num_hermanos;
			
			if(!empty($familia_edades_hermanos))
			{
				$array_edades=explode("-",$familia_edades_hermanos);
				$contenido_email.=" (";
				foreach($array_edades as $edad){    $contenido_email.=$edad.", "; }
				$contenido_email.=substr($contenido_email, 0, -2).")<br>";
			}
			$contenido_email.="<b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"S?? ,(".$familia_monoparental_padre_madre.")":"No")."<br>";
			if($familia_monoparental && $familia_monoparental_padre_madre="MADRE")   
			{   
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].": ".$madre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>";
			}
			else if($familia_monoparental && $familia_monoparental_padre_madre="PADRE")   
			{
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"
				."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
			}
			else
			{
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].":".$madre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>"
				."<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
			}

			$contenido_email.="</p></div><div><h3>".$lang["ins_cantera_email_titulo_cuenta"].":</h3>"
				."<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni
				."<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
			
			$array=array();
			$array["contenido_email"]   = $contenido_email;
			$array["contenido_pdf"]     = $contenido_pdf;
			return $array;
		}
		
		/**  prepara_contenido_pdf_y_email  devuelve el contenido para el PDF de confirmaci??n y para el env??o del email */
		private static function inscripcion_cantera_prepara_contenido_pdf_y_email($jugador,$horarios_string, $escuela_cantera_patronato)
		{
			$contenido_pdf  =   "<div><p>".$lang["ins_cantera_pdf_cabecera_1"]."</p>"
								.    "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
								."</div><h2>".$lang["ins_cantera_pdf_cabecera_4"]."</h2><hr>";
			$contenido_email=   "";
			
			//  Para el PDF 
			$contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3>
								   <p><b>".$lang["ins_cantera_email_2"].": </b>".$jugador["tipo_documento"].", ".$jugador_dni.". ".$lang["ins_cantera_email_3"].": ".$jugador["fecha_cad_dni"]."<br>"
									."<b>".$lang["ins_cantera_email_4"].": </b>".$jugador["nombre"]." ".$jugador["apellidos"]."<br>"    
									."<b>".$lang["ins_cantera_email_5"].": </b>".$jugador["fecha_nacimiento"].", ".$jugador["pais_nacimiento"]."<br>"    
									."<b>".$lang["ins_cantera_email_6"].": </b>".$jugador["direccion"].", ".$jugador["numero"];
			
			if(!empty($jugador["piso"]))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$jugador["piso"];      }
			if(!empty($jugador["puerta"])) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$jugador["puerta"];    }
			
			$contenido_email.=". CP: ".$jugador["codigo_postal"]." (".$jugador["poblacion"].", ".$jugador["provincia"].")<br>"
				."<b>".$lang["ins_cantera_email_9"].": </b>".$jugador["sexo"]."<br>"  
				."<b>".$lang["ins_cantera_email_10"].": </b>".$jugador["nacionalidad"]."<br>"     
				."<b>".$lang["ins_cantera_email_11"].": </b>".$jugador["talla_camiseta"]."<br>"     
				."<b>".$lang["ins_cantera_email_12"].": </b>".$jugador["en_el_club"]."<br>"     
				."<b>".$lang["ins_cantera_email_13"].": </b>".$jugador["alergias"]."<br>"     
				."<b>".$lang["ins_cantera_email_14"].": </b>".$jugador["email"]."<br>"     
				."<b>".$lang["ins_cantera_email_15"].": </b>".$jugador_equipo."<br>"     
				."<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>"
				."<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>"
				."<b>".$lang["ins_cantera_email_17"].":</b>".$familia_num_hermanos;
			
			if(!empty($familia_edades_hermanos))
			{
				$array_edades=explode("-",$familia_edades_hermanos);
				$contenido_email.=" (";
				foreach($array_edades as $edad){    $contenido_email.=$edad.", "; }
				$contenido_email.=substr($contenido_email, 0, -2).")<br>";
			}
			$contenido_email.="<b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"S?? ,(".$familia_monoparental_padre_madre.")":"No")."<br>";
			if($familia_monoparental && $familia_monoparental_padre_madre="MADRE")   
			{   
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].": ".$madre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>";
			}
			else if($familia_monoparental && $familia_monoparental_padre_madre="PADRE")   
			{
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"
				."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
			}
			else
			{
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].":".$madre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>"
				."<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"    
				."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
				."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
			}

			$contenido_email.="</p></div><div><h3>".$lang["ins_cantera_email_titulo_cuenta"].":</h3>"
				."<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni
				."<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
			
			$array=array();
			$array["contenido_email"]   = $contenido_email;
			$array["contenido_pdf"]     = $contenido_pdf;
			return $array;
		}
		
		/*  Este texto devuelve la explicaci??n de por qu?? el error del pago en el banco dado su c??digo Ds_Response*/
		private static function getDescripcion_Ds_Response($Ds_Response)
		{
			$array_errores=array(
				"0101"=>"Tarjeta caducada",
				"0102"=>"Tarjeta en excepci??n transitoria o bajo sospecha de fraude",
				"0106"=>"Intentos de PIN excedidos",
				"0125"=>"Tarjeta no efectiva",
				"0129"=>"C??digo de seguridad (CVV2/CVC2) incorrecto",
				"0180"=>"Tarjeta ajena al servicio",
				"0184"=>"Error en la autenticaci??n del titular",
				"0190"=>"Denegaci??n del emisor sin especificar motivo",
				"0191"=>"Fecha de caducidad err??nea",
				"0202"=>"Tarjeta en excepci??n transitoria o bajo sospecha de fraude con retirada de tarjeta",
				"0904"=>"Comercio no registrado en FUC",
				"0909"=>"Error de sistema",
				"0913"=>"Pedido repetido",
				"0944"=>"Sesi??n Incorrecta",
				"0950"=>"Operaci??n de devoluci??n no permitida",
				"9912/912"=>"Emisor no disponible",
				"0912"=>"Emisor no disponible",
				"9001"=>"Error Interno",
				"9002"=>"Error gen??rico",
				"9003"=>"Error gen??rico",
				"9004"=>"Error gen??rico",
				"9005"=>"Error gen??rico",
				"9006"=>"Error gen??rico",
				"9007"=>"El mensaje de petici??n no es correcto, debe revisar el formato",
				"9008"=>"falta Ds_Merchant_MerchantCode",
				"9009"=>"Error de formato en Ds_Merchant_MerchantCode",
				"9010"=>"Error falta Ds_Merchant_Terminal",
				"9011"=>"Error de formato en Ds_Merchant_Terminal",
				"9012"=>"Error gen??rico",
				"9013"=>"Error gen??rico",
				"9014"=>"Error de formato en Ds_Merchant_Order",
				"9015"=>"Error falta Ds_Merchant_Currency",
				"9016"=>"Error de formato en Ds_Merchant_Currency",
				"9018"=>"Falta Ds_Merchant_Amount",
				"9019"=>"Error de formato en Ds_Merchant_Amount",
				"9020"=>"Falta Ds_Merchant_MerchantSignature",
				"9021"=>"La Ds_Merchant_MerchantSignature viene vac??a",
				"9022"=>"Error de formato en Ds_Merchant_TransactionType",
				"9023"=>"Ds_Merchant_TransactionType desconocido",
				"9024"=>"El Ds_Merchant_ConsumerLanguage tiene mas de 3 posiciones",
				"9025"=>"Error de formato en Ds_Merchant_ConsumerLanguage",
				"9026"=>"Problema con la configuraci??n",
				"9027"=>"Revisar la moneda que est?? enviando",
				"9028"=>"Error Comercio / terminal est?? dado de baja",
				"9029"=>"Que revise como est?? montando el mensaje",
				"9030"=>"Nos llega un tipo de operaci??n err??nea",
				"9031"=>"Nos est?? llegando un m??todo de pago err??neo",
				"9032"=>"Revisar como est?? montando el mensaje para la devoluci??n.",
				"9033"=>"El tipo de operaci??n es err??neo",
				"9034"=>"error interno",
				"9035"=>"Error interno al recuperar datos de sesi??n",
				"9037"=>"El n??mero de tel??fono no es v??lido",
				"9038"=>"Error gen??rico",
				"9039"=>"Error gen??rico",
				"9040"=>"El comercio tiene un error en la configuraci??n, tienen que hablar con su entidad.",
				"9041"=>"Error en el c??lculo de la firma",
				"9042"=>"Error en el c??lculo de la firma",
				"9043"=>"Error gen??rico",
				"9044"=>"Error gen??rico",
				"9046"=>"Problema con la configuraci??n del bin de la tarjeta",
				"9047"=>"Error gen??rico",
				"9048"=>"Error gen??rico",
				"9049"=>"Error gen??rico",
				"9050"=>"Error gen??rico",
				"9051"=>"Error n??mero de pedido repetido",
				"9052"=>"Error gen??rico",
				"9053"=>"Error gen??rico",
				"9054"=>"No existe operaci??n sobre la que realizar la devoluci??n",
				"9055"=>"existe m??s de un pago con el mismo n??mero de pedido",
				"9056"=>"Revisar el estado de la autorizaci??n",
				"9057"=>"Que revise el importe que quiere devolver( supera el permitido)",
				"9058"=>"Que revise los datos con los que est?? validando la confirmaci??n",
				"9059"=>"Revisar que existe esa operaci??n",
				"9060"=>"Revisar que exista la confirmaci??n",
				"9061"=>"Revisar el estado de la preautorizaci??n",
				"9062"=>"Que el comercio revise el importe a confirmar.",
				"9063"=>"Que el comercio revise el n??mer de tarjeta que nos est??n enviando.",
				"9064"=>"N??mero de posiciones de la tarjeta incorrecto",
				"9065"=>"El n??mero de tarjeta no es num??rico",
				"9066"=>"Error mes de caducidad",
				"9067"=>"El mes de la caducidad no es num??rico",
				"9068"=>"El mes de la caducidad no es v??lido",
				"9069"=>"A??o de caducidad no valido",
				"9070"=>"El A??o de la caducidad no es num??rico",
				"9071"=>"Tarjeta caducada",
				"9072"=>"Operaci??n no anulable",
				"9073"=>"Error en la anulaci??n",
				"9074"=>"Falta Ds_Merchant_Order ( Pedido )",
				"9075"=>"El comercio tiene que revisar c??mo est?? enviando el n??mero de pedido",
				"9076"=>"El comercio tiene que revisar el n??mero de pedido",
				"9077"=>"El comercio tiene que revisar el n??mero de pedido",
				"9078"=>"Por la configuraci??n de los m??todos de pago de su comercio no se permiten los pagos con esa tarjeta.",
				"9079"=>"Error gen??rico",
				"9080"=>"Error gen??rico",
				"9081"=>"Se ha perdico los datos de la sesi??n",
				"9082"=>"Error gen??rico",
				"9083"=>"Error gen??rico",
				"9088"=>"El comercio tiene que revisar el valor que env??a en ese campo",
				"9089"=>"El valor de caducidad no ocupa 4 posiciones",
				"9092"=>"Se ha introducido una caducidad incorrecta.",
				"9093"=>"Denegaci??n emisor",
				"9094"=>"Denegaci??n emisor",
				"9095"=>"Denegaci??n emisor",
				"9099"=>"Error al interpretar respuesta de autenticaci??n",
				"9103"=>"Error al montar la petici??n de Autenticaci??n",
				"9112"=>"Que revise que est?? enviando en el campo Ds_Merchant_Transacction_Type.",
				"9113"=>"Error interno",
				"9114"=>"Se est?? realizando la llamada por GET, la tiene que realizar por POST",
				"9115"=>"Que revise los datos de la operaci??n que nos est?? enviando",
				"9116"=>"La operaci??n sobre la que se desea pagar una cuota no es una operaci??n v??lida",
				"9117"=>"La operaci??n sobre la que se desea pagar una cuota no est?? autorizada",
				"9118"=>"Se ha excedido el importe total de las cuotas",
				"9119"=>"Valor del campo Ds_Merchant_DateFrecuency no v??lido ( Pagos recurrentes)",
				"9120"=>"Valor del campo Ds_Merchant_ChargeExpiryDate no v??lido",
				"9121"=>"Valor del campo Ds_Merchant_SumTotal no v??lido",
				"9122"=>"Formato incorrecto del campo Ds_Merchant_DateFrecuency o Ds_Merchant_SumTotal",
				"9123"=>"Se ha excedido la fecha tope para realiza la Transacci??n",
				"9124"=>"No ha transcurrido la frecuencia m??nima en un pago recurrente sucesivo",
				"9125"=>"Error gen??rico",
				"9126"=>"Operaci??n Duplicada",
				"9127"=>"Error Interno",
				"9128"=>"Error interno",
				"9130"=>"Error Interno",
				"9131"=>"Error Interno",
				"9132"=>"La fecha de Confirmaci??n de Autorizaci??n no puede superar en mas de 7 dias a la de Preautorizaci??n.",
				"9133"=>"La fecha de Confirmaci??n de Autenticaci??n no puede superar en mas de 45 d??as a la de Autenticacion Previa que el comercio revise la fecha de la Preautenticaci??n",
				"9139"=>"pago recurrente inicial est?? duplicado",
				"9140"=>"Error Interno",
				"9142"=>"Tiempo excecido para el pago",
				"9151"=>"Error Interno",
				"9169"=>"El valor del campo Ds_Merchant_MatchingData ( Datos de Case) no es valido , que lo revise",
				"9170"=>"Que revise el adquirente que manda en el campo",
				"9171"=>"Que revise el CSB que nos est?? enviando",
				"9172"=>"El valor del campo PUCE Ds_Merchant_MerchantCode no es v??lido",
				"9173"=>"Que el comercio revise el campo de la URL OK",
				"9174"=>"Error Interno",
				"9175"=>"Error Interno",
				"9181"=>"Error Interno",
				"9182"=>"Error Interno",
				"9183"=>"Error interno",
				"9184"=>"Error interno",
				"9187"=>"Error formato( Interno )",
				"9197"=>"Error al obtener los datos de cesta de la compra",
				"9214"=>"Su comercion no permite devoluciones por el tipo de firma ( Completo)",
				"9216"=>"El CVV2 tiene mas de 3 posiciones",
				"9217"=>"Error de formato en el CVV2",
				"9218"=>"El comercio no permite operaciones seguras por las entradas 'operaciones' o 'WebService'",
				"9219"=>"Se tiene que dirigir a su entidad.",
				"9220"=>"Se tiene que dirigir a su entidad.",
				"9221"=>"El cliente no est?? introduciendo el CVV2",
				"9222"=>"Existe una anulaci??n asociada a la preautorizaci??n",
				"9223"=>"La preautorizaci??n que se desea anular no est?? autorizada",
				"9224"=>"Su comercio no permite anulaciones por no tener la firma ampliada",
				"9225"=>"No existe operaci??n sobre la que realizar la anulaci??n",
				"9226"=>"Error en en los datos de la anulaci??n manual",
				"9227"=>"Que el comercio revise el campo Ds_Merchant_TransactionDate",
				"9228"=>"El tipo de tarjeta no puede realizar pago aplazado",
				"9229"=>"Error con el codigo de aplazamiento",
				"9230"=>"Su comercio no permite pago fraccionado( Consulte a su entidad)",
				"9231"=>"No hay forma de pago aplicable ( Consulte con su entidad)",
				"9232"=>"Forma de pago no disponible",
				"9233"=>"Forma de pago desconocida",
				"9234"=>"Nombre del titular de la cuenta no disponible",
				"9235"=>"Campo Sis_Numero_Entidad no disponible",
				"9236"=>"El campo Sis_Numero_Entidad no tiene la longitud requerida",
				"9237"=>"El campo Sis_Numero_Entidad no es num??rico",
				"9238"=>"Campo Sis_Numero_Oficina no disponible",
				"9239"=>"El campo Sis_Numero_Oficina no tiene la longitud requerida",
				"9240"=>"El campo Sis_Numero_Oficina no es num??rico",
				"9241"=>"Campo Sis_Numero_DC no disponible",
				"9242"=>"El campo Sis_Numero_DC no tiene la longitud requerida",
				"9243"=>"El campo Sis_Numero_DC no es num??rico",
				"9244"=>"Campo Sis_Numero_Cuenta no disponible",
				"9245"=>"El campo Sis_Numero_Cuenta no tiene la longitud requerida",
				"9246"=>"El campo Sis_Numero_Cuenta no es num??rico",
				"9247"=>"D??gito de Control de Cuenta Cliente no v??lido",
				"9248"=>"El comercio no permite pago por domiciliaci??n",
				"9249"=>"Error gen??rico",
				"9250"=>"Error gen??rico",
				"9251"=>"No permite transferencias( Consultar con entidad )",
				"9252"=>"Por su configuraci??n no puede enviar la tarjeta. ( Para modificarlo consualtar con la entidad)",
				"9253"=>"No se ha tecleado correctamente la tarjeta.",
				"9254"=>"Se tiene que dirigir a su entidad.",
				"9255"=>"Se tiene que dirigir a su entidad.",
				"9257"=>"La tarjeta no permite operativa de preautorizacion",
				"9258"=>"Tienen que revisar los datos de la validaci??n",
				"9259"=>"No existe la operacion original para notificar o consultar",
				"9260"=>"Entrada incorrecta al SIS",
				"9261"=>"Se tiene que dirigir a su entidad.",
				"9280"=>"Se tiene que dirigir a su entidad.",
				"9281"=>"Se tiene que dirigir a su entidad.",
				"9282"=>"Se tiene que dirigir a su entidad.",
				"9283"=>"Se tiene que dirigir a su entidad.",
				"9284"=>"No existe operacion sobre la que realizar el Pago Adicional",
				"9285"=>"Tiene m??s de una operacion sobre la que realizar el Pago Adicional",
				"9286"=>"La operaci??n sobre la que se quiere hacer la operaci??n adicional no esta Aceptada",
				"9287"=>"la Operacion ha sobrepasado el importe para el Pago Adicional.",
				"9288"=>"No se puede realizar otro pago Adicional. se ha superado el numero de pagos",
				"9289"=>"El importe del pago Adicional supera el maximo d??as permitido.",
				"9290"=>"Se tiene que dirigir a su entidad.",
				"9291"=>"Se tiene que dirigir a su entidad.",
				"9292"=>"Se tiene que dirigir a su entidad.",
				"9293"=>"Se tiene que dirigir a su entidad.",
				"9295"=>"duplicidad de operaci??n. Se puede intentar de nuevo ( 1 minuto )",
				"9296"=>"No se encuentra la operaci??n Tarjeta en Archivo inicial",
				"9297"=>"N??mero de operaciones sucesivas de Tarjeta en Archivo superado",
				"9298"=>"No puede realizar este tipo de operativa. (Contacte con su entidad)",
				"9299"=>"Error en pago con PayPal",
				"9300"=>"Error en pago con PayPal",
				"9301"=>"Error en pago con PayPal",
				"9302"=>"Moneda no v??lida para pago con PayPal",
				"9304"=>"No se permite pago fraccionado si la tarjeta no es de FINCONSUM",
				"9305"=>"Revisar la moneda de la operaci??n",
				"9306"=>"Valor de Ds_Merchant_PrepaidCard no v??lido",
				"9307"=>"Que consulye con su entidad. Operativa de tarjeta regalo no permitida",
				"9308"=>"Tiempo l??mite para recarga de tarjeta regalo superado",
				"9309"=>"Faltan datos adicionales para realizar la recarga de tarjeta prepago",
				"9310"=>"Valor de Ds_Merchant_Prepaid_Expiry no v??lido",
				"9311"=>"Error gen??rico",
				"9319"=>"El comercio no pertenece al grupo especificado en Ds_Merchant_Group",
				"9320"=>"Error generando la referencia",
				"9321"=>"El identificador no est?? asociado al comercio",
				"9322"=>"Que revise el formato del grupo",
				"9323"=>"Para el tipo de operaci??n F( pago en dos fases) es necesario enviar uno de estos campos. Ds_Merchant_Customer_Mobile o Ds_Merchant_Customer_Mail",
				"9324"=>"Imposible enviar el link al cliente( Que revise la direcci??n mail)",
				"9326"=>"Se han enviado datos de tarjeta en fase primera de un pago con dos fases",
				"9327"=>"No se ha enviado ni m??vil ni email en fase primera de un pago con dos fases",
				"9328"=>"Token de pago en dos fases inv??lido",
				"9329"=>"No se puede recuperar el Token de pago en dos fases.",
				"9330"=>"Fechas incorrectas de pago dos fases",
				"9331"=>"La operaci??n no tiene un estado v??lido o no existe.",
				"9332"=>"El importe de la operaci??n original y de la devoluci??n debe ser id??ntico",
				"9333"=>"Error en una petici??n a MasterPass Wallet",
				"9283"=>"Se tiene que dirigir a su entidad.",
				"9334"=>"Se tiene que dirigir a su entidad.",
				"9335"=>"Que revise el valor que env??a",
				"9336"=>"Error gen??rico",
				"9337"=>"Error interno (iUPAY)",
				"9338"=>"No se encuentra la operaci??n iUPAY",
				"9339"=>"El comercio no dispone de pago iUPAY ( Consulte a su entidad)",
				"9340"=>"Respuesta recibida desde iUPAY no v??lida",
				"9341"=>"Error interno (iUPAY)",
				"9344"=>"El usuario ha elegido aplazar el pago, pero no ha aceptado las condiciones de las cuotas",
				"9345"=>"Revisar el n??mero de plazos que est?? enviando.",
				"9346"=>"Revisar formato en par??metro DS_MERCHANT_PAY_TYPE",
				"9347"=>"El comercio no est?? configurado para realizar la consulta de BIN.",
				"9348"=>"El BIN indicado en la consulta no se reconoce",
				"9349"=>"Los datos de importe y DCC enviados no coinciden con los registrados en SIS",
				"9350"=>"No hay datos DCC registrados en SIS para este n??mero de pedido",
				"9351"=>"Autenticaci??n prepago incorrecta",
				"9352"=>"El tipo de firma no permite esta operativa",
				"9353"=>"Clave no v??lida",
				"9354"=>"Error descifrando petici??n al SIS",
				"9355"=>"El comercio-terminal enviado en los datos cifrados no coincide con el enviado en la petici??n",
				"9356"=>"El comercio no tiene activo control de fraude ( Consulte con su entidad",
				"9357"=>"El comercio tiene activo control de fraude y no existe campo ds_merchant_merchantscf",
				"9358"=>"No dispone de pago iUPAY",
				"9370"=>"Error en formato Scf_Merchant_Nif. Longitud m??xima 16",
				"9371"=>"Error en formato Scf_Merchant_Name. Longitud m??xima 30",
				"9372"=>"Error en formato Scf_Merchant_First_Name. Longitud m??xima 30",
				"9373"=>"Error en formato Scf_Merchant_Last_Name. Longitud m??xima 30",
				"9374"=>"Error en formato Scf_Merchant_User. Longitud m??xima 45",
				"9375"=>"Error en formato Scf_Affinity_Card. Valores posibles 'S' o 'N'. Longitud m??xima 1",
				"9376"=>"Error en formato Scf_Payment_Financed. Valores posibles 'S' o 'N'. Longitud m??xima 1",
				"9377"=>"Error en formato Scf_Ticket_Departure_Point. Longitud m??xima 30",
				"9378"=>"Error en formato Scf_Ticket_Destination. Longitud m??xima 30",
				"9379"=>"Error en formato Scf_Ticket_Departure_Date. Debe tener formato yyyyMMddHHmmss.",
				"9380"=>"Error en formato Scf_Ticket_Num_Passengers. Longitud m??xima 1.",
				"9381"=>"Error en formato Scf_Passenger_Dni. Longitud m??xima 16.",
				"9382"=>"Error en formato Scf_Passenger_Name. Longitud m??xima 30.",
				"9383"=>"Error en formato Scf_Passenger_First_Name. Longitud m??xima 30.",
				"9384"=>"Error en formato Scf_Passenger_Last_Name. Longitud m??xima 30.",
				"9385"=>"Error en formato Scf_Passenger_Check_Luggage. Valores posibles 'S' o 'N'. Longitud m??xima 1.",
				"9386"=>"Error en formato Scf_Passenger_Special_luggage. Valores posibles 'S' o 'N'. Longitud m??xima 1.",
				"9387"=>"Error en formato Scf_Passenger_Insurance_Trip. Valores posibles 'S' o 'N'. Longitud m??xima 1.",
				"9388"=>"Error en formato Scf_Passenger_Type_Trip. Valores posibles 'N' o 'I'. Longitud m??xima 1.",
				"9389"=>"Error en formato Scf_Passenger_Pet. Valores posibles 'S' o 'N'. Longitud m??xima 1.",
				"9390"=>"Error en formato Scf_Order_Channel. Valores posibles 'M'(m??vil), 'P'(PC) o 'T'(Tablet)",
				"9391"=>"Error en formato Scf_Order_Total_Products. Debe tener formato num??rico y longitud m??xima de 3.",
				"9392"=>"Error en formato Scf_Order_Different_Products. Debe tener formato num??rico y longitud m??xima de 3.",
				"9393"=>"Error en formato Scf_Order_Amount. Debe tener formato num??rico y longitud m??xima de 19.",
				"9394"=>"Error en formato Scf_Order_Max_Amount. Debe tener formato num??rico y longitud m??xima de 19.",
				"9395"=>"Error en formato Scf_Order_Coupon. Valores posibles 'S' o 'N'",
				"9396"=>"Error en formato Scf_Order_Show_Type. Debe longitud m??xima de 30.",
				"9397"=>"Error en formato Scf_Wallet_Identifier",
				"9398"=>"Error en formato Scf_Wallet_Client_Identifier",
				"9399"=>"Error en formato Scf_Merchant_Ip_Address",
				"9400"=>"Error en formato Scf_Merchant_Proxy",
				"9401"=>"Error en formato Ds_Merchant_Mail_Phone_Number. Debe ser num??rico y de longitud m??xima 19",
				"9402"=>"Error en llamada a SafetyPay para solicitar token url",
				"9403"=>"Error en proceso de solicitud de token url a SafetyPay",
				"9404"=>"Error en una petici??n a SafetyPay",
				"9405"=>"Solicitud de token url denegada SAFETYPAY",
				"9406"=>"Se tiene que poner en contacto con su entidad para que revisen la configuraci??n del sector de actividad de su comercio",
				"9407"=>"El importe de la operaci??n supera el m??ximo permitido para realizar un pago de premio de apuesta(Gambling)",
				"9408"=>"La tarjeta debe de haber operado durante el ??ltimo a??o para poder realizar un pago de premio de apuesta (Gambling)",
				"9409"=>"La tarjeta debe ser una Visa o MasterCard nacional para realizar un pago de premio de apuesta (Gambling)",
				"9410"=>"Denegada por el emisor",
				"9411"=>"Error en la configuraci??n del comercio (Remitir a su entidad)",
				"9412"=>"La firma no es correcta",
				"9413"=>"Denegada, consulte con su entidad.",
				"9415"=>"El tipo de producto no es correcto",
				"9428"=>"Operacion debito no segura",
				"9429"=>"Error en la versi??n enviada por el comercio (Ds_SignatureVersion)",
				"9430"=>"Error al decodificar el par??metro Ds_MerchantParameters",
				"9431"=>"Error del objeto JSON que se env??a codificado en el par??metro Ds_MerchantParameters",
				"9432"=>"Error FUC del comercio err??neo",
				"9433"=>"Error Terminal del comercio err??neo",
				"9434"=>"Error ausencia de n??mero de pedido en la op. del comercio",
				"9435"=>"Error en el c??lculo de la firma",
				"9436"=>"Error en la construcci??n del elemento padre",
				"9437"=>"Error en la construcci??n del elemento",
				"9438"=>"Error en la construcci??n del elemento",
				"9439"=>"Error en la construcci??n del elemento",
				"9440"=>"Error gen??rico",
				"9441"=>"Error no tenemos bancos para Mybank",
				"9442"=>"Error gen??rico",
				"9443"=>"No se permite pago con esta tarjeta",
				"9444"=>"Se est?? intentando acceder usando firmas antiguas y el comercio est?? configurado como HMAC SHA256",
				"9445"=>"Error gen??rico",
				"9446"=>"Es obligatorio indicar la forma de pago",
				"9448"=>"El comercio no tiene el m??todo de pago 'Pago DINERS'",
				"9449"=>"Tipo de pago de la operaci??n no permitido para este tipo de tarjeta",
				"9450"=>"Tipo de pago de la operaci??n no permitido para este tipo de tarjeta",
				"9451"=>"Tipo de pago de la operaci??n no permitido para este tipo de tarjeta",
				"9453"=>"No se permiten pagos con ese tipo de tarjeta",
				"9454"=>"No se permiten pagos con ese tipo de tarjeta",
				"9455"=>"No se permiten pagos con ese tipo de tarjeta",
				"9456"=>"No tiene m??todo de pago configurado (Consulte a su entidad)",
				"9459"=>"No tiene m??todo de pago configurado (Consulte a su entidad)",
				"9460"=>"No tiene m??todo de pago configurado (Consulte a su entidad)",
				"9461"=>"No tiene m??todo de pago configurado (Consulte a su entidad)",
				"9462"=>"Metodo de pago no disponible para conexi??n HOST to HOST",
				"9463"=>"Metodo de pago no permitido",
				"9465"=>"No tiene m??todo de pago configurado (Consulte a su entidad)",
				"9466"=>"La referencia que se est?? utilizando no existe.",
				"9467"=>"La referencia que se est?? utilizando est?? dada de baja",
				"9468"=>"Se est?? utilizando una referencia que se gener?? con un adquirente distinto al adquirente que la utiliza.",
				"9469"=>"Error, no se ha superado el proceso de fraude MR",
				"9470"=>"Error la solicitud del primer factor ha fallado.",
				"9471"=>"Error en la URL de redirecci??n de solicitud del primer factor.",
				"9472"=>"Error al montar la petici??n de Autenticaci??n de PPII.",
				"9473"=>"Error la respuesta de la petici??n de Autenticaci??n de PPII es nula.",
				"9474"=>"Error el statusCode de la respuesta de la petici??n de Autenticaci??n de PPII es nulo",
				"9475"=>"Error el idOperaci??n de la respuesta de la petici??n de Autenticaci??n de PPII es nulo",
				"9476"=>"Error tratando la respuesta de la Autenticaci??n de PPII",
				"9477"=>"Error se ha superado el tiempo definido entre el paso 1 y 2 de PPI",
				"9478"=>"Error tratando la respuesta de la Autorizaci??n de PPII",
				"9479"=>"Error la respuesta de la petici??n de Autorizaci??n de PPII es nula",
				"9480"=>"Error el statusCode de la respuesta de la petici??n de Autorizaci??n de PPII es nulo.",
				"9481"=>"Error, el comercio no es Payment Facilitator",
				"9482"=>"Error el idOperaci??n de la respuesta de una Autorizaci??n OK es nulo o no coincide con el idOp. de la Auth.",
				"9483"=>"Error la respuesta de la petici??n de devoluci??n de PPII es nula.",
				"9484"=>"Error el statusCode o el idPetici??n de la respuesta de la petici??n de Devoluci??n de PPII es nulo.",
				"9485"=>"Error producido por la denegaci??n de la devoluci??n.",
				"9486"=>"Error la respuesta de la petici??n de consulta de PPII es nula.",
				"9487"=>"El comercio terminal no tiene habilitado el m??todo de pago Paygold.",
				"9488"=>"El comercio no tiene el m??todo de pago 'Pago MOTO/Manual' y la operaci??n viene marcada como pago MOTO.",
				"9489"=>"Error de datos. Operacion MPI Externo no permitida",
				"9490"=>"Error de datos. Se reciben parametros MPI Redsys en operacion MPI Externo",
				"9491"=>"Error de datos. SecLevel no permitido en operacion MPI Externo",
				"9492"=>"Error de datos. Se reciben parametros MPI Externo en operacion MPI Redsys",
				"9493"=>"Error de datos. Se reciben parametros de MPI en operacion no segura",
				"9494"=>"FIRMA OBSOLETA",
				"101"=>"Tarjeta caducada",
				"129"=>"C??digo de seguridad CVV incorrecto.",
				"180"=>"Denegaci??n emisor",
				"184"=>"el cliente de la operaci??n no se ha autenticado",
				"190"=>"Denegaci??n emisor",
				"904"=>"Problema con la configuraci??n de su comercio. Dirigirse a la entidad.",
				"915"=>"El titular ha cancelado la operaci??n de pago.",
				"9104"=>"Comercio con 'titular seguro' y titular sin clave de compra segura",
				"9256"=>"El comercio no permite operativa de preautorizacion",
				"9700"=>"PayPal a devuelto un KO",
				"9801"=>"Denegada por iUPAY",
				"9899"=>"No est??n correctamente firmados los datos que nos env??an en el Ds_Merchant_Data.",
				"9900"=>"SafetyPay ha devuelto un KO",
				"9909"=>"Error interno",
				"9912"=>"Emisor no disponible",
				"9913"=>"Excepci??n en el env??o SOAP de la notificacion",
				"9914"=>"Respuesta KO en el env??o SOAP de la notificacion",
				"9915"=>"Cancelado por el titular",
				"9928"=>"El titular ha cancelado la preautorizaci??n",
				"9929"=>"El titular ha cancelado la operaci??n",
				"9930"=>"La transferencia est?? pendiente",
				"9931"=>"Consulte con su entidad",
				"9932"=>"Denegada por Fraude (LINX)",
				"9933"=>"Denegada por Fraude (LINX)",
				"9934"=>"Denegada ( Consulte con su entidad)",
				"9935"=>"Denegada ( Consulte con su entidad)",
				"9992"=>"Solicitud de PAE",
				"9994"=>"No ha seleccionado ninguna tarjeta de la cartera.",
				"9995"=>"Recarga de prepago denegada",
				"9996"=>"No permite la recarga de tarjeta prepago",
				"9997"=>"Con una misma tarjeta hay varios pagos en 'vuelo' en el momento que se finaliza uno el resto se deniegan con este c??digo. Esta restricci??n se realiza por seguridad.",
				"9998"=>"Operaci??n en proceso de solicitud de datos de tarjeta",
				"9999"=>"Operaci??n que ha sido redirigida al emisor a autenticar"
			);
			
			return $array_errores[$Ds_Response];
		}
		
		public static function actionCircularPadres2021CanteraListado()
		{
			//  Evita el limite temporal
			set_time_limit(0);
			
			require "includes/Utils.php";
			require "models/jugadores.php";
			require "models/horarios.php";
			require "PHPMailer/envios_emails.php";
			
			$jugadores=jugadores::findPepe();
			//$jugadores=jugadores::findByCategoriaExtendedEquipo("CANTERA");
			
			/*  Preparamos el array de horarios de los equipos: 
				SELECT group_concat (   concat(dia,' ', DATE_FORMAT(hora_ini, '%H:%i'), '-', DATE_FORMAT(hora_fin, '%H:%i'))), id_equipo 
				FROM HORARIOS GROUP by id_equipo        */
			
			$horariosPorIDEquipo=array();
			$horariosPorIDEquipo[6]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 19:15-20:45,Viernes 20:45-22:15';
			$horariosPorIDEquipo[9]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 20:45-22:15,Lunes 20:45-22:15';
			$horariosPorIDEquipo[11]='Lunes 19:15-20:45,Martes 19:15-20:45,Jueves 19:15-20:45';
			$horariosPorIDEquipo[12]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[13]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[15]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[16]='Viernes 19:15-20:45,Lunes 19:15-20:45,Miercoles 19:15-20:45';
			$horariosPorIDEquipo[17]='Lunes 19:15-20:45,Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[18]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[21]='Lunes 19:15-20:45,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[22]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[25]='Martes 19:15-20:45,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[26]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15';
			$horariosPorIDEquipo[27]='Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45,Lunes 20:45-22:15';
			$horariosPorIDEquipo[28]='Lunes 19:15-20:45,Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[29]='Martes 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45,Lunes 17:45-19:15';
			$horariosPorIDEquipo[30]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 19:15-20:45';
			$horariosPorIDEquipo[31]='Lunes 19:15-20:45,Miercoles 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[32]='Lunes 18:45-20:15,Miercoles 20:45-22:15,Viernes 19:15-20:45,Martes 19:15-20:45';
			$horariosPorIDEquipo[33]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[34]='Lunes 20:45-22:15,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[35]='Lunes 20:45-22:15,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[36]='Jueves 19:15-20:45,Martes 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[37]='Viernes 19:15-20:45,Lunes 19:15-20:45,Miercoles 17:45-19:15';
			$horariosPorIDEquipo[38]='Lunes 19:15-20:45,Viernes 17:45-19:15,Miercoles 17:45-19:15';
			$horariosPorIDEquipo[39]='Martes 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[40]='Lunes 19:15-20:45,Miercoles 17:45-19:15,Jueves 19:15-20:45';
			$horariosPorIDEquipo[41]='Lunes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[42]='Lunes 17:45-19:15,Miercoles 19:15-20:45,Viernes 17:45-19:15';
			$horariosPorIDEquipo[43]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[44]='Lunes 17:45-19:15,Martes 19:15-20:45,Jueves 19:15-20:45';
			$horariosPorIDEquipo[45]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[46]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[47]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[48]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[49]='Martes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[50]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[51]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[52]='Martes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[53]='Viernes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[54]='Viernes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[55]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[56]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[57]='Lunes 17:45-18:45,Miercoles 17:45-18:45';
			$horariosPorIDEquipo[58]='Lunes 17:45-18:45,Miercoles 17:45-18:45';
			$horariosPorIDEquipo[59]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[60]='Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[62]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[63]='Lunes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[64]='Martes 20:45-22:15,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[66]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[67]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[68]='Lunes 17:45-19:15,Martes 17:45-19:15,Miercoles 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[74]='Lunes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[75]='Lunes 19:15-20:45,Jueves 19:15-20:45,Miercoles 17:45-19:15';


			foreach($jugadores as $jugador)
			{
				$item=$jugador['id_jugador']."; ".$jugador['codigo_verificacion']."; ".$jugador['dni_jugador']."; ".$jugador["nombre"]." ".$jugador["apellidos"]."; ".$jugador['nombre_equipo_cas']."; ".$jugador['nombre_equipo_nueva_temporada']."; ".$jugador['telefono_padre']."; ".$jugador['telefono_madre']."; ".$jugador['email']."; ".$jugador['email_padre'].";".$jugador['email_madre']."; ";
				if(isset($horariosPorIDEquipo[intval($jugador['idequipo_alqueria'])])){$item.=$horariosPorIDEquipo[intval($jugador['idequipo_alqueria'])];}
				if(!empty($jugador["categoria_fed"]))
				{   $item.=";".$jugador["categoria_fed"];  }
			
				echo $item."<br>";
			}
		}
		
		public static function actionCircularPadres2021Cantera()
		{
		   
			//  Evita el limite temporal
			set_time_limit(0);
			
			require "includes/Utils.php";
			require "models/jugadores.php";
			require "models/horarios.php";
			require "PHPMailer/envios_emails.php";
			
			$jugadores=jugadores::findPepe();
			//$jugadores=jugadores::findByCategoriaExtendedEquipo("CANTERA");
			
			error_log(__FILE__.__FUNCTION__.__LINE__);
			error_log("====================================");
			error_log("==== CIRCULAR 2020-2021 CANTERA ====");
			error_log(count($jugadores));
//            error_log(print_r($jugadores,1));
//            error_log("==== Hacemos die ====");
//            
//            die;
			
			/*  Preparamos el array de horarios de los equipos: 
				SELECT group_concat (   concat(dia,' ', DATE_FORMAT(hora_ini, '%H:%i'), '-', DATE_FORMAT(hora_fin, '%H:%i'))), id_equipo 
				FROM HORARIOS GROUP by id_equipo        */
			$horariosPorIDEquipo=array();
			$horariosPorIDEquipo[6]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 19:15-20:45,Viernes 20:45-22:15';
			$horariosPorIDEquipo[9]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 20:45-22:15,Lunes 20:45-22:15';
			$horariosPorIDEquipo[11]='Lunes 19:15-20:45,Martes 19:15-20:45,Jueves 19:15-20:45';
			$horariosPorIDEquipo[12]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[13]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[15]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[16]='Viernes 19:15-20:45,Lunes 19:15-20:45,Miercoles 19:15-20:45';
			$horariosPorIDEquipo[17]='Lunes 19:15-20:45,Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[18]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[21]='Lunes 19:15-20:45,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[22]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[25]='Martes 19:15-20:45,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[26]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15';
			$horariosPorIDEquipo[27]='Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45,Lunes 20:45-22:15';
			$horariosPorIDEquipo[28]='Lunes 19:15-20:45,Martes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[29]='Martes 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45,Lunes 17:45-19:15';
			$horariosPorIDEquipo[30]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 19:15-20:45';
			$horariosPorIDEquipo[31]='Lunes 19:15-20:45,Miercoles 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[32]='Lunes 18:45-20:15,Miercoles 20:45-22:15,Viernes 19:15-20:45,Martes 19:15-20:45';
			$horariosPorIDEquipo[33]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[34]='Lunes 20:45-22:15,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[35]='Lunes 20:45-22:15,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[36]='Jueves 19:15-20:45,Martes 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[37]='Viernes 19:15-20:45,Lunes 19:15-20:45,Miercoles 17:45-19:15';
			$horariosPorIDEquipo[38]='Lunes 19:15-20:45,Viernes 17:45-19:15,Miercoles 17:45-19:15';
			$horariosPorIDEquipo[39]='Martes 19:15-20:45,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[40]='Lunes 19:15-20:45,Miercoles 17:45-19:15,Jueves 19:15-20:45';
			$horariosPorIDEquipo[41]='Lunes 19:15-20:45,Miercoles 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[42]='Lunes 17:45-19:15,Miercoles 19:15-20:45,Viernes 17:45-19:15';
			$horariosPorIDEquipo[43]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[44]='Lunes 17:45-19:15,Martes 19:15-20:45,Jueves 19:15-20:45';
			$horariosPorIDEquipo[45]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[46]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[47]='Martes 17:45-19:15,Jueves 17:45-19:15,Lunes 17:45-19:15';
			$horariosPorIDEquipo[48]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[49]='Martes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[50]='Martes 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[51]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[52]='Martes 17:45-19:15,Miercoles 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[53]='Viernes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[54]='Viernes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[55]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[56]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[57]='Lunes 17:45-18:45,Miercoles 17:45-18:45';
			$horariosPorIDEquipo[58]='Lunes 17:45-18:45,Miercoles 17:45-18:45';
			$horariosPorIDEquipo[59]='Martes 17:45-18:45,Jueves 17:45-18:45';
			$horariosPorIDEquipo[60]='Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[62]='Lunes 17:45-19:15,Miercoles 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[63]='Lunes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[64]='Martes 20:45-22:15,Jueves 19:15-20:45,Viernes 19:15-20:45';
			$horariosPorIDEquipo[66]='Martes 19:15-20:45,Jueves 20:45-22:15,Viernes 19:15-20:45';
			$horariosPorIDEquipo[67]='Lunes 20:45-22:15,Martes 20:45-22:15,Miercoles 20:45-22:15,Jueves 20:45-22:15,Viernes 20:45-22:15';
			$horariosPorIDEquipo[68]='Lunes 17:45-19:15,Martes 17:45-19:15,Miercoles 17:45-19:15,Jueves 17:45-19:15,Viernes 17:45-19:15';
			$horariosPorIDEquipo[74]='Lunes 17:45-19:15,Martes 17:45-19:15,Jueves 17:45-19:15';
			$horariosPorIDEquipo[75]='Lunes 19:15-20:45,Jueves 19:15-20:45,Miercoles 17:45-19:15';

			$enviados_OK    =   "";
			$errores        =   "";
			$log            =   "";
			$num_enviados_OK=   0;
			$num_errores    =   0;
			
			$prelistado="";

			error_log(__FILE__.__FUNCTION__.__LINE__);
			foreach($jugadores as $jugador)
			{
//                error_log("=================");
				  error_log("==== JUGADOR: ".$jugador["id_jugador"]);
//                error_log(print_r($jugador,1));
				
				$sms="Inscripciones temporada 20-21 de la Cantera de L'Alqueria del Basket. Inicio 07/07. Consulte los detalles en su email y conserve la clave: ".$jugador["codigo_verificacion"];
				if(!empty($jugador["telefono_padre"]) && (strlen($jugador["telefono_padre"])==9))
				{
					$numero = (string)$jugador["telefono_padre"]; // type casting int to string
					if($numero[0]==="6" || $numero[0]==="7") 
					{
						$resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_padre"]);
						error_log($resultado);
					}
				}
				
				if(!empty($jugador["telefono_madre"]) && (strlen($jugador["telefono_madre"])==9))
				{
					$numero = (string)$jugador["telefono_madre"]; // type casting int to string
					if($numero[0]==="6" || $numero[0]==="7") 
					{
						$resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_madre"]);
						error_log($resultado);
					}
				}
				
				if(!empty($jugador["telefono_jugador"]) && (strlen($jugador["telefono_jugador"])==9))
				{
					$numero = (string)$jugador["telefono_jugador"]; // type casting int to string
					if($numero[0]==="6" || $numero[0]==="7") 
					{
						$resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_jugador"]);
						error_log($resultado);
					}
				}
				
				
				$contenido_email="<p>Estimados padres,</p>
				<p>Una vez concluida la temporada y realizada la confecci??n de equipos para la temporada 2020/2021, 
				os comunicamos que <b>".$jugador["nombre"]." ".$jugador["apellidos"]."</b> ha quedado encuadrado en el equipo:<br>
				- ".$jugador['nombre_equipo_nueva_temporada']."</p>

				<p>Este equipo entrenar??a los siguientes d??as:<br>
				- ".$horariosPorIDEquipo[intval($jugador['idequipo_alqueria'])]."</p>

				<p>*Los equipos y horarios pueden sufrir modificaciones.</p>";

				if(!empty($jugador["categoria_fed"]))
				{   $contenido_email.="Este equipo disputara la categor??a: <b>".$jugador["categoria_fed"]."</b> la temporada 2020-2021.";  }

				$contenido_email.="<br><br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">INSTRUCCIONES PARA REALIZAR LA INSCRIPCI??N:</h3>
				
				<p>Debe introducir el c??digo de verificaci??n del jugador: </p>
				<h2><b>".$jugador["codigo_verificacion"]."</b></h2>
				<p>Debe introducir el DNI del jugador sin espacios ni guiones (Ejemplo: 12345678Z). Rellene con cero (0) a la izquierda para que tenga una longitud m??nima de 9 caracteres.</p>
				<p>En caso de que el jugador no tuviera DNI la temporada pasada debe introducir el DNI de la madre o el padre.</p>
				<p>Es decir, utilice o bien el DNI del jugador/a o bien el jugador del padre/madre (solamente uno los dos)</p>
				<p>1. Prepare la siguiente informaci??n y los documentos que necesitar?? obligatoriamente para realizar la inscripci??n:
				<br>- Muy importante: fotograf??a del DNI delante y por detr??s
				<br>- Fotograf??a del jugador/a
				<br>- Fotograf??a del SIP
				<br>- Fotograf??a del pasaporte
				<br>- Cuenta bancaria para los cargos trimestrales</p>

				<p>3. Es importante enviar fotos que ocupen toda la fotograf??a. Mirad estos dos ejemplos:<p>

				<p style='color:red;'><b>MAL porque el documento no abarca toda la foto / imagen:</b></p> 
				<img width='500' height='300' src='https://servicios.alqueriadelbasket.com/img/inscripciones2020/inscripciones-alqueria-ejemplo-documento-mal-b.jpg'>
				<p style='color:green;'><b>BIEN porque el documento abarca toda la foto / imagen:</b></p> 
				<img width='500' height='300' src='https://servicios.alqueriadelbasket.com/img/inscripciones2020/inscripciones-alqueria-demo-documento-bien-b.jpg'>

				<p>Entrar al formulario online:
				
				<br><b>Enlace para la inscripci??n en CANTERA:</b>
				<br><a target='_blank' href='https://servicios.alqueriadelbasket.com/?r=inscripciones/cantera'>https://servicios.alqueriadelbasket.com/?r=inscripciones/cantera</a>
				<br>
				
				<br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">DUDAS O INCIDENCIAS</h3>
				<p>Ante cualquier duda o incidencia, puede ponerse en contacto v??a email con <a href='mailto:recepcion@alqueriadelbasket.com' target='_blank'>recepcion@alqueriadelbasket.com</a> o al tel??fono 961215543. Muchas gracias.</p>";

				//  Comprobamos si hay que enviar email a padre o a madre
				if(!empty($jugador["email_padre"]))
				{   $email_padre=$jugador["email_padre"];   $nombre_padre=$jugador["nombre_padre"]." ".$jugador["apellidos_padre"];}
				else
				{   $email_padre="";                        $nombre_padre="";  }
				
				if(!empty($jugador["email_madre"]))
				{   $email_madre=$jugador["email_madre"];   $nombre_madre=$jugador["nombre_madre"]." ".$jugador["apellidos_madre"];}
				else
				{   $email_madre="";                        $nombre_madre="";  }
				
				try{
					$email_enviado = envios_emails::enviar_email_circular_escuela_cantera_2020(
						"Instrucciones de inscripci??n a la Cantera de L'Alqueria del Basket - Temporada 2020/2021 - ".$jugador['email'],  
						$contenido_email,   
						$jugador['email'],  $jugador['nombre']." ".$jugador['apellidos'],
						$email_madre,       $nombre_madre,
						$email_padre,       $nombre_padre
					);
					
					if($email_enviado)
					{
						$enviados_OK.=$jugador["email"].";Se ha enviado.\n";$num_enviados_OK++;
						//$log.=$jugador["email"].";Se ha enviado.\n";
						error_log($jugador["email"]." - Se ha enviado.");
					}
					else 
					{
						$errores.=$jugador["email"].";ERROR.\n";$num_errores++;
						//$log.=$jugador["email"].";ERROR.\n";
						error_log($jugador["email"]." - ERROR.");
					}
				}
				catch (Exception $ex)
				{
					$errores.=$jugador["email"].";ERROR CON EXCEPCION: ".print_r($ex,1).".\n";$num_errores++;
					//$log.=$jugador["email"].";ERROR CON EXCEPCION.\n";
					//error_log($jugador["email"]." - ERROR CON EXCEPCION".print_r($ex,1));
				}
			}
			
			error_log($enviados_OK);
			error_log($errores);
			error_log("num_enviados_OK vale ".$num_enviados_OK);
			error_log("num_errores vale ".$num_errores);
		}

		private static function enviaSMSCircularPadres2021Cantera($contenido_sms,$numerotelefono,$prefijopais=34)
		{
			$auth_basic = base64_encode("jlt@tessq.com:Cull02cba");
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.labsmobile.com/json/send",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => '{"message":"'.$contenido_sms.'", "tpoa":"Alqueria","recipient":[{"msisdn":"'.$prefijopais.$numerotelefono.'"}]}',
			  CURLOPT_HTTPHEADER => array(
				"Authorization: Basic ".$auth_basic,
				"Cache-Control: no-cache",
				"Content-Type: application/json"
			  ),
			));
			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

			$response = curl_exec($curl);
			$err = curl_error($curl);
			curl_close($curl);

			if($err){
				$resultado="cURL Error #:" . $err." - ".$numerotelefono.": ".$contenido_sms;
			}
			else {
				$resultado="OK. ".$numerotelefono.": ".$contenido_sms;
			}
			
			return $resultado;
		}
		
		public static function actionRellenaCodigoVerificacion()
		{
			error_log(__FILE__.__FUNCTION__.__LINE__);
			error_log("Hacemos die;");
			die;
			
			//  Evita el limite temporal
			set_time_limit(0);

			require "models/jugadores.php";
			
			$jugadores=jugadores::findAll();
			
			foreach($jugadores as $jugador)
			{
				jugadores::updateAttribute(
					$jugador["id_jugador"], 
					"codigo_verificacion", 
					self::generateRandomString(6), "no");
			}
		}
		
		//  Genera un string random para las contrase??as temporales
		private static function generateRandomString($length = 8)
		{
			// $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$characters         = '123456789';
			$charactersLength   = strlen($characters);
			$randomString       = '';
			for ($i = 0; $i < $length; $i++)
			{
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}



		/******************************************
		*      PATRONATO 2020
		******************************************/
		 public function actionInscripcionPatronato2020()
		{
			require "includes/Utils.php";
			require "models/jugadores.php";
			require "models/jugadores_pagos.php";
			require "models/horarios.php";
			require "models/inscripciones_escuela_y_cantera.php";
			require "PHPMailer/envios_emails.php";
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     
			
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");
//error_log(print_r($_POST,1));   
//error_log(print_r($_FILES,1));  

//error_log(__FILE__.__FUNCTION__.__LINE__);
			/****************************************************************************
			* Recibimos los datos de PATRONATO
			***************************************************************************/
			//  require "models/mailers.php";
			$temporada          =   "20/21";
			$tipo               =   "PATRONATO";
			$id_jugador         =   filter_input(INPUT_POST, 'jugador_id',   FILTER_SANITIZE_NUMBER_INT);
			$idequipo           =   filter_input(INPUT_POST, 'id_equipo',    FILTER_SANITIZE_NUMBER_INT); 
			$nombreequipo       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_equipo',   FILTER_SANITIZE_STRING))); 
			$seccion            =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_seccion',  FILTER_SANITIZE_STRING))); 

			//  Datos del jugador
			$tipo_documento     =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_tipo_documento',  FILTER_SANITIZE_STRING)));
			$dni_jugador        =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_dni',             FILTER_SANITIZE_STRING)));
			$fecha_cad_dni      =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_caducidad', FILTER_SANITIZE_STRING))); 
			$nacionalidad       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nacionalidad',    FILTER_SANITIZE_STRING)));

			$fecha_nacimiento   =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_fecha_nacimiento',FILTER_SANITIZE_STRING)));
			$nombre             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_nombre',          FILTER_SANITIZE_STRING))); 
			$apellidos          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_apellidos',       FILTER_SANITIZE_STRING))); 

			$jugador_telefono   =   trim(strtolower(filter_input(INPUT_POST, 'jugador_telefono',        FILTER_SANITIZE_STRING)));       
			$jugador_colegio    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_colegio',        FILTER_SANITIZE_STRING)));   
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","I",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("??","U",$jugador_colegio);
			$jugador_colegio=str_replace("??","A",$jugador_colegio);
			$jugador_colegio=str_replace("??","??",$jugador_colegio);
			$jugador_colegio=str_replace("??","O",$jugador_colegio);
			$jugador_colegio=str_replace("'"," ",$jugador_colegio);
			$jugador_colegio=str_replace("??"," ",$jugador_colegio);
			
			$jugador_curso      =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_curso',           FILTER_SANITIZE_STRING)));

			$direccion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_direccion',       FILTER_SANITIZE_STRING))); 
			$direccion=str_replace("'","??",$direccion);   

			$numero             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_numero',          FILTER_SANITIZE_STRING)));      
			$piso               =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_piso',            FILTER_SANITIZE_STRING)));      
			$puerta             =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_puerta',          FILTER_SANITIZE_STRING)));      
			$codigo_postal      =   filter_input(INPUT_POST, 'jugador_cp',              FILTER_SANITIZE_NUMBER_INT);    
			$poblacion          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_poblacion',       FILTER_SANITIZE_STRING)));  
			$poblacion=str_replace("'","??",$poblacion);  
//error_log("Pob: " . $poblacion);         
//die;  
			$provincia          =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_provincia',       FILTER_SANITIZE_STRING)));  

			$sexo               =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_sexo',             FILTER_SANITIZE_STRING)));
			$pais_nacimiento    =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_pais_nacimiento',  FILTER_SANITIZE_STRING)));  
			//$talla_camiseta       =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_talla_camiseta',   FILTER_SANITIZE_STRING))); 
			$en_el_club         =              filter_input(INPUT_POST,      'jugador_anyos_club',       FILTER_SANITIZE_NUMBER_INT); 
			if(!empty($en_el_club)){}else{$en_el_club=0;}
			$alergias           =   trim(strtoupper(filter_input(INPUT_POST, 'jugador_alergias',         FILTER_SANITIZE_STRING))); 
			$email              =              trim(filter_input(INPUT_POST, 'jugador_email_jugador',    FILTER_SANITIZE_STRING));

			$num_hermanos                       =   filter_input(INPUT_POST,                    'familia_num_hermanos',             FILTER_SANITIZE_NUMBER_INT); 
			$edades                             =   substr(strtoupper(filter_input(INPUT_POST,  'familia_edades_hermanos',          FILTER_SANITIZE_STRING)),1);  
			$familia_monoparental               =   strtoupper(filter_input(INPUT_POST, 'familia_monoparental',    FILTER_SANITIZE_STRING));   
			if($familia_monoparental==="1"){$familia_monoparental=1;}
			else{$familia_monoparental=0;}
			$familia_monoparental_padre_madre   =   strtoupper(filter_input(INPUT_POST,         'familia_monoparental_padre_madre', FILTER_SANITIZE_STRING)); 

			$nombre_padre       =   trim(strtoupper(filter_input(INPUT_POST, 'padre_nombre',    FILTER_SANITIZE_STRING)));     
			$apellidos_padre    =   trim(strtoupper(filter_input(INPUT_POST, 'padre_apellidos', FILTER_SANITIZE_STRING)));     
			$dni_padre          =   trim(strtoupper(filter_input(INPUT_POST, 'padre_dni',       FILTER_SANITIZE_STRING)));     
			$telefono_padre     =   trim(strtoupper(filter_input(INPUT_POST, 'padre_telefono',  FILTER_SANITIZE_STRING)));     
			$email_padre        =   trim(strtoupper(filter_input(INPUT_POST, 'padre_email',     FILTER_SANITIZE_STRING)));     
			$estudios_padre     =   trim(strtoupper(filter_input(INPUT_POST, 'padre_estudios',  FILTER_SANITIZE_STRING)));   

			$nombre_madre       =   trim(strtoupper(filter_input(INPUT_POST, 'madre_nombre',    FILTER_SANITIZE_STRING)));     
			$apellidos_madre    =   trim(strtoupper(filter_input(INPUT_POST, 'madre_apellidos', FILTER_SANITIZE_STRING)));     
			$dni_madre          =   trim(strtoupper(filter_input(INPUT_POST, 'madre_dni',       FILTER_SANITIZE_STRING)));     
			$telefono_madre     =   trim(strtoupper(filter_input(INPUT_POST, 'madre_telefono',  FILTER_SANITIZE_STRING)));     
			$email_madre        =   trim(strtoupper(filter_input(INPUT_POST, 'madre_email',     FILTER_SANITIZE_STRING)));     
			$estudios_madre     =   trim(strtoupper(filter_input(INPUT_POST, 'madre_estudios',  FILTER_SANITIZE_STRING)));    

			//  DOMICILIACION
			$banco_devoluciones =   trim(strtoupper(filter_input(INPUT_POST, 'banco_devoluciones',  FILTER_SANITIZE_STRING)));     
			$banco_titular      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_titular',       FILTER_SANITIZE_STRING)));     
			$banco_dni          =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dni',           FILTER_SANITIZE_STRING)));     
			$banco_iban         =   trim(strtoupper(filter_input(INPUT_POST, 'banco_iban',          FILTER_SANITIZE_STRING)));     
			$banco_entidad      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_entidad',       FILTER_SANITIZE_STRING)));     
			$banco_oficina      =   trim(strtoupper(filter_input(INPUT_POST, 'banco_oficina',       FILTER_SANITIZE_STRING)));     
			$banco_dc           =   trim(strtoupper(filter_input(INPUT_POST, 'banco_dc',            FILTER_SANITIZE_STRING)));     
			$banco_cuenta       =   trim(strtoupper(filter_input(INPUT_POST, 'banco_cuenta',        FILTER_SANITIZE_STRING)));     
			$banco_acepto_condiciones   =   strtoupper(filter_input(INPUT_POST, 'banco_acepto_condiciones',FILTER_SANITIZE_STRING));  
			$banco_acepto_pago          =   strtoupper(filter_input(INPUT_POST, 'banco_acepto_pago',       FILTER_SANITIZE_STRING));  
			$metodopago      =   strtoupper(filter_input(INPUT_POST, 'metodopago',      FILTER_SANITIZE_STRING)); 

			//DATOS PARA CALCULAR MATRICULA
			$tipoalumno        =        trim(strtoupper(filter_input(INPUT_POST, "tipoalumno", FILTER_SANITIZE_STRING))); //para saber si el alumno es interno o externo
			$tiene_hermanos_inscritos =  $_POST["hermanos_inscritos"]; 

			if ($tiene_hermanos_inscritos=="1"){
				$tiene_hermanos_inscritos=1;                              
			} else {$tiene_hermanos_inscritos=0;}

			/*  CALCULAMOS IMPORTES PARA LA MATRICULA Y LOS TRIMESTRES*/
			//si el alumno es interno son 100???, externo 120???

			if ($tipoalumno=="INTERNO"){
				$matricula=100; 
				$trimentre=100;                              
			} else{
				$matricula=120;
				$trimentre=120;
			}

			//Si el equipo es senior el trimentre son 150???
			$modalidad        =    trim(strtoupper(filter_input(INPUT_POST, "modalidad", FILTER_SANITIZE_STRING))); //equipo  al que inscribe

			if ($modalidad=="SENIORFEMENINO" || $modalidad=="SENIORMASCULINO" ){
				$matricula=0;
				$trimentre=150;                              
			} 

 /* error_log(__FILE__.__FUNCTION__.__LINE__);
	error_log("trimenstre : " . $trimentre . " mat: " .$matricula);           
	error_log("tipo: " . $tipoalumno);
	error_log("modalidad: " . $modalidad);
error_log("hermanos inscritos: " . $tiene_hermanos_inscritos);
	*/       

		   
			//  FIRMAS
			$firmajugador          =   $_POST["firma_jugador"]; 
			$firmatutor            =   $_POST["firma_tutor"];

			//Guardar firma jugador
			include("lib/classes/toJpg.php");
			$toJpg = new toJpg('img/firmas/', $firmajugador);
			$firmajugador = $toJpg->getJpg();


			//Guardar firma tutor
			$toJpg = new toJpg('img/firmas/', $firmatutor);
			$firmatutor = $toJpg->getJpg();



			//  IMAGENES
			if(!empty($_FILES['foto']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["foto"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_foto                  =   "foto-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["foto"]["tmp_name"], 'inscripciones/'.$blob_foto);
			}
			else
			{   
				$blob_foto   =   "";
				$url_recibo="";
			}
			
			if(!empty($_FILES['dnifrontal']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnifrontal"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_frontal           =   "dnifrontal-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnifrontal"]["tmp_name"], 'inscripciones/'.$blob_dni_frontal);
			}
			else
			{   
				$blob_dni_frontal   =   "";
				$url_recibo         =   "";
			}
					  
			if(!empty($_FILES['dnitrasero']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["dnitrasero"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_dni_trasero           =   "dnitrasero-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["dnitrasero"]["tmp_name"], 'inscripciones/'.$blob_dni_trasero);
			}
			else
			{   
				$blob_dni_trasero   =   "";
				$url_recibo         =   "";
			}
			
			if(!empty($_FILES['sip']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["sip"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_sip                   =   "sip-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["sip"]["tmp_name"], 'inscripciones/'.$blob_sip);
			}
			else
			{   
				$blob_sip   =   "";
				$url_recibo         =   "";
			}

			if(!empty($_FILES['pasaporte']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["pasaporte"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$blob_pasaporte             =   "pasaporte-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["pasaporte"]["tmp_name"], 'inscripciones/'.$blob_pasaporte);
			}
			else
			{   
				$blob_pasaporte   =   "";
				$url_recibo         =   "";
			}
			
			if(!empty($_FILES['recibo']['tmp_name']))
			{
				$array_fichero_y_extension  =   explode(".",$_FILES["recibo"]["name"]);
				$numerodeelementos          =   count($array_fichero_y_extension);
				$extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
				$url_recibo                 =   "recibo-id-jugador-".$id_jugador."-".date("Y-m-d-h-i-s").".".$extension;
				$archivo_movido             =   move_uploaded_file($_FILES["recibo"]["tmp_name"], 'inscripciones/'.$url_recibo);
				$blob_recibo="";
			}
			else
			{   
				$blob_pasaporte =   "";
				$blob_recibo    =   "";
				$url_recibo     =   "";
			}
			
//             error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log($familia_monoparental);           
//    error_log($familia_monoparental_padre_madre);
//    error_log(gettype($familia_monoparental));           
//    error_log(gettype($familia_monoparental_padre_madre));
//            error_log($telefono_padre);
//            error_log($telefono_madre);
			//  Si es una familia monoparental, vaciamos los datos del otro padre 
			//  (ejemplo. temporada 19 tiene madre y madre, temporada 20 fallece el padre)
			
			if($familia_monoparental && $familia_monoparental_padre_madre=="MADRE")   
			{  
			 //   error_log(__FILE__.__FUNCTION__.__LINE__);
				$nombre_padre=$apellidos_padre=$dni_padre=$email_padre=$estudios_padre="";$telefono_padre=0; 
			}
			else if($familia_monoparental && $familia_monoparental_padre_madre=="PADRE")   
			{  
				$nombre_madre=$apellidos_madre=$dni_madre=$email_madre=$estudios_madre=""; $telefono_madre=0; 
			  //  error_log(__FILE__.__FUNCTION__.__LINE__);
			}
			else
			{
				if(!empty($telefono_padre)){} else{$telefono_padre=0; }
				if(!empty($telefono_madre)){} else{$telefono_madre=0; }
					 
				
			}
			
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log($telefono_padre);
//            error_log($telefono_madre);
			
//error_log(__FILE__.__FUNCTION__.__LINE__);
			/****************************************************************************
			* Comprobacion Cuenta bancaria incorrecta
			* Cogemos el DNI, lo metemos dentro de un strtolower(trim($_POST["dni"]) 
			***************************************************************************/
			$cuentaBancaria     =   $banco_iban . $banco_entidad . $banco_oficina . $banco_dc . $banco_cuenta;
//error_log(__FILE__.__FUNCTION__.__LINE__.":".$cuentaBancaria);
			if($cuentaBancaria==="ES1111111111111111111111")
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
			}  //  Todo 1's es la cuenta bancaria TEST
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
				if(!$cuentaValidada)
				{
					echo json_encode(array(
						"response"  => "error",
						"message"   => $lang["ins_controller_cuenta_incorrecta"]
					));
					die;
				}
			}
//error_log(__FILE__.__FUNCTION__.__LINE__);


			


			
			/****************************************************************************
			* UPDATE EN JUGADORES PATRONATO
			* Es independiente al tipo de pago que elijan para la reserva
			***************************************************************************/    
			try{
//error_log(__FILE__.__FUNCTION__.__LINE__." ==> ANTES updateJugadorEnInscripcionEscuelaCantera2020");
				$actualizajugador = jugadores::updateJugadorEnInscripcionEscuelaCantera2020(
					$id_jugador,        0,
					$tipo_documento,    $dni_jugador,       $fecha_cad_dni,     $nacionalidad,
					$fecha_nacimiento,  $nombre,            $apellidos,             
					$direccion,         $numero,            $piso,              $puerta,        $codigo_postal,  $poblacion,   $provincia, 
					$sexo,              $pais_nacimiento,   "",    $en_el_club,    $alergias,     $jugador_telefono,     $email,  
					$jugador_colegio,   $jugador_curso,
					$num_hermanos,      $edades,            $familia_monoparental,
					$nombre_padre,      $apellidos_padre,   $telefono_padre,    $email_padre,   $estudios_padre,    $dni_padre,       
					$nombre_madre,      $apellidos_madre,   $telefono_madre,    $email_madre,   $estudios_madre,    $dni_madre,     

					$banco_titular,     $banco_dni, $banco_iban,    $banco_entidad, $banco_oficina,     $banco_dc,        $banco_cuenta, 

					$blob_foto,         $blob_dni_frontal,      $blob_dni_trasero,  $blob_pasaporte,    $blob_sip,   $temporada, 

					$tipoalumno,   $tiene_hermanos_inscritos);      
//error_log(__FILE__.__FUNCTION__.__LINE__);
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log(print_r($_POST,1));
				error_log(print_r($_FILES,1));
				error_log(print_r($e,1));
				
				envios_emails::enviar_email_generico(
					"ERROR EN INSCRIPCIONES ALQUERIA PATRONATO 2020", 
					"Ha habido un error en el updateJugadorEnInscripcionEscuelaCantera2020. Datos: ".print_r($_POST,1).print_r($_FILES,1).print_r($e,1),
					"ap@tessq.com", "Ana", 
					"alqueria@alqberiadelbasket.com", "TESSQ BOT", "", "", "ap@tessq.com", "Ana","","");
				
				echo json_encode(array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error al guardar los cambios en la ficha del jugador. "
						. "Por favor, contacte con nosotros para revisar la incidencia."
				));
				die;
			}
				
			
//error_log(__FILE__.__FUNCTION__.__LINE__." ==> ANTES de inscripciones_escuela_y_cantera::insertarInscripcion");
			/****************************************************************************
			* INSERT EN INSCRIPCIONES_ESCUELA_CANTERA
			***************************************************************************/
			$inscripcion=inscripciones_escuela_y_cantera::insertarInscripcion(
				$id_jugador, date("Y-m-d"), "20/21", "PATRONATO", $firmajugador, $firmatutor, $modalidad, "ONLINE");    
			

			/**************************************************************************
			* INSERT EN JUGADORES_PAGOS EL PAGO DE LA RESERVA DE x EUROS
			***************************************************************************/
			$ultimo_jugadores_pagos=jugadores_pagos::findLast();

			//  Calculamos n??mero de pedido o ponemos uno por defecto
			if(!empty($ultimo_jugadores_pagos))
			{   $numeropedido=$ultimo_jugadores_pagos['id']+1;}
			else
			{   $numeropedido=1;}
	 
			// Rellenar con ceros al la izq para que tenga los 4 primeros digitos numericos
			// Despues se concatena una cadena
			$numeropedido = str_pad($numeropedido, 4, "0", STR_PAD_LEFT);
			$numeropedido = $numeropedido . "Pat2021";


			$id_inscripcion=inscripciones_escuela_y_cantera::findLastInscripcionByIDJugador($id_jugador);

			/* Aqui se graba el pago de la matricula */
			if($metodopago==="TARJETA")
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "Matr??cula Pat Temp. 20/21",    $numeropedido,  $matricula, 
					"TPV",          0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               $url_recibo);
			}
			elseif($metodopago==="RECEPCION")  //SE GRABA EL PAGO Y SE MARCA COMO NO PAGADO
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "Matr??cula Pat Temp. 20/21",    $numeropedido,  $matricula, 
					"RECEPCION",    0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               $url_recibo);
			}
			elseif($metodopago==="TRANSFERENCIA")
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,        date("Y-m-d H:i:s"),"Matr??cula Pat Temp. 20/21",    $numeropedido,  $matricula, 
					"TRANSFERENCIA",    1,                  NULL,                               NULL,           "",  
					$id_inscripcion['id_inscripcion'],      $blob_recibo,                       $url_recibo);
			}
			elseif($metodopago==="SENIOR")
			{
				$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,        date("Y-m-d H:i:s"),"Matr??cula Pat Temp. 20/21",    $numeropedido,  $matricula, 
					"SIN MATRICULA",    1,                  NULL,                               NULL,           "",  
					$id_inscripcion['id_inscripcion'],      $blob_recibo,                       $url_recibo);
			}

			/* Aqui se graban los pagos de los 3 trimestres sin aplicar el dto del 10% si tiene hermanos y sin grabar n?? de pedido*/
			$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "1 Trim. Pat Temp. 20/21",    "",  $trimentre, 
					"DOMICILIADO",    0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               "");

			$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "2 Trim. Pat Temp. 20/21",    "",  $trimentre, 
					"DOMICILIADO",    0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               "");

			$jugadores_pagos=jugadores_pagos::insert(
					$id_jugador,    date("Y-m-d H:i:s"),    "3 Trim. Pat Temp. 20/21",    "",  $trimentre, 
					"DOMICILIADO",    0,                      NULL,                               NULL,           "",
					$id_inscripcion['id_inscripcion'],      NULL,                               "");

		   

			/****************************************************************************
			* PATRONATO. PREPARAMOS EMAIL 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
			//  Sacamos los horarios del equipo del jugador
		/*    $horarios=horarios::findByid_equipo($actualizajugador['idequipo_alqueria']);
			$horarios_string="";
			foreach($horarios as $horario)
			{   
				switch($horario["dia"]){
					case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;     }
					case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;    }
					case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break; }
					case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;    }
					case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;   }
				}
			}
			$horarios_string= substr($horarios_string, 0, -2);
			*/
			$horarios_string="";
			
			//  Para el PDF 
			$contenido_cabecera="<div><p>".$lang["ins_patronato_pdf_cabecera_1"]."</p>"
			. "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
			. "</div><h2>".$lang["ins_patronato_pdf_cabecera_1"]."</h2><hr>";
			
			//  Asunto del email
			$asunto_email=$lang["ins_patronato_email_asunto"];
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($asunto_email);

				   
			$contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3><p>"
							. "<b>".$lang["ins_cantera_email_2"].": </b>".$tipo_documento.", ".$dni_jugador.". ".$lang["ins_cantera_email_3"].": ".$fecha_cad_dni."<br>";
			$contenido_email.="<b>".$lang["ins_cantera_email_4"].": </b>".$nombre." ".$apellidos."<br>";       
			$contenido_email.="<b>".$lang["ins_cantera_email_5"].": </b>".$fecha_nacimiento.", ".$pais_nacimiento."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_6"].": </b>".$direccion.", ".$numero;
			if(!empty($piso))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$piso; }
			if(!empty($puerta)) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$puerta; }
			$contenido_email.=". CP: ".$codigo_postal." (".$poblacion.", ".$provincia.")<br>";
			
			$contenido_email.="<b>".$lang["ins_cantera_email_9"].": </b>".$sexo."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_10"].": </b>".$nacionalidad."<br>";     
			//$contenido_email.="<b>".$lang["ins_cantera_email_11"].": </b>".$talla_camiseta."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_12"].": </b>".$en_el_club."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_13"].": </b>".$alergias."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_14"].": </b>".$email."<br>";  
			$contenido_email.="<b>".$lang["ins_form_telefono_jugador"].": </b>".$jugador_telefono."<br>"; 
			$contenido_email.="<b>".$lang["ins_form_colegio"]." </b>".$jugador_colegio."<br>";  
			$contenido_email.="<b>".$lang["ins_form_curso"]." </b>".$jugador_curso."<br>";     
			$contenido_email.="<b>".$lang["ins_cantera_email_15"].": </b>".$modalidad."<br>";    //mostramos el equipo que ha seleccionado en el form, para mostrar el equipo de la bbdd jugadores hay que poner: $nombreequipo
			$contenido_email.="<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>";
			
			$contenido_email.="<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>";
			$contenido_email.="<b>".$lang["ins_cantera_email_17"].": </b>".$num_hermanos;
			if(!empty($num_hermanos)){
				$array_edades=explode("-",$edades);
				$contenido_email.=" (";
				foreach($array_edades as $edad){    
					$contenido_email.=$edad.", "; 
				}
				
				$contenido_email= substr($contenido_email, 0, -2);
				$contenido_email.=")<br>";
			}
			$contenido_email.="<br><b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"S??, (".$familia_monoparental_padre_madre.")":"No")."<br>";  
//error_log($familia_monoparental);
//error_log($familia_monoparental_padre_madre);

			if($familia_monoparental===1  && $familia_monoparental_padre_madre==="MADRE")   
			{   
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$nombre_madre." ".$apellidos_madre." ".$lang["ins_cantera_email_20"].": ".$dni_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_madre.", ".$telefono_madre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_madre."<br>";    
			}
			else if($familia_monoparental===1 && $familia_monoparental_padre_madre==="PADRE")   
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$nombre_padre." ".$apellidos_padre." ".$lang["ins_cantera_email_20"].":".$dni_padre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_padre.", ".$telefono_padre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_padre."<br>";      
			}
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				$contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$nombre_madre." ".$apellidos_madre." ".$lang["ins_cantera_email_20"].":".$dni_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_madre.", ".$telefono_madre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_madre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$nombre_padre." ".$apellidos_padre." ".$lang["ins_cantera_email_20"].":".$dni_padre."<br>";    
				$contenido_email.="<b>".$lang["ins_cantera_email_21"].": </b>".$email_padre.", ".$telefono_padre."<br>";
				$contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>".$estudios_padre."<br>";      
			}
			
			$contenido_email.="</p></div><div><h3>".$lang["domiciliacion_titulo"].":</h3>";
			$contenido_email.="<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni;
			$contenido_email.="<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
			$contenido_email.="<br><p><b>".$lang["ins_escuela_email_metodopago"].":</b> ".$metodopago."</p>";


//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($contenido_email);
			/****************************************************************************
			* Patronato. PREPARAMOS PDF 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
			require_once('./lib/TCPDF/Alqueria/tcpdf_include.php');
			$datos_plantilla_PDF['contenido_pdf']   =   $contenido_email;
			$cifrado_md5        =   substr(md5($inscripcion['id_inscripcion']), 0, 7);
			$datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
			include "./lib/TCPDF/Alqueria/tramites/plantilla_vacia_inscripciones.php";

			$email_enviado=envios_emails::enviar_email_nueva_inscripcion_cantera_2020(
								$asunto_email,  $contenido_cabecera.$contenido_email, $email, $nombre." ".$apellidos, 
								$email_padre, $nombre_padre, $email_madre, $nombre_madre, 
								"pdf/".$datos_plantilla_PDF['ruta_archivo'],$datos_plantilla_PDF['ruta_archivo']);
			
			/***********************************************
			 * Por ultimo, decidir si hay URL de TPV o no 
			 **********************************************/

			if($metodopago==="TARJETA")
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
				//  PREPARO URL PARA TPV
			   /* if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
				{   $url='https://servicios.alqueriadelbasket.com/';    }
				else
				{   $url='http://localhost/serviciosalqueria3/';     }
			   */
				$url='https://servicios.alqueriadelbasket.com/'; 
				//$url='http://localhost/serviciosalqueria3/';
				 
//error_log($url.'tpv_renov_inscripciones/tpv.php?pedido='.$numeropedido.'&titular='.$banco_titular.'&lang='.$_SESSION['idioma']);
				echo json_encode(
					array(
						"response"=>"success",
						"message"=>"La inscripci??n se ha insertado correctamente.",
						"url"=>$url.'tpv_renov_inscripciones/tpv.php?pedido='.$numeropedido.'&titular='.$banco_titular.'&lang='.$_SESSION['idioma'].'&importe='.$matricula
				));
				die;
			}
			else
			{
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log("alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf");
				echo json_encode(array(
					"response"  =>  "success",
					"message"   =>  $lang["ins_controller_inscripcion_cantera_correcta"],
					"ruta_pdf"  =>  "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf"
				));
				die;
			}
		}




		
		/*******************************************
		*  BACK INSCRIPCIONES ESCUELA CANTERA
		********************************************/
		/* Marcamos desde el back que la matricula ha sido pagada*/
		public function actionModificaPagadoInscripcionMatricula()
		{
			require "models/jugadores_pagos.php";
		   
			$idpago = $_POST['id'];

			error_log("Idpago: ".$_POST['id'], 1);

			if( isset($_POST['pagado']) )
			{
				//  error_log("De no pagado a pagado");
				$modif  = jugadores_pagos::ActualizaPagadoPorBack($idpago, "1", "Marcado como pagado desde el back");
				
			  
				if ($modif) {
					echo "<script text='javascript'> alert('El pago se actualizo correctamente');
					window.location.replace('?r=jugadores/Listar'); </script>";
					die;
				}
				else{
				   require "error.php"; 
				}
			}
			else
			{
				//  error_log("De pagado a no pagado");
				$modif = jugadores_pagos::ActualizaPagadoPorBack($idpago, "0", "Marcado como NO pagado desde el back");
			   
				if($modif)
				{
					echo "<script text='javascript'>
						alert('El pago se actualizo correctamente');
						window.location.replace('?r=jugadores/Listar');
					</script>";
					die;
				}
				else{
					require "error.php";
				}
			}
		}  

		// mostramos la ficha del jugador seleccionado desde el back
		public function actionImprimirFicha() 
		{

			// Comprobamos que el usuario tiene alg??n rol de administrador para continuar...
			if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {

				require "models/inscripciones_escuela_y_cantera.php";
				require "models/horarios.php";

				$seccioninscripcion = "Ficha inscripci??n  Temporada 2020/2021";


				// Recogemos la variable "id" de la URL para pas??rsela al modelo e incluirla en el cuerpo del HTML
				$idjugador = $_GET['id'];

				//sacamos el horario de entrenamiento del jugador
				$horarioequipo=horarios::findByid_jugador($idjugador);

				// Recogemos todos los datos del registro pas??ndole el id del jugador
				$contenidocorreo = inscripciones_escuela_y_cantera::findInscripciones_TemporadaByIdJugador($idjugador);

			   
				$StringHorarios = $horarioequipo["horario"];                
			   
				$numero = $contenidocorreo['numero_pedido'];
			  
				$contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

				if( $contenidocorreo['monoparental'] == 0 ){
					$monoparental="No";
				} else{ $monoparental="Si"; }

				$equipo = $contenidocorreo['equipo'];

			   
				$contenido = "<br>Inscripci??n en: " . $contenidocorreo['categoria'] . 
				"<br>Equipo: " . $contenidocorreo['equipo'] . 
				"<br>Horario: " . $StringHorarios . 
				"<br>Nombre y apellidos: " . $contenidocorreo['nombre'] ." " .$contenidocorreo['apellidos'] .
				"<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] .
				"<br>DNI Jugador: " . $contenidocorreo['tipo_documento'] ." " . $contenidocorreo['dni_jugador'] .
				"<br>Telefono Jugador: " . $contenidocorreo['telefono_jugador'] . " -Email: " .$contenidocorreo['email'] .
				// "<br>Talla camiseta: " . $contenidocorreo['talla_camiseta'] . 
				"<br>Alergias: " . $contenidocorreo['alergias'] .
				"<br>Colegio: " . $contenidocorreo['colegio'] . " -Curso: " .$contenidocorreo['curso'] .
				"<br>Nacionalidad: " . $contenidocorreo['nacionalidad'] . " -Pais nacimiento: " .$contenidocorreo['pais_nacimiento'] .

				"<br>Direcci??n: " . $contenidocorreo['direccion'] . " N??: " . $contenidocorreo['numero'] . " - " .$contenidocorreo['piso'] . " - " .$contenidocorreo['puerta'] .
				"<br>Poblaci??n: " . $contenidocorreo['poblacion'] . " CP: " . $contenidocorreo['codigo_postal'] . " - " .$contenidocorreo['provincia'] .

				"<br>Familia monoparental: " . $monoparental .
				"<br>Datos del padre: " . $contenidocorreo['nombre_padre'] ." " .$contenidocorreo['apellidos_padre']. " -Tel??fono: " . $contenidocorreo['telefono_padre'] . " -Email: " . $contenidocorreo['email_padre'] . " -DNI: " . $contenidocorreo['dni_padre'] . 
				"<br>Datos de la madre: " . $contenidocorreo['nombre_madre'] ." " .$contenidocorreo['apellidos_madre']. " -Tel??fono: " . $contenidocorreo['telefono_madre'] . " -Email: " . $contenidocorreo['email_madre'] . " -DNI: " . $contenidocorreo['dni_madre'] . 
				"<br>N?? de hermanos: " . $contenidocorreo['num_hermanos'] . " -Edades: " . $contenidocorreo['edades'] .
			   
				"<br>Acepta las condiciones expuestas: Si"  ;
			   
				// Creamos todo el cuerpo del PDF en HTML
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
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripci??n.</strong></p>
													<p><strong>N??mero de pedido:</strong> '.$numero.'</p>
													<p>'.$contenido.'</p>
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

				echo "<pre>";
				echo $body;
				echo "</pre>";
			}
			else {
				require('error.php');
			}
		}

        // mostramos la ficha del jugador seleccionado desde el back
        public function actionImprimirFichaEquipo()
        {

            // Comprobamos que el usuario tiene alg??n rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {

                require "models/formularios_liga_alqueria.php";
                require "models/formularios_liga_alqueria_jugadores.php";

                $seccioninscripcion = "Ficha equipos liga alqueria";


                // Recogemos la variable "id" de la URL para pas??rsela al modelo e incluirla en el cuerpo del HTML
                $idEquipo = $_GET['id'];

                //sacamos el horario de entrenamiento del jugador
                $datosEquipo=formularios_liga_alqueria::findByID($idEquipo);

                $activo = "Si";
                $activoClasificacion = "Si";
                $autorizaDatos = "Si";
                $autorizaImagen = "Si";

                if ($datosEquipo['activo'] == 0) $activo = "No";
                if ($datosEquipo['activo_clasificacion'] == 0) $activoClasificacion = "No";
                if ($datosEquipo['condiciones_uso_autoriza_datos'] == 0) $autorizaDatos = "No";
                if ($datosEquipo['condiciones_uso_autoriza_imagen'] == 0) $autorizaImagen = "No";

                $contenido = "<br>Inscripci??n en: Liga Alqueria" .
                    "<br>Equipo: " . $datosEquipo['NombreEquipo'] .
                    "<br>Fecha de alta: " .$datosEquipo['FechaAlta'] .
                    "<br>Nombre del responsable: " . $datosEquipo['ResponsableNombre'] .
                    "<br>Tel??fono del responsable: " . $datosEquipo['ResponsableTelefono'] .
                    "<br>E-mail del Responsable " . $datosEquipo['ResponsableEmail'] .
                    "<br>DNI del responsable: " . $datosEquipo['ResponsableDNI'] .
                    "<br>Categoria: " . $datosEquipo['Categoria'] .
                    "<br>Color Eq. principal: " . $datosEquipo['ColorEquipacionPrincipal'] .
                    "<br>Color Eq. secundaria: " . $datosEquipo['ColorEquipacionSecundaria'] .

                    "<br>D??a / Hora de Juego: " . $datosEquipo['DiaJuego'] . " a las: " . $datosEquipo['HoraJuego'] .
                    "<br>Equipo activo: " . $activo .
                    "<br>Activo en la clasificaci??n: " . $activoClasificacion .
                    "<br>Equipo autoriza el uso de datos: " . $autorizaDatos .
                    "<br>Equipo autoriza el uso de imagen: " . $autorizaImagen;

                // Creamos todo el cuerpo del PDF en HTML
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
														<img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
														alt="Alqueria del Basket" width="547" height="81" style="display: block;">
													</a>
												</td>
											</tr>
											<tr>
												<td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
													<h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
													<p><strong>Estos son los datos recibidos relacionados con su inscripci??n.</strong></p>
													<p>'.$contenido.'</p>
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

                echo "<pre>";
                echo $body;
                echo "</pre>";
            }
            else {
                require('error.php');
            }
        }

        //cargar los datos de la ficha del jugador en el back
		public function actionMostrarModalJugador() 
		{
				
				$idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

				if(!empty($idinscripcion))
				{
					require "models/inscripciones_escuela_y_cantera.php";
					require "includes/Utils.php";

					$datos  =   inscripciones_escuela_y_cantera::findInscripciones_TemporadaByIdInscripcion($idinscripcion);
					
					//error_log(__FILE__.__LINE__);
				   // error_log(print_r($datos,1));

	   
					echo json_encode(array(
						"response"      =>  "success",
						"instancia"     =>  $datos,
						"modal_title"   =>  "Formulario de inscripci??n en Escuela o Cantera",
						"message"       =>  "Los datos de la inscripci??n se han cargado correctamente."
						));
					die;
				} 
				else
				{
					echo json_encode(array(
						"response"      => "error",
						"instancia"     => "",
						"modal_title"   => "Error",
						"message"       => "Parece que ha habido alg??n error"));
				}
			   

		}


		//cargar los datos de la ficha del jugador de patronato en el back
		public function actionMostrarModalJugadorPatronato() 
		{
			//error_log(__FILE__.__LINE__);
			   //error_log(print_r($_POST,1));
				
				$idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

				error_log(" id inscrpcion jugador patronato: ".$idinscripcion);

				if(!empty($idinscripcion))
				{
					require "models/inscripciones_escuela_y_cantera.php";
					require "includes/Utils.php";

					$datos  =   inscripciones_escuela_y_cantera::findInscripciones_TemporadaByIdInscripcionPatronato($idinscripcion);
 //error_log(print_r($datos, 1));
					echo json_encode(array(
						"response"      =>  "success",
						"instancia"     =>  $datos,
						"modal_title"   =>  "Formulario de inscripci??n Patronato",
						"message"       =>  "Los datos de la inscripci??n se han cargado correctamente."
						));
					die;
				} 
				else
				{
					echo json_encode(array(
						"response"      => "error",
						"instancia"     => "",
						"modal_title"   => "Error",
						"message"       => "Parece que ha habido alg??n error"));
				}
		}
		
		public function actionGeneraPNGs()
		{
			require "models/jugadores.php";
			require "models/inscripciones_escuela_y_cantera.php";
			
			$inscripciones_escuela_y_cantera=inscripciones_escuela_y_cantera::findAll();
		  
			//  Crear carpeta donde se guardaran las firmas
			$dir_firmas =   "inscripciones/firmas/";
			
			if(!file_exists($dir_firmas) && !is_dir($dir_firmas))
			{   mkdir($dir_firmas);  }
			
			foreach($inscripciones_escuela_y_cantera as $instancia)
			{
				$instancia["firma_jugador"];
				$instancia["firma_tutor"];
				$instancia["id_inscripcion"];
				$instancia["id_jugador"];
				
				/*************************************
				 * FIRMA JUGADOR
				 ************************************/
				$data = $instancia["firma_jugador"];
				list($type, $data) = explode(';', $data);
				list(, $data)      = explode(',', $data);
				$data = base64_decode($data);

				file_put_contents($dir_firmas.$instancia["id_inscripcion"].'-firmajugador.png', $data);
				
				
				/*************************************
				 * FIRMA TUTOR
				 *************************************/
				$data2 = $instancia["firma_tutor"];
				list($type2, $data2) = explode(';', $data2);
				list(, $data2)      = explode(',', $data2);
				$data2 = base64_decode($data2);

				file_put_contents($dir_firmas.$instancia["id_inscripcion"].'-firmatutor.png', $data2);
			}
		}


		/***************************
		 *  ACADEMY
		 **************************/
		/** Carga la vista del formulario a inscripci??n a Academy */
		public function actionAlqueriaAcademy()
		{
			require "config.php";
			vistaSimple("layout_AlqueriaAcademy");
		}
		
		/** Gesitona el formulario de inscripci??n a Academy*/
		public function actionInscripcionAcademy()
		{
			//  Utils.php para validar cuenta bancaria
			require "includes/Utils.php";
			//  envios_emails.php para envios de emails. 
			require "PHPMailer/envios_emails.php";
			//  Idioma para el email o PDF
			require 'lang/publico_'.$_SESSION['idioma'].'.php';     
			
			require "models/academy_inscripciones.php";
			
			Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");
			
			
			/****************************************************************************
			* Gesti??n de errores de fechas
			***************************************************************************/
			try{
				$fecha_nacimiento           = filter_input(INPUT_POST, 'fechanacimiento',FILTER_SANITIZE_STRING);
				$fecha_nacimiento_procesada = date( "Y-m-d", strtotime( $fecha_nacimiento ) );
				$fecha_nacimiento           = date ( "Y", strtotime( $fecha_nacimiento ) );
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("Ha ocurrido un error con la fecha de nacimiento con la inscripci??n hecha por: ".$_POST['email']);
				error_log(print_r($e,1));
				$fecha_nacimiento_procesada=date("Y-m-d");
			}
			
			try{
				if( $fecha_nacimiento > "2007" || $fecha_nacimiento < "2002" )
				{
					echo json_encode( array(
						"response"  => "error",
						"message"   => "La edad para poder inscribirse es entre 13 y 18 a??os."
					));
					die;
				}
			}
			catch(Exception $e)
			{
				error_log(__FILE__.__FUNCTION__.__LINE__);
				error_log("Ha ocurrido un error con la fecha de nacimiento con la inscripci??n hecha por: ".$_POST['email']);
				error_log(print_r($e,1));
				$fecha_nacimiento_procesada=date("Y-m-d");
			}

			
			/****************************************************************************
			* Gesti??n de errores de cuenta bancaria
			***************************************************************************/
			$cuentaBancaria     =   $_POST['iban'] . $_POST['entidad'] . $_POST['oficina'] . $_POST['dc'] . $_POST['cuenta'];
			$cuentaValidada     =   Utils::validateEntity($cuentaBancaria);
			if(!$cuentaValidada)
			{
				echo json_encode(array(
					"response"  => "error",
					"message"   => "<h4>".$lang["ins_controller_cuenta_incorrecta"].""
				));
				die;
			}
			
			
			/***************
			* INSERCI??N
			****************/
			try{
				$inscripcion_academy=academy_inscripciones::insert(
				null,                           strtoupper($_POST['nombre']),       strtoupper($_POST['apellidos']),    $fecha_nacimiento_procesada,    
				$_POST['telefono'],             $_POST['movil'],                    strtolower($_POST['email']),        strtoupper($_POST['tratamientosmedicos']),  
				strtoupper($_POST['alergias']), strtoupper($_POST['club']),         strtoupper($_POST['categoria']),    strtoupper($_POST['altura']),
				strtoupper($_POST['tallaropa']),strtoupper($_POST['trayectoria']),  strtoupper($_POST['titular']),      strtoupper($_POST['dnititular']),
				$_POST['iban'],                 $_POST['entidad'],                  $_POST['oficina'],                  $_POST['dc'], 
				$_POST['cuenta'],               0,                                  null);
			}
			catch(Exception $e)
			{
				error_log( __FILE__.__FUNCTION__.__LINE__ );
				error_log( "Ha ocurrido un error con el insert de la inscripcion" );
				error_log( print_r( $_POST, 1 ) );
				error_log( print_r( $e, 1 ) );
				echo json_encode( array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error inesperado. Contacte con nosotros indic??ndonos su email ".$_POST['email']." para revisaremos la incidencia."
				));
				die;
			}

			
			/***************************************************************************************
			 *  Hecha la inserci??n, ahora, generamos el numero de pedido con el ID para ir al TPV
			 **************************************************************************************/
			try{
				if ( $inscripcion_academy["ID"] <= 9 ) {
					$numeropedido = "000" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] <= 99 ){
					$numeropedido = "00" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] <= 999 ){ 
					$numeropedido = "0" . $inscripcion_academy["ID"] . "academy";
				} else if( $inscripcion_academy["ID"] >= 1000 ){
					$numeropedido =  $inscripcion_academy["ID"] . "academy";
				}

				$academy_inscripciones=academy_inscripciones::updateAttribute($inscripcion_academy["ID"], "numero_pedido", $numeropedido, "si");
			}
			catch(Exception $e)
			{
				error_log( __FILE__.__FUNCTION__.__LINE__ );
				error_log("Ha ocurrido un error con la insercion.");
				error_log( print_r( $_POST, 1 ) );
				error_log( print_r( $e, 1 ) );
				echo json_encode( array(
					"response"  => "error",
					"message"   => "Ha ocurrido un error inesperado. Contacte con nosotros indic??ndonos su email ".$_POST['email']." para revisaremos la incidencia."
				));
				die;
			}

			
			/****************************************************************************
			* CANTERA. PREPARAMOS EL PDF con los datos de la inscripcion y los dejamos en 
			*   - En el PDF metemos el ID de $inscripcion
			* ***************************************************************************/
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
			
			require_once('./lib/TCPDF/Alqueria/tcpdf_include.php');
			$datos_plantilla_PDF['contenido_pdf']   =   $string_contenido_pdf;
			$cifrado_md5        =   substr(md5($academy_inscripciones['ID']), 0, 7);
			$datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-academy-".$cifrado_md5.".pdf";
			include "./lib/TCPDF/Alqueria/tramites/plantilla_vacia_academy.php";
			
			
			/************************************************
			 * Preparamos los datos para la URL del TPV
			 ************************************************/
			$matricula  =   1000;
			$titular    =   $_POST['nombre']." ".$_POST['apellidos'];
			
			//  PREPARO URL PARA TPV
			if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
			{   $url='https://servicios.alqueriadelbasket.com/'; }
			else
			{   $url='http://localhost/serviciosalqueria/'; }
					
			echo json_encode(array(
				"response"       => "success",
				"message"        => "tarjeta_ok",
				"url_redireccion"=> $url.'tpv_academy/tpv.php?pedido='.$numeropedido.'&titular='.$titular.'&importe='.$matricula.'&lang='.$_SESSION['idioma']
			));
			die;
		}

		//  TPV / RESPUESTA OK /  PEDIENTE EL ENVIO DE CORREO
		public function actionInscripcionAcademyOK()
		{
			require "config.php";
			include 'tpv_renov_inscripciones/apiRedsys.php'; 
			require "models/academy_inscripciones.php";
			
			// Se crea Objeto
			$miObj = new RedsysAPI;
		
			// Recibimos numpedido
			$version            =   $_GET["Ds_SignatureVersion"];
			$datos_respuesta    =   $_GET["Ds_MerchantParameters"];
			$signatureRecibida  =   $_GET["Ds_Signature"];

			$decodec            =   $miObj->decodeMerchantParameters($datos_respuesta);
			//$kc                 =   'sq7HjrUOBfKmC576ILgskD5srU870gJ7';         //  Clave para el entorno de pruebas
			$kc             =   '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';         //  Clave para el entorno de producci??n, recuperada de CANALES
			$firma              =   $miObj->createMerchantSignatureNotif($kc,$datos_respuesta);
			$Ds_Order           =   $miObj->getParameter("Ds_Order");
			
			//  Recuperamos la inscripcion a partir del pedido
			$academy_inscripciones  =   academy_inscripciones::findBynumero_pedido($Ds_Order);
			$cifrado_md5            =   substr(md5($academy_inscripciones['ID']), 0, 7); 
			
			$datos['link_pdf']  =   "pdf/academy/alqueriadelbasket.com-academy-".$cifrado_md5.".pdf";
			vistaSinvista(array('datos' => $datos), "layout_AlqueriaAcademy_pago_tpv_ok");
		}

		//  TPV / RESPUESTA KO
		public function actionInscripcionAcademyKO() 
		{
			require "config.php";
			include 'tpv_renov_inscripciones/apiRedsys.php';
			require "models/academy_inscripciones.php";
			
			// Se crea Objeto
			$miObj = new RedsysAPI;
		
			// Recibimos numpedido
			if(!empty($_GET["Ds_SignatureVersion"]))    {   $version           =   $_GET["Ds_SignatureVersion"];}   else{$version="";}
			if(!empty($_GET["Ds_MerchantParameters"]))  {   $datos_respuesta   =   $_GET["Ds_MerchantParameters"];} else{$datos_respuesta="";}
			if(!empty($_GET["Ds_Signature"]))           {   $signatureRecibida =   $_GET["Ds_Signature"];}          else{$signatureRecibida  ="";}
			
			$decodec            =   $miObj->decodeMerchantParameters($datos_respuesta);
			//$kc                 =   'sq7HjrUOBfKmC576ILgskD5srU870gJ7';         //  Clave para el entorno de pruebas
			$kc             =   '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';         //  Clave para el entorno de producci??n, recuperada de CANALES
			$firma              =   $miObj->createMerchantSignatureNotif($kc,$datos_respuesta);
			$Ds_Order           =   $miObj->getParameter("Ds_Order");
			$Ds_Response        =   $miObj->getParameter("Ds_Response");
			
			//  Recuperamos la inscripcion a partir del pedido
			$academy_inscripciones  =   academy_inscripciones::findBynumero_pedido($Ds_Order);
			$cifrado_md5            =   substr(md5($academy_inscripciones['ID']), 0, 7); 
			
			$datos['link_pdf']  =   "pdf/academy/alqueriadelbasket.com-academy-".$cifrado_md5.".pdf";
			
			//  Preparamos datos para la vista
			$datos['Ds_Order']              =   $Ds_Order;
			$datos['Ds_Response_texto']     =   "(".$Ds_Response.") ".self::getDescripcion_Ds_Response($Ds_Response); // 101 para ver ejemplo 
			$datos['academy_inscripciones'] =   $academy_inscripciones;
			vistaSinvista(array('datos' => $datos), "layout_AlqueriaAcademy_pago_tpv_ko");
		}
	}
?>