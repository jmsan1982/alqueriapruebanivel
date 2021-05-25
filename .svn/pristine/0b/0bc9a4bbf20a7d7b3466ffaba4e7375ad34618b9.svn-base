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
                                        <i class="fa fa-sun-o" aria-hidden="true" style="margin-right: 10px;"></i><b>ALQUERIA ACADEMY</b>
                                    </h2>
                                </div>

                                <div class="col-12">
                                    <h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
                                        Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
                                    </h4>

                                    <a href="https://servicios.alqueriadelbasket.com/index.php?r=index/ExcelSportsClub" target="_blank" id="export_data" name="export_data" class="btn btn-info mb-1">Exportar a Excel</a>
                                    <table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
                                        <thead class="table-dark">
                                            <tr style="cursor: pointer;">
                                                <th class="text-center">Número Pedido</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th class="text-center">Fecha Nacimiento</th>
                                                <th class="text-center">Telefono</th>
                                                <th class="text-center">Móvil</th>
                                                <th>Email</th>
                                                <th>Tratamiento Médico</th>
                                                <th>Alergias</th>
                                                <th>Club</th>
                                                <th>Categoria</th>
                                                <th class="text-center">Altura</th>
                                                <th class="text-center">Talla</th>
                                                <th class="text-center">Trayectoria</th>
                                                <th class="text-center">Pagado</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($datos['inscripciones'] as $inscripcion) {

                                                    $date = new DateTime($inscripcion['fecha_nacimiento']);

                                                    echo '
                                                        <tr id="' . $inscripcion['ID'] . '">
                                                            <td class="text-center">' . $inscripcion['numero_pedido'] . '</td>
                                                            <td class="text-left">' . $inscripcion['nombre'] . '</td>
                                                            <td class="text-left">' . $inscripcion['apellidos'] . '</td>
                                                            <td class="text-center">' . $date->format('d/m/Y') .'</td>
                                                            <td class="text-center">' . $inscripcion['telefono'] . '</td>
                                                            <td class="text-center">' . $inscripcion['movil'] . '</td>
                                                            <td class="text-left">' . $inscripcion['email'] .'</td>
                                                            <td class="text-left">' . $inscripcion['tratamiento_medico'] . '</td>
                                                            <td class="text-left">' . $inscripcion['alergia'] . '</td>
                                                            <td class="text-left">' . $inscripcion['club'] . '</td>
                                                            <td class="text-left">' . $inscripcion['categoria'] . '</td>
                                                            <td class="text-center">' . $inscripcion['altura'] . '</td>
                                                            <td class="text-center">' . $inscripcion['talla'] . '</td>
                                                            <td class="text-left">' . $inscripcion['trayectoria'] . '</td>';
                                                            if( $inscripcion['pagado'] == 1 ){
                                                                echo '<td class="text-center"><i class="fa fa-check-circle" style="color:green"></i></td>';
                                                            }else{
                                                                echo '<td class="text-center"><i class="fa fa-times-circle" style="color:red"></i></td>';
                                                            }
                                                            
                                                        echo '
                                                            <td>
                                                                <a class="lanzarEditarInscripcion">
                                                                    <i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar Inscripcion"></i>
                                                                </a>
                                                            </td>

                                                        </tr>';

                                                        /*
                                                            <form method="post" action="?r=patronato/ModificaPagadoMatriculaPatronato"><label class="switch">
                                                                            <input type="checkbox" name="pagado" value="1">
                                                                            <span class="slider"></span>
                                                                        </label><input type="hidden" name="id" value="245"> 
                                                                    <button class="btn" type="submit">Guardar</button>
                                                                </form>                                                            
                                                        */
                                                    
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

        <div id="footer" class="hidden-xs" style="padding: 25px;">
            <div id="copyright">
                <p style="text-align: center;">
                    &copy; L'Alqueria del Basket 2020 | <a href="http://tessq.com/" target="_blank" style="text-decoration: none;">Diseño Web por Tess Quality</a>
                </p>
            </div>
        </div>

        <!--Modal editar Inscripcion-->
        <div class="modal fade" id="ModalEditarInscripcion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="AlqueriaAcademyFormBack" class="boxed-form" method="post">    
                    <div class="modal-header">
                        <h2 class="modal-title">Editar Inscripciones</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group col-12">
                            <div class="row">
                                <input type="hidden" value="campusworcester" name="categoria">
                                <!-- PARTE 1 DATOS -->
                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Nombre:
                                                <input type="text" class="form-control" name="nombre_editar_inscripcion" id="nombre_editar_inscripcion" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                            <label>Apellidos:
                                                <input type="text" class="form-control" name="apellidos_editar_inscripcion" id="apellidos_editar_inscripcion" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
                                            <label>Fecha de nacimiento:
                                                <input type="date" class="form-control" style="color: #5c5c5c !important;" name="fechanacimiento_editar_inscripcion" id="fechanacimiento_editar_inscripcion" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Teléfono:
                                                <input type="number" class="form-control" name="telefono_editar_inscripcion" id="telefono_editar_inscripcion">
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Teléfono móvil:
                                                <input type="number" class="form-control" name="movil_editar_inscripcion" id="movil_editar_inscripcion" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>Correo Electrónico:
                                                <input type="email" class="form-control" name="email_editar_inscripcion" id="email_editar_inscripcion" maxlength="50" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>¿Está bajo algún tratamiento médico?
                                                <input type="text" class="form-control" name="tratamientosmedicos_editar_inscripcion" id="tratamientosmedicos_editar_inscripcion">
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                            <label>¿Padece alguna alergia?
                                                <input type="text" class="form-control" name="alergias_editar_inscripcion" id="alergias_editar_inscripcion">
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
                                            <label>¿A qué club pertenece?
                                                <input type="text" class="form-control" name="club_editar_inscripcion" id="club_editar_inscripcion" maxlength="45" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                            <label>Categoría:
                                                <input type="text" class="form-control" name="categoria_editar_inscripcion" id="categoria_editar_inscripcion" maxlength="20" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                            <label>Altura:
                                                <input type="text" class="form-control" name="altura_editar_inscripcion" id="altura_editar_inscripcion" maxlength="15" required>
                                            </label>
                                        </div>

                                        <div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
                                            <label>Talla:
                                                <input type="text" class="form-control" name="tallaropa_editar_inscripcion" id="tallaropa_editar_inscripcion" maxlength="15" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label style="width: 100%;">Trayectoria:
                                                <textarea name="trayectoria_editar_inscripcion" id="trayectoria_editar_inscripcion" rows="5" cols="15" class="form-control" required></textarea>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <label>
                                                No Pagado
                                            </label>

                                            <label class="switch">
                                                <input type="checkbox" name="pagado_editar_inscripcion" id="pagado_editar_inscripcion" value="1">
                                                <span class="slider"></span>
                                                <input type="hidden" name="valor_pagado_editar_inscripcion" id="valor_pagado_editar_inscripcion">
                                            </label>

                                            <label>
                                                Pagado
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row pl-1 pr-1">
                                        <div class="col-12 col-md-12 col-lg-12 col-xl-12 redimension">
                                            <div class="alert alert-success" id="mensaje_editar_inscripcion">
                                                Inscripción editada correctamente. Espere por favor.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>                                
                    </div>
                
                  <div class="modal-footer">
                    <input type="hidden" name="id_para_editar" id="id_para_editar">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color: white; width: 100%">Cerrar</button>
                    <button type="submit" class="btn btn-success" style="width: 100%; margin-top: 2%; background-color: #eb7c00">Guardar</button>
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

                $("#mensaje_editar_inscripcion").hide();

                // Datatables
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

                //Funcion para dar de baja/alta / PENDIENTE MOSTRAR CORRECTAMENTE FECHA NACIMIENTO
                $(".lanzarEditarInscripcion").on("click", function(){

                    $("#mensaje_editar_inscripcion").hide();
                    $("#AlqueriaAcademyFormBack input").val(""); 
                    $("#pagado_editar_inscripcion").prop("checked", false);                   

                    var idInscripcion = $(this).parent().parent().attr("id");
                    console.log( idInscripcion );
                    $("#id_para_editar").val(idInscripcion);

                    
                    var form_data = {
                        id: idInscripcion
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=academy/CargarInscripcion",
                        data: form_data,
                        dataType: "json",
                        success: function (data) { 
                            console.log( data.inscripcion );
                            $("#nombre_editar_inscripcion").val( data.inscripcion.nombre );
                            $("#apellidos_editar_inscripcion").val( data.inscripcion.apellidos );
                            $("#fechanacimiento_editar_inscripcion").val( data.inscripcion.fecha_nacimiento );
                            $("#telefono_editar_inscripcion").val( data.inscripcion.telefono );
                            $("#movil_editar_inscripcion").val( data.inscripcion.movil );
                            $("#email_editar_inscripcion").val( data.inscripcion.email );
                            $("#tratamientosmedicos_editar_inscripcion").val( data.inscripcion.tratamiento_medico );
                            $("#alergias_editar_inscripcion").val( data.inscripcion.alergia );
                            $("#club_editar_inscripcion").val( data.inscripcion.club );
                            $("#categoria_editar_inscripcion").val( data.inscripcion.categoria );
                            $("#altura_editar_inscripcion").val( data.inscripcion.altura );
                            $("#tallaropa_editar_inscripcion").val( data.inscripcion.talla );
                            $("#trayectoria_editar_inscripcion").val( data.inscripcion.trayectoria );

                            if( data.inscripcion.pagado == 1 ){
                                $("#pagado_editar_inscripcion").prop("checked", true);
                            }


                            $("#ModalEditarInscripcion").modal("show");

                        }, error: function (errData){
                            console.log("Entramos en el error");
                        }
                    });
                });

                //Funcion para editar los horarios // Pendiente editar fecha cumpleaños
                $('#AlqueriaAcademyFormBack').validate(
                {
                    submitHandler: function(){
                        
                        if( $("#pagado_editar_inscripcion").is(':checked') ){
                            $("#valor_pagado_editar_inscripcion").val("1");
                        }else{
                            $("#valor_pagado_editar_inscripcion").val("0");
                        }

                        $.ajax({
                            type: "POST",
                            url: "?r=academy/ModificarAltaInscripcion",
                            data: $('#AlqueriaAcademyFormBack').serialize(),
                            dataType: "json",
                            success: function (data) {
                                //console.log("Entramos al success");
                                console.log("Tutto bene");
                                $("#mensaje_editar_inscripcion").show();
                                setTimeout(function(){ location.reload(); }, 3000);

                            }, error: function (errData){
                                console.log("Entramos en el error");
                                console.log( errData );
                            }
                        });
                    }  
                });

            });
        </script>
    </body>
</html>