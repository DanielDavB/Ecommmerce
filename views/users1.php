<?php 

require_once "../modelos/Users.php";

$users=new Users();

//$id_user=isset($_POST["id_user"])? limpiarCadena($_POST["id_user"]):"";
$nombre1=isset($_POST["nombre1"])? limpiarCadena($_POST["nombre1"]):"";
$apellido=isset($_POST["apellido"])? limpiarCadena($_POST["apellido"]):"";

//$tipo=isset($_POST["tipo"])? limpiarCadena($_POST["tipo"]):"";
$tipo = 1;
$clave=isset($_POST["clave"])? limpiarCadena($_POST["clave"]):"";
$email=isset($_POST["email"])? limpiarCadena($_POST["email"]):"";
$img=isset($_POST["img"])? limpiarCadena($_POST["img"]):"";
$tel=isset($_POST["tel"])? limpiarCadena($_POST["tel"]):"";
$opcion=isset($_POST["op"])?$_POST["op"]:$_REQUEST["op"];

switch ($opcion){
	case 'guardaryeditar':
			// $target_dir = "../../public/stuff/uploads/user/";
			// $target_file = $target_dir . basename($_FILES["img"]["name"]);
			// $uploadOk = 1;
			// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
			{
				$img=$_POST["ia1"];
			}
			else 
			{
				$ext = explode(".", $_FILES["img"]["name"]);
				if ($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png")
				{
					$img = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["img"]["tmp_name"], "../stuff/user/" . $img);
				}
			}
			//Hash SHA256 en la contraseña $clave=hash("SHA256",$clave);
		
		//if (empty($id_user)){
			$rspta=$users->insertar($nombre1,$apellido,$tipo,$clave,$email,$img,$tel);
			echo $rspta ? "Usuario registrado" : "Usuario no se pudo registrar";
		//}
		//else {
// $parametros = array($id_user,$nombre1,$apellido,$tipo,$clave,$email,$img);
// var_dump($parametros);
		//	$rspta=$users->editar($id_user,$nombre1,$apellido,$tipo,$clave,$email,$img);
			//echo $rspta ? $rspta : "Usuario no se pudo actualizar";
		//	echo $rspta ? "Usuario actualizado" : "Usuario no se pudo actualizar";
		break;
	break;

	case 'desactivar':
		$rspta=$users->desactivar($id_user);
 		echo $rspta ? "Usuario Desactivado" : "Usuario no se puede desactivar";
 		break;
	break;

	case 'activar':
		$rspta=$users->activar($id_user);
 		echo $rspta ? "Usuario activado" : "Usuario no se puede activar";
 		break;
	break;

	case 'mostrar':
		$id_user=$_POST['id_user'];
		$rspta=$users->mostrar($id_user);
		while ($row = $rspta->fetch_object()){
	        $user_arr[] = $row;
	    }
 		//Codificar el resultado utilizando json
 		echo json_encode($user_arr);
 		break;
	break;

	case 'listar':
		$rspta=$users->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->id_user.')"><i class="fa fa-pencil"></i></button>',
 			    "1"=>$reg->nombre1.' '.$reg->apellido, 				
 				"2"=>$reg->tipo,
 				"3"=>$reg->password,
				"4"=>$reg->email,
				"5"=>"<img src='../stuff/user/".$reg->img."' height='50px' width='50px'>",
				"6"=>$reg->tel
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);

	break;
	case 'verificar':
  		$user_name=$_POST['logina'];
		$user_key=$_POST['clavea'];
		$rspta=$users->verificar($user_name,$user_key);

		while ($row = $rspta->fetch_object()){
	        $user_arr[] = $row;
	    }


		 if ($user_arr)
	     {
	     	session_start();
	         //Declaramos las variables de sesión
	         $_SESSION["id_user"]=$user_arr[0]->id_user;
	         $_SESSION["nombre"]=$user_arr[0]->nombre1;
	         $_SESSION["img"]=$user_arr[0]->img;
	         $_SESSION['acceso']=$user_arr[0]->tipo;
	         $_SESSION['tel']=$user_arr[0]->tel;
	         $_SESSION['email']=$user_arr[0]->email;
	     }
	     //var_dump( $_SESSION["nombre"]);
	    echo json_encode(array('data'=>$user_arr));
	break;

	case 'salir':
		//Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();
        //Redireccionamos al login
        header("Location: ../index.php");

	break;

}

?>