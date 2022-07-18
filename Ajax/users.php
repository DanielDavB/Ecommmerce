<?php

require_once "../Models/users.php";

$users = new users();

$id_user = isset($_POST["id_user"]) ? limpiarCadena($_POST["id_user"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$nickname = isset($_POST["nickname"]) ? limpiarCadena($_POST["nickname"]) : "";
$phone = isset($_POST["phone"]) ? limpiarCadena($_POST["phone"]) : "";
$type = isset($_POST["type"]) ? limpiarCadena($_POST["type"]) : "";



switch ($_GET["op"]) {
	case 'guardaryeditar':



		if (empty($id_user)) {
			$rspta = $users->insertar($nombre, $nickname, $phone, $type);
			echo $rspta ? "Dato  users registrado" : "Dato  users no se pudo registrar";
		} else {
			$rspta = $users->editar($id_user, $nombre, $nickname, $phone, $type);
			echo $rspta ? "Dato  users actualizado" : "Dato  users no se pudo actualizar";
		}
		break;

	case 'mostrar':
		$rspta = $users->mostrar($id_user);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
		break;
		break;

	case 'listar':
		$rspta = $users->listar();
		//Vamos a declarar un array
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->id_user . ')"><i class="fas fa-pencil-alt"></i></button>',
				"1" => $reg->nombre,
				"2" => $reg->nickname,
				"3" => $reg->phone,
				"4" => $reg->type,

			);
		}
		$results = array(
			"sEcho" => 1, //Información para el datatables
			"iTotalRecords" => count($data), //enviamos el total registros al datatable
			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
		);
		echo json_encode($results);

		break;
}
