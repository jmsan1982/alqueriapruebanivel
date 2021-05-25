<?php 
/************************************************
Model Generator: 	V1.03 (2019-02-22) 
Autor: 			Pablo Muñoz Julve
Fecha de la generación: 2019-09-17 09:24:33
************************************************/

    class federacion_equipos
    {
        public static function findAll(){
            return db::singleton()->query('select * from federacion_equipos')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from federacion_equipos order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from federacion_equipos group by ID')->fetch();
        }
        
    	public static function insert($Nombre)
        {        
            $sql='INSERT INTO federacion_equipos(Nombre)
		VALUES(:nombre)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':nombre'=>$Nombre);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($ID, $Nombre)
        {        
            $sql='UPDATE federacion_equipos 
		SET 
		id=:id,nombre=:nombre 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':nombre'=>$Nombre);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND ***
	***********************/
	public static function findByID($ID)
	{
		return db::singleton()->query('select * from federacion_equipos WHERE ID='.$ID)->fetch();
	}

	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from federacion_equipos';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from federacion_equipos where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>