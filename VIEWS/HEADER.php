<?php
/*
* @author  Jonathan Trigueros 07/05/2021
*fecha de creación:07/05/2021
*PARAMETROS ->
*/
?>


<form name="login" id="login" action="javascript: load_component('CONTROLLERS/HEADER_CONTROLLER.php','header','',js_form_to_post(document.getElementById('login'),''));">
<input placeholder="NOMBRE"  type="text" name="HEADER[NOMBRE]" value=""><br>
<input placeholder="CORREO ELECTRÓNICO"  type="text" name="HEADER[CORREO]" value=""><br>
<input placeholder="TELEFONO"  type="text" name="HEADER[TELEFONO]" value="">
<button type="submit">ENVIAR</button>

</form>


<?php if (isset($RESULT)){?>
<script type="text/javascript">
alert (<?php echo ($RESULT['MENSAJE']); ?>);
</script>

<?php } ?>
