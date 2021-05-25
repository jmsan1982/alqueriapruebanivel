<?php
    class escuelaveranovbController {

    /********************************************************
     *  ESCUELA VERANO VBC @ 110.123
     ********************************************************/

    
    public function actionDardeBajaEscuelaVeranoVb()
    {

        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
                        <div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
                            <form action='?r=escuelaveranovb/DardeBajaEscuelaVeranoVb' method='post'>
                                <p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
                                <div style='text-align:center;'>
                                    <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float:left;'>
                                    <input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
                                </div>
                                <input type='hidden' name='id_validado' value='" . $codigo . "'>
                            </form>
                        </div>
                    </div>";
            die;
        }

        if (isset($_POST['confirm'])) {

            if ($_POST['confirm'] == "SI") {
                require "models/escuela_veranoVB.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = escuela_veranoVB::DardeBajaEscuelaVeranoVB($pedido);
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'> window.location.replace('?r=campus/BackEscuelaVeranoVB'); </script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionExportToExcelEscuelaVeranoVb()
    {

        require "models/escuela_veranoVB.php";

        $where="";
            $campos="";
            $campoorder="numeropedido";
           // error_log("aobserv: " . $_POST["alergias"]);
            if (isset($_POST["alergias"])) {
               // $where.=" and (observaciones is null or observaciones<>'') ";
                $campos.="  enfermedad AS ObservMedicas, sintomascovid, familiarcovid, ";
            }

            if (isset($_POST["club"])) {
               // $where.=" and (club is null or club<>'') ";
                $campos.=" club as Club, ";
            }


            if (isset($_POST["inscripcion"])) {
                $where.="";
                $campos.=" semana1, semana2, semana3, semana4, semana5, diassueltos, ";
                $campoorder="semana1";
            }

        $datos['inscripciones'] = escuela_veranoVB::findAllInscripcionesExcelEscuelaVeranoVBConCampos($where, $campoorder, $campos);

        if (isset($_POST["export_data"])) {
            $filename = "escuela_verano_vb_" . date('Ymd') . ".xls";

            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
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
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                    }
                }
                exit;
        }
    }


    public function actionModificaPagadoEscuelaVeranoVb()
    {
        if (isset($_POST['id'])) {

            require "models/escuela_veranoVB.php";

            $codigo = $_POST['id'];
            $pagado = 1;

            $slider = escuela_veranoVB::ActualizaPagadoEscuelaVeranoVb($codigo, $pagado);
        } else {
            require "error.php";
        }
    }





    public function actionExportToExcelEscuelaVeranoVbCompleto()
    {

        require "models/escuela_veranoVB.php";

        $datos['inscripciones'] = escuela_veranoVB::findAllInscripcionesExcelEscuelaVeranoVb();

        if (isset($_POST["export_data2"])) {
            $filename = "Escuela_verano_vb" . date('Ymd') . ".xls";
            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
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
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                }
            }
            exit;
        }
    }


        public function actionImprimirFichaEscuelaVeranoVB() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {
                require "models/escuela_veranoVB.php";

                // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
                $tipopago = $_GET['tipopago'];

               
                $seccioninscripcion = "Ficha inscripción Escuela Verano Valencia Basket 2021";
                


                // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
                $numero = $_GET['numeropedido'];

                // Recogemos todos los datos del registro pasándole el número de pedido
                $contenidocorreo = escuela_veranoVB::damedatosescuelaveranoVB($numero);


                $semanas = "";

                if ($contenidocorreo['semana1'] == "sem1_comp") {
                    $semanas = $semanas."-Semana del 28 de Junio al 2 de Julio día completo";
                }
                elseif ($contenidocorreo['semana1'] == "sem1_manyana") {
                    $semanas = $semanas."-Semana del 28 de junio al 2 de julio solo mañanas";
                }

                if ($contenidocorreo['semana2'] == "sem2_comp") {
                    $semanas = $semanas." -Semana del 5 al 9 de Julio día completo";
                }
                elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                    $semanas = $semanas." -Semana del 5 al 9 de Julio solo mañanas";
                }

                if ($contenidocorreo['semana3'] == "sem3_comp") {
                    $semanas = $semanas." -Semana del 12 al 16 de Julio día completo";
                }
                elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                    $semanas = $semanas." -Semana del 12 al 16 de Julio solo mañanas";
                }

                if ($contenidocorreo['semana4'] == "sem4_comp") {
                    $semanas = $semanas." -Semana del 19 al 23 de Julio día completo";
                }
                elseif ($contenidocorreo['semana4'] == "sem4_manyana") {
                    $semanas = $semanas." -Semana del 19 al 23 de Julio solo mañanas";
                }

                if ($contenidocorreo['semana5'] == "sem5_comp") {
                    $semanas = $semanas." -Semana del 26 al 30 de julio dia completo";
                }
                elseif ($contenidocorreo['semana5'] == "sem5_manyana") {
                    $semanas = $semanas." -Semana del 26 al 30 de julio solo mañanas";
                }

                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

                $contenido ="<b>Estos son los datos recibidos relacionados con su inscripción. </b>".
                "<br><b>Género: </b>".$contenidocorreo['genero'].
                "<br><b>Nombre y apellidos: </b>".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
                "<br><b>Fecha de nacimiento: </b>" .$contenidocorreo['fechanacimiento'].
                "<br><b>DNI: </b>".$contenidocorreo['dni'].
                "<br<b>>Semanas seleccionadas: </b>".$semanas.
                "<br><b>Días sueltos: </b>".$contenidocorreo['diassueltos'].
                "<br><b>Importe: </b>".$contenidocorreo['importe']."€".
                "<br><b>Pago: </b>".$contenidocorreo['tipo_pago'].
                "<br><b>Club: </b>".$contenidocorreo['club'].
                "<br><b>Observaciones: </b>".$contenidocorreo['enfermedad'].
                "<br><b>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? </b>".$contenidocorreo['sintomascovid'].
                "<br><b>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? </b>".$contenidocorreo['familiarcovid'].
                "<br><b>Nombre y apellidos tutor/a: </b>" . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br><b>DNI del tutor/a: </b>". $contenidocorreo['dnitutor'].
                "<br><b>Dirección: </b>". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br><b>Teléfono del tutor/a: </b>" . $contenidocorreo['telefonotutor'] .
                "<br><b>Correo electrónico: </b>" . $contenidocorreo['emailtutor'].

                "<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";


                // Creamos todo el cuerpo del PDF en HTML
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
            }
            else {
                require('error.php');
            }
        }


        public function actionMostrarModalEscuelaVeranoVB() 
        {
            //error_log(__FILE__.__LINE__);
               // error_log(print_r($_POST,1));
                
                $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

               // error_log("inscrpcion escuela verano VB: ".$idinscripcion);

                if(!empty($idinscripcion))
                {
                    require "models/escuela_veranoVB.php";
                    require "includes/Utils.php";

                    $datos  =   escuela_veranoVB::damedatosBYIDescuelaveranoVB($idinscripcion);
                    
                    // error_log(__FILE__.__LINE__);
                  
                     // error_log(print_r($datos,1));
                    $alerta_cuenta="";
       
                    echo json_encode(array(
                        "response"      =>  "success",
                        "instancia"     =>  $datos,
                        "modal_title"   =>  "Formulario de inscripción en Escuela Verano Alq",
                        "message"       =>  "Los datos de la inscripción se han cargado correctamente.",
                        "alerta_cuenta" =>  $alerta_cuenta));
                    die;
                } 
                else
                {
                    echo json_encode(array(
                        "response"      => "error",
                        "instancia"         => "",
                        "modal_title"   => "Error",
                        "message"       => "Parece que ha habido algún error"));
                }      
        }



        public function actionUpdateInscripcionModalEscuelaVeranoVB()
        {
            require "models/escuela_veranoVB.php";

            
            $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

           // error_log("entra en update escuela verano VB: ".$idinscripcion);

            $dnijugador =filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
            $nombre =filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $apellidos =filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
            $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
            $fechanac=filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
            $club =filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
           // $talla =filter_input(INPUT_POST, 'talla', FILTER_SANITIZE_STRING);

            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
            $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
            $puerta =  filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
            $poblacion =  filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
            $cp =  filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
            $prov =  filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);

            
            $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
            $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
            $dnitutor =  filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
            $tlftutor =  filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
            $email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

         
            $tratam =  filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
            $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
            $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);
            $tipopago = filter_input(INPUT_POST, 'tpago', FILTER_SANITIZE_STRING);
            $importe = filter_input(INPUT_POST, 'importe', FILTER_SANITIZE_STRING);

            $diassueltos  =   filter_input(INPUT_POST, 'diassueltos', FILTER_SANITIZE_STRING);

            $sip_que_habia  =   filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

            /***********************
            *    FICHERO SIP
            **********************/
            if(!empty($_FILES['sipnuevo']['tmp_name']))
            {
                $array_fichero_y_extension  =   explode(".",$_FILES["sipnuevo"]["name"]);
                $numerodeelementos          =   count($array_fichero_y_extension);
                $extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
                $sip                        =   'img/sipescuelaverano_vb/'.strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre']))."-".strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos']))."-".date("d-m-Y-H-i-s").".".$extension;
                $archivo_movido             =   move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
            }
            else
            {   
                $sip   =   $sip_que_habia;
            }

            /******************************************
             *    FICHERO RESGUARDO DE TRANSFERENCIA
             *****************************************/

            $resguardo_que_habia = filter_input(INPUT_POST, 'resguardoanterior', FILTER_SANITIZE_STRING);

            if (!empty($_FILES['resguardonuevo']['tmp_name'])) {
                $array_fichero_y_extension = explode(".", $_FILES["resguardonuevo"]["name"]);
                $numerodeelementos = count($array_fichero_y_extension);
                $extension = $array_fichero_y_extension[$numerodeelementos - 1];
                $resguardo = 'img/sipescuelaverano_vb/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
                $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
            } else {
                $resguardo = $resguardo_que_habia;
            }


            $turno1 =  filter_input(INPUT_POST, 'turno1', FILTER_SANITIZE_STRING);
            $tipo1 =  filter_input(INPUT_POST, 'tipo1', FILTER_SANITIZE_STRING);
            $semana1="";
            if ($turno1 =='true'){
                if ($tipo1 =='manyanas'){
                    $semana1="sem1_manyana";
                }else if($tipo1 =='completo'){
                    $semana1="sem1_comp";
                }

            } else{$semana6="";};
           // error_log("turno6: ".$turno6 ." t6: " .$tipo6 . " s6: ".$semana6);

            $turno2 =  filter_input(INPUT_POST, 'turno2', FILTER_SANITIZE_STRING);
            $tipo2 =  filter_input(INPUT_POST, 'tipo2', FILTER_SANITIZE_STRING);
            $semana2="";
            if ($turno2 =='true'){
                if ($tipo2 =='manyanas'){
                    $semana2="sem2_manyana";
                }else if($tipo2 =='completo'){
                    $semana2="sem2_comp";
                }

            } else{$semana2="";};
            //error_log("turno2: ".$turno2 ." t2: " .$tipo2 . " s2: ".$semana2);


            $turno3 =  filter_input(INPUT_POST, 'turno3', FILTER_SANITIZE_STRING);
            $tipo3 =  filter_input(INPUT_POST, 'tipo3', FILTER_SANITIZE_STRING);
            $semana3="";
            if ($turno3 =='true'){
                if ($tipo3 =='manyanas'){
                    $semana3="sem3_manyana";
                }else if($tipo3 =='completo'){
                    $semana3="sem3_comp";
                }

            } else{$semana3="";};
           // error_log("turno3: ".$turno3 ." t3: " .$tipo3 . " s3: ".$semana3);


            $turno4 =  filter_input(INPUT_POST, 'turno4', FILTER_SANITIZE_STRING);
            $tipo4 =  filter_input(INPUT_POST, 'tipo4', FILTER_SANITIZE_STRING);
            $semana4="";
            if ($turno4 =='true'){
                if ($tipo4 =='manyanas'){
                    $semana4="sem4_manyana";
                }else if($tipo4 =='completo'){
                    $semana4="sem4_comp";
                }

            } else{$semana4="";};
           // error_log("turno4: ".$turno4 ." t4: " .$tipo4 . " s4: ".$semana4);


            $turno5 =  filter_input(INPUT_POST, 'turno5', FILTER_SANITIZE_STRING);
            $tipo5 =  filter_input(INPUT_POST, 'tipo5', FILTER_SANITIZE_STRING);
            $semana5="";
            if ($turno5 =='true'){
                if ($tipo5 =='manyanas'){
                    $semana5="sem5_manyana";
                }else if($tipo5 =='completo'){
                    $semana5="sem5_comp";
                }

            } else{$semana5="";};
          //  error_log("turno5: ".$turno5 ." t5: " .$tipo5 . " s5: ".$semana5);


           
      

            if (isset($idinscripcion) && !empty($idinscripcion)) {
                       
                $instancia=escuela_veranoVB::updatefichaescuelaveranovb($idinscripcion,$dnijugador,$nombre,$apellidos,$fechanac, $club,  $direccion, $numero, $piso, $puerta, $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  $tratam, $semana1, $semana2, $semana3, $semana4, $semana5, $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe, $diassueltos);

                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de inscripción",
                    "message" => "Los datos de la inscripción se han modificado correctamente."));
            } 
            else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Parece que ha habido algún error"));
            }
            die;
        }

        private static function sanitize_nombre_para_columna_myslq($string)
        {
            $unwanted_array = array(
                ' '=>'_', '.'=>'_', '-'=>'_', '>'=>'_', '/'=>'_', ':'=>'_', '?'=>'_', '!'=>'_',
                'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'NY', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'ny', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

            $str    =   strtr( $string, $unwanted_array );

            $regex  =   '/[a-zA-Z_0-9]/';

            if(preg_match($regex, $str))
            {
                return $str;
            }
            else{
                error_log(__FILE__.__LINE__);
                error_log("El string: ".$string." ha generado un error en sanitize_nombre_para_columna_myslq()");
                return false;
            }
        }
   

    

    


    

   

    }
?>