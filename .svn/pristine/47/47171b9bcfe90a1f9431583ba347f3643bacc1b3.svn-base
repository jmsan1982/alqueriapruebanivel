<!-- Otras consultas -->
<div id="div-3" class="col-12 mb-2" style="display: <?php echo $visibleOtrasConsultas; ?>">

    
    <?php /*
    <!-- DOMICILIACIONES. OBTENER INSCRIPCIONES ACTIVAS CON CUENTAS BANCARIAS INCORRECTAS DEDUCIDAS A PARTIR DEL DIGITO CONTROL -->
    <div class="panel panel-default">
        <a id="cargar-cuentas-bancarias-incorrectas-launcher" data-toggle="collapse" data-parent="#accordion1" href="#9" style="text-decoration: none;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-plus-circle"></i>
                    DOMICILIACIONES: OBTENER CUENTAS BANCARIAS INCORRECTAS
                    <i class="fa fa-angle-down" style="float: right"></i>
                </h4>
            </div>
        </a>
        <div id="9" class="panel-collapse collapse">
            <div class="panel-body" style="padding-top: 0px;">
                <div class="contact-form-wrapper">                                                                
                    <div class="row mt-2">
                        <div class="col-12" id="cargar-cuentas-bancarias-incorrectas-contenido"></div>
                    </div>                                                                
                </div>
            </div>
        </div>
    </div>
    */ ?>
    
    <!-- DOMICILIACIONES. GENERAR XML -->
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion1" href="#10" style="text-decoration: none;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-plus-circle"></i>
                    DOMICILIACIONES: GENERAR XML TRIMESTRALES Y CONFIRMAR PAGOS TRAS EL ENVÍO AL BANCO
                    <i class="fa fa-angle-down" style="float: right"></i>
                </h4>
            </div>
        </a>
        <div id="10" class="panel-collapse collapse">
            <div class="panel-body" style="padding-top: 0px;">
                <div class="contact-form-wrapper">

                    <div class="row mt-2">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <h4 class="mt-0 pb-0 mb-0">Selecciona el trimestre que desea gestionar:</h4>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                            <div class="input-group" style="width: 100%;">
                                <form action="?r=campus/ExportToExcelConsultasEscuelaCantera" method="post"><!--INICIO FORM GENERAR PDF-->
                                <select id="domiciliaciones-form-xml-trimestre" name="domiciliaciones_form_xml_trimestre" class="form-control" style="width: 100%;" required>
                                    <option value="">Seleccionar</option>
                                    <option value="noviembre">XML de Noviembre 2018</option>
                                    <option value="enero">XML de Enero 2019</option>
                                    <option value="abril">XML de Abril 2019</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <hr>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <h4 id="domiciliaciones-form-xml-generar-titulo" class="mt-0 pb-0 mb-0">Inscripciones pendientes de pago: </h4>
                        </div>

                        <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-0">
                             <button type="submit" id="export_data_inscripciones_cantera_consultas" name='export_data_inscripciones_cantera_consultas' value="Export to excel" class="btn btn-info mb-1">Generar XML</button>
                            </form><!--FINAL FORM GENERAR PDF-->
                        </div>
                        
                        <div id="download-xml" class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3"></div>
                        
                        <div class="col-12 mt-1">
                            <div class="card-footer text-muted" id="domiciliation-message"></div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <hr>
                        <div class="col-12 mb-2">
                            <h4 class="mt-0 pb-0 mb-0">Hay cargos que ya se incluyeron en ficheros y aún no se han confirmado:</h4>
                        </div>

                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <button type="submit" class="btn btn-success btn-block" id="domiciliaciones-form-xml-confirmar-cargos">
                                <span>CONFIRMAR ENVÍO DE CARGOS EN XML</span>
                            </button>
                            <p class="mt-1 text-justify">Al confirmar el envío del XML, se indica que la subida del XML al banco fue correcta para las inscripciones seleccionadas.</p>
                        </div>

                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <button type="submit" class="btn btn-danger btn-block" id="domiciliaciones-form-xml-anular-cargos">
                                <span>ANULAR XML GENERADO</span>
                            </button>
                            <p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien para las inscripciones seleccionadas.</p>
                            <p class="mt-1 text-justify">Así, se eliminamos el pago del trimestre en cada inscripción del XML y se incluirán en la futura generación de XML.</p>
                        </div>

                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                            <button type="submit" class="btn btn-warning btn-block" id="domiciliaciones-form-xml-seleccionar-cargos">
                                <span>SELECCIONAR TODAS LAS INSCRIPCIONES DEL LISTADO</span>
                            </button>
                            <!--<p class="mt-1 text-justify">Al anular el XML generado, se indica que el envío del XML al banco no salió bien. Por lo tanto, eliminamos el pago del trimestre en las inscripciones seleccionadas.</p>-->
                        </div>
                    </div>
                        
                    <div class="row">
                        <hr>
                        <div class="col-12 mb-2">
                            <h4 class="mt-0 pb-0 mb-0">Pagos incluidos en XML, cuyo envío al banco correcto, aún no se ha confirmado:</h4>
                        </div>
                        
                        <div class="col-12 mb-2">
                            <table id="inscripciones-cobros-activos-por-confirmar" class="table w-100">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Número pedido</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Cobro activo</th>
                                        <th>Pagado</th>
                                        <th>Seleccionar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="t-center" colspan="7">No hay pagos por confirmar que hayan sido incluidos en ficheros XML</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card-footer text-muted" id="domiciliation-message"></div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <!-- DOMICILIACIONES MATRÍCULAS. GENERAR XML -->
    <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion1" href="#11" style="text-decoration: none;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="fa fa-plus-circle"></i>
                    DOMICILIACIONES MATRÍCULAS: GENERAR XML
                    <i class="fa fa-angle-down" style="float:right"></i>
                </h4>
            </div>
        </a>
        <div id="11" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="contact-form-wrapper">
                    <br>
                    <div class="form-group">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                            <button type="submit" class="btn btn-primary btn-block" id="domiciliaciones-matricula-form-xml">
                                <span>Generar XML</span>
                            </button>
                        </div>

                        <div id="download-matricula-xml"></div>
                    </div>
                    <div class="card-footer text-muted" id="domiciliation-matricula-message"></div>
                </div>
            </div>
        </div>
    </div>
    
</div>