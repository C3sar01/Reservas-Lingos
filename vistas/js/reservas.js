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

  var fechaEntrada = $(this).val();

  $(".datepicker.salida").datepicker({
    startDate: fechaEntrada,
    datesDisabled: fechaEntrada,
    format: "yyyy-mm-dd",
  });
});

/*=============================================
CALENDARIO
=============================================*/

if ($(".infoReservas").html() != undefined) {
  let idSala = $(".infoReservas").attr("idSala");
  let fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  let fechaSalida = $(".infoReservas").attr("fechaSalida");

  let totalEventos = [];
  let opcion1 = [];
  let validarDisponibilidad = [];

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
              color: "#33FF36",
            },
          ],
        });
      } else {
        for (var i = 0; i < respuesta.length; i++) {
          /*Validar cruce de fechas opción 1 */

          if (fechaIngreso == respuesta[i]["fecha_ingreso"]) {
            opcion1[i] = false;
          } else {
            opcion1[i] = true;
          }
          console.log("opcion1[i]", opcion1[i]);
          /* VALIDAR DISPONIBILIDAD */
          if (opcion1[i] == false) {
            validarDisponibilidad = false;
          } else {
            validarDisponibilidad = true;
          }

          console.log("validarDisponibilidad", validarDisponibilidad);

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
              '<h5 class="pb-5 float-left">¡Lo sentimos, no hay disponibilidad para esa fecha!<br><br><strong>¡Vuelve a intentarlo!</strong></h5>'
            );
          }
        }
        //FIN CICLO FOR
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
