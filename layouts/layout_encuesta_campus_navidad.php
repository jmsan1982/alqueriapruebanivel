<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/encuesta.css">

    <script>
        $(
          function () {
            $('li').on('click', function(){
              var selectedCssClass = 'selected';
              var $this = $(this);
              $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
              $this
                .addClass(selectedCssClass)
                .parent().addClass('vote-cast');
            });
          }
        );
    </script>
    
    <body class="Pages">
        <div class="wrapper overflow-x-hidden">
            <?php require('includes/header.php'); ?>
            <section id="page-content" class="overflow-x-hidden margin-top-header">

                <div class="block background-f6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                            </div>

                            <div class="col-md-9 t-left">
                                <h2 class="section-title">
                                    Encuesta <span class="orange-text">Campus Navidad 2018</span>
                                </h2>
                            </div>
                        </div>

                        <div class="row">
                            <form id="encuesta-campus-navidad-2018-form" class="boxed-form" method="post">
                                <input id="id_encuesta"     type="hidden" name="id_encuesta" value="1">
                                <input id="id_participante" type="hidden" value="<?php if(isset($_SESSION['id_participante'])){echo $_SESSION['id_participante'];};?>">
                                
                                <!-- PARTE 2 -->
                                <div class="form-group col-12">
                                    <div class="row"> 
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                1. ¿Cómo valoras la experiencia del Campus de Navidad?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-1" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-1-valor-1" class="star">&star;</li>
                                                <li id="pregunta-1-valor-2" class="star">&star;</li>
                                                <li id="pregunta-1-valor-3" class="star">&star;</li>
                                                <li id="pregunta-1-valor-4" class="star">&star;</li>
                                                <li id="pregunta-1-valor-5" class="star">&star;</li>
                                                <li id="pregunta-1-valor-6" class="star">&star;</li>
                                                <li id="pregunta-1-valor-7" class="star">&star;</li>
                                                <li id="pregunta-1-valor-8" class="star">&star;</li>
                                                <li id="pregunta-1-valor-9" class="star">&star;</li>
                                                <li id="pregunta-1-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                2. ¿Te han gustado los entrenamientos de basket?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-2" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-2-valor-1" class="star">&star;</li>
                                                <li id="pregunta-2-valor-2" class="star">&star;</li>
                                                <li id="pregunta-2-valor-3" class="star">&star;</li>
                                                <li id="pregunta-2-valor-4" class="star">&star;</li>
                                                <li id="pregunta-2-valor-5" class="star">&star;</li>
                                                <li id="pregunta-2-valor-6" class="star">&star;</li>
                                                <li id="pregunta-2-valor-7" class="star">&star;</li>
                                                <li id="pregunta-2-valor-8" class="star">&star;</li>
                                                <li id="pregunta-2-valor-9" class="star">&star;</li>
                                                <li id="pregunta-2-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                3. ¿Te has sentido bien con los entrenadores y monitores?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-3" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-3-valor-1" class="star">&star;</li>
                                                <li id="pregunta-3-valor-2" class="star">&star;</li>
                                                <li id="pregunta-3-valor-3" class="star">&star;</li>
                                                <li id="pregunta-3-valor-4" class="star">&star;</li>
                                                <li id="pregunta-3-valor-5" class="star">&star;</li>
                                                <li id="pregunta-3-valor-6" class="star">&star;</li>
                                                <li id="pregunta-3-valor-7" class="star">&star;</li>
                                                <li id="pregunta-3-valor-8" class="star">&star;</li>
                                                <li id="pregunta-3-valor-9" class="star">&star;</li>
                                                <li id="pregunta-3-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                4. ¿Cómo valorarías las instalaciones deportivas del Colegio Iale?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-4" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-4-valor-1" class="star">&star;</li>
                                                <li id="pregunta-4-valor-2" class="star">&star;</li>
                                                <li id="pregunta-4-valor-3" class="star">&star;</li>
                                                <li id="pregunta-4-valor-4" class="star">&star;</li>
                                                <li id="pregunta-4-valor-5" class="star">&star;</li>
                                                <li id="pregunta-4-valor-6" class="star">&star;</li>
                                                <li id="pregunta-4-valor-7" class="star">&star;</li>
                                                <li id="pregunta-4-valor-8" class="star">&star;</li>
                                                <li id="pregunta-4-valor-9" class="star">&star;</li>
                                                <li id="pregunta-4-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                5. ¿Cómo valorarías el resto de instalaciones?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-5" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-5-valor-1" class="star">&star;</li>
                                                <li id="pregunta-5-valor-2" class="star">&star;</li>
                                                <li id="pregunta-5-valor-3" class="star">&star;</li>
                                                <li id="pregunta-5-valor-4" class="star">&star;</li>
                                                <li id="pregunta-5-valor-5" class="star">&star;</li>
                                                <li id="pregunta-5-valor-6" class="star">&star;</li>
                                                <li id="pregunta-5-valor-7" class="star">&star;</li>
                                                <li id="pregunta-5-valor-8" class="star">&star;</li>
                                                <li id="pregunta-5-valor-9" class="star">&star;</li>
                                                <li id="pregunta-5-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                6. ¿Estas satisfecho con la comida del campus?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-6" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-6-valor-1" class="star">&star;</li>
                                                <li id="pregunta-6-valor-2" class="star">&star;</li>
                                                <li id="pregunta-6-valor-3" class="star">&star;</li>
                                                <li id="pregunta-6-valor-4" class="star">&star;</li>
                                                <li id="pregunta-6-valor-5" class="star">&star;</li>
                                                <li id="pregunta-6-valor-6" class="star">&star;</li>
                                                <li id="pregunta-6-valor-7" class="star">&star;</li>
                                                <li id="pregunta-6-valor-8" class="star">&star;</li>
                                                <li id="pregunta-6-valor-9" class="star">&star;</li>
                                                <li id="pregunta-6-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                7. ¿Cómo valorarías la limpieza de las instalaciones?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-7" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-7-valor-1" class="star">&star;</li>
                                                <li id="pregunta-7-valor-2" class="star">&star;</li>
                                                <li id="pregunta-7-valor-3" class="star">&star;</li>
                                                <li id="pregunta-7-valor-4" class="star">&star;</li>
                                                <li id="pregunta-7-valor-5" class="star">&star;</li>
                                                <li id="pregunta-7-valor-6" class="star">&star;</li>
                                                <li id="pregunta-7-valor-7" class="star">&star;</li>
                                                <li id="pregunta-7-valor-8" class="star">&star;</li>
                                                <li id="pregunta-7-valor-9" class="star">&star;</li>
                                                <li id="pregunta-7-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>    
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                8. ¿Has hecho amigos/as nuevos?
                                            </h4>
                                        </div>  
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-8" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                9. ¿Te ha gustado el ambiente general del campus?
                                            </h4>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-9" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">Sí</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                10. En general, tu nivel de satisfacción, ¿ha sido?
                                            </h4>
                                        </div>   
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-10" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-10-valor-1" class="star">&star;</li>
                                                <li id="pregunta-10-valor-2" class="star">&star;</li>
                                                <li id="pregunta-10-valor-3" class="star">&star;</li>
                                                <li id="pregunta-10-valor-4" class="star">&star;</li>
                                                <li id="pregunta-10-valor-5" class="star">&star;</li>
                                                <li id="pregunta-10-valor-6" class="star">&star;</li>
                                                <li id="pregunta-10-valor-7" class="star">&star;</li>
                                                <li id="pregunta-10-valor-8" class="star">&star;</li>
                                                <li id="pregunta-10-valor-9" class="star">&star;</li>
                                                <li id="pregunta-10-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>    
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                11. A continuación puede ayudarnos con alguna opinión o sugerencia
                                            </h4>
                                        </div>  
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-11" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div>    
                                        
                                        <div class="col-12 col-lg-6 redimension">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required>
                                                <p>Acepto la política de privacidad.</p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12 col-lg-4 mb-2">
                                            <button class="btn btn-link-w w-100" type="submit" id="submitOficinas"><span>ENVIAR</span></button>
                                        </div>
                                        
                                        <div id="encuesta-campus-navidad-2018-form-respuesta" class="col-12"></div>

                                        <div class="col-12 col-sm-12 mb-2">
                                            <p class="t-justify">En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal, su Reglamento de Desarrollo (RD-1720*2007) y el nuevo Reglamento Europeo de Protección de Datos (RGPD), 
                                            se le comunica que sus datos están incorporados a una base de datos titularidad de VALENCIA BASKET CLUB, S.A.D con CIF A4640693 y cuya finalidad es el tratamiento de estos, con el fin de llevar a cabo la 
                                            gestión integral de la jornada de puertas abiertas y el mentenerles informados. Así como la comunicación y tratamiento de su imagen, parcial o total, en cualquier soporte gráfico o visual (fotografía, video o similar) para su uso
                                            en los medios de difusión presentes y futuros del VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.). Por lo tanto, Vd. podrá recibir puntual información al respecto de esta
                                            jornada y de las que en un futuro pudiéramos realizar, así como de otras actividades del VALENCIA BASKET CLUB, S.A.D. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, 
                                            limitación de tratamiento, cancelación y en su caso, opositición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: HERMANOS MARISTAS 16, 46013, VALENCIA o a través de: 
                                            valencia.valencia@valenciabasket.com; Sus datos podrán ser comunicaciones a FUNDACIO VALENCIA BASQUET 2000 para los mismos tratamientos arriba mencionados. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, 
                                            cancelación, y , en su caso, oposición, para esta cesión, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: HERMANOS MARISTAS 16, 46013, VALENCIA o a través de rgpd@alqueriadelbasket.com</p>
                                        </div>
                                    </div>
                                </div>
                                
                                
                           </form>
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
        
        <script type="text/javascript">
            $('#encuesta-campus-navidad-2018-form').validate({
                submitHandler:function(){
                    // Recogemos los valores del formulario
                        var form_data = {
                            form_id: "encuesta_campus_navidad_2018_participacion_nueva",
                            id_participante: $("#id_participante").val(),
                            id_encuesta:     $("#id_encuesta").val(),
                            
                            respuesta_simple_01: $("#ul-pregunta-1 li.selected").attr('id'),
                            respuesta_simple_02: $("#ul-pregunta-2 li.selected").attr('id'),
                            respuesta_simple_03: $("#ul-pregunta-3 li.selected").attr('id'),
                            respuesta_simple_04: $("#ul-pregunta-4 li.selected").attr('id'),
                            respuesta_simple_05: $("#ul-pregunta-5 li.selected").attr('id'),
                            respuesta_simple_06: $("#ul-pregunta-6 li.selected").attr('id'),
                            respuesta_simple_07: $("#ul-pregunta-7 li.selected").attr('id'),

                            respuesta_siyno_08: $("#pregunta-8 option:selected").val(),
                            respuesta_siyno_09: $("#pregunta-9 option:selected").val(),

                            respuesta_simple_10: $("#ul-pregunta-10 li.selected").attr('id'),

                            respuesta_abierta_11: $("#pregunta-11").val()
                        };
            
                    //  Hacemos inserción
                        $.ajax({
                            type: "POST",
                            url: "?r=encuestas/ParticipacionNueva",
                            data: form_data,
                            dataType: "json",
                            success: function(data){
                                if(data.response==="success"){
                                    // window.location.href = "index.php?r=encuestas/encuestacampusnavidadgracias";
                                    $('#encuesta-campus-navidad-2018-form-respuesta').html("<div class='alert alert-success w-100' style='padding:1.5em 1em;width:100%;font-size:1.3em;'>" + data.message + "</div>");
                                    $("#encuesta-campus-navidad-2018-form-respuesta").fadeTo(4000, 500).slideUp(500,function(){
                                        $("#encuesta-campus-navidad-2018-form-respuesta").slideUp(500);
                                        $("#encuesta-campus-navidad-2018-form-respuesta").html("");
                                    });
                                    setTimeout("location.href = 'index.php';", 5000);
                                }
                                else if(data.response==="error"){
                                    $('#encuesta-campus-navidad-2018-form-respuesta').html("<div class='alert alert-danger w-100' style='padding:1.5em 1em;width:100%;font-size:1.3em;'>" + data.message + "</div>");
                                    $("#encuesta-campus-navidad-2018-form-respuesta").fadeTo(4000, 500).slideUp(500,function(){
                                        $("#encuesta-campus-navidad-2018-form-respuesta").slideUp(500);
                                        $("#encuesta-campus-navidad-2018-form-respuesta").html("");
                                    });
                                }
                            }
                        });
                }
            });
        </script>
    </body>
</html>