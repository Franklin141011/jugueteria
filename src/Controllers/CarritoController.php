<?php

namespace Controllers;

use Dao\CarritoDAO;

class CarritoController {
    private $carritoDAO;

    public function __construct() {
        $this->carritoDAO = new CarritoDAO();
    }

    public function crearCarrito($id_usuario) {
        return $this->carritoDAO->crearCarrito($id_usuario);
    }

    public function agregarProducto($id_carrito, $id_producto, $cantidad, $precio) {
        return $this->carritoDAO->agregarProducto($id_carrito, $id_producto, $cantidad, $precio);
    }

    public function listar($id_carrito) {
        return $this->carritoDAO->obtenerProductos($id_carrito);
    }
}
