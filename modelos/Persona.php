<?php 
//todos los modelos con mayuscula
require "../config/Conexion.php";
 
Class Persona{

  //constructor
	public function __construct()
	{


	}
	//metodo para insertar registros
		public function insertar($nombre,$telefono,$carnet,$direccion,$fechaNacimiento,$correo,$codigo,$huella)
	{
		$sql="INSERT INTO persona(nombre,telefono,carnet,direccion,fechaNacimiento,correo,codigo,huella,estado)
		VALUES ('$nombre','$telefono','$carnet','$direccion','$fechaNacimiento','$correo','$codigo','$huella','1')";
		return ejecutarConsulta($sql); //retorna 1 si la ejecucion fue correcta
	}
    //metodo para editar registro categoria funcion js 
        public function editar($idpersona,$nombre,$telefono,$carnet,$direccion,$fechaNacimiento,$correo,$codigo,$huella)
	{

		$sql="UPDATE persona SET idpersona='$idpersona',nombre='$nombre',telefono='$telefono'
		,carnet='$carnet',direccion='$direccion',fechaNacimiento='$fechaNacimiento',correo='$correo',codigo='$codigo',huella='$huella'
		WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql);
	}
     
     //eliminar categoria solo desactiva  la estado
	public function desactivar($idpersona)

	{
		 $sql="UPDATE persona SET estado='0' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql); //1 o 0
	}

	public function activar ($idpersona)
	{
		$sql="UPDATE persona SET estado='1' WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql); 
	}
  //muestra un tupla 
	public function mostrar($idpersona)
	{

		$sql="SELECT * FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsultasimplefila($sql);//retorna valores  
	}
	//sirve para obtener todas las tuplas de la tabla categoria
	public function listar()//mostrar todos los registros
	{
		$sql="SELECT * FROM persona ";
		return ejecutarConsulta($sql); //1 o 0
	}
	  public function select()//mostrar todos los registros
	{
		$sql="SELECT *FROM persona WHERE estado=1";
		return ejecutarConsulta($sql); //1 o 0
	}

	 public function getTipo($idpersona)//mostrar todos los registros
	{
		$sql="SELECT codigo FROM persona WHERE idpersona='$idpersona'";
		return ejecutarConsulta($sql); //1 o 0
	}	

}
 ?>