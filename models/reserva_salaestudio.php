<?php
class reserva_salaestudio {
    
    
    //saca los asientos activos en la sala
    public static function findAllAsientosSala() {
        return db_2::singleton()->query('select * from asientos_salaestudio where activo=1')->fetchAll();
    }


    //sacamos las reservas de la sala de estudio que se realizan desde la web desde el menu reserva de salas
    public static function findAllReservaSalaestudioCompleta($fecha) {
       // error_log('select * from view_reserva_salas where idsala=5 and fecha="' . $fecha . '"');
        return db_2::singleton()->query('select * from view_reserva_salas where idsala=5 and fecha="' . $fecha . '"')->fetchAll();
    }



    //reservas de la sala de estudio que se realizan desde la web desde el menu reserva de salas POR FECHA Y HORA
    public static function findAllReservaSalaestudioCompletaFechaHora($fecha, $horaini, $horafin) {
      /* error_log('select * from view_reserva_salas where idsala=5 and fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))');
            */

        return db_2::singleton()->query('select * from view_reserva_salas where idsala=5 and fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))')->fetchAll();
    }

    //Comprobar si hay reserva de asientos en la sala de estudio parsa la reserva de pistas web POR FECHA Y HORA
    public static function findAllReservaSalaEstudioFechaHora($fecha, $horaini, $horafin) {
      /* error_log('select * from reserva_asiento_salaestudio where  fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))');
        */
            

        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where  fecha="' . $fecha . '"  
            and ((hora_ini>"' . $horaini . '" and hora_ini<"' . $horafin . '")   
            or (hora_fin>"' . $horaini . '" and hora_fin<"' . $horafin . '")  
            or (hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '") 
            or (hora_ini<"' . $horaini . '" and hora_fin>"' . $horafin . '"))')->fetchAll();
    }



    //saca los asientos activos en la sala y disponibles segun fecha 
    public static function findAllAsientosDisponibles($fecha, $horaini, $horafin) {
        return db_2::singleton()->query('select * from asientos_salaestudio where activo=1 and idasiento not in (select idasiento from reserva_asiento_salaestudio where anulada=0 and fecha="' . $fecha . '" and hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '"  order by  hora_ini)')->fetchAll();
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


    //consulta de asientos reservados por identrenador,  con conexion a bbd alqueria
    public static function findReservaSalaEstudioByIdUsuario($iduser) {
        //conecta a la bbdd de alqueria
        $hoy = date("Y-m-d");

        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and idusuario="' . $iduser . '" and fecha>="' . $hoy . '" order by fecha')->fetchAll();
    }



    //consulta de asientos reservados solo por fecha,  con conexion a bbd alqueria
    public static function findReservaSalaEstudio($fecha) {
        //conecta a la bbdd de alqueria

        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and fecha="' . $fecha . '" order by hora_ini, idasiento')->fetchAll();
    }


     //consulta de reserva asientos por fecha y silla
    public static function findReservaByFechaSilla($fecha, $asiento) {
       // require "db_2.php";
        
        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and fecha="' . $fecha . '" and idasiento="' . $asiento . '" order by  hora_ini')->fetchAll();
    }


    //consulta de reserva asientos por fecha y horas
    public static function findReservaByFechaHorario($fecha, $horaini, $horafin) {
       // require "db_2.php";
        
        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and fecha="' . $fecha . '" and hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '"  order by  hora_ini')->fetchAll();
    }


    //consulta de reserva asientos por fecha y horas y asiento
    public static function findReservaByFechaHorarioSilla($fecha, $horaini, $horafin, $silla) {
       // require "db_2.php";
        
        return db_2::singleton()->query('select * from reserva_asiento_salaestudio where anulada=0 and fecha="' . $fecha . '" and hora_ini="' . $horaini . '" and hora_fin="' . $horafin . '" and idasiento="' . $silla . '" order by  hora_ini')->fetchAll();
    }


     //consulta de reserva de pistas, con conexion a bbd alqueria
    public static function findHorarioParaTablaSalas($fecha, $sala) {
       // require "db_2.php";
        
        return db_2::singleton()->query('select hora_ini, hora_fin, Sala, observ, referencia, contacto_reserva, estado from view_reserva_salas where idestado=1 and fecha="' . $fecha . '" and Sala="' . $sala . '" order by  hora_ini')->fetchAll();
    }




    //insertar la solicitud de reserva de asiento en la tabla 'reserva_asiento_salaestudio' de la bbdd 'alqueria' 
    public static function insertreservasalaestudio(
        $fechamysql,   $hora_inicio,  $hora_fin,  $asiento,  $idjugador,  $nombre, $equipo, $email, $identrenador, $observ, $reservadopor, $idusuario)
        
    {
        
        // Para mostrar el log en el "PHP errors log" y poder buscar los datos que no se envían
            error_log(__FILE__.__LINE__);
            error_log(print_r("entra", 1));


        $sql="INSERT INTO reserva_asiento_salaestudio"
            . "(fecha, hora_ini, hora_fin, idasiento, idjugador, nombre, equipo, email, identrenador, observ, reservado_por, idusuario) "
        . " VALUES "
        . "    (:fecha, :ini, :fin, :idas, :idjugador, :jugador, :equipo, :email, :ident, :observ, :reservadop, :iduser)";
                

        $query=db_2::singleton()->prepare($sql);

        if(!$query){
            error_log(__FILE__.__FUNCTION__.__LINE__);
           error_log(print_r(db_2::singleton()->errorInfo(),1));
            return false;
        }

        $datos=array(':fecha'=>$fechamysql,':ini'=>$hora_inicio,':fin'=>$hora_fin,':idas'=>$asiento, ':idjugador'=>$idjugador,
                      ':jugador'=>$nombre, ':equipo'=>$equipo, ':email'=>$email,  ':ident'=>$identrenador, ':observ'=>$observ, ':reservadop'=>$reservadopor, ':iduser'=>$idusuario );
            
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


    //anular reserva de asiento por web
    public static function AnularReservaAsientoByIdPorEntrenador($idreserva, $rutadevuelta) {
        $sql="update reserva_asiento_salaestudio set anulada=1 where idreserva=:id";
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
            echo "<script text='javascript'> alert('La reserva de asiento se anulo correctamente');
            window.location.replace('".$rutadevuelta."'); </script>";
            die;
        }
    }

    


     
}
?>