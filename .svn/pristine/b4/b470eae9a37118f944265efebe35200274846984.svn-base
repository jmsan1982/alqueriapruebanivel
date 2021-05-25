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
        
        /* Firma para la recogida de ropa */
        canvas{
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
						<div class="container">
                            <form id="hacer-entrega-form">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <h2 class="section-title mt-2 mb-0" style="color: #406da4;">
                                            <a href="index.php?r=jugadores/Listar" class="btn btn-primary">Volver al listado</a> <b>Nueva entrega de ropa</b>
                                        </h2>
                                    </div>

                                    <div class="col-12">
                                        <h4 id="hacer-entrega-nombre-jugador" class="section-title text-center mt-0 mb-0" style="text-transform: none;">
                                            Jugador/a: <?php echo $datos["jugador"]["nombre"]." ".$datos["jugador"]["apellidos"];?>
                                        </h4>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <!-- Producto 01 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="1-label" for="1-entrega-producto">Camiseta reversible: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][1];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][1];?> (<?php echo $datos["tallas"][1];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][1])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="1-entrega-producto" class="form-control" name="1-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][1]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 02 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="2-label" for="2-entrega-producto">Pantalón reversible: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][2];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][2];?> (<?php echo $datos["tallas"][2];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][2])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="2-entrega-producto" class="form-control" name="2-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][2]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 03 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="3-label" for="3-entrega-producto">Camiseta de juego (equipación 1): <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][3];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][3];?> (<?php echo $datos["tallas"][3];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][3])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="3-entrega-producto" class="form-control" name="3-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][3]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 04 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="4-label" for="4-entrega-producto">Camiseta básica de algodón: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][4];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][4];?> (<?php echo $datos["tallas"][4];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][4])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="4-entrega-producto" class="form-control" name="4-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][4]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 05 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="5-label" for="5-entrega-producto">Sudadera de entreno vbc: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][5];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][5];?> (<?php echo $datos["tallas"][5];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][5])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="5-entrega-producto" class="form-control" name="5-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][5]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 06 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="6-label" for="6-entrega-producto">Pantalón de juego (Equipación 1): <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][6];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][6];?> (<?php echo $datos["tallas"][6];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][6])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="6-entrega-producto" class="form-control" name="6-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][6]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 07 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="7-label" for="7-entrega-producto">Chaqueta chandal de paseo: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][7];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][7];?> (<?php echo $datos["tallas"][7];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][7])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="7-entrega-producto" class="form-control" name="7-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][7]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 08 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="8-label" for="8-entrega-producto">Chaqueta polar: <small>
                                                        <span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][8];?></span> - 
                                                        <span style='color:red;'>Pendientes: <?php if($datos["tallas"][8]==="NO ENTREGAR. ENTREGADA EN 19/20"){echo "0";}else{echo $datos["uds_maximas_ropa"][8];}?> (<?php echo $datos["tallas"][8];?>)</span>
                                                    </small>
                                                </label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php 
                                                $chaqueta_polar_bloqueada="";
                                                if(intval($datos["uds_maximas_ropa"][8])==0)
                                                {   $style="background-color:#f39b9b";}
                                                else if($datos["tallas"][8]==="NO ENTREGAR. ENTREGADA EN 19/20")
                                                {   $chaqueta_polar_bloqueada='<option value="0">0</option>';}
                                                else
                                                {   $style="";}
                                                ?>
                                                <select id="8-entrega-producto" class="form-control" name="8-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    if($chaqueta_polar_bloqueada!=="")
                                                    {   echo $chaqueta_polar_bloqueada; }
                                                    else
                                                    {
                                                        for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                        {
                                                            if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][8]))
                                                            {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                            else  
                                                            {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 09 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="9-label" for="9-entrega-producto">Polo de manga corta: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][9];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][9];?> (<?php echo $datos["tallas"][9];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][9])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="9-entrega-producto" class="form-control" name="9-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][9]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 10 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="10-label" for="10-entrega-producto">Camiseta de juego (Equipación 2):<small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][10];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][10];?> (<?php echo $datos["tallas"][10];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][10])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="10-entrega-producto" class="form-control" name="10-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][10]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 11 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="11-label" for="11-entrega-producto">Pantalón de juego (Equipación 2): <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][11];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][11];?> (<?php echo $datos["tallas"][11];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][11])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="11-entrega-producto" class="form-control" name="11-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][11]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <!-- Producto 12 -->
                                        <div class="row mt-1">
                                            <div class="col-8 col-sm-8 col-md-8">
                                                <label id="12-label" for="12-entrega-producto">Bolsa de entrenamiento: <small><span style='color:green;'>Entregadas: <?php echo $datos["uds_entregadas_ropa"][12];?></span> - <span style='color:red;'>Pendientes: <?php echo $datos["uds_maximas_ropa"][12];?> (<?php echo $datos["tallas"][12];?>)</span></small></label>
                                            </div>
                                            <div class="col-4 col-sm-4 col-md-4">
                                                <?php if(intval($datos["uds_maximas_ropa"][12])==0){$style="background-color:#f39b9b";}else{$style="";}?>
                                                <select id="12-entrega-producto" class="form-control" name="12-entrega-producto" required style="<?php echo $style;?>">
                                                    <?php
                                                    for($contador_uds_maximas=0;$contador_uds_maximas<5;$contador_uds_maximas++)
                                                    {
                                                        if($contador_uds_maximas<=intval($datos["uds_maximas_ropa"][12]))
                                                        {   echo '<option value="'.$contador_uds_maximas.'">'.$contador_uds_maximas.'</option>';    }
                                                        else  
                                                        {   echo '<option value="'.$contador_uds_maximas.'" disabled>'.$contador_uds_maximas.'</option>';    }
                                                    }
                                                    ?>
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
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                        <h5><b>FIRMA OBLIGATORIA:</b></h5>

                                        <canvas id="pizarra"></canvas>

                                        <input id="img_firma_jugador" type="hidden" name="img_firma_jugador">
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Botón guardar firmas -->
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <input id="entrega-id-jugador" type="hidden" value="<?php echo $datos["jugador"]["id_jugador"];?>">

                                        <button id="entrega-submit-button" style="width: 100%;"
                                                type="submit" class="w-100 btn btn-success mt-2 mb-1 pt-1 pb-1">
                                            Guardar y enviar
                                        </button>
                                    </div>

                                    <!-- Botón limpiar firmas -->
                                    <div class="col-6 col-sm-6 col-md-6">
                                        <button id="limpiar" class="w-100 btn btn-danger mt-2 mb-1 pt-1 pb-1" type="button">Borrar firma</button>
                                    </div>
                                </div>

                                <div id="hacer-entrega-form-respuesta" class="row">

                                </div>
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include 'includes/footer_back.php';?>


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
        $('document').ready(function()
        {
            /*******************************************
             * INICIO FIRMA ENTREGA ROPA
             ******************************************/

            /*  CANVAS FIRMA SOLICITANTE  */ 
            //======================================================================
            // VARIABLES
            //======================================================================
            let miCanvas    = document.querySelector('#pizarra');
            let lineas      = [];
            let correccionX = 0;
            let correccionY = 0;
            let pintarLinea = false;

            let posicion    =   miCanvas.getBoundingClientRect();
            correccionX     =   posicion.x;
            correccionY     =   posicion.y;

            miCanvas.width = 550;
            miCanvas.height = 250;

            //500 x 215

            //======================================================================
            // FUNCIONES
            //======================================================================
            // Funcion que empieza a dibujar la linea
            function empezarDibujo () {
                pintarLinea = true;
                lineas.push([]);
            };

            /** Funcion dibuja la linea */
            function dibujarLinea (event) {
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

            /** Funcion que deja de dibujar la linea */
            function pararDibujar () {
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

            $( "#limpiar" ).on( "click", function() {
                let ctx = miCanvas.getContext('2d');
                ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
                lineas.length = 0;
                $( "#img_firma_jugador").val("");
            });
           
            

            // returns true if all color channels in each pixel are 0 (or "blank")
            function isCanvasBlank(canvas){
                return !canvas.getContext('2d')
                    .getImageData(0, 0, canvas.width, canvas.height).data
                    .some(channel => channel !== 0);
            }
            /*******************************************
             * FIN FIRMA ENTREGA ROPA
             ******************************************/


            // Activar tooltips
            $(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

            //  Reseteamos la firma
            let ctx = miCanvas.getContext('2d');
            ctx.clearRect(0, 0, miCanvas.width, miCanvas.height);
            lineas.length = 0;
            $( "#img_firma_jugador").val("");
                            
            //  Modal Hacer nueva entrega de ropa // Cargar ID del jugador 
            /*$('body').on('click','.cargar_hacer_entregas',function()
            {
                //  Recuperamos el id
                var id          =   $(this).attr("id");
                var array_id    =   id.split("-");
                var form_data   =   {  jugadores_id: array_id[0] };
                
                $.ajax({
                   */
            
            function activa_option_select_cantidades(id_producto,maximo_permitido)
            {
                var i;
                for(i = 4; i >= 0; i--)
                {
                    if(maximo_permitido>=i)
                    {   $('#'+id_producto+'-entrega-producto option[value="'+i+'"]').attr("disabled", false); }
                    else
                    {   $('#'+id_producto+'-entrega-producto option[value="'+i+'"]').attr("disabled", true); }
                }
            }
            
            /*  FORMULARIO ENTREGAR ROPA */
            $('#hacer-entrega-form').validate(
            {
                submitHandler:function()
                {
                    // Recogemos la firma
                    $("#img_firma_jugador").val(document.querySelector('#pizarra').toDataURL('image/png') );
                    
                    var formData = new FormData();
                    formData.append("jugador_id",           $("#entrega-id-jugador").val());        
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
                    formData.append("firma",                $("#img_firma_jugador").val());
                    formData.append("observaciones",        $("#observaciones").val());
                    
                    $.ajax(
                    {
                        type:           "POST",
                        url:            "?r=ropa/NuevaEntregaRopa",
                        data:           formData,
                        processData:    false,          // tell jQuery not to process the data
                        contentType:    false,          // tell jQuery not to set contentType
                        dataType:       "json",
                        beforeSend:     function()
                        {
                            $("#hacer-entrega-form-respuesta").html("<div class='col-12'><div class='alert alert-info'>Por favor, espere mientras se guarda la información</div></div>");
                            $("#entrega-submit-button").prop("disabled", true);
                        },
                        success:        function(data)
                        {
                            if(data.response==="success")
                            {   
                                $("#hacer-entrega-form-respuesta").html("<div class='col-12'><div class='alert alert-success'>"+data.message+"</div></div>");
                                $("#hacer-entrega-form-respuesta").fadeTo(10000, 500).slideUp(500,function()
                                {
                                    $("#hacer-entrega-form-respuesta").slideUp(10000);
                                    window.location.reload(true);
                                });
                            }
                            else
                            {
                                $("#hacer-entrega-form-respuesta").html("<div class='alert alert-danger'><h4>"+data.message+"</h4></div>");
                                
                                //  Permito volver a enviar
                                $("#entrega-submit-button").prop("disabled", true);
                            }
                        },
                        error:  function(errorData)
                        {
                            $("#entrega-submit-button").prop("disabled", false);
                            console.log("error ");
                        }
                    });
                }
            });
		});
		</script>
	</body>
</html>