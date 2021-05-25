<html> 
    <body> 
        
    <?php
        /********************************
            REGRESO TPV LIGA ALQUERIA
        *********************************/
        
        //  error_log(__FILE__.__LINE__);
        //  error_log(getcwd());
        
        require "apiRedsys.php";
        //error_log(__FILE__.__LINE__);
        require_once "./../db.php";
        //error_log(__FILE__.__LINE__);
        require "../PHPMailer/envios_emails.php";
        //error_log(__FILE__.__LINE__);
        require_once '../models/formularios_liga_alqueria.php';
        require_once '../models/formularios_liga_alqueria_pagos.php';
        require_once '../models/formularios_liga_alqueria_jugadores.php';
        //error_log(__FILE__.__LINE__);
        
        // Se crea Objeto
        $miObj = new RedsysAPI;
        
        //error_log(__FILE__.__LINE__);
        
        if(!empty( $_POST ) )
        {
            //error_log(__FILE__.__LINE__);
             
            //URL DE RESP. ONLINE
            $version            = $_POST["Ds_SignatureVersion"];
            $datos              = $_POST["Ds_MerchantParameters"];
            $signatureRecibida  = $_POST["Ds_Signature"];

            $decodec        = $miObj->decodeMerchantParameters($datos);
            //  $kc         = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';                   //    de pruebas
            $kc             = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';                   //    Clave recuperada de CANALES
            $firma          = $miObj->createMerchantSignatureNotif($kc,$datos); 

            //  nuevo
            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            //  $codigoRespuesta=intval($codigoRespuesta);
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            $dos_char = substr($codigoRespuesta, 0, 2);

            //  error_log(__FILE__.__LINE__);
            //  error_log($codigo_venta_recibido);
            //  error_log($firma);
            //  error_log($signatureRecibida);
    
            if($firma === $signatureRecibida)
            {
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                $pago=formularios_liga_alqueria_pagos::findBynumero_pedido($codigo_venta_recibido);
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'fecha_confirmacion_pago',    date("Y-m-d H:i:s"),    "si");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'Ds_Response',                $codigoRespuesta,       "si");
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003"     || $codigoRespuesta=="0004"     ||
                    $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || $codigoRespuesta=="0008"    || $codigoRespuesta=="0009"     || 
                    $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || $codigoRespuesta=="0012" || $codigoRespuesta=="0013"    || 
                    $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || $codigoRespuesta=="0016" || $codigoRespuesta=="0017"    ||
                    $codigoRespuesta=="0018" || $codigoRespuesta=="0019" || $codigoRespuesta=="0020" || $codigoRespuesta=="0021"    ||
                    $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || $codigoRespuesta=="0024" || $codigoRespuesta=="0025"    ||
                        
                    $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || $codigoRespuesta=="0028" || $codigoRespuesta=="0029"    ||  $codigoRespuesta=="0030" || 
                    $codigoRespuesta=="0031" || $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034"    ||  $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039"    ||  $codigoRespuesta=="0040" || 
                    $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || $codigoRespuesta=="0044"    ||  $codigoRespuesta=="0045" || 
                    $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || $codigoRespuesta=="0048" || $codigoRespuesta=="0049"    ||  $codigoRespuesta=="0050" || 

                    $codigoRespuesta=="0051" || $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054"    ||  $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059"    ||  $codigoRespuesta=="0060" || 
                    $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || $codigoRespuesta=="0064"    ||  $codigoRespuesta=="0065" || 
                    $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || $codigoRespuesta=="0068" || $codigoRespuesta=="0069"    ||  $codigoRespuesta=="0070" || 

                    $codigoRespuesta=="0071" || $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074"    ||  $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079"    ||  $codigoRespuesta=="0080" || 
                    $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || $codigoRespuesta=="0084"    ||  $codigoRespuesta=="0085" || 
                    $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || $codigoRespuesta=="0088" || $codigoRespuesta=="0089"    ||  $codigoRespuesta=="0090" || 

                    $codigoRespuesta=="0091" || $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094"    ||  $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099"    
                )
                {
                    formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          1,                      "no");
                }
                else{
                    formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          0,                      "no");
                }
                
                //  Extraemos informacion para preparar email de confirmacion
                $formularios_liga_alqueria          =   formularios_liga_alqueria::findByID($pago['IDFormulariosLigaAlqueria']);
                $formularios_liga_alqueria_jugadores=   formularios_liga_alqueria_jugadores::findByIDFormulariosLigaAlqueria($pago['IDFormulariosLigaAlqueria']);
                
                //  Preparamos HTML de jugadores para el email 
                $contenido_email_jugadores="<p>";
                foreach($formularios_liga_alqueria_jugadores as $jugador)
                {
                    $contenido_email_jugadores.=$jugador['Nombre'].", ".$jugador['DNI'];
                    if(!empty($jugador['Email']))
                    {
                        $contenido_email_jugadores.=", ".$jugador['Email'];
                        if(!empty($jugador['Telefono'])){$contenido_email_jugadores.=", ".$jugador['Telefono'];}
                    }
                    else{
                        if(!empty($jugador['Telefono'])){$contenido_email_jugadores.=", ".$jugador['Telefono'];}
                    }
                    $contenido_email_jugadores.="<br>";
                }
                $contenido_email_jugadores.="</p>";
                    
                $FechaAlta_string=new DateTime($formularios_liga_alqueria['FechaAlta']);
                $contenido_email= "<p>Hemos recibido la inscripciÃ³n a la liga de LÂ´Alqueria del Basket. Estos son los datos recibidos:</p>
                    <p><strong>Fecha de alta:</strong> ".$FechaAlta_string->format("d/M/Y")."<br>
                        <strong>Nombre del responsable:</strong> ".$formularios_liga_alqueria['ResponsableNombre']."<br>
                        <strong>TelÃ©fono del responsable:</strong> " . $formularios_liga_alqueria['ResponsableTelefono']."<br>
                        <strong>Email del responsable:</strong> ".strtoupper($formularios_liga_alqueria['ResponsableEmail'])."<br>
                        <strong>DNI del responsable:</strong> ".$formularios_liga_alqueria['ResponsableDNI']."<br>
                        <strong>Nombre del Equipo:</strong> ".$formularios_liga_alqueria['NombreEquipo']."<br>
                        <strong>CategorÃ­a:</strong> ".$formularios_liga_alqueria['Categoria']."<br>
                        <strong>EquipaciÃ³n principal:</strong> ".$formularios_liga_alqueria['ColorEquipacionPrincipal']."<br>
                        <strong>EquipaciÃ³n secundaria:</strong> ".$formularios_liga_alqueria['ColorEquipacionSecundaria']."<br>
                        <strong>DÃ­a del partido:</strong> ".$formularios_liga_alqueria['DiaJuego']."<br>
                        <strong>Hora seleccionada:</strong> ".$formularios_liga_alqueria['HoraJuego']."<br>
                        <strong>Jugadores: </strong><br>				
                    </p>".$contenido_email_jugadores;
                
                envios_emails::enviar_email_liga_alqueria($contenido_email, $formularios_liga_alqueria['ResponsableEmail'], $formularios_liga_alqueria['ResponsableNombre']);
            } 
            else
            {
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                $pago=formularios_liga_alqueria_pagos::findBynumero_pedido($codigo_venta_recibido);
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          0,                      "no");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'fecha_confirmacion_pago',    date("Y-m-d H:i:s"),    "si");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'Ds_Response',                $codigoRespuesta,       "si");
            }
        }
        else if (!empty( $_GET ) ) 
        {
            //error_log(__FILE__.__LINE__);
             
            //URL DE RESP. ONLINE
            $version            = $_GET["Ds_SignatureVersion"];
            $datos              = $_GET["Ds_MerchantParameters"];
            $signatureRecibida  = $_GET["Ds_Signature"];

            $decodec    = $miObj->decodeMerchantParameters($datos);
            //$kc         = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7'; //    de pruebas
            $kc         = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //    Clave recuperada de CANALES
            $firma      = $miObj->createMerchantSignatureNotif($kc,$datos);

            //  nuevo
            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            //  $codigoRespuesta=intval($codigoRespuesta);
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            $dos_char = substr($codigoRespuesta, 0, 2);

            //error_log(__FILE__.__LINE__);
            //error_log($codigo_venta_recibido);
            //error_log($firma);
            //error_log($signatureRecibida);
    
            if($firma === $signatureRecibida)
            {
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                $pago=formularios_liga_alqueria_pagos::findBynumero_pedido($codigo_venta_recibido);
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'fecha_confirmacion_pago',    date("Y-m-d H:i:s"),    "si");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'Ds_Response',                $codigoRespuesta,       "si");
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003"     || $codigoRespuesta=="0004"     ||
                    $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || $codigoRespuesta=="0008"    || $codigoRespuesta=="0009"     || 
                    $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || $codigoRespuesta=="0012" || $codigoRespuesta=="0013"    || 
                    $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || $codigoRespuesta=="0016" || $codigoRespuesta=="0017"    ||
                    $codigoRespuesta=="0018" || $codigoRespuesta=="0019" || $codigoRespuesta=="0020" || $codigoRespuesta=="0021"    ||
                    $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || $codigoRespuesta=="0024" || $codigoRespuesta=="0025"    ||
                        
                    $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || $codigoRespuesta=="0028" || $codigoRespuesta=="0029"    ||  $codigoRespuesta=="0030" || 
                    $codigoRespuesta=="0031" || $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034"    ||  $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039"    ||  $codigoRespuesta=="0040" || 
                    $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || $codigoRespuesta=="0044"    ||  $codigoRespuesta=="0045" || 
                    $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || $codigoRespuesta=="0048" || $codigoRespuesta=="0049"    ||  $codigoRespuesta=="0050" || 

                    $codigoRespuesta=="0051" || $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054"    ||  $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059"    ||  $codigoRespuesta=="0060" || 
                    $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || $codigoRespuesta=="0064"    ||  $codigoRespuesta=="0065" || 
                    $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || $codigoRespuesta=="0068" || $codigoRespuesta=="0069"    ||  $codigoRespuesta=="0070" || 

                    $codigoRespuesta=="0071" || $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074"    ||  $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079"    ||  $codigoRespuesta=="0080" || 
                    $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || $codigoRespuesta=="0084"    ||  $codigoRespuesta=="0085" || 
                    $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || $codigoRespuesta=="0088" || $codigoRespuesta=="0089"    ||  $codigoRespuesta=="0090" || 

                    $codigoRespuesta=="0091" || $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094"    ||  $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099"    
                )
                {
                    formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          1,                      "no");
                }
                else{
                    formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          0,                      "no");
                }
                
                //  Extraemos informacion para preparar email de confirmacion
                $formularios_liga_alqueria          =   formularios_liga_alqueria::findByID($pago['IDFormulariosLigaAlqueria']);
                $formularios_liga_alqueria_jugadores=   formularios_liga_alqueria_jugadores::findByIDFormulariosLigaAlqueria($pago['IDFormulariosLigaAlqueria']);
                
                //  Preparamos HTML de jugadores para el email 
                $contenido_email_jugadores="<p>";
                foreach($formularios_liga_alqueria_jugadores as $jugador)
                {
                    $contenido_email_jugadores.=$jugador['Nombre'].", ".$jugador['DNI'];
                    if(!empty($jugador['Email']))
                    {
                        $contenido_email_jugadores.=", ".$jugador['Email'];
                        if(!empty($jugador['Telefono'])){$contenido_email_jugadores.=", ".$jugador['Telefono'];}
                    }
                    else{
                        if(!empty($jugador['Telefono'])){$contenido_email_jugadores.=", ".$jugador['Telefono'];}
                    }
                    $contenido_email_jugadores.="<br>";
                }
                $contenido_email_jugadores.="</p>";
                    
                $FechaAlta_string=new DateTime($formularios_liga_alqueria['FechaAlta']);
                $contenido_email= "<p>Hemos recibido la inscripciÃ³n a la liga de LÂ´Alqueria del Basket. Estos son los datos recibidos:</p>
                    <p><strong>Fecha de alta:</strong> ".$FechaAlta_string->format("d/M/Y")."<br>
                        <strong>Nombre del responsable:</strong> ".$formularios_liga_alqueria['ResponsableNombre']."<br>
                        <strong>TelÃ©fono del responsable:</strong> " . $formularios_liga_alqueria['ResponsableTelefono']."<br>
                        <strong>Email del responsable:</strong> ".strtoupper($formularios_liga_alqueria['ResponsableEmail'])."<br>
                        <strong>DNI del responsable:</strong> ".$formularios_liga_alqueria['ResponsableDNI']."<br>
                        <strong>Nombre del Equipo:</strong> ".$formularios_liga_alqueria['NombreEquipo']."<br>
                        <strong>CategorÃ­a:</strong> ".$formularios_liga_alqueria['Categoria']."<br>
                        <strong>EquipaciÃ³n principal:</strong> ".$formularios_liga_alqueria['ColorEquipacionPrincipal']."<br>
                        <strong>EquipaciÃ³n secundaria:</strong> ".$formularios_liga_alqueria['ColorEquipacionSecundaria']."<br>
                        <strong>DÃ­a del partido:</strong> ".$formularios_liga_alqueria['DiaJuego']."<br>
                        <strong>Hora seleccionada:</strong> ".$formularios_liga_alqueria['HoraJuego']."<br>
                        <strong>Jugadores: </strong><br>				
                    </p>".$contenido_email_jugadores;
                
                envios_emails::enviar_email_liga_alqueria($contenido_email, $formularios_liga_alqueria['ResponsableEmail'], $formularios_liga_alqueria['ResponsableNombre']);
            } 
            else
            {
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                // Actualizamos la informacion en base datos con el OK y el codigo respuesta??? 
                $pago=formularios_liga_alqueria_pagos::findBynumero_pedido($codigo_venta_recibido);
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'confirmacion_pago',          0,                      "no");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'fecha_confirmacion_pago',    date("Y-m-d H:i:s"),    "si");
                formularios_liga_alqueria_pagos::updateAttribute($pago['ID'], 'Ds_Response',                $codigoRespuesta,       "si");
            }
        }
    ?>
        
    </body> 
</html> 