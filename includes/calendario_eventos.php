<?php
	function calcula_numero_dia_semana($dia, $mes, $ano) {
		$numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$ano));
		if ($numerodiasemana == 0) {
			$numerodiasemana = 6;
		}
		else {
			$numerodiasemana --;
		}
		return $numerodiasemana;
	}


	// Función que devuelve el último día de un mes y año dados
	function ultimoDia($mes, $ano) {
	    $ultimo_dia = 28; 
	    while (checkdate($mes, $ultimo_dia + 1, $ano)) { 
	    	$ultimo_dia ++; 
	    } 
	    return $ultimo_dia; 
	}


	function dame_nombre_mes($mes) {
		switch ($mes) {
		 	case 1:
		 		if ($_SESSION['idioma'] == "cas")
					$nombre_mes="ENERO";
				if ($_SESSION['idioma'] == "val")
					$nombre_mes="GENER";
				if ($_SESSION['idioma'] == "eng")
					$nombre_mes="JANUARY";
				break;
		 	case 2:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="FEBRERO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="FEBRER";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="FEBRUARY";
				break;
		 	case 3:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="MARZO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="MAR&#199;";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="MARCH";
				break;
		 	case 4:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="ABRIL";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="ABRIL";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="APRIL";
				break;
		 	case 5:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="MAYO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="MAIG";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="MAY";
				break;
		 	case 6:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="JUNIO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="JUNY";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="JUNE";
				break;
		 	case 7:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="JULIO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="JULIO";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="JULY";
				break;
		 	case 8:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="AGOSTO";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="AGOST";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="AUGUST";
				break;
		 	case 9:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="SEPTIEMBRE";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="SETEMBRE";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="SEPTEMBER";
				break;
		 	case 10:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="OCTUBRE";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="OCTUBRE";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="OCTOBER";
				break;
		 	case 11:
				if($_SESSION['idioma'] == "cas")
					$nombre_mes="NOVIEMBRE";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="NOVEMBRE";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="NOVEMBER";
				break;
		 	case 12:
		 		if($_SESSION['idioma'] == "cas")
					$nombre_mes="DICIEMBRE";
				if($_SESSION['idioma'] == "val")
					$nombre_mes="DESEMBRE";
				if($_SESSION['idioma'] == "eng")
					$nombre_mes="DECEMBER";
				break;
		}
		return $nombre_mes;
	}


	function mostrar_calendario_grande($mes, $ano, $dia, $datos)
        {
            global $parametros_formulario;

            //  CABECERA / Tomo el nombre del mes que hay que imprimir
            $nombre_mes = dame_nombre_mes($mes);

            //  CABECERA / Calculo el mes y año del mes anterior
            $mes_anterior = $mes - 1;
            $ano_anterior = $ano;
            if($mes_anterior == 0){
                    $ano_anterior --;
                    $mes_anterior = 12;
            }
            
            //  CABECERA / Calculo el mes y año del mes siguiente
            $mes_siguiente = $mes + 1;
            $ano_siguiente = $ano;
            if ($mes_siguiente == 13) {
                    $ano_siguiente ++;
                    $mes_siguiente = 1;
            }
                
            //  CABECERA / Construyo la tabla general
            echo '<table class="calendario">
                    <tr>
                        <td colspan="7">
                            <table class="cabecera">
                                <tr>
                                    <td style="text-align: right;">
                                        <a href="?r=calendario/EventosCalendario&nuevo_mes='.$mes_anterior.'&nuevo_ano='.$ano_anterior.'">
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span style="font-size: 22px; font-weight: bold;">'.$nombre_mes.' '.$ano.'</p>
                                    </td>
                                    <td style="text-align: left;">
                                        <a href="?r=calendario/EventosCalendario&nuevo_mes='.$mes_siguiente.'&nuevo_ano='.$ano_siguiente.'">
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>';

		switch($_SESSION['idioma']){
			case "val": echo
				'<tr>
					<td><strong>DL</strong></td>
					<td><strong>DT</strong></td>
					<td><strong>DC</strong></td>
					<td><strong>DJ</strong></td>
					<td><strong>DV</strong></td>
					<td><strong>DS</strong></td>
					<td><strong>DG</strong></td>
				</tr>';
						break;
			case "cas": echo
				'<tr>
					<td><strong>LUN</strong></td>
					<td><strong>MAR</strong></td>
					<td><strong>MIÉ</strong></td>
					<td><strong>JUE</strong></td>
					<td><strong>VIE</strong></td>
					<td><strong>SÁB</strong></td>
					<td><strong>DOM</strong></td>
				</tr>';
						break;
			case "eng": echo
				'<tr>
					<td><strong>MON</strong></td>
					<td><strong>TUE</strong></td>
					<td><strong>WED</strong></td>
					<td><strong>THU</strong></td>
					<td><strong>FRI</strong></td>
					<td><strong>SAT</strong></td>
					<td><strong>SUN</strong></td>
				</tr>';
						break;
		}

		// Variable para llevar la cuenta del día actual
		$dia_actual = 1;

		// Calculo el número del día de la semana del primer día
		$numero_dia = calcula_numero_dia_semana(1, $mes, $ano);

		// Calculo el último día del mes
		$ultimo_dia = ultimoDia($mes, $ano);

		// Utilizo el objeto time para el color de fondo del día de hoy
		$fecha_hoy  = time();
		$mes_hoy    = date("m", $fecha_hoy);
		$ano_hoy    = date("Y", $fecha_hoy);
		$dia_hoy    = date("d", $fecha_hoy);

		// Capturo la fecha de hoy y la del calendario para gestionar los enlaces
		$hoy = date('Y-m-d');

                
                /**************************************
                 * PREPARAR EL ARRAY 
                 * ***********************************/
                $eventos_por_dia=array();
                $contador_dias=0;
                
                foreach ($datos['actividades_calendario'] as $evento) 
                {
                    $dia_evento_desde=(int)date("d",strtotime($evento['fecha']));
                    $mes_evento_desde=(int)date("m",strtotime($evento['fecha']));
                    $mes_evento_hasta=(int)date("m",strtotime($evento['fecha']));
                    $dia_evento_hasta=(int)date("d",strtotime($evento['fechahasta']));
                    
                    if($mes==$mes_evento_desde && $dia_evento_desde>$dia_evento_hasta)
                    {   $dia_evento_hasta=31;   }
                    else if($mes>=$mes_evento_desde && $dia_evento_desde>$dia_evento_hasta)
                    {   $dia_evento_desde=1;   }
                    
                    while($dia_evento_desde<=$dia_evento_hasta && $dia_evento_desde<= $ultimo_dia)
                    {
                        if(!isset($eventos_por_dia[$dia_evento_desde]))
                        {
                            $eventos_por_dia[$dia_evento_desde]=array();
                        }
                        array_push($eventos_por_dia[$dia_evento_desde],
                            "<div class=\"evento\"><a class=\"d-block\" style=\"width:100%\" onclick=\"miModal('".$ano."-".$mes."-".$dia_evento_desde."');\">".
                                "<h3 style=\"width:100%\" class=\"hidden-xs visible-sm-block visible-md-block visible-lg-block\">".utf8_encode($evento['Evento'])."</h3>
                                <span style=\"width:100%\" class=\"visible-xs-block hidden-sm hidden-md hidden-lg hellip-personalizado\">·</span>
                            </a></div>");
                        $dia_evento_desde++;
                    }
                }
                
                /**************************************
                 * FIN DE PREPARAR EL ARRAY 
                 * ***********************************/
                
                
                $contador_eventos_total=0;
                /**************************************
                 * PRIMERA SEMANA
                 * ***********************************/
		if(strlen($mes) == 1)           {   $mes = "0".$mes;                        }
                if(strlen($dia_actual) == 1)    {   $dia_actual_string = "0".$dia_actual;   }else{$dia_actual_string = "".$dia_actual;   }
		$fecha_calendar = date($ano.'-'.$mes.'-'.$dia_actual_string);

                
		echo '<tr>';
                for ($i = 0; $i < 7; $i++)
                {
                    if ($i < $numero_dia)
                    {
                        // Si el día de la semana i es menor que el número del primer día de la semana no pongo nada en la celda
                        echo '<td></td>';
                    }
                    else
                    {
                        if(strlen($dia_actual) == 1)    {   $dia_actual_string = "0".$dia_actual;   }else{$dia_actual_string = "".$dia_actual;   }
                        
                        if ($dia_actual == $dia && $mes_hoy == $mes && $ano_hoy == $ano)
                        {   echo '<td style="background-color: #f7ca97;"><div class="dia-evento"><a class="d-block" style="width:100%" onclick="miModal("'.$ano.'-'.$mes.'-'.$dia_actual_string.'");">'.$dia_actual.'</a></div>';    }
                        else
                        {   echo '<td><div class="dia-evento"><a class="d-block" style="width:100%" onclick="miModal("'.$ano.'-'.$mes.'-'.$dia_actual_string.'");">'.$dia_actual.'</a></div>';    }

                        if(isset($eventos_por_dia[$dia_actual]))
                        {
                            for($contador_eventos_aux=0;
                                $contador_eventos_aux<count($eventos_por_dia[$dia_actual]);
                                $contador_eventos_aux++)
                            {
                               echo $eventos_por_dia[$dia_actual][$contador_eventos_aux];
                            }
                        }
                          
                        echo "</td>";
                        $dia_actual++;
                    }
		}
		echo "</tr>";

		/**************************************
                 * RESTO DE SEMANAS
                 * ***********************************/
		$numero_dia = 0;
		while ($dia_actual <= $ultimo_dia)
                {
                    if(strlen($dia_actual) == 1)    {   $dia_actual_string = "0".$dia_actual;   }else{$dia_actual_string = "".$dia_actual;   }
                    
                    // Si estamos a principio de la semana escribo el <tr>
                    if ($numero_dia == 0){  echo '<tr>';}

                    if ($dia_actual == $dia && $mes_hoy == $mes && $ano_hoy == $ano)
                    {   echo '<td style="background-color: #f7ca97;"><div class="dia-evento"><a class="d-block" style="width:100%" onclick="miModal("'.$ano.'-'.$mes.'-'.$dia_actual_string.'");">'.$dia_actual.'</a></div>';    }
                    else
                    {   echo '<td><div class="dia-evento"><a class="d-block" style="width:100%" onclick="miModal("'.$ano.'-'.$mes.'-'.$dia_actual_string.'");">'.$dia_actual.'</a></div>';    }

                    
                    //  Ahora debemos mostra los eventos que tenemos en el array
                    if(isset($eventos_por_dia[$dia_actual]))
                    {
                        for($contador_eventos_aux=0;
                            $contador_eventos_aux<count($eventos_por_dia[$dia_actual]);
                            $contador_eventos_aux++)
                        {
                           echo $eventos_por_dia[$dia_actual][$contador_eventos_aux];
                        }
                    }
                    
                    
                    echo "</td>";
                    
                    $dia_actual ++;
                    $numero_dia ++;
			
                    // Si es el último de la semana, me pongo al principio de la semana y escribo el </tr>
                    if ($numero_dia == 7){     $numero_dia = 0;echo '</tr>';    }
		}
                

		// Compruebo que celdas me faltan por escribir vacias de la última semana del mes
		for ($i = $numero_dia; $i < 7; $i ++) 
                {   echo    '<td><span></span></td>';   }
		echo 	'</tr>
			</table>';
	}
?>