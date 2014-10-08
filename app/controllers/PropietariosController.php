<?php 

	/**
	* 
	*/
	class PropietariosController extends BaseController
	{
		
		public function viewformulario(){

			return View::make('administrador.addPropietario');
		}



		public function guardar(){
			if($this->validateForm(Input::all()) === true){


				$propietario = new Propietario();



				$propietario->nombre = Input::get('nombre');
				$propietario->apellido = Input::get('apellido');
				$propietario->email = Input::get('email');
				$propietario->telefono = Input::get('telefono');
				$propietario->celular = Input::get('celular');
				$propietario->id_usuario = Auth::user()->id;


				if($propietario->save()){
					Session::flash('message', 'Propietario Guardado con Exito');
					return Redirect::back();
				}
			}else{
				return Redirect::back()->withErrors($this->validateForm(Input::all()))->withInput();
			}
		}

		public function show($id){
			$propietario = Propietario::find($id);
			return View::make('administrador.IngresarCasa')->with('nombre', $propietario);
		}

		public function filtro(){

			$cod = Input::get('id');

			if($cod != ''){
				$user = User::where('username',$cod)->first();

				if(!$user){
					Session::flash('message', 'El Usuario no Existe');
				return Redirect::to('admin/verPropietarios');
				}else{
				
				$propietarios = Propietario::where('id_usuario', '=', $user->id)->get();

				return View::make('administrador.filtro',compact('propietarios'));
			}
			}else{
				Session::flash('message', 'El campo del Id esta vacio');
				return Redirect::to('admin/verPropietarios');
			}


			
		}


		public function showupdate($id){
			$propietario = Propietario::find($id);
			return View::make('administrador.modificarPropietario')->with('propietario', $propietario);
		}

		public function update($id){
			
			$propietario = Propietario::find($id);
			if($this->validateFormsUp(Input::all()) === true){		

				$propietario->nombre = Input::get('nombre');
				$propietario->apellido = Input::get('apellido');
				$propietario->telefono = Input::get('telefono');
				$propietario->celular = Input::get('celular');
				$propietario->email = Input::get('email');		

				if($propietario->save()){					
					Session::flash('message', 'Propietario Modificado');
					return Redirect::to('admin/verPropietarios');
				}

			}else{
				return Redirect::back()->withErrors($this->validateFormsUp(Input::all()))->withInput();
			}
		}


		private function validateFormsUp($inputs = array()){
			$rules = array(
				'nombre' => 'required|max:25',
				'apellido' => 'required|max:30',
				'email' => 'required|email',
				'telefono' => 'numeric|between:0,99999999',
				'celular' => 'numeric|between:0,99999999'
				);
			$message = array(
				'required' => 'El campo :attribute es requerido',
				'unique' => 'El :attribute ya esta en uso'
				);
			$validate = Validator::make($inputs, $rules, $message);

			if($validate->fails()){
				return $validate;
			}else{
				return true;
			}
		}



		private function validateForm($inputs = array()){
			$rules = array(
				'nombre' => 'required|max:25',
				'apellido' => 'required|max:30',
				'email' => 'required|email',
				'telefono' => 'numeric|between:0,99999999',
				'celular' => 'numeric|between:0,99999999'
				);
			$message = array(
				'required' => 'el campo :attribute es requerido',
				'unique' => 'el titulo ya existe'
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