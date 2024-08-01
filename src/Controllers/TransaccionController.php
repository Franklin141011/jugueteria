<?php

namespace Controllers;

use Dao\TransaccionDAO;

class TransaccionController {
    private $transaccionDAO;

    public function __construct() {
        $this->transaccionDAO = new TransaccionDAO();
    }

    public function obtenerHistorial($id_usuario) {
        return $this->transaccionDAO->obtenerHistorial($id_usuario);
    }
}
