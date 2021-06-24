<?php 
//todos los modelos con mayuscula
require "../config/Conexion.php";
 
Class Retiro{

  //constructor
	public function __construct()
	{


	}
	//metodo para insertar registros
		public function insertar($idCuenta,$accion,$monto,$saldo,$fechaRetiro)
	{
		$sql="INSERT INTO retiro(idCuenta,accion,monto,saldo,fechaRetiro,condicion)
		VALUES ('$idCuenta','$accion','$monto','$saldo','$fechaRetiro','1')";
		return ejecutarConsulta($sql); //retorna 1 si la ejecucion fue correcta
	}
    //metodo para editar registro categoria funcion js 
        public function editar($idRetiro,$idCuenta,$accion,$monto,$saldo,$fechaRetiro)
	{

		$sql="UPDATE retiro SET idRetiro='$idRetiro',idCuenta='$idCuenta',tipoDeCuenta='$accion'
		,monto='$monto',saldo='$saldo',fechaRetiro='$fechaRetiro' 
		WHERE idRetiro='$idRetiro'";
		return ejecutarConsulta($sql);
	}
     
     //eliminar categoria solo desactiva  la condicion
	public function desactivar($idRetiro)

	{
		 $sql="UPDATE retiro SET condicion='0' WHERE idRetiro='$idRetiro'";
		return ejecutarConsulta($sql); //1 o 0
	}

	public function activar ($idRetiro)
	{
		$sql="UPDATE retiro SET condicion='1' WHERE idRetiro='$idRetiro'";
		return ejecutarConsulta($sql); 
	}
		public function actualizarSaldo($idCuenta,$saldo)
	{
		$sql="UPDATE cuenta SET saldo='$saldo' WHERE idcuenta='$idCuenta'";
		return ejecutarConsulta($sql); 
	}
	
	
  //muestra un tupla 
	public function mostrar($id)
	{

		$sql="SELECT * FROM retiro WHERE idretiro='$id'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
	public function getid($numeroCuenta)
	{

		$sql="SELECT idcuenta FROM cuenta WHERE numeroCuenta='$numeroCuenta'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
	public function getSaldo($idCuenta,$monto)
	{

		$sql="SELECT saldo FROM cuenta WHERE  idcuenta='$idCuenta' AND saldo>='$monto'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
	//sirve para obtener todas las tuplas de la tabla categoria
	public function listar()//mostrar todos los registros
	{
		$sql="SELECT * FROM retiro";
		return ejecutarConsulta($sql); //1 o 0
	}
	  public function select()//mostrar todos los registros
	{
		$sql="SELECT *FROM retiro WHERE condicion=1";
		return ejecutarConsulta($sql); //1 o 0
	}

	  

}
 ?>