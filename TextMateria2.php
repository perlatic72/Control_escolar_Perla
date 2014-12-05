<?php
require('header3.php');
require('Materia2.php');
require('archivobd.php');
$materia= new Materia();
if(isset($_REQUEST['acccion'])){
$accion=$_REQUEST['accion'];
}
else{
$accion=0;
}
if(isset($_REQUEST['maestro'])){
$id= $_REQUEST['maestro'];
echo"$id";
}
else{
$id=0;
}
if(isset($_REQUEST['materia'])){
$id_materia = $_REQUEST['materia'];
echo"$id_materia";
}else{
$id_materia = 0;
}
switch($accion){
case 0:
$materia->seleccionaMaestro($id);
break;
case 1:
$materia->insertMateriaMaestro($id,$id_materia);
$materia->seleccionaMaestro($id);
break;
case 2:
$materia->deleteMaestroMateria($id,$id_materia);
$materia->seleccionaMaestro($id);
break;
}
//$materia->seleccionaMaestro();
require('footer.php')
?>