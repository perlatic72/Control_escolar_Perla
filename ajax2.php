<?php
require('archivobd.php');
require('Materia2.php');
require('header3.php');
$materia = new Materia();
$id_maestro=$_POST['idm'];
$sQl="SELECT * FROM usuario WHERE Id=$id_maestro";
$query=mysql_query($sQl) or die("Error en la consulta de maestro por id".mysql_error());
$cuantos=mysql_num_rows($query);
if($cuantos>0){
$nombre=$id_maestro ." )";
$nombre .=mysql_result($query,0,'ApellidoPaterno');
$nombre .=" ". mysql_result($query,0,'ApellidoMaterno');
$nombre .=" ". mysql_result($query,0,'Nombre');
$nombre=utf8_decode($nombre);
echo"<br><h4>El maestro seleccionado es: <font color='red'>". $nombre. "</font></h4>";
}
$SQQl="SELECT m.idmateria,m.nombre_materia
FROM materia AS m,maestro_materia AS mm,usuario AS u
WHERE m.idmateria=mm.idmateria
AND u.Id=mm.id
AND u.Id=$id_maestro";
$Query=mysql_query($SQQl) or die ("Error en consulta materias".mysql_error());
$cuantos=mysql_num_rows($Query);
if($cuantos==0){
echo"<h4><font color='#778899'>EL PROFESOR NO TIENE MATERIAS ASIGNADAS </font></h4>";
}
else{
echo"<div class=\'table table-striper\'>";
echo"<br><table border=0 align=center class='table table-bordered'><tr>
<tr><td colspan=2><h4><font color='#186A87'><strong>LISTA DE MATERIAS ASIGNADAS</strong></font></h4></td></tr>
<tr>
<td><b>Clave</td>
<td><b>Nombre de la materia</td></tr>";
while($field=mysql_fetch_array($Query)){
$idmateria=$field['idmateria'];
$nom_materia=utf8_decode($field['nombre_materia']);
echo"<tr><td>$idmateria</td>
<td>$nom_materia</td></tr>";
}
}
echo"</table></form></div>";
?>