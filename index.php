<?php

// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use Controllers\SeguridadController;
use Controllers\ProductoController;
use Controllers\CarritoController;
use Controllers\PagoController;
use Controllers\TransaccionController;

// Inicia la sesión
session_start();

// Crear instancias de controladores
$seguridadController = new SeguridadController();
$productoController = new ProductoController();
$carritoController = new CarritoController();
$pagoController = new PagoController();
$transaccionController = new TransaccionController();

// Define las rutas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action == 'login') {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        if ($seguridadController->login($correo, $contrasena)) {
            header('Location: /proyecto4/index.php?action=catalogo');
            exit();
        } else {
            echo "Error de login";
        }
    } elseif ($action == 'register') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];
        if ($seguridadController->registrar($nombre, $correo, $contrasena, $rol)) {
            header('Location: /proyecto4/index.php?action=login');
            exit();
        } else {
            echo "Error de registro";
        }
    } elseif ($action == 'agregar-carrito') {
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $id_carrito = isset($_SESSION['carrito_id']) ? $_SESSION['carrito_id'] : null;
        if ($carritoController->agregarProducto($id_carrito, $id_producto, $cantidad, $precio)) {
            header('Location: /proyecto4/index.php?action=carrito');
            exit();
        } else {
            echo "Error al agregar producto al carrito";
        }
    } elseif ($action == 'procesar-pago') {
        $id_usuario = isset($_SESSION['usuario']['id_usuario']) ? $_SESSION['usuario']['id_usuario'] : null;
        $monto = $_POST['monto'];
        if ($pagoController->procesarPago($id_usuario, $monto)) {
            header('Location: /proyecto4/index.php?action=historico');
            exit();
        } else {
            echo "Error al procesar el pago";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action == 'catalogo') {
        $productos = $productoController->listar();
        include 'src/Views/templates/productos/productosOferta.view.tpl';
    } elseif ($action == 'carrito') {
        $carrito = $carritoController->listar(isset($_SESSION['carrito_id']) ? $_SESSION['carrito_id'] : null);
        include 'src/Views/templates/carrito/carrito.view.tpl';
    } elseif ($action == 'historico') {
        $id_usuario = isset($_SESSION['usuario']['id_usuario']) ? $_SESSION['usuario']['id_usuario'] : null;
        if ($id_usuario) {
            $transacciones = $transaccionController->obtenerHistorial($id_usuario);
            include 'src/Views/templates/transacciones/historico.view.tpl';
        } else {
            echo "Error: No se encontró el usuario.";
        }
    }
}
