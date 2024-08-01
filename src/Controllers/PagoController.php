<?php

namespace Controllers;

use Dao\TransaccionDAO;
use Utilities\PayPal;

class PagoController {
    private $transaccionDAO;
    private $payPal;

    public function __construct() {
        $this->transaccionDAO = new TransaccionDAO();
        $this->payPal = new PayPal();
    }

    public function procesarPago($id_usuario, $monto) {
        $resultado = $this->payPal->procesarPago($monto);
        if ($resultado['estado'] == 'completada') {
            $this->transaccionDAO->crearTransaccion($id_usuario, 'compra', $monto, 'completada');
            return $resultado;
        }
        return false;
    }
}
