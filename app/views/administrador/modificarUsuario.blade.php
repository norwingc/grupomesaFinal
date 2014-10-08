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

	{{ Form::open(array('url' => 'admin/modUsuario/' .$usuario->id , 'class' => 'form-horizontal')) }}
	<div class="panel-body">
		<div class="form-group">
			{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('nombre', Input::old('nombre', $usuario->nombre), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
			</div>
		</div>
		
		<div class="form-group">
			{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('telefono', Input::old('telefono', $usuario->telefono), array('class' => 'form-control', 'placeholder'=> 'Telefono')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('email', Input::old('email', $usuario->correo), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('username', Input::old('username', $usuario->username), array('class' => 'form-control', 'placeholder'=> 'Telefono')) }}	
			</div>
		</div>
		<div class="form-group">
		{{ Form::label('password', 'Nueva Contraseña', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'password')) }}	
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'confirmar password')) }}	
			</div>
		</div>
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Modificar Usuario' , array('class'=> 'btn btn-primary')) }}
		</div>	
	</div>
	</div>
	
	{{ Form::close() }}			
</div>

@stop