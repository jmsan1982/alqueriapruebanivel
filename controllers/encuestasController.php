<?php
class encuestasController
{
    /* Método que gestiona las llamadas AJAX */
    public function actionDispatcher()
    {
       
        $metodo = filter_input(INPUT_POST, 'form_id', FILTER_SANITIZE_STRING);
        if($metodo==""){    $metodo = filter_input(INPUT_GET, 'form_id', FILTER_SANITIZE_STRING);   }

        //$force_debug="false"; // Fuerza el imprimir POST en el log de errores
       // if($force_debug==="true" || filter_input(INPUT_POST, 'debug', FILTER_SANITIZE_STRING)==="true"){
            //error_log(print_r($_POST,1));
       // }

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

                   // error_log( "idencuesta: ".$id_encuesta[3]);
                    
                    $encuesta_preguntas =   encuestas_preguntas::findByIdEncuesta($id_encuesta[3]);
                    
                //  Creamos la tabla con los resultados por pregunta 
                    $contenido_tabla_preguntas="<table id='encuesta-detalle' class='table table-striped table-hover  inscripciones-jornadas-deteccion w-100 mb-2' style='width: 100%;'>
                                                    <thead class='table-dark'>
                                                        <tr>
                                                            <th>Pregunta</th>
                                                            <th>Resultado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>";
                    
                        foreach ($encuesta_preguntas as $pregunta)
                        {
                             $resultado_aux ="";
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
                                $resultado_aux  =   "SI: ".$respuestas_si[0]."  -  NO: ".$respuestas_no[0];
                            }
                            else if($pregunta['tipo_pregunta']==="abierta")
                            {
                                //  Aquí hay que hacer algo con las preguntas abiertas. Debemos considerar que puede haber 2.
                                $resultado_aux  =   "<button id='ver-comentarios-pregunta-".$pregunta['id']."' class='btn cargar-comentarios mt-0 mb-0' style='top: 0;'>Ver comentarios</button>";
                            }

                            else if($pregunta['tipo_pregunta']==="select" || $pregunta['tipo_pregunta']==="triple_radio")
                            {
                                $respuestas_select  =   encuestas_respuestas::findByIdPreguntaSelect($pregunta['id']);
                               // error_log(print_r($respuestas_select,1));
                               // error_log(print_r('select respuesta_abierta, count(*) as total from encuestas_respuestas where respuesta_abierta <>"" and id_pregunta="' . $pregunta['id'] . '" group by respuesta_abierta'),1);
                                $resultado="";
                                $resultado_aux ="";
                                foreach ($respuestas_select as $respuesta)
                                {
                                      $resultado  .= "-".$respuesta['respuesta_abierta'] . ": ". $respuesta['total'] ." </br>";
//error_log(print_r($resultado,1));

                                }
                                $resultado_aux = $resultado;
                                $resultado="";
                            }

                            


                                                       
                            $contenido_tabla_preguntas.="<tr id='pregunta-".$pregunta['id']."'>
                                                            <td class='text-left'>".$pregunta['pregunta']."</td>
                                                            <td class='text-left'>".$resultado_aux."</td> 
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
                   // error_log(print_r($respuestas, 1));
                    
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
                                                            <td>".utf8_encode($respuesta['respuesta_abierta'])."</td> 
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


    /*Exportar encuestas @JoseCanto / github @flowxnoe -- Algoritmo hecho rápidamente sin optimizar, se buscan indices varias veces.
      Para el tamaño de tabla dispuesto el coste es O(n^2) y tiene un tiempo de ejecución aceptable. Si se busca optimizar a O(n) se puede
      mejorar el blucle de preguntas mejorando las querys y haciendo subconsultas.*/
    public function actionExportToExcelResultados() {
             
            require "models/encuestas_respuestas.php";
            require_once "lib/classes/SimpleXLSXGen.php";

            $idencuesta=filter_input(INPUT_POST, 'idinsc', FILTER_SANITIZE_STRING);
            $preguntas = encuestas_respuestas::findPreguntasById($idencuesta);

            $arrayExcel = [];
            $titulos = [];

            //Titulos de las preguntas
            array_push($titulos, ''); // Primer valor Vacio
            $nPreguntas = 1;
            foreach($preguntas as $pregunta) {
                array_push($titulos,$pregunta[0]);
                $nPreguntas++;
            }
            $arrayExcel[0] = $titulos;

            //Contenido
            $idPreguntas = encuestas_respuestas::findIdPreguntasByIdEncuesta($idencuesta);
            $idUsuarios = encuestas_respuestas::findUsuariosByIdPregunta($idPreguntas[0][0]);
            $maxPreguntas = encuestas_respuestas::findNumerodePreguntasByIdEncuesta($idencuesta);

            $nEncuesta = 1;
            foreach($idUsuarios as $idUsuario) { // Para cada usuario que relleno la encuesta.
                $respuestasUsuario = encuestas_respuestas::findRespuestasByIdUsuario($idUsuario[0]); // Busco lo que respondio
                if (count($respuestasUsuario) != $maxPreguntas[0]['COUNT(id)']) { // Compruebo que la encuesta este bien rellenada.
                    continue;
                }
                $respuestasPregunta = []; // Creo el espacio para añadir sus respuestas en orden
                array_push($respuestasPregunta, 'Encuesta '.$nEncuesta); // Pongo la primera columna que identifica numericamente la encuesta
                foreach ($respuestasUsuario as $respuestas) { // Recorro las respuestas que ha dado para rellenar la 2º columna en adelante.
                    $tipoPregunta = ''; //Reinicio la variable que mira el tipo de las preguntas en el caso fuera necesario.
                    if (strcmp($respuestas['respuesta_abierta'], '') == 0) { // Si no hay nada en la columna respuesta abierta.
                        //En este caso hay que ver si la pregunta es de tipo 'siyno' o de tipo 'numero'
                        $tipoPregunta = encuestas_respuestas::findTipoByIdPregunta($respuestas['id_pregunta']); // Se coge el tipo de pregunta
                            if ((strcmp($tipoPregunta[0][0], 'siyno') == 0)) { // Se compara y se mira si es un SiYNo
                                if ($respuestas['respuesta_simple'] == 0) {
                                    array_push($respuestasPregunta, 'No');
                                } else {
                                    array_push($respuestasPregunta, 'Si');
                                }
                            } else if(strcmp($tipoPregunta[0][0], 'numero') == 0) {
                                array_push($respuestasPregunta, 'El usuario da un valor de: '.$respuestas['respuesta_simple']); //Pusheo el contenido de Respuesta simple
                            } else { // Si no lo es
                                array_push($respuestasPregunta, 'No hay respuesta'); //Pusheo un sin respuesta
                            }
                    } else { //Si respuesta abierta no esta vacio, pusheo el contenido de respuesta abierta.
                        array_push($respuestasPregunta, $respuestas['respuesta_abierta']);
                    }
                }
                $arrayExcel[$nEncuesta] = $respuestasPregunta; // Añado al array final las respuestas del usuario
                $nEncuesta++; // Sumo uno al ID identificador
            }

           $xlsx = SimpleXLSXGen::fromArray( $arrayExcel );
           $xlsx->downloadAs('encuesta'.$idencuesta.'.xlsx');

    }


      
    /* exportamos los resultados a excel   */
    public function actionExportarResultados()
    {

        require "models/encuestas.php";
        require "models/encuestas_preguntas.php";
        require "models/encuestas_participantes.php";
        require "models/encuestas_respuestas.php";
          
        //  Recuperamos los valores
        $id_encuesta  =   filter_input(INPUT_POST, 'id_encuesta', FILTER_SANITIZE_STRING); 
        // error_log("idencuesta: ".$id_encuesta, 1);

        $id_encuesta  = explode("-",$id_encuesta);
                    
        $encuesta_preguntas =   encuestas_preguntas::findByIdEncuesta($id_encuesta[2]);

        foreach ($encuesta_preguntas as $pregunta)
        {
                $resultado_aux  = $pregunta['pregunta'];
                $respuestas_preg =   encuestas_respuestas::findByIdEncuesta($pregunta['id']);


        }
    }


     /* exportamos los participantes a excel   */
    public function actionExportarParticipantes()
    {

       // require "models/encuestas.php";
       // require "models/encuestas_preguntas.php";
        require "models/encuestas_participantes.php";
       // require "models/encuestas_respuestas.php";
          
        //  Recuperamos los valores
        $id_encuesta  =   filter_input(INPUT_POST, 'id_encuesta', FILTER_SANITIZE_STRING); 
        // error_log("idencuesta: ".$id_encuesta, 1);

        $id_encuesta  = explode("-",$id_encuesta);
                    
        $datos['participantes'] =   encuestas_participantes::ExportByIdEncuesta($id_encuesta[2]);


        if(!empty($datos))
            {
                   
                    echo json_encode(
                        array(
                        "response"  => "success",
                        "instancia" => $datos['participantes'],
                        "message"   => "Puede rellenar la encuesta"));
                    die;
           
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
    public function actionParticipanteNuevo(){
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
    
    /* Rol: Usuario
     * Inserta un nueva participación en una encuesta con los votos recibidos */
    public function actionParticipacionNueva(){
        require "models/encuestas_participantes.php";
        require "models/encuestas_respuestas.php";
        require "PHPMailer/envios_emails.php";
          
        //  Recuperamos los valores
            $id_encuesta        =   filter_input(INPUT_POST, 'id_encuesta', FILTER_SANITIZE_STRING); 
            $id_participante    =   filter_input(INPUT_POST, 'id_participante', FILTER_SANITIZE_STRING); 
            $participante       =   encuestas_participantes::findById($id_participante);
            
            $respuesta_simple_01    =   filter_input(INPUT_POST, 'respuesta_simple_01', FILTER_SANITIZE_STRING); 
            $respuesta_simple_02    =   filter_input(INPUT_POST, 'respuesta_simple_02', FILTER_SANITIZE_STRING); 
            $respuesta_simple_03    =   filter_input(INPUT_POST, 'respuesta_simple_03', FILTER_SANITIZE_STRING); 
            $respuesta_simple_04    =   filter_input(INPUT_POST, 'respuesta_simple_04', FILTER_SANITIZE_STRING); 
            $respuesta_simple_05    =   filter_input(INPUT_POST, 'respuesta_simple_05', FILTER_SANITIZE_STRING); 
            $respuesta_simple_06    =   filter_input(INPUT_POST, 'respuesta_simple_06', FILTER_SANITIZE_STRING); 
            $respuesta_simple_07    =   filter_input(INPUT_POST, 'respuesta_simple_07', FILTER_SANITIZE_STRING); 
                $respuesta_siyno_08    =   (int) filter_input(INPUT_POST, 'respuesta_siyno_08', FILTER_SANITIZE_STRING); 
                $respuesta_siyno_09    =   (int) filter_input(INPUT_POST, 'respuesta_siyno_09', FILTER_SANITIZE_STRING); 
            $respuesta_simple_10    =   filter_input(INPUT_POST, 'respuesta_simple_10', FILTER_SANITIZE_STRING); 
                $respuesta_abierta_11    =   filter_input(INPUT_POST, 'respuesta_abierta_11', FILTER_SANITIZE_STRING);
        
        //  Procesamos las respuestas con las estrellitas
            $array_respuesta_simple_01  =explode("-",$respuesta_simple_01);
            $array_respuesta_simple_02  =explode("-",$respuesta_simple_02);
            $array_respuesta_simple_03  =explode("-",$respuesta_simple_03);
            $array_respuesta_simple_04  =explode("-",$respuesta_simple_04);
            $array_respuesta_simple_05  =explode("-",$respuesta_simple_05);
            $array_respuesta_simple_06  =explode("-",$respuesta_simple_06);
            $array_respuesta_simple_07  =explode("-",$respuesta_simple_07);
            $array_respuesta_simple_10  =explode("-",$respuesta_simple_10);
            
        //  Comprobamos si el participante ya respondió la encuesta, mediante la comprobación de una pregunta (hardcodeada)
            $encuestas_respuestas=encuestas_respuestas::findByIdParticipanteYIdPregunta($id_participante,308);
            
            if(count($encuestas_respuestas)>0){
                echo json_encode(array(
                    "response" => "error",
                    "message" =>  "Ya completó la encuesta anteriormente."
                ));
                die;
            }
            else{
                //  Insertamos las respuestas. El ID de la pregunta lo introducimos hardcodeando.
                encuestas_respuestas::insert(308, $id_participante, (int)$array_respuesta_simple_01['3']);
                encuestas_respuestas::insert(309, $id_participante, (int)$array_respuesta_simple_02['3']);
                encuestas_respuestas::insert(310, $id_participante, (int)$array_respuesta_simple_03['3']);
                encuestas_respuestas::insert(311, $id_participante, (int)$array_respuesta_simple_04['3']);
                encuestas_respuestas::insert(312, $id_participante, (int)$array_respuesta_simple_05['3']);
                encuestas_respuestas::insert(313, $id_participante, (int)$array_respuesta_simple_06['3']);
                encuestas_respuestas::insert(314, $id_participante, (int)$array_respuesta_simple_07['3']);
                encuestas_respuestas::insert(315, $id_participante, $respuesta_siyno_08);
                encuestas_respuestas::insert(316, $id_participante, $respuesta_siyno_09);
                encuestas_respuestas::insert(317, $id_participante, (int)$array_respuesta_simple_10['3']);
                encuestas_respuestas::insert(318, $id_participante, 0, $respuesta_abierta_11);
                    
                //  Enviamos email de agradecimiento   
                $asunto =   "Gracias por ayudarnos a mejorar nuestro Campus de Pascua";
                $body   =   "<h3>Encuesta Satisfacción Campus Pascua 2019</h3>
                            <p>L'Alqueria del Basket agradece tu tiempo e interés en ayudarnos a mejorar esta actividad. ¡Esperamos seguir contando con tu ayuda!</p>
                            <p>Para cualquier duda o consultar información, queda a tu disposición la web <a href='https://alqueriadelbasket.com'>www.alqueriadelbasket.com</a></p>";
                // envios_emails::enviar_email_agradecimiento_encuesta_campus_navidad_2018($participante['email'],$asunto,$body);
                envios_emails::enviar_email_agradecimiento_encuesta_campus_pascua_2019($participante['email'],$asunto,$body);
                
            
                //  Devolvemos respuesta y en el JavaScript se hará una redirección
                echo json_encode(array(
                    "response" => "success",
                    "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
                ));
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
            vistaSinvista(array('datos' => $datos), "layoutsback/layout_back_encuestas");
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