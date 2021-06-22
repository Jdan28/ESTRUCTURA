<?php
/** @author  Jonathan Trigueros 06/05/2021
*fecha de creación:06/05/2021
*/
try{
  //incluimos el controller_config.php
$PARAMETRO='LOGIN';
include('../../controllers_config.php');
//creamos la vista, validamos si se envío un Formulario y se envia el parametro de validacion
$VISTA= new create_component("USUARIO/LOGIN.php",$_POST,$PARAMETRO);
//Validamos si es que se envio un formulario si no solo se retorna la vista
$PARAMS= $VISTA->VALIDATE_FORM();
if ($PARAMS){
$RESULT= EXEC_QX('QX1/USUARIO/LOGIN.php',$PARAMS);
}

include ($VISTA->get_VISTA());

}catch (EXCEPTION $e){
echo "Ocurrio un error al retornar el resultado";
}

?>
