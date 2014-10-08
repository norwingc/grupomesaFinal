@extends('templates.admintemplate')

@section('formulario')

<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Agregar Propietario</strong></h4>
    </div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Propietario de la Vivienda</h3>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

	{{ Form::open(array('url' => 'administrador/propietario/add', 'class' => 'form-horizontal')) }}
	<div class="panel-body">
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombres')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('apellido', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('apellido', Input::old('apellido'), array('class' => 'form-control', 'placeholder'=> 'Apellidos')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('telefono', 'Telefono Convencional', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control', 'placeholder'=> '22222222')) }}	
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('telefonoc', 'Telefono Celular', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('celular', Input::old('celular'), array('class' => 'form-control', 'placeholder'=> '88888888')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'grupomesa@grupo-mesa.com')) }}	
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Agregar Propietario' , array('class'=> 'btn btn-primary')) }}
		</div>	
	</div>
	</div>
	
	{{ Form::close() }}			
</div>

@stop