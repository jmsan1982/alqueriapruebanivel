<!DOCTYPE html>
<html lang="es"> 
    <?php require("includes/head.php"); ?>
    
    <body class="Pages">
        <div class="wrapper overflow-x-hidden">
            <section id="page-content" class="overflow-x-hidden">

                <div class="block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="parallax col-12" style="background-image: url('img/fondo-encuesta.jpg');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block background-f6">
                    <div class="container">
                        
                        <!-- Titulares y texto introductorio -->
                        <div class="row mb-2">
                            <div class="col-12 t-center">
                                <h2 class="section-title mb-0">
                                    Encuesta <span class="orange-text">Patrocinadores</span>
                                </h2>
                            </div>

                            <div class="col-12">
                                <h4 class="section-title">
                                    Queremos saber tu opinión sobre L’Alqueria del Basket
                                </h4>
                            </div>

                            <div class="col-12">
                                <p>A continuación, encontrará una serie de preguntas destinadas a conocer su opinión sobre diversos aspectos del L’Alqueria del Basket. Mediante ellas queremos conocer lo que piensan nuestros patrocinadores sobre nosotros.</p>
                                <p>El tiempo de realización de la misma <u>no supera los 5 minutos</u>. Por favor lea detenidamente cada pregunta y conteste la alternativa que más se acerca a lo que piensa. Muchas gracias.</p>
                            </div>
                        </div>

                        <!-- Encuesta -->
                        <div class="row">
                            <form id="encuesta-patrocinadores-form" class="boxed-form" method="post">
                                <div class="form-group col-12">
                                    <div class="row">

                                        <div class="col-12">
                                            <h4 class="mt-0 mb-1">
                                                Nombre de la entidad patrocinadora (<strong>opcional</strong>):
                                            </h4>
                                        </div>
                                        
                                        <div class="col-12 mb-2">
                                            <input type="text" id="nombre" class="form-control" maxlength="100">
                                        </div>

                                        <?php
                                        foreach ($datos["patrocinadores"] as $pregunta ) {
                                            if($pregunta["tipo_pregunta"] == "numero"){
                                            ?>
                                                <div class="col-12">
                                                    <h4 class="mt-0 mb-0">
                                                        <?php echo utf8_encode($pregunta["pregunta"]); ?>
                                                    </h4>
                                                </div>

                                                <div class="col-12 mb-2">
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
                                            }else if($pregunta["tipo_pregunta"] == "siyno"){
                                            ?>
                                                <div class="col-12">
                                                    <h4 class="mt-0 mb-1">
                                                        <?php echo utf8_encode($pregunta["pregunta"]); ?>
                                                    </h4>
                                                </div>

                                                <div class="col-12 mb-2">
                                                    <div class="input-group">
                                                        <select name="pregunta-<?php echo $pregunta["id"]; ?>" class="form-control w-100" required>
                                                            <option value="">Seleccionar</option>
                                                            <option value="Si">Sí</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                    </div>
                                                </div>

                                            <?php

                                            }else if($pregunta["tipo_pregunta"] == "abierta"){
                                            ?>
                                                <div class="col-12">
                                                    <h4 class="mt-0 mb-1">
                                                        <?php echo utf8_encode($pregunta["pregunta"]); ?>
                                                    </h4>
                                                </div>
                                                
                                                <div class="col-12 mb-2">
                                                    <textarea name="pregunta-<?php echo $pregunta["id"]; ?>" class="form-control" style="border: #eb7c00 2px solid; height: 70px; resize: none; width: 100%;" maxlength="500" required></textarea>
                                                </div>
                                            <?php
                                            }
                                        }
                                        ?>
                                        
                                        <div class="col-12 mb-1">
                                            <p class="t-justify">En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal 15/1999 de 13 de Diciembre, el Real Decreto 1720/2007 por el que se regula su reglamento de desarrollo y Reglamento Europeo 2016/679 del parlamento europeo y del consejo de 27 de Abril de 2016, se le comunica que sus datos serán incorporados a una base de datos titularidad de FUNDACIÓ VALENCIA BASKET 2000 con CIF G96614474 y cuyas finalidades son: la GESTIÓN DE ENCUESTAS y el mantenerle informado de las próximas novedades y actividades del club. Por lo tanto, Vd. podrá recibir puntual información al respecto de las actividades que en un futuro pudiéramos realizar en la FUNDACIÓ VALENCIA BASKET 2000.</p>
                                            <p class="t-justify">Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART S/N, 46013, VALENCIA o a través de valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.</p>
                                            <p>Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href="http://www.valenciabasket.com" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a></p>
                                        </div>

                                        <div id="respuesta" class="col-12 mb-1">
                                        </div>
                                        
                                        <div class="col-12 mb-1">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required>
                                                <p>Acepto la política de privacidad.</p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-2">
                                            <input id="id-participante" name="id-participante" type="hidden">
                                            <button class="btn btn-link-w" type="submit">
                                                <span>ENVIAR</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>                                
                                
                           </form>
                        </div>
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
        <!-- Load Scripts End -->
        
    </body>
</html>