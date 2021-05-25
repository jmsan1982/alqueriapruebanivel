<?php 
    /************************************************
    Model Generator:           V1.03 (2019-02-22) 
    Autor:                     Pablo Muñoz Julve
    Fecha de la generación:    2020-03-21 20:10:13
    ************************************************/
    class jugadores
    {
        /**********************
        **** METODOS FIND ***
        ***********************/
        public static function findByid_jugador($id_jugador)
        { error_log('jugador a buscar: '.$id_jugador);
            $sentencia_sql='SELECT '
            . ' jugadores.id_jugador,		jugadores.nombre,			jugadores.apellidos,	jugadores.email,	jugadores.fecha,	
                    jugadores.categoria,		jugadores.fecha_nacimiento,	jugadores.direccion,	jugadores.numero,	jugadores.piso,
                    jugadores.puerta,			jugadores.poblacion,		jugadores.codigo_postal,jugadores.provincia,jugadores.nombre_madre,
                    jugadores.apellidos_madre,	jugadores.dni_madre,		jugadores.email_madre,	jugadores.telefono_madre,	jugadores.estudios_madre,
                    jugadores.nombre_padre,		jugadores.apellidos_padre,	jugadores.dni_padre,	jugadores.telefono_padre,	jugadores.email_padre,
                    jugadores.estudios_padre,	jugadores.talla_camiseta,	jugadores.numero_camiseta,	jugadores.alergias,		jugadores.titular_banco,
                    jugadores.dni_titular,		jugadores.iban,				jugadores.entidad,			jugadores.oficina,		jugadores.dc,
                    jugadores.cuenta,			jugadores.dni_tutor,		jugadores.dni_jugador,		jugadores.temporada,			jugadores.is_active,
                    jugadores.id_equipo_horario,jugadores.observaciones,	jugadores.idequipo_alqueria,jugadores.autoriza_modificacion,jugadores.sexo,
                    jugadores.nacionalidad,		jugadores.tipo_documento,	jugadores.fecha_cad_dni,	jugadores.pais_nacimiento,		jugadores.num_hermanos,
                    jugadores.edades,			jugadores.en_el_club,		jugadores.cuota,			jugadores.monoparental,         jugadores.telefono_jugador, jugadores.colegio, jugadores.curso,
                    jugadores.foto,             jugadores.dni_delante,      jugadores.dni_detras,       jugadores.sip, jugadores.pasaporte,'
            . '     equipos.nombre_equipo_cas,  equipos.seccion,            equipos.nombre_equipo_nueva_temporada'
            . ' FROM jugadores '
            . ' LEFT JOIN equipos ON jugadores.idequipo_alqueria=equipos.id_equipo WHERE jugadores.id_jugador='.$id_jugador;
            
//            error_log(__FILE__.__LINE__);
//            error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }

        public static function findByemail($email)
        {
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE email="'.$email.'"')->fetch();
        }



        public static function findBydni_jugador($dni_jugador)
        {
            $sentencia_sql='SELECT '
                . ' jugadores.id_jugador,		jugadores.nombre,			jugadores.apellidos,	jugadores.email,	jugadores.fecha,	
                    jugadores.categoria,		jugadores.fecha_nacimiento,	jugadores.direccion,	jugadores.numero,	jugadores.piso,
                    jugadores.puerta,			jugadores.poblacion,		jugadores.codigo_postal,jugadores.provincia,jugadores.nombre_madre,
                    jugadores.apellidos_madre,	jugadores.dni_madre,		jugadores.email_madre,	jugadores.telefono_madre,	jugadores.estudios_madre,
                    jugadores.nombre_padre,		jugadores.apellidos_padre,	jugadores.dni_padre,	jugadores.telefono_padre,	jugadores.email_padre,
                    jugadores.estudios_padre,	jugadores.talla_camiseta,	jugadores.numero_camiseta,	jugadores.alergias,		jugadores.titular_banco,
                    jugadores.dni_titular,		jugadores.iban,				jugadores.entidad,			jugadores.oficina,		jugadores.dc,
                    jugadores.cuenta,			jugadores.dni_tutor,		jugadores.dni_jugador,		jugadores.temporada,			jugadores.is_active,
                    jugadores.id_equipo_horario,jugadores.observaciones,	jugadores.idequipo_alqueria,jugadores.autoriza_modificacion,jugadores.sexo,
                    jugadores.nacionalidad,		jugadores.tipo_documento,	jugadores.fecha_cad_dni,	jugadores.pais_nacimiento,		jugadores.num_hermanos,
                    jugadores.edades,			jugadores.en_el_club,		jugadores.cuota,			jugadores.monoparental, jugadores.telefono_jugador, jugadores.colegio, jugadores.curso,'
            . '     equipos.nombre_equipo_cas,  equipos.seccion,            equipos.nombre_equipo_nueva_temporada   '
            . ' FROM jugadores '
            . ' LEFT JOIN       equipos ON jugadores.idequipo_alqueria=equipos.id_equipo WHERE jugadores.dni_jugador="'.$dni_jugador.'"';
            
            //  error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }


        
        public static function findBydni_jugadorYCodigoVerificacion($dni_jugador,$codigo_verificacion)
        {
            $sentencia_sql='SELECT '
                . ' jugadores.id_jugador,		jugadores.nombre,			jugadores.apellidos,	jugadores.email,	jugadores.fecha,	
                    jugadores.categoria,		jugadores.fecha_nacimiento,	jugadores.direccion,	jugadores.numero,	jugadores.piso,
                    jugadores.puerta,			jugadores.poblacion,		jugadores.codigo_postal,jugadores.provincia,jugadores.nombre_madre,
                    jugadores.apellidos_madre,	jugadores.dni_madre,		jugadores.email_madre,	jugadores.telefono_madre,	jugadores.estudios_madre,
                    jugadores.nombre_padre,		jugadores.apellidos_padre,	jugadores.dni_padre,	jugadores.telefono_padre,	jugadores.email_padre,
                    jugadores.estudios_padre,	jugadores.talla_camiseta,	jugadores.numero_camiseta,	jugadores.alergias,		jugadores.titular_banco,
                    jugadores.dni_titular,		jugadores.iban,				jugadores.entidad,			jugadores.oficina,		jugadores.dc,
                    jugadores.cuenta,			jugadores.dni_tutor,		jugadores.dni_jugador,		jugadores.temporada,			jugadores.is_active,
                    jugadores.id_equipo_horario,jugadores.observaciones,	jugadores.idequipo_alqueria,jugadores.autoriza_modificacion,jugadores.sexo,
                    jugadores.nacionalidad,		jugadores.tipo_documento,	jugadores.fecha_cad_dni,	jugadores.pais_nacimiento,		jugadores.num_hermanos,
                    jugadores.edades,			jugadores.en_el_club,		jugadores.cuota,			jugadores.monoparental,         jugadores.telefono_jugador, 
                    jugadores.colegio,          jugadores.curso,'
            . '     equipos.nombre_equipo_cas,  equipos.seccion,            equipos.nombre_equipo_nueva_temporada   '
            . ' FROM jugadores '
            . ' LEFT JOIN       '
            . '         equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE   jugadores.dni_jugador="'.$dni_jugador.'" 
                        AND jugadores.is_active=1  
                        AND jugadores.autoriza_modificacion=1  '
            . '         AND jugadores.codigo_verificacion='.$codigo_verificacion;
            
             // error_log(__FILE__.__FUNCTION__.__LINE__);
             // error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }


       

        //BUSCAR UN JUGADOR INSCRITO PARA LA ACTULIZACION DE FIRMAS O IMAGENES
        public static function findJugadorInscrito_ByDni_CodVerif($dni_jugador,$codigo_verificacion)
        {
            $sentencia_sql='SELECT 
                                ins.id_inscripcion,  ins.temporada, ins.seccion,  ins.equipo,
                                j.* 
                            FROM        inscripciones_escuela_cantera ins 
                            INNER JOIN  jugadores j     ON  ins.id_jugador=j.id_jugador
                            WHERE 
                                 (j.dni_jugador="'.$dni_jugador.'" or j.dni_padre="'.$dni_jugador.'" or j.dni_madre="'.$dni_jugador.'" ) '
                             . ' AND j.codigo_verificacion="'.$codigo_verificacion.'" 
                                 AND j.is_active=1 
                                 AND j.autoriza_modificacion=1 
                                 AND ins.temporada="20/21" ';
            
            //  error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }
        
        //  findByDNIYCodigoVerificacionYActivoYTemporada() busca jugador inscrito 
        public static function findByDNIYCodigoVerificacionYActivoYTemporada($dni_jugador,$codigo_verificacion,$temporada="20/21")
        {
            $sentencia_sql='SELECT 
                                ins.id_inscripcion,  ins.temporada, ins.seccion,  ins.equipo,
                                j.* 
                            FROM        inscripciones_escuela_cantera ins 
                            INNER JOIN  jugadores j     ON  ins.id_jugador=j.id_jugador
                            WHERE 
                                 (j.dni_jugador="'.$dni_jugador.'" or j.dni_padre="'.$dni_jugador.'" or j.dni_madre="'.$dni_jugador.'" ) '
                             . ' AND j.codigo_verificacion="'.$codigo_verificacion.'" 
                                 AND j.is_active=1 
                                 AND ins.temporada="'.$temporada.'" ';
            
            //  error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }

        //  findByDNIYCodigoVerificacionYActivo() busca jugador inscrito (sin tener en cuenta temporada)
        public static function findByDNIYCodigoVerificacionYActivo($dni_jugador,$codigo_verificacion)
        {
            $sentencia_sql='SELECT 
                                j.*, 
                                e.nombre_equipo_nueva_temporada as equipo
                            FROM        jugadores j
                            LEFT JOIN   equipos e ON e.id_equipo=j.idequipo_alqueria
                            WHERE 
                                 (j.dni_jugador="'.$dni_jugador.'" or j.dni_padre="'.$dni_jugador.'" or j.dni_madre="'.$dni_jugador.'" ) '
                             . ' AND j.codigo_verificacion="'.$codigo_verificacion.'" 
                                 AND j.is_active=1 
                            ';
            
             // error_log(__FILE__.__FUNCTION__.__LINE__);
            //  error_log($sentencia_sql);
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetch();
        }
        
        public static function findBydniPadreMadreYCategoria($dni,$categoria)
        {   
            $sentencia_sql='SELECT '
            . ' jugadores.id_jugador,		jugadores.nombre,			jugadores.apellidos,	jugadores.email,	jugadores.fecha,	
                    jugadores.categoria,		jugadores.fecha_nacimiento,	jugadores.direccion,	jugadores.numero,	jugadores.piso,
                    jugadores.puerta,			jugadores.poblacion,		jugadores.codigo_postal,jugadores.provincia,jugadores.nombre_madre,
                    jugadores.apellidos_madre,	jugadores.dni_madre,		jugadores.email_madre,	jugadores.telefono_madre,	jugadores.estudios_madre,
                    jugadores.nombre_padre,		jugadores.apellidos_padre,	jugadores.dni_padre,	jugadores.telefono_padre,	jugadores.email_padre,
                    jugadores.estudios_padre,	jugadores.talla_camiseta,	jugadores.numero_camiseta,	jugadores.alergias,		jugadores.titular_banco,
                    jugadores.dni_titular,		jugadores.iban,				jugadores.entidad,			jugadores.oficina,		jugadores.dc,
                    jugadores.cuenta,			jugadores.dni_tutor,		jugadores.dni_jugador,		jugadores.temporada,			jugadores.is_active,
                    jugadores.id_equipo_horario,jugadores.observaciones,	jugadores.idequipo_alqueria,jugadores.autoriza_modificacion,jugadores.sexo,
                    jugadores.nacionalidad,		jugadores.tipo_documento,	jugadores.fecha_cad_dni,	jugadores.pais_nacimiento,		jugadores.num_hermanos,
                    jugadores.edades,			jugadores.en_el_club,		jugadores.cuota,			jugadores.monoparental, jugadores.telefono_jugador, jugadores.colegio, jugadores.curso,'
            . '     equipos.nombre_equipo_cas,  equipos.seccion '
            . ' FROM jugadores LEFT JOIN equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE jugadores.categoria="'.$categoria.'" AND (jugadores.dni_padre="'.$dni.'" OR jugadores.dni_madre="'.$dni.'" OR jugadores.dni_tutor="'.$dni.'")';
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll(); 
        }

        public static function findBydniPadreMadreYCategoriaYCodigoVerificado($dni,$categoria)
        {   
            $sentencia_sql='SELECT '
            . ' jugadores.id_jugador,		jugadores.nombre,			jugadores.apellidos,	jugadores.email,	jugadores.fecha,	
                    jugadores.categoria,		jugadores.fecha_nacimiento,	jugadores.direccion,	jugadores.numero,	jugadores.piso,
                    jugadores.puerta,			jugadores.poblacion,		jugadores.codigo_postal,jugadores.provincia,jugadores.nombre_madre,
                    jugadores.apellidos_madre,	jugadores.dni_madre,		jugadores.email_madre,	jugadores.telefono_madre,	jugadores.estudios_madre,
                    jugadores.nombre_padre,		jugadores.apellidos_padre,	jugadores.dni_padre,	jugadores.telefono_padre,	jugadores.email_padre,
                    jugadores.estudios_padre,	jugadores.talla_camiseta,	jugadores.numero_camiseta,	jugadores.alergias,		jugadores.titular_banco,
                    jugadores.dni_titular,		jugadores.iban,				jugadores.entidad,			jugadores.oficina,		jugadores.dc,
                    jugadores.cuenta,			jugadores.dni_tutor,		jugadores.dni_jugador,		jugadores.temporada,			jugadores.is_active,
                    jugadores.id_equipo_horario,jugadores.observaciones,	jugadores.idequipo_alqueria,jugadores.autoriza_modificacion,jugadores.sexo,
                    jugadores.nacionalidad,		jugadores.tipo_documento,	jugadores.fecha_cad_dni,	jugadores.pais_nacimiento,		jugadores.num_hermanos,
                    jugadores.edades,			jugadores.en_el_club,		jugadores.cuota,			jugadores.monoparental, jugadores.telefono_jugador, jugadores.colegio, jugadores.curso,'
            . '     equipos.nombre_equipo_cas,  equipos.seccion '
            . ' FROM jugadores LEFT JOIN equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE jugadores.categoria="'.$categoria.'" AND (jugadores.dni_padre="'.$dni.'" OR jugadores.dni_madre="'.$dni.'" OR jugadores.dni_tutor="'.$dni.'")';
            
            return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll(); 
        }

        public static function findByis_active($is_active)
        {
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE is_active='.$is_active)->fetchAll();
        }

        //listao de jugadores activos, muestra los datos del equipo tambien
        public static function findByis_active_temporada()
        {
            return db_2_utf8::singleton()->query('SELECT * FROM view_jugadores WHERE is_active=1 and temporada like "%21"')->fetchAll();
        }

        //sacamos el excel de cantera  y escuela, pasamos el filtro de la condicion
        public static function findAllInscripcionesExportExcelCantera_Escuela($condicion)
        {
           $sentencia_sql='SELECT j.categoria AS Categoria,j.temporada AS Temporada, j.id_jugador AS Cod_Jugador, ins.fecha_registro as FechaInscripcion,ins.tipo_inscripcion as TipoInscripcion, j.sexo AS Genero, j.nombre aS Nombre, j.apellidos AS Apellidos, j.tipo_documento AS Tipo_doc, j.dni_jugador AS dni_jugador, j.fecha_cad_dni AS fecha_cad_dni, j.email AS Email_jug, j.telefono_jugador as Telef_jugador, j.fecha_nacimiento AS Fecha_nacimiento, j.direccion AS Direccion, j.numero AS Numero, j.piso AS Piso, j.puerta AS Puerta, j.poblacion AS Poblacion,j.codigo_postal AS Cp, j.provincia AS Provincia, j.nombre_padre AS Padre, j.apellidos_padre AS Apellidos_Padre, j.nombre_madre AS Nombre_Madre, j.apellidos_madre AS Apellidos_Madre, j.telefono_padre AS Telefono_padre, j.telefono_madre AS Telefono_madre, j.dni_padre AS Dni_padre, j.dni_madre AS Dni_madre, j.email_madre AS Email_Madre, j.email_padre AS Email_Padre, j.estudios_madre AS Estudios_madre, j.estudios_padre AS Estudios_padre, j.monoparental AS monoparental,
           j.talla_camiseta AS Talla_camiseta,j.numero_camiseta AS Numero_camiseta,j.alergias AS Alergias, j.colegio as Colegio, j.curso as Curso, j.titular_banco AS Titular_banco,j.dni_titular AS Dni_titular_banco, concat_ws(" ", j.iban ,j.entidad ,j.oficina ,j.dc ,j.cuenta ) AS Cuenta,
            j.is_active AS is_active, j.autoriza_modificacion AS autoriza_modificacion, j.nacionalidad AS nacionalidad, j.pais_nacimiento AS pais_nacimiento,j.num_hermanos AS num_hermanos,j.edades AS edades,j.en_el_club AS en_el_club,j.cuota AS cuota,j.idequipo_alqueria AS idequipo_alqueria, e.nombre_equipo_cas AS Equipo, e.seccion AS Seccion,e.nombre_fed AS Nombre_fed, e.categoria_fed AS Categoria_fed, jp.numero_pedido, jp.fecha_creacion_pago as Fecha_Pago, jp.nombre_pago as Pago_de, jp.cantidad as Importe, jp.metodo_pago as FormaPago, if(jp.confirmacion_pago=1, "Si", "No") as Pagado, jp.Ds_Response as ErrorPagoTpv
            
            from jugadores j left join equipos e on e.id_equipo = j.idequipo_alqueria 
            inner join inscripciones_escuela_cantera ins on ins.id_jugador=j.id_jugador
            left join jugadores_pagos jp on jp.id_inscripcion=ins.id_inscripcion

            WHERE j.is_active=1 and ins.temporada like "%21" and (jp.nombre_pago = "Reserva Matrícula Temp. 20/21" or jp.nombre_pago ="primer pago") and ins.seccion ' .$condicion .' "Cantera%"';

           return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll(PDO::FETCH_ASSOC);
        }


        //sacamos el excel de patronato
        public static function findAllInscripcionesExportExcelPatronato()
        {
           $sentencia_sql='SELECT j.categoria AS Categoria,j.temporada AS Temporada, j.id_jugador AS Cod_Jugador, ins.fecha_registro as FechaInscripcion,ins.tipo_inscripcion as TipoInscripcion, j.sexo AS Genero, j.nombre aS Nombre, j.apellidos AS Apellidos, j.tipo_documento AS Tipo_doc, j.dni_jugador AS dni_jugador, j.fecha_cad_dni AS fecha_cad_dni, j.email AS Email_jug, j.telefono_jugador as Telef_jugador, j.fecha_nacimiento AS Fecha_nacimiento, j.direccion AS Direccion, j.numero AS Numero, j.piso AS Piso, j.puerta AS Puerta, j.poblacion AS Poblacion,j.codigo_postal AS Cp, j.provincia AS Provincia, j.nombre_padre AS Padre, j.apellidos_padre AS Apellidos_Padre, j.nombre_madre AS Nombre_Madre, j.apellidos_madre AS Apellidos_Madre, j.telefono_padre AS Telefono_padre, j.telefono_madre AS Telefono_madre, j.dni_padre AS Dni_padre, j.dni_madre AS Dni_madre, j.email_madre AS Email_Madre, j.email_padre AS Email_Padre, j.estudios_madre AS Estudios_madre, j.estudios_padre AS Estudios_padre, j.monoparental AS monoparental,
           j.talla_camiseta AS Talla_camiseta,j.numero_camiseta AS Numero_camiseta,j.alergias AS Alergias, j.colegio as Colegio, j.curso as Curso, j.titular_banco AS Titular_banco,j.dni_titular AS Dni_titular_banco, concat_ws(" ", j.iban ,j.entidad ,j.oficina ,j.dc ,j.cuenta ) AS Cuenta,
            j.is_active AS is_active, j.autoriza_modificacion AS autoriza_modificacion, j.nacionalidad AS nacionalidad, j.pais_nacimiento AS pais_nacimiento,j.num_hermanos AS num_hermanos,j.edades AS edades,j.en_el_club AS en_el_club,j.cuota AS cuota,j.idequipo_alqueria AS idequipo_alqueria, e.nombre_equipo_cas AS Equipo, e.seccion AS Seccion,e.nombre_fed AS Nombre_fed, e.categoria_fed AS Categoria_fed, jp.numero_pedido, jp.fecha_creacion_pago as Fecha_Pago, jp.nombre_pago as Pago_de, jp.cantidad as Importe, jp.metodo_pago as FormaPago, if(jp.confirmacion_pago=1, "Si", "No") as Pagado, jp.Ds_Response as ErrorPagoTpv
            
            from jugadores j left join equipos e on e.id_equipo = j.idequipo_alqueria 
            inner join inscripciones_escuela_cantera ins on ins.id_jugador=j.id_jugador
            left join jugadores_pagos jp on jp.id_inscripcion=ins.id_inscripcion

            WHERE j.is_active=1 and ins.temporada like "%21" and ins.seccion="PATRONATO" and jp.nombre_pago = "Matrícula Pat Temp. 20/21"';

           return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll(PDO::FETCH_ASSOC);
        }
        

        public static function findBytemporada($temporada)
        {
        return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE temporada='.$temporada)->fetchAll();
        }

        public static function findByid_equipo_alqueria($id_equipo_alqueria)
        {
        return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE id_equipo_alqueria='.$id_equipo_alqueria)->fetchAll();
        }
    
        public static function findByemail_madre($email_madre)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE email_madre='.$email_madre)->fetchAll();}

		public static function findByemail_padre($email_padre)
		{   return db_2_utf8::singleton()->query('SELECT * FROM jugadores WHERE email_padre='.$email_padre)->fetchAll();}
        
        public static function findAll(){
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores')->fetchAll();
        }

        public static function findAllExtendedEquipo(){
            return db_2_utf8::singleton()->query(''
            . ' SELECT * FROM jugadores INNER JOIN equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE autoriza_modificacion=1')->fetchAll();
        }
        
        public static function findByCategoriaExtendedEquipo($categoria)
        {
            //  SELECT * FROM `jugadores` WHERE 
            //      `categoria` LIKE '%cantera%' AND 
            //      `is_active` = 1 AND 
            //      `autoriza_modificacion` = 1 
            //  ORDER BY `autoriza_modificacion` ASC
            
            return db_2_utf8::singleton()->query(''
            . ' SELECT      * '
            . ' FROM        jugadores '
            . ' INNER JOIN  equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE       categoria="'.$categoria.'" AND is_active = 1 AND autoriza_modificacion=1')->fetchAll();
        }
        
        public static function findPepe(){
            return db_2_utf8::singleton()->query(''
            . ' SELECT      * '
            . ' FROM        jugadores '
            . ' INNER JOIN  equipos ON jugadores.idequipo_alqueria=equipos.id_equipo '
            . ' WHERE       autoriza_modificacion=1 AND id_jugador=1196')->fetchAll();
        }


        /*  para enviar la circular de que rellene las tallas*/
        public static function findJugadoresRenovadosPorCategoria($categoria)
        {
             return db_2_utf8::singleton()->query('SELECT * FROM jugadores where is_active = 1 and temporada="20/21" and categoria="'.$categoria.'" AND id_jugador>988 ORDER BY jugadores.id_jugador ASC')->fetchAll();

             //'SELECT * FROM jugadores where is_active = 1 and temporada="20/21" and categoria="'.$categoria.'"'

            
        }



        
        public static function findLast(){
            return db_2_utf8::singleton()->query('SELECT * FROM jugadores ORDER BY id_jugador desc limit 1')->fetch();
        }

        public static function getCount(){
            return db_2_utf8::singleton()->query('SELECT *,count(*) FROM jugadores GROUP BY id_jugador')->fetch();
        }
        
        public static function getAttributeList()
        {
            return db_2_utf8::singleton()->query(
            'SELECT
                COLUMN_NAME, DATA_TYPE
            FROM
                INFORMATION_SCHEMA.COLUMNS
            WHERE
                TABLE_SCHEMA="alqueria" and table_name="jugadores"')->fetchAll();
        }
        
        
        /***********************
		****  METODO INSERT  ***
		***********************/
		public static function insert($nombre, $apellidos, $email, $fecha, $categoria, 
		$fecha_nacimiento, $direccion, $numero, $piso, $puerta, 
		$poblacion, $codigo_postal, $provincia, $nombre_padre, $nombre_madre, 
		$telefono_padre, $telefono_madre, $talla_camiseta, $numero_camiseta, $alergias, 
		$titular_banco, $dni_titular, $iban, $entidad, $oficina, 
		$dc, $cuenta, $dni_tutor, $dni_jugador, $temporada, 
		$is_active, $id_equipo_horario, $observaciones, $idequipo_alqueria, $foto, 
		$dni_delante, $dni_detras, $autoriza_modificacion, $dni_padre, $dni_madre, 
		$pasaporte, $sip, $sexo, $nacionalidad, $tipo_documento, 
		$fecha_cad_dni, $pais_nacimiento, $num_hermanos, $edades, $en_el_club, 
		$cuota, $email_madre, $email_padre, $estudios_madre, $estudios_padre, 
		$monoparental, $apellidos_madre, $apellidos_padre)
        {        
            $sql='
            INSERT INTO jugadores(nombre, apellidos, email, fecha, categoria, 
		fecha_nacimiento, direccion, numero, piso, puerta, 
		poblacion, codigo_postal, provincia, nombre_padre, nombre_madre, 
		telefono_padre, telefono_madre, talla_camiseta, numero_camiseta, alergias, 
		titular_banco, dni_titular, iban, entidad, oficina, 
		dc, cuenta, dni_tutor, dni_jugador, temporada, 
		is_active, id_equipo_horario, observaciones, idequipo_alqueria, foto, 
		dni_delante, dni_detras, autoriza_modificacion, dni_padre, dni_madre, 
		pasaporte, sip, sexo, nacionalidad, tipo_documento, 
		fecha_cad_dni, pais_nacimiento, num_hermanos, edades, en_el_club, 
		cuota, email_madre, email_padre, estudios_madre, estudios_padre, 
		monoparental, apellidos_madre, apellidos_padre)
			VALUES(:nombre, :apellidos, :email, :fecha, :categoria, 
		:fecha_nacimiento, :direccion, :numero, :piso, :puerta, 
		:poblacion, :codigo_postal, :provincia, :nombre_padre, :nombre_madre, 
		:telefono_padre, :telefono_madre, :talla_camiseta, :numero_camiseta, :alergias, 
		:titular_banco, :dni_titular, :iban, :entidad, :oficina, 
		:dc, :cuenta, :dni_tutor, :dni_jugador, :temporada, 
		:is_active, :id_equipo_horario, :observaciones, :idequipo_alqueria, :foto, 
		:dni_delante, :dni_detras, :autoriza_modificacion, :dni_padre, :dni_madre, 
		:pasaporte, :sip, :sexo, :nacionalidad, :tipo_documento, 
		:fecha_cad_dni, :pais_nacimiento, :num_hermanos, :edades, :en_el_club, 
		:cuota, :email_madre, :email_padre, :estudios_madre, :estudios_padre, 
		:monoparental, :apellidos_madre, :apellidos_padre)';
   
            $query=db_2_utf8::singleton()->prepare($sql); 
            if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}
            $datos=array(':nombre'=>$nombre,':apellidos'=>$apellidos,':email'=>$email,':fecha'=>$fecha,':categoria'=>$categoria,
		':fecha_nacimiento'=>$fecha_nacimiento,':direccion'=>$direccion,':numero'=>$numero,':piso'=>$piso,':puerta'=>$puerta,
		':poblacion'=>$poblacion,':codigo_postal'=>$codigo_postal,':provincia'=>$provincia,':nombre_padre'=>$nombre_padre,':nombre_madre'=>$nombre_madre,
		':telefono_padre'=>$telefono_padre,':telefono_madre'=>$telefono_madre,':talla_camiseta'=>$talla_camiseta,':numero_camiseta'=>$numero_camiseta,':alergias'=>$alergias,
		':titular_banco'=>$titular_banco,':dni_titular'=>$dni_titular,':iban'=>$iban,':entidad'=>$entidad,':oficina'=>$oficina,
		':dc'=>$dc,':cuenta'=>$cuenta,':dni_tutor'=>$dni_tutor,':dni_jugador'=>$dni_jugador,':temporada'=>$temporada,
		':is_active'=>$is_active,':id_equipo_horario'=>$id_equipo_horario,':observaciones'=>$observaciones,':idequipo_alqueria'=>$idequipo_alqueria,':foto'=>$foto,
		':dni_delante'=>$dni_delante,':dni_detras'=>$dni_detras,':autoriza_modificacion'=>$autoriza_modificacion,':dni_padre'=>$dni_padre,':dni_madre'=>$dni_madre,
		':pasaporte'=>$pasaporte,':sip'=>$sip,':sexo'=>$sexo,':nacionalidad'=>$nacionalidad,':tipo_documento'=>$tipo_documento,
		':fecha_cad_dni'=>$fecha_cad_dni,':pais_nacimiento'=>$pais_nacimiento,':num_hermanos'=>$num_hermanos,':edades'=>$edades,':en_el_club'=>$en_el_club,
		':cuota'=>$cuota,':email_madre'=>$email_madre,':email_padre'=>$email_padre,':estudios_madre'=>$estudios_madre,':estudios_padre'=>$estudios_padre,
		':monoparental'=>$monoparental,':apellidos_madre'=>$apellidos_madre,':apellidos_padre'=>$apellidos_padre);
                
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findLast();}
        }


		/**********************
		**** METODOS UPDATE ***
		***********************/
		public static function update($id_jugador, $nombre, $apellidos, $email, $fecha, $categoria, 
		$fecha_nacimiento, $direccion, $numero, $piso, $puerta, 
		$poblacion, $codigo_postal, $provincia, $nombre_padre, $nombre_madre, 
		$telefono_padre, $telefono_madre, $talla_camiseta, $numero_camiseta, $alergias, 
		$titular_banco, $dni_titular, $iban, $entidad, $oficina, 
		$dc, $cuenta, $dni_tutor, $dni_jugador, $temporada, 
		$is_active, $id_equipo_horario, $observaciones, $idequipo_alqueria, $foto, 
		$dni_delante, $dni_detras, $autoriza_modificacion, $dni_padre, $dni_madre, 
		$pasaporte, $sip, $sexo, $nacionalidad, $tipo_documento, 
		$fecha_cad_dni, $pais_nacimiento, $num_hermanos, $edades, $en_el_club, 
		$cuota, $email_madre, $email_padre, $estudios_madre, $estudios_padre, 
		$monoparental, $apellidos_madre, $apellidos_padre)
        {        
            $sql='
            UPDATE	jugadores 
			SET 
					nombre=:nombre,apellidos=:apellidos,email=:email,fecha=:fecha,categoria=:categoria,
		fecha_nacimiento=:fecha_nacimiento,direccion=:direccion,numero=:numero,piso=:piso,puerta=:puerta,
		poblacion=:poblacion,codigo_postal=:codigo_postal,provincia=:provincia,nombre_padre=:nombre_padre,nombre_madre=:nombre_madre,
		telefono_padre=:telefono_padre,telefono_madre=:telefono_madre,talla_camiseta=:talla_camiseta,numero_camiseta=:numero_camiseta,alergias=:alergias,
		titular_banco=:titular_banco,dni_titular=:dni_titular,iban=:iban,entidad=:entidad,oficina=:oficina,
		dc=:dc,cuenta=:cuenta,dni_tutor=:dni_tutor,dni_jugador=:dni_jugador,temporada=:temporada,
		is_active=:is_active,id_equipo_horario=:id_equipo_horario,observaciones=:observaciones,idequipo_alqueria=:idequipo_alqueria,foto=:foto,
		dni_delante=:dni_delante,dni_detras=:dni_detras,autoriza_modificacion=:autoriza_modificacion,dni_padre=:dni_padre,dni_madre=:dni_madre,
		pasaporte=:pasaporte,sip=:sip,sexo=:sexo,nacionalidad=:nacionalidad,tipo_documento=:tipo_documento,
		fecha_cad_dni=:fecha_cad_dni,pais_nacimiento=:pais_nacimiento,num_hermanos=:num_hermanos,edades=:edades,en_el_club=:en_el_club,
		cuota=:cuota,email_madre=:email_madre,email_padre=:email_padre,estudios_madre=:estudios_madre,estudios_padre=:estudios_padre,
		monoparental=:monoparental,apellidos_madre=:apellidos_madre,apellidos_padre=:apellidos_padre 
			WHERE
					id_jugador=:id_jugador';

            $query=db_2_utf8::singleton()->prepare($sql);
            
            $datos=array(
				':id_jugador'=>$id_jugador,
				':nombre'=>$nombre,':apellidos'=>$apellidos,':email'=>$email,':fecha'=>$fecha,':categoria'=>$categoria,
		':fecha_nacimiento'=>$fecha_nacimiento,':direccion'=>$direccion,':numero'=>$numero,':piso'=>$piso,':puerta'=>$puerta,
		':poblacion'=>$poblacion,':codigo_postal'=>$codigo_postal,':provincia'=>$provincia,':nombre_padre'=>$nombre_padre,':nombre_madre'=>$nombre_madre,
		':telefono_padre'=>$telefono_padre,':telefono_madre'=>$telefono_madre,':talla_camiseta'=>$talla_camiseta,':numero_camiseta'=>$numero_camiseta,':alergias'=>$alergias,
		':titular_banco'=>$titular_banco,':dni_titular'=>$dni_titular,':iban'=>$iban,':entidad'=>$entidad,':oficina'=>$oficina,
		':dc'=>$dc,':cuenta'=>$cuenta,':dni_tutor'=>$dni_tutor,':dni_jugador'=>$dni_jugador,':temporada'=>$temporada,
		':is_active'=>$is_active,':id_equipo_horario'=>$id_equipo_horario,':observaciones'=>$observaciones,':idequipo_alqueria'=>$idequipo_alqueria,':foto'=>$foto,
		':dni_delante'=>$dni_delante,':dni_detras'=>$dni_detras,':autoriza_modificacion'=>$autoriza_modificacion,':dni_padre'=>$dni_padre,':dni_madre'=>$dni_madre,
		':pasaporte'=>$pasaporte,':sip'=>$sip,':sexo'=>$sexo,':nacionalidad'=>$nacionalidad,':tipo_documento'=>$tipo_documento,
		':fecha_cad_dni'=>$fecha_cad_dni,':pais_nacimiento'=>$pais_nacimiento,':num_hermanos'=>$num_hermanos,':edades'=>$edades,':en_el_club'=>$en_el_club,
		':cuota'=>$cuota,':email_madre'=>$email_madre,':email_padre'=>$email_padre,':estudios_madre'=>$estudios_madre,':estudios_padre'=>$estudios_padre,
		':monoparental'=>$monoparental,':apellidos_madre'=>$apellidos_madre,':apellidos_padre'=>$apellidos_padre);
    
            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_jugador($id_jugador);}
        }

        //cambiar jugador a equipo eba
        /*public static function updateEba($idJugador){

		    $sentencia_sql = "UPDATE jugadores SET idequipo_alqueria = 22, categoria = 'CANTERA' WHERE id_jugador =". $idJugador;
            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_jugador($idJugador);}
        }*/

        public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."=0 WHERE id_jugador=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."=null WHERE id_jugador=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."=".$valorAtributo." WHERE id_jugador=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_jugador=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."=null WHERE id_jugador=".$id;
                }
                else{
                    $sentencia_sql="UPDATE jugadores SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_jugador=".$id;
                }
            }

            $query=db_2_utf8::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db_2_utf8::singleton()->errorInfo()),1);return false;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{return self::findByid_jugador($id);}
        }

        
        public static function updateJugadorEnInscripcionEscuelaCantera2020( 
            $id_jugador,        $autoriza_modificacion,
            $tipo_documento,    $dni_jugador,       $fecha_cad_dni,     $nacionalidad,
            $fecha_nacimiento,  $nombre,            $apellidos,             
            $direccion,         $numero,            $piso,              $puerta,        $codigo_postal,     $poblacion,     $provincia, 
        
            $sexo,              $pais_nacimiento,   $talla_camiseta,    $en_el_club,    $alergias,          $telefono,      $email,  
            $colegio,           $curso,

            $num_hermanos,      $edades,            $monoparental,
            $nombre_padre,      $apellidos_padre,   $telefono_padre,    $email_padre,   $estudios_padre,    $dni_padre,       
            $nombre_madre,      $apellidos_madre,   $telefono_madre,    $email_madre,   $estudios_madre,    $dni_madre,     

            $titular_banco,     $dni_titular,       $iban,              $entidad,       $oficina,           $dc,        $cuenta, 

            $foto,              $dni_delante,       $dni_detras,        $pasaporte,     $sip,               $temporada, $tipoalumno="", $hermanosinscritos=0)
        {
            $sql="
            UPDATE	jugadores 
			SET     
                    autoriza_modificacion=".$autoriza_modificacion.", 
                    tipo_documento='".$tipo_documento."',           dni_jugador='".$dni_jugador."',     fecha_cad_dni='".$fecha_cad_dni."',     nacionalidad='".$nacionalidad."',     
                    fecha_nacimiento='".$fecha_nacimiento."',       nombre='".$nombre."',               apellidos='".$apellidos."',           
                    direccion='".$direccion."',                     numero='".$numero."',               piso='".$piso."',                       puerta='".$puerta."',                 
                    codigo_postal=".$codigo_postal.",               poblacion='".$poblacion."',         provincia='".$provincia."',
                        
                    sexo='".$sexo."',           pais_nacimiento='".$pais_nacimiento."',     talla_camiseta='".$talla_camiseta."', en_el_club=".$en_el_club.",  
                        
                    alergias='".$alergias."',   telefono_jugador='".$telefono."',             email='".$email."',       
                    colegio='".$colegio."',     curso='".$curso."',
                    
                    num_hermanos=".$num_hermanos.",edades='".$edades."',monoparental=".$monoparental.",
                        
                    nombre_padre='".$nombre_padre."',       apellidos_padre='".$apellidos_padre."',     telefono_padre=".$telefono_padre.", 
                    email_padre='".$email_padre."',         estudios_padre='".$estudios_padre."',       dni_padre='".$dni_padre."',
                        
                    nombre_madre='".$nombre_madre."',       apellidos_madre='".$apellidos_madre."',     telefono_madre=".$telefono_madre.", 
                    email_madre='".$email_madre."',         estudios_madre='".$estudios_madre."',       dni_madre='".$dni_madre."',
                   
                    titular_banco='".$titular_banco."',   dni_titular='".$dni_titular."',           iban='".$iban."',
                    entidad='".$entidad."',  oficina='".$oficina."',   dc='".$dc."',                cuenta='".$cuenta."',
                    
                    foto='".$foto."',            dni_delante='".$dni_delante."',   dni_detras='".$dni_detras."',  "
            . "     pasaporte='".$pasaporte."', sip='".$sip."', temporada='".$temporada."', 
                    tipo_alumno_patronato='".$tipoalumno."', hermanos_inscritos='".$hermanosinscritos."'
            WHERE
					id_jugador=".$id_jugador;
            
            error_log(print_r($sql,1));

            $query=db_2_utf8::singleton()->prepare($sql);
            $datos=array("");
            /*$datos=array(
                ':id_jugador'=>$id_jugador,             ':autoriza_modificacion'=>$autoriza_modificacion,
                ':tipo_documento'=>$tipo_documento,     ':dni_jugador'=>$dni_jugador,           ':fecha_cad_dni'=>$fecha_cad_dni,   ':nacionalidad'=>$nacionalidad, 
                ':fecha_nacimiento'=>$fecha_nacimiento, ':nombre'=>$nombre,                     ':apellidos'=>$apellidos,           
                ':direccion'=>$direccion,               ':numero'=>$numero,                     ':piso'=>$piso,                     ':puerta'=>$puerta,
                ':codigo_postal'=>$codigo_postal,       ':poblacion'=>$poblacion,               ':provincia'=>$provincia,           

                ':num_hermanos'=>$num_hermanos,         ':edades'=>$edades,                     ':monoparental'=>$monoparental,
                ':nombre_padre'=>$nombre_padre,         ':apellidos_padre'=>$apellidos_padre,   ':telefono_padre'=>$telefono_padre, ':email_padre'=>$email_padre,
                ':estudios_padre'=>$estudios_padre,     ':dni_padre'=>$dni_padre,   
                ':nombre_madre'=>$nombre_madre,         ':apellidos_madre'=>$apellidos_madre,   ':telefono_madre'=>$telefono_madre, ':email_madre'=>$email_madre,
                ':estudios_madre'=>$estudios_madre,     ':dni_madre'=>$dni_madre,   

                ':sexo'=>$sexo,                 ':pais_nacimiento'=>$pais_nacimiento,   ':talla_camiseta'=>$talla_camiseta,
                ':en_el_club'=>$en_el_club,     ':alergias'=>$alergias,                 ':telefono_jugador'=>$telefono,   ':email'=>$email,
                ':colegio'=>$colegio,           ':curso'=>$curso,

                ':titular_banco'=>$titular_banco,':dni_titular'=>$dni_titular,':iban'=>$iban,':entidad'=>$entidad,':oficina'=>$oficina, ':dc'=>$dc,':cuenta'=>$cuenta,

                ':foto'=>$foto,     ':dni_delante'=>$dni_delante,   ':dni_detras'=>$dni_detras, ':pasaporte'=>$pasaporte,':sip'=>$sip , ':temp'=>$temporada             
            );*/

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{
                return self::findByid_jugador($id_jugador);
            }
        }
        
        
        /** updateImagenesJugadores */
        public static function updateImagenesJugadores($id_jugador,$autoriza_modificacion,$foto,$dni_delante,$dni_detras,$pasaporte, $sip)
        {
            $sql='
            UPDATE	jugadores 
			SET     
                    autoriza_modificacion=:autoriza_modificacion,
                    foto=:foto,     dni_delante=:dni_delante,   dni_detras=:dni_detras,  pasaporte=:pasaporte,sip=:sip
            WHERE
					id_jugador=:id_jugador';
            
            $query=db_2_utf8::singleton()->prepare($sql);
            $datos=array(
                ':id_jugador'=>$id_jugador, ':autoriza_modificacion'=>$autoriza_modificacion,
                ':foto'=>$foto,     ':dni_delante'=>$dni_delante,   ':dni_detras'=>$dni_detras, ':pasaporte'=>$pasaporte,':sip'=>$sip           
            );

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{
                return self::findByid_jugador($id_jugador);
            }
        }
        
        /*   UPDATE JUGADOR DESDE FICHA MODAL DEL BACK DE INSCRIPCIONES  */
        public static function updateJugadorDesdeModalBack(  $idjugador,      
            $tipo_documento,    $dni_jugador,       $fecha_cad_dni,     $nacionalidad,
            $fecha_nacimiento,  $nombre,            $apellidos,             
            $direccion,         $numero,            $piso,              $puerta,        $codigo_postal,     $poblacion,     $provincia, 
            $sexo,              $pais_nacimiento,   $talla_camiseta,    $en_el_club,    $alergias,          $telefono,      $email,  
            $colegio,           $curso,  $num_hermanos,
            $nombre_padre,      $apellidos_padre,   $telefono_padre,    $email_padre,  $dni_padre,       
            $nombre_madre,      $apellidos_madre,   $telefono_madre,    $email_madre,  $dni_madre,     

            $titular_banco,     $iban,              $entidad,       $oficina,           $dc,        $cuenta )
        {
            $sql='
            UPDATE  jugadores 
            SET     
                   
                    tipo_documento=:tipo_documento,     dni_jugador=:dni_jugador,   fecha_cad_dni=:fecha_cad_dni,   nacionalidad=:nacionalidad,     
                    fecha_nacimiento=:fecha_nacimiento, nombre=:nombre,             apellidos=:apellidos,           
                    direccion=:direccion,   numero=:numero,     piso=:piso,         puerta=:puerta,                 codigo_postal=:codigo_postal,   poblacion=:poblacion,   provincia=:provincia,
                    sexo=:sexo,             pais_nacimiento=:pais_nacimiento,       talla_camiseta=:talla_camiseta, en_el_club=:en_el_club,         
                    alergias=:alergias,     telefono_jugador=:telefono_jugador,     email=:email,       
                    colegio=:colegio,       curso=:curso,
                    
                    num_hermanos=:num_hermanos,
                    nombre_padre=:nombre_padre, apellidos_padre=:apellidos_padre,   telefono_padre=:telefono_padre, email_padre=:email_padre, dni_padre=:dni_padre,
                    nombre_madre=:nombre_madre, apellidos_madre=:apellidos_madre,   telefono_madre=:telefono_madre, email_madre=:email_madre, dni_madre=:dni_madre,
                   
                    titular_banco=:titular_banco,    iban=:iban,entidad=:entidad,    oficina=:oficina,   dc=:dc,cuenta=:cuenta
                    
                    
            WHERE
                    id_jugador=:id_jugador';
            

            $query=db_2_utf8::singleton()->prepare($sql);
            $datos=array(
                ':id_jugador'=>$idjugador,             
                ':tipo_documento'=>$tipo_documento,     ':dni_jugador'=>$dni_jugador,           ':fecha_cad_dni'=>$fecha_cad_dni,   ':nacionalidad'=>$nacionalidad, 
                ':fecha_nacimiento'=>$fecha_nacimiento, ':nombre'=>$nombre,                     ':apellidos'=>$apellidos,           
                ':direccion'=>$direccion,               ':numero'=>$numero,                     ':piso'=>$piso,                     ':puerta'=>$puerta,
                ':codigo_postal'=>$codigo_postal,       ':poblacion'=>$poblacion,               ':provincia'=>$provincia,           

                ':num_hermanos'=>$num_hermanos,         
                ':nombre_padre'=>$nombre_padre,         ':apellidos_padre'=>$apellidos_padre,   ':telefono_padre'=>$telefono_padre, ':email_padre'=>$email_padre,
                     ':dni_padre'=>$dni_padre,   
                ':nombre_madre'=>$nombre_madre,         ':apellidos_madre'=>$apellidos_madre,   ':telefono_madre'=>$telefono_madre, ':email_madre'=>$email_madre,
                    ':dni_madre'=>$dni_madre,   

                ':sexo'=>$sexo,                 ':pais_nacimiento'=>$pais_nacimiento,   ':talla_camiseta'=>$talla_camiseta,
                ':en_el_club'=>$en_el_club,     ':alergias'=>$alergias,                 ':telefono_jugador'=>$telefono,   ':email'=>$email,
                ':colegio'=>$colegio,           ':curso'=>$curso,

                ':titular_banco'=>$titular_banco, ':iban'=>$iban, ':entidad'=>$entidad, ':oficina'=>$oficina, ':dc'=>$dc,':cuenta'=>$cuenta
               
                );

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));return false;}
            else{
                return true;
            }

            
        }
        

        /**********************
		**** METODOS DELETE ***
		***********************/
		public static function deleteAll()
		{
			$sql='DELETE FROM jugadores';

			$query=db_2_utf8::singleton()->prepare($sql);

			if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

			$datos=array();

			if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1 ));return false;}
			else{return true;}
		}

		public static function deleteByid_jugador($id_jugador)
    	{
    		$sql="DELETE FROM jugadores WHERE id_jugador=:id_jugador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':id_jugador'=>$id_jugador);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteBydni_jugador($dni_jugador)
    	{
    		$sql="DELETE FROM jugadores WHERE dni_jugador=:dni_jugador";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':dni_jugador'=>$dni_jugador);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteBysip($sip)
    	{
    		$sql="DELETE FROM jugadores WHERE sip=:sip";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':sip'=>$sip);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByemail($email)
    	{
    		$sql="DELETE FROM jugadores WHERE email=:email";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':email'=>$email);

    		if(!$x=$query->execute($datos)){error_log(print_1( db_2_utf8::singleton()->errorInfo(), 1));return false;}
    		else{return true;}
    	}

		public static function deleteByis_active($is_active)
    	{
    		$sql="DELETE FROM jugadores WHERE is_active=:is_active";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':is_active'=>$is_active);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteBytemporada($temporada)
    	{
    		$sql="DELETE FROM jugadores WHERE temporada=:temporada";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':temporada'=>$temporada);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByidequipo_alqueria($idequipo_alqueria)
    	{
    		$sql="DELETE FROM jugadores WHERE idequipo_alqueria=:idequipo_alqueria";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':idequipo_alqueria'=>$idequipo_alqueria);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByemail_madre($email_madre)
    	{
    		$sql="DELETE FROM jugadores WHERE email_madre=:email_madre";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':email_madre'=>$email_madre);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

		public static function deleteByemail_padre($email_padre)
    	{
    		$sql="DELETE FROM jugadores WHERE email_padre=:email_padre";

    		$query=db_2_utf8::singleton()->prepare($sql);

    		if(!$query){error_log(print_r( $query->errorInfo(),1));return false;}

    		$datos=array(':email_padre'=>$email_padre);

    		if(!$x=$query->execute($datos)){error_log(print_r( db_2_utf8::singleton()->errorInfo(),1));return false;}
    		else{return true;}
    	}

   }
?>