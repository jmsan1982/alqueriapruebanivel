<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<body>
		<script src="backmeans/assets/js/jquery.js"></script>

		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><strong>Jornadas Detección</strong>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
									<form action="?r=jornadas/ExportToExcelJornadasDeteccion" method="post">
										<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel</button>
									</form>
									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha Inscripción</th>
												<th class="text-center">ID</th>
												<th>Género</th>
												<th>Nombre</th>
												<th>Apellidos</th>
												<th class="text-center">Fecha Nacimiento</th>
												<th class="text-center">¿Practica Baloncesto?</th>
												<th>Club</th>
												<th>Jornada</th>
												<th class="text-center">Teléfono Tutor</th>
												<th>Email Tutor</th>
												<th class="text-center">Inscripción</th>
                                                <th class="text-center">Dar de baja</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['todasinscripciones'] as $inscripcion) {

													$date = new DateTime($inscripcion['fecharegistro']);

													echo '<tr id="'.$inscripcion['id'].'">
															<td class="text-center">'.$date->format('d/m/Y').'</td>
															<td class="text-center">'.$inscripcion['id'].'</td>
															<td class="text-left">'.$inscripcion['genero'].'</td>
															<td class="text-left">'.$inscripcion['nombre'].'</td>
															<td class="text-left">'.$inscripcion['apellidos'].'</td>
															<td class="text-center">'.$inscripcion['fechanacimiento'].'</td>
															<td class="text-center">'.$inscripcion['practicabaloncesto'].'</td>
															<td class="text-left">'.$inscripcion['club'].'</td>
															<td class="text-left">'; 
																if ($inscripcion['opcion'] == "jornada_1_2011_2012") {
																	echo "1ª Jornada (2011-2012)";
																}
																elseif ($inscripcion['opcion'] == "jornada_1_2009_2010") {
																	echo "1ª Jornada (2009-2010)";
																}
																elseif ($inscripcion['opcion'] == "jornada_1_2007_2008") {
																	echo "1ª Jornada (2007-2008)";
																}
																elseif ($inscripcion['opcion'] == "jornada_2_2009_2010") {
																	echo "2ª Jornada (2009-2010)";
																}
																elseif ($inscripcion['opcion'] == "jornada_2_2007_2008") {
																	echo "2ª Jornada (2007-2008)";
																}
																elseif ($inscripcion['opcion'] == "jornada_2_2005_2006") {
																	echo "2ª Jornada (2005-2006)";
																}
																elseif ($inscripcion['opcion'] == "jornada_3_2011_2012") {
																	echo "3ª Jornada (2011-2012)";
																}
																elseif ($inscripcion['opcion'] == "jornada_3_2009_2010") {
																	echo "3ª Jornada (2009-2010)";
																}
																elseif ($inscripcion['opcion'] == "jornada_3_2007_2008") {
																	echo "3ª Jornada (2007-2008)";
																}
															echo '</td>
															<td class="text-center">'.$inscripcion['telefonotutor'].'</td>
															<td class="text-left">'.$inscripcion['emailtutor'].'</td>
															<td class="text-center">
																<a href="?r=jornadas/ImprimirFicha&id='.$inscripcion['id'].'" target="_blank">
																	<i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
																</a>
															</td>
                                                            <td class="text-center">
                                                                <form method="post" action="?r=jornadas/DardeBajaJornadasDeteccion">';
                                                                    echo '<input type="hidden" name="id" value="'.$inscripcion['id'].'"> 
                                                                    <button class="btn baja" type="submit">Baja</button>
                                                                </form>
                                                            </td>
														</tr>';
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

				// Activar tooltips
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
			});
		</script>
	</body>
</html>