@extends('templates.maintemplate')

@section('servicios')

	
	<h4>¿Quiénes Somos?</h4>
	<p id="quienes" class="parrafos">		
		Grupo MESA, es una empresa de Capital y Socios Nicaragüenses, 
		que nace como una alternativa de servicios, para Empresas Nacionales
		 y Extranjeras, instituciones públicas, Embajadas, ONG, Proyectos, 
		 entre otras, que requieren fortalecer sus áreas operativas, 
		 administrativas, financieras, comerciales, logística, distribución,
		  cobranzas, contables, servicios, recursos humanos, limpieza y
		   mantenimiento.
	</p>
	
	<p id="quienes" class="parrafos">		
		Somos Bienes Raíces, asesoramos y apoyamos a nuestros clientes en 
		la búsqueda de propiedades y promovemos la compra y venta de: casas, 
		apartamentos, terrenos, fincas, módulos comerciales, edificios, bodegas,
		 quintas o el bien inmueble que usted requiera comprar, vender o alquilar.</p>
	

	<h4>Misión</h4>		
	<p id="Mision" class="parrafos">
		Garantizar a todos nuestros clientes satisfacción plena, en el cumplimiento de las obligaciones
		adquiridas en la prestación de servicios de talento humano, con alto grado de responsabilidad, 
		honestidad y transparencia en el cumplimiento de nuestras alianzas comerciales.
	</p>

	<h4>Visión</h4>
	<p id="Vision" class="parrafos">
		Ser una empresa innovadora, líder en la prestación de servicios, con altos estándares de 
		calidad humana y profesionalismo, ser reconocidos por nuestros clientes como su mejor aliado  
		para alcanzar sus metas y objetivos.
		<br>
		<br>
		<br>
	</p>

	<hr class="separador1">
	
	
	<img id="banerservicio" src="{{ asset('img/bannerservicios.jpg') }}" alt="..." width="80%">

	<hr class="separador1">
	<div class="row">
		<div class="col-md-6">
			<h3 id="titulopre">Servicio de Pre-Seleccion</h3>
			<p id="parrafopre">
				Este servicio consiste en un proceso de preselección del personal, mediante procesos estrictos de; 
				entrevistas, investigación de antecedentes, test psicométricos, psicológicos y de actitud, para 
				seleccionar el perfil óptimo del candidato que su empresa desea contratar. 
			</p>
		</div>
		<div class="col-md-4">
			<img class="empleo" src="{{ asset('img/EMPLEO.jpg') }}" alt="...">
		</div>
	</div>
	<hr class="separador1">
	<div class="row">
		<div class="col-md-6">
			<img class="empleo" src="{{ asset('img/serpro.png') }}" alt="...">
		</div>

		<?php $serv = DB::table('serv')->where('id', '<', 9 )->get();?>
		<?php $servi = DB::table('serv')->where('id', '<', 17 )->where('id', '>', 8 )->get();?>

		<div class="col-md-6">
			<div class="col-md-6">			
				<p style="margin-top:30%">
				@foreach($serv as $value)
				<ul class="ulServicios">
					<li>{{$value->servicios}}</li>
				</ul>
				@endforeach
				</p>
			</div>
			<div class="col-md-6">
				<p style="margin-top:30%">
				@foreach($servi as $value)
				<ul class="ulServicios">
					<li>{{$value->servicios}}</li>
				</ul>
				@endforeach 
				</p>
			</div>
		</div>

				
	</div>
	<hr class="separador1">
	<div class="row">
		<div class="col-md-5">
			<h3 id="tituloout">Servicios Outsourcing</h3>
			<img class="empleo" id="out" src="{{ asset('img/out002.jpg') }}" alt="...">
		</div>

		<?php $serv1 = DB::table('serv')->where('id', '<', 28 )->where('id','>',16)->get();?>
		<?php $servi1 = DB::table('serv')->where('id', '>', 27 )->get();?>

		<div class="col-md-7">					
			<div class="col-md-6">			
				<p class="p2">
				@foreach($serv1 as $value)
				<ul class="ulServicios">
					<li>{{$value->servicios}}</li>
				</ul>
				@endforeach
				</p>
			</div>
			<div class="col-md-6">
				<p class="p2">
				@foreach($servi1 as $value)
				<ul class="ulServicios">
					<li>{{$value->servicios}}</li>
				</ul>
				@endforeach 
				</p>
			</div>
		</div>

					
	</div>
@stop