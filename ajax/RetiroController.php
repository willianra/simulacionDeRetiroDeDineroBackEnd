<?php 

require_once "../modelos/Retiro.php";

$retiro=new Retiro();//instanciando al modelo categoria
 //reciviendo del formulario si existe estos objetos
$idretiro=isset($_POST["idretiro"])? limpiarCadena($_POST["idretiro"]):"";
$numeroCuenta=isset($_POST["idCuenta"])? limpiarCadena($_POST["idCuenta"]):"";
$accion=isset($_POST["accion"])? limpiarCadena($_POST["accion"]):"";
$monto=isset($_POST["monto"])? limpiarCadena($_POST["monto"]):"";
$fechaRetiro=date('Y-m-d H:i:s');

switch ($_GET["op"]){//operaciones q son enviados desde un js
	case 'guardaryeditar':
		if (empty($idretiro)){
			//respuesta cero para editar
			//$idretiro = getNeId 
			$idCuenta=$retiro->getid($numeroCuenta);
			 $data= Array();
			if (!isset($idCuenta)) {
				//echo 'no existe la cuenta';
				$data[]=array("0"=>'registro fallido',"1"=>'no existe la cuenta');
			  echo json_encode($data);
				//echo json_encode($data);
				break;
			}
			$idCuenta=$idCuenta['idcuenta'];
			//echo $idCuenta['idcuenta'];
			
			$saldo=$retiro->getSaldo($idCuenta,$monto);
			if (!isset($saldo)) {
				$data[]=array("0"=>'registro fallido',"1"=>'saldo insuficiente');
				echo json_encode($data);
				break;
			}
			$saldo=$saldo['saldo']-$monto;
			//echo 'saldo '.$saldo['saldo'];
			
			
			//echo $idCuenta.' '.$accion.' '.$monto.' '.$saldo;
			$rspta=$retiro->insertar($idCuenta,$accion,$monto,$saldo,$fechaRetiro);
			if($rspta){
			  
			   
              	$rspta2=$retiro->actualizarSaldo($idCuenta,$saldo);
              	$data[]=array("0"=>'registro exitoso',"1"=>$saldo.'.bs');
			  echo json_encode($data);
			//	echo "retiro registrado";
			}else{
				echo  "retiro no se pudo crear";
			}	         
		}else {
			$rspta=$retiro->editar($idRetiro,$idCuenta,$accion,$monto,$saldo,$fechaRetiro);
			if($rspta){
				echo "retiro modificada";
			}else{
				echo  "retiro no se pudo modificar";
			}
		}
	break;

	case 'desactivar':
		$rspta=$retiro->desactivar($idretiro);
			if($rspta){
				echo "retiro desactivada";
			}else{
				echo  "retiro no se pudo desactivar";
			}

 		
	break;

	case 'activar':
		$rspta=$retiro->activar($idretiro);
			if($rspta){
				echo "retiro activada";
			}else{
				echo  "retiro no se pudo activar";
			}
          //...........................
 		break;
	break;

	case 'mostrar':
		$rspta=$retiro->mostrar($idretiro);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
 		break;
	break;

	case 'listar':
		$rspta=$retiro->listar();
 		//Vamos a declarar un array
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				//campos del la tabla categoria
 				"0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idretiro.')">Editar</button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->idretiro.')">Desactivar</button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->idretiro.')">Editar</button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->idretiro.')">ACtivar</button>',
 				"1"=>$reg->idretiro,
 				"2"=>$reg->idCuenta,
 				"3"=>$reg->accion,
 				"4"=>$reg->monto,
 				"5"=>$reg->saldo,
 				"6"=>$reg->fechaRetiro,
 				"7"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
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
					echo '<option value=' . $reg->saldo . '>' . $reg->nombre . '</option>';
				}
	break;
}
?>