<!-- Inscripciones -->

<div id="div-1" class="col-12 mb-2" >
    <div class="row">
        <div class="col-12">
            <h4 class="section-title mt-0 mb-0" style="text-align: center; text-transform: none;">
                Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
            </h4>

            <table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
                <thead class="table-dark">
                <tr style="cursor:pointer">
                    <th>Fecha</th>
                    <th>Nº Pedido</th>
                    <th>DNI Titular</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Equipos</th>
                    <th>Inscripción completa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($datos['todasinscripciones'] as $inscripcion)
                    {
                    $pagos_del_formulario = inscripciones_pagos::findByIdFormulario($inscripcion['id_formulario']);
                    $total_pagado = 0;
                    foreach ($pagos_del_formulario as $pago) {
                        $total_pagado += $pago['importe'];
                    }

                    $date = new DateTime($inscripcion['fecha']);
                    $array_contenido = preg_split('/<br[^>]*>/i', $inscripcion['contenido']);


                    echo '<tr id="' . $inscripcion['id_formulario'] . '" style="cursor:pointer;" class="">
                                                <td class="t-center">' . $date->format('d/m/Y') . '</td>
                                                <td class="t-center">' . $inscripcion['numero_pedido'] . '</td>                                                
                                                <td class="t-center dni_titular_editar">' . $inscripcion['dni_tutor'] . '</td>
                                                <td class="t-center nombre_editar">' . $inscripcion['nombre_apellidos'] . '</td>
                                                <td class="t-center email_editar">' . $inscripcion['email'] . '</td>
                                                <td class="t-center modalidad_editar">' . $inscripcion['equipo'] . '</td>';


                                      echo '<td class="t-left">
                                                <a data-toggle="modal" data-target="#myModal" class="cargar_modal_editar_inscripcion">
                                                    <i class="fa fa-edit fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
                                                </a>

                                            </td>
                                            
                                        </tr>';
                                        //error_log( $inscripcion['dni_tutor'] . "/" . $inscripcion['numero_pedido'] );
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>