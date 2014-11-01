@extends('templates.maintemplate')

@section('buscador')


<div class="row">
	<hr class='separadortitulo1'/>  

@if($propiedades->count() == 0)
<br><br>
<div class="alert alert-info">No se encontro coincidencias con los parametros solicitados</div>
@endif

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
       
      </div>
    </div>
    <a href="{{  URL::to('VistaCasa/'. $value->id .'#ContenidoPrincipal' ) }}" class="btn btn-small btn-primary" style="margin-left:1em !important">Ver Propiedad</a>  
  </div>

  @endforeach
</div>

@stop