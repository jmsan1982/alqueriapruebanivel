<!DOCTYPE html>
<html lang="es">
<?php
require "includes/head_back.php";

if ($filtrado == "1") {
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'visible';
} elseif ($filtrado == "2") {
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleOtrasConsultas = 'visible';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'visible';
} elseif ($filtrado == "4") {
    $inscripciones = $pagosFecha = 'btn-empresas-desactivo';
    $otrasConsultas = 'btn-empresas-activo';
    $visibleInscripciones = 'none';
    $visiblePagosPorFecha = 'none';
    $visibleOtrasConsultas = 'visible';
    $visibleConsultarPagos = 'none';
    $displayResultados = 'none';
} elseif ($filtrado == "5") {
    $pagosFecha = $otrasConsultas = 'btn-empresas-desactivo';
    $inscripciones = 'btn-empresas-activo';
    $visibleInscripciones = 'visible';
    $visiblePagosPorFecha = 'none';
    $visibleOtrasConsultas = 'none';
    $visibleConsultarPagos = 'none';
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

<body>
<?php require "includes/topbar_back.php"; ?>

<div class="canvas">
    <div id="content">
        <div id="page-content">
            <div class="page-contacts-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="section-title mt-0 mb-0" style="color: #406da4;">
                                <i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consultas
                                    Patronato 2020/2021</b>
                            </h2>
                        </div>
                        <div id="div-3" class="col-12 mt-2">
                            <!-- DOMICILIACIONES TRIMESTRE 3    ABRIL GENERAR XML 2020 / 2021 -->
                            <div class="panel panel-default">
                                <a data-toggle="collapse" data-parent="#accordion3trimestre3" href="#panelbody15" style="text-decoration:none;">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <i class="fa fa-plus-circle"></i>
                                            DOMICILIACIONES TRIMESTRE 3 (ABRIL) TEMPORADA 2020 / 2021: GENERAR XML
                                            <i class="fa fa-angle-down" style="float: right;"></i>
                                        </h4>
                                    </div>
                                </a>
                                <div id="panelbody15" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <!--
                                            1.  Selección de equipo o equipos
                                            3.  Generación de XML-->

                                        <form id="domiciliaciones-xml-2020-2021-trimestre3-form" method="post">
                                            <div class="row mt-1 pt-1 pb-1 pl-1 pr-1 ml-1 mr-1">
                                                <!--<div class="col-12">
                                                    <div class="alert alert-danger">Opciones disabilitadas hasta que llegue la fecha oportuna y deseen activarse.</div>
                                                     Para activarlas simplemente quitar los 'disabled' de los <button> con ids:
                                                                domiciliaciones-xml-2019-2020-trimestre3-button-vista-previa
                                                                domiciliaciones-xml-2019-2020-trimestre3-button

                                                </div>-->

                                                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">

                                                </div>


                                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-xml-2020-2021-trimestre3-button-vista-previa" disabled>
                                                        <span>Vista previa XML</span>
                                                    </button>
                                                </div>

                                                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                                    <button type="submit" class="btn btn-primary btn-block" id="domiciliaciones-xml-2020-2021-trimestre3-button">
                                                        <span>Generar XML</span>
                                                    </button>
                                                </div>
                                                <div id="domiciliaciones-xml-2020-2021-trimestre3-link-descarga">Creando XML  <img src='../../img/spinner/spinnerDomiciliaciones.gif' /></div>
                                            </div>
                                        </form>

                                        <div id="domiciliaciones-xml-2020-2021-trimestre3-vista-previa-container" class="row pl-1 pr-1 ml-1 mr-1"></div>

                                        <!-- 2. Listado de jugadores con el pago en XML generado pero están pendientes de confirmar o de anular
                                                CONFIRMAR   indica que el XML se envió al banco y se procesó bien.
                                                ANULAR      indica que el XML se envió al banco y falló (ej. alguna cuenta dió error).
                                                            Al anular es posible regenerar un nuevo XML cuando se corrija la información incorrecta-->
                                        <div class="row pl-1 pr-1 ml-1 mr-1">

                                            <hr>

                                            <div class="col-12 mb-2">
                                                <h4 class="mt-0 pb-0 mb-1"><strong>Listado de cobros incluidos en el XML descargado:</strong></h4>
                                                <p>- Estos cobros requieren una confirmación para validar que el banco ha procesado el XML sin ningún error.</p>
                                                <p>- Los cobros también pueden anularse si por ejemplo el XML no se envió al banco o si ocurrió un error al procesarse el fichero. Así, los cobros se incluirán de nuevo en el siguiente XML que se genere.</p>
                                            </div>

                                            <div class="col-12 mb-2 w-100">
                                                <h3><strong>COBROS GENERADOS DEL TRIMESTRE 3º:</strong></h3>
                                                <table id="inscripciones-cobros-activos-trimestre3-2020-2021-por-confirmar-anteriores"
                                                       class="table" style="min-width:100%;width:100% !important;">
                                                    <thead class="table-dark" style="min-width:100%;width:100%;">
                                                    <tr style="min-width:100%;width:100%;">
                                                        <th class="active">DNI Jugador</th>
                                                        <th class="active">Nombre</th>
                                                        <th class="active">Equipo</th>
                                                        <th class="active">DNI_Tutor</th>
                                                        <th class="active">Email</th>
                                                        <th id="thcobroactivo" class="active">Cobro activo</th>
                                                        <th class="active text-center">Cantidad</th>
                                                        <th class="active text-center">Gastos devolución</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr><td colspan='10'><?php echo $datos['cobros_activos_trimestre_3'];?></td></tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row pl-1 pr-1 ml-1 mr-1">

                                            <hr>

                                        </div>

                                        <div class="card-footer text-muted" id="domiciliaciones-xml-2020-2021-trimestre3-respuesta"></div>
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

<?php include 'includes/footer_back.php'; ?>

<!-- Load Scripts Start -->
<script src="js/libs.js"></script>
<script src="js/common.js"></script>

<script src="backmeans/assets/js/bootstrap.js"></script>
<script>$( document ).ready(function() {
        $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").hide();
    });</script>

<!-- Datatables. https://datatables.net/download/ -->
<!-- Estos include se generan en la URL indicada donde se seleccionan los componentes / funciones a incluir -->
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

<!-- JQuery Validation. https://jqueryvalidation.org/ -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>

<script src="backmeans/assets/js/escuela-cantera.js"></script>
</body>
</html>
