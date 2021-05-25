<?php
	$db = array(
		'dbhost' => 'localhost',
		'dbname' => 'alqueriaforms',
		'dbuser' => 'root',
		'dbpass' => '');

	$dbservicios = array(
		'dbhost' => 'localhost',
		'dbname' => 'alqueriaforms',
		'dbuser' => 'root',
		'dbpass' => '');

	$dbalqueria = array(
		'dbalq_host' => 'localhost',
		'dbalq_name' => 'alqueria',
		'dbalq_user' => 'root',
		'dbalq_pass' => '');

	$dbvbasket = array(
		'dbvb_host' => '192.168.110.123',
		'dbvb_name' => 'vbasket',
		'dbvb_user' => 'basket',
		'dbvb_pass' => 'Abc01cba');

	$dbvbasket2 = array(
		'dbvb_host' => '192.168.110.123',
		'dbvb_name' => 'alqueria',
		'dbvb_user' => 'alqueria',
		'dbvb_pass' => 'Abc01cba');

	
    //  Datos para el envío de emails
    define('__phpmailer_host__',  'in-v3.mailjet.com');   
    define('__phpmailer_port__',  587);  
    define('__phpmailer_username__',  '1c96c2909ac708240c4491b5a821fa21');
    define('__phpmailer_password__',  '187201d6b77557358403ccbc07cee13a');   

    if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
    {
        define('__dir_pdf__','C:\inetpub\wwwroot\alqueriaforms\pdf\\');
        define('__dir_pdfinscripciones__','C:\inetpub\wwwroot\alqueriaforms\inscripciones\\');
    }
    else
    {
        //  Valores para desarrollo / localhost 
        define('__dir_pdf__','C:\xampp\htdocs\serviciosalqueria\pdf\\');  
        define('__dir_pdfinscripciones__','C:\xampp\htdocs\serviciosalqueria\inscripciones\\');
    }
    
	// La función vista se encarga de montar una pantalla con tres elementos: vista, datos y layout
	function vista($vista, $datos, $layout) {
		extract($datos); //define el contenido de $datos como variables
		ob_start();
		require 'views/'.$vista.'.php';
		$contenido = ob_get_clean();
		require 'layouts/'.$layout.'.php';
	}


	// La función vistaSimple carga una pantalla sólo con el layout
	function vistaSimple($layout) {
		require 'layouts/'.$layout.'.php';
	}


	// La función vistaSinvista carga la pantalla sin el elemento vista
	function vistaSinvista($datos, $layout) {
		extract($datos);
		ob_start();
		$contenido = ob_get_clean();
		require 'layouts/'.$layout.'.php';
	}
?>