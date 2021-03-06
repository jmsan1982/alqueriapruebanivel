<?php
class patronatoController 
{
    //  LISTAR LAS INCRIPCIONES ( MENÚ/INSCRIPCIONES/PATRONATO )
    public function actionInscripciones()
    {
        if( self::isLogged() )
        {
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";

            $datos['inscripciones']             =   inscripciones_patronato::findAllInscripcionesConMatricula();
            $datos['numerototalinscripciones']  =   count($datos['inscripciones']);
            $datos['todospagos']                =   inscripciones_patronato_pagos::findAll();
            $datos['pagosagrupadosporfecha']    =   inscripciones_patronato_pagos::findAllGroupedByDate();
            $datos['datosPagos']                =   inscripciones_patronato_pagos::findAllDatosPagos();

            if (!$datos['datosPagos']){
                $datos['datosPagos'] = [];
            }

            // error_log(print_r($datos['pagosagrupadosporfecha'],1));

            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "patronato/layout_inscripciones");
        }    
    }
    
    //  MARCAR LA MATRICULA COMO PAGADA EN PATRONATO DESDE EL BACK
    public function actionModificaPagadoMatriculaPatronato()
    {
        if(isset($_POST['id']))
        {
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";

            $idform = $_POST['id'];
            $pagado = 1;

             //en formulariosinscripciones_patronato_pagos ponemos que la matricula esta pagada , pendiente_matricula=0
            $actualizmatricula = inscripciones_patronato_pagos::ActualizaPagadoMatricula($idform, 0);

            //marcamos el registro como pagado=1 desde el back
            $actualizaestado = inscripciones_patronato::ActualizaPagadoPatronatoBack($idform, $pagado);
        }
        else
        {
            require "error.php";
        }
    }

    // EXPORTAR A PDF las inscripciones de patronato
    public function actionExportToExcelInscripcionesPatronato(){

        require "models/inscripciones_patronato.php";

        $datos['inscripciones'] = inscripciones_patronato::findAllInscripcionesExcelPatronato();


        if (isset($_POST["export_data_inspecciones_patronato"])) {
            $filename = "Inscripciones_Patronato_".date('Ymd') . ".xls";
            header('Content-Encoding: UTF-8');
            header('Content-Type: text/html; charset=utf-16');
            header("Content-Type: application/vnd.ms-excel; charset=utf-16");
            header("Content-Disposition: attachment; filename=".$filename."");
            header('Cache-Control: max-age=0');
            $show_column = false;


            if (!empty($datos['inscripciones'])) {
                foreach ($datos['inscripciones'] as $inscripcion) {
                    if (!$show_column) {
                        // Display field/column names in first row
                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                        $show_column = true;
                    }
                    echo implode("\t", array_values($inscripcion)) . "\r\n";
                }
            }
            exit;
        }
    }

    //Exportar a XLS CONSULTAS / PATRONATO
    public function actionExportToExcelConsultasEscuelaCantera()
    {

        require "models/inscripciones.php";
        $datos["inscripciones_cobros_activos_por_confirmar"] = inscripciones::findInscripcionesPagosIncluidasGenerearXMLPorConfirmarPago($_POST["domiciliaciones_form_xml_trimestre"]);

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
    }

    public function actionImprimirFicha()
    {
        //  Comprobamos que el usuario tiene algún rol de administrador para continuar...
        /*  if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) { */

            require "models/mailers.php";


            $seccioninscripcion = "Ficha inscripción Patronato";


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];


            // Recogemos todos los datos del registro pasándole el "numeropedido" del formulario
            $contenidocorreo = mailers::dameDatosPatronato($numero);

            $contenido = $contenidocorreo['contenido'];


            // Creamos todo el cuerpo de la vista a imprimir en HTML
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
      /*  }
        else {
            require('error.php');
        } */
    }
    
    
    
    /************************************************************
     * PATRONATO: OPERACIONES RELACIONADAS CON LOS XML DE PAGOS:
     * 1. MATRICULAS
     * 2. TRIMESTRES
     ************************************************************/
    /** Carga la VISTA LISTAR CONSULTAS (GENERACION XML) PATRONATO  */
    public function actionOtrasConsultas()
    {
        if( self::isLogged() )
        {
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";

            $datos['inscripciones']             =   inscripciones_patronato::findAllInscripciones();
            $datos['numerototalinscripciones']  =   count($datos['inscripciones']);
            $datos['todospagos']                =   inscripciones_patronato_pagos::findAll();
            $datos['pagosagrupadosporfecha']    =   inscripciones_patronato_pagos::findAllGroupedByDate();
            $datos['datosPagos']                =   inscripciones_patronato_pagos::findAllDatosPagos();
            
            
            //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
            $cobros_activos_matricula           =   inscripciones_patronato::findAllInscripcionesCobrosActivosPagoMatricula();
            $datos['cobros_activos_matricula']  =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
            
            if(!$datos['datosPagos'])
            {
                $datos['datosPagos'] = [];
            }

            // error_log(print_r($datos['pagosagrupadosporfecha'],1));

            $filtrado = "0";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "patronato/layout_otras_consultas");
        }
    }

    /************************************************************
     * PATRONATO: OPERACIONES RELACIONADAS CON LOS XML DE PAGOS:
     * 1. MATRICULAS
     * 2. TRIMESTRES
     ************************************************************/
    /** Carga la VISTA LISTAR CONSULTAS (GENERACION XML) PATRONATO  */
    public function actionOtrasConsultas_20_21()
    {
        if( self::isLogged() )
        {
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";

            $datosTemporadaTres = inscripciones_patronato::findInscripciones_2020_2021_TemporadaTrimestreTres();

            $datosTemporadaTres['cobros_activos_trimestre_3'] = self::generaHTML_Tabla_cobros_activos_trimestre3_20_21($datosTemporadaTres);

            $filtrado = "0";
            vistaSinvista(array('datos' => $datosTemporadaTres, 'filtrado' => $filtrado), "patronato/layout_otras_consultas_20_21");
        }
    }

    // generaHTML_Tabla_cobros_activos_trimestre3()
    private static function generaHTML_Tabla_cobros_activos_trimestre3_20_21($cobros)
    {
        $tr_resultado = "";

        if (count($cobros) > 0) {
            foreach ($cobros as $cobro) {

                if ($cobro['nombre_pago'] == 'TRIMESTRE3') {
                    //var_dump($cobro['nombre_pago']);
                    $tr_resultado .= '<tr id="inscripciones-cobro-activo-trimestre3-2020-2021-' . $cobro['id_jugador'] . '">
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['nombre'] . " " . $cobro['apellidos'] . '</td>
						<td>' . $cobro['equipo'] . '</td>
						<td>' . $cobro['dni_tutor'] . '</td>
						<td>' . $cobro['email'] . '</td>
						<td>' . $cobro['nombre_pago'] . '</td>
						<td class="text-center">' . $cobro['cantidad'] . '€</td>
						<td class="text-center">' . $cobro['aplicar_gastos_devolucion'] . '€</td>
					</tr>';
                }

            }
        } else {
            $tr_resultado .= "<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        return $tr_resultado;
    }
    
    
    /************************************************************
     * PATRONATO. XML. 1. MATRICULAS
     ************************************************************/
    /** OPERACIÓN MATRÍCULAS 1/5. Carga el listado con la VISTA PREVIA del XML MATRICULAS a generar */
    public function actionVistaPreviaGenerarXMLMatricula20192020()
    {
        if(self::isLogged())
        {
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";
            require "includes/Utils.php";
        
            $trimestre  =   Utils::checkTrimestre();
            $anyoActual =   Date('Y');

            $allInscripcionesXML = inscripciones_patronato::findAllInscripcionesPendientesPagoMatricula();

            $numRows            =   0;
            $totalSum           =   0;
            $listado_errores    =   "";
            
            $validInscripcionsAccount   = [];
            $setHermanos                = [];

            foreach($allInscripcionesXML as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);

                if(!$cuentaValidada) 
                {
                    $listado_errores.="<p class='pt-1'>".$inscripcion['dni_titular']." - ".$inscripcion['titular']." - ".$inscripcion['telefono_padre']. " / " . $inscripcion['telefono_madre'] . "</p>";
                    continue;
                }

                $nombreApellidos = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                $totalSum += $inscripcion['pendiente_matricula'];
                $validInscripcionsAccount[] = $inscripcion;

                $numRows++;
            }

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);
            $cantidadDomiciliaciones    = 0;

            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter))
                {
                    continue;
                }

                $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos] = "";
                $cantidadDomiciliaciones++;
            }

            
            /***************************************************************
             * CASO SENCILLO: NO QUEDAN DOMICILIACIONES PENDIENTES VÁLIDAS 
             ***************************************************************/
            if(empty($validInscripcionsAccount)) 
            {               
                if($listado_errores!=="")
                {
                    $mensaje="<div class='col-12 bg-danger' style='border: 1px solid #f7e1b5;'><p class='pt-1'>"
                    . "<strong>No quedan domiciliaciones de matrículas pendientes válidas, pero se han encontrado domiciliaciones incorrectas a revisar</strong>"
                    .   $listado_errores
                    . "<button type='button' id='domiciliaciones-matricula-form-xml-vista-previa-cerrar' class='btn btn-danger'>Cerrar mensaje</button></p></div>";

                    echo json_encode(array(
                        "response"  =>  "error", 
                        "message"   =>  $mensaje
                    ));
                }
                else{
                    $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>"
                    . "<p class='pt-1'><strong>¡Enhorabuena! No hay domiciliaciones pendientes. </strong>"
                    . "<button type='button' id='domiciliaciones-matricula-form-xml-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button>"
                    . "</p>"
                    . "</div>";

                    echo json_encode(array(
                        "response"              =>  "success", 
                        "message"               =>  $mensaje
                    ));
                }
                die();
            }

            
            /******************************************
                    CREACIÓN DEL LISTADO PREVIO 
            *******************************************/
            $listado_vista_previa_pagos_a_domiciliar     =   "<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>";          
            $listado_vista_previa_pagos_a_domiciliar    .=  "<h3>Vista Previa MATRÍCULAS: "
            . "<button type='button' id='domiciliaciones-matricula-form-xml-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button>"
            . "</h3>"
            . "<p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."</p>";
            $listado_vista_previa_pagos_a_domiciliar    .="Número de inscripciones válidas:  ".count($validInscripcionsAccount)."<br>";
            $listado_vista_previa_pagos_a_domiciliar    .="Total:                            ".$totalSum."</p><table class='table'><tbody>";
            
            foreach ($validInscripcionsAccount as $inscripcion) 
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupados))
                {
                    continue;
                }

                $nombreHermanos                     =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                $hermanosAgrupados[$nombreHermanos] =   "";
                $nombreHermanosSeparados            =   explode(' -- ', $nombreHermanos);
                $calcularImporte                    =   Utils::getImporte($validInscripcionsAccount, $nombreHermanosSeparados);

                $listado_vista_previa_pagos_a_domiciliar.="<tr><td>Importe:      ".$calcularImporte."</td>";
                $listado_vista_previa_pagos_a_domiciliar.="<td>".$inscripcion['numero_pedido']." - MATRÍCULA</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Nombre/s: ".$nombreHermanos."</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Cuenta: ".$cuentaBancariaCompleta."</td></tr>"; 
            }
                    
            $listado_vista_previa_pagos_a_domiciliar.="</table/></div>";

            //  error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($listado_vista_previa_pagos_a_domiciliar);
            
            echo json_encode(array(
                "response"              =>  "success",
                "message"               =>  $listado_vista_previa_pagos_a_domiciliar,
                "cuentas_incorrectas"   =>  $listado_errores
            ));
        }
    }
    
    /*  OPERACIÓN MATRÍCULAS 2/5 Genera el XML del pago de la MATRICULA */    
    public function actionGenerarXMLMatricula20192020()
    {
        if(self::isLogged())
        {
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
            {   $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';    }
            else
            {   $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';   }
            
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=Domiciliacion_Matriculas_Patronato.xml');

            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";
            require "includes/Utils.php";

            $trimestre  = Utils::checkTrimestre();
            $anyoActual = Date('Y');
            $file       = fopen($dir_subida. '\Cuentas Erroneas Domiciliacion Matriculas Patronato', "w");
            fwrite($file, "CUENTAS BANCARIAS ERRONEAS MATRICULAS PATRONATO:\n");

            $allInscripcionesXML = inscripciones_patronato::findAllInscripcionesPendientesPagoMatricula();

            $numRows                    =   0;
            $totalSum                   =   0;
            $validInscripcionsAccount   =   [];
            $setHermanos                =   [];
            $cuentas_incorrectas        =   "";
            
            foreach($allInscripcionesXML as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                $cuentaValidada         = Utils::validateEntity($cuentaBancariaCompleta);

                //  Si no es correcta la añadimos al log de errores
                if(!$cuentaValidada)
                {               
                    $cuentas_incorrectas.=$inscripcion['numero_pedido']." - ".$inscripcion['nombre_apellidos'].";".$cuentaBancariaCompleta."(".strlen($cuentaBancariaCompleta).")<br>";
                    continue;
                }
            
                $nombreApellidos = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                $totalSum += $inscripcion['pendiente_matricula'];
                $validInscripcionsAccount[] = $inscripcion;

                $numRows++;
            }

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);
            $cantidadDomiciliaciones = 0;
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                    continue;
                }

                $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos] = "";
                $cantidadDomiciliaciones++;
            }

            
            /***************************************************************
             * CASO SENCILLO: NO QUEDAN DOMICILIACIONES PENDIENTES VÁLIDAS 
             ***************************************************************/
            if(empty($validInscripcionsAccount))
            {
                if($cuentas_incorrectas!=="")
                {
                    $mensaje="<div class='col-12 bg-danger' style='border: 1px solid #f7e1b5;'><p class='pt-1'>"
                    . "<strong>No quedan domiciliaciones de matrículas pendientes válidas, pero se han encontrado domiciliaciones incorrectas a revisar</strong>"
                    .   $cuentas_incorrectas
                    . "<button type='button' id='domiciliaciones-matricula-form-xml-vista-previa-cerrar' class='btn btn-danger'>Cerrar mensaje</button></p></div>";

                    echo json_encode(array(
                        "response"  =>  "error", 
                        "message"   =>  $mensaje
                    ));
                }
                else{
                    $mensaje="<p class='pt-0'><strong>¡Enhorabuena! No hay domiciliaciones pendientes. </strong>"
                    . "<button type='button' id='domiciliaciones-matricula-form-xml-vista-previa-cerrar' class='btn btn-success'>Cerrar mensaje</button>"
                    . "</p>";

                    echo json_encode(array(
                        "response"              =>  "success", 
                        "message"               =>  $mensaje
                    ));
                }
                die();   
            }

            
            $MndtId_Unique_Identifier = 1;
            $contador       = 1;
            $fechaActual    = Date('Y-m-d H:i:s');
            $fechaActualSH  = Date('Y-m-d');

            $myXml = new XMLWriter();

            $myXml->openUri($dir_subida. '\Domiciliacion Matriculas Patronato ' . $anyoActual . '.xml');
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
            foreach ($validInscripcionsAccount as $inscripcion) 
            {                
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
                
        //error_log(__FILE__.__FUNCTION__."___".__LINE__);
        //error_log("Vamos a actualizar. idpago=".$inscripcion['idpago'].". cobros_activos_matricula: ".date("Y-m-d H:i:s")." . pendiente_matricula: 0");
        
                /* Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente */
                inscripciones_patronato_pagos::updateAttribute($inscripcion['idpago'],   "cobros_activos_matricula",   date("Y-m-d H:i:s"),            "si");
                inscripciones_patronato_pagos::updateAttribute($inscripcion['idpago'],   "pendiente_matricula",        0,                              "no");
            }
            
            
            $setNombreApellidosPagados .= ")";
            $myXml->endElement();

            /*  Fin Bucle Usuarios */
            $myXml->endElement();
            $myXml->fullEndElement();
            $fechaPago = "'" . Date('Y-m-d H:i:s') . "'";

                  
            //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
            $cobros_activos_matricula           =   inscripciones_patronato::findAllInscripcionesCobrosActivosPagoMatricula();
            $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
            
            
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log($tabla_cobros_activos_matricula);

            
            echo json_encode(array(
                "response"              =>  "ok",
                "message"               =>  "Fichero Generado con Éxito.",
                "messageDownload"       =>  "Haga Click aquí para Descargar.",
                "cuentas_incorrectas"   =>  $cuentas_incorrectas,
                "trimestre"             =>  $trimestre[1],
                "anyo_actual"           =>  $anyoActual,
                "tabla_cobros_activos_matricula"  =>  $tabla_cobros_activos_matricula
            ));
        }
    }
    
    /** OPERACIÓN MATRÍCULAS 3/5 generaHTML_Tabla_cobros_activos_matricula() genera los <tr> de la tabla de cobros de matricula 2019 2020 pendientes de confirmar */
    private static function generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula)
    {
        $tr_resultado="";
        
        if(count($cobros_activos_matricula)>0)
        {
            foreach($cobros_activos_matricula as $cobros_activos)
            {
                //error_log(__FILE__.__FUNCTION__.__LINE__);
                //error_log(print_r($cobros_activos,1));
                
                $tr_resultado.='<tr id="inscripciones-cobro-activo-matricula-2019-2020-'.$cobros_activos['idpago'].'">
                    <td>'.$cobros_activos['numero_pedido'].'</td>
                    <td>'.$cobros_activos['dni_titular'].'</td>
                    <td>'.$cobros_activos['nombre']." ".$cobros_activos['apellidos'].'</td>
                    <td>'.$cobros_activos['modalidad'].'</td>
                    <td>'.$cobros_activos['dni_titular'].'</td>
                    <td>'.$cobros_activos['email'].'</td>
                    <td>'.$cobros_activos['cobros_activos_matricula'].'</td>
                    <td>'.($cobros_activos['matricula']).'€</td>
                    <td>
                        <input  type    =   "checkbox" 
                                id      =   "inscripciones-cobro-activo-matricula-2019-2020-checkbox-'.$cobros_activos['idpago'].'" 
                                class   =   "inscripciones-cobro-activo-matricula-2019-2020-checkbox" value="'.$cobros_activos['idpago'].'">
                    </td>
                </tr>';
            }
        }
        else{
            $tr_resultado.="<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        
        return $tr_resultado;
    }
    
    /*  OPERACIÓN MATRÍCULAS 4/5 actionConfirmarPagosXMLMatricula() permite confirmar pagos emitidos mediante XML al banco */
    public static function actionConfirmarPagosXMLMatricula()
    {
        require         "models/inscripciones_patronato.php";
        require         "models/inscripciones_patronato_pagos.php";
        
        if(isset($_POST['selected_id_fip']))
        {   $array_id_fip   =   $_POST['selected_id_fip'];}
        else
        {
            echo json_encode(array(
                "response"  => "error",
                "message"   => "No se ha seleccionado ningún cargo"
            ));
            die;
        }
        
        $fecha = date("Y-m-d H:i:s");

        foreach($array_id_fip as $id_fip){
            inscripciones_patronato_pagos::actualizarCobrosActivosMatriculaTrasConfirmarPagoXML($id_fip,$fecha);
        }

        //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
        $cobros_activos_matricula           =   inscripciones_patronato::findAllInscripcionesCobrosActivosPagoMatricula();
        $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
        
        echo json_encode(array(
            "response"                          => "success",
            "message"                           => "Los cargos seleccionados se han confirmado.",
            "tabla_cobros_activos_matricula"    =>  $tabla_cobros_activos_matricula
        ));
    }
                 
    /* OPERACIÓN MATRÍCULAS 5/5 actionAnularPagosXMLMatricula() permite anular pagos emitidos mediante XML al banco */
    public static function actionAnularPagosXMLMatricula()
    {
        require         "models/inscripciones_patronato.php";
        require         "models/inscripciones_patronato_pagos.php";
        
        if(isset($_POST['selected_id_fip']))
        {   $array_id_fip   =   $_POST['selected_id_fip'];}
        else
        {
            echo json_encode(array(
                "response"  => "error",
                "message"   => "No se ha seleccionado ningún cargo"
            ));
            die;
        }
       
        foreach($array_id_fip as $id_fip){
            inscripciones_patronato_pagos::actualizarCobrosActivosMatriculaTrasAnularPagoXML($id_fip);
        }
                
        //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
        $cobros_activos_matricula           =   inscripciones_patronato::findAllInscripcionesCobrosActivosPagoMatricula();
        $tabla_cobros_activos_matricula     =   self::generaHTML_Tabla_cobros_activos_matricula($cobros_activos_matricula);
            
        echo json_encode(array(
            "response"                          => "success",
            "message"                           => "Los cargos seleccionados se han anulado. Volverán a incluirse en el próximo XML.",
            "tabla_cobros_activos_matricula"    =>  $tabla_cobros_activos_matricula
        ));
    }
    
    
    /************************************************************
    * PATRONATO. XML. 2. TRIMESTRES
    ************************************************************/
    /* OPERACIÓN TRIMESTRE 1/5. Al seleccionar el TRIMESTRE, se carga el listado de cobros activos del trimestre */
    public function actionCargarCobrosActivosTrimestrePorConfirmar()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));
        
        require "models/inscripciones_patronato.php";
        require "models/inscripciones_patronato_pagos.php";
                
        $trimestre  =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
            
        //  Comprobación TRIMESTRE
        if(!isset($_POST['trimestre']) || $_POST['trimestre']=="")
        {   
            echo json_encode(array(
                "response"  => "error",
                "message"   => "No se ha seleccionado ningún trimestre"
            ));
            die;
        }
        
        //  Extraemos cobros activos del trimestre
        $inscripciones_cobros_activos_por_confirmar     =   inscripciones_patronato::findInscripcionesConCobrosActivosPagoTrimestre($trimestre);
        $contenido_tabla_inscripciones_cobros_confirmar =   self::generaHTML_Tabla_cobros_activos_trimestre($inscripciones_cobros_activos_por_confirmar, $trimestre);
        
        echo json_encode(array(
            "response"                  => "success",
            "message"                   => "Se ha cargado el listado de pagos incluidos en el XML por confirmar pago",
            "contenido_tabla"           => $contenido_tabla_inscripciones_cobros_confirmar
        ));
    }
    
    /* OPERACIÓN TRIMESTRE 2/5. Carga el listado con la VISTA PREVIA del XML del TRIMESTRE SELECCIONADO a generar */
    public function actionVistaPreviaGenerarXMLTrimestre20192020()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            $trimestre  =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
            
            //  Comprobación TRIMESTRE
            if(!isset($_POST['trimestre']) || $_POST['trimestre']=="")
            {   
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "No se ha seleccionado ningún trimestre"
                ));
                die;
            }
        
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";
            require "includes/Utils.php";
        
            $allInscripcionesXML = inscripciones_patronato::findAllInscripcionesPendientesPagoTrimestre($trimestre);
            
            //  Preparamos variables relacionadas con TRIMESTRE
            switch($trimestre)
            {
                case 'enero':     
                {   
                    $trimestre=array("trimestre_enero",    "Enero",    "pagado_enero","enero");    
                    $anyoActual='2020';     
                    $cobros_activos_string="cobros_activos_enero";
                    break;
                }
                case 'abril':    
                {
                    $trimestre=array("trimestre_abril",    "Abril",    "pagado_abril","abril");    
                    $anyoActual='2020';    
                    $cobros_activos_string="cobros_activos_abril";
                    break;
                }
                case 'noviembre': 
                {
                    $trimestre=array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
                    $anyoActual='2019';     
                    $cobros_activos_string="cobros_activos_noviembre";
                    break;
                }
            }
            
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));
    
            $anyoActual =   Date('Y');

            //  $allInscripcionesXML = inscripciones_patronato::findAllInscripcionesPendientesPagoTrimestre($trimestre[0]);

            $numRows            =   0;
            $totalSum           =   0;
            $listado_errores    =   "";
            
            $validInscripcionsAccount   = [];
            $setHermanos                = [];

            foreach($allInscripcionesXML as $inscripcion)
            {                
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                $cuentaValidada = Utils::validateEntity($cuentaBancariaCompleta);

                if(!$cuentaValidada) 
                {
                    $listado_errores.="<p class='pt-1'>".$inscripcion['dni_titular']." - ".$inscripcion['titular']." - ".$inscripcion['telefono_padre']. " / " . $inscripcion['telefono_madre'] . "</p>";
                    continue;
                }

                $nombreApellidos = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

                $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];

    
                $totalSum += $inscripcion[$trimestre[0]];
                $validInscripcionsAccount[] = $inscripcion;

                $numRows++;
            }

            $hermanosAgrupados          = Utils::checkearHermanos($setHermanos);
            $hermanosAgrupadosCounter   = Utils::checkearHermanos($setHermanos);
            $cantidadDomiciliaciones    = 0;

            foreach($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter))
                {
                    continue;
                }

                $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos] = "";
                $cantidadDomiciliaciones++;
            }

            
            /***************************************************************
             * CASO SENCILLO: NO QUEDAN DOMICILIACIONES PENDIENTES VÁLIDAS 
             ***************************************************************/
            if(empty($validInscripcionsAccount)) 
            {               
                if($listado_errores!=="")
                {
                    $mensaje="<div class='col-12 bg-danger' style='border: 1px solid #f7e1b5;'><p class='pt-1'>"
                    . "<strong>No quedan domiciliaciones del trimestre pendientes y válidas, pero se han encontrado domiciliaciones incorrectas a revisar</strong>"
                    .   $listado_errores
                    . "<button type='button' id='domiciliaciones-trimestre-form-xml-vista-previa-cerrar' class='btn btn-danger'>Cerrar mensaje</button></p></div>";

                    echo json_encode(array(
                        "response"  =>  "error", 
                        "message"   =>  $mensaje
                    ));
                }
                else{
                    $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>"
                        . "<p class='pt-1'><strong>¡Enhorabuena! No hay domiciliaciones pendientes. </strong>"
                        . "<button type='button' id='domiciliaciones-trimestre-form-xml-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button>"
                        . "</p>"
                    . "</div>";

                    echo json_encode(array(
                        "response"              =>  "success", 
                        "message"               =>  $mensaje
                    ));
                }
                die();
            }

            
            /******************************************
                    CREACIÓN DEL LISTADO PREVIO 
            *******************************************/
            $listado_vista_previa_pagos_a_domiciliar     =   "<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>";          
            $listado_vista_previa_pagos_a_domiciliar    .=  "<h3>Vista Previa TRIMESTRE: ".$trimestre[1]
            . "<button type='button' id='domiciliaciones-trimestre-form-xml-vista-previa-cerrar' class='btn btn-warning'>Cerrar vista previa</button>"
            . "</h3>"
            . "<p><strong>Número de domiciliaciones: ".$cantidadDomiciliaciones."</p>";
            $listado_vista_previa_pagos_a_domiciliar    .="Número de inscripciones válidas:  ".count($validInscripcionsAccount)."<br>";
            $listado_vista_previa_pagos_a_domiciliar    .="Total:                            ".$totalSum."</p><table class='table'><tbody>";
            
            foreach ($validInscripcionsAccount as $inscripcion) 
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if(!in_array($cuentaBancariaCompleta, $hermanosAgrupados))
                {
                    continue;
                }

                $nombreHermanos                     =   array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                $hermanosAgrupados[$nombreHermanos] =   "";
                $nombreHermanosSeparados            =   explode(' -- ', $nombreHermanos);
                $calcularImporte                    =   Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados, strtolower($trimestre[1]));

                $listado_vista_previa_pagos_a_domiciliar.="<tr><td>Importe:      ".$calcularImporte."</td>";
                $listado_vista_previa_pagos_a_domiciliar.="<td>".$inscripcion['numero_pedido']." - ".$trimestre[1]."</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Nombre/s: ".$nombreHermanos."</td>"; 
                $listado_vista_previa_pagos_a_domiciliar.="<td>Cuenta: ".$cuentaBancariaCompleta."</td></tr>"; 
            }
                    
            $listado_vista_previa_pagos_a_domiciliar.="</table/></div>";

            //  error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($listado_errores);
            
            echo json_encode(array(
                "response"              =>  "success",
                "message"               =>  $listado_vista_previa_pagos_a_domiciliar,
                "cuentas_incorrectas"   =>  $listado_errores
            ));
        }
    }
    
    /* OPERACIÓN TRIMESTRE 3/5 GENERA XML TRIMESTRE SELECCIONADO */
    public function actionGenerarXMLTrimestre20192020()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));
        if(self::isLogged())
        {
            $trimestre  =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);
            
            //  Comprobación TRIMESTRE
            if(!isset($_POST['trimestre']) || $_POST['trimestre']=="")
            {   
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "No se ha seleccionado ningún trimestre"
                ));
                die;
            }
            
            //  Preparamos variables relacionadas con TRIMESTRE
            switch($trimestre)
            {
                case 'enero':     
                {   
                    $trimestre=array("trimestre_enero",    "Enero",    "pagado_enero","enero");    
                    $anyoActual='2020';     
                    $cobros_activos_string="cobros_activos_enero";
                    break;
                }
                case 'abril':    
                {
                    $trimestre=array("trimestre_abril",    "Abril",    "pagado_abril","abril");    
                    $anyoActual='2020';    
                    $cobros_activos_string="cobros_activos_abril";
                    break;
                }
                case 'noviembre': 
                {
                    $trimestre=array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
                    $anyoActual='2019';     
                    $cobros_activos_string="cobros_activos_noviembre";
                    break;
                }
            }
            
            
            //  Preparamos DIRECTORIO para guardar XML 
            if($_SERVER['SERVER_NAME']=="servicios.alqueriadelbasket.com")
            {   $dir_subida='C:\inetpub\wwwroot\alqueriaforms\public\\';    }
            else
            {   $dir_subida='C:\xampp\htdocs\serviciosalqueria\public\\';   }
            
            
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";
            require "includes/Utils.php";
            
            
            header('Content-type: text/xml');
            header('Content-Disposition: attachment; filename=Domiciliacion_Trimestral_Patronato.xml');

            
            $allInscripcionesXML = inscripciones_patronato::findAllInscripcionesPendientesPagoTrimestre($trimestre[3]);
            
            $numRows                    =   0;
            $totalSum                   =   0;
            $validInscripcionsAccount   =   [];
            $setHermanos                =   [];
            $listado_errores            =   "";

            //  Averiguamos si hay cuentas incorrectas y calculamos suma total
            foreach ($allInscripcionesXML as $inscripcion) 
            {
                $cuentaBancariaCompleta     =   $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];
                $cuentaValidada             =   Utils::validateEntity($cuentaBancariaCompleta);

                if(!$cuentaValidada){
                    $listado_errores.="<p class='pt-1'>".$inscripcion['dni_titular']." - ".$inscripcion['titular']." - ".$inscripcion['telefono_padre']. " / " . $inscripcion['telefono_madre'] . "</p>";
                    continue;
                }

                $nombreApellidos = $inscripcion['nombre_apellidos'] = $inscripcion['nombre'] . " " . $inscripcion['apellidos'];
                $setHermanos[$nombreApellidos] = $cuentaBancariaCompleta;

                $totalSum += $inscripcion[$trimestre[0]];   // Información. trimestre vale: => array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
                $validInscripcionsAccount[] = $inscripcion;

                $numRows++;
            }

            $hermanosAgrupados          =   Utils::checkearHermanos($setHermanos);
            $hermanosAgrupadosCounter   =   Utils::checkearHermanos($setHermanos);
            $cantidadDomiciliaciones    =   0;

            
            /***************************************************************
             * CASO SENCILLO: NO QUEDAN DOMICILIACIONES PENDIENTES VÁLIDAS 
             ***************************************************************/
            if(count($validInscripcionsAccount)<1) 
            {               
                if($listado_errores!=="")
                {
                    $mensaje="<div class='col-12 bg-danger' style='border: 1px solid #f7e1b5;'><p class='pt-1'>"
                    . "<strong>No quedan domiciliaciones del trimestre pendientes y válidas, pero se han encontrado domiciliaciones incorrectas a revisar</strong>"
                    .   $listado_errores
                    . "<button type='button' id='domiciliaciones-trimestre-form-xml-vista-previa-cerrar' class='btn btn-danger'>Cerrar mensaje</button></p></div>";

                    echo json_encode(array(
                        "response"  =>  "error", 
                        "message"   =>  $mensaje
                    ));
                }
                else{
                    $mensaje="<div class='col-12 bg-warning' style='border: 1px solid #f7e1b5;'>"
                        . "<p class='pt-1'><strong>¡Enhorabuena! No hay domiciliaciones pendientes. </strong>"
                        . "<button type='button' id='domiciliaciones-trimestre-form-xml-vista-previa-cerrar' class='btn btn-warning'>Cerrar mensaje</button>"
                        . "</p>"
                    . "</div>";

                    echo json_encode(array(
                        "response"              =>  "success", 
                        "message"               =>  $mensaje
                    ));
                }
                die();
            }
            
            
            /******************************************
                CREACIÓN DEL XML 
            *******************************************/
            foreach ($validInscripcionsAccount as $inscripcion)
            {
                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if (!in_array($cuentaBancariaCompleta, $hermanosAgrupadosCounter)) {
                    continue;
                }

                $nombreHermanos = array_search($cuentaBancariaCompleta, $hermanosAgrupadosCounter);
                $hermanosAgrupadosCounter[$nombreHermanos] = "";
                $cantidadDomiciliaciones++;
            }

            
            $MndtId_Unique_Identifier   = 1;
            $contador                   = 1;
            $fechaActual                = Date('Y-m-d H:i:s');
            $fechaActualSH              = Date('Y-m-d');

            $myXml = new XMLWriter();
            
            $myXml->openUri($dir_subida.'\Domiciliacion Trimestral Patronato ' . $trimestre[1] . " " . $anyoActual . ".xml");   //  // Información. trimestre vale: => array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
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

                    
            /**************************
             *    BUCLE USUARIOS     
             **************************/
            foreach($validInscripcionsAccount as $inscripcion)
            {
                $setNombreApellidosPagados .= '"' . $inscripcion["nombre"] . " " . $inscripcion["apellidos"] . '"';
                if ($inscripcion != end($validInscripcionsAccount))
                {
                    $setNombreApellidosPagados .= ",";
                }

                $totalSum += $inscripcion[$trimestre[0]];           // Información. trimestre vale: => array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
                $fechaAlta = $inscripcion['fecha_inscripcion'];

                $cuentaBancariaCompleta = $inscripcion['iban'] . $inscripcion['entidad'] . $inscripcion['oficina'] . $inscripcion['dc'] . $inscripcion['cuenta'];

                if (!in_array($cuentaBancariaCompleta, $hermanosAgrupados)) {
                    continue;
                }

                $nombreHermanos                     = array_search($cuentaBancariaCompleta, $hermanosAgrupados);
                $hermanosAgrupados[$nombreHermanos] = "";
                $nombreHermanosSeparados            = explode(' -- ', $nombreHermanos);
                $calcularImporte                    = Utils::getImporteTrimestre($validInscripcionsAccount, $nombreHermanosSeparados,$trimestre[3]);        // Información. trimestre vale: => array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");

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
                $myXml->text("Fundación 2000 Pago Trimestre " . $trimestre[1] . " " . $anyoActual);     // Información. trimestre vale: => array("trimestre_noviembre","Noviembre","pagado_noviembre","noviembre");
                $myXml->endElement();
                $myXml->endElement();

                $myXml->endElement();
                $contador++;
                $MndtId_Unique_Identifier++;


                error_log("Vamos a actualizar. idpago=".$inscripcion['idpago'].". cobros_activos_".$trimestre[3].": ".date("Y-m-d H:i:s"));
                
                /*  Una vez añadido al XML, procedemos a actualizar el formulariosinscripciones_pagos correspondiente */
                inscripciones_patronato_pagos::updateAttribute($inscripcion['idpago'],   "cobros_activos_".$trimestre[3],     date("Y-m-d H:i:s"), "si");
            }

            
            $setNombreApellidosPagados .= ")";
            $myXml->endElement();
            
            
            /* Fin Bucle Usuarios */
            $myXml->endElement();
            $myXml->fullEndElement();

            
            //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
            $cobros_activos_trimestre       =   inscripciones_patronato::findInscripcionesConCobrosActivosPagoTrimestre($trimestre[3]);
            $tabla_cobros_activos_trimestre =   self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre[3]);
            
            
            echo json_encode(array(
                "response"                          =>  "ok",
                "message"                           =>  "Fichero Generado con Éxito.",
                "messageDownload"                   =>  "Haga Click aquí para Descargar.",
                "cuentas_incorrectas"               =>  $listado_errores,
                "trimestre"                         =>  $trimestre[1],
                "anyo_actual"                       =>  $anyoActual,
                "tabla_cobros_activos_trimestre"    =>  $tabla_cobros_activos_trimestre
            ));
        }
    }
    
    /** generaHTML_Tabla_cobros_activos_trimestre() genera los <tr> de la tabla de cobros de matricula 2019 2020 pendientes de confirmar */
    private static function generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre)
    {
        $trs_resultado="";
        
        if(count($cobros_activos_trimestre)>0)
        {
            foreach($cobros_activos_trimestre as $cobros_activos)
            {
                $trs_resultado.='<tr id="inscripciones-cobro-activo-trimestre-2019-2020-'.$trimestre.'-'.$cobros_activos['idpago'].'">
                    <td>'.$cobros_activos['numero_pedido'].'</td>
                    <td>'.$cobros_activos['dni_titular'].'</td>
                    <td>'.$cobros_activos['nombre']." ".$cobros_activos['apellidos'].'</td>
                    <td>'.$cobros_activos['modalidad'].'</td>
                    <td>'.$cobros_activos['email'].'</td>
                    <td>'.$cobros_activos['cobros_activos_'.$trimestre].'</td>
                    <td>'.$cobros_activos['trimestre_'.$trimestre].'</td>
                    <td>
                        <input  type    =   "checkbox" 
                                id      =   "inscripciones-cobro-activo-trimestre-2019-2020-checkbox-'.$cobros_activos['idpago'].'" 
                                class   =   "inscripciones-cobro-activo-trimestre-2019-2020-checkbox" value="'.$cobros_activos['idpago'].'">
                    </td>
                </tr>';
            }
        }
        else
        {
            $trs_resultado.="<tr><td colspan='10'>No hay cobros activos</td></tr>";
        }
        
        return $trs_resultado;
    }
    
    /*  OPERACIÓN TRIMESTRE 4/5 actionConfirmarPagosXMLTrimestre() permite confirmar pagos emitidos mediante XML al banco */
    public static function actionConfirmarPagosXMLTrimestre()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require         "models/inscripciones_patronato.php";
            require         "models/inscripciones_patronato_pagos.php";

            $trimestre      =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);

            if(isset($_POST['selected_id_fip']))
            {   $array_id_fip   =   $_POST['selected_id_fip'];}
            else
            {
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "No se ha seleccionado ningún cargo"
                ));
                die;
            }

            $fecha = date("Y-m-d H:i:s");

            foreach($array_id_fip as $id_fip){
                inscripciones_patronato_pagos::actualizarCobrosActivosTrimestreTrasConfirmarPagoXML($id_fip,$fecha,$trimestre);
            }

            //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
            $cobros_activos_trimestre       =   inscripciones_patronato::findInscripcionesConCobrosActivosPagoTrimestre($trimestre);
            $tabla_cobros_activos_trimestre =   self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre);

            echo json_encode(array(
                "response"                          =>  "success",
                "message"                           =>  "Los cargos seleccionados se han confirmado.",
                "tabla_cobros_activos_trimestre"    =>  $tabla_cobros_activos_trimestre
            ));
        }
    }
    
    /* OPERACIÓN TRIMESTRE 5/5 actionAnularPagosXMLTrimestre() permite anular pagos emitidos mediante XML al banco */
    public static function actionAnularPagosXMLTrimestre()
    {
error_log(__FILE__.__FUNCTION__.__LINE__);
error_log(print_r($_POST,1));

        if(self::isLogged())
        {
            require         "models/inscripciones_patronato.php";
            require         "models/inscripciones_patronato_pagos.php";

            $trimestre      =   filter_input(INPUT_POST, 'trimestre', FILTER_SANITIZE_STRING);

            if(isset($_POST['selected_id_fip']))
            {   $array_id_fip   =   $_POST['selected_id_fip'];}
            else
            {
                echo json_encode(array(
                    "response"  => "error",
                    "message"   => "No se ha seleccionado ningún cargo"
                ));
                die;
            }

            $fecha = date("Y-m-d H:i:s");

            foreach($array_id_fip as $id_fip){
                inscripciones_patronato_pagos::actualizarCobrosActivosTrimestreTrasAnularPagoXML($id_fip,$trimestre);
            }

            //  Hecho el proceso, hay que actualizar la tabla de cobros_activos_matricula y mostrárla en la interfaz */
            $cobros_activos_trimestre       =   inscripciones_patronato::findInscripcionesConCobrosActivosPagoTrimestre($trimestre);
            $tabla_cobros_activos_trimestre =   self::generaHTML_Tabla_cobros_activos_trimestre($cobros_activos_trimestre,$trimestre);

            echo json_encode(array(
                "response"                          =>  "success",
                "message"                           =>  "Los cargos seleccionados se han anulado y volverán a incluirse en próximos XML.",
                "tabla_cobros_activos_trimestre"    =>  $tabla_cobros_activos_trimestre
            ));
        }
    }
    
    
    /*****************************
     * Metodo comprobar login
     *****************************/
    private static function isLogged(){
        if( isset($_SESSION['usuario']) ){
            return true;
        }else{
            header('Location: index.php?r=login/loger');
        }
    } 
}
?>