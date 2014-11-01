@extends('templates.admintemplate')

@section('titulo')
<h1 class="page-header">Propiedades Registradas</h1>
@stop

@section('formulario')
<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Ver Propiedades</strong></h4>
    </div>
																																																																																																																																																																																				
<div class="table-responsive">
	<table class="table table-striped table-hover table-condensed panel-primary">
		<thead class="panel-heading">

			<td class="centrado">Foto</td>
			<td class="centrado">Visitas</td>
			<td style="text-align:center;">Código<br>
				Propiedad</td>
			<td class="centrado">Estado</td>
			<td class="centrado">Propiedad</td>

			@if(Auth::user()->role_id == 0)
				<td class="centrado col-user">User</td>
			@endif

			<td class="centrado" >Acciones</td>

		</thead>
		<tbody >
			@foreach($propiedades as $value)

			<?php   $prop = Propietario::where('id', '=', $value->id_propietario)->first();
					$depto = DB::table('depto')->where('id', $value->departamento)->first();
					$municipio = DB::table('municipio')->where('id', $value->municipio)->first();
					$img = DB::table('propiedades_img')->where('id_propiedad', $value->id)->first();
					$usar = DB::table('usuarios')->where('username', $value->id_usuario)->first();
				?>
			<tr>

				<td style="text-align:center;">
				 <img style="width:120px;" src="{{ asset('upload/'. $img->ruta .'') }}" alt="..."> 
				</td style="text-align:center;">
				<td style="text-align:center;">{{ $value->visitas  }}</td>

				<td style="text-align:center;">{{ $value->codigo }}</td>{{--AKI DEBE IR EL ENCARGADO DE LA PROPIEDAD + ID DE LA CASA--}}
				@if($value->estado == 1)
				<td style="text-align:center;">Activa</td>
				@else
				<td style="text-align:center;">Inactiva</td>
				@endif	
				<td style="text-align:center;">{{ $value->titulo }}<br>
					{{ $value->tipopropiedad }}<br>
					{{ $value->tipoanuncio}}<br>
					{{ $depto->opcion }}/{{ $municipio->opcion }}/{{ $value->zona }}<br>

					<?php
						$valor = " ";
						if($value->moneda == 'dolares'){
							$valor="U$";
						}else{
							$valor="C$";
						}
					?>

					@if($value->tipoanuncio == 'Venta')
						<strong> Precio Venta: {{$valor}} {{$value->precioventa}}</strong><br>
					@elseif($value->tipoanuncio == 'Alquiler')
						<strong> Precio Alquiler: {{$valor}} {{$value->precioalquiler}}</strong>
						<strong> {{ $value->tiempo }}</strong>
					@else
						<strong> Precio Venta: {{$valor}} {{$value->precioventa}}</strong><br>
						<strong> Precio Alquiler: {{$valor}} {{$value->precioalquiler}}</strong>
						<strong> {{ $value->tiempo }}</strong>
					@endif
					</td>
				

				@if(Auth::user()->role_id == 0)
					<td style="text-align:center;">{{$usar->nombre}}</td>			
				@endif

				<td style="text-align:center;">

					<div class="btn-group dropup">
					  <button type="button" class="btn btn-success">Acciones</button>
					  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
					    <span class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu dropdown-menu-right" role="menu">
					  	
					  	<li><a href="{{ URL::to('admin/DetallePropiedad/' . $value->id) }}">Ver Detalle</a></li>
					    <li><a href="{{ URL::to('admin/modificarPropiedad/' . $value->id) }}">Modificar Propiedad</a></li>{{--TE MANDA AL modPropiedades.blade, EL CUAL ES UNA COPIA BARATA DEL IngresarCasa.blade PARA NO CREAR CONFLICTO A LA HORA DE GUARDAR--}}
						<li><a href="{{ URL::to('admin/modificarimagen/' . $value->id) }}">Modificar Imagenes</a></li>
						<li><a href="{{ URL::to('admin/bajaPropiedad/' . $value->id) }}">

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
	{{ $propiedades->links() }}
</div>






<script type="text/javascript">

        function goDoSomething(identifier){       
            $('#indigo').val($(identifier).data('id'));           
        }

    </script>

@stop