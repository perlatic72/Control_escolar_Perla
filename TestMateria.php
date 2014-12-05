<?php
require('header.php');
require('Materia.php');
require('archivobd.php');
$materia= new Materia();
if(isset($_REQUEST['accion'])){
$accion=$_REQUEST['accion'];
}
else{
$accion=0;
}
if(isset($_REQUEST['maestro'])){
$id= $_REQUEST['maestro'];
//echo"$id";
}
else{
$id=0;
}
if(isset($_REQUEST['materia'])){
$id_materia = $_REQUEST['materia'];
// echo"$id_materia";
}else{
$id_materia = 0;
}
$materia->seleccionaMaestro($id);
if(isset($_REQUEST['accion'])){
switch($_REQUEST['accion']){
case 1:
$materia->insertMateriaMaestro($_REQUEST['maestro'],$_REQUEST['mat']);
// $materia->seleccionaMaestro($id);
break;
}
}
if(isset($_REQUEST['accion'])){
switch($_REQUEST['accion']){
case 2:
$materia->deleteMaestroMateria($_REQUEST['maestro'],$_REQUEST['materia']);
// $materia->seleccionaMaestro($id);
break;
}
}
//$materia->seleccionaMaestro();
require('footer.php')
?>