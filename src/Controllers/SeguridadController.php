<?php

namespace Controllers;

use Dao\UsuarioDAO;

class SeguridadController {
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function login($correo, $contrasena) {
        $usuario = $this->usuarioDAO->obtenerUsuarioPorCorreo($correo);
        if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
            $_SESSION['usuario'] = $usuario;
            return true;
        }
        return false;
    }

    public function registrar($nombre, $correo, $contrasena, $rol) {
        return $this->usuarioDAO->registrarUsuario($nombre, $correo, $contrasena, $rol);
    }

    public function logout() {
        unset($_SESSION['usuario']);
    }

    public function estaAutenticado() {
        return isset($_SESSION['usuario']);
    }
}
