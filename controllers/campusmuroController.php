<?php
    class campusmuroController {

        // CAMPUS MURO DE LOS SUEÑOS - esta en Alqueria
        public function actionCampusMuro2021() {
            require "config.php";

            vistaSimple("layout_campus_murosuenyos");
        }


            // Recibe el formulario de inscripción de la Escuela de Pascua
        public function actionCampusMuroForm() {
            
            if (isset($_POST['nombre'])) {
                require "models/campus_muro.php";

                // Fecha limite
              /*  $dia = date("31");
                $mes = date("12");
                $ano = date("2021");
                */

                $fechanacimiento = $_POST['fechanacimiento'];

                $dianaz = date("d",strtotime($fechanacimiento));
                $mesnaz = date("m",strtotime($fechanacimiento));
                $anonaz = date("Y",strtotime($fechanacimiento));


                // Si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
             /*   if (($mesnaz == $mes) && ($dianaz > $dia)) {
                    $ano = ($ano - 1);
                }

                // Si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
                if ($mesnaz > $mes) {
                    $ano = ($ano - 1);
                }

                // Ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
                $edad = ($ano - $anonaz);
                */

                // Si ha nacido dentro del rango de años permitido, seguimos..
                if ($anonaz >= 2003 && $anonaz <= 2015) {
                    $fecharegistro = date("Y-m-d");
                    $dia1 = "-";
                    $dia2 = "-";
                    $dia3 = "-";
                    $dia4 = "-";

                    //  Calculamos el precio según las opciones escogidas
                    if ($_POST['opcion'] == "manyanas") {
                        $importe = 70;
                        $opcion = "Mañanas";
                    }
                    elseif ($_POST['opcion'] == "completo") {
                        $importe = 140;
                        $opcion = "Dia completo";
                    }
                   /* elseif($_POST['opcion'] == "sueltos") {
                        $importe = 0;
                        $opcion = "Dias sueltos";

                        if (isset($_POST['dia1'])) {
                            $dia1 = "Día 6";

                            if ($_POST['rdia1'] == "manyana") {
                                $importe = $importe + 18;
                                $dia1 = $dia1." Mañana";
                            }
                            else {
                                $importe = $importe + 30;
                                $dia1 = $dia1." Completo";
                            }
                        }

                        if (isset($_POST['dia2'])) {
                            $dia2 = "Día 7";

                            if ($_POST['rdia2'] == "manyana") {
                                $importe = $importe + 18;
                                $dia2 = $dia2." Mañana";
                            }
                            else {
                                $importe = $importe + 30;
                                $dia2 = $dia2." Completo";
                            }
                        }

                        if (isset($_POST['dia3'])) {
                            $dia3 = "Día 8";

                            if ($_POST['rdia3']=="manyana") {
                                $importe = $importe +18;
                                $dia3 = $dia3." Mañana";
                            }
                            else {
                                $importe = $importe +30;
                                $dia3 = $dia3." Completo";
                            }
                        }

                        if (isset($_POST['dia4'])) {
                            $dia4 = "Día 9";
                            if ($_POST['rdia4'] == "manyana") {
                                $importe = $importe + 18;
                                $dia4 = $dia4." Mañana";
                            }
                            else {
                                $importe = $importe + 30;
                                $dia4 = $dia4." Completo";
                            }
                        }
                    }*/

                    $genero             = $_POST['genero'];
                    $nombre             = $_POST['nombre'];
                    $apellidos          = $_POST['apellidos'];
                    $dni                = $_POST['dni'];

                    // Quitamos los guiones
                    $dni = str_replace ( "-" , "" , $dni );
                    // Quitamos los espacios
                    $dni = str_replace ( " " , "" , $dni );
                    // Quitamos los puntos
                    $dni = str_replace ( "." , "" , $dni );

                    $club               = $_POST['club'];
                    $observaciones      = $_POST['observaciones'];

                    $sintomasc          = $_POST['sintomascovid'];
                    $familiarc          = $_POST['familiarcovid'];

                    $nombretutor        = $_POST['nombretutor'];
                    $apellidostutor     = $_POST['apellidostutor'];
                    $dnitutor           = $_POST['dnitutor'];

                    // Quitamos los guiones
                    $dnitutor = str_replace ( "-" , "" , $dnitutor );
                    // Quitamos los espacios
                    $dnitutor = str_replace ( " " , "" , $dnitutor );
                    // Quitamos los puntos
                    $dnitutor = str_replace ( "." , "" , $dnitutor );

                    $direccion          = $_POST['direccion'];
                    $numero             = $_POST['numero'];
                    $piso               = $_POST['piso'];
                    $puerta             = $_POST['puerta'];
                    $cp                 = $_POST['cp'];
                    $provincia          = $_POST['provincia'];
                    $poblacion          = $_POST['poblacion'];
                    $telefonotutor      = $_POST['telefonotutor'];
                    $emailtutor         = strtolower($_POST['emailtutor']);


                    if(isset($_POST['autorizodatos'])) {
                        $autorizodatos = "si";
                    }
                    else {
                        $autorizodatos = "no";
                    }

                    if (isset($_POST['autorizoimagen'])) {
                        $autorizoimagen = "si";
                    }
                    else {
                        $autorizoimagen = "no";
                    }

                    //Formateo Nombre Imagen SIP
                    //Explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."
                    $valores        = explode(".", $_FILES['fotocopiasip']['name']);
                    // Guardamos la extensión original del archivo subido
                    $extension      = $valores[count($valores)-1];

                    // Formateamos el nombre del niño...
                    $nombre_base    = $_POST['nombre'];
                    // Sustituimos los espacios por guiones
                    $nombre_format = str_replace ( " " , "-" , $nombre_base);
                    // Sustituimos los puntos por guiones
                    $nombre_format = str_replace ( "." , "-" , $nombre_format);

                    // Formateamos los apellidos del niño...
                    $apellidos_base = $_POST['apellidos'];
                    // Sustituimos los espacios por guiones
                    $apellidos_format = str_replace ( " " , "-" , $apellidos_base);
                    // Sustituimos los puntos por guiones
                    $apellidos_format = str_replace ( "." , "-" , $apellidos_format);

                    // Quitamos todos los acentos, eñes y carácteres raros
                    setlocale(LC_ALL, 'en_US.UTF8');
                    $nombre_format      = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_format));
                    $apellidos_format   = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $apellidos_format));

                    // Concatenamos y guardamos el nombre y apellidos del niño formateados (para el nombre del archivo SIP)
                    $nombre_y_apellidos_format = $nombre_format."-".$apellidos_format;

                    // Concatenamos y guardamos el nombre del niño y DNI del tutor formateados (para comparar con los registros de la BBDD)
                    $nombre_ninyo_y_dnitutor = $nombre_format."-".$dnitutor;

                    /* Comprobamos si el registro ya existe en la BBDD antes de seguir */
                    $todoslosregistros = campus_muro::comprobarRepetidos();
                    foreach ($todoslosregistros as $registro) {
                        // Formateamos el nombre del niño de la BBDD...
                        $nombre_bbdd = $registro['nombre'];
                        // Sustituimos los espacios por guiones
                        $nombre_bbdd_format = str_replace ( " " , "-" , $nombre_bbdd);
                        // Sustituimos los puntos por guiones
                        $nombre_bbdd_format = str_replace ( "." , "-" , $nombre_bbdd_format);

                        // Quitamos todos los acentos, eñes y carácteres raros
                        setlocale(LC_ALL, 'en_US.UTF8');
                        $nombre_bbdd_format = preg_replace("/[^a-zA-Z0-9\_\-]+/", '',iconv('UTF-8', 'ASCII//TRANSLIT', $nombre_bbdd_format));

                        // Concatenamos y guardamos el nombre del niño y el DNI del tutor de la BBDD formateados
                        $nombre_bbdd_y_dnitutor = $nombre_bbdd_format."-".$registro['dnitutor'];

                        // Comprobamos si el nuevo registro ya existe en la BBDD para mostrar mensaje
                        if (strcasecmp ($nombre_bbdd_y_dnitutor, $nombre_ninyo_y_dnitutor) == 0) {
                            //Según strcasecmp (case insensitive) las dos cadenas son iguales

                            echo "<script text='javascript' charset='utf-8'>
                                    alert('Lo sentimos pero ya se había inscrito anteriormente. \\nSi tiene que realizar más gestiones, póngase en contacto con recepción de l´Alqueria en el teléfono 961 215 543. ¡Gracias!');
                                    window.location.replace('?r=index/principal');
                                </script>";
                            die;
                        }
                    }


                    // Movemos el SIP a su carpeta
                    $dir_subida         = 'img/inscripcionescampusmurosuenyos/';
                    $fichero            = $nombre_y_apellidos_format."-".date("d-m-Y-H-i-s").".".$extension;
                    $fotocopiasipsubida = $dir_subida.$fichero;
                    move_uploaded_file($_FILES['fotocopiasip']['tmp_name'],$fotocopiasipsubida);


                    //Formateo Nombre Imagen del resguardo de transferencia
                    //Explode: parte en trozos el string cada vez que encuentre el signo de puntuación "."
                    $valores2        = explode(".", $_FILES['resguardoingreso']['name']);
                    // Guardamos la extensión original del archivo subido
                    $extension_resg      = $valores2[count($valores2)-1];

                    if ($_FILES['resguardoingreso']['error'] == 0) {
                        // Damos formato al nombre de la imagen 2
                        $fichero2       = $dnitutor . "-R-".date("d-m-Y-H-i-s").".".$extension_resg;
                        $ficherosubido2 = $dir_subida . $fichero2;

                        // Guardamos la imagen 2 (si corresponde) en la carpeta del servidor //
                        move_uploaded_file($_FILES['resguardoingreso']['tmp_name'], $ficherosubido2);
                    }
                    else {
                        $ficherosubido2 = "";
                    }




                    //  Preparamos datos para el formulario del TPV
                    $nombreapellidos    = $nombre." ".$apellidos;
                    $ultimopedido       = campus_muro::findLastNumeroPedidoCampusMuro();
                   // $numeropedido       = $ultimopedido['MAX(numeropedido)'];
                    $numeropedido = $ultimopedido['MAX(id)'];

                    $numeropedido = $numeropedido + 1;

                    $numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

                    $numeropedido = $numeropedido . "cmur21";

                      error_log($numeropedido);

                    // Controlamos si se va a pagar con tarjeta o en oficinas
                    $enviar = $_POST['enviar'];
                    $pagado=0;
//error_log("ficherosubido2: ".$ficherosubido2);

                    if ($enviar == "tarjeta") {
                        $tipopago           = "ONLINE";
                        $nuevoformulario    = campus_muro::newFormCampusMuro(
                                $fecharegistro, $opcion,        $nombre,        $apellidos,             $fechanacimiento,
                                $dni,           $club,          $observaciones, $fotocopiasipsubida,    $nombretutor,
                                $apellidostutor,$dnitutor,      $direccion,     $numero,                $piso,
                                $puerta,        $cp,            $provincia,     $poblacion,             $telefonotutor,
                                $emailtutor,    $autorizodatos, $autorizoimagen,$numeropedido,          $importe,
                                $dia1,          $dia2,          $dia3,          $dia4,                  $tipopago,
                                $sintomasc,     $familiarc,     $genero,        $pagado,                $ficherosubido2);

                        if ($nuevoformulario) {
                           // header('Location: https://servicios.alqueriadelbasket.com/tpv_campusmuro/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
                            header('Location: http://localhost/serviciosalqueria3/tpv_campusmuro/tpv.php?pedido=' . $numeropedido . '&titular=' . $nombreapellidos . '&importe=' . $importe);
                        }
                        else {
                            echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                    window.location.replace('?r=campusmuro/CampusMuro2021');
                                </script>";
                            die;
                        }
                    }
                    elseif ($enviar == "oficina") {
                        if ($ficherosubido2!="") {
                            $tipopago           = "TRANSFERENCIA";
error_log("tipo transfer");
                            $nuevoformulario    = campus_muro::newFormCampusMuro(
                                    $fecharegistro, $opcion,        $nombre,        $apellidos,             $fechanacimiento,
                                    $dni,           $club,          $observaciones, $fotocopiasipsubida,    $nombretutor,
                                    $apellidostutor,$dnitutor,      $direccion,     $numero,                $piso,
                                    $puerta,        $cp,            $provincia,     $poblacion,             $telefonotutor,
                                    $emailtutor,    $autorizodatos, $autorizoimagen,$numeropedido,          $importe,
                                    $dia1,          $dia2,          $dia3,          $dia4,                  $tipopago, 
                                    $sintomasc,     $familiarc,     $genero,        $pagado,                $ficherosubido2);

                            if ($nuevoformulario) {
                               // error_log("entra insert");
                                //header('Location: https://servicios.alqueriadelbasket.com/?r=campusmuro/okpagooficina&pedido=' . $numeropedido);
                                header('Location: http://localhost/serviciosalqueria3/?r=campusmuro/okpagooficina&pedido=' . $numeropedido);
                            }
                            else {
                                error_log("fallo insert");
                                echo "<script text='javascript' charset='utf-8'>
                                        alert('Parece que hubo un error, inténtelo de nuevo más tarde.');
                                        window.location.replace('?r=campusmuro/CampusMuro2021');
                                    </script>";
                                die;
                            }
                        }
                        else{
                                echo "<script text='javascript' charset='utf-8'> alert('Debe adjuntar el justificante del ingreso bancario'); </script>";
                                        
                            }
                    }


                }
                // Si ha nacido fuera del rango de años permitido, mostramos mensaje de prohibición
                else {
                    echo "<script text='javascript' charset='utf-8'>
                            alert('Lo sentimos pero el niño/a debe haber nacido entre 2003 y 2015 para participar en el campus. ¡Gracias por contar con nosotros!');
                            window.location.replace('?r=campusmuro/CampusMuro2021');
                        </script>";
                    die;
                }
            }
        }


        public function actionOk() {

            require "models/campus_muro.php";

            $codigo = $_GET['codigo'];

            $pagado = 1;


            $actualizaestado = campus_muro::actualizapagadoCampusMurotpv($codigo, $pagado);

            $contenidocorreo = campus_muro::damedatosCampusMuro($codigo);

            if ($contenidocorreo['opcion']=="Dias sueltos") {
                $opcion = "Dias sueltos<br>-" . $contenidocorreo['turno1']."<br>-" . $contenidocorreo['turno2'] . "<br>-" . $contenidocorreo['turno3'] . "<br>-" . $contenidocorreo['turno4'];
            }
            else {
                 $opcion = $contenidocorreo['opcion'];
            }

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido =
                "<br><br><b>-Inscripcion en Campus Mur dels Somnis 2021 nº: </b>".$contenidocorreo['numeropedido'].
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Opción: " . $opcion .
                "<br>Importe: ".$contenidocorreo['importe'].
                "<br>Pago: ".$contenidocorreo['tipo_pago'].
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
                "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br>DNI del tutor/a: ". $contenidocorreo['dnitutor'].
                "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] .
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'];

            $enviodecorreo = campus_muro::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción Campus Mur dels Somnis 2021", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                vistaSimple("layout_ok");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }


        public function actionokpagooficina() {

            require "models/campus_muro.php";

            $codigo = $_GET['pedido'];


            $contenidocorreo = campus_muro::damedatosCampusMuro($codigo);

            if ($contenidocorreo['opcion'] == "Dias sueltos") {

                $opcion = "Dias sueltos<br>-".$contenidocorreo['turno1']."<br>-".$contenidocorreo['turno2']."<br>-".$contenidocorreo['turno3']."<br>-".$contenidocorreo['turno4'];
            }
            else {
                $opcion=$contenidocorreo['opcion'];
            }


            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido =
                "<br><br><b>-Inscripcion en Campus Mur dels Somnis 2021 nº: </b>".$contenidocorreo['numeropedido'].
                "<br>Nombre y apellidos: " . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br>Fecha de nacimiento: " . $contenidocorreo['fechanacimiento'] .
                "<br>DNI: " . $contenidocorreo['dni'] .
                "<br>Opción: " . $opcion .
                "<br>Importe: ".$contenidocorreo['importe'].
                "<br>Pago: ".$contenidocorreo['tipo_pago'].
                "<br>Club: " . $contenidocorreo['club'] . 
                "<br>Observaciones: " . $contenidocorreo['observaciones'] . 
                "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
                "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
                "<br>Nombre y apellidos tutor/a: " . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                "<br>DNI del tutor/a: ". $contenidocorreo['dnitutor'].
                "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                "<br>Teléfono del tutor/a: " . $contenidocorreo['telefonotutor'] .
                "<br>Correo electrónico: " . $contenidocorreo['emailtutor'];

            $enviodecorreo = campus_muro::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción pago trasferencia Campus Mur dels Somnis 2021", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }


        public function actionKo() {

            require "config.php";

            require "models/campus_muro.php";

            $codigo_error = $_GET['codigoerror'];
            $pedido = $_GET['pedido'];

            $actualizaerror = campus_muro::actualizacodigoerror($pedido, $codigo_error);


            vistaSimple("layout_ko");
        }



       

        public function actionImprimirFicha() {

            // Comprobamos que el usuario tiene algún rol de administrador para continuar...
            if (isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin")) {

                require "models/campus_muro.php";


                // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
                $tipopago = $_GET['tipopago'];

                
                $seccioninscripcion = "Ficha inscripción Campus Mur dels Somnis 2021";
                


                // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
                $numero = $_GET['numeropedido'];

                // Recogemos todos los datos del registro pasándole el número de pedido
                $contenidocorreo = campus_muro::damedatosCampusMuro($numero);


                // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
                if ($contenidocorreo['opcion'] == "Dias sueltos") {
                    $opcion = "Dias sueltos<br>-" . $contenidocorreo['turno1']."<br>-" . $contenidocorreo['turno2'] . "<br>-" . $contenidocorreo['turno3'] . "<br>-" . $contenidocorreo['turno4'];
                }
                else {
                   $opcion = $contenidocorreo['opcion'];
                }

                $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

                $contenido ="<b>Estos son los datos recibidos relacionados con su inscripción. </b>".
                    "<br><br><b>-Inscripcion en Campus Mur dels Somnis 2021 nº: </b>".$contenidocorreo['numeropedido'].
                    "<br><b>-Nombre y apellidos: </b>" . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                    "<br><b>-Fecha de nacimiento: </b>" . $contenidocorreo['fechanacimiento'] .
                    "<br><b>-Genero: </b>".$contenidocorreo['genero'].
                    "<br><b>-DNI: </b>" . $contenidocorreo['dni'] .
                    "<br><b>-Opción: </b>" . $opcion .
                    "<br><b>-Importe: </b>".$contenidocorreo['importe'].
                    "<br><b>-Pago: </b>".$contenidocorreo['tipo_pago'].
                    "<br><b>-Club: </b>" . $contenidocorreo['club'] . 
                    "<br><b>-Observaciones: </b>" . $contenidocorreo['observaciones'] .
                    "<br><b>-¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? </b>".$contenidocorreo['sintomascovid'].
                    "<br><b>-¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? </b>".$contenidocorreo['familiarcovid']. 
                    "<br><br><b>-Nombre y apellidos tutor/a: </b>" . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
                    "<br><b>-DNI del tutor/a: </b>". $contenidocorreo['dnitutor'].
                    "<br><b>-Dirección: </b>". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
                    "<br><b>-Teléfono del tutor/a: </b>" . $contenidocorreo['telefonotutor'] .
                    "<br><b>-Correo electrónico: </b>" . $contenidocorreo['emailtutor'].

                    "<br><br>En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. <br> Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico. <br> Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.) <br> Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.";


                // Creamos todo el cuerpo del PDF en HTML
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
                                                        <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
                                                        alt="Alqueria del Basket" width="547" height="81" style="display: block;">
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



        public function actionMostrarModalCampusMuro()
        {
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //error_log(print_r($_POST,1));

            $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

            //error_log("inscrpcion campus verano vb: ".$idinscripcion);

            if (!empty($idinscripcion)) {
                require "models/campus_muro.php";
                require "includes/Utils.php";

                $datos = campus_muro::findDatosCampusMuroById($idinscripcion);
                $alerta_cuenta = "";

                echo json_encode(array(
                    "response" => "success",
                    "instancia" => $datos,
                    "modal_title" => "Formulario de inscripción en Campus Muro",
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




        public function actionUpdateInscripcionModalCampusMuro()
        {
//            error_log(__FILE__.__FUNCTION__.__LINE__);
//            error_log(print_r($_POST,1));
//            error_log(print_r($_FILES,1));
//            die;

        require "models/campus_muro.php";

        $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

        $dnijugador = filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
        $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
        $apellidos = filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
        $fechanac = filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
        $club = filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
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

      //  $alergias = filter_input(INPUT_POST, 'alergias', FILTER_SANITIZE_STRING);
       // $enfermedad = filter_input(INPUT_POST, 'enfermedad', FILTER_SANITIZE_STRING);
       // $tratam = filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
       // $operaciones = filter_input(INPUT_POST, 'operaciones', FILTER_SANITIZE_STRING);
        $observ = filter_input(INPUT_POST, 'observ', FILTER_SANITIZE_STRING);
       // $transporte = filter_input(INPUT_POST, 'transporte', FILTER_SANITIZE_STRING);

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
            $sip = 'img/inscripcionescampusmurosuenyos/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-S-" . date("d-m-Y-H-i-s") . "." . $extension;
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
            $resguardo = 'img/inscripcionescampusmurosuenyos/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
            $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
        } else {
            $resguardo = $resguardo_que_habia;
        }

         // error_log(__FILE__.__FUNCTION__.__LINE__);
         //  error_log($sip);

        //validacion Dias sueltos
        $textoDiasSueltos ="";
        $opcion ="";
        $importe=0;
        $dia1="-";
        $dia2="-";
        $dia3="-";
        $dia4="-";

         error_log(__FILE__.__FUNCTION__.__LINE__);
          error_log($_POST['opcion']);

        if ($_POST['opcion']=="solomanyana")
        {
            $importe=70;
            $opcion="Mañanas";
        }
        elseif($_POST['opcion']=="diacompleto"){
            $importe=140;
            $opcion="Dia completo";
        }
        elseif($_POST['opcion'] == "sueltos") {
            $importe = 0;
            $opcion = "Dias sueltos";

            if (isset($_POST['dia1']) && $_POST['dia1']=='true') {
                $dia1 = "Día 6";

                if ($_POST['tipod1'] == "dia6-manyana") {
                    $importe = $importe + 18;
                    $dia1 = $dia1." Mañana";
                }
                else {
                    $importe = $importe + 30;
                    $dia1 = $dia1." Completo";
                }
            }

            if (isset($_POST['dia2']) && $_POST['dia2']=='true') {
                $dia2 = "Día 7";

                if ($_POST['tipod2'] == "dia7-manyana") {
                    $importe = $importe + 18;
                    $dia2 = $dia2." Mañana";
                }
                else {
                    $importe = $importe + 30;
                    $dia2 = $dia2." Completo";
                }
            }

            if (isset($_POST['dia3']) && $_POST['dia3']=='true') {
                $dia3 = "Día 8";

                if ($_POST['tipod3']=="dia8-manyana") {
                    $importe = $importe +18;
                    $dia3 = $dia3." Mañana";
                }
                else {
                    $importe = $importe +30;
                    $dia3 = $dia3." Completo";
                }
            }

            if (isset($_POST['dia4']) && $_POST['dia4']=='true') {
                $dia4 = "Día 9";
                if ($_POST['tipod4'] == "dia9-manyana") {
                    $importe = $importe + 18;
                    $dia4 = $dia4." Mañana";
                }
                else {
                    $importe = $importe + 30;
                    $dia4 = $dia4." Completo";
                }
            }
        }


        

        if (isset($idinscripcion) && !empty($idinscripcion)) {

         //  error_log("inscripcion: " . $idinscripcion);
            $instancia = campus_muro::updatefichaCampusMuro(
                $idinscripcion, $dnijugador, $nombre, $apellidos, $fechanac, $club,
                 $direccion, $numero, $piso, $puerta, $poblacion,
                $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor,
                $email,  $observ,
                $sip, $sintomascovid, $familiarcovid, $resguardo, $opcion, $importe, $dia1, $dia2, $dia3, $dia4, $genero, $tipopago);

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
                ' '=>'_', '.'=>'_', '-'=>'_', '>'=>'_', '/'=>'_', ':'=>'_', '?'=>'_', '!'=>'_',
                'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'NY', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'ny', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

            $str    =   strtr( $string, $unwanted_array );

            $regex  =   '/[a-zA-Z_0-9]/';

            if(preg_match($regex, $str))
            {
                return $str;
            }
            else{
                error_log(__FILE__.__LINE__);
                error_log("El string: ".$string." ha generado un error  campusmurocontroller en sanitize_nombre_para_columna_myslq()");
                return false;
            }
        }





        /********************************************************
        *  BACK CAMPUS MURO DE LOS SUEÑOS 2021
        ********************************************************/
        
        public function actionBackCampusMuro()
        {

            if (isset($_SESSION['usuario'])) {

                require "models/campus_muro.php";

                $datos['inscripciones'] = campus_muro::findInscripcionesCampusMuroActivas();
                $datos['numerototalinscripciones'] = count($datos['inscripciones']);

                $datos['inscripciones_manyanas'] = campus_muro::findInscripcionesCampusMuroByOpcion("Mañanas");
                $datos['inscripciones_completo'] = campus_muro::findInscripcionesCampusMuroByOpcion("Dia completo");
                $datos['inscripciones_sueltos'] = campus_muro::findInscripcionesCampusMuroByOpcion("Dias sueltos");

                vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_campus_murosuenyos");
            
            } else {
            header('Location: index.php?r=login/loger');
            }
        } 



        public function actionModificaPagadoCampusMuro()
        {
            if (isset($_POST['id'])) {

                require "models/campus_muro.php";

                if (isset($_POST['pagado'])) {
                    $pagado = 1;
                } else {
                    $pagado = 0;
                }

                $id = $_POST['id'];

                $slider = campus_muro::ActualizaPagadoCampusMuro($id, $pagado);
            } else {
                require "error.php";
            }

        }


         public function actionDardeBajaCampusMuro()
        {

            if (isset($_POST['id'])) {

                $codigo = $_POST['id'];

                echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
                            <div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
                                <form action='?r=campusmuro/DardeBajaCampusMuro' method='post'>
                                    <p style='text-align:center;font-size:150%;'> ¿ESTÁ SEGURO QUE DESEA DAR DE BAJA ESTE REGISTRO? </p>
                                    <div style='text-align:center;'>
                                        <input class='btn btn-danger btn-lg' type='submit' name='confirm' value='SI' style='float:left;'>
                                        <input class='btn btn-info btn-lg' type='submit' name='confirm' value='NO' style='float: right;'>
                                    </div>
                                    <input type='hidden' name='id_validado' value='" . $codigo . "'>
                                </form>
                            </div>
                        </div>";
                die;
            }

            if (isset($_POST['confirm'])) {

                if ($_POST['confirm'] == "SI") {
                    require "models/campus_muro.php";

                    $pedido = $_POST['id_validado'];

                    $baja_reg = campus_muro::DardeBajaCampusMuro($pedido);
                }
                if ($_POST['confirm'] == "NO") {
                    echo "<script text='javascript'> window.location.replace('?r=campusmuro/BackCampusMuro'); </script>";
                }
            } else {
                require "error.php";
            }
        }


        public function actionExportToExcelCampusMuro()
        {

            require "models/campus_muro.php";
           $where="";
            $campos="";
            $campoorder="numeropedido";
           // error_log("aobserv: " . $_POST["alergias"]);
            if (isset($_POST["alergias"])) {
               // $where.=" and (observaciones is null or observaciones<>'') ";
                $campos.=" observaciones AS ObserMedicas, ";
            }

            if (isset($_POST["club"])) {
               // $where.=" and (club is null or club<>'') ";
                $campos.=" club as Club, ";
            }


            if (isset($_POST["inscripcion"])) {
                $where.="";
                $campoorder="opcion";
            }

            $datos['inscripciones'] = campus_muro::findAllInscripcionesExcelCampusMuroConCampos($where, $campoorder, $campos);

            if (isset($_POST["export_data"])) {
                $filename = "campus_muro_alqueria_" . date('Ymd') . ".xls";

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


        public function actionExportToExcelCampusMuroCompleto()
        {

            require "models/campus_muro.php";

            $datos['inscripciones'] = campus_muro::findAllInscripcionesExcelCampusMuro();
         

            if (isset($_POST["export_data2"])) {
                $filename = "campus_muro_alqueria_" . date('Ymd') . ".xls";

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


    }
?>