<?php
	class ligaController {
		// CARGAR LA VISTA Y DATOS DE LA LIGA DE L'ALQUERIA
		public function actionBackLiga()
                {
                    if ( self::isLogged() )
                    {
                        require "models/formularios_liga_alqueria.php";
                        require "models/formularios_liga_alqueria_jugadores.php";
                        require "models/formularios_liga_alqueria_pagos.php";
                        require "models/activarFormularios.php";

                        $datos['equipos']               = formularios_liga_alqueria::findAll();
                        $datos['tabla_equipos_liga']    = self::generaHTML_Tabla_Listado_Equipos($datos['equipos']);
                        $datos['datosFormularios'] = activarFormularios::findActivador();

                        vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_Liga");
                    }
		}

		// CARGAR LOS DATOS DEL EQUIPO
		public function actionFindEquipoByIdEquipo() {
			if ( self::isLogged() )	{
				require "models/formularios_liga_alqueria.php";

				$datos["equipo"] = formularios_liga_alqueria::findByID( $_POST["id_seleccionado"] );
				echo json_encode(array(
				"response"  							=> "Consulta OK",
				"datos_equipo"     						=> $datos["equipo"]
			));
				

			}
		}

        // Activar o Desactivar los formularios de Liga Senior
        public function actionActivarDesactivarLiga() {
            if ( self::isLogged() )	{
                require "models/activarFormularios.php";

                $value = $_POST['value'];

                activarFormularios::updateLigaSenior($value);

                echo json_encode(array(
                    "response"  							=> "Consulta OK"
                ));


            }
        }


		// CARGAR LOS DATOS DEL EQUIPO
		public function actionUpdateEquipoByIdEquipo() {
			if ( self::isLogged() )	{
				require "models/formularios_liga_alqueria.php";

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "NombreEquipo",$_POST["nombre-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "Categoria",$_POST["categoria-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "Subcategoria",$_POST["subcategoria-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "ColorEquipacionPrincipal",$_POST["equipacion_principal-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "	ColorEquipacionSecundaria",$_POST["equipacion_secundaria-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "	ResponsableNombre",$_POST["ResponsableNombre-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "	ResponsableTelefono",$_POST["telefono-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "	ResponsableEmail",$_POST["mail-editar-equipo"], "si" );

				$datos = formularios_liga_alqueria::updateAttribute( $_POST["IDEquipo"], "	activo", $_POST["activo-editar-equipo"], "no" );

				echo json_encode(array(
				"response"  					=> "Consulta OK"
			));
				

			}
		}

		// CARGAR LOS JUGADORES DEL EQUIPO
		public function actionFindJugadoresByIdEquipo() {
			if ( self::isLogged() )	{
				require "models/formularios_liga_alqueria_jugadores.php";

				$datos["jugadores"] = formularios_liga_alqueria_jugadores::findByIDFormulariosLigaAlqueria( $_POST["id_seleccionado"] );
				echo json_encode(array(
				"response"  					=> "Consulta OK",
				"jugadores"     				=> $datos["jugadores"]
			));
				

			}
		}



        // HACE EL UPDATE DE LA MODAL DE JUGADORES
        public function actionUpdateJugadoresByIdEquipo() {
            if ( self::isLogged() ) {
                require "models/formularios_liga_alqueria_jugadores.php";

                $nombre = explode(',',$_POST["nombre"]);
                $dni = explode(',',$_POST["dni"]);
                $email = explode(',',$_POST["email"]);
                $telefono = explode(',',$_POST["telefono"]);
                $id = explode(',',$_POST["id"]);

                for ($i = 0; $i <= count($dni)-1; $i++) {
                    //Recoger el jugador
                    error_log($i);
                    $jugador =  formularios_liga_alqueria_jugadores::findByID($id[$i]);
                    formularios_liga_alqueria_jugadores::update($jugador['ID'], $jugador['IDFormulariosLigaAlqueria'],$nombre[$i], $dni[$i], $email[$i], $telefono[$i],$jugador['activo']);
                }

                echo json_encode(array(
                "response"                      => "success"
            ));
            }
        }



        //Exportar a Excel Inscripciones liga senior
        public function actionExportToExcelInscripcionesLigaSenior()
        {

            require "models/formularios_liga_alqueria.php";
            $datos['datosPagos'] = formularios_liga_alqueria::findAll();

            if (isset($_POST["export_data_inscripciones_patronato"])) {
                $filename = "Inscripciones_LigaSenior_" . date('Ymd') . ".xls";
                // header('Content-Encoding: UTF-8');
                // header('Content-Type: text/html; charset=utf-16');
                header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
                header("Content-Disposition: attachment; filename=" . $filename . "");
                header('Cache-Control: max-age=0');
                $show_column = false;

                if (!empty($datos['datosPagos'])) {
                    foreach ($datos['datosPagos'] as $inscripcion) {
                        if (!$show_column) {
                            // Display field/column names in first row
                            echo implode("\t", array_keys($inscripcion)) . "\r\n";
                            $show_column = true;
                        }
                        echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                        //para que se muestren bien los acentos
                        //  echo mb_convert_encoding($result, 'UTF-16LE', 'UTF-8');
                    }
                }
                exit;
            }
        }
                
                //  Exporta listado a excel
                public function actionExportarListadoEquipos()
                {
                    if ( self::isLogged() )	
                    {
                        require "models/formularios_liga_alqueria.php";
                        require "models/formularios_liga_alqueria_pagos.php";

                        $equipos = formularios_liga_alqueria::findAll();
                        
                        error_reporting(0);
                        $filename = "Inscripciones_LIGA_ALQUERIA_".date('Y_m_d_H_i_s') . ".csv";
                        header('Content-Encoding: UTF-8');
                        header('Content-Type: text/html; charset=utf-8');
                        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
                        header("Content-Disposition: attachment; filename=".$filename."");
                        header('Cache-Control: max-age=0');
                        $show_column = false;

                        $file = fopen('php://output', 'w'); //Archivo de descarga
                        fputcsv($file, array(
                            'Fecha Registro',   'Equipo',       'Categoria',     iconv("UTF-8", "ISO-8859-1//TRANSLIT","División") ,     'Eq.principal', 'Eq.secundaria',  
                            'Responsable',      'DNI',          'Email',        'Telefono', 
                            'Pago inicial',     'Pago_2',       'Pago_3',       'Pago_4',       'Activo'), ';', chr(0));
                         
                        foreach($equipos as $equipo)
                        {
                            $fecha_alta     =   new DateTime($equipo['FechaAlta']);
                            $pagos          =   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($equipo['ID']);
                            $array_pagos    =   array();
                            
                            for($contador_pagos=1;$contador_pagos<=4;$contador_pagos++)
                            {
                                $pago=$pagos[($contador_pagos-1)];
                                if($pago['confirmacion_pago']=="1")
                                {
                                    array_push($array_pagos, $pago['cantidad']);
                                }
                                else
                                {
                                    array_push($array_pagos, "0");
                                }
                            }

                            fputcsv($file, array(
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$fecha_alta->format('d/m/Y H:i')),
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['NombreEquipo']),
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['Categoria']), 
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['Division']), 
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionPrincipal']),
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ColorEquipacionSecundaria']), 
                                
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableNombre']), 
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableDNI']),
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableEmail']), 
                                iconv("UTF-8", "ISO-8859-1//TRANSLIT",$equipo['ResponsableTelefono']),
                                
                                $array_pagos[0], 
                                $array_pagos[1],
                                $array_pagos[2],
                                $array_pagos[3],
                                $equipo['activo']), ';', chr(0));
                        }
                            
                        exit;
                    }
                    
                }
                
                public function actionCargarFormulariosLigaAlqueriaPagos()
                {
                    if ( self::isLogged() )	
                    {
                        require "models/formularios_liga_alqueria.php";
                        require "models/formularios_liga_alqueria_pagos.php";

                        $id_equipo                              =   $_POST['ID'];
                        $id_equipo                              =   explode("-", $id_equipo);
                        $formularios_liga_alqueria_pagos        =   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($id_equipo[1]);
                        $formularios_liga_alqueria              =   formularios_liga_alqueria::findByID($id_equipo[1]);
                        $html_formularios_liga_alqueria_pagos   =   self::generaHTML_TablaFormulariosLigaAlqueriaPagos($formularios_liga_alqueria_pagos,$formularios_liga_alqueria['NombreCarpeta']);
                            
//                        error_log(__FILE__.__LINE__);
//                        error_log($html_formularios_liga_alqueria_pagos['contenido_tabla']);
//                        error_log($html_formularios_liga_alqueria_pagos['contenido_justificante']);
                        
                        echo json_encode(array(
                            "response"                  => "Consulta OK",
                            "tabla_pagos"               => $html_formularios_liga_alqueria_pagos['contenido_tabla'],
                            "contenido_justificante"    => $html_formularios_liga_alqueria_pagos['contenido_justificante'],
                        ));
                    }
                }
                
                //  actionConfirmarPagoLiga() confirma un pago de la LIGA ALQUERIA dado el ID del pago
                public function actionConfirmarPagoLiga()
                {
                    if ( self::isLogged() )	
                    {
                        require "models/formularios_liga_alqueria.php";
                        require "models/formularios_liga_alqueria_pagos.php";
                        
                        $ID=   $_POST['ID'];
                        formularios_liga_alqueria_pagos::updateAttribute($ID,"confirmacion_pago", 1, "no");
                        formularios_liga_alqueria_pagos::updateAttribute($ID,"fecha_confirmacion_pago",date("Y-m-d H:i:s"), "si");
                        
                        $formularios_liga_alqueria_pago =   formularios_liga_alqueria_pagos::findByID($ID);
                        $formulario_liga_alqueria      =   formularios_liga_alqueria::findByID($formularios_liga_alqueria_pago['IDFormulariosLigaAlqueria']);
                        $formularios_liga_alqueria_pagos=   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($formularios_liga_alqueria_pago['IDFormulariosLigaAlqueria']);
                        $html_formularios_liga_alqueria_pagos   =   self::generaHTML_TablaFormulariosLigaAlqueriaPagos($formularios_liga_alqueria_pagos,$formulario_liga_alqueria['NombreCarpeta']);

                        $formularios_liga_alqueria  =   formularios_liga_alqueria::findAll();
                        $tabla_equipos_liga         =   self::generaHTML_Tabla_Listado_Equipos($formularios_liga_alqueria);
                           
                        echo json_encode(array(
                            "response"                  => "success",
                            "message"                   => "La información se ha actualizado correctamente. OK",
                            "tabla_pagos"               => $html_formularios_liga_alqueria_pagos['contenido_tabla'],
                            "contenido_justificante"    => $html_formularios_liga_alqueria_pagos['contenido_justificante'],
                            "tabla_equipos_liga"        => $tabla_equipos_liga
                        ));
                    }
                }
                
                //  actionAnularPagoLiga() anula un pago de la LIGA ALQUERIA dado el ID del pago
                public function actionAnularPagoLiga()
                {
                    if ( self::isLogged() )	
                    {
                        require "models/formularios_liga_alqueria.php";
                        require "models/formularios_liga_alqueria_pagos.php";
                        
                        $ID=   $_POST['ID'];
                        formularios_liga_alqueria_pagos::updateAttribute($ID,"confirmacion_pago", 0, "no");
                        formularios_liga_alqueria_pagos::updateAttribute($ID,"fecha_confirmacion_pago","null", "no");
                        $formularios_liga_alqueria_pago =   formularios_liga_alqueria_pagos::findByID($ID);
                        $formulario_liga_alqueria       =   formularios_liga_alqueria::findByID($formularios_liga_alqueria_pago['IDFormulariosLigaAlqueria']);
                        $formularios_liga_alqueria_pagos=   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($formularios_liga_alqueria_pago['IDFormulariosLigaAlqueria']);
                        $html_formularios_liga_alqueria_pagos   =   self::generaHTML_TablaFormulariosLigaAlqueriaPagos($formularios_liga_alqueria_pagos,$formulario_liga_alqueria['NombreCarpeta']);

                        $formularios_liga_alqueria  =   formularios_liga_alqueria::findAll();
                        $tabla_equipos_liga         =   self::generaHTML_Tabla_Listado_Equipos($formularios_liga_alqueria);
                        
                        echo json_encode(array(
                            "response"                  => "success",
                            "message"                   => "La información se ha actualizado correctamente. OK",
                            "tabla_pagos"               => $html_formularios_liga_alqueria_pagos['contenido_tabla'],
                            "contenido_justificante"    => $html_formularios_liga_alqueria_pagos['contenido_justificante'],
                            "tabla_equipos_liga"        => $tabla_equipos_liga
                        ));
                    }
                }
                
                // generaHTML_TablaFormulariosLigaAlqueriaPagos() genera la tabla de pagos de un equipo de la LIGA ALQUERIA
		private static function generaHTML_TablaFormulariosLigaAlqueriaPagos($formularios_liga_alqueria_pagos,$carpeta_equipo) 
                {
                    $contenido_tabla    ="";
                
                    foreach ($formularios_liga_alqueria_pagos as $pago)
                    {
                        if(!empty($pago['fecha_confirmacion_pago']))
                        {   $fecha_confirmacion_pago = new Datetime($pago['fecha_confirmacion_pago']);
                            $fecha_confirmacion_pago_string = $fecha_confirmacion_pago->format("d/m/Y H:i:s");  }
                        else
                        {   $fecha_confirmacion_pago_string="-";    }
                        
                        if(!empty($pago['confirmacion_pago']) && $pago['confirmacion_pago']=="1")
                        {   $confirmacion_pago_string = "<span>Sí</span> ";  
                            $confirmar_pago_display =   "display:none;";
                            $anular_pago_display    =   "display:inline-block;";
                        }
                        else
                        {   $confirmacion_pago_string="<span>No</span> ";     
                            $confirmar_pago_display =   "display:inline-block;";
                            $anular_pago_display    =   "display:none;";
                        }
                        
                        $contenido_confirmar_pago='
        <span id="confirmar-pago-'.$pago['ID'].'"   class="confirmar_pago_liga" style="color:green;cursor:pointer;text-decoration:underline;'.$confirmar_pago_display.'">Confirmar pago <i class="fa fa-check-circle" style="color:green;"></i></span>
        <span id="anular-pago-'.$pago['ID'].'"      class="anular_pago_liga" style="color:red;cursor:pointer;text-decoration:underline;'.$anular_pago_display.'">Anular pago <i class="fa fa-remove" style="color:red;"></i></span>';
                            
                        $contenido_tabla.= '<tr id="pago-'.$pago['ID'].'">
                             <td class="text-left">'.$pago['nombre_pago'].'</td>'.
                            '<td class="text-left">'.$pago['cantidad'].'€</td>'.
                            '<td class="text-left">'.$pago['metodo_pago'].'</td>'.
                            '<td class="text-left">'.$confirmacion_pago_string.$contenido_confirmar_pago.'</td>'.
                            '<td class="text-left">'.$fecha_confirmacion_pago_string.'</td>
                        </tr>';      
                    }
                    
                    $ficheroslocal  =   scandir("liga/".$carpeta_equipo."/");
                       
                    if(count($ficheroslocal>0)){
                        $contenido_justificante="<div class='col-12'><h4>Justificante de inscripción:</h4></div>";
                    }
                    else{
                        $contenido_justificante="";
                    }
                    
                    foreach($ficheroslocal as $archivo)	
                    {
                        if ((strpos($archivo,".pdf") !== false)
                                        || (strpos($archivo,".db") !== false)
                                        || (strpos($archivo,"_cs") !== false) // Copias de seguridad
                                        || $archivo=="."
                                        || $archivo=="..")
                        {
                            if((strpos($archivo,".pdf") !== false))
                            {
                                $contenido_justificante.="<div class='col-12'><a href='liga/".$carpeta_equipo."/".$archivo."' target='_blank'>".$archivo."</a></div>";
                            }
                        }
                        else
                        {                            
                            $contenido_justificante.='<div style="display:inline-block;vertical-align:middle;" class="pl-1">'
                                . '<img src="./liga/'.$carpeta_equipo.'/'.$archivo.'" '
                                    . ' style="width:100%;height:auto;">'
                                . '</div>';

                       }
                    }
                        
                    return array("contenido_tabla"=>$contenido_tabla,"contenido_justificante"=>$contenido_justificante);
		}

                private static function generaHTML_Tabla_Listado_Equipos($equipos)
                {
                    $html="";
                    if(count($equipos)>0)
                    {
                        foreach ($equipos as $equipo)
                        {
                            //  Saco sus pagos
                            $pagos  =   formularios_liga_alqueria_pagos::findByIDFormulariosLigaAlqueria($equipo['ID']);
                            $string_pagos="";
                            foreach($pagos as $pago)
                            {
                                if($pago['confirmacion_pago']=="1")
                                {
                                    $string_pagos.='<i class="fa fa-check-circle" style="color:green;"></i>';
                                }
                                else
                                {
                                    $string_pagos.='<i class="fa fa-check-circle" style="color:red;"></i>';
                                }
                            }
                            if(!empty($equipo['Categoria']) && $equipo['Categoria']=="MASCULINO" && empty($equipo['Subcategoria']))
                            {
                                $subcategoria_string="<span class='label label-danger'>POR ASIGNAR</span>";
                            }
                            else
                            {   $subcategoria_string="";    }

                            $html.='<tr id="fila-equipo-' . $equipo["ID"] . '">
                                    <td class="text-center valor-tabla-NombreEquipo">' . $equipo['NombreEquipo'] . '</td>
                                    <td class="text-center valor-tabla-NombreEquipo">' . $equipo['FechaAlta'] . '</td>
                                    <td class="text-center valor-tabla-Categoria">' . $equipo['Categoria'] . '</td>
                                    <td class="text-center valor-tabla-Subcategoria">' . $subcategoria_string. '</td>
                                    <td class="text-center valor-tabla-ColorEquipacionPrincipal">' . $equipo['ColorEquipacionPrincipal'] . '</td>
                                    <td class="text-center valor-tabla-ColorEquipacionSecundaria">' . $equipo['ColorEquipacionSecundaria'] . '</td>
                                    <td class="text-center valor-tabla-ResponsableNombre">' . $equipo['ResponsableNombre'] . '</td>
                                    <td class="text-center valor-tabla-ResponsableTelefono">' . $equipo['ResponsableTelefono'] . '</td>
                                    <td class="text-center valor-tabla-ResponsableEmail">' . $equipo['ResponsableEmail'] . '</td>';

                                    if($equipo['activo']){
                                        $html.='<td class="text-center valor-tabla-activo"><i class="fa fa-check-circle" style="color:green;"></i></td>';
                                    }else{
                                        $html.='<td class="text-center valor-tabla-activo"><i class="fa fa-times-circle" style="color:red;"></i></td>';
                                    }

                                    $html.= '<td>'.$string_pagos.'</td>'
                                        . '<td id="equipo-' . $equipo['ID'] . '" class="text-center">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Editar Equipo" class="cargar_modal_editar_equipo"><i class="fa fa-edit"></i></a>
                                        
                                        <a href="?r=inscripciones/ImprimirFichaEquipo&id=' . $equipo['ID'] . '" target="_blank">
                                        <i class="fa fa-print" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                                        </a>

                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Editar Jugadores" class="cargar_modal_editar_jugadores"><i class="fa fa-users"></i></a> 

                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="Editar Pagos" class="cargar_modal_editar_pagos"><i class="fa fa-credit-card"></i></a>
                                    </td>
                                </tr>';
                        }
                    }
                    else{
                        $html.='<tr><td colspan="10">No hay equipos</td></tr>';
                    }
                    return $html;
                }
                
                
                
		/*METODOS SELF*/
		/** Metodo comprobar login*/
		private static function isLogged() {
			if (isset($_SESSION['usuario'])) {
				return true;
			}
			else {
				header('Location: index.php?r=login/loger');
			}
		}
	}
?>