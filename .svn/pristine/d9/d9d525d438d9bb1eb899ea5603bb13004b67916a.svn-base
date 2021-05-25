<?php
    class formulariosinscripciones
    {
        public static function findByDNI($dni)
        {
            $sentencia_sql='SELECT  *   
                            FROM    formulariosinscripciones
                            WHERE   dni_titular="'.$dni.'" OR dni_tutor="'.$dni.'" OR dni_jugador="'.$dni.'" ';
            
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetch();
        }
        
        public static function getCategorias(){
            return db::singleton()->query('select federacion_categoria,count(*) as total_categoria from formulariosinscripciones group by federacion_categoria')->fetchAll();
        }
        
        public static function getEquipos(){
            return db::singleton()->query('select federacion_equipo,count(*) as total_equipo from formulariosinscripciones group by federacion_equipo')->fetchAll();
        }
        
        public static function getClubs(){
            return db::singleton()->query('select federacion_club,count(*) as total_club from formulariosinscripciones group by federacion_club')->fetchAll();
        }
        
        public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   $sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."=".$valorAtributo." WHERE id_formulario=".$id;}
            else
            {   $sentencia_sql="UPDATE formulariosinscripciones SET ".$nombreAtributo."='".$valorAtributo."' WHERE id_formulario=".$id;}

            $query=db::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db::singleton()->errorInfo()),1);die;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }
        
        
        /**   findAllActiveEscuelaTemporada20192020()   devuelve las inscripciones de:
         *      -   ESCUELA 
         *      -   Temporada 2019 / 2020
         *      -   activos
         * 
         *    Además, concatena formulariosinscripciones_pagos, cogiendo la última instancia ya que hay varias.     
        */
        public static function findAllActiveEscuelaTemporada20192020()
        {
            $subquery_id_equipo_horario="";
            if(!empty($id_equipo_horario))
            {$subquery_id_equipo_horario=' AND fi.id_equipo_horario='.$id_equipo_horario.' '; }
            
            return db::singleton()->query('
                SELECT 
                        * 
                FROM 
                        formulariosinscripciones fi
                INNER JOIN
                        formulariosinscripciones_pagos	fip1 	ON		fi.id_formulario = fip1.id_formularioinscripciones
                        INNER JOIN
                    (
                        SELECT 		id_formularioinscripciones,	id, MAX(id) AS maximo_id
                        FROM		formulariosinscripciones_pagos
                        GROUP BY 	id_formularioinscripciones
                    )
                    fip2 		ON	fip1.id_formularioinscripciones = fip2.id_formularioinscripciones 
                    AND fip2.maximo_id=fip1.id
                WHERE 
                    fi.temporada="19/20" 
                    '.$subquery_id_equipo_horario.'
                AND fi.tipo="ESCUELA" 
                AND fi.is_active=1')->fetchAll();
        }
        
        
        /**   find_cobros_activos_matricula_escuela()   devuelve las inscripciones de:
         *      -   ESCUELA 
         *      -   Temporada 2019 / 2020
         *      -   activos
         *      -   (opcional) un equipo en concreto 
         *  
         *    Además, concatena formulariosinscripciones_pagos, cogiendo la última instancia ya que hay varias.     
        */
        public static function find_cobros_activos_matricula_escuela($equipo="")
        {
            $subquery_id_equipo_horario="";
            if(!empty($equipo))
            {   $subquery_id_equipo_horario=' AND fi.id_equipo_horario='.$equipo.' '; }
            
            $sentencia_sql='SELECT                                      
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,     
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,
                    fip1.total_inscripcion,                                  fip1.total_pendiente         
                FROM 
                    formulariosinscripciones fi
                INNER JOIN
                    horarios_equipos_19_20                      ON              horarios_equipos_19_20.ID   =   fi.id_equipo_horario
                INNER JOIN
                    formulariosinscripciones_pagos	fip1 	ON		fi.id_formulario            =   fip1.id_formularioinscripciones
                    INNER JOIN
                    (
                        SELECT 		id_formularioinscripciones,	id,     MAX(id) AS maximo_id
                        FROM		formulariosinscripciones_pagos
                        GROUP BY 	id_formularioinscripciones
                    )
                    fip2 		ON	fip1.id_formularioinscripciones = fip2.id_formularioinscripciones   AND fip2.maximo_id=fip1.id
                WHERE 
                    fi.temporada="19/20" 
                AND (fip1.omitir_incluir_xml_matricula IS NULL OR fip1.omitir_incluir_xml_matricula=0)
                AND (fip1.cobros_activos_matricula IS NULL or fip1.cobros_activos_matricula="0000-00-00 00:00:00" )
                    '.$subquery_id_equipo_horario.'
                AND fi.is_active=1 AND fi.tipo="ESCUELA"';
            
            error_log(__FILE__.__LINE__);
            error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        
        /**   find_cobros_activos_trimestre()   devuelve las inscripciones de:
         *      -   Temporada 2019 / 2020
         *      -   activos
          *     -   trimestre {noviembre, enero, abril}
         *      -   (opcional) un equipo en concreto 
         *  
         *    Además, concatena formulariosinscripciones_pagos, cogiendo la última instancia ya que hay varias.     
        */
        public static function find_cobros_activos_trimestre_utf_8($trimestre,$equipo="")
        {
            //  Subquery para EQUIPO
            $subquery_id_equipo_horario="";
            if(!empty($equipo))
            {   $subquery_id_equipo_horario=' AND fi.id_equipo_horario='.$equipo.' '; }
            
            $sentencia_sql='
                SELECT                                      
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,     
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,
                    fip1.omitir_incluir_xml_'.$trimestre.',             fip1.cobros_activos_'.$trimestre.',     fip1.pagado_'.$trimestre.', fip1.trimestre_'.$trimestre.',
                    fip1.total_inscripcion,                             fip1.total_pendiente         
                FROM 
                    formulariosinscripciones fi
                INNER JOIN
                    horarios_equipos_19_20                      ON              horarios_equipos_19_20.ID   =   fi.id_equipo_horario
                INNER JOIN
                    formulariosinscripciones_pagos	fip1 	ON		fi.id_formulario            =   fip1.id_formularioinscripciones
                    INNER JOIN
                    (
                        SELECT 		id_formularioinscripciones,	id,     MAX(id) AS maximo_id
                        FROM		formulariosinscripciones_pagos
                        GROUP BY 	id_formularioinscripciones
                    )
                    fip2 		ON	fip1.id_formularioinscripciones = fip2.id_formularioinscripciones   AND fip2.maximo_id=fip1.id
                WHERE 
                    fi.temporada="19/20" 
                AND (fip1.omitir_incluir_xml_'.$trimestre.' IS NULL OR fip1.omitir_incluir_xml_'.$trimestre.'=0)
                AND (fip1.cobros_activos_'.$trimestre.' IS NULL or fip1.cobros_activos_'.$trimestre.'="0000-00-00 00:00:00" )
                    '.$subquery_id_equipo_horario.'
                AND fi.is_active=1';
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log($sentencia_sql);
//die;

            return db_utf8::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        
        
        /**   find_cobros_activos_trimestre()   devuelve las inscripciones de:
         *      -   Temporada 2019 / 2020
         *      -   activos
          *     -   trimestre {noviembre, enero, abril}
         *      -   (opcional) un equipo en concreto 
         *  
         *    Además, concatena formulariosinscripciones_pagos, cogiendo la última instancia ya que hay varias.     
        */
        public static function find_cobros_activos_trimestre($trimestre,$equipo="")
        {
            //  Subquery para EQUIPO
            $subquery_id_equipo_horario="";
            if(!empty($equipo))
            {   $subquery_id_equipo_horario=' AND fi.id_equipo_horario='.$equipo.' '; }
            
            $sentencia_sql='
                SELECT                                      
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,     
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,
                    fip1.omitir_incluir_xml_'.$trimestre.',             fip1.cobros_activos_'.$trimestre.',     fip1.pagado_'.$trimestre.', fip1.trimestre_'.$trimestre.',
                    fip1.total_inscripcion,                             fip1.total_pendiente         
                FROM 
                    formulariosinscripciones fi
                INNER JOIN
                    horarios_equipos_19_20                      ON              horarios_equipos_19_20.ID   =   fi.id_equipo_horario
                INNER JOIN
                    formulariosinscripciones_pagos	fip1 	ON		fi.id_formulario            =   fip1.id_formularioinscripciones
                    INNER JOIN
                    (
                        SELECT 		id_formularioinscripciones,	id,     MAX(id) AS maximo_id
                        FROM		formulariosinscripciones_pagos
                        GROUP BY 	id_formularioinscripciones
                    )
                    fip2 		ON	fip1.id_formularioinscripciones = fip2.id_formularioinscripciones   AND fip2.maximo_id=fip1.id
                WHERE 
                    fi.temporada="19/20" 
                AND (fip1.omitir_incluir_xml_'.$trimestre.' IS NULL OR fip1.omitir_incluir_xml_'.$trimestre.'=0)
                AND (fip1.cobros_activos_'.$trimestre.' IS NULL or fip1.cobros_activos_'.$trimestre.'="0000-00-00 00:00:00" )
                    '.$subquery_id_equipo_horario.'
                AND fi.is_active=1';
            
//error_log(__FILE__."/".__FUNCTION__."/Linea ".__LINE__);
//error_log($sentencia_sql);

            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        
        /***    findInscripcionesPagosIncluidasEnXMLPorConfirmarPago() devuelve los cobros que se generaron en ficheros XML, se enviaron al banco y se espera 
         *      que se confirmen o que se anulen para su repetición.
         * 
         *      $recibo_a_consultar = { matricula, noviembre, enero, abril }
         */
        public static function findInscripcionesPagosIncluidasEnXMLPorConfirmarPago($recibo_a_consultar)
        {
            if($recibo_a_cobrar===""){
                return false;
            }
            
            return db::singleton()->query('SELECT '
                    . ' fi.numero_pedido,    fi.nombre_apellidos, fi.email, '
                    . ' fip.id AS id_fip,    fip.dni_pagador, fip.cobros_activos_'.$trimestre.' AS cobro_activo,'
                    . ' fip.pagado_'.$trimestre.' AS pagado '
            . 'FROM '
                . ' `formulariosinscripciones_pagos` fip '
            . 'INNER JOIN '
                . ' `formulariosinscripciones` fi ON fi.id_formulario = fip.id_formularioinscripciones '
            . 'WHERE '
                . ' `trimestre_noviembre` > 0 AND '
                . ' `cobros_activos_'.$trimestre.'` IS NOT NULL '
                . ' AND `pagado_'.$trimestre.'` IS NULL ' 
            . 'ORDER BY cobro_activo')->fetchAll();
        }
    }
    
    
    
    
    /*  La siguiente query es útil para comprobar si las cantidades de la mátricula están bien 
SELECT 
                    fi.dni_jugador, fi.nombre_apellidos,    fi.dni_tutor,
                    fi.email,       fi.tipo,                fi.id_equipo_horario,
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    fip1.id,        fip1.reserva,   fip1.matricula,         fip1.pendiente_matricula,   
                    (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,          fip1.pagado_matricula,
                    fip1.aplicar_gastos_devolucion         
                FROM 
                    formulariosinscripciones fi
                INNER JOIN
                    horarios_equipos_19_20                      ON              horarios_equipos_19_20.ID   =   fi.id_equipo_horario
                INNER JOIN
                    formulariosinscripciones_pagos	fip1 	ON		fi.id_formulario            =   fip1.id_formularioinscripciones
                    INNER JOIN
                    (
                        SELECT 		id_formularioinscripciones,	id,     MAX(id) AS maximo_id
                        FROM		formulariosinscripciones_pagos
                        GROUP BY 	id_formularioinscripciones
                    )
                    fip2 		ON	fip1.id_formularioinscripciones = fip2.id_formularioinscripciones 
                    AND fip2.maximo_id=fip1.id
                WHERE 
                    fi.temporada="19/20" 
                AND fi.tipo="ESCUELA" 
                AND fi.is_active=1
     *      */
?>
