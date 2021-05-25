<?php
/**  Genera un array con las URL de los eventos de Google para cada actividad **/
function generateURLsGoogleCalendar($datos_actividades_calendario)
{
    $urls_google_calendar=array();
    foreach($datos_actividades_calendario as $event)
    {
        $titulo = urlencode($event['Evento']);
        $descripcion = urlencode($event['Evento']);
        $localizacion = urlencode("L'Alqueria del Basket: C/. Bomber Ramon Duart s/n. C.P.: 46013 (València)");

        $start = new DateTime($event['fecha']);
        $end = new DateTime($event['fecha']);
        $dates = urlencode($start->format("Ymd\THis")) . "/" . urlencode($end->format("Ymd\THis"));

        $gCalUrl = "http://www.google.com/calendar/event?action=TEMPLATE&amp;text=$titulo&amp;dates=$dates&amp;details=$descripcion&amp;location=$localizacion&amp;trp=false&amp;";
        array_push($urls_google_calendar,$gCalUrl);
    }
    return $urls_google_calendar;
} 
?>