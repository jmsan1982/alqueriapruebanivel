$("document").ready(function () 
{

    var preguntas_estrellas = new Array();
    var ids_preguntas = [];


    $('.star').on('click', function () {
        var id = $(this).attr('name');

        var pos_id = id.indexOf("-");
        var pos_id_las = id.indexOf("-", pos_id + 1);
        var id_value = id.slice(pos_id + 1, pos_id_las);

        var pos_valor = id.lastIndexOf("-");
        var valor_value = id.slice(pos_valor + 1);

        preguntas_estrellas["" + id_value + ""] = valor_value;
        ids_preguntas.push(id_value);


    });

    $('li').on('click', function () {
        var selectedCssClass = 'selected';
        var $this = $(this);
        $this.siblings('.' + selectedCssClass).removeClass(selectedCssClass);
        $this
                .addClass(selectedCssClass)
                .parent().addClass('vote-cast');
    });

    /*AFICIONADOS*/
    $('#encuesta-aficionados-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: $("#email").val(),
                    id_encuesta: 2
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-aficionados-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertaficionados",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });

               


            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*ENTRENADORES*/
    $('#encuesta-entrenadores-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: "",
                    email: "",
                    id_encuesta: 3
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-entrenadores-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertentrenadores",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*INSTITUCIONES PUBLICAS*/
    $('#encuesta-institucionesPublicas-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: "",
                    id_encuesta: 8
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-institucionesPublicas-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertinstitucionpublica",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*INSTITUCIONES DEPORTIVAS*/
    $('#encuesta-institucionesDeportivas-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: "",
                    id_encuesta: 9
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-institucionesDeportivas-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertinstitucionesdeportivas",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*JUGADORES*/
    $('#encuesta-jugadores-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: "",
                    email: "",
                    id_encuesta: 4
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-jugadores-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertjugadores",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*MEDIOS COMUNICACION*/
    $('#encuesta-mediosComunicacion-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: "",
                    id_encuesta: 12
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-mediosComunicacion-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertmedioscomunicacion",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*CLUBES*/
    $('#encuesta-clubes-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: "",
                    id_encuesta: 10
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-clubes-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertclubescoles",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    }); 

    /*PADRES*/
    $('#encuesta-padres-form').validate({
        submitHandler: function () {
            // Desactivamos el botón de enviar al darle por primera vez
            $("#btn-enviar-padres").prop('disabled', true);
            //mostrar un mensaje "Espere un segundo"
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: $("#email").val(),
                    id_encuesta: 11
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-padres-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertpadres",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        //console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                        console.log("Error en el ajax");
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
                $("#btn-enviar-padres").prop('disabled', false);
            
        }
        }
    });

    /*PATROCINADORES*/
    $('#encuesta-patrocinadores-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: $("#nombre").val(),
                    email: "",
                    id_encuesta: 6
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-patrocinadores-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertpatrocinadores",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            
        }
        }
    });

    /*PROVEEDORES*/
    $('#encuesta-proveedores-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: "",
                    email: "",
                    id_encuesta: 5
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-proveedores-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertproveedores",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });

    /*STAFF*/
    $('#encuesta-staff-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: "",
                    email: "",
                    id_encuesta: 7
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-staff-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertstaff",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    });


    /********************************************************
     * ENCUESTAS 2020. USUARIOS (layout_encuesta_usuarios) 
     ********************************************************/
    //  Activamos los multiselect
    $('.selectpicker').selectpicker();
     
    $('#encuesta-staff-form').validate({
        submitHandler: function () {
            var li_seleccionados = 0;
            var uls = 0;

            $("li.selected").each(function () {
                ++li_seleccionados;
            });

            $(".linea_encuesta").each(function () {
                ++uls;
            });
            if (li_seleccionados == uls) {
                var datos_participante = {
                    nombre: "",
                    email: "",
                    id_encuesta: 7
                };

                $.ajax({
                    type: "POST",
                    url: "?r=index/insertarparticipante",
                    data: datos_participante,
                    dataType: "json",
                    success: function (respuesta_consulta) {
                        $("#id-participante").val(respuesta_consulta.id_participante);
                        var datos = $("#encuesta-staff-form").serialize();
                        for (var m = 0; m < ids_preguntas.length; m++) {
                            datos = datos + "&pregunta-" + ids_preguntas[m] + "=" + preguntas_estrellas[ ids_preguntas[m] ];
                        }
                        $.ajax({
                            type: "POST",
                            url: "?r=index/insertstaff",
                            data: datos,
                            dataType: "json",
                            success: function (respuesta_consulta) {
                                $("#respuesta").html(respuesta_consulta.message);
                            }, error: function (data, textStatus, errorThrown) {
                                console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                            }
                        });
                    }, error: function (data, textStatus, errorThrown) {
                        console.log('message=:' + data + ', text status=:' + textStatus + ', error thrown:=' + errorThrown);
                    }
                });
            } else {
                alert("Debe rellenar todas las preguntas");
            }
        }
    }); 
});