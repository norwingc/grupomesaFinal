@extends('templates.admintemplate')

@section('formulario')


@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Modificar Propiedad</strong></h4>
    </div>

{{ Form::open(array('id'=>'formulario','name'=>'formulario', 'url' => 'admin/modPropiedad/' .$propiedad->id, 'method' => 'POST'), array('role' => 'form')) }}

{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}


<div class="col-md-7 datosgenerales">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Datos Generales</h3>
		</div>
		<div class="panel-body">
			{{ Form::label('encargado', 'Encargado de manejar la Propiedad') }}
			
			<?php $user = DB::table('usuarios')->get(); ?>

			<select class="form-control departamento" name="id_usuario">
				@foreach($user as $value)
					<option value="{{$value->username}}">{{$value->username}}</option>
				@endforeach
			</select>
			<!-- <input type="text" name="encargado" class="form-control" disabled="disable" value={{ $propiedad->id_usuario }}>
 -->
			{{--AL DARLE GUARDAR DEBERIA GUARDAR ESTE CAMPO, YA SEA EL NOMBRE DEL ENCARGADO O EL ID COMO LLAVE FORANEA--}}

			{{ Form::label('tituloAnuncio', 'Titulo del Anuncio') }}
			{{ Form::text('titulo', $propiedad->titulo, array('placeholder' => 'Venta o Alquiler de...', 'class' => 'form-control')) }}
			{{ Form::label('estadoAnuncio', 'Estado del Anuncio') }}
			<select class="form-control" name="estado">
			@if($propiedad->estado == '1' )
				<option value="1">Activa</option>{{-- activa 1 --}}
				<option value="0">Inactiva</option>
				@else
				<option value="0">Inactiva</option>
				<option value="1">Activa</option>{{-- activa 1 --}}
				@endif
				
			</select>

			<div class="row">
				<div class="col-md-6">
					<div class="divblocka">

						{{ Form::label('tipoPropiedad', 'Tipo de Propiedad') }}

						<select class="form-control" name="tipopropiedad">
							@if($propiedad->tipopropiedad == 'Almacen')
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitación">Casa de Habitación</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Casa de Habitacion')
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Almacen">Almacén</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Casa de Playa')
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Almacen">Almacén</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Condominio')
								<option value="Condominio">Condominio</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Almacen">Almacén</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Consultorio')
								<option value="Consultorio">Consultorio</option>
								<option value="Condominio">Condominio</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Almacen">Almacén</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Apartamento')
								<option value="Apartamento">Apartamento</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Edificio')
								<option value="Edificio">Edificio</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
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
							@endif

							@if($propiedad->tipopropiedad == 'Finca')
								<option value="Finca">Finca</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Terreno">Terreno</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
							<option value="Quintas">Quintas</option>
							<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
							<option value="Negocios">Negocios</option>
							<option value="Hoteles">Hoteles</option>
							<option value="Restaurantes">Restaurantes</option>
							<option value="Oficinas">Oficinas</option>
							<option value="Bodegas">Bodegas</option>
							@endif

							@if($propiedad->tipopropiedad == 'Terreno')
								<option value="Terreno">Terreno</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
							<option value="Quintas">Quintas</option>
							<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
							<option value="Negocios">Negocios</option>
							<option value="Hoteles">Hoteles</option>
							<option value="Restaurantes">Restaurantes</option>
							<option value="Oficinas">Oficinas</option>
							<option value="Bodegas">Bodegas</option>
								
							@endif
							
							
							
							@if($propiedad->tipopropiedad == 'Locales Comerciales')
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								<option value="Quintas">Quintas</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Negocios">Negocios</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif

							@if($propiedad->tipopropiedad == 'Quintas')
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Negocios">Negocios</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif

							@if($propiedad->tipopropiedad == 'Apartamentos Amoblados')
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								<option value="Negocios">Negocios</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif
							
							@if($propiedad->tipopropiedad == 'Negocios')
								<option value="Negocios">Negocios</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								
								<option value="Hoteles">Hoteles</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif
							
							@if($propiedad->tipopropiedad == 'Hoteles')
								<option value="Hoteles">Hoteles</option>
								<option value="Negocios">Negocios</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								
								
								<option value="Restaurantes">Restaurantes</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif
							
							@if($propiedad->tipopropiedad == 'Restaurantes')
								<option value="Restaurantes">Restaurantes</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Negocios">Negocios</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								
								
								
								<option value="Oficinas">Oficinas</option>
								<option value="Bodegas">Bodegas</option>
							@endif
							
							@if($propiedad->tipopropiedad == 'Oficinas')
								<option value="Oficinas">Oficinas</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Negocios">Negocios</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								
								
								
								
								<option value="Bodegas">Bodegas</option>
							@endif
							
							@if($propiedad->tipopropiedad == 'Bodegas')
								<option value="Bodegas">Bodegas</option>
								<option value="Oficinas">Oficinas</option>
								<option value="Restaurantes">Restaurantes</option>
								<option value="Hoteles">Hoteles</option>
								<option value="Negocios">Negocios</option>
								<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
								<option value="Quintas">Quintas</option>
								<option value="Locales Comerciales">Locales Comerciales</option>
								<option value="Almacen">Almacén</option>
								<option value="Casa de Habitacion">Casa de Habitación</option>
								<option value="Casa de Playa">Casa de Playa</option>
								<option value="Condominio">Condominio</option>
								<option value="Consultorio">Consultorio</option>
								<option value="Apartamento">Apartamento</option>
								<option value="Edificio">Edificio</option>
								<option value="Finca">Finca</option>
								<option value="Terreno">Terreno</option>
								
								
								
								
								
								
								
								
							@endif


						</select>

						{{ Form::label('PrecioVta', 'Precio de Venta') }}
						{{ Form::text('precioventa', $propiedad->precioventa, array('placeholder' => 'E.j. 85000', 'class' => 'form-control')) }}

						{{ Form::label('PrecioAdmin', 'Precio de Administrador') }}
						{{ Form::text('precioadmin', $propiedad->precioadmin, array('placeholder' => 'E.j. 100000', 'class' => 'form-control')) }}

						{{ Form::label('estadoFisico', 'Estado Físico') }}
						<select class="form-control" name="estadofisico">
						@if($propiedad->estadofisico == 'Nuevo')
							<option value="Nuevo">Nuevo</option>
							<option value="En Construccion">En Construccion</option>
							<option value="Usado">Usado</option>
							<option value="Planos">Planos</option>
							@endif
						@if($propiedad->estadofisico == 'En Construccion')
							<option value="En Construccion">En Construccion</option>
							<option value="Nuevo">Nuevo</option>
							<option value="Usado">Usado</option>
							<option value="Planos">Planos</option>
							@endif
						@if($propiedad->estadofisico == 'Usado')
							<option value="Usado">Usado</option>
							<option value="Nuevo">Nuevo</option>
							<option value="En Construccion">En Construccion</option>
							<option value="Planos">Planos</option>
							@endif
						@if($propiedad->estadofisico == 'Planos')
							<option value="Planos">Planos</option>
							<option value="Nuevo">Nuevo</option>
							<option value="Usado">Usado</option>
							<option value="En Construccion">En Construccion</option>
							
							@endif
						
							
							
							
							
						</select>							
					</div>
				</div>
				<div class="col-md-6">
					{{ Form::label('TipoAnuncio', 'Tipo de Anuncio') }}
					<select class="form-control" name="tipoanuncio" id="tipoanuncio" onclick="activa(this.value)">
						@if($propiedad->tipoanuncio =='Venta')
							<option value="Venta">Venta</option>
							<option value="Alquiler">Alquiler</option>
							<option value="Venta y Alquiler">Venta y Alquiler</option>
						@endif
						@if($propiedad->tipoanuncio =='Alquiler')
							<option value="Alquiler">Alquiler</option>
							<option value="Venta">Venta</option>
							<option value="Venta y Alquiler">Venta y Alquiler</option>
						@endif
						@if($propiedad->tipoanuncio =='Venta y Alquiler')
							<option value="Venta y Alquiler">Venta y Alquiler</option>
							<option value="Alquiler">Alquiler</option>
							<option value="Venta">Venta</option>
						@endif
					</select>
					<div class="row">
						<div class="col-md-6">
							{{ Form::label('PrecioAlq', 'Precio Alquiler') }}
							{{ Form::text('precioalquiler', $propiedad->precioalquiler, array('placeholder' => 'E.j. 15000', 'class' => 'form-control datosgenerales')) }}
						</div>
						<div class="col-md-6">
							{{ Form::label('Tiempo', 'Tiempo') }}
							<select class="form-control" name="tiempo">
							@if($propiedad->tiempo == 'Mensual')
								<option value="Mensual">Mensual</option>
								<option value="Semanal">Semanal</option>
								<option value="Diario">Diario</option>
							@endif
							@if($propiedad->tiempo == 'Semanal')
								<option value="Semanal">Semanal</option>
								<option value="Mensual">Mensual</option>
								<option value="Diario">Diario</option>
							@endif
							@if($propiedad->tiempo == 'Diario')
								<option value="Diario">Diario</option>
								<option value="Mensual">Mensual</option>
								<option value="Semanal">Semanal</option>
							@endif
							</select>
						</div>
					</div>
					{{ Form::label('TipoMoneda', 'Tipo de Moneda') }}
					<select class="form-control" name="moneda">
					@if($propiedad->moneda == 'Dolares')
						<option value="Dolares">Dólares $</option>
						<option value="Cordobas">Córdobas C$</option>
					@endif
					@if($propiedad->moneda == 'Cordobas')
						<option value="Cordobas">Córdobas C$</option>
						<option value="Dolares">Dólares $</option>
					@endif
					</select>
					{{ Form::label('AnioConst', 'Año de Construcción') }}
					{{ Form::text('anocontruccion', $propiedad->anocontruccion, array('placeholder' => '2004', 'class' => 'form-control')) }}
				</div>
				
			</div>
			{{ Form::label('video', 'Video') }}
			{{ Form::text('url', $propiedad->url, array('placeholder' => 'Introduzca el ID del video. Ejemplo: xb8R2tHF6qE', 'class' => 'form-control')) }}
			<div class="row">
				<div class="col-md-5">
					{{ Form::label('AreaUtil', 'Área Construcción') }}
					<div class="row">
						<div class="col-md-7">
							{{ Form::text('areautil', $propiedad->areautil, array('placeholder' => 'E.j. 120', 'class' => 'form-control')) }}
						</div>
						<div class="col-md-5">
							<select name="medidaconstruccion" class="form-control datosgenerales">
							@if($propiedad->medidaconstruccion == 'M²')
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								<option value="Pies²">Pies²</option>
							@endif
							@if($propiedad->medidaconstruccion == 'Varas²')
								<option value="Varas²">Varas²</option>
								<option value="M²"><p>M²</option>
								<option value="Pies²">Pies²</option>
							@endif
							@if($propiedad->medidaconstruccion == 'Pies²')
								<option value="Pies²">Pies²</option>
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
							@endif
							</select>
						</div>
					</div>
					{{ Form::label('banos', 'Baños') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="99" name="banos" value="{{$propiedad->banos}}" />						
				</div>
				<div class="col-md-5">
					{{ Form::label('areaTerreno', 'Área Terreno') }}
					<div class="row">
						<div class="col-md-7">
							{{ Form::text('areaterreno', $propiedad->areaterreno, array('placeholder' => 'E.j. 80', 'class' => 'form-control')) }}
						</div>
						<div class="col-md-5">
							<select name="medidaterreno" class="form-control datosgenerales">
							@if($propiedad->medidaterreno == 'M²')
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								<option value="Pies²">Pies²</option>
								<option value="Manzanas">Manzanas</option>
							@endif
							@if($propiedad->medidaterreno == 'Varas²')
								<option value="Varas²">Varas²</option>
								<option value="M²"><p>M²</option>
								<option value="Pies²">Pies²</option>
								<option value="Manzanas">Manzanas</option>
							@endif
							@if($propiedad->medidaterreno == 'Pies²')
								<option value="Pies²">Pies²</option>
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								<option value="Manzanas">Manzanas</option>
							@endif
							@if($propiedad->medidaterreno == 'Manzanas')
							<option value="Manzanas">Manzanas</option>
								<option value="Pies²">Pies²</option>
								<option value="M²"><p>M²</option>
								<option value="Varas²">Varas²</option>
								
							@endif
							</select>								
						</div>
					</div>
					{{ Form::label('garaje', 'Garaje/Parqueo') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="99" name="garaje" value="{{$propiedad->garaje}}" />
				</div>
				<div class="col-md-2">
					{{ Form::label('rooms', 'Habitaciones') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="99" name="cuartos" value="{{$propiedad->cuartos}}" />
					{{ Form::label('estratos', 'Estratos') }}
					<input type="number" class="form-control" placeholder="0" min="0" max="5" name="estratos" value="{{$propiedad->estratos}}" />
				</div>
			</div>
		</div>
	</div>

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Descripción</h3>
		</div>
		<div class="panel-body">
			{{ Form::textarea('descripcion', $propiedad->descripcion, array('placeholder' => 'Breve descripción de la propiedad.', 'class' => 'form-control')) }}
		</div>
	</div>	

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Observaciones</h3>
		</div>
		<div class="panel-body">
			{{ Form::textarea('observaciones', $propiedad->observaciones, array('placeholder' => 'Observaciones Privadas para el administrador y/o encargado de la propiedad.', 'class' => 'form-control')) }}
		</div>
	</div>	
	
	
{{ Form::submit('Guardar Cambios' , array('class'=> 'btn btn-primary')) }}

</div>

<div class="col-md-5 datosgenerales">

	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Ubicación Geográfica</h3>
		</div>
		<div class="panel-body">
			{{ Form::label('pais', 'País') }}
			<select class="form-control" name="pais">				
				<option value="NI" selected=>Nicaragua</option>				
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
			
			<div class="input-group row">
				<div class="col-md-8">
					{{ Form::textarea('direccion', $propiedad->direccion, array('placeholder' => 'Dirección de la Propiedad,vista solo por el Administrador', 'rows' => '4', 'class' => 'form-control')) }}
				</div>
				<div class="col-md-4">
					<button class="btn btn-primary" type="button" id="pasar">Pasar al mapa</button>	
					{{-- para que les funcione la funcion de arrastrar el chinche primero tienen que dar click a pasar al mapa --}}
				</div>

			</div>	
			<div id="map_canvas" style="margin-top:1em; height:300px;"></div>
			
{{-- estos input los deje solo para que miraran uds como se hace... pero, despues tienen q pasarlos a type="hidden" --}}	
			<input type="hidden" name="lat" id="lat" value="{{$propiedad->latitud}}"> 
			<input type="hidden" name="lon"  id="lon" value="{{$propiedad->longitud}}">

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
				<?php $propie = DB::table('propietarios')->where('id', '=', $propiedad->id_propietario)->first();?>
				@foreach($propietario as $value)
				<option value='{{$value->id}}'>{{$value->nombre}} {{$value->apellido}}</option>
				
				
				@endforeach
			</select>
			{{ Form::label('nombre', 'Nombre') }}
			 {{ Form::text('nombre',  $propie->nombre, array('placeholder' => 'Nombre', 'class' => 'form-control','disabled')) }} 
			{{ Form::label('apellidos', 'Apellidos') }}
			{{ Form::text('apellidos', $propie->apellido, array('placeholder' => 'Apellidos', 'class' => 'form-control', 'disabled')) }} 	
			{{ Form::label('email', 'E-mail') }}
			{{ Form::email('email', $propie->email, array('placeholder' => 'example@example.com', 'class' => 'form-control', 'disabled')) }}
			{{ Form::label('telefono', 'Telefono') }}
			{{ Form::text('telefono', $propie->telefono, array('placeholder' => 'Convencional', 'class' => 'form-control', 'disabled')) }}	
			{{ Form::label('celular', 'Celular') }}
			{{ Form::text('celular', $propie->celular, array('placeholder' => 'Celular', 'class' => 'form-control', 'disabled')) }}	
				</div>
	</div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Descripción Adicional</h3>
		</div>
		<div class="panel-body row">
			<div class="col-md-6">
			<?php 
					$detail = explode(",", $propiedad->detallecasa);
					$syc = false;
					$coc = false;
					$pat = false;
					$pis = false;
					$ac = false;	
					$acc = false;
					$cbe = false;
					$wic = false;
					$db = false;
					$bt = false;
					$css = false;
					$cde = false;
					$te = false;
					$fl = false;
					$fm = false;
					$jd = false;
					$gar = false;
					$gt = false;
					$est = false;
					$as = false;
					$gym = false;
					$li = false;
					$pi = false;
					$sf = false;
					$vig = false;
					$fr = false;
					$vm = false;
					$vl = false;
					$vam = false;
					$otr = false;
				?>

				@foreach($detail as $value)	
					@if($value == 'Sala y Comedor')
						<?php $syc = true;?>	
					@endif
				
					@if($value == 'Cocina')
						<?php $coc = true;?>	
					@endif

					@if($value == 'Patio')
						<?php $pat = true;?>	
					@endif

					@if($value == 'Piscina')
						<?php $pis = true;?>	
					@endif

					@if($value == 'Aire acondicionado')
						<?php $ac = true;?>	
					@endif

					@if($value == 'Aire acondicionado central')
						<?php $acc = true;?>	
					@endif

					@if($value == 'Cuarto y baño de empleada')
						<?php $cbe = true;?>	
					@endif

					@if($value == 'Walk-in-closet')
						<?php $wic = true;?>	
					@endif

					@if($value == 'Deposito o bodega')
						<?php $db = true;?>	
					@endif

					@if($value == 'Balcón o Terraza')
						<?php $bt = true;?>	
					@endif

					@if($value == 'Calle sin salida')
						<?php $css = true;?>	
					@endif

					@if($value == 'Cerca de escuelas')
						<?php $cde = true;?>	
					@endif

					@if($value == 'Terreno en esquina')
						<?php $te = true;?>	
					@endif

					@if($value == 'Frente al lago')
						<?php $fl = true;?>	
					@endif

					@if($value == 'Frente al mar')
						<?php $fm = true;?>	
					@endif

					@if($value == 'Jardín')
						<?php $jd = true;?>	
					@endif

					@if($value == 'Garaje')
						<?php $gar = true;?>	
					@endif

					@if($value == 'Garaje techado')
						<?php $gt = true;?>	
					@endif

					@if($value == 'Estudio')
						<?php $est = true;?>	
					@endif

					@if($value == 'Área social')
						<?php $as = true;?>	
					@endif

					@if($value == 'Gimnasio')
						<?php $gym = true;?>	
					@endif

					@if($value == 'Lavanderia interna')
						<?php $li = true;?>	
					@endif

					@if($value == 'Parque infantil')
						<?php $pi = true;?>	
					@endif

					@if($value == 'Salón de fiestas')
						<?php $sf = true;?>	
					@endif

					@if($value == 'Vigilancia 24Hrs')
						<?php $vig = true;?>	
					@endif

					@if($value == 'Frente al rio')
						<?php $fr = true;?>	
					@endif

					@if($value == 'Vista a la montaña')
						<?php $vm = true;?>	
					@endif

					@if($value == 'Vista al lago')
						<?php $vl = true;?>	
					@endif

					@if($value == 'Vista al mar')
						<?php $vam = true;?>	
					@endif

					@if($value == 'Otros')
						<?php $otr = true;?>	
					@endif

					
		
			@endforeach
				
				@if($syc == true)
					<input type="checkbox" name="detalle[]" value="Sala y Comedor" checked>Sala y Comedor<br>
				@else
					<input type="checkbox" name="detalle[]" value="Sala y Comedor" >Sala y Comedor<br>
				@endif

				@if($coc == true)
					<input type="checkbox" name="detalle[]" value="Cocina" checked>Cocina<br>
				@else
					<input type="checkbox" name="detalle[]" value="Cocina">Cocina<br>
				@endif
				
				@if($pat == true)
					<input type="checkbox" name="detalle[]" value="Patio" checked>Patio<br>
				@else
					<input type="checkbox" name="detalle[]" value="Patio">Patio<br>
				@endif

				@if($pis == true)
					<input type="checkbox" name="detalle[]" value="Piscina" checked>Piscina<br>
				@else
					<input type="checkbox" name="detalle[]" value="Piscina">Piscina<br>
				@endif

				@if($ac == true)
					<input type="checkbox" name="detalle[]" value="Aire acondicionado" checked>Aire acondicionado<br>
				@else
					<input type="checkbox" name="detalle[]" value="Aire acondicionado">Aire acondicionado<br>
				@endif
				
				@if($acc == true)
					<input type="checkbox" name="detalle[]" value="Aire acondicionado central" checked>Aire acondicionado central<br>
				@else
					<input type="checkbox" name="detalle[]" value="Aire acondicionado central">Aire acondicionado central<br>
				@endif

				@if($cbe == true)
					<input type="checkbox" name="detalle[]" value="Cuarto y baño de empleada" checked>Cuarto y baño de empleada<br>
				@else
					<input type="checkbox" name="detalle[]" value="Cuarto y baño de empleada">Cuarto y baño de empleada<br>
				@endif

				@if($wic == true)
					<input type="checkbox" name="detalle[]" value="Walk-in-closet" checked>Walk-in-closet<br>
				@else
					<input type="checkbox" name="detalle[]" value="Walk-in-closet">Walk-in-closet<br>
				@endif
				
				@if($db == true)
					<input type="checkbox" name="detalle[]" value="Deposito o bodega" checked>Deposito o bodega<br>
				@else
					<input type="checkbox" name="detalle[]" value="Deposito o bodega">Deposito o bodega<br>
				@endif

				@if($bt == true)
					<input type="checkbox" name="detalle[]" value="Balcón o Terraza" checked>Balcón o Terraza<br>
				@else
					<input type="checkbox" name="detalle[]" value="Balcón o Terraza">Balcón o Terraza<br>
				@endif

				@if($css == true)
					<input type="checkbox" name="detalle[]" value="Calle sin salida" checked>Calle sin salida<br>
				@else
					<input type="checkbox" name="detalle[]" value="Calle sin salida">Calle sin salida<br>
				@endif

				@if($cde == true)
					<input type="checkbox" name="detalle[]" value="Cerca de escuelas" checked>Cerca de escuelas<br>
				@else
					<input type="checkbox" name="detalle[]" value="Cerca de escuelas">Cerca de escuelas<br>
				@endif

				@if($te == true)
					<input type="checkbox" name="detalle[]" value="Terreno en esquina" checked>Terreno en esquina<br>
				@else
					<input type="checkbox" name="detalle[]" value="Terreno en esquina">Terreno en esquina<br>
				@endif

				@if($fl == true)
					<input type="checkbox" name="detalle[]" value="Frente al lago" checked>Frente al lago<br>
				@else
					<input type="checkbox" name="detalle[]" value="Frente al lago">Frente al lago<br>
				@endif

				@if($fm == true)
					<input type="checkbox" name="detalle[]" value="Frente al mar" checked>Frente al mar<br>
				@else
					<input type="checkbox" name="detalle[]" value="Frente al mar">Frente al mar<br>
				@endif

			</div>
			<div class="col-md-6">
				
					

			@if($jd == true)
					<input type="checkbox" name="detalle[]" value="Jardín" checked>Jardín<br>
				@else
					<input type="checkbox" name="detalle[]" value="Jardín">Jardín<br>
				@endif

				@if($gar == true)
					<input type="checkbox" name="detalle[]" value="Garaje" checked>Garaje<br>
				@else
					<input type="checkbox" name="detalle[]" value="Garaje">Garaje<br>
				@endif
				
				@if($gt == true)
					<input type="checkbox" name="detalle[]" value="Garaje techado" checked>Garaje techado<br>
				@else
					<input type="checkbox" name="detalle[]" value="Garaje techado">Garaje techado<br>
				@endif

				@if($est == true)
					<input type="checkbox" name="detalle[]" value="Estudio" checked>Estudio<br>
				@else
					<input type="checkbox" name="detalle[]" value="Estudio">Estudio<br>
				@endif
				
				@if($as == true)
					<input type="checkbox" name="detalle[]" value="Área social" checked>Área social<br>
				@else
					<input type="checkbox" name="detalle[]" value="Área social">Área social<br>
				@endif

				@if($gym == true)
					<input type="checkbox" name="detalle[]" value="Gimnasio" checked>Gimnasio<br>
				@else
					<input type="checkbox" name="detalle[]" value="Gimnasio">Gimnasio<br>
				@endif

				@if($li == true)
					<input type="checkbox" name="detalle[]" value="Lavanderia interna" checked>Lavanderia interna<br>
				@else
					<input type="checkbox" name="detalle[]" value="Lavanderia interna">Lavanderia interna<br>
				@endif

				@if($pi == true)
					<input type="checkbox" name="detalle[]" value="Parque infantil" checked>Parque infantil<br>
				@else
					<input type="checkbox" name="detalle[]" value="Parque infantil">Parque infantil<br>
				@endif

				@if($sf == true)
					<input type="checkbox" name="detalle[]" value="Salón de fiestas" checked>Salón de fiestas<br>
				@else
					<input type="checkbox" name="detalle[]" value="Salón de fiestas">Salón de fiestas<br>
				@endif

				@if($vig == true)
					<input type="checkbox" name="detalle[]" value="Vigilancia 24Hrs" checked>Vigilancia 24Hrs<br>
				@else
					<input type="checkbox" name="detalle[]" value="Vigilancia 24Hrs">Vigilancia 24Hrs<br>
				@endif
			
				@if($fr == true)
					<input type="checkbox" name="detalle[]" value="Frente al rio" checked>Frente al rio<br>
				@else
					<input type="checkbox" name="detalle[]" value="Frente al rio">Frente al rio<br>
				@endif

				@if($vm == true)
					<input type="checkbox" name="detalle[]" value="Vista a la montaña" checked>Vista a la montaña<br>
				@else
					<input type="checkbox" name="detalle[]" value="Vista a la montaña">Vista a la montaña<br>
				@endif

				@if($vl == true)
					<input type="checkbox" name="detalle[]" value="Vista al lago" checked>Vista al lago<br>
				@else
					<input type="checkbox" name="detalle[]" value="Vista al lago">Vista al lago<br>
				@endif

				@if($vam == true)
					<input type="checkbox" name="detalle[]" value="Vista al mar" checked>Vista al mar<br>
				@else
					<input type="checkbox" name="detalle[]" value="Vista al mar">Vista al mar<br>
				@endif

				@if($otr == true)
					<input type="checkbox" name="detalle[]" value="Otros" checked>Otros<br>
				@else
					<input type="checkbox" name="detalle[]" value="Otros">Otros<br>
				@endif

					
				
				
				
				
				
			</div>			
		</div>
	</div>
</div>




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