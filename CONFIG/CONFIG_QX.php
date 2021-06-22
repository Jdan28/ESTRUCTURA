
<?php
/*
*@author Jonathan Daniel Trigueros
fecha de creación: 12/06/2021
*/

//con esta función  buscamos el archivo en QX al cual enviaremos el arreglo
function EXEC_QX($link,$PARAMS){
$URL=CALL_QX.$link;
$QX= include($URL);
return $QX;
}
?>
