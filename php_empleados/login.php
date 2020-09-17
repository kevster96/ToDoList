<?php


include_once("connection.php");

 $json = array();
 $usuario =$_GET["usuario"];
 $contrasena=$_GET["contrasena"];


 $consulta_mostrar ="SELECT * FROM tbl_empleado WHERE usuario='{$usuario}' AND contrasena='{$contrasena}';";

$resultado_consulta = mysqli_query($conexion, $consulta_mostrar);

if(mysqli_num_rows($resultado_consulta)>0){

    while($registro = mysqli_fetch_array($resultado_consulta)){

        $json["tbl_empleado"][]= $registro;
     

    }
    echo json_encode($json);
    mysqli_close($conexion);

}

else{

    $resultante["id_tblempleado"]="ERROR";
    $resultante["nombrecompleto"]="ERROR";
    $resultante["usuario"]="ERROR";
    $resultante["contrasena"]="ERROR";
    $resultante["fk_estado"]="ERROR";
   
       
    $jsonArray["tbl_empleado"][]=$resultante;
    
     echo json_encode($jsonArray);
    
    }




?>