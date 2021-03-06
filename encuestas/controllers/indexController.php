<?php
class indexController
{
    /*  AFICIONADOS  */
    public function actionaficionados()
    {
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(2);
        vistaSinvista(array('datos'=>$datos),"layout_aficionados");
    }

    /*  Inserta un nueva participación en una encuesta con los votos recibidos */
    public function actioninsertaficionados()
    {
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(2);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
            
    }

    /*  ENTRENADORES  */
    public function actionentrenadores()
    {
        require "models/encuestas_respuestas.php";
        $datos["entrenadores"] = encuestas_respuestas::findAllByID(3);
        vistaSinvista(array('datos'=>$datos),"layout_entrenadores");
    }


    public function actioninsertentrenadores(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(3);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));

    }


    /*  JUGADORES  */
    public function actionjugadores()
    {
       require "models/encuestas_respuestas.php";
        $datos["jugadores"] = encuestas_respuestas::findAllByID(4);
        vistaSinvista(array('datos'=>$datos),"layout_jugadores");

    }


    public function actioninsertjugadores(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(4);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }


    /*  JUGADORES  19/20 */
    public function actionjugadores19_20()
    {
       require "models/encuestas_respuestas.php";
        $datos["jugadores"] = encuestas_respuestas::findAllByID(13);
        vistaSinvista(array('datos'=>$datos),"layout_jugadores_19_20");

    }


    public function actioninsertjugadores19_20(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(13);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }



    /*  PROVEEDORES  */
    public function actionproveedores()
    {
       require "models/encuestas_respuestas.php";
        $datos["proveedores"] = encuestas_respuestas::findAllByID(5);
        vistaSinvista(array('datos'=>$datos),"layout_proveedores");
    }

    public function actioninsertproveedores(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(5);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }


    /*  PATROCINADORES  */
    public function actionpatrocinadores()
    {
       require "models/encuestas_respuestas.php";
        $datos["patrocinadores"] = encuestas_respuestas::findAllByID(6);
        vistaSinvista(array('datos'=>$datos),"layout_patrocinadores");
    }

    public function actioninsertpatrocinadores(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(6);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],"");
              // error_log($aficionados["id"]. '----' .$id_participante. '----' .$_POST['pregunta-'.$aficionados["id"]]); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        //echo "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente.";
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }


    /*  STAFF  */
    public function actionstaff()
    {
       require "models/encuestas_respuestas.php";
        $datos["staff"] = encuestas_respuestas::findAllByID(7);
        vistaSinvista(array('datos'=>$datos),"layout_staff");
    }

    public function actioninsertstaff(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(7);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }



    /*  Instituciones Públicas  */
    public function actioninstitucionpublica()
    {
       require "models/encuestas_respuestas.php";
        $datos["institucionesPublicas"] = encuestas_respuestas::findAllByID(8);
        vistaSinvista(array('datos'=>$datos),"layout_instituciones_publicas");
    }

    public function actioninsertinstitucionpublica(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(8);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }


    /*  Instituciones deportivas  */
    public function actioninstitucionesdeportivas()
    {
       require "models/encuestas_respuestas.php";
        $datos["institucionesDeportivas"] = encuestas_respuestas::findAllByID(9);
        vistaSinvista(array('datos'=>$datos),"layout_instituciones_deportivas");
    }

    public function actioninsertinstitucionesdeportivas(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(9);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
    }


    /*  Otros clubes/coles  */
    public function actionclubescoles()
    {
       require "models/encuestas_respuestas.php";
        $datos["clubes"] = encuestas_respuestas::findAllByID(10);
        vistaSinvista(array('datos'=>$datos),"layout_otros_clubes_coles");
    }

    public function actioninsertclubescoles(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(10);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }


    /*  PADRES   */
    public function actionpadres()
    {
       require "models/encuestas_respuestas.php";
        $datos["padres"] = encuestas_respuestas::findAllByID(11);
        vistaSinvista(array('datos'=>$datos),"layout_padres");
    }

    public function actioninsertpadres(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(11);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        //echo "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente.";
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));

        
    }

    /*  MEDIOS DE COMUNICACION  */
    public function actionmedioscomunicacion()
    {
       require "models/encuestas_respuestas.php";
        $datos["mediosComunicacion"] = encuestas_respuestas::findAllByID(12);
        vistaSinvista(array('datos'=>$datos),"layout_medios_comunicacion");
    }

    public function actioninsertmedioscomunicacion(){
        require "models/encuestas_respuestas.php";
        $datos["aficionados"] = encuestas_respuestas::findAllByID(12);

        $id_participante=$_POST['id-participante'];
        
        foreach($datos["aficionados"] as $aficionados){
            if($aficionados["tipo_pregunta"]=="numero"){
               encuestas_respuestas::insert($aficionados["id"],$id_participante,$_POST['pregunta-'.$aficionados["id"]],""); 
            }else{
                encuestas_respuestas::insert($aficionados["id"],$id_participante,NULL,$_POST['pregunta-'.$aficionados["id"]]);
            }
        }    
        //  Devolvemos respuesta y en el JavaScript se hará una redirección
        echo json_encode(array(
            "response" => "success",
            "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
        ));
        
    }

    public function actioninsertarparticipante(){
        
        require "models/encuestas_respuestas.php";

        $nombre = ( strlen($_POST["nombre"]) !=0 ) ? $_POST["nombre"] : 'Nombre'.date('Ymdhis'); 
        $email = ( strlen($_POST["email"]) !=0 ) ? $_POST["email"] : 'Email'.date('Ymdhis'); 
        $fecha = date("Y/m/d h:i:s");
        $idEncuesta = $_POST["id_encuesta"];

        //Comprobamos que el email existe
        $participacion = encuestas_respuestas::findByEmail($email, $idEncuesta);

        if ($participacion) {
            //error_log(print_r($participacion,1));
            //die;

            echo "<script text='javascript'> alert('Ya has realizado la encuesta anteriormente.');
                window.location.replace('index.php'); </script>";
            die; 
        }
        else {

            //error_log(print_r("No habías realizado la encuesta.",1));
            //die;

            // Insertamos participante
            $nuevo_participante = encuestas_respuestas::insertParticipante($email, $idEncuesta, $nombre, $fecha);
        
            //error_log(print_r($nuevo_participante,1));
        
            // Devolvemos respuesta y en el JavaScript se hará una redirección
            echo json_encode(array(
                "response" => "success",
                "id_participante" => $nuevo_participante['id'],
                "message" => "¡Gracias por ayudarnos a mejorar! Los datos de la encuesta se han guardado correctamente."
            ));
        }
    }



    /** actionjugadores_19_20() carga la vista con la Encuesta JUGADORES sobre la temporada 19/20 */
    public function actionjugadores_19_20()
    {
        require "models/encuestas_preguntas.php";
        $datos["preguntas"] = encuestas_preguntas::findByIdEncuesta(14);
        vistaSinvista(array('datos'=>$datos),"layout_encuesta_jugadores_19_20");
    }

    /** actionjugadores_19_20() carga la vista con la Encuesta USUARIOS sobre la temporada 19/20 */
    public function actionusuarios_19_20()
    {
        require "models/encuestas_preguntas.php";
        $datos["preguntas"] = encuestas_preguntas::findByIdEncuesta(15);
        vistaSinvista(array('datos'=>$datos),"layout_encuesta_usuarios");
    }

    /** carga la vista con la Encuesta de la jornada de formacion de 15/12/20 */
    public function actionjornada_formacion()
    {
        require "models/encuestas_preguntas.php";
        $datos["preguntas"] = encuestas_preguntas::findByIdEncuesta(16);
        vistaSinvista(array('datos'=>$datos),"layout_encuesta_jornadaformacion");
    }

     /** carga la vista con la Encuesta de los abonados de la temporada 19/20 a fecha 25/01/21 */
    public function actionabonados_vb()
    {
        require "models/encuestas_preguntas.php";
        $datos["preguntas"] = encuestas_preguntas::findByIdEncuesta(17);
        vistaSinvista(array('datos'=>$datos),"layout_encuesta_abonados_19_20");
    }
}
?>