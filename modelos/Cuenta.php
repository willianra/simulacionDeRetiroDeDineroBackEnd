<?php 
//todos los modelos con mayuscula
require "../config/Conexion.php";
 
Class Cuenta{

  //constructor
	public function __construct()
	{


	}
	//metodo para insertar registros
		public function insertar($numeroCuenta,$tipoCuenta,$saldo,$idpersona)
	{
		$sql="INSERT INTO cuenta(numeroCuenta,tipoDeCuenta,saldo,idpersona,estado)
		VALUES ('$numeroCuenta','$tipoCuenta','$saldo','$idpersona','1')";
		return ejecutarConsulta($sql); //retorna 1 si la ejecucion fue correcta
	}
    //metodo para editar registro categoria funcion js 
        public function editar($idcuenta,$numeroCuenta,$tipoCuenta,$saldo,$idpersona)
	{

		$sql="UPDATE cuenta SET idcuenta='$idcuenta',numeroCuenta='$numeroCuenta',tipoDeCuenta='$tipoCuenta'
		,saldo='$saldo',idpersona='$idpersona' 
		WHERE idcuenta='$idcuenta'";
		return ejecutarConsulta($sql);
	}
     
     //eliminar categoria solo desactiva  la estado
	public function desactivar($idcuenta)

	{
		 $sql="UPDATE cuenta SET estado='0' WHERE idcuenta='$idcuenta'";
		return ejecutarConsulta($sql); //1 o 0
	}

	public function activar ($idcuenta)
	{
		$sql="UPDATE cuenta SET estado='1' WHERE idcuenta='$idcuenta'";
		return ejecutarConsulta($sql); 
	}
  //muestra un tupla 
	public function mostrar($idcuenta)
	{

		$sql="SELECT * FROM cuenta WHERE idcuenta='$idcuenta'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
	//sirve para obtener todas las tuplas de la tabla categoria
	public function listar()//mostrar todos los registros
	{
		$sql="SELECT cuenta.idcuenta,cuenta.numeroCuenta,cuenta.tipoDeCuenta,cuenta.saldo,persona.nombre ,cuenta.estado FROM cuenta ,persona where cuenta.idpersona=persona.idpersona ";
		return ejecutarConsulta($sql); //1 o 0
	}
	  public function select()//mostrar todos los registros
	{
		$sql="SELECT *FROM cuenta WHERE estado=1";
		return ejecutarConsulta($sql); //1 o 0
	}

	  

}
 ?>