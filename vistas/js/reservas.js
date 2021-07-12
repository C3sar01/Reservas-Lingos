/*=============================================
FECHAS RESERVA
=============================================*/
$('.datepicker.entrada').datepicker({
	startDate: '0d',
	format: 'yyyy-mm-dd',
	todayHighlight:true
});

$('.datepicker.entrada').change(function(){

  $('.datepicker.salida').attr("readonly", false);

	var fechaEntrada = $(this).val();

	$('.datepicker.salida').datepicker({
		startDate: fechaEntrada,
		datesDisabled: fechaEntrada,
		format: 'yyyy-mm-dd'
	});

})


/*=============================================
CALENDARIO
=============================================*/

if ($(".infoReservas").html() != undefined) {

  let idSala = $(".infoReservas").attr("idSala");
  let fechaIngreso = $(".infoReservas").attr("fechaIngreso");
  let fechaSalida = $(".infoReservas").attr("fechaSalida");

  let datos = new FormData();
  datos.append("idSala", idSala);

  $.ajax({

      url:urlPrincipal+"ajax/reservas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success:function(respuesta){

        if(respuesta.length == 0){

        $('#calendar').fullCalendar({
              header: {
                left: 'prev',
                center: 'title',
                right: 'next'
              },
              events: [{
                start: fechaIngreso,
                end: fechaSalida,
                rendering: 'background',
                color: '#FFCC29'
              }]

          });

        }
        

      }

    })
 
  
}


