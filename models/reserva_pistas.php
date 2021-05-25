<?php
class reserva_pistas {
    
    //sacamos las reservas de pista por fecha
    public static function findAllReservaPistasByIdHorario($id) {
        //error_log('select * from horario_entrenamiento2 where  idhorario="' . $id . '"');
        return db_2::singleton()->query('select * from horario_entrenamiento2 where  idhorario="' . $id . '"')->fetch();
    }


    //sacamos las reservas de pista por fecha
    public static function findAllReservaPistasByFecha($fecha) {
       // error_log('select * from view_listado_horario2 where  fecha="' . $fecha . '"');
        return db_2::singleton()->query('select * from view_listado_horario2 where  fecha="' . $fecha . '"')->fetchAll();
    }



    //reservas de pista  POR FECHA Y HORA
    public static function findAllReservaPistaByFechaHora($fecha, $horaini, $horafin) {
      /* error_log('select * from view_listado_horario2 where  fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))');
            */

        return db_2::singleton()->query('select * from view_listado_horario2 where  fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))')->fetchAll();
    }

    


    

    //  para sacar el intervalo de horas de los entrenamientos
    public static function intervaloHora($hora_inicio, $hora_fin, $intervalo = 30) {

        $hora_inicio = new DateTime( $hora_inicio );
        $hora_fin    = new DateTime( $hora_fin );
        $hora_fin->modify('+1 second'); // Añadimos 1 segundo para que nos muestre $hora_fin

        // Si la hora de inicio es superior a la hora fin
        // añadimos un día más a la hora fin
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


    //consulta de asientos reservados por identrenador,  con conexion a bbd alqueria
    public static function findReservaSalaEstudioByIdcoach($idcoach) {
        //conecta a la bbdd de alqueria
        $hoy = date("Y-m-d");

        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and identrenador="' . $idcoach . '" and fecha>="' . $hoy . '" order by fecha')->fetchAll();
    }


    //recupera los datos de una reserva de pista por idusuario, con conexion a bbd alqueria
    public static function findReservaPistaByIdUsuario($iduser) {
       // require "db_2.php";
        $hoy = date("Y-m-d");
     
        return db_2::singleton()->query('select *  from horario_entrenamiento2 where idusuario_serv="' . $iduser . '" and fecha>="' . $hoy . '" order by fecha desc')->fetchAll();
    }


    //recupera los datos de una reserva de pista de gimnasio con conexion a bbd alqueria
    public static function findReservaPistaGimnasio() {
       // require "db_2.php";
        $hoy = date("Y-m-d");
    // error_log('select * from horario_entrenamiento2 where (pista="GIMNASIO" or tipo="G") and fecha>="' . $hoy . '" order by fecha asc');
        return db_2::singleton()->query('select * from horario_entrenamiento2 where (pista="GIMNASIO" or tipo="G") and fecha>="' . $hoy . '" order by fecha asc')->fetchAll();
    }







    //INSERTAR la solicitud de reserva de asiento en la tabla 'reserva_asiento_salaestudio' de la bbdd 'alqueria' 
    public static function InsertReservaPista($fecha, $hora, $horafin, $equipo, $espartido, $observ, $iduser, $idcoach, $tipo, $pista)     
    {
        
        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
        //error_log(__FILE__.__LINE__);
           // error_log(print_r("nuevo registro horario_entrenamiento2", 1));


        $sql="INSERT INTO horario_entrenamiento2"
            . "(fecha, hora_ini, hora_fin, equipo_local, es_partido, observ, tipo, idusuario_serv, idcoach, pista) "
        . " VALUES "
        . "    (:fecha, :ini, :fin, :equip, :part, :observ, :tipo, :userid, :coachid, :pista )";
                

        $query=db_2_utf8::singleton()->prepare($sql);

        if(!$query){
           // error_log(__FILE__.__FUNCTION__.__LINE__);
           //error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        }

        $datos=array(':fecha'=>$fecha,':ini'=>$hora,':fin'=>$horafin,':equip'=>$equipo, ':part'=>$espartido,
                      ':observ'=>$observ, ':tipo'=>$tipo, ':userid'=>$iduser, ':coachid'=>$idcoach, ':pista'=>$pista );
            
        if(!$query->execute($datos)) 
        {
           // error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        } 
        else
        {
            return true;
        }
    }


    //UPDATE la solicitud de reserva  de la pista gimnasio en la tabla horario_entrenamiento2 de la bbdd 'alqueria' 
    public static function UpdateReservaGimnasio($idhorario, $fecha, $horaini, $horafin, $equipo, $observ)     
    {

        //error_log(__FILE__.__LINE__);
        //  error_log(print_r("update registro gimnasio horario_entrenamiento2" , 1));

        $sql = "UPDATE  horario_entrenamiento2 
                SET    fecha=:fecha, hora_ini=:ini, hora_fin=:fin,  equipo_local=:equip, observ=:observ 
                WHERE idhorario=:id";
                

        $query=db_2_utf8::singleton()->prepare($sql);

        if(!$query){
           // error_log(__FILE__.__FUNCTION__.__LINE__);
           //error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        }

        $datos=array(':fecha'=>$fecha,':ini'=>$horaini,':fin'=>$horafin,':equip'=>$equipo, ':id'=>$idhorario,
                      ':observ'=>$observ );
            
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


    //ELIMINAR reserva de pista por idhorario
    public static function EliminarReservaPista($idreserva, $rutadevuelta) {
        $sql="delete from horario_entrenamiento2 where idhorario=:id";
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
            echo "<script text='javascript'> alert('La reserva de pista se anulo correctamente');
            window.location.replace('".$rutadevuelta."'); </script>";
            die;
        }
    }

    


     
}
?>