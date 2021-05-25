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
                        <div class="parallax col-12" style="background-image: url('img/cabecera-improve-basketball-talent.jpg');">
                        </div>
                    </div>
                </div>
            </div>

            <div class="block background-f6">
                <div class="container">
                    <div class="row">

                        <!-- COL -->
                        <div class="col-12">
                            <div class="formulariocampusimprove">
                                <h3 class="section-title">
                                    <span class="orange-text">Regístrate en el Campus Improve Basketball Talent 2019</span>
                                </h3>

                                <form enctype="multipart/form-data" action="?r=formularios/CampusImproveTalent" class="boxed-form" name="contactform" method="post">

                                    <!-- PARTE 1 -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-12 t-left" style="font-size: 1.2em;">
                                                        <div class="row">
                                                            <div class="col-6 t-left" style="font-size: 1.2em;">
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="semana1" id="semana1" value="semana1">
                                                                    <span class="checkmark"></span> Semana del 24 al 28 de Junio 
                                                                </label>
                                                            </div>

                                                            <div class="col-6" id="capa1" style="font-size: 0.8em; display: none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia1" value="pcompleta" checked>Pensión completa  &nbsp;   &nbsp;
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia1" value="sinaloj">Sin Alojamiento
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-6 t-left" style="font-size: 1.2em;">
                                                                <label class="containerchekbox">
                                                                    <input type="checkbox" name="semana2" id="semana2" value="semana2">
                                                                    <span class="checkmark"></span> Semana del 1 al 5 de Julio 
                                                                </label>
                                                            </div>

                                                            <div class="col-6" id="capa2" style="font-size: 0.8em; display: none;">
                                                                <label class="radio-inline">
                                                                    <input type="radio" name="rdia2" value="pcompleta" checked>Pensión completa  &nbsp;   &nbsp;
                                                                </label>
                                                                <label class="radio-inline">
                                                                     <input type="radio" name="rdia2" value="sinaloj">Sin Alojamiento
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 t-left" style="font-size: 1.2em;">
                                                        <p style="color: red;">
                                                            * Debe elegir 1 o 2 turnos
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            $('[name="semana1"]').change(function(){
                                                $("#capa1").toggle();
                                            });

                                            $('[name="semana2"]').change(function(){
                                                $("#capa2").toggle();
                                            });
                                        </script>

                                        <div class="col-md-6">
                                            <div class="contact-info-wrap t-center" style="background: none; background-color: #f1f2f5;">
                                                <div class="row pl-1 pr-1">
                                                    <div class="col-12">
                                                        <table width="100%" class="table">
                                                            <thead>
                                                                <th colspan="2">
                                                                    <p class="t-justify">
                                                                        Para jugadores entre 16 y 20 años con altas capacidades baloncestísticas.
                                                                    </p>
                                                                </th>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="t-left">
                                                                    <td>
                                                                        <strong>Semana 1:</strong>
                                                                    </td>
                                                                    <td>
                                                                       del 24 al 28 de Junio
                                                                    </td>
                                                                </tr>
                                                                <tr class="t-left">
                                                                    <td>
                                                                        <strong>Semana 2:</strong>
                                                                    </td>
                                                                    <td>
                                                                        del 1 al 5 de Julio
                                                                    </td>
                                                                </tr>
                                                                <tr class="t-left">
                                                                    <td>
                                                                        <strong>Coste por semana:</strong>
                                                                    </td>
                                                                    <td>
                                                                        Pensión completa: 1200€. Sin alojamiento: 850€
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
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
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3 redimension">
                                                <label>DNI:
                                                    <input type="text" class="form-control" name="dni" maxlength="20" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿A qué club pertenece?
                                                    <input type="text" class="form-control" name="club" maxlength="45" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                                                <label>Talla de camiseta:
                                                    <input type="text" class="form-control" name="tallacamiseta" maxlength="15" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿Sufre alguna enfermedad?
                                                    <input type="text" class="form-control" name="enfermedad" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                <label>¿Padece alguna alergia?
                                                    <input type="text" class="form-control" name="alergias" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 redimension">
                                                <label>¿Está bajo algún tratamiento médico?
                                                    <input type="text" class="form-control" name="tratamientosmedicos" required>
                                                </label>
                                            </div>

                                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                                <label>¿Alguna operación reciente?
                                                    <input type="text" class="form-control" name="operacionreciente" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12">
                                                <label>Observaciones (dormir con)
                                                    <textarea class="form-control" style="height: 85px; resize: none;" name="observaciones" required></textarea>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
                                            <div class="col-12 redimension">
                                                <p class="t-left" style="color: red;">
                                                    <strong>
                                                        * Recuerde adjuntar la fotocopia del SIP o seguro médico.<br>
                                                        (Archivos de imagen admitidos: .JPG, .JPEG, .PNG, .GIF, .BMP y .PDF)
                                                    </strong>
                                                </p>
                                            </div>

                                            <div class="col-12 redimension">
                                                <input type="file" id="fileName" class="form-control" style="border: none !important; padding: 0 !important;" name="fotocopiasip" aria-describedby="fileHelp" accept="image/gif,image/jpeg,image/jpg,image/png,image/bmp,application/pdf" required onchange="validateFileType()">
                                            </div>

                                            <div class="col-12">
                                                <p class="t-left">
                                                    Autorizo a la Dirección del Campus Improve Basketball Talent 2019 del Valencia Basket, en caso de máxima urgencia con el consentimiento y prescripción médica a tomar las decisiones médico-quirúrgicas necesarias, si ha sido imposible mi localización.
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row mt-2 pl-1 pr-1">
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
                                                    <input type="text" class="form-control" name="dnitutor" maxlength="20" required>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row pl-1 pr-1">
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
                                        <div class="row pl-1 pr-1">
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
                                        <div class="row pl-1 pr-1">
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

                                    <div class="col-12">
                                        <p class='t-left' style='color:red;'><strong>Al terminar la inscripción, recibirá un correo electrónico de confirmación con la información recibida.</strong></p>
                                    </div>


                                    <!-- PARTE 3 -->

                                    <div class="col-12 mb-2">
                                        <h4 class="mb-0">
                                            POLÍTICA DE PRIVACIDAD:
                                        </h4>
                                        <p class="t-justify">
                                            En cumplimiento de la Ley Orgánica de Protección de Datos de carácter personal, su Reglamento de Desarrollo (RD-1720/2007) y el nuevo Reglamento Europeo de Protección de Datos (RGPD), se le comunica que sus datos están incorporados a una base de datos titularidad de VALENCIA BASKET CLUB S.A.D. con CIF A46406930 y cuya finalidad es el tratamiento de estos, con el fin de llevar a cabo la gestión integral del Campus Improve Basketball Talent 2019 y el mentenerles informados, así como la comunicación y tratamiento de su imagen, parcial o total, en cualquier soporte gráfico o visual (fotografía, video o similar) para su uso en los medios de difusión presentes y futuros del VALENCIA BASKET CLUB S.A.D. (web, folletos, revistas del club, campeonatos, redes sociales, etc.). Por lo tanto, Vd. podrá recibir puntual información al respecto de estas jornadas y de las que en un futuro pudiéramos realizar, así como de otras actividades del VALENCIA BASKET CLUB S.A.D. Se le informa también que puede ejercer los derechos de acceso, rectificación, supresión, portabilidad, limitación de tratamiento, cancelación y en su caso, oposición, enviando una solicitud por escrito acompañada de la fotocopia de su DNI a la siguiente dirección: C/ HERMANOS MARISTAS 16, 46013, VALENCIA o a través de: valencia.valencia@valenciabasket.com; Sus datos podrán ser comunicados a FUNDACION VALENCIA BASQUET 2000 para los mismos tratamientos arriba mencionados.
                                        </p>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <label class="containerchekbox">
                                            <input type="checkbox" name="autorizo" value="si" required>
                                            <p>Como madre / padre / tutor, inscribo a mi hij@ en Campus Improve Basketball Talent 2019 y acepto las condiciones anteriormente expuestas.</p>
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

            $( document ).ready(function() {
                $( "#semana1" ).trigger( "click" );
            });
        </script>
        <!-- Load Scripts End -->

    </body>
</html>