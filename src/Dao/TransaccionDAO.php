<?php

namespace Dao;

class TransaccionDAO extends Table {
    public static function crearTransaccion($id_usuario, $tipo, $monto, $estado) {
        $sqlstr = "INSERT INTO Transacciones (id_usuario, tipo, monto, fecha_transaccion, estado) VALUES (:id_usuario, :tipo, :monto, NOW(), :estado)";
        $params = [
            'id_usuario' => $id_usuario,
            'tipo' => $tipo,
            'monto' => $monto,
            'estado' => $estado
        ];
        return self::executeNonQuery($sqlstr, $params);
    }

    public static function obtenerHistorial($id_usuario) {
        $sqlstr = "SELECT * FROM Transacciones WHERE id_usuario = :id_usuario";
        $params = ['id_usuario' => $id_usuario];
        return self::obtenerRegistros($sqlstr, $params);
    }
}
