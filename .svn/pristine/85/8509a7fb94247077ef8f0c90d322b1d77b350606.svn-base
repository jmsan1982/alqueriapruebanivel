<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<body>
		<script src="backmeans/assets/js/jquery.js"></script>

		<?php require "includes/topbar_back.php"; ?>

		<?php //require "includes/header_back_escuelas.php"; ?>

		<div class="canvas ">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									
									<?php 
									if ($_SESSION['nombreusuario']!="" && $_SESSION['idcoach']>0) { ?>
										<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
											<i class="fa fa-male" aria-hidden="true" style="margin-right: 10px;"></i><b>ENTRENAMIENTOS DE <?php echo utf8_encode($_SESSION['nombreusuario']);?></b>
										</h2>

									<?php 
									} else { ?>

										<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
											<i class="fa fa-male" aria-hidden="true" style="margin-right: 10px;"></i><b>NO SE HA LOGUEADO NINGUN ENTRENADOR</b>
										</h2>
									<?php 
									} ?>
									
								</div>

								<?php 
								if ( $_SESSION['nombreusuario']!=""  && count($datos['infoEquipo'])>0) { ?>

									<div class="col-12">
										<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
											Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
										</h4>
										<!-- <form action="?r=incidencias/ExportToExcelIncidencias" method="post">
											<button type="submit" id="export_data" name="export_data" value="Export to excel" class="btn btn-info mb-1">Exportar a Excel</button>
										</form> -->


										<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
											<thead class="table-dark">
												<tr style="cursor: pointer;">
													
													<th class="text-center">Fecha</th>
													<th class="text-center">Horario</th>
													<th class="text-center">Pista</th>
													<th class="text-center">Equipo</th>
													<th class="text-center">Vest Local</th>
													<th class="text-center">Partido</th>
													<th class="text-center">Visitante</th>
													<th class="text-center">Vest visit</th>
													
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($datos['infoEquipo'] as $equipo) {

														foreach ($equipo as $entrenamiento) {
															$date = new DateTime($entrenamiento['fecha']);

															if ($entrenamiento['es_partido'] == "1") {
																$partido="Sí";
															}else{$partido="No";}
															
															echo '<tr id="' . $entrenamiento['idhorario'] . '">
																	 
																	<td class="text-center">' . $date->format('d/m/Y') . '</td> 
																	<td class="text-center">' . $entrenamiento['horario'] . '</td>
																	<td class="text-center">' . $entrenamiento['pista'] . '</td>
																	<td class="text-center">' . $entrenamiento['equipo_local'] . '</td>
																	<td class="text-center">' . $entrenamiento['vestuario_local'] . '</td>
																	<td class="text-center">' . $partido . '</td>
																	<td class="text-center">' . $entrenamiento['equipo_visit'] . '</td>
																	<td class="text-center">' . $entrenamiento['vestuario_visit'] . '</td>
																	
																	
																</tr>';
														}
													}
												?>
											</tbody>
										</table>
									</div>
								<?php 
								} else {?>

									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
											No hay entrenamientos asignados.
									</h4>

								<?php 
								} ?>

							</div>

							<!-- datos de reservas  -->
							<div class="row">
								<!-- datos de reserva de sala-->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
									<div class="table-wrap">
										<?php
											if ($_SESSION['nombreusuario']!="" && $_SESSION['idcoach']>0) { ?>
												<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
													<i class="fa fa-male" aria-hidden="true" style="margin-right: 10px;"></i><b>Reservas de salas</b>
												</h2>

										
												<table id="reservasala-datatable" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col" style="width: 15%;">Fecha</th>
															<th scope="col" style="width: 20%;">Horario</th>
															<th scope="col" style="width: 10%;">Sala</th>
															<th scope="col" style="width: 20%;">Ref.</th> 
															<th scope="col" style="width: 10%;">Estado</th>
                                                            <th scope="col" style="width: 10%;">Anular</th> 
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($datos['reservasala'] as $reservsala) {
																$date = new DateTime($reservsala['fecha']);
																//<?php echo $date->format('d/m/Y'); 
																//var_dump($reservsala);
														?> 
																<tr class="">

																	<td><?php echo $date->format('d/m/Y'); ?></td> 
																	<td>De: <?php echo $reservsala['hora_ini']; ?> a: <?php echo $reservsala['hora_fin']; ?></td>
																	<td><?php echo $reservsala['Sala']; ?></td>
																	<td><?php echo utf8_encode($reservsala['referencia']); ?></td>
																	<td><?php echo utf8_encode($reservsala['estado']); ?></td>

                                                                    <?php
                                                                    if ($reservsala['estado']!="Anulado"){
                                                                    ?>
	                                                                   <td class="text-center">
	                                                                        <form method="post" action="?r=entrenamientos/AnularReservaSala">
	                                                                           <input type="hidden" name="rutaretorno" value="?r=entrenamientos/BackEntrenamientos">
	                                                                           <input type="hidden" name="idreservas" value="<?php echo $reservsala['idreserva_sala']; ?>">
	                                                                           <button class="btn baja" type="submit">Anular</button>
	                                                                        </form>
	                                                                    </td>
	                                                                 <?php
																	} else{?>
																	<td></td> 

																	<?php	
																	}
																	?> 
                                                                    

																</tr>
														<?php
															}
														?>
													</tbody>
												</table> 
										<?php
											}	
										?>
									</div>
                                    
                                    
								</div>

								<!-- datos de reserva de asiento-->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
									<div class="table-wrap">

											<?php
											if ($_SESSION['nombreusuario']!="" && $_SESSION['idcoach']>0) { ?>
												<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
													<i class="fa fa-male" aria-hidden="true" style="margin-right: 10px;"></i><b>Reservas asiento en sala de estudio</b>
												</h2>

											
												<table id="reservaasientosala-datatable" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col" style="width: 15%;">Fecha</th>
															<th scope="col" style="width: 20%;">Horario</th>
															<th scope="col" style="width: 10%;">Asiento</th>
															<th scope="col" style="width: 20%;">Nombre</th> 
															<th scope="col" style="width: 20%;">Equipo</th>
															<!-- <th scope="col" style="width: 10%;">Anulada</th> -->
                                                            <th scope="col" style="width: 10%;">Anular</th> 
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($datos['reservasalaestudio'] as $salaestudio) {
																$date = new DateTime($salaestudio['fecha']);

																if($salaestudio['anulada']==1){$anulado="Si";} else{$anulado="No";}
														?>
																<tr class="">
																	<td> <?php echo $date->format('d/m/Y'); ?></td>
																	<td>De: <?php echo $salaestudio['hora_ini']; ?> a: <?php echo $salaestudio['hora_fin']; ?></td>
																	<td> <?php echo $salaestudio['idasiento']; ?></td>
																	<td><?php echo utf8_encode($salaestudio['nombre']); ?></td>
																	<td><?php echo utf8_encode($salaestudio['equipo']); ?></td>
																	<!-- <td><?php //echo $anulado; ?></td> -->
                                                                    <?php
                                                                    if ($salaestudio['anulada']==0){
                                                                    ?>
                                                                     <td class="text-center">
                                                                        <form method="post" action="?r=entrenamientos/AnularReservaAsientoSala">
                                                                        	<input type="hidden" name="rutaretorno" value="?r=entrenamientos/BackEntrenamientos">
                                                                           <input type="hidden" name="idreserva" value="<?php echo $salaestudio['idreserva']; ?>">
                                                                           <button class="btn baja" type="submit">Anular</button>
                                                                        </form>
                                                                    </td> 
                                                                    <?php
																	} else{?>
																	<td></td> 

																	<?php	
																	}
																	?>

																</tr>
														<?php
															}
														?>
													</tbody>
												</table> 
										<?php
											}
										?>
									</div>
                                    
                                    
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require "includes/topbar_back.php"; ?>

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
					"order": [[0, "asc"]],
					"dom": '<"toolbar">frtip',
					"scrollX" : true,
					"paging": false,
					language: {
						"search": "",
						"searchPlaceholder": "Buscar",
						"lengthMenu": "Mostrando _MENU_ entrenamientos por página",
						"zeroRecords": "No hemos encontrado entrenamientos",
						"info": false,
						"bPaginate": false
					}
				});

				// Activar tooltips
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})

				// Datatable  reserva de sala
				$('#reservasala-datatable').DataTable({
					"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
					"order": [[0, "asc"]],
					"dom": '<"toolbar">frtip',
					"scrollX" : true,
					"paging": false,
					language: {
						"search": "",
						"searchPlaceholder": "Buscar",
						"lengthMenu": "Mostrando _MENU_ entrenamientos por página",
						"zeroRecords": "No hemos encontrado reserva de sala",
						"info": false,
						"bPaginate": false
					}
				});


				// Datatable  reserva asiento en sala
				$('#reservaasientosala-datatable').DataTable({
					"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
					"order": [[0, "asc"]],
					"dom": '<"toolbar">frtip',
					"scrollX" : true,
					"paging": false,
					language: {
						"search": "",
						"searchPlaceholder": "Buscar",
						"lengthMenu": "Mostrando _MENU_ entrenamientos por página",
						"zeroRecords": "No hemos encontrado asientos",
						"info": false,
						"bPaginate": false
					}
				});

				


			});
		</script>
	</body>
</html>