<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages" id="formus">

        <?php require('includes/header.php'); ?>

        <!-- Start Page-Content -->
        <section id="page-content" class="overflow-x-hidden margin-top-header">
            <div class="block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="parallax col-12" style="background-image: url('img/cabecera-escuela-verano.jpg');">
                        </div>
                    </div>
                </div>
            </div>

            <?php
            // Cuando se vuelva a mostrar el formulario: <div class="block background-f6">
            ?>
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                    <img class="img-responsive" src="img/escudo-escuela-fallas.png" style="margin: 0 auto;" alt="Escudo Escuela de Fallas">
                                </div>

                                <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
                                    <h2 class="section-title">
                                        <span class="orange-text">I Escuela de Fallas</span>
                                    </h2>
                                    <h3 class="section-title mb-0">16, 17 y 18 de marzo</h3>
                                    <!-- <h3 class="section-title mb-2">4 y 5 de enero</h3> -->
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <div class="alert alert-danger redimension" role="alert">
                                    <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["inscripciones_cerradas"];?></h4>
                                </div>
                            </div>

                            <!-- Formulario oculto con class hidden -->
                            <form id="contactform" enctype="multipart/form-data" action="?r=escuelafallas/EscuelaFallasForm" class="boxed-form hidden" name="contactform" method="post">
                                <input type="hidden" name="categoria" value="escuelafallas">

                                <!-- PARTE 1 -->

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 mb-1 t-left" style="font-size: 1.2em;">
                                                    <label class="control control--radio mb-1">
                                                        OPCI??N A: S??lo ma??anas de 8:30 a 14:00h.(50???)
                                                        <input type="radio" name="opcion" value="solomanyana" checked required>
                                                        <div class="control__indicator"></div>
                                                    </label>

                                                    <label class="control control--radio mb-1">
                                                        OPCI??N B: D??as completos de 8:30 a 18:00h. (80???)
                                                        <input type="radio" name="opcion" value="diacompleto">
                                                        <div class="control__indicator"></div>
                                                    </label>

                                                    <label class="control control--radio mb-1">
                                                        OPCI??N C: D??as sueltos
                                                        <input type="radio" name="opcion" value="sueltos" id="radiodiassueltos">
                                                        <div class="control__indicator"></div>
                                                    </label>
                                                </div>

                                                 <div class="col-12 t-left" style="font-size:1.2em;display:none;" id="diassueltos">
                                                    <p>
                                                        En caso de ir d??as sueltos seleccionar los d??as:</br>
                                                        Ma??anas 18???, d??a completo 30???
                                                    </p>


                                                    <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia1" value="dia16">
                                                                <span class="checkmark"></span> D??a 16
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa1" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia1" value="dia16-manyana" checked>Solo ma??ana  &nbsp;   &nbsp;

                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia1" value="dia16-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>

                                                   <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia2" value="dia17">
                                                                <span class="checkmark"></span> D??a 17
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa2" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia2" value="dia17-manyana" checked>Solo ma??ana   &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia2" value="dia17-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>

                                                    <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia3" value="dia18">
                                                                <span class="checkmark"></span> D??a 18
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa3" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia3" value="dia18-manyana" checked>Solo ma??ana  &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia3" value="dia18-completo">D??a completo
                                                            </label>
                                                        </div>
                                                    </div>

                                                   <!--  <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia4" value="dia29">
                                                                <span class="checkmark"></span> D??a 29
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa4" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia4" value="dia29-manyana" checked>Solo ma??ana  &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia4" value="dia29-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>


                                                   <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia5" value="dia30">
                                                                <span class="checkmark"></span> D??a 30
                                                            </label>
                                                        </div>

                                                        <div class="col-9" id="capa5" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia5" value="dia30-manyana" checked>Solo ma??ana   &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia5" value="dia30-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>

                                                   <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia6" value="dia31">
                                                                <span class="checkmark"></span> D??a 31
                                                            </label>
                                                        </div>

                                                        <div class="col-9" id="capa6" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia6" value="dia31-manyana" checked>Solo ma??ana   &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia6" value="dia31-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>

                                                   <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia7" value="dia4">
                                                                <span class="checkmark"></span> D??a 4
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa7" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia7" value="dia4-manyana" checked>Solo ma??ana  &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia7" value="dia4-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div>

                                                   <div class="row">
                                                        <div class="col-3 t-left" style="font-size:1em;">

                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="dia8" value="dia5">
                                                                <span class="checkmark"></span> D??a 5
                                                            </label>
                                                        </div>

                                                        <div class="col-9 " id="capa8" style="font-size:0.8em;display:none;">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="rdia8" value="dia5-manyana" checked>Solo ma??ana  &nbsp;   &nbsp;
                                                            </label>
                                                            <label class="radio-inline">
                                                                 <input type="radio" name="rdia8" value="dia5-completo">D??a completo
                                                            </label>
                                                        </div>
                                                   </div> -->

                                                </div>


                                            </div>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="contact-info-wrap t-center">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 class="section-title mt-0 mb-0 t-center">
                                                            <span class="orange-text">Actividades (Nacidos entre 2007 y 2015)</span>
                                                        </h4>
                                                    </div>

                                                    <div class="col-12 col-lg-6 col-xl-6 mt-1 mb-1">
                                                        <table class="table table-dark table-striped" style="width: 100%; margin: 0 auto;">
                                                            <thead>
                                                                <tr>
                                                                    <th>MA??ANAS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>08:30 - 09:00</td>
                                                                    <td align="left">Llegada</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>09:15 - 11:00</td>
                                                                    <td align="left">Entrenamiento</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>11:00 - 11:30</td>
                                                                    <td align="left">Almuerzo</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>11:30 - 13:00</td>
                                                                    <td align="left">Juegos</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>13:00 - 13:45</td>
                                                                    <td align="left">Concursos</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td align="center">14:00</td>
                                                                    <td align="left">Recogida</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-12 col-lg-6 col-xl-6 mt-1 mb-1">
                                                        <table class="table table-dark table-striped" style="width: 100%; margin: 0 auto;">
                                                            <thead align="center">
                                                                <tr>
                                                                    <th>TARDES</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>14:00 - 15:00</td>
                                                                    <td align="left">Comida</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>15:00 - 16:00</td>
                                                                    <td align="left">Descanso</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td>16:00 - 17:30</td>
                                                                    <td align="left">Entrenamiento</td>
                                                                </tr>
                                                                 <tr>
                                                                    <td align="center">18:00</td>
                                                                    <td align="left">Recogida</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="col-12">
                                                        <p class="t-center">
                                                            <strong>Todos los ni??os y ni??as deber??n traer almuerzo (opci??n A y B). Los ni??os y ni??as que se queden el d??a completo (opci??n B) tienen la comida incluida en el precio. Llevar ropa, calzado deportivo, toalla, agua y mascarilla.</strong>
                                                        </p>
                                                        <p class="t-center">
                                                            <strong>Para m??s informaci??n puede contactar con el 615557377 o en servicios.alqueriadelbasket.com </strong> <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/documentos/Dosier-Padres-Escuela-Fallas-Alqueria.pdf'>Ver dosier informativo</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <script type="text/javascript">
                                    $('[name="dia1"]').change(function(){
                                        $("#capa1").toggle();
                                    });

                                    $('[name="dia2"]').change(function(){
                                        $("#capa2").toggle();
                                    });

                                    $('[name="dia3"]').change(function(){
                                        $("#capa3").toggle();
                                    });

                                    /*$('[name="dia4"]').change(function(){
                                        $("#capa4").toggle();
                                    });

                                    $('[name="dia5"]').change(function(){
                                        $("#capa5").toggle();
                                    });
                                    $('[name="dia6"]').change(function(){
                                        $("#capa6").toggle();
                                    });
                                    $('[name="dia7"]').change(function(){
                                        $("#capa7").toggle();
                                    });
                                    $('[name="dia8"]').change(function(){
                                        $("#capa8").toggle();
                                    });*/


                                    $("#radiodiassueltos").click(function(){

                                        if($("#radiodiassueltos").is(':checked')) {
                                            $("#diassueltos").css("display", "block");
                                        } else {
                                            $("#diassueltos").css("display", "none");
                                        }
                                    });
                                </script>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="section-title">Datos del ni??o/a:</h4>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Nombre:
                                                <input type="text" class="form-control" name="nombre" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                            <label>Apellidos:
                                                <input type="text" class="form-control" name="apellidos" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Fecha de nacimiento:
                                                <input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                        <label>G??nero:
                                            <select class="form-control campos-required" name="genero" id="genero" required="">
                                                <option value="">Seleccionar opci??n</option>
                                                <option value="FEMENINO">FEMENINO</option>
                                                <option value="MASCULINO">MASCULINO</option>
                                            </select>
                                        </label>
                                    </div>
                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>DNI:
                                                <input type="text" class="form-control" name="dni" maxlength="10" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>??A qu?? club pertenece?
                                                <input type="text" class="form-control" name="club" maxlength="45" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>??Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los ??ltimos 15 d??as? (Si o no)
                                                <input type="text" class="form-control" name="sintomascovid" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>??Alguno de tus convivientes ha sido diagnosticado de coronavirus este ??ltimo mes? (Si o no)
                                                <input type="text" class="form-control" name="familiarcovid" maxlength="45" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 redimension">
                                            <label>??Alg??n aspecto m??dico a destacar? (Como alergias, enfermedades, medicaci??n..)
                                                <input type="text" class="form-control" name="aspectomedico" required>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <p class="t-left"><strong>Autorizo a la Direcci??n de la I Escuela de Fallas 2021 de L??Alqueria del Basket, en caso de m??xima urgencia con el consentimiento y prescripci??n m??dica a tomar las decisiones m??dico-quir??rgicas necesarias, si ha sido imposible mi localizaci??n.</strong></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 redimension">
                                            <h4 class="section-title">Adjuntar fotocopia SIP</h4>
                                        </div>
                                        <div class="col-12 redimension">
                                            <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp">
                                        </div>

                                        <div class="col-12">
                                            <p class="t-left" style="color: red;">
                                                <strong>* Recuerde adjuntar la fotocopia del SIP (obligatorio)<br>
                                                (Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF) </strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <h4 class="section-title">Datos del padre / madre / tutor:</h4>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Nombre:
                                                <input type="text" class="form-control" name="nombretutor" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                            <label>Apellidos:
                                                <input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>DNI:
                                                <input type="text" class="form-control" name="dnitutor" maxlength="10" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>Direcci??n:
                                                <input type="text" class="form-control" name="direccion" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                            <label>N??mero:
                                                <input type="text" class="form-control" name="numero" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                            <label>Piso / Esc:
                                                <input type="text" class="form-control" name="piso" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Puerta:
                                                <input type="text" class="form-control" name="puerta" maxlength="10">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                            <label>C??digo Postal:
                                                <input type="text" class="form-control" name="cp" maxlength="10" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                            <label>Provincia:
                                                <input type="text" class="form-control" name="provincia" maxlength="25" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Poblaci??n:
                                                <input type="text" class="form-control" name="poblacion" maxlength="45" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                            <label>Tel??fono:
                                                <input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-7 col-lg-7 col-xl-7">
                                            <label>Correo Electr??nico:
                                                <input type="email" class="form-control" name="emailtutor" maxlength="45" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="t-left" style="color: red;">
                                                <strong>Al terminar la inscripci??n, recibir?? un correo electr??nico de confirmaci??n con la informaci??n recibida</strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">

                                    <div class="col-12 col-lg-12 col-xl-12">
                                        <hr style="color:black;border:1px solid #ccc;">
                                    </div>
                                    <div class="col-12">
                                        <h3 class="section-title mb-0"><span class="orange-text">Protocolo sanitario </span></h3>
                                    </div>


                                    <!-- PROTOCOLO SANITARIO -->
                                    <div class="col-12">
                                        <label class="containerchekbox">
                                            <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" >
                                            <p>He leido y cumplimentado el <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/documentos/Protocolo-Sanitario-Escuela-Fallas-Alqueria.pdf'>protocolo sanitario</a></p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                       <!--  <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" >
                                                <p><?php //echo $lang["condiciones_legales_2020_2"];?></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-img" value="si" required class="input-control-dni" >
                                                <p><?php //echo $lang["condiciones_legales_2020_3"];?></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-salud" value="si" required class="input-control-dni" >
                                                <p><?php //echo $lang["condiciones_legales_2020_4"];?></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div> -->

                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                </div>

                                <!-- PARTE 2 -->

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="section-title mb-0">
                                            <span class="orange-text">Plazos y otros m??todos de pago</span>
                                        </h3>
                                    </div>

                                    <div class="col-12">
                                        <h4 class="section-title mb-0">Pago con tarjeta:</h4>
                                        <p>Al final de esta p??gina encontrar?? la opci??n que le redirigir?? a la plataforma TPV para hacer el pago on-line.
                                            <br>
                                        </p>
                                        <h4 class="section-title mb-0">Efectivo y entrega de documentaci??n en mano:</h4>
                                        <p>Inscripci??n en oficinas de L??Alqueria
                                            <br>
                                            Lunes a viernes de 9:30 a 14:00 y de 16:00 a 20:00.
                                        </p>
                                        <h4 class="section-title mb-0">Ingreso bancario:</h4>
                                        <p>
                                            En la cuenta de Caixa Popular:
                                            <br>
                                            Cuenta: ES29 3159 0009 9623 3942 4422
                                            <br><br>
                                            <!-- <span style="color: red;">*</span> Al hacer el ingreso se indicar?? el nombre del ni??o/a y deber?? enviarse el resguardo junto al resto de documentaci??n (fotocopia tarjeta sanitaria/SIP) por fax al n??mero: 96 395 68 01 o al siguiente e-mail: <a href="mailto:campus@valenciabasket.com" style="color: #eb7c00; font-weight: 600;">campus@valenciabasket.com</a> -->
                                        </p>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12 redimension">
                                            <h4 class="section-title">Adjuntar resguardo del ingreso bancario (opcional, si adjunta el resguardo seleccione el pago: Inscrpci??n con ingreso bancario):</h4>
                                        </div>
                                        <div class="col-12 redimension">
                                            <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="resguardoingreso" aria-describedby="fileHelp">
                                        </div>
                                        <div class="col-12">
                                            <p class="t-left" style="color: red;">
                                                <strong>
                                                (Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF) </strong>
                                            </p>
                                        </div>


                                    </div>
                                </div>

                                <!-- PARTE 3 -->

                                <!-- <div class="row">
                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>
                                        <div class="col-12">
                                            <h3 class="section-title mb-0"><span class="orange-text">Protocolo sanitario</span></h3>
                                        </div>

                                        <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" >
                                                <p>He leido y cumplimentado el <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/img/Protocolo-sanitario-escuelaNavidadAlqueria2020.pdf'>protocolo sanitario</a></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>

                                </div> -->

                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="section-title mb-0">
                                            <span class="orange-text">Pol??tica de privacidad</span>
                                        </h3>
                                        <h4 class="section-title mb-0">Consentimiento expreso e inequ??voco:</h4>
                                    </div>

                                    <div class="col-12">
                                        <p>
                                            En cumplimiento de Ley Org??nica 3/2018, de 5 de diciembre, de Protecci??n de Datos Personales y garant??a de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado ser??n (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gesti??n integral de nuestra escuela de baloncesto y el mantenerle informado de las pr??ximas novedades y actividades de la Fundaci??n.
                                        </p>
                                        <label class="containerchekbox">
                                            <p>
                                                <input type="checkbox" name="autorizodatos" value="si" required>
                                                <span class="checkmark"></span>
                                                Acepto que FUNDACI?? VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi inter??s por cualquier medio, incluido el electr??nico.
                                            </p>
                                        </label>
                                        <label class="containerchekbox">
                                            <p>
                                                <input type="checkbox" name="autorizoimagen" value="si" required>
                                                <span class="checkmark"></span>
                                                Acepto que  el FUNDACI?? VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotograf??a, video o similar) para su uso en los medios de difusi??n presentes y futuros de la FUNDACI?? VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)
                                            </p>
                                        </label>
                                        <p>
                                            Se le informa tambi??n que puede ejercer los derechos de acceso, rectificaci??n, supresi??n, portabilidad, limitaci??n de tratamiento, cancelaci??n y, en su caso, oposici??n, enviando una solicitud por escrito acompa??ada de la fotocopia de su DNI a la siguiente direcci??n: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a trav??s de  valencia.basket@valenciabasket.com  as?? como reclamar ante la Agencia Espa??ola de Protecci??n de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protecci??n de datos.
                                        </p>
                                        <p>
                                            Si desea ampliar m??s informaci??n sobre nuestra pol??tica de privacidad entre en nuestra web <a href="https://www.valenciabasket.com" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a>
                                        </p>
                                    </div>

                                    <div class="col-12">
                                        <label class="containerchekbox">
                                            <input type="checkbox" name="autorizo" value="si" required>
                                            <p>Como padre / madre / tutor, inscribo a mi hij@ en la  I Escuela de Fallas 2021 de L??Alqueria del Basket y acepto las condiciones anteriormente expuestas.</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
                                            <span>Inscrpci??n con ingreso bancario</span>
                                        </button>
                                    </div>


                                    <div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
                                            <span>Realizar Pago con tarjeta</span>
                                        </button>
                                    </div>

                                    <?php
                                    /*<div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                        <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
                                            <span>Realizar Pago con tarjeta</span>
                                        </button>
                                    </div>*/
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require('includes/footer.php'); ?>
        <?php require('includes/cookies.php'); ?>

        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <!-- Load Scripts End -->

	</body>
</html>                  