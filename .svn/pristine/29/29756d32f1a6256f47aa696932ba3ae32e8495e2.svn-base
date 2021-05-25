<?php 
/************************************************
Model Generator: 	V1.03 (2019-02-22) 
Autor: 			Pablo Muñoz Julve
Fecha de la generación: 2019-08-12 12:24:17
************************************************/

    class licenciasfederacion1920_equipos
    {
        public static function getCategorias(){
            return db::singleton()->query('select categoria,count(*) as total_categoria from licenciasfederacion1920_equipos group by categoria')->fetchAll();
        }
        
        public static function getEquipos(){
            return db::singleton()->query('select equipo,count(*) as total_equipo from licenciasfederacion1920_equipos group by equipo')->fetchAll();
        }
        
        public static function getClubs(){
            return db::singleton()->query('select club,count(*) as total_club from licenciasfederacion1920_equipos group by club')->fetchAll();
        }
        
        public static function findAll(){
            return db::singleton()->query('select * from licenciasfederacion1920_equipos')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from licenciasfederacion1920_equipos order by dni_jugador desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from licenciasfederacion1920_equipos group by dni_jugador')->fetch();
        }
        
    	public static function insert($categoria, $club, $equipo)
        {        
            $sql='INSERT INTO licenciasfederacion1920_equipos(categoria, club, equipo)
		VALUES(:categoria, :club, :equipo)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':categoria'=>$categoria,':club'=>$club,':equipo'=>$equipo);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($dni_jugador, $categoria, $club, $equipo)
        {        
            $sql='UPDATE licenciasfederacion1920_equipos 
		SET 
		dni_jugador=:dni_jugador,categoria=:categoria,club=:club,equipo=:equipo 
		WHERE
		dni_jugador=:dni_jugador';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':dni_jugador'=>$dni_jugador,':categoria'=>$categoria,':club'=>$club,':equipo'=>$equipo);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND ***
	***********************/
        public static function findById($id)
	{
            return db::singleton()->query('select * from licenciasfederacion1920_equipos WHERE id='.$id)->fetch();
	}
        
	public static function findBydni_jugador($dni_jugador)
	{
            $sentencia_sql='select * from licenciasfederacion1920_equipos WHERE dni_jugador="'.$dni_jugador.'"';
            //error_log(__FILE__.__LINE__.". ".$sentencia_sql);
            return db::singleton()->query($sentencia_sql)->fetch();
	}

	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from licenciasfederacion1920_equipos';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteBydni_jugador($dni_jugador)
    	{
    		$sql="delete from licenciasfederacion1920_equipos where dni_jugador=:dni_jugador";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':dni_jugador'=>$dni_jugador);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>