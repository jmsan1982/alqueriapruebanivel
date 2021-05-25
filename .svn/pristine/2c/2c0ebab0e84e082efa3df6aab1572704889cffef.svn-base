<?php
$db = array(
    'dbhost' => 'localhost',
    'dbname' => 'alqueriaforms',
    'dbuser' => 'root',
    'dbpass' => ''
);

/**  La función vista se encarga de montar una pantalla con tres elementos: vista, datos y layuot */
function vista($vista, $datos, $layout)
{
    extract($datos);//define el contenido de $datos como variables
    ob_start();
    require 'views/' . $vista . '.php';
    $contenido = ob_get_clean();
    require 'layouts/' . $layout . '.php';
}

/** *La función vistaSimple carga una pantalla sólo con el layout   */
function vistaSimple($layout)
{
    require 'layouts/' . $layout . '.php';
}

/** La función vistaSinvista carga la pantalla sin el elemento vista **/
function vistaSinvista($datos, $layout)
{
    extract($datos);
    ob_start();
    $contenido = ob_get_clean();
    require 'layouts/' . $layout . '.php';
}
?>