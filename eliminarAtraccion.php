<?php 
if(isset($_POST['idAtraccion'])){
require_once('Conexion.php');
$c= new Conexion();
$res = $c->eliminarAtraccion($_POST['idAtraccion']);
if($res){
    header('Location: consultarAtraccion.php?m=2');
}else{
    header('Location: consultarAtraccion.php?m=3');
}
}else{
    header('Location: consultarAtraccion.php');
}
?>