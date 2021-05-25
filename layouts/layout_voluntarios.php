<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

    <body class="Pages" id="formus">

        <div class="wrapper overflow-x-hidden">	

            <?php require('includes/header.php'); ?>

            <!-- Start Page-Content -->
            <section id="page-content" class="overflow-x-hidden margin-top-header">

               <!--  <div class="block">
                    <div class="container-fluid pl-0 pr-0">
                        <div class="row pl-0 pr-0">
                            <div class="parallax col-12 mt-0" 
                                 style="background-image: url('img/cabecera-cultura-esfuerzo.jpg');">
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="block background-f6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <!-- <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                        <img class="img-responsive" src="img/escudo-campus-navidad.png" style="margin: 0 auto;" alt="Escudo Campus de Navidad">
                                    </div> -->

                                    <div class="col-12" id="titulo">
                                        <h2 class="section-title">
                                            <span class="orange-text">Inscríbete al voluntariado para el torneo Adidas Next Generation Tournament 2019</span>
                                        </h2>
                                        <h3 class="section-title mb-2">Del 27 al 28 de Diciembre</h3>
                                    </div>

                                    <!-- <div class="col-12 t-left mb-1">
                                        <p>
                                            En estas Vacaciones de Navidad no te quedes en casa. Participa en el XI Campus del Valencia Basket. Mejora tu baloncesto con entrenamientos específicos, concursos de tiro, liga nocturna y 3x3. También visitarás L´Alqueria del Basket, donde entrenarás y trabajarás con una máquina profesional de tiro.
                                        </p>
                                        <p>
                                            ¡Recibirás la visita de jugadores y jugadoras del primer equipo y la camiseta oficial del Valencia Basket!
                                        </p>
                                    </div> -->
                                </div>

                               <!--  <form id="campus-navidad-2019-form" class="boxed-form" method="post"> -->
                                <form id="contactform" enctype="multipart/form-data" action="?r=voluntarios/VoluntariosForm" class="boxed-form" name="contactform" method="post">   
                                   

                                    <!-- Nombre, apellidos, fecha nacimiento -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <h4 class="section-title">Datos del voluntario/a:</h4>
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label>Nombre:
                                                    <input type="text" class="form-control" id="nombre"  name="nombre" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                                <label>Apellidos:
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                <label>Fecha de nacimiento:
                                                    <input type="date" class="form-control" style="color: #5c5c5c !important;" id="fechanacimiento" name="fechanacimiento" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- Tutor: direccion-->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                                <label>Dirección:
                                                    <input type="text" class="form-control" id="direccion" name="direccion" maxlength="45" required>
                                                </label>
                                            </div>

                                            <!-- <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label>Número:
                                                    <input type="text" class="form-control" id="tutor_numero" name="tutor_numero" maxlength="10">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                                <label>Piso / Esc:
                                                    <input type="text" class="form-control" id="tutor_piso" name="tutor_piso" maxlength="10">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-2 col-lg-2 col-xl-2">
                                                <label>Puerta:
                                                    <input type="text" class="form-control" id="tutor_puerta" name="tutor_puerta" maxlength="10">
                                                </label>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!--  CP, provincia, poblacion -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label>Código Postal:
                                                    <input type="text" class="form-control" id="cp" name="cp" maxlength="10" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label>Provincia:
                                                    <input type="text" class="form-control" id="provincia" name="provincia" maxlength="25" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                                <label>Población:
                                                    <input type="text" class="form-control" id="poblacion" name="poblacion" maxlength="45" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- DNI, telef, email -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label>DNI:
                                                    <input type="text" class="form-control" id="dni" name="dni" maxlength="10">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4col-lg-4 col-xl-4 redimension">
                                                 <label>Teléfono:
                                                    <input type="text" class="form-control" id="telefono" name="telefono" maxlength="15" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                <label>Correo Electrónico:
                                                    <input type="email" class="form-control" id="email" name="email" maxlength="45" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label>Evento:
                                                    <input type="text" class="form-control" id="evento" name="evento" value="Adidas Next 2019" readonly>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                 <label>Fecha prevista:
                                                    <input type="text" class="form-control" id="fechaprev" name="fechaprev" value="Del 27/12/19 al 28/12/19" readonly>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-5 col-lg-5 col-xl-5">
                                                <label>Horario estimado:
                                                    <input type="text" class="form-control" id="horario" name="horario" value="De 8:00 a 20:00h" readonly>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>Ambito:
                                                    <input type="text" class="form-control" id="ambito" name="ambito" value="Valencia" readonly>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                 <label>Lugar:
                                                    <input type="text" class="form-control" id="lugar" name="lugar" value="L´Alqueria del Basket" readonly>
                                                </label>
                                            </div>

                                            
                                        </div>
                                    </div>

                                   

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="t-left" style="color: red;">
                                                    <strong>Al terminar la solicitud, recibirá un correo electrónico con la información recibida</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                   

                                    

                                    <!-- certificado antecedentes -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 redimension">
                                                <h4 class="section-title">Añadir certificado de antecedentes penales</h4>
                                            </div>
                                            <div class="col-12 redimension">
                                                <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" 
                                                       id="certificado" name="certificado" aria-describedby="fileHelp">
                                            </div>
                                        </div>
                                    </div>

                                    

                                    
                                    <!-- Política de privacidad -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title mb-0">
                                                <span class="orange-text">Política de privacidad</span>
                                            </h3>
                                            <h4 class="section-title mb-0">Consentimiento expreso e inequívoco:</h4>
                                        </div>

                                        <div class="col-12">
                                            <p>
                                                En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación. 
                                            </p>
                                            <label class="containerchekbox">
                                                <p>
                                                    <input type="checkbox" id="autorizodatos" name="autorizodatos" value="si">
                                                    <span class="checkmark"></span> 
                                                   Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico.
                                                </p>
                                            </label>
                                            <label class="containerchekbox">
                                                <p>
                                                    <input type="checkbox" id="autorizoimagen"  name="autorizoimagen" value="si">
                                                    <span class="checkmark"></span> 
                                                    Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)
                                                </p>
                                            </label>
                                            <p>
                                                Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.
                                            </p>
                                            <p>
                                                Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href="https://www.valenciabasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a>
                                            </p>
                                        </div>

                                        <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required>
                                                <p>Acepto las condiciones anteriormente expuestas.</p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        
                                        
                                        
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
                                                <span>Realizar solicitud</span>
                                            </button>
                                        </div>

                                        <!-- <div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                            <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
                                                <span>Realizar Pago con tarjeta</span>
                                            </button>
                                        </div> -->
                                    </div>
                                    
                                    
                                   
                                </form>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>
            </section>

            <?php require('includes/footer.php'); ?>
            <?php require "includes/cookies.php"; ?>

        </div> 

        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script src="js/jquery.validate.min.js"></script>

       

    </body>
</html>                  