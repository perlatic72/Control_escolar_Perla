<?php
require('archivobd.php');
require('Grupo.php');
require('header.php');
$grupo = new Grupo();
$grupo->Asignacion();
if(isset($_REQUEST['accion'])){
switch($_REQUEST['accion']){
case 2:
$grupo->borrar($_REQUEST['idalum']);
echo"<div class='alert alert-danger'><h4><center>El alumno fue desasignado de su grupo</center></h4></div>";
print"<meta http-equiv='refresh' content='0' url='proyecto/TestGrupo.php'>";
exit;
break;
}
}
if(isset($_REQUEST['accion'])){
switch($_REQUEST['accion']){
case 1:
$grupo->insertaAlumno($_REQUEST['idgrupo'],$_REQUEST['idal']);
echo"<div class='alert alert-success'><h4><center>Se ha asignado alumnos al grupo </center></h4></div>";
echo"<meta http-equiv='refresh' content='0' url='proyecto/TestGrupo.php'>";
break;
}
}
require('footer.php');
?>