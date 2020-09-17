<?php

 
 include_once("connection.php");
 //contendra informacion que sera trasladada por medio de un array JSON
 $jsonArray = array();

//isset este comprueba si una variable esta definida

if(isset($_GET["titulo"])
&& isset($_GET["comentario"])
&& isset($_GET["hora"])
&& isset($_GET["fecha"])
&& isset($_GET["fk_empleado"])

){

    $titulo =$_GET["titulo"];
    $comentario =$_GET["comentario"];
    $hora=$_GET["hora"];
    $fk_empleado =$_GET["fk_empleado"];
    $fecha=$_GET["fecha"];
    $fechaN =strtotime($fecha);
    $fechaN = date('Y/m/d',$fechaN);

  
    mysqli_set_charset( $conexion, 'utf8');


$insertar ="INSERT INTO tbl_task (titulo, comentario, hora, fecha,fk_empleado)
VALUES ('{$titulo}','{$comentario}','{$hora}','{$fechaN}',{$fk_empleado})";



$resultado_insertar = mysqli_query($conexion,$insertar);

$jsonArray["task"]=$resultado_insertar;

mysqli_close($conexion);
//echo json_encode($jsonArray);

if( json_encode($jsonArray) == true){

    echo "Datos ingresados correctamente";

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