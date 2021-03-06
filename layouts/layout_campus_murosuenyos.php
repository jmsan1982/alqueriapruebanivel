<!DOCTYPE html>
<html lang="es">
	<?php require('includes/head.php'); ?>
	<link rel="stylesheet" href="css/forms.css">
	<link rel="stylesheet" href="css/parallax.css">
	<link rel="stylesheet" href="css/formus.css">

	<body class="Pages">
		<?php require('includes/header.php'); ?>

		<!-- Start Page-Content -->
		<section id="page-content" class="overflow-x-hidden margin-top-header">
			<div class="block">
				<div class="container-fluid">
					<div class="row">
						<div class="parallax col-12" style="background-image: url('img/cabecera-escuela-pascua.jpg');">
						</div>
					</div>
				</div>
			</div>

			<div class="block background-f6">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="formulariocampusverano">
								<!-- <h3 class="section-title">
									<span class="orange-text">Regístrate en la Escuela de Pascua 2021</span>
								</h3>
								<h3 class="section-title mb-0">16, 17 y 18 de marzo</h3> -->

								<div class="row">
									<!-- <div class="col-12 col-md-3 col-lg-3 col-xl-3" id="escudo">
										<img class="img-responsive" src="img/escudo-escuela-fallas.png" style="margin: 0 auto;" alt="Escudo Escuela de Fallas">
									</div> -->

									<div class="col-12 col-md-12 col-lg-12 col-xl-12" id="titulo">
										<h2 class="section-title">
											<span class="orange-text">Regístrate en el Campus Mur dels Somnis 2021</span>
										</h2>
										<h4 class="section-title">1, 2, 3 y 4 de abril</h4>
										<!-- <h3 class="section-title mb-2">4 y 5 de enero</h3> -->
									</div>
								</div>

								<form id="contactform" enctype="multipart/form-data" action="?r=campusmuro/CampusMuroForm" class="boxed-form" name="contactform" method="post">
									<!-- DÍAS A ELEGIR -->
									<div class="row">
										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
											<div class="form-group">
												<div class="row">
													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															OPCIÓN A: Sólo mañanas de 8:30 a 14:00h (70€)
															<input type="radio" name="opcion" value="manyanas" checked>
															<div class="control__indicator"></div>
														</label>
													</div>

													<div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															OPCIÓN B: Días completos de 8:30 a 18:00h (140€)
															<input type="radio" name="opcion" value="completo">
															<div class="control__indicator"></div>
														</label>
													</div>

													<!-- <div class="col-12 mb-1 t-left" style="font-size: 15px;">
														<label class="control control--radio">
															OPCIÓN C: Días sueltos 
															<input type="radio" name="opcion" value="sueltos" id="radiodiassueltos">
															<div class="control__indicator"></div>
														</label>
													</div> -->

													<!-- <div class="col-12 t-left" style="display: none;" id="diassueltos">
														<div class="row">
															<div class="col-12">
																<p>En caso de ir días sueltos seleccionar los días (Mañanas 18€, día completo 30€)</p>
															</div>
														</div>

														<div class="row">
															<div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="dia1" value="dia6">
																	<span class="checkmark"></span> Día 6 
																</label>
															</div>

															<div class="col-8 col-sm-8 col-md-8 col-lg-9 col-xl-9" id="capa1" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rdia1" value="manyana" checked> Mañana
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rdia1" value="completo"> Completo
																</label>
															</div>
														</div>

														<div class="row">
															<div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="dia2" value="dia7">
																	<span class="checkmark"></span> Día 7 
																</label>
															</div>

															<div class="col-8 col-sm-8 col-md-8 col-lg-9 col-xl-9" id="capa2" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rdia2" value="manyana" checked> Mañana
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rdia2" value="completo"> Completo
																</label>
															</div>
														</div>

														<div class="row">
															<div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="dia3" value="dia8">
																	<span class="checkmark"></span> Día 8
																</label>
															</div>

															<div class="col-8 col-sm-8 col-md-8 col-lg-9 col-xl-9" id="capa3" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rdia3" value="manyana" checked> Mañana
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rdia3" value="completo"> Completo
																</label>
															</div>
														</div>

														<div class="row">
															<div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-3 t-left">
																<label class="containerchekbox">
																	<input type="checkbox" name="dia4" value="dia9">
																	<span class="checkmark"></span> Día 9 
																</label>
															</div>

															<div class="col-8 col-sm-8 col-md-8 col-lg-9 col-xl-9" id="capa4" style="font-size: 14px; display: none;">
																<label class="radio-inline pr-1">
																	<input type="radio" name="rdia4" value="manyana" checked> Mañana
																</label>
																<label class="radio-inline">
																	 <input type="radio" name="rdia4" value="completo"> Completo
																</label>
															</div>
														</div>
													</div> -->
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

											$("#radiodiassueltos").click(function(){
												if ($("#radiodiassueltos").is(':checked')) {
													$("#diassueltos").css("display", "block");
												}
												else {
													$("#diassueltos").css("display", "none");
												}
											});
										</script>

										<!-- TABLA INFORMACIÓN -->
										<div class="col-12 col-md-6 col-lg-6 col-xl-6">
												<div class="contact-info-wrap t-center"> 
													<div class="row">
														<div class="col-12">
															<h4 class="section-title mt-0 mb-0 t-center">
																<span class="orange-text">Actividades (Nacidos entre 2003 y 2015)</span>
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
																		<td>09:00 - 11:30</td>
																		<td align="left">Entrenamiento</td>
																	</tr>
																	 <tr>
																		<td>11:30 - 11:45</td>
																		<td align="left">Almuerzo</td>
																	</tr>
																	 <tr>
																		<td>11:45 - 12:30</td>
																		<td align="left">Visita/charla</td>
																	</tr>
																	<tr>
																		<td>12:30 - 13:30</td>
																		<td align="left">Entrenamiento</td>
																	</tr>
																	<tr>
																		<td>13:30 - 14:00</td>
																		<td align="left">Concursos</td>
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
																		<td>14:15 - 15:00</td>
																		<td align="left">Comida</td>
																	</tr>
																	 <tr>
																		<td>15:00 - 16:00</td>
																		<td align="left">Descanso/charla</td>
																	</tr>
																	<tr>
																		<td>16:00 - 17:30</td>
																		<td align="left">Entrenamiento</td>
																	</tr>
																	<tr>
																		<td>17:30 - 18:00</td>
																		<td align="left">Concursos</td>
																	</tr>
																</tbody>
															</table>
														</div>

														<div class="col-12">
															<p class="t-center">
																<strong>Todos los niños y niñas deberán traer almuerzo (opción A y B). Los niños y niñas que se queden el día completo (opción B) tienen la comida incluida en el precio. Llevar ropa, calzado deportivo, toalla, agua y mascarilla.</strong>
															</p>
                                                            <p class="t-center">
                                                                <strong>Para más información puede contactar con el 615557377 o en servicios.alqueriadelbasket.com </strong> <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/documentos/Dosier-Padres-Campus-Muro-Alqueria.pdf'>Ver dosier informativo</a>
                                                            </p>
														</div> 
													</div>                                                
												</div>
											</div>
									</div>

									<!-- DATOS PARTICIPANTE -->
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

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
												<label>Fecha de nacimiento:
													<input type="date" class="form-control" style="color: #5c5c5c !important;" id="fecha" name="fechanacimiento" required>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="form-group col-12 col-md-3 col-lg-3 col-xl-3">
                                            	<label>Género:
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
                                                    <input type="text" class="form-control" name="sintomascovid" maxlength="2" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿Alguno de tus convivientes ha sido diagnosticado de coronavirus este último mes? (Si o no)
                                                    <input type="text" class="form-control" name="familiarcovid" maxlength="2" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<label>¿Algún aspecto médico a tener en cuenta? (Medicación, alergias, enfermedades...)
													<textarea class="form-control" style="height: 85px; resize: none;" name="observaciones"></textarea>
												</label>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12">
												<p class="t-left">
													<strong>Autorizo a la Dirección del Campus Mur dels Somnis de L'Alqueria del Basket, en caso de máxima urgencia con el consentimiento y prescripción médica a tomar las decisiones médico-quirúrgicas necesarias, si ha sido imposible mi localización.</strong>
												</p>
											</div>
										</div>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-12 redimension">
												<input type="file" id="fileName" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp" accept="image/gif,image/jpeg,image/jpg,image/png,image/bmp,application/pdf" required onchange="validateFileType()">
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>
														* Recuerde adjuntar la fotocopia de la Tarjeta Sanitaria o seguro médico.<br>
														(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)
													</strong>
												</p>
											</div>
										</div>
									</div>

									<!-- DATOS TUTOR -->
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

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
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

											<div class="col-12 col-md-2 col-lg-2 col-xl-2 redimension">
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

											<div class="col-12 col-md-4 col-lg-4 col-xl-4 redimension">
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

											<div class="col-12 col-md-7 col-lg-7 col-xl-7 redimension">
												<label>Correo Electrónico:
													<input type="email" class="form-control" name="emailtutor" maxlength="45" required>
												</label>
											</div>

											<div class="col-12">
												<p class="t-left" style="color: red;">
													<strong>Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida.</strong>
												</p>
											</div>
										</div>
									</div>

									<div class="row">

                                        <div class="col-12 col-lg-12 col-xl-12">
                                            <hr style="color:black;border:1px solid #ccc;">
                                        </div>
                                        <div class="col-12">
                                            <h3 class="section-title mb-0"><span class="orange-text">Protocolo sanitario </span></h3>
                                        </div>    


                                        <!-- PROTOCOLO SANITARIO -->
                                        <div class="col-12">
                                            <label class="containerchekbox">
                                                <input type="checkbox" name="autorizo" value="si" required class="input-control-dni" >
                                                <p>He leido y cumplimentado el <a target='_blank' style='color:black;text-decoration:underline;' href='https://servicios.alqueriadelbasket.com/documentos/Protocolo-Sanitario-Campus-Muro-de-los-Sueños.pdf'>protocolo sanitario</a></p>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>

                                           <!--  <div class="col-12">
                                                <label class="containerchekbox">
                                                    <input type="checkbox" name="autorizo-pago" value="si" required class="input-control-dni" >
                                                    <p><?php //echo $lang["condiciones_legales_2020_2"];?></p>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                             -->

                                            <div class="col-12 col-lg-12 col-xl-12">
                                                <hr style="color:black;border:1px solid #ccc;">
                                            </div>
                                    
                                    </div>

                                    <!-- metodos de pago -->
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
                                            <h4 class="section-title mb-0">Efectivo y entrega de documentación en mano:</h4>
                                            <p>Inscripción en oficinas de L´Alqueria
                                                <br>
                                                Lunes a viernes de 9:30 a 14:00 y de 16:00 a 20:00.
                                            </p>
											<h4 class="section-title mb-0">Ingreso bancario:</h4>
											<p>
												En la cuenta de Caixa Popular:
												<br>
												Cuenta: ES29 3159 0009 9623 3942 4422
												<br><br>
												<!-- <span style="color: red;">*</span> Al hacer el ingreso se indicará el nombre del niño/a y deberá enviarse el resguardo junto al resto de documentación (fotocopia tarjeta sanitaria/SIP) por fax al número: 96 395 68 01 o al siguiente e-mail: <a href="mailto:campus@valenciabasket.com" style="color: #eb7c00; font-weight: 600;">campus@valenciabasket.com</a> -->
											</p>
											
										</div>
									</div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-12 redimension">
                                                <h4 class="section-title">Adjuntar resguardo del ingreso bancario (opcional, si adjunta el resguardo seleccione el pago: Inscrpción con ingreso bancario):</h4>
                                            </div>
                                            <div class="col-12 redimension">
                                                <input type="file" class="form-control" style="border: none !important; padding: 0 !important;" name="resguardoingreso" aria-describedby="fileHelp">
                                            </div>
                                            <div class="col-12">
                                                <p class="t-left" style="color: red;">
                                                    <strong>
                                                    (Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF) </strong>
                                                </p>
                                            </div>

                                            
                                        </div>
                                    </div>

									<!-- POLÍTICAS Y TÉRMINOS -->
									<div class="row">
										<?php require('includes/politica_cancelacion.php'); ?>

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
													<input type="checkbox" name="autorizodatos" value="si" required>
													<span class="checkmark"></span> 
													Acepto que FUNDACIÓ VALENCIA BASQUET 2000 comunique los datos facilitados a VALENCIA BASKET CLUB SAD para que me mantenga informado sobre productos, servicios o promociones relacionadas con el sector del baloncesto que pudieran ser de mi interés por cualquier medio, incluido el electrónico.
												</p>
											</label>

											<label class="containerchekbox">
												<p>
													<input type="checkbox" name="autorizoimagen" value="si" required>
													<span class="checkmark"></span> 
													Acepto que FUNDACIÓ VALENCIA BASQUET 2000 trate la imagen del participante en la actividad, parcial o total, en cualquier soporte grafico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros de la FUNDACIÓ VALENCIA BASQUET 2000 y/o el VALENCIA BASKET CLUB SAD (web, folletos, revistas del club, campeonatos, redes sociales, etc.)
												</p>
											</label>

											<p>
												Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, <a href="https://www.alqueriadelbasket.com/?r=index/politicacancelacion&idioma=cas" target="_blank" style="font-weight: bold; color: #eb7c00;">cancelación</a> y, en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: BOMBER RAMON DUART, S/N, 46013, VALENCIA o a través de valencia.basket@valenciabasket.com así como reclamar ante la Agencia Española de Protección de Datos (www.agpd.es) cuando el interesado considere que VALENCIA BASKET CLUB SAD ha vulnerado los derechos que le son reconocidos por la normativa aplicable en protección de datos.
											</p>

											<p>
												Si desea ampliar más información sobre nuestra política de privacidad entre en nuestra web <a href="https://www.alqueriadelbasket.com/" target="_blank" style="color: #eb7c00; font-weight: 600;">www.alqueriadelbasket.com</a>
											</p>
										</div>

										<div class="col-12 mt-1 mb-1">
											<label class="containerchekbox">
												<input type="checkbox" name="autorizo" value="si" required>
												<p>Como madre / padre / tutor, inscribo a mi hij@ en el Campus Mur dels Somnis de L'Alqueria del Basket y acepto las condiciones anteriormente expuestas.</p>
												<span class="checkmark"></span>
											</label>
										</div>                                    

										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="oficina" name="enviar" value="oficina">
												<span>Inscrpción con ingreso bancario</span>
											</button>
											
										</div> 

										<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
											<button type="submit" class="btn btn-link-w w-100" style="width: 100%; margin-left: 0;" id="tarjeta" name="enviar" value="tarjeta">
												<span>Realizar Pago con tarjeta</span>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</section>

		<?php require('includes/footer.php'); ?>
		<?php require('includes/cookies.php'); ?>

		<!-- Load Scripts Start -->
		<script src="js/libs.js"></script>
		<script src="js/common.js"></script>

		<script>
			// Comprobamos las extensiones de imágenes que permitimos al subir un archivo.
			// Si no están permitidas se deshabilitan los botones de submit.
			function validateFileType() {
				var fileName = document.getElementById("fileName").value;
				var idxDot = fileName.lastIndexOf(".") + 1;
				var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

				if (extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="pdf" || extFile=="gif" || extFile=="bmp") {
					$("#tarjeta").prop('disabled', false);
					$("#oficina").prop('disabled', false);

					$("#tarjeta").addClass("btn-link-w");
					$("#tarjeta").addClass("w-100");

					$("#oficina").addClass("btn-link-w");
					$("#oficina").addClass("w-100");
				}
				else {
					alert("¡El formulario se ha bloqueado! \nVuelva a intentar subir un archivo de imagen o PDF válido. \n(Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)");
					$("#tarjeta").prop('disabled', true);
					$("#oficina").prop('disabled', true);

					$("#tarjeta").removeClass("btn-link-w");
					$("#tarjeta").removeClass("w-100");

					$("#oficina").removeClass("btn-link-w");
					$("#oficina").removeClass("w-100");
				}   
			}
		</script>
		<!-- Load Scripts End -->        

	</body>
</html>