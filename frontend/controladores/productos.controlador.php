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

}