
<?php

/*
*@author Jonathan Daniel Trigueros
fecha de creación: 12/06/2021
*/

//con esta función  buscamos el archivo en QX1 al cual enviaremos el arreglo
function EXEC_QX($link,$PARAMS){
$URL='../'.$link;
$QX= include_once($URL);
return $QX;
}
?>
