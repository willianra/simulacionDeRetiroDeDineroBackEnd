<?php 

require_once "../modelos/Cuenta.php";

$cuenta=new Cuenta();//instanciando al modelo categoria
 //reciviendo del formulario si existe estos objetos
$idcuenta=isset($_POST["idcuenta"])? limpiarCadena($_POST["idcuenta"]):"";
$numeroCuenta=isset($_POST["numeroCuenta"])? limpiarCadena($_POST["numeroCuenta"]):"";
$tipoDeCuenta=isset($_POST["tipoDeCuenta"])? limpiarCadena($_POST["tipoDeCuenta"]):"";
$saldo=isset($_POST["saldo"])? limpiarCadena($_POST["saldo"]):"";
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";

switch ($_GET["op"]){//operaciones q son enviados desde un js
	case 'guardaryeditar':
		if (empty($idcuenta)){
			//respuesta cero para editar
			//$idcuenta = getNeId
			echo $numeroCuenta.' '.$tipoDeCuenta.' '.$saldo.' '.$idpersona;
			$rspta=$cuenta->insertar($numeroCuenta,$tipoDeCuenta,$saldo,$idpersona);
			if($rspta){
				echo "cuenta creada";
			}else{
				echo  "cuenta no se pudo crear";
			}	         
		}else {

			$rspta=$cuenta->editar($idcuenta,$numeroCuenta,$tipoDeCuenta,$saldo,$idpersona);
			if($rspta){
				echo "cuenta modificada";
			}else{
				echo  "cuenta no se pudo modificar";
			}
		}
	break;

	case 'desactivar':
		$rspta=$cuenta->desactivar($idcuenta);
			if($rspta){
				echo "cuenta desactivada";
			}else{
				echo  "cuenta no se pudo desactivar";
			}

 		break;
	break;

	case 'activar':
		$rspta=$cuenta->activar($idcuenta);
			if($rspta){
				echo "cuenta activada";
			}else{
				echo  "cuenta no se pudo activar";
			}
          //...........................
 		break;
	break;

	case 'mostrar':
		$rspta=$cuenta->mostrar($idcuenta);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$cuenta->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				//campos del la tabla categoria
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcuenta.')">Editar</button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idcuenta.')">Desactivar</button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idcuenta.')">Editar</button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idcuenta.')">ACtivar</button>',
 				"1"=>$reg->idcuenta,
 				"2"=>$reg->numeroCuenta,
 				"3"=>$reg->tipoDeCuenta,
 				"4"=>$reg->saldo,
 				"5"=>$reg->nombre,
 				"6"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 				);
 		}
 		$results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
 			"aaData"=>$data);
 		echo json_encode($results);//array de resultados

	break;
	case "listarPersona":
		require_once "../modelos/Persona.php";
		$persona = new Persona();

		$rspta = $persona->listar();

		while ($reg = $rspta->fetch_object())
				{
					echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
				}
	break;
}
?>