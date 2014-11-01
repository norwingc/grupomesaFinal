@extends('templates.admintemplate')

@section('formulario')


@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Ingresar Propiedad</strong></h4>
    </div>

{{ Form::open(array('id'=>'formulario','name'=>'formulario', 'url' => 'administrador/propiedad/add', 'method' => 'POST'), array('role' => 'form')) }}

{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}


<div class="col-md-7 datosgenerales">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Datos Generales</h3>
		</div>
		<div class="panel-body">
			{{ Form::label('encargado', 'Encargado de manejar la Propiedad') }}
			<input type="text" name="encargado" class="form-control" disabled="disable" value={{ Auth::user()->username }}>

			{{--AL DARLE GUARDAR DEBERIA GUARDAR ESTE CAMPO, YA SEA EL NOMBRE DEL ENCARGADO O EL ID COMO LLAVE FORANEA--}}

			{{ Form::label('tituloAnuncio', 'Titulo del Anuncio') }}
			{{ Form::text('titulo', null, array('placeholder' => 'Venta o Alquiler de...', 'class' => 'form-control')) }}
			{{ Form::label('estadoAnuncio', 'Estado del Anuncio') }}
			<select class="form-control" name="estado">
				<option value="1">Activa</option>{{-- activa 1 --}}
				<option value="0">Inactiva</option>
			</select>

			<div class="row">
				<div class="col-md-6">
					<div class="divblocka">

						{{ Form::label('tipoPropiedad', 'Tipo de Propiedad') }}
						<select class="form-control" name="tipopropiedad">
							<option value="Almacen">Almacén</option>
							<option value="Casa de Habitacion">Casa de Habitación</option>
							<option value="Casa de Playa">Casa de Playa</option>
							<option value="Condominio">Condominio</option>
							<option value="Consultorio">Consultorio</option>
							<option value="Apartamento">Apartamento</option>
							<option value="Edificio">Edificio</option>
							<option value="Finca">Finca</option>
							<option value="Terreno">Terreno</option>
							<option value="Locales Comerciales">Locales Comerciales</option>
							<option value="Quintas">Quintas</option>
							<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
							<option value="Negocios">Negocios</option>
							<option value="Hoteles">Hoteles</option>
							<option value="Restaurantes">Restaurantes</option>
							<option value="Oficinas">Oficinas</option>
							<option value="Bodegas">Bodegas</option>
						</select>

						{{ Form::label('PrecioVta', 'Precio de Venta') }}
						{{ Form::text('precioventa', null, array('placeholder' => 'E.j. 85000', 'class' => 'form-control')) }}

						{{ Form::label('PrecioAdmin', 'Precio de Administrador') }}
						{{ Form::text('precioadmin', null, array('placeholder' => 'E.j. 100000', 'class' => 'form-control')) }}

						{{ Form::label('estadoFisico', 'Estado Físico') }}
						<select class="form-control" name="estadofisico">
							<option value="Nuevo">Nuevo</option>
							<option value="En Construccion">En Construccion</option>
							<option value="Usado">Usado</option>
							<option value="Planos">Planos</option>
						</select>							
					</div>
				</div>
				<div class="col-md-6">
					{{ Form::label('TipoAnuncio', 'Tipo de Anuncio') }}
					<select class="form-control" name="tipoanuncio" id="tipoanuncio" onclick="activa(this.value)">
						<option value="Venta">Venta</option>
						<option value="Alquiler">Alquiler</option>
						<option value="Venta y Alquiler">Venta y Alquiler</option>
					</select>
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('PrecioAlq', 'Precio Alquiler') }}
							{{ Form::text('precioalquiler', null, array('placeholder' => 'E.j. 15000', 'class' => 'form-control datosgenerales', 'disabled' => 'disable')) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('Tiempo', 'Tiempo') }}
							<select class="form-control" name="tiempo" disabled="disable">
								<option value="Mensual">Mensual</option>
								<option value="Semanal">Semanal</option>
								<option value="Diario">Diario</option>
							</select>
						</div>
					</div>
					{{ Form::label('TipoMoneda', 'Tipo de Moneda') }}
					<select class="form-control" name="moneda">
						<option value="Dolares">Dólares $</option>
						<option value="Cordobas">Córdobas C$</option>
					</select>
					{{ Form::label('AnioConst', 'Año de Construcción') }}
					{{ Form::text('anocontruccion', null, array('placeholder' => '2004', 'class' => 'form-control')) }}
				</div>
				
			</div>
			{{ Form::label('video', 'Video') }}
			{{ Form::text('url', null, array('placeholder' => 'Introduzca el ID del video. Ejemplo: xb8R2tHF6qE', 'class' => 'form-control')) }}
			<div class="row">
				<div class="col-md-5">
					{{ Form::label('AreaUtil', 'Área Construcción') }}
					<div class="row">
						<div class="col-md-7">
							{{ Form::text('areautil', null, array('placeholder' => 'E.j. 120', 'class' => 'form-control')) }}
						</div>
						<div class="col-md-5">
							<select name="medidaconstruccion" class="form-control datosgenerales">
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								<option value="Pies²">Pies²</option>
							</select>
						</div>
					</div>
					{{ Form::label('banos', 'Baños') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="10" name="banos" />						
				</div>
				<div class="col-md-5">
					{{ Form::label('areaTerreno', 'Área Terreno') }}
					<div class="row">
						<div class="col-md-7">
							{{ Form::text('areaterreno', null, array('placeholder' => 'E.j. 80', 'class' => 'form-control')) }}
						</div>
						<div class="col-md-5">
							<select name="medidaterreno" class="form-control datosgenerales">
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								<option value="Pies²">Pies²</option>
								<option value="Manzanas">Manzanas</option>
							</select>								
						</div>
					</div>
					{{ Form::label('garaje', 'Garaje/Parqueo') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="99" name="garaje"/>
				</div>
				<div class="col-md-2">
					{{ Form::label('rooms', 'Habitaciones') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="99" name="cuartos" />
					{{ Form::label('estratos', 'Estratos') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="5" name="estratos" />
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Descripción</h3>
		</div>
		<div class="panel-body">
			{{ Form::textarea('descripcion', null, array('placeholder' => 'Breve descripción de la propiedad.', 'class' => 'form-control')) }}
		</div>
	</div>	

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Observaciones</h3>
		</div>
		<div class="panel-body">
			{{ Form::textarea('observaciones', null, array('placeholder' => 'Observaciones Privadas para el administrador y/o encargado de la propiedad.', 'class' => 'form-control')) }}
		</div>
	</div>
	
	
	{{ Form::submit('Registrar' , array('class'=> 'btn btn-primary')) }}	
	
	

</div>

<div class="col-md-5 datosgenerales">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Ubicación Geográfica</h3>
		</div>
		<div class="panel-body">
			{{ Form::label('pais', 'País') }}
			<select class="form-control" name="pais">				
				<option value="Nicaragua" selected=>Nicaragua</option>				
			</select>
			{{-- DEPARTAMETOS  --}}
			{{ Form::label('depto', 'Departamento') }}
			<?php $depto = DB::table('depto')->get();?>
			<select class="form-control departamentoA" name="departamentoA">
				@foreach($depto as $value)
				<option value='{{$value->id}}'>{{$value->opcion}}</option>
				@endforeach	
			</select>	

			{{-- MUNICIPIOS --}}
			{{ Form::label('Municipio', 'Municipio') }}
			<select class="form-control municipioA selectM" name="municipioA" id="">				
			</select>

			{{-- zonas --}}
			{{ Form::label('Zona', 'Zona') }} <a id="agregarzona" data-toggle="modal" data-target="#myModal" href="">(Agregar Zona)</a>		
			<select class="form-control" name="zona" id="selectZ">

			</select>

			{{-- MAPA --}}
			{{ Form::label('direccion', 'Dirección(Información Privada)') }}
			
			<div class="row">
				<div class="col-md-8">
					{{ Form::textarea('direccion', '', array('placeholder' => 'Dirección de la Propiedad,vista solo por el Administrador', 'class' => 'form-control', 'rows' => '4')) }}
				</div>
				
				<div class="col-md-4">
				
					<button class="btn btn-primary botonPasar" type="button" id="pasar">Pasar al mapa</button>	
					{{-- para que les funcione la funcion de arrastrar el chinche primero tienen que dar click a pasar al mapa --}}
				</div>

			</div>	
			<div id="map_canvas" style="margin-top:1em; height:300px;"></div>
			
{{-- estos input los deje solo para que miraran uds como se hace... pero, despues tienen q pasarlos a type="hidden" --}}	
			<input type="hidden" name="lat" id="lat"> 
			<input type="hidden" name="lon"  id="lon">

		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Propietario de la Vivienda</h3>
		</div>
		<div class="panel-body">
			<select id="propietario" class="form-control" name="propietario">
				<option>Seleccionar Propietario</option>
				<?php $propietario = DB::table('propietarios')->get();?>
				@foreach($propietario as $value)
				<option value='{{$value->id}}'>{{$value->nombre}} {{$value->apellido}}</option>
				@endforeach
			</select>
			{{ Form::label('nombre', 'Nombre') }}
			 {{ Form::text('nombre',  null, array('placeholder' => 'Nombre', 'class' => 'form-control','disabled')) }} 
			{{ Form::label('apellidos', 'Apellidos') }}
			{{ Form::text('apellidos', null, array('placeholder' => 'Apellidos', 'class' => 'form-control', 'disabled')) }} 	
			{{ Form::label('email', 'E-mail') }}
			{{ Form::email('email', null, array('placeholder' => 'example@example.com', 'class' => 'form-control', 'disabled')) }}
			{{ Form::label('telefono', 'Telefono') }}
			{{ Form::text('telefono', null, array('placeholder' => 'Convencional y/o Celular', 'class' => 'form-control', 'disabled')) }}
			{{ Form::label('celular', 'Celular') }}
			{{ Form::text('celular', null, array('placeholder' => ' Celular', 'class' => 'form-control', 'disabled')) }}		
				</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Descripción Adicional</h3>
		</div>
		<div class="panel-body row">
			<div class="col-md-6">
				<input type="checkbox" name="detalle[]" value="Sala y Comedor">Sala y Comedor<br>
				<input type="checkbox" name="detalle[]" value="Cocina">Cocina<br>
				<input type="checkbox" name="detalle[]" value="Patio">Patio<br>
				<input type="checkbox" name="detalle[]" value="Piscina">Piscina<br>
				<input type="checkbox" name="detalle[]" value="Aire acondicionado">Aire acondicionado<br>
				<input type="checkbox" name="detalle[]" value="Aire acondicionado central">Aire acondicionado central<br>
				<input type="checkbox" name="detalle[]" value="Cuarto y baño de empleada">Cuarto y baño de empleada<br>
				<input type="checkbox" name="detalle[]" value="Walk-in-closet">Walk-in-closet<br>
				<input type="checkbox" name="detalle[]" value="Deposito o bodega">Deposito o bodega<br>
				<input type="checkbox" name="detalle[]" value="Balcón o Terraza">Balcón o Terraza<br>
				<input type="checkbox" name="detalle[]" value="Calle sin salida">Calle sin salida<br>
				<input type="checkbox" name="detalle[]" value="Cerca de escuelas">Cerca de escuelas<br>
				<input type="checkbox" name="detalle[]" value="Terreno en esquina">Terreno en esquina<br>
				<input type="checkbox" name="detalle[]" value="Frente al lago">Frente al lago<br>
				<input type="checkbox" name="detalle[]" value="Frente al mar">Frente al mar<br>
			</div>
			<div class="col-md-6">
				<input type="checkbox" name="detalle[]" value="Jardín">Jardín<br>
				<input type="checkbox" name="detalle[]" value="Garaje">Garaje<br>
				<input type="checkbox" name="detalle[]" value="Garaje techado">Garaje techado<br>
				<input type="checkbox" name="detalle[]" value="Estudio">Estudio<br>
				<input type="checkbox" name="detalle[]" value="Área social">Área social<br>
				<input type="checkbox" name="detalle[]" value="Gimnasio">Gimnasio<br>
				<input type="checkbox" name="detalle[]" value="Lavanderia interna">Lavanderia interna<br>
				<input type="checkbox" name="detalle[]" value="Parque infantil">Parque infantil<br>
				<input type="checkbox" name="detalle[]" value="Salón de fiestas">Salón de fiestas<br>
				<input type="checkbox" name="detalle[]" value="Vigilancia 24Hrs">Vigilancia 24Hrs<br>
				<input type="checkbox" name="detalle[]" value="Frente al rio">Frente al rio<br>
				<input type="checkbox" name="detalle[]" value="Vista a la montaña">Vista a la montaña<br>
				<input type="checkbox" name="detalle[]" value="Vista al lago">Vista al lago<br>
				<input type="checkbox" name="detalle[]" value="Vista al mar">Vista al mar<br>
				<input type="checkbox" name="detalle[]" value="Otros">Otros<br>
			</div>			
		</div>
	</div>
</div>

<input type="hidden" name="id_usuario" id="id_usuario" value="{{Auth::user()->username}}">



{{ Form::close() }}


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="myModalLabel">Agrega una Zona</h4>
			</div>
			<div class="modal-body">
				<!-- form --> 

				{{ Form::open(array('url' => 'administrador/zone', 'method' => 'POST'), array('role' => 'form')) }}

				{{-- DEPARTAMETOS  --}}
				{{ Form::label('depto', 'Departamento') }}
				<?php $depto = DB::table('depto')->get(); ?>
				<select class="form-control departamentoA" name="departamentoA">
					@foreach($depto as $value)
					<option value='{{$value->id}}'>{{$value->opcion}}</option>
					@endforeach	
				</select>	

				{{-- MUNICIPIOS --}}
				{{ Form::label('Municipio', 'Municipio') }}
				<select class="form-control municipioA selectM" name="municipioA" >				
				</select>

				{{-- zonas --}}
				{{ Form::label('Zona', 'Zona') }}
				{{ Form::text('zona', null, array('class' => 'form-control'))}}

				<!-- form -->

			</div>
			<div class="modal-footer">
				{{ Form::submit('Guardar Zona' , array('class'=> 'btn btn-primary')) }}

				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop

@section('js')
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false"></script>
<script>
	
	var lat = null;
	var lng = null;
	var map = null;
	var geocoder = null;
	var marker = null;

	$(document).ready(function(){
	     //obtenemos los valores en caso de tenerlos guardados en la BD
	     lat = jQuery('#lat').val();
	     lng = jQuery('#lon').val();

	    
	     $('#pasar').click(function(){
	        codeAddress();
	        return false;
	     });
	   
	    initialize();
	});

	function initialize() {
     
      geocoder = new google.maps.Geocoder();
        
       //Si hay valores creamos un objeto Latlng
       if(lat !='' && lng != '')
      {
         var latLng = new google.maps.LatLng(lat,lng);
      }
      else
      {
        //Si no creamos el objeto con una latitud cualquiera 
         var latLng = new google.maps.LatLng(12.13282,-86.2504);
      }
     
       var myOptions = {
          center: latLng,//centro del mapa
          zoom: 15,//zoom del mapa
          mapTypeId: google.maps.MapTypeId.ROADMAP //tipo de mapa, carretera, satelite etc etc
        };
        //creamos el mapa con las opciones anteriores y le pasamos el elemento div
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
         
        //creamos el marcador en el mapa
        marker = new google.maps.Marker({
            map: map,//el mapa ya creado
            position: latLng,//objeto con latitud y longitud
            draggable: true //que el marcador se pueda arrastrar
        });
        
        updatePosition(latLng);  
    }


    function codeAddress() {
         
        //obtengo la direccion del formulario
        var address = document.getElementById("direccion").value;
        
        geocoder.geocode( { 'address': address}, function(results, status) {         
	        //si el estado de la llamado es OK
	        if (status == google.maps.GeocoderStatus.OK) {
	           
	            map.setCenter(results[0].geometry.location);           
	            marker.setPosition(results[0].geometry.location);             
	            updatePosition(results[0].geometry.location);             
	           
	            //actualize el formulario con las nuevas coordenadas
	            google.maps.event.addListener(marker, 'dragend', function(){
	                updatePosition(marker.getPosition());
	            });
	      	}else {
	          //si no es OK devuelvo error
	          alert("No podemos encontrar la direccion T_T");
	      	}
	    });
	}
   
  //funcion que simplemente actualiza los campos del formulario
  function updatePosition(latLng) {
       
       $('#lat').val(latLng.lat());
       $('#lon').val(latLng.lng());   
  }		

</script>

<script>
	function activa(v){ 
if(v=='Alquiler'){
	document.formulario.precioventa.disabled = true;
	document.formulario.precioventa.value = "";
	document.formulario.precioalquiler.disabled = false;
	document.formulario.tiempo.disabled = false;
} 
else if(v=='Venta'){
	document.formulario.precioventa.disabled = false;
	document.formulario.precioalquiler.disabled = true;
	document.formulario.precioalquiler.value = "";
	document.formulario.tiempo.disabled = true;

}else if(v=='Venta y Alquiler'){
	document.formulario.precioventa.disabled = false;
	document.formulario.precioalquiler.disabled = false;
	document.formulario.tiempo.disabled = false;
} 
} 
</script> 

@stop