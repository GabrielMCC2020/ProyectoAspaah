<script>
  $("#frm_buscador").validate({
    submitHandler: function(form) {
      var texto=$("#buscar_nombre").val();
      $("#crud").load("maquinaria_list.php?buscar_nombre="+texto);
    }
  });
</script>

<h1 class="text-center">Gestión de Maquinarias</h1>
<div class="row">
  <div class="col-md-3">
    <div class="nuevo">
      <a data-fancybox data-type="ajax" data-src="maquinaria_add.php" href="javascript:;" class="btn btn-primary">Nuevo Maquinaria</a>
    </div>
  </div>
  <div class="col-md-9">
      <form class="d-flex" method="POST" id="frm_buscador" action="">
        <input id="buscar_nombre" class="form-control me-sm-2" type="text" placeholder="Buscar por nombre" required minlength="2">
        <input type="submit" value="Buscar" class="btn btn-secondary my-2 my-sm-0">
      </form>
  </div>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Modelo</th>
      <th scope="col">Potencia</th>
      <th scope="col">Cilindros</th>
      <th scope="col">Tipo</th>
      <th scope="col">Descripción</th>
      <th scope="col" colspan="2">Opciones</th>
    </tr>
  </thead>
  <?php
  include("conexion.php");
  	//$url = "list.php";
  //PAGINADOR
  $texto=(isset($_REQUEST["buscar_nombre"]))?$_REQUEST["buscar_nombre"]:"";
	if(isset($_REQUEST['pagina'])){
	    $pagina=$_REQUEST['pagina'];
	}else{
	    $pagina = 1;
	}

  $tamano_pagina = 20;
  
  if(isset($_REQUEST['buscar_nombre'])){
    $query2="SELECT * FROM maquinarias WHERE modelo LIKE '".$texto."%' ORDER BY idmaquinaria DESC";

  }else{
    $query1="SELECT * FROM maquinarias";
    $total=mysqli_query($link,$query1);
    $total_reg = mysqli_num_rows($total);
    $total_paginas = ceil($total_reg / $tamano_pagina);
    $inicio = ($pagina-1)*$tamano_pagina;
    $query2 = "SELECT * FROM maquinarias ORDER BY idmaquinaria DESC LIMIT ".$inicio.", ".$tamano_pagina;
  }
	
	$registros = mysqli_query($link,$query2); 
  	
  ?>

  <tbody>
  	<?php
  		$cont=0;
  		while($data=mysqli_fetch_array($registros)){
  		$cont=$cont+1;
  	?>
    <tr class="table-primary">
      <th scope="row"><?= $data[0] ?></th>
      <td><?= $data[1] ?></td>
      <td><?= $data[2] ?></td>
      <td><?= $data[3] ?></td>
      <td><?= $data[4] ?></td>
      <td><?= $data[5] ?></td>
      <td> <a data-fancybox data-type="ajax" data-src="maquinaria_edit.php?id=<?= $data[0]?>" href="javascript:;">Editar</a></td>
      <td><a href="javascript:fn_eliminar_maquinaria(<?= $data[0] ?>)">Eliminar</a></td>
    </tr>
   <?php } 
   ?>
  </tbody>
</table>
<div class="paginador text-center">
	<?php
		//echo $pagina;
		//PAGINADOR 1
		/*
		echo "<div class='text-center' id='paginador'>";
		if($pagina < $total_paginas){
		    echo "<a href='".$url."?pagina=".($pagina - 1)."'>Anterior</a>";
		}
		echo " || ";
		if($pagina < $total_paginas){
		    echo "<a href='".$url."?pagina=".($pagina + 1)."'>Siguiente</a>";
		}
		echo "</div>";
		*/
		//PAGINACION 2
    $total_paginas=(isset($total_paginas)?$total_paginas:0);
		for ($i=1;$i<$total_paginas;$i++) { 
			
			if($pagina < $total_paginas){
        //echo "<a href='".$url."?pagina=".($i)."'>P $i</a>";
        //echo " | ";
  ?>
			    
          <a href="javascript:fn_paginar(<?= $i ?>)"><?="P".$i?> |</a>
	<?php
      }
		}
	?>
</div>

<script>
function fn_eliminar_maquinaria(id){
  if(confirm("Realmente desea eliminar el registro?")){
    $.post( "maquinaria_crud.php",{go:'delete',id:id}, function( data ) {
      console.log(data);
        $("#crud").load("maquinaria_list.php");
    });
  }
}
</script>