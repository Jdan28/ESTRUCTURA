
<?php
/** @author  Jonathan Trigueros
*creación:12/06/2021
*/

$GLOBALS['HOST']='localhost';
$GLOBALS['BD']='test';
$GLOBALS['USER']='root';
$GLOBALS['PASS']='';

function CHECK_PREFIJO ($PREFIJO,$PARAMETROS){
      $VALIDATOR=0;
      $CARACTERES_PREFIJO_ARRAY=str_split($PREFIJO);

      $NUM_CARACTERES_PREFIJO=count($CARACTERES_PREFIJO_ARRAY);

          foreach ($PARAMETROS as $KEY => $VALOR_CAMPO) {

      $CAMPO_BD_CARACTERES=explode('_', $KEY);

                  if($CAMPO_BD_CARACTERES[0]!=$PREFIJO){
                      $VALIDATOR=1;
                    }
          }

                    if ($VALIDATOR==1){

                      $RESULTADO='ERROR';

                      }else{

                        $RESULTADO='SUCCESS';

                      }

    return $RESULTADO;

}

//con esta funcion checamos los parametros que se le pasan a la funcion de DB_INSERT
function CHECK_DB_TABLE_PARAMS ($PARAMETROS,$TABLE,$PREFIJO){

$VALIDATOR=0;
    try {


  // Conectarse a MySQL
  $Conection=new mysqli($GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['PASS'],$GLOBALS['BD']);

      //verificamos si la tabla existe en la BD
      if ($Conection){

              //consultamos el nombre de la tabla para saber si existen en la BD
              $Query_table="select Table_Name from information_schema.TABLES where Table_Name='{$TABLE}'";

              $result_table=mysqli_query($Conection,$Query_table);

        if ($result_table){


            while($C_table = mysqli_fetch_array($result_table))
            {
              $DATA_TABLE=$C_table['Table_Name'];
            }

            //Consultamos las columnas de la tabla
          foreach ($PARAMETROS as $FIELD_NAME => $valor_field) {
            $Query_FIELDS="SHOW COLUMNS FROM {$TABLE} where FIELD='{$FIELD_NAME}'";



            $result_fields=mysqli_query($Conection,$Query_FIELDS);

            $result_query_field=mysqli_fetch_array($result_fields);


                if ($result_query_field<=0){

                  $VALIDATOR=$FIELD_NAME;
                  }
            }

                if ($VALIDATOR!=0){

                  return "Error FIELD ('{$VALIDATOR}') no encontrado.";

                  }



      }else{

      return 'La tabla no existe';

      }


//Verificamos que los campos de la BD y los enviados desde QX2 sean los mismos para poder insertar la información en la BD

      //cerramos la conexión
      mysqli_close($Conection);

    }else{

        return 'Error al conectarse con la BD en CHECK_INSERT';

      }

      } catch (Exception $e) {

        return $e;


      }

}


//recibe como parametros el query, se ejecuta y retorna los resultados de la BD
function DB_QUERY_RESULTS($Query){

      try {

        $INDICE=0;

          // Conectarse a MySQL
          $Conection=new mysqli($GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['PASS'],$GLOBALS['BD']);

          if ($Conection){
              if ($Query!="" || $Query !=null){

                $result=mysqli_query($Conection,$Query);

                if ($result>0){
                    while($CONSULTA = mysqli_fetch_array($result))
                    {

                      $DATA[$INDICE]=$CONSULTA;
                      $INDICE++;
                    }

                  }else{
                    $DATA="No hay datos disponibles.";
                  }
              }
        }else{

           return "No hay conexión con el servidor.";

         }

       } catch (Exception $e) {

        return $e;
        }

      mysqli_close($Conection);

  return $DATA;

}

//A LA FUNCION DE INSERCION DE DATOS LE PASAMOS 3 PARAMETROS QUE SON EL ARRAY CON TODA LA INFORMACIÓN, LA TABLA QUE SE VERÁ AFECTADA Y EL PREFIJO QUE SE UTULIZA
//EN LA BD PARA IDENTIFICAR LOS CAMPOS DE ESA TABLA
function DB_INSERT($PARAMETROS,$TABLE,$PREFIJO){
  try {
          $TOTAL_VARIABLES =count($PARAMETROS);

          $CAMPOS_BD="";
          $CAMPOS_DATA="";
          $SEPARADOR=',';
          $COMILLA="'";

          $VAIDADOR_PREFIJO=CHECK_PREFIJO($PREFIJO,$PARAMETROS);

          if ($VAIDADOR_PREFIJO!='SUCCESS'){

        return $VAIDADOR_PREFIJO;
        }

          $VALIDADOR_TABLE_PARAMS=CHECK_DB_TABLE_PARAMS($PARAMETROS,$TABLE,$PREFIJO);

          if ($VALIDADOR_TABLE_PARAMS!='SUCCESS'){

              return $VALIDADOR_TABLE_PARAMS;
            }

            foreach ($PARAMETROS as $KEY => $VALOR_CAMPO) {

                  if ($TOTAL_VARIABLES==1){
                      $CAMPOS_BD=$CAMPOS_BD.$KEY;
                      $CAMPOS_DATA=$CAMPOS_DATA.$COMILLA.$VALOR_CAMPO.$COMILLA;
                      }else{
                      $CAMPOS_BD=$CAMPOS_BD.$KEY.$SEPARADOR;
                      $CAMPOS_DATA=$CAMPOS_DATA.$COMILLA.$VALOR_CAMPO.$COMILLA.$SEPARADOR;
                      }

                      $TOTAL_VARIABLES--;
            }


          if (is_array($PARAMETROS)) {

                $QUERY_INSERT= "insert into {$TABLE} ({$CAMPOS_BD}) VALUES ({$CAMPOS_DATA}) ";

                $Conection=new mysqli($GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['PASS'],$GLOBALS['BD']);

              try {

              if ($Conection){

                if ($QUERY_INSERT!="" || $QUERY_INSERT !=null){

                  if (mysqli_query($Conection,$QUERY_INSERT)===TRUE) {

                    mysqli_close($Conection);

                    return 'SUCCESS';


                  }else{

                    mysqli_close($Conection);

                    return 'Error al guardar los datos.';

                  }

                }else{

                  return 'Query Error.';

                }

              }else{

               return "No hay conexión con el servidor.";

              }

              }catch(Exception $e){

            return $e;

              }



        }else{
          return 'Verifica que los datos esten formados correctamente BD.';

        }


      } catch (Exception $e) {

return 'Verifica que los datos esten correctos BD.';

    }





}

/*A LA FUNCION DE UPDATE DE DATOS LE PASAMOS 4 PARAMETROS QUE SON EL ARRAY CON TODA LA INFORMACIÓN,
LA TABLA QUE SE VERÁ AFECTADA, EL PREFIJO QUE SE UTULIZA,
EL CAMPO AL QUE SE VA A REFERIR EL ID O DATO A BUSCAR EN LA BD Y  EL ID DEL CAMPO DE LA BD*/
//EN LA BD PARA IDENTIFICAR LOS CAMPOS DE ESA TABLA
function DB_UPDATE($PARAMETROS,$TABLE,$PREFIJO,$CAMPO_REFERENCIA,$ID_BD){
          try {


          $TOTAL_VARIABLES =count($PARAMETROS);
          $CONSTRUCTOR_SET="";
          $SEPARADOR=',';
          $COMILLA="'";
          $EQUAL = "=";

          if (CHECK_PREFIJO($PREFIJO,$PARAMETROS)!='SUCCESS'){
            return 'Error en los campos.';
          }

          foreach ($PARAMETROS as $KEY => $VALOR_CAMPO) {

                    if ($TOTAL_VARIABLES==1){
                        $CONSTRUCTOR_SET=$CONSTRUCTOR_SET.$KEY.$EQUAL.$COMILLA.$VALOR_CAMPO.$COMILLA;
                        }else{
                        $CONSTRUCTOR_SET=$CONSTRUCTOR_SET.$KEY.$EQUAL.$COMILLA.$VALOR_CAMPO.$COMILLA.$SEPARADOR;
                        }

                        $TOTAL_VARIABLES--;

            }


              if (is_array($PARAMETROS)) {

              $QUERY_UPDATE= "update {$TABLE}  set {$CONSTRUCTOR_SET}    where {$CAMPO_REFERENCIA} = '{$ID_BD}'  ";

              $Conection=new mysqli($GLOBALS['HOST'], $GLOBALS['USER'], $GLOBALS['PASS'],$GLOBALS['BD']);

                  try {

                  if ($Conection){

                    if ($QUERY_UPDATE!="" || $QUERY_UPDATE !=null){

                      if (mysqli_query($Conection,$QUERY_UPDATE)===TRUE) {


                        return 'SUCCESS';


                      }else{

                        return 'Error al actualizar los datos.';

                      }

                    }else{

                      return 'Query Error.';

                    }

                  }else{

                   return "No hay conexión con el servidor.";

                  }

                  }catch(Exception $e){

                return $e;

                  }



              }else{
                return 'Verifica que los datos esten formados correctamente BD.';

              }


          } catch (Exception $e) {

              return 'Verifica que los datos esten correctos BD.';

          }





}


?>
