<?php
/** @author  Jonathan Trigueros
*creación:12/06/2021
* PARAMETROS -> LOGIN
*/

//incluimos la conexión con la BD
include_once(DB_ROUTE);

try {

  if ($PARAMS['LOGIN']){
//$PARAMS['HEADER']['USU_ID']=1;
$DATA_INSERT['USUARIOS']= array(
'USU_NOMBRE' =>$PARAMS['LOGIN']['NOMBRE'],
'USU_TELEFONO' =>$PARAMS['LOGIN']['TELEFONO'],
'USU_EMAIL' => $PARAMS['LOGIN']['CORREO']
);

if ($DATA_INSERT!="" || $DATA_INSERT!=null){
//DB QUERY
$RESULT=DB_QUERY_RESULTS("select * from  test_usuarios");

//DB INSERT
//$RESULT=DB_INSERT($DATA_INSERT['USUARIOS'],'test_usuarios','USU');

//$PARAMS['HEADER']['USU_ID']=1;
//DB UPDATE
//$RESULT=DB_UPDATE($DATA_INSERT['USUARIOS'],'test_usuarios','USU','USU_ID',$PARAMS['HEADER']['USU_ID']);

}else{



}






  }

} catch (Exception $e) {
  return $e;
}


return $RESULT;



?>
