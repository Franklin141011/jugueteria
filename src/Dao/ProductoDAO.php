<?php

namespace Dao;

class ProductoDAO extends Table {
    public static function obtenerTodos() {
        $sqlstr = "SELECT * FROM Productos";
        return self::obtenerRegistros($sqlstr, []);
    }

    public static function obtenerPorId($id) {
        $sqlstr = "SELECT * FROM Productos WHERE id_producto = :id";
        $params = ['id' => $id];
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function crearProducto($nombre, $descripcion, $precio, $stock, $categoria) {
        $sqlstr = "INSERT INTO Productos (nombre, descripcion, precio, stock, categoria) VALUES (:nombre, :descripcion, :precio, :stock, :categoria)";
        $params = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock,
            'categoria' => $categoria
        ];
        return self::executeNonQuery($sqlstr, $params);
    }
}
