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
		<!-- <script src="backmeans/assets/js/jquery.js"></script> -->

		<?php
			require "includes/topbar_back.php";
			//require "includes/header_back_campus.php";
			require_once "lang/errores_tpv.php";
		?>

		<div class="canvas">
			<div id="content">
				<div id="page-content">
					<div class="page-contacts-block">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 text-center">
									<h2 class="section-title mt-0 mb-0" style="color: #406da4;">
										<i class="fa fa-sun-o" aria-hidden="true" style="margin-right:10px;"></i><strong>CAMPUS IBIZA</strong>
									</h2>
								</div>

								<div class="col-12">
									<h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
										Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la tabla.
									</h4>
									<form action="?r=campus/ExportToExcelCampusIbiza" method="post">
										<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info mb-1">Exportar a Excel</button>
									</form>
									<table id="inscripciones-campus-verano-2020-listado-datatable" class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion" style="width: 100%;">
										<thead class="table-dark">
											<tr style="cursor: pointer;">
												<th class="text-center">Fecha Inscripción</th>
												<th class="text-center">Nº Pedido</th>
												<!--<th>Género</th>-->
												<th>Nombre</th>
												<th>Apellidos</th>
												<th class="text-left">Contacto</th>
												<th class="text-center">DNI</th>
												<!--<th>Email</th>-->
												<th>Club</th>
												<th class="text-center">SIP</th>
												<th class="text-center">Pago</th>
												<th class="text-center">Importe</th>
												<th class="text-center" id="pagados">Pagado (verde)</th>
												<th class="text-center">Inscripción</th>
												<th class="text-center">Dar de baja</th>
											</tr>
										</thead>
										<tbody>
											<?php
												foreach ($datos['inscripciones'] as $inscripcion) 
                                                {
                                                    //  Si un usuario, decide no ir al TPV y quedarse en mitad del proceso por su voluntad,
                                                    //  no los sacamos en el back porque en recepcion nose aclaran y piensan que son todo errores
                                                    //  if($inscripcion['errortpv']===NULL || $inscripcion['errortpv']=="" )
                                                    //  {
                                                    //      continue;
                                                    //  }
                                                        
													$id_inscrip = $inscripcion['id'];
													$date = new DateTime($inscripcion['fecharegistro']);

													if($inscripcion['pagado'] == "1" || $inscripcion['pagado'] === 1) 
                                                    {
														$string_importe = $inscripcion['importe'];
														$tipopago = $inscripcion['tipopago'];
													}
													else
                                                    {
														$string_importe = 0;
														if ($inscripcion['tipopago'] == "ONLINE") {
														  if($inscripcion['error_tpv'] == "" || is_null($inscripcion['error_tpv'])){
																$tipopago ="ONLINE"." <span style='color:red;font-size=8;'><strong>"."(error tarjeta)"."</strong></span>";
																
															}else{
																$tipopago ="ONLINE"." <span style='color:red;font-size=8;'><strong>(". $errores[$inscripcion['error_tpv']].")</strong></span>";
														  		
															}
														}
														else{$tipopago = $inscripcion['tipopago'];}
														
													}

													// Saber la extensión para condicionar el tipo de icono a mostrar
													$valores    =   explode(".", $inscripcion['fotocopiasip']);
													$extension  =   $valores[count($valores)-1];

													if ( $inscripcion['eliminado'] != 1 ){
														echo '<tr id="'.$inscripcion['id'].'">
															<td class="text-center">'.$date->format('d/m/Y').'</td>
															<td class="text-center">'.$inscripcion['numeropedido'].'</td>
															<!--<td class="text-left">'.$inscripcion['genero'].'</td>-->
															<td class="text-left">'.$inscripcion['nombre'].'</td>
															<td class="text-left">'.$inscripcion['apellidos'].'</td>
															<td class="text-left">'.$inscripcion['telefonotutor'].'<br>'.$inscripcion['emailtutor'].'</td>
															<td class="text-center">'.$inscripcion['dni'].'</td>
															<!--<td class="text-left">'.$inscripcion['emailtutor'].'</td>-->
															<td class="text-left">'.$inscripcion['club']. '</td> 
															<td class="text-center">';

																if(false !== strpos($inscripcion['fotocopiasip'], "sipcampusibiza_vb"))
	                                                            {
	                                                                echo '<a href="'.$inscripcion['fotocopiasip'].'" target="_blank">';
	                                                            }
	                                                            else{
	                                                            	echo '<a href="https://www.valenciabasket.com/campus_ibiza/'.$inscripcion['fotocopiasip'].'" target="_blank">';
	                                                            }
																
																	if ($extension == "pdf") {
																		echo '<i class="fa fa-file-pdf-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir PDF"></i>';
																	}
																	elseif ($extension == "zip") {
																		echo '<i class="fa fa-file-zip-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Zip"></i>';
																	}
																	else {
																		echo '<i class="fa fa-file-image-o fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Abrir Imagen"></i>';
																	}
															echo '</a>
															</td>
															<td class="text-center">'.$tipopago.'</td>
															<td class="text-center">'.$string_importe.'€</td>
															<td class="text-center">
																<form method="post" action="?r=campus/ModificaPagadoCampusIbiza">';

																	if ($inscripcion['pagado'] == "1") {
																		echo '<label class="switch">
																			<input type="checkbox" name="pagado" value="1" checked>
																			<span class="slider"></span>
																		</label>';
																	}
																	else {
																		echo '<label class="switch">
																			<input type="checkbox" name="pagado" value="1">
																			<span class="slider"></span>
																		</label>';
																	}

																	echo '<input type="hidden" name="id" value="'.$inscripcion['id'].'"> 
																	<button class="btn" type="submit">Guardar</button>
																</form>
															</td>
															

															<td class="text-center" id="'. $inscripcion['id'] .'">
																
																<a id="'.$inscripcion['id'].'-editar-inscripcion" data-toggle="modal" data-target="#myModal" class="cargar_modal_editar_inscripcion">
																	<i class="fa fa-edit" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Editar Inscripción"></i>
																</a>
																
																<a href="?r=campus/ImprimirFichaCampusIbiza&numeropedido='.$inscripcion['numeropedido'].'&tipopago='.$inscripcion['tipopago'].'" target="_blank">
																	<i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
																</a>';

															/*	
                                                                
                                                            if($inscripcion['espera_turno2'])
                                                            {   echo "<span class='label label-danger'>ESPERA TURNO 1</span>";}
                                                            if($inscripcion['espera_turno3'])
                                                            {   echo "<span class='label label-danger'>ESPERA TURNO 2</span>";}
                                                            if($inscripcion['espera_turno4'])
                                                            {   echo "<span class='label label-danger'>ESPERA TURNO 3</span>";}
                                                            if($inscripcion['espera_turno5'])
                                                            {   echo "<span class='label label-danger'>ESPERA TURNO 4</span>";}
                                                            if($inscripcion['espera_turno6'])
                                                            {   echo "<span class='label label-danger'>ESPERA TURNO 5</span>";}

                                                        	*/
                                                                    
															echo '</td>

															<td class="text-center">
																<form method="post" action="?r=campus/DardeBajaCampusIbiza">';

																	echo '<input type="hidden" name="id" value="'.$inscripcion['numeropedido'].'">
																	<button class="btn baja" type="submit">Baja</button>
																</form>
															</td>
														</tr>';
													}

													
												}
											?>

											<!--  -->

											<!-- <td class="text-center">
                                                    <a href="?r=campus/ImprimirFichaCampusVerano&numeropedido='.$inscripcion['numeropedido'].'&tipopago='.$inscripcion['tipo_pago'].'" target="_blank">
                                                        <i class="fa fa-print fa-2x" style="font-size: 1.5em;" data-toggle="tooltip" data-placement="bottom" title="Generar vista para imprimir"></i>
                                                    </a>
                                                </td> -->
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
					<form id="form_editar_inscripciones_ibiza" class="boxed-form" name="contactform" method="post" novalidate="novalidate">
						<div class="container-fluid">
							<div class="row mt-1">
								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dni-editar-inscripciones" class="labelForm">DNI jugador:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dni-editar-inscripciones" name="dni-editar-inscripciones" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombre-editar-inscripciones" class="labelForm">Nombre:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombre-editar-inscripciones" name="nombre-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="apellidos-editar-inscripciones" class="labelForm">Apellidos:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidos-editar-inscripciones" name="apellidos-editar-inscripciones" placeholder="Apellidos" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="fechaN-editar-inscripciones" class="labelForm">Fecha Nacimiento:</label>
									<input type="date" class="form-control inputForm valid" value="" id="fechaN-editar-inscripciones" name="fechaN-editar-inscripciones" placeholder="" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="club-editar-inscripciones" class="labelForm">Club:</label>
									<input type="text" class="form-control inputForm valid" value="" id="club-editar-inscripciones" name="club-editar-inscripciones" placeholder="Club" aria-invalid="false">
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

								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<label for="provincia-editar-inscripciones" class="labelForm">Provincia:</label>
									<input type="text" class="form-control inputForm" value="" id="provincia-editar-inscripciones" name="provincia-editar-inscripciones" placeholder="Provincia">
								</div>
								
							</div>

							<div class="clearfix"></div>


							<div class="row">

								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="dnitutor-editar-inscripciones" class="labelForm">DNI Tutor/a:</label>
									<input type="text" style="-webkit-appearance: none;-moz-appearance: none;" class="form-control inputForm valid" id="dnitutor-editar-inscripciones" name="dnitutor-editar-inscripciones" aria-invalid="false">
								</div>
								<div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
									<label for="nombretutor-editar-inscripciones" class="labelForm">Nombre tutor/a:</label>
									<input type="text" class="form-control inputForm valid" value="" id="nombretutor-editar-inscripciones" name="nombretutor-editar-inscripciones" placeholder="Nombre tutor" aria-invalid="false">
								</div>

								<div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
									<label for="apellidostutor-editar-inscripciones" class="labelForm">Apellidos tutor/a:</label>
									<input type="text" class="form-control inputForm valid" value="" id="apellidostutor-editar-inscripciones" name="apellidostutor-editar-inscripciones" placeholder="Nombre" aria-invalid="false">
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">


								<div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<label for="tlftutor-editar-inscripciones" class="labelForm">Telef. tutor/a:</label>
									<input type="number" class="form-control inputForm valid" value="" id="tlftutor-editar-inscripciones" name="tlftutor-editar-inscripciones" placeholder="Telefono">
								</div>

								
								<div class="form-group col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<label for="emailtutor-editar-inscripciones" class="labelForm">Email:</label>
									<input type="email" class="form-control inputForm valid" value="" id="emailtutor-editar-inscripciones" name="emailtutor-editar-inscripciones" placeholder="Correo Electrónico">
								</div>

								
								
							</div>

							<div class="clearfix"></div>

							<div class="row">

								<div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<label for="tratamientosm-editar-inscripciones" class="labelForm">Tratamientos:</label>
									<input type="text" class="form-control inputForm valid" value="" id="tratamientosm-editar-inscripciones" name="tratamientosm-editar-inscripciones" placeholder="Enfermedades" aria-invalid="false">
								</div>
								
							</div>

							<div class="clearfix"></div>
							
							<div class="row">
                                

                                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" id="subepdf">
                                    <label for="contact-name" class="control-label">Sip</label>
                                    <div class="input-group">
                                       <input accept="image/png, image/jpeg, application/pdf" style="width:100%;background-color: #406da4;" type="file" class="upload" name="archivo_sip" id="archivo_sip"/> 

                                        <input type="text" name="sip-editar-inscripciones" id="sip-editar-inscripciones" class="form-control" value="" readonly>
                                        <span class="input-group-addon"><i class="fa fa-link"></i></span>


                                    </div>
                                </div>
                                
                                
                            </div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<div class="form-group">
											<div class="row">
												<div class="col-12 t-left">
													<label for="contact-name" class="control-label">Turnos:</label>
													</br>
													<label class="containerchekbox">
														<input id="turno2_manyana" type="radio" name="turno2" value="turno2_manyana">
														 1er turno Mañanas: del 3 al 8 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno2_completo" type="radio" name="turno2" value="turno2_completo">
														 1er turno Completo: del 3 al 8 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno2_pension" type="radio" name="turno2" value="turno2_pension">
														 1er turno Pension Completa: del 3 al 8 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno2_matinal" type="radio" name="turno2_matinal" value="turno2_matinal">
														 1er turno Escuela Matinal: del 3 al 8 de Agosto
													</label>
													</br>
													</br>
													</br>
                                                    <label class="containerchekbox">
														<input id="turno3_manyana" type="radio" name="turno3" value="turno3_manyana">
														<span class="checkmark"></span> 2º turno Mañanas: del 10 al 15 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno3_completo" type="radio" name="turno3" value="turno3_completo">
														<span class="checkmark"></span> 2º turno Completo: del 10 al 15 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno3_pension" type="radio" name="turno3" value="turno3_pension">
														<span class="checkmark"></span> 2º turno Pension Completo: del 10 al 15 de Agosto
													</label>
													</br>
													<label class="containerchekbox">
														<input id="turno3_matinal" type="radio" name="turno3_matinal" value="turno3_matinal">
														<span class="checkmark"></span> 2º turno Matinal: del 10 al 15 de Agosto
													</label>
													</br>
												</div>
												
											</div>
                                        
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <h5><b>En lista de espera</b></h5>
                                                    <p id="lista-espera"></p><p id="lista-espera-guion">-</p>
                                                </div>
                                            </div>
									</div>
								</div>
							</div>

							
							
							<div class="clearfix"></div>


							<div class="row mt-1">
							

								<!-- PARTE 1 FORM - DATOS -->
								<div class="form-group col-12 alert alert-success" id="mensaje-editar" style="display: none;">
									<p>Inscripción editada correctamente.</p>
								</div>
							</div>

							<div class="clearfix"></div>

							<div class="row">
								<div class="form-group col-12 col-sm-12 col-md-5 offset-md-1 col-lg-4 offset-lg-2 col-xl-3 offset-xl-3">
									<input type="hidden" id="idInscripcion-editar-inscripciones" name="idInscripcion-editar-inscripciones" >  <!-- value="798" -->
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

        <!-- Modal - Ver URL de pago: para solucionar aquellas inscripciones con incidencias -->
		<div id="modal-ver-url-pago" class="modal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="container-fluid">
                        <div id="ver-url-pago-espera" class="row mt-4 pl-2 pr-2">
                            <div class="col-12 alert alert-info">
                                <img src='img/loading.gif' style='width: 3%'> Por favor, espere mientras se cargan los datos. Gracias.
                            </div>
                        </div>
                        <div id="ver-url-pago-contenido" class="row">
                            <div class="col-12 pt-2">
                                <p style="font-size:1.5em;line-height:1.5em;">El siguiente enlace permite al padre/madre/tutor completar el pago de la inscripción en la pasarela de pago:</p>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ver-url-pago-titular" class="labelForm">Titular:</label>
                                    <input id="ver-url-pago-titular" type="text" readonly
                                           class="form-control"      name="ver-url-pago-titular">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ver-url-pago-importe" class="labelForm">Importe (€):</label>
                                    <input id="ver-url-pago-importe" type="number" readonly
                                           class="form-control"      name="ver-url-pago-importe">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="ver-url-pago-pedido" class="labelForm">Número pedido:</label>
                                    <input id="ver-url-pago-pedido" type="text" readonly
                                           class="form-control"      name="ver-url-pago-pedido">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="alert alert-info">
                                    <h5><b>Enlace a enviar:</b></h5>
                                    <p id="ver-url-pago-enlace"></p>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <hr>
                                <div class="form-group">
                                    <button id="modal-ver-url-pago-btn" type="button" class="btn btn-block" data-dismiss="modal" 
                                            style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px; background-color:black; color: white;">
                                        Cerrar
                                    </button>
                                </div>
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
		
		<script>
			$('document').ready(function()
            {
				//  Datatable
				$('#inscripciones-campus-verano-2020-listado-datatable').DataTable({
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

				//  Activar tooltips
				$(function(){
					$('[data-toggle="tooltip"]').tooltip()
				});

                //  Modal Editar Inscripcion /  Formulario
                $("#form_editar_inscripciones_ibiza").validate(
				{
					submitHandler: function(form)
					{

						

					/*	var form_data = 
                        {
							debug: "true",
							form_id: "inscripciones_editar",

							idinscripcion: $('#idInscripcion-editar-inscripciones').val(),
							dnijugador: $('#dni-editar-inscripciones').val(),
				        	nombre : $('#nombre-editar-inscripciones').val(),
				        	apellidos: $('#apellidos-editar-inscripciones').val(),
				        	//date = new DateTime($_POST["fechaN-editar-inscripciones"]);
				        	fechanac: $('#fechaN-editar-inscripciones').val(),
				        	club: $('#club-editar-inscripciones').val(),

				        	direccion: $('#direccion-editar-inscripciones').val(),
				        	numero : $('#numero-editar-inscripciones').val(),
				        	piso: $('#piso-editar-inscripciones').val(),
				        	puerta: $('#puerta-editar-inscripciones').val(),
				       	 	poblacion: $('#poblacion-editar-inscripciones').val(),
				        	cp: $('#cp-editar-inscripciones').val(),
				       		prov: $('#provincia-editar-inscripciones').val(),

				        	nombretutor : $('#nombretutor-editar-inscripciones').val(),
				        	apeltutor : $('#apellidostutor-editar-inscripciones').val(),
				        	dnitutor : $('#dnitutor-editar-inscripciones').val(),
				       		tlftutor : $('#tlftutor-editar-inscripciones').val(),
				        	email : $('#emailtutor-editar-inscripciones').val(),

				       		transporte : $('#transporte-editar-inscripciones').val(),

				        	enfermedad : $('#enfermedad-editar-inscripciones').val(),


				        	turno2: $("input[name='turno2']:checked").val(),
							turno3: $("input[name='turno3']:checked").val(),
							turno2_matinal: $("input[name='turno2_matinal']:checked").val(),
							turno3_matinal: $("input[name='turno3_matinal']:checked").val(),


							
						};  */

						
				        var formData = new FormData();
				        //var valor_sip = $('#archivo_sip')[0].files[0];
						//console.log( valor_sip );

						formData.append("idinscripcion",  	$("#idInscripcion-editar-inscripciones").val()); 
						formData.append("dnijugador",		$('#dni-editar-inscripciones').val()); 
				        formData.append("nombre", 			$('#nombre-editar-inscripciones').val()); 
				        formData.append("apellidos", 		$('#apellidos-editar-inscripciones').val()); 
				        	
				        formData.append("fechanac", 		$('#fechaN-editar-inscripciones').val()); 
				        formData.append("club", 			$('#club-editar-inscripciones').val()); 
				       // formData.append("talla", 			$('#talla-editar-inscripciones').val()); 

				        formData.append("direccion",		$('#direccion-editar-inscripciones').val()); 
				        formData.append("numero", 			$('#numero-editar-inscripciones').val()); 
				        formData.append("piso",				$('#piso-editar-inscripciones').val()); 
				        formData.append("puerta", 			$('#puerta-editar-inscripciones').val()); 
				       	formData.append("poblacion", 		$('#poblacion-editar-inscripciones').val()); 
				        formData.append("cp", 				$('#cp-editar-inscripciones').val()); 
				       	formData.append("prov", 			$('#provincia-editar-inscripciones').val()); 

				        formData.append("nombretutor", 		$('#nombretutor-editar-inscripciones').val()); 
				        formData.append("apeltutor", 		$('#apellidostutor-editar-inscripciones').val()); 
				        formData.append("dnitutor", 		$('#dnitutor-editar-inscripciones').val()); 
				       	formData.append("tlftutor", 		$('#tlftutor-editar-inscripciones').val()); 
				        formData.append("email", 			$('#emailtutor-editar-inscripciones').val()); 

				        
				        formData.append("enfermedad", 			$('#enfermedad-editar-inscripciones').val()); 

				        formData.append("transporte", 			$('#transporte-editar-inscripciones').val()); 



				        formData.append("turno2", 			$("input[name='turno2']:checked").val()),
				        formData.append("turno2_matinal",	$("input[name='turno2_matinal']:checked").val()), 

				        formData.append("turno3", 			$("input[name='turno3']:checked").val()),
				        formData.append("turno3_matinal",   $("input[name='turno3_matinal']:checked").val()), 


                       /* formData.append("turno4",           $('#turno4').prop('checked'));
                        formData.append("tipo4",            $("input[name='rsem4']:checked").val());  

                        formData.append("turno5",           $('#turno5').prop('checked'));
                        formData.append("tipo5",            $("input[name='rsem5']:checked").val());  

                         
						*/


						formData.append("sipanterior", 		$('#sip-editar-inscripciones').val());   
				        formData.append('sipnuevo',        	$('#archivo_sip')[0].files[0]); 

						$.ajax({
                            type: "POST",
                            url: "?r=campus/UpdateInscripcionModalCampusIbiza",
                            data: form_data,
                            processData:    false,          // tell jQuery not to process the data
                            contentType:    false,
                            dataType: "json",
                            success: function(data)
                            {
                                if (data["response"] === "success")
                                {
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
										setTimeout(function(){ $("#myModal").modal('hide') }, 2000);
									}
							}, error: function(eu){
								console.log("Entramos al error");
								console.log(eu.responseText);
								console.log(eu);
							}
						});
					}
				});

                //  Modal Ver URL de pago / Carga la URL que puede enviarse para que el usuario haga un pago
                $('body').on('click','.ver-url-pago',function()
                {
                    //  Borramos lo que podría estar rellenado anteriormente y la respuesta 
                    $("#ver-url-pago-espera").show(150);
                    $("#ver-url-pago-contenido").hide();
                    $("#ver-url-pago-titular").val("");
                    $("#ver-url-pago-importe").val("");
                    $("#ver-url-pago-pedido").val("");
                    $("#ver-url-pago-enlace").html("");
                    
                    //  Recuperamos el id
                    var id          =   $(this).attr("id");
                    var array_id    =   id.split("-");
                    var form_data   =   {  id: array_id[0] };

                    $.ajax({
                        type:       "POST",
                        url:        "?r=campus/MostrarModalUrlPago",
                        data:       form_data,
                        dataType:   "json",
                        success:    function(data)
                        {
                            if(data.response==="success")
                            {
                                $("#ver-url-pago-espera").hide(150);
                                $("#ver-url-pago-contenido").show(150);
                                $("#ver-url-pago-titular").val(data.instancia['nombretutor']+" "+data.instancia['apellidostutor']);
                                $("#ver-url-pago-importe").val(data.instancia['importe']);
                                $("#ver-url-pago-pedido").val(data.instancia['numeropedido']);
                                $("#ver-url-pago-enlace").html(data.url);
                            }
                            else
                            {   alert("Ha habido un problema al cargar los datos. Por favor, contacte al equipo informático.");    }
                        },
                        error: function(errorData)
                        {
                            alert("Ha habido un problema al cargar los datos. Por favor, contacte al equipo informático."); 
                            console.log("error: "+errorData);
                        }
                    });
                });
                
                //  Modal EDITAR / Cargar datos en el modal    
                $('body').on('click','.cargar_modal_editar_inscripcion',function()
                {
                    //  Borramos lo que podría estar rellenado anteriormente y la respuesta 
                    //$('#administraciones-editar-form').trigger("reset");
                    //$('#administraciones-editar-form-respuesta').html("");
                    $("#lista-espera").html(""); 
                    $("#lista-espera-guion").html("-");
                    $("#mensaje-editar").css("display", "none"); 
                    
                    //  Recuperamos el id
                    var id          =   $(this).attr("id");
                    var array_id    =   id.split("-");
                    var form_data   =   {  id: array_id[0] };

                    $.ajax({
                        type:       "POST",
                        url:        "?r=campus/MostrarModalCampusIbiza",
                        data:       form_data,
                        dataType:   "json",
                        success:    function(data)
                        {
                            if(data.response==="success")
                            {
                                $("#idInscripcion-editar-inscripciones").val(data.instancia['id']);

                                $("#dni-editar-inscripciones").val(data.instancia['dni']);
                                $("#nombre-editar-inscripciones").val(data.instancia['nombre']);
                                $("#apellidos-editar-inscripciones").val(data.instancia['apellidos']);
                                $("#fechaN-editar-inscripciones").val(data.instancia['fechanacimiento']);
                                $("#club-editar-inscripciones").val(data.instancia['club']);
                                $("#direccion-editar-inscripciones").val(data.instancia['direccion']);
                                $("#numero-editar-inscripciones").val(data.instancia['numero']);
                                $("#piso-editar-inscripciones").val(data.instancia['piso']);
                                $("#puerta-editar-inscripciones").val(data.instancia['puerta']);
                                $("#poblacion-editar-inscripciones").val(data.instancia['poblacion']);
                                $("#cp-editar-inscripciones").val(data.instancia['cp']);
                                $("#provincia-editar-inscripciones").val(data.instancia['provincia']);

                                $("#talla-editar-inscripciones").val(data.instancia['tallacamiseta']);
                                $("#transporte-editar-inscripciones").val(data.instancia['transporte']);
                                $("#alergias-editar-inscripciones").val(data.instancia['alergias']);
                                $("#enfermedad-editar-inscripciones").val(data.instancia['enfermedad']);
                                $("#tratamientosm-editar-inscripciones").val(data.instancia['tratamientosmedicos']);
                                $("#operaciones-editar-inscripciones").val(data.instancia['operacionreciente']);
                                $("#observ-editar-inscripciones").val(data.instancia['observaciones']);


                                $("#nombretutor-editar-inscripciones").val(data.instancia['nombretutor']);
                                $("#apellidostutor-editar-inscripciones").val(data.instancia['apellidostutor']);
                                $("#dnitutor-editar-inscripciones").val(data.instancia['dnitutor']);
                                $("#tlftutor-editar-inscripciones").val(data.instancia['telefonotutor']);
                                $("#emailtutor-editar-inscripciones").val(data.instancia['emailtutor']);

                                $("#sip-editar-inscripciones").val( data.instancia['fotocopiasip'] );

								//$("#turno2").val(data.instancia['turno2']);
								
								$("#turno2_manyana").attr('checked', false);
								$("#turno2_completa").attr('checked', false);
								$("#turno2_pension").attr('checked', false);
								$("#turno2_matinal").attr('checked', false);

								console.log(data.instancia['semana2']);

								if ( data.instancia['semana2'] == "sem2_manyana/matinal" || data.instancia['semana2'] == "sem2_manyana" ){
									console.log("entramos al fi");

									$("#turno2_manyana").prop('checked', true);
									if (data.instancia['semana2'] == "sem2_manyana/matinal"){
										//$("#turno2_manyana").prop('checked', false);
										$("#turno2_matinal").prop('checked', true);
									}

								} else if ( data.instancia['semana2'] == "sem2_comp/matinal" || data.instancia['semana2'] == "sem2_comp" ){
									$("#turno2_completa").prop('checked', true);
									if (data.instancia['semana2'] == "sem2_comp/matinal"){
										//$("#turno2_completa").prop('checked', false);
										$("#turno2_matinal").prop('checked', true);
									}

								}else if ( data.instancia['semana2'] == "sem2_pension/matinal" || data.instancia['semana2'] == "sem2_pension" ){
									$("#turno2_pension").prop('checked', true);
									if ( data.instancia['semana2'] == "sem2_pension/matinal" ){
										//$("#turno2_pension").prop('checked', false);
										$("#turno2_matinal").prop('checked', true);
									}

								}

								$("#turno3_manyana").attr('checked', false);
								$("#turno3_completa").attr('checked', false);
								$("#turno3_pension").attr('checked', false);
								$("#turno3_matinal").attr('checked', false);
								
								//$("#turno3").val(data.instancia['turno3']);
								if ( data.instancia['semana3'] == "sem3_manyana/matinal" || data.instancia['semana3'] == "sem3_manyana" ){
									$("#turno3_manyana").prop('checked', true);
									if (data.instancia['semana3'] == "sem3_manyana/matinal"){
										//$("#turno3_manyana").prop('checked', false);
										$("#turno3_matinal").prop('checked', true);
									}

								} else if ( data.instancia['semana3'] == "sem3_comp/matinal" || data.instancia['semana3'] == "sem3_comp" ){
									$("#turno3_completa").prop('checked', true);
									if (data.instancia['semana3'] == "sem3_comp/matinal"){
										//$("#turno3_completa").prop('checked', false);
										$("#turno3_matinal").prop('checked', true);
									}

								}else if ( data.instancia['semana3'] == "sem3_pension/matinal" || data.instancia['semana3'] == "sem3_pension" ){
									$("#turno3_pension").prop('checked', true);
									if (data.instancia['semana3'] == "sem3_pension/matinal"){
										//$("#turno3_pension").prop('checked', false);
										$("#turno3_matinal").prop('checked', true);
									}

								}

								/*
                                if (data.instancia['espera_turno2']==="1")
                                {   $("#lista-espera").append("<span>Turno 1</span><br>");   $("#lista-espera-guion").html(""); }
                                if (data.instancia['espera_turno3']==="1")
                                {   $("#lista-espera").append("<span>Turno 2</span><br>");   $("#lista-espera-guion").html(""); } 
                            	*/   
                            }
                            else
                            {   alert("Ha habido un problema al cargar los datos del formulario.");    }
                        },
                        error: function(errorData)
                        {
                            alert("Ha habido un problema al cargar los datos.");
                            console.log("error: "+errorData);
                        }
                    });
                });
            });
        </script>
	</body>
</html>