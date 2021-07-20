/*=============================================
=           Estado de "activo" del botón            =
=============================================*/



let enlacesSalas = $(".cabeceraHabitacion ul.nav li.nav-item a");
let tituloBtn = [];

for(let i = 0; i < enlacesSalas.length; i++){

	$(enlacesSalas[i]).removeClass("active");
	$(enlacesSalas[i]).children("i").remove();
	tituloBtn[i] = $(enlacesSalas[i]).html();
}



$(enlacesSalas[0]).addClass("active");
$(enlacesSalas[0]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[0]);

$(enlacesSalas[enlacesSalas.length -1]).css({"border-right":0});




/*=============================================
=           Enlace de las salas            =
=============================================*/


$(".cabeceraHabitacion ul.nav li.nav-item a").click(function(e){


	e.preventDefault();

	let orden = $(this).attr("orden");
    let ruta = $(this).attr("ruta");
    

	for(let i = 0; i < enlacesSalas.length; i++){

	   $(enlacesSalas[i]).removeClass("active");
	   $(enlacesSalas[i]).children("i").remove();
	   tituloBtn[i] = $(enlacesSalas[i]).html();
}

	$(enlacesSalas[orden]).addClass("active");
    $(enlacesSalas[orden]).html('<i class="fas fa-chevron-right"></i>'+ tituloBtn[orden]);


    /*=============================================
    =            AJAX SALAS           =
    =============================================*/
    
    let listaSlide = $(".slideHabitaciones .slide-inner .slide-area li");
    let alturaSlide = $(".slideHabitaciones .slide-inner .slide-area").height(); 

    for (let i = 0; i < listaSlide.length; i++) {
    	
        $(".slideHabitaciones .slide-inner .slide-area").css({"height":alturaSlide+"px"})  
    	$(listaSlide[i]).html("");
    }


    let datos = new FormData();
    datos.append("ruta", ruta);





    $.ajax({

    	url:urlPrincipal+"ajax/salas.ajax.php",
    	method: "POST",
    	data: datos,
    	cache: false,
    	contentType: false,
    	processData: false,
    	dataType: "json",
    	success:function(respuesta){

    		let galeria = JSON.parse(respuesta[orden]["galeria"]);
    		
    		for(let i = 0; i < galeria.length; i++){

    			$(listaSlide[0]).html('<img class="img-fluid" src="'+urlServidor+galeria[galeria.length-1]+'">')

    			$(listaSlide[i+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[i]+'">')

    			$(listaSlide[galeria.length+1]).html('<img class="img-fluid" src="'+urlServidor+galeria[0]+'">')

    		}

    		$(".descripcionHabitacion h1").html(respuesta[orden]["estilo"]+" "+respuesta[orden]["tipo"]);

    		$(".d-salas").html(respuesta[orden]["descripcion_s"]);

            $('input[name="id-sala"]').val(respuesta[orden]["id_s"]);

    		
    	}





    })
    
    
    






})
