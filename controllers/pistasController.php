<?php
class pistasController
{
    // CONSULTA DE PISTAS
    public function actionConsultaPistas() {

            require "models/servicios.php";
            require "models/equipos.php";

            if (isset($_GET['fecha'])) {
                    $fecha = $_GET['fecha'];
            }
            else {
                    $fecha = date('Y-m-d');
            }

            $datos['horario'] = servicios::findHorario($fecha);
            $datos['pistas'] = servicios::finddistincpistas($fecha);

            $datos['categorias'] = equipos::findAllCategorias();
            $datos['equipos'] = equipos::findAllEquipos();

            vistaSinvista(array('datos' => $datos), "layout_consultapistas");
    }


    // CONSULTA DE PISTAS para la llamada desde la intranet
    public function actionConsultaPistasCalendario(){

            require "models/servicios.php";

            if (isset($_GET['fecha'])) {
                    $fecha = $_GET['fecha'];
            }
            else {
                    $fecha = date('Y-m-d');
            }

            $datos['horario'] = servicios::findHorario($fecha);
            $datos['pistas'] = servicios::finddistincpistas($fecha);

            vistaSinvista(array('datos' => $datos), "layout_consultapistas_intranet"); 
    }


    public function actionEnvioCorreoReservaPista() {
            // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
           // error_log(__FILE__.__LINE__);
            //error_log(print_r($_POST, 1));

            if (isset($_POST['email'])) {
                    require "models/formularios_rellenados.php";
                    require "models/formularios_rellenados_campos.php";
                    require "models/mailers.php";
                    require "models/reserva_pistas.php";

                    $titulo_formulario = "Solicitud de Reserva de Pista";
                    $fecha_creacion = date("Y-m-d H-i-s");

                    $entrenador = $_POST['entrenador'];
                    $email = strtolower($_POST['email']);
                    $seccion = $_POST['seccion_departamento'];
                    
                    if (isset($_POST['equipo']) && !empty($_POST['equipo'])) {
                             $equipo = $_POST['equipo'];
                    }
                    else {
                            $equipo = "Sin equipo";
                    }
                  
                    $opcion = $_POST['opcion'];
                    if ($opcion=='Partido'){
                        $espartido=1;
                    }else{$espartido=0;};

                    if ($opcion=='Gimnasio'){
                        $gim=1;
                    }else{$gim=0;};
                        
                    
                    
                    $fecha = $_POST['fecha'];
                    $hora = $_POST['hora_ini'];
                    $horafin = $_POST['hora_fin'];

                    if (isset($_POST['observaciones']) && !empty($_POST['observaciones'])) {
                            $observaciones = "<strong>Observaciones:</strong> ".$_POST['observaciones'];
                            $observaciones_registro = $seccion . "-" . $_POST['observaciones'];
                    }
                    else {
                            $observaciones = "";
                            $observaciones_registro = $seccion;
                    }

                    $usuarioidentificado = $_POST['usuarioidentificado'];

                    // variables de sesion de  actionIdentificarseUsuario en loginController
                    $iduser=$_SESSION['idusuario'];
                    $idcoach=$_SESSION['idcoach'];
                    $tipo="S";

                    $contenido = '
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
                                                            <td bgcolor="#ffffff" style="padding:30px 25px 30px 25px">
                                                                <h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">Solicitud de Pista</h3>
                                                                <p>
                                                                <strong>Nombre solicitante:</strong> '.$entrenador.'<br>
                                                                <strong>Identificado como:</strong> '.$usuarioidentificado.'<br>
                                                                <strong>Email:</strong> <a href="mailto:'.$email.'">'.$email.'</a><br>
                                                                <strong>Seccion:</strong> '.$seccion.'<br><br>
                                                                <strong>Equipo:</strong> '.$equipo.'<br><br>
                                                                <strong><u>Solicitud de pista:</u></strong><br>
                                                                <strong>Opción:</strong> '.$opcion.'<br>
                                                                <strong>Fecha de reserva:</strong> '.$fecha.'<br>
                                                                <strong>Hora de reserva:</strong> De '.$hora. " a ". $horafin. '<br>
                                                                '.$observaciones.'
                                                                </p>
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

                    // Insertamos el nuevo formulario y recogemos todos sus datos
                    //14/12/2020 Ana: comento esta insercion porque no consultamos esas tablas y relentiza el proceso
                   // $nuevo_formulario_rellenado = formularios_rellenados::newFormularioRellenado($titulo_formulario, $fecha_creacion);

                    $nuevo_formulario_rellenado = mailers::enviaCorreoReservaPistaAPepe($entrenador, $email, $contenido);

                    if ($nuevo_formulario_rellenado) {
                            // Insertamos los nombres de los campos y sus valores asociados al ID del formulario_rellenado
                         //14/12/2020 Ana: comento esta insercion porque no consultamos esas tablas y relentiza el proceso
                          /*  formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Entrenador que solicita", $entrenador);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Email entrenador", $email);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Seccion", $seccion);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo", $equipo);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Opción de uso", $opcion);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha", $fecha);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora", $hora);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Observaciones", $_POST['observaciones']);  */

                            // Enviamos los emails oportunos con los datos de la solicitud, ahora se envia arriba
                           // mailers::enviaCorreoReservaPistaAPepe($entrenador, $email, $contenido);

                            //14/12/2020 se graba un registro sin pista asociada en la tabla horario_entrenamiento2, despues Pepe ya asignara la pista
                            reserva_pistas::InsertReservaPista($fecha, $hora, $horafin, $equipo, $espartido, $observaciones_registro, $iduser, $idcoach, $tipo, "");


                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Tu solicitud de reserva de pista se ha enviado correctamente.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
                    else {
                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
            }
    }


    public function actionEnvioCorreoCambioPartido() {
            // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
            error_log(__FILE__.__LINE__);
            error_log(print_r($_POST, 1));

            if (isset($_POST['email_solicitante'])) {
                    require "models/formularios_rellenados.php";
                    require "models/formularios_rellenados_campos.php";
                    require "models/mailers.php";

                    $titulo_formulario = "Solicitud de Cambio de Partido";
                    $fecha_creacion = date("Y-m-d H-i-s");

                    $categoria_equipo = $_POST['categoria_equipo'];
                    $seccion = $_POST['seccion'];
                    $equipo = $_POST['equipo'];
                    $jornada = $_POST['jornada'];
                    $equipo_local = $_POST['equipo_local'];
                    $equipo_visitante = $_POST['equipo_visitante'];

                    if (!empty($_POST["cambio_fecha"]) || !empty($_POST["cambio_hora"]) || !empty($_POST["permuta"])) {
                            if (isset($_POST['cambio_fecha']) && !empty($_POST['cambio_fecha'])) {
                                    $cambio_fecha = "<strong>Cambio de fecha:</strong> Sí<br>";
                            }
                            else {
                                    $cambio_fecha = "";
                            }

                            if (isset($_POST['cambio_hora']) && !empty($_POST['cambio_hora'])) {
                                    $cambio_hora = "<strong>Cambio de hora:</strong> Sí<br>";
                            }
                            else {
                                    $cambio_hora = "";
                            }

                            if (isset($_POST['permuta']) && !empty($_POST['permuta'])) {
                                    $permuta = "<strong>Permuta:</strong> Sí<br>";
                            }
                            else {
                                    $permuta = "";
                            }
                    }
                    else {
                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Solicita un Tipo de Cambio y no olvides revisar el resto de campos.');
                                            window.history.back();
                                    </script>";
                            die;
                    }

                    $solicitante = $_POST['solicitante'];

                    $coste = $_POST['coste'];

                    if ($coste == "Sí") {
                            $coste = "Sí, ";
                            $cantidad = $_POST['cantidad']."€";
                    }
                    else {
                            $cantidad = "";
                    }

                    $motivo_cambio = $_POST['motivo_cambio'];

                    if (isset($_POST['observaciones']) && !empty($_POST['observaciones'])) {
                            $observaciones = "<strong>Observaciones:</strong> ".$_POST['observaciones']."<br><br>";
                    }
                    else {
                            $observaciones = "<br>";
                    }

                    $fecha_calendario = $_POST['fecha_calendario'];
                    $hora_calendario = $_POST['hora_calendario'];
                    $campo_calendario = $_POST['campo_calendario'];
                    $fecha_solicitada = $_POST['fecha_solicitada'];
                    $hora_solicitada = $_POST['hora_solicitada'];
                    $campo_solicitado = $_POST['campo_solicitado'];
                    $nombre_solicitante = $_POST['nombre_solicitante'];
                    $email_solicitante = strtolower($_POST['email_solicitante']);
                    $cargo_solicitante = $_POST['cargo_solicitante'];
                    $equipo_solicitante = $_POST['equipo_solicitante'];
                    $usuarioidentificado = $_POST['usuarioidentificado'];

                    // Creamos todo el cuerpo del email para pasárselo a models/mailers.php
                    $contenido = '
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
                                                                            <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px">
                                                                                    <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid">Solicitud de Cambio de Partido</h3>
                                                                                    <p>
                                                                                            <strong>Categoría:</strong> '.$categoria_equipo.'<br>
                                                                                            <strong>Sección:</strong> '.$seccion.'<br>
                                                                                            <strong>Equipo:</strong> '.$equipo.'</a><br>
                                                                                            <strong>Jornada:</strong> '.$jornada.'<br>
                                                                                            <strong>Equipo local:</strong> '.$equipo_local.'<br>
                                                                                            <strong>Equipo visitante:</strong> '.$equipo_visitante.'<br><br>
                                                                                            <strong><u>Tipo de cambio:</u></strong><br>
                                                                                            '.$cambio_fecha.'
                                                                                            '.$cambio_hora.'
                                                                                            '.$permuta.'
                                                                                            <strong>Solicitante:</strong> '.$solicitante.'<br>
                                                                                            <strong>Coste:</strong> '.$coste.' '.$cantidad.'<br>
                                                                                            <strong>Motivo:</strong> '.$motivo_cambio.'<br>
                                                                                            '.$observaciones.'
                                                                                            <strong><u>Cambio:</u></strong><br>
                                                                                            <strong>- Según calendario:</strong><br>
                                                                                            <strong>Fecha:</strong> '.$fecha_calendario.'<br>
                                                                                            <strong>Hora:</strong> '.$hora_calendario.'<br>
                                                                                            <strong>Campo:</strong> '.$campo_calendario.'<br><br>
                                                                                            <strong>- Pasa a:</strong><br>
                                                                                            <strong>Fecha:</strong> '.$fecha_solicitada.'<br>
                                                                                            <strong>Hora:</strong> '.$hora_solicitada.'<br>
                                                                                            <strong>Campo:</strong> '.$campo_solicitado.'<br><br>
                                                                                            <strong><u>Entrega esta hoja:</u></strong><br>
                                                                                            <strong>Nombre del solicitante:</strong> '.$nombre_solicitante.'<br>
                                                                                            <strong>Identificado como:</strong> '.$usuarioidentificado.'<br>
                                                                                            <strong>Email del solicitante:</strong> <a href="mailto:'.$email_solicitante.'">'.$email_solicitante.'</a><br>
                                                                                            <strong>Cargo del solicitante:</strong> '.$cargo_solicitante.'<br>
                                                                                            <strong>Equipo del solicitante:</strong> '.$equipo_solicitante.'<br>
                                                                                    </p>
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

                    // Insertamos el nuevo formulario y recogemos todos sus datos
                    $nuevo_formulario_rellenado = formularios_rellenados::newFormularioRellenado($titulo_formulario, $fecha_creacion);

                    if ($nuevo_formulario_rellenado) {
                            // Insertamos los nombres de los campos y sus valores asociados al ID del formulario_rellenado
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Categoría", $categoria_equipo);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Sección", $seccion);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo", $equipo);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Jornada", $jornada);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo local", $equipo_local);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo visitante", $equipo_visitante);

                            if (isset($_POST['cambio_fecha']) && !empty($_POST['cambio_fecha'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cambio de fecha", $_POST['cambio_fecha']);
                            }

                            if (isset($_POST['cambio_hora']) && !empty($_POST['cambio_hora'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cambio de hora", $_POST['cambio_hora']);
                            }

                            if (isset($_POST['permuta']) && !empty($_POST['permuta'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Permuta", $_POST['permuta']);
                            }

                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Solicitante", $solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Coste", $coste);

                            if (isset($_POST['cantidad']) && !empty($_POST['cantidad'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cantidad", $_POST['cantidad']);
                            }

                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Motivo del cambio", $motivo_cambio);

                            if (isset($_POST['observaciones']) && !empty($_POST['observaciones'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Observaciones", $_POST['observaciones']);
                            }

                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha según calendario", $fecha_calendario);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora según calendario", $hora_calendario);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Campo según calendario", $campo_calendario);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha solicitada", $fecha_solicitada);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora solicitada", $hora_solicitada);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Campo solicitado", $campo_solicitado);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Nombre del solicitante", $nombre_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Email del solicitante", $email_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cargo del solicitante", $cargo_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo del solicitante", $equipo_solicitante);

                            // Enviamos los emails oportunos con los datos de la solicitud
                            mailers::enviaCorreoCambioPartidoAPepe($nombre_solicitante, $email_solicitante, $contenido);

                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Tu solicitud de cambio de partido se ha enviado correctamente.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
                    else {
                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
            }
    }


    public function actionEnvioCorreoCamaraMaquina() {
            // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
            error_log(__FILE__.__LINE__);
            error_log(print_r($_POST, 1));

            if (isset($_POST['email_solicitante'])) {
                    require "models/formularios_rellenados.php";
                    require "models/formularios_rellenados_campos.php";
                    require "models/mailers.php";

                    $titulo_formulario = "Solicitud de Cámara / Máquina de tiro";
                    $fecha_creacion = date("Y-m-d H-i-s");

                    $nombre_solicitante = $_POST['nombre_solicitante'];
                    $email_solicitante = strtolower($_POST['email_solicitante']);
                    $cargo_solicitante = $_POST['cargo_solicitante'];
                    $equipo = $_POST['equipo'];

                    $solicitud = $_POST['solicitud'];

                    if ($solicitud == "Cámara") {
                            $informacion = "La recogida de la cámara será en la oficina de L´Alqueria y su devolución será en el mismo lugar, lo más pronto posible, conectada al cargador y con la tarjeta formateada.";
                    }
                    elseif ($solicitud == "Máquina de tiro") {
                            $informacion = "La recogida y devolución de la máquina de tiro será en la recepción de L´Alqueria.";
                    }

                    $fecha_recogida = $_POST['fecha_recogida'];
                    $hora_recogida = $_POST['hora_recogida'];
                    $fecha_entrega = $_POST['fecha_entrega'];
                    $hora_entrega = $_POST['hora_entrega'];

                    if (isset($_POST['observaciones']) && !empty($_POST['observaciones'])) {
                                    $observaciones = "<strong>Observaciones:</strong> ".$_POST['observaciones'];
                    }
                    else {
                            $observaciones = "";
                    }

                    $usuarioidentificado = $_POST['usuarioidentificado'];

                    // Creamos todo el cuerpo del email para pasárselo a models/mailers.php
                    $contenido = '
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
                                                                            <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px">
                                                                                    <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid">Solicitud de Cámara / Máquina de tiro</h3>
                                                                                    <p>													
                                                                                            <strong>Nombre del solicitante:</strong> '.$nombre_solicitante.'<br>
                                                                                            <strong>Identificado como:</strong> '.$usuarioidentificado.'<br>
                                                                                            <strong>Email del solicitante:</strong> <a href="mailto:'.$email_solicitante.'">'.$email_solicitante.'</a><br>
                                                                                            <strong>Cargo del solicitante:</strong> '.$cargo_solicitante.'<br>
                                                                                            <strong>Equipo:</strong> '.$equipo.'<br><br>
                                                                                            <strong>Solicitud de:</strong> '.$solicitud.'<br>
                                                                                            <strong>Información extra:</strong> '.$informacion.'<br><br>
                                                                                            <strong><u>Recogida:</u></strong><br>
                                                                                            <strong>Fecha:</strong> '.$fecha_recogida.'<br>
                                                                                            <strong>Hora:</strong> '.$hora_recogida.'<br><br>
                                                                                            <strong><u>Entrega:</u></strong><br>
                                                                                            <strong>Fecha:</strong> '.$fecha_entrega.'<br>
                                                                                            <strong>Hora:</strong> '.$hora_entrega.'<br><br>
                                                                                            '.$observaciones.'
                                                                                    </p>
                                                                                    <p>
                                                                                            <strong><u>IMPORTANTE:</u></strong><br>
                                                                                            Cualquier incidencia se debe comunicar lo más pronto posible por el buen funcionamiento y convivencia de todos/as. ¡Muchas gracias!
                                                                                    </p>
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

                    // Insertamos el nuevo formulario y recogemos todos sus datos
                    $nuevo_formulario_rellenado = formularios_rellenados::newFormularioRellenado($titulo_formulario, $fecha_creacion);

                    if ($nuevo_formulario_rellenado) {
                            // Insertamos los nombres de los campos y sus valores asociados al ID del formulario_rellenado
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Nombre del solicitante", $nombre_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Email del solicitante", $email_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cargo del solicitante", $cargo_solicitante);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo del solicitante", $equipo);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Tipo de solicitud", $solicitud);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha de recogida", $fecha_recogida);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora de recogida", $hora_recogida);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha de entrega", $fecha_entrega);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora de entrega", $hora_entrega);

                            if (isset($_POST['observaciones']) && !empty($_POST['observaciones'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Observaciones", $_POST['observaciones']);
                            }

                            // Enviamos los emails oportunos con los datos de la solicitud
                            mailers::enviaCorreoCamaraMaquinaAPepe($nombre_solicitante, $email_solicitante, $contenido);

                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Tu solicitud de reserva se ha enviado correctamente.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
                    else {
                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                            window.location.replace('?r=pistas/ConsultaPistas');
                                    </script>";
                            die;
                    }
            }
    }


    // Comprobamos si la sala de estudio esta disponible en la fecha y horas seleccionadas
    public function actionComprobarDisponibilidadSalaEstudio() {
        require "includes/Utils.php";
        //Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

        require "models/reserva_salaestudio.php";

            // Recibimos los datos
        $fecha     =   $_POST["fecha"];
        $horaini   =   $_POST["hora_ini"];
        $horafin   =   $_POST["hora_fin"];

        //comprobamos si hay reservas de asiento en esa fecha y horas
        $disponible      =   reserva_salaestudio::findAllReservaSalaEstudioFechaHora($fecha, $horaini, $horafin);

            //error_log(__FILE__.__FUNCTION__.__LINE__);

            // Si no hay registros
                if (empty($disponible)) {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // Mensaje envío correcto
                    echo json_encode(array(
                        "response" =>  "success",
                        "message"  =>  "Sala de estudio disponible"));
                    die;
                }
                else {
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    // hay registros
                    echo json_encode(array(
                        "response"  => "error",
                        "message"   => "Sala de estudio ocupada"
                    ));
                    die;
                }
    }
    
    
    /**************************************
        CONSULTA DE SALAS
     * ***********************************/
    //  Carga la VISTA => pistas/ConsultaSalas
    public function actionConsultaSalas() 
    {
        require "models/servicios.php";
        require "models/equipos.php";

        if (isset($_GET['fecha']))
        {
            $fecha = $_GET['fecha'];
        }
        else 
        {
            $fecha = date('Y-m-d');
        }

        $datos['horario']   = servicios::findReservaSalas($fecha);
        $datos['salas']     = servicios::finddistincsalas($fecha);
        $datos['equipos']   = equipos::findAllEquipos();

        vistaSinvista(array('datos' => $datos), "layout_consultasalas");
    }

    // CONSULTA DE SALAS para la llamada desde la intranet
    public function actionConsultaSalasCalendario()
    {
        require "models/servicios.php";

        if (isset($_GET['fecha'])) {
            $fecha = $_GET['fecha'];
        }
        else {
            $fecha = date('Y-m-d');
        }

        $datos['horario'] = servicios::findReservaSalas($fecha);
        $datos['salas'] = servicios::finddistincsalas($fecha);
        vistaSinvista(array('datos' => $datos), "layout_consultasalas_intranet"); 
    }


    // ANULAR RESERVA DE SALA CONFIRMADA , EL USUARIO LOGUEADO PODRA ANULAR SUS RESERVAS
    public function actionAnularReservaSala()
    {
        require "models/servicios.php";

        if (isset($_POST['idreserva'])) {
            error_log("Reseva id: ".$_POST['idreserva']);
             $update =servicios::updateEstadoReservaSala($_POST['idreserva']);
        }
        
        
        
    }

    public function actionEnvioCorreoReservaSala()
    {
        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
//        error_log(__FILE__.__LINE__);
//        error_log(print_r($_POST, 1));
//        die;
        
        if(isset($_POST['email_solicitante'])) 
        {
            require "PHPMailer/envios_emails.php";
            require "models/formularios_rellenados.php";
            require "models/formularios_rellenados_campos.php";
            require "models/mailers.php";
            require "models/servicios.php";

            $titulo_formulario      =   "Solicitud de Reserva de Sala";
            $fecha_creacion         =   date("Y-m-d H-i-s");
            $nombre_solicitante     =   $_POST['nombre_solicitante'];
            $email_solicitante      =   strtolower($_POST['email_solicitante']);
            $seccion_departamento   =   $_POST['seccion_departamento'];

            if ($seccion_departamento == "Externo") 
            {
                if (isset($_POST['externo_entidad']) && !empty($_POST['externo_entidad'])) {
                    $externo_campos = "<strong>Nombre de la entidad:</strong> ".$_POST['externo_entidad']."<br>";
                }

                if (isset($_POST['externo_referencia_vbc']) && !empty($_POST['externo_referencia_vbc'])) {
                    $externo_campos .= "<strong>Referencia VBC:</strong> ".$_POST['externo_referencia_vbc']."<br>";
                }

                if (isset($_POST['externo_telefono']) && !empty($_POST['externo_telefono'])) {
                    $externo_campos .= "<strong>Teléfono de la entidad:</strong> ".$_POST['externo_telefono']."<br>";
                }

                if (isset($_POST['externo_email']) && !empty($_POST['externo_email'])) {
                    $externo_campos .= "<strong>Email de la entidad:</strong> ".strtolower($_POST['externo_email'])."<br>";
                }
            }
            else 
            {
                $externo_campos = "";
            }

            if (isset($_POST['equipo']) && !empty($_POST['equipo']))
            {
                $equipo = $_POST['equipo'];
            }
            else
            {
                $equipo = "";
            }

            if(isset($_POST['cargo_solicitante']) && !empty($_POST['cargo_solicitante']))
            {
                $cargo_solicitante  = $_POST['cargo_solicitante'];
            }
            else{
                $cargo_solicitante = "";
            }

            if(isset($_POST['seccion_departamento']) && !empty($_POST['seccion_departamento']))
            {
                $ref_depto = $_POST['seccion_departamento'];
            }
            else{
                $ref_depto = "";
            }

            $sala = $_POST['sala'];

            /* para grabar el registro en la tabla "reserva_salas" (solicitado por Pepe). Ponemos los idsala a piñon segun la tabla "salas" de Alqueria  */
            $idsala_int         =   0;
            $zona               =   "";

            if ($sala == "Miki Vukovic"){
                $idsala_int=1;

                if (isset($_POST['sala_miki']) && !empty($_POST['sala_miki'])) {
                        $sala_miki = $_POST['sala_miki'];
                        $sala .= " (".$sala_miki.")";
                        $zona = $_POST['sala_miki'];
                }

                if (isset($_POST['s1_proyector']) && !empty($_POST['s1_proyector'])) {
                        $proyector = "<strong>Proyector:</strong> Sí<br>";	
                }
                else {
                        $proyector = "";
                }

                if (isset($_POST['s1_audio']) && !empty($_POST['s1_audio'])) {
                        $audio = "<strong>Audio:</strong> Sí<br>";	
                }
                else {
                        $audio = "";	
                }

                if (isset($_POST['s1_pizarra']) && !empty($_POST['s1_pizarra'])) {
                        $pizarra = "<strong>Pizarra:</strong> Sí<br>";	
                }
                else {
                        $pizarra = "";
                }
            }
            elseif ($sala == "16 de junio de 2017"){
                    $idsala_int=5;
                    if (isset($_POST['s2_proyector']) && !empty($_POST['s2_proyector'])) {
                            $proyector = "<strong>Proyector:</strong> Sí<br>";
                    }
                    else {
                            $proyector = "";
                    }

                    if (isset($_POST['s2_audio']) && !empty($_POST['s2_audio'])) {
                            $audio = "<strong>Audio:</strong> Sí<br>";
                    }
                    else {
                            $audio = "";
                    }

                    if (isset($_POST['s2_pizarra']) && !empty($_POST['s2_pizarra'])) {
                            $pizarra = "<strong>Pizarra:</strong> Sí<br>";
                    }
                    else {
                            $pizarra = "";
                    }
            }
            elseif ($sala == "Coinnovación") {
                    $idsala_int=4;
                    if (isset($_POST['s3_proyector']) && !empty($_POST['s3_proyector'])) {
                            $proyector = "<strong>Proyector:</strong> Sí<br>";
                    }
                    else {
                            $proyector = "";
                    }

                    if (isset($_POST['s3_audio']) && !empty($_POST['s3_audio'])) {
                            $audio = "<strong>Audio:</strong> Sí<br>";
                    }
                    else {
                            $audio = "";
                    }

                    if (isset($_POST['s3_pizarra']) && !empty($_POST['s3_pizarra'])) {
                            $pizarra = "<strong>Pizarra:</strong> Sí<br>";
                    }
                    else {
                            $pizarra = "";
                    }
            }
            elseif ($sala == "Auxiliar") {
                    $idsala_int=2;
                    if (isset($_POST['s4_proyector']) && !empty($_POST['s4_proyector'])) {
                            $proyector = "<strong>Proyector:</strong> Sí<br>";
                    }
                    else {
                            $proyector = "";
                    }

                    $audio = "";

                    if (isset($_POST['s4_pizarra']) && !empty($_POST['s4_pizarra'])) {
                            $pizarra = "<strong>Pizarra:</strong> Sí<br>";
                    }
                    else {
                            $pizarra = "";
                    }
            }

            
            /* para grabar el registro en la tabla "reserva_salas" (solicitado por Pepe).   */
            $proyector_intranet =0;     if ($proyector=="") {   $proyector_intranet=0;  }   else{   $proyector_intranet=1;  }
            $pizarra_intranet   =0;     if ($pizarra=="")   {   $pizarra_intranet=0;    }   else{   $pizarra_intranet=1;    }
            $ordenador_intranet =0;     if ($audio=="")     {   $ordenador_intranet=0;  }   else{   $ordenador_intranet=1;  }
            $observ_intranet    ="";    

            $fecha                  = $_POST['fecha'];
            $fecha_datetime         =   new DateTime($fecha);
            $fecha2                  = DateTime::createFromFormat('d/m/Y',$_POST['fecha']);
            $fechamysql             = $_POST['fecha'];
            $hora_inicio            = $_POST['hora_inicio'];
            $hora_fin               = $_POST['hora_fin'];
            $actividad_titulo       = $_POST['actividad_titulo'];
            $actividad_descripcion  = $_POST['actividad_descripcion'];

            $referencia_intranet=   $actividad_titulo;

            if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])) 
            {
                $observaciones      =   "<strong>Observaciones:</strong> ".$_POST['observaciones']."<br>";
                $observ_intr    =   $_POST['observaciones'];
            }
            else 
            {
                $observaciones = "<br>";
                $observ_intr="";
            }

            $observ_intranet=utf8_decode($actividad_descripcion. " -" . $observ_intr);


            // variables de sesion de  actionIdentificarseUsuario en loginController
            $iduser=$_SESSION['idusuario'];
            $idcoach=$_SESSION['idcoach'];
 
            
            /********************************************
             * PREPARAMOS EL CONTENIDO PARA EL EMAIL 
             ********************************************/
            $usuario_identificado = $_POST['usuario_identificado'];
                     
            // Creamos todo el cuerpo del email para pasárselo a models/mailers.php
            $contenido = '
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
                                        <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px">
                                            <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid">Solicitud de Sala</h3>
                                            <p>
                                                <strong>Nombre del solicitante:</strong> '.$nombre_solicitante.'<br>
                                                <strong>Identificado como:</strong> '.$usuario_identificado.'<br>
                                                <strong>Email del solicitante:</strong> <a href="mailto:'.$email_solicitante.'">'.$email_solicitante.'</a><br>
                                                <strong>Sección / Departamento:</strong> '.$seccion_departamento.'<br>
                                                '.$externo_campos.'													
                                                <strong>Equipo del solicitante:</strong> '.$equipo.'<br>
                                                <strong>Cargo del solicitante:</strong> '.$cargo_solicitante.'<br><br>
                                                <strong><u>Selección de Sala:</u></strong><br>
                                                <strong>Sala:</strong> '.$sala.'<br>
                                                '.$proyector.'
                                                '.$audio.'
                                                '.$pizarra.'
                                                <br><strong><u>Selección de Fecha:</u></strong><br>
                                                <strong>Fecha:</strong> '.$fecha_datetime->format("d/m/Y").'<br>
                                                <strong>Hora inicio:</strong> '.$hora_inicio.'<br>
                                                <strong>Hora fin:</strong> '.$hora_fin.'<br><br>
                                                <strong><u>Actividad para la que se solicita:</u></strong><br>
                                                <strong>Título:</strong> '.$actividad_titulo.'<br>
                                                <strong>Descripción:</strong> '.$actividad_descripcion.'<br>
                                                '.$observaciones.'
                                            </p>
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


            // Insertamos el nuevo formulario en la tabla que "loguea" los formularios rellenados", que se hizo porque no se recibian emails. 
            $nuevo_formulario_rellenado = formularios_rellenados::newFormularioRellenado($titulo_formulario, $fecha_creacion);

            if($nuevo_formulario_rellenado)
            {
                    // Insertamos los nombres de los campos y sus valores asociados al ID del formulario_rellenado
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Nombre del solicitante", $nombre_solicitante);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Email del solicitante", $email_solicitante);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Sección / Departamento", $seccion_departamento);

                    if ($seccion_departamento == "Externo") {
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Nombre de la entidad", $_POST['externo_entidad']);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Referencia VBC", $_POST['externo_referencia_vbc']);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Teléfono de la entidad", $_POST['externo_telefono']);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Email de la entidad", $_POST['externo_email']);
                    }

                    if ($seccion_departamento == "Cantera Masculina" || $seccion_departamento == "Cantera Femenina" || $seccion_departamento == "Escuela" || $seccion_departamento == "Externo") {
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Equipo del solicitante", $equipo);
                            formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Cargo del solicitante", $cargo_solicitante);
                    }

                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Sala", $sala);

                    if ($_POST['sala'] == "Miki Vukovic") {
                            if (isset($_POST['s1_proyector']) && !empty($_POST['s1_proyector'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Proyector", $_POST['s1_proyector']);
                            }

                            if (isset($_POST['s1_audio']) && !empty($_POST['s1_audio'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Audio", $_POST['s1_audio']);
                            }

                            if (isset($_POST['s1_pizarra']) && !empty($_POST['s1_pizarra'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Pizarra", $_POST['s1_pizarra']);
                            }
                    }
                    elseif ($_POST['sala'] == "16 de junio de 2017") {
                            if (isset($_POST['s2_proyector']) && !empty($_POST['s2_proyector'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Proyector", $_POST['s2_proyector']);
                            }

                            if (isset($_POST['s2_audio']) && !empty($_POST['s2_audio'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Audio", $_POST['s2_audio']);
                            }

                            if (isset($_POST['s2_pizarra']) && !empty($_POST['s2_pizarra'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Pizarra", $_POST['s2_pizarra']);
                            }
                    }
                    elseif ($_POST['sala'] == "Coinnovación") {
                            if (isset($_POST['s3_proyector']) && !empty($_POST['s3_proyector'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Proyector", $_POST['s3_proyector']);
                            }

                            if (isset($_POST['s3_audio']) && !empty($_POST['s3_audio'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Audio", $_POST['s3_audio']);
                            }

                            if (isset($_POST['s3_pizarra']) && !empty($_POST['s3_pizarra'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Pizarra", $_POST['s3_pizarra']);
                            }
                    }
                    elseif ($_POST['sala'] == "Auxiliar") {
                            if (isset($_POST['s4_proyector']) && !empty($_POST['s4_proyector'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Proyector", $_POST['s4_proyector']);
                            }

                            if (isset($_POST['s4_pizarra']) && !empty($_POST['s4_pizarra'])) {
                                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Pizarra", $_POST['s4_pizarra']);
                            }
                    }

                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Fecha", $fecha);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora de inicio", $hora_inicio);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Hora de fin", $hora_fin);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Título de la actividad", $actividad_titulo);
                    formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Descripción de la actividad", $actividad_descripcion);

                    if(isset($_POST['observaciones']) && !empty($_POST['observaciones']))
                    {
                        formularios_rellenados_campos::newFormularioRellenadoCampos($nuevo_formulario_rellenado['id'], "Observaciones / Necesidades especiales", $_POST['observaciones']);
                    }

                    //  hay que grabar la solicitud de sala en la tabla 'reserva_salas' de la bbdd 'alqueria' con idestado=3 --> 'En estudio'
                    // a fecha 6/11/2020 hay que relacionar la reserva de sala con el usuario logueado, añadimos el id usuario o idcoach a la tabla
                    servicios::insertreservasala(
                        $idsala_int,        $fechamysql,                 $hora_inicio,       $hora_fin,              utf8_decode($referencia_intranet), 
                        $observ_intranet,   utf8_decode($nombre_solicitante),    $email_solicitante, $proyector_intranet,    $ordenador_intranet, 
                        $pizarra_intranet,  $zona,                  $fecha_creacion, $iduser, $idcoach);

                    //  Enviamos los emails oportunos con los datos de la solicitud
                    mailers::enviaCorreoReservaSalaaAPepe($nombre_solicitante, $email_solicitante, $contenido);
                    
                    echo "<script text='javascript' charset='utf-8'>
                            alert('Tu solicitud de reserva de sala se ha enviado correctamente.');
                            window.location.replace('?r=pistas/ConsultaSalas');
                        </script>";
                    die;
            }
            else 
            {
                    echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                    window.location.replace('?r=pistas/ConsultaSalas');
                            </script>";
                    die;
            }
        }
    }

     /**************************************
        CONSULTA DE RESERVA DE GIMNASIO
     * ***********************************/
        
    //Cargamos los registros de la pista gimansio de horario_entrenamiento2
    public function actionConsultaPistaGimnasio() 
    {
        require "models/reserva_pistas.php";

        //$fecha = date('Y-m-d');     

        $datos['reservasgim']   = reserva_pistas::findReservaPistaGimnasio();

        vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_reservas_gimnasio1");
    }


    public function actionMostrarModalReservaGim()
    {
        //error_log(__FILE__.__FUNCTION__.__LINE__);
        //error_log(print_r($_POST,1));

        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

       // error_log("id reserva gimnasio: ".$id);

        if (!empty($id)) {
            require "models/reserva_pistas.php";
            require "includes/Utils.php";

            $datos = reserva_pistas::findAllReservaPistasByIdHorario($id);
            $alerta_cuenta = "";

            echo json_encode(array(
                "response" => "success",
                "instancia" => $datos,
                "modal_title" => "Reserva de gimansio",
                "message" => "Los datos de la reserva se han cargado correctamente.",
                "alerta_cuenta" => $alerta_cuenta));
            die;
        } else {
            echo json_encode(array(
                "response" => "error",
                "instancia" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }
    }


    //modificar la reserva de pista del gimnasio
    public function actionUpdateReservaGim()
    {
           //error_log(__FILE__.__FUNCTION__.__LINE__);
           // error_log(print_r($_POST,1));
           // error_log(print_r($_FILES,1));


        require "models/reserva_pistas.php";

        $idhorario = filter_input(INPUT_POST, 'idreserva', FILTER_SANITIZE_NUMBER_INT);
//error_log("idreserva: " . $idhorario);
        $fecha = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
        $horaini = filter_input(INPUT_POST, 'horaini', FILTER_SANITIZE_STRING);
        $horafin = filter_input(INPUT_POST, 'horafin', FILTER_SANITIZE_STRING);
        $equipo = filter_input(INPUT_POST, 'equipo', FILTER_SANITIZE_STRING);
        $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);

        if (isset($idhorario) && !empty($idhorario)) {

           
            $instancia = reserva_pistas::UpdateReservaGimnasio($idhorario, $fecha, $horaini, $horafin, $equipo, $observ);

            if (!empty($instancia)) {
                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de reserva",
                    "message" => "Los datos de la reserva se han modificado correctamente."));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Ha habido un error al guardar los datos"));
                die;
            }
        } else {
            echo json_encode(array(
                "response" => "error",
                "datos" => "",
                "modal_title" => "Error",
                "message" => "Parece que ha habido algún error"));
            die;
        }

    }


    public function actionEliminarReservaGim()
    {
        if (isset($_POST['id'])) {

            $codigo = $_POST['id'];

            echo "<div style='width: 100%; height: 100%; background-color: rgba(0,0,0,.8); padding-top: 10%;'>
                        <div class='contact-form-wrapper' style='width: 50%; margin-left: 25%; background-color: white; border: 1px solid #000000; border-radius: 10px; padding: 25px;'>
                            <form action='?r=pistas/EliminarReservaGim' method='post'>
                                <p style='text-align: center; font-size: 150%;'>¿ESTÁS SEGURO QUE QUIERES ELIMINAR LA RESERVA?</p>
                                <div style='text-align: center;'>
                                    <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float: left;'>
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
                require "models/reserva_pistas.php";

                $pedido = $_POST['id_validado'];

                $baja_reg = reserva_pistas::EliminarReservaPista($pedido, "?r=pistas/ConsultaPistaGimnasio");
            }

            if ($_POST['confirm'] == "NO") {
                echo "<script text='javascript'> window.location.replace('?r=pistas/ConsultaPistaGimnasio'); </script>";
            }
        } else {
            require "error.php";
        }
    }


    public function actionGrabarRegistoHorarioGimnasio()
    {
        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
       error_log(__FILE__.__LINE__);
      error_log(print_r($_POST, 1));
//       die;
        
        if(isset($_POST['fecha'])) 
        {
           
            require "models/reserva_pistas.php";

    
           // $fecha_creacion          =   date("Y-m-d H-i-s");

            if (isset($_POST['equipo']) && !empty($_POST['equipo']))
            {
                $equipo = $_POST['equipo'];
            }
            else
            {
                $equipo = "";
            }


           // $fecha                  = $_POST['fecha'];
           // $fecha_datetime         =   new DateTime($fecha);
           // $fecha2                 = DateTime::createFromFormat('d/m/Y',$_POST['fecha']);
            $fechamysql             = $_POST['fecha'];
            $hora_inicio            = $_POST['hora_inicio'];
            $hora_fin               = $_POST['hora_fin'];
            

            if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])) 
            { 
                $observ_intr    =   $_POST['observaciones'];
            }
            else 
            { $observ_intr=""; }

            $observ_intranet=utf8_decode($observ_intr);

            
           // $usuario_identificado = $_POST['usuario_identificado']; //usuario logueado que viene del formulario, se puede recoger por la variable de sesion.
            $iduser =  $_SESSION['idusuario'];
            $idcoach = $_SESSION['idcoach'];
            $espartido=0;
            $tipo="G";
            $pista="GIMNASIO";
            
           
            // hay que grabar la solicitud de sala en la tabla 'reserva_asiento_salaestudio' de la bbdd 'alqueria' 
            $nuevo_formulario_rellenado =reserva_pistas::InsertReservaPista($fechamysql,   $hora_inicio,  $hora_fin, $equipo, $espartido, $observ_intranet, $iduser, $idcoach, $tipo, $pista);

            if($nuevo_formulario_rellenado)
            {
                    
                    echo "<script text='javascript' charset='utf-8'>
                            alert('Tu solicitud de reserva de gimansio se ha grabado correctamente.');
                            window.location.replace('?r=pistas/ConsultaPistaGimnasio');
                        </script>";
                    die;
            }
            else 
            {
                    echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                    window.location.replace('?r=pistas/ConsultaPistaGimnasio');
                            </script>";
                    die;
            }
        }
    }




     /**************************************
        CONSULTA DE RESERVA DE SALA DE ESTUDIO
     * ***********************************/
        
    //  Carga la VISTA => pistas/ConsultaSalaEstudio
    public function actionConsultaSalaEstudio() 
    {
        require "models/reserva_salaestudio.php";
        require "models/jugadores.php";
      

        if (isset($_GET['fecha']))
        {
            $fecha = $_GET['fecha'];
        }
        else 
        {
            $fecha = date('Y-m-d');
        }

        $datos['horario']   = reserva_salaestudio::findReservaSalaEstudio($fecha);
        $datos['salas']     = reserva_salaestudio::findAllAsientosSala($fecha);
        $datos['jugadores'] = jugadores::findByis_active(1);
        //recuperamos los datos de reserva_salas por si hay alguna reserva completa desde la reserva de salas de la web
        $datos['reservacompleta']   = reserva_salaestudio::findAllReservaSalaestudioCompleta($fecha);
      

        vistaSinvista(array('datos' => $datos), "layout_consultasalaestudio");
    }

    //  Consulta sillas en un determinado horario y si hay reserva completa de sala en reserva_salas
    public function actionConsultaSalaEstudioSillas()
    {
        require "models/reserva_salaestudio.php";

        $fecha = $_POST['fecha'];
        $horaInicio = $_POST['horaInicio'];
        $horaFin = $_POST['horaFin'];

        //comprobamos si hay reservas completa en esa fecha y horas
        $disponible   =   reserva_salaestudio::findAllReservaSalaestudioCompletaFechaHora($fecha, $horaInicio, $horaFin);

        if (empty($disponible)) {

            $datosJSON    = reserva_salaestudio::findAllAsientosDisponibles($fecha, $horaInicio, $horaFin);

            echo json_encode(array(
                "response" =>  "success",
                "data"  =>  $datosJSON));
            die;

        }
        else {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                // hay registros
                echo json_encode(array(
                     "response"  => "error",
                     "message"   => "Sala de estudio ocupada"
                 ));
                die;
        }


        
    }


    


    //  Consulta de los datos del jugador para la reserva
    public function actionConsultaJugador()
    {
        require "models/jugadores.php";
        require "models/equipos.php";

        $id_jugador = $_POST['id'];
        $jugador = jugadores::findByid_jugador($id_jugador);
        //esto na haria falta porque el nombre del equipo lo tenemos en la consulta anterior findByid_jugador
        $equipo = equipos::findEquipoById($jugador['idequipo_alqueria']);

        echo json_encode(array(
            "response" =>  "success",
            "dataJ"  =>  $jugador,
            "dataE" => $equipo));
        die;
    }


    public function actionEnvioCorreoReservaSalaEstudio()
    {
        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
//        error_log(__FILE__.__LINE__);
//       error_log(print_r($_POST, 1));
//       die;
        
        if(isset($_POST['seccion_departamento'])) 
        {
            require "PHPMailer/envios_emails.php";
            require "models/reserva_salaestudio.php";

    
            $fecha_creacion          =   date("Y-m-d H-i-s");
            
            $email_jugador           =   strtolower($_POST['email_jugador']);
            $jugador                 =   $_POST['nombre_jugador'];
            $idjugador               =   $_POST['id-jugador'];
            $asiento                 =   $_POST['seccion_departamento'];

            //si la reserva es para un entrenador, se graba el jugador con id=0
            if (isset($_POST['reservaentrenador']) && !empty($_POST['reservaentrenador']))
            {
                $reserv_entrenador  = $_POST['reservaentrenador'];
                $email_jugador      = $_SESSION['emailusuario']; //recogemos el email de entrenador de la variable de sesion
                $idjugador          = 0;
                $jugador            ="-";
            }
            

//error_log("Email: ". $email_jugador);
//die;
            if (isset($_POST['equipo_jugador']) && !empty($_POST['equipo_jugador']))
            {
                $equipo = $_POST['equipo_jugador'];
            }
            else
            {
                $equipo = "";
            }


            $fecha                  = $_POST['fecha'];
            $fecha_datetime         =   new DateTime($fecha);
            $fecha2                 = DateTime::createFromFormat('d/m/Y',$_POST['fecha']);
            $fechamysql             = $_POST['fecha'];
            $hora_inicio            = $_POST['hora_inicio'];
            $hora_fin               = $_POST['hora_fin'];
            

            if(isset($_POST['observaciones']) && !empty($_POST['observaciones'])) 
            { 
                $observ_intr    =   $_POST['observaciones'];
            }
            else 
            { $observ_intr=""; }

            $observ_intranet=utf8_decode($observ_intr);


            $usuario_identificado = $_POST['usuario_identificado']; //usuario logueado que viene del formulario, se puede recoger por la variable de sesion.
            $idusuario =  $_SESSION['idusuario'];
            $identrenador = $_SESSION['idcoach'];
            
           /* if (isset($_SESSION['idcoach']) ) { 

                $identrenador=$_SESSION['idcoach'];
            } else { $identrenador="";}
            */

           
           
            
            /********************************************
             * PREPARAMOS EL CONTENIDO PARA EL EMAIL 
             ********************************************/
           //  Asunto del email
            $asunto_email    =   "Solicitud de reserva en sala de estudio";    //$lang["ins_cantera_email_asunto"];
            $contenido_email="<div><h3>Reserva en sala de estudio</h3><p>";
                            
            $contenido_email.="<b>Reservado por: </b>".$usuario_identificado."<br>"; 
            $contenido_email.="<b>Nombre del jugador: </b>".$jugador."<br>";    
            $contenido_email.="<b>Email: </b>".$email_jugador."<br>";  
            $contenido_email.="<b>Equipo: </b>".$equipo."<br>";  
            $contenido_email.="<b>Fecha: </b>".$fecha_datetime->format("d/m/Y")."<br>";  
            $contenido_email.="<b>Hora de: </b>".$hora_inicio." hasta: ".$hora_fin."<br>";  
            $contenido_email.="<b>Asiento reservado: </b>".$asiento."<br>";  
            $contenido_email.="<b>Observaciones: </b>".$observ_intr."<br></p>";  
          

            // hay que grabar la solicitud de sala en la tabla 'reserva_asiento_salaestudio' de la bbdd 'alqueria' 
            $nuevo_formulario_rellenado =reserva_salaestudio::insertreservasalaestudio(
                        $fechamysql,   $hora_inicio,  $hora_fin,  $asiento,  $idjugador,  $jugador, $equipo, $email_jugador, $identrenador, $observ_intr, $usuario_identificado, $idusuario);

            if($nuevo_formulario_rellenado)
            {
                    $email_enviado = envios_emails::enviar_email_reserva_asiento_sala_estudio($asunto_email, $contenido_email, $email_jugador, $jugador);
           
                    
                    
                    echo "<script text='javascript' charset='utf-8'>
                            alert('Tu solicitud de reserva en la sala de estudio se ha enviado correctamente.');
                            window.location.replace('?r=pistas/consultaSalaEstudio');
                        </script>";
                    die;
            }
            else 
            {
                    echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error, inténtalo de nuevo más tarde.');
                                    window.location.replace('?r=pistas/consultaSalaEstudio');
                            </script>";
                    die;
            }
        }
    }


    // CONSULTA DE SALA estudio para la llamada desde la intranet
    public function actionConsultaSalaEstudioCalendario()
    {
        require "models/reserva_salaestudio.php";

        if (isset($_GET['fecha'])) {
            $fecha = $_GET['fecha'];
        }
        else {
            $fecha = date('Y-m-d');
        }

        $datos['horario'] = reserva_salaestudio::findReservaSalaEstudio($fecha);
        $datos['asientos'] = reserva_salaestudio::findAllAsientosSala($fecha);
        $datos['salaestudio'] = reserva_salaestudio::findAllReservaSalaestudioCompleta($fecha);
        vistaSinvista(array('datos' => $datos), "layout_consultasalaestudio_intranet"); 
    }




    
    
    /****************************************************************************************
     *  OTROS: Los siguientes 2 métodos son del CAMPUS WORCESTER y NO SÉ POR QUÉ ESTÁN AQUI
     ****************************************************************************************/
    public function actionWorcesterForm() {

            if (isset($_POST['nombre'])) {

                    $_SESSION['actualizar_entidad_pagos'] = "inscripcion_campus_worcester";

                    require "models/mailers.php";

                    $nombre = $_POST['nombre'];
                    $apellidos = $_POST['apellidos'];
                    $fechanacimiento = $_POST['fechanacimiento'];
                    $telefono = $_POST['telefono'];
                    $movil = $_POST['movil'];
                    $email = $_POST['email'];
                    $pasaporte = $_POST['pasaporte'];
                    $fechaexpedicion = $_POST['fechaexpedicion'];
                    $fechacaducidad = $_POST['fechacaducidad'];
                    $nivelingleshablado = $_POST['nivelingleshablado'];
                    $nivelinglesescrito = $_POST['nivelinglesescrito'];
                    $tratamientosmedicos = $_POST['tratamientosmedicos'];
                    $alergias = $_POST['alergias'];
                    $club = $_POST['club'];
                    $categoria = $_POST['categoria'];
                    $altura = $_POST['altura'];
                    $tallaropa = $_POST['tallaropa'];

                    $nombreapellidos = $nombre." ".$apellidos;
                    /* Cuenta */
                    $titular = "";
                    $dnititular = "";

                    $iban = "";
                    $entidad = "";
                    $oficina = "";
                    $dc = "";
                    $cuenta = "";

                    $ultimopedido = mailers::findLastNumeroPedidoCampusWorcester();

                    $numeropedido = $ultimopedido['MAX(numero_pedido)'];

                    $numeropedido = $numeropedido + 1;

                    $nuevoformulario = mailers::newFormCampusWorcester($nombre,$apellidos,$fechanacimiento,$telefono,$movil,$email,$pasaporte,$fechaexpedicion,$fechacaducidad,$nivelingleshablado,$nivelinglesescrito,$tratamientosmedicos,$alergias,$club,$categoria,$altura,$tallaropa,$numeropedido,$titular,$dnititular,$iban,$entidad,$oficina,$dc,$cuenta);

                    if($nuevoformulario){
                    // header('Location: https://servicios.alqueriadelbasket.com/tpv_worcester/tpv.php?pedido=' . $numeropedido . '&titular=' . $titular . '');
                    header('Location: http://localhost/ALQUERIAFORMS/tpv_worcester/tpv.php?pedido=' . $numeropedido . '&titular=' . $titular . '');
                    }
                    else{
                            echo "<script text='javascript' charset='utf-8'> alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                            window.location.replace('?r=index/principal'); </script>";
                            die;
                    }

            }
    }

    public function actionOk() {

            require "models/mailers.php";

            $codigo = $_GET['codigo'];

            $pagado = 1;

            if (isset($_SESSION['actualizar_entidad_pagos'])) {

                    $actualizaestado = mailers::actualizapagadocampusworcester($codigo, $pagado);

                    $contenidocorreo = mailers::damedatoscampusworcester($codigo);

                    $contenidocorreo['fecha_nacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fecha_nacimiento']));
                    $contenidocorreo['expedicion_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo['expedicion_pasaporte']));
                    $contenidocorreo['caducidad_pasaporte'] = date("d/m/Y", strtotime($contenidocorreo['caducidad_pasaporte']));

                    $contenido = "Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                    "<br>Fecha de nacimiento: " . $contenidocorreo['fecha_nacimiento'] . 
                    "<br>Teléfono: " . $contenidocorreo['telefono'] . 
                    "<br>Teléfono Móvil: " . $contenidocorreo['telefono_movil'] . 
                    "<br>Correo electrónico: " . $contenidocorreo['email'] . 
                    "<br>Pasaporte: " . $contenidocorreo['pasaporte'] . 
                    "<br>Fecha de expedición: " . $contenidocorreo['expedicion_pasaporte'] . 
                    "<br>Fecha de caducidad: " . $contenidocorreo['caducidad_pasaporte'] . 
                    "<br>Nivel de inglés hablado: " . $contenidocorreo['ingles_hablado'] . 
                    "<br>Nivel de inglés escrito: " . $contenidocorreo['ingles_escrito'] . 
                    "<br>Tratamientos médicos: " . $contenidocorreo['tratamientos_medicos'] . 
                    "<br>Alergias: " . $contenidocorreo['alergias'] . 
                    "<br>Club: " . $contenidocorreo['equipo'] . 
                    "<br>Categoría: " . $contenidocorreo['categoria'] . 
                    "<br>Altura: " . $contenidocorreo['altura'] . 
                    "<br>Talla de ropa: " . $contenidocorreo['talla_ropa'];

                    $enviodecorreo = mailers::mailssend($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Campus Worcester", $contenidocorreo['email']);
                    $enviodecorreo2 = mailers::mailssend($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Campus Worcester", "campusworcester@valenciabasket.com");

                    if ($enviodecorreo) {
                            vistaSimple("layout_ok");
                    }
                    else {
                            vistaSimple("layout_ko");
                    }
            }
    }
}
?>