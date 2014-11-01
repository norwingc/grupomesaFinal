@extends('templates.maintemplate')

@section('buscador')
        
@if(Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<div id="busqueda" class="testbox col-md-12">
				{{ Form::open(array('id'=>'bus','name'=>'bus','url' => 'buscadorpropiedad#ContenidoPrincipal', 'method' => 'POST'), array('role' => 'form', 'class' => 'form-horizontal')) }}
					<h3 style=" text-align:center; margin-top:0">B&#250;squeda</h3>
					<div class="gender">
						<input type="radio" value="Venta" id="Venta" name="venta" checked/>
						<label for="Venta" id="lven">Venta</label>
						<input type="radio" value="Alquiler" id="Alquiler" name="venta" />
						<label for="Alquiler" >Alquiler</label>
						<br>
						<input type="radio" value="Venta y Alquiler" id="venta y alquiler" name="venta" />
						<label for="Alquiler" >Venta y Alquiler</label>
					</div>

					<div class="input-group">
						<span class="input-group-addon"><label class="glyphicon glyphicon-search"></label></span>
						<input type="text" class="form-control" name="busqueda" placeholder="B&#250;squeda libre" />
					</div>

					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-qrcode"></label></span>
						<input type="text" class="form-control" name="codigo" placeholder="C&#243digo de Propiedad"/>
					</div>

					<hr class="sepa">                     
					

					<?php $depto = DB::table('depto')->get();?>
					<h5 class="titulos">Departamento</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>

						<select class="form-control departamento" name="departamento" onclick="desactivar(this.value)">
							<option value='Dep'>Todos</option>
							@foreach($depto as $value)
							<option value='{{$value->id}}'>{{$value->opcion}}</option>
							@endforeach	
						</select>	

						
					</div>        

					<h5 class="titulos">Municipio</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						
						<select class="form-control municipio select2" name="municipio" id="" disabled="disable" onclick="desactivar2(this.value)">
						<option value='Mun'>Todos</option>				
						</select>
					</div>

					<h5 class="titulos">Zona</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						<select class="form-control" name="zona" id="select3" disabled="disable">
						<option value='Zone'>Todos</option>

						</select>
					</div>        

					<h5 class="titulos">Tipo de propiedad</h5>
					<div class="input-group">          
						<span class="input-group-addon"><label class="glyphicon glyphicon-home"></label></span>
						<select  class="form-control" name="tipo" >
							<option value="Todos">Todos</option>
							<option value="Almacén">Almac&#233n</option>
							<option value="Casa de Habitación">Casa de Habitaci&#243;n</option>
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


@stop