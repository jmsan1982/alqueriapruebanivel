<?php 
    /************************************************
    Model Generator: 	V1.03 (2019-02-22) 
    Autor: 			Pablo Muñoz Julve
    Fecha de la generación: 2019-10-04 18:00:43
    ************************************************/

    class formularios_liga_alqueria_pagos
    {
        public static function findAll(){
            return db::singleton()->query('select * from formularios_liga_alqueria_pagos')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from formularios_liga_alqueria_pagos order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from formularios_liga_alqueria_pagos group by ID')->fetch();
        }
        
    	public static function insert(
                $IDFormulariosLigaAlqueria, $nombre_pago, $numero_pedido,$cantidad, $metodo_pago, $confirmacion_pago, 
		$fecha_confirmacion_pago, $orden)
        {        
            $sql='INSERT INTO formularios_liga_alqueria_pagos(IDFormulariosLigaAlqueria, nombre_pago, numero_pedido, cantidad, metodo_pago, confirmacion_pago, 
		fecha_confirmacion_pago, orden)
		VALUES(:idformulariosligaalqueria, :nombre_pago, :numero_pedido, :cantidad, :metodo_pago, :confirmacion_pago, 
		:fecha_confirmacion_pago, :orden)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria,':nombre_pago'=>$nombre_pago,':numero_pedido'=>$numero_pedido,':cantidad'=>$cantidad,':metodo_pago'=>$metodo_pago,':confirmacion_pago'=>$confirmacion_pago,
		':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,':orden'=>$orden);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update(
                $ID,                $IDFormulariosLigaAlqueria, $nombre_pago, $numero_pedido, 
                $cantidad,          $metodo_pago, 
		$confirmacion_pago, $fecha_confirmacion_pago,   $orden)
        {        
            $sql='UPDATE formularios_liga_alqueria_pagos 
		SET 
                    id=:id,
                    idformulariosligaalqueria=:idformulariosligaalqueria,
                    nombre_pago=:nombre_pago,
                    numero_pedido=:numero_pedido,
                    cantidad=:cantidad,
                    metodo_pago=:metodo_pago,
		confirmacion_pago=:confirmacion_pago,fecha_confirmacion_pago=:fecha_confirmacion_pago,orden=:orden 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(
                ':id'=>$ID,
                ':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria,
                ':nombre_pago'=>$nombre_pago,
                ':numero_pedido'=>$numero_pedido,
                ':metodo_pago'=>$metodo_pago,
                ':confirmacion_pago'=>$confirmacion_pago,
                ':cantidad'=>$cantidad,
		':fecha_confirmacion_pago'=>$fecha_confirmacion_pago,
                ':orden'=>$orden);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }
        
        public static function updateAttribute($id,$nombreAtributo,$valorAtributo=null,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   $sentencia_sql="UPDATE formularios_liga_alqueria_pagos SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;}
            else
            {   $sentencia_sql="UPDATE formularios_liga_alqueria_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;}

            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);

            $query=db::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(var_dump( db::singleton()->errorInfo()));die;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND   ***
	***********************/
	public static function findByID($ID)
	{
            $sentencia_sql='select * from formularios_liga_alqueria_pagos WHERE ID='.$ID;
            error_log(__FILE__.__LINE__);
            error_log($sentencia_sql);
            return db::singleton()->query($sentencia_sql)->fetch();
	}

	public static function findByIDFormulariosLigaAlqueria($IDFormulariosLigaAlqueria)
    	{
            $sentencia_sql='select * from formularios_liga_alqueria_pagos WHERE IDFormulariosLigaAlqueria='.$IDFormulariosLigaAlqueria.' order by orden';
            return db::singleton()->query($sentencia_sql)->fetchAll();
    	}

        public static function findBynombre_pago($nombre_pago)
    	{
            return db::singleton()->query('select * from formularios_liga_alqueria_pagos WHERE nombre_pago="'.$nombre_pago.'"')->fetchAll();
    	}
        
        public static function findBynumero_pedido($numero_pedido)
    	{
            return db::singleton()->query('select * from formularios_liga_alqueria_pagos WHERE numero_pedido="'.$numero_pedido.'"')->fetch();
    	}

        /**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from formularios_liga_alqueria_pagos';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from formularios_liga_alqueria_pagos where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByIDFormulariosLigaAlqueria($IDFormulariosLigaAlqueria){
    		$sql="delete from formularios_liga_alqueria_pagos where IDFormulariosLigaAlqueria=:idformulariosligaalqueria";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':idformulariosligaalqueria'=>$IDFormulariosLigaAlqueria);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteBynombre_pago($nombre_pago){
    		$sql="delete from formularios_liga_alqueria_pagos where nombre_pago=:nombre_pago";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':nombre_pago'=>$nombre_pago);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>