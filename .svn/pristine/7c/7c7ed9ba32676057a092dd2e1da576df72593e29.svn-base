<!-- Pagos por fechas -->

<div id="div-2" class="col-12 mb-2" style="display: <?php echo $visiblePagosPorFecha; ?>">
    <div class="row no-gutters">
        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
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
                        echo '<tr id="' . $pago["id"] . '">
                                <td class="t-center">
                                    <a class="cambiar-buscador-pagos-datatable">' .
                                $fechapago['created_day'] . '</a>
                                </td>
                                <td class="t-center"><strong>' . $fechapago["suma"] . '€</strong></td>
                            </tr>';
                    }
                ?>
                </tbody>
            </table>
        </div>

        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 mb-2">
            <h4 class="section-title mt-0 mb-0" style="text-align: center;">
                *Puede buscar por fecha (ej. <span style="text-decoration:underline;color:#eb7c00;">2018-09-12</span>)
            </h4>

            <table id="pagos-listado-datatable" class="table w-100 mb-2">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha y hora pago</th>
                        <th>Importe €</th>
                        <th>DNI Titular</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Modalidad</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($datos['todospagos'] as $pago) {
                    $inscripcion_asociada = inscripciones::findFormForId($pago['id_formularioinscripciones']);
                    //$datetime_fecha_pago = new DateTime($pago['fecha']);
                    $array_contenido = preg_split('/<br[^>]*>/i', $inscripcion_asociada['contenido']);

                    echo '<tr id="' . $pago['id'] . '">
                            <td class="t-center">' . substr($pago['fecha'], 0, 10) . '</td>
                            <td class="t-center">' . $pago['importe'] . '€</td>
                            <td class="t-left">' . $pago['dni_pagador'] . '</td>
                            <td class="t-left">' . $inscripcion_asociada['nombre_apellidos'] . '</td>
                            <td class="t-left">' . $inscripcion_asociada['categoria'] . '</td>';

                    if (isset($array_contenido) && isset($array_contenido[14]) && $array_contenido[14] !== "") {
                        echo '<td class="t-left">' . str_replace("<b>Modalidad:</b>", "", $array_contenido[14]);
                    }
                    else {
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