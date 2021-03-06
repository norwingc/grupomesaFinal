@extends('templates.admintemplate')


@section('formulario')



<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Cambiar Imagenes de la Propiedad</strong></h4>
    </div>

<div class="bg-info" style="margin:1em 0em; padding:1em">
	<p>Se recomiendo que las imagenes tengan una resolucion de <strong>1300x500</strong> y un peso no mayor a <strong>2mb</strong></p>
</div>
{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}




<div class="table-responsive">
	<table class="table table-striped table-hover table-condensed panel-primary">
		<thead class="panel-heading">
			<td class="panel-title">Id</td>
			<td class="panel-title">Direccion</td>
			<td class="panel-title">Imagen</td>
			<td class="panel-title">Acciones</td>
		</thead>
		<tbody >
			@foreach($imagenes as $value)
			<?php $count = DB::table('propiedades_img')->where('id_propiedad',$value->id_propiedad)->count();
				$aux = $value->id_propiedad;
			?>
			<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->ruta }}</td>
				<td>
				 <script> 
				 	$(document).watermark();
				// </script>
				<img class="watermark" src="{{ asset('upload/'. $value->ruta .'') }}" class="img-rounded" width="70%" ></td>
				<td>

					
			{{ Form::open(array('url' => 'administrador/imagen/update/'. $value->id, 'files' => true, 'class' => 'form-horizontal')) }}

				<div class="form-group">					
					<div class="col-sm-6">
						{{ Form::file('imagen') }}	
					</div>
				</div>
				<div class="form-group">
					<div class=" col-sm-10">
						{{ Form::submit('Modificar' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>
				
			{{ Form::close() }}	

				</td>				
			</tr>					
			@endforeach	
		</tbody>
	</table>
</div>


@if($count < '20')

{{ Form::open(array('url' => 'admin/saveImg/' .$aux , 'files' => true)) }}
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Imágenes de la Propiedad</h3>
		</div>
		<div class="panel-body">
			{{ Form::file('file','',array('id'=>'','class'=>'')) }}
			<br/>
			 
			{{ Form::submit('Save', array('class'=> 'btn btn-primary')) }}

			 
			
		</div>
	</div>
{{ Form::close() }} 

@endif
 
@stop