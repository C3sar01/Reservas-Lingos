/*=============================================
FECHAS RESERVA
=============================================*/
$.datetimepicker.setLocale("es");

$(".datepicker.entrada").datetimepicker({
  format: "Y-m-d H:00:00",
  theme:'dark',
  mindDate: 0,
  defaultTime: new Date().getHours() + 1 + ":00",
  todayHighlight:true,
  allowTimes: [
    "12:00",
    "13:00",
    "14:00",
    "15:00",
    "16:00",
    "17:00",
    "18:00",
    "19:00",
    "20:00",
  ],
  closeOnDateSelect: false,
});

$(".datepicker.entrada").change(function () {
  $(".datepicker.salida").attr("readonly", false);

  $(".datepicker.salida").datetimepicker({
    format: "Y-m-d H:00:00",
    theme:'dark',
    mindDate: 0,
    defaultTime: new Date().getHours() + 1 + ":00",
    todayHighlight:true,
    allowTimes: [
      "12:00",
      "13:00",
      "14:00",
      "15:00",
      "16:00",
      "17:00",
      "18:00",
      "19:00",
      "20:00",
    ],
    closeOnDateSelect: false,
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
  //let dias = $(".infoReservas").attr("dias");
  let fechaEscogida = new Date(fechaIngreso);
  let nombreSala = "";

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
          
          defaultDate: fechaIngreso,
          defaultView: "agendaFourDay",
          allDaySlot: false,
          scrollTime: fechaEscogida.getHours() + ":00:00",
          header: {
            left: "prev",
            center: "title",
            right: "next",
          },
          views: {
            agendaFourDay: {
            type: "agenda",
            duration: { days: 4 },
          },
        },
          events: [
            {
              start: fechaIngreso,
              end: fechaSalida,
              //rendering: "background",
              color: "#FFCC29",
            },
          ],
        });

        colDerReservas();
      } else {
        for (let i = 0; i < respuesta.length; i++) {
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
              "title": respuesta[i]["estilo"],
              "start": respuesta[i]["fecha_ingreso"],
              "end": respuesta[i]["fecha_salida"],
              //rendering: "background",
              "color": '#847059',
            });

            $(".infoDisponibilidad").html(
              '<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad :(<br><br><strong>¡Vuelve a intentarlo!</strong></h5>'
            );

            break;
          } else {
            totalEventos.push({
              "title": respuesta[i]["estilo"],
              "start": respuesta[i]["fecha_ingreso"],
              "end": respuesta[i]["fecha_salida"],
              //rendering: "background",
              "color": '#847059',
            });

            (nombreSala = respuesta[i]["estilo"]),
              $(".infoDisponibilidad").html(
                '<h1 class="pb-5 float-left">¡La sala se encuentra disponible!</h1>'
              );

            colDerReservas();
          }
        }
        // FIN CICLO FOR

        if (validarDisponibilidad) {
          totalEventos.push({
            title: nombreSala,
            "start": fechaIngreso,
            "end": fechaSalida,
            //rendering: "background",
            "color": '#FFCC29',
          });
        }

        $("#calendar").fullCalendar({
          //theme:'dark',
          defaultDate: fechaIngreso,
          defaultView: "agendaFourDay",
          allDaySlot: false,
          scrollTime: fechaEscogida.getHours() + ":00:00",

          header: {
            left: "prev",
            center: "title",
            right: "next",
          },
          views: {
              agendaFourDay: {
              type: "agenda",
              duration: { days: 4 },
            },
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

  let codigoReserva = codigoAleatorio(chars, 9);

  let datos = new FormData();
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

    }
  })
}
/*=============================================
  SELECTS DE RESERVA X HORA O PLANES
=============================================*/
$(".horas").change(function(){
  $(".planes").attr("disabled", true);
  $(".horas").attr("readonly", false);
 
});

$(".planes").change(function(){
  $(".horas").attr("disabled", true);
  $(".planes").attr("readonly", false);

});

$(".planes").onclick(function(){
  $(".horas").attr("disabled", false);
  $(".planes").attr("disabled", false);

});






