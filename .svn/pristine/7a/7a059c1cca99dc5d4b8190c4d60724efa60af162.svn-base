<?php
    class formulariosinscripciones_pagos
    {
        public static function findById($id_form)
        {
            return db::singleton()->query('select * from formulariosinscripciones_pagos where id="' . $id_form . '" ORDER BY id DESC')->fetch();
        }
    
        public static function updateAttribute($id,$nombreAtributo,$valorAtributo,$ponerComillas="no")
        {
            if($ponerComillas==="no")
            {   
                if($valorAtributo==0 )
                {
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=0 WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else
                {
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=".$valorAtributo." WHERE id=".$id;
                }
            }
            else
            {   
                if($valorAtributo=="0" )
                {
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
                else if($valorAtributo=="null" || is_null($valorAtributo) || empty($valorAtributo))
                {
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."=null WHERE id=".$id;
                }
                else{
                    $sentencia_sql="UPDATE formulariosinscripciones_pagos SET ".$nombreAtributo."='".$valorAtributo."' WHERE id=".$id;
                }
            }

//            error_log(__FILE__.__LINE__);    
//            error_log($sentencia_sql);
            
            $query=db::singleton()->prepare($sentencia_sql);

            if(!$query){error_log(print_r( db::singleton()->errorInfo()),1);die;}

            $datos=array("");

            if(!$query->execute($datos)){error_log(print_r( $query->errorInfo(),1));die;}
            else{return true;}
        }
        
        public static function findCobrosActivosMatricula()
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion          '
                    . ' FROM    formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN formulariosinscripciones     fi      ON      fip1.id_formularioinscripciones = fi.id_formulario'
                    . ' INNER JOIN horarios_equipos_19_20               ON      horarios_equipos_19_20.ID   =   fi.id_equipo_horario'
                    . ' WHERE   fip1.cobros_activos_matricula   IS NOT NULL '
                    . ' AND     fip1.pagado_matricula           IS NULL order by fip1.cobros_activos_matricula';
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        public static function findCobrosActivosTrimestre($trimestre)
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,          
                    fip1.cobros_activos_'.$trimestre.',                 fip1.pagado_'.$trimestre.',             fip1.trimestre_'.$trimestre
                    . ' FROM        formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN  formulariosinscripciones        fi          ON      fip1.id_formularioinscripciones =   fi.id_formulario'
                    . ' INNER JOIN  horarios_equipos_19_20                      ON      horarios_equipos_19_20.ID       =   fi.id_equipo_horario'
                    . ' WHERE       fip1.cobros_activos_'.$trimestre.'  IS NOT NULL '
                    . ' AND         fip1.pagado_'.$trimestre.'               IS NULL order by fip1.cobros_activos_'.$trimestre;
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        
        public static function findCobrosActivosMatriculaByIDEquipoHorario($id_equipo_horario)
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion          '
                    . ' FROM    formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN formulariosinscripciones     fi      ON      fip1.id_formularioinscripciones = fi.id_formulario'
                    . ' INNER JOIN horarios_equipos_19_20               ON      horarios_equipos_19_20.ID   =   fi.id_equipo_horario'
                    . ' WHERE   fip1.cobros_activos_matricula   IS NOT NULL '
                    . ' AND     fi.id_equipo_horario='.$id_equipo_horario
                    . ' AND     fip1.pagado_matricula           IS NULL order by fip1.cobros_activos_matricula';
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        public static function findCobrosActivosMatriculaExceptoIDEquipoHorario($id_equipo_horario)
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion          '
                    . ' FROM    formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN formulariosinscripciones     fi      ON      fip1.id_formularioinscripciones = fi.id_formulario'
                    . ' INNER JOIN horarios_equipos_19_20               ON      horarios_equipos_19_20.ID   =   fi.id_equipo_horario'
                    . ' WHERE   fip1.cobros_activos_matricula   IS NOT NULL '
                    . ' AND     fi.id_equipo_horario!='.$id_equipo_horario
                    . ' AND     fip1.pagado_matricula IS NULL order by fip1.cobros_activos_matricula';
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        public static function findCobrosActivosTrimestreByIDEquipoHorario($id_equipo_horario,$trimestre)
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,
                    fip1.cobros_activos_'.$trimestre.',                 fip1.trimestre_'.$trimestre.',          fip1.pagado_'.$trimestre.',             fip1.omitir_incluir_xml_'.$trimestre    
                    . ' FROM    formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN formulariosinscripciones     fi      ON      fip1.id_formularioinscripciones = fi.id_formulario'
                    . ' INNER JOIN horarios_equipos_19_20               ON      horarios_equipos_19_20.ID   =   fi.id_equipo_horario'
                    . ' WHERE   fip1.cobros_activos_'.$trimestre.' IS NOT NULL '
                    . ' AND     fi.id_equipo_horario='.$id_equipo_horario
                    . ' AND     fip1.pagado_'.$trimestre.' IS NULL order by fip1.cobros_activos_'.$trimestre;
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        public static function findCobrosActivosTrimestreExceptoIDEquipoHorario($id_equipo_horario,$trimestre)
        {
            $sentencia_sql=' SELECT   
                    fi.dni_jugador,                                     fi.nombre_apellidos,                    fi.dni_tutor,           fi.contenido,
                    fi.email,                                           fi.tipo,                                fi.id_equipo_horario,   fi.fecha, 
                    fi.iban,                                            fi.entidad,                             fi.oficina,             fi.dc,                  fi.cuenta,
                    fi.numero_pedido,                                   fi.nombre_padre,                        fi.nombre_madre,        fi.telefono_padre,      fi.telefono_madre,     
                    
                    horarios_equipos_19_20.equipo as nombre_equipo,
                    
                    fip1.id,                                            fip1.reserva,                           fip1.matricula,         
                    fip1.pendiente_matricula,                           (fip1.matricula-fip1.reserva) as resta, IF((fip1.matricula-fip1.reserva)=fip1.pendiente_matricula,"ok","diferente") as diferencia,
                    fip1.cobros_activos_matricula,                      fip1.pagado_matricula,                  fip1.aplicar_gastos_devolucion,          
                    fip1.cobros_activos_'.$trimestre.',                 fip1.trimestre_'.$trimestre.',          fip1.pagado_'.$trimestre.',             fip1.omitir_incluir_xml_'.$trimestre    
                    . ' FROM    formulariosinscripciones_pagos  fip1 '
                    . ' INNER JOIN formulariosinscripciones     fi      ON      fip1.id_formularioinscripciones = fi.id_formulario'
                    . ' INNER JOIN horarios_equipos_19_20               ON      horarios_equipos_19_20.ID   =   fi.id_equipo_horario'
                    . ' WHERE   fip1.cobros_activos_'.$trimestre.' IS NOT NULL  '
                    . '  AND    fi.id_equipo_horario!='.$id_equipo_horario
                    . '  AND    fip1.pagado_'.$trimestre.' IS NULL order by fip1.cobros_activos_'.$trimestre;
            
            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetchAll();
        }
        
        public static function anularPagoMatricular20192020($idinscripcion, $pendiente_matricula,  $total_pendiente)
        {
            $sentencia_sql = 'UPDATE formulariosinscripciones_pagos SET pagado_matricula=NULL,cobros_activos_matricula=NULL,pendiente_matricula='.$pendiente_matricula.',
                    total_pendiente='.$total_pendiente.' WHERE id='.$idinscripcion;

            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            return db::singleton()->query($sentencia_sql)->fetch();
            /*
            

            $query = db::singleton()->prepare($sql);

            if(!$query){
                return false;
            }

            $datos = array();

            if(!$query->execute($datos)){
                error_log(__FILE__.__LINE__);
                error_log(print_r($query->errorInfo(),1));
                return false;
            }
            else{
                //error_log(__FILE__.__LINE__.". idinscripcion vale ".$idinscripcion);
                return self::findById($idinscripcion);
            }*/
        }
        
        public static function anularPagoTrimestre20192020($trimestre,$idinscripcion, $total_pendiente)
        {
            $sentencia_sql = 'UPDATE formulariosinscripciones_pagos '
                    . 'SET pagado_'.$trimestre.'=NULL,cobros_activos_'.$trimestre.'=NULL,total_pendiente='.$total_pendiente.' WHERE id='.$idinscripcion;

            //error_log(__FILE__.__LINE__);
            //error_log($sentencia_sql);
            
            return db::singleton()->query($sentencia_sql)->fetch();
        }
    }
?>
