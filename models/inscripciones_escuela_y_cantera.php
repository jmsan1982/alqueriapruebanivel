<?php
	class inscripciones_escuela_y_cantera
    {
        /** findAll() devuelve todas las instancias */
        public static function findAll(){
            return db_2_utf8::singleton()->query('SELECT * FROM inscripciones_escuela_cantera')->fetchAll();
        }
        
        /** findLastInscripcionByIDJugador() recupera la última inscripción de un jugador */
        public static function findLastInscripcionByIDJugador($id_jugador)
        {
            //error_log("SELECT * FROM inscripciones_escuela_cantera  WHERE id_jugador=".$id_jugador." ORDER BY id_inscripcion desc limit 1", 1);

            $sentencia_sql='SELECT * FROM inscripciones_escuela_cantera  WHERE id_jugador='.$id_jugador.' ORDER BY id_inscripcion desc limit 1';

            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }


         //Sacamos los datos de las inscripciones y pago nuevas por temporada para el back DE ESCUELA Y CANTERA (de los jugadores activos)
        public static function findInscripciones_Temporada()
        {

        	$sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "TRIMESTRE1") and i.temporada like "%21" and j.is_active=1';
           

            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }
        //trimestre1
        public static function findInscripciones_TemporadaTrimestreUno()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "TRIMESTRE1%") and i.temporada like "%21" and j.is_active=1';


            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }

        public static function findInscripciones_TemporadaTrimestreDos()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "TRIMESTRE2%") and i.temporada like "%21" and j.is_active=1';


            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }

        public static function findInscripciones_TemporadaTrimestreTres()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "TRIMESTRE3") and i.temporada like "%21" and j.is_active=1';


            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }

        //Sacamos los datos de las inscripciones y pagos  por temporada para el back DE ESCUELA Y CANTERA (de los jugadores activos)
        public static function findInscripciones_TemporadaPagos()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "matricula%" or p.nombre_pago LIKE "primer pago" or p.nombre_pago LIKE "Trimestre1") and i.temporada like "%21" and j.is_active=1';
           

            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }


        //SACAMOS LAS INSCRIPCIONES DE PATRONATO
        public static function findInscripciones_TemporadaPatronato()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria="PATRONATO" and p.numero_pedido <>"" AND i.temporada like "%21" and j.is_active=1'; 
           

            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }

        //Sacamos los datos de las inscripciones y pago nuevas por temporada para el back DE ESCUELA Y CANTERA (de los jugadores activos)
        public static function findInscripciones_TemporadaDos()
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria not like "PATRONATO" and (p.nombre_pago LIKE "Trimestre2") and i.temporada like "%21" and j.is_active=1';


            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
        }

        //busqueda por idjugador
        public static function findByIdJugador($idjugador){

            return db_2_utf8::singleton()->query('SELECT * FROM `inscripciones_escuela_cantera` WHERE id_jugador = '. $idjugador)->fetch();

        }


        //Sacamos los datos de las inscripciones y pago nuevas de un jugador para el back
        public static function findInscripciones_TemporadaByIdJugador($id_jugador)
        {
              //  error_log(print_r('SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where i.temporada like "%21" and i.id_jugador='.$id_jugador,1));

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro,  i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, 
       p.numero_pedido, p.id as id_pago FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
           LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where i.temporada like "%21" and i.id_jugador='.$id_jugador;
           

            return db_2_utf8::singleton()->query($sentencia_sql)->fetch(PDO::FETCH_ASSOC);  //fetchAll(PDO::FETCH_ASSOC);
        }

        //Sacamos los datos de las inscripciones y pago nuevas de un jugador para el back de la matricula
        public static function findInscripciones_TemporadaMatriculaByIdJugador($id_jugador)
        {

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro,  i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago,p.becado as becado, p.observaciones as observaciones, p.aplicar_gastos_devolucion as devoluciones
                            FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  LEFT JOIN jugadores_pagos p 
                                on i.id_inscripcion=p.id_inscripcion where i.temporada like "%21" AND i.id_jugador='.$id_jugador;


            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll(PDO::FETCH_ASSOC);  //fetchAll(PDO::FETCH_ASSOC);
        }
        //Sacamos los datos de las inscripciones y pago nuevas de un jugador para el back e escuela y cantera
        public static function findInscripciones_TemporadaByIdInscripcion($idinscripcion)
        {
              

            $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro,  i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where i.temporada like "%21" and i.id_inscripcion='.$idinscripcion; 
           

            return db_2_utf8::singleton()->query($sentencia_sql)->fetch(PDO::FETCH_ASSOC);  //fetchAll(PDO::FETCH_ASSOC);
        }

        //Sacamos los datos de las inscripciones  nuevas de un jugador para el back de patronato
        //solo recogemos una inscripcion de la temporada vigente por id_inscripcion
        public static function findInscripciones_TemporadaByIdInscripcionPatronato($idinscripcion)
        {
              
            /*$sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where i.temporada like "%21" and i.id_inscripcion='.$idinscripcion; 
            */
            error_log('SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro,  i.id_inscripcion  FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador   where i.temporada like "%21" and i.id_inscripcion='.$idinscripcion);
             $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro,  i.id_inscripcion  FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador   where i.temporada like "%21" and i.id_inscripcion='.$idinscripcion; 
           
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch(PDO::FETCH_ASSOC);  //fetchAll(PDO::FETCH_ASSOC);
        }


		
        /** insertarInscripcion() inserta la inscripcion a escuela o cantera 2020 */
		public static function insertarInscripcion($idjugador, $fecha, $temporada, $seccion, $firmajugador,$firmatutor, $nombreequipo, $tipoinscripcion)
		{
			$sql = "INSERT INTO inscripciones_escuela_cantera 
                        (id_jugador, fecha_registro, temporada, seccion, firma_jugador, firma_tutor, equipo, tipo_inscripcion) 
                    VALUES 
                        (:id_jugador, :fecha,:temp,:sec,:firmaj,:firmat,:equip,:tipoins)";

			$query=db_2_utf8::singleton()->prepare($sql);

            $datos=array(':id_jugador'=>$idjugador,':fecha'=>$fecha,':temp'=>$temporada,':sec'=>$seccion,':firmaj'=>$firmajugador,
						 ':firmat'=>$firmatutor,':equip'=>$nombreequipo,':tipoins'=>$tipoinscripcion);
    
            if(!$query->execute($datos)){
            	error_log(print_r( $query->errorInfo(),1));
            	return false;
            }
            else{
            	return self::findLast();
            }
		}

        /** findLast() devuelve la última instancia insertada */
        public static function findLast(){
            return db_2_utf8::singleton()->query('SELECT * FROM inscripciones_escuela_cantera ORDER BY id_inscripcion desc limit 1')->fetch();
        }
        
            /* OBSOLETO PERO NO BORRAR hasta que esté hecho BACK 2020. 
             * Este método se actualiza en el back de inscripciones 2019 - 2020 para modificar el atirbuto pagado */
        public static function findFormIdFormulariosInscripcionesPagos($IdFormularios) {
			//error_log('SELECT * FROM formulariosinscripciones WHERE numero_pedido="' . $numeroPedido . '"');
			$query = dbalqueria::singleton()->query('SELECT * FROM inscripciones_escuela_cantera '
            . ' WHERE id_inscripcion="' . $IdFormularios . '" order by id desc');
			//error_log('SELECT * FROM formulariosinscripciones_pagos WHERE id_formularioinscripciones="' . $IdFormularios . '" order by id desc');
			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}

		//update eba
        public static function updateEBaInscripcion($idJugador){

            $sentencia_sql = "UPDATE inscripciones_escuela_cantera SET seccion = 'CANTERA', equipo = 'EBA VBC' WHERE temporada = '20/21' and id_jugador = " . $idJugador;

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_jugador($idJugador);}
        }


        /** UPDATE FIRMAS DE LA INSCRIPCION */
        public static function UpdateFirmasInscripcion($idinscripcion,  $firmajugador, $firmatutor, $firmaActualizar )
        {

            if (strcmp($firmaActualizar,"tut")==0) {
                error_log("TUT");
                $sql = "UPDATE  inscripciones_escuela_cantera 
                    SET    firma_tutor=:firmat, observaciones='Firmas actualizadas por web' 
                    WHERE id_inscripcion=:idinsc";
                $datos=array(':idinsc'=>$idinscripcion,':firmat'=>$firmatutor);
            } else if (strcmp($firmaActualizar,"sol")==0) {
                error_log("SOL");
                $sql = "UPDATE  inscripciones_escuela_cantera 
                    SET    firma_jugador=:firmaj, observaciones='Firmas actualizadas por web' 
                    WHERE id_inscripcion=:idinsc";
                $datos=array(':firmaj'=>$firmajugador,':idinsc'=>$idinscripcion);
            } else {
                error_log("DOS");
                $sql = "UPDATE  inscripciones_escuela_cantera 
                    SET    firma_jugador=:firmaj, firma_tutor=:firmat, observaciones='Firmas actualizadas por web' 
                    WHERE id_inscripcion=:idinsc";
                $datos=array(':idinsc'=>$idinscripcion,':firmaj'=>$firmajugador,':firmat'=>$firmatutor);
            }

            $query=db_2_utf8::singleton()->prepare($sql);

            if(!$query->execute($datos)){
                error_log(print_r( $query->errorInfo(),1));
                return false;
            }
            else{
                return true;
            }
        }
                                      
                                            


        
        /* OBSOLETO */
        /*inscripciones 20_21   consulta del jugador sin horarios para rellenar el formulario
        public static function findFormForIdJugadorSinHorarios($id)
        {
            $sentencia_sql='SELECT * from view_jugadores where id_jugador='.$id;


            error_log(__FILE__.__LINE__);
            error_log($sentencia_sql);

            $query = db_2_utf8::singleton()->query($sentencia_sql);


            if ($query) {
                return $query->fetch();
            }
            else {
                return false;		
            }
        }

        /* obsoleto */
        
        /* OBSOLETO */
        /*
        //inscripciones 20_21   consulta de horarios del jugador para rellenar el formulario
        public static function findHorariosForIdJugador($id)
        {
            $sentencia_sql='SELECT h.* from jugadores j inner join horarios h on j.idequipo_alqueria=h.id_equipo where id_jugador='.$id;


            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);

            $query = db_2_utf8::singleton()->query($sentencia_sql);

            if ($query) {
                return $query->fetchAll();
            }
            else {
                return false;		
            }
        }
        */

        /** OBSOLETO */
        /*          
		public static function findForNumero_pedido($numeroPedido) {
			
			$query = dbalqueria::singleton()->query('SELECT * FROM inscripciones_escuela_cantera WHERE numero_pedido="' . $numeroPedido . '"');
			
			if ($query) {
				return $query->fetch();
			}
			else {
				return false;
			}
		}
        */
        
        /* OBSOLETO INSCRIPCIONES 20-21 */
        /* public static function findLastNumeroPedidoInscripcion() {
        
			return dbalqueria::singleton()->query('SELECT MAX(id_inscripcion) FROM inscripciones_escuela_cantera')->fetch();
		}
        */
        
        /* OBSOLETO. */
		/*inscripciones 20_21   consulta de los datos del jugador desde el retorno del tpv para eviar el email, buscamos por el nº de pedido
		public static function findJugadorPorPedido($pedido) {
			$sentencia_sql='SELECT * from inscripciones_escuela_cantera where numero_pedido="' . $numeroPedido . '"';
							
			$query = db_2_utf8::singleton()->query($sentencia_sql);


			if ($query) {
				return $query->fetch();
			}
			else {
				return false;		
			}
		}
        */
        
        /* OBSOLETO */
        /*  Este método debe actualizar jugadores_pagos 
		public static function actualizapagoenoficina($id_formulario, $pagado) 
        {
			$sql = "UPDATE inscripciones_escuela_cantera SET pagado=:pag WHERE id_inscripcion=:id";
			$query = dbalqueria::singleton()->prepare($sql);

			if (!$query) {
				return false;
			}

			$datos = array(':id' => $id_formulario, ':pag' => $pagado);

			if (!$query->execute($datos)) {
				return false;
			}
			else {
				echo "<script text='javascript'> alert('La inscripción se ha actualizado a pagado en oficina');
					window.location.replace('?r=login/backdni'); </script>";
				die;
			}
		}
        */

        /*  OBSOLETO. Este método debe actualizar jugadores_pagos */
		/*actualizar con el error del tpv el pago de la inscripcion
		public static function actualizaerrorpagotpv($pedido,  $codigo_error) 
        {
			$sql = "update inscripciones_escuela_cantera set errorcode=:error where numero_pedido=:numero";
			$query = dbalqueria::singleton()->prepare($sql);

			if(!$query){
				return false;
			}

			$datos = array(':numero' => $pedido, ':pag' => $pagado, ':error' => $codigo_error);

			if(!$query->execute($datos))
            {   return false;   } 
			else
            {   return true;    }
		}
        */
        
		/** OBSOLETO. El equivalente a este metodo está en "jugadoresController".*/
        /*     Buscar por DNI para realizar la validacion de la renovacion
		public static function findByDNITutor($dni, $categoria) {
			if ($categoria == "cantera") {
				
				$sentencia_sql = 'SELECT * FROM view_jugadores WHERE (dni_padre LIKE "%' . $dni . '%" OR dni_tutor LIKE "%' . $dni . '%" OR dni_jugador LIKE "%' . $dni . '%" OR dni_madre LIKE "%' . $dni . '%")'
						. ' AND is_active = 1 and autoriza_modificacion=1 AND seccion like "Cantera%" ';		
				//error_log(__FILE__.__LINE__);
				//error_log($sentencia_sql);
				return dbalqueria::singleton()->query($sentencia_sql)->fetchAll();
			}
			else {
				$sentencia_sql = 'SELECT * FROM view_jugadores WHERE (dni_padre LIKE "%' . $dni . '%" OR dni_tutor LIKE "%' . $dni . '%" OR dni_jugador LIKE "%' . $dni . '%" OR dni_madre LIKE "%' . $dni . '%") AND is_active = 1  and autoriza_modificacion=1 AND seccion not like "Cantera%"' ;
				//error_log(__FILE__.__LINE__);
				//error_log($sentencia_sql);
				return dbalqueria::singleton()->query($sentencia_sql)->fetchAll();
			}
		}
        */
	}
?>