<?php

namespace Dao;

class CarritoDAO extends Table {
    public static function crearCarrito($id_usuario) {
        $sqlstr = "INSERT INTO CarritoDeCompras (id_usuario, fecha_creacion) VALUES (:id_usuario, NOW())";
        $params = ['id_usuario' => $id_usuario];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function agregarProducto($id_carrito, $id_producto, $cantidad, $precio) {
        $sqlstr = "INSERT INTO DetallesDelCarrito (id_carrito, id_producto, cantidad, precio) VALUES (:id_carrito, :id_producto, :cantidad, :precio)";
        $params = [
            'id_carrito' => $id_carrito,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio' => $precio
        ];
        return self::executeNonQuery($sqlstr, $params);
    }
}
