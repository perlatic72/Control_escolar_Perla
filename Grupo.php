<?php
require('archivobd.php');
class Grupo{
public function Asignacion(){
echo"<form action='TestGrupo.php' method='POST' name='alum'>";
$sql="SELECT * FROM usuario WHERE Nivel=3 AND Estatus=1";
$query=mysql_query($sql) or die ("Error en consulta de alumno".mysql_error);
echo "<div class=table-bordered>";
echo"<table border='0' class=\"table table-bordered\">";
echo"<tr><td colspan=7 align=center><h4><font color='#086A87'>LISTA DE ALUMNOS ASIGNAR GRUPOS</font></h4></td></tr>";
echo"<tr>
<td><b><center>Seleccionar</td>
<td><b><center>Clave</center></td>
<td><b>Nombre</td>
<td><b>Apellido Paterno</td>
<td><b>Apellido Materno</td>
<td><b>Estado</td>
<td><b></b></td></tr>" ;
while($field=mysql_fetch_array($query)){
$idalumno=$field['Id'];
$nom=utf8_decode($field['Nombre']);
$apa=utf8_decode($field['ApellidoPaterno']);
$ama=utf8_decode($field['ApellidoMaterno']);
$sqql2="SELECT u.Id,u.nombre,u.ApellidoPaterno,u.ApellidoMaterno,u.Nivel,g.idgrupo,g.grupo
FROM usuario AS u,grupo AS g,grupo_alumno AS ga
WHERE u.Id=ga.Id
AND g.idgrupo=ga.idgrupo
and ga.Id=$idalumno";
$resultado=mysql_query($sqql2) or die("Error en consulta2".mysql_error());
$existe=mysql_num_rows($resultado);
// echo"$existe";
while($field=mysql_fetch_array($resultado)){
$idgrupo=$field['idgrupo'];
$nombre_grupo=utf8_decode($field['grupo']);
}
echo"<tr>";
if($existe==0){
echo"<td><center><input type=checkbox name=idal value=$idalumno></center></td>";
}
else{
echo"<td></td>";
}
echo"<td>$idalumno</td>
<td>$nom</td>
<td>$apa</td>
<td>$ama</td>";
if($existe==0){
echo"<td>Sin asignar</td>";
}
else{
echo"<td>Asignado al un grupo $nombre_grupo</td>";
echo"<td><a href=TestGrupo.php?accion=2&idalum=$idalumno&idgrup=$idgrupo>
<center><img src='images/mal.png' width='20px' height='20px'>
</center></a></td></tr>";
}
}
echo"<tr><td><b>Asignar grupo";
$SQL="SELECT * FROM grupo";
$QUERY=mysql_query($SQL) or die("Error en consulta".mysql_error);
echo"<td colspan=4><select name=idgrupo class='form-control'>";
while($field=mysql_fetch_array($QUERY)){
$idgroup=$field['idgrupo'];
$nom_grupo=$field['grupo'];
echo"<option value=$idgroup>$nom_grupo</option>";
}
echo"</td align='right'>
<td><input type=submit value='Agregar' class='btn btn-success'><input type=hidden name=accion value=1></td></tr>
</table><form>";
}
public function borrar($idalumno){
$query="DELETE FROM grupo_alumno WHERE Id=$idalumno";
$result=mysql_query($query)or die ("Error al eliminar el alumno de la base".mysql_error());
}
public function insertaAlumno($idgrupo,$idal){
$sqql2="INSERT INTO grupo_alumno(idgrupo,Id) VALUES($idgrupo,$idal)";
$result=mysql_query($sqql2) or die("Error al insertar".mysql_error());
}
}
?>