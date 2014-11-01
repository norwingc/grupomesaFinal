@extends('templates.admintemplate')

@section('formulario')

@if(Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
 {{ HTML::style('css/jquery.ui.plupload.css') }}  

<div class="tituloanuncio">
      <h4 style="text-align:center;"><strong>Agregar Imagenes de la Casa</strong></h4>
    </div>


<form id="form" method="post" action="">
	<div id="uploader">
		<p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
	</div>
	<br />
</form>

<a href="{{  URL::to('administrador/verPropiedades') }}" class="btn btn-small btn-primary" style="margin-left:1em !important">Finalizar</a>


@stop

@section('js')



	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>

	 {{ HTML::script('js/plupload.full.min.js') }}
	 {{ HTML::script('js/jquery.ui.plupload.js') }}



	 <script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
	$("#uploader").plupload({
		// General settings
		runtimes : 'html5,flash,silverlight,html4',
		url : 'upload',

		// User can upload no more then 20 files in one go (sets multiple_queues to false)
		max_file_count: 20,
		
		chunk_size: '1mb',	
		
		filters : {
			// Maximum file size
			max_file_size : '1000mb',
			// Specify what files to browse for
			mime_types: [
				{title : "Image files", extensions : "jpg,gif,png"},
				{title : "Zip files", extensions : "zip"}
			]
		},

		// Rename files by clicking on their titles
		rename: true,
		
		// Sort files
		sortable: true,

		// Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
		dragdrop: true,

		// Views to activate
		views: {
			list: true,
			thumbs: true, // Show thumbs
			active: 'thumbs'
		},

		// Flash settings
		flash_swf_url : '../../js/Moxie.swf',

		// Silverlight settings
		silverlight_xap_url : '../../js/Moxie.xap'
	});


	// Handle the case when form was submitted before uploading has finished
	$('#form').submit(function(e) {
		// Files in queue upload them first
		if ($('#uploader').plupload('getFiles').length > 0) {

			// When all files are uploaded submit form
			$('#uploader').on('complete', function() {
				$('#form')[0].submit();
			});

			$('#uploader').plupload('start');
		} else {
			alert("You must have at least one file in the queue.");
		}
		return false; // Keep the form from submitting
	});
});
</script>

	
@stop