<?php

class ControladorPlantilla {

	// LLAMAMOS LA PLANTILLA
  public function plantilla() { include 'vistas/plantilla.php'; }

	// TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA
	public function ctrEstiloPlantilla() {
		$tabla = 'plantilla';
		$respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
		return $respuesta;
	}

  // MOSTRAR DIVISA DE MANERA DINAMICA
  public function ctrMostrarDivisa() {
		$tabla = 'comercio';
		$respuesta = ModeloPlantilla::mdlMostrarDivisa($tabla);
		return $respuesta;
	}

}