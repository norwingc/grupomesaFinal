<?php 

	/**
	* 
	*/
	class DeptosContoller extends BaseController
	{ 

		public function show($id){
			$propietario = Propietario::find($id);
			return View::make('administrador.IngresarCasa')->with('nombre', $propietario);
		}

	}
	?>