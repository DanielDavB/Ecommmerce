<?php
require "../config/conexion.php";


Class users
{
    public function __construct()
    {
    }

    public function insertar($nombre, $nickname, $phone, $type)
    {
        $sql = "INSERT INTO users (nombre, nickname, phone, type)
        VALUES ('$nombre', '$nickname', '$phone', '$type')";
        return ejecutarConsulta($sql);
    }


    public function editar($id_user, $nombre, $nickname, $phone , $type)
    {
        $sql = "UPDATE users SET nombre = '$nombre', nickname= '$nickname', phone = '$phone', type = '$type',
        WHERE id_user = '$id_user' ";
        return ejecutarConsulta($sql);
    }

    public function desactivar($id_user)
    {
        $sql = "UPDATE users SET condicion = '0' WHERE id_user= '$id_user' ";
        return ejecutarConsulta($sql);
    }

    public function activar($id_user)
    {
        $sql = "UPDATE users SET condicion = '1' WHERE id_user= '$id_user' ";
        return ejecutarConsulta($sql);
    }

    public function mostrar($id_user)
    {
        $sql = "SELECT*FROM users WHERE id_user = '$id_user'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar()
    {
        $sql = "SELECT*FROM users";
        return ejecutarCOnsulta($sql);
    }
}

?>
