<?php

class PropiedadesImgController extends \BaseController {

	public function save($id){
		if(Input::get()){	

			$propi = DB::table('propiedades')->where('id',$id)->first();

			if($this->validateForms(Input::all()) === true){
				$banners = new PropiedadImg();
		  		$file = Input::file("file")->getClientOriginalName();

		 		 if(Input::hasFile('file')) {
		       	Input::file('file')->move('upload', $propi->titulo.Input::file("file")->getClientOriginalName());
		       	$file = $propi->titulo.Input::file("file")->getClientOriginalName();
	     		} 


	     	$img = Image::make('upload/'. $file);
      	   //$img->resize(1280, 720); x si quiere cambiar el tamoño 
			$img->insert('img/marca.png', 'center');
			$img->save('upload/'. $file);

		     		$banners->ruta = $file;
		     		$banners->id_propiedad = $id;

				if($banners->save()){
					
					Session::flash('message', 'Imagen Registrada con exito');
					return Redirect::back();
				}
			}else{
				return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
			}
		}else{
			return View::make('usuarios.login');
		}   	  		  
	}	



	public function showupdate($id){
			$imagenes = PropiedadImg::where('id_propiedad', $id)->get();
			return View::make('administrador.modificarImagen')->with('imagenes', $imagenes);
		}

	public function update($id){

		if($this->validateBanner(Input::all()) ===  true){
			$file = null;
			$baner = PropiedadImg::find($id);

			$aux = Propiedad::where('id',$baner->id_propiedad)->first();



			if(Input::hasFile('imagen')) {
		       	Input::file('imagen')->move('upload', $aux->titulo.Input::file("imagen")->getClientOriginalName());
		       	$file = $aux->titulo.Input::file("imagen")->getClientOriginalName();
	     	} 

	     	$img = Image::make('upload/'. $file);
      	   //$img->resize(1280, 720); x si quiere cambiar el tamoño 
			$img->insert('img/marca.png', 'center');
			$img->save('upload/'. $file);

			$baner->ruta = $file;

			if($baner->save()){			
				Session::flash('message', 'Imagen Modificada');
				return Redirect::back();
			}
		}else{
			return Redirect::back()->withErrors($this->validateBanner(Input::all()))->withInput();
		}
	}


	private function validateForms($inputs = array()){
		$rules = array(
			'file' => 'required'
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
	}


	private function validateBanner($inputs = array()){
		$rules = array(
			'imagen' => 'required'
			);
		$message = array(
			'required' => 'El campo :attribute es requerido',
			);
		$validate = Validator::make($inputs, $rules, $message);

		if($validate->fails()){
			return $validate;
		}else{
			return true;
		}
	}
	

}