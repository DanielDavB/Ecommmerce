var tabla;

//Función que se ejecuta al inicio
function init(){
	mostrarform(false);
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	 $("#btnConfirm").click(function () {
	 	$(location).attr("href","loginCliente.php");       
    });
    $("#btnNo").click(function () {
      $("#modalRegForm").modal('hide');
    });
    $('#showPassword').change(function() {
        	
        	document.forms.formulario.clave.setAttribute('type',this.checked ? 'text' : 'password');
        	document.forms.formulario.confirmPassword.setAttribute('type',this.checked ? 'text' : 'password');
    
        
    });

	
}

//Función limpiar
function limpiar()
{
	$("#nombre1").val("");
	$("#apellido").val("");
	$("#tipo").val("");
	$("#clave").val("");
	$("#email").val("");
	$("#ia1").val("");
	$("#id_user").val("");			
	$("#ia1").attr("src","");
	$("#im1").attr("src","");
	$("#tel").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    'serverMethod': 'post',
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax": {
      				"url": "../ajax/users.php?op=listar",
      				
					contentType: 'application/json; utf-8',
      				dataType: 'json',					
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 1, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",false);
	var formData = new FormData($("#formulario")[0]);
	
	//if($("#formulario").valid()) {
		$.ajax({
				url: "../ajax/users.php?op=guardaryeditar",
			    type: "POST",		
		 		data:formData,
		        cache:false,
		        contentType: false,
		        processData: false,
		        success:function(data){
		        	   $("#modalRegForm").modal('hide');
					$('#modalConfirm').modal({ keyboard: false, backdrop: 'static' });
					 
		        	// bootbox.alert(data) ;	
					 //$(location).attr("href","index.php");  
		               
		            },
					
		        error: function(data){
		                console.log("error");
		                console.log(data);
						
		            }

	   		});
//
	
	limpiar();

}
 
function mostrarRegForm()
{

	
	
	  $('#modalRegForm').modal({ keyboard: false, backdrop: 'static' });

}
init();