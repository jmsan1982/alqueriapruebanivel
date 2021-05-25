<!DOCTYPE html>
<html lang="es"> 
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages" id="formus">
		
		<div class="wrapper overflow-x-hidden">	

			<?php require('includes/header.php'); ?>
			
			<!-- Start Page-Content -->
			<section id="page-content" class="overflow-x-hidden margin-top-header">

				<div class="block">
					<div class="container-fluid pl-0 pr-0">
						<div class="row pl-0 pr-0">
							<div class="parallax col-12 mt-0" 
								 style="background-image: url('img/cabecera-escuela-navidad.jpg');">
							</div>
						</div>
					</div>
				</div>

				<div class="block background-f6">
					<div class="container">
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
										<img class="img-responsive" src="img/escudo-escuela-navidad.png" style="margin: 0 auto;" alt="Escudo Escuela de Navidad">
									</div>

									<div class="col-12 col-md-9 col-lg-9 col-xl-9" id="titulo">
										<h2 class="section-title">
											<span class="orange-text">V Escuela de Navidad</span>
										</h2>
										<h3 class="section-title mb-0">23, 24, 28, 29, 30, 31 de diciembre</h3>
										<h3 class="section-title mb-2">4 y 5 de enero</h3>
									</div>
								</div>

								<form id="contactform" enctype="multipart/form-data" action="?r=escuelanavidad/EscuelaNavidadForm" class="boxed-form" name="contactform" method="post">
									<input type="hidden" name="categoria" value="escuelanavidad">
											  
									<!-- PARTE 1 -->

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 1.2em;">
														<label class="control control--radio mb-1">
															OPCIÓN A: Sólo mañanas (125€)
															<input type="radio" name="opcion" value="solomanyana" checked required>
															<div class="control__indicator"></div>
														</label>

														<label class="control control--radio mb-1">
															OPCIÓN B: Días completos (210€)
															<input type="radio" name="opcion" value="diacompleto">
															<div class="control__indicator"></div>
														</label>

														<label class="control control--radio mb-1">
															OPCIÓN C: Días sueltos
															<input type="radio" name="opcion" value="sueltos" id="radiodiassueltos">
															<div class="control__indicator"></div>
														</label>
													</div>

													 <div class="col-12 t-left" style="font-size:1.2em;display:none;" id="diassueltos">
                                                        <p>
                                                            En caso de ir días sueltos seleccionar los días:</br>
                                                            Mañanas 18€, día completo 30€
                                                        </p>

                                                        
                                                        <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia1" value="dia23">
                                                                    <span class="checkmark"></span> Día 23 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa1" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia1" value="dia23-manyana" checked>Solo mañana  &nbsp;   &nbsp; 
                                                                   
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia1" value="dia23-completo">Día completo
                                                                </label>
                                                            </div>
                                                       </div>

                                                       <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia2" value="dia24">
                                                                    <span class="checkmark"></span> Día 24 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa2" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia2" value="dia24-manyana" checked>Solo mañana   &nbsp;   &nbsp;
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia2" value="dia24-completo">Día completo
                                                                </label>
                                                            </div>
                                                       </div>

                                                        <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia3" value="dia28">
                                                                    <span class="checkmark"></span> Día 28 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa3" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia3" value="dia28-manyana" checked>Solo mañana  &nbsp;   &nbsp; 
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia3" value="dia28-completo">Día completo
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia4" value="dia29">
                                                                    <span class="checkmark"></span> Día 29 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa4" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia4" value="dia29-manyana" checked>Solo mañana  &nbsp;   &nbsp; 
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia4" value="dia29-completo">Día completo
                                                                </label>
                                                            </div>
                                                       </div>


                                                       <div class="row">
	                                                       	<div class="col-3 t-left" style="font-size:1em;">

	                                                       		<label class="containerchekbox">
	                                                       			<input type="checkbox" name="dia5" value="dia30">
	                                                       			<span class="checkmark"></span> Día 30
	                                                       		</label>
	                                                       	</div>

	                                                       	<div class="col-9" id="capa5" style="font-size:0.8em;display:none;">
	                                                       		<label class="radio-inline">
	                                                       			<input type="radio" name="rdia5" value="dia30-manyana" checked>Solo mañana   &nbsp;   &nbsp;
	                                                       		</label>
	                                                       		<label class="radio-inline">
	                                                       			<input type="radio" name="rdia5" value="dia30-completo">Día completo
	                                                       		</label>
	                                                       	</div>
                                                       </div>

                                                       <div class="row">
	                                                       	<div class="col-3 t-left" style="font-size:1em;">

	                                                       		<label class="containerchekbox">
	                                                       			<input type="checkbox" name="dia6" value="dia31">
	                                                       			<span class="checkmark"></span> Día 31
	                                                       		</label>
	                                                       	</div>

	                                                       	<div class="col-9" id="capa6" style="font-size:0.8em;display:none;">
	                                                       		<label class="radio-inline">
	                                                       			<input type="radio" name="rdia6" value="dia31-manyana" checked>Solo mañana   &nbsp;   &nbsp;
	                                                       		</label>
	                                                       		<label class="radio-inline">
	                                                       			<input type="radio" name="rdia6" value="dia31-completo">Día completo
	                                                       		</label>
	                                                       	</div>
                                                       </div>

                                                       <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia7" value="dia4">
                                                                    <span class="checkmark"></span> Día 4 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa7" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia7" value="dia4-manyana" checked>Solo mañana  &nbsp;   &nbsp; 
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia7" value="dia4-completo">Día completo
                                                                </label>
                                                            </div>
                                                       </div>

                                                       <div class="row">
                                                            <div class="col-3 t-left" style="font-size:1em;">
                                                                
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="dia8" value="dia5">
                                                                    <span class="checkmark"></span> Día 5 
                                                                </label>
                                                            </div>

                                                            <div class="col-9 " id="capa8" style="font-size:0.8em;display:none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia8" value="dia5-manyana" checked>Solo mañana  &nbsp;   &nbsp; 
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia8" value="dia5-completo">Día completo
                                                                </label>
                                                            </div>
                                                       </div>
                                                       
                                                    </div>


												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<div class="contact-info-wrap t-center"> 
													<div class="row">
														<div class="col-12">
															<h4 class="section-title mt-0 mb-0 t-center">
																<span class="orange-text">Actividades (Nacidos entre 2009 y 2015)</span>
															</h4>
														</div>

														<div class="col-12 col-lg-6 col-xl-6 mt-1 mb-1">
															<table class="table table-dark table-striped" style="width: 100%; margin: 0 auto;">
																<thead>
																	<tr>
																		<th>MAÑANAS</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>08:30 - 09:00</td>
																		<td align="left">Llegada</td>
																	</tr>
																	 <tr>
																		<td>09:15 - 11:00</td>
																		<td align="left">Entrenamiento</td>
																	</tr>
																	 <tr>
																		<td>11:00 - 11:30</td>
																		<td align="left">Almuerzo</td>
																	</tr>
																	 <tr>
																		<td>11:30 - 13:00</td>
																		<td align="left">Juegos</td>
																	</tr>
																	 <tr>
																		<td>13:00 - 13:45</td>
																		<td align="left">Concursos</td>
																	</tr>
																	 <tr>
																		<td align="center">14:00</td>
																		<td align="left">Recogida</td>
																	</tr>
																</tbody>
															</table>
														</div>

														<div class="col-12 col-lg-6 col-xl-6 mt-1 mb-1">
															<table class="table table-dark table-striped" style="width: 100%; margin: 0 auto;">
																<thead align="center">
																	<tr>
																		<th>TARDES</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>14:00 - 15:00</td>
																		<td align="left">Comida</td>
																	</tr>
																	 <tr>
																		<td>15:00 - 16:00</td>
																		<td align="left">Descanso</td>
																	</tr>
																	 <tr>
																		<td>16:00 - 17:30</td>
																		<td align="left">Entrenamiento</td>
																	</tr>
																	 <tr>
																		<td align="center">18:00</td>
																		<td align="left">Recogida</td>
																	</tr>
																</tbody>
															</table>
														</div>

														<div class="col-12">
															<p class="t-center">
																<strong>Todos los niños y niñas deberán traer almuerzo (opción A y B). Los niños y niñas que se queden el día completo (opción B) tienen la comida incluida en el precio. Llevar ropa, calzado deportivo, toalla, agua y mascarilla.</strong>
															</p>
														</div> 
													</div>                                                
												</div>
											</div>
										</div>
									</div>



									<script type="text/javascript">
										$('[name="dia1"]').change(function(){
											$("#capa1").toggle();
										});

										$('[name="dia2"]').change(function(){
											$("#capa2").toggle();
										});

										$('[name="dia3"]').change(function(){
											$("#capa3").toggle();
										});

										$('[name="dia4"]').change(function(){
											$("#capa4").toggle();
										});

										$('[name="dia5"]').change(function(){
											$("#capa5").toggle();
										});
										$('[name="dia6"]').change(function(){
											$("#capa6").toggle();
										});
										$('[name="dia7"]').change(function(){
											$("#capa7").toggle();
										});
										$('[name="dia8"]').change(function(){
											$("#capa8").toggle();
										});


										$("#radiodiassueltos").click(function(){

											if($("#radiodiassueltos").is(':checked')) {  
												$("#diassueltos").css("display", "block");
											} else {  
												$("#diassueltos").css("display", "none");
											}
										});
                                    </script>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<h4 class="section-title">Datos del niño/a:</h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>Nombre:
													<input type="text" class="form-control" name="nombre" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Apellidos:
													<input type="text" class="form-control" name="apellidos" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>Fecha de nacimiento:
													<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
                                            <div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            <label>GENERO:
                                                <select class="form-control campos-required" name="genero" id="genero" required="">
                                                    <option value="">Seleccionar opción</option>
                                                    <option value="FEMENINO">FEMENINO</option>
                                                    <option value="MASCULINO">MASCULINO</option>
                                                </select>
                                            </label>
                                        </div>
											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>DNI:
													<input type="text" class="form-control" name="dni" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>¿A qué club pertenece?
													<input type="text" class="form-control" name="club" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿Ha tenido fiebre, tos, diarrea, dificultad respiratoria durante los últimos 15 días? (Si o no)
                                                    <input type="text" class="form-control" name="sintomascovid" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? (Si o no)
                                                    <input type="text" class="form-control" name="familiarcovid" maxlength="45" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<label>¿Algún aspecto médico a destacar? (Como alergias, enfermedades, medicación..)
													<input type="text" class="form-control" name="aspectomedico" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left"><strong>Autorizo a la Dirección de la V Escuela de Navidad del Valencia Basket 2020, en caso de máxima urgencia con el consentimiento y prescripción médica a tomar las decisiones médico-quirúrgicas necesarias, si ha sido imposible mi localización.</strong></p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
                                            <div class="col-12 redimension">
                                                <h4 class="section-title">Adjuntar fotocopia SIP</h4>
                                            </div>
											<div class="col-12 redimension">
												<input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp">
											</div>

                                            <div class="col-12">
                                                <p class="t-left" style="color: red;">
                                                    <strong>* Recuerde adjuntar la fotocopia del SIP (obligatorio)<br>
                                                    (Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF) </strong>
                                                </p>
                                            </div>
										</div>
									</div>


									

									<div class="form-group">
										<div class="row mt-2">
											<div class="col-12">
												<h4 class="section-title">Datos del padre / madre / tutor:</h4>
											</div>

											<div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
												<label>Nombre:
													<input type="text" class="form-control" name="nombretutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Apellidos:
													<input type="text" class="form-control" name="apellidostutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>DNI:
													<input type="text" class="form-control" name="dnitutor" maxlength="10" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
												<label>Dirección:
													<input type="text" class="form-control" name="direccion" maxlength="45" required>
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>Número:
													<input type="text" class="form-control" name="numero" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
												<label>Piso / Esc:
													<input type="text" class="form-control" name="piso" maxlength="10">
												</label>
											</div>

											<div class="col-12 col-md-2 col-lg-2 col-xl-2">
												<label>Puerta:
													<input type="text" class="form-control" name="puerta" maxlength="10">
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>Código Postal:
													<input type="text" class="form-control" name="cp" maxlength="10" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>Provincia:
													<input type="text" class="form-control" name="provincia" maxlength="25" required>
												</label>
											</div>

											<div class="col-12 col-md-4 col-lg-4 col-xl-4">
												<label>Población:
													<input type="text" class="form-control" name="poblacion" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 col-md-5 col-lg-5 col-xl-5 redimension">
												<label>Teléfono:
													<input type="text" class="form-control" name="telefonotutor" maxlength="15" required>
												</label>
											</div>

											<div class="col-12 col-md-7 col-lg-7 col-xl-7">
												<label>Correo Electrónico:
													<input type="email" class="form-control" name="emailtutor" maxlength="45" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida</strong>
												</p>
											</div>
										</div>
									</div>


									<!-- PARTE 2 -->
									
									<div class="row">
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">Plazos y otros métodos de pago</span>
											</h3>
										</div>

										<div class="col-12">
                                            <h4 class="section-title mb-0">Pago con tarjeta:</h4>
                                            <p>Al final de esta página encontrará la opción que le redirigirá a la plataforma TPV para hacer el pago on-line.
                                                <br>
                                            </p>
											<h4 class="section-title mb-0">Ingreso bancario:</h4>
											<p>
												En la cuenta de Caixa Popular:
												<br>
												Cuenta: ES29 3159 0009 9623 3942 4422
												<br><br>
												<span style="color: red;">*</span> Al hacer el ingreso se indicará el nombre del niño/a y deberá enviarse el resguardo junto al resto de documentación (fotocopia tarjeta sanitaria/SIP) por fax al número: 96 395 68 01 o al siguiente e-mail: <a href="mailto:campus@valenciabasket.com" style="color: #eb7c00; font-weight: 600;">campus@valenciabasket.com</a>
											</p>
											<h4 class="section-title mb-0">Efectivo y entrega de documentación en mano:</h4>
											<p>Oficinas de L´Alqueria
												<br>
												Lunes a viernes de 9:30 a 14:00 y de 16:00 a 20:00.
											</p>
										</div>
									</div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 redimension">
                                                <h4 class="section-title">Adjuntar resguardo del ingreso bancario (opcional, si adjunta el resguardo seleccione el pago en oficinas al final de la página):</h4>
                                            </div>
                                            <div class="col-12 redimension">
                                                <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="resguardoingreso" aria-describedby="fileHelp">
                                            </div>

                                            
                                        </div>
                                    </div>

									<!-- PARTE 3 -->

                                    <!-- <div class="row">
                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>
                                            <div class="col-12">
                                                <h3 class="section-title mb-0"><span class="orange-text">Protocolo sanitario</span></h3>
                                            </div>

                                            <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" >
                                                    <p>He leido y cumplimentado el <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/img/Protocolo-sanitario-escuelaNavidadAlqueria2020.pdf'>protocolo sanitario</a></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>

                                    </div> -->

									<div class="row">
										<div class="col-12">
											<h3 class="section-title mb-0">
												<span class="orange-text">Política de privacidad</span>
											</h3>
											<h4 class="section-title mb-0">Consentimiento expreso e inequívoco:</h4>
										</div>
										
										<div class="col-12">  	
											<p>
												En cumplimiento de Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y garantía de los derechos digitales y el reglamento (UE) 2016/679 del parlamento europeo y del consejo de 27 de abril de 2016, se le informa que los datos personales que nos ha facilitado serán (o han sido) incorporados a un registro de actividades titularidad de FUNDACION VALENCIA BASKET 2000 Con CIF G96614474 y cuyas finalidades son; la gestión integral de nuestra escuela de baloncesto y el mantenerle informado de las próximas novedades y actividades de la Fundación.
											</p>
											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizodatos" value="si">
													<span class="checkmark"></span>	
													Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico.
												</p>
											</label>
											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si">
													<span class="checkmark"></span>	
													Acepto que  el FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB, SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)
												</p>
											</label>
											<p>
												Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de  valencia.basket@valenciabasket.com  así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es ) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.
											</p>
											<p>
												Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href="https://www.valenciabasket.com" target="_blank" style="color: #eb7c00; font-weight: 600;">www.valenciabasket.com</a>
											</p>
										</div>

										<div class="col-12">																							
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo" value="si" required>
												<p>Como padre / madre / tutor, inscribo a mi hij@ en la Escuela de Navidad 2020 de L´Alqueria del Basket y acepto las condiciones anteriormente expuestas.</p>
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
												<span>Pago en oficinas</span>
											</button>
										</div>


	                                    <div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
	                                        <button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
	                                            <span>Realizar Pago con tarjeta</span>
	                                        </button>
	                                    </div>

										<?php
										/*<div class="col-12 col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
												<span>Realizar Pago con tarjeta</span>
											</button>
										</div>*/
										?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>

			<?php require('includes/footer.php'); ?>
			<?php require('includes/cookies.php'); ?>

		</div> <!-- End Wrapper -->
			
		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>
		<!-- Load Scripts End -->

	</body>
</html>                  