<?php 
/************************************************
Model Generator: 	V1.03 (2019-02-22) 
Autor: 			Pablo Muñoz Julve
Fecha de la generación: 2019-08-08 17:53:05
************************************************/

    class licenciasfederacion1920
    {
        public static function findAll(){
            return db::singleton()->query('select * from licenciasfederacion1920 order by id desc')->fetchAll();
        }
        
        public static function findAllExtendedInscripcion()
        {
            $sentencia='SELECT      licenciasfederacion1920.*,                  '
                    . '             formulariosinscripciones.id_formulario,     '
                    . '             formulariosinscripciones.federacion_nombre_directorio,'
                    . '             formulariosinscripciones.email,'
                    . '             formulariosinscripciones.nombre_madre,'
                    . '             formulariosinscripciones.telefono_madre,'
                    . '             formulariosinscripciones.nombre_padre,'
                    . '             formulariosinscripciones.telefono_padre,'
                    . '             horarios_equipos_19_20.equipo as alqueria_equipo_nombre'
                    . ' FROM        licenciasfederacion1920 '
                    . ' INNER JOIN  formulariosinscripciones        ON licenciasfederacion1920.id_formulariosinscripciones  = formulariosinscripciones.id_formulario'
                    . ' INNER JOIN  horarios_equipos_19_20          ON horarios_equipos_19_20.ID                            = formulariosinscripciones.id_equipo_horario'
                    . ' ORDER BY    licenciasfederacion1920.id      DESC';
            
            // error_log(__FILE__.__LINE__);
            // error_log($sentencia);
            
            return db::singleton()->query($sentencia)->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from licenciasfederacion1920 order by id desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from licenciasfederacion1920 group by id')->fetch();
        }
        
    	public static function insert($dni_jugador, $rol, $fecha_solicitud, $nombre_equipo, $categoria, 
		$club, $fecha_nacimiento, $nombre, $apellidos)
        {        
            $sql='INSERT INTO licenciasfederacion1920(dni_jugador, rol, fecha_solicitud, nombre_equipo, categoria, 
		club, fecha_nacimiento, nombre, apellidos)
		VALUES(:dni_jugador, :rol, :fecha_solicitud, :nombre_equipo, :categoria, 
		:club, :fecha_nacimiento, :nombre, :apellidos)';

            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':dni_jugador'=>$dni_jugador,':rol'=>$rol,':fecha_solicitud'=>$fecha_solicitud,':nombre_equipo'=>$nombre_equipo,':categoria'=>$categoria,
		':club'=>$club,':fecha_nacimiento'=>$fecha_nacimiento,':nombre'=>$nombre,':apellidos'=>$apellidos);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return self::findLast();}
        }
        
        public static function insertBasico($dni_jugador, $rol, $fecha_solicitud, $fecha_nacimiento, $nombre, $apellidos,$id_formulariosinscripciones){
            $sql='INSERT INTO licenciasfederacion1920(dni_jugador, rol, fecha_solicitud, fecha_nacimiento, nombre, apellidos,id_formulariosinscripciones)
		VALUES(:dni_jugador, :rol, :fecha_solicitud, :fecha_nacimiento, :nombre, :apellidos, :id_formulariosinscripciones)';

            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(   ':dni_jugador'                  =>$dni_jugador,                     ':rol'=>$rol,       ':fecha_solicitud'=>$fecha_solicitud,
                            ':fecha_nacimiento'             =>$fecha_nacimiento,                ':nombre'=>$nombre, ':apellidos'=>$apellidos,
                            ':id_formulariosinscripciones'  =>$id_formulariosinscripciones);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return self::findLast();}
        }

	public static function update($id, $dni_jugador, $rol, $fecha_solicitud, $nombre_equipo, 
		$categoria, $club, $fecha_nacimiento, $nombre, $apellidos)
        {        
            $sql='UPDATE licenciasfederacion1920 
		SET 
		id=:id,dni_jugador=:dni_jugador,rol=:rol,fecha_solicitud=:fecha_solicitud,nombre_equipo=:nombre_equipo,
		categoria=:categoria,club=:club,fecha_nacimiento=:fecha_nacimiento,nombre=:nombre,apellidos=:apellidos 
		WHERE
		id=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$id,':dni_jugador'=>$dni_jugador,':rol'=>$rol,':fecha_solicitud'=>$fecha_solicitud,':nombre_equipo'=>$nombre_equipo,
		':categoria'=>$categoria,':club'=>$club,':fecha_nacimiento'=>$fecha_nacimiento,':nombre'=>$nombre,':apellidos'=>$apellidos);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

        public static function updateDatosEquipoByDNI($dni_jugador, $nombre_equipo, $categoria, $club)
        {        
            $sql='UPDATE licenciasfederacion1920 
		SET 
                    nombre_equipo=:nombre_equipo,
                    categoria=:categoria,
                    club=:club
		WHERE
                    dni_jugador=:dni_jugador';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':dni_jugador'=>$dni_jugador,':nombre_equipo'=>$nombre_equipo,':categoria'=>$categoria,':club'=>$club);
    
            if(!$query->execute($datos)){
                error_log(__FILE__.__LINE__);
                error_log(print_r( $query->errorInfo(),1));die;
            }
            else{
                error_log(__FILE__.__LINE__);
                return true;
            }
        }
        
        public static function updateDatosEquipoByID($id, $nombre_equipo, $categoria, $club)
        {        
            $sql='UPDATE licenciasfederacion1920 
		SET 
                    nombre_equipo=:nombre_equipo,
                    categoria=:categoria,
                    club=:club
		WHERE
                    id=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$id,':nombre_equipo'=>$nombre_equipo,':categoria'=>$categoria,':club'=>$club);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return self::findByid($id);}
        }
        
	/***********************
	****  METODOS FIND   ***
	***********************/
	public static function findByid($id)
	{
            return db::singleton()->query('select * from licenciasfederacion1920 WHERE id='.$id)->fetch();
	}
        
        public static function findByidExtendedFormulariosInscripciones($id_licenciasfederacion1920)
	{
            $sentencia_sql='SELECT       licenciasfederacion1920.*, '
                            . ' formulariosinscripciones.id_formulario,'
                            . ' federacion_equipos.Nombre as federacion_equipo_nombre,'
                     . '             formulariosinscripciones.email,'
                    . '             formulariosinscripciones.nombre_apellidos,'
                    . '             horarios_equipos_19_20.equipo as alqueria_equipo_nombre'
                . ' FROM        licenciasfederacion1920 '
                . ' INNER JOIN  formulariosinscripciones        ON licenciasfederacion1920.id_formulariosinscripciones  =   formulariosinscripciones.id_formulario'
                . ' INNER JOIN  federacion_equipos              ON federacion_equipos.ID                                =   formulariosinscripciones.id_federacion_equipo'
                . ' INNER JOIN  horarios_equipos_19_20          ON horarios_equipos_19_20.ID                            = formulariosinscripciones.id_equipo_horario'
                . ' WHERE       licenciasfederacion1920.id  = '.$id_licenciasfederacion1920;
            
            //  error_log(__FILE__.__LINE__);
            //  error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetch();
	}

	public static function findBydni_jugador($dni_jugador)
	{
		return db::singleton()->query('select * from licenciasfederacion1920 WHERE dni_jugador='.$dni_jugador)->fetch();
	}

	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from licenciasfederacion1920';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByid($id)
    	{
    		$sql="delete from licenciasfederacion1920 where id=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$id);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteBydni_jugador($dni_jugador)
    	{
    		$sql="delete from licenciasfederacion1920 where dni_jugador=:dni_jugador";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':dni_jugador'=>$dni_jugador);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>