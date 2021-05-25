<?php
    class licenciasController 
    {
        //  de momento no se van a generar licencias por web
        public function actionLicencias()
        {
            require "config.php";
            //vistaSimple("layout_ropa_escuela_cantera");
            //vistaSimple("layout_ropa_escuela_cantera_desactivado");
        }
        

        
        /** actionCargarLicencias() carga la tabla con los datos de la slicencias de cada jugador   */               
        public function actionCargarLicencias()
        {
            require "includes/Utils.php";

            //  Comprueba si hay que depurar y lo hace
            Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");

            //  Incluimos los modelos
            require "models/licencias.php";
            
            
            //  Recibimos la clave primaria de la instancia a cargar
            $IDJugadores        =   filter_input(INPUT_POST, 'jugadores_id',FILTER_SANITIZE_NUMBER_INT);    
            $licencias          =   licencias::findlicenciasByidjugador($IDJugadores);
            
            $observaciones="";
            
            //  Rellenamos el <thead> con 1) Columna productos 2) Lo que le corresponde al equipo 3) Las entregas 
            $tabla_entregas="<table class='table'>"
            . "<thead style='color:#fff;background-color:#212529;border-color:#32383e;'>"
            . "     <th>Temporada:</th>"
            . "     <th>Equipo:</th>"
            . "     <th>Nombre Fed:</th>"
            . "     <th>Categoria</th></thead><tbody>";

            
            foreach($licencias as $licencia)
            {
                
                //  COLUMNA 1. temporada
                $tr_auxiliar="<tr><td>".$licencia["temporada"]."</td>";
                $tr_auxiliar.="<td>".$licencia['nombre_equipo_cas']."</td>"; 
                $tr_auxiliar.="<td>".$licencia['nombre_fed']."</td>"; 
                $tr_auxiliar.="<td>".$licencia["categoria_fed"]."</td></tr>";


               
                $tabla_entregas.=$tr_auxiliar;
            }
            
            
            echo json_encode(
                array(
                    "response"          => "success",
                    "contador_entregas" => 1,
                    "tabla_entregas"    => $tabla_entregas,
                    "observaciones"     =>  $observaciones,
                    "message"           => "Se han cargado las licencias del jugador/a"));
                die;
        }
        
       
        
      
        
        
       

        

        
    }
?>