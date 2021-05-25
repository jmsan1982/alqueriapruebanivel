<?php
class ajaxController
{
    //  const URL_SERVER = 'C:\xampp\htdocs\alqueriaforms\public';
    const URL_SERVER    = 'C:\inetpub\wwwroot\alqueriaforms\public';
	
    public function actionDispatcher()
    {
        $metodo = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
        if ($metodo == "")
        {   $metodo = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);   }

        $force_debug = "false";
        if($force_debug === "true" || filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING) === "true") {
            error_log(print_r($_POST, 1));
        }

        switch($metodo)
        {
            /*  Muestra la inscripción original (modal) */
            case "inscripciones_cargar_contenido_inscripcion_original":
            {
                // error_log(__FILE__.__LINE__);
                // error_log(print_r($_POST,1));
                
                $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                if(!empty($idinscripcion))
                {
                    require "models/inscripciones.php";
                    require "includes/Utils.php";
                    $datos                          =   inscripciones::findFormForId($idinscripcion);
                    
                    // error_log(__FILE__.__LINE__);
                    // error_log(print_r($datos,1));
                
                    $cuentaBancariaCompleta         =   $datos['iban'].$datos['entidad'].$datos['oficina'].$datos['dc'].$datos['cuenta'];
                    $isValidCuentaBancariaCompleta  =   Utils::validateEntity($cuentaBancariaCompleta);
                    if (!$isValidCuentaBancariaCompleta)
                    {  
                        $alerta_cuenta="La cuenta bancaria es incorrecta.";
                        if(strlen($cuentaBancariaCompleta)!=24){$alerta_cuenta="La cuenta bancaria es incorrecta. No se compone de 24 dígitos. ";}
                    }
                    else
                    {   $alerta_cuenta="";  }
                    //  error_log(print_r($datos,1));
       
                    echo json_encode(array(
                        "response"      =>  "success",
                        "datos"         =>  $datos,
                        "modal_title"   =>  "Formulario de inscripción",
                        "message"       =>  "Los datos de la inscripción se han cargado correctamente.",
                        "alerta_cuenta" =>  $alerta_cuenta));
                    die;
                } 
                else
                {
                    echo json_encode(array(
                        "response"      => "error",
                        "datos"         => "",
                        "modal_title"   => "Error",
                        "message"       => "Parece que ha habido algún error"));
                }
                break;
            }
            
            /*  Permite validar una cuenta bancaria */
            case "validar_cuenta_bancaria":
            {
                $cuentabancaria = filter_input(INPUT_POST, 'cuentabancaria', FILTER_SANITIZE_STRING);
                
                require "includes/Utils.php";
                $isValidCuentaBancariaCompleta  =   self::comprobar_iban($cuentabancaria);
                
                if(!$isValidCuentaBancariaCompleta)
                {  
                    $alerta_cuenta="La cuenta bancaria es incorrecta.";
                    if(strlen($cuentaBancariaCompleta)!=24){
                        $alerta_cuenta="La cuenta bancaria es incorrecta. No se compone de 24 dígitos. ";
                    }
                    
                    echo json_encode(array(
                        "response"      =>  "error",
                        "alerta_cuenta" =>  $alerta_cuenta));
                }
                else{
                    $alerta_cuenta="";
                    echo json_encode(array(
                        "response"      =>  "success",
                        "alerta_cuenta" =>  "La cuenta bancaria es correcta."));
                }
                break;
            }

            // OBSOLETO. El codigo equivalente está en jugadoresController. inscripciones 20_21
            /*case "inscripciones20_21_cargar_contenido_jugador":
            {
                $idjugador      = filter_input(INPUT_POST,              'idjugador',    FILTER_SANITIZE_NUMBER_INT);
               // $dni_busqueda       = filter_input(INPUT_POST,          'dni_busqueda',     FILTER_SANITIZE_STRING);
                //$nombre_apellidos   = trim(filter_input(INPUT_POST,     'nombre_apellidos', FILTER_SANITIZE_STRING));
                
                
                if(!empty($idjugador))
                {
                //error_log(__FILE__.__LINE__);
                    require "models/inscripciones_escuela_y_cantera.php";
                    //require "models/licenciasfederacion1920.php";
                   // require "models/licenciasfederacion1920_equipos.php";
        
                    $datos = inscripciones_escuela_y_cantera::findFormForIdJugadorSinHorarios($idjugador);
                    $datoshorarios = inscripciones_escuela_y_cantera::findHorariosForIdJugador($idjugador);
                    
                    
                    echo json_encode(array(
                        "response"                          =>  "success",
                        "datos"                             =>  $datos,
                        "licenciasfederacion1920_equipos"   =>  "",
                        "modal_title"                       => "Formulario de inscripción",
                        "message"                           => "Los datos de la inscripción se han cargado correctamente.")
                    );
                   // error_log(__FILE__.__LINE__);
                   // error_log(print_r($datos,1));
                     
                }
                else
                {
                    error_log(__FILE__.__LINE__);
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Parece que ha habido algún error"));
                }
                break;
            }
            

            //inscripciones 20_21 recuperar horario 
            case "inscripciones20_21_cargar_horario_jugador":
            {
                error_log(__FILE__.__LINE__);
                error_log(print_r($_POST,1));
                
                $idjugador      = filter_input(INPUT_POST,              'idjugador',    FILTER_SANITIZE_NUMBER_INT);
               
                
                if(!empty($idjugador))
                {
                //error_log(__FILE__.__LINE__);
                    require "models/inscripciones_escuela_y_cantera.php";

                    $datos = inscripciones_escuela_y_cantera::findHorariosForIdJugador($idjugador);
                    
                    
                    echo json_encode(array(
                        "response"                          =>  "success",
                        "datos"                             =>  $datos,
                        "licenciasfederacion1920_equipos"   =>  "",
                        "modal_title"                       => "Formulario de inscripción",
                        "message"                           => "Los datos de la inscripción se han cargado correctamente.")
                    );
                   // error_log(__FILE__.__LINE__);
                   // error_log(print_r($datos,1));
                     
                }
                else
                {
                    error_log(__FILE__.__LINE__);
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Parece que ha habido algún error"));
                }
                break;
            }
            */


            
            case "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario":
            {
                //error_log(__FILE__.__LINE__);
                //error_log(print_r($_POST,1));
                
                $idinscripcion      = filter_input(INPUT_POST,          'idinscripcion',    FILTER_SANITIZE_NUMBER_INT);
                $dni_busqueda       = filter_input(INPUT_POST,          'dni_busqueda',     FILTER_SANITIZE_STRING);
                $nombre_apellidos   = trim(filter_input(INPUT_POST,     'nombre_apellidos', FILTER_SANITIZE_STRING));
                
                if(!empty($nombre_apellidos)){
                    $nombre_apellidos_array=explode(" ",$nombre_apellidos);
                    $nombre = strtoupper($nombre_apellidos_array[0]);
                    $nombre = str_replace("é","E",$nombre);
                }    
                
                if(!empty($idinscripcion))
                {
                //error_log(__FILE__.__LINE__);
                    require "models/inscripciones.php";
                    require "models/licenciasfederacion1920.php";
                    require "models/licenciasfederacion1920_equipos.php";
        
                    $datos = inscripciones::findFormForIdConHorarios($idinscripcion);
                    
                    echo json_encode(array(
                        "response"                          =>  "success",
                        "datos"                             =>  $datos,
                        "licenciasfederacion1920_equipos"   =>  "",
                        "modal_title"                       => "Formulario de inscripción",
                        "message"                           => "Los datos de la inscripción se han cargado correctamente.")
                    );
                    
                    /*
                            //  Ahora, debemos sacar el equipo, nombre y club a partir de la inscripción.
                            //  De la inscripción, debemos comprobar dni_jugador y dni_tutor.

                            $licenciasfederacion1920_equipos="";

                            //  Comprobamos si se trata de una excepción o no
                            if(!empty($dni_busqueda))
                            {
                                if($dni_busqueda=="73554498S"){
                                    if($nombre=="CARLOS"){
                                        $licenciasfederacion1920_equipos_busqueda=licenciasfederacion1920_equipos::findById(240);
                                        echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos_busqueda,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                        die;
                                    }
                                    else if($nombre=="JORDI"){
                                        $licenciasfederacion1920_equipos_busqueda=licenciasfederacion1920_equipos::findById(241); 
                                        echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos_busqueda,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                        die;

                                    }
                                }
                                else if($dni_busqueda=="53098149G"){
            //error_log(__FILE__.__LINE__);
                                    if($nombre=="HÉCTOR" || $nombre=="HECTOR" ){
                                        $licenciasfederacion1920_equipos_busqueda=licenciasfederacion1920_equipos::findById(265); 
                                        echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos_busqueda,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                        die;
                                    }
                                    else if($nombre=="AITANA"){
                                        $licenciasfederacion1920_equipos_busqueda=licenciasfederacion1920_equipos::findById(264);   
                                        echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos_busqueda,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                        die;
                                    }
                                }
                                else
                                {
                                    if(!empty($datos['dni_jugador']))
                                    {
                                        $licenciasfederacion1920_equipos=licenciasfederacion1920_equipos::findBydni_jugador($datos['dni_jugador']);
                                        if(!empty($licenciasfederacion1920_equipos))
                                        {
                                            echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>  $licenciasfederacion1920_equipos,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                            die;
                                        }
                                        else{
                                             echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>"",
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                            die;
                                        }
                                    }
                                    else{
                                        //  No hay dni_jugador en formulariosinscripciones.
                                        //  Buscamos con formulariosinscripciones['dni_tutor'] en la tabla licenciasfederacion_1920_equipos
                                        //  En licenciasfederacion_1920_equipos, el dni_jugador puede ser el del tutor
                                        $licenciasfederacion1920_equipos=licenciasfederacion1920_equipos::findBydni_jugador($dni_busqueda);
                                        echo json_encode(array(
                                            "response"                          => "success",
                                            "datos"                             => $datos,
                                            "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos,
                                            "modal_title"   => "Formulario de inscripción",
                                            "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                        die;
                                    }
                                }
                            }
                            else
                            {
                                echo json_encode(array(
                                    "response" => "success",
                                    "datos"     => $datos,
                                    "modal_title" => "",
                                    "message" => ""));
                                die;
                            }

                    */
                }
                else
                {
                    //  error_log(__FILE__.__LINE__);
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Parece que ha habido algún error"));
                }
                break;
            }

            /*  Muestra datos de cuenta bancaria (modal).*/
            case "inscripciones_cargar_contenido_editar_cuenta":
                {
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if (isset($idinscripcion) && !empty($idinscripcion)) {
                        require "models/inscripciones.php";
                        $datos = inscripciones::findFormForId($idinscripcion);

                        $solo_cuenta = explode("<br />IBAN", $datos['contenido']);
                        $solo_cuenta = $solo_cuenta[1];
                        $cuenta_troceada = explode("<br />", $solo_cuenta);

                        $cuenta_troceada_0_explode = explode(": ", $cuenta_troceada[0]);
                        $cuenta_troceada_1_explode = explode(": ", $cuenta_troceada[1]);
                        $cuenta_troceada_2_explode = explode(": ", $cuenta_troceada[2]);
                        $cuenta_troceada_3_explode = explode(": ", $cuenta_troceada[3]);
                        $cuenta_troceada_4_explode = explode(": ", $cuenta_troceada[4]);

                        $datos_iban = $cuenta_troceada_0_explode[1];
                        $datos_entidad = $cuenta_troceada_1_explode[1];
                        $datos_oficina = $cuenta_troceada_2_explode[1];
                        $datos_dc = $cuenta_troceada_3_explode[1];
                        $datos_cuenta = $cuenta_troceada_4_explode[1];

                        echo json_encode(array("response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "datos_iban" => $datos_iban,
                            "datos_entidad" => $datos_entidad,
                            "datos_oficina" => $datos_oficina,
                            "datos_dc" => $datos_dc,
                            "datos_cuenta" => $datos_cuenta,
                            "modal_title" => "Editar cuenta bancaria",
                            "message" => "La cuenta bancaria se ha cargado correctamente"));
                    } else {
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que no se encuentra la inscripción"));
                    }
                    break;
                }
                
            /*  Editar datos cuenta bancaria (modal). */
            case "inscripciones_editar_cuenta":
                {
                    require "models/inscripciones.php";
                    //require "models/inscripciones_duplicados";
                    require "includes/Utils.php";

                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    $datos = inscripciones::findFormForId($idinscripcion);
                    $solo_cuenta = explode("IBAN", $datos['contenido']);

                    $datos_iban = filter_input(INPUT_POST, 'datos_iban', FILTER_SANITIZE_STRING);
                    $datos_entidad = filter_input(INPUT_POST, 'datos_entidad', FILTER_SANITIZE_NUMBER_INT);
                    $datos_oficina = filter_input(INPUT_POST, 'datos_oficina', FILTER_SANITIZE_NUMBER_INT);
                    $datos_dc = filter_input(INPUT_POST, 'datos_dc', FILTER_SANITIZE_NUMBER_INT);
                    $datos_cuenta = filter_input(INPUT_POST, 'datos_cuenta', FILTER_SANITIZE_NUMBER_INT);

                    $nuevocontenido = $solo_cuenta[0] . "IBAN: " . $datos_iban
                        . "<br />ENTIDAD: " . $datos_entidad
                        . "<br />OFICINA: " . $datos_oficina
                        . "<br />DC: " . $datos_dc
                        . "<br />CUENTA: " . $datos_cuenta;

                    $cuentaBancariaCompleta = $datos_iban . $datos_entidad . $datos_oficina . $datos_dc . $datos_cuenta;
                    $isValidCuentaBancariaCompleta = Utils::validateEntity($cuentaBancariaCompleta);

                    if (!$isValidCuentaBancariaCompleta) {
                        echo json_encode(array("response" => "error_cuenta",
                            "idinscripcion" => $idinscripcion,
                            "message" => "L"));
                        die();
                    }

                    $cuentaBancariaModificada = inscripciones::actualizacuentabancaria($idinscripcion, $nuevocontenido);

                    if ($cuentaBancariaModificada) {
                        echo json_encode(array("response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "message" => "La cuenta bancaria se ha modificado correctamente"));
                    } else {
                        echo json_encode(array("response" => "error",
                            "idinscripcion" => $idinscripcion,
                            "message" => "La cuenta bancaria NO se ha modificado correctamente"));
                    }

                    break;
                }

            /*  Editar el dni del tutor parte back. */
            case "inscripciones_editar_dni_tutor":
                {
                    require "models/inscripciones.php";

                    $actualizacion = inscripciones::actualizaAtributo("dni_tutor",$_POST['dni'],$_POST['idinscripcion'],"si");

                    $actualizacion2 = inscripciones::actualizaAtributo("id_equipo_horario",$_POST['equipo'],$_POST['idinscripcion'],"si");

                    $actualizacion3 = inscripciones::actualizaAtributo("categoria",$_POST['categoria'],$_POST['idinscripcion'],"si");

                    $actualizacion3¡4 = inscripciones::actualizaAtributo("modalidad",$_POST['equipoAntiguo'],$_POST['idinscripcion'],"si");

                    echo "Todo OK";

                    break;
                }

            /*  Apartado alta nueva. */
            case "inscripciones_editar_alta":
                {
                    require "models/inscripciones.php";
                    $actualizacion = inscripciones::insertarInscripcion($_POST["nombre_apellidos"], $_POST["tipo"], $_POST["dni_jugador"], $_POST["id_equipo_horario"], $_POST["mail"]);

                    echo "Todo OK";

                    break;
                }
           
            case "inscripciones_cargar_anyadir_pago":
                {
                    $id_formularioinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if (isset($id_formularioinscripcion) && !empty($id_formularioinscripcion)) {
                        require "models/inscripciones.php";
                        require "models/inscripciones_pagos.php";
                        $inscripciones_pagos = inscripciones_pagos::findByIdFormulario($id_formularioinscripcion);

                        $contenido_tabla = '<h4 class="mb-0 pb-0">Pagos realizados:</h4><table id="listado-pagos" class="table w-100 mb-2">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Importe</th>
                                                <th>DNI</th>
                                            </tr>
                                        </thead>';
                        if (count($inscripciones_pagos) > 0) {
                            foreach ($inscripciones_pagos as $inscripciones_pago) {
                                $date = new DateTime($inscripciones_pago["fecha"]);
                                $contenido_tabla .= '<tr id="' . $inscripciones_pago['id'] . '">'
                                    . '<td class="">' . $date->format('d-m-Y h:m') . '</td>'
                                    . '<td class="">' . $inscripciones_pago['importe'] . '€</td>'
                                    . '<td class="">' . $inscripciones_pago['dni_pagador'] . '</td>'
                                    . '</tr>';
                            }
                        } else {
                            $contenido_tabla .= '<tr><td colspan="3">No hay pagos guardados</td></tr>';
                        }
                        $contenido_tabla .= "</table>";

                        echo json_encode(array("response" => "success",
                            "datos" => $contenido_tabla,
                            "message" => "Los pagos se han cargado correctamente."));
                    } else {
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que ha habido algún error"));
                    }
                    break;
                }
                
            case "inscripciones_cargar_pagos_inscripcion":
                {
                    //error_log(__FILE__.__LINE__);
                    //error_log(print_r($_POST, 1));
                    
                    $id_formularioinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if (isset($id_formularioinscripcion) && !empty($id_formularioinscripcion)) {
                        require "models/inscripciones.php";
                        require "models/inscripciones_pagos.php";
                        $inscripciones_pagos = inscripciones_pagos::findByIdFormulario($id_formularioinscripcion);

                        $contenido_tabla = '<table id="listado-pagos" class="table w-100 mb-2">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Importe</th>
                                                <th>DNI</th>
                                            </tr>
                                        </thead>';
                        if (count($inscripciones_pagos) > 0) {
                            foreach ($inscripciones_pagos as $inscripciones_pago) {
                                $date = new DateTime($inscripciones_pago["fecha"]);
                                $contenido_tabla .= '<tr id="' . $inscripciones_pago['id'] . '">'
                                    . '<td class="">' . $date->format('d-m-Y h:m') . '</td>'
                                    . '<td class="">' . $inscripciones_pago['importe'] . '€</td>'
                                    . '<td class="">' . $inscripciones_pago['dni_pagador'] . '</td>'
                                    . '</tr>';
                            }
                        } else {
                            $contenido_tabla .= '<tr><td colspan="3">No hay pagos guardados</td></tr>';
                        }
                        $contenido_tabla .= "</table>";

                        echo json_encode(array("response" => "success",
                            "datos" => $contenido_tabla,
                            "message" => "Los pagos se han cargado correctamente."));
                    } else {
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que ha habido algún error"));
                    }
                    break;
                }
                
            case "pagos_anyadir":
                {
                    require "models/inscripciones.php";
                    require "models/inscripciones_pagos.php";

                    $id_formularioinscripciones = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    $dni_pagador = filter_input(INPUT_POST, 'dnipago', FILTER_SANITIZE_STRING);
                    $fecha = date("Y-m-d H:i:s");
                    $importe = doubleval(filter_input(INPUT_POST, 'importepago', FILTER_SANITIZE_STRING));

                    $ultimo = $inscripciones_pagos = inscripciones_pagos::newInscripcionesPagos($id_formularioinscripciones, $fecha, $importe, $dni_pagador);

                    $inscripciones_pagos = inscripciones_pagos::findByIdFormulario($id_formularioinscripciones);

                    $contenido_tabla = '<table id="listado-pagos" class="table w-100 mb-2">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Importe</th>
                                            <th>DNI</th>
                                        </tr>
                                    </thead>';
                    $euros = 0;
                    if (count($inscripciones_pagos) > 0) {
                        foreach ($inscripciones_pagos as $inscripciones_pago) {
                            $euros += $inscripciones_pago['importe'];
                            $date = new DateTime($inscripciones_pago["fecha"]);
                            $contenido_tabla .= '<tr id="' . $inscripciones_pago['id'] . '">'
                                . '<td class="">' . $date->format('d-m-Y h:m') . '</td>'
                                . '<td class="">' . $inscripciones_pago['importe'] . '€</td>'
                                . '<td class="">' . $inscripciones_pago['dni_pagador'] . '</td>'
                                . '</tr>';
                        }
                    } else {
                        $contenido_tabla .= '<tr><td colspan="3">No hay pagos guardados</td></tr>';
                    }
                    $contenido_tabla .= "</table>";

                    echo json_encode(array("response" => "success",
                        "mensaje" => "El pago se ha añadido correctamente",
                        "idinscripcion" => $id_formularioinscripciones,
                        "total" => $euros,

                        "datos" => $contenido_tabla));
                    break;
                }

            /*  Muestra pagos pendientes/realizados de cada Usuario (modal). */
            case "inscripciones_cargar_pagos_trimestral":
                {
                    //  error_log(__FILE__.__LINE__);
                    //  error_log(print_r($_POST, 1));
                    
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if(isset($idinscripcion) && !empty($idinscripcion))
                    {
                        require "includes/Utils.php";
                        require "models/inscripciones.php";
                        require "models/inscripciones_pagos.php";
                        
                        //  Cargamos la inscripción y cargamos la instancia de los pagos 
                        $inscripcion        = inscripciones::findFormForId($idinscripcion);
                        $inscripcion_pago   = inscripciones_pagos::findById($idinscripcion);    //  Coge el último inscripciones pagos
                        
                        //  Totales inamovibles. Solo se pueden actualizar en base de datos.
                        $reserva                    = $inscripcion_pago['reserva'];                 
                        $matricula                  = $inscripcion_pago['matricula'];
                        $total_inscripcion          = $inscripcion_pago['total_inscripcion'];
                        $total_pendiente            = $inscripcion_pago['total_pendiente'];
                        
                        $aplicar_gastos_devolucion  = $inscripcion_pago['aplicar_gastos_devolucion'];
                        
                        //  Cantidades pendientes a pagar
                        $pendiente_matricula        = $inscripcion_pago['pendiente_matricula'];
                        $trimestre_noviembre        = $inscripcion_pago['trimestre_noviembre'];
                        $trimestre_enero            = $inscripcion_pago['trimestre_enero'];
                        $trimestre_abril            = $inscripcion_pago['trimestre_abril'];
                        
                        //  Incluir o no en XML
                        $omitir_incluirxml_matricula= $inscripcion_pago['omitir_incluir_xml_matricula'];
                        $omitir_incluirxml_noviembre= $inscripcion_pago['omitir_incluir_xml_noviembre'];
                        $omitir_incluirxml_enero    = $inscripcion_pago['omitir_incluir_xml_enero'];
                        $omitir_incluirxml_abril    = $inscripcion_pago['omitir_incluir_xml_abril'];
             
                        //  Fecha de creación del cargo en XML que se envia al banco. No significa que el dinero lo tiene L'Alqueria, significa que el pago se emitió.
                        $cobros_activos_matricula   = $inscripcion_pago['cobros_activos_matricula'];  
                        $cobros_activos_noviembre   = $inscripcion_pago['cobros_activos_noviembre'];    
                        $cobros_activos_enero       = $inscripcion_pago['cobros_activos_enero'];
                        $cobros_activos_abril       = $inscripcion_pago['cobros_activos_abril'];
                        
                        //  Fecha de confirmación del pago (ya sea físico o por confirmación después de que el Valencia Basket envíe el XML al banco)
                        $pagado_matricula           = $inscripcion_pago['pagado_matricula'];
                        $pagado_noviembre           = $inscripcion_pago['pagado_noviembre'];   
                        $pagado_enero               = $inscripcion_pago["pagado_enero"];                
                        $pagado_abril               = $inscripcion_pago["pagado_abril"];                
                                 

                        //  Totales inamovibles
                        if(empty($reserva))                     {   $reserva = '00.00';             }
                        if(empty($matricula))                   {   $matricula = '00.00';           }
                        if(empty($total_inscripcion))           {   $total_inscripcion = '00.00';   }
                        if(empty($total_pendiente))             {   $total_pendiente = '00.00';     }
                        
                        if($aplicar_gastos_devolucion === NULL) {   $aplicar_gastos_devolucion = 0; }

                        if(empty($pendiente_matricula))         {   $pendiente_matricula = '00.00'; }
                        if(empty($trimestre_enero))             {   $trimestre_enero = '00.00';     }
                        if(empty($trimestre_abril))             {   $trimestre_abril = '00.00';     }
                        if(empty($trimestre_noviembre))         {   $trimestre_noviembre = '00.00'; }
                        
                        //  MATRICULA
                        if($pagado_matricula === NULL && $cobros_activos_matricula==NULL)
                        {   $pagado_matricula = false;  }
                        else if(!empty($pagado_matricula) || !empty($cobros_activos_matricula))
                        {   $pagado_matricula = true;}

                        if(!empty($omitir_incluirxml_matricula))
                        {
                            if($omitir_incluirxml_matricula===1)
                            {   $incluir_xml_matricula=false;     }
                            
                            else if($omitir_incluirxml_matricula===0)
                            {   $incluir_xml_matricula=true;     }
                            
                            else
                            {   $incluir_xml_matricula=false;     }
                        }
                        else{
                            if($pagado_matricula)
                            { 
                                $incluir_xml_matricula=false;
                            }
                            else if(!empty($cobros_activos_matricula))
                            {
                                $incluir_xml_matricula=false;
                            }
                            else{
                                $incluir_xml_matricula=true;
                            }
                        }
                    //  FIN MATRICULA
                        
                    //  TRIMESTRE NOVIEMBRE 
                        if($pagado_noviembre === NULL && $cobros_activos_noviembre==NULL)
                        {   $pagado_noviembre = false;  }
                        else if(!empty($pagado_noviembre) || !empty($cobros_activos_noviembre))
                        {   $pagado_noviembre = true;}

                        if(!empty($omitir_incluirxml_noviembre))
                        {
                            if($omitir_incluirxml_noviembre===1)
                            {   $incluir_xml_noviembre=false;     }
                            
                            else if($omitir_incluirxml_noviembre===0)
                            {   $incluir_xml_noviembre=true;     }
                            
                            else
                            {   $incluir_xml_noviembre=true;     }
                        }
                        else{
                            if($pagado_noviembre)
                            { 
                                $incluir_xml_noviembre=false;
                            }
                            else if(!empty($cobros_activos_noviembre))
                            {
                                $incluir_xml_noviembre=false;
                            }
                            else{
                                $incluir_xml_noviembre=true;
                            }
                        }
                    //  FIN TRIMESTRE NOVIEMBRE 
                        
                    //  TRIMESTRE ENERO 
                        if($pagado_enero === NULL && $cobros_activos_enero==NULL)
                        {   $pagado_enero = false;  }
                        else if(!empty($pagado_enero) || !empty($cobros_activos_enero))
                        {   $pagado_enero = true;}

                        if(!empty($omitir_incluirxml_enero))
                        {
                            if($omitir_incluirxml_enero===1)
                            {   $incluir_xml_enero=false;     }
                            
                            else if($omitir_incluirxml_enero===0)
                            {   $incluir_xml_enero=true;     }
                            
                            else
                            {   $incluir_xml_enero=true;     }
                        }
                        else{
                            if($pagado_enero)
                            { 
                                $incluir_xml_enero=false;
                            }
                            else if(!empty($cobros_activos_enero))
                            {
                                $incluir_xml_enero=false;
                            }
                            else{
                                $incluir_xml_enero=true;
                            }
                        }
                    //  FIN TRIMESTRE ENERO 
                        
                    //  TRIMESTRE ABRIL  
                        if($pagado_abril === NULL && $cobros_activos_abril==NULL)
                        {   $pagado_abril = false;  }
                        else if(!empty($pagado_abril) || !empty($cobros_activos_abril))
                        {   $pagado_abril = true;}

                        if(!empty($omitir_incluirxml_abril))
                        {
                            if($omitir_incluirxml_abril===1)
                            {   $incluir_xml_abril=false;     }
                            
                            else if($omitir_incluirxml_abril===0)
                            {   $incluir_xml_abril=true;     }
                            
                            else
                            {   $incluir_xml_abril=true;     }
                        }
                        else{
                            if($pagado_abril)
                            { 
                                $incluir_xml_abril=false;
                            }
                            else if(!empty($cobros_activos_abril))
                            {
                                $incluir_xml_abril=false;
                            }
                            else{
                                $incluir_xml_abril=true;
                            }
                        }
                    //  FIN TRIMESTRE ABRIL 
                        
                        
                        
                        /*
                        if($pagado_noviembre === NULL)          {   $pagado_noviembre = false;      }
                        if($pagado_enero === NULL)             {   $pagado_enero = false;          }
                        if($pagado_abril === NULL)             {   $pagado_abril = false;          }*/
                        
                        /*if(!empty($pagado_matricula))           {   $cobros_activos_matricula = false;}
                        else if(!empty($cobros_activos_matricula)) 
                        {   $cobros_activos_matricula = false;    
                            //  Pondremos a false el checkbox de incluir en XML porque ya se incluyó y está a la espera de confirmación.
                        }
                        else
                        {   $cobros_activos_matricula = true;   }   */
                        
                        /* Si cobros_activos_noviembre está a NULL, significa que no se pagó y por tanto debe pagarse */
                        /*if(($pagado_noviembre!==false)&&
                            ($cobros_activos_noviembre === NULL || $cobros_activos_noviembre===0 || $cobros_activos_noviembre==="0" || $cobros_activos_noviembre==="0000-00-00 00:00:00"))
                        {   $cobros_activos_noviembre = false;  }
                        else
                        {   $cobros_activos_noviembre = true;   }
                        
                        if(($pagado_enero!==false)&&
                        ($cobros_activos_enero === NULL || $cobros_activos_enero===0 || $cobros_activos_enero==="0" || $cobros_activos_enero==="0000-00-00 00:00:00"))
                        {   $cobros_activos_enero = false;  }
                        else
                        {   $cobros_activos_enero = true;   }
                        
                        if(($pagado_abril!==false)&&
                            ($cobros_activos_abril === NULL || $cobros_activos_abril===0 || $cobros_activos_abril==="0" || $cobros_activos_abril==="0000-00-00 00:00:00"))
                        { 
                            $cobros_activos_abril = false;
                        }
                        else{
                            $cobros_activos_abril = true;
                        }*/


                        echo json_encode(array(
                            "response"          =>  "success",
                            "modal_title"       =>  "Editar Pagos Trimestral",
                            "message"           =>  "Los pagos de la inscripción se han cargado correctamente",
                            "tipo"              =>  $inscripcion['tipo'],
                            "comentario_general"=>  $inscripcion['comentario_general'],
                            "idinscripcion"     =>  $idinscripcion,
                            "fip"               =>  $inscripcion_pago['id'],
                            
                            //  Totales inamovibles
                            "reserva"           =>  $reserva,
                            "matricula"         =>  $matricula,
                            "total_inscripcion" =>  $total_inscripcion,
                            "total_pendiente"   =>  $total_pendiente,
                            
                            //  Datos de pagos
                            "pagado_matricula"              =>  $pagado_matricula,
                            "incluir_xml_matricula"         =>  $incluir_xml_matricula,
                            "aplicar_gastos_devolucion"     =>  $aplicar_gastos_devolucion,
                            
                            
                            'pendiente_matricula'   => $pendiente_matricula,
                            
                            //  Datos para los trimestres
                            "incluir_xml_noviembre" => $incluir_xml_noviembre,
                            "incluir_xml_enero"     => $incluir_xml_enero,
                            "incluir_xml_abril"     => $incluir_xml_abril,
                            
                            "omitir_incluir_xml_noviembre" => $omitir_incluirxml_noviembre,
                            "omitir_incluir_xml_enero"     => $omitir_incluirxml_enero,
                            "omitir_incluir_xml_abril"     => $omitir_incluirxml_abril,
                            
                            "trimestre_enero"       => $trimestre_enero,
                            "trimestre_abril"       => $trimestre_abril,
                            "trimestre_noviembre"   => $trimestre_noviembre,
                            
                            "cobros_activos_matricula"  => $cobros_activos_matricula,
                            "cobros_activos_noviembre"  => $cobros_activos_noviembre,
                            "cobros_activos_enero"      => $cobros_activos_enero,
                            "cobros_activos_abril"      => $cobros_activos_abril,
                                
                            'pagado_enero'          => $pagado_enero,
                            'pagado_abril'          => $pagado_abril,
                            'pagado_noviembre'      => $pagado_noviembre
                        ));
                    } 
                    else 
                    {
                        echo json_encode(array(
                            "response"      => "error",
                            "datos"         => "",
                            "modal_title"   => "Error",
                            "message"       => "Parece que no se encuentra la inscripción"));
                    }
                    break;
                }
            
            /*  Editar pagos de cada Usuario (modal). */
            /*  - Asegurarse de que poner un pago a OFF pone a null cobros_activos_noviembre y pagado_noviembre */
            case "inscripciones_pagos_trimestrales":
            {
//                error_log(__FILE__.__LINE__);
//                error_log(print_r($_POST,1));
                
                require "models/formulariosinscripciones.php";
                require "models/formulariosinscripciones_pagos.php";
                require "models/inscripciones.php";
                require "models/inscripciones_pagos.php";

                // Recogemos valores
                $idinscripcion              =   filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                $fip                        =   filter_input(INPUT_POST, 'fip', FILTER_SANITIZE_NUMBER_INT);
                $total_inscripcion          =   $_POST['total_inscripcion'];
                $reserva                    =   $_POST['reserva'];
                $matricula                  =   $_POST['matricula'];
                $total_pendiente            =   $_POST['total_pendiente']; 
                
                $pendiente_matricula                =   $_POST['pendiente_matricula'];
                $pagado_pendiente_matricula         =   $_POST['pagado_pendiente_matricula'];
                $incluir_pendiente_matricula_en_xml =   $_POST['incluir_pendiente_matricula_en_xml'];
    
                //  Gastos de devolucion
                $aplicar_gastos_devolucion  =   $_POST['aplicar_gastos_devolucion'];
                if(($aplicar_gastos_devolucion=="true"  ||    $aplicar_gastos_devolucion==true) && $aplicar_gastos_devolucion!="false")
                {    $gastos_devolucion  = $_POST['gastos_devolucion'];}
                else
                {   $gastos_devolucion=0;}
                    
                // Cantidades del trimestre (160, 160, 160...)
                $trimestre_enero            =   floatval(filter_input(INPUT_POST, 'trimestre_enero',      FILTER_SANITIZE_STRING));
                $trimestre_abril            =   floatval(filter_input(INPUT_POST, 'trimestre_abril',      FILTER_SANITIZE_STRING));
                $trimestre_noviembre        =   floatval(filter_input(INPUT_POST, 'trimestre_noviembre',  FILTER_SANITIZE_STRING));
                $comentario_general         =            filter_input(INPUT_POST, 'comentario_general',   FILTER_SANITIZE_STRING);
                    
                // Checkboxes que indican si un trimestre está pagado o no
                $pagado_enero               =   filter_input(INPUT_POST, 'pagado_enero',        FILTER_SANITIZE_STRING);
                $pagado_abril               =   filter_input(INPUT_POST, 'pagado_abril',        FILTER_SANITIZE_STRING);
                $pagado_noviembre           =   filter_input(INPUT_POST, 'pagado_noviembre',    FILTER_SANITIZE_STRING);
                    
                // XML que indica si se incluirá o no en el XML
                $incluir_xml_noviembre      =   filter_input(INPUT_POST, 'incluir_xml_noviembre',   FILTER_SANITIZE_STRING);
                $incluir_xml_enero          =   filter_input(INPUT_POST, 'incluir_xml_enero',       FILTER_SANITIZE_STRING);
                $incluir_xml_abril          =   filter_input(INPUT_POST, 'incluir_xml_abril',       FILTER_SANITIZE_STRING);
                    
                $cobros_activos_noviembre   =   "";
                $cobros_activos_enero       =   "";
                $cobros_activos_abril       =   "";
                
                // Inscripcion a modificar 
                $inscripcion_pago           =   inscripciones_pagos::findByIdFormularioFetch($idinscripcion);
                $inscripcion                =   inscripciones::findFormForId($idinscripcion);
                    
                //  $pagado_pendiente_matricula es el checkbox que indica si la matricula está pagada.
                //  $fecha_pagado_matricula es la fecha en la cual se paga la matrícula.
                    if($pagado_pendiente_matricula===false || $pagado_pendiente_matricula==="false")
                    {   $fecha_pagado_matricula=NULL;$cobros_activos_matricula=NULL;}
                    else if($pagado_pendiente_matricula==="true")
                    {
                        $cobros_activos_matricula=$inscripcion_pago['cobros_activos_matricula'];
                        if(!empty($inscripcion_pago['pagado_matricula']))
                        {
                            // Si ya existia, dejamos la misma fecha
                            $fecha_pagado_matricula=$inscripcion_pago['pagado_matricula'];
                        }
                        else
                        {
                            //  Pagan ahora y por tanto, asignamos la fecha de ahora 
                            $fecha_pagado_matricula=date("Y-m-d H:i:s");
                        }
                    }
                    
                //  $incluir_pendiente_matricula_en_xml se usa directamente en el update
                    if($incluir_pendiente_matricula_en_xml===false || $incluir_pendiente_matricula_en_xml==="false")
                    {   $omitir_incluir_en_xml=1;}
                    else if($incluir_pendiente_matricula_en_xml===true || $incluir_pendiente_matricula_en_xml==="true")
                    {   $omitir_incluir_en_xml=0;}
                    else
                    {   error_log("incluir_pendiente_matricula_en_xml vale: ".$incluir_pendiente_matricula_en_xml);  }
                    
                    
                //  ACTUALIZACION NOVIEMBRE 
                    if($pagado_noviembre==="true")
                    {
                        if(!empty($inscripcion_pago["pagado_noviembre"]) && !is_null($inscripcion_pago["pagado_noviembre"]) && $inscripcion_pago["pagado_noviembre"] !=='0000-00-00 00:00:00')
                        {   $pagado_noviembre = $inscripcion_pago["pagado_noviembre"];  }
                        else
                        {   $pagado_noviembre = date('Y-m-d H:i:s');    }
                    }
                    else
                    {   $cobros_activos_noviembre = $pagado_noviembre = NULL;}
                    
                    if($incluir_xml_noviembre===false || $incluir_xml_noviembre==="false")
                    {   $omitir_incluir_xml_noviembre=1;    error_log("\$omitir_incluir_xml_noviembre=1");}
                    else if($incluir_xml_noviembre==="true")
                    {   $omitir_incluir_xml_noviembre=0;    error_log("\$omitir_incluir_xml_noviembre=0");}

                    
                //  ACTUALIZACION ENERO
                    if($pagado_enero==="true")
                    {
                        if(!empty($inscripcion_pago["pagado_enero"]) && !is_null($inscripcion_pago["pagado_enero"]) && $inscripcion_pago["pagado_enero"] !=='0000-00-00 00:00:00')
                        {   $pagado_enero = $inscripcion_pago["pagado_enero"];}
                        else
                        {   $pagado_enero = Date('Y-m-d H:i:s');}
                    }
                    else
                    {   $cobros_activos_enero = $pagado_enero = NULL;}
                    
                    if($incluir_xml_enero===false || $incluir_xml_enero==="false")
                    {   $omitir_incluir_xml_enero=1;    error_log("\$omitir_incluir_xml_enero=1");}
                    else if($incluir_xml_enero==="true")
                    {   $omitir_incluir_xml_enero=0;    error_log("\$omitir_incluir_xml_enero=0");}
                    
                    
                //  ACTUALIZACION ABRIL 
                    if($pagado_abril==="true")
                    {
                        if(!empty($inscripcion_abril["pagado_abril"]) && !is_null($inscripcion_pago["pagado_abril"]) && $inscripcion_pago["pagado_abril"] !=='0000-00-00 00:00:00')
                        {   $pagado_abril = $inscripcion_pago["pagado_abril"];}
                        else
                        {   $pagado_abril = Date('Y-m-d H:i:s');}
                    }
                    else
                    {   $cobros_activos_abril = $pagado_abril = NULL;}
                    
                    if($incluir_xml_abril===false || $incluir_xml_abril==="false")
                    {   $omitir_incluir_xml_abril=1;    error_log("\$omitir_incluir_xml_abril=1");}
                    else if($incluir_xml_abril==="true")
                    {   $omitir_incluir_xml_abril=0;    error_log("\$omitir_incluir_xml_abril=0");}
                    

                //  GESTIÓN DEL PAGO DE LA MATRICULA
                    if($pagado_pendiente_matricula !== "false")
                    {
                        if(empty($inscripcion_pago["pagado_pendiente_matricula"]) || $inscripcion_pago["pagado_pendiente_matricula"] === NULL) {
                            $pagado_pendiente_matricula = Date('Y-m-d H:i:s');
                        } else {
                            $pagado_pendiente_matricula = $inscripcion_pago["pagado_pendiente_matricula"];
                        }
                    } 
                    else
                    {
                        $pagado_pendiente_matricula = NULL;
                    }
                      
                    
                //  UPDATE. Actualizamos en base de datos 
                    if(!empty($fip))
                    {
                        formulariosinscripciones::updateAttribute($idinscripcion, 'comentario_general', $comentario_general, "si");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'reserva',                $reserva,       "no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'matricula',              $matricula,     "no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'pendiente_matricula',    $pendiente_matricula,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'total_inscripcion',      $total_inscripcion,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'total_pendiente',        $total_pendiente,"no");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'pagado_matricula',               $fecha_pagado_matricula,"si");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'omitir_incluir_xml_matricula',   $omitir_incluir_en_xml,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'cobros_activos_matricula',       $cobros_activos_matricula,"si");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'pagado_enero',       $pagado_enero,"si");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'pagado_abril',       $pagado_abril,"si");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'pagado_noviembre',   $pagado_noviembre,"si");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'trimestre_enero',        $trimestre_enero,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'trimestre_abril',        $trimestre_abril,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'trimestre_noviembre',    $trimestre_noviembre,"no");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'cobros_activos_enero',       $cobros_activos_enero,"si");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'cobros_activos_abril',       $cobros_activos_abril,"si");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'cobros_activos_noviembre',   $cobros_activos_noviembre,"si");
                        
                        formulariosinscripciones_pagos::updateAttribute($fip, 'omitir_incluir_xml_enero',       $omitir_incluir_xml_enero,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'omitir_incluir_xml_abril',       $omitir_incluir_xml_abril,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'omitir_incluir_xml_noviembre',   $omitir_incluir_xml_noviembre,"no");
                        formulariosinscripciones_pagos::updateAttribute($fip, 'aplicar_gastos_devolucion',$gastos_devolucion,"no");
                        
                        /*
                        $actualizacion = inscripciones_pagos::actualizarPagosTrimestres(
                            $fip, 
                            $reserva,                   $matricula,                     $pendiente_matricula,       $total_inscripcion,         $total_pendiente,
                            $fecha_pagado_matricula,    $pagado_pendiente_matricula,    $omitir_incluir_en_xml,     $cobros_activos_matricula,
                            $pagado_enero,              $pagado_abril,                  $pagado_noviembre,          
                            $trimestre_enero,           $trimestre_abril,               $trimestre_noviembre, 
                            $cobros_activos_enero,      $cobros_activos_abril,          $cobros_activos_noviembre,
                            $omitir_incluir_xml_enero,  $omitir_incluir_xml_abril,      $omitir_incluir_xml_noviembre,
                            $gastos_devolucion);    
                        */
                        
                        
                        echo json_encode(array(
                            "response"      => "success",
                            "idinscripcion" => $idinscripcion,
                            "fip"           => $fip,
                            "message"       => "Los datos se han modificado correctamente."));
                    }
                    else
                    {   
                        error_log(__FILE__.__LINE__.": Error a revisar en inscripciones_pagos::actualizarPagosTrimestres");
                        
                        echo json_encode(array(
                            "response"      => "error",
                            "idinscripcion" => $idinscripcion,
                            "fip"           => $fip,
                            "message"       => "Ha habido un error al modificar los pagos."));
                    }
                    
                    /*
                    if($actualizacion)
                    {
                        echo json_encode(array(
                            "response"      => "success",
                            "idinscripcion" => $idinscripcion,
                            "fip"           => $fip,
                            "message"       => "Los datos se han modificado correctamente."));
                    } 
                    else 
                    {
                        echo json_encode(array(
                            "response"      => "error",
                            "idinscripcion" => $idinscripcion,
                            "fip"           => $fip,
                            "message"       => "Ha habido un error al modificar los pagos."));
                    }
                    */
                    break;
                }
                
            /*  Muestra el estado de la inscripción (alta / baja)*/
            case "inscripciones_cargar_estado_inscripcion":
                {
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    if(isset($idinscripcion) && !empty($idinscripcion))
                    {
                        require "includes/Utils.php";
                        require "models/inscripciones.php";
                        require "models/inscripciones_pagos.php";

                        // Cargamos la inscripción
                        $inscripcion        = inscripciones::findFormForId($idinscripcion);

                        echo json_encode(array(
                            "response" => "success",
                            "idinscripcion" => $inscripcion,
                            "estado_inscripcion" => $inscripcion['is_active'],
                            "message" => "El estado de la inscripción se cargó correctamente"));
                    } 
                    else{
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que no se encuentra la inscripción"));
                    }
                    break;
                }
                
            /*  Modifica el estado de la inscripción (dar de baja / dar de alta)   */
            case "inscripciones_estado_inscripcion":{
                require "models/inscripciones.php";
                require "models/inscripciones_pagos.php";
                
                $idinscripcion              = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                $nuevo_estado_inscripcion   = filter_input(INPUT_POST, 'nuevo_estado_inscripcion', FILTER_SANITIZE_STRING);
                if($nuevo_estado_inscripcion==="1" || $nuevo_estado_inscripcion==="true")
                {$is_active=1;}
                else{$is_active=0;}
                
                $actualizado=inscripciones::actualizaEstado($idinscripcion,$is_active);
                
                if($actualizado){
                     echo json_encode(array(
                            "response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "estado_inscripcion" => $is_active,
                            "message" => "El estado de la inscripción se ha actualizado"));
                } 
                else{
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que ha habido algún problema"));
                    }
            
                break;
            }
            
            /*  Domiciliaciones. Cargar listado de cuentas bancarias incorrectas */
            case "domiciliaciones_cargar_cuentas_bancarias_incorrectas":{
                require "models/inscripciones.php";
                require "models/inscripciones_pagos.php";
                require "includes/Utils.php";
                
                //  Primero recuperamos todas las inscripciones con is_active=1
                $inscripciones_activas=inscripciones::findAllByIsActive();
                
                //  Segundo, las recorremos y comprobamos su numero de cuenta 
                $contador_cuentas_bancarias_incorrectas=0;
                $contenido_tabla=   '<table class="table w-100 mb-2">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>NºPedido</th>
                                                <th>Nombre y apellidos</th>
                                                <th>DNI Titular</th>
                                                <th>Titular</th>
                                                <th>Teléfono padre</th>
                                                <th>Teléfono madre</th>
                                                <th>Estado inscripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                $contenido_tabla_tr_0_instancias='<tr><td colspan="5">No hay ninguna inscripción con la cuenta bancaria mal introducida.</td></tr>';
                
                foreach($inscripciones_activas as $inscripcion_activa){
                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcion_activa);
                    
                    // Validamos que la cuenta es correcta 
                    $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);
   
                    if(!$cuentaValidada){
                        $array_contenido = preg_split('/<br[^>]*>/i', $inscripcion_activa['contenido']);
                    
                        $contenido_tabla.='<tr id="cuenta-incorrecta'.$inscripcion_activa['id_formulario']. '" style="cursor:pointer;">';
                        
                        $contenido_tabla.='<td class="t-center">' . $inscripcion_activa['numero_pedido'] . '</td>';

                        $contenido_tabla.='<td class="t-center">'.$inscripcion_activa['nombre_apellidos'].'</td>';
                        
                        if (isset($array_contenido) && isset($array_contenido[17]) && $array_contenido[17] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[17] . '</td>';} 
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[16]) && $array_contenido[16] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[16] . '</td>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[11]) && $array_contenido[11] !== "")
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[11] . '</td>';} 
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[12]) && $array_contenido[12] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[12] . '</td>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}
                        
                        if($inscripcion_activa['is_active']==="1")
                        {   $contenido_tabla.= '<td class="t-center">ACTIVA</td></tr>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">NO ACTIVA</td></tr>';}
                        
                        $contador_cuentas_bancarias_incorrectas++;
                    }
                }
                
                if($contador_cuentas_bancarias_incorrectas===0){
                    echo json_encode(array(
                        "response" => "success",
                        "message" => "No hay ninguna inscripción con la cuenta bancaria mal introducida.",
                        "contenido_tabla_cuenta_bancaria"=>$contenido_tabla.$contenido_tabla_tr_0_instancias."</tbody></table>"
                    ));
                }
                else
                {   echo json_encode(array(
                        "response"                          => "error",
                        "message"                           => "Hay varias inscripciones con el número de cuenta bancaria incorrecto.",
                        "contenido_tabla_cuenta_bancaria"   => $contenido_tabla."</tbody></table>",
                        "numero_resultados"                 => $contador_cuentas_bancarias_incorrectas
                    ));
                }
                
                break;
            }
            
            /*  Domiciliaciones trimestrales: genera el XML con los pagos del trimestre que se selecciona */
            case "domiciliaciones_trimestrales_inscripciones":
                {
                    require "models/inscripciones.php";
                    $trimestre  =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
                    $datos["inscripciones_cobros_activos_por_confirmar"] = inscripciones::findInscripcionesPagosIncluidasXMLPorConfirmarPago($trimestre);

                    //if (isset($_POST["export_data_inscripciones_cantera"])) {
                        $filename = "Inscripciones_Pendientes_Pago_Patronato_".date('Ymd') . ".xls";
                        header('Content-Encoding: UTF-8');
                        header('Content-Type: text/html; charset=utf-16');
                        header("Content-Type: application/vnd.ms-excel; charset=utf-16");
                        header("Content-Disposition: attachment; filename=".$filename."");
                        header('Cache-Control: max-age=0');
                        $show_column = false;

                        if (!empty($datos['inscripciones_cobros_activos_por_confirmar'])){
                            foreach ($datos['inscripciones_cobros_activos_por_confirmar'] as $inscripciones_cobros_activos_por_confirmar) {
                                if (!$show_column) {
                                    // Display field/column names in first row
                                    echo implode("\t", array_keys($inscripciones_cobros_activos_por_confirmar)) . "\r\n";
                                    $show_column = true;
                                }
                                echo implode("\t", array_values($inscripciones_cobros_activos_por_confirmar)) . "\r\n";
                            }
                        }
                        exit;
                   // }
                    break;
                }
            
            /*
                header('Content-type: text/xml');
                header('Content-Disposition: attachment; filename=myDomiciliation.xml');

                require "models/inscripciones.php";
                require "models/inscripciones_pagos.php";
                require "includes/Utils.php";
                require "models/historico_domiciliaciones_trimestrales_inscripciones.php";

                //  Recuperamos el trimestre que se desea generar
                $trimestre = filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);

                switch($trimestre){
                    case 'enero':     {$trimestre=array("trimestre_enero",    "Enero",    "pagado_enero");    $anyoActual='2019';         $cobros_activos_string="cobros_activos_enero";      break;}
                    case 'abril':     {$trimestre=array("trimestre_abril",    "Abril",    "pagado_abril");    $anyoActual='2019';         $cobros_activos_string="cobros_activos_abril";      break;}
                    case 'noviembre': {$trimestre=array("trimestre_noviembre","Noviembre","pagado_noviembre");$anyoActual='2018';         $cobros_activos_string="cobros_activos_noviembre";  break;}
                }

                $file = fopen(self::URL_SERVER . '\Cuentas Erroneas Domiciliacion Trimestral', "w");
                error_log( self::URL_SERVER );
                fwrite($file, "CUENTAS BANCARIAS ERRONEAS DOMICILIACION TRIMESTRAL " . $trimestre[1] . " " . $anyoActual . ":\n");

                // Extrae las instancias a tener en cuenta para el XML. Luego habrá que agruparlas por hermanos.
                $allInscripcionesXML = inscripciones::findInscripcionesPagosXml($trimestre,$cobros_activos_string);

                $numRows = 0;
                $totalSum = 0;
                $validInscripcionsAccount = [];
                $setHermanos = [];

                foreach($allInscripcionesXML as $inscripcion){
                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcion);

                    // Validamos que la cuenta es correcta 
                    $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);

                    if(!$cuentaValidada){
                        $extraerDatosTitular = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);
                        fwrite($file, $extraerDatosTitular[17] . "  " . $extraerDatosTitular[16] . "  " . $extraerDatosTitular[11] . " / " . $extraerDatosTitular[12] . "\n");
                        continue;
                    }
                    $nombreApellidos = $inscripcion['nombre_apellidos'];
                    $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                    $totalSum += $inscripcion[$trimestre[0]];
                    $validInscripcionsAccount[] = $inscripcion;
                    $numRows++;
                }

                $hermanosAgrupados = Utils::checkearHermanos($setHermanos);
                $hermanosAgrupadosCounter = Utils::checkearHermanos($setHermanos);

                $cantidadDomiciliaciones = 0;

                foreach ($validInscripcionsAccount as $inscripcion){
                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcion);

                    if (!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                        continue;
                    }

                    $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                    $hermanosAgrupadosCounter[$nombreHermanos] = "";
                    $cantidadDomiciliaciones++;
                }

                if(empty($validInscripcionsAccount)) {
                    echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                    die();
                }

                $MndtId_Unique_Identifier = 1;
                $contador = 1;
                $fechaActual = Date('Y-m-d H:i:s');
                $fechaActualSH = Date('Y-m-d');
                $myXml = new XMLWriter();

                $myXml->openUri(self::URL_SERVER . '\Domiciliacion Trimestral ' . $trimestre[1] . ' ' . $anyoActual . '.xml');
                $myXml->setIndent(true);
                $myXml->setIndentString("  ");

                $myXml->startDocument('1.0', 'utf-8', "no");

                $myXml->startElement("Document");
                $myXml->startAttribute("xmlns");
                $myXml->text("urn:iso:std:iso:20022:tech:xsd:pain.008.001.02");
                $myXml->endAttribute();

                // Root Document 
                $myXml->startElement("CstmrDrctDbtInitn");

                $MsgId = str_replace([" ", '-', ':'], "", $fechaActual);
                $fechaActualSinHora = str_replace([" ", '-', ':'], "", $fechaActualSH);

                // Header XML 
                $myXml->startElement("GrpHdr");

                $myXml->startElement("MsgId");
                $myXml->text($MsgId);
                $myXml->endElement();

                $myXml->startElement("CreDtTm");
                $myXml->text(Date('Y-m-d') . "T" . Date('H:m:s'));
                $myXml->endElement();

                $myXml->startElement("NbOfTxs");
                $myXml->text($cantidadDomiciliaciones);
                $myXml->endElement();

                $myXml->startElement("CtrlSum");
                $myXml->text($totalSum);
                $myXml->endElement();

                $myXml->startElement("InitgPty");
                $myXml->startElement("Nm");
                $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                $myXml->endElement();
                $myXml->startElement("Id");
                $myXml->startElement("OrgId");
                $myXml->startElement("Othr");
                $myXml->startElement("Id");
                $myXml->text("ES45000G96614474");
                $myXml->endElement();
                $myXml->startElement("SchmeNm");
                $myXml->startElement("Cd");
                $myXml->text("CORE");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                // End Heade XML 

                // Start Main Content XML 
                $myXml->startElement("PmtInf");
                $myXml->startElement("PmtInfId");
                $myXml->text("2RCUR" . $fechaActualSinHora);
                $myXml->endElement();

                $myXml->startElement("PmtMtd");
                $myXml->text("DD");
                $myXml->endElement();

                $myXml->startElement("NbOfTxs");
                $myXml->text($numRows);
                $myXml->endElement();

                $myXml->startElement("CtrlSum");
                $myXml->text($totalSum);
                $myXml->endElement();

                $myXml->startElement("PmtTpInf");
                $myXml->startElement("SvcLvl");
                $myXml->startElement("Cd");
                $myXml->text("SEPA");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->startElement("LclInstrm");
                $myXml->startElement("Cd");
                $myXml->text("CORE");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->startElement("SeqTp");
                $myXml->text("RCUR");
                $myXml->endElement();
                $myXml->endElement();

                $myXml->startElement("ReqdColltnDt");
                $myXml->text(Date('Y-m-d'));
                $myXml->endElement();

                $myXml->startElement("Cdtr");
                $myXml->startElement("Nm");
                $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                $myXml->endElement();
                $myXml->endElement();

                $myXml->startElement("CdtrAcct");
                $myXml->startElement("Id");
                $myXml->startElement("IBAN");
                $myXml->text("ES2931590009962339424422");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();

                $myXml->startElement("CdtrAgt");
                $myXml->startElement("FinInstnId");
                $myXml->startElement("BIC");
                $myXml->text("CAIXESBBXXX");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();

                $myXml->startElement("ChrgBr");
                $myXml->text("SLEV");
                $myXml->endElement();

                $myXml->startElement("CdtrSchmeId");
                $myXml->startElement("Id");
                $myXml->startElement("PrvtId");
                $myXml->startElement("Othr");
                $myXml->startElement("Id");
                $myXml->text("ES45000G96614474");
                $myXml->endElement();
                $myXml->startElement("SchmeNm");
                $myXml->startElement("Prtry");
                $myXml->text("SEPA");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();

                $myValues = "";
                $setNombreApellidosPagados = "(";

                // Inicio Bucle Usuarios 
                foreach ($validInscripcionsAccount as $inscripcion) {
                    $setNombreApellidosPagados .= '"' . $inscripcion["nombre_apellidos"] . '"';

                    if ($inscripcion != end($validInscripcionsAccount)) {
                        $setNombreApellidosPagados .= ",";
                    }

                    $totalSum += $inscripcion[$trimestre[0]];
                    $fechaAlta = $inscripcion['fecha'];

                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcion);

                    if (!in_array($cuentaBancariaCompleta, $hermanosAgrupados)) {
                        continue;
                    }

                    $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                    $hermanosAgrupados[$nombreHermanos] = "";
                    $nombreHermanosSeparados = explode(' -- ', $nombreHermanos);

                    //  Aquí viene el recálculo del importe que suma el de los hermanos             
                    $calcularImporte = Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados, $trimestre[0]);

                    $numeroDeCuentaIBAN = explode("IBAN:", $inscripcion['contenido']);
                    $solo_cuenta = $numeroDeCuentaIBAN[1];
                    $cuenta_troceada = explode("<br />", $solo_cuenta);

                    $cuenta_troceada_0_explode = explode(" ", $cuenta_troceada[0]);
                    $cuenta_troceada_1_explode = explode(" ", $cuenta_troceada[1]);
                    $cuenta_troceada_2_explode = explode(" ", $cuenta_troceada[2]);
                    $cuenta_troceada_3_explode = explode(" ", $cuenta_troceada[3]);
                    $cuenta_troceada_4_explode = explode(" ", $cuenta_troceada[4]);

                    $datos_iban = $cuenta_troceada_0_explode[1];
                    $datos_entidad = $cuenta_troceada_1_explode[1];
                    $datos_oficina = $cuenta_troceada_2_explode[1];
                    $datos_dc = $cuenta_troceada_3_explode[1];
                    $datos_cuenta = $cuenta_troceada_4_explode[1];

                    $cuentaBancariaCompleta = $datos_iban . $datos_entidad . $datos_oficina . $datos_dc . $datos_cuenta;

                    $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);

                    $myXml->startElement("DrctDbtTxInf");
                    $myXml->startElement("PmtId");
                    $myXml->startElement("EndToEndId");
                    $myXml->text($endToEndId . "-" . $contador);
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("InstdAmt");
                    $myXml->startAttribute("Ccy");
                    $myXml->text("EUR");
                    $myXml->endAttribute();
                    $myXml->text($calcularImporte);
                    $myXml->endElement();

                    $myXml->startElement("DrctDbtTx");

                    $myXml->startElement("MndtRltdInf");

                    $myXml->startElement("MndtId");
                    $myXml->text($MndtId_Unique_Identifier);
                    $myXml->endElement();

                    $myXml->startElement("DtOfSgntr");
                    $myXml->text($fechaAlta);
                    $myXml->endElement();

                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("DbtrAgt");
                    $myXml->startElement("FinInstnId");
                    $myXml->startElement("BIC");
                    $myXml->text("NOTPROVIDED");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("Dbtr");
                    $myXml->startElement("Nm");
                    $myXml->text($nombreHermanos);
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("DbtrAcct");
                    $myXml->startElement("Id");
                    $myXml->startElement("IBAN");
                    $myXml->text($cuentaBancariaCompleta);
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("RmtInf");
                    $myXml->startElement("Ustrd");
                    $myXml->text("Fundación 2000 Pago Trimestre " . $trimestre[1] . " " . $anyoActual);
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->endElement();
                    $contador++;
                    $MndtId_Unique_Identifier++;

                }

                $setNombreApellidosPagados .= ")";

                $myXml->endElement();
                // Fin Bucle Usuarios 
                $myXml->endElement();
                $myXml->fullEndElement();
                $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

                foreach ($validInscripcionsAccount as $inscripcionHistorico) {
                    $myValues .= "(";

                    $id_formularioinscripciones = $inscripcionHistorico['id_formularioinscripciones'];
                    $fechaDomiciliacion = Date('Y-m-d H:i:s');
                    $nombreApellidos = $inscripcionHistorico['nombre_apellidos'];
                    $nombreApellidosSpaces = str_replace(["  "], " ", $nombreApellidos);
                    $nombreApellidosCaps = ucwords($nombreApellidosSpaces);
                    $dniTitular = $inscripcionHistorico['dni_pagador'];
                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcionHistorico);

                    $myValues .= $id_formularioinscripciones . ",'" . $fechaDomiciliacion . "','" . $nombreApellidosCaps . "','" . $trimestre[1] . "','" . $dniTitular . "','" . $cuentaBancariaCompleta . "')";

                    if($inscripcionHistorico != end($validInscripcionsAccount)) {
                        $myValues .= ",";
                    }
                }

                //  Transaccion sql actualizar pago trimestral y entidad de domiciliaciones 
                //  $myTransaction = new PDO('mysql:host=localhost;dbname=alqueriaforms', 'root', 'Abc01cba',   array(PDO::ATTR_PERSISTENT => true));
                $myTransaction = new PDO('mysql:host=localhost;dbname=alqueriaforms', 'root', '',   array(PDO::ATTR_PERSISTENT => true));

                // comenzamos la transaccion
                try {
                    $query_update="update formulariosinscripciones_pagos fip join formulariosinscripciones fi on(fip.id_formularioinscripciones=fi.id_formulario) set fip.$cobros_activos_string = $fechaPago where fi.nombre_apellidos IN $setNombreApellidosPagados and fi.is_active = 1";
                    $query_insert="insert into historico_domiciliaciones_trimestrales_inscripciones (id_formularioinscripciones, fecha_domiciliacion, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) values $myValues;";

                    $myTransaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $myTransaction->beginTransaction();
                    $myTransaction->exec($query_update);
                    $myTransaction->exec($query_insert);
                    $myTransaction->commit();

                    echo json_encode(array(
                        "response" => "ok",
                        "message" => "Fichero Generado con Éxito.",
                        "messageDownload" => "Haga Click aquí para Descargar.",
                        "trimestre" => $trimestre[1],
                        "anyo_actual" => $anyoActual,
                    ));
                }
                catch (Exception $e) {
                    $myTransaction->rollBack();
                    echo json_encode(array("response" => "ok2", "message" => "Se ha producido un Error."));
                }

                break;
            */

                
            /*  Listamos las inscripciones con cobros_activos generados y sin pago confirmado 
             *  - Se confirman los pagos cuando el Valencia Basket lo confirme. */
            case "inscripciones_cargar_inscripciones_anyadidas_xml_por_confirmar_envio_banco":{
                require "models/inscripciones.php";
                
                $trimestre  =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
                
                if($trimestre!==""){
                    // Extrae las instancias a confirmar pago o anular cargo en el XML para que se incluya en el siguiente XML
                        $inscripciones_cobros_activos_por_confirmar = inscripciones::findInscripcionesPagosIncluidasXMLPorConfirmarPago($trimestre);
                        $contenido_tabla_inscripciones_cobros_confirmar="";
                        if(count($inscripciones_cobros_activos_por_confirmar)>0)
                        {
                            foreach ($inscripciones_cobros_activos_por_confirmar as $cobro_por_confirmar)
                            {
                                $contenido_tabla_inscripciones_cobros_confirmar.='<tr id="inscripciones-cobro-activo-'.$cobro_por_confirmar['id_fip'].'">'
                                    .'<td class="t-center">'.$cobro_por_confirmar['numero_pedido']      .'</td>'
                                    .'<td class="t-center">'.$cobro_por_confirmar['dni_pagador']                .'</td>'
                                    .'<td class="t-center">'.$cobro_por_confirmar['nombre_apellidos']   .'</td>'
                                    .'<td class="t-center">'.$cobro_por_confirmar['email']              .'</td>'
                                    .'<td class="t-center">'.$cobro_por_confirmar['cobro_activo']       .'</td>'
                                    .'<td class="t-center">'.(($cobro_por_confirmar['pagado']!=NULL)?$cobro_por_confirmar['pagado']:"-").'</td>'
                                    .'<td class="t-left">
                                        <input type="checkbox" 
                                            id="inscripciones-cobro-activo-checkbox-'.$cobro_por_confirmar['id_fip'].'" '
                                        . ' class="inscripciones-cobro-activo-checkbox" value="'.$cobro_por_confirmar['id_fip'].'">'
                                    .'</td>'
                                .'</tr>';
                            }
                        }
                        else{
                            $contenido_tabla_inscripciones_cobros_confirmar.='<tr>'
                                    .'<td class="t-center" colspan="7">No hay pagos por confirmar que hayan sido incluidos en ficheros XML</td>'
                                .'</tr>';
                        }

                    //  Extrae el numero de cargos que podrian añadirse en un XML
                        switch($trimestre){
                            case 'enero':     {$trimestre=array("trimestre_enero",    "Enero",    "pagado_enero");    $anyoActual='2019';         $cobros_activos_string="cobros_activos_enero";      break;}
                            case 'abril':     {$trimestre=array("trimestre_abril",    "Abril",    "pagado_abril");    $anyoActual='2019';         $cobros_activos_string="cobros_activos_abril";      break;}
                            case 'noviembre': {$trimestre=array("trimestre_noviembre","Noviembre","pagado_noviembre");$anyoActual='2018';         $cobros_activos_string="cobros_activos_noviembre";  break;}
                        }
                        $allInscripcionesXML = inscripciones::findInscripcionesPagosXml($trimestre,$cobros_activos_string);
                        $numero_cargos_a_generar=count($allInscripcionesXML);

                    echo json_encode(array(
                        "response"  => "success",
                        "message"   => "Se ha cargado el listado de pagos incluidos en el XML por confirmar pago",
                        "numero_cargos_a_generar" => $numero_cargos_a_generar,
                        "contenido_tabla"=> $contenido_tabla_inscripciones_cobros_confirmar
                    ));
                }
                
                break;
            }
                
            //  Este método recoge el trimestre en cuestion y por ejemplo:
            //  Recupera las inscripciones con 'cobros_activos_noviembre !=null' y 'pagado_noviembre = NULL'
            //  Les pone la fecha de ahora a 'pagado_noviembre'
            case "inscripciones_confirmar_pagos_xml":{
                require "models/inscripciones_pagos.php";
                $trimestre      =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
                $array_id_fip   =   $_POST['selected_id_fip'];
                $fecha = date("Y-m-d H:i:s");
                
                foreach($array_id_fip as $id_fip){
                    inscripciones_pagos::actualizarPagadoTrimestreTrasConfirmarPagoXML($id_fip,$trimestre,$fecha);
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han confirmado. Refresque o cambie de trimestre para ver los cambios."
                ));
                
                break;
            }
                 
            //  Este método recoge el trimestre en cuestion y por ejemplo:
            //  Recupera las inscripciones con 'cobros_activos_noviembre !=null' y 'pagado_noviembre = NULL'
            //  Les pone NULL al campo 'cobros_activos_noviembre'
            case "inscripciones_anular_pagos_xml":{
                require "models/inscripciones_pagos.php";
                $trimestre      =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
                $array_id_fip   =   $_POST['selected_id_fip'];
                
                foreach($array_id_fip as $id_fip){
                    inscripciones_pagos::actualizarCobrosActivosTrimestreTrasAnularPagoXML($id_fip,$trimestre);
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han anulado. Volverán a incluirse en el próximo XML. Refresque o cambie de trimestre para ver los cambios."
                ));
                
                break;
            }
            
            //  Este método recoge el trimestre en cuestion y por ejemplo:
            //  Recupera las inscripciones con 'cobros_activos_noviembre !=null' y 'pagado_noviembre = NULL'
            //  Les pone NULL al campo 'cobros_activos_noviembre'
            case "inscripciones_anular_pagos_xml_matriculas_2019_2020":
            {
                //error_log(__FILE__.__LINE__);
                //error_log(print_r($_POST,1));
                
                require "models/formulariosinscripciones_pagos.php";
                require "models/inscripciones_pagos.php";
                $array_id_fip   =   $_POST['selected_id_fip'];
                
                foreach($array_id_fip as $id_fip)
                {
                    $fip = formulariosinscripciones_pagos::findById($id_fip);
                    // error_log(print_r($fip,1));
                    $nuevo_pendiente_matricula=$fip['matricula']-$fip['reserva'];
                    // error_log($nuevo_pendiente_matricula);
                    // error_log($fip['total_pendiente']);
                    // error_log($fip." - nuevo_pendiente_matricula:".$nuevo_pendiente_matricula);
                    formulariosinscripciones_pagos::anularPagoMatricular20192020($id_fip,$nuevo_pendiente_matricula,($fip['total_inscripcion']-$fip['reserva']));
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han anulado. Volverán a incluirse en el próximo XML. Refresque o cambie de trimestre para ver los cambios."
                ));
                
                break;
            }
            
            case "inscripciones_confirmar_pagos_xml_matriculas_2019_2020":
            {
                //error_log(__FILE__.__LINE__);
                //error_log(print_r($_POST,1));
                
                require "models/formulariosinscripciones_pagos.php";
                require "models/inscripciones_pagos.php";
                $array_id_fip   =   $_POST['selected_id_fip'];
                
                foreach($array_id_fip as $id_fip)
                {
                    $fip= formulariosinscripciones_pagos::findById($id_fip);
                    formulariosinscripciones_pagos::updateAttribute($id_fip,"pagado_matricula",date("Y-m-d H:i:s"),"si");
                    formulariosinscripciones_pagos::updateAttribute($id_fip,"aplicar_gastos_devolucion",0,"no");
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han confirmado."
                ));
                
                break;
            }
            
            
            //  Este método recoge el trimestre en cuestion y por ejemplo:
            //  Recupera las inscripciones con 'cobros_activos_noviembre !=null' y 'pagado_noviembre = NULL'
            //  Les pone NULL al campo 'cobros_activos_noviembre'
            case "inscripciones_anular_pagos_xml_trimestre_2019_2020":
            {
                //error_log(__FILE__.__LINE__);
                //error_log(print_r($_POST,1));
                
                require "models/formulariosinscripciones_pagos.php";
                require "models/inscripciones_pagos.php";
                $array_id_fip   =   $_POST['selected_id_fip'];
                $trimestre      =   $_POST['trimestre'];
                
                foreach($array_id_fip as $id_fip)
                {
                    $fip = formulariosinscripciones_pagos::findById($id_fip);
                    
                    formulariosinscripciones_pagos::anularPagoTrimestre20192020($trimestre,$id_fip,($fip['total_pendiente']+$fip['trimestre_'.$trimestre]));
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han anulado. Volverán a incluirse en el próximo XML. Refresque para ver los cambios."
                ));
                
                break;
            }
            
            case "inscripciones_confirmar_pagos_xml_trimestre_2019_2020":
            {
                //error_log(__FILE__.__LINE__);
                //error_log(print_r($_POST,1));
                
                require "models/formulariosinscripciones_pagos.php";
                require "models/inscripciones_pagos.php";
                $array_id_fip   =   $_POST['selected_id_fip'];
                $trimestre      =   $_POST['trimestre'];
                
                foreach($array_id_fip as $id_fip)
                {
                    $fip= formulariosinscripciones_pagos::findById($id_fip);
                    formulariosinscripciones_pagos::updateAttribute($id_fip,"pagado_".$trimestre,date("Y-m-d H:i:s"),"si");
                    formulariosinscripciones_pagos::updateAttribute($id_fip,"aplicar_gastos_devolucion",0,"no");
                }
                
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los cargos seleccionados se han confirmado."
                ));
                
                break;
            }
            
            /*  Domiciliaciones matrículas. */
            case "domiciliaciones_matricula_inscripciones":
                {
                    header('Content-type: text/xml');
                    header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml');

                    require "models/inscripciones.php";
                    require "models/inscripciones_pagos.php";
                    require "includes/Utils.php";

                    $trimestre = Utils::checkTrimestre();
                    $anyoActual = Date('Y');

                    $file = fopen(self::URL_SERVER . '\Cuentas Erroneas Matriculas Inscripciones', "w");
                    fwrite($file, "CUENTAS BANCARIAS ERRONEAS DOMICILIACION MATRICULAS INSCRIPCIONES " . $anyoActual . ":\n");

                    $allInscripcionesXML = inscripciones::findInscripcionesPagosMatriculaPendienteXml();

                    $numRows = 0;
                    $totalSum = 0;

                    $validInscripcionsAccount = [];
                    $setHermanos = [];

                    foreach ($allInscripcionesXML as $inscripcion) {
                        $cuentaExtraida = Utils::extractAccountFromInscription($inscripcion);
                        $cuentaValidada = Utils::validateEntity($cuentaExtraida);

                        if (!$cuentaValidada)
                        {
                            $extraerDatosTitular = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);

                            fwrite($file, $extraerDatosTitular[17] . "  " . $extraerDatosTitular[16] . "  " . $extraerDatosTitular[11] . " / " . $extraerDatosTitular[12] . "\n");
                            continue;
                        }

                        $setHermanos[$inscripcion['nombre_apellidos']] = $cuentaExtraida;

                        $totalSum += $inscripcion['pendiente_matricula'];
                        $validInscripcionsAccount[] = $inscripcion;

                        $numRows++;
                    }

                    $hermanosAgrupados = Utils::checkearHermanos($setHermanos);
                    $hermanosAgrupadosCounter = Utils::checkearHermanos($setHermanos);

                    $cantidadDomiciliaciones = 0;
                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $cuentaBancariaCompleta = Utils::getCuentaBancariaCompleta($inscripcion);

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                        $hermanosAgrupadosCounter[$nombreHermanos] = "";
                        $cantidadDomiciliaciones++;
                    }

                    if (empty($validInscripcionsAccount)) {
                        echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                        die();
                    }

                    $MndtId_Unique_Identifier = 1;
                    $contador = 1;
                    $fechaActual = Date('Y-m-d H:i:s');
                    $fechaActualSH = Date('Y-m-d');

                    $myXml = new XMLWriter();

                    $myXml->openUri(self::URL_SERVER . '\Domiciliacion Matriculas Inscripciones ' . $anyoActual . '.xml');
                    $myXml->setIndent(true);
                    $myXml->setIndentString("  ");

                    $myXml->startDocument('1.0', 'utf-8', "no");

                    $myXml->startElement("Document");
                    $myXml->startAttribute("xmlns");
                    $myXml->text("urn:iso:std:iso:20022:tech:xsd:pain.008.001.02");
                    $myXml->endAttribute();

                    /* Root Document */
                    $myXml->startElement("CstmrDrctDbtInitn");

                    $MsgId = str_replace([" ", '-', ':'], "", $fechaActual);
                    $fechaActualSinHora = str_replace([" ", '-', ':'], "", $fechaActualSH);

                    /* Header XML */
                    $myXml->startElement("GrpHdr");

                    $myXml->startElement("MsgId");
                    $myXml->text($MsgId);
                    $myXml->endElement();

                    $myXml->startElement("CreDtTm");
                    $myXml->text(Date('Y-m-d') . "T" . Date('H:m:s'));
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($cantidadDomiciliaciones);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("InitgPty");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->startElement("Id");
                    $myXml->startElement("OrgId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    /* End Heade XML */

                    /* Start Main Content XML */
                    $myXml->startElement("PmtInf");
                    $myXml->startElement("PmtInfId");
                    $myXml->text("2RCUR" . $fechaActualSinHora);
                    $myXml->endElement();

                    $myXml->startElement("PmtMtd");
                    $myXml->text("DD");
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($cantidadDomiciliaciones);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("PmtTpInf");
                    $myXml->startElement("SvcLvl");
                    $myXml->startElement("Cd");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("LclInstrm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("SeqTp");
                    $myXml->text("RCUR");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ReqdColltnDt");
                    $myXml->text(Date('Y-m-d'));
                    $myXml->endElement();

                    $myXml->startElement("Cdtr");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAcct");
                    $myXml->startElement("Id");
                    $myXml->startElement("IBAN");
                    $myXml->text("ES2931590009962339424422");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAgt");
                    $myXml->startElement("FinInstnId");
                    $myXml->startElement("BIC");
                    $myXml->text("CAIXESBBXXX");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ChrgBr");
                    $myXml->text("SLEV");
                    $myXml->endElement();

                    $myXml->startElement("CdtrSchmeId");
                    $myXml->startElement("Id");
                    $myXml->startElement("PrvtId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Prtry");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myValues = "";
                    $setNombreApellidosPagados = "(";

                    /* Inicio Bucle Usuarios */
                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                        if ($inscripcion != end($validInscripcionsAccount)) {
                            $setNombreApellidosPagados .= ",";
                        }

                        $totalSum += $inscripcion['pendiente_matricula'];
                        $fechaAlta = $inscripcion['fecha'];

                        $cuentaBancariaCompleta = Utils::getCuentaBancariaCompleta($inscripcion);

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupados)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                        $hermanosAgrupados[$nombreHermanos] = "";
                        $nombreHermanosSeparados = explode(' -- ', $nombreHermanos);
                        $calcularImporte = Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados);

                        $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);

                        $myXml->startElement("DrctDbtTxInf");
                        $myXml->startElement("PmtId");
                        $myXml->startElement("EndToEndId");
                        $myXml->text($endToEndId . "-" . $contador);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->startElement("InstdAmt");
                        $myXml->startAttribute("Ccy");
                        $myXml->text("EUR");
                        $myXml->endAttribute();
                        /* IMPORTE DE LA MATRICULA PENDIENTE */
                        $myXml->text($calcularImporte);
                        $myXml->endElement();

                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($MndtId_Unique_Identifier);
                        $myXml->endElement();

                        $myXml->startElement("DtOfSgntr");
                        $myXml->text($fechaAlta);
                        $myXml->endElement();

                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAgt");
                        $myXml->startElement("FinInstnId");
                        $myXml->startElement("BIC");
                        $myXml->text("NOTPROVIDED");
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("Dbtr");
                        $myXml->startElement("Nm");
                        /* NOMBRE Y APELLIDOS DOMICILIADOR */
                        $myXml->text($nombreHermanos);
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAcct");
                        $myXml->startElement("Id");
                        $myXml->startElement("IBAN");
                        $myXml->text($cuentaBancariaCompleta);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("RmtInf");
                        $myXml->startElement("Ustrd");
                        $myXml->text("Fundación 2000 Matricula Pendiente " . Utils::checkTrimestre()[1] . " 2018");
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;

                    }

                    $setNombreApellidosPagados .= ")";
                    $myXml->endElement();
                    /* Fin Bucle Usuarios */
                    $myXml->endElement();
                    $myXml->fullEndElement();

                    $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

                    foreach ($validInscripcionsAccount as $inscripcionHistorico) {
                        $myValues .= "(";

                        $id_formularioinscripciones = $inscripcionHistorico['id_formularioinscripciones'];
                        $fechaDomiciliacion = Date('Y-m-d H:i:s');
                        $nombreApellidos = $inscripcionHistorico['nombre_apellidos'];
                        $nombreApellidosSpaces = str_replace(["  "], " ", $nombreApellidos);
                        $nombreApellidosCaps = ucwords($nombreApellidosSpaces);
                        $dniTitular = $inscripcionHistorico['dni_pagador'];
                        $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcionHistorico);

                        $myValues .= $id_formularioinscripciones . ",'" . $fechaDomiciliacion . "','" . $nombreApellidosCaps . "','" . $trimestre[1] . "','" . $dniTitular . "','" . $cuentaBancariaCompleta . "')";

                        if ($inscripcionHistorico != end($validInscripcionsAccount)) {
                            $myValues .= ",";
                        }
                    }

                    /* Transaccion sql actualizar pago trimestral y entidad de domiciliaciones. */
                    $myTransaction = new PDO('mysql:host=localhost;dbname=alqueria_local', 'root', '',
                        array(PDO::ATTR_PERSISTENT => true));

                    /* comenzamos la transaccion */
                    try {
                        $myTransaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $myTransaction->beginTransaction();
                        $myTransaction->exec("update formulariosinscripciones_pagos fip join formulariosinscripciones fi on(fip.id_formularioinscripciones=fi.id_formulario) set fip.pagado_pendiente_matricula = $fechaPago where fi.nombre_apellidos IN $setNombreApellidosPagados and fi.is_active = 1");
                        $myTransaction->exec("insert into historico_domiciliaciones_matricula_inscripciones (id_formularioinscripciones, fecha_domiciliacion, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) values $myValues;");
                        $myTransaction->commit();

                        echo json_encode(array(
                            "response" => "ok",
                            "message" => "Fichero Generado con Éxito.",
                            "messageDownload" => "Haga Click aquí para Descargar.",
                            "trimestre" => $trimestre[1],
                            "anyo_actual" => $anyoActual,
                        ));

                    } catch (Exception $e) {
                        $myTransaction->rollBack();
                        echo json_encode(array("response" => "ok2", "message" => "Se ha producido un Error."));

                    }

                    break;

                }
        }
    }

    public function actionDispatcherPatronato()
    {
        $metodo = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
        if ($metodo === "") {
            $metodo = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);
        }

        $force_debug = "false";
        if ($force_debug === "true" || filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING) === "true") {
            error_log(print_r($_POST, 1));
        }

        switch($metodo){
            /* Muestra datos de inscripciones de cada Usuario (modal). */
            case "inscripciones_cargar_contenido_inscripcion_original_patronato":
                {
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if (isset($idinscripcion) && !empty($idinscripcion)) {
                        require "models/inscripciones_patronato.php";
                        $datos = inscripciones_patronato::findFormForId($idinscripcion);
                        echo json_encode(array("response" => "success",
                            "datos" => $datos,
                            "modal_title" => "Formulario de inscripción",
                            "message" => "Los datos de la inscripción se han cargado correctamente."));
                    } else {
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que ha habido algún error"));
                    }
                    break;
                }

            
            /*  Muestra datos de cuenta bancaria (modal). */
            case "inscripciones_cargar_contenido_editar_cuenta_patronato":
            {
                $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                if (isset($idinscripcion) && !empty($idinscripcion)) {
                    require "models/inscripciones_patronato.php";
                    $datos = inscripciones_patronato::findFormForId($idinscripcion);

                    $datos_iban = $datos["iban"];
                    $datos_entidad = $datos["entidad"];
                    $datos_oficina = $datos["oficina"];
                    $datos_dc = $datos["dc"];
                    $datos_cuenta = $datos["cuenta"];

                    echo json_encode(array("response" => "success",
                        "idinscripcion" => $idinscripcion,
                        "datos_iban" => $datos_iban,
                        "datos_entidad" => $datos_entidad,
                        "datos_oficina" => $datos_oficina,
                        "datos_dc" => $datos_dc,
                        "datos_cuenta" => $datos_cuenta,
                        "modal_title" => "Editar cuenta bancaria",
                        "message" => "La cuenta bancaria se ha cargado correctamente"));
                } else {
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Parece que no se encuentra la inscripción"));
                }
                break;
            }
            
            /*  Editar datos cuenta bancaria (modal). */
            case "inscripciones_editar_cuenta_patronato":
            {
                require "models/inscripciones_patronato.php";
                require "includes/Utils.php";

                $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                $iban = filter_input(INPUT_POST, 'datos_iban', FILTER_SANITIZE_STRING);
                $entidad = filter_input(INPUT_POST, 'datos_entidad', FILTER_SANITIZE_NUMBER_INT);
                $oficina = filter_input(INPUT_POST, 'datos_oficina', FILTER_SANITIZE_NUMBER_INT);
                $dc = filter_input(INPUT_POST, 'datos_dc', FILTER_SANITIZE_NUMBER_INT);
                $cuenta = filter_input(INPUT_POST, 'datos_cuenta', FILTER_SANITIZE_NUMBER_INT);

                $cuentaBancariaCompleta = $iban . $entidad . $oficina . $dc . $cuenta;

                $isValidCuentaBancariaCompleta = Utils::validateEntity($cuentaBancariaCompleta);

                if (!$isValidCuentaBancariaCompleta) {
                    echo json_encode(array("response" => "error_cuenta",
                        "idinscripcion" => $idinscripcion,
                        "message" => "L"));
                    die();
                }

                $cuentaBancariaModificada = inscripciones_patronato::actualizacuentabancaria($idinscripcion, $iban, $entidad, $oficina, $dc, $cuenta);

                if ($cuentaBancariaModificada) {
                    echo json_encode(array("response" => "success",
                        "idinscripcion" => $idinscripcion,
                        "message" => "La cuenta bancaria se ha modificado correctamente"));
                } else {
                    echo json_encode(array("response" => "error",
                        "idinscripcion" => $idinscripcion,
                        "message" => "La cuenta bancaria NO se ha modificado correctamente"));
                }

                break;
            }
            
            /*  Muestra pagos pendientes / realizados de cada Usuario (modal). */
            case "inscripciones_cargar_pagos_trimestral_patronato":
                {
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    if(isset($idinscripcion) && !empty($idinscripcion))
                    {
                      //  require "models/inscripciones_patronato.php";
                        require "models/inscripciones_patronato_pagos.php";
                        
                      //  $inscripciones_patronato        = inscripciones_patronato::findFormForId($idinscripcion);
                        $inscripciones_patronato_pagos  = inscripciones_patronato_pagos::findByIdFormularioInscripciones($idinscripcion);

                        $reserva            = $inscripciones_patronato_pagos['reserva'];
                        $matricula          = $inscripciones_patronato_pagos['matricula'];
                        $pendiente_matricula= $inscripciones_patronato_pagos['pendiente_matricula'];
                        $total_inscripcion  = $inscripciones_patronato_pagos['total_inscripcion'];
                        $total_pendiente    = $inscripciones_patronato_pagos['total_pendiente'];
                        $pagado_matricula   = $inscripciones_patronato_pagos['pagado_matricula'];
                        $pagado_pendiente_matricula = $inscripciones_patronato_pagos['pagado_pendiente_matricula'];
                        
                        $trimestre_enero    = $inscripciones_patronato_pagos['trimestre_enero'];
                        $trimestre_abril    = $inscripciones_patronato_pagos['trimestre_abril'];
                        $trimestre_noviembre= $inscripciones_patronato_pagos['trimestre_noviembre'];
                        
                        $pagado_enero       = $inscripciones_patronato_pagos["pagado_enero"];
                        $pagado_abril       = $inscripciones_patronato_pagos["pagado_abril"];
                        $pagado_noviembre   = $inscripciones_patronato_pagos['pagado_noviembre'];
                        
                        $cobros_activos_noviembre   = $inscripciones_patronato_pagos['cobros_activos_noviembre'];
                        $cobros_activos_enero       = $inscripciones_patronato_pagos['cobros_activos_enero'];
                        $cobros_activos_abril       = $inscripciones_patronato_pagos['cobros_activos_abril'];

                        if (empty($reserva)) {
                            $reserva = '00.00';
                        }
                        if (empty($matricula)) {
                            $matricula = '00.00';
                        }
                        if (empty($pendiente_matricula)) {
                            $pendiente_matricula = '00.00';
                        }
                        if (empty($total_inscripcion)) {
                            $total_inscripcion = '00.00';
                        }
                        if (empty($total_pendiente)) {
                            $total_pendiente = '00.00';
                        }
                        if ($pagado_matricula === NULL) {
                            $pagado_matricula = false;
                        }
                        if ($pagado_pendiente_matricula === NULL) {
                            $pagado_pendiente_matricula = false;
                        }
                        
                        if (empty($trimestre_enero)) {
                            $trimestre_enero = '00.00';
                        }
                        if (empty($trimestre_abril)) {
                            $trimestre_abril = '00.00';
                        }
                        if (empty($trimestre_noviembre)) {
                            $trimestre_noviembre = '00.00';
                        }
                        
                        if ($pagado_enero === NULL) {
                            $pagado_enero = false;
                        }
                        if ($pagado_abril === NULL) {
                            $pagado_abril = false;
                        }
                        if ($pagado_noviembre === NULL) {
                            $pagado_noviembre = false;
                        }
                        
                        /* Si cobros_activos_noviembre está a NULL, significa que no se pagó y por tanto debe pagarse */
                        if($cobros_activos_noviembre === NULL || $cobros_activos_noviembre===0 || $cobros_activos_noviembre==="0" || $cobros_activos_noviembre==="0000-00-00 00:00:00"){ 
                            $cobros_activos_noviembre = true;
                        }
                        else{
                            $cobros_activos_noviembre = false;
                        }
                        if($cobros_activos_enero === NULL || $cobros_activos_enero===0 || $cobros_activos_enero==="0" || $cobros_activos_enero==="0000-00-00 00:00:00"){ 
                            $cobros_activos_enero = true;
                        }
                        else{
                            $cobros_activos_enero = false;
                        }
                        if ($cobros_activos_abril === NULL || $cobros_activos_abril===0 || $cobros_activos_abril==="0" || $cobros_activos_abril==="0000-00-00 00:00:00"){ 
                            $cobros_activos_abril = true;
                        }
                        else{
                            $cobros_activos_abril = false;
                        }
                        
                        //error_log("cobros_activos_noviembre vale:   "       .   $cobros_activos_noviembre);
                        //error_log("cobros_activos_enero             "       .   $cobros_activos_enero);
                        //error_log("cobros_activos_abril             "       .   $cobros_activos_abril);
                       
                        
                        echo json_encode(array("response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "reserva" => $reserva,
                            "matricula" => $matricula,
                            'pagado_enero' => $pagado_enero,
                            'pagado_abril' => $pagado_abril,
                            'pagado_noviembre' => $pagado_noviembre,
                            'pagado_matricula' => $pagado_matricula,
                            'pendiente_matricula' => $pendiente_matricula,
                            'pagado_pendiente_matricula' => $pagado_pendiente_matricula,
                            "total_inscripcion" => $total_inscripcion,
                            "total_pendiente" => $total_pendiente,
                            "trimestre_enero" => $trimestre_enero,
                            "trimestre_abril" => $trimestre_abril,
                            "trimestre_noviembre" => $trimestre_noviembre,
                            "dni_titular" => $inscripciones_patronato_pagos['dni_pagador'],
                            "modal_title" => "Editar Pagos Trimestral",
                            "cobros_activos_noviembre"  => $cobros_activos_noviembre,
                            "cobros_activos_enero"      => $cobros_activos_enero,
                            "cobros_activos_abril"      => $cobros_activos_abril,
                            "message" => "La cuenta bancaria se ha cargado correctamente"));
                    } 
                    else {

                        
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que no se encuentra la inscripción"));
                    }
                    break;
                }
            
            /*  Editar pagos de cada Usuario (modal) */
            case "inscripciones_pagos_trimestrales_patronato":
            {
                require "models/inscripciones_patronato.php";
                require "models/inscripciones_patronato_pagos.php";

                // Recogemos valores 
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    $reserva                    = $_POST['reserva'];
                    $matricula                  = $_POST['matricula'];
                    $pendiente_matricula        = $_POST['pendiente_matricula'];
                    $pagado_matricula           = $_POST['pagado_matricula'];
                    $pagado_pendiente_matricula = $_POST['pagado_pendiente_matricula'];
                    $total_inscripcion          = $_POST['total_inscripcion'];
                    $total_pendiente            = $_POST['total_pendiente'];
                    $dni_titular                = $_POST['dni_titular'];
                    
                    // $fecha = Date('Y-m-d');
                    // $cobros_activos = $_POST['cobros_activos'];
                
                //  Cantidades del trimestre (160, 160, 160...)
                    $trimestre_enero = $_POST['trimestre_enero'];
                    $trimestre_abril = $_POST['trimestre_abril'];
                    $trimestre_noviembre = $_POST['trimestre_noviembre'];
                
                //  Checkboxes que indican si un trimestre está pagado o no
                    $pagado_enero = $_POST["pagado_enero"];
                    $pagado_abril = $_POST["pagado_abril"];
                    $pagado_noviembre = $_POST['pagado_noviembre'];
                
                //  XML que indica si se incluirá o no en el XML 
                    $incluir_xml_noviembre      = filter_input(INPUT_POST, 'generar_xml_noviembre', FILTER_SANITIZE_STRING);
                    $incluir_xml_enero          = filter_input(INPUT_POST, 'generar_xml_enero',     FILTER_SANITIZE_STRING);
                    $incluir_xml_abril          = filter_input(INPUT_POST, 'generar_xml_abril',     FILTER_SANITIZE_STRING);
                    
                //  Extraemos de la base de datos las inscripciones a modificar
                    $inscripcion_pago   =   inscripciones_patronato_pagos::findByIdFormularioInscripciones($idinscripcion);    
                    
                /* Explicación de la actualización
                *  1. Si recibimos el checkbox pagado_enero a true, significa:
                *      - o bien que ya estaba pagado y en pagado_enero hay una fecha
                *      - o bien que no estaba pagado, se está pagando ahora, es NULL en base de datos y debe actualizarse con la fecha
                *  
                *     Para comprobar si se ha pagado, comprobamos el atributo de la tabla "pagado_enero" y comprobamos si hay una fecha o es NULL
                *  
                *  2. Si por el contrario, recibimos el checkbox pagado_enero a FALSE, significa:
                *      - Se hizo la domiciliacion, pero salio mal y la vuelven a poner como pendiente para que se incluya en el siguiente XML.
                *      - Así, ponemos cobros_activos_enero a 0000-00-00 00:00:00, ponemos pagado_noviembre a 0.
                */    
                    if($pagado_enero==="true"){
                        if(isset($inscripcion_pago["pagado_enero"]) && !empty($inscripcion_pago["pagado_enero"]) && $inscripcion_pago["pagado_enero"]!==NULL && ($inscripcion_pago["pagado_enero"] !=='0000-00-00 00:00:00'))
                        {   $cobros_activos_enero = $pagado_enero = $inscripcion_pago["pagado_enero"];}
                        else
                        {   $cobros_activos_enero = $pagado_enero = Date('Y-m-d H:i:s');}
                    }
                    else
                    {   $cobros_activos_enero = $pagado_enero = NULL;}
                    
                    if($pagado_abril==="true")
                    {
                        if(!empty($inscripcion_pago["pagado_abril"]) && !is_null($inscripcion_pago["pagado_abril"]) && $inscripcion_pago["pagado_abril"] !=='0000-00-00 00:00:00')
                        {   $cobros_activos_abril = $pagado_abril = $inscripcion_pago["pagado_abril"];}
                        else
                        {   $cobros_activos_abril = $pagado_abril = Date('Y-m-d H:i:s');}
                    }
                    else{ 
                        $cobros_activos_abril = $pagado_abril = NULL;
                    }
                    
                    if($pagado_noviembre==="true"){
                        if(!empty($inscripcion_pago["pagado_noviembre"]) && !is_null($inscripcion_pago["pagado_noviembre"]) && $inscripcion_pago["pagado_noviembre"] !=='0000-00-00 00:00:00')
                        {   $cobros_activos_noviembre = $pagado_noviembre = $inscripcion_pago["pagado_noviembre"];}
                        else
                        {   $cobros_activos_noviembre = $pagado_noviembre = Date('Y-m-d H:i:s');}
                    }
                    else{ 
                        $cobros_activos_noviembre = $pagado_noviembre = NULL;
                    }
                    
                    
                /*  Todo lo de la matricula, lo dejamos igual que estaba. */
                    if($pagado_matricula !== "false"){
                        if (empty($buscarFechaPagoMatriculaPorId) || $buscarFechaPagoMatriculaPorId["pagado_matricula"] === NULL)
                        {   $pagado_matricula = Date('Y-m-d H:i:s');    } 
                        else
                        {   $pagado_matricula = $buscarFechaPagoMatriculaPorId["pagado_matricula"];}
                    } 
                    else
                    {   $pagado_matricula = NULL;   }

                    if($pagado_pendiente_matricula !== "false"){
                        if (empty($buscarFechaPagoPendienteMatriculaPorId) || $buscarFechaPagoPendienteMatriculaPorId["pagado_pendiente_matricula"] === NULL) {
                            $pagado_pendiente_matricula = Date('Y-m-d H:i:s');
                        } else {
                            $pagado_pendiente_matricula = $buscarFechaPagoPendienteMatriculaPorId["pagado_pendiente_matricula"];
                        }
                    } 
                    else {
                        $pagado_pendiente_matricula = NULL;
                    }
                
                    
                // Actualizamos en base de datos 
                    if($inscripcion_pago){
                        $actualizacion = inscripciones_patronato_pagos::actualizarPagos($idinscripcion, 
                                                                                        $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente,
                                                                                        $pagado_matricula, $pagado_pendiente_matricula, 

                                                                                        $pagado_enero,          $pagado_abril,          $pagado_noviembre, 
                                                                                        $trimestre_enero,       $trimestre_abril,       $trimestre_noviembre, 
                                                                                        $cobros_activos_enero,  $cobros_activos_abril,  $cobros_activos_noviembre);
                    }   
                    else{
                        // $pagado = $cobros_activos = Date('Y-m-d H:i:s');
                        // $actualizacion = inscripciones_patronato_pagos::createNewPago($idinscripcion, $fecha, $dni_titular, $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente, $pagado_enero, $pagado_abril, $pagado_noviembre, $trimestre_enero, $trimestre_abril, $trimestre_noviembre, $pagado_matricula, $pagado_pendiente_matricula, $cobros_activos);
                    }

                    if($actualizacion){
                        echo json_encode(
                            array("response"    => "success",
                            "idinscripcion"     => $idinscripcion,
                            "message"           => "Los pagos se han modificado correctamente"));
                    } 
                    else
                    {
                        echo json_encode(
                                array(  "response" => "error",
                                        "idinscripcion" => $idinscripcion,
                                        "message" => "Los Paogs NO se han modificado correctamente"));
                    }

                    break;
                }
                
            /*  Modificamos el estado de una inscripción (para dar de baja o dar de alta de nuevo) */
            case "inscripciones_patronato_estado_inscripcion":{
                require "models/inscripciones_patronato.php";
                
                $idinscripcion              = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                $nuevo_estado_inscripcion   = filter_input(INPUT_POST, 'nuevo_estado_inscripcion', FILTER_SANITIZE_STRING);
                if($nuevo_estado_inscripcion==="1" || $nuevo_estado_inscripcion==="true")
                {$is_active=1;}
                else{$is_active=0;}
                
                $actualizado= inscripciones_patronato::actualizaEstado($idinscripcion,$is_active);
                
                if($actualizado){
                     echo json_encode(array(
                            "response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "estado_inscripcion" => $is_active,
                            "message" => "El estado de la inscripción se ha actualizado"));
                    } 
                else{
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que ha habido algún problema"));
                    }
            
                break;
            }
            
            /*  Domiciliaciones. Cargar listado de cuentas bancarias incorrectas */
            case "domiciliaciones_patronato_cargar_cuentas_bancarias_incorrectas":{
                
                require "models/inscripciones_patronato.php";
                require "models/inscripciones_patronato_pagos.php";
                require "includes/Utils.php";
                
                //  Primero recuperamos todas las inscripciones con is_active=1
                $inscripciones_activas  = inscripciones_patronato::findByIsActive();
                
                //  Segundo, las recorremos y comprobamos su numero de cuenta 
                $contador_cuentas_bancarias_incorrectas=0;
                $contenido_tabla=   '<table class="table w-100 mb-2">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>NºPedido</th>
                                                <th>Nombre y apellidos</th>
                                                <th>DNI Titular</th>
                                                <th>Titular</th>
                                                <th>Teléfono padre</th>
                                                <th>Teléfono madre</th>
                                                <th>Estado inscripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                $contenido_tabla_tr_0_instancias='<tr><td colspan="5">No hay ninguna inscripción con la cuenta bancaria mal introducida.</td></tr>';
                
                foreach($inscripciones_activas as $inscripcion_activa){
                    $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcion_activa);
                    
                    // Validamos que la cuenta es correcta 
                    $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);
   
                    if(!$cuentaValidada){
                        $array_contenido = preg_split('/<br[^>]*>/i', $inscripcion_activa['contenido']);
                    
                        $contenido_tabla.='<tr id="cuenta-incorrecta'.$inscripcion_activa['id_formulario']. '" style="cursor:pointer;">';
                        
                        $contenido_tabla.='<td class="t-center">' . $inscripcion_activa['numero_pedido'] . '</td>';

                        $contenido_tabla.='<td class="t-center">'.$inscripcion_activa['nombre'].' '.$inscripcion_activa['apellidos'].'</td>';
                        
                        if (isset($array_contenido) && isset($array_contenido[17]) && $array_contenido[17] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[17] . '</td>';} 
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[16]) && $array_contenido[16] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[16] . '</td>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[11]) && $array_contenido[11] !== "")
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[11] . '</td>';} 
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}

                        if (isset($array_contenido) && isset($array_contenido[12]) && $array_contenido[12] !== "") 
                        {   $contenido_tabla.= '<td class="t-center">' . $array_contenido[12] . '</td>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">-</td>';}
                        
                        if($inscripcion_activa['is_active']==="1")
                        {   $contenido_tabla.= '<td class="t-center">ACTIVA</td></tr>';}
                        else 
                        {   $contenido_tabla.= '<td class="t-left">NO ACTIVA</td></tr>';}
                        
                        $contador_cuentas_bancarias_incorrectas++;
                    }
                }
                
                if($contador_cuentas_bancarias_incorrectas===0){
                    echo json_encode(array(
                        "response" => "success",
                        "message" => "No hay ninguna inscripción con la cuenta bancaria mal introducida.",
                        "contenido_tabla_patronato_cuenta_bancaria"=>$contenido_tabla.$contenido_tabla_tr_0_instancias."</tbody></table>"
                    ));
                }
                else
                {   
                    echo json_encode(array(
                        "response"                                  => "error",
                        "message"                                   => "Hay inscripciones con el número de cuenta bancaria incorrecto.",
                        "contenido_tabla_patronato_cuenta_bancaria" => $contenido_tabla."</tbody></table>",
                        "numero_resultados"                         => $contador_cuentas_bancarias_incorrectas
                    ));
                }
                
                break;
            }
            
            /*  Domiciliaciones trimestrales Patronato */
            case "domiciliaciones_trimestrales_patronato":
                {
                    header('Content-type: text/xml');
                    header('Content-Disposition: attachment; filename=Domiciliacion_Trimestral_Patronato.xml');

                    require "models/inscripciones_patronato.php";
                    require "models/inscripciones_patronato_pagos.php";
                    require "includes/Utils.php";
                    require "models/historico_domiciliaciones_trimestrales_patronato.php";

                    //  Recuperamos el trimestre que se desea generar
                    $trimestre = filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
                    
                    switch($trimestre){
                        case 'trimestre_enero':     {$trimestre=array("trimestre_enero",    "Enero",    "pagado_enero");    $anyoActual='2019';     $cobros_activos_string="cobros_activos_enero";break;}
                        case 'trimestre_abril':     {$trimestre=array("trimestre_abril",    "Abril",    "pagado_abril");    $anyoActual='2019';     $cobros_activos_string="cobros_activos_abril";break;}
                        case 'trimestre_noviembre': {$trimestre=array("trimestre_noviembre","Noviembre","pagado_noviembre");$anyoActual='2018';     $cobros_activos_string="cobros_activos_noviembre";break;}
                    }
                    
                    //$trimestre = Utils::checkTrimestre();
                    //$anyoActual="2019";
                    
                    $file = fopen(self::URL_SERVER . '\Cuentas Erroneas Domiciliacion Trimestral Patronato', "w");
                    fwrite($file, "CUENTAS BANCARIAS ERRONEAS DOMICILIACION TRIMESTRAL PATRONATO: " . $trimestre[1] . " " . $anyoActual . "\n");

                    $allInscripcionesXML = inscripciones_patronato::findInscripcionesPagosXml($trimestre);

                    $numRows    = 0;
                    $totalSum   = 0;

                    $validInscripcionsAccount = [];
                    $setHermanos = [];

                    foreach ($allInscripcionesXML as $inscripcion) {
                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                        $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);

                        if (!$cuentaValidada) {
                            fwrite($file, $inscripcion['dni_pagador'] . "  " . $inscripcion['titular'] . "  " . $inscripcion['telefono_padre'] . " / " . $inscripcion['telefono_madre'] . "\n");
                            continue;
                        }

                        $nombreApellidos = $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];
                        $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                        $totalSum += $inscripcion[$trimestre[0]];
                        $validInscripcionsAccount[] = $inscripcion;

                        $numRows++;
                    }

                    $hermanosAgrupados = Utils::checkearHermanos($setHermanos);
                    $hermanosAgrupadosCounter = Utils::checkearHermanos($setHermanos);

                    $cantidadDomiciliaciones = 0;

                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                        $hermanosAgrupadosCounter[$nombreHermanos] = "";
                        $cantidadDomiciliaciones++;
                    }

                    if (empty($validInscripcionsAccount)) {
                        echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes."));
                        die();
                    }

                    $MndtId_Unique_Identifier = 1;
                    $contador = 1;
                    $fechaActual = Date('Y-m-d H:i:s');
                    $fechaActualSH = Date('Y-m-d');

                    $myXml = new XMLWriter();

                    $myXml->openUri(self::URL_SERVER . '\Domiciliacion Trimestral Patronato ' . $trimestre[1] . " " . $anyoActual . ".xml");
                    $myXml->setIndent(true);
                    $myXml->setIndentString("  ");

                    $myXml->startDocument('1.0', 'utf-8', "no");

                    $myXml->startElement("Document");
                    $myXml->startAttribute("xmlns");
                    $myXml->text("urn:iso:std:iso:20022:tech:xsd:pain.008.001.02");
                    $myXml->endAttribute();

                    /* Root Document */
                    $myXml->startElement("CstmrDrctDbtInitn");

                    $MsgId = str_replace([" ", '-', ':'], "", $fechaActual);
                    $fechaActualSinHora = str_replace([" ", '-', ':'], "", $fechaActualSH);

                    /* Header XML */
                    $myXml->startElement("GrpHdr");

                    $myXml->startElement("MsgId");
                    $myXml->text($MsgId);
                    $myXml->endElement();

                    $myXml->startElement("CreDtTm");
                    $myXml->text(Date('Y-m-d') . "T" . Date('H:m:s'));
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($numRows);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("InitgPty");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->startElement("Id");
                    $myXml->startElement("OrgId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    /* End Heade XML */

                    /* Start Main Content XML */
                    $myXml->startElement("PmtInf");
                    $myXml->startElement("PmtInfId");
                    $myXml->text("2RCUR" . $fechaActualSinHora);
                    $myXml->endElement();

                    $myXml->startElement("PmtMtd");
                    $myXml->text("DD");
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($numRows);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("PmtTpInf");
                    $myXml->startElement("SvcLvl");
                    $myXml->startElement("Cd");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("LclInstrm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("SeqTp");
                    $myXml->text("RCUR");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ReqdColltnDt");
                    $myXml->text(Date('Y-m-d'));
                    $myXml->endElement();

                    $myXml->startElement("Cdtr");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAcct");
                    $myXml->startElement("Id");
                    $myXml->startElement("IBAN");
                    $myXml->text("ES2931590009962339424422");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAgt");
                    $myXml->startElement("FinInstnId");
                    $myXml->startElement("BIC");
                    $myXml->text("CAIXESBBXXX");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ChrgBr");
                    $myXml->text("SLEV");
                    $myXml->endElement();

                    $myXml->startElement("CdtrSchmeId");
                    $myXml->startElement("Id");
                    $myXml->startElement("PrvtId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Prtry");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myValues = "";
                    $setNombreApellidosPagados = "(";

                    /* Inicio Bucle Usuarios */
                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $setNombreApellidosPagados .= '"' . $inscripcion["nombre"] . " " . $inscripcion["apellidos"] . '"';
                        if ($inscripcion != end($validInscripcionsAccount)) {
                            $setNombreApellidosPagados .= ",";
                        }

                        $totalSum += $inscripcion[$trimestre[0]];
                        $fechaAlta = $inscripcion['fecha_inscripcion'];

                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupados)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                        $hermanosAgrupados[$nombreHermanos] = "";
                        $nombreHermanosSeparados = explode(' -- ', $nombreHermanos);
                        $calcularImporte = Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados,$trimestre[0]);

                        $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);

                        $myXml->startElement("DrctDbtTxInf");
                        $myXml->startElement("PmtId");
                        $myXml->startElement("EndToEndId");
                        $myXml->text($endToEndId . "-" . $contador);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->startElement("InstdAmt");
                        $myXml->startAttribute("Ccy");
                        $myXml->text("EUR");
                        $myXml->endAttribute();
                        $myXml->text($calcularImporte);
                        $myXml->endElement();

                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($MndtId_Unique_Identifier);
                        $myXml->endElement();

                        $myXml->startElement("DtOfSgntr");
                        $myXml->text($fechaAlta);
                        $myXml->endElement();

                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAgt");
                        $myXml->startElement("FinInstnId");
                        $myXml->startElement("BIC");
                        $myXml->text("NOTPROVIDED");
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("Dbtr");
                        $myXml->startElement("Nm");
                        $myXml->text($nombreHermanos);
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAcct");
                        $myXml->startElement("Id");
                        $myXml->startElement("IBAN");
                        $myXml->text($cuentaBancariaCompleta);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("RmtInf");
                        $myXml->startElement("Ustrd");
                        $myXml->text("Fundación 2000 Pago Trimestre " . $trimestre[1] . " " . $anyoActual);
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;

                    }

                    $setNombreApellidosPagados .= ")";

                    $myXml->endElement();
                    /* Fin Bucle Usuarios */
                    $myXml->endElement();
                    $myXml->fullEndElement();

                    $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

                    foreach ($validInscripcionsAccount as $inscripcionHistorico) {
                        $myValues .= "(";

                        $id_formularioinscripciones = $inscripcionHistorico['id_formularioinscripciones'];
                        $fechaDomiciliacion = Date('Y-m-d H:i:s');
                        $nombreApellidos = $inscripcionHistorico['nombre_apellidos'];
                        $nombreApellidosSpaces = str_replace(["  "], " ", $nombreApellidos);
                        $nombreApellidosCaps = ucwords($nombreApellidosSpaces);
                        $mesDomiciliacion = Utils::checkTrimestre()[1];
                        $dniTitular = $inscripcionHistorico['dni_pagador'];
                        $cuentaBancariaCompleta = $inscripcionHistorico['iban'] . $inscripcionHistorico['entidad'] . $inscripcionHistorico['oficina'] . $inscripcionHistorico['dc'] . $inscripcionHistorico['cuenta'];

                        $myValues .= $id_formularioinscripciones . ",'" . $fechaDomiciliacion . "','" . $nombreApellidosCaps . "','" . $mesDomiciliacion . "','" . $dniTitular . "','" . $cuentaBancariaCompleta . "')";

                        if ($inscripcionHistorico != end($validInscripcionsAccount)) {
                            $myValues .= ",";
                        }

                    }

                    /* Transaccion sql actualizar pago trimestral y entidad de domiciliaciones. */
                    //$myTransaction = new PDO('mysql:host=localhost;dbname=alqueriaforms', 'root', '',array(PDO::ATTR_PERSISTENT => true));
                    $myTransaction = new PDO('mysql:host=localhost;dbname=alqueriaforms', 'root', 'Abc01cba',array(PDO::ATTR_PERSISTENT => true));

                    /* comenzamos la transaccion */
                    try 
                    {
                        $myTransaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $myTransaction->beginTransaction();
                        $myTransaction->exec("update formulariosinscripciones_patronato_pagos fip join formulariosinscripciones_patronato fi on(fip.id_formularioinscripciones=fi.id_formulario) set fip.$trimestre[2] = $fechaPago where concat(fi.nombre,' ',fi.apellidos) IN $setNombreApellidosPagados and fi.is_active = 1");
                        $myTransaction->exec("insert into historico_domiciliaciones_trimestrales_patronato (id_formularioinscripciones, fecha_domiciliacion, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) values $myValues;");
                        $myTransaction->commit();

                        echo json_encode(array(
                            "response" => "ok",
                            "message" => "Fichero Generado con Éxito.",
                            "messageDownload" => "Haga Click aquí para Descargar.",
                            "trimestre" => $trimestre[1],
                            "anyo_actual" => $anyoActual,
                        ));
                    } 
                    catch (Exception $e){
                        $myTransaction->rollBack();
                        echo json_encode(array("response" => "ok2", "message" => "Se ha producido un Error."));
                    }

                    break;

                }
            
            /*  Domiciliaciones matrículas Patronato */
            case "domiciliaciones_matricula_patronato":
                {

                    header('Content-type: text/xml');
                    header('Content-Disposition: attachment; filename=Domiciliacion_Matriculas_Patronato.xml');

                    require "models/inscripciones_patronato.php";
                    require "models/inscripciones_patronato_pagos.php";
                    require "includes/Utils.php";

                    $trimestre = Utils::checkTrimestre();
                    $anyoActual = Date('Y');

                    $file = fopen(self::URL_SERVER . '\Cuentas Erroneas Domiciliacion Matriculas Patronato', "w");
                    fwrite($file, "CUENTAS BANCARIAS ERRONEAS MATRICULAS PATRONATO:\n");

                    $allInscripcionesXML = inscripciones_patronato::findInscripcionesPagosMatriculaPendienteXml();

                    $numRows = 0;
                    $totalSum = 0;

                    $validInscripcionsAccount = [];
                    $setHermanos = [];

                    foreach ($allInscripcionesXML as $inscripcion) {
                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                        $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);

                        if (!$cuentaValidada) {
                            fwrite($file, $inscripcion['dni_titular'] . "  " . $inscripcion['titular'] . "  " . $inscripcion['telefono_padre'] . " / " . $inscripcion['telefono_madre'] . "\n");
                            continue;
                        }

                        $nombreApellidos = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                        $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                        $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                        $totalSum += $inscripcion['pendiente_matricula'];
                        $validInscripcionsAccount[] = $inscripcion;

                        $numRows++;
                    }

                    $hermanosAgrupados = Utils::checkearHermanos($setHermanos);
                    $hermanosAgrupadosCounter = Utils::checkearHermanos($setHermanos);

                    $cantidadDomiciliaciones = 0;

                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                        $hermanosAgrupadosCounter[$nombreHermanos] = "";
                        $cantidadDomiciliaciones++;
                    }

                    if (empty($validInscripcionsAccount)) {
                        echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones de matrículas pendientes"));
                        die();
                    }

                    $MndtId_Unique_Identifier = 1;
                    $contador = 1;
                    $fechaActual = Date('Y-m-d H:i:s');
                    $fechaActualSH = Date('Y-m-d');

                    $myXml = new XMLWriter();

                    $myXml->openUri(self::URL_SERVER . '\Domiciliacion Matriculas Patronato ' . $anyoActual . '.xml');
                    $myXml->setIndent(true);
                    $myXml->setIndentString("  ");

                    $myXml->startDocument('1.0', 'utf-8', "no");

                    $myXml->startElement("Document");
                    $myXml->startAttribute("xmlns");
                    $myXml->text("urn:iso:std:iso:20022:tech:xsd:pain.008.001.02");
                    $myXml->endAttribute();

                    /* Root Document */
                    $myXml->startElement("CstmrDrctDbtInitn");

                    $MsgId = str_replace([" ", '-', ':'], "", $fechaActual);
                    $fechaActualSinHora = str_replace([" ", '-', ':'], "", $fechaActualSH);

                    /* Header XML */
                    $myXml->startElement("GrpHdr");

                    $myXml->startElement("MsgId");
                    $myXml->text($MsgId);
                    $myXml->endElement();

                    $myXml->startElement("CreDtTm");
                    $myXml->text(Date('Y-m-d') . "T" . Date('H:m:s'));
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($cantidadDomiciliaciones);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("InitgPty");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->startElement("Id");
                    $myXml->startElement("OrgId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    /* End Heade XML */

                    /* Start Main Content XML */
                    $myXml->startElement("PmtInf");
                    $myXml->startElement("PmtInfId");
                    $myXml->text("2RCUR" . $fechaActualSinHora);
                    $myXml->endElement();

                    $myXml->startElement("PmtMtd");
                    $myXml->text("DD");
                    $myXml->endElement();

                    $myXml->startElement("NbOfTxs");
                    $myXml->text($cantidadDomiciliaciones);
                    $myXml->endElement();

                    $myXml->startElement("CtrlSum");
                    $myXml->text($totalSum);
                    $myXml->endElement();

                    $myXml->startElement("PmtTpInf");
                    $myXml->startElement("SvcLvl");
                    $myXml->startElement("Cd");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("LclInstrm");
                    $myXml->startElement("Cd");
                    $myXml->text("CORE");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->startElement("SeqTp");
                    $myXml->text("RCUR");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ReqdColltnDt");
                    $myXml->text(Date('Y-m-d'));
                    $myXml->endElement();

                    $myXml->startElement("Cdtr");
                    $myXml->startElement("Nm");
                    $myXml->text("FUNDACION VALENCIA BASQUET 2000");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAcct");
                    $myXml->startElement("Id");
                    $myXml->startElement("IBAN");
                    $myXml->text("ES2931590009962339424422");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("CdtrAgt");
                    $myXml->startElement("FinInstnId");
                    $myXml->startElement("BIC");
                    $myXml->text("CAIXESBBXXX");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->startElement("ChrgBr");
                    $myXml->text("SLEV");
                    $myXml->endElement();

                    $myXml->startElement("CdtrSchmeId");
                    $myXml->startElement("Id");
                    $myXml->startElement("PrvtId");
                    $myXml->startElement("Othr");
                    $myXml->startElement("Id");
                    $myXml->text("ES45000G96614474");
                    $myXml->endElement();
                    $myXml->startElement("SchmeNm");
                    $myXml->startElement("Prtry");
                    $myXml->text("SEPA");
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();
                    $myXml->endElement();

                    $myValues = "";
                    $setNombreApellidosPagados = "(";

                    /* Inicio Bucle Usuarios */
                    foreach ($validInscripcionsAccount as $inscripcion) {
                        $setNombreApellidosPagados .= "'" . $inscripcion['nombre'] . " " . $inscripcion['apellidos'] . "'";
                        if ($inscripcion != end($validInscripcionsAccount)) {
                            $setNombreApellidosPagados .= ",";
                        }

                        $totalSum += $inscripcion['pendiente_matricula'];
                        $fechaAlta = $inscripcion['fecha_inscripcion'];

                        $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                        if (!in_array($cuentaBancariaCompleta, $hermanosAgrupados)) {
                            continue;
                        }

                        $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                        $hermanosAgrupados[$nombreHermanos] = "";
                        $nombreHermanosSeparados = explode(' -- ', $nombreHermanos);

                        $calcularImporte = Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados);

                        $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);

                        $myXml->startElement("DrctDbtTxInf");
                        $myXml->startElement("PmtId");
                        $myXml->startElement("EndToEndId");
                        $myXml->text($endToEndId . "-" . $contador);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->startElement("InstdAmt");
                        $myXml->startAttribute("Ccy");
                        $myXml->text("EUR");
                        $myXml->endAttribute();
                        /* IMPORTE DE LA MATRICULA PENDIENTE */
                        $myXml->text($calcularImporte);
                        $myXml->endElement();

                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($MndtId_Unique_Identifier);
                        $myXml->endElement();

                        $myXml->startElement("DtOfSgntr");
                        $myXml->text($fechaAlta);
                        $myXml->endElement();

                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAgt");
                        $myXml->startElement("FinInstnId");
                        $myXml->startElement("BIC");
                        $myXml->text("NOTPROVIDED");
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("Dbtr");
                        $myXml->startElement("Nm");
                        /* NOMBRE Y APELLIDOS DOMICILIADOR */
                        $myXml->text($nombreHermanos);
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("DbtrAcct");
                        $myXml->startElement("Id");
                        $myXml->startElement("IBAN");
                        $myXml->text($cuentaBancariaCompleta);
                        $myXml->endElement();
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->startElement("RmtInf");
                        $myXml->startElement("Ustrd");
                        $myXml->text("Fundación 2000 Matricula Pendiente " . Date('Y'));
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;

                    }
                    $setNombreApellidosPagados .= ")";
                    $myXml->endElement();

                    /* Fin Bucle Usuarios */
                    $myXml->endElement();
                    $myXml->fullEndElement();

                    $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

                    foreach ($validInscripcionsAccount as $inscripcionHistorico) {
                        $myValues .= "(";

                        $id_formularioinscripciones = $inscripcionHistorico['id_formularioinscripciones'];
                        $fechaDomiciliacion = Date('Y-m-d H:i:s');
                        $nombreApellidos = $inscripcionHistorico['nombre_apellidos'];
                        $nombreApellidosSpaces = str_replace(["  "], " ", $nombreApellidos);
                        $nombreApellidosCaps = ucwords($nombreApellidosSpaces);
                        $dniTitular = $inscripcionHistorico['dni_pagador'];
                        $pendiente_matricula = $inscripcionHistorico['pendiente_matricula'];
                        $cuentaBancariaCompleta = Utils::extractAccountFromInscription($inscripcionHistorico);

                        $myValues .= $id_formularioinscripciones . ",'" . $fechaDomiciliacion . "','" . $pendiente_matricula . "','" . $nombreApellidosCaps . "','" . $trimestre[1] . "','" . $dniTitular . "','" . $cuentaBancariaCompleta . "')";

                        if ($inscripcionHistorico != end($validInscripcionsAccount)) {
                            $myValues .= ",";
                        }
                    }

                    /* Transaccion sql actualizar pago trimestral y entidad de domiciliaciones. */
                    $myTransaction = new PDO('mysql:host=localhost;dbname=alqueria_local', 'root', '',
                        array(PDO::ATTR_PERSISTENT => true));

                    /* comenzamos la transaccion */
                    try {
                        $myTransaction->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $myTransaction->beginTransaction();
                        $myTransaction->exec("update formulariosinscripciones_patronato_pagos fip join formulariosinscripciones_patronato fi on(fip.id_formularioinscripciones=fi.id_formulario) set fip.pagado_pendiente_matricula = $fechaPago where concat(fi.nombre,' ',fi.apellidos) IN $setNombreApellidosPagados and fi.is_active = 1");
                        $myTransaction->exec("insert into historico_domiciliaciones_matricula_patronato (id_formularioinscripciones, fecha_domiciliacion, cantidad_abonada, nombre_apellidos, mes_domiciliado, dni_titular, cuenta_bancaria_completa) values $myValues;");
                        $myTransaction->commit();

                        echo json_encode(array(
                            "response" => "ok",
                            "message" => "Fichero Generado con Éxito.",
                            "messageDownload" => "Haga Click aquí para Descargar.",
                            "trimestre" => $trimestre[1],
                            "anyo_actual" => $anyoActual,
                        ));

                    } catch (Exception $e) {
                        $myTransaction->rollBack();
                        var_dump($e->getMessage());
                        die();
                        echo json_encode(array("response" => "ok2", "message" => "Se ha producido un Error."));

                    }

                    break;

                }
        }
    }

    /*  Deprecated: no utilizar pero tampoco borrarlo hasta que esté el back de jugadores 2020.
     *  El método se utiliza en el back de escuela y cantera 2019 */
    public function actionUpdateInscripcion()
    {
        require "models/inscripciones.php";
        $date = new DateTime($_POST["fechaN-editar-inscripciones"]);

        $nuevocontenido = "Nombre y apellidos:" . $_POST["nombre-editar-inscripciones"] .
                "<br />Fecha de nacimiento:" . $date->format("d/m/Y") .
                "<br />Dirección:" . $_POST["direccion-editar-inscripciones"] .
                "<br />Número:" . $_POST["numero-editar-inscripciones"] .
                "<br />Piso/Esc:" . $_POST["piso-editar-inscripciones"] . "º"
                . "<br />Puerta:" . $_POST["puerta-editar-inscripciones"] .
                "<br />Población:" . $_POST["poblacion-editar-inscripciones"] .
                "<br />CP:" . $_POST["cp-editar-inscripciones"] .
                "<br />Provincia:" . $_POST["provincia-editar-inscripciones"] .
                "<br />Nombre del padre:" . $_POST["nombrepadre-editar-inscripciones"] .
                "<br />Nombre de la madre:" . $_POST["nombremadre-editar-inscripciones"] .
                "<br />Teléfono padre:" . $_POST["tlfpadre-editar-inscripciones"] .
                "<br />Teléfono de la madre:" . $_POST["tlfmadre-editar-inscripciones"] .
                "<br />Email:" . $_POST["email-editar-inscripciones"] .
                "<br /><b>Modalidad:</b>" .
                $_POST["modalidad-editar-inscripciones"] . "<br />Talla Camiseta:";
        
            if( isset($_POST["talla-editar-inscripciones"]) && !empty($_POST["talla-editar-inscripciones"]) )
            {   $nuevocontenido.= $_POST["talla-editar-inscripciones"]; }
            else
            {   $nuevocontenido.="null";    }

        $nuevocontenido.="<br />Número Camiseta:" . $_POST["numeroCamiseta-editar-inscripciones"] . 
                "<br />Alergico:" . $_POST["alergico-editar-inscripciones"] . 
                "<br />Alergia:" . $_POST["alergias-editar-inscripciones"] . 
                "<br />DATOS DEL BANCO<br />TITULAR:" . $_POST["titular-editar-inscripciones"] . 
                "<br />DNI TITULAR:" . $_POST["dnititular-editar-inscripciones"] . 
                "<br />IBAN:" . $_POST["iban-editar-inscripciones"] . "<br />ENTIDAD:" . $_POST["entidad-editar-inscripciones"] . 
                "<br />OFICINA:" . $_POST["oficina-editar-inscripciones"] . "<br />DC:" . $_POST["dc-editar-inscripciones"] . 
                "<br />CUENTA: " . $_POST["cuenta-editar-inscripciones"] . " ";

        $datos = inscripciones::actualizacuentabancaria($_POST["IDInscripcion"], $nuevocontenido);

        $DNITutorActualizado = inscripciones::actualizaAtributo("dni_tutor", $_POST["dnititular-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $nombreApellidosActualizado = inscripciones::actualizaAtributo("nombre_apellidos", $_POST["nombre-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $DireccionActualizado = inscripciones::actualizaAtributo("direccion", $_POST["direccion-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $NumeroActualizado = inscripciones::actualizaAtributo("numero", $_POST["numero-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $PisoActualizado = inscripciones::actualizaAtributo("piso", $_POST["piso-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $PisoActualizado = inscripciones::actualizaAtributo("puerta", $_POST["puerta-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $PoblacionActualizado = inscripciones::actualizaAtributo("poblacion", $_POST["poblacion-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $CPActualizado = inscripciones::actualizaAtributo("codigo_postal", $_POST["cp-editar-inscripciones"], $_POST["IDInscripcion"], "no");

        $Provinciactualizado = inscripciones::actualizaAtributo("provincia", $_POST["provincia-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $Fechactualizado = inscripciones::actualizaAtributo("fecha_nacimiento", $_POST["fechaN-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $NombrePadreactualizado = inscripciones::actualizaAtributo("nombre_padre", $_POST["nombrepadre-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $NombreMadreactualizado = inscripciones::actualizaAtributo("nombre_madre", $_POST["nombremadre-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $tlfPadrectualizado = inscripciones::actualizaAtributo("telefono_padre", $_POST["tlfpadre-editar-inscripciones"], $_POST["IDInscripcion"], "no");

        $tlfMadreactualizado = inscripciones::actualizaAtributo("telefono_madre", $_POST["tlfmadre-editar-inscripciones"], $_POST["IDInscripcion"], "no");
        if( isset($_POST["dnijugador-editar-inscripciones"]) && !empty($_POST["dnijugador-editar-inscripciones"]) ){
            $dnijugador = inscripciones::actualizaAtributo("dni_jugador", $_POST["dnijugador-editar-inscripciones"], $_POST["IDInscripcion"], "si");
        }

        if( isset($_POST["talla-editar-inscripciones"]) && !empty($_POST["talla-editar-inscripciones"]) ){
            $tallaActualizado = inscripciones::actualizaAtributo("talla_camiseta", $_POST["talla-editar-inscripciones"], $_POST["IDInscripcion"], "si");
        }

        $numeroCamisetaactualizado = inscripciones::actualizaAtributo("numero_camiseta", $_POST["numeroCamiseta-editar-inscripciones"], $_POST["IDInscripcion"], "no");

        $modalidadActualizado = inscripciones::actualizaAtributo("id_equipo_horario", $_POST["modalidad-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $emailActualizado = inscripciones::actualizaAtributo("email", $_POST["email-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        //  Actualización de Club, Categoria y Equipo: 2019 / 2020 
        inscripciones::actualizaAtributo("id_federacion_clubs",     $_POST["federacion_club"],$_POST["IDInscripcion"],  "si");
        inscripciones::actualizaAtributo("id_federacion_categoria",$_POST["federacion_categoria"],$_POST["IDInscripcion"],  "si");
        inscripciones::actualizaAtributo("id_federacion_equipo",   $_POST["federacion_equipo"],$_POST["IDInscripcion"],  "si");
        
        // error_log( $_POST["alergico-editar-inscripciones"] );

        $alergicoActualizado = inscripciones::actualizaAtributo("alergico", $_POST["alergico-editar-inscripciones"], $_POST["IDInscripcion"], "no");

        $alergiasActualizado = inscripciones::actualizaAtributo("alergias", $_POST["alergias-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $titularActualizado = inscripciones::actualizaAtributo("titular_banco", $_POST["titular-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $ibanActualizado = inscripciones::actualizaAtributo("iban", $_POST["iban-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $entidadActualizado = inscripciones::actualizaAtributo("entidad", $_POST["entidad-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $oficinaActualizado = inscripciones::actualizaAtributo("oficina", $_POST["oficina-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $dcActualizado = inscripciones::actualizaAtributo("dc", $_POST["dc-editar-inscripciones"], $_POST["IDInscripcion"], "si");

        $cuentaActualizado = inscripciones::actualizaAtributo("cuenta", $_POST["cuenta-editar-inscripciones"], $_POST["IDInscripcion"], "si");


        echo json_encode(array(
            "datos" => $datos,
            "modal_title" => "Inscripcion",
            "message" => "Editado Correctamente"));
    }

    public static function actioninscripciones_cargar_contenido_inscripcion_original_datos()
    {
        require "models/inscripciones.php";
        for( $m = 10000107 ; $m <= 10000838 ; $m++ ){//10000838
            $consulta = inscripciones::findFormFornumero_pedido( $m );

            $contenido = $consulta["contenido"];

            error_log( "---SALTO---" );

            $arrayDatos = ["foo" => "example"];
            $primeraPos = 0;
            $ultimaPos = 0;
            $longitud = 0;
            $titulo = "";
            $valor = "";
            $contador = 0; 

            while( $contador < 25 ){

                $ultimaPos = strpos( $contenido, ':', $primeraPos  );

                $longitud = $ultimaPos - $primeraPos;
                $titulo = substr($contenido, $primeraPos, $longitud);
                $primeraPos = $ultimaPos + 1;

                if( $titulo != "CUENTA" && $titulo != "<b>Modalidad" ){
                    $ultimaPos = strpos( $contenido, '<br />', $primeraPos );
                    $longitud = $ultimaPos - $primeraPos;
                    $valor = substr($contenido, $primeraPos, $longitud);
                    $primeraPos = $ultimaPos + 6;
                }else if ( $titulo == "CUENTA" ) {
                    $valor = substr($contenido, $primeraPos, 10);
                }else if( $titulo == "<b>Modalidad" ){
                    $primeraPos = $primeraPos + 4;
                    $ultimaPos = strpos( $contenido, '<br />', $primeraPos );
                    $longitud = $ultimaPos - $primeraPos;
                    $valor = substr($contenido, $primeraPos, $longitud);
                    $primeraPos = $ultimaPos + 6;
                }

               // error_log( '"' . $titulo . '" -> ' . $valor );

                $arrayDatos[$titulo] = $valor;

                //array_push($arrayDatos, $titulo, $valor);

                $contador++;
            }

        //update atribute 
        if( isset( $arrayDatos["DNI TITULAR"] ) ){
        $DNITutorActualizado = inscripciones::actualizaAtributoDatos("dni_tutor", $arrayDatos["DNI TITULAR"], $m, "si");
        }

        if( isset( $arrayDatos["Nombre y apellidos"] ) ){
        $nombreApellidosActualizado = inscripciones::actualizaAtributoDatos("nombre_apellidos", $arrayDatos["Nombre y apellidos"], $m, "si");
        }

        if( isset( $arrayDatos["Dirección"] ) ){
        $DireccionActualizado = inscripciones::actualizaAtributoDatos("direccion", $arrayDatos["Dirección"], $m, "si");
        }

        if( isset( $arrayDatos["Número"] ) ){
        $NumeroActualizado = inscripciones::actualizaAtributoDatos("numero", $arrayDatos["Número"], $m, "si");
        }

        if( isset( $arrayDatos["Piso/Esc"] ) ){
        $PisoActualizado = inscripciones::actualizaAtributoDatos("piso", $arrayDatos["Piso/Esc"], $m, "si");
        }

        if( isset( $arrayDatos["Puerta"] ) ){
        $PisoActualizado = inscripciones::actualizaAtributoDatos("puerta", $arrayDatos["Puerta"], $m, "si");
        }

        if( isset( $arrayDatos["Población"] ) ){
        $PoblacionActualizado = inscripciones::actualizaAtributoDatos("poblacion", $arrayDatos["Población"], $m, "si");
        }

        if( isset( $arrayDatos["CP"] ) ){
        $CPActualizado = inscripciones::actualizaAtributoDatos("codigo_postal", $arrayDatos["CP"], $m, "no");
        }

        if( isset( $arrayDatos["Provincia"] ) ){
        $Provinciactualizado = inscripciones::actualizaAtributoDatos("provincia", $arrayDatos["Provincia"], $m, "si");
        }

        if( isset( $arrayDatos["Fecha de nacimiento"] ) ){
        $Fechactualizado = inscripciones::actualizaAtributoDatos("fecha_nacimiento", $arrayDatos["Fecha de nacimiento"], $m, "si");
        }

        if( isset( $arrayDatos["Nombre del padre"] ) ){
        $NombrePadreactualizado = inscripciones::actualizaAtributoDatos("nombre_padre", $arrayDatos["Nombre del padre"], $m, "si");
        }

        if( isset( $arrayDatos["Nombre de la madre"] ) ){
        $NombreMadreactualizado = inscripciones::actualizaAtributoDatos("nombre_madre", $arrayDatos["Nombre de la madre"], $m, "si");
        }

        if( isset( $arrayDatos["Teléfono padre"] ) ){
        $tlfPadrectualizado = inscripciones::actualizaAtributoDatos("telefono_padre", trim($arrayDatos["Teléfono padre"]), $m, "no");
        }

        if( isset( $arrayDatos["Teléfono de la madre"] ) ){
        $tlfMadreactualizado = inscripciones::actualizaAtributoDatos("telefono_madre", trim($arrayDatos["Teléfono de la madre"]), $m, "no");
        }

        //
        if( isset( $arrayDatos["Talla Camiseta"] ) ){

            $tallaActualizado = inscripciones::actualizaAtributoDatos("talla_camiseta", $arrayDatos["Talla Camiseta"], $m, "si");
        }

        //

        if( isset( $arrayDatos["Número Camiseta"] ) ){
            $numeroCamisetaactualizado = inscripciones::actualizaAtributoDatos("numero_camiseta", $arrayDatos["Número Camiseta"], $m, "no");
        }

        if( isset( $arrayDatos["<b>Modalidad"] ) ){
            $modalidadActualizado = inscripciones::actualizaAtributoDatos("modalidad", $arrayDatos["<b>Modalidad"], $m, "si");
        }

        if( isset( $arrayDatos["Talla Camiseta"] ) ){       
        $emailActualizado = inscripciones::actualizaAtributoDatos("email", $arrayDatos["Email"], $m, "si");
        }

        //

        if( isset( $arrayDatos["Alergico"] ) ){
            $alergicoActualizado = inscripciones::actualizaAtributoDatos("alergico", $arrayDatos["Alergico"], $m, "no");
        }

        //
        if( isset( $arrayDatos["Alergia"] ) ){
            $alergiasActualizado = inscripciones::actualizaAtributoDatos("alergias", $arrayDatos["Alergia"], $m, "si");
        }
        if( isset( $arrayDatos["DATOS DEL BANCO<br />TITULAR"] ) ){
        $titularActualizado = inscripciones::actualizaAtributoDatos("titular_banco", $arrayDatos["DATOS DEL BANCO<br />TITULAR"], $m, "si");
        }
        if( isset( $arrayDatos["IBAN"] ) ){
        $ibanActualizado = inscripciones::actualizaAtributoDatos("iban", $arrayDatos["IBAN"], $m, "si");
        }
        if( isset( $arrayDatos["ENTIDAD"] ) ){
        $entidadActualizado = inscripciones::actualizaAtributoDatos("entidad", $arrayDatos["ENTIDAD"], $m, "si");
        }
        if( isset( $arrayDatos["OFICINA"] ) ){
        $oficinaActualizado = inscripciones::actualizaAtributoDatos("oficina", $arrayDatos["OFICINA"], $m, "si");
        }
        if( isset( $arrayDatos["DC"] ) ){
        $dcActualizado = inscripciones::actualizaAtributoDatos("dc", $arrayDatos["DC"], $m, "si");
        }
        if( isset( $arrayDatos["CUENTA"] ) ){
            $cuentaActualizado = inscripciones::actualizaAtributoDatos("cuenta", $arrayDatos["CUENTA"], $m, "si");     
        }

        }

        
    }
    
    private static function comprobar_iban($iban)
    {
        # definimos un array de valores con el valor de cada letra
        $letras=array(
            "A"=>10, "B"=>11, "C"=>12, "D"=>13, "E"=>14, "F"=>15, "G"=>16,  "H"=>17, 
            "I"=>18, "J"=>19, "K"=>20, "L"=>21, "M"=>22, "N"=>23, "O"=>24,  "P"=>25, 
            "Q"=>26, "R"=>27, "S"=>28, "T"=>29, "U"=>30, "V"=>31, "W"=>32,  "X"=>33, 
            "Y"=>34, "Z"=>35);

        # Eliminamos los posibles espacios al inicio y final
        $iban=trim($iban);

        # Convertimos en mayusculas
        $iban=strtoupper($iban);

        # eliminamos espacio y guiones que haya en el iban
        $iban=str_replace(array(" ","-"),"",$iban);

        if(strlen($iban)==24)
        {
            # obtenemos los codigos de las dos letras
            $valorLetra1 = $letras[substr($iban, 0, 1)];
            $valorLetra2 = $letras[substr($iban, 1, 1)];

            # obtenemos los siguientes dos valores
            $siguienteNumeros= substr($iban, 2, 2);

            $valor = substr($iban, 4, strlen($iban)).$valorLetra1.$valorLetra2.$siguienteNumeros;

            if(bcmod($valor,97)==1)
            {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public static function actionAltaEquipo()
    {
        if( isset($_SESSION['usuario']) )
        {
            require "models/horarios_equipos_19_20.php";
            $equipo = filter_input(INPUT_POST, 'equipo', FILTER_SANITIZE_STRING);
            
            if(!empty($equipo))
            {
                $equipo_encontrado=horarios_equipos_19_20::findByEquipo($equipo);
                if(!empty($equipo_encontrado))
                {
                    echo json_encode(
                            array(
                                "response"  =>"error",
                                "message"   =>"No se ha añadido el equipo porque ya existe."));
                }
                else{
                    $nuevo_equipo=horarios_equipos_19_20::insert($equipo, NULL, NULL, NULL, NULL, NULL);
                    echo json_encode(
                            array(
                                "response"  =>"success",
                                "message"   =>'El equipo "'.$equipo.'" se ha creado correctamente.'));
                }
            }
        }
    }
}



    /*OBSOLETO Metodo comprobar login
    private static function isLogged(){
        if( isset($_SESSION['usuario']) ){
            return true;
        }else{
            header('Location: index.php?r=login/loger');
        }
    }*/ 


/*case "inscripciones_cargar_contenido_inscripcion_original_datos":
{
    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

    if (isset($idinscripcion) && !empty($idinscripcion)) {
        require "models/inscripciones.php";
        $datos = inscripciones::findFormFornumero_pedido($idinscripcion);
        echo json_encode(array("response" => "success",
            "datos" => $datos,
            "modal_title" => "Formulario de inscripción",
            "message" => "Los datos de la inscripción se han cargado correctamente."));
    } else {
        echo json_encode(array(
            "response" => "error",
            "datos" => "",
            "modal_title" => "Error",
            "message" => "Parece que ha habido algún error"));
    }
    break;
}*/

/** actionCargar() recupera una instancia de jugadores a partir de su dni */
/* public function actionCargar()
{
    require "includes/Utils.php";

    //  Comprueba si hay que depurar y lo hace
    Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");

    //  Incluimos los modelos
    require "models/jugadores.php";
    require "PHPMailer/envios_emails.php";  
    require "lang/publico_".$_SESSION['idioma'].".php";  

    require "models/inscripciones_escuela_y_cantera.php"; 

    error_log(__FILE__.__LINE__);
    error_log(print_r($_POST,1));  

    //  Recibimos la clave primaria de la instancia a cargar537541
    $idjugador        =   strtoupper(filter_input(INPUT_POST, 'jugadores_id',FILTER_SANITIZE_STRING));    
    $formulario =   filter_input(INPUT_POST, 'formulario',FILTER_SANITIZE_STRING); 
    // $instancia  =   jugadores::findBydni_jugador(strtoupper($dni));
    $datos = inscripciones_escuela_y_cantera::findFormForIdJugadorSinHorarios($idjugador);

    error_log(print_r($datos,1)); 

    if(!empty($datos))
    {
        $datos["foto"]          ="";
        $datos["dni_delante"]   ="";
        $datos["dni_detras"]    ="";
        $datos["pasaporte"]     ="";
        $datos["sip"]           ="";

       // error_log(print_r("jugador nº:" . $idjugador,1));  

        if($datos["autoriza_modificacion"]===0 || $datos["autoriza_modificacion"]==="0" || $datos["is_active"]===0 || $datos["is_active"]==="0" )
        {
            echo json_encode(
                array(
                "response"  => "error",
                "instancia" => $datos,
                "mostrar_dni_tutor"=>"no",
                "message"   => $lang["ins_controlador_error_autorizacion"]));
            die;
        }
        else if($datos["categoria"]!== $formulario)
        {
            echo json_encode(
                array(
                "response"  => "error",
                "instancia" => $datos,
                "message"   => $lang["ins_controlador_error_diferente_seccion_1"].strtoupper($formulario).$lang["ins_controlador_error_diferente_seccion_2"].strtoupper($datos["categoria"]).$lang["ins_controlador_error_diferente_seccion_3"]));
            die;
        }
        else
        {

            error_log(print_r("succes idjugador: " . $idjugador,1));  


            echo json_encode(
                array(
                "response"  => "success",
                "instancia" => $datos,
                "message"   => "Los datos de la instancia jugadores se han recuperado."));
            die;
        }
    }
    else
    {
        echo json_encode(
            array(
            "response"      => "error",
            "instancia"     => "",
            "mostrar_dni_tutor"=>"si",
            "message"       => $lang["ins_controlador_error_carga"]));
        die;
    } 
}
*/
?>