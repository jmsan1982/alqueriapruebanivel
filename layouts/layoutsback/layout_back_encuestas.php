<!DOCTYPE html>
<html lang="es">
    <?php require "includes/head_back.php"; ?>

    <body>
        <?php require "includes/topbar_back.php"; ?>

        <div class="canvas">
            <div id="content">
                <div id="page-content">
                    <div class="page-contacts-block">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- TITULO -->
                                <div class="col-12 text-center">
                                    <h2 class="section-title mt-0 mb-2" style="color: #406da4;">
                                        <i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>Encuestas de Satisfacción</b>
                                    </h2>
                                </div>

                                <!-- LISTADO -->
                                <div class="col-12 mb-2">
                                    <table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
                                        <thead class="table-dark">
                                            <tr style="cursor: pointer;">
                                                <th style="width: 40%;">Nombre</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Nº Participantes</th>
                                                <th class="text-center">Resultados</th>
                                                <th class="text-center">Exportar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($datos['encuestas'] as $encuesta) {
                                                    $encuesta_preguntas             =   encuestas_preguntas::findByIdEncuesta($encuesta['id']);
                                                    //$encuesta_numero_participantes  =   count(encuestas_respuestas::findParticipantesByIdPregunta($encuesta_preguntas[1]['id']));
                                                    $encuesta_numero_participantes  =   count(encuestas_participantes::findByIdEncuesta($encuesta['id']));
                                                    $encuesta_fecha_creacion        =   new DateTime($encuesta['fecha_creacion']);

                                                    echo '<tr id_encuesta="'.$encuesta['id'].'">
                                                            <td class="text-left">'.$encuesta['nombre'].'</td>
                                                            <td class="text-center">'.$encuesta_fecha_creacion->format('d/m/Y').'</td>
                                                            
                                                            <td class="text-center">'.$encuesta_numero_participantes.'</td>
                                                            <td class="text-center">
                                                                <button id="ver-datos-encuesta-'.$encuesta['id'].'" class="btn cargar-datos-encuesta mt-0 mb-0" style="top: 0;">
                                                                    Ver resultados
                                                                </button>
                                                            </td>

                                                            <td class="text-center">
                                                                <form action="?r=encuestas/ExportToExcelResultados" method="post">
                                                                    <input type="hidden" name="idinsc" value="'.$encuesta['id'].'">
                                                                    <button type="submit" id="'.$encuesta['id'].'"  value="Export to excel" class="btn cargar-datos-encuesta mt-0 mb-0" style="top: 0;"> Exportar a Excel</button>
                                                                </form>
                                                                
                                                            </td>

                                                            
                                                        </tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- DETALLES DE UNA ENCUESTA -->
                                <div id="encuesta-detalles" class="col-12 mb-4">
                                </div>

                                <!-- DETALLES DE UNA ENCUESTA -->
                                <div id="encuesta-detalles-pregunta-abierta" class="col-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'includes/footer_back.php';?>

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

                // Cargar resultados de una encuesta
                $('.cargar-datos-encuesta').on('click', function(){

                    var form_data = {
                        debug: "true",
                        form_id: "encuestas_cargar_resultados",
                        id_encuesta: $(this).attr('id')
                    };

 console.log('id: ' + $(this).attr('id'));
                    $.ajax({
                        type: "POST",
                        url: "?r=encuestas/Dispatcher",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            $("#encuesta-detalles").html(data.contenido_tabla_preguntas);
                        },
                        error: function(xhr){
                           console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });
                });

                // Cargar comentarios abiertos de una encuesta
                $('body').on('click','.cargar-comentarios',function(){
                    
                    var form_data = {
                        debug: "true",
                        form_id: "encuestas_cargar_comentarios_de_pregunta_abierta",
                        id_pregunta_abierta: $(this).attr('id')
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=encuestas/Dispatcher",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
                            $("#encuesta-detalles-pregunta-abierta").html(data.contenido_tabla_respuestas_abiertas);
                        },
                        error: function(xhr){
                           console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });
                });


                // exportar resultados de una encuesta
               /* $('.exportar-datos-encuesta').on('click', function(){

                    var form_data = {
                        debug: "true",
                        form_id: "encuestas_cargar_resultados",
                        id_encuesta: $(this).attr('id')
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=encuestas/ExportarParticipantes",
                        data: form_data,
                        dataType: "json",
                        success: function(data){
  
                               // $("#id-participante").val( data.instancia.id);

                                 $filename = "Participantes_encuesta_".date('Ymd') . ".xls";
                           // header('Content-Encoding: UTF-8');
                           // header('Content-Type: text/html; charset=utf-16');
                            header("Content-Type: application/vnd.ms-excel; charset=UTF-16LE");
                            header("Content-Disposition: attachment; filename=".$filename."");
                            header('Cache-Control: max-age=0');
                            $show_column = false;

                            if (!empty($datos['participantes'])) {
                                foreach ($datos['participantes'] as $inscripcion) {
                                    if (!$show_column) {
                                        // Display field/column names in first row
                                        echo implode("\t", array_keys($inscripcion)) . "\r\n";
                                        $show_column = true;
                                    }
                                    echo mb_convert_encoding(implode("\t", array_values($inscripcion)) . "\r\n", 'UTF-16LE', 'UTF-8');
                                    //para que se muestren bien los acentos
                                  //  echo mb_convert_encoding($result, 'UTF-16LE', 'UTF-8');
                                }
                            }


                            
                           



                           
                        },
                        error: function(xhr){
                           console.log('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                        }
                    });
                });
*/


            });
        </script>
    </body>
</html>