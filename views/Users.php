<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Users
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Método para insertar registros
	public function insertar($nombre1,$apellido,$tipo,$clave,$email,$img,$tel)
	{
		$sql="INSERT INTO users (nombre1,apellido,tipo,password,email,img,tel)
		VALUES ('$nombre1','$apellido','$tipo','$clave','$email','$img','$tel')";
		return ejecutarConsulta($sql);
	}

	//Método para editar registros
	public function editar($id_user,$nombre1,$apellido,$tipo,$clave,$email,$img,$tel)
	{
		$sql="UPDATE users SET nombre1='$nombre1',apellido = '$apellido',tipo='$tipo', password='$clave', email='$email', img='$img', tel='$tel'  WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar usuario admin
	public function desactivar($id_user)
	{
		$sql="UPDATE users SET tipo='1' WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar usuario admin
	public function activar($id_user)
	{
		$sql="UPDATE users SET tipo='0' WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($id_user)
	{
		$sql="SELECT * FROM users WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM users";
		return ejecutarConsulta($sql);		
	}

	//Implementar un método para listar los registros
	public function verificar($user_name,$user_key)
	{
		$sql="SELECT * FROM users WHERE nombre1='$user_name' and password ='$user_key'";
		
		return ejecutarConsulta($sql);		
	}
	public function verificar2($user_name,$user_key)
	{
		$sql="SELECT * FROM users WHERE id_user='$user_name' and password ='$user_key'";
		
		return ejecutarConsulta($sql);		
	}
	public function updatePwd($id_user,$new_pwd)
	{
		$sql="UPDATE users SET  password='$new_pwd'  WHERE id_user='$id_user'";
		return ejecutarConsulta($sql);
	}

}
?>