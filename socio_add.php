<?php
  
?>
<div class="formulario" style="width: 60%">
<form method="post" id="formulario">
  <input type="hidden" name="go" value="create">
  <fieldset>
    <legend>Legend</legend>
    <div class="form-group">
      <label class="mt-4" style="color: black">Nombres</label>
      <input type="text" class="form-control" name="nombres" placeholder="Ingrese nombres" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Apellidos</label>
      <input type="text" class="form-control" name="apellidos" placeholder="Ingrese apellidos" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">DNI</label>
      <input type="text" class="form-control" name="dni" placeholder="Ingrese DNI" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Fecha de Nacimiento</label>
      <input type="date" class="form-control" name="fnacimiento" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Correo Electrónico</label>
      <input type="email" class="form-control" name="email" placeholder="Ingrese Email">
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Dirección</label>
      <input type="text" class="form-control" name="direccion" placeholder="Ingrese dirección" required>
    </div>
    <div class="form-group">
      <label class="mt-4" style="color: black">Celular</label>
      <input type="text" class="form-control" name="celular" placeholder="Ingrese celular">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Registrar Socio</button>
  </fieldset>
</form>
</div>
<script>
  $("#formulario").on("submit", function(event,validate) {
      event.preventDefault();
       $.ajax({
            url: "crud.php",
            type: "post",
            data: $(this).serialize(),
            beforeSend: function() {
              //$('.msg').html("<img src='img/ajax-loader.gif' />");
              console.log("Enviando formulario");
            },
        })
        .done(function(res) { 
            console.log("Los datos se han llegado");
            $.fancybox.close();
            $("#crud").load("socio_list.php");                                            
        })
        .fail(function (res) {                    
            console.log(res);
        });
  });
</script>