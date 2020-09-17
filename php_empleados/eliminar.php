<?php



 //contendra informacion que sera trasladada por medio de un array JSON
 $jsonArray = array();

//isset este comprueba si una variable esta definida
include_once("connection.php");
mysqli_set_charset( $conexion, 'utf8');

if(
 isset($_GET["id_tbl_task"])

){
    $id_tbl_task=$_GET["id_tbl_task"];
  

$delete ="DELETE FROM tbl_task WHERE id_tbl_task={$id_tbl_task};";

//$query = mysqli_query($conexion, $insertar) or die('error' .mysqli_error($conexion));

$resultado_delete = mysqli_query($conexion,$delete);

$jsonArray["task"]=$resultado_delete;

mysqli_close($conexion);
//echo json_encode($jsonArray);

if( json_encode($jsonArray) == true){

    echo "Datos actualizados correctamente";

}else{

    echo "Ha ocurrido un error en la insercion";

}



}else{

$resultante["titulo"]="ERROR";
$resultante["comentario"]="ERROR";
$resultante["hora"]="ERROR";
$resultante["fecha"]="ERROR";
$resultante["fk_empleado"]="ERROR";
$jsonArray["task"]=$resultante;

 echo json_encode($jsonArray);

}



?>