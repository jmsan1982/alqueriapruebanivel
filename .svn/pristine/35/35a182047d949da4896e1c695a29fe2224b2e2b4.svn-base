<!DOCTYPE html>
<html lang="es">
<?php require"includes/head_back.php"; ?>
    <body>
        <script src="backmeans/assets/js/jquery.js"></script>
        <link rel="stylesheet" href="css/empresas.css">
        <?php require "includes/topbar_back.php" ?>
        <div class="canvas">
            <div id="content">
                <div id="page-content" style="padding:25px 25px 25px 25px;">
                    <div class="block">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="?r=login/backdni" style="text-decoration:underline;">
                                        <h2 style="color:#406da4;text-align: center;">
                                            <b><i class="fa fa-home"></i> VERIFICACIÓN DE PAGOS</b>
                                        </h2>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block">
                        <div class="container-fluid">
                            <div class="row">
                                <?php 
                                    if(isset($datos['inscripciones']))
                                    { 
                                        $contador2=100;
                                        foreach ($datos['inscripciones'] as $inscripcion) 
                                        {
                                            $pagos_del_form = inscripciones_pagos::findByIdFormulario($inscripcion['id_formulario']);
                                            $euros=0;foreach($pagos_del_form as $inscripciones_pago){$euros+=$inscripciones_pago["importe"];}
                                    ?>
                                            <div class="col-md-3 ml-1" style="border: #406da4 2px solid;border-radius:5px;">
                                                <div class="panel-body mr-0 ml-0 pl-0 pr-0">
                                                    <h3 class="mb-0 pb-1" style="text-align: center;color:#406da4;font-weight: bold;">Pedido nº: <?php echo $inscripcion['numero_pedido']; ?></h3>
                                                    <?php echo $inscripcion['contenido']; ?>
                                                    
                                                <!-- PAGOS ASOCIADOS A ESTE ID_FORMULARIO -->    
                                                    <hr />
                                                    <p>
                                                    <strong>Pagos totales: <span id="total-<?php echo $inscripcion['id_formulario'];?>"><?php echo $euros;?></span>€</strong>
                                                    <button data-toggle="modal"
                                                            data-target="#myModalAnaydirPagos" 
                                                            onclick="cargarmodalpagos(<?php echo $inscripcion['id_formulario'];?>);"
                                                            class="btn btn-warning btn-block">Añadir nuevo pago</button>
                                                    </p>
                                                    
                                                
                                                <!-- BLOQUE RESERVA -->
                                                    <hr />
                                                    <p>
                                                        <?php 
                                                            if($inscripcion['pagado']==="si")           {}  //  echo "<strong>Pago reserva 50€: </strong> <span style='color:#155724;font-weight:bold;text-decoration:underline;'>Sí, por TPV</span>";     }
                                                            else if($inscripcion['pagado']==="no")      {   echo "<strong>Pago reserva 50€: </strong> <span style='color:#721c24;font-weight:bold;text-decoration:underline;'>No, TPV fallido</span>"; }
                                                            else if($inscripcion['pagado']==="oficina") {   echo "<strong>Pago reserva 50€: </strong> <span style='color:#155724;font-weight:bold;text-decoration:underline;'>No, pendiente</span>";  }
                                                            else if($inscripcion['pagado']==="cantera") {   echo "<strong>Pago reserva 50€: </strong> <span style=''>no procede, cantera</span>";   }
                                                            else{   echo "<strong>Pago reserva 50€: </strong> no especificado";   }
                                                        ?>
                                                    </p>
                                                    <?php if($inscripcion['pagado']!=="si"){?>
                                                        <form method="post" action="?r=login/pagadoenoficina"> 
                                                            <input type="hidden" name="id_formulario" value="<?php echo $inscripcion['id_formulario']; ?>">   
                                                            <input class="btn btn-info btn-block" type="submit" value="Actualizar a: PAGADO EN OFICINA">
                                                        </form>
                                                    <?php } ?>
                                                        
                                                </div>
                                            </div>
                                    <?php 
                                            $contador2++; 
                                        }
                                    } 
                                    else
                                    {
                                    ?>
                                        <div class="form-group">
                                            <form id="contact-form" method="post" class="form-horizontal margin-bottom-30px" role="form" action="?r=login/verficarpagopordni">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4 style="text-align:center;">Consulte por email o DNI del titular de la cuenta bancaria usada en la domiciliación</h4>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="offset-3 col-sm-6">
                                                        <div class="input-group">
                                                            <label for="contact-correo" class="control-label sr-only">Email usado en la inscripción</label>
                                                            <input type="text" name="correo" class="form-control" placeholder="EMAIL">
                                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="offset-3 col-sm-6">
                                                        <div class="input-group">
                                                            <label for="contact-email" class="control-label sr-only">DNI</label>
                                                            <input type="text" name="dni" class="form-control" placeholder="DNI">
                                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="offset-3 col-sm-6 mt-1">
                                                        <button type="submit" class="btn btn-primary btn-block"><span>Consultar</span></button>
                                                    </div>	
                                                </div>	
                                            </form>
                                        </div>
                                    <?php 
                                    }
                                ?>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
        <!-- Modal -->
        <div id="myModalAnaydirPagos" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title mb-0 pb-0">Pagos asociados a la inscripción:</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12" id="">
                                <h4 class="mb-0 mt-0">Añadir nuevo pago:</h4>
                                <form id="pagos-anyadir" method="post" > 
                                    <input type="hidden" name="" id="id-formulario-nuevo-pago" value="">   
                                    
                                    <div class="form-row">
                                        <label>DNI:</label>
                                        <input type="text" name="" class="form-control" id="dni-nuevo-pago" required>   
                                    </div>
                                    
                                    <div class="form-row">
                                        <label>Importe:</label>
                                        <input type="number" class="form-control" step="0.01" id="importe-nuevo-pago" required>
                                    </div>
                                    
                                    <div class="form-row">
                                        <label></label>
                                        <button class="btn btn-info btn-block" type="submit">Añadir pago</button>
                                    </div>
                                    
                                    <div id="pagos-anyadir-respuesta"></div>
                                </form>
                            </div>
                            <div class="col-sm-12 mt-2" id="modalanyadirpago-contenido">
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer t-center">
                        <button type="button" class="btn btn-empresas-activo" 
                                data-dismiss="modal" 
                                style="transform: skew(0deg);font-size: 15px;height: 35px;margin: 0 auto;">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="footer" class="hidden-xs" style="padding:25px 25px 25px 25px;">
            <div id="copyright">
                <p style="text-align: center;">&copy; L'Alqueria del Basket 2018 | <a href="http://tessq.com/" target="_blank" style="text-decoration:none;">Diseño Web por Tess Quality</a></p>
            </div>
        </div>
        
        <script src="backmeans/assets/js/bootstrap.js"></script>
        
        <!-- JQuery Validation. https://jqueryvalidation.org/ -->
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
        
        <script>
            function cargarmodalpagos(idinscripcion){
                
                var form_data={
                    debug:"false",
                    form_id: "inscripciones_cargar_anyadir_pago",
                    idinscripcion:idinscripcion
                };

                document.getElementById('id-formulario-nuevo-pago').value = idinscripcion;  
                
                $.ajax({
                    type: "POST",
                    url: "?r=ajax/dispatcher",
                    data: form_data,
                    dataType: "json",
                    success:function(data){
                        document.getElementById('modalanyadirpago-contenido').innerHTML = data.datos;       
                        return false;
                    }
                });
            }
        </script> 
        <script>
            $(document).ready(function()
            {
                $('#pagos-anyadir').validate({
                    submitHandler:function(){
                        var form_data = {
                            debug:"true",
                            form_id: "pagos_anyadir",
                            idinscripcion:$('#id-formulario-nuevo-pago').val(),
                            dnipago:$('#dni-nuevo-pago').val(),
                            importepago:$('#importe-nuevo-pago').val()
                        };
                        
                        $.ajax({
                            type: "POST",
                            url:  "?r=ajax/dispatcher",
                            data: form_data,
                            dataType: "json",
                            success: function(data){
                                document.getElementById('modalanyadirpago-contenido').innerHTML = data.datos;   
                                $('#total-'+data.idinscripcion).html(data.total);
                                $("#pagos-anyadir-respuesta").html("<div class='alert alert-success'>" + data.mensaje + "</div>");
                                $("#pagos-anyadir-respuesta").fadeTo(2000, 500).slideUp(500,function(){
                                    $("#pagos-anyadir-respuesta").slideUp(500);
                                });    
                            }
                        });

                        return false;
                    }
                });
            });
        </script>
    </body>
</html>
