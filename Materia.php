<?php
require('archivobd.php');
class Materia {
private $id;
private $nombre;
private $avater;
private $orden;
private $status;
private $maestro;
public function asignarMateriaMaestro($id_maestro){
echo"<div class=table-responsive>";
echo"<table class=\"table table-bordered\">";
echo"<form action='TestMateria.php' method='POST' id='materias' name='materias' class='form-control'>";
echo"<tr><td colspan=2>
<h4><font color='#186A87'>
<strong>ASIGNAR NUEVA MATERIA</strong></font></h4></td></tr>";
echo"<tr><td><b>Materias: </td>
<td> <select name='mat' id='materia' class='form-control'>";
$SQL4="SELECT * FROM materia ORDER BY (nombre_materia)ASC";
$resultado01=mysql_query($SQL4)or die("Error al consultar materias".mysql_error());
while($field=mysql_fetch_array($resultado01))
{
$id_materia=$field['idmateria'];
$nombre_materia=utf8_decode($field['nombre_materia']);
$sqql3="SELECT * FROM maestro_materia WHERE Id=$id_maestro AND idmateria=$id_materia";
$Query3=mysql_query($sqql3) or die ("Error la consulta existe materia".mysql_error());
$existe=mysql_num_rows($Query3);
if($existe>0){
echo"<option value=0>Materia no disponible</option>";
}
else{
echo"<option value=$id_materia>$id_materia $nombre_materia</option>";
}
}
echo"<input type='hidden' name='accion' id=accion value=1>";
echo"<input type=hidden id='maestro' name='maestro' value=$id_maestro>";
echo"<tr><td colspan=2 align='right'><input type='submit' value=Agregar class='btn btn-success'></td></tr>";
echo"</select>";
echo"<td></tr>";
echo"</form>";
echo"</table>";
echo"</div>";
}
public function insertMateriaMaestro($id,$idmateria){
if ($idmateria >0){
$insert="INSERT INTO maestro_materia (Id,idmateria)VALUES ($id,$idmateria)";
$Query2=mysql_query($insert) or die("Error al insetar".mysql_error());
// echo $insert;
}
}
public function deleteMaestroMateria($idmaes,$idmat){
if ($idmat >0){
$SQL00="DELETE FROM maestro_materia WHERE idmateria=$idmat AND Id=$idmaes";
$result02=mysql_query($SQL00) or die ("Error al desagsignar".mysql_error());
}
}
public function seleccionaMaestro(){
echo"<div class=table-responsive>";
echo"<form action=ajax.php method='POST' name='maestro' id='maestro' target='_self'>";
echo"<div class=\"table table-striped\">";
echo"<center><table border=0>
<tr><td>Maestro: </td>";
echo" <td><select name='idm' class='form-control'>";
echo"<option><font color='blue'>--Seleccione un maestro--</font></option>";
$sqll="SELECT * FROM usuario WHERE Nivel=2 AND Estatus=1";
$result=mysql_query($sqll) or die ("Error en la consulta de maestro".mysql_error());
while($field=mysql_fetch_array($result)){
$id_maestro=$field['Id'];
$id=$field['Id'];
$apa=utf8_decode($field['ApellidoPaterno']);
$ama=utf8_decode($field['ApellidoMaterno']);
$nom=utf8_decode($field['Nombre']);
echo"<option value='$id_maestro'>$id_maestro $apa $ama $nom</option>";
}
echo"</select></td></tr>";
echo"<tr><td colspan=2 align=right>
<br><input type='submit' name='submit' value='Seleccionar' class='btn btn-default'>
</td></tr>";
echo"</table></div></form>";
}
}
?>