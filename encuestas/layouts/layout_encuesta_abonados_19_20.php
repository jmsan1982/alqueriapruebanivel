<!DOCTYPE html>
<html lang="es"> 
   <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">
    
    <style>
        .form-control{height: 60px;}
        textarea{height: 60px !important;}
        h4{min-height:2.6em;}
        .min95{min-height: 95vh;}
        .dropdown-menu{ border: 2px solid #eb7c00;}
        .dropdown-menu .text{color:#333;}
        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {color:#333;}
        @media only screen and (max-height: 800px) {
            h4{min-height:none;height:auto;}    
        }
        .col-md-6, .col-lg-6, .col-xl-6
        {flex:0 0 49.5%;}


        .btnpag {
            display: block;
            width: 45px;
            height: 40px;
            -webkit-transition: all 0.5s ease;
            -o-transition: all 0.5s ease;
            transition: all 0.5s ease;
            /* margin: 0 auto; */
            border: 3px solid #eb7c00;
            background-color: #aeaea5;;
        }
    </style>
    
    <body class="Pages" id="formus">
        <div class="wrapper overflow-x-hidden">
            <section id="page-content" class="overflow-x-hidden">
                
                <?php require ("includes/header.php"); ?>

                <div class="block background-f6 min95">
                    <div class="container">
                        <!-- Titulares y texto introductorio -->
                        <div class="row mb-2">
                            <div class="col-12 t-center">
                                <h2 class="section-title mb-0">
                                    ENCUESTA - <span class="orange-text"> VALENCIA BASKET CLUB ABONO GLOBAL 19/20 Y ABONO FEMENINO 19/20</span>
                                </h2>
                            </div>

                            <div class="col-12">
                                <hr>
                                <h4 class="section-title t-center">
                                    ??Gracias por dedicarnos tu tiempo! Tras completarla, recibir??s un c??digo que representa un ???15%??? de descuento en la Tienda Oficial de Valencia Basket.
                                </h4>
                                
                                <p class="t-center">Aunque estamos en un a??o de continua adaptaci??n, desde Valencia Basket queremos seguir construyendo nuestro futuro. Y, este, no ser?? posible sin ti. Por ello, solicitamos tu participaci??n en la siguiente encuesta. Es totalmente an??nima y confidencial. 
                                <b>A PER ELLS-ELLES!!!</b>
                                </p>
                            </div>
                        </div>

                        <!-- Encuesta -->
                        <div class="row">
                            <form id="encuesta-usuarios-form" class="boxed-form" method="post">
                                <div class="col-12">
                                    
                                    <!-- Preguntas cargadas desde base de datos style="display:none;"-->
                                    <div class="row mt-1">
                                        <div class="col-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>
                                    </div>
                                    
                                    <?php
                                    $contador_preguntas     =   0;
                                    $resetear_row           =   1;
                                    $ultimo_item_procesado  =   "";
                                    $contadorPaginas = 0;
                                    $empezar = true;
                                    $totalPreguntas = count($datos['preguntas']);

                                    foreach($datos["preguntas"] as $pregunta)
                                    {
                                        if ($empezar) {
                                            echo '<div id="paginador'.$contadorPaginas.'">';
                                            $contadorPaginas += 1;
                                            $empezar = false;
                                        }

                                        if($pregunta['tipo_pregunta']==="titulo")
                                        {
                                            $extra_row="";if($ultimo_item_procesado=="triple_radio"){$extra_row="<div class='col-12'><hr></div>";}
                                            $ultimo_item_procesado="titulo";
                                            if($resetear_row==0)
                                            {   
                                                echo "</div>";   
                                                $resetear_row=1;    
                                            }
                                    ?>      
                                            <div class='row'>
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                                <div class='col-12'>
                                                    <h4 class='mt-0'><?php echo $pregunta["pregunta"];?></h4>
                                                </div>
                                            </div>
                                    <?php
                                        }   
                                        else if($pregunta["tipo_pregunta"] == "triple_radio")
                                        {   
                                            $extra_row="";
                                            if($ultimo_item_procesado=="triple_radio"){     $extra_row="<div class='col-12'><hr></div>";    }
                                            $ultimo_item_procesado  =   "triple_radio";
                                            $array_opciones         =   explode(";",$pregunta["opciones_select"]);
                                    ?>
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                                    <label><b><?php echo $pregunta["pregunta"];?></b></label>
                                                </div>
                                                
                                                <div class="col-12 col-md-12">
                                                    <div class="form-group">
                                                        <div class="row">
                                                            
                                                            <div class="col-12 col-md-3 t-left">
                                                                <label class="control control--radio" style="font-size:15px;">
                                                                    <?php echo $array_opciones[0];?>
                                                                    <input type="radio" name="<?php echo $pregunta["id"]; ?>-pregunta-triple-radio" value="<?php echo $array_opciones[0];?>">
                                                                    <div class="control__indicator"></div>
                                                                </label>
                                                            </div>

                                                            <div class="col-12 col-md-3 t-left">
                                                                <label class="control control--radio" style="font-size:15px;">
                                                                    <?php echo $array_opciones[1];?>
                                                                    <input type="radio" name="<?php echo $pregunta["id"]; ?>-pregunta-triple-radio" value="<?php echo $array_opciones[1];?>">
                                                                    <div class="control__indicator"></div>
                                                                </label>
                                                            </div>
                                                            
                                                            <div class="col-12 col-md-3 t-left">
                                                                <label class="control control--radio" style="font-size:15px;">
                                                                    <?php echo $array_opciones[2];?>
                                                                    <input type="radio" name="<?php echo $pregunta["id"]; ?>-pregunta-triple-radio" value="<?php echo $array_opciones[2];?>">
                                                                    <div class="control__indicator"></div>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                        else if($pregunta["tipo_pregunta"] == "numero")
                                        {
                                            $extra_row="";if($ultimo_item_procesado=="triple_radio"){$extra_row="<div class='col-12'><hr></div>";}
                                            $ultimo_item_procesado="numero";
                                            if($resetear_row==1)
                                            {   echo "<div class='row'>".$extra_row;   }
                                    ?>
                                            <!-- Enunciado -->
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <h4 class="mt-0 mb-0"><?php echo $pregunta["pregunta"]; ?></h4>

                                                <ul name="ul-pregunta-<?php echo $pregunta["id"]; ?>" class="rating linea_encuesta mt-0 mb-0 pl-0">
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-0" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-1" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-2" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-3" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-4" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-5" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-6" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-7" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-8" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-9" class="star">&star;</li>
                                                    <li name="pregunta-<?php echo $pregunta["id"]; ?>-valor-10" class="star">&star;</li>
                                                </ul>
                                            </div>
                                    <?php
                                            if($resetear_row==1){$resetear_row=0;}
                                            else{
                                                echo "</div>";   
                                                $resetear_row=1;
                                            }
                                        }
                                        else if($pregunta["tipo_pregunta"] == "siyno")
                                        {
                                            $extra_row="";if($ultimo_item_procesado=="triple_radio"){$extra_row="<div class='col-12'><hr></div>";}
                                            $ultimo_item_procesado="siyno";
                                            if($resetear_row==1)
                                            {   echo "<div class='row'>".$extra_row;   }
                                    ?>
                                            <!-- Enunciado -->
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <h4 class="mt-0 mb-1"><?php echo $pregunta["pregunta"]; ?></h4>

                                                <div class="input-group">
                                                    <select id="<?php echo $pregunta["id"]; ?>-id-pregunta" 
                                                            name="<?php echo $pregunta["id"]; ?>-pregunta-sino" class="form-control w-100"
                                                    <?php if($pregunta['required']==1){echo " required";}?>>
                                                        <option value="">Seleccionar</option>
                                                        <option value="1">S??</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <?php
                                            if($resetear_row==1)
                                            {   $resetear_row=0;    }
                                            else
                                            {   echo "</div>";   
                                                $resetear_row=1;    }
                                        }
                                        else if($pregunta["tipo_pregunta"] == "abierta")
                                        {
                                            $extra_row="";if($ultimo_item_procesado=="triple_radio"){$extra_row="<div class='col-12'><hr></div>";}
                                            $ultimo_item_procesado="abierta";
                                            if($resetear_row==1)
                                            {   echo "<div class='row'>".$extra_row;   }
                                        ?>
                                            <!-- Enunciado -->
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <h4 class="mt-0 mb-1"><?php echo $pregunta["pregunta"]; ?></h4>

                                                 <!-- <textarea> !-->
                                                <textarea name="<?php echo $pregunta["id"]; ?>-pregunta-abierta" class="form-control" 
                                                    id="<?php echo $pregunta["id"]; ?>-id-pregunta"
                                                    style="border: #eb7c00 2px solid; height: 70px; resize: none; width: 100%;" 
                                                    maxlength="500" <?php if($pregunta["required"]==1){echo " required";}?>></textarea>
                                            </div>
                                        <?php
                                            if($resetear_row==1)
                                            {   $resetear_row=0;    }
                                            else
                                            {   echo "</div>";   
                                                $resetear_row=1;    }
                                        }
                                        else if($pregunta["tipo_pregunta"] == "select")
                                        {
                                            $extra_row="";if($ultimo_item_procesado=="triple_radio"){$extra_row="<div class='col-12'><hr></div>";}
                                            $ultimo_item_procesado="select";
                                            if($resetear_row==1)
                                            {   echo "<div class='row'>".$extra_row;   }
                                        ?>
                                            <!-- Enunciado -->
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                <h4 class="mt-0 mb-1"><?php echo $pregunta["pregunta"]; ?></h4>

                                                <!-- <select> con <option> cargados din??micamente desde base de datos -->
                                                <div class="input-group">
                                                    <select id="<?php echo $pregunta["id"]; ?>-id-pregunta"
                                                        <?php 
                                                        $selectpicker_class="";
                                                        if($pregunta["es_multiselect"]==="1")
                                                        {   
                                                            $selectpicker_class="selectpicker";
                                                            echo 'multiple';
                                                        }
                                                        ?>
                                                        name="<?php echo $pregunta["id"]; ?>-sel-pregunta" 
                                                        class="select-pregunta form-control w-100 <?php echo $selectpicker_class;?>" 
                                                        <?php if($pregunta['required']==1){echo " required";}?>>
                                                        <?php echo $pregunta['opciones_select']; ?>
                                                    </select>
                                                    <input id="<?php echo $pregunta["id"]; ?>-id-pregunta-otro" type="text" 
                                                           name="<?php echo $pregunta["id"]; ?>-sel-pregunta-otro" 
                                                           class="select-otro form-control w-100 mt-1" style="display:none;" placeholder="??Cu??l?"></input>
                                                </div>
                                            </div>
                                        <?php
                                        
                                            if($resetear_row==1)
                                            {   $resetear_row=0;    }
                                            else
                                            {   echo "</div>";   
                                                $resetear_row=1;    }
                                        }

                                        $contador_preguntas     +=   1;
                                        if($contador_preguntas==12 || $contador_preguntas == $totalPreguntas)
                                            {   $contador_preguntas=0;
                                            ?>  </div>
                                            <?php
                                            $empezar=true;
                                            }
                                    }
                                    ?>
                                    
                                    <!-- Pol??tica de privacidad y ENVIAR   style="display:none;"-->
                                    <div class="col-12 row mt-1 renovacion-row">   
                                        
                                        <!--
                                        <div class="col-12 mb-1">
                                            <p class="t-justify pl-1 pr-1">En cumplimiento de Ley Org??nica 3/2018, de 5 de diciembre, de Protecci??n de Datos Personales y garant??a de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado ser??n (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gesti??n integral de nuestra escuela de baloncesto y el mantenerle informado de las pr??ximas novedades y actividades de la Fundaci??n.</p>
                                            <p class="t-justify pl-1 pr-1">Se le informa tambi??n que puede ejercer los derechos de acceso, rectificaci??n, supresi??n, portabilidad, limitaci??n de tratamiento, cancelaci??n y en su caso, oposici??n, enviando una solicitud por escrito acompa??ada de la fotocopia de su DNI a la siguiente direcci??n: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a trav??s de  valencia.basket@valenciabasket.com as?? como reclamar ante la Agencia Espa??ola de Protecci??n de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protecci??n de datos.</p>
                                            <p class="t-justify pl-1 pr-1">Si desea ampliar m??s informaci??n sobre nuestra pol??tica de privacidad entre en nuestra web <a href="http://www.valenciabasket.com" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a></p>
                                        </div>

                                        <div id="respuesta" class="col-12 mb-1"></div>
                                        
                                        <div class="col-12 mb-1">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required>
                                                <p class="pl-1 pr-1">Acepto la pol??tica de privacidad.</p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        -->

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-1">

                                            <input id="id-participante" name="id_participante" type="hidden" value="anonimo">
                                            <input id="id-encuesta" name="id_encuesta" type="hidden" value="17">
                                            <button class="btn btn-link-w btn-block" type="submit" id="btn-enviar-btn">
                                                <span>ENVIAR</span>
                                            </button>
                                        </div>

                                        <div align="center" class="col-12 col-md-6 col-lg-6 col-xl-6 mb-1">
                                            
                                             <img src="img/dto_encuesta2.png" style="width: 100%;">
                                        </div>
                                        
                                        <div id="encuesta-usuarios-form-respuesta" class="col-12 mb-2"></div>

                                    </div>
                                    
                                </div>
                           </form>
                        </div>
                        <button class="btnpag" id=pagina1>1</button>
                        <button class="btnpag" id=pagina2>2</button>
                        <button class="btnpag" id=pagina3>3</button>
                    </div>
                </div>

            </section>

            <?php require('includes/footer.php'); ?>
            <?php require("includes/cookies.php"); ?>
        </div>
        
        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script src="js/jquery.validate.min.js"></script>

        <script type="text/javascript">
            var paginaActual = 0;
            $( document ).ready(function() {
                $('#paginador1').fadeOut(0);
                $('#paginador2').fadeOut(0);
            });

            $('#pagina1').on('click', function(){
                if (paginaActual != 0) {
                    $('#paginador0').fadeIn(150);
                    $('#paginador'+paginaActual).fadeOut(150);
                    paginaActual = 0;
                }
            });

            $('#pagina2').on('click', function(){
                if (paginaActual != 1) {
                    $('#paginador1').fadeIn(150);
                    $('#paginador'+paginaActual).fadeOut(150);
                    paginaActual = 1;
                }
            });

            $('#pagina3').on('click', function(){
                if (paginaActual != 2) {
                    $('#paginador2').fadeIn(150);
                    $('#paginador'+paginaActual).fadeOut(150);
                    paginaActual = 2;
                }
            });

            /*  BUSCAMOS EL EMAIL DEL USUARIO POR SI YA HA RELLENADO LA ENCUESTA. IDENCUESTA=17 */
            $("#buscar-email-usuario").on("click",function()
            {
                if( $("#email-form").val().trim() !== "" )
                {
                    var form_data = {
                        debug:          "true",  
                        email_usuario:  $("#email-form").val().trim(),  
                        idencuesta:     17,
                        nombre:         $("#nombre-form").val().trim(), 
                        cp:             $("#cpostal-form").val().trim(),
                        nacionalidad:   $("#nacionalidad-form").val().trim(), 
                        genero:         $("#genero-form").val().trim(),
                        edad:           $("#edad-form").val().trim()
                    };
                    
                    $.ajax({
                        type:       "POST",
                        url:        "?r=encuestas/BuscarParticipante",
                        data:       form_data,
                        dataType:   "json",
                        success:    function (data) 
                        {
                            if(data.response==="success")
                            {
                                $(".renovacion-row").show("250");
                                //$("#id-participante").val(data.instancia.id);
                            }
                            else
                            {
                                $("#buscar-email-usuario-respuesta").html("<div class='alert alert-danger'>"+data.message+"</div>");
                            }
                        }
                    });
                }
                else
                {   $("#buscar-email-usuario-respuesta").html("<div class='alert alert-danger'>Parece que el email es incorrecto.</div>");  }
            });

            //  Si las preguntas <select> seleccionan Otro sacamos input text
            $('body').on('change','.select-pregunta',function()
            {
                if($(this).val()==="Otro")
                {   
                    $(this).siblings(".select-otro").show();
                } 
                else
                {   
                    $(this).siblings(".select-otro").hide();
                }
            });
            
            //  Enviamos el formulario
            $('#encuesta-usuarios-form').validate(
            {
                submitHandler:function()
                {   
                    //  Hay que recorrer los .selectpicker
                    var multiselect = [];
                    $('.selectpicker').each(function(index, brand)
                    {
                        //  Cojo el ID del multiselect en cuesti??n
                        var id=$(this).attr("id");
                        //  Cojo las <option> seleccionadas del multiselect en cuestion
                        var options = $('#'+id+' option:selected');
                        //  Las a??ado a un array
                        var selected = [];
                        $(options).each(function(index, option){
                            selected.push([$(this).val()]);
                        });
                        
                        //console.log("==================================");
                        //console.log($(this).attr("name"));
                        //console.log(selected);
                        var aux=$(this).attr("name")+selected+"--";
                        //console.log(aux);
                        multiselect.push(aux);
                        // console.log(multiselect);
                    });
                    
                    //  Hacemos llamada AJAX
                    var data = $('#encuesta-usuarios-form').serialize()+"&multiselect="+multiselect;
                    
                    $.ajax({
                        type:       "POST",
                        url:        "?r=encuestas/RellenarEncuesta",
                        data:       data,
                        dataType:   "json",
                        beforeSend: function()
                        {
                            $("#btn-enviar-btn").prop('disabled', true);
                            $("#encuesta-usuarios-form-respuesta").html("<div class='col 12 alert alert-info mb-0'>\n\
                                <img src='img/loading.gif' style='width: 3%'> Por favor, espere mientras se env??an los datos</div>");
                        },
                        success:    function(data)
                        {
                            if(data.response==="success")
                            {
                                $("#encuesta-usuarios-form-respuesta").html("<div class='alert alert-success'>"+data.message+"</div>");
                                $("#encuesta-usuarios-form-respuesta").fadeTo(10000, 500).slideUp(500,function(){
                                    $("#encuesta-usuarios-form-respuesta").slideUp(500);
                                    $("#encuesta-usuarios-form-respuesta").html("");
                                    window.location.reload(true);
                                });
                            }
                            else if(data.response==="error")
                            {
                                $("#btn-enviar-btn").prop('disabled', false);
                                $('#encuesta-usuarios-form-respuesta').html("<div class='alert alert-danger'>" + data.message + "</div>");
                                $("#encuesta-usuarios-form-respuesta").fadeTo(4000, 500).slideUp(500,function(){
                                    $("#encuesta-usuarios-form-respuesta").slideUp(500);
                                    $("#encuesta-usuarios-form-respuesta").html("");
                                });
                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>