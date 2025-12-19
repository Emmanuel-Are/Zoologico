<?php 
if(isset($_POST['idCuidador'])){
require_once('Conexion.php');
$c= new Conexion();
$res = $c->eliminarCuidador($_POST['idCuidador']);
if($res){
    header('Location: consultarCuidador.php?m=2');
}else{
    header('Location: consultarCuidador.php?m=3');
}
}else{
    header('Location: consultarCuidador.php');
}
?>