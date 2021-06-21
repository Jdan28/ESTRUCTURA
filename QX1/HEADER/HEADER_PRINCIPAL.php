<?php
/** @author  Jonathan Trigueros
*creación:12/06/2021
* PARAMETROS -> HEADER
*USO DEL QX1 -> La utilización del QX1 es preferentemente para realizar consultas a la BD y también para hacer la conexión con QX2
* si es que se requiere hacer alguna inserción en la BD
*/

//incluimos la conexión con la BD
//include_once('../CONFIG/CONFIG_BD.php');

if ($PARAMS){
$RESULT= EXEC_QX('QX2/HEADER/HEADER_PRINCIPAL.php',$PARAMS);
}

//$QX1_QUERY='select * from test_usuarios';

//$DATA_RESULT=DB_QUERY_RESULTS($QX1_QUERY);



//$RESULT['DATA']=$DATA_RESULT;
//$RESULT['RESULT']="SUCCESS";

return $RESULT;



?>
