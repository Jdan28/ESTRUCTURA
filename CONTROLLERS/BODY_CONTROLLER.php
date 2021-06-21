<?php
/*
* @author  Jonathan Trigueros 06/05/2021
*fecha de creación:06/05/2021
*/
try{
include_once ('../CONFIG/CONFIG_CONTROLLER.php');
include_once ('../CONFIG/CONFIG_QX.php');
$PARAMETRO='BODY';
//creamos la vista, validamos si se envío un Formulario y se envia el parametro de validacion
$VISTA= new create_view("VIEWS/BODY.php",$_POST,$PARAMETRO);
//Validamos si es que se envio un formulario si no solo se retorna la vista
$PARAMS= $VISTA->VALIDATE_FORM();
if ($PARAMS){
//$RESULT= EXEC_QX('QX1/HEADER/HEADER_PRINCIPAL.php',$PARAMS);
}

include ($VISTA->get_VISTA());

}catch (EXCEPTION $e){
echo "Ocurrio un error al retornar el resultado";
}

?>
