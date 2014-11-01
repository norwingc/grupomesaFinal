$(document).ready(main);


function main(){

	$( window ).resize(function() {
		if($(window).width() > 1024){
			tamSlider();
		}else{
			$('.slider img').css({'height':'auto'});					
		}	
	});	
	
	tamSlider();

	$('.departamento').change(function(){

		var id = $(this).val();

		$('.select2').html();
		var template = "";
		var aux = "Todos";
		var aux1 = "Mun";

		datsend = "id=" + id;

		$.ajax({
			type: 'POST',
			url: 'cargarmunicipio',
			data: datsend,
			success : function(data){	

			
				template += "<option value='"+  aux  +"'>"+ aux  +"</option>";
				$('#select2').html(template);

				for(datos in data.municipio ){	

					template += "<option value='"+  data.municipio[datos].id  +"'>"+ data.municipio[datos].opcion  +"</option>";
					$('.select2').html(template);

				}

			},
			error: function(){
				alert('error al guardar');	
			}

		});				

	});

	$('.departamentoA').change(function(){

		var id = $(this).val();

		$('.selectM').html();
		var template = "";
		var aux = "Todos";
		var aux1 = "Mun";

		datsend = "id=" + id;

		$.ajax({
			type: 'POST',
			url: 'cargarmunicipio',
			data: datsend,
			success : function(data){	

			
				

				for(datos in data.municipio ){	

					template += "<option value='"+  data.municipio[datos].id  +"'>"+ data.municipio[datos].opcion  +"</option>";
					$('.selectM').html(template);

				}

			},
			error: function(){
				alert('error al guardar');	
			}

		});				

	});


	$('.municipio').change(function(){

		var id = $(this).val();

		$('#select3').html();


		var template = "";
		var aux = "Todos";
		var aux1 = "Zone";

		datsend = "id=" + id;

		$.ajax({
			type: 'POST',
			url: 'cargarzona',
			data: datsend,
			success : function(data){	

				template += "<option value='"+  aux1  +"'>"+ aux  +"</option>";
				$('#select3').html(template);

				for(datos in data.zona ){	
					

					template += "<option value='"+  data.zona[datos].opcion  +"'>"+ data.zona[datos].opcion  +"</option>";	
					//alert(template);
					$('#select3').html(template);

				}

			},
			error: function(){
				alert('error al guardar');	
			}

		});				

	});

	$('.municipioA').change(function(){

		var id = $(this).val();

		$('#selectZ').html();


		var template = "";
		var aux = "Todos";
		var aux1 = "Zone";

		datsend = "id=" + id;

		$.ajax({
			type: 'POST',
			url: 'cargarzona',
			data: datsend,
			success : function(data){	


				for(datos in data.zona ){	
					

					template += "<option value='"+  data.zona[datos].opcion  +"'>"+ data.zona[datos].opcion  +"</option>";	
					//alert(template);
					$('#selectZ').html(template);

				}

			},
			error: function(){
				alert('error al guardar');	
			}

		});				

	});


	$('.propi').change(function(){

		var id = $(this).val();
		alert(id);
		$('#nombrep').html();
		$('#apellidop').html();
		$('#correop').html();
		$('#telp').html();


		var nombre = "";
		var apellido = "";
		var correo = "";
		var telefono = "";


		datsend = "id=" + id;

		$.ajax({
			type: 'POST',
			url: 'cargarpropi',
			data: datsend,
			success : function(data){	

				nombre= data.propi[datos].nombre;
				apellido= data.propi[datos].apellido;
				correo= data.propi[datos].correo;
				telefono=	data.propi[datos].telefono; 

				alert(nombre);
				alert(apellido);
				alert(correo);
				alert(telefono);



					//alert(template);
					$('#nombrep').html(nombre);
					$('#apellidop').html(apellido);
					$('#correop').html(correo);
					$('#telp').html(telefono);									


				},
				error: function(){
					alert('error al guardar');	
				}

			});			

	});

/////////////////////////////
	/////////////////////////
	$('#propietario').change(function(){
		var id = $(this).val();

		var nombre = $('#nombre');
		var apellidos = $('#apellidos');
		var email = $('#email');
		var telefono = $('#telefono');
		var celular = $('#celular');

		if(id > 0){

			nombre.attr("disabled", "disable"); 
			apellidos.attr("disabled", "disable"); 
			email.attr("disabled", "disable"); 
			telefono.attr("disabled", "disable");
			celular.attr("disabled", "disable");  

			var datasend = 'id=' + id;


			$.ajax({
				type: 'POST',
				url: 'getpropietario',
				data: datasend,
				success : function(data){	

					nombre.val(data.propietario.nombre);
					apellidos.val(data.propietario.apellido);
					email.val(data.propietario.email);
					telefono.val(data.propietario.telefono);
					celular.val(data.propietario.celular);
					
				},
				error: function(){
					alert('error');	
				}

			});


		}else{
			nombre.removeAttr( "disabled" );
			apellidos.removeAttr( "disabled" );
			email.removeAttr( "disabled" );
			telefono.removeAttr( "disabled" );
			celular.removeAttr( "disabled" );
		}

	});
/////////////////////////////////////////////////////////////////
	
////////////////////////////////////////////////////////////////


}

function tamSlider(){
	if($(window).width() < 1024){
		$('.slider img').css({'height':'auto'});		
	}else{
		$('.slider img').css({'height': $(window).height() - 80});	
	}

	

}
