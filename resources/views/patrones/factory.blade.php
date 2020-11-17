@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">

<?php

	interface vehiculo{
		function getNombre();
	}

	class Avion implements vehiculo
	{
		public function getNombre(){
			return 'Soy un avion';
		}
	}

	class Automovil implements vehiculo
	{
		public function getNombre(){
			return 'Soy un automovil';
		}
	}

	class Camion implements vehiculo
	{
		public function getNombre(){
			return 'Soy un camión';
		}
	}

	class Camioneta implements vehiculo
	{
		public function getNombre(){
			return 'Soy una camioneta';
		}
	}

	class Moto implements vehiculo
	{
		public function getNombre(){
			return 'Soy una moto';
		}
	}

	class VehiculoFactory
	{
		public static function create($tipodevehiculo)
		{
			switch($tipodevehiculo){
				case "automovil":
					return new Automovil();
					break;
				case "avion": 
					return new Avion();
					break;
				case "camion":
					return new Camion();
					break;
				case "camioneta":
					return new Camioneta();
					break;
				case "moto":
					return new Moto();
					break;
			}
		}
	}

	$auto = VehiculoFactory::create("automovil");
	$avion = VehiculoFactory::create("avion");
	$camion = VehiculoFactory::create("camion");
	$camioneta = VehiculoFactory::create("camioneta");
	$moto = VehiculoFactory::create("moto");

	echo '<p>';
	echo $auto->getNombre();
	echo '</p>';

	echo '<p>';
	echo $avion->getNombre();
	echo '</p>';

	echo '<p>';
	echo $camion->getNombre();
	echo '</p>';

	echo '<p>';
	echo $camioneta->getNombre();
	echo '</p>';

	echo '<p>';
	echo $moto->getNombre();
	echo '</p>';

	?>
</div>
@endsection
