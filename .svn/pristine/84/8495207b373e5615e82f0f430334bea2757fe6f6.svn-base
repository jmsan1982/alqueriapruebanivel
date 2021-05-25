<?php
    class shootingcampController {


        public function actionComprobarAlumno() {
            require "models/shootingcamp.php";
//error_log($_POST["dni"]);
           $comprobacion = shootingcamp::findByDNIJugadorEnAlqueria( $_POST["dni"] );
//console.log($comprobacion);
            if( !empty($comprobacion) ) {
                echo json_encode(array(
                    "response"          =>  "success",
                    "message"           =>  "coincidencia"));
                die;
            }
            else {
                echo json_encode(array(
                    "response"          =>  "error",
                    "message"           =>  "No hay coincidencia con el DNI o pasaporte introducido"));
                die;
           }
        }



        // Recibe el formulario de inscripción del Shooting Academy 2021
        public function actionShootingCampForm() {
            
            if (isset($_POST['nombre'])) {

                //error_log("entramos al shooting");

                $_SESSION['actualizar_entidad_pagos'] = "inscripcion_shooting_camp";

                // Sacamos el año de nacimiento (PARA NIN@S ENTRE 13 Y 18 AÑOS)
                $anyonacimiento = Date( "Y" , strtotime( $_POST['fechanacimiento'] ) );

                if ($anyonacimiento >= 2003 && $anyonacimiento <= 2010) {
                    $correcto = 1;
                }
                else {
                    $correcto = 0;
                }

                if ($correcto == 0) {
                    echo json_encode(array(
                        "response"      =>  "error",
                        "message"       =>  "La edad para poder registrarse es entre 11 y 18 años."));
                    die;
                }

                require "models/shootingcamp.php";
         
                //Recogemos todos los datos del formulario
                $fecharegistro  = date("Y-m-d");
                $opcion         = $_POST['opcion'];
                $genero         = $_POST['genero'];
                $nombre         = $_POST['nombre'];
                $apellidos      = $_POST['apellidos'];
                $fechanacimiento = $_POST['fechanacimiento'];
                $dni = $_POST['dni'];
                // Quitamos los guiones /
                $dni = str_replace ( "-" , "" , $dni);
                // Quitamos los espacios /
                $dni = str_replace ( " " , "" , $dni);
                // Quitamos los puntos /
                $dni = str_replace ( "." , "" , $dni);
                $club = $_POST['club'];
                $tallaropa = $_POST['tallacamiseta'];
                $transporte ="-";
                $enfermedad = $_POST['enfermedad'];
                $alergias = $_POST['alergias'];
                $tratamientosmedicos = $_POST['tratamientosmedicos'];
                $operaciones = $_POST['operacionreciente'];
                $observ = $_POST['observaciones'];

                $sintomasc          = $_POST['sintomascovid'];
                $familiarc          = $_POST['familiarcovid'];

                $nombretutor = $_POST['nombretutor'];
                $apellidostutor = $_POST['apellidostutor'];
                $dnitutor = $_POST['dnitutor'];
                // Quitamos los guiones /
                $dnitutor = str_replace ( "-" , "" , $dnitutor);
                // Quitamos los espacios /
                $dnitutor = str_replace ( " " , "" , $dnitutor);
                // Quitamos los puntos /
                $dnitutor = str_replace ( "." , "" , $dnitutor);
                //ponemos las letras en mayusculas
                $dnitutor = strtoupper( $dnitutor );
                $direccion = $_POST['direccion'];
                $numero = $_POST['numero'];
                $piso = $_POST['piso'];
                $puerta = $_POST['puerta'];
                $cp = $_POST['cp'];
                $provincia = $_POST['provincia'];
                $poblacion = $_POST['poblacion'];
                $pais = $_POST['pais'];
                $telefono = $_POST['telefonotutor'];
                $email = strtolower( $_POST['emailtutor'] );
                $nombreapellidos = $nombre." ".$apellidos;
                
                //Comprobamos las dos autorizaciones
                if (isset($_POST['autorizodatos'])) {
                    $autdatos = "si";
                }
                else {
                    $autdatos = "no";
                }

                if (isset($_POST['autorizoimagen'])) {
                    $autimg = "si";
                }
                else {
                    $autimg = "no";
                }

                //Calculamos el importe segun la opcion que tenga seleccionada
                $evento="Shooting 2021";
                $importe = 0;
                $importetpv = 0;
                switch ( $_POST['opcion'] ) {
                    case "jugadores_internos":
                        $importe=750;
                        $importetpv=75000; //le ponemos los dos ceros para la pasarela de pago
                        
                    break;
                    case "jugadores_externos":
                        $importe=360;
                        $importetpv=36000;
                       
                    break;

                    case "jugadores_internos_club":
                        $importe=637.5;
                        $importetpv=63750;
                       
                    break;
                    case "jugadores_externos_club":
                        $importe=306;
                        $importetpv=30600;
                        
                    break;
                  /*  case "internos_dos_campus":
                        $importe=1130;
                        $evento="Shooting y Skills Camp 2020";
                    break;
                    case "externos_dos_campus":
                        $importe=684;
                        $evento="Shooting y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_a":
                        $importe=845;
                        $evento="Campus Valencia Basket Calvestra y Shooting Academy 2020";
                    break;
                    case "pack_uno_opcion_b":
                        $importe=845;
                        $evento="Shooting Academy y Campus Valencia Basket Calvestra 2020";
                    break;
                    case "pack_dos_opcion_a":
                        $importe=920;
                        $evento="Shooting Academy y Tecnificación Femenina 2020";
                    break;
                    */
                }

                //PENDIENTE: DESCUENTOS

                $porcentajeDescuento = 0;
                    //PENDIENTE: codigo 15%
                /*  if ( $_POST["CodigoValido"] == "1" ) {
                        $porcentajeDescuento = $porcentajeDescuento + 15;
                    }
                    */

                    //Inscrito ya en otro campus (Tecnificación Femenina, Campus de Verano, Shooting y Skills) 10%  
                        $inscrito = false;
                    //  $comprovacionTecnificacion  = shootingcamp::findByDNIEnTecnificacion( $dni );
                    //  $comprovacionCampusVerano   = shootingcamp::findByDNIEnCampusVerano( $dni );
                    //  $comprovacionSkillsShooting = shootingcamp::findByDNIEnSkillsYShooting( $dni );

                    //  if( ( !empty( $comprovacionTecnificacion ) >= 1 ) || ( !empty( $comprovacionCampusVerano ) >= 1 ) || ( !empty( $comprovacionSkillsShooting ) >= 1 ) ){
                            //error_log("Entramos a los if del inscrito");
                    //      $inscrito = true;
                    //  }

                    //  if( $inscrito ){
                    //      $porcentajeDescuento = $porcentajeDescuento + 10;
                    //  }
                        

                    //hermanos
                        /*
                        $busquedaHermanos = shootingcamp::findByDNITutor( $dnitutor );

                        if( $busquedaHermanos != false && ( count( $busquedaHermanos ) >= 2 ) ){

                            $juegaEnVB = false;

                            foreach ( $busquedaHermanos as $hermano ) {
                                //buscar en la tabla jugadores de alqueria por DNI jugador si juega en VB
                                $busquedaHermanoVB = shootingcamp::findByDNIJugadorEnAlqueria( $hermano["dni"] );

                                if( count( $busquedaHermanoVB ) >= 1 ){
                                    $juegaEnVB = true;
                                }
                            }

                            if( $juegaEnVB ){
                                //si uno de los dos juega en el valencia basket 5%
                                $porcentajeDescuento = $porcentajeDescuento + 5;
                            }else{
                                //Si no juega ninguno en valencia basket 10%
                                $porcentajeDescuento = $porcentajeDescuento + 10;
                            }       
                        }
                         
                    if( $porcentajeDescuento != 0 ){
                        $cantidadADescontar = ( $importe * $porcentajeDescuento ) / 100;
                        $importe = $importe - $cantidadADescontar ;
                    }
                    */

                $pagado = 0;  
                
                //Recogemos el ultimo numero de pedido
                $ultimopedido = shootingcamp::findLastNumeroPedidoShooting();
                $numeropedido = $ultimopedido['MAX(id)'];

                $numeropedido = $numeropedido + 1;

                $numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

                $numeropedido = $numeropedido . "csho21";

                error_log("Pedido: ".$numeropedido);


                //Formateo Nombre Imagen Tarjeta Sanitaria

                //Explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."

                $valores = explode(".", $_FILES['fotocopiasip']['name']);

                $extension = $valores[count($valores)-1];


                $nombre_base = $_POST['nombre'];
                // Sustituimos los espacios por guiones
                $nombre_format = str_replace ( " " , "-" , $nombre_base);
                // Sustituimos los puntos por guiones
                $nombre_format = str_replace ( "." , "-" , $nombre_format);

                $apellidos_base = $_POST['apellidos'];
                // Sustituimos los espacios por guiones
                $apellidos_format = str_replace ( " " , "-" , $apellidos_base);
                // Sustituimos los puntos por guiones
                $apellidos_format = str_replace ( "." , "-" , $apellidos_format);


                // Quitamos todos los acentos, eñes y carácteres raros
                setlocale(LC_ALL, 'en_US.UTF8');
                $nombre_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
                $apellidos_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));


                $nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;


                $dir_subida = 'img/shootingcamp/';
                $fichero = $nombre_y_apellidos_format."-S-".date("d-m-Y-H-i-s").".".$extension;
                $fichero_subido = $dir_subida.$fichero;

                /* UPLOAD */
                move_uploaded_file($_FILES['fotocopiasip']['tmp_name'], $fichero_subido);


                $enviar = $_POST['enviar'];

                if ($enviar == "oficina") { 
                    //Formateo Nombre Imagen del resguardo de transferencia
                    $ficherosubido2 = "";
                    //Explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."
                    $valores2        = explode(".", $_FILES['resguardoingreso']['name']);
                    // Guardamos la extensión original del archivo subido
                    $extension_resg      = $valores2[count($valores2)-1];

                    if ($_FILES['resguardoingreso']['error'] == 0) {
                            // Damos formato al nombre de la imagen 2
                        $fichero2       = $nombre_y_apellidos_format . "-R-".date("d-m-Y-H-i-s").".".$extension_resg;
                        $ficherosubido2 = $dir_subida . $fichero2;

                            // Guardamos la imagen 2 (si corresponde) en la carpeta del servidor //
                        move_uploaded_file($_FILES['resguardoingreso']['tmp_name'], $ficherosubido2);
                    }
                    else {
                        $ficherosubido2 = "";
                    }
                }else{ $ficherosubido2 = "";}




                /* Controlamos si se va a pagar con tarjeta o en oficinas  */
               
                if ($enviar == "tarjeta") {   

                    $tipopago = "ONLINE";

                /*  switch ( $_POST['opcion'] ) {
                        case "pack_uno_opcion_a":

                            $nuevoformularioCampusVerano = shootingcamp::insertCampusVerano(0, 0, 1, 1, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
                            //error_log("pasamos el insert campus verano");
                        break;
                        case "pack_uno_opcion_b":

                            $nuevoformularioCampusVerano = shootingcamp::insertCampusVerano(0, 0, 0, 1, 1, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
                            //error_log("pasamos el insert campus verano");
                        break;
                        case "pack_dos_opcion_a":

                            $nuevoformularioTecnificacionFemenina = shootingcamp::insertTecnificacionFemenina("segundoturno", $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, null, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, null, $tipopago, 0, null);
                            //error_log("pasamos el insert escuela tecnificacion femenina");
                        break;
                    }
                    */

                    $nuevoformulario = shootingcamp::newFormShootingCamp($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, $numeropedido, $importe, $fichero_subido, $tipopago, $pais, $evento, $sintomasc, $familiarc, $genero,  $pagado, $ficherosubido2 );
                    //error_log("pasamos el insert shooting camp");

                    if ( $nuevoformulario ) {
                        header( 'Location: https://servicios.alqueriadelbasket.com/tpv_shootingcamp/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importetpv );

                       // header('Location: http://localhost/serviciosalqueria3/tpv_shootingcamp/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importetpv);
                    }
                    else {
                        /*echo json_encode(array(
                            "response"      =>  "error",
                            "message"       =>  "Fallo al realizar el resgistro con pago con tarjeta."));
                        die;*/
                        echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                    window.location.replace('?r=index/shootingcamp');
                                </script>";
                       die;
                    }
                }
                elseif ( $enviar == "oficina" ) {
                    if ($ficherosubido2!="") {
                        $tipopago = "TRANSFERENCIA";

                    /*switch ( $_POST['opcion'] ) {
                        case "pack_uno_opcion_a":

                            $nuevoformularioCampusVerano = shootingcamp::insertCampusVerano(1, 1, 0, 0, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
                                //error_log("pasamos el insert campus verano");
                        break;
                        case "pack_uno_opcion_b":

                            $nuevoformularioCampusVerano = shootingcamp::insertCampusVerano(0, 0, 1, 1, 0, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, $tipopago, 0, null);
                                //error_log("pasamos el insert campus verano");
                        break;
                        case "pack_dos_opcion_a":

                            $nuevoformularioTecnificacionFemenina = shootingcamp::insertTecnificacionFemenina("primerturno", $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $fichero_subido, null, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, 0, $numeropedido, $importe, null, $tipopago, 0, null);
                                //error_log("pasamos el insert tecnificacion femenina");
                        break;
                    }
                    */

                        $nuevoformulario = shootingcamp::newFormShootingCamp($opcion, $nombre, $apellidos, $fechanacimiento, $dni, $club, $tallaropa, $transporte, $enfermedad, $alergias, $tratamientosmedicos, $operaciones, $observ, $nombretutor, $apellidostutor, $dnitutor, $direccion, $numero, $piso, $puerta, $cp, $provincia, $poblacion, $telefono, $email, $autdatos, $autimg, $numeropedido, $importe, $fichero_subido, $tipopago, $pais, $evento, $sintomasc,  $familiarc, $genero,  $pagado,  $ficherosubido2);
                        //error_log("pasamos el insert shooting camp");

                        if ($nuevoformulario) {
                            header('Location: https://servicios.alqueriadelbasket.com/?r=shootingcamp/okpagooficina&pedido=' . $numeropedido);
                           //  header('Location: http://localhost/serviciosalqueria3/?r=shootingcamp/okpagooficina&pedido=' . $numeropedido);
                            
                        }
                        else {
                            error_log("fallo insert");
                                    echo "<script text='javascript' charset='utf-8'>
                                            alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                            window.location.replace('?r=index/shootingcamp');
                                        </script>";
                                    die;
                        }
                    }
                    else{
                        echo "<script text='javascript' charset='utf-8'> alert('Debe adjuntar el justificante del ingreso bancario'); </script>";
                                        
                    }
                }
            //final
            }
        }








   
        public function actionok() {

            require "models/shootingcamp.php";


            if ( isset( $_GET['codigo'] ) ) {

                $codigo = $_GET['codigo'];

                $pagado = 1;

                $actualizaestado = shootingcamp::actualizapagadoretornotpv($codigo, $pagado);

                $contenidocorreo = shootingcamp::damedatoscampus($codigo);

                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime( $contenidocorreo['fechanacimiento'] ) );

                $opcion="";
                switch ( $contenidocorreo['opcion'] ) {
                    case "jugadores_internos":
                        $opcion="Jugador Interno";
                    break;
                    case "jugadores_externos":
                        $opcion="Jugador Externo";
                    break;
                    case "jugadores_internos_club":
                        $opcion="Jugador Interno Club";
                    break;
                    case "jugadores_externos_club":
                        $opcion="Jugador Externo Club";
                    break;
                   /* case "internos_dos_campus":
                        $opcion="Jugadores Internos Shooting y Skills Camp 2020";
                    break;
                    case "externos_dos_campus":
                        $opcion="Jugadores Externos Shooting y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_a":
                        $opcion="Campus Valencia Basket Calvestra y Shooting Academy 2020";
                        $actualizaestadoCampusVerano = shootingcamp::actualizapagadoretornotpvCampusVerano($codigo, $pagado);
                    break;
                    case "pack_uno_opcion_b":
                        $opcion="Shooting Academy y Campus Valencia Basket Calvestra 2020";
                        $actualizaestadoCampusVerano = shootingcamp::actualizapagadoretornotpvCampusVerano($codigo, $pagado);
                    break;
                    case "pack_dos_opcion_a":
                        $opcion="Shooting Academy y Tecnificación Femenina 2020";
                        $actualizaestadoTecnificacionFemenina = shootingcamp::actualizapagadoretornotpvTecnificacionFemenina($codigo, $pagado);
                    break;
                    */
                }
               
                $contenido = "<br><br><b>-Inscripcion en Dave Love Shooting Academy nº: </b>".$contenidocorreo['numero_pedido'].
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Genero: " . $contenidocorreo['genero'] .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Opción: " . $opcion .
                "<br>Importe: ".$contenidocorreo['importe'].
                "<br>Pago: ".$contenidocorreo['tipo_pago'].
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
                "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor']; 
                  

                $enviodecorreo = shootingcamp::mailssendShootingcamp( $contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Dave Love Shooting Academy 2021", $contenidocorreo['emailtutor'] );

                //$enviodecorreo2 = shootingcamp::mailssendShootingcamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Shooting Camp 2019", "actividades@valenciabasket.com");

                if ($enviodecorreo) {
                    vistaSimple("layout_ok");
                }
                else {
                    vistaSimple("layout_kocorreo");
                }
            }
        }


        public function actionokpagooficina() {

            require "models/shootingcamp.php";

            $codigo = $_GET['pedido'];

            $contenidocorreo = shootingcamp::damedatoscampus($codigo);

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $opcion="";
            switch ( $contenidocorreo['opcion'] ) {
                    case "jugadores_internos":
                        $opcion="Jugador Interno";
                    break;
                    case "jugadores_externos":
                        $opcion="Jugador Externo";
                    break;
                    case "jugadores_internos_club":
                        $opcion="Jugador Interno Club";
                    break;
                    case "jugadores_externos_club":
                        $opcion="Jugador Externo Club";
                    break;

                  /*  case "internos_dos_campus":
                        $opcion="Jugadores Internos Shooting y Skills Camp 2020";
                    break;
                    case "externos_dos_campus":
                        $opcion="Jugadores Externos Shooting y Skills Camp 2020";
                    break;
                    case "pack_uno_opcion_a":
                        $opcion="Campus Valencia Basket Calvestra y Shooting Academy 2020";
                    break;
                    case "pack_uno_opcion_b":
                        $opcion="Shooting Academy y Campus Valencia Basket Calvestra 2020";
                    break;
                    case "pack_dos_opcion_a":
                        $opcion="Shooting Academy y Tecnificación Femenina 2020";
                    break;
                    */
                }



            $contenido = "<br><br><b>-Inscripcion en Dave Love Shooting Academy nº: </b>".$contenidocorreo['numero_pedido'].
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Genero: " . $contenidocorreo['genero'] .
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Opción: " . $opcion .
                "<br>Importe: ".$contenidocorreo['importe'].
                "<br>Pago: ".$contenidocorreo['tipo_pago'].
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Talla de camiseta: " . $contenidocorreo['tallacamiseta'] .
                "<br>Enfermedad: " . $contenidocorreo['enfermedad'] . 
                "<br>Alergias: " . $contenidocorreo['alergias'] .
                "<br>Tratamientos médicos: " . $contenidocorreo['tratamientosmedicos'] .
                "<br>Operación reciente: " . $contenidocorreo['operacionreciente'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
                "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] . 
                "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] . 
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor']; 
                
                  

                $enviodecorreo = shootingcamp::mailssendShootingcamp($contenidocorreo['numero_pedido'], $contenido, "Ficha Dave Love Shooting Academy 2021", $contenidocorreo['emailtutor']);
                //$enviodecorreo2 = shootingcamp::mailssendShootingcamp($contenidocorreo['numero_pedido'], $contenido, "Ficha inscripción Shooting Camp 2019", "actividades@valenciabasket.com");

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {

                vistaSimple("layout_kocorreo");
            }                    
        }


        public function actionKo() {

            require "config.php";

            require "models/shootingcamp.php";

            $codigo_error = $_GET['codigoerror'];
            $pedido = $_GET['pedido'];

            $actualizaerror = shootingcamp::actualizacodigoerror($pedido, $codigo_error);

            vistaSimple("layout_ko");
        }



        public function actionModificaPagadoShootingCamp()
        {

            if(isset($_POST['id'])){

                require "models/shootingcamp.php";

                if(isset($_POST['pagado'])){
                    $pagado = 1;
                }
                else{
                    $pagado = 0;
                }

                $id = $_POST['id'];
                

                $slider = shootingcamp::actualizapagado($id, $pagado);
            }
            else
                require "error.php";

        }


        public function actionExportToExcelShootingCamp()
        {

            require "models/shootingcamp.php";
            $where="";
            $campos="";
            $campoorder="numero_pedido";
           // error_log("aobserv: " . $_POST["alergias"]);
            if (isset($_POST["alergias"])) {
               // $where.=" and (observaciones is null or observaciones<>'') ";
                $campos.=" enfermedad as Enfermedades, alergias as Alergias, tratamientosmedicos, operacionreciente, observaciones AS ObserMedicas, sintomascovid, familiarcovid, ";
            }

            if (isset($_POST["club"])) {
               // $where.=" and (club is null or club<>'') ";
                $campos.=" club as Club, ";
            }


            if (isset($_POST["inscripcion"])) {
                $where.="";
                $campos.=" opcion as Opcion, ";
                $campoorder="opcion";
            }

            $datos['inscripciones'] = shootingcamp::findAllInscripcionesExcelConCampos($where, $campoorder, $campos, "Shooting");


            if(isset($_POST["export_data"])) {
                $filename = "Shooting_camp".date('Ymd') . ".xls";
               header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
                header("Content-Disposition: attachment; filename=" . $filename . "");
                header('Cache-Control: max-age=0');
                $show_coloumn = false;

                if (!empty($datos['inscripciones'])) {
                    foreach ($datos['inscripciones'] as $inscripcion) {
                        if (!$show_coloumn) {
                            //display field/column names in first row
                            echo implode("\t", array_keys($inscripcion)) . "\r\n";
                            $show_coloumn = true;
                        }
                        //echo implode("\t", array_values($inscripcion)) . "\r\n";
                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                    }
                }
                exit;
            }
        }


         public function actionExportToExcelShootingCompleto()
        {

            require "models/shootingcamp.php";

            $datos['inscripciones'] = shootingcamp::findAllInscripcionesExcel("Shooting");
         

            if (isset($_POST["export_data2"])) {
                $filename = "shootingcamp_" . date('Ymd') . ".xls";

               header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
                header("Content-Disposition: attachment; filename=" . $filename . "");
                header('Cache-Control: max-age=0');
                $show_coloumn = false;

                if (!empty($datos['inscripciones'])) {
                    foreach ($datos['inscripciones'] as $inscripcion) {
                        if (!$show_coloumn) {
                            //display field/column names in first row
                            echo implode("\t", array_keys($inscripcion)) . "\r\n";
                            $show_coloumn = true;
                        }
                        //echo implode("\t", array_values($inscripcion)) . "\r\n";
                        echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                    }
                }
                exit;
            }
        }




         // DAR DE BAJA  REGISTRO 
        public function actionDardeBajaCampusShootingCamp(){

            if(isset($_POST['id'])){

                $codigo = $_POST['id'];

                echo"<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
                        <div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
                            <form action='?r=shootingcamp/DardeBajaCampusShootingCamp' method='post'>
                                <p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
                                <div style='text-align:center;'>
                                    <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float:left;'>
                                    <input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
                                </div>
                                <input type='hidden' name='id_validado' value='".$codigo."'>
                            </form>
                        </div>
                    </div>";
                die; 
            }
            

            if(isset($_POST['confirm'])){

                if($_POST['confirm']=="SI"){
                    require "models/shootingcamp.php";

                    $pedido=$_POST['id_validado'];
                   
                    $baja_reg = shootingcamp::DardeBajacampusshootingcamp($pedido);
                }
                if($_POST['confirm']=="NO"){
                    echo "<script text='javascript'> window.location.replace('?r=campus/BackCampusShootingCamp'); </script>";
                }
            }
            else{ require "error.php"; }

        }



        public function actionImprimirFicha() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

                require "models/shootingcamp.php";


                // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
                $tipopago = $_GET['tipopago'];

                
                $seccioninscripcion = "Ficha inscripción Dave Love Shooting Academy 2021";
                


                // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
                $numero = $_GET['numeropedido'];

                // Recogemos todos los datos del registro pasándole el número de pedido
                $contenidocorreo = shootingcamp::damedatoscampus($numero);


                // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

                if($contenidocorreo['opcion']=="jugadores_internos"){

                    $opcion="Jugador Interno";
                }
                elseif($contenidocorreo['opcion']=="jugadores_externos"){

                    $opcion="Jugador Externo";
                }
                if($contenidocorreo['opcion']=="jugadores_internos_club"){

                    $opcion="Jugador Interno Valencia BC";
                }
                elseif($contenidocorreo['opcion']=="jugadores_externos_club"){

                    $opcion="Jugador Externo Valencia BC";
                }
              /*  elseif($contenidocorreo['opcion']=="jugadoresexternosvbc"){

                    $opcion="Jugadores Externos VBC";
                }
                elseif($contenidocorreo['opcion']=="hermanosvbc"){

                    $opcion="Hermano VBC";
                }
                elseif($contenidocorreo['opcion']=="internosdoscampus"){

                    $opcion="Jugadores Internos Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="externosdoscampus"){

                    $opcion="Jugadores Externos Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="externosvbcdoscampus"){

                    $opcion="Jugadores Externos VBC Shooting y Skills Camp 2019";
                }
                elseif($contenidocorreo['opcion']=="hermanosdoscampus"){

                    $opcion="Hermano VBC Shooting y Skills Camp 2019";
                }*/

               
                $contenido ="<b>Estos son los datos recibidos relacionados con su inscripción. </b>".
                "<br><br><b>Inscripcion en Dave Love Shooting Academy 2021 nº: </b>".$contenidocorreo['numero_pedido']. 
                "<br><b>Nombre y apellidos: </b>" . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br><b>Fecha de nacimiento: </b>" . $contenidocorreo['fechanacimiento'] .
                "<br><b>Genero: </b>".$contenidocorreo['genero'].
                "<br><b>DNI: </b>" . $contenidocorreo['dni'] .
                "<br><b>Opción: </b>" . $opcion .
                "<br><b>Importe: </b>".$contenidocorreo['importe']. "€".
                "<br><b>Pago: </b>".$contenidocorreo['tipo_pago'].
                "<br><b>Club: </b>" . $contenidocorreo['club'] . 
                "<br><b>Talla de camiseta: </b>" . $contenidocorreo['tallacamiseta'] .
                
                "<br><br><b>Enfermedad: </b>" . $contenidocorreo['enfermedad'] . 
                "<br><b>Alergias: </b>" . $contenidocorreo['alergias'] .
                "<br><b>Tratamientos médicos: </b>" . $contenidocorreo['tratamientosmedicos'] .
                "<br><b>Operación reciente: </b>" . $contenidocorreo['operacionreciente'] . 
                "<br><b>Observaciones: </b>" . $contenidocorreo['observaciones'] .
                "<br><br><b>Nombre y apellidos tutor/a: </b>" . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br><b>DNI del tutor/a: </b>". $contenidocorreo['dnitutor'].
                "<br><b>Dirección: </b>". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br><b>Teléfono del tutor/a: </b>" . $contenidocorreo['telefonotutor'] .
                "<br><b>Correo electrónico: </b>" . $contenidocorreo['emailtutor'].

                "<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";


                // Creamos todo el cuerpo de la vista en HTML
                $body = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="https://www.w3.org/1999/xhtml">
                        <head>
                            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                            <title>L´Alqueria del Basket</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        </head>
                        <body style="margin: 0; padding: 0;">
                            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                <tr>
                                    <td style="padding: 20px 0 30px 0;">
                                        <!--[if (gte mso 9)|(IE)]>
                                        <table width="600" align="center" cellpadding="0" cellspacing="0" border="0">
                                            <tr>
                                                <td>
                                        <![endif]-->

                                        <table width="600" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                            <tr>
                                                <td align="center" bgcolor="#000000" style="padding: 15px 0 15px 0;">
                                                    <a href="https://servicios.alqueriadelbasket.com" target="_blank">
                                                        <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
                                                    <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">'.$seccioninscripcion.'</h3>
                                                    <p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
                                                    <p><strong>Número de pedido:</strong> '.$numero.'</p>
                                                    <p>'.$contenido.'</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#424241" style="padding: 20px 30px 20px 30px">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                        <tr>
                                                            <td width="75%" style="font-family: Arial, sans-serif; line-height: 18px; font-size: 12px;">
                                                                <span style="color: #eb7c00;">&copy; L´Alqueria del Basket 2020</span><br>
                                                                <span style="color: #ffffff;">C/ Bomber Ramon Duart S/N 46013, València</span><br>
                                                                <span style="color: #ffffff;">+34 96 121 55 43</span>
                                                            </td>
                                                            <td width="25%" align="right">
                                                                <table border="0" cellpadding="0" cellspacing="0">
                                                                    <tr>
                                                                        <td>
                                                                            <a href="https://www.facebook.com/LAlqueriaVBC" target="_blank">
                                                                                <img src="https://servicios.alqueriadelbasket.com/img/logo-facebook.png" alt="Facebook L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                            </a>
                                                                        </td>
                                                                        <td style="font-size: 0; line-height: 0;" width="10%">&nbsp;</td>
                                                                        <td>
                                                                            <a href="https://twitter.com/LAlqueriaVBC" target="_blank">
                                                                                <img src="https://servicios.alqueriadelbasket.com/img/logo-twitter.png" alt="Twitter L´Alqueria del VBC" width="32" height="32" style="display: block;" border="0">
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <!--[if (gte mso 9)|(IE)]>
                                                </td>
                                            </tr>
                                        </table>
                                        <![endif]-->
                                    </td>
                                </tr>
                            </table>
                        </body>
                    </html>';

                echo "<pre>";
                echo $body;
                echo "</pre>";
            }
            else {
                require('error.php');
            }
        }

        //Validar codigo
        public function actionValidarCodigo() {
            require "models/shootingcamp.php";
            $comprobacion = shootingcamp::buscarCodigo( $_POST["codigo"], $_POST["dni_jugador"], $_POST["dni_tutor"] );

            echo json_encode(array(
                    "response"          => "sucess",
                    "consulta"          => $comprobacion
                ));

        }

        public function actionMostrarModalShooting()
        {
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log(print_r($_POST,1));

            $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            //error_log("inscrpcion campus shooting: ".$idinscripcion);

            if (!empty($idinscripcion)) {
                require "models/shootingcamp.php";
                require "includes/Utils.php";

                $datos = shootingcamp::damedatos($idinscripcion);
                $alerta_cuenta = "";

                echo json_encode(array(
                    "response" => "success",
                    "instancia" => $datos,
                    "modal_title" => "Formulario de inscripción en Shooting Academy",
                    "message" => "Los datos de la inscripción se han cargado correctamente.",
                    "alerta_cuenta" => $alerta_cuenta));
                die;
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "instancia" => "",
                    "modal_title" => "Error",
                    "message" => "Parece que ha habido algún error"));
                die;
            }
        }

        public function actionUpdateInscripcionModalShooting()
        {
    //            error_log(__FILE__.__FUNCTION__.__LINE__);
    //            error_log(print_r($_POST,1));
    //            error_log(print_r($_FILES,1));
    //            die;

            require "models/shootingcamp.php";

            $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

            $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
            $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
            $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
            $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
            $talla = filter_input(INPUT_POST, 'talla', FILTER_SANITIZE_STRING);
            $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
           

            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
            $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
            $puerta = filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
            $poblacion = filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
            $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
            $prov = filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);


            $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
            $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
            $dnitutor = filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
            $tlftutor = filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

            $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
            $enfermedad = filter_input(INPUT_POST, 'enfermedad', FILTER_SANITIZE_STRING);
            $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
            $operaciones = filter_input(INPUT_POST, 'operaciones', FILTER_SANITIZE_STRING);
            $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);
            $transporte = filter_input(INPUT_POST, 'transporte', FILTER_SANITIZE_STRING);

            $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
            $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);
            $tipopago = filter_input(INPUT_POST, 'tpago', FILTER_SANITIZE_STRING);

            

            /***********************
             *    FICHERO SIP
             **********************/
            $sip_que_habia = filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

            if (!empty($_FILES['sipnuevo']['tmp_name'])) {
                $array_fichero_y_extension = explode(".", $_FILES["sipnuevo"]["name"]);
                $numerodeelementos = count($array_fichero_y_extension);
                $extension = $array_fichero_y_extension[$numerodeelementos - 1];
                $sip = 'img/shootingcamp/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-S-" . date("d-m-Y-H-i-s") . "." . $extension;
                $archivo_movido = move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
            } else {
                $sip = $sip_que_habia;
            }



            /******************************************
             *    FICHERO RESGUARDO DE TRANSFERENCIA
             *****************************************/

            $resguardo_que_habia = filter_input(INPUT_POST, 'resguardoanterior', FILTER_SANITIZE_STRING);

            if (!empty($_FILES['resguardonuevo']['tmp_name'])) {
                $array_fichero_y_extension = explode(".", $_FILES["resguardonuevo"]["name"]);
                $numerodeelementos = count($array_fichero_y_extension);
                $extension = $array_fichero_y_extension[$numerodeelementos - 1];
                $resguardo = 'img/shootingcamp/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
                $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
            } else {
                $resguardo = $resguardo_que_habia;
            }

    //          error_log(__FILE__.__FUNCTION__.__LINE__);
    //            error_log($sip);
            $opcion =$_POST['opcion'];
            $importe=0;
            if ($_POST['opcion']=="jugadores_internos")
            {
                $importe=750;
                
            } elseif($_POST['opcion']=="jugadores_externos"){ 
                $importe=360;
               
            } elseif($_POST['opcion']=="jugadores_internos_club"){ 
                $importe=637.5;
               
            } elseif($_POST['opcion']=="jugadores_externos_club"){ 
                $importe=306;
               
            }

            


            if (isset($idinscripcion) && !empty($idinscripcion)) {
                  error_log("inscripcion: " . $idinscripcion);
                $instancia = shootingcamp::updatefichaShootingCamp(
                    $idinscripcion, $dnijugador, $nombre, $apellidos, $fechanac, $club,
                    $talla, $direccion, $numero, $piso, $puerta, $poblacion,
                    $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor,
                    $email, $alergias, $tratam,  $enfermedad, $observ,
                    $operaciones, $opcion,   
                    $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe  );


                if (!empty($instancia)) {
                    echo json_encode(array("response" => "success",
                        "datos" => $instancia,
                        "modal_title" => "Formulario de inscripción",
                        "message" => "Los datos de la inscripción se han modificado correctamente."));
                    die;
                } else {
                    echo json_encode(array(
                        "response" => "error",
                        "datos" => "",
                        "modal_title" => "Error",
                        "message" => "Ha habido un error al guardar los datos"));
                    die;
                }
            } else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Parece que ha habido algún error"));
                die;
            }

        }


        private static function sanitize_nombre_para_columna_myslq($string)
        {
            $unwanted_array = array(
                ' ' => '_', '.' => '_', '-' => '_', '>' => '_', '/' => '_', ':' => '_', '?' => '_', '!' => '_',
                'Š' => 'S', 'š' => 's', 'Ž' => 'Z', 'ž' => 'z', 'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'A', 'Ç' => 'C', 'È' => 'E', 'É' => 'E',
                'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I', 'Ñ' => 'NY', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ø' => 'O', 'Ù' => 'U',
                'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ý' => 'Y', 'Þ' => 'B', 'ß' => 'Ss', 'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'a', 'ç' => 'c',
                'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i', 'ð' => 'o', 'ñ' => 'ny', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
                'ö' => 'o', 'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ý' => 'y', 'þ' => 'b', 'ÿ' => 'y');

            $str = strtr($string, $unwanted_array);

            $regex = '/[a-zA-Z_0-9]/';

            if (preg_match($regex, $str)) {
                return $str;
            } else {
                error_log(__FILE__ . __LINE__);
                error_log("El string: " . $string . " ha generado un error en sanitize_nombre_para_columna_myslq()");
                return false;
            }
        }




    }
?>