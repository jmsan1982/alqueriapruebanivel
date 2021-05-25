<?php
class inscripciones_patronato
{
    public static function findAllInscripciones()
    {
        return db::singleton()->query(''
        . 'SELECT '
        . '     * '
        . 'FROM '
        . '     formulariosinscripciones_patronato '
        . 'WHERE '
        . '     is_active = 1 '
        . '     AND'
        . '     fecha_inscripcion>"2019-12-10"')->fetchAll();
    }

    public static function findInscripciones_2020_2021_TemporadaTrimestreTres()
    {

        $sentencia_sql='SELECT j.*, i.equipo, i.seccion, i.tipo_inscripcion, i.fecha_registro, i.firma_tutor, i.firma_jugador, i.id_inscripcion , p.confirmacion_pago, p.cantidad, p.nombre_pago, p.numero_pedido, p.id as id_pago , p.metodo_pago, p.Ds_Response , p.url_recibo , p.aplicar_gastos_devolucion 
                FROM jugadores j inner join inscripciones_escuela_cantera i on i.id_jugador=j.id_jugador  
                LEFT JOIN jugadores_pagos p on i.id_inscripcion=p.id_inscripcion where j.categoria like "PATRONATO" and (p.nombre_pago LIKE "TRIMESTRE3") and i.temporada like "%21" and j.is_active=1';


        return db_2_utf8::singleton()->query($sentencia_sql)->fetchAll();  //fetchAll(PDO::FETCH_ASSOC);
    }

    
    //  sacamos los datos de la inscripcion con el importe de la matricula para el back
    public static function findAllInscripcionesConMatricula()
    {
        return db::singleton()->query('
            SELECT 
                fp.*, 
                fppag.matricula 
            FROM 
                formulariosinscripciones_patronato          fp 
            INNER JOIN 
                formulariosinscripciones_patronato_pagos    fppag 
            ON 
                (fp.id_formulario=fppag.id_formularioinscripciones) 
            WHERE 
                fp.is_active = 1 
                AND
                fp.fecha_inscripcion>"2019-12-10"')->fetchAll();
    }
    
    
    //  Sacamos las inscripciones activas con el pago de la matricula pendiente. Por ejemplo para añadirse a nuevos XML
    public static function findAllInscripcionesPendientesPagoMatricula()
    {
        $sentencia_sql='SELECT 
                fp.*, 
                fppag.id as idpago,
                fppag.cobros_activos_matricula, 
                fppag.matricula, 
                fppag.pendiente_matricula, 
                fppag.pagado_matricula 
            FROM 
                formulariosinscripciones_patronato fp 
            INNER JOIN 
                formulariosinscripciones_patronato_pagos fppag ON (fp.id_formulario=fppag.id_formularioinscripciones) 
            WHERE 
                fppag.pendiente_matricula>0     AND 
                fp.is_active = 1                AND 
                fp.fecha_inscripcion>"2019-12-10"';
        
        return db::singleton()->query($sentencia_sql)->fetchAll();
    }
    
    
    //  Sacamos las inscripciones que tienen cobros activos por confirmar de que se han enviado bien al banco 
    public static function findAllInscripcionesCobrosActivosPagoMatricula()
    {
        $sentencia_sql='
            SELECT 
                fp.*, 
                fppag.id as idpago,
                fppag.cobros_activos_matricula, 
                fppag.matricula, 
                fppag.pendiente_matricula, 
                fppag.pagado_matricula 
            FROM 
                formulariosinscripciones_patronato fp 
            INNER JOIN 
                formulariosinscripciones_patronato_pagos fppag ON (fp.id_formulario=fppag.id_formularioinscripciones) 
            WHERE 
                fppag.cobros_activos_matricula  IS NOT NULL     AND 
                fppag.pagado_matricula          IS NULL         AND 
                fp.is_active = 1                                AND 
                fp.fecha_inscripcion>"2019-12-10"';
      
        return db::singleton()->query($sentencia_sql)->fetchAll();
    }
    
 
    
    
    
    public static function findByIsActive(){
        return db::singleton()->query('select * from formulariosinscripciones_patronato where is_active = 1 and fecha_inscripcion>"2019-12-10"')->fetchAll();
    }

    public static function findFormForId($id)
    {
        $query = db::singleton()->query('select * from formulariosinscripciones_patronato where id_formulario="' . $id . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }

    public static function findFormForNumPedido($pedido)
    {
        $query = db::singleton()->query('select * from formulariosinscripciones_patronato where numero_pedido="' . $pedido . '"');
        if ($query)
            return $query->fetch();
        else
            return false;
    }

    public static function findLastNumeroPedido()
    {
        return db::singleton()->query('select MAX(id_formulario) from formulariosinscripciones_patronato')->fetch();
    }

    public static function findNombreApellidos($nombreCompleto)
    {
        return db::singleton()->query('select concat(nombre, " ", apellidos) from formulariosinscripciones_patronato where concat(nombre, " ", apellidos) like "' . $nombreCompleto . '"')->fetch();
    }

    public static function newForm($numeropedido, $fechanacimiento, $nombre, $apellidos, $direccion, $numero, $piso, $puerta,
                                   $poblacion, $cp, $provincia, $nombrepadre, $nombremadre, $tlfpadre, $tlfmadre, $titular, $dnititular, $iban, $entidad, $oficina,
                                   $dc, $cuenta, $email, $contenido, $fecha, $categoria, $modalidad, $tipoalumno, $tienehermanos, $tipopago, $pagado = null, $is_active = null)
    {
        $sqlInsertInInscripcionesPatronato = "INSERT INTO formulariosinscripciones_patronato(numero_pedido, fecha_nacimiento, nombre, apellidos, direccion, direccion_numero, direccion_piso_escalera, direccion_puerta, 
            poblacion, codigo_postal, provincia, nombre_padre, nombre_madre, telefono_padre, telefono_madre, titular, dni_titular, iban, entidad, oficina, dc, cuenta, email, contenido, fecha_inscripcion, categoria, modalidad, pagado, is_active, tipo, hermanos, tipo_pago)
                values(:numeropedido, :fechanacimiento, :nombre, :apellidos, :direccion, :numero, :piso, :puerta, :poblacion, :cp, :provincia, :nombrepadre, :nombremadre, :tlfpadre, :tlfmadre, :titular, :dnititular, :iban, :entidad, :oficina, :dc, :cuenta, :email, :contenido, :fecha, :categoria, :modalidad, :pagado, :is_active, :tipo, :hermano, :tipopag)";

        $query = db::singleton()->prepare($sqlInsertInInscripcionesPatronato);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(
            ':numeropedido' => $numeropedido,
            ':fechanacimiento' => $fechanacimiento,
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':direccion' => $direccion,
            ':numero' => $numero,
            ':piso' => $piso,
            ':puerta' => $puerta,
            ':poblacion' => $poblacion,
            ':cp' => $cp,
            ':provincia' => $provincia,
            ':nombrepadre' => $nombrepadre,
            ':nombremadre' => $nombremadre,
            ':tlfpadre' => $tlfpadre,
            ':tlfmadre' => $tlfmadre,
            ':email' => $email,
            ':titular' => $titular,
            ':dnititular' => $dnititular,
            ':iban' => $iban,
            ':entidad' => $entidad,
            ':oficina' => $oficina,
            ':dc' => $dc,
            ':cuenta' => $cuenta,
            ':contenido' => $contenido,
            ':fecha' => $fecha,
            ':categoria' => $categoria,
            ':modalidad' => $modalidad,
            ':pagado' => $pagado,
            ':is_active' => $is_active,
            ':tipo' => $tipoalumno,
            ':hermano' => $tienehermanos,
            ':tipopag' => $tipopago
        );

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            die;
        } else {
            return true;
        }

    }

    
    public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
    {
        if($ponerComillas==="no")
        {   
            if($valorAtributo==0 )
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."=0 WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
            }
        }
        else
        {   
            if($valorAtributo=="0" )
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else{
                $sentencia_sql="UPDATE formulariosinscripciones_patronato SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
            }
        }

//      error_log(__FILE__.__LINE__);    
//      error_log($sentencia_sql);
            
        $query=db::singleton()->prepare($sentencia_sql);

        if(!$query){error_log(print_r( db::singleton()->errorInfo()),1);die;}

        $datos=array("");

        if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
        else{return true;}
    }
        
        
    public static function findInscripcionesPagosIncluidasXMLPorConfirmarPago($trimestre) 
    {
        $sentencia_sql='SELECT '
                    . 'fi.numero_pedido, fi.nombre_apellidos, fi.email, '
                    . 'fip.id AS id_fip,fip.dni_pagador, fip.cobros_activos_'.$trimestre.' AS cobro_activo,fip.pagado_'.$trimestre.' AS pagado '
        . 'FROM '
            . ' `formulariosinscripciones_pagos` fip '
        . 'INNER JOIN '
            . ' `formulariosinscripciones` fi ON fi.id_formulario = fip.id_formularioinscripciones '
        . 'WHERE '
            . ' `trimestre_noviembre` > 0 AND '
            . ' `cobros_activos_'.$trimestre.'` IS NOT NULL '
            . ' AND `pagado_'.$trimestre.'` IS NULL ' 
        . 'ORDER BY cobro_activo';
        
        return db::singleton()->query($sentencia_sql)->fetchAll();
    }
        
    
    //  Sacamos las inscripciones activas con el pago del trimestre pendiente. Por ejemplo para añadirse a nuevos XML
    public static function findAllInscripcionesPendientesPagoTrimestre($trimestre)
    {
        $sentencia_sql='SELECT 
                fp.*, 
                fppag.id as idpago,
                fppag.cobros_activos_noviembre,     
                fppag.trimestre_noviembre,    
                fppag.pagado_noviembre,  
                fppag.cobros_activos_enero,    
                fppag.trimestre_enero,            
                fppag.pagado_enero,    
                fppag.cobros_activos_abril,    
                fppag.trimestre_abril,            
                fppag.pagado_abril       
            FROM  
                formulariosinscripciones_patronato fp 
            INNER JOIN 
                formulariosinscripciones_patronato_pagos fppag ON (fp.id_formulario=fppag.id_formularioinscripciones) 
            WHERE 
                fppag.trimestre_'.$trimestre.'>0    AND 
                fppag.cobros_activos_'.$trimestre.' IS NULL AND
                fppag.pagado_'.$trimestre.'         IS NULL AND
                fp.is_active = 1                    AND 
                fp.fecha_inscripcion>"2019-12-10"';
        
        return db::singleton()->query($sentencia_sql)->fetchAll();
    }
    
    
    //  Sacamos las inscripciones que tienen cobros activos por confirmar de que se han enviado bien al banco 
    public static function findInscripcionesConCobrosActivosPagoTrimestre($trimestre)
    {
        $sentencia_sql='
            SELECT 
                fp.*,
                fppag.id as idpago,
                fppag.cobros_activos_'.$trimestre.', 
                fppag.trimestre_'.$trimestre.', 
                fppag.pagado_'.$trimestre.'
            FROM 
                formulariosinscripciones_patronato fp 
            INNER JOIN 
                formulariosinscripciones_patronato_pagos fppag ON (fp.id_formulario=fppag.id_formularioinscripciones) 
            WHERE 
                fppag.cobros_activos_'.$trimestre.'  IS NOT NULL     AND 
                fppag.pagado_'.$trimestre.'          IS NULL         AND 
                fp.is_active = 1                                AND 
                fp.fecha_inscripcion>"2019-12-10"';
      
        //error_log(__FILE__.__FUNCTION__.__LINE__);
        //error_log($sentencia_sql);
        
        return db::singleton()->query($sentencia_sql)->fetchAll();
    }
    
    
    
    
    
    /**
     * Domiciliaciones Pagos Trimestrales para generar XML.
     * @param $trimestre
     * @return array
     */
    public static function findInscripcionesPagosXml($trimestre)
    {
        //error_log(print_r($trimestre,1));
        
        $query='SELECT '
                . '     fi.numero_pedido, fi.nombre, fi.iban, fi.entidad, fi.oficina, fi.dc, fi.cuenta, fi.titular, fi.telefono_madre, fi.telefono_padre, fi.apellidos, fi.fecha_inscripcion, '
                    . '     fip.id, fip.id_formularioinscripciones, fip.' . $trimestre[0] . ', fip.' . $trimestre['2'] . ', fip.dni_pagador 
                    FROM 
                        formulariosinscripciones_patronato fi 
                    JOIN 
                        formulariosinscripciones_patronato_pagos fip on(fip.id_formularioinscripciones=fi.id_formulario) 
                    WHERE 
                        fip.' . $trimestre[0] . ' > 0 and fip.' . $trimestre[2] . ' is null and fi.is_active = 1 '
                . ' ORDER BY fi.apellidos asc';
        
        //error_log($query);
        
        $findInscripcionesPagosPatronatoXml = db::singleton()->query($query);
        if ($findInscripcionesPagosPatronatoXml !== false) {
            $findInscripcionesPagosPatronatoXml = $findInscripcionesPagosPatronatoXml->fetchAll();
        } else {
            $findInscripcionesPagosPatronatoXml = NULL;
        }

        return $findInscripcionesPagosPatronatoXml;
    }

    /**
     * Domiciliaciones Pagos Matrícula para generar XML.
     * @return array
     */
    public static function findInscripcionesPagosMatriculaPendienteXml()
    {
        $findInscripcionesPagosMatriculaPendienteXml = db::singleton()->query('select fip.id, fip.id_formularioinscripciones, fi.numero_pedido, fi.contenido, fi.nombre, fi.apellidos, fi.iban, fi.entidad, fi.oficina, fi.dc, fi.cuenta, fi.fecha_inscripcion, fip.matricula, fip.dni_pagador, fip.pendiente_matricula from formulariosinscripciones_patronato fi 
					join formulariosinscripciones_patronato_pagos fip on(fip.id_formularioinscripciones=fi.id_formulario) where fip.pendiente_matricula > 0 and fip.pagado_pendiente_matricula is null and fi.is_active = 1 order by concat(fi.nombre," ",fi.apellidos) asc');

        if ($findInscripcionesPagosMatriculaPendienteXml !== false) {
            $findInscripcionesPagosMatriculaPendienteXml = $findInscripcionesPagosMatriculaPendienteXml->fetchAll();
        } else {
            $findInscripcionesPagosMatriculaPendienteXml = NULL;
        }

        return $findInscripcionesPagosMatriculaPendienteXml;
    }

    public static function actualizacuentabancaria($idinscripcion, $iban, $entidad, $oficina, $dc, $cuenta)
    {
        $sql = "update formulariosinscripciones_patronato set iban=:iban, entidad=:entidad, oficina=:oficina, dc=:dc, cuenta=:cuenta  where id_formulario=:id";
        $query = db::singleton()->prepare($sql);

        if (!$query) {
            return false;
        }

        $datos = array(
            ':id' => $idinscripcion,
            ':iban' => $iban,
            ':entidad' => $entidad,
            ':oficina' => $oficina,
            ':dc' => $dc,
            ':cuenta' => $cuenta,
        );

        if (!$query->execute($datos)) {
            return false;
        }

        return true;
    }



    // Cuando se paga online  marcamos el registro como pagado =1 por el numero de pedido
    public static function ActualizaPagadoPatronato($codigo, $pagado) {
        $sql = "UPDATE formulariosinscripciones_patronato SET pagado=:pag  WHERE numero_pedido=:numero";

        $query = db::singleton()->prepare($sql);

        if (!$query) {
            return false;
        }

        $datos = array(':numero' => $codigo, ':pag' => $pagado);

        if (!$query->execute($datos)) {
            return false;
        } 
        else {
           return true;
        }
    }


    // Actualizar el pagado desde el back, por id formulario
    public static function ActualizaPagadoPatronatoBack($idform, $pagado) {
        $sql = "UPDATE formulariosinscripciones_patronato SET pagado=:pag  WHERE id_formulario=:numero";

        $query = db::singleton()->prepare($sql);

        if (!$query) {
            return false;
        }

        $datos = array(':numero' => $idform, ':pag' => $pagado);

        if (!$query->execute($datos)) {
                return false;
            } 
        else {
            echo "<script text='javascript'> alert('El pago se grabó correctamente.');
            window.location.replace('?r=patronato/Inscripciones'); </script>";
            die;
        }
    }





    public static function actualizaEstado($idinscripcion,$is_active)
    {
        $sql = "update formulariosinscripciones_patronato set is_active=:active where id_formulario=:id_formulario";
        $query = db::singleton()->prepare($sql);

        if(!$query){
            return false;
        }

        $datos = array(':active' => $is_active, ':id_formulario' => $idinscripcion);

        if (!$query->execute($datos)) {
            $query->errorInfo();
            return false;
        }

        return true;
    }
    
    public static function findInscripcionesPorCategoria($categoria)
    {
        return db::singleton()->query('select * from formulariosinscripciones_patronato where modalidad like "%' . $categoria . '%" order by pagado desc')->fetchAll();
    }


    /* Para la consulta de exportar a excel todas las inscripcciones patronato */
        public static function findAllInscripcionesExcelPatronato() {
            
            $query = db::singleton()->query('
                SELECT
                      fp.fecha_inscripcion AS Fecha_Inscripcion,
                      fp.numero_pedido AS Numero_Pedido,
                      CONVERT(CAST(CONVERT(fp.nombre USING latin1) AS BINARY) USING utf8) AS Nombre,
                      CONVERT(CAST(CONVERT(fp.apellidos USING latin1) AS BINARY) USING utf8) AS Apellidos,
                      fp.fecha_nacimiento AS Fecha_Nacimiento,
                      CONVERT(CAST(CONVERT(fp.direccion USING latin1) AS BINARY) USING utf8) AS Direccion,
                      fp.direccion_numero as Numero,
                      fp.direccion_piso_escalera as Piso_Escalera,
                      fp.direccion_puerta as Puerta,
                      CONVERT(CAST(CONVERT(fp.poblacion USING latin1) AS BINARY) USING utf8) AS Poblacion,
                      fp.codigo_postal as CP,
                      CONVERT(CAST(CONVERT(fp.provincia USING latin1) AS BINARY) USING utf8) AS Provincia,
                      CONVERT(CAST(CONVERT(fp.nombre_padre USING latin1) AS BINARY) USING utf8) AS Nombre_Padre,
                      fp.telefono_padre as Telefono_Padre,
                      CONVERT(CAST(CONVERT(fp.nombre_madre USING latin1) AS BINARY) USING utf8) AS Nombre_Madre,
                      fp.telefono_madre as Telefono_Madre,
                      fp.email as Email,
                      CONVERT(CAST(CONVERT(fp.titular USING latin1) AS BINARY) USING utf8) AS Titular,
                      fp.dni_titular as DNI_Titular,
                      fp.pagado AS Pagado,
                      fppag.matricula as ImporteMatricula,
                      fp.tipo_pago as Tipo_Pago,
                      fp.categoria AS Categoria,
                      fp.modalidad as Modalidad,
                      fp.tipo as Tipo_alumno,
                      fp.hermanos as Tiene_hermanos
 
                    FROM
                      formulariosinscripciones_patronato fp
                    inner join formulariosinscripciones_patronato_pagos fppag ON (fp.id_formulario=fppag.id_formularioinscripciones)
                    WHERE
                      fp.fecha_inscripcion > "2019-12-10" and fp.is_active=1');

            if ($query) {
                return $query->fetchAll(PDO::FETCH_ASSOC);
            }
            else {
                return false;
            }
        }

}