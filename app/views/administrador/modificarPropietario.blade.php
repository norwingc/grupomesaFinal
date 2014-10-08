@extends('templates.admintemplate')

@section('formulario')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Propietario de la Vivienda</h3>
	</div>

	@if(Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	
	{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

	{{ Form::open(array('url' => 'admin/modPropietario/' .$propietario->id , 'class' => 'form-horizontal')) }}
	<div class="panel-body">
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('nombre', Input::old('nombre', $propietario->nombre), array('class' => 'form-control', 'placeholder'=> 'Nombres')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('apellido', 'Apellidos', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('apellido', Input::old('apellido', $propietario->apellido), array('class' => 'form-control', 'placeholder'=> 'Apellidos')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('telefono', 'Telefono Convencional', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('telefono', Input::old('telefono', $propietario->telefono), array('class' => 'form-control', 'placeholder'=> 'Telefono Convencional')) }}	
			</div>
		</div>

		<div class="form-group">
			{{ Form::label('telefonoc', 'Telefono Celular', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('celular', Input::old('celular', $propietario->celular), array('class' => 'form-control', 'placeholder'=> 'Telefono Celular')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('email', Input::old('email', $propietario->email), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Modificar Propietario' , array('class'=> 'btn btn-primary')) }}
		</div>	
	</div>
	</div>
	
	{{ Form::close() }}			
</div>

@stop