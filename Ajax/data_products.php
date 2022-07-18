<?php

require_once "../Models/data_products.php";

$data_products = new data_products();

$id_product = isset($_POST["id_product"]) ? limpiarCadena($_POST["id_product"]) : "";
$Name = isset($_POST["Name"]) ? limpiarCadena($_POST["Name"]) : "";
$Price = isset($_POST["Price"]) ? limpiarCadena($_POST["Price"]) : "";
$Description = isset($_POST["Description"]) ? limpiarCadena($_POST["Description"]) : "";
$Link = isset($_POST["Link"]) ? limpiarCadena($_POST["Link"]) : "";



switch ($_GET["op"]) {
	case 'guardaryeditar':


		if (empty($id_product)) {
			$rspta = $data_products->insertar($Name, $Price, $Description, $Link);
			echo $rspta ? "datos registrados" : "No se completaron los registros";
		} else {
			$rspta = $data_products->editar($id_product, $Name, $Price, $Description, $Link);
			echo $rspta ? "datos registrados" : "No se completaron los registros";
		}
		break;

	case 'mostrar':
		$rspta = $data_products->mostrar($id_product);
		//Codificar el resultado utilizando json
		echo json_encode($rspta);
		break;
		break;

	case 'listar':
		$rspta = $data_products->listar();
		//Vamos a declarar un array
		$data = array();

		while ($reg = $rspta->fetch_object()) {
			$data[] = array(
				"0" => '<button class="btn btn-warning" onclick="mostrar(' . $reg->id_product . ')"><i class="fas fa-pencil-alt"></i></button>',

				"1" => $reg->Name,
				"2" => $reg->Price,
				"3" => $reg->Description,
				"4" => $reg->Link,

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
