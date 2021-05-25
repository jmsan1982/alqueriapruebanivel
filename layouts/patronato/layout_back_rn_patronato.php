<!DOCTYPE html>
<html lang="es">
<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #eb7c00 !important;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #eb7c00 !important;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .alinear-izquierda {
        padding-left: 0 !important;
    }

    .trimestres {
        margin-top: 5px !important;
    }
</style>
<?php

require "includes/head_back.php";
if ($filtrado == "1") {
    echo("1");
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'visible';
} elseif ($filtrado == "2") {
    echo("2");
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'visible';
} elseif ($filtrado == "4") {
    echo("4");
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleOtrasConsultas = 'visible';
    $visibleConsultarPagos = 'visible';
    $displayResultados = 'none';
} else {
    $inscripciones = $otrasConsultas = 'btn-empresas-desactivo';
    $pagosFecha = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'visible';
    $visibleOtrasConsultas = 'none';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'visible';
}


?>
<body>
<script src="backmeans/assets/js/jquery.js"></script>
<link rel="stylesheet" href="css/empresas.css">
<link rel="stylesheet" href="libs/Magnific-Popup/magnific-popup.css" rel="stylesheet" type="text/css">
<?php require "includes/topbar_back.php" ?>

<div class="canvas">
    <div id="content">
        <div id="page-content" style="padding:25px 25px 25px 25px;">
            <div class="block page-contacts-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-Club-Gallery clearfix t-black t-center">
                                <div class="b-wrap-club-gallery">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <h2 class="section-title t-center mt-0" style="text-align:center;">
                                                    <span class="orange-text t-center">Control de inscripciones y pagos Patronato</span>
                                                </h2>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="filters-by-category">
                                                    <ul class="option-set t-center" data-option-key="filter"
                                                        style="list-style:none;text-align:center;">
                                                        <li>
                                                            <button id="mostrar_div_launcher_1"
                                                                    class="btn <?php echo $inscripciones ?>"
                                                                    onclick="mostrar_div('div-1');"><span class="mt-0">Inscripciones Patronato</span>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button id="mostrar_div_launcher_2"
                                                                    class="btn <?php echo $pagosFecha ?>"
                                                                    onclick="mostrar_div('div-2');"><span class="mt-0">Pagos por fecha</span>
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <button id="mostrar_div_launcher_3"
                                                                    class="btn <?php echo $otrasConsultas ?>"
                                                                    onclick="mostrar_div('div-3');"><span class="mt-0">Otras consultas</span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div id="div-1" class="col-xs-12 col-sm-12 col-md-12 mb-2"
                                             style="display:<?php echo $visibleInscripciones; ?>">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h4 class="section-title mt-0 mb-0" style="text-align:center;">
                                                        *Puede ordenar las filas haciendo click en los títulos o buscar
                                                        por <span style="text-decoration:underline;color:#eb7c00;">DNI titular cuenta</span>,
                                                        <span style="text-decoration:underline;color:#eb7c00;">nombre</span>,
                                                        <span style="text-decoration:underline;color:#eb7c00;">"oficinas"</span>.
                                                    </h4>
                                                    <table id="inscripciones-listado-datatable" class="table mb-2">
                                                        <thead class="table-dark">
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>NºPedido</th>
                                                            <th>DNI Titular</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                           <!-- <th>Email</th> -->
                                                            <th>Reserva 50€</th>
                                                            <th>Categoria</th>
                                                            <th>Modalidad</th>
                                                            <th>Inscripción completa</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($datos['inscripciones'] as $inscripcion)
                                                        {
                                                            $pagos_del_formulario = inscripciones_patronato_pagos::findByIdFormulario($inscripcion['id_formulario']);
                                                            /*
                                                            $total_pagado = 0;
                                                            foreach ($pagos_del_formulario as $pago) {
                                                                $total_pagado += $pago['importe'];
                                                            }
                                                            */

                                                            $date               = new DateTime($inscripcion['fecha_inscripcion']);
                                                            $array_contenido    = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);
                                                            if (isset($array_contenido) && isset($array_contenido[17]) && $array_contenido[17] !== "") {
                                                                $string_dni=str_replace("DNI TITULAR: ", "", $array_contenido[17]);
                                                            } else {
                                                                $string_dni='-';
                                                            }
                                                            
                                                            if ($inscripcion['pagado']=="1" || $inscripcion['pagado']===1) {
                                                                $string_pagado='Sí (TPV)';
                                                            } 
                                                            else if ($inscripcion['pagado']==="Oficina") {
                                                                $string_pagado='Sí (Oficina)';
                                                            }
                                                            else {
                                                                $string_pagado=$inscripcion['pagado'];
                                                            }
                                                            
                                                            if (isset($array_contenido) && isset($array_contenido[14]) && $array_contenido[14] !== "") {
                                                                $string_modalidad=str_replace("<b>Modalidad:</b>", "", $array_contenido[14]);
                                                            } else {
                                                                $string_modalidad='-';
                                                            }
                                                            
                                                            echo '<tr id="' . $inscripcion['id_formulario'] . '" style="cursor:pointer;" class="">
                                                                    <td class="t-center">' . $date->format('d/m/Y') . '</td>
                                                                    <td class="t-center">' . $inscripcion['numero_pedido'] . '</td>
                                                                    <td class="t-left">' . $string_dni.'</td>
                                                                    <td class="t-left">' . $inscripcion['nombre'] . '</td>
                                                                    <td class="t-left">' . $inscripcion['apellidos'].'</td>
                                                                    
                                                                    <td class="t-left">' . $string_pagado. '</td>                                                                              
                                                                    <td class="t-left">' . $inscripcion['categoria'] . '</td>
                                                                    <td class="t-left">' . $string_modalidad.'</td>
                                                                    <td class="t-left">  
                                                                        <button class="btn btn-empresas-desactivo" 
                                                                            style="margin:2px auto 0 0;" 
                                                                            data-toggle="modal"
                                                                            data-target="#myModal" 
                                                                            onclick="mimodal(' . $inscripcion['id_formulario'] . ')">Ver inscripción</button>     

                                                                        <button class="btn btn-empresas-desactivo" 
                                                                            style="margin:2px auto 0 0;" 
                                                                            data-toggle="modal"
                                                                            data-target="#myModalEditarCuenta" 
                                                                            onclick="mimodaleditarcuenta(' . $inscripcion['id_formulario'] . ')">Editar cuenta</button>  

                                                                        <button class="btn btn-empresas-desactivo"
                                                                            style="margin:2px auto 0 0;" 
                                                                            data-toggle="modal"
                                                                            data-target="#myModalPagosTrimestrales"
                                                                            onclick="mimodaldepagos(' . $inscripcion['id_formulario'] . ')">Pagos</button>     

                                                                        <button class="btn btn-empresas-desactivo"
                                                                            style="margin:2px auto 0 0;" 
                                                                            data-toggle="modal"
                                                                            data-target="#inscripciones-dar-baja-alta"
                                                                            onclick="mimodaleditarbajayalta(' . $inscripcion['id_formulario'] . ')">Dar de baja / alta</button>  
                                                                    </td>
                                                                </tr>';
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="div-2" class="col-xs-12 col-sm-12 col-md-12 mb-2"
                                             style="display:<?php echo $visiblePagosPorFecha; ?>">
                                            <div class="row no-gutters">
                                                <div class="col-xs-12 col-sm-12 col-md-3">
                                                    <h4 class="section-title mt-0 mb-0" style="text-align:left;">
                                                        PAGOS POR FECHAS
                                                    </h4>
                                                    <table class="table w-100 mb-2">
                                                        <thead class="table-dark">
                                                        <tr>
                                                            <th>Fecha</th>
                                                            <th>Total €</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($datos['pagosagrupadosporfecha'] as $fechapago) {
                                                            echo '<tr>
                                                                                        <td class="t-center">
                                                                                            <a class="cambiar-buscador-pagos-datatable">' .
                                                                $fechapago['created_day'] . '</a></td><td class="t-center"><strong>' . $fechapago["suma"] . '€</strong></td> </tr>';
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-9 mb-2">
                                                    <h4 class="section-title mt-0 mb-0" style="text-align:center;">
                                                        *Puede buscar por fecha (ej. <span
                                                                style="text-decoration:underline;color:#eb7c00;">2018-09-12</span>)
                                                    </h4>

                                                    <table id="pagos-listado-datatable" class="table w-100 mb-2">
                                                        <thead class="table-dark">
                                                        <tr>
                                                            <th>Fecha y hora pago</th>
                                                            <th>Importe €</th>
                                                            <th>DNI Titular</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                            <th>Categoria</th>
                                                            <th>Modalidad</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        foreach ($datos['todospagos'] as $pago) {
                                                            $inscripcion_asociada = inscripciones_patronato::findFormForId($pago['id_formularioinscripciones']);
                                                            //$datetime_fecha_pago = new DateTime($pago['fecha']);
                                                            $array_contenido = preg_split('/<br[^>]*>/i', $inscripcion_asociada['contenido']);

                                                            echo '<tr id="' . $pago['id'] . '">
                                                                                        <td class="t-center">' . substr($pago['fecha'], 0, 10) . '</td>
                                                                                        <td class="t-center">' . $pago['importe'] . '€</td>
                                                                                        <td class="t-left">' . $pago['dni_pagador'] . '</td>
                                                                                        <td class="t-left">' . $inscripcion_asociada['nombre'] . '</td>
                                                                                        <td class="t-left">' . $inscripcion_asociada['apellidos'] . '</td>
                                                                                        <td class="t-left">' . $inscripcion_asociada['categoria'] . '</td>';

                                                            if (isset($array_contenido) && isset($array_contenido[14]) && $array_contenido[14] !== "") {
                                                                echo '<td class="t-left">' . str_replace("<b>Modalidad:</b>", "", $array_contenido[14]);
                                                            } else {
                                                                echo '<td class="t-left">-';
                                                            }

                                                            echo '</tr>';
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="div-3" class="col-xs-12 col-sm-12 col-md-12 mb-2"
                                             style="display:<?php echo $visibleOtrasConsultas; ?>">

                                            <!-- CONSULTA POR NÚMERO DE PEDIDO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#1"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR NÚMERO DE PEDIDO
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="1" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form"
                                                                      action="?r=login/consultapornumeropedido">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Numero
                                                                                de pedido</label>
                                                                            <input type="text" name="numeropedido"
                                                                                   class="form-control"
                                                                                   placeholder="Número de pedido"
                                                                                   required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR EMAIL -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#2"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR EMAIL
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="2" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/consultaporemail">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Dirección
                                                                                de correo completa</label>
                                                                            <input type="email" name="email"
                                                                                   class="form-control"
                                                                                   placeholder="Dirección de correo completa"
                                                                                   required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR FECHA Y ESTADO DEL PAGO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#10"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR FECHA Y ESTADO DEL PAGO
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="10" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form"
                                                                      action="?r=login/consultaporfechayestado">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Fecha</label>
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Fecha</label>
                                                                            <input type="date" name="fecha"
                                                                                   class="form-control"
                                                                                   placeholder="Fecha" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Estado</label>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <select name="estado" class="form-control"
                                                                                    style="width: 100%;" required>
                                                                                <option value="si">Pagado: si</option>
                                                                                <option value="no">Pagado: no</option>
                                                                                <option value="cantera">Cantera (no se
                                                                                    paga)
                                                                                </option>
                                                                                <option value="oficina">Pago en
                                                                                    Oficina
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR FECHA -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#11"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR FECHA
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="11" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/consultaporfecha">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">Fecha</label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="fecha"
                                                                                   class="form-control"
                                                                                   placeholder="Fecha" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR NÚMERO DE PEDIDO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#1"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR NÚMERO DE PEDIDO
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="1" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form"
                                                                      action="?r=login/consultapornumeropedido">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Numero
                                                                                de pedido</label>
                                                                            <input type="text" name="numeropedido"
                                                                                   class="form-control"
                                                                                   placeholder="Número de pedido"
                                                                                   required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR EMAIL -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#2"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR EMAIL
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="2" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/consultaporemail">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Dirección
                                                                                de correo completa</label>
                                                                            <input type="email" name="email"
                                                                                   class="form-control"
                                                                                   placeholder="Dirección de correo completa"
                                                                                   required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR FECHA Y ESTADO DEL PAGO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#10"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR FECHA Y ESTADO DEL PAGO
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="10" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form"
                                                                      action="?r=login/consultaporfechayestado">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Fecha</label>
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">Fecha</label>
                                                                            <input type="date" name="fecha"
                                                                                   class="form-control"
                                                                                   placeholder="Fecha" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">Estado</label>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <select name="estado" class="form-control"
                                                                                    style="width: 100%;" required>
                                                                                <option value="si">Pagado: si</option>
                                                                                <option value="no">Pagado: no</option>
                                                                                <option value="cantera">Cantera (no se
                                                                                    paga)
                                                                                </option>
                                                                                <option value="oficina">Pago en
                                                                                    Oficina
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR FECHA -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#11"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR FECHA
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="11" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/consultaporfecha">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">Fecha</label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="fecha"
                                                                                   class="form-control"
                                                                                   placeholder="Fecha" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- POR DNI DE DOMICILIACIÓN -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#3"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            POR DNI DE DOMICILIACIÓN
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="3" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/VerPorCategoriaPatronato">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group">
                                                                            <label for="contact-email"
                                                                                   class="control-label sr-only">DNI</label>
                                                                            <input type="text" name="categoria"
                                                                                   class="form-control"
                                                                                   placeholder="Dni" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CONSULTA POR FECHA DESDE HASTA Y EQUIPO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#8"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTA POR FECHA DESDE HASTA Y EQUIPO
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="8" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form"
                                                                      action="?r=login/consultaporfechaequipo">
                                                                    <div class="col-sm-3">
                                                                        <label for="contact-email"
                                                                               class="control-label">Fecha
                                                                            Inicio</label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="fechainicio"
                                                                                   class="form-control" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label for="contact-email"
                                                                               class="control-label">Fecha Fin</label>
                                                                        <div class="input-group">
                                                                            <input type="date" name="fechafin"
                                                                                   class="form-control" required>
                                                                            <span class="input-group-addon"><i
                                                                                        class="fa fa-flag"></i></span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label class="control-label">Equipo</label>
                                                                        <div class="input-group">
                                                                            <select name="equipo" class="form-control"
                                                                                    required>
                                                                                <option value="infantil-a-masculino">
                                                                                    CANTERA INFANTIL A MASCULINO
                                                                                </option>
                                                                                <option value="infantil-b-masculino">
                                                                                    CANTERA INFANTIL B MASCULINO
                                                                                </option>
                                                                                <option value="infantil-a-femenino">
                                                                                    CANTERA INFANTIL A FEMENINO
                                                                                </option>
                                                                                <option value="cadete-a-masculino">
                                                                                    CANTERA CADETE A MASCULINO
                                                                                </option>
                                                                                <option value="cadete-a-femenino">
                                                                                    CANTERA CADETE A FEMENINO
                                                                                </option>
                                                                                <option value="cadete-b-masculino">
                                                                                    CANTERA CADETE B MASCULINO
                                                                                </option>
                                                                                <option value="cadete-b-femenino">
                                                                                    CANTERA CADETE B FEMENINO
                                                                                </option>
                                                                                <option value="junior-a-masculino">
                                                                                    CANTERA JUNIOR A MASCULINO
                                                                                </option>
                                                                                <option value="junior-a-femenino">
                                                                                    CANTERA JUNIOR A FEMENINO
                                                                                </option>
                                                                                <option value="junior-b-masculino">
                                                                                    CANTERA JUNIOR B MASCULINO
                                                                                </option>
                                                                                <option value="junior-b-femenino">
                                                                                    CANTERA JUNIOR B FEMENINO
                                                                                </option>
                                                                                <option value="babypar">Baby Par
                                                                                </option>
                                                                                <option value="babyimpar">Baby Impar
                                                                                </option>
                                                                                <option value="prebenjaminimpar">
                                                                                    Prebenjamin Impar
                                                                                </option>
                                                                                <option value="prebenjaminpar">
                                                                                    Prebenjamin Par
                                                                                </option>
                                                                                <option value="benjamin2009">Benjamín
                                                                                    2009
                                                                                </option>
                                                                                <option value="benjaminrojo">Benjamín
                                                                                    Rojo
                                                                                </option>
                                                                                <option value="benjaminnaranja">Benjamín
                                                                                    Naranja
                                                                                </option>
                                                                                <option value="benjaminazul">Benjamín
                                                                                    Azul
                                                                                </option>
                                                                                <option value="alevin2007">Alevín 2007
                                                                                </option>
                                                                                <option value="alevin2008">Alevín 2008
                                                                                </option>
                                                                                <option value="alevinnaranja">Alevín
                                                                                    Naranja
                                                                                </option>
                                                                                <option value="alevinazul">Alevín Azul
                                                                                </option>
                                                                                <option value="alevinrojo">Alevín Rojo
                                                                                </option>
                                                                                <option value="infantilvalenciaxativa">
                                                                                    Infantil Valencia Xativa
                                                                                </option>
                                                                                <option value="infantilvalencianaranja">
                                                                                    Infantil Valencia Naranja
                                                                                </option>
                                                                                <option value="infantilvalenciasedavi">
                                                                                    Infantil Valencia Sedaví
                                                                                </option>
                                                                                <option value="infantilvalenciaazul">
                                                                                    Infantil Valencia Azul
                                                                                </option>
                                                                                <option value="infantilnaranja">Infantil
                                                                                    Naranja
                                                                                </option>
                                                                                <option value="infantilazul">Infantil
                                                                                    Azul
                                                                                </option>
                                                                                <option value="infantilrojo">Infantil
                                                                                    Rojo
                                                                                </option>
                                                                                <option value="cadetenaranja">Cadete
                                                                                    Naranja
                                                                                </option>
                                                                                <option value="cadeteazul">Cadete Azul
                                                                                </option>
                                                                                <option value="cadeterojo">Cadete Rojo
                                                                                </option>
                                                                                <option value="cadetenegro">Cadete
                                                                                    Negro
                                                                                </option>
                                                                                <option value="cadeteblanco">Cadete
                                                                                    Blanco
                                                                                </option>
                                                                                <option value="juniornaranja">Junior
                                                                                    Naranja
                                                                                </option>
                                                                                <option value="juniorazul">Junior Azul
                                                                                </option>
                                                                                <option value="juniorrojo">Junior Rojo
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <label for="contact-email"
                                                                               class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Consultar</span>
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- POR CATEGORÍA : CANTERA -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#4"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            POR CATEGORÍA : CANTERA
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="4" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <!-- CANTERA -->
                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    CANTERA INFANTIL</p>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantil-a-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantil-b-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>B MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantil-a-femenino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A FEMENINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    CANTERA CADETE</p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadete-a-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadete-a-femenino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A FEMENINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadete-b-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>B MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadete-b-femenino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>B FEMENINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    CANTERA JUNIOR</p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="junior-a-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="junior-a-femenino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>A FEMENINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="junior-b-masculino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>B MASCULINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="junior-b-femenino">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>B FEMENINO</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- /CANTERA -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- POR CATEGORÍA : EQUIPOS -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#5"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            POR CATEGORÍA : EQUIPOS
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="5" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>

                                                            <!-- ESCUELA EQUIPOS MASCULINOS -->
                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    BABY</p>
                                                                <div class="col-sm-6">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="babypar">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Baby Par</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="babyimpar">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Baby Impar</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    BPREBENJAMIN </p>
                                                                <div class="col-sm-6">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="prebenjaminimpar">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Prebenjamin Impar</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="prebenjaminpar">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Prebenjamin Par</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    BENJAMIN </p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="benjamin2009">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Benjamín 2009</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="benjaminrojo">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Benjamín Rojo</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="benjaminnaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Benjamín Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="benjaminazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Benjamín Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    ALEVIN</p>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="alevin2007">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Alevín 2007</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="alevin2008">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Alevín 2008</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="alevinnaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Alevín Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="alevinazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Alevín Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="alevinrojo">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Alevín Rojo</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    INFANTIL</p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilvalenciaxativa">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Valencia Xativa</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilvalencianaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Valencia Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilvalenciasedavi">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Valencia Sedaví</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilvalenciaazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Valencia Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">

                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilnaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="infantilrojo">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Infantil Rojo</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    CADETE</p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadetenaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Cadete Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadeteazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Cadete Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadeterojo">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Cadete Rojo</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadetenegro">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Cadete Negro</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="cadeteblanco">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Cadete Blanco</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 20px;">
                                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                                    JUNIOR</p>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="juniornaranja">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Junior Naranja</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="juniorazul">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Junior Azul</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <form id="contact-form" method="post" role="form"
                                                                          action="?r=login/VerPorCategoriaPatronato">
                                                                        <input type="hidden" name="categoria"
                                                                               value="juniorrojo">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>Junior Rojo</span>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <!-- /ESCUELA EQUIPOS MASCULINOS -->

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- DOMICILIACIONES. OBTENER INSCRIPCIONES ACTIVAS CON CUENTAS BANCARIAS INCORRECTAS DEDUCIDAS A PARTIR DEL DIGITO CONTROL -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a id="cargar-cuentas-bancarias-incorrectas-launcher" data-toggle="collapse" data-parent="#accordion1" href="#6"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            DOMICILIACIONES. OBTENER CUENTAS BANCARIAS INCORRECTAS
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="6" class="panel-collapse collapse">
                                                    <div class="panel-body" style="padding-top:0px;">
                                                        <div class="contact-form-wrapper">

                                                            <div class="row mt-2">
                                                                <div id="cargar-cuentas-bancarias-incorrectas-contenido"  class="col-sm-12"></div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <!-- DOMICILIACIONES. GENERAR XML -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#7"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            DOMICILIACIONES. GENERAR XML TRIMESTRALES
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="7" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                                
                                                                <div class="row mt-2">
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">Selecciona el trimestre a generar</label>
                                                                        <div class="input-group" style="width: 100%;">
                                                                            <select id="domiciliaciones-form-patronato-xml-trimestre" name="domiciliaciones_form_patronato_xml_trimestre" class="form-control" style="width: 100%;" required>
                                                                                <option value="trimestre_noviembre">XML de Noviembre 2018</option>
                                                                                <option value="trimestre_enero">XML de Enero 2019</option>
                                                                                <option value="trimestre_abril">XML de Abril 2019</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="control-label">&nbsp;</label>
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"
                                                                                id="domiciliaciones-form-patronato-xml"><span>Generar XML</span>
                                                                        </button>
                                                                    </div>
                                                                    <div id="download-xml" class="col-sm-12"></div>
                                                                </div>
                                                                
                                                                <div class="card-footer text-muted" id="domiciliation-message"></div>
                                                                
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- DOMICILIACIONES MATRÍCULAS. GENERAR XML -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#9"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            DOMICILIACIONES MATRÍCULAS. GENERAR XML
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="9" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <div class="col-sm-6">
                                                                    <button type="submit"
                                                                            class="btn btn-primary btn-block"
                                                                            id="domiciliaciones-matricula-form-xml">
                                                                        <span>Generar XML</span></button>
                                                                </div>
                                                                <div id="download-matricula-xml"></div>
                                                            </div>
                                                            <div class="card-footer text-muted"
                                                                 id="domiciliation-matricula-message"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- CONSULTAR PAGOS. -->
                                            <!-- CONSULTA POR NÚMERO DE PEDIDO -->
                                            <div class="panel panel-default" style="margin-bottom: 5px;" id="anchor">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#10"
                                                   style="text-decoration:none;">
                                                    <div class="panel-heading"
                                                         style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                        <h4 class="panel-title">
                                                            <i class="fa fa-plus-circle icon-collapsed"></i>
                                                            CONSULTAR PAGOS
                                                            <i class="fa fa-angle-down" style="float:right"></i>
                                                        </h4>
                                                    </div>
                                                </a>
                                                <div id="10" class="panel-collapse collapse">
                                                    <div class="panel-body"
                                                         style="background-color:#7b7b7b;padding-top: 0px;">
                                                        <div class="contact-form-wrapper">
                                                            <br/>
                                                            <div class="form-group">
                                                                <form id="contact-form" method="post"
                                                                      class="form-horizontal margin-bottom-30px"
                                                                      role="form" action="?r=login/consultarPagosPatronato">
                                                                    <div class="col-sm-6">
                                                                        <button type="submit"
                                                                                class="btn btn-primary btn-block"><span>ConsultarPagos</span>
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- FIN DOMICILIACIONES MATRÍCULAS. GENERAR XML -->
                                            <div class="row" style="margin-bottom: 20px;">
                                                <p style="margin-left: 20px;color:#eb7c00;font-weight: bold;font-size: 20px;text-align: center;">
                                                    POR PAGOS</p>
                                                <div class="col-sm-4">
                                                    <form id="contact-form" method="post" role="form"
                                                          action="?r=login/VerPagados">
                                                        <input type="hidden" name="tipo" value="si">
                                                        <button type="submit" class="btn btn-primary btn-block"><span>Listar pagados</span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-4">
                                                    <form id="contact-form" method="post" role="form"
                                                          action="?r=login/VerPagados">
                                                        <input type="hidden" name="tipo" value="oficina">
                                                        <button type="submit" class="btn btn-primary btn-block"><span>Listar pago en oficinas</span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-4">
                                                    <form id="contact-form" method="post" role="form"
                                                          action="?r=login/VerPagados">
                                                        <input type="hidden" name="tipo" value="no">
                                                        <button type="submit" class="btn btn-primary btn-block"><span>Listar pagos fallidos</span>
                                                        </button>
                                                    </form>
                                                </div>
                                                <!--                                                            <div id="download-generated-xml"></div>-->
                                            </div>
                                            <div id="div-resultados" style="display:<?php echo $displayResultados; ?>;">
                                                <h2 style="color:#406da4;text-align: center;">TOTAL RESULTADOS
                                                    <b><?php echo $datos['numerototalinscripciones']; ?></b></h2>

                                                <?php
                                                $contador2 = 100;
                                                foreach ($datos['inscripciones'] as $inscripcion) {
                                                    ?>
                                                    <div class="panel panel-default" style="margin-bottom: 5px;">
                                                        <a data-toggle="collapse" data-parent="#accordion1"
                                                           href="#<?php echo $contador2; ?>"
                                                           style="text-decoration:none;">
                                                            <div class="panel-heading"
                                                                 style="text-align:left;padding: 0px 10px 0px 10px;height: 40px;">
                                                                <h4 class="panel-title">
                                                                    <i class="fa fa-plus-circle icon-collapsed"></i>
                                                                    <?php echo strtoupper($inscripcion['nombre'] . " " . $inscripcion["apellidos"]); ?>
                                                                    <i class="fa fa-angle-down" style="float:right"></i>
                                                                    <span style="float:right;margin-right: 10px;">PEDIDO: <?php echo $inscripcion['numero_pedido']; ?></span>
                                                                </h4>
                                                            </div>
                                                        </a>
                                                        <div id="<?php echo $contador2; ?>"
                                                             class="panel-collapse collapse">
                                                            <div class="panel-body"
                                                                 style="background-color:#7b7b7b;padding-top: 0px;">
                                                                <div class="contact-form-wrapper">
                                                                    <br/>
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12">
                                                                            <h3>Número de
                                                                                pedido: <?php echo $inscripcion['numero_pedido']; ?></h3>
                                                                            <?php echo $inscripcion['contenido']; ?>
                                                                            <p><b>Estado
                                                                                    ¿Pagado?: <?php echo $inscripcion['pagado']; ?></b>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $contador2++;
                                                }
                                                //Foreach
                                                ?>
                                            </div>
                                        </div>
                                        
                                        <!-- MOSTRAR DATOS PAGOS (LISTADO) -->
                                        <div id="div-4-header" class="col-xs-12 col-sm-12 col-md-12 mb-2"
                                             style="height:100px;"></div>
                                        <div id="div-4" class="col-xs-12 col-sm-12 col-md-12 mb-2"
                                             style="display:<?php echo $visibleConsultarPagos; ?>;">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <!--<h4 class="section-title mt-0 mb-0" style="text-align:center;">
                                                        *Puede ordenar las filas haciendo click en los títulos o buscar por <span style="text-decoration:underline;color:#eb7c00;">DNI titular cuenta</span>, <span style="text-decoration:underline;color:#eb7c00;">nombre</span>, <span style="text-decoration:underline;color:#eb7c00;">"oficinas"</span>.</h4>-->
                                                    <table id="inscripciones-listado-datatable" class="table w-100 mb-2">
                                                        <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">DNI</th>
                                                            <th scope="col">Nombre</th>
                                                            <th scope="col">Reserva 50€</th>
                                                            <th scope="col">Matrícula</th>
                                                            <th scope="col">Matrícula Pendiente</th>
                                                            <th scope="col">Total Inscripción</th>
                                                            <th scope="col">T. Enero</th>
                                                            <th scope="col">T. Abril</th>
                                                            <th scope="col">T. Noviembre</th>
                                                            <th scope="col">Estado</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                            foreach ($datos['datosPagos'] as $inscripcion) {
                                                            /* DNI */
                                                            echo '<tr id="" style="cursor:pointer;" class="" scope="row">';
                                                            echo '<td class="t-center">' . $inscripcion['dni_pagador'] . '</td>';

                                                            /* Nombre y Apellidos */
                                                            echo '<td class="t-center">' . $inscripcion['nombre'] . " " . $inscripcion['apellidos'] . '</td>';
                                                            /* Reserva 50€ */
                                                            echo '<td class="t-center">' . $inscripcion['reserva'] . '€</td>';
                                                            /* Matricula */
                                                            echo '<td class="t-center">' . $inscripcion['matricula'] . '€</td>';
                                                            /* Matrícula Pendiente */
                                                            if ($inscripcion['pagado_pendiente_matricula'] !== NULL) {
                                                                echo '<td class="t-center"><span class="badge badge-success">' . $inscripcion['pendiente_matricula'] . '€</span></td>';
                                                            } else {
                                                                echo '<td class="t-center"><span class="badge badge-alert">' . $inscripcion['pendiente_matricula'] . '€</span></td>';
                                                            }

                                                            /* Total Inscripción */
                                                            if ($inscripcion['total_inscripcion']) {
                                                                echo '<td class="t-center">' . $inscripcion['total_inscripcion'] . '€</td>';
                                                            } else {
                                                                echo '<td class="t-center">00.00€</td>';
                                                            }
                                                            /* Trimestre Enero */
                                                            echo '<td class="t-center">' . $inscripcion['trimestre_enero'] . '€</td>';
                                                            /* Trimestre Abril */
                                                            echo '<td class="t-center">' . $inscripcion['trimestre_abril'] . '€</td>';
                                                            /* Trimestre Noviembre */
                                                            echo '<td class="t-center">' . $inscripcion['trimestre_noviembre'] . '€</td>';

                                                            /* Estado Usuario Activo/Inactivo */
                                                            if ($inscripcion["cobros_activos"] === null) {
                                                                echo '<td class="t-center" style="font-weight: bold;color:red">BAJA</td>';
                                                            } else {
                                                                echo '<td class="t-center" style="font-weight: bold;color:green">ACTIVO</td>';
                                                            }
                                                            echo '</tr>';
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- FIN MOSTRAR DATOS PAGOS (LISTADO) -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div id="footer" class="hidden-xs" style="padding:25px 25px 25px 25px;">
    <div id="copyright">
        <p style="text-align: center;">&copy; L'Alqueria del Basket 2018 | <a href="http://tessq.com/" target="_blank"
                                                                              style="text-decoration:none;">Diseño Web
                por Tess Quality</a></p>
    </div>
</div>

<!-- Modal Ver Inscripcion completa -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12"><h4 class="modal-title" id="modaltitle" style="float:left;"></h4></div>
                    <div class="col-sm-12" id="modal-detalleinscripcion-contenido"></div>
                </div>
            </div>
            <div class="modal-footer t-center">
                <button type="button" class="btn btn-empresas-activo"
                        data-dismiss="modal"
                        style="transform: skew(0deg);font-size: 15px;height: 35px;margin: 0 auto;">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar Cuenta Bancaria -->
<div id="myModalEditarCuenta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 pb-0">Editar cuenta bancaria</h4>
            </div>

            <div class="modal-body">
                <div id="modaleditarcuenta-contenido" class="row">
                    <div class="col-sm-12">
                        <form id="editar-cuenta-form" method="post">
                            <input type="hidden" name="" id="editar-cuenta-idinscripcion" value="">

                            <div class="form-row">
                                <label>IBAN:</label>
                                <input type="text" name="iban" class="form-control" id="editar-cuenta-iban" required>
                            </div>

                            <div class="form-row">
                                <label>ENTIDAD:</label>
                                <input type="text" name="entidad" class="form-control" id="editar-cuenta-entidad"
                                       required>
                            </div>

                            <div class="form-row">
                                <label>OFICINA:</label>
                                <input type="text" name="oficina" class="form-control" id="editar-cuenta-oficina"
                                       required>
                            </div>

                            <div class="form-row">
                                <label>DC:</label>
                                <input type="text" name="dc" class="form-control" id="editar-cuenta-dc" required>
                            </div>

                            <div class="form-row">
                                <label>CUENTA:</label>
                                <input type="text" name="cuenta" class="form-control" id="editar-cuenta-cuenta"
                                       required>
                            </div>

                            <div class="form-row">
                                <label></label>
                                <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                            </div>

                            <div id="editar-cuenta-form-respuesta"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer t-center">
                <button type="button" class="btn btn-empresas-activo"
                        data-dismiss="modal"
                        style="transform: skew(0deg);font-size: 15px;height: 35px;margin: 0 auto auto auto;">Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Dar de baja / Alta inscripcion-->
<div id="inscripciones-dar-baja-alta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="modal-title" style="float:left;"><strong>Estado de la inscripcion</strong></h4>
                    </div>
                </div>
                <form id="inscripciones-dar-baja-alta-form" method="post">
                    <div class="row mt-4">
                        <div class="col-sm-12">
                            <input type="hidden" name="" id="inscripciones-dar-baja-alta-form-idinscripcion" value="">
                            <div class="form-row" style="margin-top:-10px;margin-bottom:10px;">
                                <h4 class="mt-0 mb-0 pb-0">Activo (naranja) o inactivo (gris)</h4>
                                <label class="switch mt-0">
                                    <input type="checkbox" id="estado-inscripcion-alta-baja" value="">
                                    <span class="slider round" style="margin-top:10px;margin-bottom:-10px;"></span>
                                </label>
                                <p class="mb-0" style="margin-top:5px;"></p>
                            </div>
                            <div id="inscripciones-dar-baja-alta-form-respuesta"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                        </div>
                        <div class="col-md-6">
                           <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                   style="border:none;height:32px;margin:0px;width:100%;" 
                                   data-dismiss="modal">Cerrar
                           </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
<!-- Modal Pagos Trimestrales -->
<div id="myModalPagosTrimestrales" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 pb-0">Editar Pagos Trimestrales</h4>
            </div>

            <div class="modal-body">
                <div id="modalpagostrimestrales-contenido" class="row">
                    <div class="col-sm-12">
                        <form id="pagos-trimestrales-form" method="post">
                            <input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
                            <input id="dni-titular" type="hidden" value=""/>
                            
                            <!-- 
                            <div class="form-row" style="margin-top:-10px;margin-bottom:10px;">
                                <label>ACTIVO:</label>
                                <label class="switch" style="margin-top:10px;">
                                    <input type="checkbox" id="pagos-cobros-activos">
                                    <span class="slider round" style="margin-top:10px;margin-bottom:-10px;"></span>
                                </label>
                            </div>
                            --> 

                            <!-- RESERVA -->
                            <div class="form-row">
                                <label>RESERVA:</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-reserva" required>
                            </div>
                            
                            <!-- DATOS MATRÍCULA -->
                            <div class="form-row" style="margin-top: 5px;">
                                <label>MATRÍCULA:</label>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-10 alinear-izquierda">
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-matricula" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="switch" style="margin-top:10px;">
                                        <input type="checkbox" id="pagos-pagado-matricula">
                                        <span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- DATOS PENDIENTE MATRÍCULA -->
                            <div class="form-row">
                                <label>PENDIENTE MATRÍCULA:</label>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-10 alinear-izquierda">
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-pendiente-matricula" required>
                                </div>
                                <div class="col-md-2">
                                    <label class="switch" style="margin-top:10px;">
                                        <input type="checkbox" id="pagos-pagado-pendiente-matricula">
                                        <span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>
                            </div>
                            
                            <!-- TOTAL INSCRIPCIÓN -->
                            <div class="form-row">
                                <label>TOTAL INSCRIPCIÓN:</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-total-inscripcion" required>
                            </div>
                            
                            <!-- TOTAL PENDIENTE -->
                            <div class="form-row mt-1">
                                <label>TOTAL PENDIENTE:</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-total-pendiente" required>
                            </div>
                            
                            <hr> 
                            
                            <!-- TRIMESTRES -->
                            <div class="form-row trimestres">
                                <h4 class="mt-0 mb-0 pb-0"><strong>PAGO DE TRIMESTRES</strong></h4>
                                <p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
                                <p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en el banco.</p>
                                <p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los cambios.</p>
                            </div>

                            <div class="form-row mt-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>1-15 Enero:</label>
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-trimestre-enero" required>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="pagos-pagado-enero">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>1-15 Abril:</label>
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-trimestre-abril" required>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="pagos-pagado-abril">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <label>1-15 Noviembre:</label>
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-trimestre-noviembre" required>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="pagos-pagado-noviembre">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            
                            <!-- INCLUIR PAGOS EN EL XML -->
                            <div class="form-row trimestres">
                                <h4 class="mt-0 mb-0 pb-0"><strong>INCLUIR CARGO EN LA GENERACIÓN DE XML</strong></h4>
                                <p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente cuando este se genere.</p>
                            </div>
                            
                            <div class="form-row mt-1">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5 class="mb-0"><strong>1-15 Enero:</strong></h5>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="generar-xml-enero">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-0"><strong>1-15 Abril:</strong></h5>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="generar-xml-abril">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="mb-0"><strong>1-15 Noviembre:</strong></h5>
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="generar-xml-noviembre">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <input id="dni-titular" type="hidden" value=""/>
                                </div>
                            </div>

                            <div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>
                            
                            <div class="form-row mt-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                                    </div>
                                     <div class="col-md-6">
                                        <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                                style="border:none;height:32px;margin:0px;width:100%;" 
                                                data-dismiss="modal">Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="backmeans/assets/js/bootstrap.js"></script>

<!-- Datatables. https://datatables.net/download/ -->
<!-- Estos include se generan en la URL indicada donde se seleccionan los componentes / funciones a incluir -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

<!-- JQuery Validation. https://jqueryvalidation.org/ -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>


    <script>
        function setTwoNumberDecimal(event){
                this.value = parseFloat(this.value).toFixed(2);
            }

        function mimodal(idinscripcion){
                var form_data = {
                    debug: "false",
                    form_id: "inscripciones_cargar_contenido_inscripcion_original_patronato",
                    idinscripcion: idinscripcion
                };

                $.ajax({
                    type: "POST",
                    url: "?r=ajax/dispatcherPatronato",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        document.getElementById('modaltitle').innerHTML = data.modal_title;
                        document.getElementById('modal-detalleinscripcion-contenido').innerHTML = data.datos['contenido'];
                    }
                });
            }

        /*  Carga el contenido del formulario editar cuenta */
        function mimodaleditarcuenta(idinscripcion){

            $("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
            $("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
            $("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
            $("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
            $("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

            $('#cuenta-error').remove();

            var form_data = {
                debug: "true",
                form_id: "inscripciones_cargar_contenido_editar_cuenta_patronato",
                idinscripcion: idinscripcion
            };

            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcherPatronato",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    $('#editar-cuenta-idinscripcion').val(data.idinscripcion);
                    $('#editar-cuenta-iban').val(data.datos_iban);
                    $('#editar-cuenta-entidad').val(data.datos_entidad);
                    $('#editar-cuenta-oficina').val(data.datos_oficina);
                    $('#editar-cuenta-dc').val(data.datos_dc);
                    $('#editar-cuenta-cuenta').val(data.datos_cuenta);

                    document.getElementById('modaltitle').innerHTML = data.modal_title;
                }
            });
        }

        function mimodaldepagos(idinscripcion) {
            var form_data = {
                debug: "false",
                form_id: "inscripciones_cargar_pagos_trimestral_patronato",
                idinscripcion: idinscripcion
            };

            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcherPatronato",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    
                    console.log(data);
                    
                    
                    $('#pagos-trimestrales-idinscripcion').val(data.idinscripcion);
                    $('#pagos-reserva').val(data.reserva);
                    $('#pagos-matricula').val(data.matricula);
                    $('#pagos-pendiente-matricula').val(data.pendiente_matricula);
                    $('#pagos-total-inscripcion').val(data.total_inscripcion);
                    $('#pagos-total-pendiente').val(data.total_pendiente);
                    $('#pagos-trimestre-enero').val(data.trimestre_enero);
                    $('#pagos-trimestre-abril').val(data.trimestre_abril);
                    $('#pagos-trimestre-noviembre').val(data.trimestre_noviembre);
                    $('#dni-titular').val(data.dni_titular);
                    $pagado_trimestre_enero_check = data.pagado_enero;
                    $pagado_trimestre_abril_check = data.pagado_abril;
                    $pagado_trimestre_noviembre_check = data.pagado_noviembre;
                    $pagado_matricula_check = data.pagado_matricula;
                    $pagado_pendiente_matricula_check = data.pagado_pendiente_matricula;
                    $cobros_activos_noviembre = data.cobros_activos_noviembre;
                    $cobros_activos_enero = data.cobros_activos_enero;
                    $cobros_activos_abril = data.cobros_activos_abril;

                    if ($pagado_trimestre_enero_check !== false) {
                        // $('#pagos-trimestralefootes-pagado').attr("checked","checked");
                        document.getElementById("pagos-pagado-enero").checked = true;

                    } else {
                        // $('#pagos-trimestrales-pagado').attr("checked","");
                        document.getElementById("pagos-pagado-enero").checked = false;
                    }
                    if ($pagado_trimestre_abril_check !== false) {
                        // $('#pagos-trimestralefootes-pagado').attr("checked","checked");
                        document.getElementById("pagos-pagado-abril").checked = true;

                    } else {
                        // $('#pagos-trimestrales-pagado').attr("checked","");
                        document.getElementById("pagos-pagado-abril").checked = false;
                    }
                    if ($pagado_trimestre_noviembre_check !== false) {
                        // $('#pagos-trimestralefootes-pagado').attr("checked","checked");
                        document.getElementById("pagos-pagado-noviembre").checked = true;

                    } else {
                        // $('#pagos-trimestrales-pagado').attr("checked","");
                        document.getElementById("pagos-pagado-noviembre").checked = false;
                    }
                    if ($pagado_matricula_check !== false) {
                        document.getElementById("pagos-pagado-matricula").checked = true;
                    } else {
                        document.getElementById("pagos-pagado-matricula").checked = false;
                    }
                    if ($pagado_pendiente_matricula_check !== false) {
                        document.getElementById("pagos-pagado-pendiente-matricula").checked = true;
                    } else {
                        document.getElementById("pagos-pagado-pendiente-matricula").checked = false;
                    }

                    if($cobros_activos_noviembre !== false && $cobros_activos_noviembre !== null){
                        document.getElementById("generar-xml-noviembre").checked = true;
                    } else {
                        document.getElementById("generar-xml-noviembre").checked = false;
                    }
                    if($cobros_activos_enero !== false && $cobros_activos_enero !== null){
                        document.getElementById("generar-xml-enero").checked = true;
                    }else {
                        document.getElementById("generar-xml-enero").checked = false;
                    }
                    if($cobros_activos_abril !== false && $cobros_activos_abril !== null) {
                        document.getElementById("generar-xml-abril").checked = true;
                    }else {
                        document.getElementById("generar-xml-abril").checked = false;
                    }


                    /* 
                    if ($cobros_activos !== false && $cobros_activos !== null) {
                        document.getElementById("pagos-cobros-activos").checked = true;
                    } else {
                        document.getElementById("pagos-cobros-activos").checked = false;
                    }
                    */
                }
            });
        }

        /*  Carga el modal para dar de baja / alta una inscripción */
        function mimodaleditarbajayalta(idinscripcion) {
            var form_data = {
                debug: "true",
                form_id: "inscripciones_cargar_estado_inscripcion",
                idinscripcion: idinscripcion
            };

            $('#inscripciones-dar-baja-alta-form-idinscripcion').val(idinscripcion);

            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcher",
                data: form_data,
                dataType: "json",
                success: function (data)
                {
                    console.log("Recuperamos la inscripción");
                    console.log(data);
                    $estado_inscripcion = data.estado_inscripcion;
                    if( $estado_inscripcion === "1" ) {

                        document.getElementById("estado-inscripcion-alta-baja").checked = true;
                    }
                    else{
                        document.getElementById("estado-inscripcion-alta-baja").checked = false;
                    }
                }
            });
        }

        function mostrar_div(id_div){
            if (id_div === "div-1") {
                $('#div-3').fadeOut();
                $('#div-2').fadeOut();
                $('#div-1').fadeIn();
                $('#div-4').hide();
                $('#mostrar_div_launcher_1').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
                $('#mostrar_div_launcher_2').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
                $('#mostrar_div_launcher_3').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
            }
            else if (id_div === "div-2") {
                $('#mostrar_div_launcher_1').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
                $('#mostrar_div_launcher_2').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
                $('#mostrar_div_launcher_3').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
                $('#div-1').hide();
                $('#div-3').hide();
                $('#div-4').hide();
                $('#div-2').fadeIn();
            }
            else if (id_div === "div-3") {
                $('#div-1').fadeOut();
                $('#div-2').fadeOut();
                $('#div-3').fadeIn();
                $('#div-4').hide();
                $('#mostrar_div_launcher_1').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
                $('#mostrar_div_launcher_2').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
                $('#mostrar_div_launcher_3').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
            }
        }

        $('document').ready(function () {
            // Mostramos DIV 1
            var isVisible = $("#div-4").css("display");

            if (isVisible !== "none") {
                $('html, body').animate({
                    scrollTop: $("div#div-4-header").offset().top
                }, 1000);
            }

            // Datatable
            $('#inscripciones-listado-datatable').DataTable({
                "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
                "order": [[0, "desc"]],
                "dom": '<"toolbar">frtip',
                language: {
                    "search": "",
                    "searchPlaceholder": "Buscar",
                    "lengthMenu": "Mostrando _MENU_ inscripciones por página",
                    "zeroRecords": "No hemos encontrado inscripciones",
                    "info": false,
                    "bPaginate": false
                }
            });

            $('#pagos-listado-datatable').DataTable({
                "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
                "order": [[0, "desc"]],
                "dom": '<"toolbar">frtip',
                responsive: true,
                language: {
                    "search": "",
                    "searchPlaceholder": "Buscar",
                    "lengthMenu": "Mostrando _MENU_ pagos por página",
                    "zeroRecords": "No hemos encontrado pagos",
                    "info": false,
                    "bPaginate": false
                }
            });

            /*  Operación del Modal: Editar cuenta bancaria*/
            $('#editar-cuenta-form').validate({
                submitHandler: function () {
                    var form_data = {
                        debug: "true",
                        form_id: "inscripciones_editar_cuenta_patronato",
                        idinscripcion: $('#editar-cuenta-idinscripcion').val(),
                        datos_iban: $('#editar-cuenta-iban').val(),
                        datos_entidad: $('#editar-cuenta-entidad').val(),
                        datos_oficina: $('#editar-cuenta-oficina').val(),
                        datos_dc: $('#editar-cuenta-dc').val(),
                        datos_cuenta: $('#editar-cuenta-cuenta').val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/dispatcherPatronato",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {

                            if (data["response"] === "error_cuenta") {
                                $("input[name='iban']").attr('style', 'border: 3px solid red !important');
                                $("input[name='entidad']").attr('style', 'border: 3px solid red !important');
                                $("input[name='oficina']").attr('style', 'border: 3px solid red !important');
                                $("input[name='dc']").attr('style', 'border: 3px solid red !important');
                                $("input[name='cuenta']").attr('style', 'border: 3px solid red !important');
                                if ($("#cuenta-error").length === 0) {
                                    $('#editar-cuenta-cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es Válida.</p>');
                                }
                                document.getElementById("editar-cuenta-cuenta").focus();
                            }
                            if (data["response"] === "success") {

                                $("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
                                $("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
                                $("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
                                $("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
                                $("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

                                $('#cuenta-error').remove();

                                $("#editar-cuenta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                                $("#editar-cuenta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                    $("#pagos-anyadir-respuesta").slideUp(500);
                                });
                            }

                        }
                    });

                    return false;
                }
            });

            /*  Operación del Modal: Editar estado de la inscripcion (alta / baja) */
            $('#inscripciones-dar-baja-alta-form').validate({
                submitHandler: function(){
                    var form_data = {
                        debug:                      "true",
                        form_id:                    "inscripciones_patronato_estado_inscripcion",
                        idinscripcion:              $('#inscripciones-dar-baja-alta-form-idinscripcion').val(),
                        nuevo_estado_inscripcion:   $('#estado-inscripcion-alta-baja').is(":checked")
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/dispatcherPatronato",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            if(data["response"] === "success"){
                                $("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                                $("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                    $("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
                                });
                            } 
                            else{
                                $("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
                                $("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                    $("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
                                });
                            }
                        }
                    });

                    return false;
                }
            });
        
            /*  Operación del Modal: pagos-trimestrales-form */
            $('#pagos-trimestrales-form').validate({
                submitHandler: function() {
                    
                    
                    var form_data = {
                        debug: "true",
                        form_id: "inscripciones_pagos_trimestrales_patronato",
                        idinscripcion: $('#pagos-trimestrales-idinscripcion').val(),
                        reserva: $('#pagos-reserva').val(),
                        matricula: $('#pagos-matricula').val(),
                        pendiente_matricula: $('#pagos-pendiente-matricula').val(),
                        total_inscripcion: $('#pagos-total-inscripcion').val(),
                        total_pendiente: $('#pagos-total-pendiente').val(),
                        trimestre_enero: $('#pagos-trimestre-enero').val(),
                        trimestre_abril: $('#pagos-trimestre-abril').val(),
                        trimestre_noviembre: $('#pagos-trimestre-noviembre').val(),
                        dni_titular: $('#dni-titular').val(),
                        pagado_enero: document.getElementById('pagos-pagado-enero').checked,
                        pagado_abril: document.getElementById('pagos-pagado-abril').checked,
                        pagado_noviembre: document.getElementById('pagos-pagado-noviembre').checked,
                        pagado_matricula: document.getElementById('pagos-pagado-matricula').checked,
                        pagado_pendiente_matricula: document.getElementById('pagos-pagado-pendiente-matricula').checked,
                        generar_xml_noviembre:      $('#generar-xml-noviembre').is(":checked"),
                        generar_xml_enero:          $('#generar-xml-enero').is(":checked"),
                        generar_xml_abril:          $('#generar-xml-abril').is(":checked")
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=ajax/dispatcherPatronato",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            if (data["response"] === "success") {
                                $("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                                $("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                    $("#pagos-anyadir-respuesta").slideUp(500);
                                });
                            } else {
                                $("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
                                $("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                    $("#pagos-anyadir-respuesta").slideUp(500);
                                });
                            }

                        }
                    });

                    return false;
                }
            });

            /*  pagos-trimestrales-form. Al asignar un pago de un trimestre, se desactiva la casilla para que este se incluya en el XML*/
            $('#pagos-pagado-noviembre').on('click', function(){
                if(document.getElementById("pagos-pagado-noviembre").checked){
                    document.getElementById("generar-xml-noviembre").checked = false;
                }
                else{
                    document.getElementById("generar-xml-noviembre").checked = true;
                }
            });
            $('#pagos-pagado-enero').on('click', function(){
                if(document.getElementById("pagos-pagado-enero").checked){
                    document.getElementById("generar-xml-enero").checked = false;
                }
                else{
                    document.getElementById("generar-xml-enero").checked = true;
                }
            });
            $('#pagos-pagado-abril').on('click', function(){
                if(document.getElementById("pagos-pagado-abril").checked){
                    document.getElementById("generar-xml-abril").checked = false;
                }
                else{
                    document.getElementById("generar-xml-abril").checked = true;
                }
                });
            /*  pagos-trimestrales-form. Al marcar un trimestre para que se genere el cargo en el XML, se desactiva el pago */
            $('#generar-xml-noviembre').on('click', function(){
                if(document.getElementById("generar-xml-noviembre").checked){
                    document.getElementById("pagos-pagado-noviembre").checked = false;
                }
                else{
                    document.getElementById("pagos-pagado-noviembre").checked = true;
                }
            });
            $('#generar-xml-enero').on('click', function(){
                if(document.getElementById("generar-xml-enero").checked){
                    document.getElementById("pagos-pagado-enero").checked = false;
                }
                else{
                    document.getElementById("pagos-pagado-enero").checked = true;
                }
            });
            $('#generar-xml-abril').on('click', function(){
                if(document.getElementById("generar-xml-abril").checked){
                    document.getElementById("pagos-pagado-abril").checked = false;
                }
                else{
                    document.getElementById("pagos-pagado-abril").checked = true;
                }
            });
        });

        /*  Domiciliaciones. Obtener cuentas bancarias incorrectas */
        $("#cargar-cuentas-bancarias-incorrectas-launcher").on('click',function(){
            var form_data = {
                debug:    "true",
                form_id:  "domiciliaciones_patronato_cargar_cuentas_bancarias_incorrectas"
            };

            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcherPatronato",
                data: form_data,
                dataType: "json",
                success: function(data){
                    $('#cargar-cuentas-bancarias-incorrectas-contenido').html(data.contenido_tabla_patronato_cuenta_bancaria);
                }
            });
        });

        /* Domiciliaciones Trimestrales Patronato. */
        $("#domiciliaciones-form-patronato-xml").on('click',function () {
            var enlaceDomiciliacionTrimestralPatronato = "";

            var form_data = {
                debug: "true",
                form_id:            "domiciliaciones_trimestrales_patronato",
                trimestre:          $('#domiciliaciones-form-patronato-xml-trimestre :selected').val(),
                idDomiciliacion:    $('#domiciliaciones-form-patronato-xml').val()
            };
            
            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcherPatronato",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data["response"] === "ok") {

                        enlaceDomiciliacionTrimestralPatronato = 'public/Domiciliacion Trimestral Patronato ' + data.trimestre + ' ' + data.anyo_actual + '.xml';

                        $("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-message").slideUp(500);
                        });

                        $("#download-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                        document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionTrimestralPatronato;
                    } else if (data["response"] === "ok2") {
                        $("#domiciliation-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-message").slideUp(500);
                        });
                    } else {
                        $("#domiciliation-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-message").slideUp(500);
                        });
                    }
                }
            });
        });

        $("#domiciliaciones-matricula-form-xml").on('click', function () {

            var enlaceDomiciliacionMatriculaPatronato = "";

            var form_data = {
                debug: "true",
                form_id: "domiciliaciones_matricula_patronato",
                idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
            };
            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcherPatronato",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data["response"] === "ok") {

                        enlaceDomiciliacionMatriculaPatronato = 'public/Domiciliacion Matriculas Patronato ' + data.anyo_actual + '.xml';

                        $("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-matricula-message").slideUp(500);
                        });

                        $("#download-matricula-xml").html('<a id="enlace_domiciliacion_matricula_patronato" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                        document.getElementById("enlace_domiciliacion_matricula_patronato").href = enlaceDomiciliacionMatriculaPatronato;
                    } else if (data["response"] === "ok2") {
                        $("#domiciliation-matricula-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-matricula-message").slideUp(500);
                        });
                    } else {
                        $("#domiciliation-matricula-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                            $("#domiciliation-matricula-message").slideUp(500);
                        });
                    }

                }
            });
        });

        $("#consultar-pagos").on('click',function () {
            alert("dfg");
            var form_data = {
                debug: "true",
                form_id: "consultar_pagos_form",
                idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
            };
            $.ajax({
                type: "POST",
                url: "?r=login/consultarpagos",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data["response"] === "ok") {
                        // $("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500,function(){
                        //     $("#domiciliation-matricula-message").slideUp(500);
                        // });
                        // $("#download-matricula-xml").html("<a href='DomiciliacionMatriculas.xml' class='btn btn-success' download>Descargar Archivo XML</a>");
                        var error_input_dni = document.querySelector("#passcode");
                    }
                }
            });
        });
    </script>
</body>
</html>