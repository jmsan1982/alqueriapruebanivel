<?php 
/************************************************
Model Generator: 	V1.03 (2019-02-22) 
Autor: 			Pablo Muñoz Julve
Fecha de la generación: 2019-10-10 13:44:32
************************************************/

    class formularios_liga_alqueria_partidos
    {
        public static function findAll(){
            return db::singleton()->query('select * from formularios_liga_alqueria_partidos')->fetchAll();
        }

        public static function findLast(){
            return db::singleton()->query('select * from formularios_liga_alqueria_partidos order by ID desc limit 1')->fetch();
        }

        public static function getCount(){
            return db::singleton()->query('select *,count(*) from formularios_liga_alqueria_partidos group by ID')->fetch();
        }
        
    	public static function insert($FechaPartido, $IDPista, $Jornada, $Categoria, $Division, 
		$IDEquipoLocal, $IDEquipoVisitante, $PuntosLocal, $PuntosVisitante, $ComentarioPublico, 
		$PartidoTerminado)
        {        
            $sql='INSERT INTO formularios_liga_alqueria_partidos(FechaPartido, IDPista, Jornada, Categoria, Division, 
		IDEquipoLocal, IDEquipoVisitante, PuntosLocal, PuntosVisitante, ComentarioPublico, 
		PartidoTerminado)
		VALUES(:fechapartido, :idpista, :jornada, :categoria, :division, 
		:idequipolocal, :idequipovisitante, :puntoslocal, :puntosvisitante, :comentariopublico, 
		:partidoterminado)';

        
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));die;}
            $datos=array(':fechapartido'=>$FechaPartido,':idpista'=>$IDPista,':jornada'=>$Jornada,':categoria'=>$Categoria,':division'=>$Division,
		':idequipolocal'=>$IDEquipoLocal,':idequipovisitante'=>$IDEquipoVisitante,':puntoslocal'=>$PuntosLocal,':puntosvisitante'=>$PuntosVisitante,':comentariopublico'=>$ComentarioPublico,
		':partidoterminado'=>$PartidoTerminado);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{/*error_log(__FILE__.__FUNCTION__.__LINE__);*/}
            return self::findLast();
        }

	public static function update($ID, $FechaPartido, $IDPista, $Jornada, $Categoria, 
		$Division, $IDEquipoLocal, $IDEquipoVisitante, $PuntosLocal, $PuntosVisitante, 
		$ComentarioPublico, $PartidoTerminado)
        {        
            $sql='UPDATE formularios_liga_alqueria_partidos 
		SET 
		id=:id,fechapartido=:fechapartido,idpista=:idpista,jornada=:jornada,categoria=:categoria,
		division=:division,idequipolocal=:idequipolocal,idequipovisitante=:idequipovisitante,puntoslocal=:puntoslocal,puntosvisitante=:puntosvisitante,
		comentariopublico=:comentariopublico,partidoterminado=:partidoterminado 
		WHERE
		ID=:id';

            $query=db::singleton()->prepare($sql);
            
            $datos=array(':id'=>$ID,':fechapartido'=>$FechaPartido,':idpista'=>$IDPista,':jornada'=>$Jornada,':categoria'=>$Categoria,
		':division'=>$Division,':idequipolocal'=>$IDEquipoLocal,':idequipovisitante'=>$IDEquipoVisitante,':puntoslocal'=>$PuntosLocal,':puntosvisitante'=>$PuntosVisitante,
		':comentariopublico'=>$ComentarioPublico,':partidoterminado'=>$PartidoTerminado);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }

	/**********************
	**** METODOS FIND ***
	***********************/
	public static function findByID($ID)
	{
		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE ID='.$ID)->fetch();
	}

	public static function findByIDPista($IDPista)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE IDPista='.$IDPista)->fetchAll();
    	}

        	public static function findByJornada($Jornada)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE Jornada='.$Jornada)->fetchAll();
    	}

        	public static function findByCategoria($Categoria)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE Categoria='.$Categoria)->fetchAll();
    	}

        	public static function findByDivision($Division)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE Division='.$Division)->fetchAll();
    	}

        	public static function findByIDEquipoLocal($IDEquipoLocal)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE IDEquipoLocal='.$IDEquipoLocal)->fetchAll();
    	}

        	public static function findByIDEquipoVisitante($IDEquipoVisitante)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE IDEquipoVisitante='.$IDEquipoVisitante)->fetchAll();
    	}

        	public static function findByPartidoTerminado($PartidoTerminado)
    	{
    		return db::singleton()->query('select * from formularios_liga_alqueria_partidos WHERE PartidoTerminado='.$PartidoTerminado)->fetchAll();
    	}

        	/**********************
	**** METODOS DELETE ***
	***********************/
	public static function deleteAll()
	{
		$sql='delete from formularios_liga_alqueria_partidos';

		$query=db::singleton()->prepare($sql);

		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

		$datos=array();

		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
	
	}

	public static function deleteByID($ID)
    	{
    		$sql="delete from formularios_liga_alqueria_partidos where ID=:id";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':id'=>$ID);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByIDPista($IDPista){
    		$sql="delete from formularios_liga_alqueria_partidos where IDPista=:idpista";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':idpista'=>$IDPista);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByJornada($Jornada){
    		$sql="delete from formularios_liga_alqueria_partidos where Jornada=:jornada";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':jornada'=>$Jornada);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByCategoria($Categoria){
    		$sql="delete from formularios_liga_alqueria_partidos where Categoria=:categoria";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':categoria'=>$Categoria);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByDivision($Division){
    		$sql="delete from formularios_liga_alqueria_partidos where Division=:division";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':division'=>$Division);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByIDEquipoLocal($IDEquipoLocal){
    		$sql="delete from formularios_liga_alqueria_partidos where IDEquipoLocal=:idequipolocal";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':idequipolocal'=>$IDEquipoLocal);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByIDEquipoVisitante($IDEquipoVisitante){
    		$sql="delete from formularios_liga_alqueria_partidos where IDEquipoVisitante=:idequipovisitante";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':idequipovisitante'=>$IDEquipoVisitante);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

	public static function deleteByPartidoTerminado($PartidoTerminado){
    		$sql="delete from formularios_liga_alqueria_partidos where PartidoTerminado=:partidoterminado";

    		$query=db::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));die;}

    		$datos=array(':partidoterminado'=>$PartidoTerminado);

    		if(!$x=$query->execute($datos)){error_log(var_dump( db::singleton()->errorInfo()));die;}
    	}

   }
?>