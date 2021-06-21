<?php
/**
* @author  Jonathan Trigueros 06/05/2021

*en esta clase se crea una funcion para llamar a los controladores de cada vista
*/

class create_view {
public $VISTA;
public $FORM;
public $PARAMETRO;

function __construct ($VISTA,$FORM,$PARAMETRO){
$this->VISTA = '../'.$VISTA;
$this->FORM = $FORM;
$this->PARAMETRO = $PARAMETRO;
}

function get_VISTA (){
return $this->VISTA;
}


//validamos  que el formulario cuente con con el formato necesario o que no se haya enviado vacio.
function VALIDATE_FORM (){
try {
$FORM= $this->FORM;
$PARAMETRO=$this->PARAMETRO;
  if ($FORM){
  if ($FORM[$PARAMETRO])
  $RETURN=$FORM;
  }
  else{
  $RETURN='';
  }

} catch (Exception $e) {

$RETURN=$e;
}


return $RETURN;

}

//FUNCION PARA VALIDAR QUE LOS INPUTS ESTEN VALIDADOS
//PENDIENTE
function VALIDATE_INPUTS (){
$FORM=$this->$FORM;
$CAMPO_SIN_VALOR=0;
foreach ($FORM as $ind => $VALUE) {
if ($VALUE=="" || $VALUE=="null" || is_null($VALUE)){
$CAMPO_SIN_VALOR++;
}else{}

}

}

}




?>
