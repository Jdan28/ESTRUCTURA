<?php
/*
* @author  Jonathan Trigueros 07/05/2021
*fecha de creación:07/05/2021
*PARAMETROS ->
*/
//rutas de los controladores de cada componente
$e_LOGIN='CONTROLLERS/COMPONENTS/USUARIO/LOGIN.php';

?>
SOY EL BODY

<div id="login" class="body">

</div>



<script>
//Aqui cargammos los 3 componentes principales que componen el cuerpo de del index (header,body y footer).
load_component('<?php echo $e_LOGIN;?>','login','','');
</script>
