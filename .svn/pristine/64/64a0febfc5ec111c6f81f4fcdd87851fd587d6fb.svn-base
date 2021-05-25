<?php
class calendarioController 
{
    public function actionEventosCalendario()
    {
        require "models/eventos_calendario.php";
        //require('includes/script_generar_google_calendar_url.php');
        //require "models/seo.php";

       // $datos['calendario'] = eventos_calendario::findForSeccion("calendario");
        if (isset($_GET['nuevo_mes']) && is_numeric($_GET['nuevo_mes'])) {
            $mes = $_GET['nuevo_mes'];
            $ano = $_GET['nuevo_ano'];
        }
        else {
            $mes = date('m');
            $ano = date('Y');
        }

        $datos['actividades_calendario'] = eventos_calendario::findEventosCalendarioPorMes($mes, $ano);
        //$datos['actividades_calendario_google_calendar_url'] = generateURLsGoogleCalendar($datos['actividades_calendario']);

        // Traemos el título y la descripción pasándole el nombre de la sección y el idioma de la sesión del usuario
        // $datos['seo'] = seo::getMetadatos("actividades_calendario", $_SESSION['idioma']);

        //  $datos['title']         = $datos['seo']['title_'.$_SESSION['idioma']];
        //  $datos['description']   = $datos['seo']['description_'.$_SESSION['idioma']];

        vistaSinvista(array('datos' => $datos), "layout_eventos_calendario");
    }

    public function actionCargaModalCalendarioActividades()
    {
        /****************************************************************
         * Esto es solo para probar que se responde y regresamos al JS
         ****************************************************************/
        /*echo json_encode(
            array(
                "response"          => "success",
                "contenidototal"    => "Contenido ejemplo",
                "message"           => "Hemos cargado los datos"));
        die;*/
        /****************************************************************
         * fin
         ****************************************************************/
        
        
        
        
        require "models/eventos_calendario.php";

        $google = "";

        $fecha = $_POST['fecha'];
        
        $eventos = eventos_calendario::findAllEventosFecha($fecha);

        $contenidototal ="";

        if(!empty($eventos))
        {
            $contador = 1;

            foreach ($eventos as $evento)
            {
                /* Google */
                $titulo = urlencode($evento['Evento']);
                $descripcion = urlencode($evento['observ']);
               // $descripcion = $evento['observ'];
                $localizacion = urlencode("L'Alqueria del Basket: C/. Bomber Ramon Duart s/n. C.P.: 46013 (València)");
                $start = new DateTime($evento['fecha']);
                $end = new DateTime($evento['fechahasta']);
                $dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));
                
                $linkgoogle = "http://www.google.com/calendar/event?action=TEMPLATE&amp;text=$titulo&amp;dates=$dates&amp;details=$descripcion&amp;location=$localizacion&amp;trp=false&amp;";
                /* /Google */
                /* Outlook */
              /*  $start = str_replace("-","",$evento['fecha']);
                $end = str_replace("-","",$evento['fechahasta']);
                $summary = $evento['Evento'];
                $location = "LAlqueria del Basket: C/. Bomber Ramon Duart s/n. C.P.: 46013 (València)";
                $descripcion = $evento['observ'];

                $file=fopen("evento-alqueria-basket-".$contador.".ics","w");
                fwrite($file,"BEGIN:VCALENDAR".PHP_EOL);
                fwrite($file,"VERSION:2.0".PHP_EOL);
                fwrite($file,"PRODID:-//hacksw/handcal//NONSGML v1.0//EN".PHP_EOL);
                fwrite($file,"BEGIN:VEVENT".PHP_EOL);
                fwrite($file,"DTSTART:".$start . PHP_EOL);
                fwrite($file,"DTEND:".$end.PHP_EOL);
                fwrite($file,"SUMMARY:".$summary . PHP_EOL);
                fwrite($file,"LOCATION:".$location.PHP_EOL);
                fwrite($file,"DESCRIPTION:".$descripcion.PHP_EOL);
                fwrite($file,"END:VEVENT".PHP_EOL);
                fwrite($file,"END:VCALENDAR".PHP_EOL);
                fclose($file);

                $linkoutlook = "evento-alqueria-basket-".$contador.".ics"; */
                /* /Outlook */


                /* PARA MOSTRAR LAS PISTAS ASIGNADAS A UN EVENTO, las sacamos por el idevento y la fecha del  dia seleccionado  */
                $idevento=$evento['id_reserva_ev'];
                $pistas=eventos_calendario::findPistasDelEvento($idevento, $fecha);
                $nombrepistas="";

                foreach ($pistas as $pista)
                {
                    $nombrepistas=$nombrepistas . " - " .$pista['pista'];
                   
                }
                $cadenapista="Pistas: " . $nombrepistas ;

               

                /* 25/09/2020 PARA MOSTRAR LAS SALAS ASIGNADAS A UN EVENTO, las sacamos por el idevento y la fecha del  dia seleccionado  */
                $nombresalas="";
                
                $salas=eventos_calendario::findSalasDelEvento($idevento, $fecha);

                foreach ($salas as $sala)
                {
                    $nombresalas=$nombresalas . " - " .$sala['Sala'];
                   
                }
                $cadenasalas="Salas: " . $nombresalas ;

                //<p>'.$evento['fecha'] .' De: ' .$evento['hora_ini']. ' a: ' .$evento['hora_fin'] .'</p>
                $contenidototal .= '<div id="" class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <h3>'.utf8_encode($evento['Evento']).'</h3>
                                        <p> <strong>'.$evento['estado']. '</strong>  &nbsp;  Fecha: ' .$evento['fecha'] .' De: ' .$evento['hora_ini']. ' a: ' .$evento['hora_fin'] .'</p>
                                        <p>'.$cadenapista.'</p>
                                        <p>'.$cadenasalas.'</p>
                                        <p>'.utf8_encode($evento['observ']).'</p>

                                    </div>
                                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 ">
                                        <div class="mt-2" id="capatotal">
                                   
                                            <a id="" target="_blank" href="'.$linkgoogle.'" class="btn btn-link-w" 
                                                style="font-size: 20px;height: 40px;width: 100%;margin-bottom:10px;">Google Calendar</a>
                                            
                                        </div>                                
                                    </div>
                                    <div style="width:98%;margin:2%;height:2px;background-color:grey;"></div>';

             //error_log( $contenidototal, 1);
            
                $contador++;
            }
        }
       //error_log($cadenapista);
        echo json_encode(
            array(
                "response" => "success",
                "contenidototal" =>$contenidototal , 
                "message" => "Hemos cargado los datos")
        );

    }
}
?>