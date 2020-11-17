@extends('plantilla')

@section('seccion')

<h3>Patrón {{$type}}</h3>
<div class="alert alert-dark">

<?php
	/* Patron No Singleton */
	class Conexion { 
		protected static $hostname 	=	'localhost';
		protected static $username 	= 	'root';
		protected static $password	= 	'';
		protected static $dbname 	= 	'mibase';
		/** * Make constructor private, so nobody can call "new Class". */
		private function __construct() {} 
		/** * Make clone magic method private, so nobody can clone instance. */ 
		private function __clone() {}

		/* Como es estatica es un metodo a nivel de clase, no hace falta instanciar el objeto, de hecho no se puede instanciar como se menciona arriba,
			ya que se hizo privado el constructor	*/
		public static function getInstance() { 
			return new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password);  
		}
	}
	/* Patron Singleton */
	class SingletonConexion { 
		public static $instance = null; 
		public static $hostname 	=	'localhost';
		public static $username 	= 	'root';
		public static $password	= 	'';
		public static $dbname 	= 	'mibase';
		/** * Make constructor private, so nobody can call "new Class". */
		private function __construct() {} 
		/** * Make clone magic method private, so nobody can clone instance. */ 
		private function __clone() {}

		/* Como es estatica es un metodo a nivel de clase, no hace falta instanciar el objeto, de hecho no se puede instanciar como se menciona arriba,
			ya que se hizo privado el constructor	*/
		public static function getInstance() { 
			if (!isset(self::$instance)) { 
				self::$instance = new PDO("mysql:host=".self::$hostname.";dbname=".self::$dbname, self::$username, self::$password); 
			} 
			return self::$instance; 
		}
	}

	echo "<p>";
	echo 'No singleton<br>';
	$conexion1 = Conexion::getInstance();
	$conexion2 = Conexion::getInstance();
	$conexion3 = Conexion::getInstance();
	var_dump($conexion1);echo'<br>';
	var_dump($conexion2);echo'<br>';
	var_dump($conexion3);echo'<br>';
	echo "</p>";

	echo "<p>";
	echo 'Singleton<br>';
	$conexion1 = SingletonConexion::getInstance();
	$conexion2 = SingletonConexion::getInstance();
	$conexion3 = SingletonConexion::getInstance();
	var_dump($conexion1);echo'<br>';
	var_dump($conexion2);echo'<br>';
	var_dump($conexion3);echo'<br>';
	echo "</p>";
	?>
</div>
@endsection
