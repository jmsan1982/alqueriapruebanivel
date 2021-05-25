<?php
    class ropaController 
    {
        //  actionRopaEscuelaCantera() carga la vista del formulario de selección de ropa para ESCUELA Y CANTERA
        public function actionRopa()
        {
            require "config.php";
            vistaSimple("layout_ropa_escuela_cantera");
            //vistaSimple("layout_ropa_escuela_cantera_desactivado");
        }
        
        //  actionRopaEscuelaCantera() carga la vista del formulario de selección de ropa para ESCUELA Y CANTERA
        public function actionEntregaRopa()
        {
            //  Incluimos modelos
            require "models/jugadores.php";
            require "models/jugadores_tallas.php";
            require "models/ropa_productos.php";
            require "models/ropa_entregas.php";
            require "models/ropa_productos_entregados.php";
            require "models/ropa_productos_cantidades_equipos.php";

            //  Recibimos la clave primaria de la instancia a cargar537541
            $id_jugador         =   filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);    
            $datos["jugador"]   =   jugadores::findByid_jugador($id_jugador);
                
            //  $ropa_productos nos dirá el máximo unidades permitidas para el equipo
            $ropa_productos     =   ropa_productos::findAllExtendedRopaProductosCantidadesEquipos(intval($datos["jugador"]["idequipo_alqueria"]),"20/21");
        
            //  Recuperamos las tallas pedidas por el jugador
            $jugadores_tallas   =   jugadores_tallas::findByIDJugadoresYTemporada($id_jugador,"20/21");
            $tallas             =   array();
            foreach($ropa_productos as $producto)
            {   $tallas[$producto['IDProducto']]="Talla no indicada";   }

            foreach($jugadores_tallas as $talla)
            {   $tallas[$talla['IDRopaProductos']]=$talla['Talla'];     }

            //  Recuperamos las entregas para saber cuantas unidades de cada producto se han dado
            $ropa_entregas          =   ropa_entregas::findByIDJugador($id_jugador);
            $uds_entregadas_ropa    =   array();
            //  Lo rellenamos con 0.
            foreach($ropa_productos as $producto)
            {   $uds_entregadas_ropa[$producto['IDProducto']]=0;}
            
            foreach($ropa_entregas as $ropa_entrega)
            {
                //  Sacamos las unidades entregadas
                $ropa_productos_entregados=ropa_productos_entregados::findByIDRopaEntrega($ropa_entrega['ID']);
                foreach($ropa_productos_entregados as $ropa_producto_entregado)
                {
                    $idproducto = $ropa_producto_entregado["IDProductoEntregado"];
                    $uds_entregadas_ropa[$idproducto]=intval($uds_entregadas_ropa[$idproducto])+intval($ropa_producto_entregado["CantidadEntregada"]);
                }
            }
           
            //  Array que dice cuantas uds se pueden dar como maximo de cada prenda
            $uds_maximas_ropa       =   array();
            foreach($ropa_productos as $producto)
            {   $uds_maximas_ropa[$producto['IDProducto']] = intval($producto['Cantidad'])-intval($uds_entregadas_ropa[$producto['IDProducto']]);   }
            
            $datos["uds_maximas_ropa"]      =  $uds_maximas_ropa;
            $datos["uds_entregadas_ropa"]   =  $uds_entregadas_ropa;
            $datos["tallas"]                =  $tallas;
              
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_escuela_cantera_inscripciones_20_21_entregaropa");
        }
        
        //  actionRellenarTallas() gestiona el formulario con el que los jugadores de ESCUELA y CANTERA especifican sus tallas
        public function actionRellenarTallas()
        {
            require "includes/Utils.php";

            //  Comprueba si hay que depurar y lo hace
            Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");

            
            //  Incluimos los modelos
            require "models/jugadores.php";
            require "models/jugadores_tallas.php";
            require "PHPMailer/envios_emails.php";
            require "lang/publico_".$_SESSION['idioma'].".php";     
            
             
            //  Recogemos valores 
            $IDJugadores                    =   filter_input(INPUT_POST, 'jugador_id', FILTER_SANITIZE_NUMBER_INT);
            $talla_camiseta_reversible      =   filter_input(INPUT_POST, 'talla_camiseta_reversible', FILTER_SANITIZE_STRING); 
            $talla_pantalon_reversible      =   filter_input(INPUT_POST, 'talla_pantalon_reversible', FILTER_SANITIZE_STRING); 
            $talla_camiseta_de_juego        =   filter_input(INPUT_POST, 'talla_camiseta_de_juego', FILTER_SANITIZE_STRING);
            $talla_camiseta_basica_algodon  =   filter_input(INPUT_POST, 'talla_camiseta_basica_algodon', FILTER_SANITIZE_STRING);
            $talla_sudadera_entreno_vbc     =   filter_input(INPUT_POST, 'talla_sudadera_entreno_vbc', FILTER_SANITIZE_STRING);
            $talla_pantalon_de_juego        =   filter_input(INPUT_POST, 'talla_pantalon_de_juego', FILTER_SANITIZE_STRING);
            $talla_chaqueta_chandal_paseo   =   filter_input(INPUT_POST, 'talla_chaqueta_chandal_paseo', FILTER_SANITIZE_STRING);
$talla_chaqueta_polar             =   filter_input(INPUT_POST, 'talla_chaqueta_polar', FILTER_SANITIZE_STRING);
$talla_chaqueta_polar_obligatoria =   filter_input(INPUT_POST, 'talla_chaqueta_polar_obligatoria', FILTER_SANITIZE_STRING);
            $talla_polo_manga_corta         =   filter_input(INPUT_POST, 'talla_polo_manga_corta', FILTER_SANITIZE_STRING);

            
            //  Vamos a comprobar aquí en el servidor si hemos recibido todas las variables obligatorias
            $message="";
            if($talla_camiseta_reversible==="")     {   $message.="Talla de la camiseta reversible, ";}
            if($talla_pantalon_reversible==="")     {   $message.="Talla del pantalón reversible, ";}
            if($talla_camiseta_de_juego==="")       {   $message.="Talla de la camiseta de juego, ";}
            if($talla_camiseta_basica_algodon==="") {   $message.="Talla de la camiseta básica de algodón, ";}
            if($talla_sudadera_entreno_vbc==="")    {   $message.="Talla de la sudadera de entreno, ";}
            if($talla_pantalon_de_juego==="")       {   $message.="Talla del pantalón de juego, ";}
            if($talla_chaqueta_chandal_paseo==="")  {   $message.="Talla de la chaqueta del chandal de paseo, ";}
            if($talla_chaqueta_polar_obligatoria==="si" && $talla_chaqueta_polar==="")          {   $message.="Talla de la chaqueta polar, ";}
            if($talla_polo_manga_corta==="")        {   $message.="Talla del polo de manga corta, ";}
            if($message!=="")
            {
                $message=substr($message,0,-2);
                echo json_encode(array(
                    "response"          =>  "error",
                    "message"           =>  "Por favor, complete los siguientes campos obligatorios: ".$message
                ));
                die;
            }
                

            //  Si todo está bien, hacemos las inserciones. Ponemos a mano para cada prenda el $IDRopaProductos
            //  jugadores_tallas::insert($IDJugadores, $IDRopaProductos, $valor, "20/21");
            jugadores_tallas::insert($IDJugadores, 1, $talla_camiseta_reversible, "20/21");
            jugadores_tallas::insert($IDJugadores, 2, $talla_pantalon_reversible, "20/21");
            jugadores_tallas::insert($IDJugadores, 3, $talla_camiseta_de_juego, "20/21");           //  1 equipacion
            jugadores_tallas::insert($IDJugadores, 10, $talla_camiseta_de_juego, "20/21");          //  2 equipacion
            jugadores_tallas::insert($IDJugadores, 4, $talla_camiseta_basica_algodon, "20/21");
            jugadores_tallas::insert($IDJugadores, 5, $talla_sudadera_entreno_vbc, "20/21");        
            jugadores_tallas::insert($IDJugadores, 6, $talla_pantalon_de_juego, "20/21");           //  1 equipacion
            jugadores_tallas::insert($IDJugadores, 11, $talla_pantalon_de_juego, "20/21");          //  2 equipacion
            jugadores_tallas::insert($IDJugadores, 7, $talla_chaqueta_chandal_paseo, "20/21");
            
if($talla_chaqueta_polar_obligatoria==="si")
{   jugadores_tallas::insert($IDJugadores, 8, $talla_chaqueta_polar, "20/21");}
else
{   jugadores_tallas::insert($IDJugadores, 8, "NO ENTREGAR. ENTREGADA EN 19/20", "20/21");}

            jugadores_tallas::insert($IDJugadores, 9, $talla_polo_manga_corta, "20/21");
            jugadores_tallas::insert($IDJugadores, 12, "ÚNICA", "20/21");
            
            
            echo json_encode(array(
                "response"  =>  "success",
                "message"   =>  "El formulario se ha enviado con éxito. En breve recibirá un correo electrónico de confirmación. ¡Muchas gracias!"
            ));

            
            
            

            /***  envio del email  **/
            $jugador=jugadores::findByid_jugador($IDJugadores);
           

            if ($jugador["categoria"]=="CANTERA") {
                $cadenarecogida=" día 24 de Agosto.";
            }
            else{ $cadenarecogida=" día 30 de Agosto.";}
            


            $contenido_email="<p>Estimados padres, han realizado correctamente la solicitud de tallas.</p>
                <p>En breve nos pondremos en contacto con ustedes para informarles de cómo realizar la recogida de la ropa que se realizará a partir del ". $cadenarecogida . "</p>
                
                <p>Información sobre la solicitud de ropa realizada para:  
                <b>".$jugador["nombre"]." ".$jugador["apellidos"]."</b> </p>

                <p>Categoria:  
                <b>".$jugador["categoria"]."</b> Equipo <b>".$jugador["nombre_equipo_nueva_temporada"]."</b> </p>";

            $contenido_email.= "Talla de la camiseta reversible: " . $talla_camiseta_reversible .  
                "<br>Talla del pantalón reversible: " . $talla_pantalon_reversible .
                "<br>Talla de la camiseta de juego: " . $talla_camiseta_de_juego .
                "<br>Talla de la camiseta básica de algodón: " . $talla_camiseta_basica_algodon .
                "<br>Talla de la sudadera de entreno: " . $talla_sudadera_entreno_vbc . 
                "<br>Talla del pantalón de juego: " . $talla_pantalon_de_juego . 
                "<br>Talla de la chaqueta del chandal de paseo: " . $talla_chaqueta_chandal_paseo;
            
if($talla_chaqueta_polar_obligatoria==="si")
{   $contenido_email.="<br>Talla de la chaqueta polar: ".$talla_chaqueta_polar; }

            $contenido_email.= "<br>Talla del polo de manga corta: " . $talla_polo_manga_corta .
               "<br><br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">DUDAS O INCIDENCIAS</h3>
                <p>Ante cualquier duda o incidencia, puede ponerse en contacto vía email con <a href='mailto:recepcion@alqueriadelbasket.com' target='_blank'>recepcion@alqueriadelbasket.com</a> o al teléfono 961215543. Muchas gracias.</p>";


                //  Comprobamos si hay que enviar email a padre o a madre
                if(!empty($jugador["email_padre"]))
                {   $email_padre=$jugador["email_padre"];   $nombre_padre=$jugador["nombre_padre"]." ".$jugador["apellidos_padre"];}
                else
                {   $email_padre="";                        $nombre_padre="";  }
                
                if(!empty($jugador["email_madre"]))
                {   $email_madre=$jugador["email_madre"];   $nombre_madre=$jugador["nombre_madre"]." ".$jugador["apellidos_madre"];}
                else
                {   $email_madre="";                        $nombre_madre="";  }
                
                try{
                    $email_enviado = envios_emails::enviar_email_circular_escuela_cantera_2020(
                        "Solicitud de ropa en L'Alqueria del Basket - Temporada 20/21 - ".$jugador['email'],  
                        $contenido_email,   
                        $jugador['email'],  $jugador['nombre']." ".$jugador['apellidos'],
                        $email_madre,       $nombre_madre,
                        $email_padre,       $nombre_padre
                    );


                    $email_enviado = envios_emails::enviar_email_circular_escuela_cantera_2020(
                        "Solicitud de ropa en L'Alqueria del Basket - Temporada 20/21 - ".$jugador['email'],  
                        $contenido_email,   
                        "tienda@valenciabasket.com",  $jugador['nombre']." ".$jugador['apellidos'],
                        "",       "",
                        "",       ""
                    );
                    
                    if($email_enviado)
                    {
                       // $enviados_OK.=$jugador["email"].";Se ha enviado.\n";$num_enviados_OK++;
                        //$log.=$jugador["email"].";Se ha enviado.\n";
                       // error_log($jugador["email"]." - Se ha enviado email solicitud de ropa.");

                        
                    }
                    else 
                    {
                       // $errores.=$jugador["email"].";ERROR.\n";$num_errores++;
                        //$log.=$jugador["email"].";ERROR.\n";
                        error_log($jugador["email"]." - ERROR envio email solicitud de ropa.");
                    }
                }
                catch (Exception $ex)
                {
                   // $errores.=$jugador["email"].";ERROR CON EXCEPCION: ".print_r($ex,1).".\n";$num_errores++;
                    //$log.=$jugador["email"].";ERROR CON EXCEPCION.\n";
                    //error_log($jugador["email"]." - ERROR CON EXCEPCION".print_r($ex,1));
                }

            die;
        }
        
        /** actionCargarTallasByIDJugador() carga la tabla de tallas de un jugador por su ID 
            y carga las entregas
         *          */
        public function actionCargarTallasYEntregasDeRopaByIDJugador()
        {
            require "includes/Utils.php";

            //  Comprueba si hay que depurar y lo hace
            Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");

            //  Incluimos los modelos
            require "models/jugadores.php";
            require "models/jugadores_tallas.php";
            require "models/ropa_productos.php";
            require "models/ropa_entregas.php";
            require "models/ropa_productos_entregados.php";
            require "models/ropa_productos_cantidades_equipos.php";
            
            //  Recibimos la clave primaria de la instancia a cargar
            $IDJugadores        =   filter_input(INPUT_POST, 'jugadores_id',FILTER_SANITIZE_NUMBER_INT);    
            $jugador            =   jugadores::findByid_jugador($IDJugadores);
            $ropa_entregas      =   ropa_entregas::findByIDJugador($IDJugadores);
            $ropa_productos     =   ropa_productos::findAllExtendedRopaProductosCantidadesEquipos(intval($jugador["idequipo_alqueria"]),"20/21");
            $observaciones      =   "";

            
            //  Rellenamos el <thead> con 1) Columna productos 2) Lo que le corresponde al equipo 3) Las entregas 
            $tabla_entregas="<table class='table'>"
            . "<thead style='color:#fff;background-color:#212529;border-color:#32383e;'>"
            . "     <th>Producto:</th>"
            . "     <th>Talla:</th>"
            . "     <th>".$jugador["nombre_equipo_nueva_temporada"]."</th>";


            foreach($ropa_entregas as $entrega)
            {
                $datetime_fecha=new DateTime($entrega["Fecha"]);
                $tabla_entregas.="<th style='background-color:white;color:black;'>Entrega: ".$datetime_fecha->format("d/m/Y")."<br><img src='".$entrega["Firma"]."' style='width:100%;max-width:120px;'></th>";
                
                if(!$entrega['Observaciones']!==""){$observaciones.="Observaciones ".$datetime_fecha->format("d/m/Y").": <br>".$entrega['Observaciones']."<hr><br>";}
            }
            $tabla_entregas.="<th>Total entregado:</th></thead><tbody>";
            
            foreach($ropa_productos as $ropa_producto)
            {
                //  COLUMNA 1. Nombre del producto 
                $tr_auxiliar="<tr><td>".$ropa_producto["Nombre"]."</td>";
                
                //  COLUMNA 2. Talla
                $jugadores_tallas_aux=jugadores_tallas::findByIDJugadoresYTemporadaYIDRopaProductos($IDJugadores,"20/21",$ropa_producto['IDProducto']);
                if(!empty($jugadores_tallas_aux))
                {   
                    //  Excepcion para chaqueta polar. No se entrega a inscritos 2019
                    if($jugadores_tallas_aux['Talla']==="NO ENTREGAR. ENTREGADA EN 19/20")
                    {
                        $tr_auxiliar.="<td><span style='color:red;'>".$jugadores_tallas_aux['Talla']."</span></td>"; 
                    }
                    else
                    {
                        $tr_auxiliar.="<td>".$jugadores_tallas_aux['Talla']."</td>"; 
                    }
                }
                else
                {   $tr_auxiliar.="<td>-</td>"; }
                
                //  COLUMNA 3. Lo que le corresponde al equipo   
                $tr_auxiliar.="<td>".$ropa_producto["Cantidad"]."</td>";
                $total_auxiliar=0;
                
                //  COLUMNAS M ... N (con las entregas)
                foreach($ropa_entregas as $entrega)
                {
                    $productoentregado=ropa_productos_entregados::findByIDRopaEntregaYIDProductoEntregado($entrega['ID'],$ropa_producto["IDProducto"]);
                    if(!empty($productoentregado))
                    {   
                        $tr_auxiliar.="<td>".$productoentregado["CantidadEntregada"]."</td>";
                        $total_auxiliar=$total_auxiliar+intval($productoentregado["CantidadEntregada"]);}
                    else
                    {   $tr_auxiliar.="<td>0</td>";   }
                }
                
                $tr_auxiliar.="<td>".$total_auxiliar."</td></tr>";
                $tabla_entregas.=$tr_auxiliar;
            }
            
            
            echo json_encode(
                array(
                    "response"          => "success",
                    "contador_entregas" => count($ropa_entregas),
                    "tabla_entregas"    => $tabla_entregas,
                    "observaciones"     =>  $observaciones,
                    "message"           => "Se han cargado las tallas del jugador/a"));
                die;
        }
        
        public function actionCargarDatosEntregasAnteriores()
        {
            require "includes/Utils.php";

            //  Comprueba si hay que depurar y lo hace
            Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"false");

            //  Incluimos los modelos
            require "models/jugadores.php";
            require "models/jugadores_tallas.php";
            require "models/ropa_productos.php";
            require "models/ropa_entregas.php";
            require "models/ropa_productos_entregados.php";
            require "models/ropa_productos_cantidades_equipos.php";
            
            //  Recibimos la clave primaria de la instancia a cargar
            $IDJugadores        =   filter_input(INPUT_POST, 'jugadores_id', FILTER_SANITIZE_NUMBER_INT);    
            $jugador            =   jugadores::findByid_jugador($IDJugadores);
            
            //  $ropa_productos nos dirá el máximo unidades permitidas para el equipo
            $ropa_productos     =   ropa_productos::findAllExtendedRopaProductosCantidadesEquipos(intval($jugador["idequipo_alqueria"]),"20/21");
        
            //  Recuperamos las tallas pedidas por el jugador
            $jugadores_tallas   =   jugadores_tallas::findByIDJugadoresYTemporada($IDJugadores,"20/21");
            $tallas             =   array();
            foreach($ropa_productos as $producto)
            {   $tallas[$producto['ID']]="-";}
            foreach($jugadores_tallas as $talla)
            {   $tallas[$talla['IDRopaProductos']]=$talla['Talla'];    }
            
            //  Recuperamos las entregas para saber cuantas unidades de cada producto se han dado
            $ropa_entregas          =   ropa_entregas::findByIDJugador($IDJugadores);
            $uds_entregadas_ropa    =   array();
            //  Lo rellenamos con 0.
            foreach($ropa_productos as $producto)
            {   $uds_entregadas_ropa[$producto['IDProducto']]=0;}
            
            foreach($ropa_entregas as $ropa_entrega)
            {
                //  Sacamos las unidades entregadas
                $ropa_productos_entregados=ropa_productos_entregados::findByIDRopaEntrega($ropa_entrega['ID']);
                foreach($ropa_productos_entregados as $ropa_producto_entregado)
                {
                    $idproducto = $ropa_producto_entregado["IDProductoEntregado"];
                    $uds_entregadas_ropa[$idproducto]=intval($uds_entregadas_ropa[$idproducto])+intval($ropa_producto_entregado["CantidadEntregada"]);
                }
            }
           
            //  Array que dice cuantas uds se pueden dar como maximo de cada prenda
            $uds_maximas_ropa       =   array();
            foreach($ropa_productos as $producto)
            {
                $uds_maximas_ropa[$producto['IDProducto']]= intval($producto['Cantidad'])-intval($uds_entregadas_ropa[$producto['IDProducto']]);
            }

            
            
            
            echo json_encode(
                array(
                    "response"              =>  "success",
                    "message"               =>  "Se ha cargado la información",
                    "id_jugador"            =>  $jugador["id_jugador"],
                    "nombre_jugador"        =>  $jugador['nombre']." ".$jugador['apellidos'],
                    "contador_entregas"     =>  count($ropa_entregas),
                    "uds_maximas_ropa"      =>  $uds_maximas_ropa,
                    "uds_entregadas_ropa"   =>  $uds_entregadas_ropa,
                    "tallas"                =>  $tallas,
                ));
            die;
        }
        
        /** actionNuevaEntregaRopa() gestiona el formulario de una nueva entrega de ropa. Recoge una firma. */
        public function actionNuevaEntregaRopa()
        {
            require "includes/Utils.php";

            //  Comprueba si hay que depurar y lo hace
            Utils::depurar(__FILE__.".".__FUNCTION__.".".__LINE__,"true");
            
            require "models/ropa_entregas.php";
            require "models/ropa_productos_entregados.php";
            require "models/jugadores_tallas.php";
            require "models/jugadores.php";
            require "models/ropa_productos.php";
            require "PHPMailer/envios_emails.php";

            /****************************************************************************
             *  Recibimos los datos 
             ***************************************************************************/
            $cantidades_productos       =   array();
            $jugador_id                 =   filter_input(INPUT_POST, 'jugador_id',  FILTER_SANITIZE_NUMBER_INT);
            $cantidades_productos[1]    =   filter_input(INPUT_POST, 'cantidad_producto_01',  FILTER_SANITIZE_NUMBER_INT);      
            $cantidades_productos[2]    =   filter_input(INPUT_POST, 'cantidad_producto_02',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[3]    =   filter_input(INPUT_POST, 'cantidad_producto_03',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[4]    =   filter_input(INPUT_POST, 'cantidad_producto_04',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[5]    =   filter_input(INPUT_POST, 'cantidad_producto_05',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[6]    =   filter_input(INPUT_POST, 'cantidad_producto_06',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[7]    =   filter_input(INPUT_POST, 'cantidad_producto_07',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[8]    =   filter_input(INPUT_POST, 'cantidad_producto_08',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[9]    =   filter_input(INPUT_POST, 'cantidad_producto_09',  FILTER_SANITIZE_NUMBER_INT);  
            $cantidades_productos[10]   =   filter_input(INPUT_POST, 'cantidad_producto_10',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[11]   =   filter_input(INPUT_POST, 'cantidad_producto_11',  FILTER_SANITIZE_NUMBER_INT); 
            $cantidades_productos[12]   =   filter_input(INPUT_POST, 'cantidad_producto_12',  FILTER_SANITIZE_NUMBER_INT);        
            $fecha                      =   date("Y-m-d H:i:s");
            $firma                      =   $_POST["firma"];
            $observaciones              =   $_POST["observaciones"];
            $Entregada                  =   1;

            
            /********************************************
            * COMPROBACIÓN. Si no hay jugador -> ERROR 
            ********************************************/
            if(!empty($jugador_id)){}
            else
            {
                echo json_encode(
                    array(
                    "response" => "error",
                    "message"   => "Hubo un error al cargar el usuario"));
                die;
            }
            
            
            /*  INSERTAMOS EN ropas_entregas */
            $ropa_entregas      =   ropa_entregas::insert($jugador_id, $fecha, $Entregada, $firma, $observaciones);
            
            $cadena_info_ropa="";
            /*  RECUPERAMOS las tallas pedidas por el jugador y las recorremos parA INSERTAR cada ROPA_PRODUCTOS_ENTREGADOS */
            $jugadores_tallas   =   jugadores_tallas::findByIDJugadoresYTemporada($jugador_id, "20/21");
            foreach($jugadores_tallas as $talla)
            {   
//                error_log(__FILE__.__FUNCTION__.__LINE__);
//                error_log("\$talla[IDRopaProductos] vale: ".$talla["IDRopaProductos"]);
//                error_log($cantidades_productos[$talla["IDRopaProductos"]]);

                //cadena para el envio del email con la info de la ropa entregada
                $nombre_producto=ropa_productos::findByID($talla["IDRopaProductos"]);
                $cadena_info_ropa.= $nombre_producto["Nombre"] ." " . $talla["Talla"] . " Cantidad: " .$cantidades_productos[$talla["IDRopaProductos"]]."<br>";
                
                
                //  Insertamos en "ropa_productos_entregados" 
                ropa_productos_entregados::insert(
                    $ropa_entregas["ID"], 
                    $talla["IDRopaProductos"], 
                    $talla["Talla"], 
                    $cantidades_productos[$talla["IDRopaProductos"]]);
            }
            
            echo json_encode(
                array(
                "response" => "success",
                "message"   => "La entrega se ha guardado en el sistema"));

            

            /***     envio del email         **/
            $jugador=jugadores::findByid_jugador($jugador_id);
           

            $contenido_email="<p>Buenos días, </p>
  
                <p>Información sobre la entrega de ropa realizada el " . $fecha .  " para:  
                <b>".$jugador["nombre"]." ".$jugador["apellidos"]."</b> </p>

                <p>Categoria:  
                <b>".$jugador["categoria"]."</b> Equipo <b>".$jugador["nombre_equipo_nueva_temporada"]."</b> </p>";

            $contenido_email.= "<p>" .$cadena_info_ropa . "</p>".
                
                "<br> Observaciones: " .$observaciones .
                "<br><br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">DUDAS O INCIDENCIAS</h3>
                <p>Ante cualquier duda o incidencia, puede ponerse en contacto vía email con <a href='mailto:recepcion@alqueriadelbasket.com' target='_blank'>recepcion@alqueriadelbasket.com</a> o al teléfono 961215543. Muchas gracias.</p>";


                //  Comprobamos si hay que enviar email a padre o a madre
                if(!empty($jugador["email_padre"]))
                {   $email_padre=$jugador["email_padre"];   $nombre_padre=$jugador["nombre_padre"]." ".$jugador["apellidos_padre"];}
                else
                {   $email_padre="";                        $nombre_padre="";  }
                
                if(!empty($jugador["email_madre"]))
                {   $email_madre=$jugador["email_madre"];   $nombre_madre=$jugador["nombre_madre"]." ".$jugador["apellidos_madre"];}
                else
                {   $email_madre="";                        $nombre_madre="";  }
                
                try{
                    $email_enviado = envios_emails::enviar_email_circular_escuela_cantera_2020(
                        "Entrega de ropa en L'Alqueria del Basket - Temporada 20/21 - ".$jugador['email'],  
                        $contenido_email,   
                        $jugador['email'],  $jugador['nombre']." ".$jugador['apellidos'],
                        $email_madre,       $nombre_madre,
                        $email_padre,       $nombre_padre
                    );

                    
                    if($email_enviado)
                    {
                       // $enviados_OK.=$jugador["email"].";Se ha enviado.\n";$num_enviados_OK++;
                        //$log.=$jugador["email"].";Se ha enviado.\n";
                       // error_log($jugador["email"]." - Se ha enviado email solicitud de ropa.");

                        
                    }
                    else 
                    {
                       // $errores.=$jugador["email"].";ERROR.\n";$num_errores++;
                        //$log.=$jugador["email"].";ERROR.\n";
                        error_log($jugador["email"]." - ERROR envio email entrega de ropa desde back.");
                    }
                }
                catch (Exception $ex)
                {
                   // $errores.=$jugador["email"].";ERROR CON EXCEPCION: ".print_r($ex,1).".\n";$num_errores++;
                    //$log.=$jugador["email"].";ERROR CON EXCEPCION.\n";
                    //error_log($jugador["email"]." - ERROR CON EXCEPCION".print_r($ex,1));
                }





            die;
        }
        
        
        /** genera_html_tabla_prendas_jugador() genera el HTML de la tabla "jugadores_tallas" + "ropa_productos" */
        private static function genera_html_tabla_prendas_jugador($jugadores_tallas)
        {
            $contenido_html="
                <thead class='thead-dark' style='color:#fff;background-color:#212529;border-color:#32383e;'>
                    <th>Temporada</th>
                    <th>Prenda</th>
                    <th>Talla</th>
                </thead>
                <tbody>";
			
            if(count($jugadores_tallas)>0)
            {
                //  Recorro las instancias
                foreach($jugadores_tallas as $instancia)
                {
                    $contenido_html.="<tr><td>".$instancia["Temporada"]."</td>";
                    $contenido_html.="<td>".$instancia["ropa_productos_nombre"]."</td>";
                    $contenido_html.="<td>".strtoupper($instancia['Talla'])."</td></tr>";
                }
            }
            else
            {
                $contenido_html.="<tr><td colspan='3'>No se ha encontrado información</td></tr>";
            }
            
            //  Devolvemos resultado
            return $contenido_html."</tbody>";
        }

        /* Circular para enviar a los padres de cantera y escuela para que rellenen las tallas   */
        public static function actionCircularPadres2021SolicitudDeTallas()
        {
            //  Evita el limite temporal
            set_time_limit(0);
            
            require "includes/Utils.php";
            require "models/jugadores.php";
           
            require "PHPMailer/envios_emails.php";
             // $jugadores=jugadores::findJugadoresRenovadosPorCategoria("CANTERA");  // esta hecho ya


            $jugadores=jugadores::findPepe(); //hacer la prueba de envio y despues lo comentas
          
            //$jugadores=jugadores::findJugadoresRenovadosPorCategoria("ESCUELA");   //descomentar para hacer el envio de escuela

            error_log(__FILE__.__FUNCTION__.__LINE__);
            error_log("====================================");
            error_log("==== CIRCULAR 2020-2021 TALLAS ESCUELA ====");
            error_log(count($jugadores));
           // error_log(print_r($jugadores,1));
           // error_log("==== Hacemos die ====");
           // die;
            
            

            $enviados_OK    =   "";
            $errores        =   "";
            $log            =   "";
            $num_enviados_OK=   0;
            $num_errores    =   0;
            
            $prelistado="";

            error_log(__FILE__.__FUNCTION__.__LINE__);
            foreach($jugadores as $jugador)
            {
//                error_log("=================");
                  error_log("==== JUGADOR: ".$jugador["id_jugador"]);
//                error_log(print_r($jugador,1));
                
                if($jugador["categoria"]=="CANTERA")
                {
                    $sms="Solicita tu ropa para la temporada 20-21 de L'Alqueria del Basket. Inicio 17/08 al 19/08. Consulta los detalles en el email y guarda la clave: ".$jugador["codigo_verificacion"];
                    $parrafo_fechas_acceso="<p><b>Fechas de acceso</b>: El formulario solo se puede rellenar entre el 17 y 19 de agosto. Quienes no lo rellenen en esas fechas serán contactados posteriormente por los coordinadores.</p>";
                }
                else
                {
                    $sms="Solicita tu ropa para la temporada 20-21 de L'Alqueria del Basket. Inicio 24/08 al 26/08. Consulta los detalles en el email y guarda la clave: ".$jugador["codigo_verificacion"];
                    $parrafo_fechas_acceso="<p><b>Fechas de acceso</b>: El formulario solo se puede rellenar entre el 24 y 26 de agosto. Quienes no lo rellenen en esas fechas serán contactados posteriormente por los coordinadores.</p>";
                }
                
                
                if(!empty($jugador["telefono_padre"]) && (strlen($jugador["telefono_padre"])==9))
                {
                    $numero = (string)$jugador["telefono_padre"]; // type casting int to string
                    if($numero[0]==="6" || $numero[0]==="7") 
                    {
                        $resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_padre"]);
                        error_log($resultado);
                    }
                }
                
                if(!empty($jugador["telefono_madre"]) && (strlen($jugador["telefono_madre"])==9))
                {
                    $numero = (string)$jugador["telefono_madre"]; // type casting int to string
                    if($numero[0]==="6" || $numero[0]==="7") 
                    {
                        $resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_madre"]);
                        error_log($resultado);
                    }
                }
                
                if(!empty($jugador["telefono_jugador"]) && (strlen($jugador["telefono_jugador"])==9))
                {
                    $numero = (string)$jugador["telefono_jugador"]; // type casting int to string
                    if($numero[0]==="6" || $numero[0]==="7") 
                    {
                        $resultado=self::enviaSMSCircularPadres2021Cantera($sms,$jugador["telefono_jugador"]);
                        error_log($resultado);
                    }
                }
                
                
                $contenido_email="<p>Estimados padres,</p>
                <p>Para una correcta gestión en la entrega de la ropa para la temporada 2020/2021, les solicitamos que accedan a nuestra web para completar el formulario de solicitud de ropa y cumplimentar las tallas de:  
                 <b>".$jugador["nombre"]." ".$jugador["apellidos"]."</b> </p>";


                $contenido_email.="<br><br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">INSTRUCCIONES PARA REALIZAR LA SOLICITUD DE ROPA:</h3>
                <p><b>Entrar al formulario online:</b>
                <br><a target='_blank' href='https://servicios.alqueriadelbasket.com/?r=ropa/Ropa'>https://servicios.alqueriadelbasket.com/?r=ropa/Ropa</a></p>
                ".$parrafo_fechas_acceso."
                <p>Debe introducir el código de verificación del jugador: </p>
                <h2><b>".$jugador["codigo_verificacion"]."</b></h2>
                <p>Debe introducir el DNI del jugador sin espacios ni guiones (Ejemplo: 12345678Z). Rellene con cero (0) a la izquierda para que tenga una longitud mínima de 9 carácteres.</p>
                <p>En caso de que el jugador no tuviera DNI la temporada pasada, debe introducir el DNI de la madre o del padre.</p>
                <p>Es decir, utilice o bien el DNI del jugador/a o bien el DNI del padre/madre (solamente uno los dos).</p>
                <p>Seleccione para cada prenda la talla correspondiente según las indicaciones y tablas del formulario.<p>

                <br>
                
                <br><h3 style=\"color: #eb7c00; border-bottom: #eb7c00 2px solid;\">DUDAS O INCIDENCIAS</h3>
                <p>Ante cualquier duda o incidencia, puede ponerse en contacto vía email con <a href='mailto:recepcion@alqueriadelbasket.com' target='_blank'>recepcion@alqueriadelbasket.com</a> o al teléfono 961215543. Muchas gracias.</p>";

                //  Comprobamos si hay que enviar email a padre o a madre
                if(!empty($jugador["email_padre"]))
                {   $email_padre=$jugador["email_padre"];   $nombre_padre=$jugador["nombre_padre"]." ".$jugador["apellidos_padre"];}
                else
                {   $email_padre="";                        $nombre_padre="";  }
                
                if(!empty($jugador["email_madre"]))
                {   $email_madre=$jugador["email_madre"];   $nombre_madre=$jugador["nombre_madre"]." ".$jugador["apellidos_madre"];}
                else
                {   $email_madre="";                        $nombre_madre="";  }
                
                try{

                    $email_enviado = envios_emails::enviar_email_circular_escuela_cantera_2020(
                        "Instrucciones de solicitud de ropa en L'Alqueria del Basket - Temporada 2020/2021 - ".$jugador['email'],  
                        $contenido_email,   
                        $jugador['email'],  $jugador['nombre']." ".$jugador['apellidos'],
                        $email_madre,       $nombre_madre,
                        $email_padre,       $nombre_padre
                    );
                    
                    if($email_enviado)
                    {
                        $enviados_OK.=$jugador["email"].";Se ha enviado.\n";$num_enviados_OK++;
                        //$log.=$jugador["email"].";Se ha enviado.\n";
                        error_log($jugador["email"]." - Se ha enviado.");
                    }
                    else 
                    {
                        $errores.=$jugador["email"].";ERROR.\n";$num_errores++;
                        //$log.=$jugador["email"].";ERROR.\n";
                        error_log($jugador["email"]." - ERROR.");
                    }
                }
                catch (Exception $ex)
                {
                    $errores.=$jugador["email"].";ERROR CON EXCEPCION: ".print_r($ex,1).".\n";$num_errores++;
                    //$log.=$jugador["email"].";ERROR CON EXCEPCION.\n";
                    //error_log($jugador["email"]." - ERROR CON EXCEPCION".print_r($ex,1));
                }
            }
            
            error_log($enviados_OK);
            error_log($errores);
            error_log("num_enviados_OK vale ".$num_enviados_OK);
            error_log("num_errores vale ".$num_errores);
        }

        private static function enviaSMSCircularPadres2021Cantera($contenido_sms,$numerotelefono,$prefijopais=34)
        {
            $auth_basic = base64_encode("jlt@tessq.com:Cull02cba");
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.labsmobile.com/json/send",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => '{"message":"'.$contenido_sms.'", "tpoa":"Alqueria","recipient":[{"msisdn":"'.$prefijopais.$numerotelefono.'"}]}',
              CURLOPT_HTTPHEADER => array(
                "Authorization: Basic ".$auth_basic,
                "Cache-Control: no-cache",
                "Content-Type: application/json"
              ),
            ));
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if($err){
                $resultado="cURL Error #:" . $err." - ".$numerotelefono.": ".$contenido_sms;
            }
            else {
                $resultado="OK. ".$numerotelefono.": ".$contenido_sms;
            }
            
            return $resultado;
        }
    }
?>