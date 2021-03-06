<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/encuesta.css">
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

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
                                    Encuesta <span class="orange-text">jugadores 19/20</span>
                                </h2>
                            </div>
                        </div>

                        <div class="row">
                            <form id="encuesta-jugadores-19-20-form" class="boxed-form" method="post">
                                <input id="id_encuesta"     type="hidden" name="id_encuesta" value="14">
                                <input id="id_participante" type="hidden" value="<?php if(isset($_SESSION['id_participante'])){echo $_SESSION['id_participante'];};?>">
                                
                                <!-- PARTE 2 -->
                                <div class="form-group col-12">
                                    <div class="row"> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                1. Direcci??n de correo electr??nico *
                                            </h4>
                                        </div> 
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-1" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="100" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                2. Nombre y apellidos *
                                            </h4>
                                        </div> 
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-2" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="100" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                3. C??digo Postal *
                                            </h4>
                                        </div> 
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-3" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="15" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                4. Edad *
                                            </h4>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-4" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="15" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                5. G??nero (F/M)  *
                                            </h4>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-5" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="10" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                6. Nacionalidad *
                                            </h4>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-6" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                7. Durante el a??o 2019-2020, he cursado:
                                            </h4>
                                        </div>
                                         

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-7" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Educaci??n primaria">Educaci??n primaria</option>
                                                    <option value="Educaci??n secundaria">Educaci??n secundaria</option>
                                                    <option value="Bachillerato">Bachillerato</option>
                                                    <option value="Formaci??n profesional">Formaci??n profesional</option>
                                                    <option value="Formaci??n universitaria">Formaci??n universitaria</option>
                                                </select>
                                            </div>
                                        </div>    

                                       

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                8. ??Est??s satisfecho con la presencia y comportamiento del personal?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-8" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-8-valor-1" class="star">&star;</li>
                                                <li id="pregunta-8-valor-2" class="star">&star;</li>
                                                <li id="pregunta-8-valor-3" class="star">&star;</li>
                                                <li id="pregunta-8-valor-4" class="star">&star;</li>
                                                <li id="pregunta-8-valor-5" class="star">&star;</li>
                                                <li id="pregunta-8-valor-6" class="star">&star;</li>
                                                <li id="pregunta-8-valor-7" class="star">&star;</li>
                                                <li id="pregunta-8-valor-8" class="star">&star;</li>
                                                <li id="pregunta-8-valor-9" class="star">&star;</li>
                                                <li id="pregunta-8-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                9. ??Est??s satisfecho con la eficacia y la informaci??n recibida en Recepci??n?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-9" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-9-valor-1" class="star">&star;</li>
                                                <li id="pregunta-9-valor-2" class="star">&star;</li>
                                                <li id="pregunta-9-valor-3" class="star">&star;</li>
                                                <li id="pregunta-9-valor-4" class="star">&star;</li>
                                                <li id="pregunta-9-valor-5" class="star">&star;</li>
                                                <li id="pregunta-9-valor-6" class="star">&star;</li>
                                                <li id="pregunta-9-valor-7" class="star">&star;</li>
                                                <li id="pregunta-9-valor-8" class="star">&star;</li>
                                                <li id="pregunta-9-valor-9" class="star">&star;</li>
                                                <li id="pregunta-9-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                10. ??Est??s satisfecho con la limpieza y mantenimiento de las instalaciones?
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
                                            <h4 class="t-left mt-0 mb-0">
                                                11. ??Est??s satisfecho con el servicio de seguridad de la instalaci??n? *
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-11" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-11-valor-1" class="star">&star;</li>
                                                <li id="pregunta-11-valor-2" class="star">&star;</li>
                                                <li id="pregunta-11-valor-3" class="star">&star;</li>
                                                <li id="pregunta-11-valor-4" class="star">&star;</li>
                                                <li id="pregunta-11-valor-5" class="star">&star;</li>
                                                <li id="pregunta-11-valor-6" class="star">&star;</li>
                                                <li id="pregunta-11-valor-7" class="star">&star;</li>
                                                <li id="pregunta-11-valor-8" class="star">&star;</li>
                                                <li id="pregunta-11-valor-9" class="star">&star;</li>
                                                <li id="pregunta-11-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                12. Escriba las observaciones, comentarios o sugerencias que nos desea transmitir sobre las instalaciones.
                                            </h4>
                                        </div> 
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-12" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div>   

                                        

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                13. ??Con qu?? frecuencia asistes al centro? *
                                            </h4>
                                        </div> 
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-13" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="">Ocasionalmente</option>
                                                    <option value="0">Una vez a la semana</option>
                                                    <option value="0">2/3 veces a la semana</option>
                                                    <option value="0">4 o m??s veces</option>
                                                </select>
                                            </div>
                                        </div>    

                                          
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                14. ??Cu??nto tiempo tardas en desplazarte hasta L'Alqueria desde tu residencia habitual?
                                            </h4>
                                        </div>  
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-14" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">Menos de 30 minutos</option>
                                                    <option value="0">Entre 30 minutos y 1 hora</option>
                                                    <option value="0">M??s de 1 hora</option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                15. ??Cuanto tiempo permaneces en L'Alqueria del basket? *
                                            </h4>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-15" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">De 0 a 4 horas semanales</option>
                                                    <option value="0">De 4 a 8 horas semanales</option>
                                                    <option value="1">De 8 a 10 horas semanales</option>
                                                    <option value="0">M??s de 10 horas semanales</option>
                                                </select>
                                            </div>
                                        </div> 
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                16. ??En cu??l de estas actividades participas? *
                                            </h4>
                                        </div>   
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-16" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">Entrenamientos</option>
                                                    <option value="0">Clases de Ingles - N?? 16</option>
                                                    <option value="1">Cl??nics formaci??n</option>
                                                    <option value="0">Otro</option>
                                                </select>
                                            </div>
                                        </div>  
                                        
                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                17. Escriba las observaciones, comentarios o sugerencias que nos desea transmitir sobre las actividades anteriores en las que participas.
                                            </h4>
                                        </div>  
                                        
                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-17" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div>   



                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                18. ??Eres usuario de la sala "16 de juny de 2017" tambi??n conocida como "Sala de estudio"? Esta sala la usan todos aquellos usuarios de L'alqueria que necesitan un espacio m??s tranquilo para trabajar y estudiar.
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-18" class="form-control w-100" required>
                                                    <option value="">S??, la mayor??a de los d??as que acudo a L'alqueria</option>
                                                    <option value="1">S??, pero ocasionalmente</option>
                                                    <option value="0">No</option>
                                                    <option value="1">No, porque no sabia que esa sala exist??a</option>
                                                    <option value="0">Otro</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                19. ??Crees que se deber??a de incorporar WI-FI en L'Alqueria?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-19" class="form-control w-100" required>
                                                    <option value="">S??, la usar??a</option>
                                                    <option value="1">S??, pero no la usar??a</option>
                                                    <option value="0">No es necesario</option>
                                                    <option value="0">Otro</option>
                                                </select>
                                            </div>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                20. ??Qu?? elementos consideras importantes para que tu experiencia en el centro sea positiva? 
                                            </h4>
                                        </div>

                                        






                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                21. Si eres usuario del gimnasio de L'Alqueria responde la siguiente pregunta, ??crees que hay todo el material necesario para una adecuada preparaci??n f??sica?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-21" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                22. ??Estas satisfecho con el servicio de nuestros preparadores f??sicos?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-22" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                23. Escriba las observaciones, comentarios o sugerencias que nos desea transmitir sobre el gimnasio y nuestros preparadores.
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-23" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                24. Si has sido usuario o eres usuario de nuestro servicio de fisioterapia, por favor, contesta la siguiente pregunta, ??crees que hay un buen servicio para la recuperaci??n y tratamiento de lesiones?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-24" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                25. ??Estas satisfecho con el servicio de nuestros fisioterapeutas?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-25" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                26. Escriba las observaciones, comentarios o sugerencias que nos desea transmitir sobre el servicio de fisioterapia.
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-26" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                27. Si has sido o eres usuario de nuestro servicio m??dico, por favor contesta la siguiente pregunta, ??Crees que hay un buen servicio para la supervisi??n y observaci??n de la salud de los jugadores?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-27" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                28. Escriba las observaciones, comentario o sugerencias que nos desea transmitir sobre el servicio m??dico.
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-28" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div> 

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                29. ??Qu?? argumentos consideras importantes para valorar a un entrenador?
                                            </h4>

                                            <h4 class="t-left mt-0 mb-1">
                                               Saber comunicar
                                            </h4>

                                            <h4 class="t-left mt-0 mb-1">
                                               Conocer a los jugadores          

                                            </h4>
                                            <h4 class="t-left mt-0 mb-1">
                                               Conocer a los jugadores          

                                            </h4>
                                            <h4 class="t-left mt-0 mb-1">
                                               Importancia al juego        

                                            </h4>


                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                30. ??Puedes explicarnos a qu?? edad y por qu?? empezaste a jugar a basket? ??Qu?? deportes has practicado?
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-30" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                31. ??Cu??les son tus motivaciones para practicar deporte? 
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-31" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Relacionarte">Relacionarte con otras personas</option>
                                                    <option value="Mejorar tu imagen">Mejorar tu imagen personal</option>
                                                    <option value="Sentirte bien">Sentirte bien</option>
                                                    <option value="Competir">Competir</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div> 

                                        <option value="">Seleccionar</option>
                                        <option value="No suelo consumir">No suelo consumir</option>
                                        <option value="Ocasionalmente">Ocasionalmente</option>
                                        <option value="Habitualmente">Habitualmente</option>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                32. Ind??canos la frecuencia con la que realizas estas actividades en tu tiempo libre: 
                                                    Nunca   Ocasionalmente  Habitualmente
Hacer deporte           
Espect??culos deportivos         
Salir con amigos            
Viajar          
Lectura         
Visitar museos          
Ir al cine          
Ir al teatro            
Hacer deporte           
Espect??culos deportivos         
Salir con amigos            
Viajar          
Lectura         
Visitar museos          
Ir al cine          
Ir al teatro
                                            </h4>
                                        </div>


                                         <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                33. Para ti, hacer deporte... *
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-33" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="estar en forma">Te permite estar en forma</option>
                                                    <option value="relacionarte con los dem??s">Es un modo de relacionarte con los dem??s</option>
                                                    <option value="Te permite competir">Te permite competir y vivir m??s intensamente</option>
                                                    <option value="forma de educaci??n">Es una forma de educaci??n</option>
                                                    <option value="Es diversi??n">Es diversi??n y entretenimiento</option>
                                                    <option value="experimentar la naturaleza">Es una forma de experimentar la naturaleza</option>
                                                    <option value="Sirve para relajarte">Sirve para relajarte</option>

                                                </select>
                                            </div>
                                        </div>  


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                34. ??Te importa mucho tu imagen personal? *
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-34" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Si, es un aspecto fundamental">S??, es un aspecto fundamental en mi vida</option>
                                                    <option value="Si, pero no me obsesiona">Si, pero no me obsesiona</option>
                                                    <option value="No me preocupa demasiado">No, no me preocupa demasiado</option>
                                                    <option value="No me preocupa en absoluto">No, no me preocupa en absoluto</option>
                                                </select>
                                            </div>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                35. ??Cuidas tu alimentaci??n? *
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-35" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Si">S??</option>
                                                   
                                                    <option value="No">No</option>
                                                    <option value="En momentos puntuales">S??lo en momentos puntuales (d??as previos a competiciones, operaci??n bikini...)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                36. ??Nos puedes indicar la frecuencia de consumo de ??stos productos? *
                                                No suelo consumir   Ocasionalmente  Habitualmente
Agua mineral            
L??cteos         
Refrescos           
Zumos           
Bebidas isot??nicas          
Boller??a            
Comida r??pida           
Agua mineral            
L??cteos         
Refrescos           
Zumos           
Bebidas isot??nicas          
Boller??a            
Comida r??pida

                                            </h4>
                                        </div> 


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                37. ??Crees que es importante que un nutricionista te asesore sobre tu alimentaci??n?
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-37" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S?? y adem??s tengo nutricionista</option>
                                                    <option value="1">S??, pero no tengo nutricionista</option>
                                                    <option value="0">No</option>
                                                    <option value="0">otro</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                38. ??Crees que ser??a interesante que las empresas patrocinadoras te pudieran ofrecer ventajas exclusivas por ser usuario de L'Alqueria del basket? *
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-38" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">S??, me parecer??a muy ??til</option>
                                                    <option value="1">No lo considero interesante</option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                39. ??C??mo accedes a la informaci??n sobre L'alqueria del basket? *
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-39" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="En el propio centro">En el propio centro</option>
                                                    <option value="Tel??fono recepci??n">Tel??fono recepci??n</option>
                                                    <option value="Web">Web de L'Alqueria del basket</option>
                                                    <option value="Grupo de Whatsapp">Grupo de Whatsapp para madres/padres de jugadores</option>
                                                    <option value="Amigos">Amigos</option>
                                                    <option value="otro">otro</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                40. ??A??adir??as alguna red social a las que usa la instalaci??n para comunicar? *
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-40" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">Si, indica cu??l en la ??ltima casilla</option>
                                                    <option value="1">No</option>

                                                    <option value="0">otro</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                41. ??C??mo valorar??as el materia audiovisual que publica el club?
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-41" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="1">No lo veo</option>
                                                    <option value="1">Es mejorable</option>
                                                    <option value="1">Me gusta</option>
                                                    <option value="0">Es muy completo</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                42. ??En qu?? red social prefieres consumir material audiovisual?
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-42" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Twitter">Twitter</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-1">
                                                43. ??Eres seguidor de L'alqueria del basket en las Redes Sociales? Indica en cu??les.
                                            </h4>
                                        </div> 

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <div class="input-group">
                                                <select id="pregunta-43" class="form-control w-100" required>
                                                    <option value="">Seleccionar</option>
                                                    <option value="No">No</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Twitter">Twitter</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                44. ??C??mo valorar??as el contenido de nuestras Redes sociales?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-44" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-44-valor-1" class="star">&star;</li>
                                                <li id="pregunta-44-valor-2" class="star">&star;</li>
                                                <li id="pregunta-44-valor-3" class="star">&star;</li>
                                                <li id="pregunta-44-valor-4" class="star">&star;</li>
                                                <li id="pregunta-44-valor-5" class="star">&star;</li>
                                                <li id="pregunta-44-valor-6" class="star">&star;</li>
                                                <li id="pregunta-44-valor-7" class="star">&star;</li>
                                                <li id="pregunta-44-valor-8" class="star">&star;</li>
                                                <li id="pregunta-44-valor-9" class="star">&star;</li>
                                                <li id="pregunta-44-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                45. ??C??mo valorar??as la web de L'Alqueria del Basket?
                                            </h4>
                                        </div>   

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <ul id="ul-pregunta-45" class="rating mt-0 mb-0 pl-0">
                                                <li id="pregunta-45-valor-1" class="star">&star;</li>
                                                <li id="pregunta-45-valor-2" class="star">&star;</li>
                                                <li id="pregunta-45-valor-3" class="star">&star;</li>
                                                <li id="pregunta-45-valor-4" class="star">&star;</li>
                                                <li id="pregunta-45-valor-5" class="star">&star;</li>
                                                <li id="pregunta-45-valor-6" class="star">&star;</li>
                                                <li id="pregunta-45-valor-7" class="star">&star;</li>
                                                <li id="pregunta-45-valor-8" class="star">&star;</li>
                                                <li id="pregunta-45-valor-9" class="star">&star;</li>
                                                <li id="pregunta-45-valor-10" class="star">&star;</li>                                                
                                            </ul>
                                        </div>


                                        <div class="col-12 col-lg-6 t-left">
                                            <h4 class="t-left mt-0 mb-0">
                                                46. ??Echas en falta alg??n nuevo apartado en la web? En caso afirmativo, ind??canos cu??l
                                            </h4>
                                        </div>

                                        <div class="col-12 col-lg-6 mb-2 t-left">
                                            <textarea id="pregunta-46" class="form-control" style="border:#eb7c00 2px solid; height:85px; resize:none; width:100%;" maxlength="400" required></textarea>
                                        </div> 









































                                        
                                        <div class="col-12 col-lg-6 redimension">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required>
                                                <p>Acepto la pol??tica de privacidad.</p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12 col-lg-4 mb-2">
                                            <button class="btn btn-link-w w-100" type="submit" id="submitOficinas"><span>ENVIAR</span></button>
                                        </div>
                                        
                                        <div id="encuesta-jugadores-19-20-form-respuesta" class="col-12"></div>

                                        <div class="col-12 col-sm-12 mb-2">
                                            <p class="t-justify">En cumplimiento de la Ley Org??nica de Protecci??n de Datos de car??cter personal, su Reglamento de Desarrollo (RD-1720*2007) y el nuevo Reglamento Europeo de Protecci??n de Datos (RGPD), 
                                            se le comunica que sus datos est??n incorporados a una base de datos titularidad de VALENCIA BASKET CLUB, S.A.D con CIF A4640693 y cuya finalidad es el tratamiento de estos, con el fin de llevar a cabo la 
                                            gesti??n integral de la jornada de puertas abiertas y el mentenerles informados. As?? como la comunicaci??n y tratamiento de su imagen, parcial o total, en cualquier soporte gr??fico o visual (fotograf??a, video o similar) para su uso
                                            en los medios de difusi??n presentes y futuros del VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.). Por lo tanto, Vd. podr?? recibir puntual informaci??n al respecto de esta
                                            jornada y de las que en un futuro pudi??ramos realizar, as?? como de otras actividades del VALENCIA BASKET CLUB, S.A.D. Se le informa tambi??n que puede ejercer los derechos de acceso, rectificaci??n, supresi??n, portabilidad, 
                                            limitaci??n de tratamiento, cancelaci??n y en su caso, opositici??n, enviando una solicitud por escrito acompa??ada de la fotocopia de su DNI a la siguiente direcci??n: HERMANOS MARISTAS 16, 46013, VALENCIA o a trav??s de: 
                                            valencia.valencia@valenciabasket.com; Sus datos podr??n ser comunicaciones a FUNDACIO VALENCIA BASQUET 2000 para los mismos tratamientos arriba mencionados. Se le informa tambi??n que puede ejercer los derechos de acceso, rectificaci??n, supresi??n, portabilidad, limitaci??n de tratamiento, 
                                            cancelaci??n, y , en su caso, oposici??n, para esta cesi??n, enviando una solicitud por escrito acompa??ada de la fotocopia de su DNI a la siguiente direcci??n: HERMANOS MARISTAS 16, 46013, VALENCIA o a trav??s de rgpd@alqueriadelbasket.com</p>
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
            $('#encuesta-jugadores-19-20-form').validate({
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
            
                    //  Hacemos inserci??n
                        $.ajax({
                            type: "POST",
                            url: "?r=encuestas/ParticipacionNueva",
                            data: form_data,
                            dataType: "json",
                            success: function(data){
                                if(data.response==="success"){
                                    // window.location.href = "index.php?r=encuestas/encuestacampusnavidadgracias";
                                    $('#encuesta-jugadores-19-20-form-respuesta').html("<div class='alert alert-success w-100' style='padding:1.5em 1em;width:100%;font-size:1.3em;'>" + data.message + "</div>");
                                    $("#encuesta-jugadores-19-20-form-respuesta").fadeTo(4000, 500).slideUp(500,function(){
                                        $("#encuesta-jugadores-19-20-form-respuesta").slideUp(500);
                                        $("#encuesta-jugadores-19-20-form-respuesta").html("");
                                    });
                                    setTimeout("location.href = 'index.php';", 5000);
                                }
                                else if(data.response==="error"){
                                    $('#encuesta-jugadores-19-20-form-respuesta').html("<div class='alert alert-danger w-100' style='padding:1.5em 1em;width:100%;font-size:1.3em;'>" + data.message + "</div>");
                                    $("#encuesta-jugadores-19-20-form-respuesta").fadeTo(4000, 500).slideUp(500,function(){
                                        $("#encuesta-jugadores-19-20-form-respuesta").slideUp(500);
                                        $("#encuesta-jugadores-19-20-form-respuesta").html("");
                                    });
                                }
                            }
                        });
                }
            });
        </script>
    </body>
</html>