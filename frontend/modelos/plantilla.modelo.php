<?php

require_once 'conexion.php';

class ModeloPlantilla {

	// TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA
	static public function mdlEstiloPlantilla($tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}

  // TEAEMOS DIVISA DE MANERA DINAMICA
  static public function mdlMostrarDivisa($tabla) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt =  null;
	}

}