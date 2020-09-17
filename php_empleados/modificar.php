<?php

 /*define("HOST","127.0.0.1:3307");
 define("DB","bd_empleados");
 define("USER","root");
 define("PASS","");*/
 
/* $host = 'servidor-mysql-2021.mysql.database.azure.com';
 $username = 'user2020@servidor-mysql-2021';
 $password = 'Intecap2020.';
 $db_name = 'bd_empleados';
*/
 //contendra informacion que sera trasladada por medio de un array JSON
 $jsonArray = array();

//isset este comprueba si una variable esta definida
include_once("connection.php");

if(isset($_GET["titulo"])
&& isset($_GET["id_tbl_task"])
&& isset($_GET["comentario"])
&& isset($_GET["hora"])
&& isset($_GET["fecha"])


){
    $id_tbl_task=$_GET["id_tbl_task"];
    $titulo =$_GET["titulo"];
    $comentario =$_GET["comentario"];
    $hora=$_GET["hora"];
    $fecha=$_GET["fecha"];
    $fechaN =strtotime($fecha);
    $fechaN = date('Y/m/d',$fechaN);

   // $conexion = mysqli_connect(host,username,password,db_name);
    mysqli_set_charset( $conexion, 'utf8');
//$conexion =mysqli_connect(HOST,USER,PASS,DB);

$update ="UPDATE tbl_task SET titulo='{$titulo}', 
comentario='{$comentario}',hora='{$hora}',fecha='{$fechaN}' 
WHERE id_tbl_task={$id_tbl_task};";

//$query = mysqli_query($conexion, $insertar) or die('error' .mysqli_error($conexion));

$resultado_update = mysqli_query($conexion,$update);

$jsonArray["task"]=$resultado_update;

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