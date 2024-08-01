<?php

namespace Dao;

class UsuarioDAO extends Table {
    public static function obtenerUsuarioPorCorreo($correo) {
        $sqlstr = "SELECT * FROM Usuarios WHERE correo_electronico = :correo";
        $params = ['correo' => $correo];
        return self::obtenerUnRegistro($sqlstr, $params);
    }

    public static function registrarUsuario($nombre, $correo, $contrasena, $rol) {
        $sqlstr = "INSERT INTO Usuarios (nombre, correo_electronico, contrasena, rol) VALUES (:nombre, :correo, :contrasena, :rol)";
        $params = [
            'nombre' => $nombre,
            'correo' => $correo,
            'contrasena' => password_hash($contrasena, PASSWORD_BCRYPT),
            'rol' => $rol
        ];
        return self::executeNonQuery($sqlstr, $params);
    }
}
