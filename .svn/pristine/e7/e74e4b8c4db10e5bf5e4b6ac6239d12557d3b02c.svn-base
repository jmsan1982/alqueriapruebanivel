<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">
	<link rel="stylesheet" href="css/forms.css">

	<style>
		.containerchekbox {
			font-weight: 400;
			font-size: 16px;
		}
	</style>

	<body class="Pages" id="alquiler">
		<?php require "includes/topbar_back.php"; ?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block schedule-block mb-3">
						<div class="container">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta reserva de salas</b>
									</h2>
								</div>

								<!-- COLUMNA IZQUIERDA: CALENDARIO JS -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="calendar-box" id="calendarioconsultapistas">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="boxed-form" style="padding-bottom: 20px;">
                                            <div class="form-group">
                                                <button class="btn btn-link-w" id="muestraformulario">
                                                    <span>SOLICITAR SALA</span>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="formulario" id="formulario" style="display: none;">
                                            <!-- form-block -->
                                            <form id="" action="?r=pistas/EnvioCorreoReservaSala" class="boxed-form" method="post">
                                                <div class="row">
                                                    <!-- Titulo -->
                                                    <div class="col-12">
                                                        <h2 class="section-title t-left">
                                                            <span style="color: #eb7c00;">SOLICITUD DE SALA:</span>
                                                        </h2>
                                                    </div>

                                                    <!-- Nombre solicitante -->
                                                    <div class="form-group col-12">
                                                        <input type="text" class="form-control" style="height: auto;" value="<?php if(isset($_SESSION['nombreusuario'])){echo utf8_encode($_SESSION['nombreusuario']);}?>" name="nombre_solicitante" placeholder="Nombre del solicitante" required>
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="form-group col-12">
                                                        <input type="email" class="form-control" style="height: auto;" value="<?php if(isset($_SESSION['emailusuario'])){echo utf8_encode($_SESSION['emailusuario']);}?>" name="email_solicitante" placeholder="Email del solicitante" required>
                                                    </div>

                                                    <!-- Sección -->
                                                    <div class="form-group col-12">
                                                        <select class="form-control" id="seccion-departamento" name="seccion_departamento" required>
                                                            <option disabled selected value>Sección / Departamento</option>
                                                            <option value="Administración">Administración</option>
                                                            <option value="Alqueria LAB">Alqueria LAB</option>
                                                            <option value="Area Desarrollo Personal">Area de Desarrollo Personal</option>
                                                            <option value="Cantera Masculina">Cantera Masculina</option>
                                                            <option value="Cantera Femenina">Cantera Femenina</option>
                                                            <option value="Cátedra">Cátedra</option>
                                                            <option value="Comunicación">Comunicación</option>   
                                                            <option value="Dirección">Dirección</option>
                                                            <option value="Dpto. Formación">Dpto. Formación</option>
                                                            <option value="Escuela">Escuela</option>
                                                            <option value="Externo">Externo</option>
                                                            <option value="Negocio">Negocio</option>
                                                            <option value="Recepción">Recepción</option>
                                                            
                                                        </select>
                                                    </div>

                                                    <!-- Externo: entidad, referencia, telefno, email -->
                                                    <div class="col-12 pl-3" id="opciones-seccion-externo">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control externo-required" style="height: auto;" name="externo_entidad" placeholder="Nombre de la entidad">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control externo-required" style="height: auto;" name="externo_referencia_vbc" placeholder="Referencia VBC">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="text" class="form-control externo-required" style="height: auto;" name="externo_telefono" placeholder="Teléfono de la entidad">
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="email" class="form-control externo-required" style="height: auto;" name="externo_email" placeholder="Email de la entidad">
                                                        </div>
                                                    </div>

                                                    <!-- Equipo -->
                                                    <div class="col-12" id="opciones-equipo-cargo">
                                                        <div class="form-group">
                                                            <select class="form-control campos-required" name="equipo">
                                                                <option disabled selected value>Seleccionar equipo</option>
                                                                <?php
                                                                    foreach ($datos['equipos'] as $equipo)
                                                                    {
                                                                ?>
                                                                        <option value="<?php echo $equipo['nombre_equipo_nueva_temporada'];?>">
                                                                            <?php echo  utf8_encode($equipo['nombre_equipo_nueva_temporada']);?></option>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <select class="form-control campos-required" name="cargo_solicitante">
                                                                <option disabled selected value>Seleccionar cargo</option>
                                                                <option value="Entrenador">Entrenador</option>
                                                                <option value="Coordinador">Coordinador</option>
                                                                <option value="Ayudante">Ayudante</option>
                                                                <option value="Delegado">Delegado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Seleccion de fecha y hora -->
                                                <div class="row">
                                                    <div class="form-group col-12 mt-1 mb-1">
                                                        <h4 class="mt-1">Fecha:</h4>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <input id="fecha" type="date" style="height: auto;" class="form-control" name="fecha" required> 
                                                        <!--<input type="date" class="form-control" style="color: #5c5c5c !important;"  name="fecha" required> -->
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <!-- <input type="text" class="form-control" style="height: auto;" name="hora_inicio" placeholder="Hora de inicio (hh:mm)" title="Hora:Minutos" required> -->
                                                        <h4 class="mt-1">Hora de inicio:</h4>
                                                        <input type="time" id="hora_inicio" name="hora_inicio" value="09:00:00" max="21:00:00" min="07:00:00" step="1" required>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <!-- <input type="text" class="form-control" style="height: auto;" name="hora_fin" placeholder="Hora de fin (hh:mm)" title="Hora:Minutos" required> -->
                                                        <h4 class="mt-1">Hora de fin:</h4>
                                                        <input type="time" id="hora_fin" name="hora_fin" value="13:00:00" max="23:00:00" min="09:00:00" step="1" onchange="mostrarBloqueSalas();" required>
                                                    </div>
                                                </div>

                                                <!-- Seleccion de sala y sus correspondientes extras -->
                                                <div class="row" id="bloque-salas" style="display: none;">
                                                    <div class="form-group col-12 mt-1 mb-1">
                                                        <h4 class="mt-1">Selección de sala:</h4>
                                                    </div>

                                                    <div class="form-group col-12" style="font-size: 17px;">
                                                        <label class="control control--radio" style="font-weight: 400;">
                                                            Miki Vukovic <input type="radio" name="sala" value="Miki Vukovic" onclick="mostrarOpcionesSalaMiki();" required>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div id="opciones-sala-miki" class="row pl-3" style="display: none;">
                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1" style="font-size: 17px;">
                                                            <label class="control control--radio" style="font-weight: 400;">
                                                                Entera <input type="radio" class="tipo-sala-required" name="sala_miki" value="Entera">
                                                                <div class="control__indicator"></div>
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1" style="font-size: 17px;">
                                                            <label class="control control--radio" style="font-weight: 400;">
                                                                A <input type="radio" name="sala_miki" value="A">
                                                                <div class="control__indicator"></div>
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-1" style="font-size: 17px;">
                                                            <label class="control control--radio" style="font-weight: 400;">
                                                                B <input type="radio" name="sala_miki" value="B">
                                                                <div class="control__indicator"></div>
                                                            </label>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s1_proyector" value="Sí">
                                                                <span class="checkmark"></span> Proyector
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s1_audio" value="Sí">
                                                                <span class="checkmark"></span> Audio
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s1_pizarra" value="Sí">
                                                                <span class="checkmark"></span> Pizarra
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div   class="form-group col-12" style="font-size: 17px;">
                                                        <label class="control control--radio" style="font-weight: 400;">
                                                            16/06/2017 <input type="radio" id="salaestudio" name="sala" value="16 de junio de 2017" onclick="mostrarOpcionesSala16Junio();" required>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div id="opciones-sala-16-junio" class="row pl-3" style="display: none;">
                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s2_proyector" value="Sí">
                                                                <span class="checkmark"></span> Proyector
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s2_audio" value="Sí">
                                                                <span class="checkmark"></span> Audio
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s2_pizarra" value="Sí">
                                                                <span class="checkmark"></span> Pizarra
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-12" style="font-size: 17px;">
                                                        <label class="control control--radio" style="font-weight: 400;">
                                                            Coinnovación <input type="radio" name="sala" value="Coinnovación" onclick="mostrarOpcionesSalaCoinnovacion();" required>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div id="opciones-sala-coinnovacion" class="row pl-3" style="display: none;">
                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s3_proyector" value="Sí">
                                                                <span class="checkmark"></span> Proyector
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s3_audio" value="Sí">
                                                                <span class="checkmark"></span> Audio
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s3_pizarra" value="Sí">
                                                                <span class="checkmark"></span> Pizarra
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-12" style="font-size: 17px;">
                                                        <label class="control control--radio" style="font-weight: 400;">
                                                            Auxiliar <input type="radio" name="sala" value="Auxiliar" onclick="mostrarOpcionesSalaAuxiliar();" required>
                                                            <div class="control__indicator"></div>
                                                        </label>
                                                    </div>

                                                    <div class="clearfix"></div>

                                                    <div id="opciones-sala-auxiliar" class="row pl-3" style="display: none;">
                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s4_proyector" value="Sí">
                                                                <span class="checkmark"></span> Proyector
                                                            </label>
                                                        </div>

                                                        <div class="form-group col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 mb-2 t-left">
                                                            <label class="containerchekbox">
                                                                <input type="checkbox" name="s4_pizarra" value="Sí">
                                                                <span class="checkmark"></span> Pizarra
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                              

                                                <div class="row">
                                                    <div class="form-group col-12 mt-1 mb-1">
                                                        <h4 class="mt-1">Actividad para la que se solicita:</h4>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <!-- <input type="text" class="form-control" style="height: auto;" name="actividad_titulo" placeholder="Título" required> -->
                                                        <select class="form-control"  name="actividad_titulo" required>
                                                            <option disabled selected value>Se solicita para:</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Video">Video</option>
                                                            <option value="Evento">Evento</option>
                                                            <option value="Clase">Clase</option>
                                                            <option value="Otros">Otros</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <textarea class="form-control" style="height: 115px;" name="actividad_descripcion" placeholder="Descripción" required></textarea>
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <textarea class="form-control" style="height: 115px;" name="observaciones" placeholder="Observaciones / Necesidades especiales"></textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-12 mt-1 mb-1" style="font-size: 17px;">
                                                        <p>
                                                            <span style="font-size: 17px; color: red;">
                                                                <strong>IMPORTANTE:</strong>
                                                            </span>
                                                            <br>
                                                            Cualquier incidencia se debe comunicar lo más pronto posible por el buen funcionamiento y convivencia de todos/as. ¡Muchas gracias!
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <input type="hidden" name="usuario_identificado" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>">
                                                        <button class="btn btn-link-w ml-0" type="submit" id="submit">
                                                            <span>ENVIAR</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
								</div>

								<!-- COLUMNA DERECHA: LISTA -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
									<div class="table-wrap">
										<?php
											if (isset($_GET['fecha'])) {
												$fecha = $_GET['fecha'];
											}
											else {
												$fecha = date('Y-m-d');
											}

											$date = new DateTime($fecha);

											if (count($datos['horario']) == 0) {
												echo "<h4 style='text-align:center;'>" .$date->format('d/m/Y')."</h4>";
											}
											else 
                                            {
												echo "<h4 style='text-align:center;'>".$date->format('d/m/Y')."</h4>";
										?>
												<table id="tabla-salas" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col" style="width: 30%;">Horario</th>
															<th scope="col" style="width: 20%;">Sala</th>
															<th scope="col" style="width: 30%;">Contacto</th> 
															<th scope="col" style="width: 20%;">Referencia</th>
                                                            <th scope="col" style="width: 20%;">Anular</th>
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($datos['horario'] as $sala) {
														?>
																<tr class="">
																	<td>De: <?php echo $sala['hora_ini']; ?> a: <?php echo $sala['hora_fin']; ?></td>
																	<td> <?php echo $sala['Sala']; ?></td>
																	<td><?php echo utf8_encode($sala['contacto_reserva']); ?></td>
																	<td><?php echo utf8_encode($sala['referencia']); ?></td>

                                                                    <?php 
                                                                    if  ( ($_SESSION['idcoach']>0 && ($_SESSION['idcoach']==$sala['idcoach']))  || ($_SESSION['idusuario']>0 && ($_SESSION['idusuario']==$sala['idusuario_serv'])) )
                                                                    {  
                                                                    ?>
                                                                    <td class="text-center">
                                                                        <form method="post" action="?r=pistas/AnularReservaSala">

                                                                           <input type="hidden" name="idreserva" value="<?php echo $sala['idreserva_sala']; ?>">
                                                                           <button class="btn baja" type="submit">Anular</button>
                                                                        </form>
                                                                    </td>
                                                                    <?php
                                                                    } else{ ?>
                                                                        <td class="text-center">
                                                                        
                                                                        </td>
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

		<?php include 'includes/footer_back.php';?>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<script src="js/CAL_JS_comportamiento_consultasalas.js?v=1.0"></script>

		<!-- PAGINADOR -->
		<script src="js/fancyTable.js"></script>

		<script type="text/javascript">
			$(document).ready(function()
            {
				$("#muestraformulario").click(function(){
					$("#formulario").slideToggle("slow");
				});


				// Mostrar opciones dependiendo si eligen los departamentos "Cant. Masc", "Cant. Fem", "Escuela" o "Externo"
				$("#opciones-seccion-externo").hide();
				$("#opciones-equipo-cargo").hide();

				$("#seccion-departamento").on('change', function() {
					if ($("#seccion-departamento option:selected").val() == "Cantera Masculina" ||
					$("#seccion-departamento option:selected").val() == "Cantera Femenina" ||
					$("#seccion-departamento option:selected").val() == "Escuela") {
						$(".externo-required").attr("required", false);
						$("#opciones-seccion-externo").hide();
						$(".campos-required").attr("required", true);
						$("#opciones-equipo-cargo").show();
					}
					else if ($("#seccion-departamento option:selected").val() == "Externo") {
						$(".externo-required").attr("required", true);
						$("#opciones-seccion-externo").show();
						$(".campos-required").attr("required", true);
						$("#opciones-equipo-cargo").show();
					}
					else {
						$(".externo-required").attr("required", false);
						$("#opciones-seccion-externo").hide();
						$(".campos-required").attr("required", false);
						$("#opciones-equipo-cargo").hide();
					}
				});

				$("#tabla-salas").fancyTable({
					sortColumn:0,
					sortable: true,
					pagination: true,
					searchable: true,
					inputPlaceholder: " Buscar en la tabla...",
					globalSearch: true
				});
			});


            //al cambiar la fecha comprobamos si la sala de estudio tiene alguna reserva de asiento
            $('#fecha').on('change', function(){

                //console.log("onchangefecha");
                if(
                    ($("#fecha").val() != null || $("#fecha").val() != "") &&
                    ($("#hora_inicio").val() !== "") &&
                    ($("#hora_fin").val() !== "")
                    )
                {
                        var formData = new FormData();
                        formData.append("fecha",             $("#fecha").val());
                        formData.append("hora_ini",          $("#hora_inicio").val());
                        formData.append("hora_fin",          $("#hora_fin").val());


                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=pistas/ComprobarDisponibilidadSalaEstudio",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {
console.log("no hay reservas de asiento");
                                    
                                    $("#salaestudio").prop("disabled", false);
                                    document.getElementById('bloque-salas').style.display = 'block';
                                   
                                   // $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                                else
                                {

console.log("SI hay reservas de asiento");
                                     document.getElementById('bloque-salas').style.display = 'block';
                                    
                                      $("#salaestudio").prop("disabled", true);
                                   

                                  //  $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-danger col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                            },
                            error: function(errorData)
                            {
                                //$("#submit-declaracion-responsable-form").prop("disabled", false);
                                console.log("error");
                            }
                        });
                    }
                    else
                    {
                        alert("Por favor, hay que rellelar la franja horaria");
                    }

            })




            //al cambiar la hora de inicio comprobamos si la sala de estudio tiene alguna reserva de asiento
            $('#hora_inicio').on('change', function(){

                //console.log("onchangefecha");
                if(
                    ($("#fecha").val() !=null || $("#fecha").val() !="") &&
                    ($("#hora_inicio").val() !== "") &&
                    ($("#hora_fin").val() !== "")
                    )
                {
                        var formData = new FormData();
                        formData.append("fecha",             $("#fecha").val());
                        formData.append("hora_ini",          $("#hora_inicio").val());
                        formData.append("hora_fin",          $("#hora_fin").val());


                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=pistas/ComprobarDisponibilidadSalaEstudio",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {
console.log("no hay reservas de asiento en hora_inicio");
                                    
                                    $("#salaestudio").prop("disabled", false);
                                    document.getElementById('bloque-salas').style.display = 'block';
                                   
                                   // $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                                else
                                {

console.log("SI hay reservas de asiento en hora_inicio");
                                     document.getElementById('bloque-salas').style.display = 'block';
                                    
                                      $("#salaestudio").prop("disabled", true);
                                   

                                  //  $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-danger col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                            },
                            error: function(errorData)
                            {
                                //$("#submit-declaracion-responsable-form").prop("disabled", false);
                                console.log("error");
                            }
                        });
                    }
                    else
                    {
                        alert("Por favor, hay que rellelar la franja horaria");
                    }

            })

            //al cambiar la hora de inicio comprobamos si la sala de estudio tiene alguna reserva de asiento
            $('#hora_fin').on('change', function(){

                //console.log("onchangefecha");
                if(
                    ($("#fecha").val() !== null || $("#fecha").val() !="") &&
                    ($("#hora_inicio").val() !== "") &&
                    ($("#hora_fin").val() !== "")
                    )
                {
                        var formData = new FormData();
                        formData.append("fecha",             $("#fecha").val());
                        formData.append("hora_ini",          $("#hora_inicio").val());
                        formData.append("hora_fin",          $("#hora_fin").val());


                        $.ajax(
                        {
                            type:           "POST",
                            url:            "?r=pistas/ComprobarDisponibilidadSalaEstudio",
                            data:           formData,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,          // tell jQuery not to set contentType
                            dataType:       "json",
                            
                            success:        function(data)
                            {
                                if(data.response==="success")
                                {
console.log("no hay reservas de asiento en hora_fin");
                                    
                                    $("#salaestudio").prop("disabled", false);
                                    document.getElementById('bloque-salas').style.display = 'block';
                                   
                                   // $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-success col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                                else
                                {

console.log("SI hay reservas de asiento en hora_fin");
                                     document.getElementById('bloque-salas').style.display = 'block';
                                    
                                      $("#salaestudio").prop("disabled", true);
                                   

                                  //  $("#declaracion-responsable-form-respuesta").html("<div class='alert alert-danger col-12'><h4>" + data.message + "</h4></div>");
                                    
                                }
                            },
                            error: function(errorData)
                            {
                                //$("#submit-declaracion-responsable-form").prop("disabled", false);
                                console.log("error");
                            }
                        });
                    }
                    else
                    {
                        alert("Por favor, hay que rellelar la franja horaria y fecha");
                    }

            })



            // Mostrar el bloque de salas al seleccionar la hora de fin
            function mostrarBloqueSalas() {
                
                document.getElementById('bloque-salas').style.display = 'block';
                
            }

			// Mostrar / ocultar opciones dependiendo de la sala elegida
			function mostrarOpcionesSalaMiki() {
				document.getElementById('opciones-sala-16-junio').style.display = 'none';
				document.getElementById('opciones-sala-coinnovacion').style.display = 'none';
				document.getElementById('opciones-sala-auxiliar').style.display = 'none';
				document.getElementById('opciones-sala-miki').style.display = 'block';
				$(".tipo-sala-required").attr("required", true);
			}

			function mostrarOpcionesSala16Junio() {
				document.getElementById('opciones-sala-miki').style.display = 'none';
				document.getElementById('opciones-sala-coinnovacion').style.display = 'none';
				document.getElementById('opciones-sala-auxiliar').style.display = 'none';
				document.getElementById('opciones-sala-16-junio').style.display = 'block';
				$(".tipo-sala-required").attr("required", false);
			}

			function mostrarOpcionesSalaCoinnovacion() {
				document.getElementById('opciones-sala-miki').style.display = 'none';
				document.getElementById('opciones-sala-16-junio').style.display = 'none';
				document.getElementById('opciones-sala-auxiliar').style.display = 'none';
				document.getElementById('opciones-sala-coinnovacion').style.display = 'block';
				$(".tipo-sala-required").attr("required", false);
			}

			function mostrarOpcionesSalaAuxiliar() {
				document.getElementById('opciones-sala-miki').style.display = 'none';
				document.getElementById('opciones-sala-16-junio').style.display = 'none';
				document.getElementById('opciones-sala-coinnovacion').style.display = 'none';
				document.getElementById('opciones-sala-auxiliar').style.display = 'block';
				$(".tipo-sala-required").attr("required", false);
			}
		</script>
	</body>
</html>