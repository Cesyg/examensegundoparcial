<?php
if (!empty($_POST)){
    $txt_carne = utf8_decode($_POST["txt_carne"]);
    $txt_nombres = utf8_decode($_POST["txt_nombres"]);
    $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
    $txt_direccion = utf8_decode($_POST["txt_direccion"]);
    $txt_telefono = utf8_decode($_POST["txt_telefono"]);
    $txt_email = utf8_decode($_POST["txt_email"]);
    $txt_genero = utf8_decode($_POST["txt_genero"]);
    $txt_fn = utf8_decode($_POST["txt_fn"]);

    if(isset($_POST["btn-agregar"])){
        $sql = "INSERT INTO estudiantes(carne,nombres,apellidos,direccion,telefono,email,genero,fecha_nacimiento) VALUES('". $txt_carne ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."','". $txt_email ."',". $txt_genero .",'". $txt_fn ."');";
    }
    if(isset($_POST["btn-modificar"])){
        $sql = "UPDATE estudiantes SET carne='". $txt_carne ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',email='". $txt_email ."'genero='".$txt_genero . "',fecha_nacimiento='". $txt_fn ."' WHERE id_empleado='". $txt_id ."';";
    }
    if(isset($_POST["btn-eliminar"])){
        $sql = "DELETE FROM estudiantes WHERE id_estudiantes='". $txt_id ."';";
    }

        include("conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_user,$db_pass,$db_nombre);

        
        if($db_conexion->query($sql)===true){
          $db_conexion ->close();
          header("Location: /estudiantes_exam");
        }else{
          echo"Error" . $sql . "<br>".$db_conexion ->close();
        }
}
?>