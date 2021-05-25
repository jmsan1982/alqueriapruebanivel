<?php
class inscripciones_patronato_pagos
{
    public static function findAll()
    {
        return db::singleton()->query('select * from formulariosinscripciones_patronato_pagos where fecha> "2019-12-15" order by fecha DESC')->fetchAll();
    }

    public static function findAllGroupedByDate()
    {
        return db::singleton()->query('SELECT DATE_FORMAT(fecha,"%Y-%m-%d") as created_day,sum(importe) as suma FROM formulariosinscripciones_patronato_pagos WHERE 1 group by created_day order by created_day desc')->fetchAll();
    }

    public static function findByIdFormulario($id_formularioinscripciones)
    {
        $query = db::singleton()->query('select * from formulariosinscripciones_patronato_pagos where id_formularioinscripciones=' . $id_formularioinscripciones);
        if ($query)
            return $query->fetchAll();
        else
            return false;
    }

    
//    public static function newInscripcionesPagos($id_formularioinscripciones, $fecha, $importe, $dni_pagador)
//    {
//        $sql = "insert into formulariosinscripciones_patronato_pagos(id_formularioinscripciones,fecha,importe,dni_pagador)
//		values (:iform,:fech,:impo,:dni_pag)";
//        $query = db::singleton()->prepare($sql);
//
//        if (!$query) {
//            var_dump(db::singleton()->errorInfo());
//            die;
//        }
//
//        $datos = array(':iform' => $id_formularioinscripciones, ':fech' => $fecha, ':impo' => $importe, ':dni_pag' => $dni_pagador);
//
//        if (!$query->execute($datos)) {
//            var_dump($query->errorInfo());
//            die;
//        } else {
//            return true;
//        }
//    }

    public static function findByIdFormularioInscripciones($id_form)
    { 
        return db::singleton()->query('select * from formulariosinscripciones_patronato_pagos where id_formularioinscripciones="' . $id_form . '"')->fetch();
    }
    
    public static function findById($id_form)
    {   
        return db::singleton()->query('select * from formulariosinscripciones_patronato_pagos where id_formularioinscripciones="' . $id_form . '"')->fetch();
    }

    // Cuando se paga online o se marca como pagado desde el back ponemos el pendiente matricula a cero
    public static function ActualizaPagadoMatricula($idinscripcion, $pagado) {
        $sql = "UPDATE formulariosinscripciones_patronato_pagos SET pendiente_matricula=:pag  WHERE id_formularioinscripciones=:numero";

        $query = db::singleton()->prepare($sql);

        if (!$query) {
            return false;
        }

        $datos = array(':numero' => $idinscripcion, ':pag' => $pagado);

        if (!$query->execute($datos)) {
            return false;
        } 
        else {
           return true;
        }
    }

    
    
    public static function actualizarPagos(
        $idinscripcion,
        $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente, 
        $pagado_matricula, $pagado_pendiente_matricula,
            
        $pagado_enero,          $pagado_abril,          $pagado_noviembre,
        $trimestre_enero,       $trimestre_abril,       $trimestre_noviembre, 
        $cobros_activos_enero,  $cobros_activos_abril,  $cobros_activos_noviembre)
    {
        error_log(print_r(func_get_args(),1));
        
        $sql = "UPDATE formulariosinscripciones_patronato_pagos "
                . " SET "
                . "     reserva     =:reserva, "
                . "     matricula   =:matricula, "
                . "     pendiente_matricula =:pendiente_matricula, "
                . "     total_inscripcion   =:total_inscripcion, "
                . "     total_pendiente     =:total_pendiente, "
                . "     pagado_matricula            =:pagado_matricula, "
                . "     pagado_pendiente_matricula  =:pagado_pendiente_matricula, "
                
                . "     pagado_enero        =:pagado_enero,             pagado_abril        =:pagado_abril,             pagado_noviembre        =:pagado_noviembre, "
                . "     trimestre_enero     =:trimestre_enero,          trimestre_abril     =:trimestre_abril,          trimestre_noviembre     =:trimestre_noviembre, "
                . "     cobros_activos_enero=:cobros_activos_enero,     cobros_activos_abril=:cobros_activos_abril,     cobros_activos_noviembre=:cobros_activos_noviembre "
                . " WHERE "
                . "     id_formularioinscripciones=:id";
        
        $query = db::singleton()->prepare($sql);

        if(!$query){
            return false;
        }

        $datos = array(
            ':id'                   => $idinscripcion,
            ':reserva'              => $reserva,
            ':matricula'            => $matricula,
            ':pendiente_matricula'  => $pendiente_matricula,
            ':total_inscripcion'    => $total_inscripcion,
            ':total_pendiente'      => $total_pendiente,
            ':pagado_matricula'     => $pagado_matricula,
            ':pagado_pendiente_matricula' => $pagado_pendiente_matricula,
            
            ':trimestre_enero'              => $trimestre_enero,
            ':trimestre_abril'              => $trimestre_abril,
            ':trimestre_noviembre'          => $trimestre_noviembre,
            ':pagado_enero'                 => $pagado_enero,
            ':pagado_abril'                 => $pagado_abril,
            ':pagado_noviembre'             => $pagado_noviembre,
            ':cobros_activos_enero'         => $cobros_activos_enero,
            ':cobros_activos_abril'         => $cobros_activos_abril,
            ':cobros_activos_noviembre'     => $cobros_activos_noviembre
        );
        
        if(!$query->execute($datos)){
            return false;
        } else {
            return true;
        }
    }
    
    public static function actualizarPagos_v1($idinscripcion, $pagado_enero, $pagado_abril, $pagado_noviembre, $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente, $trimestre_enero, $trimestre_abril, $trimestre_noviembre, $pagado_matricula, $pagado_pendiente_matricula, $cobros_activos)
    {
        $sql = "update formulariosinscripciones_patronato_pagos set reserva=:reserva, pagado_enero=:pagado_enero, pagado_abril=:pagado_abril, pagado_noviembre=:pagado_noviembre, matricula=:matricula, pendiente_matricula=:pendiente_matricula, total_inscripcion=:total_inscripcion, cobros_activos=:cobros_activos, total_pendiente=:total_pendiente, trimestre_enero=:trimestre_enero, trimestre_abril=:trimestre_abril, trimestre_noviembre=:trimestre_noviembre, pagado_matricula=:pagado_matricula, pagado_pendiente_matricula=:pagado_pendiente_matricula, cobros_activos=:cobros_activos where id_formularioinscripciones=:id";
        $query = db::singleton()->prepare($sql);

        if (!$query) {
            return false;
        }

        $datos = array(
            ':id' => $idinscripcion,
            ':reserva' => $reserva,
            ':matricula' => $matricula,
            ':pendiente_matricula' => $pendiente_matricula,
            ':total_inscripcion' => $total_inscripcion,
            ':total_pendiente' => $total_pendiente,
            ':trimestre_enero' => $trimestre_enero,
            ':trimestre_abril' => $trimestre_abril,
            ':trimestre_noviembre' => $trimestre_noviembre,
            ':pagado_enero' => $pagado_enero,
            ':pagado_abril' => $pagado_abril,
            ':pagado_noviembre' => $pagado_noviembre,
            ':pagado_matricula' => $pagado_matricula,
            ':pagado_pendiente_matricula' => $pagado_pendiente_matricula,
            ':cobros_activos' => $cobros_activos,
        );

        if (!$query->execute($datos)) {
            return false;
        } else {
            return true;
        }
    }
    

    public static function createNewPago($idinscripcion, $fecha, $dni_titular, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente,  $trimestre_enero, $trimestre_abril, $trimestre_noviembre)
    {
        $sqlInsertInInscripcionesPagos = "INSERT INTO formulariosinscripciones_patronato_pagos (id_formularioinscripciones, fecha, dni_pagador,  matricula, pendiente_matricula, total_inscripcion, total_pendiente,  trimestre_enero, trimestre_abril, trimestre_noviembre, pagado_matricula) 
            values(:idformulario, :fecha, :dni_titular, :matricula, :pendiente_matricula, :total_inscripcion, :total_pendiente,  :trimestre_enero, :trimestre_abril, :trimestre_noviembre, :fecha)";

        $query = db::singleton()->prepare($sqlInsertInInscripcionesPagos);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(
            ':idformulario' => $idinscripcion,
            ':fecha' => $fecha,
            ':dni_titular' => $dni_titular,
           // ':reserva' => $reserva,
            ':matricula' => $matricula,
            ':pendiente_matricula' => $pendiente_matricula,
            ':total_inscripcion' => $total_inscripcion,
           // ':pagado_enero' => $pagado_enero,
            //':pagado_abril' => $pagado_abril,
           // ':pagado_noviembre' => $pagado_noviembre,
            ':trimestre_enero' => $trimestre_enero,
            ':trimestre_abril' => $trimestre_abril,
            ':trimestre_noviembre' => $trimestre_noviembre,
           // ':pagado_matricula' => $pagado_matricula,
           // ':pagado_pendiente_matricula' => $pagado_pendiente_matricula,
           // ':cobros_activos' => $cobros_activos,
			':total_pendiente' => $total_pendiente
        );

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            die;
        } else {
            return true;
        }

    }

    public static function setPagadosTrimestre($nombreApellidos, $fechaPago)
    {
        return db::singleton()->query('update formulariosinscripciones_patronato_pagos set pagado = "' . $fechaPago . '" where dni_pagador IN ' . $nombreApellidos);
    }

    public static function setPagadosTrimestreMatricula($dnis, $fechaPago)
    {
        return db::singleton()->query('update formulariosinscripciones_patronato_pagos fip join formulariosinscripciones_patronato fi on(fip.id_formularioinscripciones=fi.id_formulario) set pagado_pendiente_matricula = "' . $fechaPago . '" where fip.pendiente_matricula > 0 and fi.nombre_apellidos IN ' . $dnis);
    }

    public static function findPagadoById($idinscripcion)
    {   return db::singleton()->query('select DISTINCT pagado_enero, pagado_abril, pagado_noviembre from formulariosinscripciones_patronato_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();   }

    public static function findPagadoMatriculaById($idinscripcion)
    {   return db::singleton()->query('select DISTINCT pagado_matricula from formulariosinscripciones_patronato_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findPagadoPendienteMatriculaById($idinscripcion)
    {
        return db::singleton()->query('select DISTINCT pagado_pendiente_matricula from formulariosinscripciones_patronato_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findFechaCobrosActivosPorId($idinscripcion)
    {
        return db::singleton()->query('select DISTINCT cobros_activos from formulariosinscripciones_patronato_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findAllDatosPagos()
    {
        return db::singleton()->query('SELECT fi.nombre,fi.apellidos, fip.dni_pagador, fip.reserva, fip.matricula, fip.pagado_enero,fip.pagado_abril,fip.pagado_noviembre, fip.pagado_matricula, fip.pagado_pendiente_matricula,
                    fip.pendiente_matricula, fip.total_inscripcion, fip.trimestre_enero, fip.trimestre_abril, fip.trimestre_noviembre, fip.cobros_activos
                    FROM formulariosinscripciones_patronato fi JOIN formulariosinscripciones_patronato_pagos fip ON(fi.id_formulario=fip.id_formularioinscripciones)
                    ORDER BY fi.apellidos ASC');
    }
    
    public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
    {
        if($ponerComillas==="no")
        {   
            if($valorAtributo==0 )
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."=0 WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
            }
        }
        else
        {   
            if($valorAtributo=="0" )
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
            }
            else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
            {
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
            }
            else{
                $sentencia_sql="UPDATE formulariosinscripciones_patronato_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
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
    
    public static function actualizarCobrosActivosMatriculaTrasAnularPagoXML($id_fip)
    {
        $query = db::singleton()->prepare('UPDATE formulariosinscripciones_patronato_pagos '
                                    .' SET cobros_activos_matricula=NULL, pendiente_matricula=matricula '
                                    .' WHERE id='.$id_fip);

        if(!$query){    return false;   }
        $datos  =   array("");
                
        if(!$query->execute($datos)){   return false;   } 
        else {  return true;    }
    }
    
    public static function actualizarCobrosActivosMatriculaTrasConfirmarPagoXML($id_fip,$fecha_confirmacion)
    {
        $query = db::singleton()->prepare(''
        . ' UPDATE '
        . '     formulariosinscripciones_patronato_pagos '
        .' SET '
        . '     pagado_matricula="'.$fecha_confirmacion.'" '
        . 'WHERE '
        . '     id='.$id_fip);

        if(!$query){    return false;   }
        $datos  =   array("");
                
        if(!$query->execute($datos)){   return false;   } 
        else {  return true;    }
    }
    
    public static function actualizarCobrosActivosTrimestreTrasConfirmarPagoXML($id_fip,$fecha_confirmacion,$trimestre)
    {
        $query = db::singleton()->prepare(''
        . ' UPDATE '
        . '     formulariosinscripciones_patronato_pagos '
        .' SET '
        . '     pagado_'.$trimestre.'="'.$fecha_confirmacion.'" '
        . 'WHERE '
        . '     id='.$id_fip);

        if(!$query){    return false;   }
        $datos  =   array("");
                
        if(!$query->execute($datos)){   return false;   } 
        else {  return true;    }
    }
    
    public static function actualizarCobrosActivosTrimestreTrasAnularPagoXML($id_fip,$trimestre)
    {
        $query = db::singleton()->prepare(''
        . ' UPDATE '
        . '     formulariosinscripciones_patronato_pagos '
        .' SET '
        . '     cobros_activos_'.$trimestre.'=NULL '
        . 'WHERE '
        . '     id='.$id_fip);

        if(!$query){    return false;   }
        $datos  =   array("");
                
        if(!$query->execute($datos)){   return false;   } 
        else {  return true;    }
    }
    
    
   /* public static function setDomiciliacionTrimestralToNull()
    {
        return db::singleton()->query('update formulariosinscripciones_patronato_pagos set pagado = NULL, pagado_enero = NULL, pagado_abril = NULL');
    } */



   /* 
   public static function setPagadoPendienteMatriculaToNull()
    {
        return db::singleton()->query('update formulariosinscripciones_patronato_pagos set pagado_pendiente_matricula = NULL');
    }*/

}

?>