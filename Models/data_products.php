<?php
require "../config/conexion.php";


class data_products
{
    public function __construct()
    {
    }

    public function insertar($Name, $Price, $Description, $Link)
    {
        $sql = "INSERT INTO data_products (Name, Price, Description, Link)
        VALUES ('$Name', '$Price', '$Description', '$Link')";
        return ejecutarConsulta($sql);
    }


    public function editar($id_product, $Name, $Price, $Description, $Link)
    {
        $sql = "UPDATE data_products SET Name = '$Name', Price= '$Price', Description= '$Description',  Link= '$Link'
        WHERE id_product = '$id_product' ";
        return ejecutarConsulta($sql);
    }



    public function mostrar($id_product)
    {
        $sql = "SELECT*FROM data_products WHERE id_product = '$id_product'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listar()
    {
        $sql = "SELECT*FROM data_products";
        return ejecutarCOnsulta($sql);
    }
}
