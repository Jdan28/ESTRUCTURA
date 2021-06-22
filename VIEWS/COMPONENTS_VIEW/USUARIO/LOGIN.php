<?php

print_r ($RESULT);

 ?>
<script src=""></script>



<div class="login" >

  <form class="header" name="login" id="header_login" action="javascript: load_component('CONTROLLERS/COMPONENTS/USUARIO/LOGIN.php','login','',js_form_to_post(document.getElementById('header_login'),''));">
  <input placeholder="NOMBRE"  type="text" name="LOGIN[NOMBRE]" value=""><br>
  <input placeholder="CORREO ELECTRÓNICO"  type="text" name="LOGIN[CORREO]" value=""><br>
  <input placeholder="TELEFONO"  type="text" name="LOGIN[TELEFONO]" value="">
  <button type="submit">ENVIAR</button>

  </form>


</div>
