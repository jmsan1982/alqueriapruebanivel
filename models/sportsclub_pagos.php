<?php 
    /************************************************
    Model Generator: 		V1.2 (2020-01-28) 
    Autor: 					Pablo Muñoz Julve
    Fecha de la generación: 2020-01-28 17:05:50
    ************************************************/

    class sportsclub_pagos
    {
        public static function findAll(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_pagos')->fetchAll();
        }

        public static function findLast(){
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_pagos ORDER BY ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db_utf8::singleton()->query('SELECT *,count(*) FROM sportsclub_pagos GROUP BY ID')->fetch();
        }
        
    	public static function insert($IDSportClubInscripcion, $fecha_creacion_pago, $nombre_pago, $numero_pedido, $cantidad, 
		$metodo_pago, $confirmacion_pago, $fecha_confirmacion_pago, $Ds_Response)
        {        
            $sql='INSERT INTO sportsclub_pagos(IDSportClubInscripcion, fecha_creacion_pago, nombre_pago, numero_pedido, cantidad, 
		metodo_pago, confirmacion_pago, fecha_confirmacion_pago, Ds_Response)
		VALUES(:idsportclubinscripcion, :fecha_creacion_pago, :nombre_pago, :numero_pedido, :cantidad, 
		:metodo_pago, :confirmacion_pago, :fecha_confirmacion_pago, :ds_response)';

        
            $query=db_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion,':fecha_creacion_pago'=>$fecha_creacion_pago,':nombre_pago'=>$nombre_pago,':numero_pedido'=>$numero_pedido,':cantidad'=>$cantidad,
		':metodo_pago'=>$metodo_pago,':confirmacion_pago'=>$confirmacion_pago,':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,':ds_response'=>$Ds_Response);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
            
        }

        /**********************
        **** METODOS FIND ***
        ***********************/
        public static function findByID($ID)
        {
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_pagos WHERE ID='.$ID)->fetch();
        }

        public static function findByIDSportClubInscripcion($IDSportClubInscripcion)
        {
            return db_utf8::singleton()->query('SELECT * FROM sportsclub_pagos WHERE IDSportClubInscripcion='.$IDSportClubInscripcion)->fetch();
        }

        public static function findBynombre_pago($nombre_pago)
    	{
    		return db_utf8::singleton()->query('SELECT * FROM sportsclub_pagos WHERE nombre_pago='.$nombre_pago)->fetchAll();
    	}

        /**********************
        **** METODOS UPDATE ***
        ***********************/
        public static function update($ID, $IDSportClubInscripcion, $fecha_creacion_pago, $nombre_pago, $numero_pedido, 
		$cantidad, $metodo_pago, $confirmacion_pago, $fecha_confirmacion_pago, $Ds_Response)
        {        
            $sql='UPDATE sportsclub_pagos 
		SET 
		id=:id,idsportclubinscripcion=:idsportclubinscripcion,fecha_creacion_pago=:fecha_creacion_pago,nombre_pago=:nombre_pago,numero_pedido=:numero_pedido,
		cantidad=:cantidad,metodo_pago=:metodo_pago,confirmacion_pago=:confirmacion_pago,fecha_confirmacion_pago=:fecha_confirmacion_pago,ds_response=:ds_response 
		WHERE
		ID=:id';

            $query=db_utf8::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':idsportclubinscripcion'=>$IDSportClubInscripcion,':fecha_creacion_pago'=>$fecha_creacion_pago,':nombre_pago'=>$nombre_pago,':numero_pedido'=>$numero_pedido,
		':cantidad'=>$cantidad,':metodo_pago'=>$metodo_pago,':confirmacion_pago'=>$confirmacion_pago,':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,':ds_response'=>$Ds_Response);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE sportsclub_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
            }

            $query=db_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }


	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='DELETE FROM sportsclub_pagos';

		$query=db_utf8::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM sportsclub_pagos where ID=:id";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

	public static function deleteByIDSportClubInscripcion($IDSportClubInscripcion)
    	{
    		$sql="DELETE FROM sportsclub_pagos where IDSportClubInscripcion=:idsportclubinscripcion";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idsportclubinscripcion'=>$IDSportClubInscripcion);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

	public static function deleteBynombre_pago($nombre_pago){
    		$sql="DELETE FROM sportsclub_pagos where nombre_pago=:nombre_pago";

    		$query=db_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':nombre_pago'=>$nombre_pago);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db_utf8::singleton()->errorInfo()));return false;}
    	}

   }
?>