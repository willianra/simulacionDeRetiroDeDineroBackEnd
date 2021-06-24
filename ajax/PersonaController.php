<?php 

require_once "../modelos/Persona.php";

$persona=new Persona();//instanciando al modelo categoria
 //reciviendo del formulario si existe estos objetos
$idpersona=isset($_POST["idpersona"])? limpiarCadena($_POST["idpersona"]):"";
$nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
$telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
$carnet=isset($_POST["carnet"])? limpiarCadena($_POST["carnet"]):"";
$direccion=isset($_POST["direccion"])? limpiarCadena($_POST["direccion"]):"";
$fechaNacimiento=isset($_POST["fechaNacimiento"])? limpiarCadena($_POST["fechaNacimiento"]):"";
$correo=isset($_POST["correo"])? limpiarCadena($_POST["correo"]):"";
$codigo=isset($_POST["codigo"])? limpiarCadena($_POST["codigo"]):"";
$huella=isset($_POST["huella"])? limpiarCadena($_POST["huella"]):"";
$estado=isset($_POST["estado"])? limpiarCadena($_POST["estado"]):"";

switch ($_GET["op"]){//operaciones q son enviados desde un js
	case 'guardaryeditar':
		if (empty($idpersona)){
			//respuesta cero para editar
			//$idpersona = getNeId
			echo $nombre.' '.$telefono.' '.$carnet.' '.$direccion.' '.$fechaNacimiento.' '.$correo.' '.$codigo.' '.$huella;
			$rspta=$persona->insertar($nombre,$telefono,$carnet,$direccion,$fechaNacimiento,$correo,$codigo,$huella);
			if($rspta){
				echo "persona creada";
			}else{
				echo  "persona no se pudo crear";
			}	         
		}else {

			$rspta=$persona->editar($idpersona,$nombre,$telefono,$carnet,$direccion,$fechaNacimiento,$correo,$codigo,$huella);
			if($rspta){
				echo "persona modificada";
			}else{
				echo  "persona no se pudo modificar";
			}
		}
	break;

	case 'desactivar':
		$rspta=$persona->desactivar($idpersona);
			if($rspta){
				echo "Persona desactivada";
			}else{
				echo  "Persona no se pudo desactivar";
			}

 		break;
	break;

	case 'activar':
		$rspta=$persona->activar($idpersona);
			if($rspta){
				echo "Persona activada";
			}else{
				echo  "Persona no se pudo activar";
			}
          //...........................
 		break;
	break;

	case 'mostrar':
		$rspta=$persona->mostrar($idpersona);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$persona->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				//campos del la tabla categoria
 				"0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')">Editar</button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idpersona.')">Desactivar</button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idpersona.')">Editar</button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idpersona.')">ACtivar</button>',
 				"1"=>$reg->idpersona,
 				"2"=>$reg->nombre,
 				"3"=>$reg->telefono,
 				"4"=>$reg->carnet,
 				"5"=>$reg->direccion,
 				"6"=>$reg->fechaNacimiento,
 				"7"=>$reg->correo,
 				"8"=>$reg->codigo,
 				"9"=>$reg->huella,
 				"10"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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
}
?>