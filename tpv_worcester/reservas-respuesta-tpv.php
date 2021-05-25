<html> 
    <body> 
        <?php
        error_log("Se lanza la URL de regreso estandar del TPV:".__FILE__."/".__FUNCTION__."/".__LINE__);
        
        include 'apiRedsys.php';

        // Se crea Objeto
        $miObj = new RedsysAPI;

        // Está configurado para que entre por GET, por lo que IGNORAMOS POST y nos vamos al ELSE
        if(!empty($_POST)){
            //URL DE RESP. ONLINE
            $version = $_POST["Ds_SignatureVersion"];
            $datos = $_POST["Ds_MerchantParameters"];
            $signatureRecibida = $_POST["Ds_Signature"];

            $decodec = $miObj->decodeMerchantParameters($datos);
            $kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
            $firma = $miObj->createMerchantSignatureNotif($kc, $datos);

            //nuevo
            $codigo_venta_recibido = $miObj->getParameter("Ds_Order");
            $codigoRespuesta = $miObj->getParameter('Ds_Response');
            $transacciontipo = $miObj->getParameter('Ds_TransactionType');

            if($firma === $signatureRecibida){
                //echo "FIRMA OK";
                // Ahora comprobamos el código respuesta para saber qué ha pasado en el pago.
                $dos_char = substr($codigoRespuesta, 0, 2);
                if($dos_char == "00")
                {
                    header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/Ok&codigo=' . $codigo_venta_recibido);
                } 
                else if ($codigoRespuesta == "101" ||
                        $codigoRespuesta == "102" ||
                        $codigoRespuesta == "106" ||
                        $codigoRespuesta == "125" ||
                        $codigoRespuesta == "129" ||
                        $codigoRespuesta == "180" ||
                        $codigoRespuesta == "184" ||
                        $codigoRespuesta == "190" ||
                        $codigoRespuesta == "191" ||
                        $codigoRespuesta == "202" ||
                        $codigoRespuesta == "904" ||
                        $codigoRespuesta == "909" ||
                        $codigoRespuesta == "913" ||
                        $codigoRespuesta == "944" ||
                        $codigoRespuesta == "950" ||
                        $codigoRespuesta == "9912/912" ||
                        $codigoRespuesta == "9064" ||
                        $codigoRespuesta == "9078" ||
                        $codigoRespuesta == "9093" ||
                        $codigoRespuesta == "9094" ||
                        $codigoRespuesta == "9104" ||
                        $codigoRespuesta == "9218" ||
                        $codigoRespuesta == "9253" ||
                        $codigoRespuesta == "9256" ||
                        $codigoRespuesta == "9257" ||
                        $codigoRespuesta == "9261" ||
                        $codigoRespuesta == "9913" ||
                        $codigoRespuesta == "9914" ||
                        $codigoRespuesta == "9915" ||
                        $codigoRespuesta == "9928" ||
                        $codigoRespuesta == "9929" ||
                        $codigoRespuesta == "9997" ||
                        $codigoRespuesta == "9998" ||
                        $codigoRespuesta == "9999") {
                    header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/Ko&codigo=' . $codigo_venta_recibido);
                } else {
                    //echo "FIRMA KO";
                    header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/Ko&codigo=' . $codigo_venta_recibido);
                }
            } else {
                //echo "FIRMA KO";
                header('Location: https://servicios.alqueriadelbasket.com/?r=formularios/Ko&codigo=' . $codigo_venta_recibido);
            }
        }
        else 
        {
            if(!empty($_GET))
            {
                // URL DE RESP. ONLINE
                $version = $_GET["Ds_SignatureVersion"];
                $datos = $_GET["Ds_MerchantParameters"];
                $signatureRecibida = $_GET["Ds_Signature"];

                $decodec = $miObj->decodeMerchantParameters($datos);

                $kc = '6CNlHqacCTwi97kEKMl2rIf5+sjscoTA'; //Clave recuperada de CANALES
                $firma = $miObj->createMerchantSignatureNotif($kc,$datos);

                $codigo_venta_recibido = $miObj->getParameter("Ds_Order");
                $codigoRespuesta =       $miObj->getParameter('Ds_Response');
                // $codigoRespuesta=intval($codigoRespuesta);
                $transacciontipo = $miObj->getParameter('Ds_TransactionType');
                
                if($firma === $signatureRecibida){
                    
                    // La firma es válida: no es un intento fraudulento.
                    //error_log(__FILE__.__FUNCTION__.__LINE__);
                    
                    // Ahora comprobamos el código respuesta que nos dice qué ha pasado en el pago.
                    $dos_char = substr($codigoRespuesta, 0, 2);
                    
                    if ($dos_char == "00") {
                        // Según página 39 de https://canales.redsys.es/canales/ayuda/documentacion/Manual%20integracion%20para%20conexion%20por%20Web%20Service.pdf
                        // Si empieza por 00 el pago se hizo bien
                        
                        // TAREA 1. Actualizar la base de datos 2 tablas: pago_reservas y horario_entrenamiento
                        require '../models/mailers.php';
                        $codigo = $_GET['codigo'];
                        $pagado = 1;

                        $actualizaestado = mailers::actualizapagadocampusworcester($codigo, $pagado);

                        // TAREA 2. Envío EMAIL
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

                        
                        // TAREA 2. Envío EMAIL
                        //enviar_email_confirmacion($reserva['nombre']." ".$reserva['apellidos'],$reserva['dni'],$reserva['telefono'],$reserva['email'],$reserva['pista'],$reserva['fecha'],$reserva['hora'], $reserva['complementos'],$reserva['importe']);
                    }
                    
                    else if ($codigoRespuesta == "101" ||
                            $codigoRespuesta == "102" ||
                            $codigoRespuesta == "106" ||
                            $codigoRespuesta == "125" ||
                            $codigoRespuesta == "129" ||
                            $codigoRespuesta == "180" ||
                            $codigoRespuesta == "184" ||
                            $codigoRespuesta == "190" ||
                            $codigoRespuesta == "191" ||
                            $codigoRespuesta == "202" ||
                            $codigoRespuesta == "904" ||
                            $codigoRespuesta == "909" ||
                            $codigoRespuesta == "913" ||
                            $codigoRespuesta == "944" ||
                            $codigoRespuesta == "950" ||
                            $codigoRespuesta == "9912/912" ||
                            $codigoRespuesta == "9064" ||
                            $codigoRespuesta == "9078" ||
                            $codigoRespuesta == "9093" ||
                            $codigoRespuesta == "9094" ||
                            $codigoRespuesta == "9104" ||
                            $codigoRespuesta == "9218" ||
                            $codigoRespuesta == "9253" ||
                            $codigoRespuesta == "9256" ||
                            $codigoRespuesta == "9257" ||
                            $codigoRespuesta == "9261" ||
                            $codigoRespuesta == "9913" ||
                            $codigoRespuesta == "9914" ||
                            $codigoRespuesta == "9915" ||
                            $codigoRespuesta == "9928" ||
                            $codigoRespuesta == "9929" ||
                            $codigoRespuesta == "9997" ||
                            $codigoRespuesta == "9998" ||
                            $codigoRespuesta == "9999") {
                    } else {
                        //echo "FIRMA KO";
                    }
                } else {
                    //echo "FIRMA KO";
                }
            }
            else {
                die("No se recibió respuesta");
            }
        }
        ?>
    </body> 
</html>

<?php 
function enviar_email_confirmacion($titular,$dni,$telefono,$email,$pista,$fecha,$hora,$complementos,$importe)
{

    // Desactivar toda notificación de error
    error_reporting(0);

    // Cargamos la clase PHPMailer
    require_once("PHPMailer/class.phpmailer.php");
    require_once("PHPMailer/class.smtp.php");

    // Instanciamos un objeto PHPMailer
        $mail = new PHPMailer();

        $mail->CharSet = "UTF-8";

        // Le decimos que usamos el protocolo SMTP
        $mail->IsSMTP();

        // Le decimos que es necesario autenticarse
        $mail->SMTPAuth = true;

        // Asignamos nuestro servidor SMTP
        $mail->Host = "envios.icav.es";

        // Asignamos el puerto SMTP que usa nuestro servidor
        // Normalmente es el 25, pero tu servidor lo podría haber cambiado.
        $mail->Port = 587;

        // Indicamos aquí nuestro nombre de usuario
        $mail->Username = "alqueria@alqueriadelbasket.com";

        // Indicamos la contraseña
        $mail->Password = "abc01cba";

        // Añadimos la dirección del remitente
        $mail->From = "alqueria@alqueriadelbasket.com";

        // Añadimos el nombre del emisor
        $mail->FromName = "L'Alqueria del basket";

        // En la dirección de responder ponemos la misma del From
        $mail->AddReplyTo("recepcion@alqueriadelbasket.com","Recepción");

        // Le indicamos que nuestro Email está en Html
        $mail->IsHTML(true);

        // Indicamos la dirección y el nombre del destinatario
        $mail->AddAddress($email,$titular);

        // Con copia  
        $mail->AddCC('recepcion@alqueriadelbasket.com', 'Alqueria');

        // Ponemos aquí el asunto
            $mail->Subject = "Alquiler de pista en L'Alqueria del Basket";

            // Creamos todo el cuerpo del Email en Html en la variable $body
            $body = '
            <html>
            <body style="margin: 0.2em;">
            <div align="center" style="background-color: black;">

            </div>
            
            <div style="width: 80%;padding: 2em;">
                <p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">
                Gracias por realizar una reserva de pista en L\'Alqueria del Basket</p>

                <p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">
                A continuación tienes todos los datos de la reserva:</p>
                
                <p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">
                <strong>*Importante: imprime y presenta este correo cuando vengas a nuestras instalaciones.</strong></p>
                
                <p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">
                <strong>Datos de la reserva:</strong></p>
                <p style="font-family: Helvetica LT Condensed; color: black;font-size: 16px;">
                Titular: '.$titular.'<br>
                DNI: '.$dni.'<br>
                Teléfono: '.$telefono.'<br>
                Email: '.$email.'<br><br>
                    
                Pista: '.$pista.'<br>
                Fecha: '.$fecha.'<br>
                Hora:  '.$hora.'<br>                   
                '.$complementos.'<br>
                '.$importe.'<br>
                </p>
            </div>
            
            <div align="center" style="background-color: black;">

            </div>
            
            </body>
            </html>';

            // Añadimos aquí el cuerpo del Email
            $mail->MsgHTML($body);

            // Enviamos y comprobamos si se ha mandado el Email correctamente
            if($mail->Send())
            {
                // $nuevoformulario = mailers::newForm($formulario, $mensaje);
                //                echo "<script text='javascript'>
                //                        /* alert('El mensaje se envió correctamente'); */
                //                        window.location.replace('?r=servicios/Cafeteria&confirmacion=ok#confirmation');
                //                    </script>";
                //                die;
                //$mensaje_a_mostrar = "Mailer Error: " . $mail->ErrorInfo . "<br>";
                return false;
            } 
            else 
            {
                //                echo "<script text='javascript'>
                //                        /*alert('El mensaje no se pudo enviar correctamente, por favor, inténtelo de nuevo más tarde');*/
                //                         window.location.replace('?r=servicios/Cafeteria&confirmacion=ko#confirmation');
                //                    </script>";
                //                die;
                // $mensaje_a_mostrar = "Tu mensaje ha sido enviado.<br>";
                return true;
            }   
        }

?>