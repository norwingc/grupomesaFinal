@extends('templates.admintemplate')
@section('titulo')
	 <h1 class="page-header">Usuarios Registrados</h1>
@stop

@section('formulario')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="table-responsive">
<h1 class="page-header">Usuarios</h1>
	<table class="table table-hover">
		<thead>
			<tr>
				
				<td>Nombre</td>
				<td>Email</td>
				<td>Username</td>
				<td>Rol</td>
				<td>Estado</td>								
				<td></td>															
			</tr>
		</thead>
		<tbody>
			@foreach($usuarios as $value)
			
			<tr>
				
				<td>{{$value->nombre}}</td>					
				<td>{{$value->correo}}</td>					
				<td>{{ $value->username }}</td>
				@if($value->role_id == 1)
				<td>Vendedor</td>
				@else
				<td>Administrador</td>
				@endif	
				@if($value->estado == 1)
				<td>Activo</td>
				@else
				<td>Inactivo</td>
				@endif
				<td>

					<div class="btn-group">
						<button type="button" class="btn btn-small btn-danger" data-toggle="dropdown" >
							Opciones <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" role="menu">
							<li><a href="{{ URL::to('admin/modificarUsuario/' . $value->id) }}">Modificar Usuario</a></li>
							<li><a href="{{ URL::to('admin/bajaUsuario/' . $value->id) }}">

								@if($value->estado == 1)
								Dar de Baja
								@else
								Dar de Alta
								@endif	
								

							</a></li>

						</ul>
							</div>

						</td>			
						
					</tr>
				
			@endforeach
		</tbody>
	</table>
	{{ $usuarios->links()  }}
</div>






 <h1 class="page-header">Agregar Usuario</h1>

 	<div>
 		{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}

			{{ Form::open(array('url' => 'administrador/usuarios/register', 'files' => true, 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombre', 'Nombres y Apellidos', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control', 'placeholder'=> 'Telefono')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
					</div>
				</div>			
				<div class="form-group">
					{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-2 control-label')) }}
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
					{{ Form::label('rol', 'Rol', array('class' => 'col-sm-2 control-label')) }}
					<div class="col-sm-6">
						<select class="form-control" name="rol">
							<option value='0'> Administrador </option>
							<option value='1'> Vendedor </option>							
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form::submit('Registrarse' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
				

			{{ Form::close() }}
</div>			

@stop