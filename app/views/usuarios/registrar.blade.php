<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!-- Mirrored from premiumlayers.com/demos/wecare/ by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 05 May 2014 03:34:51 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
 	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Registrar</title>

  {{ HTML::style('css/bootstrap.min.css') }}
 

<body>
@if(Session::has('message'))
  <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif



<!--login modal-->
<div id="loginModal" class="modal show loginmodal" tabindex="-1" role="dialog" aria-hidden="true">
 	<div class="modal-dialog">
	  <div class="modal-content">
	    <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	        <h1 class="text-center">Registrar</h1>
	     </div>
	     <div class="modal-body">     
			<div>


			{{ HTML::ul($errors->all(), array('class' =>'bg-danger')) }}


			{{ Form::open(array('url' => 'admin/usuarios/register', 'files' => true, 'class' => 'form-horizontal')) }}

				<div class="form-group">
					{{ Form::label('nombre', 'Nombre', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('nombre', Input::old('nombre'), array('class' => 'form-control', 'placeholder'=> 'Nombre')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('telefono', 'Telefono', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('telefono', Input::old('telefono'), array('class' => 'form-control', 'placeholder'=> 'Telefono')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('email', 'Email', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('email', Input::old('email'), array('class' => 'form-control', 'placeholder'=> 'Email')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('username', 'Username', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::text('username', Input::old('username'), array('class' => 'form-control', 'placeholder'=> 'Username')) }}	
					</div>
				</div>			
				<div class="form-group">
					{{ Form::label('password', 'Contraseña', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password', array('class' => 'form-control', 'placeholder'=> 'password')) }}	
					</div>
				</div>
				<div class="form-group">
					{{ Form::label('password_confirmation', 'Confirmar Contraseña', array('class' => 'col-sm-4 control-label')) }}
					<div class="col-sm-7">
						{{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder'=> 'confirmar password')) }}	
					</div>
				</div>			
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						{{ Form::submit('Registrarse' , array('class'=> 'btn btn-primary')) }}
					</div>	
				</div>

			{{ Form::close() }}

			</div>
	      <div class="modal-footer">
	          <div class="col-md-12">
	          <a href="{{ URL::to('blog') }}" class="btn btn-success">Cancel</a>
	      </div>  
	      </div>
		</div>
		</div>
	</div>

</div>


 	{{ HTML::script('js/vendor/jquery-1.11.0.min.js') }}
    {{ HTML::script('js/plugins.js') }}
    {{ HTML::script('js/vendor/bootstrap.min.js') }}
</body>
</html>