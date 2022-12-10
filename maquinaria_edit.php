<?php
  include("conexion.php");
  $id=$_REQUEST["id"];
  $query="SELECT * FROM maquinarias WHERE idmaquinaria=".$id;
  $maquinarias = mysqli_query($link,$query); 
?>
<div class="formulario" style="width: 60%">
<?php
  if($data=mysqli_fetch_array($maquinarias)){
?>
<form method="post" id="formulario">
  <input type="hidden" name="go" value="update">
  <input type="hidden" name="id" value="<?= $data[0] ?>">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label class="mt-4" style="color: black">Modelo</label>
      <input type="text" class="form-control" name="modelo" placeholder="Ingrese Modelo" required value="<?= $data[1] ?>">
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Potencia</label>
      <input type="text" class="form-control" name="potencia" placeholder="Ingrese potencia" required value="<?= $data[2] ?>">
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Cilindros</label>
      <input type="text" class="form-control" name="cilindros" placeholder="Ingrese cilindros" required value="<?= $data[3] ?>">
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Tipo</label>
      <select name="tipo" class="form-control">
        <option value="Tractor" <?=($data[4]=="Tractor"?"selected":"") ?>>Tractor</option>
        <option value="Empacadora" <?=($data[4]=="Empacadora"?"selected":"") ?>>Empacadora</option>
        <option value="Funigadora" <?=($data[4]=="Funigadora"?"selected":"") ?>>Funigadora</option>
        <option value="Camioneta" <?=($data[4]=="Camioneta"?"selected":"") ?>>Camioneta</option>
        <option value="Otros" <?=($data[4]=="Otros"?"selected":"") ?>>Otros</option>
      </select>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Descripción</label>
      <textarea class="form-control" name="descripcion"><?= $data[5] ?></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Actualizar Maquinaria</button>
  </fieldset>
</form>

<?php } ?>
</div>

<script>
  $("#formulario").on("submit", function(event,validate) {
      event.preventDefault();
       $.ajax({
            url: "maquinaria_crud.php",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function() {
              //$('.msg').html("<img src='img/ajax-loader.gif' />");
              console.log("Enviando formulario");
            },
        })
        .done(function(res) { 
            console.log("Los datos se han llegado");
            console.log(res);
            $.fancybox.close();
            $("#crud").load("maquinaria_list.php");                                            
        })
        .fail(function (res) {                    
            console.log(res);
        });
  });
</script>