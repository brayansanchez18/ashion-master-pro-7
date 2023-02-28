<?php

class ControladorProductos {

  // MOSTRAR CATEGORIAS
  static public function ctrMostrarCategorias($item, $valor) {
    $tabla = 'categorias';
    $respuesta = ModeloProductos::mdlMostrarCategorias($tabla, $item, $valor);
    return $respuesta;
  }

  // MOSTRAR SUB CATEGORIAS
  static public function ctrMostrarSubCategorias($item, $valor) {
    $tabla ='subcategorias';
    $respuesta = ModeloProductos::mdlMostrarSubCategorias($tabla, $item, $valor);
    return $respuesta;
  }

  // MOSTRAR PRODUCTOS
  static public function ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo);
    return $respuesta;
  }

  // MOSTRAR INFO PRODUCTO
  static public function ctrMostrarInfoproducto($item, $valor) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlMostrarInfoProducto($tabla, $item, $valor);
    return $respuesta;
  }

  // LISTAR PRODUCTOS
  static public function ctrListarProductos($ordenar, $item, $val) {
    $tabla = 'productos';
    $respuesta = ModeloProductos::mdlListarProductos($tabla, $ordenar, $item, $val);
    return $respuesta;
  }

  // MOSTRAR CATEGORIAS HOME
  static public function ctrMostrarCategoriasHome() {
    $tabla = 'homeCategorias';
    $respuesta = ModeloProductos::mdlMostrarCategoriasHome($tabla);
    return $respuesta;
  }

  // BUSCADOR
  static public function ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope) {
		$tabla = 'productos';
		$respuesta = ModeloProductos::mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope);
		return $respuesta;
	}

  // LISTAR PRODUCTOS BUSCADOR
  static public function ctrListarProductosBusqueda($busqueda) {
		$tabla = 'productos';
		$respuesta = ModeloProductos::mdlListarProductosBusqueda($tabla, $busqueda);
		return $respuesta;
	}

  // ACTUALIZAR VISTA PRODUCTO
  static public function ctrActualizarProducto($item1, $valor1, $item2, $valor2) {
		$tabla = 'productos';
		$respuesta = ModeloProductos::mdlActualizarProducto($tabla, $item1, $valor1, $item2, $valor2);
		return $respuesta;
	}

}