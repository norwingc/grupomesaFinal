@extends('templates.maintemplate')

@section('contenido')


			<div id="busqueda" class="testbox ">
				{{ Form::open(array('url' => 'buscadorpropiedad', 'method' => 'POST'), array('role' => 'form', 'class' => 'form-horizontal')) }}
					<h3 style=" text-align:center; margin-top:0">Búsqueda</h3>
					<div class="gender">
						<input type="radio" value="Venta" id="Venta" name="venta" checked/>
						<label for="Venta" id="lven">Venta</label>
						<input type="radio" value="Alquiler" id="Alquiler" name="venta" />
						<label for="Alquiler" >Alquiler</label>
						<input type="radio" value="Venta y Alquiler" id="venta y alquiler" name="venta" />
						<label for="Alquiler" >Venta y Alquiler</label>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><label class="glyphicon glyphicon-search"></label></span>
						<input type="text" class="form-control" name="busqueda" placeholder="Búsqueda libre" />
					</div>

					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-qrcode"></label></span>
						<input type="text" class="form-control" name="codigo" placeholder="Código de Propiedad"/>
					</div>

					<hr class="sepa">                     
					

					<?php $depto = DB::table('depto')->get();?>
					<h5 class="titulos">Departamento</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>

						<select class="form-control departamento" name="departamento">
							@foreach($depto as $value)
							<option value='{{$value->id}}'>{{$value->opcion}}</option>
							@endforeach	
						</select>	

						
					</div>        

					<h5 class="titulos">Municipio</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						
						<select class="form-control municipio select2" name="municipio" id="">				
						</select>
					</div>

					<h5 class="titulos">Zona</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						<select class="form-control" name="zona" id="select3">

						</select>
					</div>        

					<h5 class="titulos">Tipo de propiedad</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						<select  class="form-control" name="tipo" >
							<option value="Almacen">Almacén</option>
							<option value="Casa de Habitación">Casa de Habitación</option>
							<option value="Casa de Playa">Casa de Playa</option>
							<option value="Condominio">Condominio</option>
							<option value="Consultorio">Consultorio</option>
							<option value="Departamento">Departamento</option>
							<option value="Edificio">Edificio</option>
							<option value="Finca">Finca</option>
							<option value="Terreno">Terreno</option>
							
							<option value="Locales Comerciales">Locales Comerciales</option>
							<option value="Quintas">Quintas</option>
							<option value="Apartamentos Amoblados">Apartamentos Amoblados</option>
							<option value="Negocios">Negocios</option>
							<option value="Hoteles">Hoteles</option>
							<option value="Restaurantes">Restaurantes</option>
							<option value="Oficinas">Oficinas</option>
							<option value="Bodegas">Bodegas</option>
						</select>
					</div>

					<h5 class="titulos">Precio</h5>
					<div class="input-group">
						<span class="input-group-addon"><label class="glyphicon glyphicon-usd"></label></span>
						<input type="number" class="form-control" placeholder="Desde" name="desde"/>
						<input type="number" class="form-control" placeholder="Hasta" name="hasta"/>
					</div>
					<br>
					<div id="grupobt">
						{{ Form::submit('Buscar', array('class'=> 'btn btn-default', 'id' => 'boton' )) }}
					</div>				
					
				{{ Form::close() }}
				</div>
			
			<br>
@stop