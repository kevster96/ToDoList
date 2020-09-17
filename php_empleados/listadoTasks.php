<?php


 $json = array();
 include_once("connection.php");


 $fk_usuario =$_GET["fk_usuario"];
 



 $consulta_mostrar ="SELECT * FROM tbl_task WHERE fk_empleado={$fk_usuario};";

$resultado_consulta = mysqli_query($conexion, $consulta_mostrar);

if(mysqli_num_rows($resultado_consulta)>0){

    while($registro = mysqli_fetch_array($resultado_consulta)){

        $json["tbl_task"][]= $registro;
     //   $json["medicamentos"]= $registro;

    }
    echo json_encode($json);
    mysqli_close($conexion);

}

else{

    $resultante["id_tbl_task"]="ERROR";
    $resultante["titulo"]="ERROR";
    $resultante["comentario"]="ERROR";
    $resultante["hora"]="ERROR";
    $resultante["fecha"]="ERROR";
    $resultante["fk_empleado"]="ERROR";
   
       
    $jsonArray["tbl_task"][]=$resultante;
    
     echo json_encode($jsonArray);
    
    }

?>