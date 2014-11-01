<?php 

	/**
	* 
	*/
	class ZonasController extends BaseController
	{ 

		public function guardar(){

			if ($this->validateForm(Input::all()) === true) {
				$zona = new Zona();
				$zona->opcion = Input::get('zona');
				$zona->relacion = Input::get('municipioA');

				$zona->save();

				if($zona->save()){
					Session::flash('message', 'Zona agregada.');
					return Redirect::back();

				}
			}else{

				return Redirect::back()->withErrors($this->validateForm(Input::all()))->withInput();
			}
		}

		private function validateForm($inputs = array()){
			$rules = array(
				'zona' => 'required'				
				);
			$message = array(
				'required' => 'el campo : attribute es requerido',
				'unique' => 'La zona ya existe.'
				);

			$validation = Validator::make($inputs, $rules, $message);

			if($validation->fails()){
				return $validation;
			}else{
				return true;
			}
		}

	}
?>