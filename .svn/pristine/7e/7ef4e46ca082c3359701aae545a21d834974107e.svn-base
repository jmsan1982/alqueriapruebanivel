<?php
    class incidenciasController {
   
        //Lamada al layout desde el menu para grabar una nueva incidencia
        public function actionincidencias()
        {
            require "config.php";
            vistaSimple("layout_incidencias");
           
        }



        //llamada al back
        public function actionBackIncidencias()
        {
            
            require "models/incidencias.php";

            $datos['inscripciones'] = incidencias::findAllIncidencias();
           // $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_incidencias");
            
        }

        

        // Hace una nueva inscripción en Incidencias
        public function actionIncidenciasForm() {
            if (isset($_POST['nombre'])) {

                require "models/incidencias.php";


                $fecharegistro  = date("Y-m-d H-i-s");
                $email          = utf8_decode($_POST['email']);    
                $nombre         = utf8_decode($_POST['nombre']);
                $tipo           = utf8_decode($_POST['tipo_incidencia']);  
                $detalle        = utf8_decode($_POST['observaciones']);


                    /* Formateo Nombre Imagen  */

                    // explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."

                $valores = explode(".", $_FILES['imagen']['name']);

                    // Guardamos la extensión original del archivo subido
                $extension = $valores[count($valores)-1];


                    // Formateamos el nombre ...
                $nombre_base = $_POST['nombre'];
                    // Sustituimos los espacios por guiones
                $nombre_format = str_replace ( " " , "-" , $nombre_base);
                    // Sustituimos los puntos por guiones
                $nombre_format = str_replace ( "." , "-" , $nombre_format);


                    // Quitamos todos los acentos, eñes y carácteres raros
                setlocale(LC_ALL, 'en_US.UTF8');
                $nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
                  

                    // Configuramos carpeta de guardado de imágenes
                $dir_subida = 'img/incidencias/';

                if ($_FILES['imagen']['error'] == 0) {
                        // Damos formato al nombre de la imagen 1
                    $fichero1       = $nombre_format."-".date("d-m-Y-H-i-s").".".$extension;
                    $ficherosubido1 = $dir_subida . $fichero1;

                        // Guardamos la imagen 1 (si corresponde) en la carpeta del servidor
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $ficherosubido1);
                }
                else {
                    $ficherosubido1 = "";
                }



                $nuevoformulario = incidencias::newFormIncidencias($fecharegistro,  $nombre, $tipo, $detalle,   $ficherosubido1,   $email );
                        
                if($nuevoformulario){

                    //  Enviamos un email con los datos de la incidencia
                    //incidencias::mailsSendIncidencia($nombre, $fecharegistro, $email_solicitante, $tipo, $detalle);
                    
                   // header('Location: http://localhost/serviciosalqueria/?r=incidencias/Ok&codigo=' . $fecharegistro);
                    header('Location: https://servicios.alqueriadelbasket.com/?r=incidencias/Ok&codigo=' . $fecharegistro);
                }
                else{
                    echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                    window.location.replace('?r=incidencias/incidencias'); </script>";
                    die;
                }
                



            }
        }



        public function actionOk() {
            require "models/incidencias.php";

            $fecha = $_GET['codigo'];


            $contenidocorreo = incidencias::findIncidenciaporFecha($fecha);

            $contenidocorreo['fecharegistro'] = date("d/m/Y", strtotime($contenidocorreo['fecharegistro']));

            $contenido =
            "Incidencia abierta por: ".$contenidocorreo['nombre'].
            "<br>Fecha de registro: ".$contenidocorreo['fecharegistro'].
            "<br>Tipo: ".$contenidocorreo['tipoincidencia'].
            "<br>Detalle: ".$contenidocorreo['detalle'].
            "<br>Correo electrónico: ".$contenidocorreo['email'];
           
            $enviodecorreo = incidencias::mailsSendIncidencia($contenidocorreo['idincidencia'], $contenido, "Registro de incidencia en L´Alqueria", $contenidocorreo['email']);

            if ($enviodecorreo) {
                 //vistaSimple("layout_ok");
                echo "<script text='javascript' charset='utf-8'> alert('La incidencia se registro correctamente');
                                    window.location.replace('?r=incidencias/incidencias'); </script>";
                die;
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }






        public function actionImprimirFichaIncidencia() {

             require "models/incidencias.php";
           
            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $id = $_GET['numeropedido'];

            $seccioninscripcion = "Registro de incidencia en L´Alqueria";

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = incidencias::findIncidenciaporId($id);

            $contenidocorreo['fecharegistro'] = date("d/m/Y", strtotime($contenidocorreo['fecharegistro']));

            $contenido =
            "Incidencia abierta por: ".utf8_encode($contenidocorreo['nombre']).
            "<br>Correo electrónico: ".$contenidocorreo['email'].
            "<br>Fecha de registro: ".$contenidocorreo['fecharegistro'].
            "<br>Tipo: ".utf8_encode($contenidocorreo['tipoincidencia']).
            "<br>Detalle: ".utf8_encode($contenidocorreo['detalle']).
            "<br>Cerrada por: ".utf8_encode($contenidocorreo['cerrada_por']).
            "<br>Observaciones mantenimiento: ".utf8_encode($contenidocorreo['observ_internas']);
            

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
                                                    <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
                                                    alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
                                                <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
                                                <p><strong>Estos son los datos recibidos relacionados con su incidencia.</strong></p>
                                                <p><strong>Número de incidencia:</strong> '.$id.'</p>
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
                                                                            <img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                        </a>
                                                                    </td>
                                                                    <td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
                                                                    <td>
                                                                        <a href="https://twitter.com/LAlqueriaVBC" target="_blank">
                                                                            <img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
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


        public function actionExportToExcelIncidencias()
        {

            require "models/incidencias.php";

            $datos['inscripciones'] = incidencias::findAllInscripcionesExcelIncidencias();


            if(isset($_POST["export_data"])) {
                $filename = "Incidencias".date('Ymd') . ".xls";
                header('Content-Encoding: UTF-8');
                header('Content-Type: text/html; charset=utf-16');
           // header("Content-Type: application/vnd.ms-excel");
                header("Content-Type: application/vnd.ms-excel; charset=utf-16");
                header("Content-Disposition: attachment; filename=".$filename."");
                header('Cache-Control: max-age=0');
                $show_coloumn = false;
                if(!empty($datos['inscripciones'])) {

                    foreach($datos['inscripciones'] as $inscripcion) {

                        if(!$show_coloumn) {
                          // display field/column names in first row
                            echo implode("\t", array_keys($inscripcion)) . "\r\n";
                            $show_coloumn = true;
                        }
                   // echo implode("\t", array_values($inscripcion)) . "\r\n";
                        echo implode("\t", array_values($inscripcion)) . "\r\n";
                       // iconv("UTF-8", "ISO-8859-1//TRANSLIT", $alumno['nombre']),
                    }
                }
                exit;
            }
        }


        public function actionModificarEstadoIncidencia()
        {
            if(isset($_POST['id'])){

                require "models/incidencias.php";

                $codigo = $_POST['id'];
                $solucionado = 1;
                // $solucionado = $_POST['pagado'];
                $incidencia = incidencias::findIncidenciaporId($_POST['id']);
               
                require('includes/head.php'); ?>

                <script type='text/javascript' src='ckeditor/ckeditor.js'></script>
                <link rel="stylesheet" type="text/css" href="backmeans/assets/css/bootstrap.css">
                <link rel="stylesheet" type="text/css" href="backmeans/assets/css/doc.css">
                <link rel="stylesheet" type="text/css" href="backmeans/assets/css/checkbox.css">

                <div style='width:100%;padding-top:5%;background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url("backmeans/images/logo.jpg");overflow-x: hidden;'>
                    <div class='contact-form-wrapper' style='width:80%;margin-left:10%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:50px;'>
                        <div class='boxed-content left-boxed-icon'>
                            <a href='?r=incidencias/BackIncidencias'>
                                <i class='fa fa-close fa-2x' style='float:right;border-radius:5px;padding:9px;width:40px;height:40px;background-color:#d9534f;line-height:20px;'></i>
                            </a>
                            <h4 style="color:#406da4;"><b>FORMULARIO PARA LA MODIFICACIÓN DE UNA INCIDENCIA</b></h4> 
                        </div>
                        <br />

                        <form method='post' class='form-horizontal' role='form' action='?r=incidencias/ModificarEstadoIncidencia' enctype="multipart/form-data">
                            <div class='row'>
                                <div class='form-group'>
                                    <div class='col-sm-3'>
                                        <p style="color:#406da4;"><b>Incidencia nº:</b></p>
                                        <div class='input-group'>
                                            <input type='text' name='idinc' value="<?php echo $incidencia['idincidencia'];?>" class='form-control' readonly="readonly">
                                            <span class='input-group-addon'><i class='fa fa-tags' style='color:black;'></i></span>
                                        </div>
                                    </div>

                                    <div class="col-sm-3" style="padding-top: 30px;">
                                        <h5 style="color:#406da4;float:left;padding-right:10px;padding-left: 10px;"><b> ¿Cerrada? </b></h5>
                                        <label class="switch" style="margin-top:5px;">
                                           <input type="checkbox" name="cerrada" <?php if($incidencia['solucionado']){echo "checked";} ?>>
                                           <span class="slider round"></span>
                                        </label>
                                    </div>

                                    <div class='col-sm-6'>
                                        <p style="color:#406da4;"><b>Quien resuleve la incidencia:</b></p>
                                        <div class='input-group'>
                                            <input type='text' name='cerradapor' value="<?php echo utf8_encode($incidencia['cerrada_por']);?>" class='form-control' required>
                                            <span class='input-group-addon'><i class='fa fa-user' style='color:black;'></i></span>
                                        </div>
                                    </div>
                                </div>
                                <br />

                                <div class="form-group">
                                    <div class='col-sm-12'>
                                        <p style="color:#406da4;"><b>Observaciones de mantenimiento</b></p>
                                        <div class='input-group'>
                                            <input type='text' name='observ' value="<?php echo utf8_encode($incidencia['observ_internas']);?>" class='form-control' required>
                                            <span class='input-group-addon'><i class='fa fa-tags' style='color:black;'></i></span>
                                        </div>
                                    </div>    
                                </div> 
                                <br />
                                

                                <!-- Mando por oculto el id del entrenador a este mismo controlador -->    
                                <input type='hidden' name='id_incidencia' value="<?php echo $incidencia['idincidencia'];?>"> 
                               

                                <div class="form-group col-md-12">
                                    <div class='col-sm-12' style='text-align:left;margin-top:10px;'>
                                        <div class='col-sm-6'>
                                            <button type='submit' class='btn btn-primary btn-block' style="height:50px;font-size:20px;transform: none;">Guardar registro</button>
                                        </div>
                                        <div class='col-sm-6'>
                                            <a href='?r=incidencias/BackIncidencias' style="text-decoration: none;"><input class='btn btn-danger btn-block' value='Cancelar' style='font-family:sans-serif;font-size:20px;height:50px;transform: none;'></a>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br /><br />
        <?php 
            }   //cierre if
    


                if (isset($_POST['id_incidencia'])){
                    require "models/incidencias.php";

                    $persona = utf8_decode($_POST['cerradapor']);
                    $observ = utf8_decode($_POST['observ']);
           
                    $codigo = $_POST['id_incidencia'];
                    $fecha  = date("Y-m-d H-i-s"); //fecha de cierre
                    if(isset($_POST['cerrada'])){
                        $solucionado = 1;    
                    }
                    else{
                        $solucionado = 0;
                    }


                    $modif = incidencias::ActualizaEstadoIncidencia($codigo, $solucionado, $fecha, $persona,  $observ );

                }


        }

        








    }
?>