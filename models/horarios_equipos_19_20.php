<?php 
/************************************************
Model Generator: 	V1.03 (2019-02-22) 
Autor: 			Pablo Muñoz Julve
Fecha de la generación: 2019-09-09 09:33:56
************************************************/

    class horarios_equipos_19_20
    {
        public static function findAll(){
            return db::singleton()->query('select * from horarios_equipos_19_20 order by equipo')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from horarios_equipos_19_20 order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from horarios_equipos_19_20 group by ID')->fetch();
        }
        
    	public static function insert($equipo, $lunes, $martes, $miercoles, $jueves, $viernes)
        {        
            $sql='INSERT INTO horarios_equipos_19_20(equipo, lunes, martes, miercoles, jueves, 
		viernes)
		VALUES(:equipo, :lunes, :martes, :miercoles, :jueves, 
		:viernes)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':equipo'=>$equipo,':lunes'=>$lunes,':martes'=>$martes,':miercoles'=>$miercoles,':jueves'=>$jueves,
		':viernes'=>$viernes);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($ID, $equipo, $lunes, $martes, $miercoles, $jueves, $viernes)
        {        
            $sql='UPDATE horarios_equipos_19_20 
		SET 
		id=:id,equipo=:equipo,lunes=:lunes,martes=:martes,miercoles=:miercoles,
		jueves=:jueves,viernes=:viernes 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':equipo'=>$equipo,':lunes'=>$lunes,':martes'=>$martes,':miercoles'=>$miercoles,
		':jueves'=>$jueves,':viernes'=>$viernes);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND ***
	***********************/
	public static function findByID($ID)
	{
		return db::singleton()->query('select * from horarios_equipos_19_20 WHERE ID='.$ID)->fetch();
	}
        
        /**********************
	**** METODOS FIND ***
	***********************/
	public static function findByEquipo($equipo)
	{
            return db::singleton()->query('select * from horarios_equipos_19_20 WHERE equipo="'.$equipo.'"')->fetch();
	}

	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from horarios_equipos_19_20';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from horarios_equipos_19_20 where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>