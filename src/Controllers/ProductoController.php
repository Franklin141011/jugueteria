<?php

namespace Controllers;

use Dao\ProductoDAO;

class ProductoController {
    private $productoDAO;

    public function __construct() {
        $this->productoDAO = new ProductoDAO();
    }

    public function listar() {
        return $this->productoDAO->obtenerTodos();
    }

    public function mostrar($id) {
        return $this->productoDAO->obtenerPorId($id);
    }

    public function crear($nombre, $descripcion, $precio, $stock, $categoria) {
        return $this->productoDAO->crearProducto($nombre, $descripcion, $precio, $stock, $categoria);
    }
}
