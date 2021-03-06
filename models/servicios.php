<?php
class servicios {
    public static function findForSeccion($seccion) {

        return db::singleton()->query('select * from servicios where seccion_servicio="' . $seccion . '"')->fetchAll();
    }

    public static function updateServicio($id_evento, $titulo_cas, $titulo_val, $titulo_eng, $titulo_rus, $contenido_cas, $contenido_val, $contenido_eng, $contenido_rus, $fichero_subido, $fichero_subido_min, $seccion) {

        $sql = "update servicios set titulo_servicio_cas=:titulo_cas,titulo_servicio_val=:titulo_val,titulo_servicio_eng=:titulo_eng,titulo_servicio_rus=:titulo_rus,contenido_servicio_cas=:contenido_cas,contenido_servicio_val=:contenido_val,contenido_servicio_eng=:contenido_eng,contenido_servicio_rus=:contenido_rus,ruta_imagen_servicio=:fichero_subido,ruta_imagen_servicio_min=:fichero_subido_min where id_servicio=:id";
        $query = db::singleton()->prepare($sql);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }
        $datos = array(':titulo_cas' => $titulo_cas, ':titulo_val' => $titulo_val, ':titulo_eng' => $titulo_eng, ':titulo_rus' => $titulo_rus, ':contenido_cas' => $contenido_cas, ':contenido_val' => $contenido_val, ':contenido_eng' => $contenido_eng, ':contenido_rus' => $contenido_rus, ':fichero_subido' => $fichero_subido, ':fichero_subido_min' => $fichero_subido_min, ':id' => $id_evento);
        if (!$query->execute($datos)) {
            var_dump(db::singleton()->errorInfo());
            die;
        } else {
            echo "<script text='javascript'> alert('El servicio se actualizo correctamente');
			window.location.replace('?r=back/" . $seccion . "'); </script>";
            die;
        }
    }

    public static function deleteImagenServicio($id, $seccion) {

        $imagen = db::singleton()->query('select * from servicios where id_servicio=' . $id)->fetch();
        $imagen_servicio = $imagen['ruta_imagen_servicio'];
        $imagen_servicio_min = $imagen['ruta_imagen_servicio_min'];
        unlink($imagen_servicio);
        unlink($imagen_servicio_min);

        $sql = "update servicios set ruta_imagen_servicio='',ruta_imagen_servicio_min='' where id_servicio=" . $id;

        $query = db::singleton()->prepare($sql);

        if (!$query) {
            var_dump(db::singleton()->errorInfo());
            die;
        }
        $datos = array(':id' => $id);
        if (!$query->execute($datos)) {
            var_dump(db::singleton()->errorInfo());
            die;
        } else {
            echo "<script text='javascript'> alert('La imagen del servicio se elimin?? correctamente');
			window.location.replace('?r=back/" . $seccion . "'); </script>";
            die;
        }
    }


    /*  RESERVA DE PISTAS  */

    public static function findAllPistas() {
        return db::singleton()->query('select * from pistas where activa=1')->fetchAll();
    }

    //consulta de reserva de pistas, con conexion a bbd alqueria
    public static function findHorario($fecha) {
        //require "db_2.php";
        //Cambio de tabla por la carga de entrenamientos desde excel
        //a fecha 28/12/2020 incluimos en l aconsulta que no se muestren los registros sin pista asignada (and pista <>"")
        
        //return db_2::singleton()->query('select horario, pista, equipo_local, es_partido, equipo_visit, observ, hora_ini, hora_fin from view_listado_horario2 where equipo_local<>"" and equipo_local<>"1-PISTA LIBRE"  and fecha="' . $fecha . '" and pista <>"" and order by  pista, hora_ini')->fetchAll();

//a fecha 7/1/2021 no se mostraran las reservas de pista del tipo S con pista<>"", si es otro tipo y no hay pista si se mostrara
        return db_2::singleton()->query('select fecha, horario, pista, equipo_local, es_partido, equipo_visit, observ, hora_ini, hora_fin, tipo from view_listado_horario2 where equipo_local<>"" and equipo_local<>"1-PISTA LIBRE"  and fecha="' . $fecha . '" and pista <>"" or ((pista <>"" and tipo="S" and fecha="' . $fecha . '" ) or (pista ="" and tipo="P" and fecha="' . $fecha . '"))
order by  pista, hora_ini')->fetchAll();
    }

    //consulta de reserva de pistas, con conexion a bbd alqueria
    public static function findHorarioParaTabla($fecha, $pista) {
       // require "db_2.php";
        //Cambio de tabla por la carga de entrenamientos desde excel
       // return db_2::singleton()->query('select horario, pista, equipo_local, es_partido, equipo_visit, observ, hora_ini, hora_fin from view_listado_horario2 where equipo_local<>"" and equipo_local<>"1-PISTA LIBRE" and fecha="' . $fecha . '" and pista="' . $pista . '" order by  hora_ini')->fetchAll();


        return db_2::singleton()->query('select horario, pista, equipo_local, es_partido, equipo_visit, observ, hora_ini, hora_fin from view_listado_horario2 where equipo_local<>"" and equipo_local<>"1-PISTA LIBRE"  and fecha="' . $fecha . '" and pista <>"" or ((pista <>"" and tipo="S" and fecha="' . $fecha . '" ) or (pista ="" and tipo="P" and fecha="' . $fecha . '"))
order by  pista, hora_ini')->fetchAll();
    }


    //  consulta de reserva de pistas, saca los nombres de las pistas, con conexion a bbd alqueria
    public static function finddistincpistas($fecha) {
       // require "db_2.php";
        //Cambio de tabla por la carga de entrenamientos desde excel
        return db_2::singleton()->query('select distinct(pista)  from view_listado_horario2 where equipo_local<>"" and fecha="' . $fecha . '" order by  pista')->fetchAll();
    }


    //  para sacar el intervalo de horas de los entrenamientos
    public static function intervaloHora($hora_inicio, $hora_fin, $intervalo = 15) {

        $hora_inicio = new DateTime( $hora_inicio );
        $hora_fin    = new DateTime( $hora_fin );
        $hora_fin->modify('+1 second'); // A??adimos 1 segundo para que nos muestre $hora_fin

        // Si la hora de inicio es superior a la hora fin
        // a??adimos un d??a m??s a la hora fin
        if ($hora_inicio > $hora_fin) {

            $hora_fin->modify('+1 day');
        }

        // Establecemos el intervalo en minutos        
        $intervalo = new DateInterval('PT'.$intervalo.'M');

        // Sacamos los periodos entre las horas
        $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);        

        foreach( $periodo as $hora ) {

            // Guardamos las horas intervalos 
            $horas[] =  $hora->format('H:i:s');
        }

        return $horas;
    }




    /*  RESERVA DE SALAS  */
    
    //consulta de salas reservadas,  con conexion a bbd alqueria
    public static function findReservaSalas($fecha) {
        //require "db_2.php";
        //conecta a la bbdd de alqueria, el resto conecta a la bbdd alqueriaforms
        return db_2::singleton()->query('select hora_ini, hora_fin, Sala, observ, referencia, contacto_reserva, estado,idusuario_serv, idcoach, idreserva_sala  from view_reserva_salas where idestado=1 and fecha="' . $fecha . '" order by hora_ini, sala')->fetchAll();
    }

     //consulta de reserva de pistas, con conexion a bbd alqueria
    public static function findHorarioParaTablaSalas($fecha, $sala) {
       // require "db_2.php";
        
        return db_2::singleton()->query('select hora_ini, hora_fin, Sala, observ, referencia, contacto_reserva, estado from view_reserva_salas where idestado=1 and fecha="' . $fecha . '" and Sala="' . $sala . '" order by  hora_ini')->fetchAll();
    }


     //consulta de reserva de salas, saca los nombres de las salas, con conexion a bbd alqueria
    public static function finddistincsalas($fecha) {
       // require "db_2.php";
       
        return db_2::singleton()->query('select distinct(nombre)  from salas  order by  nombre')->fetchAll();
    }


    //recupera los datos de una reserva de sala, con conexion a bbd alqueria
    public static function findReservaById($idreserva) {
       // require "db_2.php";
       
        return db_2::singleton()->query('select *  from view_reserva_salas where idreserva_sala="' . $idreserva . '"')->fetch();
    }


    //recupera los datos de una reserva de sala por idcoach, con conexion a bbd alqueria
    public static function findReservaSalaByIdcoach($idcoach) {
       // require "db_2.php";
        $hoy = date("Y-m-d");
     //  error_log('select *  from view_reserva_salas where idcoach="' . $idcoach . '" and fecha>="' . $hoy . '"');
        return db_2::singleton()->query('select *  from view_reserva_salas where idcoach="' . $idcoach . '" and fecha>="' . $hoy . '" order by fecha')->fetchAll();
    }


    //recupera los datos de una reserva de sala por idusuario, con conexion a bbd alqueria
    public static function findReservaSalaByIdUsuario($iduser) {
       // require "db_2.php";
        $hoy = date("Y-m-d");
     
        return db_2::singleton()->query('select *  from view_reserva_salas where idusuario_serv="' . $iduser . '" and fecha>="' . $hoy . '" order by fecha')->fetchAll();
    }


    //modifica el estado de una reserva a Idestado=5 que es Anulada
    public static function updateEstadoReservaSala($idreserva){
        $sql="update reserva_salas set idestado=5 where idreserva_sala=:id";
        $query=db_2::singleton()->prepare($sql);
         
        if(!$query) {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        $datos=array(':id'=> $idreserva);
        if(!$query->execute($datos)){
            var_dump( db::singleton()->errorInfo ());
            die;
        } else {
            echo "<script text='javascript'> alert('La reserva se anulo correctamente');
            window.location.replace('?r=pistas/ConsultaSalas'); </script>";
            die;
        }
    }    


    //anular reserva de sala  por el entrenador o por el usuario logueado
    public static function AnularReservaByIdPorEntrenador($idreserva, $rutadevuelta) {
        $sql="update reserva_salas set idestado=5 where idreserva_sala=:id";
        $query=db_2::singleton()->prepare($sql);
        
        if(!$query) {
            var_dump( db::singleton()->errorInfo ());
            die;
        }
        $datos=array(':id'=> $idreserva);
        if(!$query->execute($datos)){
            var_dump( db::singleton()->errorInfo ());
            die;
        } else {
            echo "<script text='javascript'> alert('La reserva  se anulo correctamente');
            window.location.replace('".$rutadevuelta."'); </script>";
            die;
        }
    }




    //insertar la solicitud de sala en la tabla 'reserva_salas' de la bbdd 'alqueria' con idestado=3 'En estudio'
    public static function insertreservasala(
        $idsala_int,        $fechamysql,                 $hora_inicio,       $hora_fin,              $referencia_intranet, 
        $observ_intranet,   $nombre_solicitante,    $email_solicitante, $proyector_intranet,    $ordenador_intranet, 
        $pizarra_intranet,  $zona,                  $fecha_creacion, $iduser, $idcoach)
    {
       

        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se env??an
          //  error_log(__FILE__.__LINE__);
           // error_log(print_r("entra", 1));

       

        $sql="INSERT INTO reserva_salas"
            . "(idsala,     fecha,      hora_ini,       hora_fin,           proyector,  referencia, "
        . "     observ,     idestado,   fechasolicitud, contacto_reserva,   email,      pizarra, "
        . "     ordenador,  zona, idusuario_serv, idcoach) "
        . " VALUES "
        . "     (   :sala, :fecha, :ini, :fin, :proyec, :ref, "
        . "         :observ, :idest, :fechasolic, :nombre, :email, :pizarra,"
        . "         :aud, :zona, :userid, :coachid )";

        $query=db_2::singleton()->prepare($sql);

        if(!$query){
           // error_log(__FILE__.__FUNCTION__.__LINE__);
           //error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        }

        $datos=array(':sala'=>$idsala_int,':fecha'=>$fechamysql,':ini'=>$hora_inicio,':fin'=>$hora_fin,':ref'=>$referencia_intranet,
                    ':observ'=>$observ_intranet, ':idest'=>3,  ':nombre'=>$nombre_solicitante, ':email'=>$email_solicitante, ':proyec'=>$proyector_intranet, ':aud'=>$ordenador_intranet, 
                    ':pizarra'=>$pizarra_intranet, ':zona'=>$zona, ':fechasolic'=>$fecha_creacion, ':userid'=>$iduser, ':coachid'=>$idcoach );
            
        if(!$query->execute($datos)) 
        {
           // error_log(__FILE__.__FUNCTION__.__LINE__);
           // error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        } 
        else
        {
            return true;
        }
    }
}
?>