<?php
require('archivobd.php');
class Materia {
private $id;
private $nombre;
private $avater;
private $orden;
private $status;
private $maestro;
public function seleccionaMaestro(){
echo"<div class=table-responsive>";
echo"<form action=ajax2.php method='POST' name='maestro' id='maestro' target='_self'>";
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