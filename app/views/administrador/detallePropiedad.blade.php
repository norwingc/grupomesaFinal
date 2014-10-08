@extends('templates.admintemplate')

@section('formulario')


<h3 align="center"><strong>Titulo:</strong> {{ $propiedad->titulo }}</h3>
<br>

<h3><strong>Codigo de la Propiedad:</strong> {{ $propiedad->codigo }}</h3>
<br>


<div class="col-md-6 col-xs-12">
<h5><strong>Tipo de Anuncio:</strong> {{ $propiedad->tipoanuncio }}</h5>
@if($propiedad->precioventa != null)
<h5><strong>Precio de Venta:</strong> {{ $propiedad->precioventa }}  {{ $propiedad->moneda }}</h5>
@endif

@if($propiedad->precioalquiler != null)
<h5><strong>Precio de Alquiler:</strong> {{ $propiedad->precioalquiler }} {{ $propiedad->moneda }} {{ $propiedad->tiempo }}</h5>
@endif

<h5><strong>Precio del Administrador:</strong> {{ $propiedad->precioadmin }} {{ $propiedad->moneda }} </h5>


<h5><strong>Estado fisico:</strong> {{ $propiedad->estadofisico }}</h5>

<h5><strong>Año de Contrucción:</strong> {{ $propiedad->anocontruccion }} </h5>

<h5><strong>Area de Contrucción:</strong> {{ $propiedad->areautil }} {{ $propiedad->medidaconstruccion }}</h5>

<h5><strong>Area de Terreno:</strong> {{ $propiedad->areaterreno }} {{ $propiedad->medidaterreno }}</h5>

<h5><strong>Cuartos:</strong> {{ $propiedad->cuartos }}</h5>

<h5><strong>Baños:</strong> {{ $propiedad->banos }}</h5>

<h5><strong>Garaje:</strong> {{ $propiedad->garaje }}</h5>

<h5><strong>Estrato:</strong> {{ $propiedad->estratos }}</h5>




</div>

<div class="col-md-6 col-xs-12">

<h5><strong>País:</strong> {{ $propiedad->pais }}</h5>

<?php $depto = DB::table('depto')->where('id', '=', $propiedad->departamento)->first(); ?>
<h5><strong>Departamento</strong> {{ $depto->opcion }}</h5>

<?php $municipio = DB::table('municipio')->where('id', '=', $propiedad->municipio)->first(); ?>
<h5><strong>Municipio:</strong> {{ $municipio->opcion }}</h5>


<h5><strong>Zona:</strong> {{ $propiedad->zona }}</h5>

<h5><strong>Dirección:</strong> {{ $propiedad->direccion }}</h5>

<h5><strong>Discripción:</strong></h5>
<p> {{ $propiedad->descripcion }}</p>

<h5><strong>Detalle de la Propiedad:</strong></h5>
<p>{{ $propiedad->detallecasa }}</p>
	
<h5><strong>Observaciones:</strong></h5>
<p>{{ $propiedad->observaciones }}</p>

<?php $propietario = DB::table('propietarios')->where('id', '=', $propiedad->id_propietario)->first(); ?>
<h4><strong>Propietario:</strong> {{ $propietario->nombre }} {{ $propietario->apellido }}</h4>

</div>

<div class="col-md-12 col-xs-12">
	
	<br>
<?php $img = DB::table('propiedades_img')->where('id_propiedad', '=', $propiedad->id)->get(); ?>
	@foreach($img as $value)

		<div class="col-md-3 col-xs-6">
			<img style="padding-bottom:3em;" width="100%" src="{{ asset('upload/'. $value->ruta .'') }}">
		</div>
	@endforeach
</div>
@stop