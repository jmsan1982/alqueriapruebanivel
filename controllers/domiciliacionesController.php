<?php
class domiciliacionesController
{
    //  const URL_SERVER = 'C:\xampp\htdocs\serviciosalqueria\public';
    //  const URL_SERVER = 'C:\inetpub\wwwroot\alqueriaforms\public';
	
    public function actionDispatcher()
    {
        $metodo = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
        if ($metodo == "")
        {   $metodo = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);   }

        $force_debug = "false";
        if ($force_debug === "true" || filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING) === "true") {
            error_log(print_r($_POST, 1));
        }

        switch($metodo)
        {
            /*  Muestra la inscripción original (modal). */
            case "inscripciones_cargar_contenido_inscripcion_original":
            {
                $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);



                if (isset($idinscripcion) && !empty($idinscripcion))
                {
                    require "models/inscripciones.php";
                    $datos = inscripciones::findFormForId($idinscripcion);
                    echo json_encode(array("response" => "success",
                        "datos" => $datos,
                        "modal_title" => "Formulario de inscripción",
                        "message" => "Los datos de la inscripción se han cargado correctamente."));
                } 
                else {
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Parece que ha habido algún error"));
                }
                break;
            }

            case "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario":
            {
    //error_log(__FILE__.__LINE__);
    //error_log(print_r($_POST,1));
                
                $idinscripcion      = filter_input(INPUT_POST,          'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                $dni_busqueda       = filter_input(INPUT_POST,          'dni_busqueda', FILTER_SANITIZE_STRING);
                $nombre_apellidos   = trim(filter_input(INPUT_POST,     'nombre_apellidos', FILTER_SANITIZE_STRING));
                if(!empty($nombre_apellidos)){
                    $nombre_apellidos_array=explode(" ",$nombre_apellidos);
                    $nombre = strtoupper($nombre_apellidos_array[0]);
                    $nombre = str_replace("é","E",$nombre);
                }    
                
                if(isset($idinscripcion) && !empty($idinscripcion))
                {
                    require "models/inscripciones.php";
                    require "models/licenciasfederacion1920.php";
                    require "models/licenciasfederacion1920_equipos.php";
        
                    $datos = inscripciones::findFormForIdConHorarios($idinscripcion);
                    
                    //  Ahora, debemos sacar el equipo, nombre y club a partir de la inscripción.
                    //  De la inscripción, debemos comprobar dni_jugador y dni_tutor.
                    
                    $licenciasfederacion1920_equipos="";
                    
                    //  Comprobamos si se trata de una excepción o no
                    if(!empty($dni_busqueda))
                    {
    //error_log(__FILE__.__LINE__);
                        if($dni_busqueda=="73554498S"){
    //error_log(__FILE__.__LINE__);
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
    //error_log(__FILE__.__LINE__);
                            if(!empty($datos['dni_jugador']))
                            {
    //error_log(__FILE__.__LINE__);
                                $licenciasfederacion1920_equipos=licenciasfederacion1920_equipos::findBydni_jugador($datos['dni_jugador']);
                                if(!empty($licenciasfederacion1920_equipos))
                                {
    //error_log(__FILE__.__LINE__);
                                    echo json_encode(array(
                                    "response"                          => "success",
                                    "datos"                             => $datos,
                                    "licenciasfederacion1920_equipos"   =>$licenciasfederacion1920_equipos,
                                    "modal_title"   => "Formulario de inscripción",
                                    "message"       => "Los datos de la inscripción se han cargado correctamente."));
                                    die;
                                }
                                else{
    //error_log(__FILE__.__LINE__);
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
    //error_log(__FILE__.__LINE__);
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
    //error_log(__FILE__.__LINE__);
                        echo json_encode(array(
                            "response" => "success",
                            "datos"     => $datos,
                            "modal_title" => "",
                            "message" => ""));
                        die;
                    }
                }
                else
                {
    //error_log(__FILE__.__LINE__);
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
                    $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

                    if(isset($idinscripcion) && !empty($idinscripcion))
                    {
                        require "includes/Utils.php";
                        require "models/inscripciones.php";
                        require "models/inscripciones_pagos.php";
                        
                        //  Cargamos la inscripción y cargamos la instancia de los pagos 
                        $inscripcion        = inscripciones::findFormForId($idinscripcion);
                        $inscripcion_pago   = inscripciones_pagos::findById($idinscripcion);
                        
                        //  Extraemos el DNI del titular
                        $dniTitularExtract  = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);
                        $dni_titular = $dniTitularExtract[17];
                        $dni_titular = str_replace(["DNI TITULAR:", " "], "", $dni_titular);

                        $reserva                    = $inscripcion_pago['reserva'];                 
                        $matricula                  = $inscripcion_pago['matricula'];
                        $pendiente_matricula        = $inscripcion_pago['pendiente_matricula'];
                       
                        $pagado_matricula           = $inscripcion_pago['pagado_matricula'];
                        $pagado_pendiente_matricula = $inscripcion_pago['pagado_pendiente_matricula'];
                        
                        $total_inscripcion          = $inscripcion_pago['total_inscripcion'];
                        $total_pendiente            = $inscripcion_pago['total_pendiente'];
                        
                        $trimestre_noviembre        = $inscripcion_pago['trimestre_noviembre'];
                        $trimestre_enero            = $inscripcion_pago['trimestre_enero'];
                        $trimestre_abril            = $inscripcion_pago['trimestre_abril'];
                        
                        //  Fecha de creación del cargo en XML que se envia al banco. No significa que el dinero lo tiene L'Alqueria, significa que el pago se emitió.
                        $cobros_activos_noviembre   = $inscripcion_pago['cobros_activos_noviembre'];    
                        $cobros_activos_enero       = $inscripcion_pago['cobros_activos_enero'];
                        $cobros_activos_abril       = $inscripcion_pago['cobros_activos_abril'];
                        
                        //  Fecha de confirmación del pago (ya sea físico o por confirmación después de que el Valencia Basket envíe el XML al banco)
                        $pagado_enero               = $inscripcion_pago["pagado_enero"];                
                        $pagado_abril               = $inscripcion_pago["pagado_abril"];                
                        $pagado_noviembre           = $inscripcion_pago['pagado_noviembre'];            
                        
            //error_log("========================================================================================");
            //error_log("FICHERO Y LINEA: ".__FILE__.__LINE__);
            //error_log("Vamos a imprimir la instancia de los pagos:");
            //error_log(print_r($inscripcion_pago,1));
            //error_log("========================================================================================");
            
                        //error_log($reserva);

                        // $extractTrimestrePagado = Utils::extractTrimestrePagado($pagado);
                        if (empty($reserva)) {
                            $reserva = '00.00';
                        }
                        if (empty($matricula)) {
                            $matricula = '00.00';
                        }
                        if (empty($pendiente_matricula)) {
                            $pendiente_matricula = '00.00';
                        }
                        if ($pagado_matricula === NULL) {
                            $pagado_matricula = false;
                        }
                        if ($pagado_pendiente_matricula === NULL) {
                            $pagado_pendiente_matricula = false;
                        }
                        
                        if (empty($total_inscripcion)) {
                            $total_inscripcion = '00.00';
                        }
                        if (empty($total_pendiente)) {
                            $total_pendiente = '00.00';
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
                        if(($pagado_noviembre!==false)&&
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
                            ($cobros_activos_abril === NULL || $cobros_activos_abril===0 || $cobros_activos_abril==="0" || $cobros_activos_abril==="0000-00-00 00:00:00")){ 
                            $cobros_activos_abril = false;
                        }
                        else{
                            $cobros_activos_abril = true;
                        }



                        echo json_encode(array(
                            "response" => "success",
                            "modal_title" => "Editar Pagos Trimestral",
                            "message" => "Los pagos de la inscripción se han cargado correctamente",
                            "tipo" => $inscripcion['tipo'],
                            "idinscripcion"         => $idinscripcion,
                            
                            "reserva"               => $reserva,
                            
                            "matricula"             => $matricula,
                            'pagado_matricula'      => $pagado_matricula,
                            'pendiente_matricula'   => $pendiente_matricula,
                            'pagado_pendiente_matricula'    => $pagado_pendiente_matricula,
                            
                            "total_inscripcion"             => $total_inscripcion,
                            "total_pendiente"               => $total_pendiente,
                            
                            'pagado_enero'      => $pagado_enero,
                            'pagado_abril'      => $pagado_abril,
                            'pagado_noviembre'  => $pagado_noviembre,
                            
                            "trimestre_enero"           => $trimestre_enero,
                            "trimestre_abril"           => $trimestre_abril,
                            "trimestre_noviembre"       => $trimestre_noviembre,
                            
                            "cobros_activos_noviembre"  => $cobros_activos_noviembre,
                            "cobros_activos_enero"      => $cobros_activos_enero,
                            "cobros_activos_abril"      => $cobros_activos_abril,
                            
                            "dni_titular" => $dni_titular,
                        ));
                    } 
                    else 
                    {
                        echo json_encode(array(
                            "response" => "error",
                            "datos" => "",
                            "modal_title" => "Error",
                            "message" => "Parece que no se encuentra la inscripción"));
                    }
                    break;
                }
            
            /* Editar pagos de cada Usuario (modal). */
            /*  - Asegurarse de que poner un pago a OFF pone a null cobros_activos_noviembre y pagado_noviembre */
            case "inscripciones_pagos_trimestrales":
            {
                    require "models/inscripciones.php";
                    require "models/inscripciones_pagos.php";

                // Recogemos valores
                    $idinscripcion              = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);
                    $dni_titular                = $_POST['dni_titular'];
                    
                    $reserva                    = $_POST['reserva'];
                    $matricula                  = $_POST['matricula'];
                    $pendiente_matricula        = $_POST['pendiente_matricula'];
                    $total_inscripcion          = $_POST['total_inscripcion'];
                    $total_pendiente            = $_POST['total_pendiente'];
                      
                    $pagado_matricula           = $_POST['pagado_matricula'];
                    $pagado_pendiente_matricula = $_POST['pagado_pendiente_matricula'];
                
                // Cantidades del trimestre (160, 160, 160...)
                    $trimestre_enero            = floatval(filter_input(INPUT_POST, 'trimestre_enero', FILTER_SANITIZE_STRING));
                    $trimestre_abril            = floatval(filter_input(INPUT_POST, 'trimestre_abril', FILTER_SANITIZE_STRING));
                    $trimestre_noviembre        = floatval(filter_input(INPUT_POST, 'trimestre_noviembre', FILTER_SANITIZE_STRING));
                    
                // Checkboxes que indican si un trimestre está pagado o no
                    $pagado_enero               = filter_input(INPUT_POST, 'pagado_enero', FILTER_SANITIZE_STRING);
                    $pagado_abril               = filter_input(INPUT_POST, 'pagado_abril', FILTER_SANITIZE_STRING);
                    $pagado_noviembre           = filter_input(INPUT_POST, 'pagado_noviembre', FILTER_SANITIZE_STRING);
                    
                // XML que indica si se incluirá o no en el XML 
                    $cobros_activos_noviembre   = filter_input(INPUT_POST, 'generar_xml_noviembre', FILTER_SANITIZE_STRING);
                    $cobros_activos_enero       = filter_input(INPUT_POST, 'generar_xml_enero', FILTER_SANITIZE_STRING);
                    $cobros_activos_abril       = filter_input(INPUT_POST, 'generar_xml_abril', FILTER_SANITIZE_STRING);
                    
                // Inscripcion a modificar 
                    $inscripcion_pago   =   inscripciones_pagos::findByIdFormularioFetch($idinscripcion);         
                    $inscripcion        =   inscripciones::findFormForId($idinscripcion);
                    
                    if($pagado_matricula===false || $pagado_matricula==="false"){
                        $pagado_matricula=NULL;
                    }
                    else if($pagado_matricula==="true"){
                        $pagado_matricula=$inscripcion_pago['pagado_matricula'];
                    }
                
                /* Explicación de la actualización
                *  1. Si recibimos el checkbox pagado_enero a true, significa:
                *      - o bien que ya estaba pagado y en pagado_enero hay una fecha
                *      - o bien que no estaba pagado, se está pagando ahora, es NULL en base de datos y debe actualizarse con la fecha
                *  
                *     Para comprobar si se ha pagado, comprobamos el atributo de la tabla "pagado_enero" y comprobamos si hay una fecha o es NULL
                *  
                *  2. Si por el contrario, recibimos el checkbox pagado_enero a FALSE, significa:
                *      - Se hizo la domiciliacion, pero salio mal y la vuelven a poner como pendiente para que se incluya en el siguiente XML.
                *      Así, ponemos cobros_activos_enero a 0000-00-00 00:00:00, ponemos pagado_noviembre a 0.
                */    
                    
                    if($pagado_enero==="true"){
                        if(isset($inscripcion_pago["pagado_enero"]) && !empty($inscripcion_pago["pagado_enero"]) && $inscripcion_pago["pagado_enero"]!==NULL && ($inscripcion_pago["pagado_enero"] !=='0000-00-00 00:00:00'))
                        {   // Si ya existía fecha en $inscripciones_pago['pagado_enero'] significa que ya se confirmó el pago. Así, dejamos la misma fecha
                            $pagado_enero = $inscripcion_pago["pagado_enero"];
                        }
                        else{
                            // Si no existia fecha, significa que se confirma ahora el pago (pago fisico en oficinas). 
                            $cobros_activos_enero = $pagado_enero = Date('Y-m-d H:i:s');
                        }
                    }
                    else{   // Si se pone un pago a false, le quitamos la fecha de creación del cargo, y la confirmación del pago.
                        $cobros_activos_enero = $pagado_enero = NULL;
                    }
                    
                    if($pagado_abril==="true"){
                        if(!empty($inscripcion_pago["pagado_abril"]) && !is_null($inscripcion_pago["pagado_abril"]) && $inscripcion_pago["pagado_abril"] !=='0000-00-00 00:00:00')
                        {   $pagado_abril = $inscripcion_pago["pagado_abril"];}
                        else{   $cobros_activos_abril = $pagado_abril = Date('Y-m-d H:i:s');}
                    }
                    else{ 
                        $cobros_activos_abril = $pagado_abril = NULL;
                    }
                    
                    if($pagado_noviembre==="true"){
                        if(!empty($inscripcion_pago["pagado_noviembre"]) && !is_null($inscripcion_pago["pagado_noviembre"]) && $inscripcion_pago["pagado_noviembre"] !=='0000-00-00 00:00:00')
                        {   $pagado_noviembre = $inscripcion_pago["pagado_noviembre"];}
                        else{   $cobros_activos_noviembre = $pagado_noviembre = Date('Y-m-d H:i:s');}
                    }
                    else
                    { $cobros_activos_noviembre = $pagado_noviembre = NULL;}
                    
                    
                //  Esto del pago pendiente de matricula, no lo tocamos.    
                    if($pagado_pendiente_matricula !== "false"){
                        if(empty($inscripcion_pago["pagado_pendiente_matricula"]) || $inscripcion_pago["pagado_pendiente_matricula"] === NULL) {
                            $pagado_pendiente_matricula = Date('Y-m-d H:i:s');
                        } else {
                            $pagado_pendiente_matricula = $inscripcion_pago["pagado_pendiente_matricula"];
                        }
                    } else {
                        $pagado_pendiente_matricula = NULL;
                    }
                        
                // Actualizamos en base de datos 
                    if(!empty($inscripcion_pago)){
                        $actualizacion = inscripciones_pagos::actualizarPagosTrimestres($idinscripcion, 
                                                                $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente,
                                                                $pagado_matricula, $pagado_pendiente_matricula, 
                                                                $pagado_enero,          $pagado_abril,          $pagado_noviembre, 
                                                                $trimestre_enero,       $trimestre_abril,       $trimestre_noviembre, 
                                                                $cobros_activos_enero,  $cobros_activos_abril,  $cobros_activos_noviembre);
                    }
                    else
                    {
                         error_log(__FILE__.__LINE__.": Error a revisar en inscripciones_pagos::actualizarPagosTrimestres");
            //                        $actualizacion = inscripciones_pagos::createNewPago(
            //                                $idinscripcion, 
            //                                $fecha, $dni_titular, $reserva, $matricula, $pendiente_matricula, $total_inscripcion, 
            //                                $trimestre_enero, $trimestre_abril, $trimestre_noviembre, 
            //                                $pagado_matricula, $pagado_pendiente_matricula
            //                        );
                    }

                    if($actualizacion)
                    {
                        echo json_encode(array("response" => "success",
                            "idinscripcion" => $idinscripcion,
                            "message" => "Los pagos se han modificado correctamente."));
                    } 
                    else 
                    {
                        echo json_encode(array("response" => "error",
                            "idinscripcion" => $idinscripcion,
                            "message" => "Ha habido un error al modificar los pagos."));
                    }
 
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

                        if (!empty($datos['inscripciones_cobros_activos_por_confirmar'])) {
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
                    } 
                    catch (Exception $e) {
                        $myTransaction->rollBack();
                        echo json_encode(array("response" => "ok2", "message" => "Se ha producido un Error."));

                    }

                    break;

                }
        }
    }
    
    
    /** */
    public function actionGenerarXMLMatriculas20192020()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));
        
        if(self::isLogged())
        {
            require "includes/Utils.php";
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            require "models/formulariosinscripciones.php";
            require "models/formulariosinscripciones_pagos.php";
            
            //  Recibimos el formulariosinscripciones.id_equipo_horario
            $equipo  =   filter_input(INPUT_POST, 'id_equipo_horario', FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}
            
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
            }
        
error_log(__FILE__.__LINE__);
error_log("equipo: ".$equipo);
            
            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA, según EQUIPO si procede y tipo="ESCUELA" 
            $inscripciones_a_incluir_en_xml = formulariosinscripciones::find_cobros_activos_matricula_escuela($equipo);

error_log(__FILE__.__LINE__);
error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));
            //  $numRows    = 0;
            //  $totalSum   = 0;
            //  $string_cuentas_erroneas="";
            //  $validInscripcionsAccount   = []; 
            //  $setHermanos                = [];

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml);
            
          //error_log(__FILE__.__LINE__);
          //error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
          //error_log(print_r($inscripcionesValidadas,1));
        
            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];
            
            $nombre_fichero_descarga='\Domiciliacion Matriculas Inscripciones ' . date("Y_m_d_H_i_s") . '.xml';
            $nombre_fichero =   "DomiciliacionMatriculas.xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml'.$nombre_fichero);

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;
            
        
            foreach($validInscripcionsAccount as $inscripcion) 
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }

            if(empty($validInscripcionsAccount)) 
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                die();
            }
            
            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida. $nombre_fichero_descarga);
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
            /* End Header XML */

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
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                if ($inscripcion != end($validInscripcionsAccount)) 
                {
                    $setNombreApellidosPagados .= ",";
                }

                $totalSum += $inscripcion['pendiente_matricula'];
                $fechaAlta = $inscripcion['fecha'];

                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                    continue;
                }

                $nombreHermanos             =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                $hermanosAgrupados[$nombreHermanos] = "";
                $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);
                $calcularImporte            =   Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados)+$inscripcion['aplicar_gastos_devolucion'];

                $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);

                $myXml->startElement("DrctDbtTxInf");
                $myXml->startElement("PmtId");
                $myXml->startElement("EndToEndId");
                $myXml->text($endToEndId . "-" . $inscripcion['numero_pedido']);
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
                $myXml->text($endToEndId . "-" . $inscripcion['numero_pedido']);
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
                $myXml->text("Fundación 2000 Matricula Pendiente 2019");
                $myXml->endElement();
                $myXml->endElement();

                $myXml->endElement();
                $contador++;
                $MndtId_Unique_Identifier++;
                
                /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente */
                formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",            $inscripcion['total_inscripcion']-$inscripcion['matricula'],     "no");
                formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "pendiente_matricula",        0,                              "no");
            }

            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */
            
            $myXml->endElement();
            $myXml->fullEndElement();

            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";
            
            /* Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            $cobros_activos_matricula=formulariosinscripciones_pagos::findCobrosActivosMatricula();
            $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                    
            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas: 
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores
            */
            if($equipo!=="")
            {   
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatriculaByIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   formulariosinscripciones_pagos::findCobrosActivosMatriculaExceptoIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula_ant =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula_anteriores);
            }
            else
            {   
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   "";
                $tabla_cobros_activos_matricula_ant =   "";
            }
            
            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "tabla_cobros_activos_matricula"    =>  $tabla_cobros_activos_matricula,
                "tabla_cobros_activos_matricula_ant"=>  $tabla_cobros_activos_matricula_ant,
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }
    
    
    /** GenerarXMLTrimestre20192020 */
    public function actionVistaPreviaGenerarXMLTrimestre20192020()
    {
//  error_log("================================================================");
//  error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//  error_log(print_r($_POST,1));
  
        if(self::isLogged())
        {
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
            }
                
            require "includes/Utils.php";
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            require "models/formulariosinscripciones.php";
            require "models/formulariosinscripciones_pagos.php";
            
            //  Recibimos el formulariosinscripciones.id_equipo_horario y el trimestre
            $equipo     =   filter_input(INPUT_POST,'id_equipo_horario',FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}
            $trimestre  =   filter_input(INPUT_POST,'trimestre',FILTER_SANITIZE_STRING);

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("equipo:      ".$equipo);
//error_log("trimestre:   ".$trimestre);

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA. Se sacan según EQUIPO si se ha especificado 
            $inscripciones_a_incluir_en_xml = formulariosinscripciones::find_cobros_activos_trimestre_utf_8($trimestre,$equipo);

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripcionesTrimestres($inscripciones_a_incluir_en_xml,$trimestre);
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
//error_log(print_r($inscripcionesValidadas,1));
//error_log("\$inscripcionesValidadas['totalSum'] vale ".$inscripcionesValidadas['totalSum']);
//error_log("\$inscripcionesValidadas['cuentasErroneas'] vale: ".$inscripcionesValidadas['cuentasErroneas']);

            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];
            
                                                            $nombre_fichero_descarga='\Domiciliacion Inscripciones Trimestre' . $trimestre.' - '.date("Y_m_d_H_i_s").'.xml';
                                                            $nombre_fichero =   "DomiciliacionTrimestre_".$trimestre."_".date("Y_m_d_H_i_s").".xml";


            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Aquí se agrupan las cantidades de inscripciones si se trata de hermanos 
            foreach($validInscripcionsAccount as $inscripcion) 
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)){
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }

            
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Devolvemos error y cortamos ejecución si no hay inscripciones válidas 
            if(empty($validInscripcionsAccount)) 
            {
                $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'><p class='pt-1'><strong>No hay domiciliaciones pendientes. </strong><button type='button' id='domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button></p></div>";
                echo json_encode(array("response" => "success2", "vista_previa_pagos" => $mensaje));
                die();
            }
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            /******************************************
             * **************************************
                    CREACIÓN DEL LISTADO PREVIO 
             * **************************************
            ******************************************/
            $listado_vista_previa_pagos_a_domiciliar    =   "<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>";
            $fechaActual                                =   Date('Y-m-d H:i:s');

            if($trimestre=="enero"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 2T: <button type='button' id='domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            else if($trimestre=="abril"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 3T: <button type='button' id='domiciliaciones-xml-2019-2020-trimestre3-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            
            $listado_vista_previa_pagos_a_domiciliar.="Número de inscripciones válidas:   ".count($validInscripcionsAccount)."<br>";
            $listado_vista_previa_pagos_a_domiciliar.="Total:                            ".$totalSum."</p><table class='table'><tbody>";
            //$setNombreApellidosPagados               = "(";

            /* Inicio Bucle Usuarios */
            foreach($validInscripcionsAccount as $inscripcion)
            {
                /*$setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                if($inscripcion != end($validInscripcionsAccount)) // end() pone el puntero interno del array en la última posición
                {   $setNombreApellidosPagados .= ",";  }*/

                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                    continue;
                }

                $nombreHermanos             =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);    // array_search devuelve la primera aparición 
                $hermanosAgrupados[$nombreHermanos] = "";
                $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);
                $calcularImporte            =   Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados, $trimestre);

                $listado_vista_previa_pagos_a_domiciliar.="<tr><td>Importe:      ".$calcularImporte."</td>";
                $listado_vista_previa_pagos_a_domiciliar.="<td>".$inscripcion['numero_pedido']."-".$trimestre."</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Nombre Hermanos: ".$nombreHermanos."</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Cuenta: ".$cuentaBancariaCompleta."</td></tr>"; 
            }

            $listado_vista_previa_pagos_a_domiciliar.="</table/></div>";
            //$setNombreApellidosPagados .= ")";
            
            echo json_encode(array(
                "response"              =>  "success",
                "message"               =>  "El Listado de pagos que se domiciliarán se ha cargado con éxito",
                "vista_previa_pagos"    =>  $listado_vista_previa_pagos_a_domiciliar
            ));
        }
    }
    
    
    
    /** GenerarXMLTrimestre20192020 */
    public function actionGenerarXMLTrimestre20192020()
    {
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
            {   $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';    }
            else
            {   $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';   }
                
            require "includes/Utils.php";
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            require "models/formulariosinscripciones.php";
            require "models/formulariosinscripciones_pagos.php";
            
            //  Recibimos el formulariosinscripciones.id_equipo_horario y el trimestre
            $equipo     =   filter_input(INPUT_POST,'id_equipo_horario',FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}
            $trimestre  =   filter_input(INPUT_POST,'trimestre',FILTER_SANITIZE_STRING);

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("equipo:      ".$equipo);
//error_log("trimestre:   ".$trimestre);

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA.
            //  Los saco según EQUIPO si se ha especificado 
            //  Solo si son de tipo="ESCUELA" 
            $inscripciones_a_incluir_en_xml = formulariosinscripciones::find_cobros_activos_trimestre($trimestre,$equipo);

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));

            //  $numRows    = 0;
            //  $totalSum   = 0;
            //  $string_cuentas_erroneas="";
            //  $validInscripcionsAccount   = []; 
            //  $setHermanos                = [];

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripcionesTrimestres($inscripciones_a_incluir_en_xml,$trimestre);
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
//error_log(print_r($inscripcionesValidadas,1));
//error_log("\$inscripcionesValidadas['totalSum'] vale ".$inscripcionesValidadas['totalSum']);
//error_log("\$inscripcionesValidadas['cuentasErroneas'] vale: ".$inscripcionesValidadas['cuentasErroneas']);


            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];
            
            $nombre_fichero_descarga='\Domiciliacion Inscripciones Trimestre' . $trimestre.' - '.date("Y_m_d_H_i_s").'.xml';
            $nombre_fichero =   "DomiciliacionTrimestre_".$trimestre."_".date("Y_m_d_H_i_s").".xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename='.$nombre_fichero);

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Aquí se agrupan las cantidades de inscripciones si se trata de hermanos 
            foreach($validInscripcionsAccount as $inscripcion) 
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)){
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }
            
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log(print_r($validInscripcionsAccount,1));

            //  Devolvemos error y cortamos ejecución si no hay inscripciones válidas 
            if(count($validInscripcionsAccount)<1) 
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes para el equipo seleccionado."));
                die();
            }
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            
            /******************************************
             * **************************************
                        CREACIÓN DEL XML 
             * **************************************
            ******************************************/
//error_log("=============================================================================");
//error_log("CREACIÓN DEL XML ============================================================");
//error_log(__FILE__."/".__FUNCTION__."/".__LINE__);
//error_log("\$cantidadDomiciliaciones vale: ".$cantidadDomiciliaciones);
//error_log(__FILE__."/".__FUNCTION__."/".__LINE__);
//error_log("\$hermanosAgrupados vale: ");
//error_log(print_r($hermanosAgrupados,1));

            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida.$nombre_fichero_descarga);
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
            /* End Header XML */

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
//error_log("===================================================================================");
//error_log("Bucle Usuarios: ");
//error_log(__FILE__."/".__FUNCTION__."/".__LINE__);
//error_log("count(\$validInscripcionsAccount) vale: ".count($validInscripcionsAccount));

            foreach($validInscripcionsAccount as $inscripcion)
            {
//error_log("----------------------------------------------------------------------------------");
//error_log("ITERACION ".$inscripcion['dni_jugador']." - ".$inscripcion['nombre_apellidos']);
//error_log(__FILE__."/".__FUNCTION__."/".__LINE__);

                $setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                if($inscripcion != end($validInscripcionsAccount)) // end() pone el puntero interno del array en la última posición
                {   
                    $setNombreApellidosPagados .= ",";
                }

                //$totalSum               += $inscripcion['trimestre_'.$trimestre];
                $fechaAlta              = $inscripcion['fecha'];
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];
//error_log("----------------------------------------------------------------------------------");
//error_log("\$setNombreApellidosPagados vale: ".$setNombreApellidosPagados); 

                if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                    continue;
                }

                $nombreHermanos             = array_search($cuentaBancariaCompleta, $hermanosAgrupados);    // array_search devuelve la primera aparición 
                $hermanosAgrupados[$nombreHermanos] = "";
                $nombreHermanosSeparados    = explode(' -- ', $nombreHermanos);
                $calcularImporte            = Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados, $trimestre);
                $endToEndId = str_replace([" ", '-', ':'], "", $fechaActual);
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log("\$endToEndId - \$inscripcion['numero_pedido'] vale: ".$endToEndId . "-" . $inscripcion['numero_pedido']);
//error_log("\$inscripcion['numero_pedido'] - \$trimestre vale: ".$inscripcion['numero_pedido']."-".$trimestre);
//error_log("\$nombreHermanos vale: ".$nombreHermanos);
//error_log("\$calcularImporte vale: ".$calcularImporte);
//error_log("\$cuentaBancariaCompleta vale: ".$cuentaBancariaCompleta);
                $myXml->startElement("DrctDbtTxInf");
                $myXml->startElement("PmtId");
                $myXml->startElement("EndToEndId");
                $myXml->text($endToEndId . "-" . $inscripcion['numero_pedido']);
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
                $myXml->text($endToEndId . "-" . $inscripcion['numero_pedido']."-".$trimestre); 
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
                $myXml->text("Fundación 2000 - Trimestre ".$trimestre." - Temporada 2019 - 2020");
                $myXml->endElement();
                $myXml->endElement();
                $myXml->endElement();
                $contador++;
                $MndtId_Unique_Identifier++;
//error_log(__FILE__.__FUNCTION__.__LINE__);        
                //  error_log(__FILE__.__FUNCTION__.__LINE__);
                
                /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente */
                formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_".$trimestre,     date("Y-m-d H:i:s"),            "si");
                formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",                $inscripcion['total_inscripcion']-$inscripcion['pagado_'.$trimestre],     "no");
            }
//error_log(__FILE__.__FUNCTION__.__LINE__);
            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */
            
            $myXml->endElement();
            $myXml->fullEndElement();
            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";
//error_log(__FILE__.__FUNCTION__.__LINE__);
            /*  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            //  $cobros_activos_trimestre=formulariosinscripciones_pagos::findCobrosActivosTrimestre($trimestre);
            //  $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre);
                    
            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas: 
                -   inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores
            */
            if($equipo!=="")
            {   
                $cobros_activos_trimestre           =formulariosinscripciones_pagos::findCobrosActivosTrimestreByIDEquipoHorario($equipo,$trimestre);
                $tabla_cobros_activos_trimestre     =self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre);
                $cobros_activos_trimestre_anteriores=formulariosinscripciones_pagos::findCobrosActivosTrimestreExceptoIDEquipoHorario($equipo,$trimestre);
                $tabla_cobros_activos_trimestre_ant =self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre_anteriores,$trimestre);
            }
            else
            {   
                $cobros_activos_trimestre           =formulariosinscripciones_pagos::findCobrosActivosTrimestre($trimestre);
                $tabla_cobros_activos_trimestre     =self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre);
                $cobros_activos_trimestre_anteriores="";
                $tabla_cobros_activos_trimestre_ant ="";
            }
            
            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "tabla_cobros_activos"              =>  $tabla_cobros_activos_trimestre,
                "tabla_cobros_activos_ant"           =>  $tabla_cobros_activos_trimestre_ant,
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }
    
    
    /** validaCuentasBancariasDeArrayInscripciones() repasa las inscripciones, quita las cuentas incorrectas, agrupa los hermanos. 
        Deja el array listo para recorrerse en la creación del XML
    */
    private static function validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml)
    {
        /*if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
            $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
        }
        else{
            $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
        }*/

        $dir_subida='C:\xml\\';

        require_once "includes/Utils.php";
        
        //  Crea fichero donde se guardarán las cuentas bancarias erroneas 
        $file_cuentas_erroneas  = fopen($dir_subida . '\Cuentas Erroneas Matriculas Inscripciones_'.date("Y_m_d_H_i_s"), "w");
        fwrite($file_cuentas_erroneas, "CUENTAS BANCARIAS ERRONEAS DOMICILIACION MATRICULAS INSCRIPCIONES " . date("Y") . ":\n");

        $numRows    = 0;
        $totalSum   = 0;
        $string_cuentas_erroneas="";
            
        $validInscripcionsAccount   = []; //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
        $setHermanos                = [];

        foreach($inscripciones_a_incluir_en_xml as $inscripcion)
        {
            $cuentaExtraida =   $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

            $cuentaValidada =   Utils::validateEntity($cuentaExtraida);

            //  Si no es correcta la añadimos al log de errores
            if(!$cuentaValidada)
            {
//error_log(__FILE__.__FUNCTION__.__LINE__." VALIDAMOS: ".$cuentaExtraida);
//error_log("Caracteres: ".strlen($cuentaExtraida));
//error_log(__FILE__.__FUNCTION__.__LINE__." ===================> NO ES VÁLIDA: ");
//$extraerDatosTitular = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);
//                $linea_error="NumPedido: ".$inscripcion['numero_pedido']." // ".
//                    "Nombre:      ".$inscripcion['nombre_apellidos']." // ".
//                    "DNI Jugador: ".$inscripcion['dni_jugador']." // ".
//                    "DNI Tutor: ".$inscripcion['dni_tutor']." // ".
//                    "Tfnos: ".$inscripcion['telefono_padre']." - ".$inscripcion['telefono_madre']." // ".
//                    "Email: ".$inscripcion['email'].PHP_EOL;
                
                $linea_error=
                    $inscripcion['numero_pedido'].      ";".
                    $inscripcion['nombre'] . " " .  $inscripcion['apellidos'] .  ";".
                    $inscripcion['dni_jugador'].        ";".
                    $inscripcion['equipo'].      ";".
                    $inscripcion['dni_tutor'].          ";".
                    $inscripcion['nombre_padre'].     ";".
                    $inscripcion['telefono_padre'].     ";".
                    $inscripcion['nombre_madre'].     ";".
                    $inscripcion['telefono_madre'].     ";".
                    $inscripcion['email'].";".
                        $inscripcion['iban'].";".
                        $inscripcion['entidad'].";".
                        $inscripcion['oficina'].";".
                        $inscripcion['dc'].";".
                        $inscripcion['cuenta'].";".
                    $cuentaExtraida.";".
                    strlen($cuentaExtraida).";".
                    PHP_EOL;
                
                fwrite($file_cuentas_erroneas,$linea_error);
                $string_cuentas_erroneas.=$linea_error."<br>";
                continue;
            }
            
            $setHermanos[$inscripcion['nombre'] . " " . $inscripcion['apellidos']] = $cuentaExtraida;
            $validInscripcionsAccount[] = $inscripcion;

            $totalSum += $inscripcion['cantidad']+$inscripcion['aplicar_gastos_devolucion'];
            $numRows++;
        }
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log("count(\$validInscripcionsAccount): ".count($validInscripcionsAccount));            

        return array(
            "numRows"               =>  $numRows,
            "totalSum"              =>  $totalSum,
            "cuentasErroneas"       =>  $string_cuentas_erroneas,
            "inscripcionesValidas"  =>  $validInscripcionsAccount,
            "setHermanos"           =>  $setHermanos
        );
    }
    
    
    /** validaCuentasBancariasDeArrayInscripcionesTrimestres() repasa las inscripciones, quita las cuentas incorrectas, agrupa los hermanos. 
        Deja el array listo para recorrerse en la creación del XML
    */
    private static function validaCuentasBancariasDeArrayInscripcionesTrimestres($inscripciones_a_incluir_en_xml,$trimestre)
    {
        require_once "includes/Utils.php";
        
        if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
            $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
        }
        else{
            $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
        }
            
        //  Crea fichero donde se guardarán las cuentas bancarias erroneas 
        $file_cuentas_erroneas  = fopen($dir_subida. '\Cuentas Erroneas Inscripciones Pago Trimestre '.$trimestre.'_'.date("Y_m_d_H_i_s"), "w");
        fwrite($file_cuentas_erroneas, "CUENTAS BANCARIAS ERRONEAS DOMICILIACION TRIMESTRE ".$trimestre.".".date("Y_m_d_H_i_s") . ":\n");

        $numRows    = 0;
        $totalSum   = 0;
        $string_cuentas_erroneas="";
            
        $validInscripcionsAccount   = []; //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
        $setHermanos                = [];

        foreach($inscripciones_a_incluir_en_xml as $inscripcion)
        {
            $cuentaExtraida =   $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];
            $cuentaValidada =   Utils::validateEntity($cuentaExtraida);

            //  Si no es correcta la añadimos al log de errores
            if(!$cuentaValidada)
            {               
                $linea_error=
                    $inscripcion['numero_pedido'].      ";".
                    $inscripcion['nombre_apellidos'].   ";".
                    $inscripcion['dni_jugador'].        ";".
                    $inscripcion['nombre_equipo'].      ";".
                    $inscripcion['dni_tutor'].          ";".
                    $inscripcion['nombre_padre'].     ";".
                    $inscripcion['telefono_padre'].     ";".
                    $inscripcion['nombre_madre'].     ";".
                    $inscripcion['telefono_madre'].     ";".
                    $inscripcion['email'].";".
                        $inscripcion['iban'].";".
                        $inscripcion['entidad'].";".
                        $inscripcion['oficina'].";".
                        $inscripcion['dc'].";".
                        $inscripcion['cuenta'].";".
                    $cuentaExtraida.";".
                    strlen($cuentaExtraida).";".
                    PHP_EOL;
                
                fwrite($file_cuentas_erroneas,$linea_error);
                $string_cuentas_erroneas.=$linea_error."<br>";
                continue;
            }
            
            $setHermanos[$inscripcion['nombre_apellidos']] = $cuentaExtraida;
            $validInscripcionsAccount[] = $inscripcion;

            $totalSum += $inscripcion['trimestre_'.$trimestre];
            $numRows++;
        }     

        return array(
            "numRows"               =>  $numRows,
            "totalSum"              =>  $totalSum,
            "cuentasErroneas"       =>  $string_cuentas_erroneas,
            "inscripcionesValidas"  =>  $validInscripcionsAccount,
            "setHermanos"           =>  $setHermanos
        );
    }
    
    
    /** generaHTML_Tabla_cobros_activos_matricula() genera los <tr> de la tabla de cobros de matricula 2019 2020 pendientes de confirmar */
    private static function generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula)
    {
        $tr_resultado="";
        
        if(count($cobros_activos_matricula)>0)
        {
            foreach($cobros_activos_matricula as $cobros_activos)
            {
                $tr_resultado.='<tr id="inscripciones-cobro-activo-matricula-2019-2020-'.$cobros_activos['id'].'">
                    <td>'.$cobros_activos['numero_pedido'].'</td>
                    <td>'.$cobros_activos['dni_tutor'].'</td>
                    <td>'.$cobros_activos['nombre_apellidos'].'</td>
                    <td>'.$cobros_activos['nombre_equipo'].'</td>
                    <td>'.$cobros_activos['dni_tutor'].'</td>
                    <td>'.$cobros_activos['email'].'</td>
                    <td>'.$cobros_activos['cobros_activos_matricula'].'</td>
                    <td>'.($cobros_activos['matricula']-$cobros_activos['reserva']).'€</td>
                    <td>'.$cobros_activos['aplicar_gastos_devolucion'].'€</td>
                    <td>
                        <input  type="checkbox" 
                                id="inscripciones-cobro-activo-matricula-2019-2020-checkbox-'.$cobros_activos['id'].'" 
                                class="inscripciones-cobro-activo-matricula-2019-2020-checkbox" value="'.$cobros_activos['id'].'">'.'</td>
                </tr>';
            }
        }
        else{
            $tr_resultado.="<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        
        return $tr_resultado;
    }

    
    /** generaHTML_Tabla_cobros_activos_matricula() genera los <tr> de la tabla de cobros de matricula 2019 2020 pendientes de confirmar */
    private static function generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre)
    {
        $tr_resultado="";
        
        if(count($cobros_activos_trimestre)>0)
        {
            foreach($cobros_activos_trimestre as $cobros_activos)
            {
                $tr_resultado.='<tr id="inscripciones-cobro-activo-trimestre-'.$trimestre.'-2019-2020-'.$cobros_activos['id'].'">
                    <td>'.$cobros_activos['numero_pedido'].'</td>
                    <td>'.$cobros_activos['dni_tutor'].'</td>
                    <td>'.$cobros_activos['nombre_apellidos'].'</td>
                    <td>'.$cobros_activos['nombre_equipo'].'</td>
                    <td>'.$cobros_activos['dni_tutor'].'</td>
                    <td>'.$cobros_activos['email'].'</td>
                    <td>'.$cobros_activos['cobros_activos_'.$trimestre].'</td>
                    <td>'.$cobros_activos['trimestre_'.$trimestre].'€</td>
                    <td>'.$cobros_activos['aplicar_gastos_devolucion'].'€</td>
                    <td>
                        <input  type="checkbox" 
                                id="inscripciones-cobro-activo-trimestre-'.$trimestre.'-2019-2020-checkbox-'.$cobros_activos['id'].'" 
                                class="inscripciones-cobro-activo-trimestre-'.$trimestre.'-2019-2020-checkbox" value="'.$cobros_activos['id'].'">'.
                    '</td>
                </tr>';
            }
        }
        else{
            $tr_resultado.="<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        
        return $tr_resultado;
    }
    
    
    /*Metodo comprobar login*/
    private static function isLogged()
    {
        if( isset($_SESSION['usuario']) ){
            return true;
        }else{
            header('Location: index.php?r=login/loger');
        }
    }

    public function actionGenerarXMLMatriculas20202021()
    {
        error_log(__FILE__.__FUNCTION__.__LINE__);
        error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";

            //  Recibimos el formulariosinscripciones.id_equipo_horario
            $equipo  =   filter_input(INPUT_POST, 'id_equipo', FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}

            /*if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
            }*/

            $dir_subida='C:\xml';


            error_log(__FILE__.__LINE__);
            error_log("equipo: ".$equipo);

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA, según EQUIPO si procede y tipo="ESCUELA"
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_Temporada($equipo);
            error_log($inscripciones_a_incluir_en_xml);

            error_log(__FILE__.__LINE__);
            error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));
            //  $numRows    = 0;
            //  $totalSum   = 0;
            //  $string_cuentas_erroneas="";
            //  $validInscripcionsAccount   = [];
            //  $setHermanos                = [];

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml);

            //error_log(__FILE__.__LINE__);
            //error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
            //error_log(print_r($inscripcionesValidadas,1));

            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $nombre_fichero_descarga='\Domiciliacion Matriculas Inscripciones ' . date("Y_m_d_H_i_s") . '.xml';
            $nombre_fichero =   "DomiciliacionMatriculas.xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml'.$nombre_fichero);

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;


            error_log($validInscripcionsAccount);
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }

            if(empty($validInscripcionsAccount))
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                die();
            }

            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida. $nombre_fichero_descarga);
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
            /* End Header XML */

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
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ((strcmp($inscripcion['seccion'],"ESCUELA")) == 0 && (strcmp($inscripcion['nombre_pago'],"Matricula")) == 0) {
                    $incremental = 1;
                    $setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                    if ($inscripcion != end($validInscripcionsAccount))
                    {
                        $setNombreApellidosPagados .= ",";
                    }

                    $totalSum += $inscripcion['pendiente_matricula'];
                    $fechaAlta = $inscripcion['fecha'];

                    $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                    if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                        continue;
                    }

                    $nombreHermanos             =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                    $hermanosAgrupados[$nombreHermanos] = "";
                    $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);
                    // $calcularImporte            =   Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados)+$inscripcion['aplicar_gastos_devolucion'];

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
                    $myXml->text($inscripcion['cantidad']);
                    $myXml->endElement();
                    $myXml->startElement("DrctDbtTx");

                    $myXml->startElement("MndtRltdInf");

                    $myXml->startElement("MndtId");
                    $myXml->text($contador);
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
                    $myXml->text("Fundación 2000 Matricula Pendiente 2020");
                    $myXml->endElement();
                    $myXml->endElement();

                    $myXml->endElement();
                    $contador++;
                    $MndtId_Unique_Identifier++;
                    /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente
                    formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                    formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",            $inscripcion['total_inscripcion']-$inscripcion['matricula'],     "no");
                    formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "pendiente_matricula",        0,                              "no");*/
                }
            }

            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */

            $myXml->endElement();
            $myXml->fullEndElement();

            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

            /* Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            $cobros_activos_matricula=formulariosinscripciones_pagos::findCobrosActivosMatricula();
            $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);

            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas:
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores
            */
            if($equipo!=="")
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatriculaByIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   formulariosinscripciones_pagos::findCobrosActivosMatriculaExceptoIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula_ant =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula_anteriores);
            }
            else
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   "";
                $tabla_cobros_activos_matricula_ant =   "";
            }

            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "tabla_cobros_activos_matricula"    =>  $tabla_cobros_activos_matricula,
                "tabla_cobros_activos_matricula_ant"=>  $tabla_cobros_activos_matricula_ant,
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }

    /** GenerarXMLTrimestre20202021 vista previa */
    public function actionVistaPreviaGenerarXMLTrimestre20202021()
    {


        if(self::isLogged())
        {
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
            }

            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";

            //  Recibimos el formulariosinscripciones.id_equipo_horario y el trimestre
            $equipo     =   filter_input(INPUT_POST,'id_equipo',FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}
            $trimestre  =   filter_input(INPUT_POST,'trimestre',FILTER_SANITIZE_STRING);
            $totalInscripcionesSeptiembre = 0;


            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA. Se sacan según EQUIPO si se ha especificado
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_Temporada();

            foreach ($inscripciones_a_incluir_en_xml as $inscripcion){
                if ($inscripcion["nombre_pago"] == "Matricula" || $inscripcion["nombre_pago"] == "primer pago"){
                    $totalInscripcionesSeptiembre++;
                }
            }


            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml,$trimestre);

            foreach ($inscripcionesValidadas as $inscripciones){
                if ($inscripcion["nombre_pago"] == "Matricula" || $inscripcion["nombre_pago"] == "primer pago"){
                    $totalInscripcionesSeptiembre++;
                }
            }

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
//error_log(print_r($inscripcionesValidadas,1));
//error_log("\$inscripcionesValidadas['totalSum'] vale ".$inscripcionesValidadas['totalSum']);
//error_log("\$inscripcionesValidadas['cuentasErroneas'] vale: ".$inscripcionesValidadas['cuentasErroneas']);

            $numRows                    =   $totalInscripcionesSeptiembre;
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $nombre_fichero_descarga='\Domiciliacion Inscripciones Trimestre' . $trimestre.' - '.date("Y_m_d_H_i_s").'.xml';
            $nombre_fichero =   "DomiciliacionTrimestre_".$trimestre."_".date("Y_m_d_H_i_s").".xml";


            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Aquí se agrupan las cantidades de inscripciones si se trata de hermanos
            foreach($validInscripcionsAccount as $inscripcion)
            {

                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)){
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }



//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Devolvemos error y cortamos ejecución si no hay inscripciones válidas
            if(empty($validInscripcionsAccount))
            {
                $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'><p class='pt-1'><strong>No hay domiciliaciones pendientes. </strong><button type='button' id='domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button></p></div>";
                echo json_encode(array("response" => "success2", "vista_previa_pagos" => $mensaje));
                die();
            }

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            /******************************************
             * **************************************
            CREACIÓN DEL LISTADO PREVIO
             * **************************************
             ******************************************/
            $listado_vista_previa_pagos_a_domiciliar    =   "<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>";
            $fechaActual                                =   Date('Y-m-d H:i:s');

            if($trimestre=="enero"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 2T: <button type='button' id='domiciliaciones-xml-2020-2021-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            else if($trimestre=="abril"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 3T: <button type='button' id='domiciliaciones-xml-2020-2021-trimestre3-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            else if ($trimestre=="septiembre"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 1T: <button type='button' id='domiciliaciones-xml-2020-2021-matricula-vista-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";

            }
            $inscripcionesBuscadas = $cantidadDomiciliaciones - count($inscripcionesValidadas);


            $listado_vista_previa_pagos_a_domiciliar.="Número de inscripciones válidas:   ".$inscripcionesBuscadas ."<br>";
            $listado_vista_previa_pagos_a_domiciliar.="Total:                            ".$cantidadDomiciliaciones."</p><table class='table'><tbody>";
            //$setNombreApellidosPagados               = "(";

            /* Inicio Bucle Usuarios */
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ($inscripcion["nombre_pago"] == "Matricula" || $inscripcion["nombre_pago"] == "primer pago"){
                    $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                    if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                        continue;
                    }

                    $nombreHermanos             =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);    // array_search devuelve la primera aparición
                    $hermanosAgrupados[$nombreHermanos] = "";
                    $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);

                    $listado_vista_previa_pagos_a_domiciliar.="<tr><td>Importe:      ".$inscripcion["cantidad"]."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>".$trimestre."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>Nº Hermanos: ".$inscripcion["num_hermanos"]."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>Cuenta: ".$cuentaBancariaCompleta."</td></tr>";
                }
                /*$setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                if($inscripcion != end($validInscripcionsAccount)) // end() pone el puntero interno del array en la última posición
                {   $setNombreApellidosPagados .= ",";  }*/


            }

            $listado_vista_previa_pagos_a_domiciliar.="</table/></div>";
            //$setNombreApellidosPagados .= ")";

            echo json_encode(array(
                "response"              =>  "success",
                "message"               =>  "El Listado de pagos que se domiciliarán se ha cargado con éxito",
                "vista_previa_pagos"    =>  $listado_vista_previa_pagos_a_domiciliar
            ));
        }
    }

    public function actionGenerarXMLTrimestre20202021()
    {
        error_log(__FILE__.__FUNCTION__.__LINE__);
        error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";

            //  Recibimos el formulariosinscripciones.id_equipo_horario
            $equipo  =   filter_input(INPUT_POST, 'id_equipo', FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}

            //$dir_subida='C:\xml\\';
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xml\\';
            }


            /*error_log(__FILE__.__LINE__);
            error_log("equipo: ".$equipo);*/

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA, según EQUIPO si procede y tipo="ESCUELA"
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_TemporadaTrimestreUno($equipo);

            /*error_log(__FILE__.__LINE__);
            error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));*/
            //  $numRows    = 0;
            //  $totalSum   = 0;
            //  $string_cuentas_erroneas="";
            //  $validInscripcionsAccount   = [];
            //  $setHermanos                = [];

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml);

            //error_log(__FILE__.__LINE__);
            //error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
            //error_log(print_r($inscripcionesValidadas,1));

            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $nombre_fichero_descarga='\Domiciliacion Matriculas Inscripciones ' . date("Y_m_d_H_i_s") . '.xml';
            $nombre_fichero =   "DomiciliacionMatriculas.xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml'.$nombre_fichero);

            //$hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            //$hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;


            //error_log($validInscripcionsAccount);
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta)) {
                    continue;
                }

               //$nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                //$hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }

            if(empty($validInscripcionsAccount))
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                die();
            }

            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida. $nombre_fichero_descarga);
            $myXml->setIndent(true);
            $myXml->setIndentString("  ");

            $myXml->startDocument('1.0', 'UTF-8', "no");
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
            /* End Header XML */

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
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ($inscripcion["becado"] == 0){
                    if (((strcmp($inscripcion['seccion'],"ESCUELA")) == 0 && (strcmp($inscripcion['nombre_pago'],"Trimestre1")) == 0)) {
                        $incremental = 1;
                        $setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                        if ($inscripcion != end($validInscripcionsAccount))
                        {
                            $setNombreApellidosPagados .= ",";
                        }

                        $totalSum += $inscripcion['pendiente_matricula'];
                        $fechaAlta = $inscripcion['fecha'];

                        $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                        /*if(!in_array($cuentaBancariaCompleta)){
                            continue;
                        }*/

                        //$nombreHermanos             =   array_search($cuentaBancariaCompleta);
                        //$hermanosAgrupados[$nombreHermanos] = "";
                        $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);
                        //$calcularImporte            =   Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados)+$inscripcion['aplicar_gastos_devolucion'];

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

                        /* IMPORTE DEL TRIMESTRE */

                        $myXml->text($inscripcion['cantidad']);
                        $myXml->endElement();
                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($contador);
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
                        $myXml->text($inscripcion['nombre'] . " " . $inscripcion['apellidos']);
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
                        $myXml->text("Fundación 2000 - Trimestre Noviembre - Temporada 2020 - 2021");
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;
                        /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",            $inscripcion['total_inscripcion']-$inscripcion['matricula'],     "no");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "pendiente_matricula",        0,                              "no");*/
                    }
                }

            }

            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */

            $myXml->endElement();
            $myXml->fullEndElement();

            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

            require "models/formulariosinscripciones_pagos.php";

            /* Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            /*$cobros_activos_matricula=formulariosinscripciones_pagos::findCobrosActivosTrimestre();
            $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);

            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas:
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores

            if($equipo!=="")
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatriculaByIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   formulariosinscripciones_pagos::findCobrosActivosMatriculaExceptoIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula_ant =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula_anteriores);
            }
            else
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   "";
                $tabla_cobros_activos_matricula_ant =   "";
            }*/

            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }

    /** GenerarXMLTrimestreDos20202021 vista previa */
    public function actionVistaPreviaGenerarXMLTrimestreDos20202021()
    {


        if(self::isLogged())
        {
            $dir_subida='C:\xml\\';

            /*if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';
            }*/

            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";

            //  Recibimos el formulariosinscripciones.id_equipo_horario y el trimestre
            $equipo     =   filter_input(INPUT_POST,'id_equipo',FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}
            $trimestre  =   filter_input(INPUT_POST,'trimestre',FILTER_SANITIZE_STRING);
            $totalInscripcionesSeptiembre = 0;


            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA. Se sacan según EQUIPO si se ha especificado
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_TemporadaDos();

            foreach ($inscripciones_a_incluir_en_xml as $inscripcion){
                if ($inscripcion["nombre_pago"] == "Trimestre2"){
                    $totalInscripcionesSeptiembre++;
                }
            }


            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml,$trimestre);

            foreach ($inscripcionesValidadas as $inscripciones){
                if ($inscripcion["nombre_pago"] == "Trimestre2"){
                    $totalInscripcionesSeptiembre++;
                }
            }


//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
//error_log(print_r($inscripcionesValidadas,1));
//error_log("\$inscripcionesValidadas['totalSum'] vale ".$inscripcionesValidadas['totalSum']);
//error_log("\$inscripcionesValidadas['cuentasErroneas'] vale: ".$inscripcionesValidadas['cuentasErroneas']);

            $numRows                    =   $totalInscripcionesSeptiembre;
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $nombre_fichero_descarga='\Domiciliacion Inscripciones Trimestre' . $trimestre.' - '.date("Y_m_d_H_i_s").'.xml';
            $nombre_fichero =   "DomiciliacionTrimestre_".$trimestre."_".date("Y_m_d_H_i_s").".xml";


            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Aquí se agrupan las cantidades de inscripciones si se trata de hermanos
            foreach($validInscripcionsAccount as $inscripcion)
            {

                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)){
                    continue;
                }

                $nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }



//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            //  Devolvemos error y cortamos ejecución si no hay inscripciones válidas
            if(empty($validInscripcionsAccount))
            {
                $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'><p class='pt-1'><strong>No hay domiciliaciones pendientes. </strong><button type='button' id='domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button></p></div>";
                echo json_encode(array("response" => "success2", "vista_previa_pagos" => $mensaje));
                die();
            }

//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
            /******************************************
             * **************************************
            CREACIÓN DEL LISTADO PREVIO
             * **************************************
             ******************************************/
            $listado_vista_previa_pagos_a_domiciliar    =   "<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>";
            $fechaActual                                =   Date('Y-m-d H:i:s');

            if($trimestre=="enero"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 2T: <button type='button' id='domiciliaciones-xml-2020-2021-trimestre2-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            else if($trimestre=="abril"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 3T: <button type='button' id='domiciliaciones-xml-2020-2021-trimestre3-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";
            }
            else if ($trimestre=="septiembre"){
                $listado_vista_previa_pagos_a_domiciliar.="<h3>Vista Previa 1T: <button type='button' id='domiciliaciones-xml-2020-2021-matricula-vista-cerrar' class='btn btn-warning'>Cerrar vista previa</button></h3><p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."<br>";

            }
            $inscripcionesBuscadas = $cantidadDomiciliaciones - count($inscripcionesValidadas);


            $listado_vista_previa_pagos_a_domiciliar.="Número de inscripciones válidas:   ".$inscripcionesBuscadas ."<br>";
            $listado_vista_previa_pagos_a_domiciliar.="Total:                            ".$cantidadDomiciliaciones."</p><table class='table'><tbody>";
            //$setNombreApellidosPagados               = "(";

            /* Inicio Bucle Usuarios */
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ($inscripcion["nombre_pago"] == "Trimestre2"){
                    $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                    if(!in_array($cuentaBancariaCompleta,$hermanosAgrupados)){
                        continue;
                    }

                    $nombreHermanos             =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);    // array_search devuelve la primera aparición
                    $hermanosAgrupados[$nombreHermanos] = "";
                    $nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);

                    $listado_vista_previa_pagos_a_domiciliar.="<tr><td>Importe:      ".$inscripcion["cantidad"]."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>".$trimestre."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>Nº Hermanos: ".$inscripcion["num_hermanos"]."</td>";
                    $listado_vista_previa_pagos_a_domiciliar.="<td>Cuenta: ".$cuentaBancariaCompleta."</td></tr>";
                }
                /*$setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                if($inscripcion != end($validInscripcionsAccount)) // end() pone el puntero interno del array en la última posición
                {   $setNombreApellidosPagados .= ",";  }*/


            }

            $listado_vista_previa_pagos_a_domiciliar.="</table/></div>";
            //$setNombreApellidosPagados .= ")";

            echo json_encode(array(
                "response"              =>  "success",
                "message"               =>  "El Listado de pagos que se domiciliarán se ha cargado con éxito",
                "vista_previa_pagos"    =>  $listado_vista_previa_pagos_a_domiciliar
            ));
        }
    }

    public function actionGenerarXMLTrimestreDos20202021()
    {
        error_log(__FILE__.__FUNCTION__.__LINE__);
        error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";

            //  Recibimos el formulariosinscripciones.id_equipo_horario
            $equipo  =   filter_input(INPUT_POST, 'id_equipo', FILTER_SANITIZE_STRING);
            if($equipo=="todos"){$equipo="";}

            //$dir_subida='C:\xml\\';
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xml\\';
            }


            /*error_log(__FILE__.__LINE__);
            error_log("equipo: ".$equipo);*/

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA, según EQUIPO si procede y tipo="ESCUELA"
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_TemporadaTrimestreDos($equipo);

            /*error_log(__FILE__.__LINE__);
            error_log("count de inscripciones_a_incluir_en_xml: ".count($inscripciones_a_incluir_en_xml));*/
            //  $numRows    = 0;
            //  $totalSum   = 0;
            //  $string_cuentas_erroneas="";
            //  $validInscripcionsAccount   = [];
            //  $setHermanos                = [];

            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml);

            //error_log(__FILE__.__LINE__);
            //error_log("count de inscripcionesValidadas: ".count($inscripcionesValidadas));
            //error_log(print_r($inscripcionesValidadas,1));

            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $nombre_fichero_descarga='\Domiciliacion Matriculas Inscripciones ' . date("Y_m_d_H_i_s") . '.xml';
            $nombre_fichero =   "DomiciliacionMatriculas.xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml'.$nombre_fichero);

            //$hermanosAgrupados          = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            //$hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);    //  Esto no sé para qué es
            $cantidadDomiciliaciones    = 0;


            //error_log($validInscripcionsAccount);
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                //  Si no está en el array, avanzamos 1 iteración
                if(!in_array($cuentaBancariaCompleta)) {
                    continue;
                }

                //$nombreHermanos                             = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                //$hermanosAgrupadosCounter[$nombreHermanos]  = "";
                $cantidadDomiciliaciones++;
            }

            if(empty($validInscripcionsAccount))
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                die();
            }

            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida. $nombre_fichero_descarga);
            $myXml->setIndent(true);
            $myXml->setIndentString("  ");

            $myXml->startDocument('1.0', 'UTF-8', "no");
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
            /* End Header XML */

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
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ($inscripcion["becado"] == 0){
                    if (((strcmp($inscripcion['seccion'],"ESCUELA")) == 0 || (strcmp($inscripcion['seccion'],"CANTERA")) == 0) && (strcmp($inscripcion['nombre_pago'],"TRIMESTRE2")) == 0)
                     {
                        $incremental = 1;
                        //$setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                        if ($inscripcion != end($validInscripcionsAccount))
                        {
                            $setNombreApellidosPagados .= ",";
                        }

                        //$totalSum += $inscripcion['pendiente_matricula'];
                        $fechaAlta = $inscripcion['fecha'];

                        $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                        /*if(!in_array($cuentaBancariaCompleta)){
                            continue;
                        }*/

                        //$nombreHermanos             =   array_search($cuentaBancariaCompleta);
                        //$hermanosAgrupados[$nombreHermanos] = "";
                        //$nombreHermanosSeparados    =   explode(' -- ', $nombreHermanos);
                        //$calcularImporte            =   Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados)+$inscripcion['aplicar_gastos_devolucion'];

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

                        /* IMPORTE DEL TRIMESTRE */

                        $myXml->text($inscripcion['cantidad']);
                        $myXml->endElement();
                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($contador);
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
                        $myXml->text($inscripcion['nombre'] . " " . $inscripcion['apellidos']);
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
                        $myXml->text("Fundación 2000 - Trimestre Enero - Temporada 2020 - 2021");
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;
                        /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",            $inscripcion['total_inscripcion']-$inscripcion['matricula'],     "no");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "pendiente_matricula",        0,                              "no");*/
                    }
                }

            }

            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */

            $myXml->endElement();
            $myXml->fullEndElement();

            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

            require "models/formulariosinscripciones_pagos.php";

            /* Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            /*$cobros_activos_matricula=formulariosinscripciones_pagos::findCobrosActivosTrimestre();
            $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);

            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas:
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores

            if($equipo!=="")
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatriculaByIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   formulariosinscripciones_pagos::findCobrosActivosMatriculaExceptoIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula_ant =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula_anteriores);
            }
            else
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   "";
                $tabla_cobros_activos_matricula_ant =   "";
            }*/

            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }

    //xml trimestre3
    public function actionGenerarXMLTrimestreTres20202021()
    {
        error_log(__FILE__.__FUNCTION__.__LINE__);
        error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require "includes/Utils.php";
            require "models/inscripciones_escuela_y_cantera.php";
            require "models/jugadores_pagos.php";

            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com"){
                $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';
            }
            else{
                $dir_subida='C:\xml\\';
            }

            //  Saco los formulariosinscripciones INNER JOIN formulariosinscripciones_pagos de la TEMPORADA, según EQUIPO si procede y tipo="ESCUELA"
            $inscripciones_a_incluir_en_xml = inscripciones_escuela_y_cantera::findInscripciones_TemporadaTrimestreTres();



            //  Eliminamos las inscripciones con cuentas bancarias incorrectas
            $inscripcionesValidadas     =   self::validaCuentasBancariasDeArrayInscripciones($inscripciones_a_incluir_en_xml);


            $numRows                    =   $inscripcionesValidadas['numRows'];
            $totalSum                   =   $inscripcionesValidadas['totalSum'];
            $string_cuentas_erroneas    =   $inscripcionesValidadas['cuentasErroneas'];             //  string de cuentas erroneas a mostrar y devolver
            $validInscripcionsAccount   =   $inscripcionesValidadas['inscripcionesValidas'];    //  Contiene las inscripciones válidas (sin cuentas del banco incorrectas)
            $setHermanos                =   $inscripcionesValidadas['setHermanos'];

            $fecha = date("Y_m_d_H_i_s");
            $nombre_fichero_descarga='Domiciliacion Abril ' . $fecha . '.xml';
            $nombre_fichero =   "DomiciliacionMatriculas.xml";
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=DomiciliacionMatriculas.xml'.$nombre_fichero);

            $cantidadDomiciliaciones    = 0;


            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

                $cantidadDomiciliaciones++;
            }

            if(empty($validInscripcionsAccount))
            {
                echo json_encode(array("response" => "ok2", "message" => "No hay domiciliaciones pendientes"));
                die();
            }

            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            $myXml->openUri($dir_subida. $nombre_fichero_descarga);
            $myXml->setIndent(true);
            $myXml->setIndentString("  ");

            $myXml->startDocument('1.0', 'UTF-8', "no");
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
            /* End Header XML */

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
            $totalXML = 0;

            /* Inicio Bucle Usuarios */
            foreach($validInscripcionsAccount as $inscripcion)
            {
                if ($inscripcion["becado"] == 0 && $inscripcion["confirmacion_pago"] == 0){
                    if (((strcmp($inscripcion['seccion'],"ESCUELA")) == 0 || (strcmp($inscripcion['seccion'],"CANTERA")) == 0) && (strcmp($inscripcion['nombre_pago'],"TRIMESTRE3")) == 0)
                    {
                        $incremental = 1;
                        //$setNombreApellidosPagados .= "'" . $inscripcion['nombre_apellidos'] . "'";
                        if ($inscripcion != end($validInscripcionsAccount))
                        {
                            $setNombreApellidosPagados .= ",";
                        }

                        $fechaAlta = $inscripcion['fecha'];

                        $cuentaBancariaCompleta = $inscripcion['iban'].$inscripcion['entidad'].$inscripcion['oficina'].$inscripcion['dc'].$inscripcion['cuenta'];

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

                        /* IMPORTE DEL TRIMESTRE */

                        $myXml->text($inscripcion['cantidad']);
                        $myXml->endElement();
                        $myXml->startElement("DrctDbtTx");

                        $myXml->startElement("MndtRltdInf");

                        $myXml->startElement("MndtId");
                        $myXml->text($contador);
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
                        $myXml->text($inscripcion['nombre'] . " " . $inscripcion['apellidos']);
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
                        $myXml->text("Fundación 2000 - Trimestre Abril - Temporada 2020 - 2021");
                        $myXml->endElement();
                        $myXml->endElement();

                        $myXml->endElement();
                        $contador++;
                        $MndtId_Unique_Identifier++;
                        $totalXML = $totalXML + $inscripcion["cantidad"];
                        // Una vez añadido al XML, procedemos a actualizar tabla jugadoresPagos
                        jugadores_pagos::updateAttribute($inscripcion["id_pago"], "confirmacion_pago", 1);
                        /*formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "total_pendiente",            $inscripcion['total_inscripcion']-$inscripcion['matricula'],     "no");
                        formulariosinscripciones_pagos::updateAttribute($inscripcion['id'],   "pendiente_matricula",        0,                              "no");*/
                    }
                }

            }

            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            /* Fin Bucle Usuarios */

            $myXml->endElement();
            $myXml->fullEndElement();

            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

            require "models/formulariosinscripciones_pagos.php";

            /* Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla. */
            /*$cobros_activos_matricula=formulariosinscripciones_pagos::findCobrosActivosTrimestre();
            $tabla_cobros_activos_matricula=self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);

            /*  Hecho el proceso, ahora hay que actualizar las 2 tablas:
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar
                -   inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores

            if($equipo!=="")
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatriculaByIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   formulariosinscripciones_pagos::findCobrosActivosMatriculaExceptoIDEquipoHorario($equipo);
                $tabla_cobros_activos_matricula_ant =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula_anteriores);
            }
            else
            {
                $cobros_activos_matricula           =   formulariosinscripciones_pagos::findCobrosActivosMatricula();
                $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
                $cobros_activos_matricula_anteriores=   "";
                $tabla_cobros_activos_matricula_ant =   "";
            }*/

            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "url_nombre_fichero"                =>  $nombre_fichero_descarga
            ));
        }
    }

    public function actionDescargarXml(){
        require "models/jugadores_pagos.php";
        $nombreArchivo = jugadores_pagos::findNombreArchivoTrimestre3();
        echo json_encode(
            array(
                "response" => "success",
                "ruta" => $nombreArchivo
            )
        );
    }

    // generaHTML_Tabla_cobros_activos_trimestre2() genera los <tr> de la tabla de cobros de trimestre1 2010 2021
    private static function generaHTML_Tabla_cobros_activos_trimestre2_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {

                if ($cobro['nombre_pago'] == 'Trimestre1') {
                    //var_dump($cobro['nombre_pago']);
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre2-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['numero_pedido'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td>' . $cobro['cantidad'] . '€</td>
						<td>' . $cobro['aplicar_gastos_devolucion'] . '€</td>
						<td>
							<input  type="checkbox" 
									id="inscripciones-cobro-activo-trimestre-enero-2020-2021-checkbox-' . $cobro['id_jugador'] . '" 
									class="inscripciones-cobro-activo-trimestre2-2020-2021-checkbox" value="' . $cobro['id_jugador'] . '">' . '</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }

}
?>