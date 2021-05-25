<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<body>
		<!-- <script src="backmeans/assets/js/jquery.js"></script> -->

		<?php require "includes/topbar_back.php"; ?>

		<?php //require "includes/header_back_campus.php"; ?>

		<div class="canvas">
            <div id="content">
                <div id="page-content">
                    <div class="page-contacts-block">
                        <div class="container-fluid">
                            <div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4; font-size:30px;">
										<i class="fa fa-heartbeat" aria-hidden="true" style="margin-right: 10px;"></i><b>RESERVAS GIMNASIO</b>
									</h2>
								</div>

								<!-- FORMULARIO NUEVO REGISTRO -->
								<div class="col-12">
									<div class="boxed-form" style="padding-bottom: 20px;">
										<div class="form-group">
											<button class="btn btn-link-w" id="muestraformulario">
												<span>NUEVO REGISTRO</span>
											</button>
										</div>
									</div>

                                    <div class="formulario" id="formulario" style="display: none;">
                                            <!-- form-block -->
                                        <form id="" action="?r=pistas/GrabarRegistoHorarioGimnasio" class="boxed-form" method="post">
                                               
                                            <!-- Seleccion de fecha y hora -->
                                            <div class="row">
                                            	<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            		<h4 class="mt-1">Fecha:</h4>
                                            		<input id="fecha" type="date" style="height: auto;" class="form-control" name="fecha" required> 
                                            		<!--<input type="date" class="form-control" style="color: #5c5c5c !important;"  name="fecha" required> -->
                                            	</div>

                                            	<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            		<!-- <input type="text" class="form-control" style="height: auto;" name="hora_inicio" placeholder="Hora de inicio (hh:mm)" title="Hora:Minutos" required> -->
                                            		<h4 class="mt-1">Hora de inicio:</h4>
                                            		<input type="time" id="hora_inicio" name="hora_inicio" value="08:00:00" max="23:00:00" min="07:00:00" step="1" required>
                                            	</div>

                                            	<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            		<!-- <input type="text" class="form-control" style="height: auto;" name="hora_fin" placeholder="Hora de fin (hh:mm)" title="Hora:Minutos" required> -->
                                            		<h4 class="mt-1">Hora de fin:</h4>
                                            		<input type="time" id="hora_fin" name="hora_fin" value="13:00:00" max="23:00:00" min="08:00:00" step="1" onchange="mostrarBloqueSalas();" required>
                                            	</div>
                                            </div>

                                            <div class="row">
                                                   
                                                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        <!-- <textarea class="form-control" style="height: 115px;" name="equipo" placeholder="Equipo" required></textarea> -->
                                                        <label for="equipo" class="labelForm">Equipo:</label>
														<input type="text" class="form-control inputForm valid" value="" id="equipo" name="equipo" placeholder="" aria-invalid="false">

                                                    </div>

                                                    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                    	<label for="observaciones" class="labelForm">Observaciones / Necesidades especiales:</label>
                                                        <textarea class="form-control" style="height: 115px;" name="observaciones" placeholder=""></textarea>
                                                    </div>

                                                    

                                               <!--  <div class="row">
                                                    <div class="form-group col-12 mt-1 mb-1" style="font-size: 17px;">
                                                        <p>
                                                            <span style="font-size: 17px; color: red;">
                                                                <strong>IMPORTANTE:</strong>
                                                            </span>
                                                            <br>
                                                            Cualquier incidencia se debe comunicar lo más pronto posible por el buen funcionamiento y convivencia de todos/as. ¡Muchas gracias!
                                                        </p>
                                                    </div>
                                                </div> -->
                                            </div>

                                            <div class="row">
                                                    <div class="form-group col-12">
                                                        <input type="hidden" name="usuario_identificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>">
                                                        <button class="btn btn-link-w ml-0" type="submit" id="submit">
                                                            <span>GRABAR</span>
                                                        </button>
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- TABLA -->
								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
									
									<!-- <form action="?r=campus/ExportToExcelCampusNavidad" method="post">
										<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info mb-1">Crear registro</button>
									</form> -->

									<table id="inscripciones-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Código</th>
												<th class="text-center">Fecha</th> 
												<th>Hora inicio</th>
												<th>Hora fin</th>
												<th class="text-center">Equipo</th>
												<th class="text-center">Observaciones</th>
												<th class="text-center">Pista</th>
												
												<th class="text-center">Modificar</th>
												<th class="text-center">Eliminar</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['reservasgim'] as $reserva) {

													$date = new DateTime($reserva['fecha']);

													echo '<tr id="' . $reserva['idhorario'] . '">
															<td class="text-center">' . $reserva['idhorario'] . '</td>
															<td class="text-center">' . $date->format('d/m/Y') . '</td>
															
															<td class="text-left">' . $reserva['hora_ini'] . '</td>
															<td class="text-left">' . $reserva['hora_fin'].'</td>
															<td class="text-center">' . $reserva['equipo_local']. '</td>
															<td class="text-center">' . $reserva['observ'] . '</td>
															<td class="t-left">' . $reserva['pista'].'</td>
															
															<td class="text-center">

																<a id="'.$reserva['idhorario'].'-editar-inscripcion" data-toggle="modal" data-target="#myModal" class="cargar_modal_editar_inscripcion">
																	<i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
																</a>

																
															</td>

															<td class="text-center">
																<form method="post" action="?r=pistas/EliminarReservaGim">';

																	echo '<input type="hidden" name="id" value="'.$reserva['idhorario'].'">
																	<button class="btn baja" type="submit">Eliminar</button>
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

		<!-- Modal - Editar Inscripcion -->
		<div id="myModal" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 93%;">
				<div class="modal-content">
					<form id="form_editar_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate" enctype="multipart/form-data">
						<div class="container-fluid">
							

							<div class="row mt-2">
								<div class="clearfix"></div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="fecha-editar-inscripciones" class="labelForm">Fecha:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fecha-editar-inscripciones" name="fecha-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="horaini-editar-inscripciones" class="labelForm">Hora inicio (formato 00:00:00)</label>
									<input type="text" class="form-control inputForm valid" value="" id="horaini-editar-inscripciones" name="horaini-editar-inscripciones" placeholder="00:00:00" aria-invalid="false"> 
									<!--<h5 class="mt-1">Hora de inicio:</h5>
									<input type="time" id="horaini-editar-inscripciones" name="horaini-editar-inscripciones" value="08:00:00" max="22:00:00" min="07:00:00" step="1">-->
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="horafin-editar-inscripciones" class="labelForm">Hora fin (formato 00:00:00)</label>
									<input type="text" class="form-control inputForm valid" value="" id="horafin-editar-inscripciones" name="horafin-editar-inscripciones" placeholder="00:00:00" aria-invalid="false"> 
									<!--<h5 class="mt-1">Hora de fin:</h5>
									<input type="time" id="horafin-editar-inscripciones" name="horafin-editar-inscripciones" value="08:00:00" max="22:00:00" min="07:00:00" step="1"> -->
								</div>

							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="observ-editar-inscripciones" class="labelForm">Observaciones:</label>
									<input type="text" class="form-control inputForm valid" value="" id="observ-editar-inscripciones" name="observ-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="equipo-editar-inscripciones" class="labelForm">Equipo:</label>
									<input type="text" class="form-control inputForm valid" value="" id="equipo-editar-inscripciones" name="equipo-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								
							</div>

							<div class="clearfix"></div>

							<div class="row mt-1">
							

								<!-- PARTE 1 FORM - DATOS -->
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Reserva editada correctamente.</p>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="idInscripcion-editar-inscripciones" name="idInscripcion-editar-inscripciones" > 
									<button type="submit" class="btn btn-empresas-activo mt-2" name="editar_inspecciones" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
										Guardar
									</button>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
									<button type="button" class="btn btn-empresas-activo mt-2" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
										Cerrar
									</button>
								</div>
							</div>
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

				$("#muestraformulario").click(function(){
					$("#formulario").slideToggle("slow");
				});


				// Datatable
				//$.fn.dataTable.moment('DD/MM/YYYY');
				$('#inscripciones-listado-datatable').DataTable({
					"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
					"order": [[1, "asc"]],
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


				//  Modal EDITAR / Cargar datos del registro seleccionado en la modal    
                $('body').on('click','.cargar_modal_editar_inscripcion',function()
                {
                    //  Borramos lo que podría estar rellenado anteriormente y la respuesta 
                    //  $('#administraciones-editar-form').trigger("reset");
                    //  $('#administraciones-editar-form-respuesta').html("");
                    $("#lista-espera").html(""); 
                    $("#lista-espera-guion").html("-"); 
                    
                    //  Recuperamos el id
                    var id          =   $(this).attr("id");
                    var array_id    =   id.split("-");
                    var form_data   =   {  id: array_id[0] };

                      //error_log(__FILE__.__FUNCTION__.__LINE__);
           			  //error_log(print_r(array_id[0],1));

                    $.ajax({
                        type:       "POST",
                        url:        "?r=pistas/MostrarModalReservaGim",
                        data: form_data,
                       // processData: false,          // tell jQuery not to process the data
                       // contentType: false,
                        dataType: "json",
                        success:    function(data)
                        {
                            if(data.response==="success")
                            {
                                $("#idInscripcion-editar-inscripciones").val(data.instancia['idhorario']);
                                $("#fecha-editar-inscripciones").val(data.instancia['fecha']);

                                $("#horaini-editar-inscripciones").val(data.instancia['hora_ini']);
                                $("#horafin-editar-inscripciones").val(data.instancia['hora_fin']);
                                $("#equipo-editar-inscripciones").val(data.instancia['equipo_local']);
                              //  console.log(data.instancia['equipo_local']);  
                                $("#observ-editar-inscripciones").val(data.instancia['observ']);

                               
                            }
                            else
                            {   alert("Ha habido un problema al cargar los datos del formulario.");    }
                        },
                        error: function(xhr, ajaxOptions, thrownError){
                    		alert(xhr.status);
                		}
                    });
                });
                
                //  Modal Editar Inscripcion /  Formulario  guardar datos de la modal
                $("#form_editar_inscripciones").validate(
				{
					submitHandler: function(form)
					{
                    
						var formData = new FormData();

						formData.append("idreserva",  		$("#idInscripcion-editar-inscripciones").val()); 
						formData.append("fecha", 			$('#fecha-editar-inscripciones').val()); 
						formData.append("horaini",			$('#horaini-editar-inscripciones').val()); 
				        formData.append("horafin", 			$('#horafin-editar-inscripciones').val()); 
				        formData.append("equipo", 			$('#equipo-editar-inscripciones').val()); 
				        formData.append("observ", 			$('#observ-editar-inscripciones').val()); 


						$.ajax({
                            type:           "POST",
                            url:            "?r=pistas/UpdateReservaGim",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            success: function(data)
                            {
                                if (data["response"] === "success")
                                {
										

										$("#editar-cuenta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
										$("#editar-cuenta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
											//$("#pagos-anyadir-respuesta").slideUp(500);
										});

										$("#mensaje-editar").show();
										/* $("#" + $("#IDInscripcion").val() + " .dni_titular_editar").text( $("#dnititular-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .equipo").text( $("#modalidad-editar-inscripciones option:selected").text() );
										$("#" + $("#IDInscripcion").val() + " .nombre_editar").text( $("#nombre-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .email_editar").text( $("#email-editar-inscripciones").val() );
										$("#" + $("#IDInscripcion").val() + " .modalidad_editar").text( $("#modalidad-editar-inscripciones option:selected").text() 
										 );*/
										setTimeout(function(){ $("#myModal").modal('hide') }, 2000);
									}
							}
						});
					}
				});
			});
		</script>
	</body>
</html>