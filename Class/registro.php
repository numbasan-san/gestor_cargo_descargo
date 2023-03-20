<?php

	class Registro {

		public $id;
		public $nombre;
		public $cedula;
		public $fecha;
		public $hora;
		public $tipo;
		public $equipos;
		public $seriales;

		public function __construct ( $id, $nombre, $cedula, $fecha, $hora, $tipo, $equipos, $seriales ) {
			$this->id = $id;
			$this->nombre = $nombre;
			$this->cedula = $cedula;
			$this->fecha = $fecha;
			$this->hora = $hora;
			$this->tipo = $tipo;
			$this->equipos = $equipos;
			$this->seriales = $seriales;
		}
		
	}

?>