<?php
/** @author  Jonathan Trigueros 06/05/2021
*creación:06/05/2021
* PARAMETROS -> HEADER
*/
//incluimos controller para poder crear la vista del controlador y enviar el FORMULARIO Y EL NOMBRE DEL ARRAY .
$PARAMETRO='HEADER';
try{
include_once ('../CONFIG/CONFIG_CONTROLLER.php');
include_once ('../CONFIG/CONFIG_QX.php');
//creamos la vista, validamos si se envío un Formulario y se envia el parametro de validacion
$VISTA= new create_view("VIEWS/HEADER.php",$_POST,$PARAMETRO);
//Validamos si es que se envio un formulario si no solo se retorna la vista
$PARAMS= $VISTA->VALIDATE_FORM();
if ($PARAMS){
$RESULT= EXEC_QX('QX1/HEADER/HEADER_PRINCIPAL.php',$PARAMS);
}

include ($VISTA->get_VISTA());

}catch (EXCEPTION $e){
echo "Ocurrio un error al retornar el resultado";
}
?>
