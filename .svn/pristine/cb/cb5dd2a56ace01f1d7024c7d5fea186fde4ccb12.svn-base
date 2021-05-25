<?php
session_start ();

if(!isset($_SESSION['idioma'])){
	$_SESSION['idioma'] = "cas";
}

require "db.php";   //conexion a alqueriaforms


if(isset($_GET['r'])) 
    $r=$_GET['r'];  
else{
        $r='index/principal';
      }
    
list($controllername,$action)=explode('/',$r);

$controllerclass=$controllername.'Controller';

if(file_exists("controllers/$controllerclass.php")) {
    require "controllers/$controllerclass.php";

    $controller=new $controllerclass;

} else
    die ("<h1>Error al crear controlador</h1> ".$controllerclass);


$metodo='action'.$action;
if(!method_exists($controller,$metodo))
    die("<h1 style='text-align:center;margin-top:20%;'>No existe esa acción</h1>");
else
    $controller->$metodo();

ob_end_flush();
?>