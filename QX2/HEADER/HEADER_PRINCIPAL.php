<?php
/** @author  Jonathan Trigueros
*creación:12/06/2021
* PARAMETROS -> HEADER
*/

//incluimos la conexión con la BD
include_once('../CONFIG/CONFIG_BD.php');
try {

  if ($PARAMS['HEADER']){
//$PARAMS['HEADER']['USU_ID']=1;
$DATA_INSERT['USUARIOS']= array(
'USU_NOMBRE' =>$PARAMS['HEADER']['NOMBRE'],
'USU_TELEFONO' =>$PARAMS['HEADER']['TELEFONO'],
'USU_EMAIL' => $PARAMS['HEADER']['CORREO']
);

if ($DATA_INSERT!="" || $DATA_INSERT!=null){

//$RESULT=DB_INSERT($DATA_INSERT['USUARIOS'],'test_usuarios','USU');

}else{



}






  }

} catch (Exception $e) {
  return $e;
}


return $RESULT;



?>
