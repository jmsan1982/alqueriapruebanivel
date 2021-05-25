<?php
	session_start ();

    /*  OBTENEMOS IDIOMA:
     *  - Si hay idioma en la URL, machacamos lo que haya.
     *  - Sino, si existe IDIOMA en session, lo dejamos.
     *  - Sino, establecemos idioma según el idioma del navegador. Si es español de España -> VAL. Si es otro -> ENG
     */
    if(isset($_GET['idioma']) && ($_GET['idioma']=="cas" || $_GET['idioma']=="val" || $_GET['idioma']=="eng")){
        $_SESSION['idioma'] = $_GET['idioma'];
    }
    else if(isset($_SESSION['idioma']))
    {}
    else{
        if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,5))=="es-es")
        {
            $_SESSION['idioma'] = "val";
        }
        else{
            $_SESSION['idioma'] = "eng";
        }
    }

	require "db.php";			// Conexión a alqueriaforms
	require "db_utf8.php";		// Conexión a alqueriaforms con utf8
	require "db_2.php";			// Conexión a alqueria
	require "db_2_utf8.php";	// Conexión a alqueria con utf8
	require "dbvbasket.php";	// Conexión a vbasket bbdd vbasket
	require "dbvbasket2.php";	// Conexión a vbasket bbdd alqueria

	if (isset($_GET['r'])) {
		$r = $_GET['r'];
	}
	else {
		$r = 'index/principal';
	}

	list($controllername,$action) = explode('/',$r);

	$controllerclass = $controllername.'Controller';

	if (file_exists("controllers/$controllerclass.php")) {
		require "controllers/$controllerclass.php";

		$controller = new $controllerclass;
	}
	else {
		die ("<h1>Error al crear controlador.</h1> ".$controllerclass);
	}

	$metodo = 'action'.$action;

	if (!method_exists($controller,$metodo)) {
		die("<h1 style='text-align:center;margin-top:20%;'>No existe esa acción.</h1>");
	}
	else {
		$controller->$metodo();
	}

	ob_end_flush();
?>