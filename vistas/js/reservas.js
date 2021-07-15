/*=============================================
FECHAS RESERVA
=============================================*/
$(".datepicker.entrada").datepicker({
  startDate: "0d",
  format: "yyyy-mm-dd",
  todayHighlight: true,
});

$(".datepicker.entrada").change(function () {
  $(".datepicker.salida").attr("readonly", false);

  let fechaEntrada = $(this).val();

  $(".datepicker.salida").datepicker({
    startDate: fechaEntrada,
    datesDisabled: fechaEntrada,
    format: "yyyy-mm-dd",
  });
});

/*=============================================
SELECTS DE RESERVA INICIO
=============================================*/
$(".selectTipoHabitacion").change(function () {
  let ruta = $(this).val();

  if (ruta != "") {
    $(".selectTemaHabitacion").html("");
  } else {
    $(".selectTemaHabitacion").html("<option>Temática de habitación</option>");
  }

  let datos = new FormData();
  datos.append("ruta", ruta);

  $.ajax({
    url: urlPrincipal + "ajax/salas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("input[name='ruta']").val(respuesta[0]["ruta"]);

      for (let i = 0; i < respuesta.length; i++) {
        $(".selectTemaHabitacion").append(
          '<option value="' +
            respuesta[i]["id_s"] +
            '">' +
            respuesta[i]["estilo"] +
            "</option>"
        );
      }
    },
  });
});

/*=============================================
CÓDIGO ALEATORIO
=============================================*/

let chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";

function codigoAleatorio(chars, length) {
  codigo = "";

  for (let i = 0; i < length; i++) {
    rand = Math.floor(Math.random() * chars.length);
    codigo += chars.substr(rand, 1);
  }

  return codigo;
}

/*=============================================
CALENDARIO
=============================================*/

if ($(".infoReservas").html() != undefined) {
  let idSala = $(".infoReservas").attr("idSala");
  let fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  let fechaSalida = $(".infoReservas").attr("fechaSalida");
  let dias = $(".infoReservas").attr("dias");

  let totalEventos = [];
  let opcion1 = [];
  let opcion2 = [];
  let opcion3 = [];
  let validarDisponibilidad = false;

  let datos = new FormData();
  datos.append("idSala", idSala);

  $.ajax({
    url: urlPrincipal + "ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.length == 0) {
        $("#calendar").fullCalendar({
          header: {
            left: "prev",
            center: "title",
            right: "next",
          },
          events: [
            {
              start: fechaIngreso,
              end: fechaSalida,
              rendering: "background",
              color: "#FFCC29",
            },
          ],
        });

        colDerReservas();
      } else {
        for (var i = 0; i < respuesta.length; i++) {
          /* VALIDAR CRUCE DE FECHAS OPCIÓN 1 */

          if (fechaIngreso == respuesta[i]["fecha_ingreso"]) {
            opcion1[i] = false;
          } else {
            opcion1[i] = true;
          }

          /* VALIDAR CRUCE DE FECHAS OPCIÓN 2 */

          if (
            fechaIngreso > respuesta[i]["fecha_ingreso"] &&
            fechaIngreso < respuesta[i]["fecha_salida"]
          ) {
            opcion2[i] = false;
          } else {
            opcion2[i] = true;
          }

          /* VALIDAR CRUCE DE FECHAS OPCIÓN 3 */

          if (
            fechaIngreso < respuesta[i]["fecha_ingreso"] &&
            fechaSalida > respuesta[i]["fecha_ingreso"]
          ) {
            opcion3[i] = false;
          } else {
            opcion3[i] = true;
          }

          /* VALIDAR DISPONIBILIDAD */

          if (
            opcion1[i] == false ||
            opcion2[i] == false ||
            opcion3[i] == false
          ) {
            validarDisponibilidad = false;
          } else {
            validarDisponibilidad = true;
          }

          if (!validarDisponibilidad) {
            totalEventos.push({
              start: respuesta[i]["fecha_ingreso"],
              end: respuesta[i]["fecha_salida"],
              rendering: "background",
              color: "#847059",
            });

            $(".infoDisponibilidad").html(
              '<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>'
            );

            break;
          } else {
            totalEventos.push({
              start: respuesta[i]["fecha_ingreso"],
              end: respuesta[i]["fecha_salida"],
              rendering: "background",
              color: "#847059",
            });

            $(".infoDisponibilidad").html(
              '<h1 class="pb-5 float-left">¡Está Disponible!</h1>'
            );

            colDerReservas();
          }
        }
        // FIN CICLO FOR

        if (validarDisponibilidad) {
          totalEventos.push({
            start: fechaIngreso,
            end: fechaSalida,
            rendering: "background",
            color: "#FFCC29",
          });
        }

        $("#calendar").fullCalendar({
          header: {
            left: "prev",
            center: "title",
            right: "next",
          },
          events: totalEventos,
        });
      }
    },
  });
}

/*=============================================
FUNCIÓN COL.DERECHA RESERVAS
=============================================*/

function colDerReservas() {
  $(".colDerReservas").show();

  var codigoReserva = codigoAleatorio(chars, 9);

  var datos = new FormData();
  datos.append("codigoReserva", codigoReserva);

  $.ajax({
    url: urlPrincipal + "ajax/reservas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (!respuesta) {
        $(".codigoReserva").html(codigoReserva);
      } else {
        $(".codigoReserva").html(codigoReserva + codigoAleatorio(chars, 3));
      }

      /*=============================================
       CAMBIO DE PLAN
       =============================================*/

      $(".elegirPlan").change(function () {
        cambioPlanesPersonas();
      });

      /*=============================================
       CAMBIO DE PERSONAS
       =============================================*/

      $(".cantidadPersonas").change(function () {
        cambioPlanesPersonas();
      });
    },
  });
}

function cambioPlanesPersonas() {
  switch ($(".cantidadPersonas").val()) {
    case "2":
      $(".precioReserva span").html(
        $(".elegirPlan").val().split(",")[0] * dias
      );
      $(".precioReserva span").number(true);

      break;

    case "3":
      $(".precioReserva span").html(
        Number($(".elegirPlan").val().split(",")[0] * 0.25) +
          Number($(".elegirPlan").val().split(",")[0]) * dias
      );
      $(".precioReserva span").number(true);

      break;

    case "4":
      $(".precioReserva span").html(
        Number($(".elegirPlan").val().split(",")[0] * 0.5) +
          Number($(".elegirPlan").val().split(",")[0]) * dias
      );
      $(".precioReserva span").number(true);

      break;

    case "5":
      $(".precioReserva span").html(
        Number($(".elegirPlan").val().split(",")[0] * 0.75) +
          Number($(".elegirPlan").val().split(",")[0]) * dias
      );
      $(".precioReserva span").number(true);

      break;
  }
}
