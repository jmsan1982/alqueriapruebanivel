<?php
	class entrenamientosController {

		

		//Se muestran los entrenamientos del entrenador 
        public function actionBackEntrenamientos()
        {
            
            require "models/entrenamientos.php";
            require "models/reserva_salaestudio.php";
            require "models/servicios.php";

            if (isset($_SESSION['idcoach']) ) {  
              
             

               //sacamos los entrenamientos
            	$datos['equiposentrenador'] = entrenamientos::findEquiposPorCoach($_SESSION['idcoach']);

            	
            	$datos['infoEquipo'] = array();
            	foreach ( $datos['equiposentrenador'] as $equipo ) {

                  //  error_log(print_r ($equipo["nombre_equipo_cas"], true));

                   $entrenmanie_aux= entrenamientos::findEntrenoPorEquipo($equipo["nombre_equipo_nueva_temporada"]);

                  // error_log(print_r($entrenmanie_aux, 1));

            	//	$datos['infoEquipo'] += entrenamientos::findEntrenoPorEquipo( $equipo["nombre_equipo_cas"] );
            		array_push( $datos['infoEquipo'], $entrenmanie_aux );

                   
            		
						  //error_log(print_r ($datos['infoEquipo'], true));

            	}
               //error_log( count($datos['infoEquipo'][0]));


              //reservas de sala
              $datos['reservasala'] = servicios::findReservaSalaByIdcoach($_SESSION['idcoach']);

              //error_log(print_r ($datos['reservasala'], true));

              //sacamos las reservas de sala de estudio
              $datos['reservasalaestudio'] = reserva_salaestudio::findReservaSalaEstudioByIdcoach($_SESSION['idcoach']);
           
            	vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_entrenamientos");  
                
            }

           
            
        }



	
          // ANULAR RESERVA DE ASIENTO POR EL ENTRENADOR
        public function actionAnularReservaAsientoSala()
        {
            require "models/reserva_salaestudio.php";

            if (isset($_POST['idreserva'])) {
                error_log("Anulacion Reseva asiento id: ".$_POST['idreserva']);
               
                $rutadevuelta=$_POST['rutaretorno'];
               
                $update =reserva_salaestudio::AnularReservaAsientoByIdPorEntrenador($_POST['idreserva'], $rutadevuelta);
            }
            
            
            
        }



        // ANULAR RESERVA DE SALA POR EL ENTRENADOR LOGUEADO
        public function actionAnularReservaSala()
        {
            require "models/servicios.php";

            if (isset($_POST['idreservas'])) {
                error_log("Anulacion Reseva SALA id: ".$_POST['idreservas']);

                $update =servicios::AnularReservaByIdPorEntrenador($_POST['idreservas'], $_POST['rutaretorno']);
            }
            
            
            
        }


        // SOLICITAR ANULACION DE PISTA POR EL USUARIO LOGUEADO (no pueden anular directamente, SE ENVIA UN EMAIL Y Pepe o recepcion eliminaran la reserva)
        public function actionSolicitarAnulacionPista()
        {
            require "models/mailers.php";

            if (isset($_POST['idhorariopista'])) {
                error_log("Anulacion Reseva PISTA id: ".$_POST['idhorariopista']);

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
                                                            <td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
                                                            <a href="https://servicios.alqueriadelbasket.com" target="_blank">
                                                            <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
                                                            alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                            </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td bgcolor="#ffffff" style="padding:30px 25px 30px 25px">
                                                            <h3 style="color:#eb7c00; border-bottom:#eb7c00 2px solid">Solicitud anulación de pista</h3>
                                                            <p>
                                                            <strong>Nombre solicitante:</strong> '.$_SESSION['nombreusuario'].'<br>
                                                            <strong>Identificado como:</strong> '.$_SESSION['usuario'].'<br>
                                                            <strong>Email:</strong> <a href="mailto:'.$_SESSION['emailusuario'].'">'.$_SESSION['emailusuario'].'</a><br>
                                                            
                                                            
                                                            <strong><u>Datos anulación:</u></strong><br>
                                                            <strong>ID:</strong> '.$_POST['idhorariopista'].'<br>
                                                            <strong>Pista:</strong> '.$_POST['pista'].'<br>
                                                            <strong>Fecha de reserva:</strong> '.$_POST['fecha'].'<br>
                                                            <strong>Hora de reserva:</strong> De '.$_POST['horario']. '<br>
                                                            <strong>Observaciones:</strong> '.$_POST['observ'].' </p>
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
                                                                                    <td> <a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">                                        <img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                                                                                    </a>
                                                                                    </td>
                                                                                    <td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
                                                                                    <td>                                                                 <a href="https://twitter.com/LAlqueriaVBC" target="_blank">
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

                 

                    $nuevo_formulario_rellenado = mailers::enviaCorreoAnulacionPistaAPepe($_SESSION['nombreusuario'], $_SESSION['emailusuario'], $contenido);

                    if ($nuevo_formulario_rellenado) {
                          

                            echo "<script text='javascript' charset='utf-8'>
                                            alert('Tu solicitud de anulación de pista se ha enviado correctamente.');
                                            window.location.replace('?r=reservasusuarios/BackGestionUser');
                                    </script>";
                            die;

               
                    }
            
            
             } 
        }


	}
?>