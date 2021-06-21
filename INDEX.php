<!DOCTYPE html>
<html>
<head>
<title>Página Principal test</title>
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="assents/css/calendario.css" media="all" />
<!--  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
--><script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="JS/FUNCIONES.JS"></script>

</head>
<?php
//rutas de los controladores de cada componente
$e_HEADER='CONTROLLERS/HEADER_CONTROLLER.php';
$e_BODY= 'CONTROLLERS/BODY_CONTROLLER.php';
$e_FOOTER= 'CONTROLLERS/FOOTER_CONTROLLER.php';
?>
<header id='header'>

</header>
<div id='body'>
</div>
<footer id='footer'></footer>
</html>

<script>
//Aqui cargammos los 3 componentes principales que componen el cuerpo de del index (header,body y footer).
load_component('<?php echo $e_HEADER;?>','header','','');
load_component('<?php echo $e_BODY;?>','body','','');
load_component('<?php echo $e_FOOTER;?>','footer','','');
</script>
