<?php
/*
* @author  Jonathan Trigueros 07/05/2021
*fecha de creación:07/05/2021
*PARAMETROS ->
*/
?>


<div class="header">SOY EL ENCABEZADO</div>

<?php if (isset($RESULT)){?>
<script type="text/javascript">
alert (<?php echo ($RESULT['MENSAJE']); ?>);
</script>

<?php } ?>
