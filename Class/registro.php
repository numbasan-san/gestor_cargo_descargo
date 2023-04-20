<?php

	class Registro {

		public $id;
		public $nombre;
		public $fecha;
		public $hora;
		public $tipo_registro;
		public $tipo_equipo;
		public $equipos;
		public $seriales;

		public function __construct ( $id, $nombre, $fecha, $hora, $tipo_registro, $tipo_equipo, $equipos, $seriales ) {
			$this->id = $id;
			$this->nombre = $nombre;
			$this->fecha = $fecha;
			$this->hora = $hora;
			$this->tipo_registro = $tipo_registro;
			$this->tipo_equipo = $tipo_equipo;
			$this->equipos = $equipos;
			$this->seriales = $seriales;
		}
		
	}

?>