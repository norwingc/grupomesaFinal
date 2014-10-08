@extends('templates.admintemplate')

@section('formulario')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Modificar Servicios</strong></h4>
    </div>

<?php $serv = DB::table('serv')->get();?>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Propietario de la Vivienda</h3>
	</div>
	<div class="panel-body">		

		

		@foreach($serv as $value)
	
			{{ Form::open(array('url' => 'admin/modServicios/' .$value->id  , 'class' => 'form-horizontal')) }}

			<br>
<div class="col-md-6">
{{ Form::text($value->id, Input::old('servicio', $value->servicios), array('class' => 'form-control')) }}
</div>
		
			{{ Form::submit('Modificar Servicio' , array('class'=> 'btn btn-primary')) }}			

		{{ Form::close() }}
		@endforeach
	<br>
		

	</div>
</div>


@stop