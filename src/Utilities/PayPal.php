<?php

namespace Utilities;

class PayPal {
    public function procesarPago($monto) {
        // Simulación de procesamiento de pago
        return [
            'estado' => 'completada',
            'transaccion_id' => uniqid()
        ];
    }
}
