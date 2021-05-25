<?php
    class skillscampController {

        /*
        public function actionok() {

            require "models/skillcamp.php";

            if (isset($_GET['codigo'])) {


                $codigo = $_GET['codigo'];

                $pagado = 1;

                $actualizaestado = skillcamp::actualizapagadoretornotpv($codigo, $pagado);

                $contenidocorreo = skillcamp::damedatosescuelafem($codigo);

                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

                if($contenidocorreo['opcion']=="jugadoresinternos"){

                    $opcion="Jugadores Internos";
                }
                elseif($contenidocorreo['opcion']=="jugadoresexternos"){

                    $opcion="Jugadores Externos";
                }
                elseif($contenidocorreo['opcion']=="jugadoresexternosvbc"){

                    $opcion="Jugadores Externos VBC";
                }
                elseif($contenidocorreo['opcion']=="hermanosvbc"){

                    $opcion="Hermano VBC";
                }
                elseif($contenidocorreo['opcion']=="internosdoscampus"){

                    $opcion="Jugadores Internos Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="externosdoscampus"){

                    $opcion="Jugadores Externos Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="externosvbcdoscampus"){

                    $opcion="Jugadores Externos VBC Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="hermanosdoscampus"){

                    $opcion="Hermano VBC Shooting y Skills Camp 2019";
                }

             

                $contenido = "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Opción: " . $opcion .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>Transporte: " . $contenidocorreo['transporte'] .  
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>Autorización de imagenes: " . $contenidocorreo['autorizoimagen'] . 
                "<br>Importe: " . $contenidocorreo['importe']; 
                  

                $enviodecorreo = skillcamp::mailssendSkillscamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Skills Camp 2019", $contenidocorreo['emailtutor']);
              

                if ($enviodecorreo) {
                    vistaSimple("layout_ok");
                }
                else {
                    vistaSimple("layout_kocorreo");
                }
            }
        }


        public function actionokpagooficina() {

            require "models/skillcamp.php";
            
            // Recuperamos el pedido 
            $codigo             = $_GET['pedido'];
            $contenidocorreo    = skillcamp::damedatosescuelafem($codigo);

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            if($contenidocorreo['opcion']=="jugadoresinternos")         {   $opcion="Jugadores Internos";       }
            elseif($contenidocorreo['opcion']=="jugadoresexternos")     {   $opcion="Jugadores Externos";       }
            elseif($contenidocorreo['opcion']=="jugadoresexternosvbc")  {   $opcion="Jugadores Externos VBC";   }
            elseif($contenidocorreo['opcion']=="hermanosvbc")           {   $opcion="Hermano VBC";              }
            elseif($contenidocorreo['opcion']=="internosdoscampus")     {   $opcion="Jugadores Internos Shooting y Skills Camp 2019";}
            elseif($contenidocorreo['opcion']=="externosdoscampus")     {   $opcion="Jugadores Externos Shooting y Skills Camp 2019";}
            elseif($contenidocorreo['opcion']=="externosvbcdoscampus")  {   $opcion="Jugadores Externos VBC Shooting y Skills Camp 2019";}
            elseif($contenidocorreo['opcion']=="hermanosdoscampus")     {   $opcion="Hermano VBC Shooting y Skills Camp 2019";}
             
            $contenido = "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Opción: " . $opcion .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>Transporte: " . $contenidocorreo['transporte'] .  
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>Autorización de imagenes: " . $contenidocorreo['autorizoimagen'] . 
                "<br>Importe: " . $contenidocorreo['importe']; 
                  
            $enviodecorreo = skillcamp::mailssendSkillscamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción pago oficina Skills Camp 2019", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                vistaSimple("layout_ok_pago_oficina");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }


        public function actionKo() {

            require "config.php";

            vistaSimple("layout_ko");
        }

        */

        public function actionok() {

            require "models/skillcamp.php";


            if ( isset( $_GET['codigo'] ) ) {

                $codigo = $_GET['codigo'];

                $pagado = 1;

                $actualizaestado = skillcamp::actualizapagadoretornotpv($codigo, $pagado);

                $contenidocorreo = skillcamp::damedatoscampus($codigo);

                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime( $contenidocorreo['fechanacimiento'] ) );

                switch ( $contenidocorreo['opcion'] ) {
                    case "jugadores_internos":
                        $opcion="Jugadores Internos";
                    break;
                    case "jugadores_externos":
                        $opcion="Jugadores Externos";
                    break;
                    case "internos_dos_campus":
                        $opcion="Jugadores Internos Shooting y Skills Camp 2020";
                    break;
                    case "externos_dos_campus":
                        $opcion="Jugadores Externos Shooting y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_a":
                        $opcion="Campus Valencia Basket Calvestra y Skills Camp 2020";
                        $actualizaestadoCampusVerano = skillcamp::actualizapagadoretornotpvCampusVerano($codigo, $pagado);
                    break;
                    case "pack_uno_opcion_b":
                        $opcion="Skills Camp y Campus Valencia Basket Calvestra 2020";
                        $actualizaestadoCampusVerano = skillcamp::actualizapagadoretornotpvCampusVerano($codigo, $pagado);
                    break;
                    case "pack_dos_opcion_a":
                        $opcion="Skills Camp y Tecnificación Femenina 2020";
                        $actualizaestadoTecnificacionFemenina = skillcamp::actualizapagadoretornotpvTecnificacionFemenina($codigo, $pagado);
                    break;
                }
               
                $contenido = "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Opción: " . $opcion .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>Autorización de imagenes: " . $contenidocorreo['autorizoimagen'] . 
                "<br>Importe: " . $contenidocorreo['importe']; 
                  

                $enviodecorreo = skillcamp::mailssendSkillscamp( $contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Skill Camp 2020", $contenidocorreo['emailtutor'] );

                //$enviodecorreo2 = shootingcamp::mailssendShootingcamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Shooting Camp 2019", "actividades@valenciabasket.com");

                if ($enviodecorreo) {
                    vistaSimple("layout_ok");
                }
                else {
                    vistaSimple("layout_kocorreo");
                }
            }
        }


        public function actionokpagooficina() {

            require "models/skillcamp.php";

            $codigo = $_GET['pedido'];

            $contenidocorreo = skillcamp::damedatoscampus($codigo);

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            switch ( $contenidocorreo['opcion'] ) {
                    case "jugadores_internos":
                        $opcion="Jugadores Internos";
                    break;
                    case "jugadores_externos":
                        $opcion="Jugadores Externos";
                    break;
                    case "internos_dos_campus":
                        $opcion="Jugadores Internos Shooting y Skills Camp 2020";
                    break;
                    case "externos_dos_campus":
                        $opcion="Jugadores Externos Shooting y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_a":
                        $opcion="Campus Valencia Basket Calvestra y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_b":
                        $opcion="Skills Camp y Campus Valencia Basket Calvestra 2020";
                    break;
                    case "pack_dos_opcion_a":
                        $opcion="Skills Camp y Tecnificación Femenina 2020";
                    break;
                }



            $contenido = "Su reserva se ha realizado correctamente, recuerde que debe pasar por oficinas para realizar el pago y asi completar su inscripción." .
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Opción: " . $opcion .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>Autorización de imagenes: " . $contenidocorreo['autorizoimagen'] . 
                "<br>Importe: " . $contenidocorreo['importe']; 
                  

                $enviodecorreo = skillcamp::mailssendSkillscamp($contenidocorreo['numero_pedido'], $contenido, "Ficha pago oficina Shooting Academy 2020", $contenidocorreo['emailtutor']);
                //$enviodecorreo2 = shootingcamp::mailssendShootingcamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Shooting Camp 2019", "actividades@valenciabasket.com");

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {

                vistaSimple("layout_kocorreo");
            }                    
        }


        public function actionKo() {

            require "config.php";

            vistaSimple("layout_ko");
        }


        public function actionImprimirFicha() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

                require "models/skillcamp.php";


                // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
                $tipopago = $_GET['tipopago'];

                // Dependiendo del tipo de pago, asignamos un título al cuerpo del HTML
                if ($tipopago == "OFICINA") {
                    $seccioninscripcion = "Ficha inscripción pago oficina Skills Camp 2019";
                }
                elseif ($tipopago == "ONLINE") {
                    $seccioninscripcion = "Ficha inscripción pago online Skills Camp 2019";
                }


                // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
                $numero = $_GET['numeropedido'];

                // Recogemos todos los datos del registro pasándole el número de pedido
                $contenidocorreo = skillcamp::damedatosescuelafem($numero);


                // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

                if ($contenidocorreo['opcion'] == "jugadoresinternos")         {   $opcion = "Jugadores Internos";       }
                elseif ($contenidocorreo['opcion'] == "jugadoresexternos")     {   $opcion = "Jugadores Externos";       }
                elseif ($contenidocorreo['opcion'] == "jugadoresexternosvbc")  {   $opcion = "Jugadores Externos VBC";   }
                elseif ($contenidocorreo['opcion'] == "hermanosvbc")           {   $opcion = "Hermano VBC";              }
                elseif ($contenidocorreo['opcion'] == "internosdoscampus")     {   $opcion = "Jugadores Internos Shooting y Skills Camp 2019";}
                elseif ($contenidocorreo['opcion'] == "externosdoscampus")     {   $opcion = "Jugadores Externos Shooting y Skills Camp 2019";}
                elseif ($contenidocorreo['opcion'] == "externosvbcdoscampus")  {   $opcion = "Jugadores Externos VBC Shooting y Skills Camp 2019";}
                elseif ($contenidocorreo['opcion'] == "hermanosdoscampus")     {   $opcion = "Hermano VBC Shooting y Skills Camp 2019";}
                 
                $contenido = "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                    "<br>Opción: " . $opcion .
                    "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                    "<br>DNI: " . $contenidocorreo['dni'] .
                    "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                    "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                    "<br>Correo electrónico: " . $contenidocorreo['emailtutor'] .
                    "<br>Club: " . $contenidocorreo['club'] . 
                    "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                    "<br>Transporte: " . $contenidocorreo['transporte'] .  
                    "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                    "<br>Alergias: " . $contenidocorreo['alergias'] .
                    "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                    "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                    "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                    "<br>Autorización de imagenes: " . $contenidocorreo['autorizoimagen'] . 
                    "<br>Importe: " . $contenidocorreo['importe'] . "€"; 


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
                                                        <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
                                                    <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
                                                    <p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
                                                    <p><strong>Número de pedido:</strong> '.$numero.'</p>
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


                // Include the main TCPDF library (search for installation path).
                //require_once('./lib/TCPDF/Generadores-PDF/tcpdf_include.php');

            }
            else {
                require('error.php');
            }
        }


        public function actionExportToExcelSkillsCamp()
        {

            require "models/skillcamp.php";
            
            $datos['inscripciones'] = skillcamp::findAllInscripcionesExcel("Skills");


            if(isset($_POST["export_data"])) {
                $filename = "Skills_camp".date('Ymd') . ".xls";
           // header('Content-Encoding: UTF-8');
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



        public function actionModificaPagadoSkillsCamp()
        {

           if(isset($_POST['id'])){

            require "models/skillcamp.php";

            if(isset($_POST['pagado'])){
                $pagado = 1;
            }
            else{
                $pagado = 0;
            }

            $id = $_POST['id'];


            $slider = skillcamp::actualizapagado($id, $pagado);
            }
            else
                require "error.php";

        }



         // DAR DE BAJA  REGISTRO 
        public function actionDardeBajaCampusSkillsCamp(){

            if(isset($_POST['id'])){

                $codigo = $_POST['id'];

                echo"<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
                        <div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
                            <form action='?r=skillscamp/DardeBajaCampusSkillsCamp' method='post'>
                                <p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
                                <div style='text-align:center;'>
                                    <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float:left;'>
                                    <input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
                                </div>
                                <input type='hidden' name='id_validado' value='".$codigo."'>
                            </form>
                        </div>
                    </div>";
                die; 
            }
            

            if(isset($_POST['confirm'])){

                if($_POST['confirm']=="SI"){
                     require "models/skillcamp.php";

                    $pedido=$_POST['id_validado'];
                   
                    $baja_reg = skillcamp::DardeBajacampusskillscamp($pedido);
                }
                if($_POST['confirm']=="NO"){
                    echo "<script text='javascript'> window.location.replace('?r=campus/BackCampusSkillsCamp'); </script>";
                }
            }
            else{ require "error.php"; }

        }


    }
?>