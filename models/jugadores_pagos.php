<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-05-12 11:51:49
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class jugadores_pagos
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos ORDER BY id desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM jugadores_pagos GROUP BY id')->fetch();    }

        public static function findNombreArchivoTrimestre3()
        {   return db_2_utf8::singleton()->query("SELECT ruta_archivo, nombre_pago FROM jugadores_pagos WHERE nombre_pago = 'TRIMESTRE3' AND ruta_archivo IS NOT NULL LIMIT 1" )->fetch(); }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="jugadores_pagos"')->fetchAll();
        }
        
    	public static function findByid($id)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos WHERE id='.$id)->fetch();}

		public static function findByid_jugador($id_jugador)
		{
		    return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos WHERE id_jugador='.$id_jugador)->fetchAll();
		}

		public static function findBynombre_pago($nombre_pago)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos WHERE nombre_pago='.$nombre_pago)->fetchAll();}
        
        public static function findBynumero_pedido($numero_pedido)
		{   error_log('SELECT * FROM jugadores_pagos WHERE numero_pedido="'.$numero_pedido.'"');
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores_pagos WHERE numero_pedido="'.$numero_pedido.'"')->fetch();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert(
            $id_jugador,        $fecha_creacion_pago,   $nombre_pago,               $numero_pedido,     $cantidad, 
            $metodo_pago,       $confirmacion_pago,     $fecha_confirmacion_pago,   $Ds_Response,       $observaciones, 
            $id_inscripcion,    $recibo,                $url_recibo)
        {        
            $sql='
            INSERT INTO jugadores_pagos(
                id_jugador,     fecha_creacion_pago,    nombre_pago,                numero_pedido,  cantidad, 
                metodo_pago,    confirmacion_pago,      fecha_confirmacion_pago,    Ds_Response,    observaciones, 
                id_inscripcion, recibo,                 url_recibo)
            VALUES(
                :id_jugador,        :fecha_creacion_pago,   :nombre_pago,               :numero_pedido,     :cantidad, 
                :metodo_pago,       :confirmacion_pago,     :fecha_confirmacion_pago,   :ds_response,       :observaciones, 
                :isinscripcion,     :recibo,                :url_recibo)';
            error_log($sql);
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r($query->errorInfo(),1));return false;}
            
            $datos=array(
                ':id_jugador'=>$id_jugador,                 ':fecha_creacion_pago'=>$fecha_creacion_pago,           ':nombre_pago'=>$nombre_pago,
                ':numero_pedido'=>$numero_pedido,           ':cantidad'=>$cantidad,                                 ':metodo_pago'=>$metodo_pago,  
                ':confirmacion_pago'=>$confirmacion_pago,   ':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,   ':ds_response'=>$Ds_Response,
                ':observaciones'=>$observaciones,           ':isinscripcion'=>$id_inscripcion,                      ':recibo'=>$recibo,
                ':url_recibo'=>$url_recibo);
                
            if(!$query->execute($datos)){error_log(print_r($query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($id, $id_jugador, $fecha_creacion_pago, $nombre_pago, $numero_pedido, $cantidad, 
		$metodo_pago, $confirmacion_pago, $fecha_confirmacion_pago, $Ds_Response, $observaciones)
        {        
            $sql='
            UPDATE	jugadores_pagos 
			SET 
                id_jugador=:id_jugador,fecha_creacion_pago=:fecha_creacion_pago,nombre_pago=:nombre_pago,numero_pedido=:numero_pedido,cantidad=:cantidad,
                metodo_pago=:metodo_pago,confirmacion_pago=:confirmacion_pago,fecha_confirmacion_pago=:fecha_confirmacion_pago,ds_response=:ds_response,observaciones=:observaciones 
			WHERE
                id=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$id,
				':id_jugador'=>$id_jugador,':fecha_creacion_pago'=>$fecha_creacion_pago,':nombre_pago'=>$nombre_pago,':numero_pedido'=>$numero_pedido,':cantidad'=>$cantidad,
                ':metodo_pago'=>$metodo_pago,':confirmacion_pago'=>$confirmacion_pago,':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,':ds_response'=>$Ds_Response,':observaciones'=>$observaciones);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        { error_log("Entra en update atribbute ". $id . " -". $nombreAtributo . " -". $valorAtributo);
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."=0 WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else{
                    $sentencia_sql="UPDATE jugadores_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
            }
error_log($sentencia_sql);
            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid($id);}
        }


         /*ACTUALIZAMOS A PAGADO LA MATRICULA DE LA INSCRIPCION DESDE EL BACK  */
        public static function ActualizaPagadoPorBack($id, $valor, $observ)
        {

            $sql = "update jugadores_pagos set confirmacion_pago=:pag, observaciones=:observ where id=:numero";
            $query = db_2_utf8::singleton()->prepare($sql);

            if (!$query) {
                return false;
            }

            $datos = array(':numero' => $id, ':pag' => $valor, ':observ' =>$observ);

            if(!$query->execute($datos)){
                error_log(print_r( $query->errorInfo(),1));return false;
            }
            else{return self::findByid($id);}


        }

        //actualizamos pagos de eba
        public static function UpdatePagoEba($idJugador, $nombrePago, $cantidad)
        {
            $sql = "UPDATE jugadores_pagos SET cantidad = $cantidad WHERE id_jugador = $idJugador AND nombre_pago = '$nombrePago'";
            error_log($sql);

            $query=db_2_utf8::singleton()->prepare($sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){
                error_log(print_r( $query->errorInfo(),1));return false;
            }else{
                return self::findByid_jugador($idJugador);
            }
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM jugadores_pagos';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByid($id)
    	{
    		$sql="DELETE FROM jugadores_pagos WHERE id=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$id);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByid_jugador($id_jugador)
    	{
    		$sql="DELETE FROM jugadores_pagos WHERE id_jugador=:id_jugador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_jugador'=>$id_jugador);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteBynombre_pago($nombre_pago)
    	{
    		$sql="DELETE FROM jugadores_pagos WHERE nombre_pago=:nombre_pago";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':nombre_pago'=>$nombre_pago);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}
   }
?>