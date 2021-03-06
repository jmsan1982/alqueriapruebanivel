/* Carga los datos originales de una inscripcion */
function mimodal(idinscripcion) {
    var form_data = {
        debug: "false",
        form_id: "inscripciones_cargar_contenido_inscripcion_original",
        idinscripcion: idinscripcion
    };

    $.ajax({
        type: "POST",
        url: "?r=ajax/dispatcher",
        data: form_data,
        dataType: "json",
        success: function (data) {
            //document.getElementById('modaltitle').innerHTML = data.modal_title;
            //console.log( data.datos['contenido'] );
            //document.getElementById('modal-detalleinscripcion-contenido').innerHTML = data.datos['contenido'];
        }
    });
}

/*  Carga el contenido del formulario editar cuenta */
function mimodaleditarcuenta(idinscripcion) {

    $("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
    $("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
    $("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
    $("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
    $("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

    $('#cuenta-error').remove();

    var form_data = {
        debug: "false",
        form_id: "inscripciones_cargar_contenido_editar_cuenta",
        idinscripcion: idinscripcion
    };

    $.ajax({
        type: "POST",
        url: "?r=ajax/dispatcher",
        data: form_data,
        dataType: "json",
        success: function (data) {
            $('#editar-cuenta-idinscripcion').val(data.idinscripcion);
            $('#editar-cuenta-iban').val(data.datos_iban);
            $('#editar-cuenta-entidad').val(data.datos_entidad);
            $('#editar-cuenta-oficina').val(data.datos_oficina);
            $('#editar-cuenta-dc').val(data.datos_dc);
            $('#editar-cuenta-cuenta').val(data.datos_cuenta);

            document.getElementById('modaltitle').innerHTML = data.modal_title;
        }
    });
}

/*  Carga el modal que muestra los pagos de una inscripcion */
function mimodaldepagos(idinscripcion) {
    $('#pagos-trimestrales-comentario-general').val("");

    var form_data = {
        debug: "false",
        form_id: "inscripciones_cargar_pagos_trimestral",
        idinscripcion: idinscripcion
    };

    $.ajax({
        type: "POST",
        url: "?r=ajax/dispatcher",
        data: form_data,
        dataType: "json",
        success: function (data) {
            //console.log(data);
            //alert("revisar");

            // PARTE 1. La informaci??n de MATRICULAS SOLO ES VISIBLE A JUGADORES DE ESCUELA
            if (data.tipo === "CANTERA") {
                $('.cantera-form-row').removeClass('show');
                $('.cantera-form-row').addClass('hide');
            } else {
                $('.cantera-form-row').removeClass('hide');
                $('.cantera-form-row').addClass('show');
            }

            //  PARTE 2. Datos de la inscripcion
            $('#pagos-trimestrales-categoria-inscripcion').val(data.categoria);
            $('#pagos-trimestrales-idinscripcion').val(data.idinscripcion);
            $('#pagos-trimestrales-fip').val(data.fip);
            $("#pagos-trimestrales-comentario-general").val(data.comentario_general);

            //  PARTE 3.    Recibimos la informacion de los pagos e inicializamos los componentes
            //  PARTE 3.1.  Totales inamovibles, no editables manualmente.
            $('#pagos-reserva').val(data.reserva);
            $('#pagos-matricula').val(data.matricula);
            $('#pagos-total-inscripcion').val(data.total_inscripcion);
            $('#pagos-total-pendiente').val(data.total_pendiente);

            //  PARTE 3.2. Las cantidades pendientes
            $('#pagos-trimestre-enero').val(data.trimestre_enero);
            $('#pagos-trimestre-abril').val(data.trimestre_abril);
            $('#pagos-trimestre-noviembre').val(data.trimestre_noviembre);


            $pagado_matricula_check = data.pagado_matricula;
            $pagado_trimestre_enero_check = data.pagado_enero;
            $pagado_trimestre_abril_check = data.pagado_abril;
            $pagado_trimestre_noviembre_check = data.pagado_noviembre;
            $pagado_pendiente_matricula_check = data.pagado_pendiente_matricula;

            $cobros_activos_matricula = data.cobros_activos_matricula;
            $cobros_activos_noviembre = data.cobros_activos_noviembre;
            $cobros_activos_enero = data.cobros_activos_enero;
            $cobros_activos_abril = data.cobros_activos_abril;

            $pagos_gastos_devolucion_check = data.aplicar_gastos_devolucion;

            //  CANTIDAD PENDIENTE MATRICULA
            $('#pagos-pendiente-matricula').val(data.pendiente_matricula);

            //  MATRICULA PAGADA
            if (data.pagado_matricula === true) {
                document.getElementById("pagos-pagado-pendiente-matricula").checked = true;
            } else {
                document.getElementById("pagos-pagado-pendiente-matricula").checked = false;
            }

            //  OMITIR INCLUIR PAGO MATRICULA EN XML. Si omitir=true, no queremos incluirlo. 
            if ($("#pagos-pagado-pendiente-matricula").is(':checked') === true) {
                document.getElementById("incluir-pendiente-matricula-en-xml").checked = false;
            } else if (data.incluir_xml_matricula === true) {
                document.getElementById("incluir-pendiente-matricula-en-xml").checked = true;
            } else {
                document.getElementById("incluir-pendiente-matricula-en-xml").checked = false;
            }

            //  Gastos de devolucion
            if (data.aplicar_gastos_devolucion !== false && data.aplicar_gastos_devolucion !== 0 && data.aplicar_gastos_devolucion !== "0") {
                document.getElementById("pagos-gastos-devolucion").checked = true;
            } else {
                document.getElementById("pagos-gastos-devolucion").checked = false;
            }

            //  Pagos y cantidades NOVIEMBRE
            if (data.pagado_noviembre !== false) {
                document.getElementById("pagos-pagado-noviembre").checked = true;
            } else {
                document.getElementById("pagos-pagado-noviembre").checked = false;
            }

            if ($("#pagos-pagado-noviembre").is(':checked') === true) {   //console.log("omitir_incluir_xml_noviembre. IF");
                document.getElementById("generar-xml-noviembre").checked = false;
            }   //  No se incluye porque ya est?? pagado
            else if (data.omitir_incluir_xml_noviembre === "1") {   //console.log("omitir_incluir_xml_noviembre. ELSEIF");
                document.getElementById("generar-xml-noviembre").checked = false;
            } else {   //console.log("omitir_incluir_xml_noviembre. ELSE");
                document.getElementById("generar-xml-noviembre").checked = true;
            }

            //  Pagos y cantidades ENERO
            if (data.pagado_enero !== false) {
                document.getElementById("pagos-pagado-enero").checked = true;
            } else {
                document.getElementById("pagos-pagado-enero").checked = false;
            }

            if ($("#pagos-pagado-enero").is(':checked') === true) {   //console.log("omitir_incluir_xml_enero. IF");
                document.getElementById("generar-xml-enero").checked = false;
            }   //  No se incluye porque ya est?? pagado
            else if (data.omitir_incluir_xml_enero === "1") {   //console.log("omitir_incluir_xml_enero. ELSEIF");
                document.getElementById("generar-xml-enero").checked = false;
            } else {   //console.log("omitir_incluir_xml_enero. ELSE");
                document.getElementById("generar-xml-enero").checked = true;
            }

            //  Pagos y cantidades ABRIL
            if (data.pagado_abril !== false) {
                document.getElementById("pagos-pagado-abril").checked = true;
            } else {
                document.getElementById("pagos-pagado-abril").checked = false;
            }

            if ($("#pagos-pagado-abril").is(':checked') === true) {   //console.log("omitir_incluir_xml_abril. IF");
                document.getElementById("generar-xml-abril").checked = false;
            }   //  No se incluye porque ya est?? pagado
            else if (data.omitir_incluir_xml_abril === "1") {   //console.log("omitir_incluir_xml_abril. ELSEIF");
                document.getElementById("generar-xml-abril").checked = false;
            } else {   //console.log("omitir_incluir_xml_abril. ELSE");
                document.getElementById("generar-xml-abril").checked = true;
            }
        }
    });
}

/*  Carga el modal que muestra los pagos de una inscripcion 20/21*/
function modalDomiciliaciones(idinscripcion) {
    //asigno variables para los diferentes tipo de rango de matricula de escuela
    $("#spinner-Carga").hide();
    $('#pagos-trimestrales-comentario-general').val("");
    $("#btn-guardar").html("<button class='btn btn-info btn-block' type='submit' onclick='actualizarJugador(" + idinscripcion + ")'>Guardar cambios</button>");
    var form_data = {
        debug: "false",
        form_id: "inscripciones_cargar_pagos_trimestral",
        jugador_id: idinscripcion
    };

    $.ajax({

    });
}

function actualizarJugador(idinscripcion) {



    $.ajax({

        beforeSend: function () {
            $("#spinner-Carga").show();
        },
        success: function (data) {
            if (data.response === "succes") {
                $("#spinner-Carga").empty();
                $("#spinner-Carga").html("Datos Guardados Correctamente");
            }
        }
    });
}

/*  aceptar jugador a equipo EBA*/
function aceptarBecado(idinscripcion) {

    $("#btn-guardar-EBA").html("<button class='btn btn-info btn-block' onclick='convertirBecado(" + idinscripcion + ")'>Convertir Jugador a Becado</button>");
}

function convertirBecado(idinscripcion) {

    let data = {
        jugador_id: idinscripcion
    };

    $.ajax({
        type: "POST",
        url: "?r=jugadores/CambiarJugadorBecado",
        data: data,
        dataType: "json",
        success: function (data) {

        }
    });

    alert("Cambios guardados correctamente");
    location.reload();

}

/*  Carga el modal para dar de baja / alta una inscripci??n */
function mimodaleditarbajayalta(idinscripcion) {
    var form_data = {
        debug: "false",
        form_id: "inscripciones_cargar_estado_inscripcion",
        idinscripcion: idinscripcion
    };

    $('#inscripciones-dar-baja-alta-form-idinscripcion').val(idinscripcion);

    $.ajax({
        type: "POST",
        url: "?r=ajax/dispatcher",
        data: form_data,
        dataType: "json",
        success: function (data) {
            //console.log("Recuperamos la inscripci??n");
            //console.log(data);
            $estado_inscripcion = data.estado_inscripcion;
            if ($estado_inscripcion === "1") {

                document.getElementById("estado-inscripcion-alta-baja").checked = true;
            } else {
                document.getElementById("estado-inscripcion-alta-baja").checked = false;
            }
        }
    });
}

function mostrar_div(id_div) {
    if (id_div === "div-1") {
        $('#div-3').fadeOut();
        $('#div-2').fadeOut();
        $('#div-1').fadeIn();
        $('#div-4').hide();
        $('#mostrar_div_launcher_1').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
        $('#mostrar_div_launcher_2').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
        $('#mostrar_div_launcher_3').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
    } else if (id_div === "div-2") {
        $('#mostrar_div_launcher_1').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
        $('#mostrar_div_launcher_2').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
        $('#mostrar_div_launcher_3').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
        $('#div-1').hide();
        $('#div-3').hide();
        $('#div-4').hide();
        $('#div-2').fadeIn();
    } else if (id_div === "div-3") {
        $('#div-1').fadeOut();
        $('#div-2').fadeOut();
        $('#div-3').fadeIn();
        $('#div-4').hide();
        $('#mostrar_div_launcher_1').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
        $('#mostrar_div_launcher_2').removeClass('btn-empresas-activo').addClass('btn-empresas-desactivo');
        $('#mostrar_div_launcher_3').removeClass('btn-empresas-desactivo').addClass('btn-empresas-activo');
    }
}

$('document').ready(function () {
    //  Mostramos DIV 1
    var isVisible = $("#div-4").css("display");

    //  Cambio de checkbox de pago completo de matr??cula
    $('#pagos-pagado-pendiente-matricula').on('change', function () {
        var total = 0;
        if ($('#pagos-pagado-pendiente-matricula').is(':checked')) {
            total = parseInt($("#pagos-total-pendiente").val()) - parseInt($("#pagos-pendiente-matricula").val());
            $("#pagos-total-pendiente").val(total);
            $("#pagos-pendiente-matricula").val(0);
            document.getElementById("incluir-pendiente-matricula-en-xml").checked = false;
        } else {
            var matricula = parseInt($("#pagos-matricula").val()) - parseInt($("#pagos-reserva").val());
            $("#pagos-pendiente-matricula").val(matricula);
            $("#pagos-total-pendiente").val(parseInt($("#pagos-total-pendiente").val()) + parseInt(matricula));
            document.getElementById("incluir-pendiente-matricula-en-xml").checked = true;
        }
    });

    //  Cambio de checkbox para incluir la matricula en el xml
    $('#incluir-pendiente-matricula-en-xml').on('change', function () {
        if ($("#pagos-pendiente-matricula").val() == 0 && $('#pagos-pagado-pendiente-matricula').is(':checked')) {
            alert("La matr??cula ya est?? pagada. No se puede incluir en la generaci??n del XML.");
            document.getElementById("incluir-pendiente-matricula-en-xml").checked = false;
        } else {
        }
    });

    //  Datatable de solicitudes de licencias de federacion
    $('#solicitudeslicencia1920-listado-datatable').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "dom": '<"toolbar">frtip',
        "scrollX": true,
        "paging": false,
        language: {
            "search": "",
            "searchPlaceholder": "Buscar",
            "lengthMenu": "Mostrando _MENU_ solicitudes de licencia por p??gina",
            "zeroRecords": "No hemos encontrado resultados",
            "info": "",
            "bPaginate": false
        }
    });

    //  Datatable de inscripciones
    $('#inscripciones-listado-datatable').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[1, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX": true,
        "paging": "false",
        language: {
            "search": "",
            "searchPlaceholder": "Buscar",
            "lengthMenu": "Mostrando _MENU_ inscripciones por p??gina",
            "zeroRecords": "No hemos encontrado inscripciones",
            "info": false,
            "bPaginate": false
        }
    });

    //  Datatable de liga
    $('#liga-listado-datatable').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[1, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX": true,
        "paging": "false",
        language: {
            "search": "",
            "searchPlaceholder": "Buscar",
            "lengthMenu": "Mostrando _MENU_ equipos por p??gina",
            "zeroRecords": "No hemos encontrado equipos",
            "info": false,
            "bPaginate": false
        }
    });

    //  Datatable de inscripciones escuela y cantera
    $('#inscripciones-escuelaycantera-listado-datatable').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[1, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX": true,
        "paging": false,
        language: {
            "search": "",
            "searchPlaceholder": "Buscar inscripci??n",
            "lengthMenu": "Mostrando _MENU_ inscripciones por p??gina",
            "zeroRecords": "No hemos encontrado inscripciones",
            "bPaginate": false
        }
    });

    //  Datatable de pagos
    $('#pagos-listado-datatable').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[0, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX": true,
        responsive: true,
        language: {
            "search": "",
            "searchPlaceholder": "Buscar",
            "lengthMenu": "Mostrando _MENU_ pagos por p??gina",
            "zeroRecords": "No hemos encontrado pagos",
            "info": false,
            "bPaginate": false
        }
    });

    /*  Operaci??n del Modal: Editar cuenta bancaria*/
    $('#editar-cuenta-form').validate(
        {
            rules: {
                "iban": {
                    required: true,
                    minlength: 4,
                    maxlength: 4
                },
                "entidad": {
                    required: true,
                    number: true,
                    minlength: 4,
                    maxlength: 4
                },
                "oficina": {
                    required: true,
                    number: true,
                    minlength: 4,
                    maxlength: 4
                },
                "dc": {
                    required: true,
                    number: true,
                    minlength: 2,
                    maxlength: 2
                },

                "cuenta": {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 10
                }
            },
            messages: {
                "iban": {
                    required: "El campo 'IBAN' no puede estar vacio.",
                    minlength: "La longitud del campo debe de ser de 4 digitos. Ej:ES15.",
                    maxlength: "La longitud del campo debe de ser de 4 digitos. Ej:ES15."
                },
                "entidad": {
                    required: "El campo 'ENTIDAD' no puede estar vacio.",
                    number: "El campo 'ENTIDAD' tiene que contener solo n??meros.",
                    minlength: "La longitud del campo debe de ser de 4 digitos. Ej:1234.",
                    maxlength: "La longitud del campo debe de ser de 4 digitos. Ej:1234."
                },
                "oficina": {
                    required: "El campo 'OFICINA' no puede estar vacio.",
                    number: "El campo 'OFICINA' tiene que contener solo n??meros.",
                    minlength: "La longitud del campo debe de ser de 4 digitos. Ej:1234.",
                    maxlength: "La longitud del campo debe de ser de 4 digitos. Ej:1234."
                },
                "dc": {
                    required: "El campo 'DC' no puede estar vacio.",
                    number: "El campo 'OFICINA' tiene que contener solo n??meros.",
                    minlength: "La longitud del campo debe de ser de 4 digitos. Ej:12.",
                    maxlength: "La longitud del campo debe de ser de 4 digitos. Ej:12."
                },

                "cuenta": {
                    required: "El campo 'CUENTA' no puede estar vacio.",
                    number: "El campo 'CUENTA' tiene que contener solo n??meros.",
                    minlength: "La longitud del campo debe de ser de 4 digitos. Ej:0123456789.",
                    maxlength: "La longitud del campo debe de ser de 4 digitos. Ej:0123456789."
                }
            },
            submitHandler: function () {
                var form_data = {
                    debug: "false",
                    form_id: "inscripciones_editar_cuenta",
                    idinscripcion: $('#editar-cuenta-idinscripcion').val(),
                    datos_iban: $('#editar-cuenta-iban').val(),
                    datos_entidad: $('#editar-cuenta-entidad').val(),
                    datos_oficina: $('#editar-cuenta-oficina').val(),
                    datos_dc: $('#editar-cuenta-dc').val(),
                    datos_cuenta: $('#editar-cuenta-cuenta').val()
                };

                $.ajax({
                    type: "POST",
                    url: "?r=ajax/dispatcher",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {

                        if (data["response"] === "error_cuenta") {
                            $("input[name='iban']").attr('style', 'border: 3px solid red !important');
                            $("input[name='entidad']").attr('style', 'border: 3px solid red !important');
                            $("input[name='oficina']").attr('style', 'border: 3px solid red !important');
                            $("input[name='dc']").attr('style', 'border: 3px solid red !important');
                            $("input[name='cuenta']").attr('style', 'border: 3px solid red !important');
                            if ($("#cuenta-error").length === 0) {
                                $('#editar-cuenta-cuenta').after('<p id="cuenta-error" style="color:red;margin-left:10px;font-weight:bold;">* La Cuenta Bancaria NO es V??lida.</p>');
                            }
                            document.getElementById("editar-cuenta-cuenta").focus();
                        }
                        if (data["response"] === "success") {

                            $("input[name='iban']").attr('style', 'border: 1px solid #ccc;');
                            $("input[name='entidad']").attr('style', 'border: 1px solid #ccc;');
                            $("input[name='oficina']").attr('style', 'border: 1px solid #ccc;');
                            $("input[name='dc']").attr('style', 'border: 1px solid #ccc;');
                            $("input[name='cuenta']").attr('style', 'border: 1px solid #ccc;');

                            $('#cuenta-error').remove();

                            $("#editar-cuenta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                            $("#editar-cuenta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                $("#pagos-anyadir-respuesta").slideUp(500);
                            });

                        }

                    }
                });

                return false;
            }
        });

    /*  Operaci??n del Modal: Editar estado de la inscripcion (alta / baja) */
    $('#inscripciones-dar-baja-alta-form').validate(
        {
            submitHandler: function () {
                var form_data = {
                    debug: "false",
                    form_id: "inscripciones_estado_inscripcion",
                    idinscripcion: $('#inscripciones-dar-baja-alta-form-idinscripcion').val(),
                    nuevo_estado_inscripcion: $('#estado-inscripcion-alta-baja').is(":checked")
                };

                $.ajax({
                    type: "POST",
                    url: "?r=ajax/dispatcher",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        if (data["response"] === "success") {
                            $("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                            $("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                $("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
                            });
                        } else {
                            $("#inscripciones-dar-baja-alta-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
                            $("#inscripciones-dar-baja-alta-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                $("#inscripciones-dar-baja-alta-form-respuesta").slideUp(500);
                            });
                        }
                    }
                });

                return false;
            }
        });

    $(".licenciafederacion-submit").on("click", function () {
        var id_button = $(this).attr('id');
        var array_id_button = id_button.split("-");

        var form_data = {
            debug: "true",
            id_licenciafederacion: array_id_button[3],
            datos_incompletos: $("#datos-incompletos-" + array_id_button[3]).val()
        };

        $.ajax({
            type: "POST",
            url: "?r=index/EnvioCorreoASolicitantePorDatosIncompletos",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $("#licenciafederacion-enviar-email-form-respuesta-" + data.licenciasfederacion_id).html("<div class='col-12'><div class='alert alert-success'>" + data.message + "</div></div>");
                $("#licenciafederacion-enviar-email-form-respuesta-" + data.licenciasfederacion_id).fadeTo(2000, 500).slideUp(500, function () {
                    $("#licenciafederacion-enviar-email-form-respuesta-" + data.licenciasfederacion_id).slideUp(500);
                    $("#licenciafederacion-enviar-email-form-respuesta-" + data.licenciasfederacion_id).html("");
                });
            }
        });
    });


    /*  pagos-trimestrales-form. Al asignar un pago de un trimestre, se desactiva la casilla para que este se incluya en el XML*/
    $('#pagos-pagado-noviembre').on('click', function () {
        if (document.getElementById("pagos-pagado-noviembre").checked) {
            document.getElementById("generar-xml-noviembre").checked = false;
        } else {
            document.getElementById("generar-xml-noviembre").checked = true;
        }
    });
    $('#pagos-pagado-enero').on('click', function () {
        if (document.getElementById("pagos-pagado-enero").checked) {
            document.getElementById("generar-xml-enero").checked = false;
        } else {
            document.getElementById("generar-xml-enero").checked = true;
        }
    });
    $('#pagos-pagado-abril').on('click', function () {
        if (document.getElementById("pagos-pagado-abril").checked) {
            document.getElementById("generar-xml-abril").checked = false;
        } else {
            document.getElementById("generar-xml-abril").checked = true;
        }
    });

    /*  pagos-trimestrales-form. Al marcar un trimestre para que se genere el cargo en el XML se comprueba que el pago no est?? ya hecho */
    $('#generar-xml-noviembre').on('click', function () {
        if (document.getElementById("pagos-pagado-noviembre").checked) {
            alert("No puede incluirse un trimestre que ya est?? pagado. Para incluirlo, anule el pago del trimestre antes.");
            document.getElementById("generar-xml-noviembre").checked = false;
        }
    });
    $('#generar-xml-enero').on('click', function () {
        if (document.getElementById("pagos-pagado-enero").checked) {
            alert("No puede incluirse un trimestre que ya est?? pagado. Para incluirlo, anule el pago del trimestre antes.");
            document.getElementById("generar-xml-enero").checked = false;
        }
    });
    $('#generar-xml-abril').on('click', function () {
        if (document.getElementById("pagos-pagado-abril").checked) {
            alert("No puede incluirse un trimestre que ya est?? pagado. Para incluirlo, anule el pago del trimestre antes.");
            document.getElementById("generar-xml-enero").checked = false;
        }
    });


    //  Cambio de checkboxes de los trimestres 1 / 3 altera el TOTAL PENDIENTE
    $('#pagos-pagado-enero').on('change', function () {
        var total = 0;
        if ($('#pagos-pagado-enero').is(':checked')) {
            total = parseInt($("#pagos-total-pendiente").val()) - parseInt($("#pagos-trimestre-enero").val());
            $("#pagos-total-pendiente").val(total);
        } else {
            total = parseInt($("#pagos-total-pendiente").val()) + parseInt($("#pagos-trimestre-enero").val());
            $("#pagos-total-pendiente").val(total);
        }
    });

    //  Cambio de checkboxes de los trimestres 2 / 3 altera el TOTAL PENDIENTE
    $('#pagos-pagado-abril').on('change', function () {
        var total = 0;
        if ($('#pagos-pagado-abril').is(':checked')) {
            total = parseInt($("#pagos-total-pendiente").val()) - parseInt($("#pagos-trimestre-abril").val());
            $("#pagos-total-pendiente").val(total);
        } else {
            total = parseInt($("#pagos-total-pendiente").val()) + parseInt($("#pagos-trimestre-abril").val());
            $("#pagos-total-pendiente").val(total);
        }
    });

    //  Cambio de checkboxes de los trimestres 3 / 3 altera el TOTAL PENDIENTE
    $('#pagos-pagado-noviembre').on('change', function () {
        var total = 0;
        if ($('#pagos-pagado-noviembre').is(':checked')) {
            total = parseInt($("#pagos-total-pendiente").val()) - parseInt($("#pagos-trimestre-noviembre").val());
            $("#pagos-total-pendiente").val(total);
        } else {
            total = parseInt($("#pagos-total-pendiente").val()) + parseInt($("#pagos-trimestre-noviembre").val());
            $("#pagos-total-pendiente").val(total);
        }
    });

    //  Operaci??n del Modal: pagos-trimestrales-form. Formulario que gestiona el pago de los trimestres
    $('#pagos-trimestrales-form').validate(
        {
            submitHandler: function () {
                var form_data =
                    {
                        debug: "false",
                        form_id: "inscripciones_pagos_trimestrales",
                        idinscripcion: $('#pagos-trimestrales-idinscripcion').val(),
                        fip: $('#pagos-trimestrales-fip').val(),
                        categoria_inscripcion: $('#pagos-trimestrales-categoria-inscripcion').val(),
                        comentario_general: $('#pagos-trimestrales-comentario-general').val(),

                        reserva: $('#pagos-reserva').val(),
                        matricula: $('#pagos-matricula').val(),
                        pendiente_matricula: $('#pagos-pendiente-matricula').val(),
                        total_inscripcion: $('#pagos-total-inscripcion').val(),
                        total_pendiente: $('#pagos-total-pendiente').val(),
                        aplicar_gastos_devolucion: $('#pagos-gastos-devolucion').is(":checked"),
                        gastos_devolucion: $('#pagos-devolucion').val(),

                        /* Comento en 6/sep porque no lo veo en HTML pagado_matricula:           $('#pagos-pagado-matricula').is(":checked"),   */
                        /* cobros_activos:          $('#pagos-cobros-activos').is(":checked"),                                                  */
                        pagado_pendiente_matricula: $('#pagos-pagado-pendiente-matricula').is(":checked"),
                        incluir_pendiente_matricula_en_xml: $('#incluir-pendiente-matricula-en-xml').is(":checked"),

                        trimestre_enero: $('#pagos-trimestre-enero').val(),
                        trimestre_abril: $('#pagos-trimestre-abril').val(),
                        trimestre_noviembre: $('#pagos-trimestre-noviembre').val(),

                        pagado_noviembre: $('#pagos-pagado-noviembre').is(":checked"),
                        pagado_enero: $('#pagos-pagado-enero').is(":checked"),
                        pagado_abril: $('#pagos-pagado-abril').is(":checked"),

                        incluir_xml_noviembre: $('#generar-xml-noviembre').is(":checked"),
                        incluir_xml_enero: $('#generar-xml-enero').is(":checked"),
                        incluir_xml_abril: $('#generar-xml-abril').is(":checked")
                    };

                $.ajax({
                    type: "POST",
                    url: "?r=ajax/dispatcher",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        //  console.log(data);

                        if (data["response"] === "success") {
                            $("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>");
                            $("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                $("#pagos-anyadir-respuesta").slideUp(500);
                            });
                            setTimeout(function () {
                                $("#myModalEditarCuenta").modal('hide')
                            }, 2000);
                        } else {
                            $("#pagos-trimestrales-form-respuesta").html("<div class='alert alert-danger'>" + data.message + "</div>");
                            $("#pagos-trimestrales-form-respuesta").fadeTo(2000, 500).slideUp(500, function () {
                                $("#pagos-anyadir-respuesta").slideUp(500);
                            });
                        }
                    }
                });

                return false;
            }
        });


    /*******************************************
     *
     *      DOMICILIACIONES 2018 / 2019
     *
     * *****************************************/
    //  Cambio del selector de trimestre. Cargamos los cargos a confirmar o anular.
    $('#domiciliaciones-form-xml-trimestre').on('change', function () {
        var form_data = {
            debug: "false",
            form_id: "inscripciones_cargar_inscripciones_anyadidas_xml_por_confirmar_envio_banco",
            trimestre: $("#domiciliaciones-form-xml-trimestre").val()
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $('#domiciliaciones-form-xml-generar-titulo').html("Inscripciones pendientes de pago: " + data.numero_cargos_a_generar);
                $('#inscripciones-cobros-activos-por-confirmar tbody').html(data.contenido_tabla);
            }
        });
    });

    //  Confirmar cargos que se incluyeron en XML
    $('#domiciliaciones-form-xml-confirmar-cargos').on('click', function () {
        var selected = [];
        $("#inscripciones-cobros-activos-por-confirmar input:checked").each(function () {
            selected.push($(this).attr('value'));
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml",
            trimestre: $("#domiciliaciones-form-xml-trimestre").val(),
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $('#inscripciones-cobros-activos-por-confirmar tbody').html("<tr><td class=\"t-center\" colspan=\"7\">Seleccione otro trimestre para realizar nuevas actualizaciones</td></tr>");
                $("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                    $("#domiciliation-message").slideUp(500);
                });
            }
        });
    });


    /************************************************************************
     *
     *      DOMICILIACIONES 2019 - 2020: OTRAS CONSULTAS
     *
     * **********************************************************************/
    /************ DOMICILIACIONES 2019 - 2020: MATRICULAS  ******************/
    /* DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas Inscripciones. */
    $('#domiciliaciones-xml-2019-2020-matricula-form').validate(
        {
            submitHandler: function () {
                var enlaceDomiciliacionMatriculasInscripciones = "";

                var form_data = {
                    debug: "true",
                    id_equipo_horario: $('#domiciliaciones-xml-2019-2020-matricula-equipo').val()
                };

                $.ajax({
                    type: "POST",
                    url: "?r=domiciliaciones/GenerarXMLMatriculas20192020",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                        $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_matricula_ant);

                        if (data["response"] === "ok") {
                            $("#domiciliaciones-xml-2019-2020-matricula-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                $("#domiciliaciones-xml-2019-2020-matricula-respuesta").slideUp(500);
                            });
                            $("#domiciliaciones-xml-2019-2020-matricula-link-descarga").html('<a id="enlace_domiciliacion_xml_2019_2020_matricula" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                            document.getElementById("enlace_domiciliacion_xml_2019_2020_matricula").href = "./public/" + data.url_nombre_fichero;
                        } else if (data["response"] === "ok2") {
                            alert(data.message);
                        } else {
                            $("#domiciliaciones-xml-2019-2020-matricula-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                $("#domiciliaciones-xml-2019-2020-matricula-respuesta").slideUp(500);
                            });
                        }
                    }
                });
            }
        });

    /* DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-matriculas-2019-2020-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-matricula-2019-2020-checkbox").prop('checked', true);
    });

    /* DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-matriculas-2019-2020-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_anular_pagos_xml_matriculas_2019_2020",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                alert(data.message);
                location.reload();
            }
        });
    });

    /* DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-matriculas-2019-2020-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_matriculas_2019_2020",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $("#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                alert(data.message);
                location.reload();
            }
        });
    });

    /* DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo. */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2019-2020-matricula-equipo').on('change', function () {
        $("#domiciliaciones-xml-2019-2020-matricula-link-descarga").html("");
    });

    /* DOMICILIACIONES 2019 - 2020 / Datatable del listado de pendientes a confirmar
    $('#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[6, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX" : true,
        responsive: true,
        language: {
            "search": "",
            "searchPlaceholder": "Filtrar",
            "lengthMenu": "Mostrando _MENU_ filas",
            "zeroRecords": "No hemos encontrado filas",
            "info": "",
            "bPaginate": ""
        }
    });*/
    /************ / FIN DOMICILIACIONES 2019 - 2020 MATRICULAS ******************/


    /************ DOMICILIACIONES 2019 - 2020: TRIMESTRE 1  ******************/
    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas Inscripciones. */
    $('#domiciliaciones-xml-2019-2020-trimestre1-form').validate(
        {
            submitHandler: function () {
                var enlaceDomiciliacionMatriculasInscripciones = "";

                var form_data = {
                    debug: "true",
                    id_equipo_horario: $('#domiciliaciones-xml-2019-2020-trimestre1-equipo').val(),
                    trimestre: "noviembre"
                };

                $.ajax({
                    type: "POST",
                    url: "?r=domiciliaciones/GenerarXMLTrimestre20192020",
                    data: form_data,
                    dataType: "json",
                    success: function (data) {
                        $("#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos);
                        $("#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_ant);

                        if (data["response"] === "ok") {
                            $("#domiciliaciones-xml-2019-2020-trimestre1-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                $("#domiciliaciones-xml-2019-2020-trimestre1-respuesta").slideUp(500);
                            });
                            $("#domiciliaciones-xml-2019-2020-trimestre1-link-descarga").html('<a id="enlace_domiciliacion_xml_2019_2020_trimestre1" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                            document.getElementById("enlace_domiciliacion_xml_2019_2020_trimestre1").href = "./public/" + data.url_nombre_fichero;
                        } else if (data["response"] === "ok2") {
                            alert(data.message);
                        } else {
                            $("#domiciliaciones-xml-2019-2020-trimestre1-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                $("#domiciliaciones-xml-2019-2020-trimestre1-respuesta").slideUp(500);
                            });
                        }
                    }
                });
            }
        });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre1-2019-2020-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre-noviembre-2019-2020-checkbox").prop('checked', true);
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre1-2019-2020-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_anular_pagos_xml_trimestre_2019_2020",
            trimestre: "noviembre",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre1-2019-2020-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre-noviembre-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_trimestre_2019_2020",
            trimestre: "noviembre",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo. */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2019-2020-trimestre1-equipo').on('change', function () {
        $("#domiciliaciones-xml-2019-2020-trimestre1-link-descarga").html("");
    });

    /* DOMICILIACIONES 2019 - 2020 / Datatable del listado de pendientes a confirmar */
    /*  $('#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[6, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX" : true,
        responsive: true,
        language: {
            "search": "",
            "searchPlaceholder": "Filtrar",
            "lengthMenu": "Mostrando _MENU_ filas",
            "zeroRecords": "No hemos encontrado filas",
            "info": "",
            "bPaginate": ""
        }
    });*/
    /************ / FIN DOMICILIACIONES 2019 - 2020 TRIMESTRE 1 ******************/


    /************ DOMICILIACIONES 2019 - 2020: TRIMESTRE 2  ******************/
    /*  DOMICILIACIONES 2019 - 2020 / Cerrar vista previa Trimestre 2 ENERO Inscripciones. */
    $('body').on('click', '#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar', function () {
        $("#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container").html("");
    });


    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Trimestre 2 ENERO Inscripciones. */
    $('#domiciliaciones-xml-2019-2020-trimestre2-form').validate(
        {
            submitHandler: function () {
                /*  Como hay 2 botones submit, debemos saber el ID del bot??n y lanzar la llamada correspondiente:
                 *  -   OPCION 1: VISTA PREVIA DE LO QUE SE VA A GENERAR
                 *  -   OPCION 2: GENERAR EL XML
                 */
                var submitButtonId = $(this.submitButton).attr("id");

                if (submitButtonId === "domiciliaciones-xml-2019-2020-trimestre2-button-vista-previa") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2019-2020-trimestre2-equipo').val(),
                        trimestre: "enero"
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/VistaPreviaGenerarXMLTrimestre20192020",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container").slideDown(500);
                            $("#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container").html(data.vista_previa_pagos);
                        }
                    });
                } else if (submitButtonId === "domiciliaciones-xml-2019-2020-trimestre2-button") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2019-2020-trimestre2-equipo').val(),
                        trimestre: "enero"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLTrimestre20192020",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos);
                            $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_ant);

                            if (data["response"] === "ok") {
                                $("#domiciliaciones-xml-2019-2020-trimestre2-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre2-respuesta").slideUp(500);
                                });
                                $("#domiciliaciones-xml-2019-2020-trimestre2-link-descarga").html('<a id="enlace_domiciliacion_xml_2019_2020_trimestre2" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                                document.getElementById("enlace_domiciliacion_xml_2019_2020_trimestre2").href = "./public/" + data.url_nombre_fichero;
                            } else if (data["response"] === "ok2") {
                                $("#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>").fadeTo(3000, 3000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-container").slideUp(500);
                                });
                            } else {
                                $("#domiciliaciones-xml-2019-2020-trimestre2-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre2-respuesta").slideUp(500);
                                });
                            }
                        }
                    });
                }
            }
        });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre2-2019-2020-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre-enero-2019-2020-checkbox").prop('checked', true);
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre2-2019-2020-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "false",
            form_id: "inscripciones_anular_pagos_xml_trimestre_2019_2020",
            trimestre: "enero",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre2-2019-2020-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre2-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_trimestre_2019_2020",
            trimestre: "enero",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo.   */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2019-2020-trimestre2-equipo').on('change', function () {
        $("#domiciliaciones-xml-2019-2020-trimestre2-link-descarga").html("");
    });
    /************ / FIN DOMICILIACIONES 2019 - 2020 TRIMESTRE 2 ******************/


    /************ DOMICILIACIONES 2019 - 2020: TRIMESTRE 3  ******************/
    /*  DOMICILIACIONES 2019 - 2020 / Cerrar vista previa Trimestre 3 ABRIL Inscripciones. */
    $('body').on('click', '#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-cerrar', function () {
        $("#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container").html("");
    });


    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Trimestre 3 ABRIL Inscripciones. */
    $('#domiciliaciones-xml-2019-2020-trimestre3-form').validate(
        {
            submitHandler: function () {
                /*  Como hay 2 botones submit, debemos saber el ID del bot??n y lanzar la llamada correspondiente:
                 *  -   OPCION 1: VISTA PREVIA DE LO QUE SE VA A GENERAR
                 *  -   OPCION 2: GENERAR EL XML
                 */
                var submitButtonId = $(this.submitButton).attr("id");

                if (submitButtonId === "domiciliaciones-xml-2019-2020-trimestre3-button-vista-previa") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2019-2020-trimestre3-equipo').val(),
                        trimestre: "abril"
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/VistaPreviaGenerarXMLTrimestre20192020",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container").slideDown(500);
                            $("#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container").html(data.vista_previa_pagos);
                        }
                    });
                } else if (submitButtonId === "domiciliaciones-xml-2019-2020-trimestre3-button") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2019-2020-trimestre3-equipo').val(),
                        trimestre: "abril"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLTrimestre20192020",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            /*$("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar tbody").html(data.tabla_cobros_activos);
                            $("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_ant);*/

                            if (data["response"] === "ok") {
                                $("#domiciliaciones-xml-2019-2020-trimestre3-link-descarga").html('<a id="enlace_domiciliacion_xml_2019_2020_trimestre3" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                                document.getElementById("enlace_domiciliacion_xml_2019_2020_trimestre3").href = "./public/" + data.url_nombre_fichero;
                                $("#domiciliaciones-xml-2019-2020-trimestre3-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre3-respuesta").slideUp(500);
                                });
                            } else if (data["response"] === "ok2") {
                                $("#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>").fadeTo(3000, 3000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre3-vista-previa-container").slideUp(500);
                                });
                            } else {
                                $("#domiciliaciones-xml-2019-2020-trimestre3-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2019-2020-trimestre3-respuesta").slideUp(500);
                                });
                            }
                        }
                    });
                }
            }
        });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones  Trimestre 3 ABRIL / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre3-2019-2020-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre-abril-2019-2020-checkbox").prop('checked', true);
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones  Trimestre 3 ABRIL / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre3-2019-2020-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "false",
            form_id: "inscripciones_anular_pagos_xml_trimestre_2019_2020",
            trimestre: "enero",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Trimestre 3 ENERO / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre3-2019-2020-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre3-2019-2020-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_trimestre_2019_2020",
            trimestre: "abril",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo.   */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2019-2020-trimestre3-equipo').on('change', function () {
        $("#domiciliaciones-xml-2019-2020-trimestre3-link-descarga").html("");
    });
    /************ / FIN DOMICILIACIONES 2019 - 2020 TRIMESTRE 3 ******************/


    /*  Domiciliaciones. Obtener cuentas bancarias incorrectas */
    $("#cargar-cuentas-bancarias-incorrectas-launcher").on('click', function () {
        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_cargar_cuentas_bancarias_incorrectas"
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $('#cargar-cuentas-bancarias-incorrectas-contenido').html(data.contenido_tabla_cuenta_bancaria);
            }
        });

    });

    /* Domiciliaciones Trimestrales Inscripciones. Generaci??n de XML. */
    $("#domiciliaciones-form-xml").on('click', function () {
        var enlaceDomiciliacionTrimestralInscripciones = "";

        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_trimestrales_inscripciones",
            trimestre: $('#domiciliaciones-form-xml-trimestre :selected').val(),
            idDomiciliacion: $('#domiciliaciones-form-xml').val()
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data["response"] === "ok") {
                    enlaceDomiciliacionTrimestralInscripciones = 'public/Domiciliacion Trimestral ' + data.trimestre + ' ' + data.anyo_actual + '.xml';
                    $("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                    $("#download-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                    document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionTrimestralInscripciones;

                } else if (data["response"] === "ok2") {
                    $("#domiciliation-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                } else {
                    $("#domiciliation-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                }

            }, error: function (e) {
                console.log("Error en el ajax");
            }
        });
    });

    /* Domiciliaciones Matriculas Inscripciones. */
    $("#domiciliaciones-matricula-form-xml").on('click', function () {
        var enlaceDomiciliacionMatriculasInscripciones = "";

        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_matricula_inscripciones",
            idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data["response"] === "ok") {
                    enlaceDomiciliacionMatriculasInscripciones = 'public/Domiciliacion Matriculas Inscripciones ' + data.trimestre + ' ' + data.anyo_actual + '.xml';
                    $("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                    $("#download-matricula-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                    document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionMatriculasInscripciones;

                } else if (data["response"] === "ok2") {
                    $("#domiciliation-matricula-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                } else {
                    $("#domiciliation-matricula-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                }

            }
        });
    });

    /************************************************************************
     *
     *      DOMICILIACIONES 2020 - 2021: OTRAS CONSULTAS
     *
     * **********************************************************************/
    /************ DOMICILIACIONES 2019 - 2020: MATRICULAS  ******************/
    /* DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Matriculas Inscripciones. */
    $('#domiciliaciones-xml-2020-2021-matricula-form').validate(
        {
            submitHandler: function () {

                /*  Como hay 2 botones submit, debemos saber el ID del bot??n y lanzar la llamada correspondiente:
                 *  -   OPCION 1: VISTA PREVIA DE LO QUE SE VA A GENERAR
                 *  -   OPCION 2: GENERAR EL XML
                 */
                var submitButtonId = $(this.submitButton).attr("id");

                if (submitButtonId === "domiciliaciones-xml-2020-2021-matricula-button-vista-previa") {
                    var form_data = {
                        debug: "true",
                        id_equipo: $('#domiciliaciones-xml-2020-2021-matricula-button-vista-previa').val(),
                        trimestre: "septiembre"
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/VistaPreviaGenerarXMLTrimestre20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {

                            $("#domiciliaciones-xml-2020-2021-matricula-vista-container").slideDown(500);
                            $("#domiciliaciones-xml-2020-2021-matricula-vista-container").html(data.vista_previa_pagos);

                            if (submitButtonId === "domiciliaciones-xml-2020-2021-matricula-vista-cerrar") {
                                $("#domiciliaciones-xml-2020-2021-matricula-vista-container").empty();
                            }
                        }
                    });
                } else if (submitButtonId === "domiciliaciones-xml-2020-2021-matricula-button") {


                    var enlaceDomiciliacionMatriculasInscripciones = "";

                    var form_data = {
                        debug: "true",
                        id_equipo: $('#domiciliaciones-xml-2020-2021-matricula-equipo').val()
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLMatriculas20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                            $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_matricula_ant);

                            if (data["response"] === "ok") {
                                $("#domiciliaciones-xml-2020-2021-matricula-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-matricula-respuesta").slideUp(500);
                                });
                                $("#domiciliaciones-xml-2020-2021-matricula-link-descarga").html('<a id="enlace_domiciliacion_xml_2019_2020_matricula" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                                document.getElementById("enlace_domiciliacion_xml_2020_2021_matricula").href = "./public/" + data.url_nombre_fichero;
                            } else if (data["response"] === "ok2") {
                                alert(data.message);
                            } else {
                                $("#domiciliaciones-xml-2020-2021-matricula-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-matricula-respuesta").slideUp(500);
                                });
                            }
                        }
                    });
                }
            }
        });

    /* DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Matriculas / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-matriculas-2020-2021-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-matricula-2020-2021-checkbox").prop('checked', true);
    });

    /* DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-matriculas-2020-2021-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_anular_pagos_xml_matriculas_2020_2021",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                alert(data.message);
                location.reload();
            }
        });
    });

    /* DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-matriculas-2020-2021-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_matriculas_2020_2021",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $("#inscripciones-cobros-activos-matricula-2020-2021-por-confirmar tbody").html(data.tabla_cobros_activos_matricula);
                alert(data.message);
                location.reload();
            }
        });
    });

    /* DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo. */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2020-2021-matricula-equipo').on('change', function () {
        $("#domiciliaciones-xml-2020-2021-matricula-link-descarga").html("");
    });

    /* DOMICILIACIONES 2019 - 2020 / Datatable del listado de pendientes a confirmar
    $('#inscripciones-cobros-activos-matricula-2019-2020-por-confirmar-anteriores').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[6, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX" : true,
        responsive: true,
        language: {
            "search": "",
            "searchPlaceholder": "Filtrar",
            "lengthMenu": "Mostrando _MENU_ filas",
            "zeroRecords": "No hemos encontrado filas",
            "info": "",
            "bPaginate": ""
        }
    });*/
    /************ / FIN DOMICILIACIONES 2020 - 2021 MATRICULAS ******************/


    /************ DOMICILIACIONES 2020 - 2021: TRIMESTRE 1  ******************/
    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Matriculas Inscripciones. */
    $('#domiciliaciones-xml-2020-2021-trimestre1-form').validate(
        {
            submitHandler: function () {
                var enlaceDomiciliacionMatriculasInscripciones = "";

                var submitButtonId = $(this.submitButton).attr("id");

                if (submitButtonId === "domiciliaciones-xml-2020-2021-trimestre1-equipo-button-vista-previa") {

                    var form_data = {
                        debug: "true",
                        id_equipo: $('#domiciliaciones-xml-2020-2021-trimestre1-equipo-button-vista-previa').val(),
                        trimestre: "septiembre"
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/VistaPreviaGenerarXMLTrimestre20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            console.log(data);
                            $("#domiciliaciones-xml-2020-2021-trimestreUno-vista-container").slideDown(500);
                            $("#domiciliaciones-xml-2020-2021-trimestreUno-vista-container").html(data.vista_previa_pagos);

                            if (submitButtonId === "domiciliaciones-xml-2020-2021-matricula-vista-cerrar") {
                                $("#domiciliaciones-xml-2020-2021-matricula-vista-container").empty();
                            }
                        }
                    });

                } else if (submitButtonId === "domiciliaciones-xml-2020-2021-trimestre1-button") {

                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2020-2021-trimestre1-equipo').val(),
                        trimestre: "noviembre"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLTrimestre20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#inscripciones-cobros-activos-trimestre1-2020-2021-por-confirmar tbody").html(data.tabla_cobros_activos);
                            $("#inscripciones-cobros-activos-trimestre1-2020-2021-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_ant);

                            if (data["response"] === "ok") {
                                $("#domiciliaciones-xml-2020-2021-trimestre1-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-trimestre1-respuesta").slideUp(500);
                                });
                                $("#domiciliaciones-xml-2020-2021-trimestre1-link-descarga").html('<a id="enlace_domiciliacion_xml_2020_2021_trimestre1" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                                document.getElementById("enlace_domiciliacion_xml_2019_2020_trimestre1").href = "./public/" + data.url_nombre_fichero;
                            } else if (data["response"] === "ok2") {
                                alert(data.message);
                            } else {
                                $("#domiciliaciones-xml-2020-2021-trimestre1-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-trimestre1-respuesta").slideUp(500);
                                });
                            }
                        }
                    });
                }


            }
        });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Trimestre1 / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre1-2020-2021-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre1-2020-2021-checkbox").prop('checked', true);
    });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Matriculas / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre1-2020-2021-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre1-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre1-2020-2021-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_anular_pagos_xml_trimestre_2019_2020",
            trimestre: "noviembre",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones trimestre1 / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre1-2020-2021-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre-noviembre-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre1-2020-2021-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_trimestre_2020_2021",
            trimestre: "noviembre",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2020 - 2021 / Eliminamos link descarga al cambiar equipo. */
    //  domiciliaciones-xml-2020-2021-matricula-equipo
    $('#domiciliaciones-xml-2020-2021-trimestre1-equipo').on('change', function () {
        $("#domiciliaciones-xml-2020-2021-trimestre1-link-descarga").html("");
    });

    /* DOMICILIACIONES 2019 - 2020 / Datatable del listado de pendientes a confirmar */
    /*  $('#inscripciones-cobros-activos-trimestre1-2019-2020-por-confirmar-anteriores').DataTable({
        "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
        "order": [[6, "desc"]],
        "dom": '<"toolbar">frtip',
        "scrollX" : true,
        responsive: true,
        language: {
            "search": "",
            "searchPlaceholder": "Filtrar",
            "lengthMenu": "Mostrando _MENU_ filas",
            "zeroRecords": "No hemos encontrado filas",
            "info": "",
            "bPaginate": ""
        }
    });*/
    /************ / FIN DOMICILIACIONES 2020 - 2021 TRIMESTRE 1 ******************/


    /************ DOMICILIACIONES 2020 - 2021: TRIMESTRE 2  ******************/
    /*  DOMICILIACIONES 2019 - 2020 / Cerrar vista previa Trimestre 2 ENERO Inscripciones. */
    $('body').on('click', '#domiciliaciones-xml-2019-2020-trimestre2-vista-previa-cerrar', function () {
        $("#domiciliaciones-xml-2020-2021-trimestre2-vista-previa-container").html("");
    });


    /*  DOMICILIACIONES 2019 - 2020 / Generar XML para domiciliaciones Trimestre 2 ENERO Inscripciones. */
    $('#domiciliaciones-xml-2020-2021-trimestre2-form').validate(
        {
            submitHandler: function () {
                /*  Como hay 2 botones submit, debemos saber el ID del bot??n y lanzar la llamada correspondiente:
                 *  -   OPCION 1: VISTA PREVIA DE LO QUE SE VA A GENERAR
                 *  -   OPCION 2: GENERAR EL XML
                 */
                var submitButtonId = $(this.submitButton).attr("id");

                if (submitButtonId === "domiciliaciones-xml-2020-2021-trimestre2-button-vista-previa") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2020-2021-trimestre2-equipo').val(),
                        trimestre: "enero"
                    };


                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/VistaPreviaGenerarXMLTrimestreDos20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#domiciliaciones-xml-2020-2021-trimestre2-vista-previa-container").slideDown(500);
                            $("#domiciliaciones-xml-2020-2021-trimestre2-vista-previa-container").html(data.vista_previa_pagos);
                        }
                    });
                } else if (submitButtonId === "domiciliaciones-xml-2020-2021-trimestre2-button") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2020-2021-trimestre2-equipo').val(),
                        trimestre: "enero"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLTrimestreDos20202021",
                        data: form_data,
                        dataType: "json",
                        success: function (data) {
                            $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar tbody").html(data.tabla_cobros_activos);
                            $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar-anteriores tbody").html(data.tabla_cobros_activos_ant);

                            if (data["response"] === "ok") {
                                $("#domiciliaciones-xml-2020-2021-trimestre2-respuesta").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-trimestre2-respuesta").slideUp(500);
                                });
                                $("#domiciliaciones-xml-2020-2021-trimestre2-link-descarga").html('<a id="enlace_domiciliacion_xml_2020_2021_trimestre2" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                                document.getElementById("enlace_domiciliacion_xml_2019_2020_trimestre2").href = "./public/" + data.url_nombre_fichero;
                            } else if (data["response"] === "ok2") {
                                $("#domiciliaciones-xml-2020-2021-trimestre2-vista-previa-container").html("<div class='col-12'><div class='alert alert-danger'>" + data.message + "</div></div>").fadeTo(3000, 3000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-trimestre2-vista-previa-container").slideUp(500);
                                });
                            } else {
                                $("#domiciliaciones-xml-2020-2021-trimestre2-respuesta").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                                    $("#domiciliaciones-xml-2020-2021-trimestre2-respuesta").slideUp(500);
                                });
                            }
                        }
                    });
                }
            }
        });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre2-2020-2021-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre-enero-2020-2021-checkbox").prop('checked', true);
    });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre2-2020-2021-anular-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "false",
            form_id: "inscripciones_anular_pagos_xml_trimestre_2020_2021",
            trimestre: "enero",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones  Trimestre 2 ENERO / Anular cargos que se incluyeron en XML */
    $('#domiciliaciones-form-xml-trimestre2-2020-2021-confirmar-cargos').on('click', function () {
        var selected = [];
        var id_bueno = "";
        $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        $("#inscripciones-cobros-activos-trimestre2-2020-2021-por-confirmar-anteriores input:checked").each(function () {
            id_bueno = $(this).attr('value');
            selected.push(id_bueno);
        });

        var form_data = {
            debug: "true",
            form_id: "inscripciones_confirmar_pagos_xml_trimestre_2019_2020",
            trimestre: "enero",
            selected_id_fip: selected
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                alert(data.message);
                location.reload();
            }
        });
    });

    /*  DOMICILIACIONES 2019 - 2020 / Eliminamos link descarga al cambiar equipo.   */
    //  domiciliaciones-xml-2019-2020-matricula-equipo
    $('#domiciliaciones-xml-2020-2021-trimestre2-equipo').on('change', function () {
        $("#domiciliaciones-xml-2020-2021-trimestre2-link-descarga").html("");
    });
    /************ / FIN DOMICILIACIONES 2020 - 2021 TRIMESTRE 2 ******************/


    /************ DOMICILIACIONES 2020 - 2021: TRIMESTRE 3  ******************/
    /*  DOMICILIACIONES 2020 - 2021 / Cerrar vista previa Trimestre 3 ABRIL Inscripciones. */
    $('body').on('click', '#domiciliaciones-xml-2020-2021-trimestre3-vista-previa-cerrar', function () {
        $("#domiciliaciones-xml-2020-2021-trimestre3-vista-previa-container").html("");
    });


    $('body').on('click', '#domiciliaciones-xml-2020-2021-matricula-vista-cerrar', function () {
        $("#domiciliaciones-xml-2020-2021-trimestre3-vista-container").html("");
    });


    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones Trimestre 3 ABRIL Inscripciones. */
    $('#domiciliaciones-xml-2020-2021-trimestre3-form').validate(
        {
            submitHandler: function () {
                var submitButtonId = $(this.submitButton).attr("id");
                if (submitButtonId === "domiciliaciones-xml-2020-2021-trimestre3-button") {
                    var form_data = {
                        debug: "true",
                        id_equipo_horario: $('#domiciliaciones-xml-2020-2021-trimestre3-equipo').val(),
                        trimestre: "abril"
                    };

                    $.ajax({
                        type: "POST",
                        url: "?r=domiciliaciones/GenerarXMLTrimestreTres20202021",
                        data: form_data,
                        dataType: "json",
                        processData: false,
                        beforeSend: function () {
                            $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").show();
                        },
                        success: function (data) {
                            $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").empty();
                            $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").html('Se ha generado el xml, esta en la carpeta xmlDomiciliacionesAlqueria');
                        }
                    }).fail(
                        function (){
                            descargarXml();
                        }
                    );
                }
            }
        }
    );

    //DESCARGAR DE XML
    function descargarXml(){
        $.ajax({
            type: "POST",
            url: "?r=domiciliaciones/DescargarXml",
            dataType: "json",
            processData: false,
            success: function (data) {
                if (data.response === "success" ){
                    $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").empty();
                    $("#domiciliaciones-xml-2020-2021-trimestre3-link-descarga").html('Se ha generado el xml, esta en la carpeta xml junto con los demas');
                }

            }
        });
    }

    /*  DOMICILIACIONES 2020 - 2021 / Generar XML para domiciliaciones  Trimestre 3 ABRIL / Seleccionar todos los cargos a confirmar o anular */
    $('#domiciliaciones-form-xml-trimestre3-2020-2021-seleccionar-cargos').on('click', function () {
        $(".inscripciones-cobro-activo-trimestre-abril-2020-2021-checkbox").prop('checked', true);
    });

    /************ / FIN DOMICILIACIONES 2020 - 2021 TRIMESTRE 3 ******************/


    /*  Domiciliaciones. Obtener cuentas bancarias incorrectas */
    $("#cargar-cuentas-bancarias-incorrectas-launcher").on('click', function () {
        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_cargar_cuentas_bancarias_incorrectas"
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                $('#cargar-cuentas-bancarias-incorrectas-contenido').html(data.contenido_tabla_cuenta_bancaria);
            }
        });

    });

    /* Domiciliaciones Trimestrales Inscripciones. Generaci??n de XML. */
    $("#domiciliaciones-form-xml").on('click', function () {

        var enlaceDomiciliacionTrimestralInscripciones = "";

        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_trimestrales_inscripciones",
            trimestre: $('#domiciliaciones-form-xml-trimestre :selected').val(),
            idDomiciliacion: $('#domiciliaciones-form-xml').val()
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data["response"] === "ok") {
                    enlaceDomiciliacionTrimestralInscripciones = 'public/Domiciliacion Trimestral ' + data.trimestre + ' ' + data.anyo_actual + '.xml';
                    $("#domiciliation-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                    $("#download-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                    document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionTrimestralInscripciones;

                } else if (data["response"] === "ok2") {
                    $("#domiciliation-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                } else {
                    $("#domiciliation-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-message").slideUp(500);
                    });
                }

            }, error: function (e) {
                console.log("Error en el ajax");
            }
        });
    });

    /* Domiciliaciones Matriculas Inscripciones. */
    $("#domiciliaciones-matricula-form-xml").on('click', function () {
        var enlaceDomiciliacionMatriculasInscripciones = "";

        var form_data = {
            debug: "false",
            form_id: "domiciliaciones_matricula_inscripciones",
            idDomiciliacion: $('#domiciliaciones-matricula-form-xml').val()
        };

        $.ajax({
            type: "POST",
            url: "?r=ajax/dispatcher",
            data: form_data,
            dataType: "json",
            success: function (data) {
                if (data["response"] === "ok") {
                    enlaceDomiciliacionMatriculasInscripciones = 'public/Domiciliacion Matriculas Inscripciones ' + data.trimestre + ' ' + data.anyo_actual + '.xml';
                    $("#domiciliation-matricula-message").html("<div class='alert alert-success'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                    $("#download-matricula-xml").html('<a id="enlace_domiciliacion" href="" class="btn btn-success" download>Descargar Archivo XML</a>');
                    document.getElementById("enlace_domiciliacion").href = enlaceDomiciliacionMatriculasInscripciones;

                } else if (data["response"] === "ok2") {
                    $("#domiciliation-matricula-message").html("<div class='alert alert-warning' style='margin-top:50px;'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                } else {
                    $("#domiciliation-matricula-message").html("<div class='alert alert-warning'>" + data.message + "</div>").fadeTo(3000, 5000).slideUp(500, function () {
                        $("#domiciliation-matricula-message").slideUp(500);
                    });
                }

            }
        });
    });


    /* Activar tooltips */
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
});