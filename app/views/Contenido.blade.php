@extends('templates.maintemplate')

@section('contenido')

<div id="vcasas">
   <hr class='separadortitulo'/>

   <?php $props = DB::table('propiedades')->where('estado', '=', '1')->orderby('created_at','DESC')->paginate(12);?>
   @foreach($props as $value)
   <div class="col-xs-12 col-sm-6 col-md-4 col-md-4 vista" >

    <div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>{{ $value->titulo }}</strong></h4>
    </div>

    <?php 
          $expresionregular = "/(^.{0,200})(\W+.*$)/"; 
          $cadena = ($value->descripcion); 
          $reemplazo = "\${1}";
    ?>

    <div class="view view-second">
    <?php $imagen = PropiedadImg::where('id_propiedad', '=', $value->id )->orderBy('id')->first(); ?>
    @if($imagen->count() == 0)
    <img src="" width="80%"/>
    @else
     <img src="{{ asset('upload/'. $imagen->ruta .'') }}" width="80%"/>
    @endif                  
     
      <div class="mask"></div>
      <div class="content">
        <h2>{{$value->tipoanuncio}} de {{$value->tipopropiedad}}</h2>
        <p>{{ preg_replace($expresionregular, $reemplazo, $cadena) }}... </p>
  
      </div>
    </div>
        <a href="{{  URL::to('VistaCasa/'. $value->id .'#ContenidoPrincipal' ) }}" class="btn btn-small btn-primary">Ver Propiedad</a> 
  </div>

  @endforeach

</div>
{{ $props->links() }}

@stop