<?php 

	/**
	* 
	*/
	class ServiciosController extends BaseController
	{

		public function show($id){
			$servicio = Servicio::find($id);
			return View::make('nosotros.servicios')->with('id', $servicio);
		}

		public function update($id){

			$servicio = Servicio::find($id);

				$servicio->servicios = Input::get($id);

				if($servicio->save()){	
								
					Session::flash('message', 'Servicio Modificado');
					return Redirect::to('admin/verPropietarios');
				}
		}




		private function validateFormsUp($inputs = array()){
			$rules = array(
				'servicio' => 'required'
				);
			$message = array(
				'required' => 'El campo :attribute es requerido'
				);
			$validate = Validator::make($inputs, $rules, $message);

			if($validate->fails()){
				return $validate;
			}else{
				return true;
			}
		}
	}

	
	?>