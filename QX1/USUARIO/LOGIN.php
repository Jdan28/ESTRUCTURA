<?php
/** @author  Jonathan Trigueros
*creación:12/06/2021
* PARAMETROS -> LOGIN
*USO DEL QX1 -> La utilización del QX1 es preferentemente para realizar consultas a la BD y también para hacer la conexión con QX2
* si es que se requiere hacer alguna inserción en la BD
*/
if ($PARAMS){
$RESULT= EXEC_QX('QX2/LOGIN/LOGIN.php',$PARAMS);
}

return $RESULT;



?>
