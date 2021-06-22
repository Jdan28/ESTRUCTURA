<?php
/** @author  Jonathan Trigueros 21/06/2021
*Creamos un archivo llamado controllers_config, este archivo establece las configuraciones necesarias para buscar las
*rutas de config y establecer conexiones entre archivos desde la ruta  padre
*/
$PROJECT='ESTRUCTURA';
$RESULT ='';
include ($_SERVER['DOCUMENT_ROOT'].'/'.$PROJECT.'/CONFIG/ROUTE_CONFIG.php');

include_once (CONFIG_CONTROLLER);
include_once (CONFIG_QX);




 ?>
