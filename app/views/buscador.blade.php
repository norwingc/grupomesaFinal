@extends('templates.maintemplate')

@section('buscador')
        
@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="row">
	<hr class='separadortitulo1'/>  

  @foreach($propiedades as $value)
  <div class="col-md-4 vista" >
<?php $imagen = PropiedadImg::where('id_propiedad', '=', $value->id )->orderBy('id')->first(); ?>
    <div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>{{ $value->titulo }}</strong></h4>
    </div>

    <?php 
          $expresionregular = "/(^.{0,200})(\W+.*$)/"; 
          $cadena = ($value->descripcion); 
          $reemplazo = "\${1}";
    ?>

    <div class="view view-second">                  
      <img src="{{ asset('upload/'. $imagen->ruta .'') }}"/>
      <div class="mask"></div>
      <div class="content">
        <h2>{{$value->tipoanuncio}} de {{$value->tipopropiedad}}</h2>
        <p>{{ preg_replace($expresionregular, $reemplazo, $cadena) }}... </p>
        <a href="{{URL::to('/VistaCasa/'. $value->id .'#contenido')}}" class="info">Ver Propiedad</a>
      </div>
    </div>
  </div>

  @endforeach
</div>

@stop