<?php

class ControladorPlantilla {

	// LLAMAMOS LA PLANTILLA
  static public function plantilla() { include 'vistas/plantilla.php'; }

	// TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA
	static public function ctrEstiloPlantilla() {
		$tabla = 'plantilla';
		$respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
		return $respuesta;
	}

  // MOSTRAR DIVISA DE MANERA DINAMICA
  static public function ctrMostrarDivisa() {
		$tabla = 'comercio';
		$respuesta = ModeloPlantilla::mdlMostrarDivisa($tabla);
		return $respuesta;
	}

	// TRAEMOS LAS CABECERAS
	static public function ctrTraerCabeceras($ruta) {
		$tabla = 'cabeceras';
    $respuesta = ModeloPlantilla::mdlTraerCabeceras($tabla, $ruta);
		return $respuesta;
	}

}