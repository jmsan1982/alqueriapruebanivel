<?php
class loginController {

    public function actionLoger(){

        require "config.php";

        vistaSimple("layout_login_users");
    }

    public function actionOpenPdf(){

        require "config.php";
        
        vistaSimple("layout_login_users_pdf");  

    }

    public function actionIdentificarseUsuariopdf(){
        
        if(isset($_POST['usuario'])) {
            
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if($usuario=="VbC*20182019" && $password="VbC*20182019"){
            	require('includes/head.php');
                echo "
                <div style='position:relative;width:100%;'>
                <div style='width:100%;background-color:rgb(50, 54, 57);height:50px;position:absolute;'><p style='color:#f72a2a;text-align:center;'> Documento protegido por la ley de derechos de autor, baje por el documento poniendo el ratón en la barra de scroll</p></div>
                <img src='img/traspa.png' style='width:98%;height:100%;top:0px;left:0px;position:absolute;'>
                <script>
                	$('#myiframe').on('contextmenu', function (e) { return false; });
                	window.frames['#myiframe'].document.oncontextmenu = function(){ return false; };
                </script>
                <iframe id='myiframe' src=\"PHPMailer/Guia del Entrenador Version 1 encriptada.pdf\" width=\"100%\" style=\"height:100%\"></iframe>
                </div>";
            }
            else{
                echo "<script text='javascript'> alert('Por favor, no intente acceder al documento si no tiene los datos de acceso necesarios');
                window.location.replace('?index.php'); </script>";
                die;
            }
         
        } 

    }

    /**
     * Login Usuario BackEnd:
     * - Tendero pide que los entrenadores no puedan acceder, cortar inmediatamente. 23/03/2020
     */
    public function actionIdentificarseUsuario()
    {
       // require "models/encrypter.php";
        // $_SESSION['rolusuario'] = "superadmin";
        // $_SESSION['usuario'] = "admintessq";
        // $_SESSION['emailusuario'] = "ap@tessq.com";
       
       // header('Location:?r=login/Back');
        //die;

        if (isset($_POST['usuario']))
        {


            //variables para servicios
           // $usuario    = encrypter::encrypt($_POST['usuario']);
            //$password   = encrypter::encrypt($_POST['password']);

            require "models/users.php";

            //ususarios de alqueriaforms sin encriptar
            $usuario    = $_POST['usuario'];
            $password   = $_POST['password'];

            
            //comprobamos si el usuario esta en alqueriaforms
            $user = users::findUser($usuario);

            //tenemos que comprobar si se esta logueando un entrenador de la bbdd de alqueria de la tabla 'coaches'
            $useralqueria_entreandor = users::findEntrenadorAlqueria($_POST['usuario']);

            require('includes/head.php');
            
            if ((!$user) && (!$useralqueria_entreandor))
                die("
				<div class='login-copytext' style='text-align:center;'>
					<img src='img/pinchazo.jpg' class='img-responsive' style='width:20%;margin-left:40%;'/>
					<h3>OOOOOOOOOOPS!!!</h3>
					<h3>No existe el usuario</h3><h3><a href='?r=login/loger' style='color:red;'>Vuelve a intentarlo</a></h3>
				</div>"
            );


            //  usuarios de alqueria forms
            if ($user['contrasenya'] == $password) 
            {
               // $_SESSION['usuario'] = encrypter::decrypt($user['usuario']);
                $_SESSION['usuario'] = $user['usuario'];
                $_SESSION['rolusuario'] = $user['rol'];
                $_SESSION['emailusuario'] = $user['email'];

                $_SESSION['nombreusuario'] = $user['nombre'];
                $_SESSION['idusuario'] = $user['id_usuario'];

                $_SESSION['idcoach']=0;
               
               

                if (isset($_SESSION['usuario']) ) {   //&& $_SESSION['rolusuario'] == "admin"
                    // header('Location:?r=login/Chooseback');
                    header('Location:?r=login/Back');
                }

            //  usuario entrenador de alqueria, tabla 'coaches'
            } 
            elseif ($useralqueria_entreandor['contrasenya'] == $_POST['password']) 
            {
                $_SESSION['usuario'] = $useralqueria_entreandor['usuario'];
                $_SESSION['rolusuario'] = 'entrenador';
                $_SESSION['emailusuario']=$useralqueria_entreandor['email_coach'];


                $_SESSION['idcoach']=$useralqueria_entreandor['id_coach'];
                $_SESSION['nombreusuario']=$useralqueria_entreandor['nombre_coach']." ".$useralqueria_entreandor['apellidos'];
               
                $_SESSION['idusuario'] = 0;
                
                if (isset($_SESSION['usuario']) ) 
                {   
                    header('Location:?r=login/Back');
                }
            }
            else
            {
                echo "<div class='login-copytext' style='text-align:center;'>
					<img src='img/pinchazo.jpg' class='img-responsive' style='width:20%;margin-left:40%;'/>
					<h3>OOOOOOOOOOPS!!!</h3>
					<h3>La contraseña no es correcta</h3><h3> <a href='?r=login/loger' style='color:red;'>Vuelve a intentarlo</a></h3>
				  </div>";
            }

            

        }


    }



    /**
     * Logout Usuarios.
     */
    public function actioncerrarSesion() {
        unset($_SESSION['usuario']);
        unset($_SESSION['rolusuario']);
        unset($_SESSION['emailusuario']);
        unset($_SESSION['nombreusuario']);

        //datos del loguin de alqueriaforms
        unset($_SESSION['idusuario']);

        //datos del loguin de alqueria tabla coaches
        unset($_SESSION['idcoach']);
      
        header("Location:index.php");
    }

    /**
     * Logout2 Usuarios.
     */
//    public function actioncerrarSesionUsuario() {
//
//        unset($_SESSION['usuario']);
//        header("Location:index.php");
//    }

    public function actionChooseBack()
    {
        if(isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin")
        {
            require "config.php";
            vistaSimple("layout_choose_back");
        } else {
            require('error.php');
        }
    }

    /* NUEVAS FUNCIONALIDADES PARA EL CONTROL DE LAS INSCRIPCIONES */
    public function actionBack()
    {
        if(isset($_SESSION['usuario']) )   //&& $_SESSION['rolusuario'] == "admin"
        {
            
            require "config.php";
            vistaSimple("layout_portada");
        } 
        else 
        {
            require('error.php');
            
        }


    }

    /**
     *  Búsqueda por Numero de Pedido.
     */
    public function actionConsultaPorNumeroPedido()
    {
        $numeropedido = $_POST['numeropedido'];
        if (isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin") {
            require "models/inscripciones.php";
            $datos['inscripciones'] = inscripciones::findInscripcionPorNumeroPedido($numeropedido);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $filtrado = "2";
            vistaSinvista(array('filtrado' => $filtrado, 'datos' => $datos), "layout_back_escuela_cantera_otras_consultas");
        } else {
            require('error.php');
        }
    }

    /**
     * Búsqueda por Email.
     */
    public function actionConsultaPorEmail()
    {
        $email = $_POST['email'];
        if(isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin")
        {
            require "models/inscripciones.php";
			require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones::findInscripcionPorEmail($email);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);

            $datos['datoPagos'] = inscripciones_pagos::findAllDatosPagos();
			$filtrado = "2";
            vistaSinvista(array('filtrado' => $filtrado, 'datos' => $datos), "layout_back_escuela_cantera_otras_consultas");
        }
        else
        {
            require('error.php');
        }
    }

    /**
     * Búsqueda por Fecha.
     */
    public function actionConsultaPorFecha() {
        $fecha = $_POST['fecha'];
        if (isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin")
        {
            require "models/inscripciones.php";
            $datos['inscripciones'] = inscripciones::findInscripcionPorFecha($fecha);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['datosPagos'] ="";
            $filtrado = "2";
            vistaSinvista(array('filtrado' => $filtrado, 'datos' => $datos), "layout_back_escuela_cantera_otras_consultas");
        } 
        else {
            require('error.php');
        }
    }

    /**
     * Búsqueda Usuarios que han pagado.
     */
    public function actionVerPagados()
    {
        if (isset($_POST['tipo'])){
            $tipo = $_POST['tipo'];
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones::findInscripcionesPorEstado($tipo);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();
            $datos['todospagos'] = inscripciones_pagos::findAll();
            $filtrado = "2";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layout_back_escuela_cantera_otras_consultas");
        } 
        else{
            require('error.php');
        }
    }

    /**
     * Búsqueda por Categoría (Modalidad).
     */
    public function actionVerPorCategoria()
    {
        if(isset($_POST['categoria']))
        {
            $categoria = $_POST['categoria'];
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones::findInscripcionesPorCategoria($categoria);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();
            $datos['todospagos'] = inscripciones_pagos::findAll();
            $filtrado = "1";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layout_back_escuela_cantera_otras_consultas");
        } 
        else {
            require('error.php');
        }
    }

    /**
     * Búsqueda por Categoría Patronato.
     */
    public function actionVerPorCategoriaPatronato()
    {
        if(isset($_POST['categoria']))
        {
            $categoria = $_POST['categoria'];
            require "models/inscripciones_patronato.php";
            require "models/inscripciones_patronato_pagos.php";
            $datos['inscripciones'] = inscripciones_patronato::findInscripcionesPorCategoria($categoria);
            $datos['todasinscripciones'] = inscripciones_patronato::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $datos['pagosagrupadosporfecha'] = inscripciones_patronato_pagos::findAllGroupedByDate();
            $datos['todospagos'] = inscripciones_patronato_pagos::findAll();
            $filtrado = "1";
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "patronato/layout_back_rn_patronato");
        }
        else {
            require('error.php');
        }
    }

    /**
     * Búsqueda por Fecha (rango) Equipo.
     */
    public function actionConsultaPorFechaEquipo()
    {
        if(isset($_POST['fechainicio'])) {
            $fechainicio = $_POST['fechainicio'];
            $fechafin = $_POST['fechafin'];
            $equipo = $_POST['equipo'];
            require "models/inscripciones.php";
            $datos['inscripciones'] = inscripciones::findInscripcionesPorFechaEquipo($fechainicio, $fechafin, $equipo);
            $datos['todasinscripciones'] = inscripciones::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['inscripciones']);
            $filtrado = "4";
            vistaSinvista(array('filtrado' => $filtrado, 'datos' => $datos), "layout_back_escuela_cantera_otras_consultas");
        } 
        else {
            require('error.php');
        }
    }

   public function actionConsultarPagos()
   {
       require "models/inscripciones.php";
       require "models/inscripciones_pagos.php";
       if(!isset($_POST)){
           require('error.php');
       }
       else{
           $datos['todasinscripciones'] = inscripciones::findAllByIsActive();
           $datos['inscripciones'] = inscripciones::findAllInscripciones();
           $datos['numerototalinscripciones'] = count($datos['todasinscripciones']);
           $datos['datosPagos'] = inscripciones_pagos::findAllDatosPagos();
           $datos['todospagos'] = inscripciones_pagos::findAll();
           $datos['pagosagrupadosporfecha'] = inscripciones_pagos::findAllGroupedByDate();

           $filtrado = 4;
           vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "layout_back_escuela_cantera_otras_consultas");
       }

   }
   
   public function actionConsultarPagosPatronato()
    {

        require "models/inscripciones_patronato.php";
        require "models/inscripciones_patronato_pagos.php";
        if(!isset($_POST)){
            require('error.php');
        }else{
            $datos['todasinscripciones'] = inscripciones_patronato::findAllInscripciones();
            $datos['numerototalinscripciones'] = count($datos['todasinscripciones']);
            $datos['datosPagos'] = inscripciones_patronato_pagos::findAllDatosPagos();
            $datos['todospagos'] = inscripciones_patronato_pagos::findAll();
            $datos['pagosagrupadosporfecha'] = inscripciones_patronato_pagos::findAllGroupedByDate();

            $filtrado = 4;
            vistaSinvista(array('datos' => $datos, 'filtrado' => $filtrado), "patronato/layout_back_rn_patronato");
        }

    }
    
    /* 
     * METODOS PARA EL RECEPCIONISTA 
     * LOGIN 
     * PAGOS EN OFICINA */
    public function actionLogerDNI()
    {
        require "config.php";
        vistaSimple("layout_login_users_dni");
    }
    
    public function actionBackDni()
    {
        if (isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin") {
            require "config.php";
            vistaSimple("layout_back_dni");
        } else {
            require('error.php');
        }
    }
    
    public function actionIdentificarseUsuarioDni()
    {
        require "models/encrypter.php";
        if (isset($_POST['usuario'])) {

            $usuario = encrypter::encrypt($_POST['usuario']);
            $password = encrypter::encrypt($_POST['password']);

            require "models/users.php";

            $user = users::findUser($usuario);

            require('includes/head.php');
            if (!$user)
                die("
				<div class='login-copytext' style='text-align:center;'>
					<img src='img/pinchazo.jpg' class='img-responsive' style='width:20%;margin-left:40%;'/>
					<h3>OOOOOOOOOOPS!!!</h3>
					<h3>No existe el usuario</h3><h3><a href='?r=login/logerdni' style='color:red;'>Vuelve a intentarlo</a></h3>
				</div>");

            if ($user['contrasenya'] == $password) {

                $_SESSION['usuario'] = encrypter::decrypt($user['usuario']);
                $_SESSION['rolusuario'] = $user['rol'];

                if (isset($_SESSION['usuario']) && $_SESSION['rolusuario'] == "admin") {
                    header('Location:?r=login/backdni');
                }
            } else {

                echo "<div class='login-copytext' style='text-align:center;'>
					<img src='img/pinchazo.jpg' class='img-responsive' style='width:20%;margin-left:40%;'/>
					<h3>OOOOOOOOOOPS!!!</h3>
					<h3>La contraseña no es correcta</h3><h3> <a href='?r=login/logerdni' style='color:red;'>Vuelve a intentarlo</a></h3>
				  </div>";
            }
        }
    }
    
    public function actionVerficarPagoPorDni()
    {
        if(isset($_POST['correo']))
        {
            $categoria = $_POST['correo'];
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones::findInscripcionesPorCategoria($categoria);
            vistaSinvista(array('datos' => $datos),"layout_back_dni");
        } 
        else if(isset($_POST['dni']))
        {
            $categoria = $_POST['dni'];
            require "models/inscripciones.php";
            require "models/inscripciones_pagos.php";
            $datos['inscripciones'] = inscripciones::findInscripcionesPorCategoria($categoria);
            vistaSinvista(array('datos' => $datos),"layout_back_dni");
        } 
        else
        {
            require('error.php');
        }
    }

    public function actionPagadoEnOficina()
    {
        if(isset($_POST['id_formulario']))
        {
            $id_formulario = $_POST['id_formulario'];
            require "models/inscripciones.php";
            $formulario = inscripciones::findFormForId($id_formulario);
            if ($formulario['pagado'] != "oficina") 
            {
                echo "<script text='javascript'> alert('Esta inscripción no corresponde a pago en oficina');
				window.location.replace('?r=login/backdni'); </script>";
                die;
            }
            else if ($formulario['pagado'] == "oficina")
            {
                $pagado = "pagado en oficina";
                $actualizapago = inscripciones::actualizapagoenoficina($id_formulario, $pagado);
            }
        } 
        else {
            require('error.php');
        }
    }
}
?>