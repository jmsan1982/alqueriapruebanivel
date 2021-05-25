<?php
	class reservasusuariosController {

		

		//llamada 
        public function actionBackGestionUser()
        {
            
            require "models/reserva_salaestudio.php";
            require "models/servicios.php";
            require "models/reserva_pistas.php";

            if (isset($_SESSION['idusuario']) ) {  
              

              //reservas de sala
              $datos['reservasala'] = servicios::findReservaSalaByIdUsuario($_SESSION['idusuario']);

              //error_log(print_r ($datos['reservasala'], true));

              //sacamos las reservas de sala de estudio
              $datos['reservasalaestudio'] = reserva_salaestudio::findReservaSalaEstudioByIdUsuario($_SESSION['idusuario']);

              //pistas reservadas en horario_entrenamiento2
              $datos['reservapistas'] = reserva_pistas::findReservaPistaByIdUsuario($_SESSION['idusuario']);
           
            	vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_reservas_usuarios");  
                
            }

           
            
        }



	
          // ANULAR RESERVA DE ASIENTO POR EL ENTRENADOR
        public function actionAnularReservaAsientoSala()
        {
            require "models/reserva_salaestudio.php";

            if (isset($_POST['idreserva'])) {
                error_log("Reseva asiento id: ".$_POST['idreserva']);
                 $update =reserva_salaestudio::AnularReservaAsientoByIdPorEntrenador($_POST['idreserva']);
            }
            
            
            
        }



         // ANULAR RESERVA DE SALA POR EL ENTRENADOR LOGUEADO
        public function actionAnularReservaSala()
        {
            require "models/servicios.php";

            if (isset($_POST['idreservas'])) {
                error_log("Reseva SALA id: ".$_POST['idreservas']);
                 $update =servicios::AnularReservaByIdPorEntrenador($_POST['idreservas']);
            }
            
            
            
        }





		
		




	}
?>