<!DOCTYPE html>
<html lang="es">
	<?php 
	 require "includes/head_back.php"; ?>

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
					<div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center bg-light ml-0 mr-0" style="background-color:#eee;">
                                <h2 class="section-title mt-0 mb-0 pt-1 pb-1" style="color: #406da4;">
                                    <b>Nombre del jugador/a (EQUIPO)</b>
                                </h2>
                            </div>

                            <div class="col-12 mt-1">
                                <!-- TABS -->
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" role="tab"
                                           id="pills-ficha-tab" href="#pills-ficha" aria-controls="pills-ficha" aria-selected="true">FICHA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" role="tab" aria-selected="true" 
                                           id="pills-licencias-tab" href="#pills-licencias" aria-controls="pills-licencias">LICENCIAS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" role="tab" aria-selected="true" 
                                           id="pills-ropa-tab" href="#pills-ropa" aria-controls="pills-ropa">ENTREGA DE ROPA</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" role="tab" aria-selected="true" 
                                           id="pills-pagos-tab" href="#pills-pagos" aria-controls="pills-pagos">PAGOS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" role="tab" aria-selected="true" 
                                           id="pills-inscripciones-tab" href="#pills-inscripciones" aria-controls="pills-inscripciones">INSCRIPCIONES</a>
                                    </li>
                                </ul>

                                <!-- CONTENIDO DE LAS TABS -->
                                <div class="tab-content" id="pills-tabContent">
                                    <!-- TAB 1. FICHA -->
                                    <div class="tab-pane fade show active" 
                                         id="pills-ficha" role="tabpanel" aria-labelledby="pills-ficha-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                Aquí ponemos la ficha de inscripcion y las opciones editar (guardar cambios)
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- TAB 2. LICENCIAS -->
                                    <div class="tab-pane fade show active" 
                                         id="pills-licencias" role="tabpanel" aria-labelledby="pills-licencias-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                Aquí listamos las licencias
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- TAB 3. ENTREGAS DE ROPA -->
                                    <div class="tab-pane fade show active" 
                                         id="pills-ropa" role="tabpanel" aria-labelledby="pills-ropa-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                Aquí vemos sus tallas y las entregas de ropa que se le han hecho
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- TAB 4 PAGOS -->
                                    <div class="tab-pane fade show active" 
                                         id="pills-pagos" role="tabpanel" aria-labelledby="pills-pagos-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12">
                                                Aquí listamos los pagos que ha hecho el jugador
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- TAB 5 INSCRIPCIONES -->
                                    <?php include "./layouts/layoutsback/layout_back_jugador_tab5_inscripciones.php";?>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include 'includes/footer_back.php';?>

		<!-- Modal - Editar Inscripcion -->
		<div id="jugadores-editar-modal" class="modal fade in" role="dialog" aria-hidden="false" style="display:none;">
			<div class="modal-dialog" style="width: 93%;">
				<div class="modal-content">
					<form id="form_editar_inscripciones" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="tipodoc-editar-inscripciones" class="labelForm">Tipo documento:</label>
									<select class="form-control inputForm valid" name="tipodoc-editar-inscripciones" id="tipodoc-editar-inscripciones" required>
                                        <option value="">Seleccionar</option>
                                        <option value="DNI">DNI</option>
                                        <option value="NIE">NIE</option>
                                        <option value="PASAPORTE">PASAPORTE</option>
                                    </select>
								</div>
								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="dnijugador-editar-inscripciones" class="labelForm">Dni Jugador:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnijugador-editar-inscripciones" name="dnijugador-editar-inscripciones" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="fechacad-editar-inscripciones" class="labelForm">Fecha caducidad dni:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fechacad-editar-inscripciones" name="fechacad-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nacionalidad-editar-inscripciones" class="labelForm">Nacionalidad:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nacionalidad-editar-inscripciones" name="nacionalidad-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								

								
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="genero-editar-inscripciones" class="labelForm">Género:</label>
										<select class="form-control inputForm valid" name="genero-editar-inscripciones" id="genero-editar-inscripciones" required>
											<option value="">Seleccionar</option>
											<option value="HOMBRE">HOMBRE</option>
											<option value="MUJER">MUJER</option>
										</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="nombre-editar-inscripciones" class="labelForm">Nombre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombre-editar-inscripciones" name="nombre-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="apellidos-editar-inscripciones" class="labelForm">Apellidos:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidos-editar-inscripciones" name="apellidos-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="fechaN-editar-inscripciones" class="labelForm">Fecha Nacimiento:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fechaN-editar-inscripciones" name="fechaN-editar-inscripciones" placeholder="Correo Electrónico" aria-invalid="false">
								</div>

								
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
									<label for="telefjugador-editar-inscripciones" class="labelForm">Telefono:</label>
									<input type="text" class="form-control inputForm valid" value="" id="telefjugador-editar-inscripciones" name="telefjugador-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="email-editar-inscripciones" class="labelForm">Email:</label>
									<input type="email" class="form-control inputForm valid" value="" id="email-editar-inscripciones" name="email-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="equipo-editar-inscripciones" class="labelForm">Equipo:</label>
									<input type="text" class="form-control inputForm valid" value="" id="equipo-editar-inscripciones" name="equipo-editar-inscripciones" placeholder="">
								</div>

								
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="direccion-editar-inscripciones" class="labelForm">Direccion:</label>
									<input type="text" class="form-control inputForm valid" value="" id="direccion-editar-inscripciones" name="direccion-editar-inscripciones" placeholder="Dirección" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="numero-editar-inscripciones" class="labelForm">Número:</label>
									<input type="text" class="form-control inputForm valid" value="" id="numero-editar-inscripciones" name="numero-editar-inscripciones" placeholder="Nº" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="piso-editar-inscripciones" class="labelForm">Piso:</label>
									<input type="number" class="form-control inputForm valid" value="" id="piso-editar-inscripciones" name="piso-editar-inscripciones" placeholder="Piso/Esc.">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="puerta-editar-inscripciones" class="labelForm">Puerta:</label>
									<input type="text" class="form-control inputForm" value="" id="puerta-editar-inscripciones" name="puerta-editar-inscripciones" placeholder="Pta.">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="poblacion-editar-inscripciones" class="labelForm">Población:</label>
									<input type="text" class="form-control inputForm valid" value="" id="poblacion-editar-inscripciones" name="poblacion-editar-inscripciones" placeholder="Población" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="cp-editar-inscripciones" class="labelForm">CP:</label>
									<input type="number" class="form-control inputForm valid" value="" id="cp-editar-inscripciones" name="cp-editar-inscripciones" placeholder="C.Postal" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="provincia-editar-inscripciones" class="labelForm">Provincia:</label>
									<input type="text" class="form-control inputForm" value="" id="provincia-editar-inscripciones" name="provincia-editar-inscripciones" placeholder="Provincia">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="pais-editar-inscripciones" class="labelForm">Pais nacimiento:</label>
									<input type="text" class="form-control inputForm" value="" id="pais-editar-inscripciones" name="pais-editar-inscripciones" placeholder="Provincia">
								</div>
								
							</div>

							<div class="clearfix"></div>


                            <div class="row">
                                <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label for="contact-name" class="control-label">Datos de la madre:</label>
                                    </br>
                                </div>

                                <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombremadre-editar-inscripciones" class="labelForm">Nombre madre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombremadre-editar-inscripciones" name="nombremadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="apellidosmadre-editar-inscripciones" class="labelForm">Apellidos madre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidosmadre-editar-inscripciones" name="apellidosmadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="dnimadre-editar-inscripciones" class="labelForm">DNI madre:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnimadre-editar-inscripciones" name="dnimadre-editar-inscripciones" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="tlfmadre-editar-inscripciones" class="labelForm">Telef. madre:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlfmadre-editar-inscripciones" name="tlfmadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="emailmadre-editar-inscripciones" class="labelForm">Email Madre:</label>
									<input type="email" class="form-control inputForm valid" value="" id="emailmadre-editar-inscripciones" name="emailmadre-editar-inscripciones" placeholder="Telef.Madre">
								</div>
                            </div>

                            <div class="clearfix"></div>


							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label for="contact-name" class="control-label">Datos del padre:</label>
                                    </br>
                                </div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombrepadre-editar-inscripciones" class="labelForm">Nombre padre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombrepadre-editar-inscripciones" name="nombrepadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="apellidospadre-editar-inscripciones" class="labelForm">Apellidos padre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidospadre-editar-inscripciones" name="apellidospadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="dnipadre-editar-inscripciones" class="labelForm">DNI padre:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnipadre-editar-inscripciones" name="dnipadre-editar-inscripciones" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="tlfpadre-editar-inscripciones" class="labelForm">Telef. padre:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlfpadre-editar-inscripciones" name="tlfpadre-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="emailpadre-editar-inscripciones" class="labelForm">Email padre:</label>
									<input type="email" class="form-control inputForm valid" value="" id="emailpadre-editar-inscripciones" name="emailpadre-editar-inscripciones" placeholder="Telef.Madre">
								</div>
							</div>

							<div class="clearfix"></div>
							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
									<label for="talla-editar-inscripciones" class="labelForm">Talla Camiseta:</label>
									<select class="form-control inputForm valid" value="" id="talla-editar-inscripciones" name="talla-editar-inscripciones" style="/* font-size: 14px; */" aria-invalid="false">
										<option value="">Seleccionar</option>
										<option value="XXS">XXS</option>
										<option value="XS">XS</option>
										<option value="S">S</option>
										<option value="M" selected>M</option>
										<option value="L">L</option>
										<option value="XL">XL</option>
										<option value="XXL">XXL</option>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
									<label for="numeroCamiseta-editar-inscripciones" class="labelForm">Nº Camiseta:</label>
									<input type="number" class="form-control inputForm valid" value="" id="numeroCamiseta-editar-inscripciones" name="numeroCamiseta-editar-inscripciones" placeholder="Nº" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="hermanos-editar-inscripciones" class="labelForm">Nº de hermanos:</label>
									<input type="number" class="form-control inputForm valid" value="" id="hermanos-editar-inscripciones" name="hermanos-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="enelclub-editar-inscripciones" class="labelForm">Años en el club:</label>
									<input type="number" class="form-control inputForm valid" value="" id="enelclub-editar-inscripciones" name="enelclub-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								

								<!-- <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
									<label for="temporada1819-editar-inscripciones" class="labelForm">Temporada 18/19</label>
									<input type="text" class="form-control inputForm valid" value="Sí" id="temporada1819-editar-inscripciones" name="temporada1819-editar-inscripciones" placeholder="Temporada 18/19" aria-invalid="false" disabled>
								</div> -->
							</div>

							<div class="clearfix"></div>

							<div class="row">
								
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="alergias-editar-inscripciones" class="labelForm">Alergias (sólo si tiene):</label>
									<input type="text" class="form-control inputForm valid" value="" id="alergias-editar-inscripciones" name="alergias-editar-inscripciones" placeholder="Alergias" aria-invalid="false">
								</div>


								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="colegio-editar-inscripciones" class="labelForm">Colegio:</label>
									<input type="text" class="form-control inputForm valid" value="" id="colegio-editar-inscripciones" name="colegio-editar-inscripciones" placeholder="Alergias" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<label for="curso-editar-inscripciones" class="labelForm">Curso:</label>
									<input type="text" class="form-control inputForm valid" value="" id="curso-editar-inscripciones" name="curso-editar-inscripciones" placeholder="Alergias" aria-invalid="false">
								</div>

								<!-- <div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
									<label for="modalidad-editar-inscripciones" class="labelForm">Equipo:</label>
									<select class="form-control inputForm valid" value="" id="modalidad-editar-inscripciones" name="modalidad-editar-inscripciones">
										<?php
											//foreach ($datos['equipos'] as $equipo) {
											//	echo "<option value='" . $equipo["ID"] . "'>" . $equipo["equipo"] . "</option>";
											//}
										?>
									</select>
								</div> -->
							</div>

							<div class="clearfix"></div>

							<div class="row">

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2" id="foto_b_1"></div>
     								<!-- <label for="curso-editar-inscripciones" class="labelForm">Foto:</label>
     	<img src="https://servicios.alqueriadelbasket.com/inscripciones/Foto-id-1196-22583783Z-PALMERO.jpg" id="foto" style='float:left; margin:15px;' width='100' height='100'/> -->
 								</div>
								
							</div>

							



							<!-- 
								Introducimos la edición de CLUB / CATEGORIA / CLUB 
								$datos['equipos_1920']      = licenciasfederacion1920_equipos::getEquipos();
								$datos['categorias_1920']   = licenciasfederacion1920_equipos::getCategorias();
								$datos['club_1920']         = licenciasfederacion1920_equipos::getClubs();
							-->
							<div class="row bg-info">
								<!-- <div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="equipo1920-editar-inscripciones" class="labelForm">Temporada 20/21. Equipo:</label>
									<select class="form-control inputForm valid" value="" id="equipo1920-editar-inscripciones" name="equipo1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										<?php
											//foreach ($datos['federacion_equipos'] as $equipo){
//echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											//}
										?>
									</select>
								</div> -->

								<!-- <div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="categoria1920-editar-inscripciones" class="labelForm">Temporada 19/20. Categoria:</label>
									<select class="form-control inputForm valid" id="categoria1920-editar-inscripciones" name="categoria1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										
										<?php
											//foreach ($datos['federacion_categorias'] as $equipo){
											   //echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											//}
										?>
									</select>
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 pt-1">
									<label for="club1920-editar-inscripciones" class="labelForm">Temporada 19/20. Club:</label>
									<select class="form-control inputForm valid" value="" id="club1920-editar-inscripciones" name="club1920-editar-inscripciones">
										<option value="">Seleccionar</option>
										<?php
											//foreach ($datos['federacion_clubs'] as $equipo){
												//echo "<option value='". strtolower(str_replace(" ","_",$equipo["ID"]))."'>" . $equipo["Nombre"] . "</option>";
											//}
										?>
									</select>
								</div> -->
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<h4 class="section-title mt-1 mb-1" style="text-align: center;">
									Domiciliación bancaria <button id="validar-cuenta-bancaria" type="button" class="btn btn-primary">Validar cuenta bancaria</button>
								</h4>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
									<label for="titular-editar-inscripciones">Titular:</label>
									<input type="text" class="form-control inputForm valid" value="" id="titular-editar-inscripciones" name="titular-editar-inscripciones" placeholder="Titular" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="iban-editar-inscripciones">IBAN:</label>
									<input type="text" minlength="4" class="form-control inputForm valid" value="ES" id="iban-editar-inscripciones" name="iban-editar-inscripciones" placeholder="IBAN" maxlength="4">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="entidad-editar-inscripciones">Entidad:</label>
									<input type="text" minlength="4" class="form-control inputForm valid" id="entidad-editar-inscripciones" name="entidad-editar-inscripciones" placeholder="Entidad" onkeydown="limit4(this);" onkeyup="limit4(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="oficina-editar-inscripciones">Oficina:</label>
									<input type="text" class="form-control inputForm valid" value="" minlength="4" id="oficina-editar-inscripciones" name="oficina-editar-inscripciones" placeholder="Oficina" onkeydown="limit4(this);" onkeyup="limit4(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
									<label for="dc-editar-inscripcione">DC:</label>
									<input type="text" class="form-control inputForm valid" value="" minlength="2" id="dc-editar-inscripciones" name="dc-editar-inscripciones" placeholder="DC" onkeydown="limit2(this);" onkeyup="limit2(this);">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 bg-info pb-1">
									<label for="cuenta-editar-inscripcione">Cuenta:</label>
									<input type="text" class="form-control inputForm valid" id="cuenta-editar-inscripciones" name="cuenta-editar-inscripciones" placeholder="Cuenta" onkeydown="limit10(this);" minlength="10" onkeyup="limit10(this);" aria-invalid="false">

									<script type="text/javascript">
										function limit10(element){
											var max_chars = 10;
											if(element.value.length > max_chars) {
												element.value = element.value.substr(0, max_chars);
											}
										}
										function limit4(element){
											var max_chars = 4;
											if(element.value.length > max_chars) {
												element.value = element.value.substr(0, max_chars);
											}
										}
										function limit2(element){
											var max_chars = 2;
											if(element.value.length > max_chars) {
												element.value = element.value.substr(0, max_chars);
											}
										}
									</script>
								</div>
							</div>
							<div id="aviso-cuenta-bancaria-incorrecta" class="row hide" style="">
							</div>

							<div class="clearfix"></div>

							<div class="row mt-1">
								<input type="hidden" value="masculino" name="categoria">

								<!-- PARTE 1 FORM - DATOS -->
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="idInscripcion-editar-inscripciones" name="idInscripcion-editar-inscripciones">
									<input type="hidden" id="idJugador-editar-inscripciones" name="idJugador-editar-inscripciones">
									<button  type="submit" class="btn btn-empresas-activo mt-2" name="editar_inspecciones" style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
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

		<!-- Modal - Dar de baja / Alta inscripcion-->
		<div id="inscripciones-dar-baja-alta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pt-0 pb-0">Estado de la inscripcion</h4>
					</div>

					<div class="modal-body">
						<form id="inscripciones-dar-baja-alta-form" method="post">
							<div class="row mt-4">
								<div class="col-12">
									<input type="hidden" name="" id="inscripciones-dar-baja-alta-form-idinscripcion" value="">
									<div class="form-row" style="margin-top: -10px; margin-bottom: 10px;">
										<h3 class="mt-0 mb-0 pb-0">Activo (naranja) o inactivo (gris)</h3>
										<label class="switch mt-0">
											<input type="checkbox" id="estado-inscripcion-alta-baja" value="">
											<span class="slider round" style="margin-top: 10px; margin-bottom: -10px;"></span>
										</label>
										<p class="mb-0" style="margin-top: 5px;"></p>
									</div>
									<div id="inscripciones-dar-baja-alta-form-respuesta"></div>
								</div>
							</div>

							<div class="row mt-4">
								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
									<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
								</div>

								<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<button type="button" class="btn btn-empresas-activo btn-block w-100" style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
										Cerrar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Editar cuenta bancaria -->
		<div id="myModalEditarCuenta" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title mb-0 pb-0">Editar cuenta bancaria</h4>
					</div>

					<div class="modal-body">
						<div id="modaleditarcuenta-contenido" class="row">
							<div class="col-12">
								<form id="editar-cuenta-form" method="post">
									<input type="hidden" name="" id="editar-cuenta-idinscripcion" value="">

									<div class="form-row">
										<label>IBAN:</label>
										<input type="text" name="iban" class="form-control" id="editar-cuenta-iban" required>
									</div>

									<div class="form-row">
										<label>ENTIDAD:</label>
										<input type="text" name="entidad" class="form-control" id="editar-cuenta-entidad" required>
									</div>

									<div class="form-row">
										<label>OFICINA:</label>
										<input type="text" name="oficina" class="form-control" id="editar-cuenta-oficina" required>
									</div>

									<div class="form-row">
										<label>DC:</label>
										<input type="text" name="dc" class="form-control" id="editar-cuenta-dc" required>
									</div>

									<div class="form-row">
										<label>CUENTA:</label>
										<input type="text" name="cuenta" class="form-control" id="editar-cuenta-cuenta" required>
									</div>

									<div class="form-row">
										<label></label>
										<button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
									</div>

									<div id="editar-cuenta-form-respuesta"></div>
								</form>
							</div>
						</div>
					</div>

					<div class="modal-footer t-center">
						<button type="button" class="btn btn-empresas-activo" data-dismiss="modal" style="transform: skew(0deg); font-size: 15px; height: 35px; margin: 0 auto auto auto;">
							Cerrar
						</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal - Editar Pagos Trimestrales -->
		<div id="myModalPagosTrimestrales" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title pt-0 pb-0">Editar Pagos Trimestrales</h4>
					</div>

					<div class="modal-body">
						<div id="modalpagostrimestrales-contenido" class="row">
							<div class="col-12">

								<form id="pagos-trimestrales-form" method="post">
									<input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
									<input type="hidden" name="" id="pagos-trimestrales-fip" value="">
									<input type="hidden" name="" id="pagos-trimestrales-categoria-inscripcion" value="">

									<!---->
									<div class="cantera-form-row">

										<!-- RESERVA -->
										<div>
											<label>RESERVA:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-reserva" required disabled>
										</div>

										<!-- DATOS MATRÍCULA -->
										<div class="mt-1">
											<label>MATRÍCULA:</label>
										</div>

										<div class="row">
											<div class="col-12">
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-matricula" required disabled>
											</div>
										</div>

										<!-- DATOS PENDIENTE MATRÍCULA -->
										<div class="mt-1">
											<label>PENDIENTE MATRÍCULA:</label>
										</div>

										<div class="row">
											<div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
												<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-pendiente-matricula" required disabled>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-3 col-xl-3 text-right">
												<label style="line-height:34px;">Matrícula pagada:</label>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-63 col-xl-3">
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="pagos-pagado-pendiente-matricula" >
													<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
												</label>
											</div>
										</div>
										
										<div class="row">
											<div class="col-12 col-sm-2 col-md-6 col-lg-6 col-xl-6">
												<label style="line-height:34px;">INCLUIR PENDIENTE MATRÍCULA EN XML:</label>
											</div>

											<div class="col-12 col-sm-2 col-md-3 col-lg-3 col-xl-3">
												<label class="switch" style="margin-top:10px;">
													<input type="checkbox" id="incluir-pendiente-matricula-en-xml">
													<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
												</label>
											</div>
										</div>
									</div>

									<!-- TOTAL INSCRIPCIÓN -->
									<div>
										<label>TOTAL INSCRIPCIÓN:</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-inscripcion" required disabled>
									</div>

									<!-- TOTAL PENDIENTE -->
									<div class="mt-1">
										<label>TOTAL PENDIENTE (si procede aplicar gastos de devolución, se sumarán a parte):</label>
										<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-total-pendiente" required disabled>
									</div>

									<hr class="mt-2">

									<!-- DATOS GASTOS DEVOLUCION -->
									<div class="mt-1">
										<label>GASTOS DEVOLUCION:</label>
									</div>

									<div class="row">
										<div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-devolucion" value="5.00" required disabled>
										</div>

										<div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
											<label class="switch" style="margin-top:10px;">
												<input type="checkbox" id="pagos-gastos-devolucion">
												<span class="slider round" style="margin-top:-5px;margin-bottom:5px;"></span>
											</label>
										</div>
									</div>

									<hr>

									<!-- TRIMESTRES -->
									<div class="trimestres">
										<h3 class="mb-0">
											<strong>PAGO DE TRIMESTRES</strong>
										</h3>
										<p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
										<p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en el banco.</p>
										<p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los cambios.</p>
									</div>

									<div class="row mt-1">
										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Noviembre 2019:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-noviembre" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-noviembre">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Enero 2020:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-enero" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-enero">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<label>1-15 Abril 2020:</label>
											<input type="number" min="0" step="0.01" name="" class="form-control" id="pagos-trimestre-abril" required disabled>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="pagos-pagado-abril">
												<span class="slider round"></span>
											</label>
										</div>
									</div>

									<hr>

									<!-- INCLUIR PAGOS EN EL XML -->
									<div class="trimestres">
										<h3 class="mb-0">
											<strong>INCLUIR CARGO EN LA GENERACIÓN DE XML</strong>
										</h3>
										<p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente cuando este se genere.</p>
									</div>

									<div class="row mt-1">
										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Noviembre 2019:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-noviembre">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Enero 2020:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-enero">
												<span class="slider round"></span>
											</label>
										</div>

										<div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
											<h5 class="mb-0">
												<strong>1-15 Abril 2020:</strong>
											</h5>
											<label class="switch" style="margin-top: 10px;">
												<input type="checkbox" id="generar-xml-abril">
												<span class="slider round"></span>
											</label>
										</div>

										<input id="dni-titular" type="hidden" value="">
									</div>

									<!-- COMENTARIO GENERAL -->
									<div class="row">
										<div class="col-12">
											<label style="margin-top:10px;">COMENTARIO GENERAL:</label>
											<textarea class="form-control" id="pagos-trimestrales-comentario-general" maxlength="190"></textarea>
										</div>
									</div>

									<div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>

									<div class="row mt-2">
										<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-1">
											<button class="btn btn-info btn-block" type="submit" readonly>Guardar cambios</button>
										</div>

										<div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
											<button type="button" class="btn btn-empresas-activo btn-block w-100" style="border: none; height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
												Cerrar
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

        <!-- Ordenar datatables por fechas -->
        <script type="text/javascript" src="backmeans/assets/js/moment.min.js"></script>
        <script type="text/javascript" src="backmeans/assets/js/datetime-moment.js"></script>
		
		<script>
			$('document').ready(function () {

			// Datatable
             $.fn.dataTable.moment('DD/MM/YYYY');
				$('#inscripciones2021-listado-datatable').DataTable({
					"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
					"order": [[0, "desc"]],
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
				});


			//  Modal Editar Inscripcion /  Formulario
			$("#form_editar_inscripciones").validate(
			{
				submitHandler: function(form)
                    {
    
                    	//error_log(" id  jugador: ".$("#idJugador-editar-inscripciones").val());
                    	
                        var formData = new FormData();

                        formData.append("idjugador",  		$("#idJugador-editar-inscripciones").val()); 
   
                        formData.append("tipodoc",  		$("#tipodoc-editar-inscripciones").val()); 
                        formData.append("dnijugador",		$('#dnijugador-editar-inscripciones').val()); 
                        formData.append("fechacaddni",  	$("#fechacad-editar-inscripciones").val());
                        formData.append("nacionalidad",  	$("#nacionalidad-editar-inscripciones").val());  
                        
                        formData.append("genero",  			$("#genero-editar-inscripciones").val());  
				        formData.append("nombre", 			$('#nombre-editar-inscripciones').val()); 
				        formData.append("apellidos", 		$('#apellidos-editar-inscripciones').val()); 	
				        formData.append("fechanac", 		$('#fechaN-editar-inscripciones').val());

				        formData.append("telefjugador", 	$('#telefjugador-editar-inscripciones').val());
				        formData.append("emailjugador", 	$('#email-editar-inscripciones').val());  



				        formData.append("direccion",		$('#direccion-editar-inscripciones').val()); 
				        formData.append("numero", 			$('#numero-editar-inscripciones').val()); 
				        formData.append("piso",				$('#piso-editar-inscripciones').val()); 
				        formData.append("puerta", 			$('#puerta-editar-inscripciones').val()); 
				       	formData.append("poblacion", 		$('#poblacion-editar-inscripciones').val()); 
				        formData.append("cp", 				$('#cp-editar-inscripciones').val()); 
				       	formData.append("prov", 			$('#provincia-editar-inscripciones').val()); 
				       	formData.append("pais",  			$("#pais-editar-inscripciones").val());

				        formData.append("nombremadre", 		$('#nombremadre-editar-inscripciones').val()); 
				        formData.append("apelmadre", 		$('#apellidosmadre-editar-inscripciones').val()); 
				        formData.append("dnimadre", 		$('#dnimadre-editar-inscripciones').val()); 
				       	formData.append("tlfmadre", 		$('#tlfmadre-editar-inscripciones').val()); 
				        formData.append("emailmadre", 		$('#emailmadre-editar-inscripciones').val()); 

				        formData.append("nombrepadre", 		$('#nombrepadre-editar-inscripciones').val()); 
				        formData.append("apelpadre", 		$('#apellidospadre-editar-inscripciones').val()); 
				        formData.append("dnipadre", 		$('#dnipadre-editar-inscripciones').val()); 
				       	formData.append("tlfpadre", 		$('#tlfpadre-editar-inscripciones').val()); 
				        formData.append("emailpadre", 		$('#emailpadre-editar-inscripciones').val()); 


				        formData.append("talla", 			$('#talla-editar-inscripciones').val()); 
				        formData.append("camiseta", 		$('#numeroCamiseta-editar-inscripciones').val()); 
				        formData.append("hermanos", 		$('#hermanos-editar-inscripciones').val()); 
				        formData.append("anyosclub", 		$('#enelclub-editar-inscripciones').val()); 


				        formData.append("alergias", 		$('#alergias-editar-inscripciones').val()); 
				        formData.append("colegio", 			$('#colegio-editar-inscripciones').val()); 
				        formData.append("curso", 			$('#curso-editar-inscripciones').val()); 


				        formData.append("titularcc", 		$('#titular-editar-inscripciones').val()); 
				        formData.append("iban", 			$('#iban-editar-inscripciones').val()); 
				        formData.append("entidad", 			$('#entidad-editar-inscripciones').val()); 
				       	formData.append("oficina", 			$('#oficina-editar-inscripciones').val()); 
				        formData.append("dc", 				$('#dc-editar-inscripciones').val());
				        formData.append("cuenta", 			$('#cuenta-editar-inscripciones').val()); 



                        $.ajax({
                                type: "POST",
                                url: "?r=jugadores/UpdateInscripcionModalJugador",
                                data: formData,
                                processData:    false,          // tell jQuery not to process the data
                            	contentType:    false, 
                                dataType: "json",
                                success: function(data){

                                    if (data["response"] === "success") {

                                        /*$("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
                                        $("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
                                        $("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
                                        $("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
                                        $("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

                                        $('#cuenta-error').remove();*/

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
                                        setTimeout(function(){ $("#jugadores-editar-modal").modal('hide') }, 2000);
                                    }

                                    
                            }
                        });
                        
                    }
			});

			//  Modal Editar Inscripcion  /  Cargar modal con datos de la inscripcion del jugador (OK)
			$( ".cargar_modal_editar_inscripcion" ).on( "click",function() 
			{

				 //  Recuperamos el id
                var id          =   $(this).attr("id");
                var array_id    =   id.split("-");
                var form_data   =   {  id: array_id[0] };


				$.ajax({
					type:       "POST",
					url:        "?r=inscripciones/MostrarModalJugador",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
                        {
                            if(data.response==="success")
                            {

                                $("#idInscripcion-editar-inscripciones").val(data.instancia['id_inscripcion']);
                                $("#idJugador-editar-inscripciones").val(data.instancia['id_jugador']);


                                $("#tipodoc-editar-inscripciones").val(data.instancia['tipo_documento']);
                                $("#dnijugador-editar-inscripciones").val(data.instancia['dni_jugador']);
                                $("#fechacad-editar-inscripciones").val(data.instancia['fecha_cad_dni']);
                                $("#nombre-editar-inscripciones").val(data.instancia['nombre']);
                                $("#apellidos-editar-inscripciones").val(data.instancia['apellidos']);
                                $("#genero-editar-inscripciones").val(data.instancia['sexo']);
                                $("#fechaN-editar-inscripciones").val(data.instancia['fecha_nacimiento']);
                                $("#telefjugador-editar-inscripciones").val(data.instancia['telefono_jugador']);
                                $("#email-editar-inscripciones").val(data.instancia['email']);
                                $("#equipo-editar-inscripciones").val(data.instancia['equipo']);
                                $("#direccion-editar-inscripciones").val(data.instancia['direccion']);
                                $("#numero-editar-inscripciones").val(data.instancia['numero']);
                                $("#piso-editar-inscripciones").val(data.instancia['piso']);
                                $("#puerta-editar-inscripciones").val(data.instancia['puerta']);
                                $("#poblacion-editar-inscripciones").val(data.instancia['poblacion']);
                                $("#cp-editar-inscripciones").val(data.instancia['codigo_postal']);
                                $("#provincia-editar-inscripciones").val(data.instancia['provincia']);
                                $("#nacionalidad-editar-inscripciones").val(data.instancia['nacionalidad']);
                                $("#pais-editar-inscripciones").val(data.instancia['pais_nacimiento']);
                               
                                
                                $("#alergias-editar-inscripciones").val(data.instancia['alergias']);
                                $("#colegio-editar-inscripciones").val(data.instancia['colegio']);
                                $("#curso-editar-inscripciones").val(data.instancia['curso']);

                                $("#talla-editar-inscripciones").val(data.instancia['talla_camiseta']);
                                $("#numeroCamiseta-editar-inscripciones").val(data.instancia['numero_camiseta']);
                                $("#hermanos-editar-inscripciones").val(data.instancia['num_hermanos']);
                                $("#enelclub-editar-inscripciones").val(data.instancia['en_el_club']);
                                
                                //datos del padre
                                $("#nombrepadre-editar-inscripciones").val(data.instancia['nombre_padre']);
                                $("#apellidospadre-editar-inscripciones").val(data.instancia['apellidos_padre']);
                                $("#dnipadre-editar-inscripciones").val(data.instancia['dni_padre']);
                                $("#tlfpadre-editar-inscripciones").val(data.instancia['telefono_padre']);
                                $("#emailpadre-editar-inscripciones").val(data.instancia['email_padre']);
                                $("#dnipadre-editar-inscripciones").val(data.instancia['dni_padre']);


                                //datos de la madre
                                $("#nombremadre-editar-inscripciones").val(data.instancia['nombre_madre']);
                                $("#apellidosmadre-editar-inscripciones").val(data.instancia['apellidos_madre']);
                                $("#dnimadre-editar-inscripciones").val(data.instancia['dni_madre']);
                                $("#tlfmadre-editar-inscripciones").val(data.instancia['telefono_madre']);
                                $("#emailmadre-editar-inscripciones").val(data.instancia['email_madre']);
                                $("#dnimadre-editar-inscripciones").val(data.instancia['dni_madre']);

                                //datos domiciliacion
                                $("#titular-editar-inscripciones").val(data.instancia['titular_banco']);
                               // $("#dnititular-editar-inscripciones").val(data.instancia['dni_titular']);
                                $("#iban-editar-inscripciones").val(data.instancia['iban']);
                                $("#entidad-editar-inscripciones").val(data.instancia['entidad']);
                                $("#oficina-editar-inscripciones").val(data.instancia['oficina']);
                                $("#dc-editar-inscripciones").val(data.instancia['dc']);
                                $("#cuenta-editar-inscripciones").val(data.instancia['cuenta']);


                               /* $("#foto_b_1").html("<img src='https://servicios.alqueriadelbasket.com/inscripciones/".data.instancia['foto']."' style='float:left; margin:15px;' width='100' height='100'/>"); */

                             /*   $("#foto_b_1").html("<img src='https://servicios.alqueriadelbasket.com/inscripciones/Foto-id-1196-22583783Z-PALMERO.jpg' id="foto" style='float:left; margin:15px;' width='100' height='100'/>");
*/
                                //var imagen = document.getElementById('#imgsip');
                               // imagen.src = 'imagen.php?img='+ data.instancia['fotocopiasip'];
                              // $("#foto").src("https://servicios.alqueriadelbasket.com/inscripciones/".data.instancia['foto']);

                               //$("#diass-editar-inscripciones").val(data.instancia['diassueltos']);


                             

                            }
                            else
                            {   alert("Ha habido un problemaaa al cargar los datos.");    }
                        },
                        error: function(errorData)
                        {
                            alert("Ha habido un problema al cargar los datosssss.");
                            console.log("error: "+errorData);
                        }
					
				});
			});






			//  Validar una cuenta bancaria 
			$( "#validar-cuenta-bancaria" ).on( "click", function() 
			{
				var cuentabancaria=$("#iban-editar-inscripciones").val()+
				$("#entidad-editar-inscripciones").val()+
				$("#oficina-editar-inscripciones").val()+
				$("#dc-editar-inscripciones").val()+
				$("#cuenta-editar-inscripciones").val();

				var form_data = {
					debug:          "false",
					form_id:        "validar_cuenta_bancaria",
					cuentabancaria:  cuentabancaria
				};

				$.ajax({
					type:       "POST",
					url:        "?r=ajax/dispatcher",
					data:       form_data,
					dataType:   "json",
					success:    function(data)
					{
						if( data.alerta_cuenta !="" )
						{
							if(data.response=="error"){
								$("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
								$("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-danger offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">'+data.alerta_cuenta+'</div>');
							}
							else{
								$("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
								$("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-success offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">'+data.alerta_cuenta+'</div>');
							}
							
							$("#aviso-cuenta-bancaria-incorrecta").fadeTo(2500, 500).slideUp(500,function() {
								$("#aviso-cuenta-bancaria-incorrecta").slideUp(500);
								$("#aviso-cuenta-bancaria-incorrecta").html("");
							});
						}
					}
				});
			});

		});
		</script>
	</body>
</html>