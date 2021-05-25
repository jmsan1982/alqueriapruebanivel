<?php
    class declaracion_responsable_alqueria
    {
        /**********************
		****  METODOS FIND  ***
		***********************/
        public static function findAll()
        {   return db::singleton()->query('SELECT * FROM declaracion_responsable_alqueria')->fetchAll();   }

        public static function findLast()
        {   return db::singleton()->query('SELECT * FROM declaracion_responsable_alqueria ORDER BY id desc limit 1')->fetch();    }

        public static function getCount()
        {   return db::singleton()->query('SELECT *,count(*) FROM declaracion_responsable_alqueria GROUP BY id')->fetch();    }
        
        public static function getAttributeList()
        {
            return db::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueriaforms" and table_name="declaracion_responsable_alqueria"')->fetchAll();
        }
        
    	public static function findBydni($dni)
		{   return db::singleton()->query('SELECT * FROM declaracion_responsable_alqueria WHERE dni="'.$dni.'"')->fetch();}

        public static function findBynombre_completo($nombre_completo)
		{   return db::singleton()->query('SELECT * FROM declaracion_responsable_alqueria WHERE nombre_completo="'.$nombre_completo.'"')->fetch();}


		/***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($nombre_completo, $dni, $telefono, $email, $domicilio_completo, $equipo_partido, $pista_responsable , $visita_instalaciones, $responsable, $nombreResponsable, $streaming, $arbitro, $oficialMesa, $nombre_equipo, $firma)
        {        
            $sql='
            INSERT INTO declaracion_responsable_alqueria(nombre_completo, dni, telefono, email, domicilio_completo, equipo_partido, pista_responsable, nombre_responsable, visita_instalaciones, es_responsable, acepta_streaming, es_arbitro, es_oficialDeMesa, nombre_equipo, firma)
			VALUES(:nombre_completo, :dni, :telefono, :email, :domicilio_completo, :equipo_partido, :pista_responsable, :nombreResponsable, :visita_instalaciones, :responsable, :streaming, :arbitro, :oficialMesa, :nombre_equipo, :firma)';
   
            $query=db::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':nombre_completo' => $nombre_completo, ':dni' => $dni, ':telefono' => $telefono, ':email'=> $email, ':domicilio_completo' => $domicilio_completo, ':equipo_partido' => $equipo_partido, ':pista_responsable'=> $pista_responsable , ':visita_instalaciones'=> $visita_instalaciones, ':responsable'=>$responsable, ':nombreResponsable'=>$nombreResponsable ,':streaming'=>$streaming, ':arbitro'=>$arbitro , ':oficialMesa'=>$oficialMesa ,':nombre_equipo' => $nombre_equipo, ':firma' => $firma);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }

        // Para la consulta de exportar a Excel
        public static function findAllInscripcionesExcel() {
            $query = db::singleton()->query('select telefono, convert(cast(convert(nombre_completo using latin1) as binary) using utf8) as nombre, convert(cast(convert(dni using latin1) as binary) using utf8) as dni, convert(cast(convert(domicilio_completo using latin1) as binary) using utf8) as domicilio, convert(cast(convert(nombre_medio_comunicacion using latin1) as binary) using utf8) as nombre_medio from declaracion_responsable order by id desc');
            if ($query)
                return $query->fetchAll(PDO::FETCH_ASSOC);

            else
                return false;
        }

        // Para la consulta de exportar a Excel
        public static function findAllInscripcionesExcelProveedores() {
            $query = db::singleton()->query('select telefono, convert(cast(convert(nombre_completo using latin1) as binary) using utf8) as nombre, convert(cast(convert(dni using latin1) as binary) using utf8) as dni, convert(cast(convert(domicilio_completo using latin1) as binary) using utf8) as domicilio, convert(cast(convert(nombre_proveedor using latin1) as binary) using utf8) as nombre_proveedor from declaracion_responsable order by id desc');
            if ($query)
                return $query->fetchAll(PDO::FETCH_ASSOC);

            else
                return false;
        }

        // Para la consulta de exportar a Excel
        public static function findAllInscripcionesExcelVip() {
            $query = db::singleton()->query('select telefono, convert(cast(convert(nombre_completo using latin1) as binary) using utf8) as nombre, convert(cast(convert(dni using latin1) as binary) using utf8) as dni, convert(cast(convert(domicilio_completo using latin1) as binary) using utf8) as domicilio from declaracion_responsable_vip order by id desc');
            if ($query)
                return $query->fetchAll(PDO::FETCH_ASSOC);

            else
                return false;
        }

   }
?>