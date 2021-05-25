<html> 
    <body> 
    <?php

error_log(__FILE__.__LINE__);
error_log("Entra a recepcionapet");
        require 'apiRedsys.php';
        require_once "./../db_2_utf8.php";
        require "../PHPMailer/envios_emails.php";
        require_once('./../lib/TCPDF/Alqueria/tcpdf_include.php');
        require "../models/jugadores_pagos.php";
        require "../models/jugadores.php";
         require_once "../lang/publico_cas.php";
        require "../models/horarios.php";
        require "../models/inscripciones_escuela_y_cantera.php";
        
//error_log(__FILE__.__LINE__);

        // Se crea Objeto
        $miObj = new RedsysAPI;
       

if(isset($_GET["test"]))
{

    $jugador_aux =   jugadores::findByid_jugador(1197);
    $horarios=horarios::findByid_equipo($jugador_aux['idequipo_alqueria']);
    $horarios_string="";
    foreach($horarios as $horario)
    {   
        switch($horario["dia"]){
            case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
            case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
            case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
            case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
            case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
        }
    }
    $horarios_string= substr($horarios_string, -2);
    $test=prepara_contenido_pdf_y_email_v2($jugador_aux,$horarios_string);
    error_log(print_r($test,1));
}



        if(!empty($_POST))
        {
            $version            = $_POST["Ds_SignatureVersion"];
            $datos              = $_POST["Ds_MerchantParameters"];
            $signatureRecibida  = $_POST["Ds_Signature"];
            
            $decodec    = $miObj->decodeMerchantParameters($datos);
            $kc         = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';       // Entorno de pruebas   
            //$kc       = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';       // Entorno de producción. Clave recuperada de CANALES
            $firma      = $miObj->createMerchantSignatureNotif($kc,$datos); 

            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            //  $dos_char               =   substr($codigoRespuesta, 0, 2);
error_log("======================================================");
error_log(__FILE__.__LINE__);
error_log("codigo_venta_recibido por post vale: ".$codigo_venta_recibido);
error_log("codigoRespuesta por post vale: ".$codigoRespuesta);

            if($firma === $signatureRecibida)
            {
//error_log(__FILE__.__LINE__);
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003" || 
                    $codigoRespuesta=="0004" || $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || 
                    $codigoRespuesta=="0008" || $codigoRespuesta=="0009" || $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || 
                    $codigoRespuesta=="0012" || $codigoRespuesta=="0013" || $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || 
                    $codigoRespuesta=="0016" || $codigoRespuesta=="0017" || $codigoRespuesta=="0018" || $codigoRespuesta=="0019" ||
                    $codigoRespuesta=="0020" || $codigoRespuesta=="0021" || $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || 
                    $codigoRespuesta=="0024" || $codigoRespuesta=="0025" || $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || 
                    $codigoRespuesta=="0028" || $codigoRespuesta=="0029" || $codigoRespuesta=="0030" || $codigoRespuesta=="0031" || 
                    $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034" || $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039" ||  
                    $codigoRespuesta=="0040" || $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || 
                    $codigoRespuesta=="0044" || $codigoRespuesta=="0045" || $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || 
                    $codigoRespuesta=="0048" || $codigoRespuesta=="0049" || $codigoRespuesta=="0050" || $codigoRespuesta=="0051" || 
                    $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054" || $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059" ||  
                    $codigoRespuesta=="0060" || $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || 
                    $codigoRespuesta=="0064" || $codigoRespuesta=="0065" || $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || 
                    $codigoRespuesta=="0068" || $codigoRespuesta=="0069" || $codigoRespuesta=="0070" || $codigoRespuesta=="0071" || 
                    $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074" || $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079" || 
                    $codigoRespuesta=="0080" || $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || 
                    $codigoRespuesta=="0084" || $codigoRespuesta=="0085" || $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || 
                    $codigoRespuesta=="0088" || $codigoRespuesta=="0089" || $codigoRespuesta=="0090" || $codigoRespuesta=="0091" || 
                    $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094" || $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099")
                {
//error_log(__FILE__.__LINE__);
                    //  Recuperamos el pago y lo actualizamos el Ds_Response y la fecha de la respuesta
                $jugadores_pagos            =   jugadores_pagos::findBynumero_pedido($codigo_venta_recibido);
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'fecha_confirmacion_pago', date("Y-m-d H:i:s"), "si");
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'Ds_Response', $codigoRespuesta, "si");    
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos_actualizado['id'], 'confirmacion_pago', 1, "no");
                $jugadores                  =   jugadores::findByid_jugador($jugadores_pagos_actualizado['id_jugador']);

error_log(__FILE__.__LINE__);
                    /****************************************************************************
                    * PREPARAMOS EMAIL 
                    *   - En el PDF metemos el ID de $inscripcion
                    * ***************************************************************************/
                    //  Sacamos los horarios del equipo del jugador
                    $horarios=horarios::findByid_equipo($jugadores['idequipo_alqueria']);
                    $horarios_string="";
                    require "../lang/publico_cas.php";
                    foreach($horarios as $horario)
                    {   
                        switch($horario["dia"]){
                            case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                        }
                    }
                    $horarios_string= substr($horarios_string, -2);
            
                    $asunto_email   =   $lang["ins_cantera_email_asunto"];
                    $array_email    =   prepara_contenido_pdf_y_email_v2($jugadores,$horarios_string);
                    $datos_plantilla_PDF['contenido_pdf']   =   $contenido_email;
                    $cifrado_md5        =   substr(md5($inscripcion['id_inscripcion']), 0, 7);
                    $datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
                    include "./../lib/TCPDF/Alqueria/tramites/plantilla_vacia_inscripciones.php";
                    $email_enviado=envios_emails::enviar_email_nueva_inscripcion_cantera_2020(
                                $asunto_email,  $array_email["contenido_pdf"].$array_email["contenido_email"], $jugadores["email"], $jugadores["nombre"]." ".$jugadores["apellidos"], 
                                "", "", "", "", "inscripciones/".$datos_plantilla_PDF['ruta_archivo'],$datos_plantilla_PDF['ruta_archivo']);
                }
                else
                {
                    error_log(__FILE__.__LINE__);
                    //  Actualizamos jugadores_pagos con confirmacion_pagado a 0
                    $jugadores_pagos            =   jugadores_pagos::findBynumero_pedido($codigo_venta_recibido);
                    $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'confirmacion_pago', 0, "no");
                    $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos_actualizado['id'], 'Ds_Response', $codigoRespuesta, "si");    

                    //  Volvemos a autorizar la modificación del jugador para que puedan rellenar el formulario
                    $jugadores_pagos_actualizado=jugadores::updateAttribute($jugadores_pagos_actualizado['id'], "autoriza_modificacion", 1, "no");
                }
            }
            else 
            {   error_log(__FILE__.__LINE__.". Hay un error con la firma y signaturerecibida"); }
        }
        else if (!empty( $_GET ) )
        {
            $version            = $_POST["Ds_SignatureVersion"];
            $datos              = $_POST["Ds_MerchantParameters"];
            $signatureRecibida  = $_POST["Ds_Signature"];
            
            $decodec    = $miObj->decodeMerchantParameters($datos);
            $kc         = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';       // Entorno de pruebas 
            //$kc       = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA';       // Entorno de producción. Clave recuperada de CANALES
            $firma      = $miObj->createMerchantSignatureNotif($kc,$datos); 

            $codigo_venta_recibido  =   $miObj->getParameter("Ds_Order"); 
            $codigoRespuesta        =   $miObj->getParameter('Ds_Response'); 
            //  $dos_char           =   substr($codigoRespuesta, 0, 2);
    
error_log(__FILE__.__LINE__);
error_log("codigo_venta_recibido por get vale: ".$codigo_venta_recibido);
error_log("codigoRespuesta vale: ".$codigoRespuesta);

            if($firma === $signatureRecibida)
            {
                if( $codigoRespuesta=="0000" || $codigoRespuesta=="0001" || $codigoRespuesta=="0002" || $codigoRespuesta=="0003" || 
                    $codigoRespuesta=="0004" || $codigoRespuesta=="0005" || $codigoRespuesta=="0006" || $codigoRespuesta=="0007" || 
                    $codigoRespuesta=="0008" || $codigoRespuesta=="0009" || $codigoRespuesta=="0010" || $codigoRespuesta=="0011" || 
                    $codigoRespuesta=="0012" || $codigoRespuesta=="0013" || $codigoRespuesta=="0014" || $codigoRespuesta=="0015" || 
                    $codigoRespuesta=="0016" || $codigoRespuesta=="0017" || $codigoRespuesta=="0018" || $codigoRespuesta=="0019" ||
                    $codigoRespuesta=="0020" || $codigoRespuesta=="0021" || $codigoRespuesta=="0022" || $codigoRespuesta=="0023" || 
                    $codigoRespuesta=="0024" || $codigoRespuesta=="0025" || $codigoRespuesta=="0026" || $codigoRespuesta=="0027" || 
                    $codigoRespuesta=="0028" || $codigoRespuesta=="0029" || $codigoRespuesta=="0030" || $codigoRespuesta=="0031" || 
                    $codigoRespuesta=="0032" || $codigoRespuesta=="0033" || $codigoRespuesta=="0034" || $codigoRespuesta=="0035" || 
                    $codigoRespuesta=="0036" || $codigoRespuesta=="0037" || $codigoRespuesta=="0038" || $codigoRespuesta=="0039" ||  
                    $codigoRespuesta=="0040" || $codigoRespuesta=="0041" || $codigoRespuesta=="0042" || $codigoRespuesta=="0043" || 
                    $codigoRespuesta=="0044" || $codigoRespuesta=="0045" || $codigoRespuesta=="0046" || $codigoRespuesta=="0047" || 
                    $codigoRespuesta=="0048" || $codigoRespuesta=="0049" || $codigoRespuesta=="0050" || $codigoRespuesta=="0051" || 
                    $codigoRespuesta=="0052" || $codigoRespuesta=="0053" || $codigoRespuesta=="0054" || $codigoRespuesta=="0055" || 
                    $codigoRespuesta=="0056" || $codigoRespuesta=="0057" || $codigoRespuesta=="0058" || $codigoRespuesta=="0059" ||  
                    $codigoRespuesta=="0060" || $codigoRespuesta=="0061" || $codigoRespuesta=="0062" || $codigoRespuesta=="0063" || 
                    $codigoRespuesta=="0064" || $codigoRespuesta=="0065" || $codigoRespuesta=="0066" || $codigoRespuesta=="0067" || 
                    $codigoRespuesta=="0068" || $codigoRespuesta=="0069" || $codigoRespuesta=="0070" || $codigoRespuesta=="0071" || 
                    $codigoRespuesta=="0072" || $codigoRespuesta=="0073" || $codigoRespuesta=="0074" || $codigoRespuesta=="0075" || 
                    $codigoRespuesta=="0076" || $codigoRespuesta=="0077" || $codigoRespuesta=="0078" || $codigoRespuesta=="0079" || 
                    $codigoRespuesta=="0080" || $codigoRespuesta=="0081" || $codigoRespuesta=="0082" || $codigoRespuesta=="0083" || 
                    $codigoRespuesta=="0084" || $codigoRespuesta=="0085" || $codigoRespuesta=="0086" || $codigoRespuesta=="0087" || 
                    $codigoRespuesta=="0088" || $codigoRespuesta=="0089" || $codigoRespuesta=="0090" || $codigoRespuesta=="0091" || 
                    $codigoRespuesta=="0092" || $codigoRespuesta=="0093" || $codigoRespuesta=="0094" || $codigoRespuesta=="0095" || 
                    $codigoRespuesta=="0096" || $codigoRespuesta=="0097" || $codigoRespuesta=="0098" || $codigoRespuesta=="0099")
                {
                    //  Recuperamos el pago y lo actualizamos el Ds_Response y la fecha de la respuesta
                $jugadores_pagos            =   jugadores_pagos::findBynumero_pedido($codigo_venta_recibido);
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'fecha_confirmacion_pago', date("Y-m-d H:i:s"), "si");
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'Ds_Response', $codigoRespuesta, "si");    
                $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos_actualizado['id'], 'confirmacion_pago', 1, "no");
                $jugadores                  =   jugadores::findByid_jugador($jugadores_pagos_actualizado['id_jugador']);

                    /****************************************************************************
                    * PREPARAMOS EMAIL 
                    *   - En el PDF metemos el ID de $inscripcion
                    * ***************************************************************************/
                    //  Sacamos los horarios del equipo del jugador
                    $horarios=horarios::findByid_equipo($jugadores['idequipo_alqueria']);
                    $horarios_string="";
                    foreach($horarios as $horario)
                    {   
                        switch($horario["dia"]){
                            case "Lunes":       {   $horarios_string.=$lang["lunes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Martes":      {   $horarios_string.=$lang["martes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Miercoles":   {   $horarios_string.=$lang["miercoles"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Jueves":      {   $horarios_string.=$lang["jueves"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                            case "Viernes":     {   $horarios_string.=$lang["viernes"]." ".substr($horario["hora_ini"], 0, 5).", ";break;}
                        }
                    }
                    $horarios_string= substr($horarios_string, -2);
            
                    $asunto_email   =   $lang["ins_cantera_email_asunto"];
                    $array_email    =   prepara_contenido_pdf_y_email_v2($jugadores,$horarios_string);

                    $datos_plantilla_PDF['contenido_pdf']   =   $contenido_email;
                    $cifrado_md5        =   substr(md5($inscripcion['id_inscripcion']), 0, 7);
                    $datos_plantilla_PDF['ruta_archivo']    =   "alqueriadelbasket.com-num-inscripcion-".$cifrado_md5.".pdf";
                    include "./../lib/TCPDF/Alqueria/tramites/plantilla_vacia_inscripciones.php";

                    $email_enviado=envios_emails::enviar_email_nueva_inscripcion_cantera_2020(
                                $asunto_email,  $array_email["contenido_pdf"].$array_email["contenido_email"], $jugadores["email"], $jugadores["nombre"]." ".$jugadores["apellidos"], 
                                "", "", "", "", "inscripciones/".$datos_plantilla_PDF['ruta_archivo'],$datos_plantilla_PDF['ruta_archivo']);
                }
                else
                {
                    //  Actualizamos jugadores_pagos con confirmacion_pagado a 0
                    $jugadores_pagos            =   jugadores_pagos::findBynumero_pedido($codigo_venta_recibido);
                    $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos['id'], 'confirmacion_pago', 0, "no");
                    $jugadores_pagos_actualizado=   jugadores_pagos::updateAttribute($jugadores_pagos_actualizado['id'], 'Ds_Response', $codigoRespuesta, "si");    

                    //  Volvemos a autorizar la modificación del jugador para que puedan rellenar el formulario
                    $jugadores_pagos_actualizado=jugadores::updateAttribute($jugadores_pagos_actualizado['id'], "autoriza_modificacion", 1, "no");
                }
            } 
            else 
            {   error_log(__FILE__.__LINE__.". Hay un error con la firma y signaturerecibida"); }
        }
        else{
            error_log(__FILE__.__LINE__.". No se recibió respuesta"); 
        }
        
        
        
        function prepara_contenido_pdf_y_email($jugador,$horarios_string)
        {
            $contenido_pdf  =   "<div><p>".$lang["ins_cantera_pdf_cabecera_1"]."</p>"
                                . "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
                                . "</div><h2>".$lang["ins_cantera_pdf_cabecera_4"]."</h2><hr>";
            $contenido_email=   "";
            
            //  Para el PDF 
            $contenido_email="<div><h3>".$lang["ins_cantera_email_1"]." </h3>
                                   <p><b>".$lang["ins_cantera_email_2"].": </b>".$jugador_tipo_documento.", ".$jugador_dni.". ".$lang["ins_cantera_email_3"].": ".$jugador_fecha_caducidad."<br>"
                                    ."<b>".$lang["ins_cantera_email_4"].": </b>".$jugador_nombre." ".$jugador_apellidos."<br>"    
                                    ."<b>".$lang["ins_cantera_email_5"].": </b>".$jugador_fecha_nacimiento.", ".$jugador_pais_nacimiento."<br>"    
                                    ."<b>".$lang["ins_cantera_email_6"].": </b>".$jugador_direccion.", ".$jugador_numero;
            
            if(!empty($jugador_piso))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$jugador_piso;      }
            if(!empty($jugador_puerta)) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$jugador_puerta;    }
            
            $contenido_email.=". CP: ".$jugador_cp." (".$jugador_poblacion.", ".$jugador_provincia.")<br>"
                ."<b>".$lang["ins_cantera_email_9"].": </b>".$jugador_sexo."<br>"  
                ."<b>".$lang["ins_cantera_email_10"].": </b>".$jugador_nacionalidad."<br>"     
                ."<b>".$lang["ins_cantera_email_11"].": </b>".$jugador_talla_camiseta."<br>"     
                ."<b>".$lang["ins_cantera_email_12"].": </b>".$jugador_anyos_club."<br>"     
                ."<b>".$lang["ins_cantera_email_13"].": </b>".$jugador_alergias."<br>"     
                ."<b>".$lang["ins_cantera_email_14"].": </b>".$jugador_email_jugador."<br>"     
                ."<b>".$lang["ins_cantera_email_15"].": </b>".$jugador_equipo."<br>"     
                ."<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>"
                ."<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>"
                ."<b>".$lang["ins_cantera_email_17"].":</b>".$familia_num_hermanos;
            
            if(!empty($familia_edades_hermanos))
            {
                $array_edades=explode("-",$familia_edades_hermanos);
                $contenido_email.=" (";
                foreach($array_edades as $edad){    $contenido_email.=$edad.", "; }
                $contenido_email.=substr($contenido_email, 0, -2).")<br>";
            }
            $contenido_email.="<b>".$lang["ins_cantera_email_18"].": </b>".(($familia_monoparental)?"Sí ,(".$familia_monoparental_padre_madre.")":"No")."<br>";
            if($familia_monoparental && $familia_monoparental_padre_madre="MADRE")   
            {   
                $contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].": ".$madre_dni."<br>"    
                ."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
                ."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>";
            }
            else if($familia_monoparental && $familia_monoparental_padre_madre="PADRE")   
            {
                $contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"
                ."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
                ."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
            }
            else
            {
                $contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>".$madre_nombre." ".$madre_apellidos." ".$lang["ins_cantera_email_20"].":".$madre_dni."<br>"    
                ."<b>".$lang["ins_cantera_email_21"].": </b>".$madre_email.", ".$madre_telefono."<br>"
                ."<b>".$lang["ins_cantera_email_22"].": </b>".$madre_estudios."<br>"
                ."<b>".$lang["ins_cantera_email_23"].": </b>".$padre_nombre." ".$padre_apellidos." ".$lang["ins_cantera_email_20"].":".$padre_dni."<br>"    
                ."<b>".$lang["ins_cantera_email_21"].": </b>".$padre_email.", ".$padre_telefono."<br>"
                ."<b>".$lang["ins_cantera_email_22"].": </b>".$padre_estudios."<br>";      
            }

            $contenido_email.="</p></div><div><h3>".$lang["ins_cantera_email_1"].":</h3>"
                ."<p><b>".$lang["ins_cantera_email_24"].": </b>".$banco_titular.".<b> ".$lang["ins_cantera_email_25"].":</b> ".$banco_dni
                ."<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
            
            $array=array();
            $array["contenido_email"]   = $contenido_email;
            $array["contenido_pdf"]     = $contenido_pdf;
            return $array;
        }



        function prepara_contenido_pdf_y_email_v2($jugador,$horarios_string)
        {
            require_once "../lang/publico_cas.php";
            $contenido_pdf  =   "<div><p>".$lang["ins_cantera_pdf_cabecera_1"]."</p>"
                                . "<p>".$lang["ins_cantera_pdf_cabecera_2"]."</p><p>".$lang["ins_cantera_pdf_cabecera_3"]."</p><hr>"
                                . "</div><h2>".$lang["ins_cantera_pdf_cabecera_4"]."</h2><hr>";
            $contenido_email=   "";
            
            //  Para el PDF 
            $contenido_email="<div><h3>".$lang["ins_cantera_email_1"]."</h3>
                                   <p><b>".$lang["ins_cantera_email_2"].": </b>".$jugador["tipo_documento"].", ".$jugador["dni_jugador"].". ".$lang["ins_cantera_email_3"].": ".$jugador["fecha_cad_dni"]."<br>"
                                    ."<b>".$lang["ins_cantera_email_4"].": </b>".$jugador["nombre"]." ".$jugador["apellidos"]."<br>"    
                                    ."<b>".$lang["ins_cantera_email_5"].": </b>".$jugador["fecha_nacimiento"].", ".$jugador["pais_nacimiento"]."<br>"    
                                    ."<b>".$lang["ins_cantera_email_6"].": </b>".$jugador["direccion"].", ".$jugador["numero"];
            
            if(!empty($jugador["piso"]))   {   $contenido_email.=", ".$lang["ins_cantera_email_7"]." ".$jugador["piso"];      }
            if(!empty($jugador["puerta"])) {   $contenido_email.=", ".$lang["ins_cantera_email_8"]." ".$jugador["puerta"];    }
            
            $contenido_email.=". CP: ".$jugador["codigo_postal"]." (".$jugador["poblacion"].", ".$jugador["provincia"].")<br>"
                ."<b>".$lang["ins_cantera_email_9"].": </b>".$jugador["sexo"]."<br>"  
                ."<b>".$lang["ins_cantera_email_10"].": </b>".$jugador["nacionalidad"]."<br>"     
                ."<b>".$lang["ins_cantera_email_12"].": </b>".$jugador["en_el_club"]."<br>"     
                ."<b>".$lang["ins_cantera_email_13"].": </b>".$jugador["alergias"]."<br>"     
                ."<b>".$lang["ins_cantera_email_14"].": </b>".$jugador["email"]."<br>"     
                ."<b>".$lang["ins_cantera_email_15"].": </b>".$jugador["nombre_equipo_nueva_temporada"]."<br>"     
                ."<b>".$lang["ins_form_horario"]." </b>".$horarios_string."<br>*".$lang["ins_form_horario_aviso"]."</p></div>"
                ."<div><h3>".$lang["ins_cantera_email_16"]."</h3><p>"
                ."<b>".$lang["ins_cantera_email_17"].":</b>".$jugador["num_hermanos"];
            
            if(!empty($jugador["edades"]))
            {
                $array_edades=explode("-",$jugador["edades"]);
                $contenido_email.=" (";
                foreach($array_edades as $edad){    $contenido_email.=$edad.", "; }
                $contenido_email.=substr($contenido_email, 0, -2).")<br>";
            }
            
            if(($jugador["monoparental"]))
            {
                $contenido_email.="<b>".$lang["ins_cantera_email_18"].": </b>Sí<br>";
                $contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>";
                if(!empty($jugador["nombre_madre"])){$contenido_email.=$jugador["nombre_madre"];}
                if(!empty($jugador["apellidos_madre"])){$contenido_email.=$jugador["apellidos_madre"];}
                $contenido_email.=$lang["ins_cantera_email_20"].": ";
                if(!empty($jugador["dni_madre"])){$contenido_email.=$jugador["dni_madre"];}
                $contenido_email.="<br><b>".$lang["ins_cantera_email_21"].": </b>";
                if(!empty($jugador["email_madre"])){$contenido_email.=$jugador["email_madre"];}
                if(!empty($jugador["telefono_madre"])){$contenido_email.=", ".$jugador["telefono_madre"];}
                $contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>";
                if(!empty($jugador["telefono_madre"])){$contenido_email.=", ".$jugador["estudios_madre"];}
                $contenido_email.="<br>";
                
                $contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>";
                if(!empty($jugador["nombre_padre"])){$contenido_email.=$jugador["nombre_madre"];}
                if(!empty($jugador["apellidos_padre"])){$contenido_email.=$jugador["apellidos_padre"];}
                $contenido_email.=$lang["ins_cantera_email_20"].": ";
                if(!empty($jugador["dni_padre"])){$contenido_email.=$jugador["dni_padre"];}
                $contenido_email.="<br><b>".$lang["ins_cantera_email_21"].": </b>";
                if(!empty($jugador["email_padre"])){$contenido_email.=$jugador["email_padre"];}
                if(!empty($jugador["telefono_padre"])){$contenido_email.=", ".$jugador["telefono_padre"];}
                $contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>";
                if(!empty($jugador["telefono_padre"])){$contenido_email.=", ".$jugador["estudios_padre"];}
                $contenido_email.="<br>";
            }
            else{
                $contenido_email.="<b>".$lang["ins_cantera_email_18"].": </b>No<br>";
                 $contenido_email.="<b>".$lang["ins_cantera_email_19"].": </b>";
                if(!empty($jugador["nombre_madre"])){$contenido_email.=$jugador["nombre_madre"];}
                if(!empty($jugador["apellidos_madre"])){$contenido_email.=$jugador["apellidos_madre"];}
                $contenido_email.=$lang["ins_cantera_email_20"].": ";
                if(!empty($jugador["dni_madre"])){$contenido_email.=$jugador["dni_madre"];}
                $contenido_email.="<br><b>".$lang["ins_cantera_email_21"].": </b>";
                if(!empty($jugador["email_madre"])){$contenido_email.=$jugador["email_madre"];}
                if(!empty($jugador["telefono_madre"])){$contenido_email.=", ".$jugador["telefono_madre"];}
                $contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>";
                if(!empty($jugador["telefono_madre"])){$contenido_email.=", ".$jugador["estudios_madre"];}
                $contenido_email.="<br>";
                
                $contenido_email.="<b>".$lang["ins_cantera_email_23"].": </b>";
                if(!empty($jugador["nombre_padre"])){$contenido_email.=$jugador["nombre_madre"];}
                if(!empty($jugador["apellidos_padre"])){$contenido_email.=$jugador["apellidos_padre"];}
                $contenido_email.=$lang["ins_cantera_email_20"].": ";
                if(!empty($jugador["dni_padre"])){$contenido_email.=$jugador["dni_padre"];}
                $contenido_email.="<br><b>".$lang["ins_cantera_email_21"].": </b>";
                if(!empty($jugador["email_padre"])){$contenido_email.=$jugador["email_padre"];}
                if(!empty($jugador["telefono_padre"])){$contenido_email.=", ".$jugador["telefono_padre"];}
                $contenido_email.="<b>".$lang["ins_cantera_email_22"].": </b>";
                if(!empty($jugador["telefono_padre"])){$contenido_email.=", ".$jugador["estudios_padre"];}
                $contenido_email.="<br>";
            }
            
            $contenido_email.="</p></div><div><h3>".$lang["ins_cantera_email_1"].":</h3>"
                ."<p><b>".$lang["ins_cantera_email_24"].": </b>".$jugador["titular_banco"].".<b> ".$lang["ins_cantera_email_25"].":</b> ".$jugador["dni_titular"]
                ."<br><b>".$lang["ins_cantera_email_26"].":</b> ".$lang["ins_cantera_email_27"]."</p>";
            
            $array=array();
            $array["contenido_email"]   = $contenido_email;
            $array["contenido_pdf"]     = $contenido_pdf;
            return $array;
        }
    ?>
    </body> 
</html>