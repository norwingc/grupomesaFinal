<?php

Route::get('/', function()
{
	return View::make('Contenido');
});

Route::get('VistaCasa/{id?}', array('uses' => 'PropiedadesController@show'));

Route::get('Contactenos', function()
{
	return View::make('nosotros.Contactenos');
});

Route::get('servicios', function()
{
	return View::make('nosotros.servicios');
});

Route::get('minibuscador', function()
{
	return View::make('minibuscador');
});

Route::get('vistaBuscar', function()
{
	return View::make('nosotros.VistaBuscar');
});



Route::get('Alquiler', function(){
	$propiedades = DB::table('propiedades')->whereIn('tipoanuncio', array('Alquiler', 'Venta y Alquiler'))->where('estado','=','1')->orderby('created_at','DESC')->paginate(12);

	return View::make('alquiler')->with('propiedades', $propiedades);

});

Route::get('Venta', function(){
	

	$propiedad = DB::table('propiedades')->whereIn('tipoanuncio', array('Venta', 'Venta y Alquiler'))->where('estado','=','1')->orderby('created_at','DESC')->paginate(12);

	return View::make('venta')->with('propiedades', $propiedad);

});




Route::post('send/email', function(){

	$data = array('name' => Input::get('nombre'), 'email' => Input::get('email'), 'telefono' => Input::get('telefono'), 'mensaje' => Input::get('mensaje'));   

	Mail::send('emails.welcome',  $data, function($message)
	{
		$message->to('ventas@grupomesa.com', 'Cliente')->subject('Personas interesadas en propiedad');
	});

	Session::flash('message', 'Mensaje enviado');
	return Redirect::back();
});

Route::post('send/emailcasa', function(){

	$data = array('name' => Input::get('nombre'), 'email' => Input::get('email'), 'telefono' => Input::get('telefono'), 'mensaje' => Input::get('mensaje'), 'id_propiedad' => Input::get('id_propiedad') );   

	Mail::send('emails.welcome2',  $data, function($message)
	{
		$message->to('ventas@grupomesa.com', 'Cliente')->subject('Personas interesadas en propiedad');
	});

	Session::flash('message', 'Mensaje enviado');
	return Redirect::back();
});


Route::post('buscadorpropiedad', array('uses'=> 'PropiedadesController@buscar'));

Route::post('VistaCasa/cargarmunicipio', function(){	    
		$id_dpto = $_POST['id'];
		$municipio = DB::table('municipio')->where('relacion', '=', $id_dpto)->get();
		return Response::json(array(
			'municipio' =>     $municipio
			));

	});
Route::post('VistaCasa/cargarzona', function(){	    
		$id_zona = $_POST['id'];

		$zona = DB::table('zona')->where('relacion', '=', $id_zona)->orderby('opcion')->get();
		return Response::json(array(
			'zona' =>     $zona
			));
	});	

	Route::post('buscadorpropiedad/cargarzona', function(){	    
		$id_zona = $_POST['id'];

		$zona = DB::table('zona')->where('relacion', '=', $id_zona)->orderby('opcion')->get();
		return Response::json(array(
			'zona' =>     $zona
			));
	});	

	Route::post('buscadorpropiedad/cargarmunicipio', function(){	    
		$id_dpto = $_POST['id'];
		$municipio = DB::table('municipio')->where('relacion', '=', $id_dpto)->get();
		return Response::json(array(
			'municipio' =>     $municipio
			));

	});

Route::post('cargarmunicipio', function(){	    
			$id_dpto = $_POST['id'];
			$municipio = DB::table('municipio')->where('relacion', '=', $id_dpto)->get();
			return Response::json(array(
				'municipio' =>     $municipio
				));

		});

		Route::post('cargarzona', function(){	    
		$id_zona = $_POST['id'];

		$zona = DB::table('zona')->where('relacion', '=', $id_zona)->orderby('opcion')->get();
		return Response::json(array(
			'zona' =>     $zona
			));
	});


/*usuarios*/

Route::get('login', array('uses' => 'UsuariosController@viewLogin'));//ver el login
Route::post('usuarios/validar', array('uses'=> 'UsuariosController@validateLogin'));// se valida en usuario
Route::get('usuarios/logout', array('uses'=> 'UsuariosController@getLogout'));

/* ADMINISTRADOR*/

Route::group(array('before' => 'auth'), function()
{



	Route::get('administrador', function()
	{
		return View::make('administrador');
	});

	Route::get('admin/formulario', function()
	{
		return View::make('administrador.IngresarCasa');
	});

	Route::get('administrador/Usuarios', function(){
		$usuarios = DB::table('usuarios')->orderby('role_id')->paginate(10);
		

		//$usuarios = User::where('role_id', '=', 1)->get();	
		return View::make('administrador.usuariosadmin')->with('usuarios', $usuarios);
	});

	Route::post('administrador/usuarios/register', array('uses' => 'UsuariosController@registeradmin'));// se registra el usuario en la BD
	Route::post('admin/usuarios/register', array('uses' => 'UsuariosController@register'));// se registra el usuario en la BD
	Route::get('admin/registrar', array('uses' => 'UsuariosController@viewRegister'));//muestra el form de registro
	Route::get('admin/modificarUsuario/{id?}', array('uses' => 'UsuariosController@showupdate'));

	Route::get('admin/verPropietarios', function(){

		if (Auth::user()->role_id == '0') {
			$propietarios = DB::table('propietarios')->paginate(20);
			return View::make('administrador.verPropietario')->with('propietarios', $propietarios);
		}else{
			$propietarios = Propietario::where('id_usuario', '=', Auth::user()->id)->paginate(20)	;
			return View::make('administrador.verPropietario')->with('propietarios', $propietarios);// vista de los propietarios
		}
	});

	
	Route::get('admin/agregarImagen', function()
	{
		return View::make('administrador.addImagenes');
	});

	Route::get('admin/modificarPropiedad/{id?}', array('uses' => 'PropiedadesController@showupdate'));

	Route::post('admin/modPropiedad/{id?}', array('uses' => 'PropiedadesController@update'));


	Route::get('admin/modificarPropietario/{id?}', array('uses' => 'PropietariosController@showupdate'));// muestra el prietario a modificar

	Route::post('admin/modPropietario/{id?}', array('uses' => 'PropietariosController@update'));// se registra el usuario en la BD

	Route::post('admin/modUsuario/{id?}', array('uses' => 'UsuariosController@update'));

	Route::get('admin/bajaUsuario/{id?}', array('uses' => 'UsuariosController@baja'));

	Route::get('admin/DetallePropiedad/{id?}', array('uses' => 'PropiedadesController@detalle'));

	Route::get('admin/bajaPropiedad/{id?}', array('uses' => 'PropiedadesController@baja'));

	Route::post('admin/modServicios/{id?}', array('uses' => 'ServController@update'));

	Route::get('administrador/verPropiedades', function()
	{
		
		if(Auth::user()->role_id == 0){
		$propiedades = DB::table('propiedades')->orderby('created_at','DESC')->paginate(10);
	}else{
		$propiedades = DB::table('propiedades')->where('id_usuario',Auth::user()->username)->orderby('created_at','DESC')->paginate(10);
	}


		return View::make('administrador.verPropiedades')->with('propiedades', $propiedades);// vista de las propiedades
	});

	Route::get('administrador/add/propietario', array('uses' => 'PropietariosController@viewformulario'));//muestra el form de registro
	Route::post('administrador/propietario/add', array('uses' => 'PropietariosController@guardar'));// se registra el usuario en la BD
	Route::get('administrador/ver/{id?}', array('uses' => 'PropietariosController@show'));

	Route::get('administrador/modServicios', function()
	{
		return View::make('administrador.modServicios');
	});

	Route::get('nosotros/servs', function(){
			return View::make('nosotros.servicios');// vista de los servicios
		});

	Route::post('administrador/propiedad/add', array('uses' => 'PropiedadesController@guardar'));// se registra el usuario en la BD

	

	Route::post('admin/cargarzona', function(){	    
		$id_zona = $_POST['id'];

		$zona = DB::table('zona')->where('relacion', '=', $id_zona)->get();
		return Response::json(array(
			'zona' =>     $zona
			));
	});

	Route::post('admin/cargarpropi', function(){	    
		$id_propi = $_POST['id'];
		$propi = DB::table('propietarios')->where('id', '=', $id_propi)->get();
		return Response::json(array(
			'propi' =>     $propi
			));
	});

	Route::post('admin/cargarmunicipio', function(){	    
		$id_dpto = $_POST['id'];
		$municipio = DB::table('municipio')->where('relacion', '=', $id_dpto)->get();
		return Response::json(array(
			'municipio' =>     $municipio
			));

	});


		Route::post('admin/modificarPropiedad/cargarzona', function(){	    
		$id_zona = $_POST['id'];

		$zona = DB::table('zona')->where('relacion', '=', $id_zona)->get();
		return Response::json(array(
			'zona' =>     $zona
			));
	});

	Route::post('admin/modificarPropiedad/cargarmunicipio', function(){	    
		$id_dpto = $_POST['id'];
		$municipio = DB::table('municipio')->where('relacion', '=', $id_dpto)->get();
		return Response::json(array(
			'municipio' =>     $municipio
			));

	});	

	

	

	Route::post('administrador/zone', array('uses' => 'ZonasController@guardar'));

	

	


	Route::post('admin/getpropietario', function(){	    
		$id = $_POST['id'];
		$propietario = Propietario::find($id);
		return Response::json(array(
			'propietario' => $propietario
			));

	});

	Route::post('admin/modificarPropiedad/getpropietario', function(){	    
		$id = $_POST['id'];
		$propietario = Propietario::find($id);
		return Response::json(array(
			'propietario' => $propietario
			));

	});
	

	Route::get('admin/banner', function()
	{
		return View::make('administrador.addBanner');
	});

	Route::post('admin/saveImg/{id?}' , array('uses' => 'PropiedadesImgController@save'));


	Route::post('admin/saveBanner' , array('uses' => 'BannersController@save'));
	Route::post('administrador/banner/update/{id}' , array('uses' => 'BannersController@update'));

	Route::get('admin/modificarimagen/{id?}' , array('uses' => 'PropiedadesImgController@showupdate'));
	Route::post('administrador/imagen/update/{id}' , array('uses' => 'PropiedadesImgController@update'));



	// Route::post('agregarImagen/administrador/upload', function(){

	// 	File::require_once('upload.php');

	// 	return Redirect::to('administrador');

	// });


	Route::get('admin/filtro', array('uses' => 'PropietariosController@filtro'));


	Route::post('administrador/propiedad/add', array('uses' => 'PropiedadesController@guardar'));// se registra el usuario en la BD
/*-----------------------------------------------------EXCEL--------------------------------------------------------------------*/
		Route::get('csv', function() {


		$archivo ='PHPExcel.php';

		File::requireOnce($archivo);

		$objPHPExcel = new PHPExcel();

// Set document properties
		$objPHPExcel->getProperties()->setCreator("")
		->setLastModifiedBy("")
		->setTitle("")
		->setSubject("")
		->setDescription("")
		->setKeywords("")
		->setCategory("");



		$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Rounded MT Bold');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:D1')->setCellValue('B1','Listado de Clientes');

		$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        	)
    	);

    	$objPHPExcel->getActiveSheet()
    	->getStyle("B1:D1")
    	->applyFromArray($style);

// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A3', 'Nombre')
		->setCellValue('B3', 'Apellido')
		->setCellValue('C3', 'Email')
		->setCellValue('D3', 'Telefono Convencional')
		->setCellValue('E3', 'Telefono Celular')
		->setCellValue('F3', 'Usuario que lo Registro');

// $objPHPExcel->setTitle('Listado de Propietarios');

// Rename worksheet
		$objPHPExcel->getActiveSheet()
		->getStyle('A3:F3')
		->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setARGB('428BCA');

		$objPHPExcel->getActiveSheet()->setTitle('ListadoClientes');

		$borders = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THICK,
					'color' => array('argb' => 'COLOR_BLACK')
					)));

		$objPHPExcel->getActiveSheet()
		->getStyle('A3:F3')
		->applyfromArray($borders);

		$propietarios = DB::table('propietarios')->get();
		$count = 4;


		foreach($propietarios as $value){
			$objPHPExcel->setActiveSheetIndex(0)
			->getStyle('A'.$count.":F".$count)
			->applyfromArray($borders);

			$usuario = User::where('id', '=', $value->id_usuario)->first();



			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$count, $value->nombre)
			->setCellValue("B".$count, $value->apellido)
			->setCellValue("C".$count, $value->email)
			->setCellValue("D".$count, $value->telefono)
			->setCellValue("E".$count, $value->celular)
			->setCellValue("F".$count, $usuario->nombre);

			$count++;
		}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Listado Clientes.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

exit;

return Redirect::back();
});

/*-------------------------------------------------------------------------------------------------------------*/

Route::get('csv2/{aux?}', function($aux) {


		$archivo ='PHPExcel.php';

		File::requireOnce($archivo);

		$objPHPExcel = new PHPExcel();

// Set document properties
		$objPHPExcel->getProperties()->setCreator("")
		->setLastModifiedBy("")
		->setTitle("")
		->setSubject("")
		->setDescription("")
		->setKeywords("")
		->setCategory("");



		$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial Rounded MT Bold');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);
		$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);

		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B1:D1')->setCellValue('B1','Listado de Clientes');

		$style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        	)
    	);

    	$objPHPExcel->getActiveSheet()
    	->getStyle("B1:D1")
    	->applyFromArray($style);

// Add some data
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A3', 'Nombre')
		->setCellValue('B3', 'Apellido')
		->setCellValue('C3', 'Email')
		->setCellValue('D3', 'Telefono Convencional')
		->setCellValue('E3', 'Telefono Celular')
		->setCellValue('F3', 'Usuario que lo Registro');

// $objPHPExcel->setTitle('Listado de Propietarios');

// Rename worksheet
		$objPHPExcel->getActiveSheet()
		->getStyle('A3:F3')
		->getFill()
		->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
		->getStartColor()->setARGB('428BCA');

		$objPHPExcel->getActiveSheet()->setTitle('ListadoClientes');

		$borders = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THICK,
					'color' => array('argb' => 'COLOR_BLACK')
					)));

		$objPHPExcel->getActiveSheet()
		->getStyle('A3:F3')
		->applyfromArray($borders);

		$propietarios = DB::table('propietarios')->where('id_usuario', $aux)->get();
		$count = 4;


		foreach($propietarios as $value){
			$objPHPExcel->setActiveSheetIndex(0)
			->getStyle('A'.$count.":F".$count)
			->applyfromArray($borders);

			$usuario = User::where('id', '=', $aux)->first();



			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue("A".$count, $value->nombre)
			->setCellValue("B".$count, $value->apellido)
			->setCellValue("C".$count, $value->email)
			->setCellValue("D".$count, $value->telefono)
			->setCellValue("E".$count, $value->celular)
			->setCellValue("F".$count, $usuario->nombre);

			$count++;
		}

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Listado Clientes '.$usuario->nombre.'.xlsx"');
		header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

exit;

return Redirect::back();
});



Route::post('admin/agregarImagen/upload', function()
{
	return Plupload::receive('file', function ($file)
	{
		$ultimo = Propiedad::all();
		
		$file->move('upload', $ultimo->last()->titulo . $file->getClientOriginalName()); // le puse el titulo al comienzo por si quieren subir imagenes del mismo nombre.. no se si el titulo es unico.. fijense bien en eso xq si suben una imagen con un nombre q ya existe la sobreescribe.. putos

		$img = Image::make('upload/'. $ultimo->last()->titulo . $file->getClientOriginalName());
      	//$img->resize(800, 600); x si quiere cambiar el tamoño 
       $img->insert('img/marca.png', 'margin:0 auto');
        $img->save('upload/'. $ultimo->last()->titulo . $file->getClientOriginalName());

      
		$imagen = new Imagen();        
		$imagen->ruta = $ultimo->last()->titulo . $file->getClientOriginalName();               
		$imagen->id_propiedad = $ultimo->last()->id;

		$imagen->save();
		return 'ready';


	
	});
});

});