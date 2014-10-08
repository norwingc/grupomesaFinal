<?php

class BannersController extends \BaseController {

	public function save(){
		if(Input::get()){	
			if($this->validateForms(Input::all()) === true){
				$banners = new Banner();
		  		$file = Input::file("file")->getClientOriginalName();

		 		 if(file_exists("img/" . $_FILES["file"]["name"])){
     					$file = Input::file("file")->getClientOriginalName(); 	
		     		}else{
		     			move_uploaded_file($_FILES["file"]["tmp_name"], "img/" . $_FILES["file"]["name"]);
		     		}

		     		$banners->direccion = $file;

				if($banners->save()){
					
					Session::flash('message', 'Usuario Registrado con exito');
					return Redirect::back();
				}
			}else{
				return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
			}
		}else{
			return View::make('usuarios.login');
		}   		  
	}	



	public function update($id){

		if($this->validateBanner(Input::all()) ===  true){
			$file = null;
			$baner = Banner::find($id);


			if(Input::hasFile('imagen')) {
		       	Input::file('imagen')->move('img', Input::file("imagen")->getClientOriginalName());
		       	$file = Input::file("imagen")->getClientOriginalName();

			$img = Image::make('img/'. $file);
      	   //$img->resize(1280, 720); x si quiere cambiar el tamoño 
			$img->insert('img/marca.png', 'bottom-right');
			$img->save('img/'. $file);

	     	} 

			$baner->direccion = $file;


			if($baner->save()){			
				Session::flash('message', 'Banner Modificado');
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