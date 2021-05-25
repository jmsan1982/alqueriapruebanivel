<?php
    class escuelaveranoController {

        /* ESCUELA DE VERANO DE L´ALQUERIA DEL BASKET */

        // Recibe el formulario de inscripción de la Escuela de Verano Alqueria 2021
        public function actionEscuelaVeranoForm() {         
            /*echo "<script text='javascript' charset='utf-8'>
                    alert('El formulario de inscripción a la Escuela de Verano está bloqueado.');
                    window.location.replace('?r=index/principal');
                </script>";
            die;*/

            if (isset($_POST['nombre'])) {

                require "models/escuela_verano.php";

                // Fecha límite
                $dia = date("31");
                $mes = date("12");
                $ano = date("2021");

                $fechanacimiento = $_POST['fechanacimiento'];

                $dianaz = date("d",strtotime($fechanacimiento));
                $mesnaz = date("m",strtotime($fechanacimiento));
                $anonaz = date("Y",strtotime($fechanacimiento));


                // Si el mes es el mismo pero el día inferior aún no ha cumplido años, le quitaremos un año al actual
                if (($mesnaz == $mes) && ($dianaz > $dia)) {
                    $ano = ($ano - 1);
                }

                // Si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
                if ($mesnaz > $mes) {
                    $ano = ($ano - 1);
                }

                // Ya no habría más condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
                $edad = ($ano - $anonaz);

                


                // Si ha nacido dentro del rango de años permitido, seguimos...
                if ($edad >= 5 && $edad <= 11) {

                    //echo "fecha nac: ". $fechanacimiento .    " edad: " .$edad;   die;

                    $evento             = "Escuela Verano 2021 L´Alqueria";

                    $fecharegistro      = date("Y-m-d");

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
                    $tratamientosmedicos= $_POST['tratamientosmedicos'];
                    $sintomascovid      = $_POST['sintomascovid'];
                    $familiarcovid      = $_POST['familiarcovid'];
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

                    if (isset($_POST['autorizodatos'])) {
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
                    $valores = explode(".", $_FILES['fotocopiasip']['name']);
                    // Guardamos la extensión original del archivo subido
                    $extension = $valores[count($valores)-1];

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
                    //$todoslosregistros = escuela_verano::comprobarRepetidos();

                /*  foreach ($todoslosregistros as $registro) {
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
                    */

                    
                    // Movemos el SIP a su carpeta
                    $dir_subida         = 'img/sipescuelaverano/';
                    $fichero            = $nombre_y_apellidos_format."-S-".date("d-m-Y-H-i-s").".".$extension;
                    $fotocopiasipsubida = $dir_subida.$fichero;
                    move_uploaded_file($_FILES['fotocopiasip']['tmp_name'],$fotocopiasipsubida);


                    

                    // Controlamos si se va a pagar transferencia o en oficinas
                    $enviar = $_POST['enviar'];

                    $ficherosubido2 = "";
                    if ($enviar == "oficina") { 
                        //Formateo Nombre Imagen del resguardo de transferencia
                        
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


                    // Preparamos datos para el formulario del TPV
                    $nombreapellidos    = $nombre." ".$apellidos;
                    $ultimopedido       = escuela_verano::findLastNumeroPedidoEscuelaVerano();
                    $numeropedido       = $ultimopedido['MAX(id)'];
                    $numeropedido       = $numeropedido + 1;

                    $numeropedido = str_pad($numeropedido, 5, "0", STR_PAD_LEFT);

                    $numeropedido = $numeropedido . "ever21";

                    error_log("Pedido: ".$numeropedido);




                    //validacion Dias sueltos
                        $textoDiasSueltos="";
                        $importe=0;
                        //dia 1
                            if( isset( $_POST['dia1'] ) ){
                                if( $_POST['rdia1'] == "dia28jn-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia1'] == "dia28jn-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia1'];                        
                                    $importe = $importe + 35; 
                                
                                }}
                        //dia 2
                            if( isset( $_POST['dia2'] ) ){
                                if( $_POST['rdia2'] == "dia29jn-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia2'] == "dia29jn-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia2'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 3
                            if( isset( $_POST['dia3'] ) ){
                                if( $_POST['rdia3'] == "dia30jn-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia3'] == "dia30jn-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia3'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 4
                            if( isset( $_POST['dia4'] ) ){
                                if( $_POST['rdia4'] == "dia1jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia4'] == "dia1jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia4'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 5
                            if( isset( $_POST['dia5'] ) ){
                                if( $_POST['rdia5'] == "dia2jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia5'] == "dia2jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia5'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 6
                            if( isset( $_POST['dia6'] ) ){
                                if( $_POST['rdia6'] == "dia5jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia6'] == "dia5jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia6'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 7
                            if( isset( $_POST['dia7'] ) ){
                                if( $_POST['rdia7'] == "dia6jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia7'] == "dia6jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia7'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 8
                            if( isset( $_POST['dia8'] ) ){
                                if( $_POST['rdia8'] == "dia7jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia8'] == "dia7jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia8'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 9
                            if( isset( $_POST['dia9'] ) ){
                                if( $_POST['rdia9'] == "dia8jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia9'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia9'] == "dia8jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia9'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 10
                            if( isset( $_POST['dia10'] ) ){
                                if( $_POST['rdia10'] == "dia9jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia10'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia10'] == "dia9jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia10'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 11
                            if( isset( $_POST['dia11'] ) ){
                                if( $_POST['rdia11'] == "dia12jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia11'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia11'] == "dia12jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia11'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 12
                            if( isset( $_POST['dia12'] ) ){
                                if( $_POST['rdia12'] == "dia13jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia12'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia12'] == "dia13jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia12'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 13
                            if( isset( $_POST['dia13'] ) ){
                                if( $_POST['rdia13'] == "dia14jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia13'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia13'] == "dia14jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia13'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 14
                            if( isset( $_POST['dia14'] ) ){
                                if( $_POST['rdia14'] == "dia15jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia14'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia14'] == "dia15jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia14'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 15
                            if( isset( $_POST['dia15'] ) ){
                                if( $_POST['rdia15'] == "dia16jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia15'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia15'] == "dia16jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia15'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 16
                            if( isset( $_POST['dia16'] ) ){
                                if( $_POST['rdia16'] == "dia19jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia16'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia16'] == "dia19jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia16'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 17
                            if( isset( $_POST['dia17'] ) ){
                                if( $_POST['rdia17'] == "dia20jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia17'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia17'] == "dia20jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia17'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 18
                            if( isset( $_POST['dia18'] ) ){
                                if( $_POST['rdia18'] == "dia21jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia18'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia18'] == "dia21jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia18'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 19
                            if( isset( $_POST['dia19'] ) ){
                                if( $_POST['rdia19'] == "dia22jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia19'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia19'] == "dia22jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia19'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 20
                            if( isset( $_POST['dia20'] ) ){
                                if( $_POST['rdia20'] == "dia23jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia20'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia20'] == "dia23jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia20'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 21
                            if( isset( $_POST['dia21'] ) ){
                                if( $_POST['rdia21'] == "dia26jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia21'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia21'] == "dia26jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia21'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 22
                            if( isset( $_POST['dia22'] ) ){
                                if( $_POST['rdia22'] == "dia27jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia22'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia22'] == "dia27jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia22'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 23
                            if( isset( $_POST['dia23'] ) ){
                                if( $_POST['rdia23'] == "dia28jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia23'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia23'] == "dia28jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia23'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 24
                            if( isset( $_POST['dia24'] ) ){
                                if( $_POST['rdia24'] == "dia29jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia24'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia24'] == "dia29jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia24'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 25
                            if( isset( $_POST['dia25'] ) ){
                                if( $_POST['rdia25'] == "dia30jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia25'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia25'] == "dia30jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia25'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                    /*  //dia 26
                            if( isset( $_POST['dia26'] ) ){
                                if( $_POST['rdia26'] == "dia27jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia26'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia26'] == "dia27jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia26'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 27
                            if( isset( $_POST['dia27'] ) ){
                                if( $_POST['rdia27'] == "dia28jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia27'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia27'] == "dia28jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia27'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 28
                            if( isset( $_POST['dia28'] ) ){
                                if( $_POST['rdia28'] == "dia29jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia28'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia28'] == "dia29jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia28'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 29
                            if( isset( $_POST['dia29'] ) ){
                                if( $_POST['rdia29'] == "dia30jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia29'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia29'] == "dia30jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia29'];                        
                                    $importe = $importe + 35; 
                                }
                            }
                        //dia 30
                            if( isset( $_POST['dia30'] ) ){
                                if( $_POST['rdia30'] == "dia31jl-manyana" ){
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia30'];
                                    $importe = $importe + 20; 
                                }else if( $_POST['rdia30'] == "dia31jl-completo" ){  
                                    $textoDiasSueltos = $textoDiasSueltos . "/" . $_POST['rdia30'];                        
                                    $importe = $importe + 35; 
                                }
                            }

                        */

                            

                        //  SEMANA 1
                            if (isset($_POST['semana1'])) {
                               
                                if ($_POST['rsem1'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana1 = "sem1_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana1 = "sem1_manyana";
                                }
                            }else{
                                $semana1="";
                            }
                        //  SEMANA 2
                            if (isset($_POST['semana2'])) {
                               
                                if ($_POST['rsem2'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana2 = "sem2_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana2 = "sem2_manyana";
                                }
                            }else{
                                $semana2="";
                            }
                        //  SEMANA 3
                            if (isset($_POST['semana3'])) {
                               
                                if ($_POST['rsem3'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana3 = "sem3_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana3 = "sem3_manyana";
                                }
                            }else{
                                $semana3="";
                            }
                        //  SEMANA 4
                            if (isset($_POST['semana4'])) {
                               
                                if ($_POST['rsem4'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana4 = "sem4_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana4 = "sem4_manyana";
                                }
                            }else{
                                $semana4="";
                            }
                        //  SEMANA 5
                            if (isset($_POST['semana5'])) {
                               
                                if ($_POST['rsem5'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana5 = "sem5_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana5 = "sem5_manyana";
                                }
                            }else{
                                $semana5="";
                            }
                        //  SEMANA 6
                            $semana6="";
                        /*  if (isset($_POST['semana6'])) {
                               
                                if ($_POST['rsem6'] == "completo") {
                                    $importe = $importe + 155;
                                    $semana6 = "sem6_comp";
                                }
                                else {
                                    $importe = $importe + 90;
                                    $semana6 = "sem6_manyana";
                                }
                            }else{
                                $semana6="";
                            }
                        */


                    if ($enviar == "tarjeta") {
                        $tipopago           = "ONLINE";
                        $nuevoformulario    = escuela_verano::newFormEscuelaVerano(
                                $fecharegistro,     $semana1,               $semana2,               $semana3,               $semana4,           $semana5,       $semana6,
                                $textoDiasSueltos,  $genero,                $nombre,                $apellidos,             $fechanacimiento,       $dni,
                                $club,              $tratamientosmedicos,   $fotocopiasipsubida,    $nombretutor,           $apellidostutor,
                                $dnitutor,          $direccion,             $numero,                $piso,                  $puerta,
                                $cp,                $provincia,             $poblacion,             $telefonotutor,         $emailtutor,
                                $autorizodatos,     $autorizoimagen,        $numeropedido,          $importe,               $evento,
                                $tipopago, $sintomascovid, $familiarcovid, $ficherosubido2);
                        
                        if ($nuevoformulario) {
                            header('Location: https://servicios.alqueriadelbasket.com/tpv_escuelaverano/tpv.php?pedido='.$numeropedido.'&titular='.$nombreapellidos.'&importe='.$importe);
                            die;
                        }
                        else {
                            echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error. Inténtelo de nuevo más tarde.');
                                    window.location.replace('?r=index/EscuelaVerano');
                                </script>";
                            die;
                        }
                    }
                    elseif ($enviar == "oficina") {
                        $tipopago           = "TRANSFERENCIA";
                        $nuevoformulario    = escuela_verano::newFormEscuelaVerano(
                                $fecharegistro,     $semana1,               $semana2,               $semana3,               $semana4,           $semana5,       $semana6,
                                $textoDiasSueltos,  $genero,                $nombre,                $apellidos,             $fechanacimiento,       $dni,
                                $club,              $tratamientosmedicos,   $fotocopiasipsubida,    $nombretutor,           $apellidostutor,
                                $dnitutor,          $direccion,             $numero,                $piso,                  $puerta,
                                $cp,                $provincia,             $poblacion,             $telefonotutor,         $emailtutor,
                                $autorizodatos,     $autorizoimagen,        $numeropedido,          $importe,               $evento,
                                $tipopago, $sintomascovid, $familiarcovid, $ficherosubido2);

                        if ($nuevoformulario) {
                            header('Location: https://servicios.alqueriadelbasket.com/?r=escuelaverano/okpagooficina&pedido=' . $numeropedido);
                            //header('Location: http://localhost/serviciosalqueria2/?r=escuelaverano/okpagooficina&pedido=' . $numeropedido);
                            die;
                        }
                        else {
                            echo "<script text='javascript' charset='utf-8'>
                                    alert('Parece que hubo un error. Inténtelo de nuevo más tarde.');
                                    window.location.replace('?r=index/EscuelaVeranoAlq');
                                </script>";
                            die;
                        }
                    }
                }
                // Si ha nacido fuera del rango de años permitido, mostramos mensaje de prohibición
                else {
                    echo "<script text='javascript' charset='utf-8'>
                            alert('Lo sentimos pero el niño/a debe tener entre 5 y 11 años para participar en la escuela. ¡Gracias por contar con nosotros!');
                            window.location.replace('?r=index/EscuelaVeranoAlq');
                        </script>";
                    die;
                }
            }
        }


        public function actionOk() {

            require "models/escuela_verano.php";

            $codigo = $_GET['codigo'];

            $pagado = 1;


            $actualizaestado = escuela_verano::actualizapagadoescuelaverano($codigo, $pagado);

            $contenidocorreo = escuela_verano::damedatosescuelaverano($codigo);


            $semanas = "";

            if ($contenidocorreo['semana1'] == "sem1_comp") {
                $semanas = $semanas."-Semana del 28 de Junio al 2 de Julio día completo";
            }
            elseif ($contenidocorreo['semana1'] == "sem1_manyana") {
                $semanas = $semanas." -Semana del 28 de Junio al 2 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana2'] == "sem2_comp") {
                $semanas = $semanas." -Semana del 5 al 9 de Julio día completo";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                $semanas = $semanas." -Semana del 5 al 9 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana3'] == "sem3_comp") {
                $semanas = $semanas." -Semana del 12 al 16 de Julio día completo";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                $semanas = $semanas." -Semana del 12 al 16 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana4'] == "sem4_comp") {
                $semanas = $semanas." -Semana del 19 al 23 de Julio día completo";
            }
            elseif ($contenidocorreo['semana4'] == "sem4_manyana") {
                $semanas = $semanas." -Semana del 19 al 23 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana5'] == "sem5_comp") {
                $semanas = $semanas." -Semana del 26 al 30 de Julio día completo";
            }
            elseif ($contenidocorreo['semana5'] == "sem5_manyana") {
                $semanas = $semanas." -Semana del 26 al 30 de Julio solo mañanas";
            }

        /*   if ($contenidocorreo['semana6'] == "sem6_comp") {
                $semanas = $semanas." -Semana del 27 al 31 de Julio día completo";
            }
            elseif ($contenidocorreo['semana6'] == "sem6_manyana") {
                $semanas = $semanas." -Semana del 27 al 31 de Julio solo mañanas";
            }
        */


            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido ="<br><br><b>-Inscripcion en Escuela verano L´Alqueria nº: </b>".$contenidocorreo['numeropedido']. 
            "<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
            "<br>Genero: " . $contenidocorreo['genero'] .
            "<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
            "<br>DNI: ".$contenidocorreo['dni'].
            "<br>Semanas seleccionadas: ".$semanas.
            "<br>Días sueltos: ".$contenidocorreo['diassueltos'].
            "<br>Importe: ".$contenidocorreo['importe']."€".
            "<br>Pago: ".$contenidocorreo['tipopago'].
            "<br>Club: ".$contenidocorreo['club'].
            "<br>Observaciones: ".$contenidocorreo['tratamientosmedicos'].
            "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
            "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
            "<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
            "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
            "<br>Teléfono del tutor/a: ". $contenidocorreo['telefonotutor'].
            "<br>Correo electrónico: ".$contenidocorreo['emailtutor'];

            $enviodecorreo = escuela_verano::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción Escuela Verano de L´Alqueria", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                vistaSimple("layout_ok");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }


        public function actionokpagooficina() {

            require "models/escuela_verano.php";

            $codigo = $_GET['pedido'];


            $contenidocorreo = escuela_verano::damedatosescuelaverano($codigo);


            $semanas = "";

            if ($contenidocorreo['semana1'] == "sem1_comp") {
                $semanas = $semanas."-Semana del 28 de Junio al 2 de Julio día completo";
            }
            elseif ($contenidocorreo['semana1'] == "sem1_manyana") {
                $semanas = $semanas."-Semana del 28 de Junio al 2 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana2'] == "sem2_comp") {
                $semanas = $semanas."-Semana del 5 al 9 de Julio día completo";
            }
            elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                $semanas = $semanas."-Semana del 5 al 9 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana3'] == "sem3_comp") {
                $semanas = $semanas." -Semana del 12 al 16 de Julio día completo";
            }
            elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                $semanas = $semanas." -Semana del 12 al 16 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana4'] == "sem4_comp") {
                $semanas = $semanas." -Semana del 19 al 23 de Julio día completo";
            }
            elseif ($contenidocorreo['semana4'] == "sem4_manyana") {
                $semanas = $semanas." -Semana del 19 al 23 de Julio solo mañanas";
            }

            if ($contenidocorreo['semana5'] == "sem5_comp") {
                $semanas = $semanas." -Semana del 26 al 30 de Julio día completo";
            }
            elseif ($contenidocorreo['semana5'] == "sem5_manyana") {
                $semanas = $semanas." -Semana del 26 al 30 de Julio solo mañanas";
            }

        /*   if ($contenidocorreo['semana6'] == "sem6_comp") {
                $semanas = $semanas." -Semana del 27 al 31 de Julio día completo";
            }
            elseif ($contenidocorreo['semana6'] == "sem6_manyana") {
                $semanas = $semanas." -Semana del 27 al 31 de Julio solo mañanas";
            }
        */

            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $contenido ="<br><br><b>-Inscripcion en Escuela verano L´Alqueria nº: </b>".$contenidocorreo['numeropedido']. 
            "<br>Nombre y apellidos: ".$contenidocorreo['nombre']." ".$contenidocorreo['apellidos'].
            "<br>Genero: " . $contenidocorreo['genero'] .
            "<br>Fecha de nacimiento: ".$contenidocorreo['fechanacimiento'].
            "<br>DNI: ".$contenidocorreo['dni'].
            "<br>Semanas seleccionadas: ".$semanas.
            "<br>Días sueltos: ".$contenidocorreo['diassueltos'].
            "<br>Importe: ".$contenidocorreo['importe']."€".
            "<br>Pago: ".$contenidocorreo['tipopago'].
            "<br>Club: ".$contenidocorreo['club'].
            "<br>Observaciones: ".$contenidocorreo['tratamientosmedicos'].
            "<br>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? ".$contenidocorreo['sintomascovid'].
            "<br>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? ".$contenidocorreo['familiarcovid'].
            "<br>Nombre y apellidos tutor/a: ".$contenidocorreo['nombretutor']." ".$contenidocorreo['apellidostutor'].
            "<br>Dirección: ". $contenidocorreo['direccion']." num: ".$contenidocorreo['numero'].", ".$contenidocorreo['piso'].", ".$contenidocorreo['puerta']." cp: ".$contenidocorreo['cp'].", ".$contenidocorreo['poblacion'].", ".$contenidocorreo['provincia'].
            "<br>Teléfono del tutor/a: ". $contenidocorreo['telefonotutor'].
            "<br>Correo electrónico: ".$contenidocorreo['emailtutor'];

            $enviodecorreo = escuela_verano::mailssend($contenidocorreo['numeropedido'], $contenido, "Ficha inscripción Escuela Verano de L´Alqueria", $contenidocorreo['emailtutor']);

            if ($enviodecorreo) {
                 vistaSimple("layout_ok_pago_oficina");
            }
            else {
                vistaSimple("layout_kocorreo");
            }
        }


        public function actionKo() {

            require "config.php";
            require "models/escuela_verano.php";

            $codigo_error = $_GET['codigoerror'];
            $pedido = $_GET['pedido'];

            $actualizaerror = escuela_verano::actualizacodigoerror($pedido, $codigo_error);

            vistaSimple("layout_ko");
        }


      


        public function actionExportToExcelEscuelaVeranoAlq()
        {

            require "models/escuela_verano.php";
            $where="";
            $campos="";
            $campoorder="numeropedido";
           // error_log("aobserv: " . $_POST["alergias"]);
            if (isset($_POST["alergias"])) {
               // $where.=" and (observaciones is null or observaciones<>'') ";
                $campos.="  tratamientosmedicos AS ObservMedicas, sintomascovid, familiarcovid, ";
            }

            if (isset($_POST["club"])) {
               // $where.=" and (club is null or club<>'') ";
                $campos.=" club as Club, ";
            }


            if (isset($_POST["inscripcion"])) {
                $where.="";
                $campos.=" semana1, semana2, semana3, semana4, semana5, diassueltos, ";
                $campoorder="semana1";
            }

            $datos['inscripciones'] = escuela_verano::findAllInscripcionesExcelEscuelaVeranoAlqConCampos($where, $campoorder, $campos);

            if (isset($_POST["export_data"])) {
                $filename = "escuela_verano_alqueria_" . date('Ymd') . ".xls";

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


        public function actionExportToExcelEscuelaVeranoAlqCompleto()
        {

            require "models/escuela_verano.php";

            $datos['inscripciones'] = escuela_verano::findAllInscripcionesExcelEscuelaVeranoAlq();
         

            if (isset($_POST["export_data2"])) {
                $filename = "escuela_verano_alqueria_" . date('Ymd') . ".xls";

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



        public function actionModificaPagadoEscuelaVeranoAlq()
        {
            if (isset($_POST['id'])) {

                require "models/escuela_verano.php";

                $codigo = $_POST['id'];
                $pagado = 1;

                $slider = escuela_verano::ActualizaPagadoEscuelaVeranoAlq($codigo, $pagado);
            } else {
                require "error.php";
            }
        }



        public function actionDardeBajaEscuelaVeranoAlq()
        {

            if (isset($_POST['id'])) {

                $codigo = $_POST['id'];

                echo "<div style='width:100%;height:100%;background-color: rgba(0,0,0,.8);padding-top:10%;'>
                            <div class='contact-form-wrapper' style='width:50%;margin-left:25%;background-color:white;border:1px solid #000000;border-radius: 10px 10px 10px 10px;padding:25px;'>
                                <form action='?r=escuelaverano/DardeBajaEscuelaVeranoAlq' method='post'>
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
                    require "models/escuela_verano.php";

                    $pedido = $_POST['id_validado'];

                    $baja_reg = escuela_verano::DardeBajaEscuelaVeranoAlq($pedido);
                }
                if ($_POST['confirm'] == "NO") {
                    echo "<script text='javascript'> window.location.replace('?r=campus/BackEscuelaVeranoAlq'); </script>";
                }
            } else {
                require "error.php";
            }
        }


        public function actionImprimirFichaEscuelaVeranoAlq()
        {

            require "models/escuela_verano.php";

            // Recogemos la variable "tipopago" de la URL para incluirla en el cuerpo del HTML
            $tipopago = $_GET['tipopago'];

            $seccioninscripcion = "Ficha inscripción Escuela Verano Alqueria 2021";
            


            // Recogemos la variable "numeropedido" de la URL para pasársela al modelo e incluirla en el cuerpo del HTML
            $numero = $_GET['numeropedido'];

            // Recogemos todos los datos del registro pasándole el número de pedido
            $contenidocorreo = escuela_verano::damedatosescuelaverano($numero);


            // Generamos el contenido de los datos a mostrar en el cuerpo del HTML
            $contenidocorreo['fechanacimiento'] = date("d/m/Y", strtotime($contenidocorreo['fechanacimiento']));

            $semanas = "";
            if ($contenidocorreo['semana1'] == "sem1_comp") {
                $semanas = $semanas ."-Semana del 28 de junio al 2 de julio dia completo";
            } elseif ($contenidocorreo['semana1'] == "sem1_manyana") {
                $semanas = $semanas . " -Semana del 28 de junio al 2 de julio solo mañanas";
            }

            if ($contenidocorreo['semana2'] == "sem2_comp") {
                $semanas = $semanas . " -Semana del 5 al 9 de julio dia completo";
            } elseif ($contenidocorreo['semana2'] == "sem2_manyana") {
                $semanas = $semanas . " -Semana del 5 al 9 de julio solo mañanas";
            }

            if ($contenidocorreo['semana3'] == "sem3_comp") {
                $semanas = $semanas . " -Semana del 12 al 16 de julio dia completo";
            } elseif ($contenidocorreo['semana3'] == "sem3_manyana") {
                $semanas = $semanas . " -Semana del 12 al 16 de julio solo mañanas";
            }

            if ($contenidocorreo['semana4'] == "sem4_comp") {
                $semanas = $semanas . " -Semana del 19 al 23 de julio dia completo";
            } elseif ($contenidocorreo['semana4'] == "sem4_manyana") {
                $semanas = $semanas . " -Semana del 19 al 23 de julio solo mañanas";
            }

            if ($contenidocorreo['semana5'] == "sem5_comp") {
                $semanas = $semanas . " -Semana del 26 al 30 de julio dia completo";
            } elseif ($contenidocorreo['semana5'] == "sem5_manyana") {
                $semanas = $semanas . " -Semana del 26 al 30 de julio solo mañanas";
            }


            $contenido = "<b>Estos son los datos recibidos relacionados con su inscripción. </b>".
                "<br><br><b>Inscripcion en Escuela Verano Alqueria 2021 nº: </b>".$contenidocorreo['numeropedido']. 
                "<br><b>Nombre y apellidos: </b>" . $contenidocorreo['nombre'] . " " . $contenidocorreo['apellidos'] . 
                "<br><b>Fecha de nacimiento: </b>" . $contenidocorreo['fechanacimiento'] .
                "<br><b>Genero: </b>".$contenidocorreo['genero'].
                "<br><b>DNI: </b>" . $contenidocorreo['dni'] .
                "<br><b>Semanas seleccionadas: </b>" . $semanas .
                "<br><b>Dias sueltos: </b>" . $contenidocorreo['diassueltos'] .
                "<br><b>Importe: </b>" . $contenidocorreo['importe'] . "€" .
                "<br><b>Pago: </b>" . $contenidocorreo['tipopago'] .
                "<br><b>Club: </b>" . $contenidocorreo['club'] .
                "<br><b>Observaciones: </b>" . $contenidocorreo['tratamientosmedicos'] .
                "<br><b>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? </b>".$contenidocorreo['sintomascovid'].
                "<br><b>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? </b>".$contenidocorreo['familiarcovid'].
                "<br><b>Nombre y apellidos tutor/a: </b>" . $contenidocorreo['nombretutor'] . " " . $contenidocorreo['apellidostutor'] .
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
                                                        <img src="https://servicios.alqueriadelbasket.com/img/logos-cabecera-email.png" 
                                                        alt="Alqueria del Basket" width="547" height="81" style="display: block;">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td bgcolor="#ffffff" style="padding: 30px 25px 30px 25px;">
                                                    <h3 style="color: #eb7c00; border-bottom: #eb7c00 2px solid;">' . $seccioninscripcion . '</h3>
                                                    <p><strong>Estos son los datos recibidos relacionados con su inscripción.</strong></p>
                                                    <p><strong>Número de pedido:</strong> ' . $numero . '</p>
                                                    <p>' . $contenido . '</p>
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



        public function actionMostrarModalEscuelaVeranoAlq() 
        {
            //error_log(__FILE__.__LINE__);
               // error_log(print_r($_POST,1));
                
                $idinscripcion = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

                error_log("inscrpcion escuela verano: ".$idinscripcion);

                if(!empty($idinscripcion))
                {
                    require "models/escuela_verano.php";
                    require "includes/Utils.php";

                    $datos  =   escuela_verano::damedatosescuelaveranobyid($idinscripcion);
                    
                    // error_log(__FILE__.__LINE__);
                  
                     // error_log(print_r($datos,1));
                    $alerta_cuenta="";
       
                    echo json_encode(array(
                        "response"      =>  "success",
                        "instancia"     =>  $datos,
                        "modal_title"   =>  "Formulario de inscripción en Escuela Verano Alq",
                        "message"       =>  "Los datos de la inscripción se han cargado correctamente.",
                        "alerta_cuenta" =>  $alerta_cuenta));
                    die;
                } 
                else
                {
                    echo json_encode(array(
                        "response"      => "error",
                        "instancia"         => "",
                        "modal_title"   => "Error",
                        "message"       => "Parece que ha habido algún error"));
                }
               

        }

        public function actionUpdateInscripcionModalEscuelaVeranoAlq()
        {
            require "models/escuela_verano.php";

          // error_log("entra en update escuela verano ALQ: ");
            $idinscripcion = filter_input(INPUT_POST, 'idinscripcion', FILTER_SANITIZE_NUMBER_INT);

           //  error_log("entra en update escuela verano ALQ: ".$idinscripcion);

            $dnijugador =filter_input(INPUT_POST, 'dnijugador', FILTER_SANITIZE_STRING);
            $nombre =filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
            $apellidos =filter_input(INPUT_POST, 'apellidos', FILTER_SANITIZE_STRING);
            //$date = new DateTime($_POST["fechanac"]);
            $fechanac=filter_input(INPUT_POST, 'fechanac', FILTER_SANITIZE_STRING);
            $club =filter_input(INPUT_POST, 'club', FILTER_SANITIZE_STRING);
          //  $talla =filter_input(INPUT_POST, 'talla', FILTER_SANITIZE_STRING);
            $genero = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);

            $direccion = filter_input(INPUT_POST, 'direccion', FILTER_SANITIZE_STRING);
            $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
            $piso = filter_input(INPUT_POST, 'piso', FILTER_SANITIZE_STRING);
            $puerta =  filter_input(INPUT_POST, 'puerta', FILTER_SANITIZE_STRING);
            $poblacion =  filter_input(INPUT_POST, 'poblacion', FILTER_SANITIZE_STRING);
            $cp =  filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_STRING);
            $prov =  filter_input(INPUT_POST, 'prov', FILTER_SANITIZE_STRING);

            
            $nombretutor = filter_input(INPUT_POST, 'nombretutor', FILTER_SANITIZE_STRING);
            $apeltutor = filter_input(INPUT_POST, 'apeltutor', FILTER_SANITIZE_STRING);
            $dnitutor =  filter_input(INPUT_POST, 'dnitutor', FILTER_SANITIZE_STRING);
            $tlftutor =  filter_input(INPUT_POST, 'tlftutor', FILTER_SANITIZE_STRING);
            $email =  filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

         
            $tratam =  filter_input(INPUT_POST, 'tratam', FILTER_SANITIZE_STRING);
            $sintomascovid = filter_input(INPUT_POST, 'sintomasc', FILTER_SANITIZE_STRING);
            $familiarcovid = filter_input(INPUT_POST, 'familiarc', FILTER_SANITIZE_STRING);
            $tipopago = filter_input(INPUT_POST, 'tpago', FILTER_SANITIZE_STRING);
            $importe = filter_input(INPUT_POST, 'importe', FILTER_SANITIZE_STRING);

            $sip_que_habia  =   filter_input(INPUT_POST, 'sipanterior', FILTER_SANITIZE_STRING);

            /***********************
            *    FICHERO SIP
            **********************/
            if(!empty($_FILES['sipnuevo']['tmp_name']))
            {
                $array_fichero_y_extension  =   explode(".",$_FILES["sipnuevo"]["name"]);
                $numerodeelementos          =   count($array_fichero_y_extension);
                $extension                  =   $array_fichero_y_extension[$numerodeelementos-1];
                $sip                        =   'img/sipescuelaverano/'.strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre']))."-".strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos']))."-S-".date("d-m-Y-H-i-s").".".$extension;
                $archivo_movido             =   move_uploaded_file($_FILES["sipnuevo"]["tmp_name"], $sip);
            }
            else
            {   
                $sip   =   $sip_que_habia;
            }

            /******************************************
             *    FICHERO RESGUARDO DE TRANSFERENCIA
             *****************************************/

            $resguardo_que_habia = filter_input(INPUT_POST, 'resguardoanterior', FILTER_SANITIZE_STRING);

            if (!empty($_FILES['resguardonuevo']['tmp_name'])) {
                $array_fichero_y_extension = explode(".", $_FILES["resguardonuevo"]["name"]);
                $numerodeelementos = count($array_fichero_y_extension);
                $extension = $array_fichero_y_extension[$numerodeelementos - 1];
                $resguardo = 'img/sipescuelaverano/' . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['nombre'])) . "-" . strtolower(self::sanitize_nombre_para_columna_myslq($_POST['apellidos'])) . "-R-" . date("d-m-Y-H-i-s") . "." . $extension;
                $archivo_movido = move_uploaded_file($_FILES["resguardonuevo"]["tmp_name"], $resguardo);
            } else {
                $resguardo = $resguardo_que_habia;
            }


            $turno1 =  filter_input(INPUT_POST, 'turno1', FILTER_SANITIZE_STRING);
            $tipo1 =  filter_input(INPUT_POST, 'tipo1', FILTER_SANITIZE_STRING);
            $semana1="";
            if ($turno1 =='true'){
                if ($tipo1 =='manyanas'){
                    $semana1="sem1_manyana";
                }else if($tipo1 =='completo'){
                    $semana1="sem1_comp";
                }

            } else{$semana1="";};
            error_log("turno1: ".$turno1 ." t1: " .$tipo1 . " s1: ".$semana1);
           

            $turno2 =  filter_input(INPUT_POST, 'turno2', FILTER_SANITIZE_STRING);
            $tipo2 =  filter_input(INPUT_POST, 'tipo2', FILTER_SANITIZE_STRING);
            $semana2="";
            if ($turno2 =='true'){
                if ($tipo2 =='manyanas'){
                    $semana2="sem2_manyana";
                }else if($tipo2 =='completo'){
                    $semana2="sem2_comp";
                }

            } else{$semana2="";};
           // error_log("turno2: ".$turno2 ." t2: " .$tipo2 . " s2: ".$semana2);


            $turno3 =  filter_input(INPUT_POST, 'turno3', FILTER_SANITIZE_STRING);
            $tipo3 =  filter_input(INPUT_POST, 'tipo3', FILTER_SANITIZE_STRING);
            $semana3="";
            if ($turno3 =='true'){
                if ($tipo3 =='manyanas'){
                    $semana3="sem3_manyana";
                }else if($tipo3 =='completo'){
                    $semana3="sem3_comp";
                }

            } else{$semana3="";};
           // error_log("turno3: ".$turno3 ." t3: " .$tipo3 . " s3: ".$semana3);


            $turno4 =  filter_input(INPUT_POST, 'turno4', FILTER_SANITIZE_STRING);
            $tipo4 =  filter_input(INPUT_POST, 'tipo4', FILTER_SANITIZE_STRING);
            $semana4="";
            if ($turno4 =='true'){
                if ($tipo4 =='manyanas'){
                    $semana4="sem4_manyana";
                }else if($tipo4 =='completo'){
                    $semana4="sem4_comp";
                }

            } else{$semana4="";};
          //  error_log("turno4: ".$turno4 ." t4: " .$tipo4 . " s4: ".$semana4);


            $turno5 =  filter_input(INPUT_POST, 'turno5', FILTER_SANITIZE_STRING);
            $tipo5 =  filter_input(INPUT_POST, 'tipo5', FILTER_SANITIZE_STRING);
            $semana5="";
            if ($turno5 =='true'){
                if ($tipo5 =='manyanas'){
                    $semana5="sem5_manyana";
                }else if($tipo5 =='completo'){
                    $semana5="sem5_comp";
                }

            } else{$semana5="";};
           // error_log("turno5: ".$turno5 ." t5: " .$tipo5 . " s5: ".$semana5);


            
      

            if (isset($idinscripcion) && !empty($idinscripcion)) {
                       
                $instancia=escuela_verano::updatefichaescuelaveranoAlq($idinscripcion,$dnijugador,$nombre,$apellidos,$fechanac, $club,  $direccion, $numero, $piso, $puerta, $poblacion, $cp, $prov, $nombretutor, $apeltutor, $dnitutor, $tlftutor, $email,  $tratam,  $semana2, $semana3, $semana4, $semana5, $semana1, $sip, $resguardo, $sintomascovid, $familiarcovid, $tipopago, $genero, $importe);

                echo json_encode(array("response" => "success",
                    "datos" => $instancia,
                    "modal_title" => "Formulario de inscripción",
                    "message" => "Los datos de la inscripción se han modificado correctamente."));
            } 
            else {
                echo json_encode(array(
                    "response" => "error",
                    "datos" => "",
                    "modal_title" => "Error",
                    "message" => "Parece que ha habido algún error"));
            }
            die;
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
                error_log("El string: ".$string." ha generado un error en sanitize_nombre_para_columna_myslq()");
                return false;
            }
        }
    }
?>