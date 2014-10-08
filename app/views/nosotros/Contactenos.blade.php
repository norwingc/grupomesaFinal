@extends('templates.maintemplate')

@section('contactenos')

@if(Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div class="contac">
  <hr class="separadorcontac">
  <iframe src="https://mapsengine.google.com/map/embed?mid=z8FQWo_zMQHQ.kR9aUb3E0cW0" width="640" height="480"></iframe>
  <br>
  <div id="info">
    <h4>Direccion: Del Hotel las Colinas 400 metros al Norte, Managua-Nicaragua</h4>
    <br>
    <div class="form-group">
      
      <label class="col-lg-5 control-label">Telefonos: (505) 2253-7777 / USA:0109453530</label>
      
      <label class="col-lg-4 control-label">Email: ventas@grupomesa.com</label>
      <label class="col-lg-3 control-label">Skype: mesabienesraices</label>
    </div>
  </div>
  <br>
</div>

<div class="contac">
  <hr class="separadormsn">
  {{ Form::open(array('url' => 'send/email', 'method' => 'POST', 'class'=> 'form-horizontal'), array('role' => 'form')) }}

  <div class="form-group">
    <label class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" class="form-control" placeholder="Nombre y Apellido" name="nombre">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">E-mail</label>
    <div class="col-lg-10">
      <input type="email" class="form-control" placeholder="Correo Electronico" name="email">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Telefono</label>
    <div class="col-lg-10">
      <input type="tel" class="form-control" placeholder="Telefono" name="telefono">
    </div>
  </div>

  <div class="form-group">
    <label class="col-lg-2 control-label">Mensaje</label>
    <div class="col-lg-10">
    <textarea class="form-control" rows="10" name="mensaje"></textarea>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
     {{ Form::submit('Enviar' , array('class'=> 'btn btn-primary')) }}
    </div>
  </div>
  {{ Form::close() }}

</div>

@stop