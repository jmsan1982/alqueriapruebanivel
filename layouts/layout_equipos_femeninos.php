<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">
    
    <body class="Pages" id="formus">

        <div class="wrapper overflow-x-hidden">

            <?php require ("includes/header.php"); ?>

            <!-- Start Page-Content -->
            <section id="page-content" class="overflow-x-hidden margin-top-header">

                <div class="block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="parallax col-12 mt-0" style="background-image: url('img/escuela-femenina.jpg');">
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                // Todo lo comentado se descomentará cuando se vuelva a activar
                //<div class="block background-f6">
                ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                <img class="img-responsive" src="img/equipos-femeninos.png" style="margin: 0 auto;" alt="Escudo Equipos Femeninos L´Alqueria del Basket">
                            </div>

                            <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
                                <?php /*
                                <h2 class="section-title">
									Escuela <span class="orange-text">equipos femeninos</span>
                                </h2>
                                <h3 class="section-title mb-2">Ficha inscripción 2019-2020</h3>
                                */ ?>
                                <h2 class="section-title">
                                    <span class="orange-text">Las inscripciones a Equipos femeninos están cerradas temporalmente.</span>
                                </h2>
                            </div>
                        </div>

                        <?php /*?>
                        <div class="row mt-1">
                        	<div class="col-12">
	                            <form id="contactform" action="?r=index/equiposfemeninosform" class="boxed-form" name="contactform" method="post">
	                                <input type="hidden" value="femenino" name="categoria">
                                    <input type="hidden" value="0" name="existe_inscripcion" id="existe_inscripcion">

                                    <!-- PARTE 0 FORM - validacion DNI -->
                                    <div class="form-group mb-1">

                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 redimension">
                                                <h4>Si su hijo/hija ya estaba inscrito el año pasado, por favor, introduzca el DNI del titular para renovar la inscripción. De lo contrario continúe con el registro sin rellenar el primer campo llamado "DNI Titular".</h4>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group mb-4">
                                        <div class="row pl-1 pr-1"> 
                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label>DNI Titular:
                                                    <input type="text" id="validacion-dni" class="form-control" name="validacion-dni" maxlength="50">
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <button type="button" class="btn btn-link-w w-100" name="buscar-validacion-dni" id="buscar-validacion-dni" style="max-height: 59px; margin-top: 21px;">
                                                  <span>Buscar</span>  
                                                </button>
                                            </div>

                                            <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                                <label>Seleccione que hijo desea renovar:
                                                    <select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select">
                                                        <option value="0" disabled selected>No hay resultados para el DNI introducido</option>  
                                                    </select>
                                                </label>
                                            </div> 
                                        </div> 
                                    </div>

                                    <!-- PARTE 1 FORM - DATOS -->
                                    <div class="row">
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Fecha de nacimiento:
                                                <input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Nombre:
                                                <input type="text" class="form-control" name="nombre" id="nombre-form-femenino" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Apellidos:
                                                <input type="text" class="form-control" name="apellidos" id="apellidos-form-femenino" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Dirección:
                                                <input type="text" class="form-control" name="direccion" id="direccion-form-femenino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Número:
                                                <input type="text" class="form-control" name="numero" id="numero-form-femenino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Piso / Esc:
                                                <input type="text" class="form-control" name="piso" id="piso-form-femenino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label>Puerta:
                                                <input type="text" class="form-control" name="puerta" id="puerta-form-femenino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Población:
                                                <input type="text" class="form-control" name="poblacion" id="poblacion-form-femenino" maxlength="45" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Código Postal:
                                                <input type="text" class="form-control" name="cp" id="cp-form-femenino" maxlength="10" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label>Provincia:
                                                <input type="text" class="form-control" name="provincia" id="provincia-form-femenino" maxlength="25" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Nombre Padre:
                                                <input type="text" class="form-control" name="nombrepadre" id="nombrepadre-form-femenino" maxlength="100" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Nombre Madre:
                                                <input type="text" class="form-control" name="nombremadre" id="nombremadre-form-femenino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Teléfono Padre:
                                                <input type="number" class="form-control" name="tlfpadre" id="tlfpadre-form-femenino" maxlength="15" required>
                                            </label>
                                        </div>
                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label>Teléfono Madre:
                                                <input type="number" class="form-control" name="tlfmadre" id="tlfmadre-form-femenino" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12">
                                            <label>Correo Electrónico:
                                                <input type="email" class="form-control" name="email" id="email-form-femenino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <p class="t-left mt-0" style="color: red;">
                                                <strong>* Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida.</strong>
                                            </p>
                                        </div>
                                    </div> 

	                                <!-- PARTE 2 - MODALIDAD -->
	                                <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center mt-1 mb-0">Marca el equipo asignado</h3>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">BABY (nacidas en 2013 y 2014)</span>
                                            </h4>
                                        </div>
		                                        
                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Baby Impar -> Lunes y miercoles de 17:45 a 18:45 h.
                                                <input type="radio" name="modalidad" value="babyimpar" checked="true">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Baby Par -> Martes y jueves de 17:45 a 18:45 h.
                                                <input type="radio" name="modalidad" value="babypar">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">PREBENJAMIN (nacidas en 2011 y 2012)</span>
                                            </h4>
                                        </div> 

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Prebenjamin Impar -> Lunes y miercoles de 17:45 a 18:45 h.
                                                <input type="radio" name="modalidad" value="prebenjaminimpar">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Prebenjamin Par -> Martes y jueves de 17:45 a 18:45 h.
                                                <input type="radio" name="modalidad" value="prebenjaminpar">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">BENJAMIN (nacidas en 2009 y 2010)</span>
                                            </h4>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Benjamín Naranja -> Martes y jueves de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="benjaminnaranja">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Benjamín Azul-> Martes y jueves de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="benjaminazul">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">ALEVIN (nacidas en 2007 y 2008)</span>
                                            </h4>
                                        </div> 

		                                <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Alevín Naranja -> Martes, jueves y viernes de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="alevinnaranja">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

		                                <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Alevín Azul -> Lunes, miércoles y viernes de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="alevinazul">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

		                                <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Alevín Rojo -> Martes y jueves de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="alevinrojo">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">INFANTIL (nacidas en 2005 y 2006)</span>
                                            </h4>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Infantil Naranja -> Lunes, martes y jueves de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="infantilnaranja">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Infantil Azul -> Lunes, miércoles y viernes de 17:45 a 19:15 h.
                                                <input type="radio" name="modalidad" value="infantilazul">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">CADETE (nacidas en 2003 y 2004)</span>
                                            </h4>
                                        </div> 

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Cadete Rojo -> Lunes, Jueves de 19:15 a 20:45 h. y Viernes de 17:45 a 19:15h.
                                                <input type="radio" name="modalidad" value="cadeterojo">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Cadete Negro -> Lunes de 19:15 a 20:45 h.; miércoles de 17:45 a 19:15h. y jueves de 19:15 a 20:45h.
                                                <input type="radio" name="modalidad" value="cadetenegro">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <h4>
                                                <span class="orange-text" style="font-size: 20px;">JUNIOR (nacidas en 2001 y 2002)</span>
                                            </h4>
                                        </div>  

                                        <div class="col-12 mb-1" style="font-size:1.2em;">
                                            <label class="control control--radio">
                                                Junior Rojo -> Martes de 19:15 a 20:45 h; miércoles de 20:45 a 22:15h y viernes de 19:15 a 20:45 h
                                                <input type="radio" name="modalidad" value="juniorrojo">
                                                <div class="control__indicator"></div>
                                            </label>
                                        </div>
	                                </div>                            		    
	                                        
                                    <!-- PARTE 3 - PAGOS -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center mb-0">
                                                <span class="orange-text">Pagos, plazos y método de pago</span>
                                            </h3>
                                        </div>

                                        <div class="col-12">
                                            <h4 class="section-title t-justify mt-1 mb-0">
                                                <strong>Reserva de plaza: 50€<br><span style="color:red;">Pago por tarjeta o en oficinas</span></strong>
                                            </h4>

                                            <p class="t-justify">
                                                Será necesario realizar este pago para formalizar la inscripción. Este pago se puede realizar en esta misma página o directamente en las oficinas del club (en este último caso habrá que enviar el justificante de pago junto con la inscripción a la dirección reseñada con anterioridad).
                                            </p>

                                            <p class="t-justify">
                                                - Esta cantidad será descontada del pago de matricula.<br>
                                                - En caso de no confirmar plaza por parte del Club, se devolverá íntegramente importe de reserva.<br>
                                                - En caso de no formalizar la matricula cuando se confirme la plaza, NO se devolverá importe de reserva.
                                            </p>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0">Matrícula: 160€ (2 o + hermanos en la escuela 145€ / persona)</h4>
                                            <p class="t-justify mb-0"><span style="color:red;"><strong>- Pago en oficinas.</strong></span></p>
                                            <p class="t-justify mt-0 mb-0"><span style="color:red;"><strong>- Debe estar pagada para retirar la ropa.</strong></span></p>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0">Trimestre</h4>
                                            <h4 class="section-title mt-0 mb-0">Pagos por domiciliación bancaria</h4>  
                                            <p class="t-justify mt-0 mb-0">- Baby y Prebenjamín:<span> 3 pagos de 140€</span></p>
                                            <p class="t-justify mt-0 mb-0">- Resto de categorías:<span> 3 pagos de 160€</span></p>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
                                            <h4 class="section-title mt-1 mb-0">Plazos:</h4>
                                            <p class="t-justify mb-0">- 1er Pago: del 1 al 15 de nov. de 2018 </p>
                                            <p class="t-justify mt-0 mb-0">- 2º Pago: del 1 al 15 de enero de 2019 </p>
                                            <p class="t-justify mt-0 mb-0">- 3er Pago: del 1 al 15 de abril de 2019</p>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                            <p class="t-justify">
                                                Si causa baja deberá comunicarse al director de la ESCUELA o a la secretaría de L´Alqueria del Basket (C/ Bomber Ramon Duart, 7) o en el 96 121 55 43 en horario de 9:30h. a 14:00h. y de 16:00h. a 20:00 h. de lunes a viernes.
                                            </p>

                                            <p class="t-justify">
                                                Si no se efectúa el pago en el plazo establecido, se dará como perdida la plaza.
                                            </p>

                                            <p class="t-justify" style="color: red;">
                                                SE RESERVA EL DERECHO A COBRAR 5 € POR GASTOS OCASIONADOS EN CASO DE DEVOLUCION DEL RECIBO Y VUELTA A PASAR.
                                            </p>

                                            <div class="row">
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="contact-info-wrap mt-1 mb-1 t-center">	
                                                        <h3 class="section-title mt-0 mb-0 t-center">
                                                            <span class="orange-text">Soporte técnico</span>
                                                        </h3>
                                                        <p class="t-center">
                                                            <strong>Si tiene cualquier incidencia técnica con la inscripción, escriba al soporte técnico en WhatsApp.</strong>
                                                        </p>
                                                        <a href="https://wa.me/+34687717491" target="_blank" style="color: black; font-size: 1.3em;">
                                                            <img src="img/wassap3.png" style="max-width: 50px;" alt="Contacta por WhatsApp"><strong> WhatsApp 687717491</strong>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-9 col-lg-9 col-xl-9">
                                                    <h4 class="section-title t-center mt-1 mb-1">Domiciliación bancaria</h4>

                                                    <div class="row">
                                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label>Titular:
                                                                <input type="text" class="form-control" name="titular" maxlength="100" required>
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label>DNI:
                                                                <input type="text" id="dnititular" class="form-control" name="dnititular" maxlength="50" required>
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="iban-input">IBAN</label>
                                                            <input id="iban-input" type="text" class="form-control" value="ES" name="iban" maxlength="4" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="entidad-input">Entidad</label>
                                                            <input id="entidad-input" type="number" class="form-control" value="" name="entidad" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="oficina-input">Oficina</label>
                                                            <input id="oficina-input" type="number" class="form-control" value="" name="oficina" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="dc-input">DC</label>
                                                            <input id="dc-input" type="number" class="form-control" value="" name="dc" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label for="cuenta">Cuenta</label>
                                                            <input type="number" class="form-control" id="cuenta" name="cuenta" onkeydown="limit10(this);" onkeyup="limit10(this);" required>
                                                            <script type="text/javascript">
                                                                function limit10(element){
                                                                    var max_chars = 10;
                                                                    if(element.value.length > max_chars) {
                                                                        element.value = element.value.substr(0, max_chars);
                                                                    }
                                                                }
                                                                function limit4(element){
                                                                    var max_chars = 4;
                                                                    if(element.value.length > max_chars) {
                                                                        element.value = element.value.substr(0, max_chars);
                                                                    }
                                                                }
                                                                function limit2(element){
                                                                    var max_chars = 2;
                                                                    if(element.value.length > max_chars) {
                                                                        element.value = element.value.substr(0, max_chars);
                                                                    }
                                                                }
                                                            </script>
                                                        </div>

                                                        <div class="col-12">
                                                            <p class="t-left mt-0">
                                                                <strong>* La informacion bancaria recibida será procesada de manera oculta y segura</strong>
                                                            </p>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="autorizo" value="si" required>
                                                                <p>Como madre / padre / tutor, inscribo a mi hij@ en la escuela de Baloncesto Valencia Basket Club y acepto las condiciones anteriormente expuestas.</p>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                            <button class="btn" style="width: 100%; margin-left: 0;" name="oficinas" type="submit" id="submitOficinas">
                                                                <span>Reserva 50€ (pago en oficinas de l'Alqueria)</span>
                                                            </button>
                                                            <input id="oficinas-button" type="hidden" value="0">
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                                                            <button class="btn" style="width: 100%; margin-left: 0;" name="tarjeta"  type="submit" id="submitTarjeta">
                                                                <span>Reserva 50€ (pago por tarjeta)</span>
                                                            </button>
                                                            <input id="tarjeta-button" type="hidden" value="0">
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <p class="t-justify">
                                                                En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal, su Reglamento de Desarrollo (RD-1720*2007) y el nuevo Reglamento Europeo de Protección de Datos (RGPD), se le comunica que sus datos están incorporados a una base de datos titularidad de VALENCIA BASKET CLUB, S.A.D con CIF A4640693 y cuya finalidad es el tratamiento de estos, con el fin de llevar a cabo la gestión integral de la jornada de puertas abiertas y el mentenerles informados. Así como la comunicación y tratamiento de su imagen, parcial o total, en cualquier soporte gráfico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros del VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.). Por lo tanto, Vd. podrá recibir puntual información al respecto de esta jornada y de las que en un futuro pudiéramos realizar, así como de otras actividades del VALENCIA BASKET CLUB, S.A.D. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y en su caso, opositición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: HERMANOS MARISTAS 16, 46013, VALENCIA o a través de: valencia.valencia@valenciabasket.com; Sus datos podrán ser comunicaciones a FUNDACIO VALENCIA BASQUET 2000 para los mismos tratamientos arriba mencionados. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación, y , en su caso, oposición, para esta cesión, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: HERMANOS MARISTAS 16, 46013, VALENCIA o a través de rgpd@alqueriadelbasket.com
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
	                            </form>
                            </div>
                        </div>
                        <?php */ ?>
                    </div>
                <?php
                //</div>
                ?>
            </section>

            <?php require('includes/footer.php'); ?>
            <?php require "includes/cookies.php"; ?>
        </div>
        
        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script type="text/javascript">
            /*$('#fecha').on('focus', function() {
              $("#fecha").prop("type", "date");
            }).on('blur', function() {
              $("#fecha").prop("type", "text");
            });*/
        </script>

        <script type="text/javascript">

            $("#submitOficinas").on('click',function(){
                $("#oficinas-button").attr('name','oficinas');
                $("#tarjeta-button").attr('name','');
            });

            $("#submitTarjeta").on('click',function(){
                $("#tarjeta-button").attr('name','tarjeta');
                $("#oficinas-button").attr('name','');
            });

            $("#contactform").on('submit',function(e){

                $.ajax({
                    type: "POST",
                    url: "?r=index/equiposmasculinosform",
                    data: $('#contactform').serialize(),
                    dataType: "json",
                    success: function(data){
                        if(data["response"] === "DNI_ERROR_"){
                            $("input[name='dnititular']").attr('style','border: 3px solid red !important');
                            if($("#dni-error").length === 0){
                                $('#dnititular').after('<p id="dni-error" style="color:red;margin-left:10px;font-weight:bold;">* El DNI NO es Válido.</p>');
                            }
                            document.getElementById("dnititular").focus();
                        }
                        if(data["response"] === "CUENTA_ERROR_"){
                            $("input[name='dnititular']").attr('style','border: 0px;');
                            $('#dni-error').attr('style','display:none');
                            $("input[name='iban']").attr('style','border: 3px solid red !important');
                            $("input[name='entidad']").attr('style','border: 3px solid red !important');
                            $("input[name='oficina']").attr('style','border: 3px solid red !important');
                            $("input[name='dc']").attr('style','border: 3px solid red !important');
                            $("input[name='cuenta']").attr('style','border: 3px solid red !important');
                            if($("#cuenta-error").length === 0){
                                $('#cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es Válida.</p>');
                            }
                            document.getElementById("cuenta").focus();
                        }
                        /* Error Tarjeta */
                        if(data["response"] === "1"){
                            alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
                            window.location.replace('?r=index/principal');
                            /* OK Oficiina */
                        }if(data["response"] === "2"){
                            alert('SU RESERVA SE REALIZÓ CORRECTAMENTE, UNA VEZ COMPROBADOS LOS DATOS, SE RECIBIRÁ UN EMAIL CONFIRMANDO LA INSCRIPCIÓN');
                            window.location.replace('?r=index/principal');
                        }
                        if(data["response"] === "tarjeta_ok"){
                            window.location.href = data["header"] + data["numeropedido"] + '&titular=' + data["titular"];
                        }
                    }
                });
                e.preventDefault();
            });

            $( "#buscar-validacion-dni" ).on( "click", function() {
                //console.log("ENTRAMOS AL ON CLICK");
                if( $("#validacion-dni").val().trim() != "" && $("#validacion-dni").val().trim().length == 9 ){
                   // console.log("Todo ok");
                    var form_data = {
                        dni: $("#validacion-dni").val().trim(),
                        categoria: "femenino"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=formularios/findByIDTutor",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            //console.log("entramos al succes");
                            //var datosDevueltos = data.datos;
                            //console.log( data.datos[0].nombre_apellidos ); 
                            $("#validacion-dni-select option").remove();
                            if( data.datos.length > 0  ){   
                                for( var m = 0 ; m < data.datos.length ; m++ ){
                                    //console.log( data.datos[m].nombre_apellidos ); 
                                    //console.log("Entramos al for");
                                    if( m==0 ){
                                        $("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "' selected>" + data.datos[m].nombre_apellidos + "</option>");
                                    }else{
                                        $("#validacion-dni-select").append("<option value='" + data.datos[m].id_formulario + "'>" + data.datos[m].nombre_apellidos + "</option>");
                                    }   
                                }
                                BuscarAlumno();
                            }else{
                                alert("No hay resultados para el DNI introducido.");
                                VaciarCampos();  
                                $("#existe_inscripcion").val( "0" );
                            
                            }
                        }
                    });
                }else{
                  alert("El DNI no se ha introducido correctamente, por favor, compruebe que tiene 9 digitos.");
                  //console.log("entramos al else");
                  VaciarCampos();  
                  $("#existe_inscripcion").val( "0" );
                }
            });

            $( "#validacion-dni-select" ).on( "change", function() {
                 BuscarAlumno();  
            });

            function BuscarAlumno(){
                if( $("#validacion-dni-select option:selected").val() != 0 ){
                    var form_data = {
                        form_id: "inscripciones_cargar_contenido_inscripcion_original",
                        idinscripcion: $("#validacion-dni-select option:selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/Dispatcher",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#existe_inscripcion").val( data.datos.id_formulario );
                            $("#fecha").val( data.datos.fecha_nacimiento  );
                            $("#nombre-form-femenino").val( data.datos.nombre_apellidos.slice( 0, data.datos.nombre_apellidos.indexOf(" ", 2) ) );
                            $("#apellidos-form-femenino").val( data.datos.nombre_apellidos.slice( data.datos.nombre_apellidos.indexOf(" ", 2 ) ) );
                            $("#direccion-form-femenino").val( data.datos.direccion );
                            $("#numero-form-femenino").val( data.datos.numero );
                            $("#piso-form-femenino").val( data.datos.piso );
                            $("#puerta-form-femenino").val( data.datos.puerta );
                            $("#poblacion-form-femenino").val( data.datos.poblacion );
                            $("#cp-form-femenino").val( data.datos.codigo_postal );
                            $("#provincia-form-femenino").val( data.datos.provincia );
                            $("#nombrepadre-form-femenino").val( data.datos.nombre_padre );
                            $("#nombremadre-form-femenino").val( data.datos.nombre_madre );
                            $("#tlfpadre-form-femenino").val( data.datos.telefono_padre );
                            $("#tlfmadre-form-femenino").val( data.datos.telefono_madre );
                            $("#email-form-femenino").val( data.datos.email );
                            $("#titular-form-femenino").val( data.datos.titular_banco );
                            $("#dni-form-femenino").val( data.datos.dni_tutor );
                            $("#iban-input").val( data.datos.iban.trim() );
                            $("#entidad-input").val( data.datos.entidad.trim() );
                            $("#oficina-input").val( data.datos.oficina.trim() );
                            $("#dc-input").val( data.datos.dc.trim() );
                            $("#cuenta").val( data.datos.cuenta.trim() );
                            $('input:radio[value=' + data.datos.modalidad.trim() + ']').attr( "checked", "true" );
                           
                        },error: function (){
                            console.log("error en el ajax");
                        }
                    });
                }
            }

            function VaciarCampos(){ 
              console.log("Entramos a la funcion");
                $("#existe_inscripcion").val( "0" );
                $("#fecha").val( "" );
                $("#nombre-form-femeninofemenino").val( "" );
                $("#apellidos-form-femeninofemenino").val( "" );
                $("#direccion-form-femeninofemenino").val( "" );
                $("#numero-form-femeninofemenino").val( "" );
                $("#piso-form-femeninofemenino").val( "" );
                $("#puerta-form-femeninofemenino").val( "" );
                $("#poblacion-form-femeninofemenino").val( "" );
                $("#cp-form-femeninofemenino").val( "" );
                $("#provincia-form-femeninofemenino").val( "" );
                $("#nombrepadre-form-femeninofemenino").val( "" );
                $("#nombremadre-form-femeninofemenino").val( "" );
                $("#tlfpadre-form-femeninofemenino").val( "" );
                $("#tlfmadre-form-femeninofemenino").val( "" );
                $("#email-form-femeninofemenino").val( "" );
                $("#titular-form-femeninofemenino").val( "" );
                $("#dni-form-femeninofemenino").val( "" );
                $("#iban-input").val( "" );
                $("#entidad-input").val( "" );
                $("#oficina-input").val( "" );
                $("#dc-input").val( "" );
                $("#cuenta").val( "" );
                $("#validacion-dni-select option").remove();
                $("#validacion-dni-select").append("<option value='0' disabled selected>No hay resultados para el DNI introducido</option> ");
            }

        </script>

    </body>
</html>