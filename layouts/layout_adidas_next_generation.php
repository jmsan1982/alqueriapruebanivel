<!DOCTYPE html>
<html lang="es">
    
    <?php require('includes/head.php'); ?>
    
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">

    <body class="Pages">

        <div class="wrapper overflow-x-hidden">

            <?php require('includes/header.php'); ?>

            <!-- Start Page-Content -->
            <section id="page-content" class="overflow-x-hidden margin-top-header">

                <div class="block background-f6">
                    <div class="container">

                        <!-- Imagen calendario y partidos 
                        <div class="row">
                            <div class="col-12 t-center mt-1">
                                <img class="img-responsive" src="img/adidasnextgeneration/adidas_next_generation_tournament_partidos_<?php //echo $_SESSION['language_adidas']; ?>.jpg" style="margin:0 auto; width: 90%;">
                            </div>
                        </div>
                        
                        <!-- Imagen Paquete profesional 
                        <div class="row">
                            <div class="col-12 t-center mt-1">
                                <img class="img-responsive" src="img/adidasnextgeneration/dossier_adidas_tournament_<?php //echo $_SESSION['language_adidas']; ?>.jpg" style="margin:0 auto; width: 90%;">
                            </div>
                        </div>
                        -->

                        <!-- Método de reserva y pago -->
                        <div class="row">                            
                            <div class="col-12 t-center mt-1">
                                <h2 class="section-title mb-0">
                                    <span class="orange-text">
                                        <?php 
                                            switch ($_SESSION['language_adidas']) 
                                            {
                                                case "es": echo "ADIDAS NEXT GENERATION: RESERVAS"; break;
                                                case "en": echo "ADIDAS NEXT GENERATION: RESERVATIONS"; break;
                                            } 
                                        ?>
                                    </span>   
                                    
                                    <a class="ml-3" href="index.php?r=index/AdidasNextGeneration&idioma=es"><img src="https://www.alqueriadelbasket.com/img/cas.gif"></a>
                                    <a class="" href="index.php?r=index/AdidasNextGeneration&idioma=en"><img src="https://www.alqueriadelbasket.com/img/eng.gif"></a>
                                
                                </h2>
                            </div>

                            
                            <!-- Datos personales opción B -->
                            <div class="col-12 t-left">
                                <h4 class="section-title">
                                    <?php 
                                        switch ($_SESSION['language_adidas']) {
                                            case "es": echo "Datos Personales"; break;
                                            case "en": echo "Personal Information"; break;
                                        } 
                                    ?>                                            
                                </h4>
                                
                                <form id="adidasNextGenerationForm" class="boxed-form" name="contactform" method="post">

                                    <input type="hidden" value="adidasnextgeneration" name="adidastorunament">

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">

                                            <!-- Nombre -->
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="text" class="form-control" value="" id="nombre" name="nombre" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es": echo "Nombre"; break;
                                                    case "en": echo "First Name"; break;
                                                } ?>" required>
                                            </div>
                                            
                                            <!-- apellidos -->
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="text" class="form-control" value="" id="apellidos" name="apellidos" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es": echo "Apellidos"; break;
                                                    case "en": echo "Surnames"; break;
                                                } ?>" required>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">

                                            <!-- Empresa/club -->
                                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="text" class="form-control" value="" name="empresaclub" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es":  echo "Empresa/Club";   break;
                                                    case "en":  echo "Brand/Club";    break;
                                                } ?>" required>
                                            </div>
                                            
                                            <!-- Mail -->
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="email" class="form-control" value="" name="email" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es":  echo "Correo Electrónico";   break;
                                                    case "en":  echo "Email";    break;
                                                } ?>" required>
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">

                                            <!-- Móvil -->
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="text" class="form-control" value="" name="movil" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es":  echo "Teléfono";   break;
                                                    case "en":  echo "Phone Number";    break;
                                                } ?>" required>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <input type="number" class="form-control" id="packs" value="" name="packs" min="0" placeholder="<?php switch ($_SESSION['language_adidas']) {
                                                    case "es":  echo "Cantidad de Packs";   break;
                                                    case "en":  echo "Number of Packs";    break;
                                                } ?>" required>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-sm-12 redimension">
                                                <textarea class="form-control" id="comentario" name="comentario" rows="2" style="height:auto !important;" placeholder="<?php switch ($_SESSION['language_adidas'])
                                                    {
                                                    case "es":  echo "Comentario";   break;
                                                    case "en":  echo "Comments";    break;
                                                    } ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    

                                    <!-- POLÍTICA PRIVACIDAD -->
                                    <div class="col-12 mt-4">
                                        <p>
                                            <?php 
                                                switch ($_SESSION['language_adidas']) {
                                                    case "es": echo "En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal 15/1999 de 13 de diciembre, el Real Decreto 1720/2007 por el que se regula su reglamento de desarrollo y reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le comunica que sus datos serán incorporados a un fichero titularidad del VALENCIA BASKET CLUB, S.A.D. con CIF A4640693 y cuyas finalidades son; la gestión integral del campus de navidad 2018 y el mantenerle informado de las próximas novedades y actividades del club."; break;
                                                    case "en": echo "In compliance with the Organic Law of Protection of Personal Data 15/1999 of December 13th, Royal Decree 1720/2007 which regulates its development in European Parliament Regulation (EU) 2016/679 and the council of April 27th, 2016, you are informed that your data will be incorporated into a file owned by the FUNDACIÓ VALENCIA BASQUET 2000, with CIF G96614474 and whose purposes are; the integral management of your registration for ADIDAS TOURNAMENT services and to keep you informed of the next news and activities of the foundation."; break;
                                                } 
                                            ?>
                                        </p>
                                        <label class="containerchekbox">
                                            <p>
                                                <input type="checkbox" name="autorizodatos2" value="si" required>
                                                <span class="checkmark"></span>
                                                <?php switch($_SESSION['language_adidas']){
                                                    case "es": echo "Acepto que VALENCIA BASKET CLUB SAD comunique mis datos a FUNDACIÓ VALENCIA BASQUET 2000 para que me mantenga informado sobre productos o servicios relacionados con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico."; break;
                                                    case "en": echo "I accept that FUNDACIÓ VALENCIA BASQUET 2000 communicates my data to VALENCIA BASKET CLUB SAD so that it keeps me informed about products or services related to the basketball sector that could be of my interest by any means, including electronic."; break;
                                                } ?>
                                            </p>
                                        </label>
                                        <label class="containerchekbox">
                                            <p>
                                                <input type="checkbox" name="autorizoimagen2" value="si" required>
                                                <span class="checkmark"></span>
                                                <?php switch($_SESSION['language_adidas']){
                                                    case "es": echo "Acepto que el VALENCIA BASKET CLUB SAD trate mi imagen, parcial o total, en cualquier soporte gráfico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros del VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)"; break;
                                                    case "en": echo "I accept that the FUNDACIÓ VALENCIA BASQUET 2000 can treat my image, partial or total, in any graphic or visual support (photography, video or similar) to be used in the present and future media of the VALENCIA BASKET CLUB, SAD (web, brochures, club magazines, championships, social networks, etc.)"; break;
                                                }?>
                                            </p>
                                        </label>
                                        <p>
                                            <?php 
                                                switch($_SESSION['language_adidas']) {
                                                    case "es": echo "Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: HERMANOS MARISTAS 16, 46013, VALENCIA o a través de valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos."; break;
                                                    case "en": echo "You are also informed that you can exercise the rights of access, rectification, deletion, portability, limitation of treatment, cancellation and, where appropriate, opposition, by sending a written request accompanied by a photocopy of your ID to the following address: BOMBER RAMON DUART, S / N, 46013, VALENCIA or through vbasket@valenciabasket.com as well as claiming before the Spanish Agency for Data Protection (www.agpd.es) when the interested party considers that VALENCIA BASKET CLUB SAD has infringed the rights that are recognized by the applicable regulations on data protection."; break;
                                                }
                                            ?>
                                        </p>
                                        <p>
                                            <?php 
                                                switch($_SESSION['language_adidas']) {
                                                    case "es": echo "Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href=\"https://alqueriadelbasket.com\" target=\"_blank\" style=\"color:#eb7c00;font-weight:600;\">alqueriadelbasket.com</a>"; break;
                                                    case "en": echo "If you wish to expand the information about our privacy policy, visit our website <a href=\"https://alqueriadelbasket.com\" target=\"_blank\" style=\"color:#eb7c00;font-weight:600;\">alqueriadelbasket.com</a>"; break;
                                                }
                                            ?>
                                        </p>
                                    </div>

                                    <!-- BOTÓN REALIZAR PAGO -->
                                    <div class="col-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 mt-2 mb-2">
                                        <button class="btn btn-link-w w-100 btn-block" name="tarjeta" type="submit" style="width:100% !important;">
                                            <span>
                                                <?php 
                                                    switch ($_SESSION['language_adidas']) {
                                                        case "es":  echo "Realizar Reserva";   break;
                                                        case "en":  echo "Make the reservation";    break;
                                                    } 
                                                ?>
                                                    
                                            </span>
                                        </button>
                                    </div>
                                    
                                    <!-- RESPUESTA -->
                                    <div id="adidasNextGenerationForm-respuesta" class="col-12 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 mt-2 mb-2">
                                    </div>

                                </form>
                            </div>
                            
                            
                            <!-- Consultas y dudas -->
                            <div class="col-12 t-center mt-0 mb-2">
                                <h2 class="section-title mt-0 mb-1">
                                    <span class="orange-text"><?php switch ($_SESSION['language_adidas']) 
                                    {
                                        case "es":  echo "Consultas y Dudas";   break;
                                        case "en":  echo "Questions";           break;
                                    } 
                                    ?>
                                    </span>
                                </h2>
                                <span style="margin-right:20px; font-size: 21px; color: grey;">Ismael Martínez</span>
                                <span style="margin-right:20px; font-size: 21px; color: grey;">
                                    <?php 
                                        switch ($_SESSION['language_adidas']) 
                                        {
                                            case "es":  echo "(Departamento de Ticketing Valencia Basket)";   break;
                                            case "en":  echo "(Valencia Basketball Ticketing Department)";    break;
                                        }
                                    ?>                                                    
                                </span>
                                <a href="mailto:imartinez@valenciabasket.com" target="_blank"><span style="margin-right:20px; font-size: 21px; color: grey;">imartinez@valenciabasket.com</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php require('includes/footer.php'); ?>
            <?php require "includes/cookies.php"; ?>

        </div> <!-- End Wrapper -->

        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <!-- Load Scripts End -->

        <script type="text/javascript">
            
            $("input[name='packs']").bind('keyup mouseup', function () {

                //var cantidadPack = $("input[name='packs']").val();
                var sanitized = $(this).val().replace(/[^0-9,]/g, '');

                // Remove the first point if there is more than one
                sanitized = sanitized.replace(/\.(?=.*\.)/, '');
                // Update value
                $(this).val(sanitized);

                $("span#quantity").text(sanitized*130.00);
            });

            $("#adidasNextGenerationForm").on('submit',function(e)
            {
                $.ajax({
                    type:       "POST",
                    url:        "?r=index/GestionaAdidasNextGenerationForm",
                    data:       $('#adidasNextGenerationForm').serialize(),
                    dataType:   "json",
                    beforeSend: function ()
                    {
                        //$("#adidasNextGenerationForm-respuesta").html("<div class='alert alert-info pt-1 pb-1 mb-0'></div>");
                    },
                    success: function(data)
                    {
                        if(data.response=="success")
                        {
                            $("#adidasNextGenerationForm-respuesta").html("<div class='alert alert-success  pt-1 pb-1 pl-1 pr-1'>" + data.message + "</div>");
                            $("#adidasNextGenerationForm-respuesta").fadeTo(4500, 500).slideUp(500, function () {
                                $("#adidasNextGenerationForm-respuesta").slideUp(500);
                            });
                        }
                        else
                        {
                            $("#adidasNextGenerationForm-respuesta").html("<div class='alert alert-danger  pt-1 pb-1 pl-1 pr-1'>" + data.message + "</div>");
                            $("#adidasNextGenerationForm-respuesta").fadeTo(4500, 500).slideUp(500, function () {
                                $("#adidasNextGenerationForm-respuesta").slideUp(500);
                            });
                        }
                    }
                });
                e.preventDefault();
            });
        </script>

    </body>
</html>                  