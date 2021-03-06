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

    input[type=number] {
        -moz-appearance: textfield;
    }

    /* Firma para la recogida de ropa */
    canvas {
        width: 550px !important;
        height: 250px;
        background-color: #ffffff;
        border: 1px solid black;
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
                                <i class="fa fa-home" aria-hidden="true" style="margin-right: 10px;"></i><b>Escuela y
                                    Cantera 20/21</b>
                            </h2>
                        </div>

                        <div class="col-12">
                            <h4 class="section-title text-center mt-0 mb-0" style="text-transform: none;">
                                Puede ordenar las filas haciendo click en los títulos o buscar por cualquier campo de la
                                tabla.
                            </h4>
                            <form action="?r=jugadores/ExportToExcelInscripcionesCantera" method="post">
                                <button type="submit" id="export_data_inscripciones_cantera"
                                        name='export_data_inscripciones_cantera' value="Export to excel"
                                        class="btn btn-info mb-1">Exportar a Excel (Cantera)
                                </button>
                            </form>
                            <form action="?r=jugadores/ExportToExcelInscripcionesEscuela" method="post">
                                <button type="submit" id="export_data_inscripciones_cantera"
                                        name='export_data_inscripciones_cantera' value="Export to excel"
                                        class="btn btn-info mb-1">Exportar a Excel (Escuela)
                                </button>
                            </form>
                            <table id="inscripciones2021-listado-datatable"
                                   class="table table-striped table-hover w-100 mb-2 inscripciones-jornadas-deteccion"
                                   style="width: 100%;">

                                <?php echo $datos['tabla_html']; ?>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include 'includes/footer_back.php'; ?>

<!-- Modal - Editar Inscripcion -->
<div id="jugadores-editar-modal-20-21" class="modal fade in" role="dialog" aria-hidden="false" style="display: none;">
    <div class="modal-dialog" style="width: 93%;">
        <div class="modal-content">
            <form id="form_editar_inscripciones" class="boxed-form" name="contactform" method="post"
                  novalidate="novalidate">
                <div class="container-fluid">
                    <div class="row mt-1">
                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="tipodoc-editar-inscripciones" class="labelForm">Tipo documento:</label>
                            <select class="form-control inputForm valid" name="tipodoc-editar-inscripciones"
                                    id="tipodoc-editar-inscripciones" required>
                                <option value="">Seleccionar</option>
                                <option value="DNI">DNI</option>
                                <option value="NIE">NIE</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="dnijugador-editar-inscripciones" class="labelForm">Dni Jugador:</label>
                            <input type="text" style="-webkit-appearance: none;-moz-appearance: none;"
                                   class="form-control inputForm valid" id="dnijugador-editar-inscripciones"
                                   name="dnijugador-editar-inscripciones" aria-invalid="false">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="fechacad-editar-inscripciones" class="labelForm">Fecha caducidad dni:</label>
                            <input type="date" class="form-control inputForm valid" value=""
                                   id="fechacad-editar-inscripciones" name="fechacad-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="nacionalidad-editar-inscripciones" class="labelForm">Nacionalidad:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="nacionalidad-editar-inscripciones" name="nacionalidad-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div id="imagenes-guardadas" class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <img id="img-foto" class="img-responsive border pb-0"
                                 style="margin: 0 auto;border:1px solid #ddd;" width="120" req>
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="genero-editar-inscripciones" class="labelForm">Género:</label>
                            <select class="form-control inputForm valid" name="genero-editar-inscripciones"
                                    id="genero-editar-inscripciones" required>
                                <option value="">Seleccionar</option>
                                <option value="HOMBRE">HOMBRE</option>
                                <option value="MUJER">MUJER</option>
                            </select>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="nombre-editar-inscripciones" class="labelForm">Nombre:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="nombre-editar-inscripciones" name="nombre-editar-inscripciones"
                                   placeholder="Nombre" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="apellidos-editar-inscripciones" class="labelForm">Apellidos:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="apellidos-editar-inscripciones" name="apellidos-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>
                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="fechaN-editar-inscripciones" class="labelForm">Fecha Nacimiento:</label>
                            <input type="date" class="form-control inputForm valid" value=""
                                   id="fechaN-editar-inscripciones" name="fechaN-editar-inscripciones"
                                   placeholder="Correo Electrónico" aria-invalid="false">
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
                            <label for="telefjugador-editar-inscripciones" class="labelForm">Telefono:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="telefjugador-editar-inscripciones" name="telefjugador-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <label for="email-editar-inscripciones" class="labelForm">Email:</label>
                            <input type="email" class="form-control inputForm valid" value=""
                                   id="email-editar-inscripciones" name="email-editar-inscripciones" placeholder=""
                                   aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <label for="equipo-editar-inscripciones" class="labelForm">Equipo:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="equipo-editar-inscripciones" name="equipo-editar-inscripciones" placeholder="">
                        </div>


                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="direccion-editar-inscripciones" class="labelForm">Direccion:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="direccion-editar-inscripciones" name="direccion-editar-inscripciones"
                                   placeholder="Dirección" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="numero-editar-inscripciones" class="labelForm">Número:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="numero-editar-inscripciones" name="numero-editar-inscripciones" placeholder="Nº"
                                   aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="piso-editar-inscripciones" class="labelForm">Piso:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="piso-editar-inscripciones" name="piso-editar-inscripciones"
                                   placeholder="Piso/Esc.">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="puerta-editar-inscripciones" class="labelForm">Puerta:</label>
                            <input type="text" class="form-control inputForm" value="" id="puerta-editar-inscripciones"
                                   name="puerta-editar-inscripciones" placeholder="Pta.">
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="poblacion-editar-inscripciones" class="labelForm">Población:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="poblacion-editar-inscripciones" name="poblacion-editar-inscripciones"
                                   placeholder="Población" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="cp-editar-inscripciones" class="labelForm">CP:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="cp-editar-inscripciones" name="cp-editar-inscripciones" placeholder="C.Postal"
                                   aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="provincia-editar-inscripciones" class="labelForm">Provincia:</label>
                            <input type="text" class="form-control inputForm" value=""
                                   id="provincia-editar-inscripciones" name="provincia-editar-inscripciones"
                                   placeholder="Provincia">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                            <label for="pais-editar-inscripciones" class="labelForm">Pais nacimiento:</label>
                            <input type="text" class="form-control inputForm" value="" id="pais-editar-inscripciones"
                                   name="pais-editar-inscripciones" placeholder="Provincia">
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
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="nombremadre-editar-inscripciones" name="nombremadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="apellidosmadre-editar-inscripciones" class="labelForm">Apellidos madre:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="apellidosmadre-editar-inscripciones" name="apellidosmadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="dnimadre-editar-inscripciones" class="labelForm">DNI madre:</label>
                            <input type="text" style="-webkit-appearance: none;-moz-appearance: none;"
                                   class="form-control inputForm valid" id="dnimadre-editar-inscripciones"
                                   name="dnimadre-editar-inscripciones" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="tlfmadre-editar-inscripciones" class="labelForm">Telef. madre:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="tlfmadre-editar-inscripciones" name="tlfmadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="emailmadre-editar-inscripciones" class="labelForm">Email Madre:</label>
                            <input type="email" class="form-control inputForm valid" value=""
                                   id="emailmadre-editar-inscripciones" name="emailmadre-editar-inscripciones"
                                   placeholder="Telef.Madre">
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
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="nombrepadre-editar-inscripciones" name="nombrepadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="apellidospadre-editar-inscripciones" class="labelForm">Apellidos padre:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="apellidospadre-editar-inscripciones" name="apellidospadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="dnipadre-editar-inscripciones" class="labelForm">DNI padre:</label>
                            <input type="text" style="-webkit-appearance: none;-moz-appearance: none;"
                                   class="form-control inputForm valid" id="dnipadre-editar-inscripciones"
                                   name="dnipadre-editar-inscripciones" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="tlfpadre-editar-inscripciones" class="labelForm">Telef. padre:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="tlfpadre-editar-inscripciones" name="tlfpadre-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="emailpadre-editar-inscripciones" class="labelForm">Email padre:</label>
                            <input type="email" class="form-control inputForm valid" value=""
                                   id="emailpadre-editar-inscripciones" name="emailpadre-editar-inscripciones"
                                   placeholder="Telef.Madre">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-3 col-lg-2 col-xl-2">
                            <label for="talla-editar-inscripciones" class="labelForm">Talla Camiseta:</label>
                            <select class="form-control inputForm valid" value="" id="talla-editar-inscripciones"
                                    name="talla-editar-inscripciones" style="/* font-size: 14px; */"
                                    aria-invalid="false">
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
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="numeroCamiseta-editar-inscripciones" name="numeroCamiseta-editar-inscripciones"
                                   placeholder="Nº" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="hermanos-editar-inscripciones" class="labelForm">Nº de hermanos:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="hermanos-editar-inscripciones" name="hermanos-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="enelclub-editar-inscripciones" class="labelForm">Años en el club:</label>
                            <input type="number" class="form-control inputForm valid" value=""
                                   id="enelclub-editar-inscripciones" name="enelclub-editar-inscripciones"
                                   placeholder="" aria-invalid="false">
                        </div>


                        <!-- <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <label for="temporada1819-editar-inscripciones" class="labelForm">Temporada 18/19</label>
                            <input type="text" class="form-control inputForm valid" value="Sí" id="temporada1819-editar-inscripciones" name="temporada1819-editar-inscripciones" placeholder="Temporada 18/19" aria-invalid="false" disabled>
                        </div> -->
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <label for="alergias-editar-inscripciones" class="labelForm">Alergias (sólo si
                                tiene):</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="alergias-editar-inscripciones" name="alergias-editar-inscripciones"
                                   placeholder="Alergias" aria-invalid="false">
                        </div>


                        <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <label for="colegio-editar-inscripciones" class="labelForm">Colegio:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="colegio-editar-inscripciones" name="colegio-editar-inscripciones"
                                   placeholder="Alergias" aria-invalid="false">
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                            <label for="curso-editar-inscripciones" class="labelForm">Curso:</label>
                            <input type="text" class="form-control inputForm valid" value=""
                                   id="curso-editar-inscripciones" name="curso-editar-inscripciones"
                                   placeholder="Alergias" aria-invalid="false">
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
                        Domiciliación bancaria
                        <button id="validar-cuenta-bancaria" type="button" class="btn btn-primary">Validar cuenta
                            bancaria
                        </button>
                    </h4>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <label for="titular-editar-inscripciones">Titular:</label>
                        <input type="text" class="form-control inputForm valid" value=""
                               id="titular-editar-inscripciones" name="titular-editar-inscripciones"
                               placeholder="Titular" aria-invalid="false">
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
                        <label for="iban-editar-inscripciones">IBAN:</label>
                        <input type="text" minlength="4" class="form-control inputForm valid" value="ES"
                               id="iban-editar-inscripciones" name="iban-editar-inscripciones" placeholder="IBAN"
                               maxlength="4">
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
                        <label for="entidad-editar-inscripciones">Entidad:</label>
                        <input type="text" minlength="4" class="form-control inputForm valid"
                               id="entidad-editar-inscripciones" name="entidad-editar-inscripciones"
                               placeholder="Entidad" onkeydown="limit4(this);" onkeyup="limit4(this);">
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
                        <label for="oficina-editar-inscripciones">Oficina:</label>
                        <input type="text" class="form-control inputForm valid" value="" minlength="4"
                               id="oficina-editar-inscripciones" name="oficina-editar-inscripciones"
                               placeholder="Oficina" onkeydown="limit4(this);" onkeyup="limit4(this);">
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 bg-info pb-1">
                        <label for="dc-editar-inscripcione">DC:</label>
                        <input type="text" class="form-control inputForm valid" value="" minlength="2"
                               id="dc-editar-inscripciones" name="dc-editar-inscripciones" placeholder="DC"
                               onkeydown="limit2(this);" onkeyup="limit2(this);">
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-4 col-lg-4 col-xl-2 bg-info pb-1">
                        <label for="cuenta-editar-inscripcione">Cuenta:</label>
                        <input type="text" class="form-control inputForm valid" id="cuenta-editar-inscripciones"
                               name="cuenta-editar-inscripciones" placeholder="Cuenta" onkeydown="limit10(this);"
                               minlength="10" onkeyup="limit10(this);" aria-invalid="false">

                        <script type="text/javascript">
                            function limit10(element) {
                                var max_chars = 10;
                                if (element.value.length > max_chars) {
                                    element.value = element.value.substr(0, max_chars);
                                }
                            }

                            function limit4(element) {
                                var max_chars = 4;
                                if (element.value.length > max_chars) {
                                    element.value = element.value.substr(0, max_chars);
                                }
                            }

                            function limit2(element) {
                                var max_chars = 2;
                                if (element.value.length > max_chars) {
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
                        <input type="hidden" id="idInscripcion-editar-inscripciones"
                               name="idInscripcion-editar-inscripciones">
                        <input type="hidden" id="idJugador-editar-inscripciones" name="idJugador-editar-inscripciones">
                        <button type="submit" class="btn btn-empresas-activo mt-2" name="editar_inspecciones"
                                style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
                            Guardar
                        </button>
                    </div>

                    <div class="form-group col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                        <button type="button" class="btn btn-empresas-activo mt-2" data-dismiss="modal"
                                style="transform: skew(0deg); font-size: 15px; margin: 0 auto; height: 55px;">
                            Cerrar
                        </button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
<!--</div>-->


<!-- Modal - Ver licencias-->
<div id="jugadores-licencias-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 pt-0 pb-0">Licencias del jugador/a </h4>
            </div>
            <div class="modal-body">
                <div id="tallas-jugador-container" class="row">
                    <div id="tallas-jugador-mensaje" class="col-12">
                        <div class="alert alert-info">
                            Por favor, espere mientras se cargan los datos.
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-12" style="overflow: auto;">
                        <!-- <h4>Entregas realizadas: <span id="ver-entregas-contador"></span></h4> -->
                        <table id="ver-entregas-table2" class="table"></table>
                    </div>

                </div>

                <!-- Observaciones -->
                <!--  <div class="row">
                     <div class="col-12"><h4>Observaciones:</h4></div>
                     <div id="observaciones-container" class="col-12">

                     </div>
                 </div> -->

                <div class="row mt-4">
                    <!--
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
                        <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                    </div>
                    -->
                    <div class="col-12">
                        <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Ver tallas solicitadas y entregas hechas-->
<div id="jugadores-tallas-modal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:90%;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 pt-0 pb-0">Tallas del jugador/a y entregas de ropa</h4>
            </div>
            <div class="modal-body">
                <div id="tallas-jugador-container" class="row">
                    <div id="tallas-jugador-mensaje" class="col-12">
                        <div class="alert alert-info">
                            Por favor, espere mientras se cargan los datos.
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--                            <div class="col-12 col-sm-4 col-md-4">
                                                    <h4>Tallas:</h4>
                                                    <table id="tallas-jugador-table" class="table table-dark"></table>
                                                </div>-->
                    <div class="col-12" style="overflow: auto;">
                        <h4>Entregas realizadas: <span id="ver-entregas-contador"></span></h4>
                        <table id="ver-entregas-table" class="table"></table>
                    </div>

                </div>

                <!-- Observaciones -->
                <div class="row">
                    <div class="col-12"><h4>Observaciones:</h4></div>
                    <div id="observaciones-container" class="col-12">

                    </div>
                </div>

                <div class="row mt-4">
                    <!--
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
                        <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                    </div>
                    -->
                    <div class="col-12">
                        <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal - Hacer una nueva entrega -->
<div id="hacer-entregas-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mb-0 pt-0 pb-0">Nueva entrega de ropa</h4>
            </div>
            <div class="modal-body">
                <form id="hacer-entrega-form" method="post">

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5 id="hacer-entrega-nombre-jugador" class="mb-0"><b>NOMBRE DEL JUGADOR/A</b></h5>
                            <hr>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <!-- Producto 01 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="1-label" for="1-entrega-producto">Camiseta reversible:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="1-entrega-producto" class="form-control" name="1-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 02 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="2-label" for="2-entrega-producto">Pantalón reversible:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="2-entrega-producto" class="form-control" name="2-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 03 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="3-label" for="3-entrega-producto">Camiseta de juego (equipación
                                        1):</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="3-entrega-producto" class="form-control" name="3-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 04 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="4-label" for="4-entrega-producto">Camiseta básica de algodón:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="4-entrega-producto" class="form-control" name="4-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 05 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="5-label" for="5-entrega-producto">Sudadera de entreno vbc:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="5-entrega-producto" class="form-control" name="5-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 06 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="6-label" for="6-entrega-producto">Pantalón de juego (Equipación
                                        1):</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="6-entrega-producto" class="form-control" name="6-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 07 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="7-label" for="7-entrega-producto">Chaqueta chandal de paseo:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="7-entrega-producto" class="form-control" name="7-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 08 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="8-label" for="8-entrega-producto">Chaqueta polar:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="8-entrega-producto" class="form-control" name="8-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 09 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="9-label" for="9-entrega-producto">Polo de manga corta:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="9-entrega-producto" class="form-control" name="9-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 10 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="10-label" for="10-entrega-producto">Camiseta de juego (Equipación
                                        2):</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="10-entrega-producto" class="form-control" name="10-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 11 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="11-label" for="11-entrega-producto">Pantalón de juego (Equipación
                                        2):</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="11-entrega-producto" class="form-control" name="11-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Producto 12 -->
                            <div class="row mt-1">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <label id="12-label" for="12-entrega-producto">Bolsa de entrenamiento:</label>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <select id="12-entrega-producto" class="form-control" name="12-entrega-producto"
                                            required>
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Observaciones -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <label for="12-entrega-producto">Comentario / Observaciones</label>
                                    <textarea id="observaciones" class="form-control" name="observaciones"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Firma -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <hr>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <h5><b>FIRMA OBLIGATORIA:</b></h5>

                            <canvas id="pizarra"></canvas>

                            <input id="img_firma_jugador" type="hidden" name="img_firma_jugador">
                        </div>
                    </div>

                    <div class="row">
                        <!-- Botón guardar firmas -->
                        <div class="col-6 col-sm-6 col-md-6">
                            <input id="entrega-id-jugador" type="hidden">

                            <button id="entrega-submit-button" style="width: 100%;"
                                    type="submit" class="w-100 btn btn-success mt-2 mb-1 pt-1 pb-1">
                                Guardar y enviar
                            </button>
                        </div>

                        <!-- Botón limpiar firmas -->
                        <div class="col-6 col-sm-6 col-md-6">
                            <button id="limpiar" class="w-100 btn btn-danger mt-2 mb-1 pt-1 pb-1" type="button">Borrar
                                firma
                            </button>
                        </div>
                    </div>

                    <div id="hacer-entrega-form-respuesta" class="row">

                    </div>
                </form>

                <div class="row mt-4">
                    <!--
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-1">
                        <button class="btn btn-info btn-block" type="submit">Guardar cambios</button>
                    </div>
                    -->
                    <div class="col-12">
                        <button type="button" class="btn btn-secondary btn-block w-100 hacer-entrega-cerrar-modal"
                                style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
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
                            <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                    style="height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">
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
                                <input type="text" name="entidad" class="form-control" id="editar-cuenta-entidad"
                                       required>
                            </div>

                            <div class="form-row">
                                <label>OFICINA:</label>
                                <input type="text" name="oficina" class="form-control" id="editar-cuenta-oficina"
                                       required>
                            </div>

                            <div class="form-row">
                                <label>DC:</label>
                                <input type="text" name="dc" class="form-control" id="editar-cuenta-dc" required>
                            </div>

                            <div class="form-row">
                                <label>CUENTA:</label>
                                <input type="text" name="cuenta" class="form-control" id="editar-cuenta-cuenta"
                                       required>
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
                <button type="button" class="btn btn-empresas-activo" data-dismiss="modal"
                        style="transform: skew(0deg); font-size: 15px; height: 35px; margin: 0 auto auto auto;">
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
                            <input type="hidden" name="" id="pagos-trimestrales-idinscripcion-domiciliaciones" value="">
                            <input type="hidden" name="" id="pagos-trimestrales-fip" value="">
                            <input type="hidden" name="" id="pagos-trimestrales-categoria-inscripcion-domiciliaciones"
                                   value="">

                            <!---->
                            <div class="cantera-form-row">

                                <!-- RESERVA -->
                                <div>
                                    <label>RESERVA:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-reserva" required disabled>
                                </div>

                                <!-- DATOS MATRÍCULA -->
                                <div class="mt-1">
                                    <label>MATRÍCULA:</label>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-matricula" required disabled>
                                    </div>
                                </div>

                                <!-- DATOS PENDIENTE MATRÍCULA -->
                                <div class="mt-1">
                                    <label>PENDIENTE MATRÍCULA:</label>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-pendiente-matricula" required disabled>
                                    </div>

                                    <div class="col-12 col-sm-2 col-md-3 col-lg-3 col-xl-3 text-right">
                                        <label style="line-height:34px;">Matrícula pagada:</label>
                                    </div>

                                    <div class="col-12 col-sm-2 col-md-3 col-lg-63 col-xl-3">
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="pagos-pagado-pendiente-matricula">
                                            <span class="slider round"
                                                  style="margin-top:-5px;margin-bottom:5px;"></span>
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
                                            <span class="slider round"
                                                  style="margin-top:-5px;margin-bottom:5px;"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- TOTAL INSCRIPCIÓN -->
                            <div>
                                <label>TOTAL INSCRIPCIÓN:</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-total-inscripcion" required disabled>
                            </div>

                            <!-- TOTAL PENDIENTE -->
                            <div class="mt-1">
                                <label>TOTAL PENDIENTE (si procede aplicar gastos de devolución, se sumarán a
                                    parte):</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-total-pendiente-domiciliaciones" required disabled>
                            </div>

                            <hr class="mt-2">

                            <!-- DATOS GASTOS DEVOLUCION -->
                            <div class="mt-1">
                                <label>GASTOS DEVOLUCION:</label>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-devolucion" value="5.00" required disabled>
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
                                <p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en
                                    el banco.</p>
                                <p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los
                                    cambios.</p>
                            </div>

                            <div class="row mt-1">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Noviembre 2019:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-noviembre" required disabled>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="pagos-pagado-noviembre-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Enero 2020:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-enero" required disabled>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="pagos-pagado-enero">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Abril 2020:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-abril" required disabled>
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
                                <p class="mb-0">Marcando el trimestre, se incluirá en el XML de cargos correspondiente
                                    cuando este se genere.</p>
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
                                    <textarea class="form-control" id="pagos-trimestrales-comentario-general"
                                              maxlength="190"></textarea>
                                </div>
                            </div>

                            <div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>

                            <div class="row mt-2">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-1">
                                    <button class="btn btn-info btn-block" type="submit" readonly>Guardar cambios
                                    </button>
                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                            style="border: none; height: 34px; margin: 0px; width: 100%;"
                                            data-dismiss="modal">
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


<!-- MODAL DOMICILIACIONES -->
<div id="jugadores-PagosTrimestrales" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title pt-0 pb-0" id="h4">Editar Pagos Trimestrales</h4>
            </div>

            <div class="modal-body">
                <div id="modalpagostrimestrales-contenido" class="row">
                    <div class="col-12">

                        <form id="pagos-trimestrales-form-2020-2021" method="post">
                            <input type="hidden" name="" id="pagos-trimestrales-idinscripcion" value="">
                            <input type="hidden" name="" id="pagos-trimestrales-fip" value="">
                            <input type="hidden" name="" id="pagos-trimestrales-categoria-inscripcion" value="">
                            <input type="hidden" name="" id="seccionEquipo" value="">
                            <input type="hidden" name="" id="idPagoReserva" value="">
                            <input type="hidden" name="" id="idPagoMatricula" value="">
                            <input type="hidden" name="" id="idPagoTrimestre1" value="">
                            <input type="hidden" name="" id="idPagoTrimestre2" value="">
                            <input type="hidden" name="" id="idPagoTrimestre3" value="">

                            <!---->
                            <div class="cantera-form-row">

                                <!-- RESERVA -->
                                <div class="row">
                                    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                        <label>RESERVA:</label>
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-reserva-domiciliaciones-2020-2021" required>
                                    </div>
                                    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6">
                                        <label>MATRÍCULA:</label>
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-matricula-domiciliaciones-2020-2021" required>
                                    </div>
                                </div>
                                <!--gastos de devolucion-->
                                <!-- DATOS GASTOS DEVOLUCION -->
                                <div class="row mt-1">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <label>INCLUIR GASTOS DEVOLUCION MATRICULA:</label>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <label>PENDIENTE MATRÍCULA:</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-devolucion-2020-2021" value="5.00" required disabled>
                                    </div>

                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox" id="incluir-pendiente-matricula-en-xml-2020-2021">
                                            <span class="slider round"
                                                  style="margin-top:-5px;margin-bottom:5px;"></span>
                                        </label>
                                    </div>

                                    <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                                        <input type="number" min="0" step="0.01" name="" class="form-control"
                                               id="pagos-pendiente-matricula-domiciliaciones" required disabled>
                                    </div>

                                    <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 text-right">
                                        <label style="line-height:34px;">Matrícula pagada:</label>
                                    </div>

                                    <div class="col-12 col-sm-1 col-md-1 col-lg-1 col-xl-1">
                                        <label class="switch" style="margin-top:10px;">
                                            <input type="checkbox"
                                                   id="pagos-pagado-pendiente-matricula-domiciliaciones">
                                            <span class="slider round"
                                                  style="margin-top:-5px;margin-bottom:5px;"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- TOTAL INSCRIPCIÓN -->
                            <div class="row">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <label>TOTAL INSCRIPCIÓN:</label>
                                <input type="number" min="0" step="0.01" name="" class="form-control"
                                       id="pagos-total-inscripcion-domiciliaciones" required>
                                </div>
                                <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8">
                                    <label>TOTAL PENDIENTE (si procede aplicar gastos de devolución, se sumarán a
                                        parte):</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-total-pendiente" required>
                                </div>
                            </div>
                            <!-- observaciones matricula -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label style="margin-top:10px;">OBSERVACIONES MATRICULA:</label>
                                    <textarea class="form-control" id="pagos-matricula-observaciones"
                                              maxlength="190"></textarea>
                                </div>
                            </div>

                            <hr style="border-top: 3px double #8c8b8b;">

                            <!-- TRIMESTRES CON BECADOS-->
                            <div class="trimestres">
                                <h3 class="mb-0">
                                    <strong>PAGO DE TRIMESTRES</strong>
                                </h3>
                                <p class="mb-0">Cada trimestre indica la cantidad domiciliada o a domiciliar.</p>
                                <p class="mb-0">Cada trimestre indica si se ha pagado o si se ha domiciliado su pago en
                                    el banco.</p>
                                <p class="mb-0">Para registrar el pago de un trimestre, márquelo y guarde los
                                    cambios.</p>
                            </div>
                            <div class="row mt-1">
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label style="line-height:34px;">Becado:</label>
                                </div>

                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label class="switch" style="margin-top:10px;">
                                        <input type="checkbox"
                                               id="becado-noviembre">
                                        <span class="slider round"
                                              style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2 ">
                                    <label style="line-height:34px;">Becado:</label>
                                </div>

                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label class="switch" style="margin-top:10px;">
                                        <input type="checkbox"
                                               id="becado-enero">
                                        <span class="slider round"
                                              style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label style="line-height:34px;">Becado:</label>
                                </div>

                                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                    <label class="switch" style="margin-top:10px;">
                                        <input type="checkbox"
                                               id="becado-abril">
                                        <span class="slider round"
                                              style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>
                            </div>

                            <hr>

                            <div class="row mt-1">
                                <p class="mb-2 text-center">Desmarcando el trimestre, se incluirá en el XML de cargos correspondiente
                                    cuando este se genere.</p>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Noviembre 2020:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-noviembre-2020-2021" required>
                                    <h5 class="mb-0">
                                        <strong>Noviembre Pagado:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox"
                                               id="pagos-pagado-domiciliaciones-noviembre-2020-2021">
                                        <span class="slider round"
                                              style="margin-top:-5px;margin-bottom:5px;"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Enero 2021:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-enero-2020-2021" required>
                                    <h5 class="mb-0">
                                        <strong>Enero Pagado:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="pagos-pagado-domiciliaciones-enero-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label>1-15 Abril 2021:</label>
                                    <input type="number" min="0" step="0.01" name="" class="form-control"
                                           id="pagos-trimestre-abril-2020-2021" required>
                                    <h5 class="mb-0">
                                        <strong>Abril Pagado:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="pagos-pagado-domiciliaciones-abril-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <hr>
                            <!-- OBSERVACIONES PAGOS -->
                            <div class="row mt-1">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label style="margin-top:10px;">OBSERVACIONES TRIMESTRE 1:</label>
                                    <textarea class="form-control" id="pagos-trimestre1-observaciones"
                                              maxlength="190"></textarea>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label style="margin-top:10px;">OBSERVACIONES TRIMESTRE 2:</label>
                                    <textarea class="form-control" id="pagos-trimestre2-observaciones"
                                              maxlength="190"></textarea>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <label style="margin-top:10px;">OBSERVACIONES TRIMESTRE 3:</label>
                                    <textarea class="form-control" id="pagos-trimestre3-observaciones"
                                              maxlength="190"></textarea>
                                </div>
                            </div>
                            <hr style="border-top: 3px double #8c8b8b;">
                            <!-- INCLUIR PAGOS EN EL XML -->
                            <div class="trimestres">
                                <h3 class="mb-0">
                                    <strong>INCLUIR CARGO DE 5€ POR GASTOS DEVOLUCION TRIMESTRE</strong>
                                </h3>
                                <p class="mb-0">Marcando el trimestre, se añadiran 5 de recargo a ese trimestre por gastos de devolucion,
                                    se iran sumando 5€ cada vez que se pulse y se guarde.</p>
                            </div>

                            <div class="row mt-1">

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <h5 class="mb-0">
                                        <strong>Noviembre 2021:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="cargo-noviembre-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                    <h5 class="mb-0">
                                        <strong>Enero 2021:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="cargo-enero-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                                <h5 class="mb-0">
                                        <strong>Abril 2021:</strong>
                                    </h5>
                                    <label class="switch" style="margin-top: 10px;">
                                        <input type="checkbox" id="cargo-abril-2020-2021">
                                        <span class="slider round"></span>
                                    </label>
                                </div>

                                <input id="dni-titular" type="hidden" value="">
                            </div>

                            <div id="pagos-trimestrales-form-respuesta" class="form-row mt-2"></div>

                            <div id="spinner-Carga" class="text-center text-warning">Guardando Datos  <img src='../../img/spinner/spinnerDomiciliaciones.gif' /></div>

                            <div class="row mt-2">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-1" id="btn-guardar">

                                </div>

                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                    <button type="button" class="btn btn-empresas-activo btn-block w-100"
                                            style="border: none; height: 34px; margin: 0px; width: 100%;"
                                            data-dismiss="modal">
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

<!-- Modal convertir eba-->
<div class="modal fade" id="jugadores-convertirEba" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cambiar Jugador a equipo EBA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Esta usted seguro de pasar a este jugador al equipo EBA?
            </div>
            <div class="modal-footer">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-1" id="btn-guardar-EBA">

                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <button type="button" class="btn btn-empresas-activo btn-block w-100"
                            style="border: none; height: 34px; margin: 0px; width: 100%;" data-dismiss="modal">Cerrar
                    </button>
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
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-flash-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>

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
        /*******************************************
         * INICIO FIRMA ENTREGA ROPA
         ******************************************/


        /*  CANVAS FIRMA SOLICITANTE  */
        //======================================================================
        // VARIABLES
        //======================================================================
        let miCanvas = document.querySelector('#pizarra');
        let lineas = [];
        let correccionX = 0;
        let correccionY = 0;
        let pintarLinea = false;

        let posicion = miCanvas.getBoundingClientRect();
        correccionX = posicion.x;
        correccionY = posicion.y;

        miCanvas.width = 550;
        miCanvas.height = 250;

        //500 x 215

        //======================================================================
        // FUNCIONES
        //======================================================================
        // Funcion que empieza a dibujar la linea
        function empezarDibujo() {
            pintarLinea = true;
            lineas.push([]);
        };

        /**
         * Funcion dibuja la linea
         */
        function dibujarLinea(event) {
            event.preventDefault();
            if (pintarLinea) {
                let ctx = miCanvas.getContext('2d');
                // Estilos de linea
                ctx.lineJoin = ctx.lineCap = 'round';
                ctx.lineWidth = 2;
                // Color de la linea
                ctx.strokeStyle = '#000000';
                // Marca el nuevo punto
                let nuevaPosicionX = 0;
                let nuevaPosicionY = 0;
                if (event.changedTouches == undefined) {
                    // Versión ratón
                    nuevaPosicionX = event.layerX;
                    nuevaPosicionY = event.layerY;
                } else {
                    // Versión touch, pantalla tactil
                    nuevaPosicionX = event.changedTouches[0].pageX - correccionX;
                    nuevaPosicionY = event.changedTouches[0].pageY - correccionY;
                }
                // Guarda la linea
                lineas[lineas.length - 1].push({
                    x: nuevaPosicionX,
                    y: nuevaPosicionY
                });
                // Redibuja todas las lineas guardadas
                ctx.beginPath();
                lineas.forEach(function (segmento) {
                    ctx.moveTo(segmento[0].x, segmento[0].y);
                    segmento.forEach(function (punto, index) {
                        ctx.lineTo(punto.x, punto.y);
                    });
                });
                ctx.stroke();
            }
        }

        /**
         * Funcion que deja de dibujar la linea
         */
        function pararDibujar() {
            pintarLinea = false;
        }

        //======================================================================
        // EVENTOS
        //======================================================================

        // Eventos raton
        miCanvas.addEventListener('mousedown', empezarDibujo, false);
        miCanvas.addEventListener('mousemove', dibujarLinea, false);
        miCanvas.addEventListener('mouseup', pararDibujar, false);

        // Eventos pantallas táctiles
        miCanvas.addEventListener('touchstart', empezarDibujo, false);
        miCanvas.addEventListener('touchmove', dibujarLinea, false);

        $("#limpiar").on("click", function () {
            let ctx = miCanvas.getContext('2d');
            ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
            lineas.length = 0;
            $("#img_firma_jugador").val("");
        });


        // returns true if all color channels in each pixel are 0 (or "blank")
        function isCanvasBlank(canvas) {
            return !canvas.getContext('2d')
                .getImageData(0, 0, canvas.width, canvas.height).data
                .some(channel => channel !== 0);
        }

        /*******************************************
         * FIN FIRMA ENTREGA ROPA
         ******************************************/
        // Datatable
        $.fn.dataTable.moment('DD/MM/YYYY');
        $('#inscripciones2021-listado-datatable').DataTable({
            "lengthMenu": [[40, 100, -1], [40, 100, "All"]],
            "order": [[0, "desc"]],
            "dom": '<"toolbar">frtip',
            "scrollX": true,
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
            $('[data-toggle="tooltip"]').tooltip();
        });

        //  Modal Editar Inscripcion  /  Cargar modal con datos de la inscripcion del jugador (OK)
        /*$(".cargar_modal_editar_inscripcion_20_21").on("click", function () {

            alert("entra");
            //  Recuperamos el id
            var id = $(this).attr("id");
            var array_id = id.split("-");
            var form_data = {id: array_id[0]};


            $.ajax({
                type: "POST",
                url: "?r=inscripciones/MostrarModalJugador",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.response === "success") {
                        $("#imagenes-guardadas").show();

                        if (data.instancia['foto'] !== null) {
                            $("#img-foto").attr("src", "inscripciones/" + data.instancia['foto']);
                        } else {
                        }

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


                    /*} else {
                        console.log("Ha habido un problemaaa al cargar los datos.");
                    }
                },
                error: function (errorData) {
                    alert("Ha habido un problema al cargar los datosssss.");
                    console.log("error: " + errorData);
                }

            });
        });*/

        //  Validar una cuenta bancaria
        $("#validar-cuenta-bancaria").on("click", function () {
            var cuentabancaria = $("#iban-editar-inscripciones").val() +
                $("#entidad-editar-inscripciones").val() +
                $("#oficina-editar-inscripciones").val() +
                $("#dc-editar-inscripciones").val() +
                $("#cuenta-editar-inscripciones").val();

            var form_data = {
                debug: "false",
                form_id: "validar_cuenta_bancaria",
                cuentabancaria: cuentabancaria
            };

            $.ajax({
                type: "POST",
                url: "?r=ajax/dispatcher",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.alerta_cuenta != "") {
                        if (data.response == "error") {
                            $("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
                            $("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-danger offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">' + data.alerta_cuenta + '</div>');
                        } else {
                            $("#aviso-cuenta-bancaria-incorrecta").removeClass("hide");
                            $("#aviso-cuenta-bancaria-incorrecta").html('<div class="alert alert-success offset-6 col-md-6 col-lg-6 col-xl-6 bg-danger pt-1 pb-1">' + data.alerta_cuenta + '</div>');
                        }

                        $("#aviso-cuenta-bancaria-incorrecta").fadeTo(2500, 500).slideUp(500, function () {
                            $("#aviso-cuenta-bancaria-incorrecta").slideUp(500);
                            $("#aviso-cuenta-bancaria-incorrecta").html("");
                        });
                    }
                }
            });
        });

        //  Modal Editar Inscripcion /  Formulario
        $("#form_editar_inscripciones").validate(
            {
                submitHandler: function (form) {

                    //error_log(" id  jugador: ".$("#idJugador-editar-inscripciones").val());

                    var formData = new FormData();

                    formData.append("idjugador", $("#idJugador-editar-inscripciones").val());

                    formData.append("tipodoc", $("#tipodoc-editar-inscripciones").val());
                    formData.append("dnijugador", $('#dnijugador-editar-inscripciones').val());
                    formData.append("fechacaddni", $("#fechacad-editar-inscripciones").val());
                    formData.append("nacionalidad", $("#nacionalidad-editar-inscripciones").val());

                    formData.append("genero", $("#genero-editar-inscripciones").val());
                    formData.append("nombre", $('#nombre-editar-inscripciones').val());
                    formData.append("apellidos", $('#apellidos-editar-inscripciones').val());
                    formData.append("fechanac", $('#fechaN-editar-inscripciones').val());

                    formData.append("telefjugador", $('#telefjugador-editar-inscripciones').val());
                    formData.append("emailjugador", $('#email-editar-inscripciones').val());


                    formData.append("direccion", $('#direccion-editar-inscripciones').val());
                    formData.append("numero", $('#numero-editar-inscripciones').val());
                    formData.append("piso", $('#piso-editar-inscripciones').val());
                    formData.append("puerta", $('#puerta-editar-inscripciones').val());
                    formData.append("poblacion", $('#poblacion-editar-inscripciones').val());
                    formData.append("cp", $('#cp-editar-inscripciones').val());
                    formData.append("prov", $('#provincia-editar-inscripciones').val());
                    formData.append("pais", $("#pais-editar-inscripciones").val());

                    formData.append("nombremadre", $('#nombremadre-editar-inscripciones').val());
                    formData.append("apelmadre", $('#apellidosmadre-editar-inscripciones').val());
                    formData.append("dnimadre", $('#dnimadre-editar-inscripciones').val());
                    formData.append("tlfmadre", $('#tlfmadre-editar-inscripciones').val());
                    formData.append("emailmadre", $('#emailmadre-editar-inscripciones').val());

                    formData.append("nombrepadre", $('#nombrepadre-editar-inscripciones').val());
                    formData.append("apelpadre", $('#apellidospadre-editar-inscripciones').val());
                    formData.append("dnipadre", $('#dnipadre-editar-inscripciones').val());
                    formData.append("tlfpadre", $('#tlfpadre-editar-inscripciones').val());
                    formData.append("emailpadre", $('#emailpadre-editar-inscripciones').val());


                    formData.append("talla", $('#talla-editar-inscripciones').val());
                    formData.append("camiseta", $('#numeroCamiseta-editar-inscripciones').val());
                    formData.append("hermanos", $('#hermanos-editar-inscripciones').val());
                    formData.append("anyosclub", $('#enelclub-editar-inscripciones').val());


                    formData.append("alergias", $('#alergias-editar-inscripciones').val());
                    formData.append("colegio", $('#colegio-editar-inscripciones').val());
                    formData.append("curso", $('#curso-editar-inscripciones').val());


                    formData.append("titularcc", $('#titular-editar-inscripciones').val());
                    formData.append("iban", $('#iban-editar-inscripciones').val());
                    formData.append("entidad", $('#entidad-editar-inscripciones').val());
                    formData.append("oficina", $('#oficina-editar-inscripciones').val());
                    formData.append("dc", $('#dc-editar-inscripciones').val());
                    formData.append("cuenta", $('#cuenta-editar-inscripciones').val());


                    $.ajax({
                        type: "POST",
                        url: "?r=jugadores/UpdateInscripcionModalJugador",
                        data: formData,
                        processData: false,          // tell jQuery not to process the data
                        contentType: false,
                        dataType: "json",
                        success: function (data) {

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
                                setTimeout(function () {
                                    $("#jugadores-editar-modal").modal('hide')
                                }, 2000);
                            }


                        }
                    });

                }
            });


        //  Modal Ver LICENCIAS
        $('body').on('click', '.cargar_modal_licencias', function () {
            //  Recuperamos el id
            var id = $(this).attr("id");
            var array_id = id.split("-");
            var form_data = {jugadores_id: array_id[0]};

            $("#ver-entregas-mensaje").html("<div class='alert alert-info'>Por favor, espere mientras se cargan los datos.</div>");

            $.ajax({
                type: "POST",
                url: "?r=licencias/CargarLicencias",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.response === "success") {
                        if (data.observaciones !== "") {
                            $("#observaciones-container").html(data.observaciones);
                        } else {
                            $("#observaciones-container").html("-");
                        }

                        // $("#tallas-jugador-mensaje").html("");
                        //$("#tallas-jugador-mensaje").html("<div class='alert alert-success'>"+data.message+"</div>");
                        $("#ver-entregas-contador").html(data.contador_entregas);
                        $("#ver-entregas-table2").html(data.tabla_entregas);
                    } else {
                        $("#tallas-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                    }
                },
                error: function (errorData) {
                    $("#tallas-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                }
            });
        });

        //  Modal Ver tallas
        $('body').on('click', '.cargar_modal_tallas', function () {
            //  Recuperamos el id
            var id = $(this).attr("id");
            var array_id = id.split("-");
            var form_data = {jugadores_id: array_id[0]};

            $("#ver-entregas-mensaje").html("<div class='alert alert-info'>Por favor, espere mientras se cargan los datos.</div>");

            $.ajax({
                type: "POST",
                url: "?r=ropa/CargarTallasYEntregasDeRopaByIDJugador",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.response === "success") {
                        if (data.observaciones !== "") {
                            $("#observaciones-container").html(data.observaciones);
                        } else {
                            $("#observaciones-container").html("-");
                        }

                        $("#tallas-jugador-mensaje").html("");
                        //$("#tallas-jugador-mensaje").html("<div class='alert alert-success'>"+data.message+"</div>");
                        $("#ver-entregas-contador").html(data.contador_entregas);
                        $("#ver-entregas-table").html(data.tabla_entregas);
                    } else {
                        $("#tallas-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                    }
                },
                error: function (errorData) {
                    $("#tallas-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                }
            });
        });

        //  Modal Hacer nueva entrega de ropa // Cargar ID del jugador
        $('body').on('click', '.cargar_hacer_entregas', function () {
            //  Recuperamos el id
            var id = $(this).attr("id");
            var array_id = id.split("-");
            var form_data = {jugadores_id: array_id[0]};

            $.ajax({
                type: "POST",
                url: "?r=ropa/CargarDatosEntregasAnteriores",
                data: form_data,
                dataType: "json",
                success: function (data) {
                    if (data.response === "success") {
                        $("#entrega-id-jugador").val(data.id_jugador);
                        $("#hacer-entrega-nombre-jugador").html(data.nombre_jugador);
                        $("#1-label").html("Camiseta reversible: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[1] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[1] + " (" + data.tallas[1] + ")</span></small>");
                        $("#2-label").html("Pantalón reversible: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[2] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[2] + " (" + data.tallas[2] + ")</span></small>");
                        $("#3-label").html("Camiseta de juego (equipación 1): <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[3] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[3] + " (" + data.tallas[3] + ")</span></small>");
                        $("#4-label").html("Camiseta básica de algodón: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[4] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[4] + " (" + data.tallas[4] + ")</span></small>");

                        $("#5-label").html("Sudadera de entreno vbc: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[5] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[5] + " (" + data.tallas[5] + ")</span></small>");
                        $("#6-label").html("Pantalón de juego (Equipación 1): <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[6] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[6] + " (" + data.tallas[6] + ")</span></small>");
                        $("#7-label").html("Chaqueta chandal de paseo: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[7] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[7] + " (" + data.tallas[7] + ")</span></small>");
                        $("#8-label").html("Chaqueta polar: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[8] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[8] + " (" + data.tallas[8] + ")</span></small>");

                        $("#9-label").html("Polo de manga corta: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[9] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[9] + " (" + data.tallas[9] + ")</span></small>");
                        $("#10-label").html("Camiseta de juego (Equipación 2):<small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[10] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[10] + " (" + data.tallas[10] + ")</span></small>");
                        $("#11-label").html("Pantalón de juego (Equipación 2): <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[11] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[11] + " (" + data.tallas[11] + ")</span></small>");
                        $("#12-label").html("Bolsa de entrenamiento: <small><span style='color:green;'>Entregadas: " + data.uds_entregadas_ropa[12] + "</span> - <span style='color:red;'>Pendientes: " + data.uds_maximas_ropa[12] + " (" + data.tallas[12] + ")</span></small>");

                        activa_option_select_cantidades(1, data.uds_maximas_ropa[1]);
                        activa_option_select_cantidades(2, data.uds_maximas_ropa[2]);
                        activa_option_select_cantidades(3, data.uds_maximas_ropa[3]);
                        activa_option_select_cantidades(4, data.uds_maximas_ropa[4]);
                        activa_option_select_cantidades(5, data.uds_maximas_ropa[5]);
                        activa_option_select_cantidades(6, data.uds_maximas_ropa[6]);
                        activa_option_select_cantidades(7, data.uds_maximas_ropa[7]);
                        activa_option_select_cantidades(8, data.uds_maximas_ropa[8]);
                        activa_option_select_cantidades(9, data.uds_maximas_ropa[9]);
                        activa_option_select_cantidades(10, data.uds_maximas_ropa[10]);
                        activa_option_select_cantidades(11, data.uds_maximas_ropa[11]);
                        activa_option_select_cantidades(12, data.uds_maximas_ropa[12]);

                        //  Reseteamos la firma
                        let ctx = miCanvas.getContext('2d');
                        ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                        lineas.length = 0;
                        $("#img_firma_jugador").val("");
                    } else {
                        $("#ver-entregas-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                    }
                },
                error: function (errorData) {
                    $("#ver-entregas-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                }
            });
        });

        function activa_option_select_cantidades(id_producto, maximo_permitido) {
            var i;
            for (i = 4; i >= 0; i--) {
                if (maximo_permitido >= i) {
                    $('#' + id_producto + '-entrega-producto option[value="' + i + '"]').attr("disabled", false);
                } else {
                    $('#' + id_producto + '-entrega-producto option[value="' + i + '"]').attr("disabled", true);
                }
            }
        }

        /*  FORMULARIO ENTREGAR ROPA */
        $('#hacer-entrega-form').validate(
            {
                submitHandler: function () {
                    // Recogemos la firma
                    $("#img_firma_jugador").val(document.querySelector('#pizarra').toDataURL('image/png'));

                    var formData = new FormData();
                    formData.append("jugador_id", $("#entrega-id-jugador").val());
                    formData.append("cantidad_producto_01", $("#1-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_02", $("#2-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_03", $("#3-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_04", $("#4-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_05", $("#5-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_06", $("#6-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_07", $("#7-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_08", $("#8-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_09", $("#9-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_10", $("#10-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_11", $("#11-entrega-producto option:selected").val());
                    formData.append("cantidad_producto_12", $("#12-entrega-producto option:selected").val());
                    formData.append("firma", $("#img_firma_jugador").val());
                    formData.append("observaciones", $("#observaciones").val());

                    $.ajax(
                        {
                            type: "POST",
                            url: "?r=ropa/NuevaEntregaRopa",
                            data: formData,
                            processData: false,          // tell jQuery not to process the data
                            contentType: false,          // tell jQuery not to set contentType
                            dataType: "json",
                            beforeSend: function () {
                                $("#hacer-entrega-form-respuesta").html("<div class='col-12'><div class='alert alert-info'>Por favor, espere mientras se guarda la información</div></div>");
                                $("#entrega-submit-button").prop("disabled", true);
                            },
                            success: function (data) {
                                if (data.response === "success") {
                                    $("#hacer-entrega-form-respuesta").html("<div class='col-12'><div class='alert alert-info'>" + data.message + "</div></div>");
                                    $("#hacer-entrega-form-respuesta").fadeTo(10000, 500).slideUp(500, function () {
                                        $("#hacer-entrega-form-respuesta").slideUp(10000);
                                        window.location.reload(true);
                                    });
                                } else {
                                    $("#hacer-entrega-form-respuesta").html("<div class='alert alert-danger'><h4>" + data.message + "</h4></div>");

                                    //  Permito volver a enviar
                                    $("#entrega-submit-button").prop("disabled", true);
                                }
                            },
                            error: function (errorData) {
                                $("#entrega-submit-button").prop("disabled", false);
                                console.log("error ");
                            }
                        });
                }
            });


        /*  PASO 7 - FIRMAS */
        //  Oyente que se dispara al Validar firma
        /*$( "#generar_Firma" ).on( "click", function()
        {   GuardarTrazado();   });*/

        /*  Enviar el trazado */
        /*function GuardarTrazado()
        {
            $("#img_firma_jugador").val(document.querySelector('#pizarra').toDataURL('image/png') );
            //$("#img_firma_tutor").val(document.querySelector('#pizarra1').toDataURL('image/png') );
            //$("#submit-container").show();
            //$("#submit-formulario-inscripcion-escuela").prop("disabled", false);
            //$("#submit-container-recibo").hide();
        } */
    });


    //  Modal Ver datos jugadores pagos
    $('body').on('click', '.cargar_modal_pagos_jugadores', function () {
        //  Recuperamos el id
        var id = $(this).attr("id");
        var array_id = id.split("-");
        var form_data = {jugadores_id: array_id[0]};
        let sinConformacion;

        $("#ver-entregas-mensaje").html("<div class='alert alert-info'>Por favor, espere mientras se cargan los datos.</div>");

        $.ajax({
            type: "POST",
            url: "?r=jugadores/PagosJugadoresByIdJugador",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data.response === "success") {
                    if (data.pagosJugador.length > 0) {
                        sinConformacion = (data.pagosJugador[0].fecha_confirmacion_pago === null) ? "Pago no confirmado" : data.pagosJugador[0].fecha_confirmacion_pago;
                        $("#pagos-jugador-mensaje").empty();
                        $("#tabla-jugadores-pagos").html(
                            "<tr>" +
                            "<td>Numero de pedido:</td><td>" + data.pagosJugador[0].numero_pedido + "</td>" +
                            "</tr>" +
                            "<tr>" +
                            "<td>Tipo de pago:</td><td>" + data.pagosJugador[0].nombre_pago + "€</td>" +
                            "</tr>" +
                            "<tr>" +
                            "<td>Cantidad pagado:</td><td>" + data.pagosJugador[0].cantidad + "</td>" +
                            "</tr>" +
                            "<tr>" +
                            "<td>Fecha de pago:</td><td>" + data.pagosJugador[0].fecha_creacion_pago + "</td>" +
                            "</tr>" +
                            "<tr>" +
                            "<td>Fecha confirmación del pago:</td><td>" + sinConformacion + "</td>" +
                            "</tr>" +
                            "<tr>" +
                            "<td>Metodo de pago:</td><td>" + data.pagosJugador[0].metodo_pago + "</td>" +
                            "</tr>"
                        );
                    } else {
                        $("#tabla-jugadores-pagos").html("No hay pagos para mostrar de este jugador");
                    }
                } else {
                    $("#pagos-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
                }
            },
            error: function (errorData) {
                $("#pagos-jugador-mensaje").html("<div class='alert alert-danger'>Ha habido un problema al cargar los datos. Por favor, avise a TESSQ</div>");
            }
        });
    });

    function editarJugador(idJugador){
        //  Recuperamos el id
        var id = idJugador;
        var form_data = {id: id};


        $.ajax({
            type: "POST",
            url: "?r=inscripciones/MostrarModalJugador",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data.response === "success") {
                    $("#imagenes-guardadas").show();

                    if (data.instancia['foto'] !== null) {
                        $("#img-foto").attr("src", "inscripciones/" + data.instancia['foto']);
                    } else {
                    }

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


                } else {
                    console.log("Ha habido un problemaaa al cargar los datos.");
                }
            },
            error: function (errorData) {
                alert("Ha habido un problema al cargar los datosssss.");
                console.log("error: " + errorData);
            }

        });
    }

</script>
</body>
</html>