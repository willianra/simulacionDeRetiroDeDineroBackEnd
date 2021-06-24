
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})
	$.post("../ajax/CuentaController.php?op=listarPersona", function(r){
		$("#idpersona").html(r);
		$('#idpersona').selectpicker('refresh');

});
		//Cargamos los items al select categoria
}

//Función limpia los formularios de la categoria
function limpiar()
{
	$("#idcuenta").val(""); 
	$("#numeroCuenta").val("");
	$("#tipoDeCuenta").val("");
	$("#saldo").val("");
	$("#idpersona").val("");
}

//Función mostrar formulario de registro
function mostrarform(flag)
{
	limpiar();
	if (flag) // si es verdadero  muestra el formulari
	{
		$("#listadopersona").hide();//nombre del div
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadopersona").show();//muestra el fomulario
		$("#formularioregistros").hide();//oculta el formulario
		$("#btnagregar").show();
	}
}

//Función cancelarform oculta el fomulario de registro 
function cancelarform()
{
	limpiar(); //limpia el formulario
	mostrarform(false);
}

//Función Listar
function listar()
{//ide del formulari '#tbllistado' tabla de l html
	//data table es un libreria 
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    // para exportar alos diferencte tipos de archivos
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax": //parametro
				{//obteniedo datos por get en la variable op
					url: '../ajax/CuentaController.php?op=listar',//accedi9endo
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);//si esque hay error	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//cantidad Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden descendente)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/CuentaController.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idcuenta)
{											//variable a enviar  valor enviado 
	$.post("../ajax/CuentaController.php?op=mostrar",{idcuenta : idcuenta}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idcuenta").val(data.idcuenta);
		$("#numeroCuenta").val(data.numeroCuenta);
		$("#tipoDeCuenta").val(data.tipoDeCuenta);
 		$("#saldo").val(data.saldo);
 		$("#idpersona").val(data.idpersona);
 	})
}

//Función para desactivar registros
function desactivar(idcuenta)
{
	bootbox.confirm("¿Está Seguro de desactivar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/CuentaController.php?op=desactivar", {idcuenta : idcuenta}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

//Función para activar registros
function activar(idcuenta)
{
	bootbox.confirm("¿Está Seguro de activar la persona?", function(result){
		if(result)
        {
        	$.post("../ajax/CuentaController.php?op=activar", {idcuenta : idcuenta}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}


init();