<?php
require('archivobd.php');
class Usuario{
private $Id;
private $Nombre;
private $ApellidoPaterno;
private $ApellidoMaterno;
private $Telefono;
private $Calle;
private $NumeroExterior;
private $NumeroInterior;
private $Colonia;
private $Municipio;
private $Estado;
private $CP;
private $Correo;
private $Usuario;
private $Contasena;
private $Nivel;
private $Estatus;
public function createUsuario($nombre,$apellidop,$apellidom,$nivel){
//echo"<br>createUsuario";
$insert="INSERT INTO usuario(Nombre,ApellidoPaterno,ApellidoMaterno,Nivel,Estatus)VALUES('$nombre','$apellidop','$apellidom','$nivel','1')";
$exec=mysql_query($insert) or die ('Error al insertar usuario en la base de datos'.mysql_error());
}
public function readUsuarioG(){
// echo"<br>readUsuarioG";
$sql1="SELECT * FROM usuario WHERE Estatus=1 ORDER BY ApellidoPaterno ASC";
$result=mysql_query($sql1) or die ("Error en consulta".mysql_error());
echo "<div class=table-bordered>";
echo"<table border='0' class=\"table table-bordered\">";
echo"<tr><td colspan=5 align=center><h4><font color='#086A87'>LISTA DE USUARIOS GENERAL</font></h4></td></tr>";
echo"<tr>
<td><b><center>Clave</center></td>
<td><b>Nombre</td>
<td><b>Apellido Paterno</td>
<td><b>Apellido Materno</td>
<td><b>Nivel</td></tr>";
while($field=mysql_fetch_array($result)){
$this->Id =$field['Id'];
$this->Nombre=utf8_decode($field['Nombre']);
$this->ApellidoPaterno=utf8_decode($field['ApellidoPaterno']);
$this->ApellidoMaterno=utf8_decode($field['ApellidoMaterno']);
$this->Nivel=$field['Nivel'];
switch($this->Nivel){
case 1:
$type = "Administrador";
break;
case 2:
$type = "Maestro";
break;
case 3:
$type= "Alumno";
break;
}
echo"<tr><td><center>$this->Id</center></td>
<td>$this->Nombre</td>
<td> $this->ApellidoPaterno</td>
<td>$this->ApellidoMaterno</td>
<td>$type</td></tr>";
}
echo"</table></div>";
}
public function readUsuarioS($id){
// echo"<br>readUsuarioS";
$sql2="SELECT * FROM usuario WHERE Estatus=1 and id=$id ORDER BY ApellidoPaterno ASC";
$result2=mysql_query($sql2) or die ("Error en consulta".mysql_error());
echo "<div class=table-responsive>";
echo"<table border='0'class=\"table table-striped\">";
echo"<tr><td colspan=5 align=center><h4><font color='#086A87'>LISTA ESPECIFICA</font></h4></td></tr>";
echo"<tr>
<td><b>Clave</td>
<td><b>Nombre</td>
<td><b>Apellido Paterno</td>
<td><b>Apellido Materno</td>
<td><b>Nivel</td></tr>";
while($field=mysql_fetch_array($result2)){
$this->Id =$field['Id'];
$this->Nombre=utf8_decode($field['Nombre']);
$this->ApellidoPaterno=utf8_decode($field['ApellidoPaterno']);
$this->ApellidoMaterno=utf8_decode($field['ApellidoMaterno']);
$this->Nivel=$field['Nivel'];
switch($this->Nivel){
case 1:
$type = "Administrador";
break;
case 2:
$type = "Maestro";
break;
case 3:
$type= "Alumno";
break;
}
echo"<tr><td><center>$this->Id</td>
<td>$this->Nombre</td>
<td> $this->ApellidoPaterno</td>
<td>$this->ApellidoMaterno</td>
<td>$type</td></tr>";
}
echo"</table></div>";
}
public function updateUsuario($id,$nombre,$apellidop,$apellidom,$nivel){
// echo"<br>updateUsuario";
$SQQl="UPDATE usuario SET Nombre='$nombre',ApellidoPaterno='$apellidop',ApellidoMaterno='$apellidom',Nivel='$nivel'
WHERE Id=$id";
$consult=mysql_query($SQQl) or die ("Error al modificar datos".mysql_error());
}
public function deleteUsuario($id){
$sqql="UPDATE usuario SET Estatus=0 WHERE Id=$id";
$result=mysql_query($sqql) or die("Error al eliminar registro".mysql_error());
}
}
?>