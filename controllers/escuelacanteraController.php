<?php
    class escuelacanteraController
    {
        public function actionImprimirFicha() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {

                require "models/inscripciones.php";


                $seccioninscripcion = "Ficha inscripción Equipos Escuela y Cantera Temporada 2019/2020";


                // Recogemos la variable "id" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
                $id = $_GET['id'];


                // Recogemos todos los datos del registro pasándole el id del formulario
                $contenidocorreo = inscripciones::findFormForIdConHorarios($id);

                $numero = $contenidocorreo['numero_pedido'];

              
                $contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

                $equipo = $contenidocorreo['equipo'];

                $horario="";

                if( $contenidocorreo['lunes'] != null ){
                    $horario.="Lunes= " . $contenidocorreo['lunes']. ", ";
                }

                if( $contenidocorreo['martes'] != null ){
                    $horario.="Martes= " . $contenidocorreo['martes']. ", ";
                }

                if( $contenidocorreo['miercoles'] != null ){
                    $horario.="Miercoles= " . $contenidocorreo['miercoles']. ", ";
                }

                if( $contenidocorreo['jueves'] != null ){
                    $horario.="Jueves= " . $contenidocorreo['jueves']. ", ";
                }

                if( $contenidocorreo['viernes'] != null ){
                   $horario.="Viernes= " . $contenidocorreo['viernes']. ", ";
                }

                $StringHorarios = substr($horario, 0, -1);

               
               
                $contenido = "<br>Inscripción en: " . $contenidocorreo['tipo'] . 
                "<br>Equipo: " . $contenidocorreo['equipo'] . 
                "<br>Horario: " . $StringHorarios . 
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre_apellidos'] . 
                "<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] .
                "<br>DNI titular: " . $contenidocorreo['dni_tutor'] .
                "<br>Nombre padre: " . $contenidocorreo['nombre_padre'] . " Teléfono: " . $contenidocorreo['telefono_padre'] . 
                "<br>Nombre madre: " . $contenidocorreo['nombre_madre'] . " Teléfono: " . $contenidocorreo['telefono_madre'] .
                "<br>Correo electrónico: " . $contenidocorreo['email'] .
                "<br>Dirección: " . $contenidocorreo['direccion'] . " Nº: " . $contenidocorreo['numero'] . " - " .$contenidocorreo['piso'] . " - " .$contenidocorreo['puerta'] .
                "<br>Población: " . $contenidocorreo['poblacion'] . " CP: " . $contenidocorreo['codigo_postal'] . " - " .$contenidocorreo['provincia'] ;

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
                                                        <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
                                                        alt="Alqueria del Basket" width="547" height="81" style="display: block;">
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

        public function actionInscripciones() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin" || $_SESSION['rolusuario'] == "coordinador")) {
                require "models/inscripciones.php";
                require "models/inscripciones_pagos.php";
                require "models/historico_domiciliaciones_trimestrales_inscripciones.php";
                require "includes/Utils.php";

                $datos['todasinscripciones']    = inscripciones::findAllByIsActive();       // TAB 1. INSCRIPCIONES
                $datos['inscripciones']         = inscripciones::findAllByIsActive();           
                
                $datos['numerototalinscripciones']  = count($datos['inscripciones']);
                $datos['todospagos']                = inscripciones_pagos::findAll();
                $datos['pagosagrupadosporfecha']    = inscripciones_pagos::findAllGroupedByDate();
                $datos['equipos'] = inscripciones::findAllHorararios_equipos();

                $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();

               
                
                vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_inscripciones_editar");
            }
            else {
                require('error.php');
            }
        }

        public function actionExportToExcelInscripcionEditarEscuelaCantera()
        {
             
            require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones_pagos::findAllInscripcionesExcelEscuelaCanteraEditar();


            if(isset($_POST["export_data_inscripciones_cantera_escuela_editar"])) {
                $filename = "InscripcionesEscuelaCantera".date('Ymd') . ".xls";
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


        /** actionModificaPagadoInscripcion() permite actualizar el pago o no pago de los 50 euros de la reserva de las inscripciones de Escuela.
         *  -   Actualiza el valor de reserva a 50 eu o a 0eu según corresponda.
         *  -   Lo descuenta o añade del / al total pendiente de la matricula a pagar
         *  -   Lo descuenta o añade del / al total pendiente  */
        public function actionModificaPagadoInscripcion()
        {
            require "models/inscripciones.php";
            require "models/formulariosinscripciones_pagos.php";
            $pedido = $_POST['id'];

            if( isset($_POST['pagado']) )
            {
                //  error_log("De no pagado a pagado");
                $modif                                  = inscripciones::actualizapagotpv($pedido, "1");
                $formularioInscripciones                = inscripciones::findFormFornumero_pedido($pedido);
                $formularioInscripcionesPagosBusqueda   = inscripciones::findFormIdFormulariosInscripcionesPagos($formularioInscripciones["id_formulario"]);

                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 'reserva', 50, "no");
                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 
                                                                'pendiente_matricula', 
                                                                ($formularioInscripcionesPagosBusqueda['pendiente_matricula']-50),
                                                                "no");
                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 
                                                                'total_pendiente', 
                                                                ($formularioInscripcionesPagosBusqueda['total_pendiente']-50),
                                                                "no");
                                
                if ($modif) {
                    echo "<script text='javascript'> alert('El pago se actualizo correctamente');
                    window.location.replace('?r=campus/BackEscuelaCanteraInscripciones'); </script>";
                    die;
                }
                else{
                   require "error.php"; 
                }
            }
            else
            {
                //  error_log("De pagado a no pagado");
                $modif                                  = inscripciones::actualizapagotpv($pedido, "0");
                $formularioInscripciones                = inscripciones::findFormFornumero_pedido($pedido);
                $formularioInscripcionesPagosBusqueda   = inscripciones::findFormIdFormulariosInscripcionesPagos($formularioInscripciones["id_formulario"]);

                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 'reserva', 0, "no");
                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 
                                                                'pendiente_matricula', 
                                                                ($formularioInscripcionesPagosBusqueda['pendiente_matricula']+50),
                                                                "no");
                formulariosinscripciones_pagos::updateAttribute($formularioInscripcionesPagosBusqueda['id'], 
                                                                'total_pendiente', 
                                                                ($formularioInscripcionesPagosBusqueda['total_pendiente']+50),
                                                                "no");
                if($modif)
                {
                    echo "<script text='javascript'>
                        alert('El pago se actualizo correctamente');
                        window.location.replace('?r=campus/BackEscuelaCanteraInscripciones');
                    </script>";
                    die;
                }
                else{
                    require "error.php";
                }
            }
        }

        public function actionok() {

            require "models/inscripciones.php";


            if (isset($_GET['codigo'])) {

                $codigo = $_GET['codigo'];

                $pagado = 1;

                $actualizaestado = inscripciones::actualizapagotpv($codigo, $pagado);

                $contenidocorreo = inscripciones::findFormFornumero_pedido($codigo);

                $contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

               
               
                $contenido = "<br>Nombre y apellidos: " . $contenidocorreo['nombre_apellidos'] . 
              
                "<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] .
                "<br>DNI titular: " . $contenidocorreo['dni_titular'] .
                "<br>Nombre padre: " . $contenidocorreo['nombre_padre'] . " Teléfono: " . $contenidocorreo['telefono_padre'] . 
                "<br>Nombre madre: " . $contenidocorreo['nombre_madre'] . " Teléfono: " . $contenidocorreo['telefono_madre'] .
                "<br>Correo electrónico: " . $contenidocorreo['email'] .
                "<br>Dirección: " . $contenidocorreo['direccion'] . " nº: " . $contenidocorreo['numero'] . " - " .$contenidocorreo['piso'] . " - " .$contenidocorreo['puerta'] .
                "<br>Población: " . $contenidocorreo['poblacion'] . " CP: " . $contenidocorreo['codigo_postal'] . " - " .$contenidocorreo['provincia'] .
                "<br>Importe reserva: 50€"; 
                  

                $enviodecorreo = inscripciones::mailssendinscripcion($contenidocorreo['numero_pedido'], $contenido, "Reserva inscripción temporada 19/20", $contenidocorreo['email']);
               

                if ($enviodecorreo) {
                    vistaSimple("layout_ok");
                }
                else {
                    vistaSimple("layout_kocorreo");
                }
            }
        }

        public function actionKo()
        {
            require "config.php";
            /*error_log("entramos en el ko");
            if (isset($_GET['codigo'])) {
                error_log("entramos en el if del ko");

                require "models/inscripciones.php";
                $contenidocorreo = inscripciones::findFormFornumero_pedido($codigo);

                $totalPendiente = $contenidocorreo['pendiente_matricula'] + 50;
                $TotalTotal = $contenidocorreo['total_pendiente'] + 50;

                $nombreAtributo,$valorAtributo,$id_formulario,$ponerComillas="no"

                $pendienteMatricula = inscripciones::actualizaAtributoPagos("pendiente_matricula", $totalPendiente, $contenidocorreo['id_formulario'], "no");
                $pendienteTotal = inscripciones::actualizaAtributoPagos("total_pendiente", $TotalTotal, $contenidocorreo['id_formulario'], "no");
            }*/

            vistaSimple("layout_ko");
        }

        public function actionokpagooficina()
        {
            require "models/inscripciones.php";

            $codigo = $_GET['idform'];

            $contenidocorreo = inscripciones::findFormForId($codigo);

            $contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));

               
               
            $contenido = "<br>Inscripción en: " . $contenidocorreo['tipo'] .
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre_apellidos'] . 
                "<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] .
                "<br>DNI titular: " . $contenidocorreo['dni_titular'] .
                "<br>Nombre padre: " . $contenidocorreo['nombre_padre'] . " Teléfono: " . $contenidocorreo['telefono_padre'] . 
                "<br>Nombre madre: " . $contenidocorreo['nombre_madre'] . " Teléfono: " . $contenidocorreo['telefono_madre'] .
                "<br>Correo electrónico: " . $contenidocorreo['email'] .
                "<br>Dirección: " . $contenidocorreo['direccion'] . " nº: " . $contenidocorreo['numero'] . " - " .$contenidocorreo['piso'] . " - " .$contenidocorreo['puerta'] .
                "<br>Población: " . $contenidocorreo['poblacion'] . " CP: " . $contenidocorreo['codigo_postal'] . " - " .$contenidocorreo['provincia'] .               
                "<br>Importe reserva: 50€"; 
                  

            $enviodecorreo = inscripciones::mailssendinscripcion($contenidocorreo['numero_pedido'], $contenido, "Reserva inscripción pago oficina temporada 19/20", $contenidocorreo['email']);

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {

                vistaSimple("layout_kocorreo");
            }                    
        }

        public function actiontestcorreo()
        {
            require "models/inscripciones.php";
            $enviodecorreo = inscripciones::mailssendtest('123456', "<br>Importe reserva 50€  ; ", "Prueba envio de correo", 'tessq@tessq.com');
        }
    }
?>