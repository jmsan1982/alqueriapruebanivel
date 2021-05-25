<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head_back.php'); ?>
    <link rel="stylesheet" href="css/semantic.css">
	<link rel="stylesheet" href="css/calendarioalquiler.css">
	<link rel="stylesheet" href="css/calendario.css">
	<link rel="stylesheet" href="css/forms.css">

	<style>
		.containerchekbox {
			font-weight: 400;
			font-size: 16px;
		}
        #nombre-jugador{
            width: 370px;
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
										<i class="fa fa-search" aria-hidden="true" style="margin-right: 10px;"></i><b>Consulta reserva de asiento en sala de estudio</b>
									</h2>
								</div>

								<!-- COLUMNA IZQUIERDA: CALENDARIO JS -->
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div class="row">
                                        <div class="calendar-box" id="calendarioconsultapistas">
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
                                                echo "<h4 style='text-align:center;'>No hay reservas para la fecha</h4>";
											}
											else 
                                            {
												echo "<h4 style='text-align:center;'>".$date->format('d/m/Y')."</h4>";
										?>
												<table id="tabla-pistas" class="table table-striped">
													<thead class="thead-dark">
														<tr>
															<th scope="col" style="width: 30%;">Horario</th>
															<th scope="col" style="width: 20%;">Silla</th>
															<th scope="col" style="width: 30%;">Jugador</th> 
															<th scope="col" style="width: 20%;">Equipo</th>
                                                            <th scope="col" style="width: 20%;">Reservado por</th>
														</tr>
													</thead>
													<tbody>
														<?php
															foreach ($datos['horario'] as $sala) {
														?>
																<tr class="">
																	<td>De: <?php echo $sala['hora_ini']; ?> a: <?php echo $sala['hora_fin']; ?></td>
																	<td> <?php echo $sala['idasiento']; ?></td>
																	<td><?php echo utf8_encode($sala['nombre']); ?></td>
																	<td><?php echo utf8_encode($sala['equipo']); ?></td>
                                                                    <td><?php echo utf8_encode($sala['reservado_por']); ?></td>
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

                            <div class="row">
                                <h4 style='text-align:center;'>Seleccionar horario para la reserva</h4>
                                <!-- BOTONES SELECCIÓN -->
                                <div class="row col-12 pt-2 pb-1">
                                    <div class="col-12 col-sm-6 col-md-6 offset-lg-2 col-lg-4 offset-xl-2 col-xl-2">
                                        <button id="but1012" class="btn btn-link-w">10:00 - 12:00h</button>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                                        <button id="but1214" class="btn btn-link-w">12:00 - 14:00h</button>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                                        <button id="but1517" class="btn btn-link-w">15:00 - 17:00h</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                                        <button id="but1719" class="btn btn-link-w">17:00 - 19:00h</button>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xl-2">
                                        <button id="but1921" class="btn btn-link-w">19:00 - 21:00h</button>
                                    </div>
                                </div>

                                <div id="formHide" style="display: none">

                                <!-- IMÁGEN SALA -->
                                <div class="col-12 col-md-6 col-lg-3 col-xl-3"> 
                                    <h4 style='text-align:center;'>Disposición de sillas</h4>            
                                    <img class="img-responsive border pb-0" src="img/sala-estudio.png" style="margin: 0 auto;border:1px solid #ddd;">
                                </div>

                                <div class="col-12 col-md-6 col-lg-9 col-xl-9">
                                    <!-- <div class="boxed-form" style="padding-bottom: 20px;">
                                        <div class="form-group">
                                            <button class="btn btn-link-w" id="muestraformulario">
                                                <span>SOLICITAR ASIENTO</span>
                                            </button>
                                        </div>
                                    </div> -->

                                    <div class="formulario" id="formulario" >   <!-- style="display: none;" -->
                                            <!-- form-block -->
                                            <form id="" action="?r=pistas/EnvioCorreoReservaSalaEstudio" class="boxed-form" method="post">
                                                <div class="row">
                                                    <!-- Titulo -->
                                                    <div class="col-12">
                                                        <h2 class="section-title t-left">
                                                            <span style="color: #eb7c00;">SOLICITUD DE ASIENTO:</span>
                                                        </h2>
                                                    </div>

                                                   <!--  <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                        
                                                    </div> -->

                                                     <!-- Reserva para el entrenador o usuario -->
                                                    <div class="form-group col-12" style="font-size:1em;">  
                                                        
                                                        <span style="color: red;">Si la reserva es para un jugador NO marque esta casilla</span>  
                                                        <br/>     
                                                        <label class="containerchekbox">
                                                            <input type="checkbox" name="reservaentrenador" value="reservaentrenador" >  <!--value="1" -->
                                                            <span class="checkmark"></span> Reserva de asiento para el usuario/a: <?php echo utf8_encode($_SESSION['nombreusuario']);?>
                                                        </label>
                                                        <br/>
                                                    </div>

                                                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                        <input id="fecha" type="date" style="height: auto;" class="form-control" name="fecha"  required> 
                                                        <!--<input type="date" class="form-control" style="color: #5c5c5c !important;"  name="fecha" required> -->
                                                    </div>

                                                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                        <input id="hora-inicio" type="text" class="form-control" style="height: auto;" name="hora_inicio" placeholder="Hora de inicio (hh:mm)" title="Hora:Minutos" required>
                                                    </div>

                                                    <div class="form-group col-12 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                        <input id="hora-fin" type="text" class="form-control" style="height: auto;" name="hora_fin" placeholder="Hora de fin (hh:mm)" title="Hora:Minutos" required>
                                                    </div>


                                                   
                                                    <div id="buscarjugador" style="display: block;">
                                                        <!-- Nombre jugador -->
                                                        <div class="form-group col-6">
                                                            <div class="ui search">
                                                                <div class="ui input">
                                                                    <input id="nombre-jugador" class="prompt form-control" type="text" style="height: auto;" name="nombre_jugador" placeholder="Buscar jugador" >
                                                                </div>
                                                                <div class="results"></div>
                                                            </div>
                                                        </div>

                                                        <!-- Email -->
                                                        <div class="form-group col-12">
                                                            <input id="email-jugador" type="email" class="form-control" style="height: auto;" name="email_jugador" placeholder="Email del jugador" readonly required>
                                                        </div>

                                                        <!-- Equipo -->
                                                        <div class="form-group col-12">
                                                            <input type="text" id="equipo-jugador" class="form-control" style="height: auto;" name="equipo_jugador" placeholder="Equipo del jugador" readonly required>
                                                        </div>
                                                    </div>



                                                    <!-- Sección -->
                                                    <div class="form-group col-12">
                                                        <select id="selecctor-sillas" class="form-control" name="seccion_departamento" required>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row">

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
                                   <!--  </div>
 -->
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <input type="hidden" name="id-jugador" id="id-jugador">
                                                        <input type="hidden" name="usuario_identificado" value="<?php if(isset($_SESSION['nombreusuario'])){echo utf8_encode($_SESSION['nombreusuario']);}?>">
                                                        <button class="btn btn-link-w ml-0" type="submit" id="submit">
                                                            <span>ENVIAR</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
		<script src="js/CAL_JS_comportamiento_consultasalaestudio.js?v=1.0"></script>
        <script src="js/semantic.js"></script>


        <!-- PAGINADOR -->
		<script src="js/fancyTable.js"></script>

		<script type="text/javascript">

            

            //Añadir jugadores a script de busqueda
            var content = [];
            var jugadores = <?php echo json_encode($datos['jugadores']) ?>;
            var cJugadores = <?php echo json_encode(count($datos['jugadores'])) ?>;
            for (i=0; i<cJugadores; i++) {
                content.push({title: jugadores[i].nombre + " "+ jugadores[i].apellidos , id: jugadores[i].id_jugador});
            }

			$(document).ready(function()
            {

               /* $("#reservaentrenador").click(function(evento){
                    if ($("#reservaentrenador").attr("checked")){
                        $("#buscarjugador").css("display", "block");
                    }else{
                        $("#buscarjugador").css("display", "none");
                    }
                });*/

				$("#muestraformulario").click(function(){
					$("#formulario").slideToggle("slow");
				});

				$("#tabla-pistas").fancyTable({
					sortColumn:0,
					sortable: true,
					pagination: true,
					searchable: true,
					inputPlaceholder: " Buscar en la tabla...",
					globalSearch: true
				});
			});

            $('.ui.search')
                .search({
                    source: content
                });

            $('#nombre-jugador').on('focusout', function (){
               //Busqueda de E-mail Equipo
                setTimeout(
                    function()
                    {
                        var idJugador = $('.ui.search')
                            .search('get result').id;
                        console.log(idJugador);
                        var formData = new FormData();
                        formData.append("id",   idJugador);

                        //Petición de consulta de jugador
                        $.ajax(
                            {
                                type:           "POST",
                                url:            "?r=pistas/ConsultaJugador",
                                data:           formData,
                                processData:    false,          // tell jQuery not to process the data
                                contentType:    false,          // tell jQuery not to set contentType
                                dataType:       "json",
                                success:        function(data)
                                {
                                    //console.log(data.dataE);
                                    $('#id-jugador').val(data.dataJ.id_jugador);
                                    $('#email-jugador').val(data.dataJ.email);
                                    $('#equipo-jugador').val(data.dataJ.nombre_equipo_nueva_temporada);
                                },
                                error: function(xhr, status, error) {
                                    console.log("error");
                                }
                            });
                    }, 1000);
            });



            $("#but1012").on( "click", function() {
                var date = <?php echo json_encode($fecha) ?>;
                $('#formHide').fadeIn(150);
                $('#fecha').val(date);
                $('#hora-inicio').val("10:00:00");
                $('#hora-fin').val("12:00:00");


                var formData = new FormData();
                formData.append("fecha",       		$("#fecha").val());
                formData.append("horaInicio",       $("#hora-inicio").val());
                formData.append("horaFin",     		$("#hora-fin").val());

                //Petición de sillas disponibles
                $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=pistas/ConsultaSalaEstudioSillas",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        success:        function(data)
                        {
                            $('[id=rSelect]').remove();
                            $('#selecctor-sillas').append('<option id="rSelect" disabled selected value>Seleccionar silla</option>')
                            for (i=0; i<data.data.length; i++) {
                                $('#selecctor-sillas').append('<option id="rSelect" value="'+data.data[i].asiento+'">Nº '+data.data[i].asiento+'</option>');
                            }
                        },
                        error: function(errorData)
                        {
                            console.log("error");
                        }
                    });
            });
            $("#but1214").on( "click", function() {
                var date = <?php echo json_encode($fecha) ?>;
                $('#formHide').fadeIn(150);
                $('#fecha').val(date);
                $('#hora-inicio').val("12:00:00");
                $('#hora-fin').val("14:00:00");

                var formData = new FormData();
                formData.append("fecha",       		$("#fecha").val());
                formData.append("horaInicio",       $("#hora-inicio").val());
                formData.append("horaFin",     		$("#hora-fin").val());

                //Petición de sillas disponibles
                $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=pistas/ConsultaSalaEstudioSillas",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        success:        function(data)
                        {
                            $('[id=rSelect]').remove();
                            $('#selecctor-sillas').append('<option id="rSelect" disabled selected value>Seleccionar silla</option>')
                            for (i=0; i<data.data.length; i++) {
                                $('#selecctor-sillas').append('<option id="rSelect" value="'+data.data[i].asiento+'">Nº '+data.data[i].asiento+'</option>');
                            }
                        },
                        error: function(errorData)
                        {
                            console.log("error");
                        }
                    });
            });
            $("#but1517").on( "click", function() {
                var date = <?php echo json_encode($fecha) ?>;
                $('#formHide').fadeIn(150);
                $('#fecha').val(date);
                $('#hora-inicio').val("15:00:00");
                $('#hora-fin').val("17:00:00");

                var formData = new FormData();
                formData.append("fecha",       		$("#fecha").val());
                formData.append("horaInicio",          		$("#hora-inicio").val());
                formData.append("horaFin",     		$("#hora-fin").val());

                //Petición de sillas disponibles
                $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=pistas/ConsultaSalaEstudioSillas",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        success:        function(data)
                        {
                            $('[id=rSelect]').remove();
                            $('#selecctor-sillas').append('<option id="rSelect" disabled selected value>Seleccionar silla</option>')
                            for (i=0; i<data.data.length; i++) {
                                $('#selecctor-sillas').append('<option id="rSelect" value="'+data.data[i].asiento+'">Nº '+data.data[i].asiento+'</option>');
                            }
                        },
                        error: function(errorData)
                        {
                            console.log("error");
                        }
                    });
            });
            $("#but1719").on( "click", function() {
                var date = <?php echo json_encode($fecha) ?>;
                $('#formHide').fadeIn(150);
                $('#fecha').val(date);
                $('#hora-inicio').val("17:00:00");
                $('#hora-fin').val("19:00:00");

                var formData = new FormData();
                formData.append("fecha",       		$("#fecha").val());
                formData.append("horaInicio",          		$("#hora-inicio").val());
                formData.append("horaFin",     		$("#hora-fin").val());

                //Petición de sillas disponibles
                $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=pistas/ConsultaSalaEstudioSillas",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        success:        function(data)
                        {
                            $('[id=rSelect]').remove();
                            $('#selecctor-sillas').append('<option id="rSelect" disabled selected value>Seleccionar silla</option>')
                            for (i=0; i<data.data.length; i++) {
                                $('#selecctor-sillas').append('<option id="rSelect" value="'+data.data[i].asiento+'">Nº '+data.data[i].asiento+'</option>');
                            }
                        },
                        error: function(errorData)
                        {
                            console.log("error");
                        }
                    });
            });
            $("#but1921").on( "click", function() {
                var date = <?php echo json_encode($fecha) ?>;
                $('#formHide').fadeIn(150);
                $('#fecha').val(date);
                $('#hora-inicio').val("19:00:00");
                $('#hora-fin').val("21:00:00");

                var formData = new FormData();
                formData.append("fecha",       		$("#fecha").val());
                formData.append("horaInicio",          		$("#hora-inicio").val());
                formData.append("horaFin",     		$("#hora-fin").val());

                //Petición de sillas disponibles
                $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=pistas/ConsultaSalaEstudioSillas",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        success:        function(data)
                        {
                            $('[id=rSelect]').remove();
                            $('#selecctor-sillas').append('<option id="rSelect" disabled selected value>Seleccionar silla</option>')
                            for (i=0; i<data.data.length; i++) {
                                $('#selecctor-sillas').append('<option id="rSelect" value="'+data.data[i].asiento+'">Nº '+data.data[i].asiento+'</option>');
                            }
                        },
                        error: function(errorData)
                        {
                            console.log("error");
                        }
                    });
            });
		</script>
	</body>
</html>