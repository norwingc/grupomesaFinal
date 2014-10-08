@extends('templates.admintemplate')


@section('formulario')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Ver Propietarios</strong></h4>
    </div>

<div class="table-responsive">
	<table class="table table-striped table-hover table-condensed panel-primary">
		<thead class="panel-heading">
			<td class="panel-title">Id</td>
			<td class="panel-title">Nombre</td>
			<td class="panel-title">Apellido</td>
			<td class="panel-title">Email</td>
			<td class="panel-title">Convencional</td>
			<td class="panel-title">Celular</td>
			@if(Auth::user()->role_id == '0')
				<td>Quien ingreso al prop</td>
				@endif
			<td class="panel-title">Acciones</td>
		</thead>
		<tbody >
			@foreach($propietarios as $value)
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->nombre }}</td>
				<td>{{ $value->apellido }}</td>
				<td>{{ $value->email  }}</td>
				<td> {{ $value->telefono }}</td>
				<td> {{ $value->celular }}</td>
				@if(Auth::user()->role_id == '0')
				<?php  $usuario = User::where('id', '=', $value->id_usuario)->first();  
				
				?>
				<td>{{$usuario->username}}</td>
				
				@endif
				<td>
					<a href="{{ URL::to('admin/modificarPropietario/' . $value->id) }}" class="btn btn-small btn-default">Modificar Propietario</a>
				</td>				
			</tr>					
			@endforeach	
		</tbody>
	</table>
	{{ $propietarios->links()  }}
</div>

<div>
@if(Auth::user()->role_id == '0')
			<a href="{{ URL::to('csv') }}" class="btn btn-small btn-default">Exportar a Excel</a>
				
	@endif
		
</div>

<div>
	@if(Auth::user()->role_id == '0')
	


		{{ Form::open(array('url' => 'admin/filtro', 'class' => 'form-horizontal', 'method' => 'GET')) }}
	<div class="panel-body">
		<div class="form-group">
			{{ Form::label('id', 'Clasificar por Username del Usuario', array('class' => 'col-sm-2 control-label')) }}
			<div class="col-sm-6">
				{{ Form::text('id', Input::old('id'), array('class' => 'form-control', 'placeholder'=> 'admin')) }}	
			</div>
		</div>
		
		<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Buscar' , array('class'=> 'btn btn-primary')) }}
		</div>	
	</div>
	</div>
	
	{{ Form::close() }}			

	@endif	

</div>

@stop