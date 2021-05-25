<?php
$start=str_replace("-","",filter_input(INPUT_GET,'start'));
$end=str_replace("-","",filter_input(INPUT_GET,'end'));
$summary=filter_input(INPUT_GET,'summary');
$location=filter_input(INPUT_GET,'location');
$descripcion=filter_input(INPUT_GET,'descripcion');

$file=fopen("../evento-alqueria-basket.ics","w");
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

echo "evento-alqueria-basket.ics";
?>