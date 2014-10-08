@extends('templates.admintemplate')


@section('formulario')

@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Filtro</strong></h4>
    </div>


<div class="table-responsive">
	<table class="table table-striped table-hover table-condensed panel-primary">
		<thead class="panel-heading">
			<td class="panel-title">Nombre</td>
			<td class="panel-title">Apellido</td>
			<td class="panel-title">Email</td>
			<td class="panel-title">Telefono</td>
			@if(Auth::user()->role_id == '0')
				<td>Quien ingreso al prop</td>
				@endif
			<td class="panel-title">Acciones</td>
		</thead>
		<tbody >
			@foreach($propietarios as $value)
			<tr>
				<td>{{ $value->nombre }}</td>
				<td>{{ $value->apellido }}</td>
				<td>{{ $value->email  }}</td>
				<td> {{ $value->telefono }}</td>
				@if(Auth::user()->role_id == '0')
				<?php  $usuario = User::where('id', '=', $value->id_usuario)->first();  
				$aux = $usuario->id;
				?>
				<td>{{$usuario->nombre}}</td>
				
				@endif
				<td>
					<a href="{{ URL::to('admin/modificarPropietario/' . $value->id) }}" class="btn btn-small btn-default">Modificar Propietario</a>
				</td>				
			</tr>					
			@endforeach	
		</tbody>
	</table>
	
</div>

 
<div>
@if(Auth::user()->role_id == '0')
			<a href="{{ URL::to('csv2/'.$aux) }}" class="btn btn-small btn-default">Exportar a Excel</a>
				
	@endif
		
</div>



@stop