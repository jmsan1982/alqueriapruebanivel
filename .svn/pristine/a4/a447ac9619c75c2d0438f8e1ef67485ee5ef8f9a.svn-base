<?php 
	/************************************************
	Code Generator: 		V2.0 (2020-03-26) 
	Autor: 					Pablo Muñoz Julve
	Fecha de la generación: 2020-08-05 10:20:33
	Base de datos: 			alqueria
	Clase de capa: 			models
	************************************************/

    class ropa_productos_entregados
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_entregados')->fetchAll();   }

        public static function findLast()
        {   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_entregados ORDER BY ID desc limit 1')->fetch();    }

        public static function getCount()
        {   return db_2_utf8::singleton()->query('SELECT *,count(*) FROM ropa_productos_entregados GROUP BY ID')->fetch();    }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="ropa_productos_entregados"')->fetchAll();
        }
        
    	public static function findByID($ID)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_entregados WHERE ID='.$ID)->fetch();}

		public static function findByIDRopaEntrega($IDRopaEntrega)
		{   return db_2_utf8::singleton()->query('SELECT * FROM ropa_productos_entregados WHERE IDRopaEntrega='.$IDRopaEntrega)->fetchAll();}

        public static function findByIDRopaEntregaYIDProductoEntregado($IDRopaEntrega,$IDProductoEntregado)
        { 
            $sentencia_sql=' SELECT  * '
                . ' FROM    ropa_productos_entregados '
                . ' WHERE   IDRopaEntrega='.$IDRopaEntrega.' AND IDProductoEntregado='.$IDProductoEntregado;

            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }

		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($IDRopaEntrega, $IDProductoEntregado, $Talla, $CantidadEntregada)
        {        
            $sql='
            INSERT INTO ropa_productos_entregados(IDRopaEntrega, IDProductoEntregado, Talla, CantidadEntregada)
			VALUES(:idropaentrega, :idproductoentregado, :talla, :cantidadentregada)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':idropaentrega'=>$IDRopaEntrega,':idproductoentregado'=>$IDProductoEntregado,':talla'=>$Talla,':cantidadentregada'=>$CantidadEntregada);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($ID, $IDRopaEntrega, $IDProductoEntregado, $Talla, $CantidadEntregada)
        {        
            $sql='
            UPDATE	ropa_productos_entregados 
			SET 
					idropaentrega=:idropaentrega,idproductoentregado=:idproductoentregado,talla=:talla,cantidadentregada=:cantidadentregada 
			WHERE
					ID=:id';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id'=>$ID,
				':idropaentrega'=>$IDRopaEntrega,':idproductoentregado'=>$IDProductoEntregado,':talla'=>$Talla,':cantidadentregada'=>$CantidadEntregada);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }

		public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."=0 WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."=".$valorAtributo." WHERE ID=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."=null WHERE ID=".$id;
                }
                else{
                    $sentencia_sql="UPDATE ropa_productos_entregados SET ".$nombreAtributo."='".$valorAtributo."' WHERE ID=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByID($id);}
        }


		/**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM ropa_productos_entregados';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByID($ID)
    	{
    		$sql="DELETE FROM ropa_productos_entregados WHERE ID=:id";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByIDRopaEntrega($IDRopaEntrega)
    	{
    		$sql="DELETE FROM ropa_productos_entregados WHERE IDRopaEntrega=:idropaentrega";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idropaentrega'=>$IDRopaEntrega);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>