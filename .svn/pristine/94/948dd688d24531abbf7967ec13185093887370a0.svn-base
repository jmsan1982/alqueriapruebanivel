<!DOCTYPE html>
<html lang="es"> 
    <?php require('includes/head.php'); ?>
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/parallax.css">
    <link rel="stylesheet" href="css/formus.css">

    <style>
        input[type="text"] {
            text-transform: uppercase;
        }
        input[type="email"] {
            text-transform: lowercase;
        }
    </style>
    
    <body class="Pages" id="formus">

        <div class="wrapper overflow-x-hidden">

            <?php require ("includes/header.php"); ?>

            <!-- Start Page-Content -->
            <section id="page-content" class="overflow-x-hidden margin-top-header">
                <div class="block">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="parallax col-12 mt-0" style="background-image: url('img/cabecera-cultura-esfuerzo.jpg');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block background-f6">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
                                <img class="img-responsive" src="img/escudo-escuela.png" style="margin: 0 auto;" alt="Escudo Equipos Masculinos L´Alqueria del Basket">
                            </div>

                            <div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">                                
                                <h2 class="section-title">
                                    <?php echo $lang["escuela_titulo"];?> <span class="orange-text"><?php echo $lang["escuela"];?></span>
                                </h2>
                                <h3 class="section-title mb-2"><?php echo $lang["patronato_subtitulo"];?></h3>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-12">
                                <!-- 
                                    Este es el action que usa para que funcione el formulario:  action="?r=index/equiposmasculinosform"
                                    Como en diciembre 2019, José Luis pide que se bloqueen los formularios de ESCUELA y CANTERA 
                                -->
                                <form  class="boxed-form" name="contactform" method="post" id="contactform">
                                    <input type="hidden" value="femenino" name="categoria" id="categoria-form-masculino">
                                    <input type="hidden" value="0" name="existe_inscripcion" id="existe_inscripcion"> 

                                    <!-- PARTE 0 FORM - validacion DNI -->
                                    <div class="row">
                                        <div class="form-group col-12 mb-1">
                                            <div class="alert alert-danger redimension" role="alert">
                                                <h4><i class="fa fa-info-circle" aria-hidden="true"></i> <?php echo $lang["escuela_mensaje_informacion1"];?></h4>
                                            </div>
                                        </div>

                                        <div class="form-group col-12 mb-1">
                                            <h4><?php echo $lang["escuela_mensaje_informacion_preform"];?></h4>
                                        </div>

                                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4 redimension">
                                            <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["formulario_dni_titular_jugador"];?>:</label>
                                            <input type="text" id="validacion-dni" class="form-control" name="validacion-dni" maxlength="50" readonly>
                                        </div>

                                        <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3 redimension">
                                            <button type="button" class="btn btn-link-w w-100" name="buscar-validacion-dni" id="buscar-validacion-dni" style="max-height: 59px; margin-top: 28px; margin-left: 0;">
                                              <span><?php echo $lang["buscar"];?></span>  
                                            </button>
                                        </div>

                                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-4 col-xl-5 redimension">
                                            <label style="font-weight: bold; font-size: 20px;"><?php echo $lang["escuela_texto_select"];?>:</label>
                                            <select class="form-control" value="" name="validacion-dni-select" id="validacion-dni-select" readonly>
                                                <option value="0" disabled selected><?php echo $lang["escuela_option"];?></option>  
                                            </select>
                                        </div>
                                    </div>
                                              
                                    <!-- PARTE 1 FORM - DATOS -->
                                    <div class="row mt-4">
                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_cumpleaños"];?>:
                                                <input type="date" class="form-control input-control-dni" disabled style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_dni_jugador"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="dnijugador" id="dni-jugador-form-masculino" maxlength="50" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_nombre"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="nombre" id="nombre-form-masculino" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_apellidos"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="apellidos" id="apellidos-form-masculino" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_direccion"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="direccion" id="direccion-form-masculino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_numero"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="numero" id="numero-form-masculino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_piso"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="piso" id="piso-form-masculino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                            <label><?php echo $lang["formulario_puerta"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="puerta" id="puerta-form-masculino" maxlength="10">
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_poblacion"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="poblacion" id="poblacion-form-masculino" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_codigo_postal"];?>:
                                                <input type="number" class="form-control input-control-dni" disabled name="cp" id="cp-form-masculino" maxlength="10" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                            <label><?php echo $lang["formulario_provincia"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="provincia" id="provincia-form-masculino" maxlength="25" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                                            <label for="alergico-form-masculino" class="labelForm"><?php echo $lang["formulario_alergia"];?>*:</label>
                                            <select class="form-control inputForm valid input-control-dni" disabled value="" id="alergico-form-masculino" name="alergico-form-masculino" style="font-size: 14px;" aria-invalid="false">
                                                <option selected disabled>Selecciona uno por favor</option>
                                                <option value="1">Sí</option>
                                                <option value="0" selected>No</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-12 col-sm-9 col-md-6 col-lg-6 col-xl-6">
                                            <label for="alergias-form-masculino" class="labelForm"><?php echo $lang["formulario_alergias"];?>:</label>
                                            <input type="text" class="form-control inputForm valid input-control-dni" disabled value="" id="alergias-form-masculino" name="alergias-form-masculino" placeholder="Alergias" aria-invalid="false">
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_nombre_padre"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="nombrepadre" id="nombrepadre-form-masculino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_nombre_madre"];?>:
                                                <input type="text" class="form-control input-control-dni" disabled name="nombremadre" id="nombremadre-form-masculino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_telefono_padre"];?>:
                                                <input type="number" class="form-control input-control-dni" disabled name="tlfpadre" id="tlfpadre-form-masculino"  maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["formulario_telefono_madre"];?>:
                                                <input type="number" class="form-control input-control-dni" disabled name="tlfmadre" id="tlfmadre-form-masculino" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="form-group col-12">
                                            <label><?php echo $lang["formulario_correo"];?>:
                                                <input type="email" class="form-control input-control-dni" disabled name="email" id="email-form-masculino" maxlength="100" required>
                                            </label>
                                        </div>

                                        <div class="col-12">
                                            <p class="t-left mt-0" style="color: red;">
                                                <strong>* <?php echo $lang["formulario_aviso_email"];?></strong>
                                            </p>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["plataforma_formacion_equipo"];?>:
                                                <input type="text" class="form-control" disabled name="modalidad" id="modalidad-form-masculino"  maxlength="15">
                                                <input type="hidden" name="id-modalidad-form-masculino" id="id-modalidad-form-masculino" >
                                            </label>
                                        </div>

                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                            <label><?php echo $lang["ins_form_horario"];?>:
                                                <table class="table table-striped form-group" border="1" style="width: 100%;">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["lunes"];?></th>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["martes"];?></th>
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["miercoles"];?></th> 
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["jueves"];?></th> 
                                                            <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;"><?php echo $lang["viernes"];?></th>    
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="">
                                                            <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >-</td>
                                                            <input type="hidden" name="texto-horario-masculino" id="texto-horario-masculino" >
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </label>
                                        </div>
                                    </div>                                            
                                    
                                    <!-- PARTE 3 - PAGOS -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h3 class="section-title t-center mb-0">
                                                <span class="orange-text"><?php echo $lang["ins_cantera_pagos"];?></span>
                                            </h3>
                                        </div>


                                        <!--<div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <h4 class="section-title mt-1 mb-0">Reserva: 50€</h4>
                                            <p class="t-justify mb-0"><strong>- Puede pagarla en oficina o con tarjeta.</strong></p>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <h4 class="section-title mt-1 mb-0">Matrícula: 110€</h4>
                                            <p class="t-justify mb-0"><strong>- Pago en oficinas.</strong></p>
                                            <p class="t-justify mt-0 mb-0"><strong>- Debe estar pagada para retirar la ropa.</strong></p>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <h4 class="section-title mt-1 mb-0">Trimestre</h4>
                                            <h4 class="section-title mt-0 mb-0">Pagos por domiciliación bancaria</h4>  
                                            <p class="t-justify mt-0 mb-0">- Baby y Prebenjamín:<span> 3 pagos de 150€</span></p>
                                            <p class="t-justify mt-0 mb-0">- Resto de categorías:<span> 3 pagos de 170€</span></p>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                            <h4 class="section-title mt-1 mb-0">Plazos:</h4>
                                            <p class="t-justify mb-0">- 1º Pago: del 1 al 15 de nov. de 2019 </p>
                                            <p class="t-justify mt-0 mb-0">- 2º Pago: del 1 al 15 de enero de 2020 </p>
                                            <p class="t-justify mt-0 mb-0">- 3º Pago: del 1 al 15 de abril de 2020</p>
                                        </div>-->

                                        <div class="form-group col-12 mt-2">
                                            <table class="table table-striped form-group" border="1" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" style="width: 20%; padding-top: 4px; padding-bottom: 4px;" colspan="6">BABY Y PREBENJAMIN</th>    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" ><?php echo $lang["escuela_tabla_precios_inscripcion"];?></td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" ><?php echo $lang["escuela_tabla_precios_inscripcion"];?>: 1-15 Sep.</td>
                                                        <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 Nov.</td>
                                                        <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 Enero</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 Abril</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Total</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;">50€</td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;">150€* <br><strong> <?php echo $lang["escuela_tabla_precios_descuento_50"];?></strong></td>
                                                        <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >150€</td>
                                                        <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >150€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >150€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" ><strong>600€</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group col-12">
                                            <p class="t-justify" style="color: red;">
                                               <strong>*Hermanos 135€ en matricula. </strong>
                                            </p>
                                        </div>

                                        <div class="form-group col-12 mt-2">
                                            <table class="table table-striped form-group" border="1" style="width: 100%;">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th scope="col" style="width: 20%;padding-top: 4px;padding-bottom: 4px;" colspan="6">RESTO DE EQUIPOS</th>    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Inscripcción</td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Matricula de 1-15 de Sep.</td>
                                                        <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 de Nov.</td>
                                                        <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 de Enero</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >1-15 de Abril</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >Total</td>
                                                    </tr>
                                                    <tr>
                                                        <td id="lunes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >50€</td>
                                                        <td id="martes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175* <br><strong> <?php echo $lang["escuela_tabla_precios_descuento_50"];?></strong></td>
                                                        <td id="miercoles-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175€</td>
                                                        <td id="jueves-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" >175€</td>
                                                        <td id="viernes-form-masculino" style="text-align:center;padding-top: 4px;padding-bottom: 4px;" ><strong>700€</strong></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="form-group col-12">
                                            <p class="t-justify" style="color: red;">
                                               <strong>*<?php echo $lang["escuela_tabla_precios_descuento_hermanos_135"];?> </strong>
                                            </p>
                                        </div>

                                        <div class="col-12">
                                            <hr>
                                            <p class="t-justify">
                                                <?php echo $lang["escuela_informacion_baja_punto1"];?>.
                                            </p>

                                            <p class="t-justify">
                                               <strong> <?php echo $lang["escuela_informacion_baja_punto2"];?> </strong>
                                            </p>

                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo-pago-extra" value="si" required class="input-control-dni" disabled checked>
                                                <p><?php echo $lang["patronato_punto3_ultimo_texto_pagos"];?></p>
                                                <span class="checkmark"></span>
                                            </label>
                                            
                                            <h4><?php echo $lang["escuela_informacion_baja_punto3"];?></h4>

                                            <div class="row">
                                                <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                                    <div class="contact-info-wrap mt-1 mb-1 t-center">	
                                                        <h3 class="section-title mt-0 mb-0 t-center">
                                                            <span class="orange-text"><?php echo $lang["soporte_tecnico_titulo"];?></span>
                                                        </h3>
                                                        <p class="t-center">
                                                            <strong><?php echo $lang["soporte_tecnico_texto"];?></strong>
                                                        </p>
                                                        <a href="https://wa.me/+34687717491" target="_blank" style="color: black; font-size: 1.3em;">
                                                            <img src="img/wassap3.png" style="max-width: 50px;" alt="Contacta por WhatsApp"><strong> WhatsApp 687717491</strong>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-9 col-lg-9 col-xl-9">
                                                    <h4 class="section-title t-center mt-1 mb-1"><?php echo $lang["domiciliacion_titulo"];?></h4>

                                                    <div class="row">
                                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label><?php echo $lang["domiciliacion_titular"];?>:
                                                                <input type="text" class="form-control input-control-dni" disabled name="titular" maxlength="100" id="titular-form-masculino" required>
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-12 col-md-6 col-lg-6 col-xl-6">
                                                            <label><?php echo $lang["formulario_dni"];?>:
                                                                <input type="text" class="form-control input-control-dni" disabled name="dnititular" id="dni-form-masculino" maxlength="50" required>
                                                            </label>
                                                        </div>                                                  

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="iban-input"><?php echo $lang["domiciliacion_iban"];?></label>
                                                            <input id="iban-input" type="text" class="form-control input-control-dni" disabled value="ES" name="iban" minlength="4" maxlength="4" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="entidad-input"><?php echo $lang["domiciliacion_entidad"];?></label>
                                                            <input id="entidad-input" type="number" class="form-control input-control-dni" disabled value="" minlength="4" name="entidad" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="oficina-input"><?php echo $lang["domiciliacion_oficina"];?></label>
                                                            <input id="oficina-input" type="number" class="form-control input-control-dni" disabled value="" minlength="4" name="oficina" onkeydown="limit4(this);" onkeyup="limit4(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-2 col-lg-2 col-xl-2">
                                                            <label for="dc-input"><?php echo $lang["domiciliacion_dc"];?></label>
                                                            <input id="dc-input" type="number" class="form-control input-control-dni" disabled value="" minlength="2" name="dc" onkeydown="limit2(this);" onkeyup="limit2(this);" required>
                                                        </div>

                                                        <div class="form-group col-12 col-md-4 col-lg-4 col-xl-4">
                                                            <label for="cuenta"><?php echo $lang["domiciliacion_cuenta"];?></label>
                                                            <input type="number" class="form-control input-control-dni" disabled id="cuenta" minlength="10" name="cuenta" onkeydown="limit10(this);" onkeyup="limit10(this);" minlength="10" required>
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
                                                                <strong><?php echo $lang["domiciliacion_texto_domiciliacion"];?></strong>
                                                            </p>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" disabled>
                                                                <p><?php echo $lang["politicas_check_condiciones"];?></p>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-12">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" disabled checked>
                                                                <p><?php echo $lang["escuela_check_domiciliacion"];?></p>
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2"><!--  type="submit"  -->
                                                            <button class="btn input-control-dni" disabled style="width: 100%; margin-left: 0;" name="oficinas" type="submit" id="submitOficinas">
                                                                <span><?php echo $lang["boton_tarjetas"];?></span>
                                                            </button>
                                                            <input id="oficinas-button" type="hidden" value="0">
                                                        </div>

                                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2"> <!-- type="submit"  -->
                                                            <button class="btn input-control-dni" disabled style="width: 100%; margin-left: 0;" name="tarjeta" type="submit" id="submitTarjeta">
                                                                <span><?php echo $lang["boton_tarjetas"];?></span>
                                                            </button>
                                                            <input id="tarjeta-button" type="hidden" value="0">
                                                        </div>

                                                        <div class="col-12 mb-2">
                                                            <p class="t-justify"><?php echo $lang["politicas_texto_ley_organica"];?></p>
                                                            <p class="t-justify"><?php echo $lang["politicas_check_productos"];?></p>
                                                            <p class="t-justify"><?php echo $lang["politicas_check_imagenes"];?></p>
                                                            <p class="t-justify"><?php echo $lang["politicas_texto_cancelacion1"];?><?php echo $lang["enlace_cancelacion"];?><?php echo $lang["politicas_texto_cancelacion2"];?>
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
                    </div>
                </div>
            </section>

            <?php require ("includes/footer.php"); ?>
            <?php require ("includes/cookies.php"); ?>

        </div>
            
        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>
        <script src="js/jquery.validate.min.js"></script>

        <script type="text/javascript">
            //  Bloqueamos el formulario 
            /*$('body').on('click','#submitOficinas',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });
            
            $('body').on('click','#submitOficinas span',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });
            
            $('body').on('click','#submitTarjeta',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });
            
            $('body').on('click','#submitTarjeta span',function()
            {
                alert("Para nuevas Inscripciones, por favor, envíe un correo a recepcion@alqueriadelbasket.com con sus datos.");
                return false;
            });*/
            
            
            $("#submitOficinas").on('click',function(){
                $("#oficinas-button").attr('name','oficinas');
                $("#tarjeta-button").attr('name','');
            });

            $("#submitTarjeta").on('click',function(){
                $("#tarjeta-button").attr('name','tarjeta');
                $("#oficinas-button").attr('name','');
            });

            //$("#contactform").on('submit',function(e){
            $('#contactform').validate(
            {
                submitHandler:function()
                {
                    console.log("Entramos al contact form");

                    $.ajax({
                        type: "POST",
                        url: "?r=index/equiposmasculinosform",
                        data: $('#contactform').serialize(),
                        dataType: "json",
                        success: function(data){
                            console.log("Entramos al succes");

                            //console.log("Legamos a la ultima linea del succes");
                            //console.log("Data -> " + data);
                            window.location.href = data.url;
                        },error: function (request, status, error) {
                            console.log("Entramos al error");
                            console.log("****************************************************************");
                            console.log(request.responseText);
                            console.log("****************************************************************");
                            console.log(status);
                            console.log("****************************************************************");
                            console.log(error);
                        }
                    });
                    //e.preventDefault();
                }
            });

            $( "#buscar-validacion-dni" ).on( "click", function() 
            {
                alert("Las inscripciones para la temporada 2019 - 2020 se cerraron. Por favor, ");
                return false;*/
                
                //console.log("ENTRAMOS AL ON CLICK");
                if( $("#validacion-dni").val().trim() != "" && $("#validacion-dni").val().trim().length == 9 )
                {
                    // console.log("Todo ok");
                    var form_data = {
                        dni: $("#validacion-dni").val().trim(),
                        categoria: "masculino"
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
                            console.log("hola");
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
                                $(".input-control-dni").prop("disabled", false);
                            }
                            else{
                                alert("El DNI introducido pertenece a cantera, por favor diríjase a cantera mediante el menú 'INSCRIPCIONES ESCUELA - > CANTERA'.");
                                VaciarCampos();  
                                $("#existe_inscripcion").val( "0" );
                                $(".input-control-dni").prop("disabled", true);                            
                            }
                        }
                    });
                }
                else{
                    alert("Por favor, compruebe que la longitud del DNI es de 9 digitos. Rellene con ceros al principio si es necesario y incluya la letra.");
                    //console.log("entramos al else");
                    VaciarCampos();  
                    $("#existe_inscripcion").val( "0" );
                    $(".input-control-dni").prop("disabled", true);
                }
            });

            $( "#validacion-dni-select" ).on( "change", function() {
                 BuscarAlumno();  
            });

            $( "#texto_pruebas" ).on( "change", function() {
                 if( $( "#texto_pruebas" ).val() == "POemY5vvrSHj6ZGbkOcFCFQafiUDBpDJyJPcgQ8bPgoBn8tdnh" ){
                    $("#contenido_pruebas").css("display", "block");
                 } else {
                    $("#contenido_pruebas").css("display", "none");
                 } 
            });

            /*
             * $( ".input-control-dni" ).keyup( function() {
               //console.log("entramos");  
               var valor_a_cambiar = $(this).val().toUpperCase();
               $(this).val("");
               $(this).val(valor_a_cambiar);
            });
            */

            function BuscarAlumno(){
                if( $("#validacion-dni-select option:selected").val() != 0 )
                {
                    //  console.log("ENTRAMOS AL ON CLICK");
                    /*alert("El formulario de inscripción a ESCUELA está bloqueado");
                    return false;*/
                
                    var form_data = {
                        form_id:    "inscripciones_cargar_contenido_inscripcion_original_conEquipoHorario",
                        idinscripcion: $("#validacion-dni-select option:selected").val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/Dispatcher",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            //VaciarCampos();
                            $("#lunes-form-masculino").text( "-" );
                            $("#martes-form-masculino").text( "-" );
                            $("#miercoles-form-masculino").text( "-" );
                            $("#jueves-form-masculino").text( "-" );
                            $("#viernes-form-masculino").text( "-" );
                            $("#existe_inscripcion").val( data.datos.id_formulario );
                            $("#fecha").val( data.datos.fecha_nacimiento  );

                            //nombre
                            if( data.datos.nombre_apellidos != null ){
                                $("#nombre-form-masculino").val( data.datos.nombre_apellidos.slice( 0, data.datos.nombre_apellidos.indexOf(" ", 2) ) );
                                var valor_nombre_form_masculino = $('#nombre-form-masculino').val().toUpperCase();
                                $('#nombre-form-masculino').val(valor_nombre_form_masculino);
                            }

                            //apillidos
                            if( data.datos.nombre_apellidos != null ){
                                $("#apellidos-form-masculino").val( data.datos.nombre_apellidos.slice( data.datos.nombre_apellidos.indexOf(" ", 2 ) ) );
                                var valor_apellidos_form_masculino = $('#apellidos-form-masculino').val().toUpperCase();
                                $('#apellidos-form-masculino').val(valor_apellidos_form_masculino);
                            }

                            //direccion
                            if( data.datos.direccion != null ){
                                $("#direccion-form-masculino").val( data.datos.direccion );
                                var valor_apellidos_form_masculino = $('#direccion-form-masculino').val().toUpperCase();
                                $('#direccion-form-masculino').val(valor_apellidos_form_masculino);
                            }
                             
                            if( data.datos.numero != null ){   
                                $("#numero-form-masculino").val( data.datos.numero );
                            }

                            if( data.datos.piso != null ){
                                $("#piso-form-masculino").val( data.datos.piso );
                            }

                            if( data.datos.puerta != null ){
                                $("#puerta-form-masculino").val( data.datos.puerta );
                            }

                            //poblacion
                            if( data.datos.poblacion != null ){
                                $("#poblacion-form-masculino").val( data.datos.poblacion );
                                var valor_poblacion_form_masculino = $('#poblacion-form-masculino').val().toUpperCase();
                                $('#poblacion-form-masculino').val(valor_poblacion_form_masculino);
                            }

                            if( data.datos.codigo_postal != null ){
                                $("#cp-form-masculino").val( data.datos.codigo_postal );
                            }

                            //provincia
                            if( data.datos.provincia != null ){
                                $("#provincia-form-masculino").val( data.datos.provincia );
                                var valor_provincia_form_masculino = $('#provincia-form-masculino').val().toUpperCase();
                                $('#provincia-form-masculino').val(valor_provincia_form_masculino);
                            }

                            //nombre padre
                            if( data.datos.nombre_padre != null ){
                                $("#nombrepadre-form-masculino").val( data.datos.nombre_padre );
                                var valor_nombrepadre_form_masculino = $('#nombrepadre-form-masculino').val().toUpperCase();
                                $('#nombrepadre-form-masculino').val(valor_nombrepadre_form_masculino);
                            }

                            //Nombre madre
                            if( data.datos.nombre_madre != null ){
                                $("#nombremadre-form-masculino").val( data.datos.nombre_madre );
                                var valor_nombremadre_form_masculino = $('#nombremadre-form-masculino').val().toUpperCase();
                                $('#nombremadre-form-masculino').val(valor_nombremadre_form_masculino);
                            }


                            if( data.datos.telefono_padre != null ){
                                $("#tlfpadre-form-masculino").val( data.datos.telefono_padre );
                            }

                            if( data.datos.telefono_madre != null ){
                                $("#tlfmadre-form-masculino").val( data.datos.telefono_madre );
                            }

                            //email
                            if( data.datos.email != null ){
                                $("#email-form-masculino").val( data.datos.email );
                                var valor_email_form_masculino = $('#email-form-masculino').val().toUpperCase();
                                $('#email-form-masculino').val(valor_email_form_masculino);
                            }

                            //Titular
                            if( data.datos.titular_banco != null ){
                                $("#titular-form-masculino").val( data.datos.titular_banco );
                                var valor_titular_form_masculino = $('#titular-form-masculino').val().toUpperCase();
                                $('#titular-form-masculino').val(valor_titular_form_masculino);
                            }

                            if( data.datos.dni_tutor != null ){
                                $("#dni-form-masculino").val( data.datos.dni_tutor );
                            }

                            if( data.datos.iban != null ){
                                $("#iban-input").val( data.datos.iban );
                            }

                            if( data.datos.entidad != null ){
                                $("#entidad-input").val( data.datos.entidad );
                            }

                            if( data.datos.oficina != null ){
                                $("#oficina-input").val( data.datos.oficina );
                            }

                            if( data.datos.dc != null ){
                                $("#dc-input").val( data.datos.dc );
                            }

                            if( data.datos.cuenta != null ){
                                $("#cuenta").val( data.datos.cuenta );
                            }

                            if( data.datos.categoria != null ){
                                $("#categoria-form-masculino").val( data.datos.categoria );
                            }

                            if( data.datos.alergico != "1" ){
                                $("#alergico-form-masculino").val( "0" );
                            }else{
                                $("#alergico-form-masculino").val( "1" );
                            }

                            //alergias
                                $("#alergias-form-masculino").val( data.datos.alergias );
                                var valor_alergias_form_masculino = $('#alergias-form-masculino').val().toUpperCase();
                                $('#alergias-form-masculino').val(valor_alergias_form_masculino);

                            $("#modalidad-form-masculino").val( data.datos.equipo );
                            var horario_semana="";
                            
                            if( data.datos.lunes != null ){    
                                $("#lunes-form-masculino").text( data.datos.lunes );
                                horario_semana = horario_semana + "/LUNES:" +  data.datos.lunes;
                            }
                            
                            if( data.datos.martes != null ){
                                $("#martes-form-masculino").text( data.datos.martes );
                                horario_semana = horario_semana + "/MARTES:" +  data.datos.martes;
                            }
                            
                            if( data.datos.miercoles != null ){    
                                $("#miercoles-form-masculino").text( data.datos.miercoles );
                                horario_semana = horario_semana + "/MIERCOLES" +  data.datos.miercoles;
                            }
                            
                            if( data.datos.jueves != null ){
                                $("#jueves-form-masculino").text( data.datos.jueves );
                                horario_semana = horario_semana + "/JUEVES:" +  data.datos.jueves;
                            }
                            
                            if( data.datos.viernes != null ){    
                                $("#viernes-form-masculino").text( data.datos.viernes );
                                horario_semana = horario_semana + "/VIERNES" +  data.datos.viernes;
                            }


                            $("#texto-horario-masculino").val(horario_semana);

                            if( data.datos.dni_jugador != null ){ 
                                $("#dni-jugador-form-masculino").val(data.datos.dni_jugador);
                            }
                            

                            //EncontrarYMostrarEquipo(data.datos.modalidad);
                            
                           
                        },error: function (){
                            console.log("error en el ajax");
                        }
                    });
                }
            }

            function VaciarCampos(){ 
              //console.log("Entramos a la funcion");
                $("#existe_inscripcion").val( "0" );
                $("#fecha").val( "" );
                $("#nombre-form-masculino").val( "" );
                $("#apellidos-form-masculino").val( "" );
                $("#direccion-form-masculino").val( "" );
                $("#numero-form-masculino").val( "" );
                $("#piso-form-masculino").val( "" );
                $("#puerta-form-masculino").val( "" );
                $("#poblacion-form-masculino").val( "" );
                $("#cp-form-masculino").val( "" );
                $("#provincia-form-masculino").val( "" );
                $("#nombrepadre-form-masculino").val( "" );
                $("#nombremadre-form-masculino").val( "" );
                $("#tlfpadre-form-masculino").val( "" );
                $("#tlfmadre-form-masculino").val( "" );
                $("#email-form-masculino").val( "" );
                $("#titular-form-masculino").val( "" );
                $("#dni-form-masculino").val( "" );
                $("#iban-input").val( "" );
                $("#entidad-input").val( "" );
                $("#oficina-input").val( "" );
                $("#dc-input").val( "" );
                $("#cuenta").val( "" );
                $("#validacion-dni-select option").remove();
                $("#validacion-dni-select").append("<option value='0' disabled selected>No hay resultados para el DNI introducido</option> ");
                $("#modalidad-form-masculino").val( "" );
                $("#lunes-form-masculino").text( "-" );
                $("#martes-form-masculino").text( "-" );
                $("#miercoles-form-masculino").text( "-" );
                $("#jueves-form-masculino").text( "-" );
                $("#viernes-form-masculino").text( "-" );
                $("#viernes-form-masculino").val( "-" );
                $("#viernes-form-masculino").val( "-" );
                $("#alergico-form-masculino").val( "0" );
                $("#alergias-form-masculino").val( "" );
                $("#texto-horario-masculino").val("");
                $("#dni-jugador-form-masculino").val("");
            }

            /*function EncontrarYMostrarEquipo(equipo){ 
                var nombreEquipo="";
              switch(equipo) {
                  case "alevin2007":
                        nombreEquipo="JUNIOR ROJO FEMENINO";
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE NARANJA FEMENINO";
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE ROJO FEMENINO";
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE BLANCO FEMENINO";
                    break;
                    case "alevin2007":
                        nombreEquipo="INFANTIL NARANJA FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN NARANJA FEMENINO"
                    break;
                    case "alevin2007":
                    nombreEquipo="INFANTIL AZUL FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN AZUL FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN ROJO FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN NARANJA FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN AZUL FEMENINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="JUNIOR NARANJA MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE ROJO MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE NARANJA MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE AZUL MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="CADETE BLANCO MASCULINO"
                    break;
                    case "infantil-a-masculino":
                        nombreEquipo="INFANTIL AZUL MASCULINO"
                    break;
                    case "infantil-b-masculino":
                        nombreEquipo="INFANTIL BLANCO MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="INFANTIL NARANJA MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="INFANTIL ROJO MASCULINO"
                    break;

                    case "alevin2008":
                        nombreEquipo="ALEVIN 2008 MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN BLANCO MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN NARANJA MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN AZUL MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="ALEVIN ROJO MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN 2010 MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN ROJO MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN NARANJA MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN AZUL MASCULINO"
                    break;
                    case "alevin2007":
                        nombreEquipo="BENJAMIN BLANCO MASCULINO"
                    break;
                    case "prebenjaminimpar":
                        nombreEquipo="PREBENJAMIN IMPAR NARANJA"
                    break; 
                    case "prebenjaminimpar":
                        nombreEquipo="PREBENJAMIN IMPAR AZUL"
                    break;
                    case "prebenjaminpar":
                        nombreEquipo="PREBENJAMIN PAR NARANJA"
                    break;
                    case "prebenjaminpar":
                        nombreEquipo="PREBENJAMIN PAR AZUL"
                    break;
                    case "babypar":
                        nombreEquipo="BABY PAR"
                    break;
                    case "babyimpar":
                        nombreEquipo="BABY IMPAR"
                    break;
                  default:
                    // code block
                }
            }*/


            
            /*$("#contactform").on('submit',function(e){

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
                        // Error Tarjeta 
                        if(data["response"] === "1"){
                            alert('Parece que hubo algún error, por favor, inténtelo de nuevo más tarde');
                            window.location.replace('?r=index/principal');
                            // OK Oficiina 
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
            });*/

        </script>
        <!-- Load Scripts End -->

    </body>
</html>                 