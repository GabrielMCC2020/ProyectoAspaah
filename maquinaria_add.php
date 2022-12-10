<?php
  
?>
<div class="formulario" style="width: 60%">
<form method="post" id="formulario">
  <input type="hidden" name="go" value="create">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label class="mt-4" style="color: black">Modelo</label>
      <input type="text" class="form-control" name="modelo" placeholder="Ingrese Modelo" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Potencia</label>
      <input type="text" class="form-control" name="potencia" placeholder="Ingrese potencia" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Cilindros</label>
      <input type="text" class="form-control" name="cilindros" placeholder="Ingrese cilindros" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Tipo</label>
      <select name="tipo" class="form-control">
        <option value="Tractor">Tractor</option>
        <option value="Empacadora">Empacadora</option>
        <option value="Funigadora">Funigadora</option>
        <option value="Camioneta">Camioneta</option>
        <option value="Otros">Otros</option>
      </select>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Descripción</label>
      <textarea class="form-control" name="descripcion"></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Registrar Maquinaria</button>
  </fieldset>
</form>
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