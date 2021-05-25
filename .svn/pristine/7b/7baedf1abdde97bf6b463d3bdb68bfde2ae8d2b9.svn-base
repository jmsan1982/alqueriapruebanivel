<!DOCTYPE html>
<html lang="es">
	<?php require "includes/head_back.php"; ?>

	<style>
		.trimestres {
			margin-top: 5px !important;
		}

		.inputForm {
			border: #eb7c00 2px solid !important;
			height: 59px;
		}

		.inputInvalidForm {
			border: red 2px solid !important;
			height: 59px;
		}

		input[type=number]::-webkit-inner-spin-button,
		input[type=number]::-webkit-outer-spin-button {
			-webkit-appearance: none; 
			margin: 0; 
		}

		input[type=number]{
			-moz-appearance: textfield;
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
										<i class="fa fa-dribbble" aria-hidden="true" style="margin-right: 10px;"></i><b>LIGA</b>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>

									<!-- <a href="?r=liga/ExportToExcelInscripcionesLigaSenior" target="_blank" class="btn btn-info mb-1">Exportar a Excel</a> -->
									<div style="display: flex;">
                                    <form action="?r=liga/ExportToExcelInscripcionesLigaSenior" method="post">
										<button type="submit" id="export_data_inscripciones_patronato"
										name='export_data_inscripciones_patronato' value="Export to excel"
										class="btn btn-info mb-1">Exportar a Excel
										</button>
									</form>&nbsp;&nbsp;&nbsp;
                                    <?php if ($datos['datosFormularios'][0]['liga_senior'] == 0) { ?>
                                    <button type="submit" id="activarLigaButton"
                                            name='activarLigaButton' value="1"
                                            class="btn btn-success mb-1">Activar Liga
                                    </button>
                                    <?php }  else {?>
                                        <button type="submit" id="activarLigaButton"
                                                name='activarLigaButton' value="0"
                                                class="btn btn-danger mb-1">Desactivar Liga
                                        </button>
                                    <?php } ?>
                                    </div>

									<table id="liga-listado-datatable" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Nombre</th>
												<th class="text-center">FechaAlta</th>
												<th class="text-center">Categoria</th>
												<th class="text-center">Division</th>
												<th class="text-center">Equipacion Principal</th>
												<th class="text-center">Equipacion Secundaria</th>
												<th class="text-center">Responsable</th>
												<th class="text-center">Teléfono Responsable</th>
												<th class="text-center">Email Responsable</th>
												<th class="text-center">Activo</th>
												<th class="text-center">Pagos</th>
												<th class="text-center">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php
												echo $datos['tabla_equipos_liga'];
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


		<?php require "includes/topbar_back.php"; ?>

		<!-- Modal - Editar Equipo -->
		<div id="edtiar-equipo-liga" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
			<div class="modal-dialog" style="width: 93%;">
				<div class="modal-content">
					<form id="form_editar_equipo" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="alert alert-success" id="mensaje-equipo-editado-correctamente">Equipo editado correctamente</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombre-editar-equipo" class="labelForm">Nombre:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="nombre-editar-equipo" name="nombre-editar-equipo" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="categoria-editar-equipo" class="labelForm">Categoria:</label>
									<select class="form-control inputForm valid" value="" id="categoria-editar-equipo" name="categoria-editar-equipo" aria-invalid="false">
										<option value="MASCULINO">Masculino</option>
										<option value="FEMENINO">Femenino</option>
									</select>
									<!--<input type="text" class="form-control inputForm valid" value="" id="categoria-editar-equipo" name="categoria-editar-equipo" placeholder="Nombre" aria-invalid="false">-->
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="subcategoria-editar-equipo" class="labelForm">Division:</label>
									<select class="form-control inputForm valid" value="" id="subcategoria-editar-equipo" name="subcategoria-editar-equipo" aria-invalid="false">
										<option value="" selected>Selecciona una</option>
										<option value="ORO">Oro</option>
										<option value="PLATA">Plata</option>
									</select>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="equipacion_principal-editar-equipo" class="labelForm">Equipacion Principal:</label>
									<input type="text" class="form-control inputForm valid" value="" id="equipacion_principal-editar-equipo" name="equipacion_principal-editar-equipo" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="equipacion_secundaria-editar-equipo" class="labelForm">Equipacion Visitante:</label>
									<input type="text" class="form-control inputForm valid" value="" id="equipacion_secundaria-editar-equipo" name="equipacion_secundaria-editar-equipo" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="activo-editar-equipo" class="labelForm">Activo:</label>
									<select class="form-control inputForm valid" value="" id="activo-editar-equipo" name="activo-editar-equipo">
										<option value="1">Activo</option>
										<option value="0">Inactivo</option>
									</select>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="ResponsableNombre-editar-equipo" class="labelForm">Nombre Responsable:</label>
									<input type="text" class="form-control inputForm valid" value="" id="ResponsableNombre-editar-equipo" name="ResponsableNombre-editar-equipo" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="mail-editar-equipo" class="labelForm">Email Responsable:</label>
									<input type="email" class="form-control inputForm valid" value="" id="mail-editar-equipo" name="mail-editar-equipo" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="telefono-editar-equipo" class="labelForm">Telefono responsable:</label>
									<input type="text" class="form-control inputForm valid" value="" id="telefono-editar-equipo" name="telefono-editar-equipo" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="IDEquipo" name="IDEquipo">
									<button type="submit" class="btn mt-2" name="editar_equipo" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px; color:orange;">
										Guardar
									</button>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
									<button type="button" class="btn mt-2" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px; color:orange;">
										Cerrar
									</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<!-- Modal - Editar jugadores-->
		<div id="editar-jugadores-liga" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pt-0 pb-0">Jugadores inscritos</h4>
					</div>

					<div class="modal-body">
						<form id="form_editar_jugadores" method="post">
							<div class="container-fluid contenidoJugadores">
								
								<div class="row">
                                    <br>
                                    <div class="alert alert-success" style="display: none" id="mensaje-equipo-editado-correctamente">Equipo editado correctamente</div>
									<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
										<!--<input type="hidden" id="IDInscripcion" name="IDInscripcion" value="798">-->
										 <button type="submit" class="btn mt-2" name="editar_jugadores" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;color: orange;" >
											Guardar
										</button> 
									</div>

									<div class="form-group col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
										<button type="button" class="btn mt-2" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;color: orange;">
											Cerrar
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Editar Pagos -->
		<div id="modal-liga-pagos" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Pagos del equipo:</h4>
					</div>

					<div class="modal-body">
						<div id="modaleditarcuenta-contenido" class="row">
							<div class="col-12">
								<table id="tabla-pagos" class="table table-striped table-hover w-100 mb-2" style="width: 100%;">
									<thead class="table-dark">
										<tr>
											<th class="text-left">Pago</th>
											<th class="text-left">Cantidad</th>
											<th class="text-left">Método pago</th>
											<th class="text-left">Confirmación pago</th>
											<th class="text-left">Fecha de pago</th>
										</tr>
									</thead>
									<tbody id="tabla-pagos-tbody">
									</tbody>
								</table>
							</div>

							<div id="contenido-justificante"></div>
						</div>
					</div>

					<div class="modal-footer t-center">
						<button id="modal-liga-pagos-cerrar" type="button" class="btn btn-empresas-activo btn-block" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; height: 35px; margin: 0 auto auto auto;">
							Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>

		<script src="backmeans/assets/js/bootstrap.js"></script>
		<script src="backmeans/assets/js/escuela-cantera.js"></script>

		<!-- Datatables. https://datatables.net/download/ -->
		<!-- Estos include se generan en la URL indicada donde se seleccionan los componentes / funciones a incluir -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

		<!-- JQuery Validation. https://jqueryvalidation.org/ -->
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>

		<script type="text/javascript">

            $('#activarLigaButton').on('click', function (){

                var formData = new FormData();
                formData.append("value",       	$('#activarLigaButton').val());

                $.ajax({
                    type:       "POST",
                    url:        "?r=liga/ActivarDesactivarLiga",
                    data:       formData,
                    dataType:   "json",
                    processData: false,  // tell jQuery not to process the data
                    contentType: false,   // tell jQuery not to set contentType
                    success:    function(data)
                    {
                        location.reload();

                    }, error: function(){
                        console.log("Error en la consulta ajax");
                    }
                });
            });

			//  MODAL 1. EQUIPO. Cargar modal EQUIPO
			$('body').on('click','.cargar_modal_editar_equipo',function()
			{
				$("#mensaje-equipo-editado-correctamente").hide();
				$("#nombre-editar-equipo").val("");
				$("#equipacion_principal-editar-equipo").val("");
				$("#equipacion_secundaria-editar-equipo").val("");
				$("#ResponsableNombre-editar-equipo").val("");
				$("#telefono-editar-equipo").val("");
				$("#mail-editar-equipo").val("");

				var id_seleccionado_texto = $(this).parent().attr("id").slice( $(this).parent().attr("id").indexOf("-")+1 );
				var form_data = {
					id_seleccionado: id_seleccionado_texto
				};

				$.ajax({
					type:       "POST",
					url:        "?r=liga/FindEquipoByIdEquipo",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						$("#IDEquipo").val(data.datos_equipo.ID);
						$("#nombre-editar-equipo").val(data.datos_equipo.NombreEquipo);

						if( data.datos_equipo.Categoria == "MASCULINO" ){
							$("#categoria-editar-equipo option[value=MASCULINO]").attr("selected",true);
							$("#categoria-editar-equipo option[value=FEMENINO]").attr("selected",false);
						}
						else if( data.datos_equipo.Categoria == "FEMENINO" ){
							$("#categoria-editar-equipo option[value=MASCULINO]").attr("selected",false);
							$("#categoria-editar-equipo option[value=FEMENINO]").attr("selected",true);
						}

						if(data.datos_equipo.Subcategoria == "ORO"){
							$("#subcategoria-editar-equipo option[value=ORO]").attr("selected",true);
						}
						else if(data.datos_equipo.Subcategoria == "PLATA"){
							$("#subcategoria-editar-equipo option[value=PLATA]").attr("selected",true);
						}

						// Validacion para que no se pueda seleccionar la categoria oro al seleccionar equipo femenino
						if( $("#categoria-editar-equipo option:selected").val() == "FEMENINO" ){
							$("#subcategoria-editar-equipo option[value=PLATA]").attr("disabled",true);
							$("#subcategoria-editar-equipo option[value=ORO]").attr("selected",true);
						}
						else{
							$("#subcategoria-editar-equipo option[value=PLATA]").attr("disabled",false);
						}

						$("#equipacion_principal-editar-equipo").val(data.datos_equipo.ColorEquipacionPrincipal);
						$("#equipacion_secundaria-editar-equipo").val(data.datos_equipo.ColorEquipacionSecundaria);

						$("#ResponsableNombre-editar-equipo").val(data.datos_equipo.ResponsableNombre);
						$("#telefono-editar-equipo").val(data.datos_equipo.ResponsableTelefono);
						$("#mail-editar-equipo").val(data.datos_equipo.ResponsableEmail);

						$("#activo-editar-equipo option[value=" + data.datos_equipo.activo + "]").attr("selected",true);

						$("#edtiar-equipo-liga").modal("show");

					}, error: function(datos_error){
						console.log("Error en la consulta ajax");
					}
				});
			});

			//  MODAL 1. EQUIPO. validacion para que no se pueda seleccionar la categoria oro al seleccionar equipo femenino
			$("#categoria-editar-equipo").on("change", function()
			{
				if( $("#categoria-editar-equipo option:selected").val() == "femenino" ){
					$("#subcategoria-editar-equipo option[value=plata]").attr("disabled",true);
					$("#subcategoria-editar-equipo option[value=oro]").attr("selected",true);
				}else{
					$("#subcategoria-editar-equipo option[value=plata]").attr("disabled",false);
				}
			});

			//  MODAL 1. EQUIPO. Formulario / Guardar
			$('#form_editar_equipo').validate(
			{
				submitHandler: function()
				{
					$.ajax({
						type: "POST",
						url: "?r=liga/UpdateEquipoByIdEquipo",
						data: $('#form_editar_equipo').serialize(),
						dataType: "json",
						success: function (data)
						{

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-NombreEquipo").text( $("#nombre-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-Categoria").text( $("#categoria-editar-equipo option:selected").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-Subcategoria").text( $("#subcategoria-editar-equipo option:selected").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-ColorEquipacionPrincipal").text( $("#equipacion_principal-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-ColorEquipacionSecundaria").text( $("#equipacion_secundaria-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-ResponsableNombre").text( $("#ResponsableNombre-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-ResponsableTelefono").text( $("#telefono-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-ResponsableEmail").text( $("#mail-editar-equipo").val() );

							$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-activo i" ).remove();

							if( $("#activo-editar-equipo option:selected").val() == 1 ){
								$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-activo" ).prepend( '<i class="fa fa-check-circle" style="color:green;"></i>' );
							}
							else{
								$( "#fila-equipo-" + $("#IDEquipo").val() + " .valor-tabla-activo" ).prepend( '<i class="fa fa-times-circle" style="color:red;"></i>' );
							}

							$("#mensaje-equipo-editado-correctamente").show();

							setTimeout(function(){ $("#edtiar-equipo-liga").modal("hide"); }, 2500);
						}
					});
				}
			});


            var dataID = "";
			//  MODAL 2. JUGADORES. Carga modal jugadores del equipo
			$('body').on('click','.cargar_modal_editar_jugadores',function() 
			{
                $("#mensaje-jugador-editado-correctamente").hide();
				var id_seleccionado_texto = $(this).parent().attr("id").slice( $(this).parent().attr("id").indexOf("-")+1 );
				var form_data = {
					id_seleccionado: id_seleccionado_texto
				};


				$.ajax({
					type:       "POST",
					url:        "?r=liga/FindJugadoresByIdEquipo",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
                        dataID = data;
						$(".jugador").remove();

						if( data.jugadores.length == 0 ){
							$(".contenidoJugadores").prepend('<div class="row mt-1 jugador" style="border-bottom: 0.7px solid black;"><div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12"><label for="nombreJugadores" class="labelForm">No hay jugadores para este equipo</label></div></div>');
						}

						for( var y = 0; y < data.jugadores.length; y++  ){
							$(".contenidoJugadores").prepend('<div class="row mt-1 jugador" id="jugador-' + data.jugadores[y].ID + '" style="border-bottom: 0.7px solid black;"><div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"><label for="nombreJugadores" class="labelForm">Nombre:</label><input type="text"class="form-control inputForm valid" id="nombreJugadores-'+y+'" name="nombreJugadores" aria-invalid="false" value="' + data.jugadores[y].Nombre + '"></div><div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"><label for="dniJugadores" class="labelForm">DNI:</label><input type="text" class="form-control inputForm valid" value="' + data.jugadores[y].DNI + '" id="dniJugadores-'+y+'" name="dniJugadores" aria-invalid="false"></div><div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"><label for="telefonoJugadores" class="labelForm">Telefono(opcional):</label><input type="text"class="form-control inputForm valid" value="' + (data.jugadores[y].Telefono || 'Sin definir') + '" id="telefonoJugadores-'+y+'" name="telefonoJugadores" aria-invalid="false"></div><div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3"><label for="emailJugadores" class="labelForm">Email(opcional):</label><input type="mail" class="form-control inputForm valid" value="' + (data.jugadores[y].Email || 'Sin definir') + '" id="emailJugadores-'+y+'" name="emailJugadores" aria-invalid="false"> </div></div> <div class="clearfix"></div>');

						}

						$("#editar-jugadores-liga").modal("show");

					}, error: function(datos_error){
						console.log("Error en la consulta ajax");
					}
				});
			});


			//  MODAL 2. JUGADORES. Formulario / Guardar
			$('#form_editar_jugadores').on('submit', function(e) {

			    e.preventDefault();
                var form = $('#form_editar_jugadores');
                var config = {};
                jQuery(form).serializeArray().map(function(item) {
                    if ( config[item.name] ) {
                        if ( typeof(config[item.name]) === "string") {
                            config[item.name] = [config[item.name]];
                        }
                        config[item.name].push(item.value);
                    } else {
                        config[item.name] = item.value;
                    }
                });
                var id = ""
			    for (var i=0; i<dataID.jugadores.length; i++) {
			        if (i != dataID.jugadores.length-1) id += dataID.jugadores[i].ID+",";
			        else  id += dataID.jugadores[i].ID;
                }
                console.log(id);
                var formData = new FormData();
                formData.append("nombre",       	config.nombreJugadores);
                formData.append("dni",       	config.dniJugadores);
                formData.append("telefono",       	config.telefonoJugadores);
                formData.append("email",       	config.emailJugadores);
                formData.append("id",       	id);


					$.ajax({
						type: "POST",
						url: "?r=liga/UpdateJugadoresByIdEquipo",
						data: formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
						dataType: "json",
						success: function (data)
						{
                            console.log(data);
							$("#mensaje-jugador-editado-correctamente").show();

							setTimeout(function(){ $("#editar-jugadores-liga").modal("hide"); }, 2500);
						},
						error: function () {
						    console.log("Error");
                        }
					});
			});

			// MODAL 3. PAGOS: Funcion para buscar la informacion de los pagos y abrir el modal para poder editarlo
			$('body').on('click','.cargar_modal_editar_pagos',function() 
			{
				$( "#modal-liga-pagos").modal('show');
				
				var form_data = {
					debug:          "true",
					ID:             $( this ).parent().attr("id")
				};

				$.ajax({
					type:       "POST",
					url:        "?r=liga/CargarFormulariosLigaAlqueriaPagos",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						if(data.response!=="success"){
							$("#tabla-pagos-tbody").html(data.tabla_pagos);
							if(data.response!=="success"){
								$("#contenido-justificante").html(data.contenido_justificante);
							}

							$("#modal-liga-pagos-respuesta").html("<div class='col-12'><div class='alert alert-success'>" + data.message + "</div></div>");
							$("#modal-liga-pagos-respuesta").fadeTo(2000, 500).slideUp(500,function() {
								$("#modal-liga-pagos-respuesta").slideUp(500);
								$("#modal-liga-pagos-respuesta").html("");
							});
						}
						else{
							$("#modal-liga-pagos-respuesta").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>");
							$("#modal-liga-pagos-respuesta").fadeTo(2000, 500).slideUp(500,function() {
								$("#modal-liga-pagos-respuesta").slideUp(500);
								$("#modal-liga-pagos-respuesta").html("");
							});
						}
					}
				});
			});

			// MODAL 3. PAGOS. Operación para confirmar un pago de la LIGA
			$('body').on('click','.confirmar_pago_liga',function()
			{
				var id_pago=$(this).attr('id');
				var array_id_pago=id_pago.split("-");

				$("#tabla-pagos-tbody").empty();

				var form_data = {
					debug:          "true",
					ID:             array_id_pago[2]
				};

				$.ajax({
					type:       "POST",
					url:        "?r=liga/ConfirmarPagoLiga",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						if(data.response=="success"){
							$("#tabla-pagos-tbody").html(data["tabla_pagos"]);
							$("#liga-listado-datatable tbody").html(data["tabla_equipos_liga"]);
						}
						else{
						}
					}
				});
			});

			//  MODAL 3. PAGOS. Operación para anular un pago de la LIGA
			$('body').on('click','.anular_pago_liga',function()
			{
				var id_pago=$(this).attr('id');
				var array_id_pago=id_pago.split("-");

				$("#tabla-pagos-tbody").html("");

				var form_data = {
					debug:          "true",
					ID:             array_id_pago[2]
				};

				$.ajax({
					type:       "POST",
					url:        "?r=liga/AnularPagoLiga",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						if(data.response=="success"){
							 $("#tabla-pagos-tbody").html(data["tabla_pagos"]);
							 $("#liga-listado-datatable tbody").html(data["tabla_equipos_liga"]);
						}
						else{
						}
					}
				});
			});
		</script>

		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	</body>
</html>