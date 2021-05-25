<?php
class inscripciones_pagos
{
    public static function findAll()
    {
        return db::singleton()->query('select * from formulariosinscripciones_pagos order by fecha DESC')->fetchAll();
    }

    public static function findAllGroupedByDate()
    {
        return db::singleton()->query('SELECT DATE_FORMAT(fecha,"%Y-%m-%d") as created_day,sum(importe) as suma FROM formulariosinscripciones_pagos WHERE 1 group by created_day order by created_day desc')->fetchAll();
    }

    public static function findByIdFormulario($id_formularioinscripciones)
    {
        $query = db::singleton()->query('select * from formulariosinscripciones_pagos where id_formularioinscripciones=' . $id_formularioinscripciones);
        if($query)
            return $query->fetchAll();
        else
            return false;
    }
    
    public static function findByIdTabla($id)
    {
        return db::singleton()->query('select * from formulariosinscripciones_pagos where id=' . $id . ' ORDER BY id DESC')->fetch();
    }
    
    public static function findByIdFormularioFetch($id_formularioinscripciones)
    {
        //error_log('select * from formulariosinscripciones_pagos where id_formularioinscripciones=' . $id_formularioinscripciones);
        $query = db::singleton()->query('select * from formulariosinscripciones_pagos where id_formularioinscripciones=' . $id_formularioinscripciones);
        if($query)
            return $query->fetch();
        else
            return false;
    }

    public static function newInscripcionesPagos($id_formularioinscripciones, $fecha, $importe, $dni_pagador)
    {
        $sql = "insert into formulariosinscripciones_pagos(id_formularioinscripciones,fecha,importe,dni_pagador)
		values (:iform,:fech,:impo,:dni_pag)";
        $query = db::singleton()->prepare($sql);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(':iform' => $id_formularioinscripciones, ':fech' => $fecha, ':impo' => $importe, ':dni_pag' => $dni_pagador);

        if (!$query->execute($datos)) {
            var_dump($query->errorInfo());
            die;
        } else {
            return true;
        }
    }

    public static function findById($id_form)
    {
        return db::singleton()->query('select * from formulariosinscripciones_pagos where id_formularioinscripciones=' . $id_form . ' ORDER BY id DESC')->fetch();
    }


    public static function actualizarPagosTrimestres(
            $fip, 
            $reserva,           $matricula,                     $pendiente_matricula,   $total_inscripcion,     $total_pendiente,
            $pagado_matricula,  $pagado_pendiente_matricula,    $omitir_incluir_en_xml, $cobros_activos_matricula,                  
            $pagado_enero,                  $pagado_abril,              $pagado_noviembre, 
            $trimestre_enero,               $trimestre_abril,           $trimestre_noviembre, 
            $cobros_activos_enero,          $cobros_activos_abril,      $cobros_activos_noviembre,
            $omitir_incluir_xml_enero,      $omitir_incluir_xml_abril,  $omitir_incluir_xml_noviembre,
            $aplicar_gastos_devolucion)
    {
        $sql = "UPDATE formulariosinscripciones_pagos "
                ." SET  "
                . "     aplicar_gastos_devolucion=:aplicar_gastos_devolucion, "
                . "     reserva=:reserva, "
                . "     matricula=:matricula, "
                . "     pendiente_matricula=:pendiente_matricula, "
                . "     omitir_incluir_xml_matricula=:omitir_incluir_xml_matricula, "
            
                . "     total_inscripcion=:total_inscripcion, "
                . "     total_pendiente=:total_pendiente, "
                . "     pagado_matricula=:pagado_matricula, "
                . "     pagado_pendiente_matricula=:pagado_pendiente_matricula, "
                . "     cobros_activos_matricula=:cobros_activos_matricula, "
                
                . "     trimestre_noviembre=:trimestre_noviembre,                  "
                . "     trimestre_enero=:trimestre_enero,                       "
                . "     trimestre_abril=:trimestre_abril,  "

                . "     pagado_noviembre=:pagado_noviembre,                         "
                . "     pagado_enero=:pagado_enero,                             "
                . "     pagado_abril=:pagado_abril,     "
            
                . "     cobros_activos_noviembre=:cobros_activos_noviembre,         "
                . "     cobros_activos_enero=:cobros_activos_enero,             "
                . "     cobros_activos_abril=:cobros_activos_abril,             "
            
                . "     omitir_incluir_xml_noviembre=:omitir_incluir_xml_noviembre, "
                . "     omitir_incluir_xml_enero=:omitir_incluir_xml_enero,     "
                . "     omitir_incluir_xml_abril=:omitir_incluir_xml_abril  "
                . " WHERE "
                . "     id_formularioinscripciones=:id";
   
        $query = db::singleton()->prepare($sql);

        if(!$query){
            error_log(print_r($query->errorInfo(),1));
            return false;
        }
        
        
        $datos = array(
            ':id' => $fip,
            
            ':aplicar_gastos_devolucion'    =>  $aplicar_gastos_devolucion,
            ':reserva'                      =>  $reserva,
            ':matricula'                    =>  $matricula,
            ':pendiente_matricula'          =>  $pendiente_matricula,
            ':omitir_incluir_xml_matricula' =>  $omitir_incluir_en_xml,
            
            ':total_inscripcion'    =>  $total_inscripcion,
            ':total_pendiente'      =>  $total_pendiente,
            ':pagado_matricula'     =>  $pagado_matricula,
            ':pagado_pendiente_matricula'   =>      $pagado_pendiente_matricula,
            ':cobros_activos_matricula'     =>      $cobros_activos_matricula,
            
            ':trimestre_noviembre' =>   $trimestre_noviembre,
            ':trimestre_enero' =>       $trimestre_enero,
            ':trimestre_abril' =>       $trimestre_abril,
            
            ':pagado_noviembre' =>      $pagado_noviembre,
            ':pagado_enero'     =>      $pagado_enero,
            ':pagado_abril'     =>      $pagado_abril,
            
            ':cobros_activos_noviembre'     => $cobros_activos_noviembre,
            ':cobros_activos_enero'         => $cobros_activos_enero,
            ':cobros_activos_abril'         => $cobros_activos_abril,
            
            ':omitir_incluir_xml_noviembre' => $omitir_incluir_xml_noviembre,
            ':omitir_incluir_xml_enero'     => $omitir_incluir_xml_enero,
            ':omitir_incluir_xml_abril'     => $omitir_incluir_xml_abril
        );
      
        
        if(!$query->execute($datos))
        {
            error_log(__FILE__.__LINE__);
            error_log(print_r($query->errorInfo(),1));
            return false;
        }
        else
        {
            $inscripcion_pago= self::findByIdTabla($fip);
            return $inscripcion_pago;
        }
    }
    
    public static function actualizarCobrosActivosTrimestreTrasAnularPagoXML($id_fip,$trimestre)
    {
        if($trimestre===""){return false;}
        
        $query = db::singleton()->prepare('UPDATE formulariosinscripciones_pagos '
                                    .' SET cobros_activos_'.$trimestre.'=NULL '
                                    .' WHERE id='.$id_fip);

        if(!$query){    return false;   }
        $datos  =   array("");
                
        if(!$query->execute($datos)){   return false;   } 
        else {  return true;    }
    }
    
    public static function actualizarPagadoTrimestreTrasConfirmarPagoXML($id_fip,$trimestre,$fecha){
        if($trimestre===""){return false;}
        
        $query = db::singleton()->prepare('UPDATE formulariosinscripciones_pagos '
                                    .' SET pagado_'.$trimestre.'="'.$fecha.'" '
                                    .' WHERE id='.$id_fip);

        if(!$query){
            return false;
        }
        
        $datos=array("");
                
        if(!$query->execute($datos)){
            return false;
        } else {
            return true;
        }
    }
    
    public static function actualizarPagosTrimestres_v1($idinscripcion, 
            $pagado_enero, $pagado_abril, $pagado_noviembre, 
            $trimestre_enero=NULL, $trimestre_abril=NULL, $trimestre_noviembre=NULL, 
            $cobros_activos_enero=NULL,  $cobros_activos_abril=NULL,  $cobros_activos_noviembre=NULL)
    {
        $sql = "UPDATE formulariosinscripciones_pagos "
                ." SET pagado_noviembre=:pagado_noviembre,                  pagado_enero=:pagado_enero,                 pagado_abril=:pagado_abril,     "
                    . "trimestre_noviembre=:trimestre_noviembre,            trimestre_enero=:trimestre_enero,           trimestre_abril=:trimestre_abril,  "
                    . "cobros_activos_noviembre=:cobros_activos_noviembre,  cobros_activos_enero=:cobros_activos_enero, cobros_activos_abril=:cobros_activos_abril "
                . " WHERE"
                . " id_formularioinscripciones=:id";
        
        $query = db::singleton()->prepare($sql);

        if(!$query){
            return false;
        }

        $datos = array(
            ':id' => $idinscripcion,
            ':trimestre_enero' => $trimestre_enero,
            ':trimestre_abril' => $trimestre_abril,
            ':trimestre_noviembre' => $trimestre_noviembre,
            ':pagado_enero' => $pagado_enero,
            ':pagado_abril' => $pagado_abril,
            ':pagado_noviembre' => $pagado_noviembre,
            ':cobros_activos_noviembre'     => $cobros_activos_noviembre,
            ':cobros_activos_enero'         => $cobros_activos_enero,
            ':cobros_activos_abril'         => $cobros_activos_abril
        );
        
        
        if(!$query->execute($datos)) {
            return false;
        } else {
            return true;
        }
    }
    
    public static function actualizarPagos($idinscripcion, $pagado_enero, $pagado_abril, $pagado_noviembre, $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $total_pendiente, $trimestre_enero, $trimestre_abril, $trimestre_noviembre, $pagado_matricula, $pagado_pendiente_matricula, $cobros_activos)
    {
        $sql = "update formulariosinscripciones_pagos "
                . " set reserva=:reserva, "
                . " pagado_enero=:pagado_enero, pagado_abril=:pagado_abril, pagado_noviembre=:pagado_noviembre, "
                . " matricula=:matricula, pendiente_matricula=:pendiente_matricula, "
                . " total_inscripcion=:total_inscripcion, total_pendiente=:total_pendiente, "
                . " trimestre_enero=:trimestre_enero, trimestre_abril=:trimestre_abril, trimestre_noviembre=:trimestre_noviembre, "
                . " pagado_matricula=:pagado_matricula, pagado_pendiente_matricula=:pagado_pendiente_matricula, cobros_activos=:cobros_activos "
                . " where id_formularioinscripciones=:id";
        
        $query = db::singleton()->prepare($sql);

        if(!$query) {
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
            ':pagado_noviembre' =>              $pagado_noviembre,
            
            ':cobros_activos' =>                $cobros_activos,
        );

        if (!$query->execute($datos)) {
            return false;
        } else {
            return true;
        }
    }

    public static function createNewPago($idinscripcion, $fecha, $dni_titular, $reserva, $matricula, $pendiente_matricula, $total_inscripcion, $trimestre_enero, $trimestre_abril, $trimestre_noviembre, $pagado_matricula, $pagado_pendiente_matricula)
    {
        $sqlInsertInInscripcionesPagos = "insert into formulariosinscripciones_pagos (id_formularioinscripciones, fecha, dni_pagador, reserva, matricula, pendiente_matricula, total_inscripcion, trimestre_enero, trimestre_abril, trimestre_noviembre, pagado_matricula, pagado_pendiente_matricula) 
          values(:idform,:fech,:dni_tit,:res,:matricula,:pendiente_matricula,:total_inscripcion,:trimestre_en,:trimestre_ab,:trimestre_nov,:pagado_matricula,:pagado_pendiente_matricula)";

        $query = db::singleton()->prepare($sqlInsertInInscripcionesPagos);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }

        $datos = array(
            ':idform' => $idinscripcion,
            ':fech' => $fecha,
            ':dni_tit' => $dni_titular,
            ':res' => $reserva,
            ':matricula' => $matricula,
            ':pendiente_matricula' => $pendiente_matricula,
            ':total_inscripcion' => $total_inscripcion,
            ':trimestre_en' => $trimestre_enero,
            ':trimestre_ab' => $trimestre_abril,
            ':trimestre_nov' => $trimestre_noviembre,
            ':pagado_matricula' => $pagado_matricula,
            ':pagado_pendiente_matricula' => $pagado_pendiente_matricula
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
        return db::singleton()->query('update formulariosinscripciones_pagos fip join formulariosinscripciones fi on(fip.id_formularioinscripciones=fi.id_formulario) set fip.pagado = "' . $fechaPago . '" where fi.nombre_apellidos IN ' . $nombreApellidos . ' and fi.is_active = 1');
    }

//    public static function setPagadosTrimestreMatricula($dnis, $fechaPago)
//    {
//        return db::singleton()->query('update formulariosinscripciones_pagos set pagado_pendiente_matricula = "' . $fechaPago . '" where pendiente_matricula > 0 and dni_pagador IN ' . $dnis);
//    }

    public static function setPagadosTrimestreMatricula($dnis, $fechaPago)
    {
        return db::singleton()->query('update formulariosinscripciones_pagos fip join formulariosinscripciones fi on(fip.id_formularioinscripciones=fi.id_formulario) set pagado_pendiente_matricula = "' . $fechaPago . '" where fip.pendiente_matricula > 0 and fi.nombre_apellidos IN ' . $dnis);
    }

    public static function findPagadoById($idinscripcion)
    {
        return db::singleton()->query('SELECT DISTINCT pagado_enero, pagado_abril, pagado_noviembre '
                . 'FROM formulariosinscripciones_pagos '
                . 'WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findPagadoMatriculaById($idinscripcion)
    {
        return db::singleton()->query('select DISTINCT pagado_matricula from formulariosinscripciones_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findPagadoPendienteMatriculaById($idinscripcion)
    {
        return db::singleton()->query('select DISTINCT pagado_pendiente_matricula from formulariosinscripciones_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findFechaCobrosActivosPorId($idinscripcion)
    {
        return db::singleton()->query('select DISTINCT cobros_activos from formulariosinscripciones_pagos WHERE id_formularioinscripciones = "' . $idinscripcion . '"')->fetch();
    }

    public static function findAllDatosPagos()
    {
        $findAllDatosPagos = db::singleton()->query('SELECT
            fi.nombre_apellidos, fi.is_active, 
            
            fip.dni_pagador, fip.reserva, fip.matricula,  fip.pagado_matricula, fip.pagado_pendiente_matricula,
            fip.pendiente_matricula, fip.total_inscripcion, fip.trimestre_enero, fip.trimestre_abril, fip.trimestre_noviembre, 
            fip.cobros_activos_noviembre, fip.cobros_activos_enero, fip.cobros_activos_abril
            
            FROM formulariosinscripciones fi 
            JOIN formulariosinscripciones_pagos fip ON(fi.id_formulario=fip.id_formularioinscripciones)
            
            ORDER BY fi.nombre_apellidos ASC');

        if($findAllDatosPagos !== false){
            $findAllDatosPagos = $findAllDatosPagos->fetchAll();
        }else{
            $findAllDatosPagos = NULL;
        }

        return $findAllDatosPagos;
    }

        

    public static function setDomiciliationTrimestralToNull(){
        return db::singleton()->query('update formulariosinscripciones_pagos set pagado_noviembre = NULL, pagado_enero = NULL, pagado_abril = NULL');
    }

    public static function setPagadoPendienteMatriculaToNull()
    {
        return db::singleton()->query('update formulariosinscripciones_pagos set pagado_pendiente_matricula = NULL');
    }

    public static function findAllInscripcionesExcelEscuelaCanteraEditar() {
            
         /*   $query = db::singleton()->query('
            SELECT
              fi.dni_titular AS DNI_Titular,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_apellidos USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Completo,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.direccion USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Direccion,
              fi.numero AS Numero,
              fi.piso AS Piso,
              fi.puerta AS Puerta,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.poblacion USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Poblacion,
              fi.codigo_postal AS Codigo_Postal,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.provincia USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Provincia,
              fi.fecha_nacimiento AS Fecha_Nacimiento,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_padre USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Padre,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_madre USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Madre,
              fi.telefono_padre AS Telefono_Padre,
              fi.telefono_madre AS Telefono_Madre,
              fi.talla_camiseta AS Talla_Camiseta,
              fi.numero_camiseta AS Numero_Camiseta,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.modalidad USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Modalidad,
              fi.email AS Email,
              fi.alergico AS Alergico,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.alergias USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Alergias,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.titular_banco USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Titular_Cuenta_Bancaria,
              fi.iban AS IBAN,
              fi.entidad AS Entidad,
              fi.oficina AS Oficina,
              fi.dc AS DC, 
              fi.cuenta AS Cuenta
            FROM
              formulariosinscripciones fi
            LEFT JOIN
              formulariosinscripciones_pagos fip ON fi.id_formulario = fip.id_formularioinscripciones
            WHERE
              numero_pedido >= 10000142 AND fi.is_active = 1');
              */

              $query = db::singleton()->query('
            SELECT fi.dni_tutor AS DNI_Tutor,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_apellidos USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Completo,

              h.equipo as Equipo,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.direccion USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Direccion,
              fi.numero AS Numero,
              fi.piso AS Piso,
              fi.puerta AS Puerta,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.poblacion USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Poblacion,
              fi.codigo_postal AS Codigo_Postal,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.provincia USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Provincia,
              fi.fecha_nacimiento AS Fecha_Nacimiento,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_padre USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Padre,
              CONVERT(
                CAST(
                  CONVERT(
                    fi.nombre_madre USING latin1
                  ) AS BINARY
                ) USING utf8
              ) AS Nombre_Madre,
              fi.telefono_padre AS Telefono_Padre,
              fi.telefono_madre AS Telefono_Madre,
             
              fi.email AS Email
             
           
            FROM
              formulariosinscripciones fi
            LEFT JOIN
              horarios_equipos_19_20 h ON fi.id_equipo_horario = h.ID
              where
               fi.is_active = 1');
      
            if ($query)
                return $query->fetchAll(PDO::FETCH_ASSOC);
            else
                return false;
        }

}
?>