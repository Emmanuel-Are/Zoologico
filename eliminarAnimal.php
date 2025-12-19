<?php 
if(isset($_POST['idAnimal'])){
require_once('Conexion.php');
$c= new Conexion();
$res = $c->eliminarAnimal($_POST['idAnimal']);
if($res){
    header('Location: consultarAnimal.php?m=2');
}else{
    header('Location: consultarAnimal.php?m=3');
}
}else{
    header('Location: consultarAnimal.php');
}
?>