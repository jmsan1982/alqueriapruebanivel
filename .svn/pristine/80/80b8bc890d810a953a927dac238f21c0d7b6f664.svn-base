<!DOCTYPE html>
<html lang="es">
    <?php require "includes/head_back.php"; ?>

    <body>
        <script src="backmeans/assets/js/jquery.js"></script>

        <?php require "includes/topbar_back.php"; ?>

        <link rel="stylesheet" href="css/forms.css">
        <link rel="stylesheet" href="css/formus.css?v=1.1">

        <div class="canvas">
            <div id="content">
                <div id="page-content">
                    <div class="page-contacts-block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="section-title mt-0 mb-0" style="color: #406da4;">
                                        <i class="fa fa-sun-o" aria-hidden="true" style="margin-right: 10px;"></i><b>SPORTS CLUB</b>
                                    </h2>
                                </div>

                                <div class="col-12">
                                    <h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
                                        Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
                                    </h4>
                                    <!-- Apartado para los dos botones -->
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <button class="btn" id="btn_mostrar_info_formulario">Información de Formularios</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn" id="btn_mostrar_info_pagos">Información de Pagos</button>
                                        </div>
                                    </div>

                                    <div id="apartadoDatosInscripcion">
                                        <a href="https://servicios.alqueriadelbasket.com/index.php?r=index/ExcelSportsClub" target="_blank" id="export_data" name="export_data" class="btn btn-info mb-1">Exportar a Excel</a>
                                        <table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
                                            <thead class="table-dark">
                                                <tr style="cursor: pointer;">
                                                    <th class="text-center">Fecha Inscripción</th>
                                                    <th class="text-center">Id registro</th> 
                                                    <th>Nombre</th>
                                                    <th>Apellidos</th>
                                                    <th class="text-center">Teléfono</th>
                                                    <th class="text-center">DNI</th>
                                                    <th>Email</th>
                                                    <th>Tipo Inscripción</th>
                                                    <th class="text-center">Inscripción</th>
                                                    <th class="text-center">Ficha De Salud</th>
                                                    <th class="text-center">Dar de baja/alta</th>
                                                    <th class="text-center">Editar Horarios</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($datos['inscripciones'] as $inscripcion) {

                                                        $date = new DateTime($inscripcion['fecha_alta']);

                                                        echo '<tr id="' . $inscripcion['ID'] . '">
                                                                <td class="text-center">' . $date->format('d/m/Y') . '</td>
                                                                <td class="text-center">' . $inscripcion['ID'] . '</td>
                                                                <td class="text-left">' . $inscripcion['nombre'] . '</td>
                                                                <td class="text-left">' . $inscripcion['apellidos'].'</td>
                                                                <td class="text-center">' . $inscripcion['telefono']. '</td>
                                                                <td class="text-center">' . $inscripcion['dni'] . '</td>
                                                                <td class="text-left">' . $inscripcion['email'].'</td>
                                                                <td class="text-left">' . $inscripcion['tipo_inscripcion']. '</td>';
                                                        echo '
                                                                <td class="text-center">
                                                                    <a href="?r=sportsclub/ImprimirFichaSportsClub&ID='.$inscripcion['ID'].'" target="_blank">
                                                                        <i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                                                                    </a>
                                                                </td>

                                                                <td class="text-center">
                                                                    <a href="?r=sportsclub/imprimirfichasaludsportsclub&ID='.$inscripcion['ID'].'" target="_blank">
                                                                        <i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                                                                    </a>
                                                                </td>

                                                                <td class="text-center">';
                                                                if ($inscripcion['activo'] == "1") {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" name="activo_inscripcion" checked class="btn-baja-alta-inscripciones">
                                                                            <span class="slider"></span>
                                                                        </label>';
                                                                    }
                                                                    else {
                                                                        echo '<label class="switch">
                                                                            <input type="checkbox" name="activo_inscripcion">
                                                                            <span class="slider" class="btn-baja-alta-inscripciones"></span>
                                                                        </label>';
                                                                    }
                                                                echo '
                                                                </td>

                                                                <td class="text-center"> 
                                                                    <button class="btn baja btn_lanzar_modal_editar_horarios" type="button">Horario</button>
                                                                </td>

                                                                
                                                            </tr>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div id="apartadoDatosPagos">
                                        <a href="#" id="btnLanzarModalNuevoPago" name="btnLanzarModalNuevoPago" class="btn btn-info mb-1" data-toggle="modal" data-target="#ModalNuevoPago">Crear Pagos</a>
                                        
                                        <table id="pagos-listado-datatable" class="table table-striped table-hover w-100 mb-2 pagos-jornadas-deteccion" style="width: 100%;">
                                            <thead class="table-dark">
                                                <tr style="cursor: pointer;">
                                                    <th class="text-center">Nombre y Apellidos</th>
                                                    <th class="text-center">Fecha Creación de Pago</th>
                                                    <th class="text-center">Nombre del pago</th> 
                                                    <th>Numero de Pedido</th>
                                                    <th>Cantidad</th>
                                                    <th class="text-center">Metodo de Pago</th>
                                                    <th class="text-center">Confirmacion de Pago</th>
                                                    <th>Fecha Confirmacion Pago</th>
                                                    <th class="text-center">Observaciones</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($datos['pagos'] as $pago) {

                                                        $date_creacion = new DateTime($pago['fecha_creacion_pago']);
                                                        $date_confirmacion = new DateTime($pago['fecha_confirmacion_pago']);

                                                        echo '<tr id="' . $pago['ID'] . '">
                                                                <td class="text-left">' . $pago['nombre'] . ' ' . $pago['apellidos'] . '</td>
                                                                <td class="text-center">' . $date_creacion->format('d/m/Y') . '</td>
                                                                <td class="text-left">' . $pago['nombre_pago'] . '</td>
                                                                <td class="text-left">' . $pago['numero_pedido'].'</td>
                                                                <td class="text-center">' . $pago['cantidad']. '€</td>
                                                                <td class="text-center">' . $pago['metodo_pago'] . '</td>
                                                                <td class="text-left">' . $pago['confirmacion_pago'].'</td>
                                                                <td class="text-left">' . $date_confirmacion->format('d/m/Y'). '
                                                                <td class="text-center">' . $pago['observaciones'] . '</td></td>
                                                                <td class="text-center"><input type="button" class="btn btn-lanzar-modal-editar-observaciones" value="Editar Observación"></input></td>';
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="footer" class="hidden-xs" style="padding: 25px;">
            <div id="copyright">
                <p style="text-align: center;">
                    &copy; L'Alqueria del Basket 2020 | <a href="http://tessq.com/" target="_blank" style="text-decoration: none;">Diseño Web por Tess Quality</a>
                </p>
            </div>
        </div>

        <!--Modal crear un nuevo pago-->
        <div class="modal fade" id="ModalNuevoPago" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="sportsClub-creacionPagos-form" class="boxed-form" method="post">    
                    <div class="modal-header">
                        <h2 class="modal-title">Creación de Pagos</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <label>
                                        Fecha Creación:
                                        <input type="date" id="modalFechaCreacion" name="modalFechaCreacion" class="form-control" maxlength="100" required>
                                    </label>
                                </div>

                                <div class="col-12 mb-2">
                                    <label>
                                        Nombre Del Pago:
                                        <input type="text" id="modalNombrePago" name="modalNombrePago" class="form-control" maxlength="150" placeholder="Ej: Marzo 2020" required>
                                    </label>
                                </div>

                                <div class="col-12 mb-2">
                                    <label>
                                        Método de Pago:
                                        <input type="text" id="modalMetodoPago" name="modalMetodoPago" class="form-control" maxlength="150" value="Domiciliacion" readonly>
                                    </label>
                                </div>

                                <div class="alert alert-info col-12 mb-2">
                                    <p>
                                        Se creará un pago por cada inscripción activa.
                                    </p>
                                </div>

                                <div class="alert alert-success col-12 mb-2">
                                    <p>
                                        En este momento hay <strong>
                                            <?php 
                                            if ( !empty( $datos['RegistrosActivos'] ) ) {  
                                                echo count( $datos['RegistrosActivos'] );
                                            }else{
                                                echo "0";
                                            }
                                                
                                            ?>   
                                            </strong> inscripciones activas.
                                            
                                    </p>
                                    <p>
                                        La cuantia total es de <strong><?php echo $datos["total"];?></strong>€.
                                    </p>
                                </div>
                                <div class="alert alert-success col-12 mb-2" id="mensaje-confirmacion-pago">
                                    <p>El pago se ha generado correctamente, espere 5 segundos.</p>
                                </div>
                            </div>
                        </div>                                
                    </div>
                
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btn_generar_vista_previa">Vista previa</button>
                    <button type="submit" class="btn btn-success">Generar XML</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <!--Modal editar horarios-->
        <div class="modal fade" id="ModalEditarHorario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="sportsClub-edicionHorarios-form" class="boxed-form" method="post">    
                    <div class="modal-header">
                        <h2 class="modal-title">Edición de horarios</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <!--<div class="row">-->
                                <div class="alert alert-info col-12 mb-2">
                                    <p>Como máximo se puede seleccionar dos franjas de running y dos franjas de preparación física.
                                        El precio actual es de <label id="precioActualHorario">X</label>€
                                    </p>
                                </div>

                                <div class="row mb-2">
                                    <!-- Franja 1: detalle -->
                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja1-container">
                                            <input type="checkbox" id="franja1-lunes" name="franja_1_lunes" class="franja1 running">
                                            <p class="mb-0 mt-0">Running Lunes 18:00h-19:00h (<strong>Franja 1</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja1-container">
                                            <input type="checkbox" id="franja1-miercoles" name="franja_1_miercoles" class="franja1 running">
                                            <p class="mb-0 mt-0">Running Miércoles 18:00h-19:00h (<strong>Franja 1</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <!-- Franja 2: detalle -->
                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja2-container">
                                            <input type="checkbox" id="franja2-martes" name="franja_2_martes" class="franja2 running">
                                            <p class="mb-0 mt-0">Running Martes 18:00h-19:00h (<strong>Franja 2</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja2-container">
                                            <input type="checkbox" id="franja2-jueves" name="franja_2_jueves" class="franja2 running">
                                            <p class="mb-0 mt-0">Running Jueves 18:00h-19:00h (<strong>Franja 2</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <!-- Franja 3: detalle -->
                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja3-container">
                                            <input type="checkbox" id="franja3-lunes" name="franja_3_lunes" class="franja3 running">
                                            <p class="mb-0 mt-0">Running Lunes 19:30h-20:30h (<strong>Franja 3</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja3-container">
                                            <input type="checkbox" id="franja3-miercoles" name="franja_3_miercoles" class="franja3 running">
                                            <p class="mb-0 mt-0">Running Miércoles 19:30h-20:30h (<strong>Franja 3</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <!-- Franja 4: detalle -->
                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja4-container">
                                            <input type="checkbox" id="franja4-martes" name="franja_4_martes" class="franja4 running">
                                            <p class="mb-0 mt-0">Running Martes 19:30h-20:30h (<strong>Franja 4</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja4-container">
                                            <input type="checkbox" id="franja4-jueves" name="franja_4_jueves" class="franja4 running">
                                            <p class="mb-0 mt-0">Running Jueves 19:30h-20:30h (<strong>Franja 4</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <!-- Franja 5: detalle -->
                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja5-container">
                                            <input type="checkbox" id="franja5-martes" name="franja_5_martes" class="franja5">
                                            <p class="mb-0 mt-0">Preparación Física Martes 21:00h-22:00h (<strong>Franja 5</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>

                                    <div class="col-6 redimension">
                                        <label class="containerchekbox franja5-container">
                                            <input type="checkbox" id="franja5-jueves" name="franja_5_jueves" class="franja5">
                                            <p class="mb-0 mt-0">Preparación Física Jueves 21:00h-22:00h (<strong>Franja 5</strong>)</p>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="alert alert-success col-12 mb-2" id="mensaje-confirmacion-horario">
                                    <p>El horario se ha editado correctamente, por favor espere.</p>
                                </div>

                            <!--</div>-->
                        </div>                                
                    </div>
                
                  <div class="modal-footer">
                    <input type="hidden" name="id-inscripcion" id="id-inscripcion" value="0">
                    <input type="hidden" name="id-horario" id="id-horario" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Editar</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <!--Modal editar Observaciones-->
        <div class="modal fade" id="ModalEditarObservaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="sportsClub-edicionObservaciones-form" class="boxed-form" method="post">    
                    <div class="modal-header">
                        <h2 class="modal-title">Edición de Observaciones</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <!--<div class="row">-->

                                <div class="row mb-2">
                                    <div class="col-12 redimension">
                                        <textarea class="form-control" rows="5" id="observaciones-pagos" name="observaciones-pagos" value="ar"></textarea>
                                    </div>
                                </div>

                                <div class="alert alert-success col-12 mb-2" id="mensaje-confirmacion-observaciones">
                                    <p>Las observaciones se ha editado correctamente, por favor espere.</p>
                                </div>

                            <!--</div>-->
                        </div>                                
                    </div>
                
                  <div class="modal-footer">
                    <input type="hidden" name="id-pagos-observacciones" id="id-pagos-observacciones" value="0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success">Editar</button>
                  </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Load Scripts Start -->
        <script src="js/libs.js"></script>
        <script src="js/common.js"></script>

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
            $('document').ready(function () {
                $("#apartadoDatosPagos").hide();
                $("#mensaje-confirmacion-pago").hide();
                $("#mensaje-confirmacion-horario").hide();
                $("#mensaje-confirmacion-observaciones").hide();

                //boton que muestra la información del formulario
                $("#btn_mostrar_info_formulario").on("click", function(){
                    $("#apartadoDatosPagos").hide();
                    $("#apartadoDatosInscripcion").show();
                });

                //boton que muestra la información de los pagos
                $("#btn_mostrar_info_pagos").on("click", function(){
                    $("#apartadoDatosPagos").show();
                    $("#apartadoDatosInscripcion").hide();
                });

                // Datatable
                $('#inscripciones-listado-datatable').DataTable({
                    "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
                    "order": [[1, "desc"]],
                    "dom": '<"toolbar">frtip',
                    "scrollX" : true,
                    "paging": false,
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
                    "order": [[1, "desc"]],
                    "dom": '<"toolbar">frtip',
                    "scrollX" : true,
                    "paging": false,
                    language: {
                        "search": "",
                        "searchPlaceholder": "Buscar",
                        "lengthMenu": "Mostrando _MENU_ pagos por página",
                        "zeroRecords": "No hemos encontrado pagos",
                        "info": false,
                        "bPaginate": false
                    }
                });

                // Activar tooltips
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });

                //Funcion para mostrar la vista previa
                $("#btn_generar_vista_previa").on("click", function(){
                    console.log("Entramos al generar Vista previa");
                });

                //Funcion para generar el XML
                $('#sportsClub-creacionPagos-form').validate(
                {
                    submitHandler: function(){
                        $.ajax({
                            type: "POST",
                            url: "?r=sportsclub/GenerarXML",
                            data: $('#sportsClub-creacionPagos-form').serialize(),
                            dataType: "json",
                            success: function (data) {
                                if( data["response"] === "success" ) {
                                    $("#mensaje-confirmacion-pago").show();
                                    setTimeout(function(){ location.reload(); }, 3000);
                                    
                                }else if( data["response"] === "error" ) {
                                    console.log( data["message"] );   
                                }
                            }, error: function (errData){
                                console.log("Entramos en el error");
                            }
                        });
                    }
                });

                //Funcion para generar el XML
                $('.btn_lanzar_modal_editar_horarios').on("click", function(){

                    $(".franja1").prop("checked", false);
                    $(".franja2").prop("checked", false);
                    $(".franja3").prop("checked", false);
                    $(".franja4").prop("checked", false);
                    $(".franja5").prop("checked", false);
                    $("#id-inscripcion").val( "0" );
                    $("#id-horario").val( "0" );

                    var idInscripcion = $(this).parent().parent().attr("id");

                    var form_data = {
                        id: idInscripcion
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=sportsclub/CargarDatosHorarios",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            //console.log( data.infoHorarios );
                            $("#id-inscripcion").val( data.infoHorarios.IDSportClubInscripcion );
                            $("#id-horario").val( data.infoHorarios.ID );
                            
                            //Franja 1
                                if( data.infoHorarios.franja_1_lunes == 1 ){
                                    $("#franja1-lunes").prop("checked", true);
                                }

                                if( data.infoHorarios.franja_1_miercoles == 1 ){
                                    $("#franja1-miercoles").prop("checked", true);
                                }
                            //Franja 2
                                if( data.infoHorarios.franja_2_martes == 1 ){
                                    $("#franja2-martes").prop("checked", true);
                                }

                                if( data.infoHorarios.franja_2_jueves == 1 ){
                                    $("#franja2-jueves").prop("checked", true);
                                }
                            //Franja 3
                                if( data.infoHorarios.franja_3_lunes == 1 ){
                                    $("#franja3-lunes").prop("checked", true);
                                }

                                if( data.infoHorarios.franja_3_miercoles == 1 ){
                                    $("#franja3-miercoles").prop("checked", true);
                                }
                            //Franja 4
                                if( data.infoHorarios.franja_4_martes == 1 ){
                                    $("#franja4-martes").prop("checked", true);
                                }

                                if( data.infoHorarios.franja_4_jueves == 1 ){
                                    $("#franja4-jueves").prop("checked", true);
                                }
                            //Franja 5
                                if( data.infoHorarios.franja_5_martes == 1 ){
                                    $("#franja5-martes").prop("checked", true);
                                }

                                if( data.infoHorarios.franja_5_jueves == 1 ){
                                    $("#franja5-jueves").prop("checked", true);
                                }

                            comprobarCheckbox();

                            $("#ModalEditarHorario").modal("show");

                        }, error: function (errData){
                            console.log("Entramos en el error");
                        }
                    });
                });

                //Funcion para encontrar las observaciones, rellenar el campo del modelo y lanzarlo
                $(".btn-lanzar-modal-editar-observaciones").on("click", function(){

                    //$("#observaciones-pagos").text( "" );

                    var idInscripcion = $(this).parent().parent().attr("id");

                    var form_data = {
                        id: idInscripcion
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=sportsclub/CargarDatosPagosByID",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {

                            $("#id-pagos-observacciones").val( data.infoHorarios.ID );

                            $("#observaciones-pagos").val( data.observaciones );

                            $("#ModalEditarObservaciones").modal("show");

                        }, error: function (errData){
                            console.log("Entramos en el error");
                        }
                    });
                });

                //Funcion para dar de baja/alta
                $(".btn-baja-alta-inscripciones").on("click", function(){
                    $(this).attr("disabled", true);
                    var idInscripcion = $(this).parent().parent().parent().attr("id");
                    var nuevoValorActivo = 0;

                    if( $(this).is(':checked') ){
                        nuevoValorActivo = 1;
                    }

                    var form_data = {
                        id: idInscripcion,
                        valorActivo: nuevoValorActivo
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=sportsclub/ModificarAltaInscripcion",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {

                            console.log("Entramos al success");
                            /*
                            $("#id-pagos-observacciones").val( data.infoHorarios.ID );

                            $("#observaciones-pagos").val( data.observaciones );

                            $("#ModalEditarObservaciones").modal("show");
                            */

                        }, error: function (errData){
                            console.log("Entramos en el error");
                        }
                    });
                });
                

                //Funcion para editar los horarios
                $('#sportsClub-edicionHorarios-form').validate(
                {
                    submitHandler: function(){
                        $.ajax({
                            type: "POST",
                            url: "?r=sportsclub/ModificaHorarioPorIdInscripcion",
                            data: $('#sportsClub-edicionHorarios-form').serialize(),
                            dataType: "json",
                            success: function (data) {
                                //console.log("Entramos al success");
                                if( data["response"] === "success" ) {
                                    $("#mensaje-confirmacion-horario").show();
                                    setTimeout(function(){ $('#ModalEditarHorario').modal("hide");$("#mensaje-confirmacion-horario").hide(); }, 3000);
                                    
                                }else if( data["response"] === "error" ) {
                                    console.log( data["message"] );   
                                }
                            }, error: function (errData){
                                console.log("Entramos en el error");
                            }
                        });
                    }  
                });


                //Validacion para que no se puedan seleccionar mas de dos dias en running
                $('.running').on("click", function(){
                    comprobarCheckbox();
                }); 

                function comprobarCheckbox(){
                    var contador = 0;
                    $('.running').each(function(){
                        if( $(this).is( ":checked" ) ){
                            contador++;
                        }
                    });

                    if( contador  == 2 ){
                        $( ".running:not(:checked)" ).prop("disabled", true);
                    }else{
                        $( ".running" ).prop("disabled", false);
                    }
                }
            });
        </script>
    </body>
</html>