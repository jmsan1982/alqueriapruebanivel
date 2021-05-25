<?php
class encuestasController
{
    /** actionBuscarParticipante() comprobar mediante el email si un participante ya está registrado en la encuesta y efectivamente ha participado */
    public function actionBuscarParticipante()
    {
        //  Incluimos los modelos
        require "models/encuestas_participantes.php";
        require "models/encuestas_respuestas.php";
        
        //  Recibimos los datos
        $email          =   strtolower(filter_input(INPUT_POST, 'email_usuario',    FILTER_SANITIZE_STRING)); 
        $id_encuesta    =              filter_input(INPUT_POST, 'idencuesta',       FILTER_SANITIZE_NUMBER_INT); 
        $nombre         =   strtoupper(filter_input(INPUT_POST, 'nombre',           FILTER_SANITIZE_STRING)); 
        $nacionalidad   =   strtoupper(filter_input(INPUT_POST, 'nacionalidad',     FILTER_SANITIZE_STRING));
        $genero         =   strtoupper(filter_input(INPUT_POST, 'genero',           FILTER_SANITIZE_STRING));
        $edad           =              filter_input(INPUT_POST, 'edad',             FILTER_SANITIZE_NUMBER_INT);
        $codigopostal   =              filter_input(INPUT_POST, 'cp',               FILTER_SANITIZE_NUMBER_INT);

        //  Recuperamos el participante   
        $participante   =   encuestas_participantes::findByEmailYIdEncuesta($email, $id_encuesta);

        if(!empty($participante))
        {
            //  Existe el participante pero no sabemos si hay respuestas. Lo comprobamos.
            $encuestas_respuestas   =   encuestas_respuestas::findByIdParticipanteYIdEncuesta($participante['id'],$id_encuesta);

            if(count($encuestas_respuestas)>0)
            {
                $mensaje = "Ya ha rellenado la encuesta anteriormente con el email ".$email.". Muchas gracias por ayudarnos a mejorar.";
                   
                echo json_encode(
                    array(
                    "response"          => "error",
                    "instancia"         => $participante,
                    "message"           => $mensaje));
                die;
            }
            else
            {
                echo json_encode(
                    array(
                    "response"  => "success",
                    "instancia" => $participante,
                    "message"   => "Puede rellenar la encuesta"));
                die;
            } 
        }
        else
        {
            //  Insertamos el registro del participante
            $participante  =  encuestas_participantes::insert(
                $email,     $id_encuesta,       date("Y-m-d"),  1, 
                $nombre,    $edad,              $genero,        $nacionalidad,  $codigopostal);

            echo json_encode(
                    array(
                    "response"  => "success",
                    "instancia" => $participante,
                    "message"   => "Puede rellenar la encuesta"));
                die;
        } 
    }
        
    /* actionRellenarEncuesta() rellena una encuesta  */
    public function actionRellenarEncuesta()
    {
       // error_log(__FILE__.__LINE__);
       // error_log(print_r($_POST,1));
        
        require "models/encuestas_participantes.php";
        require "models/encuestas_preguntas.php";
        require "models/encuestas_respuestas.php";
          
        //  Recuperamos los valores
        $id_encuesta        =   filter_input(INPUT_POST, 'id_encuesta',     FILTER_SANITIZE_NUMBER_INT); 
      //  error_log("Encuasta: " .$id_encuesta );
        $id_participante    =   filter_input(INPUT_POST, 'id_participante', FILTER_SANITIZE_STRING); 
        if($id_participante==="anonimo")
        {
            //  Insertaremos un anonimo con codigo
            $ultimo_participante=encuestas_participantes::findLast();
            
            //  Insertamos el registro del participante
            $participante  =  encuestas_participantes::insert_anonimo(
                "anonimo-".(intval($ultimo_participante['id'])+1),     $id_encuesta,       date("Y-m-d"),  1);


            $id_participante    =intval($ultimo_participante['id'])+1;
           // error_log("participante id: ".$id_participante);
        }
        else
        {
            $participante       =   encuestas_participantes::findById($id_participante);
        }

        //  Comprobamos si el participante no ha rellenado su encuesta
        if(!empty($participante))
        {
            //  Existe el participante pero no sabemos si hay respuestas. Lo comprobamos.
            $encuestas_respuestas   =   encuestas_respuestas::findByIdParticipanteYIdEncuesta($participante['id'],$id_encuesta);

            if(count($encuestas_respuestas)>0)
            {
                $mensaje = "Ya ha rellenado la encuesta anteriormente con el email ".$participante['email'].". Muchas gracias por ayudarnos a mejorar.";
                   
                echo json_encode(
                    array(
                    "response"          => "error",
                    "instancia"         => $participante,
                    "message"           => $mensaje));
                die;
            }
        }
        
        //  Vamos a recorrer todo lo recibido por POST, pero algunas variables no las tendremos en cuenta
        $no_tener_en_cuenta=array(  "nombre","nacionalidad","cpostal","email",
                                    "edad","genero","autorizo","id_participante","id_encuesta","multiselect");
        
        foreach($_POST as $nombre_campo => $valor)
        {
            //error_log(__FILE__.__FUNCTION__.__LINE__);
            //  322-sel-pregunta        ===========> Si
            //  322-sel-pregunta-otro   ===========> 4. Otro
            //  323-sel-pregunta        ===========> Si
            //  323-sel-pregunta-otro   ===========> 
            
            //  324-pregunta-sino       ===========> Si
            
            //  336-pregunta-abierta    
            
            //  336-pregunta-triple-radio 
            //error_log("en foreach");
            if(!in_array($nombre_campo, $no_tener_en_cuenta))
            {
                $variable_explode=explode("-",$nombre_campo);
                //error_log("campo: ".$variable_explode);
                if(isset($variable_explode[2]) && $variable_explode[2]==="sino")
                {   
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($nombre_campo." => ".$valor);
                    //  Recibimos un 1 o un 0 que metemos en respuesta simple
                    if($valor){$valor=1;}
                    else{$valor=0;}
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log($nombre_campo." => ".$valor);
                    encuestas_respuestas::insert($variable_explode[0], $participante['id'], $valor, "");
                }
                elseif(isset($variable_explode[2]) && $variable_explode[2]==="abierta")
                {   
                    //  Recibimos un 1 o un 0 que metemos en respuesta simple
                    encuestas_respuestas::insert($variable_explode[0], $participante['id'], 0, $valor);
                }
                elseif( isset($variable_explode[2]) && $variable_explode[1]==="sel")
                {   
                    if(isset($variable_explode[3]) && $variable_explode[3]==="otro")
                    {    //error_log(__FILE__.__FUNCTION__.__LINE__);     
                    
                    }  // Nada porque ya se ha procesado
                    else
                    {
                        if(isset($_POST[$nombre_campo."-otro"]) && $_POST[$nombre_campo."-otro"]!=="")
                        {   
                            $valor=$_POST[$nombre_campo."-otro"]; 
                        } 
                        encuestas_respuestas::insert($variable_explode[0], $participante['id'], 0, $valor);
                    }
                }
                elseif( isset($variable_explode[2]) && $variable_explode[2]==="triple")
                {   
                    encuestas_respuestas::insert($variable_explode[0], $participante['id'], 0, $valor);
                }
                elseif( isset($variable_explode[2]) && $variable_explode[2]==="numero")
                {   
                     //error_log(__FILE__.__FUNCTION__.__LINE__);
                   // error_log("pregunta:". $variable_explode[0]." participante: ".$participante['id']." - ".$valor);
                    encuestas_respuestas::insert($variable_explode[0], $participante['id'], $valor, null);
                }
                else
                {
                    error_log(__FILE__.__FUNCTION__.__LINE__);
                    error_log("ERROR. Hay que revisar: ".$nombre_campo." - ".$valor);
                } 
            }
        }
       
        //  En este momento tenemos casi todas las variables, excepto las "multiselect" que no se reciben bien.
        //  Esto es porque se usa un componente personalizado. Entonces, hay que hacerlo de otra forma.
        //  En concreto, cogemos $_POST["multiselect"], le hacemos explode con dos guiones -- como separador.
        //  Hacemos un bucle y hacemos encuestas_respuestas::updateAttribute()
        if(isset($_POST["multiselect"]))
        {
            $multiselect_explode_array=explode("--",$_POST["multiselect"]);
//error_log(__FILE__.__FUNCTION__.__LINE__);
//error_log(print_r($multiselect_explode_array,1));

            foreach($multiselect_explode_array as $multiselect)
            {
                if($multiselect!=="")
                {
                    if($multiselect[0]===",")
                    {   
                        $multiselect= substr($multiselect, 1);  // Elimina primer caracter que es una , coma.
                    }
                    
//    error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log(print_r($multiselect,1));

                    $multiselect_troceado   =   explode("-",$multiselect);
//    error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log(print_r($multiselect_troceado,1));

                    $valorAtributo          =   str_replace("pregunta", "", $multiselect_troceado[2]);
//    error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log(__FILE__.__LINE__.": ".$valorAtributo);
//    error_log($id_participante);
//    error_log($multiselect_troceado[0]);
    
                    $respuesta_anterior=encuestas_respuestas::findByIdParticipanteYIdPregunta($participante['id'], $multiselect_troceado[0]);
//    error_log(__FILE__.__FUNCTION__.__LINE__);
//    error_log(print_r($respuesta_anterior,1));           
                    encuestas_respuestas::updateAttribute(
                        $respuesta_anterior['id'], 
                        "respuesta_abierta", 
                        $valorAtributo, 
                        "si");
                }
            }
        }

        echo json_encode(array(
            "response" => "success",
            "message" =>  "<h4><b>¡Muchas gracias de nuevo por tu colaboración!</b><br><br>El cuestionario se ha completado con éxito, tu ayuda es vital para nosotros.<br><br>Nos vemos lo más pronto posible en la casa del baloncesto, \"L'Alqueria del Basket\"!</h4>"
        ));
        die;
    }
    
    
    
    
    /* Método que gestiona las llamadas AJAX */
    public function actionDispatcher()
    {
       
        $metodo = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
        if($metodo==""){    $metodo = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);   }

        $force_debug="false"; // Fuerza el imprimir POST en el log de errores
        if($force_debug==="true" || filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING)==="true"){
            //error_log(print_r($_POST,1));
        }

        switch($metodo){
            // Rol: admin o superadmin
            case "encuestas_cargar_resultados":
            {
                require "models/encuestas.php";
                require "models/encuestas_preguntas.php";
                require "models/encuestas_participantes.php";
                require "models/encuestas_respuestas.php";
          
                //  Recuperamos los valores
                    $id_encuesta  =   filter_input(INPUT_POST, 'id_encuesta', FILTER_SANITIZE_STRING); 
                    $id_encuesta  = explode("-",$id_encuesta);
                    
                    $encuesta_preguntas =   encuestas_preguntas::findByIdEncuesta($id_encuesta[3]);
                    
                //  Creamos la tabla con los resultados por pregunta 
                    $contenido_tabla_preguntas="<table id='encuesta-detalle' class='table table-striped table-hover  inscripciones-jornadas-deteccion w-100 mb-2' style='width: 100%;'>
                                                    <thead class='table-dark'>
                                                        <tr>
                                                            <th>Pregunta</th>
                                                            <th class='text-center'>Resultado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                    
                        foreach ($encuesta_preguntas as $pregunta)
                        {
                            // Para cada pregunta, calculamos el resultado según el tipo de pregunta.
                            if($pregunta['tipo_pregunta']==="numero")
                            {
                                $respuestas_avg =   encuestas_respuestas::findAverageByIdPregunta($pregunta['id']);
                                $resultado_aux  =   $respuestas_avg['average'];
                            }
                            else if($pregunta['tipo_pregunta']==="siyno")
                            {
                                $respuestas_si  =   encuestas_respuestas::find1enPreguntaSiyNoByIdPregunta($pregunta['id']);
                                $respuestas_no  =   encuestas_respuestas::find0enPreguntaSiyNoByIdPregunta($pregunta['id']);
                                $resultado_aux  =   "SI: ".$respuestas_si[0]." - NO: ".$respuestas_no[0];
                            }
                            else if($pregunta['tipo_pregunta']==="abierta")

                            {
                                //  Aquí hay que hacer algo con las preguntas abiertas. Debemos considerar que puede haber 2.
                                $resultado_aux  =   "<button id='ver-comentarios-pregunta-".$pregunta['id']."' class='btn cargar-comentarios mt-0 mb-0' style='top: 0;'>Ver comentarios</button>";
                            }
                                                       
                            $contenido_tabla_preguntas.="<tr id='pregunta-".$pregunta['id']."'>
                                                            <td class='text-left'>".$pregunta['pregunta']."</td>
                                                            <td class='text-center'>".$resultado_aux."</td> 
                                                         </tr>\n";
                        }
                                                       
                    $contenido_tabla_preguntas.="</tbody>
                        </table>";

                //  Devolvemos la tabla con el detalle
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Los datos de la encuesta se han cargado correctamente.",
                    "contenido_tabla_preguntas" =>utf8_encode($contenido_tabla_preguntas))
                );
                break;
            }
            
            case "encuestas_cargar_comentarios_de_pregunta_abierta":{
         
                require "models/encuestas.php";
                require "models/encuestas_preguntas.php";
                require "models/encuestas_participantes.php";
                require "models/encuestas_respuestas.php";
          
                //  Recuperamos los valores
                    $id_pregunta  =   filter_input(INPUT_POST, 'id_pregunta_abierta', FILTER_SANITIZE_STRING); 
                    $id_pregunta  = explode("-",$id_pregunta);

                    //error_log($id_pregunta[3]);
                    
                    $pregunta =   encuestas_preguntas::findById($id_pregunta[3]);
                    $respuestas = encuestas_respuestas::findByIdPreguntaAbierta($id_pregunta[3]);

                   // error_log("===========================================================");
                    //error_log($id_pregunta[3]);
                    
                //  Creamos array con los comentarios de las preguntas abiertas
                    
                //  Creamos la tabla con los resultados por pregunta 
                    $contenido_tabla_respuestas_abiertas="<table id='' class='table table-striped table-hover  inscripciones-jornadas-deteccion w-100 mb-2' style='width: 100%;'>
                                                    <thead class='table-dark'>
                                                        <tr>
                                                            <th>Participante</th>
                                                            <th>Comentario</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                    
                        foreach ($respuestas as $respuesta)
                        {
                            $contenido_tabla_respuestas_abiertas.="<tr>
                                                            <td>".$respuesta['id_participante']."</td>
                                                            <td>".$respuesta['respuesta_abierta']."</td> 
                                                         </tr>\n";
                        }
                                                       
                    $contenido_tabla_respuestas_abiertas.="</tbody>
                        </table>";

                //  Devolvemos la tabla con el detalle
                echo json_encode(array(
                    "response"  => "success",
                    "message"   => "Las respuestas se han cargado correctamente.",
                    "contenido_tabla_respuestas_abiertas" =>$contenido_tabla_respuestas_abiertas)
                );
                break;
            }
        }
    }

    /* Rol: Usuario.
     * Carga la vista de la página de la encuesta del campus de navidad */
    public function actionEncuestaCampusNavidad(){
        if(!isset($_SESSION['id_participante']) || ($_SESSION['id_participante']=="")){
            header("Location:?r=index/principal");
        }
        else
        {
            require "config.php";
            vistaSimple("layout_encuesta_campus_navidad");
        }
    }

    /* Rol: Usuario.
     * Carga la vista de la página de la encuesta del campus de pascua */
    public function actionEncuestaCampusPascua(){
        if(!isset($_SESSION['id_participante']) || ($_SESSION['id_participante']=="")){
            header("Location:?r=index/principal");
        }
        else
        {
            require "config.php";
            vistaSimple("layout_encuesta_campus_pascua");
        }
    }    
    
    /* Rol: Usuario
     * Inserta un nuevo participante en la encuesta a partir de su correo */
    public function actionParticipanteNuevo()
    {
        require "models/encuestas_participantes.php";

        //  Recuperamos los valores
            $id_encuesta                =   filter_input(INPUT_POST,      'id_encuesta', FILTER_SANITIZE_STRING); 
            $email                      =   filter_input(INPUT_POST,      'email', FILTER_SANITIZE_STRING);
            $acepta_politica_privacidad =   (int)filter_input(INPUT_POST, 'privacidad', FILTER_SANITIZE_STRING);
            $fecha_participacion        =   date("Y-m-d H:i:s");
        
        //Comprobamos que el email existe
            $participacion=encuestas_participantes::findByEmail($email, $id_encuesta);

            if ($participacion){
                echo "<script text='javascript'> alert('Ya has realizado la encuesta anteriormente.');
                    window.location.replace('index.php'); </script>";
                die; 
            }
            else {
                //  Insertamos participante
                    $encuesta_participante=encuestas_participantes::insert($email, $id_encuesta, $fecha_participacion, $acepta_politica_privacidad);
                
                //  Establecemos la variable de SESSION, para luego almacenar las respuestas
                    $_SESSION['id_participante']=$encuesta_participante['id'];
                
                //  Redirigimos al usuario a la página con la encuesta
                    header("Location:?r=encuestas/encuestacampuspascua");
            }
    }
    
    
    
    /* Rol: admin
     * Carga la vista con el listado de encuestas y los datos para el rol administrador */
    public function actionBack()
    {
        /*if(isset($_SESSION['usuario']) && ($_SESSION['rolusuario'] == "admin" || $_SESSION['rolusuario'] == "superadmin"))
        {*/
        if( self::isLogged() ){

            require "models/encuestas.php";
            require "models/encuestas_participantes.php";
            require "models/encuestas_preguntas.php";
            require "models/encuestas_respuestas.php";

            $datos['encuestas'] = encuestas::findAllActivas();
            vistaSinvista(array('datos' => $datos), "layout_back_encuestas");
        }
        /*} 
        else {
            require('error.php');
        }*/
    }

    /*Metodo comprobar login*/
    private static function isLogged(){
            if( isset($_SESSION['usuario']) ){
                return true;
            }else{
                header('Location: index.php?r=login/loger');
            }
        }
}
?>