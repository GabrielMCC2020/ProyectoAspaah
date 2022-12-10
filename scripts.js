//$("#crud").load("socio_list.php");

function enlace(evento){
	alert("pagina");
	$("#crud").fadeOut(300,function(){
		$(this).load(evento).fadeIn(2000);
	})
	return false;
}

function fn_eliminar(id){
	if(confirm("Realmente desea eliminar el registro?")){
		$.post( "crud.php",{go:'delete',id:id}, function( data ) {
	  		$("#crud").load("socio_list.php");
		});
	}
}

function fn_paginar(pagina){
	$("#crud").load("socio_list.php?pagina="+pagina);
}


