<?php

require_once 'conexion.php';

class ModeloProductos {

  // MOSTRAR CATEGORIAS
  static public function mdlMostrarCategorias($tabla, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetch();
      $stmt -> close();
      $stmt = null;
    } else {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    }

  }

  // MOSTRAR SUBCATEGORIAS
  static public function mdlMostrarSubCategorias($tabla, $item, $valor) {
    if ($item!= null) {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    } else {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    }

  }

  // MOSTRAR PRODUCTOS
  static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo) {
    if ($item != null) {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item AND estado = 1 ORDER BY $ordenar $modo LIMIT $base, $tope");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    } else {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE estado = 1 ORDER BY $ordenar $modo LIMIT $base, $tope");
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    }

  }

  // MOSTRAR INFO PRODUCTO
  static public function mdlMostrarInfoProducto($tabla, $item, $valor) {
    $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item");
    $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
    $stmt -> execute();
    return $stmt -> fetch();
    $stmt -> close();
    $stmt = null;
  }

  // LISTAR PRODUCTOS
  static public function mdlListarProductos($tabla, $ordenar, $item, $valor) {
    if ($item != null) {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");
      $stmt -> bindParam(':'.$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    } else {
      $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");
      $stmt -> execute();
      return $stmt -> fetchAll();
      $stmt -> close();
      $stmt = null;
    }
  }

  // MOSTRAR CATEGORIAS HOME
  static public function mdlMostrarCategoriasHome($tabla) {
    $stmt = Conexion::conectar() -> prepare("SELECT * FROM $tabla ORDER BY Rand() LIMIT 6");
    $stmt -> execute();
    return $stmt -> fetchAll();
    $stmt -> close();
    $stmt = null;
  }

  // BUSCADOR
  static public function mdlBuscarProductos($tabla, $busqueda, $ordenar, $modo, $base, $tope) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

  // LISTAR PRODUCTOS BUSCADOR
  static public function mdlListarProductosBusqueda($tabla, $busqueda) {
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta like '%$busqueda%' OR titulo like '%$busqueda%' OR titular like '%$busqueda%' OR descripcion like '%$busqueda%'");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt = null;
	}

}