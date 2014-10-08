<?php 
	
	class UsuariosController extends BaseController
	{

		public function viewLogin(){

			return View::make('usuarios.login');
		}

		public function validateLogin(){
			if($this->validateFormsLogin(Input::all()) === true){
				$userdata = array(
					'username' =>Input::get('username'),
					'password' =>Input::get('password')
					);

				if(Auth::attempt($userdata)){
					if (Auth::user()->estado == 0) {
						Session::flash('message', 'El usuario no esta activo');
					return Redirect::to('login');
					}else{
					if(Auth::user()->role_id == 1){
						return Redirect::to('admin/formulario');
					}else{
						return Redirect::to('admin/formulario');
					}
					}
				}else{
					Session::flash('message', 'Error al iniciar session');
					return Redirect::to('login');
				}
			}else{
				return Redirect::to('login')->withErrors($this->validateFormsLogin(Input::all()))->withInput();		
			}	
		}

		public function viewRegister(){
			return View::make('usuarios.registrar');
		}
		

		public function register(){
			if(Input::get()){			
				if($this->validateForms(Input::all()) === true){
				
					$user = new User();
					$user->nombre = Input::get('nombre');
					$user->correo = Input::get('email');
					$user->telefono = Input::get('telefono');		
					$user->username = Input::get('username');			
					$user->password = Hash::make(Input::get('password'));	
					$user->estado = 1;		
					$user->role_id = 1;	

					if($user->save()){
						
						Session::flash('message', 'Usuario Registrado con exito, ya puede ingresar');
						return Redirect::to('login');
					}
				}else{
					return Redirect::back()->withErrors($this->validateForms(Input::all()))->withInput();
				}
			}else{
				return View::make('usuarios.login');
			}
		}

		public function getLogout(){
				Auth::logout();
				return Redirect::to('/');
		}

		public function showupdate($id){
			$usuario = User::find($id);
			return View::make('administrador.modificarUsuario')->with('usuario', $usuario);
		}

		public function registeradmin(){
			if(Input::get()){			
				if($this->validateForms(Input::all()) === true){
				
					$user = new User();
					$user->nombre = Input::get('nombre');
					$user->correo = Input::get('email');
					$user->telefono = Input::get('telefono');		
					$user->username = Input::get('username');			
					$user->password = Hash::make(Input::get('password'));			
					$user->role_id = Input::get('rol');
					$user->estado = 1;		

					if($user->save()){
						
						Session::flash('message', 'Usuario Registrado con exito, ya puede ingresar');
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
			
		$user = User::find($id);
		if($this->validateFormsUp(Input::all()) === true){			
			$user->nombre = Input::get('nombre');
			$user->correo = Input::get('email');
			$user->telefono = Input::get('telefono');		
			$user->username = Input::get('username');			
			$user->password = Hash::make(Input::get('password'));			


			

			if($user->save()){					
				Session::flash('message', 'Usuario Modificado');
				return Redirect::to('administrador/Usuarios');
			}

		}else{
			return Redirect::back()->withErrors($this->validateFormsUp(Input::all()))->withInput();
		}
	}

		public function baja($id){
			
			$user = User::find($id);

			if($user->estado == 0)	
			$user->estado = 1;
			else
			$user->estado = 0;	


			$user->save();				
				
			return Redirect::back();
		
	}




		private function validateForms($inputs = array()){
			$rules = array(
				'nombre' => 'required|min:2',
				'username' => 'unique:usuarios|required|min:4',			
				'password' => 'confirmed|required|between:6,12',
				'password_confirmation' => 'required|between:6,12',			
				'email' => 'required|email',	
				'telefono' => 'required|numeric|between:0,99999999'		
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

		private function validateFormsUp($inputs = array()){
			$rules = array(
				'nombre' => 'required|min:2',
				'username' => 'required|min:4',			
				'password' => 'confirmed|required|between:6,12',
				'password_confirmation' => 'required|between:6,12',			
				'email' => 'required|email',	
				'telefono' => 'required|numeric|between:0,99999999'		
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



		private function validateFormsLogin($inputs = array()){
			$rules = array(			
				'username' => 'required',			
				'password' => 'required',			
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
 ?>